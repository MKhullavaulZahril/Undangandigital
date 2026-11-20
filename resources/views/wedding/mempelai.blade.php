<section id="mempelai" class="reveal px-4 pt-4 pb-12 text-center bg-[#F9F6EE] relative">
    <!-- Kaligrafi Basmalah & Salam Pembuka -->
    <div class="mb-8">
        <p class="font-arab text-2xl md:text-3xl text-[#1A1A1A] leading-relaxed mb-3">
            بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
        </p>
        
        <h2 class="font-judul text-xl md:text-2xl font-bold text-[#1A1A1A] leading-snug">
            Assalamu'alaikum Warahmatullahi Wabarakatuh
        </h2>
        
        <p class="font-isi italic text-xs md:text-[13px] text-[#4A4A4A] max-w-xs mx-auto leading-relaxed mt-3">
            Maha Suci Allah SWT yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho-Nya, kami bermaksud menyelenggarakan pernikahan putra-putri kami:
        </p>
    </div>

    <!-- KARTU MEMPELAI PRIA -->
    <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto text-center">
        <!-- Bingkai Lengkung Kubah (Arch) Foto Mempelai Pria -->
        <div class="w-36 h-48 mx-auto rounded-t-full rounded-b-2xl overflow-hidden border-2 border-[#C5A059] shadow-md mb-5 bg-stone-100 group">
            <img 
                src="{{ asset(config('wedding.mempelai_pria.foto', 'images/mempelai-pria.jpg')) }}" 
                alt="{{ config('wedding.mempelai_pria.nama_lengkap') }}" 
                class="w-full h-full object-cover object-top animate-subtle-float transition-transform duration-700 ease-out group-hover:scale-105"
                onerror="this.onerror=null; this.src='{{ asset('images/mempelai pria.jpeg') }}';"
            >
        </div>

        <!-- Nama Mempelai Pria -->
        <h3 class="font-judul text-2xl md:text-[26px] font-bold text-[#1A1A1A] mb-2 leading-tight">
            {{ config('wedding.mempelai_pria.nama_lengkap') }}
        </h3>

        <!-- Status & Nama Orang Tua -->
        <p class="font-isi text-xs font-semibold text-[#C5A059] mb-1">
            {{ config('wedding.mempelai_pria.putra_ke', 'Putra Pertama dari Pasangan:') }}
        </p>
        <p class="font-isi text-sm font-medium text-[#1A1A1A] mb-1">
            {{ config('wedding.mempelai_pria.ayah') }} &amp; {{ config('wedding.mempelai_pria.ibu') }}
        </p>

        @if(config('wedding.mempelai_pria.domisili') || config('wedding.mempelai_pria.alamat'))
            <p class="font-isi italic text-xs text-[#706E6B] mt-0.5">
                {{ config('wedding.mempelai_pria.domisili') ?? config('wedding.mempelai_pria.alamat') }}
            </p>
        @endif

        @if(!empty(config('wedding.mempelai_pria.instagram')) && config('wedding.mempelai_pria.instagram') !== 'https://instagram.com/')
            <a 
                href="{{ config('wedding.mempelai_pria.instagram') }}" 
                target="_blank" 
                rel="noopener noreferrer"
                class="inline-flex items-center gap-1.5 mt-3 px-3 py-1 rounded-full text-xs font-medium text-[#C5A059] hover:text-[#9e7d38] transition-colors"
            >
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                <span>Instagram</span>
            </a>
        @endif
    </div>

    <!-- Ornamen Simbol Pemisah (&) -->
    <div class="flex items-center justify-center my-6">
        <span class="font-judul italic text-4xl text-[#C5A059] leading-none select-none">
            &amp;
        </span>
    </div>

    <!-- KARTU MEMPELAI WANITA -->
    <div class="bg-white rounded-3xl p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto text-center">
        <!-- Bingkai Lengkung Kubah (Arch) Foto Mempelai Wanita -->
        <div class="w-36 h-48 mx-auto rounded-t-full rounded-b-2xl overflow-hidden border-2 border-[#C5A059] shadow-md mb-5 bg-stone-100 group">
            <img 
                src="{{ asset(config('wedding.mempelai_wanita.foto', 'images/mempelai-wanita.jpg')) }}" 
                alt="{{ config('wedding.mempelai_wanita.nama_lengkap') }}" 
                class="w-full h-full object-cover object-top animate-subtle-float transition-transform duration-700 ease-out group-hover:scale-105"
                onerror="this.onerror=null; this.src='{{ asset('images/mempelai wanita.jpeg') }}';"
            >
        </div>

        <!-- Nama Mempelai Wanita -->
        <h3 class="font-judul text-2xl md:text-[26px] font-bold text-[#1A1A1A] mb-2 leading-tight">
            {{ config('wedding.mempelai_wanita.nama_lengkap') }}
        </h3>

        <!-- Status & Nama Orang Tua -->
        <p class="font-isi text-xs font-semibold text-[#C5A059] mb-1">
            {{ config('wedding.mempelai_wanita.putri_ke', 'Putri Pertama dari Pasangan:') }}
        </p>
        <p class="font-isi text-sm font-medium text-[#1A1A1A] mb-1">
            {{ config('wedding.mempelai_wanita.ayah') }} &amp; {{ config('wedding.mempelai_wanita.ibu') }}
        </p>

        @if(config('wedding.mempelai_wanita.domisili') || config('wedding.mempelai_wanita.alamat'))
            <p class="font-isi italic text-xs text-[#706E6B] mt-0.5">
                {{ config('wedding.mempelai_wanita.domisili') ?? config('wedding.mempelai_wanita.alamat') }}
            </p>
        @endif

        @if(!empty(config('wedding.mempelai_wanita.instagram')) && config('wedding.mempelai_wanita.instagram') !== 'https://instagram.com/')
            <a 
                href="{{ config('wedding.mempelai_wanita.instagram') }}" 
                target="_blank" 
                rel="noopener noreferrer"
                class="inline-flex items-center gap-1.5 mt-3 px-3 py-1 rounded-full text-xs font-medium text-[#C5A059] hover:text-[#9e7d38] transition-colors"
            >
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                <span>Instagram</span>
            </a>
        @endif
    </div>
</section>