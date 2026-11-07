<section id="amplop" class="reveal px-4 py-8 bg-[#F9F6EE] relative">
    <!-- Kartu Gelap Elegan Wedding Gift -->
    <div class="bg-gradient-to-b from-[#222222] to-[#121212] rounded-3xl p-6 sm:p-8 max-w-sm mx-auto shadow-2xl border border-[#C5A059]/20 text-center relative overflow-hidden">
        
        <!-- Ikon Kotak Kado Emas Minimalis -->
        <div class="w-12 h-12 mx-auto rounded-full border border-[#C5A059]/40 flex items-center justify-center mb-3.5 bg-black/30">
            <svg class="w-5 h-5 text-[#C5A059]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v13m0-13V4a2 2 0 112 2h-2zm0 0V4a2 2 0 10-2 2h2m-7 4h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2a1 1 0 011-1zm2 4h10v6a1 1 0 01-1 1H8a1 1 0 01-1-1v-6z" />
            </svg>
        </div>

        <!-- Subtitle & Judul -->
        <p class="font-judul text-[11px] md:text-xs tracking-[0.25em] text-[#C5A059] uppercase font-bold mb-1">
            Tanda Kasih
        </p>
        <h3 class="font-judul text-2xl md:text-[28px] font-normal text-white mb-3 tracking-wide">
            Wedding Gift
        </h3>
        
        <!-- Pesan Pengantar -->
        <p class="font-isi italic text-xs text-[#F9F6EE]/80 leading-relaxed mb-6 px-1">
            Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Jika Anda bermaksud memberikan tanda kasih berupa bingkisan digital, dapat melalui rekening berikut:
        </p>

        <!-- Daftar Kartu Rekening dari Config -->
        <div class="space-y-4 mb-6">
            @foreach(config('wedding.rekening', []) as $rek)
                <div 
                    x-data="{ 
                        copied: false, 
                        nomor: '{{ $rek['nomor'] }}',
                        copy() { 
                            if (navigator.clipboard && window.isSecureContext) {
                                navigator.clipboard.writeText(this.nomor).then(() => {
                                    this.copied = true;
                                    setTimeout(() => this.copied = false, 2500);
                                }).catch(() => this.fallbackCopy());
                            } else {
                                this.fallbackCopy();
                            }
                        },
                        fallbackCopy() {
                            const textArea = document.createElement('textarea');
                            textArea.value = this.nomor;
                            textArea.style.position = 'fixed';
                            textArea.style.left = '-999999px';
                            document.body.appendChild(textArea);
                            textArea.focus();
                            textArea.select();
                            try {
                                document.execCommand('copy');
                                this.copied = true;
                                setTimeout(() => this.copied = false, 2500);
                            } catch (err) {
                                console.error('Gagal menyalin:', err);
                            }
                            document.body.removeChild(textArea);
                        }
                    }"
                    class="bg-[#0D0D0D]/85 rounded-2xl p-5 border border-[#C5A059]/25 text-left relative shadow-inner"
                >
                    <!-- Header Kartu: Nama Bank & Jenis -->
                    <div class="flex items-baseline justify-between mb-2">
                        <span class="font-judul text-xl font-bold text-[#C5A059] tracking-wide">
                            {{ $rek['bank'] }}
                        </span>
                        <span class="font-isi text-[10px] text-stone-400 uppercase tracking-widest font-medium">
                            Debit / Transfer
                        </span>
                    </div>

                    <!-- Label & Nomor Rekening -->
                    <p class="font-isi text-[10px] text-stone-400 uppercase tracking-wider mb-0.5">
                        Nomor Rekening
                    </p>
                    <p class="font-isi text-2xl font-bold text-white tracking-widest select-all mb-1">
                        {{ $rek['nomor'] }}
                    </p>
                    <p class="font-isi text-xs text-[#C5A059]/90 mb-4 font-medium">
                        a.n. {{ $rek['atas_nama'] }}
                    </p>

                    <!-- Tombol Salin Nomor Rekening -->
                    <button 
                        type="button"
                        @click="copy()"
                        class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#C5A059] via-[#d6b570] to-[#C5A059] hover:brightness-110 active:scale-95 text-[#1A1A1A] font-isi font-bold text-xs uppercase tracking-wider shadow flex items-center justify-center gap-2 cursor-pointer transition-all"
                    >
                        <template x-if="!copied">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-[#1A1A1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                <span>Salin Nomor Rekening</span>
                            </span>
                        </template>
                        <template x-if="copied">
                            <span class="flex items-center gap-1.5 text-stone-900 font-bold" x-cloak>
                                <svg class="w-4 h-4 text-emerald-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Tersalin ke Clipboard!</span>
                            </span>
                        </template>
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Alamat Pengiriman Kado Fisik -->
        <div class="bg-[#0D0D0D]/60 rounded-2xl p-4 border border-[#C5A059]/20 text-left">
            <p class="font-judul text-[11px] font-bold text-[#C5A059] uppercase tracking-wider mb-1">
                Alamat Pengiriman Kado Fisik:
            </p>
            <p class="font-isi text-xs text-[#F9F6EE]/80 leading-relaxed">
                {{ config('wedding.kado_fisik.alamat', 'Kediaman Bpk. Subagyo (Ainun), Dsn. Nglawak Ds. Nglawak, Kec. Kertosono, Kab. Nganjuk 64484') }}
            </p>
        </div>

    </div>
</section>
