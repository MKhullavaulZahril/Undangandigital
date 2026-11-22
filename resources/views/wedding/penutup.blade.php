<section id="penutup" class="reveal px-6 pt-10 pb-6 text-center bg-[#F9F6EE] relative">
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
    <p class="font-isi text-[10px] text-[#C5A059] font-medium tracking-wider uppercase mb-6">
        {{ config('wedding.lokasi_teks', 'Nganjuk, Jawa Timur') }}
    </p>

    <!-- Mau Samaan & Tombol WhatsApp Pembuat Undangan -->
    @php
        $waPembuat = config('wedding.wa_pembuat', config('wedding.wa_pengantin', '6283898946839'));
        $waDigits = preg_replace('/\D+/', '', (string) $waPembuat);
        if (str_starts_with($waDigits, '0')) {
            $waDigits = '62' . substr($waDigits, 1);
        } elseif (str_starts_with($waDigits, '8')) {
            $waDigits = '62' . $waDigits;
        }
        $pesanTanya = rawurlencode('Halo, saya tertarik ingin membuat undangan digital seperti ini. Boleh minta info detailnya?');
        $waUrlPembuat = 'https://api.whatsapp.com/send?phone=' . $waDigits . '&text=' . $pesanTanya;
    @endphp

    <div class="mt-5 pt-4 border-t border-[#C5A059]/25 flex flex-col items-center justify-center">
        <p class="font-isi text-xs text-[#706E6B] tracking-wide mb-2.5 font-medium">
            Mau samaan?
        </p>
        <a 
            href="{{ $waUrlPembuat }}" 
            target="_blank" 
            rel="noopener noreferrer"
            class="inline-flex items-center justify-center gap-2 px-5 py-2 rounded-full bg-[#C5A059] hover:bg-[#b08b43] text-[#1A1A1A] shadow-md shadow-[#C5A059]/30 transition-all duration-300 hover:scale-105 active:scale-95 cursor-pointer font-isi text-xs font-semibold tracking-wide"
            title="Hubungi WhatsApp Pembuat Undangan"
            aria-label="Hubungi WhatsApp Pembuat Undangan"
        >
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>
            <span>Chat WhatsApp</span>
        </a>
    </div>
</section>