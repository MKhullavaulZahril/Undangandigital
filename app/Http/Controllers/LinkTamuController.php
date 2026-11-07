<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LinkTamuController extends Controller
{
    /**
     * Tampilkan form pembuat link undangan.
     */
    public function form()
    {
        return view('admin.link', [
            'base'   => url('/'),
            'pesan'  => $this->getDefaultPesan(),
            'daftar' => '',
            'rows'   => null,
        ]);
    }

    /**
     * Proses pembuatan link undangan dari file upload atau textarea.
     */
    public function generate(Request $request)
    {
        $request->validate([
            'file'   => ['nullable', 'file', 'mimes:csv,txt', 'max:1024'],
            'daftar' => ['nullable', 'string', 'max:50000'],
            'base'   => ['required', 'url'],
            'pesan'  => ['required', 'string', 'max:2000'],
        ], [
            'file.mimes'    => 'File harus berformat CSV atau TXT.',
            'file.max'      => 'Ukuran file maksimal 1 MB.',
            'daftar.max'    => 'Daftar nama maksimal 50.000 karakter.',
            'base.required' => 'Alamat website harus diisi.',
            'base.url'      => 'Alamat website harus berupa URL yang valid.',
            'pesan.required'=> 'Template pesan WhatsApp harus diisi.',
            'pesan.max'     => 'Template pesan WhatsApp maksimal 2.000 karakter.',
        ]);

        $rawText = '';

        // Ambil isi file jika diunggah
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $fileContent = file_get_contents($request->file('file')->getRealPath());
            $rawText .= $fileContent . "\n";
        }

        // Gabungkan dengan textarea jika diisi
        if ($request->filled('daftar')) {
            $rawText .= $request->input('daftar');
        }

        // Hapus BOM UTF-8 jika ada
        $rawText = str_replace("\xEF\xBB\xBF", '', $rawText);

        // Jika bukan UTF-8 valid, konversi dari Windows-1252
        if (!mb_check_encoding($rawText, 'UTF-8')) {
            $rawText = mb_convert_encoding($rawText, 'UTF-8', 'Windows-1252');
        }

        // Pisahkan baris dengan \R
        $lines = preg_split('/\R/u', $rawText);
        $base = rtrim($request->input('base'), '/');
        $pesanTemplate = $request->input('pesan');

        $rows = [];
        $isFirstRow = true;

        foreach ($lines as $line) {
            $trimmedLine = trim($line);
            if ($trimmedLine === '') {
                continue;
            }

            // Deteksi pemisah kolom per baris: tab (Excel), titik koma (CSV Indo), atau koma
            if (str_contains($trimmedLine, "\t")) {
                $delimiter = "\t";
            } elseif (str_contains($trimmedLine, ';')) {
                $delimiter = ';';
            } else {
                $delimiter = ',';
            }

            $columns = str_getcsv($trimmedLine, $delimiter);
            if (empty($columns)) {
                continue;
            }

            $columns = array_map('trim', $columns);

            // Kolom terakhir dianggap nomor WA jika ada lebih dari satu kolom DAN cocok pola nomor
            $nomorRaw = '';
            if (count($columns) > 1) {
                $lastCol = end($columns);
                if (preg_match('/^\+?[0-9\s\-()]{8,}$/', $lastCol)) {
                    $nomorRaw = array_pop($columns);
                } elseif ($lastCol === '') {
                    // Kolom terakhir sengaja dikosongkan (mis. "Keluarga Bapak Andi,")
                    array_pop($columns);
                }
            }

            // Kolom lain digabung menjadi nama
            $nama = implode(' ', array_filter($columns, fn($col) => $col !== ''));

            // Lewati baris judul jika nama baris pertama adalah "nama", "nama tamu", atau "name" (tidak peka huruf besar-kecil)
            if ($isFirstRow) {
                $isFirstRow = false;
                $firstColLower = mb_strtolower(trim($columns[0] ?? ''));
                $namaLower = mb_strtolower($nama);
                if (in_array($firstColLower, ['nama', 'nama tamu', 'name'], true) || in_array($namaLower, ['nama', 'nama tamu', 'name'], true)) {
                    continue;
                }
            }

            // Bersihkan nama dengan strip_tags, rapikan spasi, batasi 60 karakter
            $nama = strip_tags($nama);
            $nama = preg_replace('/\s+/', ' ', $nama);
            $nama = trim($nama);
            $nama = mb_substr($nama, 0, 60);

            if ($nama === '') {
                continue;
            }

            // Normalisasi nomor: hapus non-digit; awalan 62 dibiarkan; 0 diganti 62; 8 ditambah 62 di depan
            $nomor = '';
            if ($nomorRaw !== '') {
                $digits = preg_replace('/\D+/', '', $nomorRaw);
                if ($digits !== '') {
                    if (str_starts_with($digits, '62')) {
                        $nomor = $digits;
                    } elseif (str_starts_with($digits, '0')) {
                        $nomor = '62' . substr($digits, 1);
                    } elseif (str_starts_with($digits, '8')) {
                        $nomor = '62' . $digits;
                    } else {
                        $nomor = $digits;
                    }
                }
            }

            // Slug link: spasi dan tanda "/" menjadi "-", lalu rawurlencode
            $slugRaw = str_replace([' ', '/'], '-', $nama);
            $slug = rawurlencode($slugRaw);
            $link = $base . '/' . $slug;

            // Template pesan WhatsApp
            $pesanTamu = str_replace(['{nama}', '{link}'], [$nama, $link], $pesanTemplate);
            $waUrl = 'https://wa.me/' . $nomor . '?text=' . rawurlencode($pesanTamu);

            $rows[] = [
                'nama'     => $nama,
                'nomor'    => $nomor !== '' ? '+' . $nomor : '-',
                'nomor_wa' => $nomor,
                'link'     => $link,
                'wa_url'   => $waUrl,
            ];
        }

        // Jika daftar kosong, kembalikan error validasi pada field daftar
        if (empty($rows)) {
            throw ValidationException::withMessages([
                'daftar' => 'Isi daftar nama atau unggah file terlebih dahulu.',
            ]);
        }

        // Batas maksimal 500 tamu per proses
        if (count($rows) > 500) {
            throw ValidationException::withMessages([
                'daftar' => 'Maksimal 500 tamu per proses. Total data terdeteksi: ' . count($rows) . ' tamu.',
            ]);
        }

        return view('admin.link', [
            'base'   => $request->input('base'),
            'pesan'  => $pesanTemplate,
            'daftar' => $request->input('daftar'),
            'rows'   => $rows,
        ]);
    }

    /**
     * Dapatkan template pesan default WhatsApp dengan nama panggilan kedua mempelai.
     */
    protected function getDefaultPesan(): string
    {
        $pria = config('wedding.mempelai_pria.panggilan') ?: '[Nama Pria]';
        $wanita = config('wedding.mempelai_wanita.panggilan') ?: '[Nama Wanita]';

        return "Assalamualaikum Wr. Wb.\n\nKepada Yth. {nama},\n\nDengan segala kerendahan hati, kami mengundang Anda ke pernikahan {$pria} & {$wanita}.\n\nDetail acara ada di undangan digital berikut:\n{link}\n\nTerima kasih atas doa dan kehadirannya.";
    }
}
