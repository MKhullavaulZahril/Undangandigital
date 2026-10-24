<section id="galeri" class="reveal px-6 py-16 bg-white">
    <h2 class="font-cormorant text-3xl md:text-4xl text-center text-[#3B2F2A] mb-2">
        Galeri
    </h2>
    <p class="font-poppins text-sm text-[#3B2F2A]/70 text-center mb-8">
        Momen kebersamaan kami
    </p>

    <!-- Alpine.js Lightbox -->
    <div x-data="{ 
        open: false, 
        currentImage: '', 
        images: {{ json_encode(array_map(fn($img) => asset($img), config('wedding.media.galeri'))) }},
        show(img) { 
            this.currentImage = img; 
            this.open = true; 
        } 
    }">
        
        <!-- Grid 2 Kolom -->
        <div class="grid grid-cols-2 gap-3">
            @foreach(config('wedding.media.galeri') as $foto)
                <div 
                    @click="show('{{ asset($foto) }}')"
                    class="aspect-square rounded-lg overflow-hidden cursor-pointer group relative shadow-md hover:shadow-xl transition-shadow"
                >
                    <img src="{{ asset($foto) }}" alt="Galeri" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors"></div>
                </div>
            @endforeach
        </div>

        <!-- Lightbox Overlay -->
        <div 
            x-show="open" 
            x-transition.opacity
            @click="open = false"
            @keydown.escape.window="open = false"
            class="fixed inset-0 z-[100] bg-black/90 flex items-center justify-center p-4"
            style="display: none;"
        >
            <button @click="open = false" class="absolute top-4 right-4 text-white text-3xl hover:text-[#B8975A] transition-colors">&times;</button>
            <img :src="currentImage" class="max-w-full max-h-full rounded-lg shadow-2xl" @click.stop>
        </div>
    </div>
</section>