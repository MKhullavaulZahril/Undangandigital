<section id="penutup" class="reveal px-6 pt-10 pb-16 text-center bg-[#F9F6EE] relative">
    <!-- Pesan Kehormatan & Doa Restu Penutup -->
    <p class="font-isi italic text-xs md:text-sm text-[#4A4A4A] max-w-xs mx-auto leading-relaxed mb-6">
        {{ config('wedding.doa.penutup_pesan', 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir serta memberikan doa restu.') }}
    </p>

    <!-- Salam Penutup -->
    <h3 class="font-judul text-lg md:text-xl font-bold text-[#1A1A1A] mb-6 leading-snug">
        Wassalamu'alaikum Warahmatullahi Wabarakatuh
    </h3>

    <!-- Teks Kami Yang Berbahagia -->
    <p class="font-judul text-xs tracking-[0.2em] text-[#C5A059] uppercase font-bold mb-2">
        Kami yang berbahagia,
    </p>

    <!-- Nama Kedua Mempelai -->
    <h2 class="font-judul text-[28px] md:text-[32px] font-bold text-[#1A1A1A] mb-2 leading-tight tracking-wide">
        {{ config('wedding.mempelai_pria.panggilan', 'Ainun') }} 
        <span class="font-judul italic text-[#C5A059] font-normal">&amp;</span> 
        {{ config('wedding.mempelai_wanita.panggilan', 'Dinda') }}
    </h2>

    <!-- Nama Keluarga Besar Kedua Mempelai -->
    <p class="font-isi text-xs text-[#706E6B] mb-8">
        {{ config('wedding.doa.keluarga_besar', 'Beserta Keluarga Besar Bpk. Subagyo & Bpk. Mujiono') }}
    </p>

    <!-- Garis Pembatas Tipis Emas -->
    <div class="w-48 h-px bg-[#C5A059]/40 mx-auto mb-6"></div>

    <!-- Copyright & Lokasi -->
    <p class="font-isi text-[11px] text-[#706E6B] mb-1">
        &copy; {{ date('Y') }} The Wedding of {{ config('wedding.mempelai_pria.panggilan', 'Ainun') }} &amp; {{ config('wedding.mempelai_wanita.panggilan', 'Dinda') }}
    </p>
    <p class="font-isi text-[10px] text-[#C5A059] font-medium tracking-wider uppercase">
        {{ config('wedding.lokasi_teks', 'Nganjuk, Jawa Timur') }}
    </p>
</section>