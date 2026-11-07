<section id="acara" class="reveal px-4 pt-4 pb-16 bg-[#F9F6EE] relative">
    <!-- Header Acara -->
    <div class="text-center mb-7">
        <p class="font-judul text-[12px] tracking-[0.25em] text-[#C5A059] uppercase font-bold mb-1">
            Agenda Pawiwahan
        </p>
        <h2 class="font-judul text-[30px] font-bold text-[#1A1A1A] leading-tight">
            Rangkaian Acara
        </h2>
    </div>

    <!-- KARTU 1: AKAD NIKAH -->
    <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto mb-5">
        <div class="flex items-start gap-4">
            <!-- Kotak Tanggal Kiri -->
            <div class="w-20 min-w-[76px] bg-[#F4ECE1] rounded-2xl p-2.5 flex flex-col items-center justify-center text-center border border-[#C5A059]/30 shrink-0">
                <span class="font-judul text-2xl font-bold text-[#1A1A1A] leading-none">
                    {{ \Carbon\Carbon::parse(config('wedding.akad.target_iso'))->format('d') }}
                </span>
                <span class="font-isi text-[10px] font-bold text-[#C5A059] uppercase tracking-wider mt-1 leading-none">
                    {{ strtoupper(\Carbon\Carbon::parse(config('wedding.akad.target_iso'))->translatedFormat('l')) }}
                </span>
                <span class="font-isi text-[9px] text-[#706E6B] uppercase font-medium mt-1 leading-none">
                    {{ strtoupper(\Carbon\Carbon::parse(config('wedding.akad.target_iso'))->translatedFormat('M Y')) }}
                </span>
            </div>

            <!-- Detail Info Kanan -->
            <div class="flex-1 min-w-0">
                <span class="inline-block px-3 py-0.5 rounded-full bg-[#F4ECE1] text-[#C5A059] font-isi text-[10px] font-bold uppercase tracking-wider mb-1">
                    Akad Nikah
                </span>
                <h3 class="font-judul text-xl font-bold text-[#1A1A1A] leading-snug mb-1 truncate">
                    {{ config('wedding.akad.judul', 'Ijab Qabul') }}
                </h3>
                <div class="flex items-center gap-1.5 text-xs text-[#4A4A4A] font-isi mb-2">
                    <svg class="w-3.5 h-3.5 text-[#C5A059] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" stroke-width="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 2" />
                    </svg>
                    <span>
                        {{ config('wedding.akad.jam') ?? (config('wedding.akad.jam_mulai') . ' WIB - ' . config('wedding.akad.jam_selesai')) }}
                    </span>
                </div>
            </div>
        </div>

        <div class="border-t border-stone-200/70 my-3"></div>

        <p class="font-isi text-[11px] text-[#706E6B] leading-relaxed">
            {{ config('wedding.akad.alamat') }}
        </p>
    </div>

    <!-- KARTU 2: RESEPSI PERNIKAHAN -->
    <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto mb-5">
        <div class="flex items-start gap-4">
            <!-- Kotak Tanggal Kiri -->
            <div class="w-20 min-w-[76px] bg-[#F4ECE1] rounded-2xl p-2.5 flex flex-col items-center justify-center text-center border border-[#C5A059]/30 shrink-0">
                <span class="font-judul text-2xl font-bold text-[#1A1A1A] leading-none">
                    {{ \Carbon\Carbon::parse(config('wedding.akad.target_iso'))->format('d') }}
                </span>
                <span class="font-isi text-[10px] font-bold text-[#C5A059] uppercase tracking-wider mt-1 leading-none">
                    {{ strtoupper(\Carbon\Carbon::parse(config('wedding.akad.target_iso'))->translatedFormat('l')) }}
                </span>
                <span class="font-isi text-[9px] text-[#706E6B] uppercase font-medium mt-1 leading-none">
                    {{ strtoupper(\Carbon\Carbon::parse(config('wedding.akad.target_iso'))->translatedFormat('M Y')) }}
                </span>
            </div>

            <!-- Detail Info Kanan -->
            <div class="flex-1 min-w-0">
                <span class="inline-block px-3 py-0.5 rounded-full bg-[#F4ECE1] text-[#C5A059] font-isi text-[10px] font-bold uppercase tracking-wider mb-1">
                    Walimatul 'Ursy
                </span>
                <h3 class="font-judul text-xl font-bold text-[#1A1A1A] leading-snug mb-1 truncate">
                    {{ config('wedding.resepsi.judul', 'Resepsi Pernikahan') }}
                </h3>
                <div class="flex items-center gap-1.5 text-xs text-[#4A4A4A] font-isi mb-2">
                    <svg class="w-3.5 h-3.5 text-[#C5A059] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" stroke-width="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 2" />
                    </svg>
                    <span>
                        {{ config('wedding.resepsi.jam', 'Rileks / Sewaktu-waktu (Siang Hari)') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="border-t border-stone-200/70 my-3"></div>

        <p class="font-isi text-[11px] text-[#706E6B] leading-relaxed">
            {{ config('wedding.resepsi.alamat') }}
        </p>
    </div>

    <!-- KARTU 3: LOKASI ACARA & EMBED MAP -->
    <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto text-center">
        <h3 class="font-judul text-2xl font-bold text-[#1A1A1A] mb-1.5">
            Lokasi Acara
        </h3>
        
        <p class="font-isi text-xs text-[#706E6B] leading-relaxed mb-4 px-2">
            {{ config('wedding.resepsi.alamat') }}
        </p>

        <!-- Embed Google Maps Interaktif (Responsif 100% & Loading Lazy) -->
        <div class="rounded-2xl overflow-hidden border border-stone-200 shadow-sm mb-4 bg-stone-100">
            <iframe 
                src="{{ config('wedding.lokasi.embed_url') }}" 
                width="100%" 
                height="220" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                title="Lokasi Acara"
                class="w-full h-52 object-cover block"
            ></iframe>
        </div>

        <!-- Tombol Buka di Google Maps -->
        <a 
            href="{{ config('wedding.lokasi.gmaps_url') }}" 
            target="_blank" 
            rel="noopener noreferrer"
            class="inline-flex items-center justify-center gap-2 w-full py-3.5 px-5 rounded-2xl bg-[#231F1D] hover:bg-[#1A1A1A] active:scale-95 text-[#C5A059] font-isi font-semibold text-xs tracking-wider shadow-md transition-all duration-300 transform hover:scale-[1.01] cursor-pointer"
        >
            <svg class="w-4 h-4 text-[#C5A059]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
            </svg>
            <span>Buka di Google Maps</span>
        </a>
    </div>
</section>