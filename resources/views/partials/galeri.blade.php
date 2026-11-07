<section id="galeri" class="reveal px-4 pt-4 pb-14 bg-[#F9F6EE] relative overflow-hidden">
    <!-- Header Galeri -->
    <div class="text-center mb-7">
        <p class="font-judul text-[12px] tracking-[0.25em] text-[#C5A059] uppercase font-bold mb-1">
            Kenangan Abadi
        </p>
        <h2 class="font-judul text-[30px] font-bold text-[#1A1A1A] leading-tight">
            Our Sacred Moment
        </h2>
    </div>

    @php
        $galeriFotos = config('wedding.media.galeri', [
            'images/galeri/foto-1.jpg',
            'images/galeri/foto-2.jpg',
            'images/galeri/foto-3.jpg',
            'images/galeri/foto-4.jpg',
            'images/galeri/foto-5.jpg',
            'images/galeri/foto-6.jpg',
            'images/galeri/foto-7.jpg',
            'images/galeri/foto-8.jpg',
            'images/galeri/foto-extra-pria.jpg',
            'images/galeri/foto-extra-wanita.jpg',
        ]);
        $fotoUrls = array_map(fn($f) => asset($f), $galeriFotos);

        // Tentukan rasio tiap foto agar grid rapi dan konsisten
        // Pola: besar-kecil, kecil-besar, besar-kecil, dst.
        // Index genap (0,2,4,...) = portrait tall, index ganjil (1,3,5,...) = portrait normal
        // Setiap 6 foto membentuk satu blok visual yang seimbang
        $aspectMap = [
            0 => 'aspect-[3/4]',   // kiri  - tall
            1 => 'aspect-square',  // kanan - square
            2 => 'aspect-square',  // kiri  - square
            3 => 'aspect-[3/4]',   // kanan - tall
            4 => 'aspect-[4/5]',   // kiri  - medium
            5 => 'aspect-[4/5]',   // kanan - medium
        ];
    @endphp

    <!-- Komponen Alpine.js untuk Grid & Lightbox -->
    <div 
        x-data="{
            isOpen: false,
            currentIndex: 0,
            images: {{ json_encode($fotoUrls) }},
            openLightbox(index) {
                this.currentIndex = index;
                this.isOpen = true;
                document.body.classList.add('overflow-hidden');
            },
            closeLightbox() {
                this.isOpen = false;
                document.body.classList.remove('overflow-hidden');
            },
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            },
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            }
        }"
        @keydown.escape.window="closeLightbox()"
        @keydown.arrow-right.window="if(isOpen) next()"
        @keydown.arrow-left.window="if(isOpen) prev()"
    >
        <!-- Grid Foto 2 Kolom Rapi & Seimbang -->
        <div class="grid grid-cols-2 gap-2.5 max-w-sm mx-auto">
            @foreach($galeriFotos as $index => $foto)
                @php
                    $aspectRatio = $aspectMap[$index % 6];
                @endphp

                <div 
                    @click="openLightbox({{ $index }})"
                    class="{{ $aspectRatio }} rounded-2xl overflow-hidden border border-[#C5A059]/60 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] cursor-pointer group relative bg-stone-200"
                >
                    <img 
                        src="{{ asset($foto) }}" 
                        alt="Momen Bahagia {{ $index + 1 }}" 
                        loading="lazy"
                        class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out"
                        onerror="this.onerror=null; this.src='{{ asset('images/cover.jpeg') }}';"
                    >
                    
                    <!-- Overlay Halus saat Hover -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors flex items-center justify-center">
                        <svg class="w-7 h-7 text-white opacity-0 group-hover:opacity-100 transition-opacity transform scale-75 group-hover:scale-100 duration-300 drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                        </svg>
                    </div>
                    
                    <!-- Nomor foto kecil di pojok -->
                    <div class="absolute bottom-2 right-2 bg-black/40 text-white text-[10px] font-isi px-1.5 py-0.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                        {{ $index + 1 }}/{{ count($galeriFotos) }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Lightbox Modal Interaktif -->
        <div 
            x-show="isOpen" 
            x-cloak
            x-transition.opacity.duration.300ms
            class="fixed inset-0 z-[100] bg-black/95 backdrop-blur-md flex items-center justify-center p-3 select-none"
            @click.self="closeLightbox()"
        >
            <!-- Tombol Tutup -->
            <button 
                type="button"
                @click="closeLightbox()" 
                class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer text-2xl"
                aria-label="Tutup Galeri"
            >
                &times;
            </button>

            <!-- Indikator Posisi Foto -->
            <div class="absolute top-5 left-5 text-white/70 font-isi text-xs tracking-wider">
                <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
            </div>

            <!-- Tombol Prev -->
            <button 
                type="button"
                @click.stop="prev()" 
                class="absolute left-2 sm:left-4 z-10 w-11 h-11 rounded-full bg-white/10 hover:bg-[#C5A059] text-white flex items-center justify-center transition-colors cursor-pointer"
                aria-label="Foto Sebelumnya"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Foto Utama Lightbox -->
            <div class="max-w-[420px] max-h-[85vh] rounded-2xl overflow-hidden border-2 border-[#C5A059]/80 shadow-2xl bg-black flex items-center justify-center">
                <img 
                    :src="images[currentIndex]" 
                    alt="Pratinjau Foto" 
                    class="max-w-full max-h-[85vh] object-contain transition-all duration-300"
                    @click.stop
                >
            </div>

            <!-- Tombol Next -->
            <button 
                type="button"
                @click.stop="next()" 
                class="absolute right-2 sm:right-4 z-10 w-11 h-11 rounded-full bg-white/10 hover:bg-[#C5A059] text-white flex items-center justify-center transition-colors cursor-pointer"
                aria-label="Foto Berikutnya"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>