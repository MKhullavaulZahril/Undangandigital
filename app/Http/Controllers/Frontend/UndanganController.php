<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UndanganController extends Controller
{
    /**
     * Tampilkan halaman undangan utama.
     * Nama tamu bisa dari parameter URL (/{tamu?}) atau dari query string ?to=...
     */
    public function index(Request $request, ?string $tamu = null)
    {
        $rawTamu = $tamu ?? (string) $request->query('to', '');

        if ($tamu !== null) {
            // Dari akhir link: tanda hubung dibaca sebagai spasi
            $namaTamu = str_replace('-', ' ', $tamu);
        } else {
            // Link query ?to=... tetap berfungsi
            $namaTamu = (string) $request->query('to', '');
        }

        // Bersihkan dari tag HTML, rapikan spasi, dan batasi panjangnya
        $namaTamu = strip_tags($namaTamu);
        $namaTamu = Str::of($namaTamu)->squish()->toString();
        $namaTamu = Str::limit($namaTamu, 60, '');

        if ($namaTamu === '') {
            $namaTamu = 'Bapak/Ibu/Saudara/i';
        }

        // Normalisasi slug tamu menjadi huruf kecil menggunakan Str::slug
        $slugTamu = Str::slug($rawTamu);

        // Cocokkan dengan daftar tamu pihak pria memakai in_array
        $tamuPria = config('wedding.tamu_pria', []);
        $isTamuPria = in_array($slugTamu, $tamuPria, true);

        // Ambil daftar acara & lokasi dinamis (pria vs default)
        $acaraList = $isTamuPria
            ? config('wedding.acara_pria', [])
            : config('wedding.acara_default', []);

        $lokasi = $isTamuPria
            ? config('wedding.lokasi_pria', config('wedding.lokasi_default', []))
            : config('wedding.lokasi_default', []);

        // Target Countdown ISO terpisah untuk pihak pria dan wanita
        $targetCountdown = $isTamuPria
            ? (config('wedding.countdown_pria') ?: ($acaraList[0]['target_iso'] ?? '2026-12-23T10:00:00+07:00'))
            : (config('wedding.countdown_default') ?: ($acaraList[0]['target_iso'] ?? '2026-12-22T08:00:00+07:00'));

        // Array pembantu $acara untuk kompatibilitas bagian lain (cover, countdown, dll)
        $acara = [
            'akad'    => array_merge($acaraList[0] ?? [], ['target_iso' => $targetCountdown]),
            'resepsi' => $acaraList[1] ?? ($acaraList[0] ?? []),
            'lokasi'  => $lokasi,
        ];

        // Generate URL Google Calendar untuk tombol "Save the Date"
        $primaryEvent = $acaraList[0] ?? [];
        try {
            $akadStart = Carbon::parse($targetCountdown);
        } catch (\Throwable $e) {
            $akadStart = Carbon::parse('2026-12-22T08:00:00+07:00');
        }

        // Ambil jam selesai dengan aman tanpa crash jika teks mengandung "- Selesai"
        $waktuStr = (string) ($primaryEvent['waktu'] ?? ($primaryEvent['jam'] ?? ''));
        $akadEnd = null;

        if (str_contains($waktuStr, '-')) {
            $bagianKedua = trim(explode('-', $waktuStr)[1]);
            // Cari format jam seperti "14:00"
            if (preg_match('/(\d{1,2}:\d{2})/', $bagianKedua, $matches)) {
                try {
                    $akadEnd = $akadStart->copy()->setTimeFromTimeString($matches[1]);
                } catch (\Throwable $e) {
                    $akadEnd = null;
                }
            }
        }

        // Jika jam selesai tidak berupa angka (misal "Selesai"), atur durasi default 3 jam setelah mulai
        if (! $akadEnd || $akadEnd->lessThanOrEqualTo($akadStart)) {
            $akadEnd = $akadStart->copy()->addHours(3);
        }

        $tempatGcal = $primaryEvent['tempat'] ?? ($lokasi['tempat'] ?? config('wedding.akad.tempat'));
        $alamatGcal = $primaryEvent['alamat'] ?? ($lokasi['alamat'] ?? config('wedding.akad.alamat'));

        $gcalUrl = 'https://calendar.google.com/calendar/render?' . http_build_query([
            'action'  => 'TEMPLATE',
            'text'    => 'The Wedding of ' . config('wedding.mempelai_pria.panggilan') . ' & ' . config('wedding.mempelai_wanita.panggilan'),
            'dates'   => $akadStart->format('Ymd\THis') . '/' . $akadEnd->format('Ymd\THis'),
            'details' => ($primaryEvent['judul'] ?? 'Pernikahan') . ' - ' . config('wedding.mempelai_pria.panggilan') . ' & ' . config('wedding.mempelai_wanita.panggilan'),
            'location'=> $tempatGcal . ' - ' . $alamatGcal,
        ]);

        return view('undangan', [
            'tamu'            => $namaTamu,
            'namaTamu'        => $namaTamu,
            'gcalUrl'         => $gcalUrl,
            'isTamuPria'      => $isTamuPria,
            'targetCountdown' => $targetCountdown,
            'acaraList'       => $acaraList,
            'lokasi'          => $lokasi,
            'acara'           => $acara,
        ]);
    }
}
