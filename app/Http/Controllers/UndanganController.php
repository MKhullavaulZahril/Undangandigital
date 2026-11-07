<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UndanganController extends Controller
{
    /**
     * Tampilkan halaman undangan utama.
     * Nama tamu bisa dari akhir link (/Mbak-Dinda) atau dari ?to=Mbak%20Dinda
     */
    public function index(Request $request, ?string $slug = null)
    {
        if ($slug !== null) {
            // Dari akhir link: tanda hubung dibaca sebagai spasi
            $tamu = str_replace('-', ' ', $slug);
        } else {
            // Link lama ?to=... tetap berfungsi
            $tamu = (string) $request->query('to', '');
        }

        // Bersihkan dari tag HTML, rapikan spasi, dan batasi panjangnya
        $tamu = strip_tags($tamu);
        $tamu = Str::of($tamu)->squish()->toString();
        $tamu = Str::limit($tamu, 60, '');

        if ($tamu === '') {
            $tamu = 'Bapak/Ibu/Saudara/i';
        }

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