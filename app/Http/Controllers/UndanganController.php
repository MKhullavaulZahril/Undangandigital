<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UndanganController extends Controller
{
    /**
     * Tampilkan halaman undangan utama.
     */
    public function index(Request $request)
    {
        // Ambil parameter 'to' dari URL, bersihkan dari tag HTML, dan batasi panjangnya
        $tamu = $request->query('to', 'Bapak/Ibu/Saudara/i');
        $tamu = strip_tags($tamu);
        $tamu = Str::limit($tamu, 60, '');

        // Generate URL Google Calendar untuk tombol "Save the Date"
        $akadStart = Carbon::parse(config('wedding.akad.target_iso'));
        // Ambil jam selesai dari config (format "10:00 WIB"), ambil bagian jam saja
        $jamSelesai = Str::before(config('wedding.akad.jam_selesai'), ' ');
        $akadEnd = $akadStart->copy()->setTimeFromTimeString($jamSelesai);

        $gcalUrl = 'https://calendar.google.com/calendar/render?' . http_build_query([
            'action'  => 'TEMPLATE',
            'text'    => 'The Wedding of ' . config('wedding.mempelai_pria.panggilan') . ' & ' . config('wedding.mempelai_wanita.panggilan'),
            'dates'   => $akadStart->format('Ymd\THis') . '/' . $akadEnd->format('Ymd\THis'),
            'details' => 'Akad Nikah & Resepsi Pernikahan',
            'location'=> config('wedding.akad.tempat') . ' - ' . config('wedding.akad.alamat'),
        ]);

        return view('undangan', [
            'tamu'    => $tamu,
            'gcalUrl' => $gcalUrl,
        ]);
    }
}