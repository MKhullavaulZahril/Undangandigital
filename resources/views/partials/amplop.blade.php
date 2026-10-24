<section id="amplop" class="reveal px-6 py-16 bg-[#F7F1E8]">
    <h2 class="font-cormorant text-3xl md:text-4xl text-center text-[#3B2F2A] mb-2">
        Amplop Digital
    </h2>
    <p class="font-poppins text-sm text-[#3B2F2A]/70 text-center mb-8">
        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat memberikan hadiah melalui rekening berikut.
    </p>

    <div class="space-y-4">
        @foreach(config('wedding.rekening') as $rek)
            <div 
                x-data="{ 
                    copied: false, 
                    nomor: '{{ $rek['nomor'] }}',
                    copy() { 
                        navigator.clipboard.writeText(this.nomor).then(() => {
                            this.copied = true;
                            setTimeout(() => this.copied = false, 2000);
                        });
                    }
                }"
                class="bg-white rounded-xl shadow-md p-6 text-center border border-[#B8975A]/20"
            >
                <p class="font-poppins text-sm font-semibold text-[#8A9A7B] mb-1">{{ $rek['bank'] }}</p>
                <p class="font-cormorant text-2xl md:text-3xl font-bold text-[#3B2F2A] tracking-wider mb-1">{{ $rek['nomor'] }}</p>
                <p class="font-poppins text-xs text-[#3B2F2A]/60 mb-4">a.n. {{ $rek['atas_nama'] }}</p>
                
                <button 
                    @click="copy()"
                    class="inline-flex items-center px-5 py-2 bg-[#8A9A7B] hover:bg-[#7a8a6b] text-white text-sm font-medium rounded-full transition-colors"
                >
                    <svg x-show="!copied" class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" /></svg>
                    <span x-show="!copied">Salin No. Rekening</span>
                    <span x-show="copied" x-cloak>Tersalin!</span>
                </button>
            </div>
        @endforeach
    </div>
</section>
