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
        'panggilan' => '[NAMA_PRIA]',
        'nama_lengkap' => '[NAMA_PRIA] Pratama, S.Kom.',
        'ayah' => 'Bapak Fulan',
        'ibu' => 'Ibu Fulanah',
        'putra_ke' => 'Putra pertama dari',
        'foto' => 'images/mempelai-pria.jpg',
        'instagram' => 'https://instagram.com/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Data Mempelai Wanita
    |--------------------------------------------------------------------------
    */
    'mempelai_wanita' => [
        'panggilan' => '[NAMA_WANITA]',
        'nama_lengkap' => '[NAMA_WANITA] Putri, S.Pd.',
        'ayah' => 'Bapak Fulan',
        'ibu' => 'Ibu Fulanah',
        'putri_ke' => 'Putri kedua dari',
        'foto' => 'images/mempelai-wanita.jpg',
        'instagram' => 'https://instagram.com/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Agenda Acara: Akad Nikah
    |--------------------------------------------------------------------------
    */
    'akad' => [
        'tanggal' => '[TANGGAL]',
        // Format ISO 8601 (YYYY-MM-DDTHH:mm:ss) untuk target countdown timer Alpine.js & Google Calendar
        'target_iso' => '2026-12-12T08:00:00+07:00',
        'jam_mulai' => '08:00',
        'jam_selesai' => '10:00 WIB',
        'tempat' => 'Masjid Jami Al-Hidayah',
        'alamat' => '[ALAMAT]',
    ],

    /*
    |--------------------------------------------------------------------------
    | Agenda Acara: Resepsi Pernikahan
    |--------------------------------------------------------------------------
    */
    'resepsi' => [
        'tanggal' => '[TANGGAL]',
        'jam' => '11:00 - 14:00 WIB',
        'tempat' => 'Grand Ballroom Sahid',
        'alamat' => '[ALAMAT]',
    ],

    /*
    |--------------------------------------------------------------------------
    | Peta dan Lokasi (Google Maps)
    |--------------------------------------------------------------------------
    */
    'lokasi' => [
        // Link saat tombol "Lihat Lokasi" diklik
        'gmaps_url' => 'https://maps.google.com/?q=-6.200000,106.816666',
        // URL iframe embed untuk menampilkan peta interaktif di Blade
        'embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.816666!3d-6.200000!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwNDknMDAuMCJF!5e0!3m2!1sid!2sid!4v1600000000000!5m2!1sid!2sid',
    ],

    /*
    |--------------------------------------------------------------------------
    | Rekening / Amplop Digital (Bisa Lebih Dari Satu)
    |--------------------------------------------------------------------------
    */
    'rekening' => [
        [
            'bank' => 'BCA',
            'nomor' => '1234567890',
            'atas_nama' => '[BANK/NOMOR/ATAS NAMA]',
        ],
        [
            'bank' => 'Bank Mandiri',
            'nomor' => '987654321000',
            'atas_nama' => '[BANK/NOMOR/ATAS NAMA]',
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
        ],
    ],
];
