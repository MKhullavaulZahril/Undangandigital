<section id="mempelai" class="reveal px-6 py-16 bg-[#F7F1E8]">
    <h2 class="font-cormorant text-3xl md:text-4xl text-center text-[#3B2F2A] mb-12">
        Mempelai
    </h2>

    <div class="space-y-12">
        <!-- Mempelai Pria -->
        <div class="text-center">
            <div class="w-40 h-40 mx-auto rounded-full overflow-hidden border-4 border-[#B8975A] shadow-lg mb-6">
                <img src="{{ asset(config('wedding.mempelai_pria.foto')) }}" alt="Mempelai Pria" class="w-full h-full object-cover">
            </div>
            <h3 class="font-great-vibes text-4xl md:text-5xl text-[#8A9A7B] mb-2">
                {{ config('wedding.mempelai_pria.nama_lengkap') }}
            </h3>
            <p class="font-poppins text-sm text-[#3B2F2A]/70 mb-1">
                {{ config('wedding.mempelai_pria.putra_ke') }}
            </p>
            <p class="font-cormorant text-base md:text-lg text-[#3B2F2A]">
                {{ config('wedding.mempelai_pria.ayah') }} &amp; {{ config('wedding.mempelai_pria.ibu') }}
            </p>
            <a href="{{ config('wedding.mempelai_pria.instagram') }}" target="_blank" class="inline-block mt-3 text-[#8A9A7B] hover:text-[#7a8a6b] transition-colors">
                <svg class="w-5 h-5 inline" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                Instagram
            </a>
        </div>

        <!-- Ornamen Pemisah -->
        <div class="flex items-center justify-center">
            <div class="w-12 h-px bg-[#B8975A]"></div>
            <span class="mx-4 font-great-vibes text-3xl text-[#B8975A]">&amp;</span>
            <div class="w-12 h-px bg-[#B8975A]"></div>
        </div>

        <!-- Mempelai Wanita -->
        <div class="text-center">
            <div class="w-40 h-40 mx-auto rounded-full overflow-hidden border-4 border-[#B8975A] shadow-lg mb-6">
                <img src="{{ asset(config('wedding.mempelai_wanita.foto')) }}" alt="Mempelai Wanita" class="w-full h-full object-cover">
            </div>
            <h3 class="font-great-vibes text-4xl md:text-5xl text-[#8A9A7B] mb-2">
                {{ config('wedding.mempelai_wanita.nama_lengkap') }}
            </h3>
            <p class="font-poppins text-sm text-[#3B2F2A]/70 mb-1">
                {{ config('wedding.mempelai_wanita.putri_ke') }}
            </p>
            <p class="font-cormorant text-base md:text-lg text-[#3B2F2A]">
                {{ config('wedding.mempelai_wanita.ayah') }} &amp; {{ config('wedding.mempelai_wanita.ibu') }}
            </p>
            <a href="{{ config('wedding.mempelai_wanita.instagram') }}" target="_blank" class="inline-block mt-3 text-[#8A9A7B] hover:text-[#7a8a6b] transition-colors">
                <svg class="w-5 h-5 inline" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                Instagram
            </a>
        </div>
    </div>
</section>