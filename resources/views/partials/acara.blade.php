<section id="acara" class="reveal px-6 py-16 bg-[#F7F1E8]">
    <h2 class="font-cormorant text-3xl md:text-4xl text-center text-[#3B2F2A] mb-12">
        Acara
    </h2>

    <div class="space-y-8">
        <!-- Kartu Akad -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center border border-[#B8975A]/20">
            <h3 class="font-cormorant text-2xl font-semibold text-[#8A9A7B] mb-4">Akad Nikah</h3>
            <div class="space-y-2 font-poppins text-sm text-[#3B2F2A]/80">
                <p>
                    <svg class="w-4 h-4 inline text-[#B8975A] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    {{ config('wedding.akad.tanggal') }}
                </p>
                <p>
                    <svg class="w-4 h-4 inline text-[#B8975A] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{ config('wedding.akad.jam_mulai') }} - {{ config('wedding.akad.jam_selesai') }}
                </p>
                <p>
                    <svg class="w-4 h-4 inline text-[#B8975A] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    {{ config('wedding.akad.tempat') }}
                </p>
                <p class="text-xs text-[#3B2F2A]/60 mt-1">{{ config('wedding.akad.alamat') }}</p>
            </div>
            <a href="{{ config('wedding.lokasi.gmaps_url') }}" target="_blank" class="inline-flex items-center mt-4 px-4 py-2 bg-[#B8975A] hover:bg-[#a8874a] text-white text-sm font-medium rounded-full transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                Lihat Lokasi
            </a>
        </div>

        <!-- Kartu Resepsi -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center border border-[#B8975A]/20">
            <h3 class="font-cormorant text-2xl font-semibold text-[#8A9A7B] mb-4">Resepsi</h3>
            <div class="space-y-2 font-poppins text-sm text-[#3B2F2A]/80">
                <p>
                    <svg class="w-4 h-4 inline text-[#B8975A] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    {{ config('wedding.resepsi.tanggal') }}
                </p>
                <p>
                    <svg class="w-4 h-4 inline text-[#B8975A] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{ config('wedding.resepsi.jam') }}
                </p>
                <p>
                    <svg class="w-4 h-4 inline text-[#B8975A] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    {{ config('wedding.resepsi.tempat') }}
                </p>
                <p class="text-xs text-[#3B2F2A]/60 mt-1">{{ config('wedding.resepsi.alamat') }}</p>
            </div>
            <a href="{{ config('wedding.lokasi.gmaps_url') }}" target="_blank" class="inline-flex items-center mt-4 px-4 py-2 bg-[#B8975A] hover:bg-[#a8874a] text-white text-sm font-medium rounded-full transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                Lihat Lokasi
            </a>
        </div>
    </div>

    <!-- Embed Google Maps -->
    <div class="mt-10 rounded-xl overflow-hidden shadow-md border border-[#B8975A]/20">
        <iframe 
            src="{{ config('wedding.lokasi.embed_url') }}" 
            width="100%" 
            height="300" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            title="Lokasi Acara"
        ></iframe>
    </div>
</section>