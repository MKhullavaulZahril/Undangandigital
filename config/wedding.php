<?php

/**
 * ============================================================================
 * PUSAT PENGATURAN DATA PERNIKAHAN (WEDDING CONFIGURATION)
 * ============================================================================
 * 
 * File ini adalah SATU-SATUNYA file yang perlu Anda ubah jika ingin mengganti:
 * - Nama mempelai pria & wanita
 * - Foto-foto mempelai & galeri
 * - Tanggal & jam acara (Akad & Resepsi)
 * - Peta lokasi Google Maps (link & iframe embed)
 * - Nomor rekening / amplop digital & alamat kado fisik
 * - Kontak WhatsApp penerima RSVP
 * - Doa / ayat pembuka & pesan penutup
 * 
 * Anda TIDAK PERLU menyentuh kode HTML / Blade di folder resources/views/wedding!
 * Cukup ubah nilai di dalam file ini saja.
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
    | 2. Data Mempelai Pria
    |--------------------------------------------------------------------------
    */
    'mempelai_pria' => [
        'panggilan'    => 'Ainun',
        'nama_lengkap' => 'MUHAMMAD AINUN SAPUTRO',
        'ayah'         => 'Bapak Subagyo',
        'ibu'          => 'Ibu Siti Chotijah',
        'putra_ke'     => 'Putra pertama bapak Subagyo',
        'domisili'     => 'Nganjuk, Jawa Timur',
        'foto'         => 'images/mempelai-pria.jpg', // Lokasi di folder public/images/
        'instagram'    => 'https://instagram.com/',
    ],


    /*
    |--------------------------------------------------------------------------
    | 3. Data Mempelai Wanita
    |--------------------------------------------------------------------------
    */
    'mempelai_wanita' => [
        'panggilan'    => 'Dinda',
        'nama_lengkap' => 'DINDA RAMADHANTY ARYANI',
        'ayah'         => 'Bapak Rekso Wibowo',
        'ibu'          => 'Ibu Mutik Aniati',
        'putri_ke'     => 'Putri Pertama dari bapak fulan',
        'domisili'     => 'Nganjuk, Jawa Timur',
        'foto'         => 'images/mempelai-wanita.jpg', // Lokasi di folder public/images/
        'instagram'    => 'https://instagram.com/',
    ],


    /*
    |--------------------------------------------------------------------------
    | 4. Kontak WhatsApp Pengantin (Penerima Konfirmasi RSVP)
    |--------------------------------------------------------------------------
    | Masukkan nomor WhatsApp pengantin/panitia dengan format awalan 62.
    | Contoh: 6281234567890 (tanpa tanda +, spasi, atau strip).
    */
    'wa_pengantin' => env('WA_PENGANTIN', '6281234567890'),


    /*
    |--------------------------------------------------------------------------
    | 5. Agenda Acara: Akad Nikah
    |--------------------------------------------------------------------------
    */
    'akad' => [
        'judul'       => 'Akad Nikah',
        'tanggal'     => '22 Desember 2026',
        
        // Target Countdown timer & Google Calendar: format YYYY-MM-DDTHH:mm:ss+07:00
        'target_iso'  => '2026-12-22T08:00:00+07:00',
        
        // Teks hari/weton yang tampil di banner acara
        'weton'       => 'Selasa Kliwon, 22 Desember 2026',
        
        'jam_mulai'   => '08:00',
        'jam_selesai' => '10:00 WIB',
        'tempat'      => 'Rumah Bapak Rekso Wibowo',
        'alamat'      => 'Dsn . Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
    ],


    /*
    |--------------------------------------------------------------------------
    | 6. Agenda Acara: Resepsi Pernikahan
    |--------------------------------------------------------------------------
    */
    'resepsi' => [
        'judul'   => 'Resepsi Pernikahan',
        'tanggal' => '22 Desember 2026',
        'jam'     => '10:00 - 14:00 WIB',
        'tempat'  => 'Rumah Bapak Rekso Wibowo',
        'alamat'  => 'Dsn . Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
    ],


    /*
    |--------------------------------------------------------------------------
    | 7. Lokasi Google Maps
    |--------------------------------------------------------------------------
    */
    'lokasi' => [
        // Link yang akan dibuka saat tamu menekan tombol "Buka Google Maps"
        'gmaps_url' => 'https://maps.google.com/?q=-7.564881,112.079360',
        
        // URL iframe embed untuk menampilkan peta langsung di dalam halaman
        // Cara dapat: Buka Google Maps -> Bagikan -> Sematkan peta -> Salin link di src="..."
        'embed_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3956.4!2d112.07936!3d-7.564881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzMnNTMuNiJTIDExMsKwMDQnNDUuNyJF!5e0!3m2!1sid!2sid!4v1000000000000!5m2!1sid!2sid',
    ],


    /*
    |--------------------------------------------------------------------------
    | 8. Rekening / Amplop Digital
    |--------------------------------------------------------------------------
    | Anda dapat menambahkan lebih banyak rekening sesuai kebutuhan.
    */
    'rekening' => [
        [
            'bank'      => 'BRI',
            'nomor'     => '375001034021539',
            'atas_nama' => 'AN. MUHAMAD AINUN SAPUTRO',
        ],
        [
            'bank'      => 'BCA',
            'nomor'     => '0184566636',
            'atas_nama' => 'AN. DINDA RAMADHANTY ARYANI',
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | 9. Alamat Pengiriman Kado Fisik
    |--------------------------------------------------------------------------
    */
    'kado_fisik' => [
        'alamat' => 'Kediaman Bpk. Subagyo (Ainun), Dsn. Nglawak Ds. Nglawak, Kec. Kertosono, Kab. Nganjuk 64484',
    ],


    /*
    |--------------------------------------------------------------------------
    | 10. Ayat / Doa & Pesan Penutup
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
    | 11. Media (Gambar, Audio Musik, Galeri Foto)
    |--------------------------------------------------------------------------
    | Semua file berada di dalam folder public/
    */
    'media' => [
        'cover'  => 'images/cover.jpg',     // Foto sampul pembuka
        'audio'  => 'audio/musik.mp3',      // Backsound musik undangan
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
