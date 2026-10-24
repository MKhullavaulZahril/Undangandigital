<section 
    id="cover"
    x-show="!isOpen"
    class="relative min-h-screen flex flex-col items-center justify-center text-center text-white overflow-hidden"
>
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset(config('wedding.media.cover')) }}');"></div>
    <!-- Overlay Gelap -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Konten Cover -->
    <div class="relative z-10 px-6 py-12">
        <p class="font-cormorant text-lg md:text-xl tracking-widest uppercase mb-4 text-[#F7F1E8]">The Wedding of</p>
        
        <h1 class="font-great-vibes text-5xl md:text-6xl text-[#B8975A] mb-6 leading-tight">
            {{ config('wedding.mempelai_pria.panggilan') }} &amp; {{ config('wedding.mempelai_wanita.panggilan') }}
        </h1>

        <p class="font-cormorant text-base md:text-lg mb-2 text-[#F7F1E8]">
            {{ \Carbon\Carbon::parse(config('wedding.akad.target_iso'))->translatedFormat('l, d F Y') }}
        </p>

        <div class="mt-10 pt-6 border-t border-white/30">
            <p class="text-sm md:text-base mb-1 text-[#F7F1E8]/80">Kepada Yth.</p>
            <p class="font-cormorant text-xl md:text-2xl font-semibold text-white">
                Bapak/Ibu/Saudara/i <br>
                <span class="text-[#B8975A]">{{ $tamu }}</span>
            </p>
        </div>

        <!-- Tombol Buka Undangan -->
        <button 
            @click="bukaUndangan()"
            class="mt-10 px-8 py-3 bg-[#B8975A] hover:bg-[#a8874a] text-white font-poppins font-medium rounded-full shadow-lg transition-all duration-300 transform hover:scale-105"
        >
            Buka Undangan
        </button>
    </div>
</section>