<section 
    id="cover"
    x-show="!isOpen"
    x-transition:leave="transition-all ease-in-out duration-500 transform"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="-translate-y-full opacity-0"
    class="relative min-h-screen w-full flex flex-col justify-between text-white overflow-hidden select-none"
    style="background-color: #1A1A1A;"
>
    <!-- Background Image dengan Vignette Halus -->
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ asset(config('wedding.media.cover', 'images/cover.jpeg')) }}" 
            alt="The Wedding of {{ config('wedding.mempelai_pria.panggilan') }} & {{ config('wedding.mempelai_wanita.panggilan') }}" 
            class="w-full h-full object-cover object-center"
            onerror="this.onerror=null; this.src='{{ asset('images/cover.jpeg') }}';"
        >
        <!-- Overlay Gradasi Gelap Elegan -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/25 to-black/85"></div>
    </div>

    <!-- Sudut Ornamen Emas (Atas) -->
    <div class="absolute top-3 left-3 z-10 w-9 h-9 pointer-events-none">
        <img src="{{ asset('images/ornamen/corner.svg') }}" alt="Ornamen" class="w-full h-full">
    </div>
    <div class="absolute top-3 right-3 z-10 w-9 h-9 pointer-events-none">
        <img src="{{ asset('images/ornamen/corner.svg') }}" alt="Ornamen" class="w-full h-full -scale-x-100">
    </div>

    <!-- Konten Atas: Gunungan, Judul, Nama Mempelai -->
    <div class="relative z-10 px-6 pt-16 text-center">
        <!-- Ikon Gunungan Tradisional Jawa -->
        <div class="flex justify-center mb-3">
            <img src="{{ asset('images/ornamen/gunungan.svg') }}" alt="Gunungan" class="w-9 h-12 object-contain drop-shadow">
        </div>

        <p class="font-judul text-[#C5A059] text-sm md:text-base tracking-[0.25em] uppercase font-semibold mb-2">
            Undangan Pernikahan
        </p>

        <h1 class="font-judul text-[36px] leading-tight font-bold text-white tracking-wide drop-shadow-md">
            {{ config('wedding.mempelai_pria.panggilan') }} 
            <span class="font-script text-[#C5A059] text-3xl font-normal lowercase mx-1">&amp;</span> 
            {{ config('wedding.mempelai_wanita.panggilan') }}
        </h1>
    </div>

    <!-- Konten Tengah & Bawah: Kartu Tamu & Tombol Buka Undangan -->
    <div class="relative z-10 px-6 pb-6 text-center">
        <!-- Kartu Nama Tamu Undangan -->
        <div class="bg-black/35 backdrop-blur-md rounded-2xl p-5 border border-white/10 shadow-xl max-w-xs mx-auto mb-6">
            <p class="font-judul text-[11px] tracking-[0.25em] text-[#C5A059] uppercase font-semibold mb-1">
                BPK/IBU/SAUDARA/I
            </p>
            <h2 class="font-isi text-lg md:text-xl font-medium text-white tracking-wide mb-1">
                {{ $tamu }}
            </h2>
            <p class="font-isi text-xs italic text-[#F9F6EE]/80">
                di Tempat
            </p>
        </div>

        <!-- Tombol Buka Undangan -->
        <button 
            type="button"
            @click="bukaUndangan()"
            class="inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full bg-gradient-to-r from-[#C5A059] via-[#d6b570] to-[#C5A059] hover:brightness-110 active:scale-95 text-[#1A1A1A] font-judul font-bold text-sm tracking-[0.2em] uppercase shadow-lg shadow-black/40 transition-all duration-300 transform hover:scale-105 cursor-pointer"
        >
            <svg class="w-4 h-4 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span>Buka Undangan</span>
        </button>
    </div>

    <!-- Footer Bar Tanggal Acara -->
    <div class="relative z-10 w-full bg-[#1A1A1A] py-3 px-6 text-center border-t border-[#C5A059]/30">
        <!-- Sudut Ornamen Emas (Bawah) -->
        <div class="absolute bottom-1.5 left-2 w-6 h-6 pointer-events-none">
            <img src="{{ asset('images/ornamen/corner.svg') }}" alt="Ornamen" class="w-full h-full -scale-y-100">
        </div>
        <div class="absolute bottom-1.5 right-2 w-6 h-6 pointer-events-none">
            <img src="{{ asset('images/ornamen/corner.svg') }}" alt="Ornamen" class="w-full h-full -scale-x-100 -scale-y-100">
        </div>

        <p class="font-judul text-[#C5A059] text-[11px] md:text-xs tracking-[0.25em] uppercase font-semibold">
            &mdash; {{ strtoupper(\Carbon\Carbon::parse(config('wedding.akad.target_iso'))->translatedFormat('l, d F Y')) }} &mdash;
        </p>
    </div>
</section>