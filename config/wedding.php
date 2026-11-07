<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Zona Waktu & Informasi Utama
    |--------------------------------------------------------------------------
    | Digunakan untuk acuan penanggalan, jam acara, dan countdown Alpine.js
    */
    'timezone' => 'Asia/Jakarta',

    /*
    |--------------------------------------------------------------------------
    | Data Mempelai Pria
    |--------------------------------------------------------------------------
    */
    'mempelai_pria' => [
        'panggilan' => 'Ainun',
        'nama_lengkap' => 'MUHAMMAD AINUN SAPUTRO',
        'ayah' => 'Bapak Subagyo',
        'ibu' => 'Ibu Siti Chotijah',
        'putra_ke' => 'Putra pertama bapak Subagyo',
        'foto' => 'images/mempelai-pria.jpg',
        'instagram' => 'https://instagram.com/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Mempelai Wanita
    |--------------------------------------------------------------------------
    */
    'mempelai_wanita' => [
        'panggilan' => 'Dinda',
        'nama_lengkap' => ' DINDA RAMADHANTY ARYANI',
        'ayah' => 'Bapak Rekso Wibowo',
        'ibu' => 'Ibu Mutik Aniati',
        'putri_ke' => 'Putri Pertama dari bapak fulan',
        'foto' => 'images/mempelai-wanita.jpg',
        'instagram' => 'https://instagram.com/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Kontak WhatsApp Pengantin (Untuk Menerima Konfirmasi RSVP)
    |--------------------------------------------------------------------------
    */
    'wa_pengantin' => env('WA_PENGANTIN', '6281234567890'),

    /*
    |--------------------------------------------------------------------------
    | Agenda Acara: Akad Nikah
    |--------------------------------------------------------------------------
    */
    'akad' => [
        'tanggal' => '22 Desember 2026',
        // Format ISO 8601 (YYYY-MM-DDTHH:mm:ss) untuk target countdown timer Alpine.js & Google Calendar
        'target_iso' =>'2026-12-22T08:00:00+07:00',
        'jam_mulai' => '08:00',
        'jam_selesai' => '10:00 WIB',
        'tempat' => 'Rumah Bapak Rekso Wibowo',
        'alamat' => 'Dsn . Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
    ],

    /*
    |--------------------------------------------------------------------------
    | Agenda Acara: Resepsi Pernikahan
    |--------------------------------------------------------------------------
    */
    'resepsi' => [
        'tanggal' => '22 Desember 2026',
        'jam' => '10:00 - 14:00 WIB',
        'tempat' => 'Rumah Bapak Rekso Wibowo',
        'alamat' => 'Dsn . Nglaban RT 033 RW 009 Ds. Babadan Kec. Patianrowo',
    ],

    /*
    |--------------------------------------------------------------------------
    | Peta dan Lokasi (Google Maps)
    |--------------------------------------------------------------------------
    */
    'lokasi' => [
        // Link saat tombol "Lihat Lokasi" diklik
        'gmaps_url' => 'https://maps.google.com/?q=-7.564881,112.079360',
        // URL iframe embed untuk menampilkan peta interaktif di Blade
        'embed_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3956.4!2d112.07936!3d-7.564881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMzMnNTMuNiJTIDExMsKwMDQnNDUuNyJF!5e0!3m2!1sid!2sid!4v1000000000000!5m2!1sid!2sid',
    ],

    /*
    |--------------------------------------------------------------------------
    | Rekening / Amplop Digital (Bisa Lebih Dari Satu)
    |--------------------------------------------------------------------------
    */
    'rekening' => [
        [
            'bank' => 'BRI',
            'nomor' => '375001034021539 ',
            'atas_nama' => 'AN. MUHAMAD AINUN SAPUTRO',
        ],
        [
            'bank' => 'BCA',
            'nomor' => '0184566636',
            'atas_nama' => 'AN. DINDA RAMADHANTY ARYANI',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Ayat / Doa Pembuka & Penutup
    |--------------------------------------------------------------------------
    */
    'doa' => [
        'pembuka_arab' => 'وَمِنْ ءَايَٰتِهِۦٓ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَٰجًا لِّتَسْكُنُوٓا۟ إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً ۚ إِنَّ فِى ذَٰلِكَ لَءَايَٰتٍ لِّقَوْمٍ يَتَفَكَّرُونَ',
        'pembuka_arti' => 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berpikir.',
        'pembuka_surat' => 'QS. Ar-Rum: 21',
        'penutup_pesan' => 'Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.',
        'keluarga_besar' => 'Keluarga Besar Kedua Mempelai',
    ],

    /*
    |--------------------------------------------------------------------------
    | Media & Aset Default
    |--------------------------------------------------------------------------
    */
    'media' => [
        'cover' => 'images/cover.jpg',
        'audio' => 'audio/musik.mp3',
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
