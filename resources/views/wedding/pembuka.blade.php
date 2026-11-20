<section id="pembuka" class="reveal px-4 pt-14 pb-10 text-center bg-[#F9F6EE] relative overflow-hidden">
    <!-- Ornamen Gunungan & Kicker Title -->
    <div class="flex flex-col items-center mb-4">
        <img src="{{ asset('images/ornamen/gunungan.svg') }}" alt="Gunungan" class="w-8 h-11 object-contain mb-2">
        <h3 class="font-judul text-[13px] tracking-[0.3em] text-[#C5A059] uppercase font-bold">
            Pawiwahan Ageng
        </h3>
    </div>

    <!-- Monogram Lingkaran Inisial Pasangan -->
    <div class="w-16 h-16 mx-auto rounded-full border border-[#C5A059]/40 p-1 flex items-center justify-center mb-6 shadow-sm bg-white/40">
        <div class="w-full h-full rounded-full border border-[#C5A059] flex items-center justify-center">
            <span class="font-judul text-2xl font-bold text-[#C5A059] tracking-wider">
                {{ config('wedding.monogram', 'AD') }}
            </span>
        </div>
    </div>

    <!-- Bingkai Foto Utama Pasangan -->
    <div class="max-w-[320px] mx-auto rounded-2xl overflow-hidden border-2 border-[#C5A059] shadow-md bg-stone-100 group">
        <div class="overflow-hidden aspect-[3/4]">
            <img 
                src="{{ asset(config('wedding.media.cover', 'images/cover.jpeg')) }}" 
                alt="{{ config('wedding.mempelai_pria.panggilan') }} & {{ config('wedding.mempelai_wanita.panggilan') }}" 
                class="w-full h-full object-cover object-top animate-subtle-float transition-transform duration-700 ease-out group-hover:scale-105"
                onerror="this.onerror=null; this.src='{{ asset('images/cover.jpeg') }}';"
            >
        </div>
    </div>

    <!-- Nama Kedua Mempelai & Tanggal Weton -->
    <div class="mt-6 mb-8">
        <h2 class="font-judul text-[36px] font-bold text-[#1A1A1A] leading-tight tracking-wide">
            {{ config('wedding.mempelai_pria.panggilan') }} 
            <span class="font-judul italic text-[#C5A059] font-normal">&amp;</span> 
            {{ config('wedding.mempelai_wanita.panggilan') }}
        </h2>
        <p class="font-isi text-[11px] md:text-xs text-[#4A4A4A] tracking-[0.2em] uppercase font-medium mt-1">
            {{ config('wedding.akad.weton') ?? strtoupper(\Carbon\Carbon::parse(config('wedding.akad.target_iso'))->translatedFormat('l, d F Y')) }}
        </p>
    </div>

    <!-- Kartu Ayat Suci Al-Qur'an -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto text-center">
        <!-- Teks Arab -->
        <p class="font-arab text-xl md:text-2xl text-[#1A1A1A] leading-[2.2] mb-5 text-center" dir="rtl">
            {{ config('wedding.doa.pembuka_arab') }}
        </p>
        
        <!-- Arti Terjemahan -->
        <p class="font-isi italic text-xs md:text-sm text-[#4A4A4A] leading-relaxed mb-5 px-1">
            "{{ config('wedding.doa.pembuka_arti') }}"
        </p>
        
        <!-- Referensi Surat -->
        <p class="font-isi text-xs font-bold text-[#C5A059] tracking-wider uppercase">
            {{ config('wedding.doa.pembuka_surat') }}
        </p>
    </div>

    <!-- Ornamen Pembatas Bawah -->
    <div class="flex justify-center mt-8">
        <img src="{{ asset('images/ornamen/divider.svg') }}" alt="Pembatas" class="w-36 h-5 object-contain">
    </div>
</section>