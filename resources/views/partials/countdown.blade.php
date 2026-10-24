<section id="countdown" class="reveal px-6 py-16 text-center bg-white">
    <h2 class="font-cormorant text-3xl md:text-4xl text-[#3B2F2A] mb-2">
        Countdown
    </h2>
    <p class="font-poppins text-sm text-[#3B2F2A]/70 mb-8">
        Menuju hari bahagia
    </p>

    <!-- Alpine.js Countdown Timer -->
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
        class="grid grid-cols-4 gap-3 max-w-xs mx-auto mb-10"
    >
        <div class="bg-[#F7F1E8] rounded-lg p-3 shadow">
            <div class="font-cormorant text-3xl md:text-4xl font-bold text-[#8A9A7B]" x-text="days">0</div>
            <div class="font-poppins text-xs text-[#3B2F2A]/60 uppercase tracking-wider">Hari</div>
        </div>
        <div class="bg-[#F7F1E8] rounded-lg p-3 shadow">
            <div class="font-cormorant text-3xl md:text-4xl font-bold text-[#8A9A7B]" x-text="hours">0</div>
            <div class="font-poppins text-xs text-[#3B2F2A]/60 uppercase tracking-wider">Jam</div>
        </div>
        <div class="bg-[#F7F1E8] rounded-lg p-3 shadow">
            <div class="font-cormorant text-3xl md:text-4xl font-bold text-[#8A9A7B]" x-text="minutes">0</div>
            <div class="font-poppins text-xs text-[#3B2F2A]/60 uppercase tracking-wider">Menit</div>
        </div>
        <div class="bg-[#F7F1E8] rounded-lg p-3 shadow">
            <div class="font-cormorant text-3xl md:text-4xl font-bold text-[#8A9A7B]" x-text="seconds">0</div>
            <div class="font-poppins text-xs text-[#3B2F2A]/60 uppercase tracking-wider">Detik</div>
        </div>
    </div>

    <!-- Tombol Save the Date (Google Calendar) -->
    <a 
        href="{{ $gcalUrl }}" 
        target="_blank"
        class="inline-flex items-center px-6 py-3 bg-[#8A9A7B] hover:bg-[#7a8a6b] text-white font-poppins font-medium rounded-full shadow transition-all duration-300 transform hover:scale-105"
    >
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
        Save the Date
    </a>
</section>