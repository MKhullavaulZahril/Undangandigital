<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RsvpController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Honeypot anti-spam
        if ($request->filled('website')) {
            return response()->json(['success' => true, 'message' => 'Terima kasih.']);
        }

        $validator = Validator::make($request->all(), [
            'nama'   => ['required', 'string', 'max:100'],
            'status' => ['required', 'in:hadir,tidak_hadir'],
            'jumlah' => ['nullable', 'integer', 'min:0', 'max:5'],
        ], [
            'nama.required'   => 'Nama wajib diisi.',
            'status.required' => 'Pilih konfirmasi kehadiran.',
            'status.in'       => 'Pilihan kehadiran tidak valid.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors'  => $validator->errors(),
            ], 422);
        }

        $status = $request->input('status');
        $jumlah = $status === 'hadir'
            ? max(1, (int) $request->input('jumlah', 1))
            : 0;

        $namaTamu = strip_tags($request->input('nama'));

        Rsvp::create([
            'nama'   => $namaTamu,
            'status' => $status,
            'jumlah' => $jumlah,
        ]);

        // Buat pesan dan link WhatsApp ke kontak pengantin
        $pria = config('wedding.mempelai_pria.panggilan', 'Mempelai Pria');
        $wanita = config('wedding.mempelai_wanita.panggilan', 'Mempelai Wanita');
        $waPengantin = (string) (config('wedding.wa_pengantin') ?: env('WA_PENGANTIN', '6281234567890'));

        $waDigits = preg_replace('/\D+/', '', $waPengantin);
        if (str_starts_with($waDigits, '0')) {
            $waDigits = '62' . substr($waDigits, 1);
        } elseif (str_starts_with($waDigits, '8')) {
            $waDigits = '62' . $waDigits;
        }

        $statusText = $status === 'hadir' ? 'Insya Allah Hadir' : 'Mohon Maaf Belum Bisa Hadir';

        if ($status === 'hadir') {
            $pesan = "Halo {$pria} & {$wanita},\n\nSaya ingin mengonfirmasi kehadiran di acara pernikahan:\n- Nama: {$namaTamu}\n- Konfirmasi: {$statusText}\n- Jumlah Tamu: {$jumlah} Orang\n\nTerima kasih atas undangannya.";
        } else {
            $pesan = "Halo {$pria} & {$wanita},\n\nSaya ingin mengonfirmasi bahwa:\n- Nama: {$namaTamu}\n- Konfirmasi: {$statusText}\n\nTerima kasih banyak atas undangannya, semoga acara pernikahan berjalan lancar dan penuh berkah.";
        }

        $waUrl = 'https://wa.me/' . $waDigits . '?text=' . rawurlencode($pesan);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih, konfirmasi kehadiran Anda sudah kami terima dan siap diteruskan ke WhatsApp pengantin.',
            'data'    => [
                'nama'        => $namaTamu,
                'status'      => $status,
                'status_text' => $statusText,
                'jumlah'      => $jumlah,
            ],
            'wa_url'  => $waUrl,
        ], 201);
    }
}