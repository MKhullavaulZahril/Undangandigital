<?php

/**
 * ============================================================================
 * PUSAT PENGATURAN DATA PERNIKAHAN (WEDDING CONFIGURATION)
 * ============================================================================
 * 
 * File ini adalah SATU-SATUNYA file yang perlu Anda ubah jika ingin mengganti:
 * - Daftar slug tamu pihak pria & pemisahan acara (acara_default vs acara_pria)
 * - Rangkaian Acara (Akad & Resepsi vs Ngunduh Mantu)
 * - Lokasi Acara & Google Maps (lokasi_default vs lokasi_pria)
 * - Nama mempelai pria & wanita
 * - Foto-foto mempelai & galeri
 * - Nomor rekening / amplop digital & alamat kado fisik
 * - Kontak WhatsApp penerima RSVP & pembuat undangan
 * - Doa / ayat pembuka & pesan penutup
 */

return [

    /*
    |--------------------------------------------------------------------------
    | 1. Pengaturan Dasar & Waktu
    |--------------------------------------------------------------------------
    */
    'timezone' => 'Asia/Jakarta',

    // Inisial kedua mempelai untuk monogram/logo lingkaran (misal: 'AD' untuk Ainun & Dinda)
    'monogram' => 'AD',

    // Teks kota / daerah yang muncul di footer bawah
    'lokasi_teks' => 'Nganjuk, Jawa Timur',


    /*
    |--------------------------------------------------------------------------
    | 2. Daftar Tamu Pihak Mempelai Pria (Slug Huruf Kecil)
    |--------------------------------------------------------------------------
    | Masukkan slug nama tamu khusus pihak mempelai pria di sini.
    | Ketika tamu membuka link dengan slug yang terdaftar di sini (misal: /budi-santoso),
    | web secara otomatis hanya merender 1 acara ("Ngunduh Mantu") dan lokasi pria.
    */
    'tamu_pria' => [
        'dewi-magetan',
        'om-iwan',
        'undangan',
    ],


    /*
    |==========================================================================
    | [MULAI] KONFIGURASI MEMPELAI WANITA (DEFAULT)
    |==========================================================================
    | Bagian ini digunakan untuk tamu pihak wanita atau pengunjung umum tanpa parameter.
    | Merender 2 kartu acara: Akad Nikah & Resepsi Pernikahan.
    */

    // Target tanggal & jam untuk Countdown Timer & Google Calendar pihak wanita (Format ISO: YYYY-MM-DDTHH:mm:ss+07:00)
    'countdown_default' => '2026-12-22T08:00:00+07:00',

    'acara_default' => [
        [
            'badge'         => 'AKAD NIKAH',
            'judul'         => 'Akad Nikah',
            'tanggal_angka' => '22',
            'hari'          => 'TUESDAY',
            'bulan_tahun'   => 'DEC 2026',
            'waktu'         => '08:00 WIB - 10:00 WIB',
            'tempat'        => 'Rumah Bapak Rekso Wibowo',
            'alamat'        => 'Dsn. Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
            'target_iso'    => '2026-12-22T08:00:00+07:00',
        ],
        [
            'badge'         => 'WALIMATUL \'URSY',
            'judul'         => 'Resepsi Pernikahan',
            'tanggal_angka' => '22',
            'hari'          => 'TUESDAY',
            'bulan_tahun'   => 'DEC 2026',
            'waktu'         => '10:00 - 14:00 WIB',
            'tempat'        => 'Rumah Bapak Rekso Wibowo',
            'alamat'        => 'Dsn. Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
            'target_iso'    => '2026-12-22T10:00:00+07:00',
        ],
    ],

    'lokasi_default' => [
        'tempat'         => 'Rumah Bapak Rekso Wibowo',
        'alamat'         => 'Dsn. Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
        // Link saat tombol "Buka di Google Maps" diklik
        'maps_url'       => 'https://maps.google.com/?q=-7.564881,112.079360',
        // Link iframe embed untuk memunculkan kotak peta di dalam web
        'maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3956.4!2d112.07936!3d-7.564881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzMnNTMuNiJTIDExMsKwMDQnNDUuNyJF!5e0!3m2!1sid!2sid!4v1000000000000!5m2!1sid!2sid',
    ],

    /*
    |==========================================================================
    | [AKHIR] KONFIGURASI MEMPELAI WANITA (DEFAULT)
    |==========================================================================
    */


    /*
    |==========================================================================
    | [MULAI] KONFIGURASI MEMPELAI PRIA ("NGUNDUH MANTU")
    |==========================================================================
    | Bagian ini khusus untuk tamu pihak mempelai pria (hanya 1 acara saja).
    */

    // Target tanggal & jam untuk Countdown Timer & Google Calendar pihak pria (Format ISO: YYYY-MM-DDTHH:mm:ss+07:00)
    'countdown_pria' => '2026-12-23T10:00:00+07:00',

    'acara_pria' => [
        [
            'badge'         => 'NGUNDUH MANTU',
            'judul'         => 'Ngunduh Mantu',
            'tanggal_angka' => '23',
            'hari'          => 'WEDNESDAY',
            'bulan_tahun'   => 'DEC 2026',
            'waktu'         => '10:00 WIB - Selesai',
            'tempat'        => 'Kediaman Mempelai Pria (Bpk. Subagyo)',
            'alamat'        => 'Dsn. Nglawak Ds. Nglawak, Kec. Kertosono, Kab. Nganjuk',
            'target_iso'    => '2026-12-23T10:00:00+07:00',
        ],
    ],

    'lokasi_pria' => [
        'tempat'         => 'Kediaman Mempelai Pria (Bpk. Subagyo)',
        'alamat'         => 'Dsn. Nglawak Ds. Nglawak, Kec. Kertosono, Kab. Nganjuk',
        // Link saat tombol "Buka di Google Maps" diklik
        'maps_url'       => 'https://maps.app.goo.gl/tTQm67NegUzE8hhbA',
        // Link iframe embed untuk memunculkan kotak peta di dalam web
        'maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3954.758300171168!2d112.08900177500311!3d-7.601261792413741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzYnMDQuNSJTIDExMsKwMDUnMjkuNyJF!5e0!3m2!1sen!2sid!4v1795320749157!5m2!1sen!2sid',
    ],

    /*
    |==========================================================================
    | [AKHIR] KONFIGURASI MEMPELAI PRIA ("NGUNDUH MANTU")
    |==========================================================================
    */


    /*
    |--------------------------------------------------------------------------
    | Data Mempelai Pria
    |--------------------------------------------------------------------------
    */
    'mempelai_pria' => [
        'panggilan'    => 'Ainun',
        'nama_lengkap' => 'MUHAMAD AINUN SAPUTRO',
        'ayah'         => 'Bapak Subagyo',
        'ibu'          => 'Ibu Siti Chotijah',
        'putra_ke'     => 'Putra pertama bapak Subagyo',
        'domisili'     => 'Nganjuk, Jawa Timur',
        'foto'         => 'images/mempelai-pria.jpg',
        'instagram'    => 'https://instagram.com/',
    ],


    /*
    |--------------------------------------------------------------------------
    | Data Mempelai Wanita
    |--------------------------------------------------------------------------
    */
    'mempelai_wanita' => [
        'panggilan'    => 'Dinda',
        'nama_lengkap' => 'DINDA RAMADHANTY ARYANI',
        'ayah'         => 'Bapak Rekso Wibowo',
        'ibu'          => 'Ibu Mutik Aniati',
        'putri_ke'     => 'Putri Pertama dari bapak Rekso Wibowo',
        'domisili'     => 'Nganjuk, Jawa Timur',
        'foto'         => 'images/mempelai-wanita.jpg',
        'instagram'    => 'https://instagram.com/',
    ],


    /*
    |--------------------------------------------------------------------------
    | Kontak WhatsApp Pengantin & Pembuat
    |--------------------------------------------------------------------------
    */
    'wa_pengantin' => env('WA_PENGANTIN', '6281234567890'),
    'wa_pembuat'   => env('WA_PEMBUAT', '6285183142297'),


    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Kompatibilitas Legacy (Akad, Resepsi, Lokasi)
    |--------------------------------------------------------------------------
    */
    'akad' => [
        'judul'       => 'Akad Nikah',
        'tanggal'     => '22 Desember 2026',
        'target_iso'  => '2026-12-22T08:00:00+07:00',
        'weton'       => 'Selasa, 22 Desember 2026',
        'jam_mulai'   => '08:00',
        'jam_selesai' => '10:00 WIB',
        'jam'         => '08:00 WIB - 10:00 WIB',
        'tempat'      => 'Rumah Bapak Rekso Wibowo',
        'alamat'      => 'Dsn. Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
    ],

    'resepsi' => [
        'judul'   => 'Resepsi Pernikahan',
        'tanggal' => '22 Desember 2026',
        'jam'     => '10:00 - 14:00 WIB',
        'tempat'  => 'Rumah Bapak Rekso Wibowo',
        'alamat'  => 'Dsn. Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
    ],

    'lokasi' => [
        'gmaps_url' => 'https://maps.google.com/?q=-7.564881,112.079360',
        'embed_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3956.4!2d112.07936!3d-7.564881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzMnNTMuNiJTIDExMsKwMDQnNDUuNyJF!5e0!3m2!1sid!2sid!4v1000000000000!5m2!1sid!2sid',
    ],


    /*
    |--------------------------------------------------------------------------
    | Rekening / Amplop Digital & Alamat Kado Fisik
    |--------------------------------------------------------------------------
    */
    'rekening' => [
        [
            'bank'      => 'BRI',
            'nomor'     => '375001034021539',
            'atas_nama' => 'MUHAMAD AINUN SAPUTRO',
        ],
        [
            'bank'      => 'BCA',
            'nomor'     => '0184566636',
            'atas_nama' => 'DINDA RAMADHANTY ARYANI',
        ],
    ],

    'kado_fisik' => [
        'alamat' => 'Kediaman Bpk. Subagyo (Ainun), Dsn. Nglawak Ds. Nglawak, Kec. Kertosono, Kab. Nganjuk 64484',
    ],


    /*
    |--------------------------------------------------------------------------
    | Ayat / Doa & Pesan Penutup
    |--------------------------------------------------------------------------
    */
    'doa' => [
        'pembuka_arab'   => 'وَمِنْ ءَايَٰتِهِۦٓ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَٰجًا لِّتَسْكُنُوٓا۟ إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً ۚ إِنَّ فِى ذَٰلِكَ لَءَايَٰتٍ لِّقَوْمٍ يَتَفَكَّرُونَ',
        'pembuka_arti'   => 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berpikir.',
        'pembuka_surat'  => 'QS. Ar-Rum: 21',
        'penutup_pesan'  => 'Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.',
        'keluarga_besar' => 'Keluarga Besar Kedua Mempelai',
    ],


    /*
    |--------------------------------------------------------------------------
    | Media (Gambar, Audio Musik, Galeri Foto)
    |--------------------------------------------------------------------------
    */
    'media' => [
        'cover'  => 'images/cover.jpg',
        'audio'  => 'audio/musik.mp3',
        'galeri' => [
            'images/galeri/foto-1.jpg',
            'images/galeri/foto-2.jpg',
            'images/galeri/foto-3.jpg',
            'images/galeri/foto-4.jpg',
            'images/galeri/foto-5.jpg',
            'images/galeri/foto-6.jpg',
            'images/galeri/foto-7.jpg',
            'images/galeri/foto-8.jpg',
            'images/galeri/foto-extra-pria.jpg',
            'images/galeri/foto-extra-wanita.jpg',
        ],
    ],

];
