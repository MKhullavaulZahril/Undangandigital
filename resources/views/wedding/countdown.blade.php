<section id="countdown" class="reveal px-4 py-8 bg-[#F9F6EE] relative">
    <!-- Kartu Gelap Elegan Hitam & Emas -->
    <div class="bg-gradient-to-b from-[#222222] to-[#121212] rounded-3xl p-6 sm:p-8 max-w-sm mx-auto shadow-2xl border border-[#C5A059]/20 text-center relative overflow-hidden">
        
        <!-- Ikon Jam Emas Minimalis -->
        <div class="w-12 h-12 mx-auto rounded-full border border-[#C5A059]/40 flex items-center justify-center mb-3.5 bg-black/30">
            <svg class="w-5 h-5 text-[#C5A059]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="9" stroke-width="1.8" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 7v5l3 2" />
            </svg>
        </div>

        <!-- Subtitle & Judul Countdown -->
        <p class="font-judul text-[11px] md:text-xs tracking-[0.25em] text-[#C5A059] uppercase font-bold mb-1">
            Menuju Hari Bahagia
        </p>
        <h3 class="font-judul text-2xl md:text-[28px] font-normal text-white mb-6 tracking-wide">
            Counting The Days
        </h3>

        <!-- Alpine.js Countdown Timer (Dengan ID untuk Kompatibilitas JS) -->
        <div 
            x-data="{
                target: new Date('{{ config('wedding.akad.target_iso') }}').getTime(),
                days: 0, hours: 0, minutes: 0, seconds: 0,
                init() {
                    const update = () => {
                        const now = new Date().getTime();
                        const distance = this.target - now;
                        if (distance < 0) {
                            this.days = 0; this.hours = 0; this.minutes = 0; this.seconds = 0;
                            return;
                        }
                        this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        this.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        this.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        this.seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    };
                    update();
                    setInterval(update, 1000);
                }
            }"
            class="grid grid-cols-4 gap-2 sm:gap-2.5 mb-7"
        >
            <!-- Box Hari -->
            <div class="bg-[#0D0D0D]/80 rounded-2xl p-2.5 sm:p-3 border border-[#C5A059]/25 flex flex-col items-center justify-center shadow-inner">
                <div id="hari" class="font-judul text-2xl sm:text-3xl font-bold text-[#C5A059] leading-tight" x-text="days">
                    0
                </div>
                <div class="font-isi text-[9px] sm:text-[10px] text-[#A0A0A0] uppercase tracking-widest mt-1">
                    Hari
                </div>
            </div>

            <!-- Box Jam -->
            <div class="bg-[#0D0D0D]/80 rounded-2xl p-2.5 sm:p-3 border border-[#C5A059]/25 flex flex-col items-center justify-center shadow-inner">
                <div id="jam" class="font-judul text-2xl sm:text-3xl font-bold text-[#C5A059] leading-tight" x-text="hours">
                    0
                </div>
                <div class="font-isi text-[9px] sm:text-[10px] text-[#A0A0A0] uppercase tracking-widest mt-1">
                    Jam
                </div>
            </div>

            <!-- Box Menit -->
            <div class="bg-[#0D0D0D]/80 rounded-2xl p-2.5 sm:p-3 border border-[#C5A059]/25 flex flex-col items-center justify-center shadow-inner">
                <div id="menit" class="font-judul text-2xl sm:text-3xl font-bold text-[#C5A059] leading-tight" x-text="minutes">
                    0
                </div>
                <div class="font-isi text-[9px] sm:text-[10px] text-[#A0A0A0] uppercase tracking-widest mt-1">
                    Menit
                </div>
            </div>

            <!-- Box Detik -->
            <div class="bg-[#0D0D0D]/80 rounded-2xl p-2.5 sm:p-3 border border-[#C5A059]/25 flex flex-col items-center justify-center shadow-inner">
                <div id="detik" class="font-judul text-2xl sm:text-3xl font-bold text-[#C5A059] leading-tight" x-text="seconds">
                    0
                </div>
                <div class="font-isi text-[9px] sm:text-[10px] text-[#A0A0A0] uppercase tracking-widest mt-1">
                    Detik
                </div>
            </div>
        </div>

        <!-- Tombol Save the Date (Google Calendar) -->
        <a 
            href="{{ $gcalUrl }}" 
            target="_blank" 
            rel="noopener noreferrer"
            class="w-full inline-flex items-center justify-center gap-2 py-3.5 px-5 rounded-full bg-gradient-to-r from-[#C5A059] via-[#d6b570] to-[#C5A059] hover:brightness-110 active:scale-95 text-[#1A1A1A] font-isi font-bold text-xs tracking-wider uppercase shadow-md transition-all duration-300 transform hover:scale-[1.02] cursor-pointer"
        >
            <svg class="w-4 h-4 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Simpan di Google Calendar</span>
        </a>

    </div>
</section>