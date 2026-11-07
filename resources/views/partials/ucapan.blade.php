<section id="ucapan" class="reveal px-4 py-8 bg-[#F9F6EE] relative">
    <!-- Kartu Putih Form Ucapan & Doa Restu Sahabat -->
    <div 
        x-data="{
            nama: '{{ $tamu !== 'Bapak/Ibu/Saudara/i' ? $tamu : '' }}',
            ucapan: '',
            website: '',
            loading: false,
            success: '',
            error: '',
            daftarUcapan: [],

            async loadUcapan() {
                try {
                    const res = await fetch('{{ route('ucapan.index') }}', {
                        headers: {
                            'Accept': 'application/json'
                        }
                    });
                    if (res.ok) {
                        this.daftarUcapan = await res.json();
                    }
                } catch (e) {
                    console.error('Gagal mengambil daftar ucapan:', e);
                }
            },

            async kirimUcapan() {
                this.loading = true;
                this.error = '';
                this.success = '';

                try {
                    const token = document.querySelector('meta[name=csrf-token]')?.content;
                    const res = await fetch('{{ route('ucapan.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            nama: this.nama,
                            ucapan: this.ucapan,
                            website: this.website
                        })
                    });

                    if (res.status === 429) {
                        this.error = 'Terlalu banyak percobaan, coba lagi sebentar lagi.';
                        return;
                    }

                    const data = await res.json();

                    if (res.ok && data.success) {
                        this.success = data.message || 'Terima kasih atas doa dan ucapannya.';
                        this.ucapan = '';
                        
                        // Jika server mengembalikan data item baru, tambahkan langsung ke paling atas
                        if (data.data) {
                            this.daftarUcapan.unshift(data.data);
                        } else {
                            // Fallback refresh list dari server
                            this.loadUcapan();
                        }

                        // Hilangkan pesan sukses setelah 4 detik
                        setTimeout(() => {
                            this.success = '';
                        }, 4000);
                    } else if (res.status === 422) {
                        const firstError = data.errors ? Object.values(data.errors).flat()[0] : (data.message || 'Validasi gagal.');
                        this.error = firstError;
                    } else {
                        this.error = data.message || 'Terjadi kesalahan pada server. Silakan coba lagi.';
                    }
                } catch (e) {
                    this.error = 'Koneksi bermasalah. Pastikan internet Anda aktif dan coba lagi.';
                } finally {
                    this.loading = false;
                }
            },

            init() {
                this.loadUcapan();
            }
        }"
        class="bg-white rounded-3xl p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto text-left"
    >
        <!-- Header Section -->
        <div class="text-center mb-6">
            <p class="font-judul text-[11px] md:text-xs tracking-[0.25em] text-[#C5A059] uppercase font-bold mb-1">
                Konfirmasi &amp; Doa
            </p>
            <h2 class="font-judul text-2xl md:text-[28px] font-bold text-[#1A1A1A] leading-tight">
                Buku Ucapan &amp; Doa
            </h2>
        </div>

        <!-- Form Kirim Ucapan -->
        <form @submit.prevent="kirimUcapan()" class="space-y-4 mb-8">
            
            <!-- Input Nama -->
            <div>
                <label class="block font-isi text-xs font-semibold text-[#1A1A1A] mb-1.5">
                    Nama Lengkap
                </label>
                <input 
                    type="text" 
                    name="nama"
                    x-model="nama" 
                    required 
                    maxlength="100"
                    placeholder="Contoh: Mbak Dinda & Partner"
                    class="w-full px-4 py-3 rounded-2xl border border-stone-200 bg-[#FAF8F5] text-sm text-[#1A1A1A] placeholder-stone-400 focus:outline-none focus:border-[#C5A059] focus:ring-1 focus:ring-[#C5A059] transition-all font-isi"
                >
            </div>

            <!-- Input Doa & Ucapan -->
            <div>
                <label class="block font-isi text-xs font-semibold text-[#1A1A1A] mb-1.5">
                    Doa &amp; Ucapan Restu
                </label>
                <textarea 
                    name="ucapan"
                    x-model="ucapan" 
                    required 
                    maxlength="500"
                    rows="3"
                    placeholder="Tuliskan doa serta ucapan selamat untuk kedua mempelai..."
                    class="w-full px-4 py-3 rounded-2xl border border-stone-200 bg-[#FAF8F5] text-sm text-[#1A1A1A] placeholder-stone-400 focus:outline-none focus:border-[#C5A059] focus:ring-1 focus:ring-[#C5A059] transition-all font-isi resize-none leading-relaxed"
                ></textarea>
            </div>

            <!-- Field Honeypot (Disembunyikan dengan CSS, Bukan type="hidden") -->
            <div style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;" aria-hidden="true">
                <label for="ucapan_website">Jangan isi bagian ini</label>
                <input type="text" id="ucapan_website" name="website" x-model="website" tabindex="-1" autocomplete="off">
            </div>

            <!-- Pesan Status Error / Validasi -->
            <div x-show="error" x-cloak class="p-3 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-isi leading-relaxed">
                <span x-text="error"></span>
            </div>

            <!-- Pesan Sukses Berhasil Mengirim -->
            <div x-show="success" x-cloak class="p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-isi leading-relaxed flex items-center gap-2">
                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
                <span x-text="success"></span>
            </div>

            <!-- Tombol Kirim Ucapan -->
            <button 
                type="submit"
                :disabled="loading"
                class="w-full py-3.5 px-6 rounded-2xl bg-[#9E783B] hover:bg-[#8A672E] active:scale-95 disabled:opacity-60 text-white font-isi font-bold text-xs uppercase tracking-wider shadow-md transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer"
            >
                <template x-if="!loading">
                    <span>Kirim Doa &amp; Ucapan</span>
                </template>
                <template x-if="loading">
                    <span class="flex items-center gap-2" x-cloak>
                        <svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Mengirim...</span>
                    </span>
                </template>
            </button>
        </form>

        <!-- Daftar Doa Restu Sahabat -->
        <div class="pt-2">
            <h3 class="font-judul text-xl font-bold text-[#1A1A1A] mb-3">
                Doa Restu Sahabat (<span x-text="daftarUcapan.length">0</span>)
            </h3>
            
            <div class="border-t border-stone-200/80 mb-4"></div>

            <!-- Kontainer Scroll Ucapan -->
            <div class="space-y-3 max-h-96 overflow-y-auto pr-1">
                <template x-for="item in daftarUcapan" :key="item.id">
                    <div class="bg-[#FAF8F5] rounded-2xl p-4 border border-stone-200/70 text-left">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-isi text-sm font-bold text-[#1A1A1A]" x-text="item.nama"></span>
                            <span class="font-isi text-[11px] text-[#706E6B]" x-text="item.waktu || 'Baru saja'"></span>
                        </div>
                        <!-- Teks Ucapan (Wajib menggunakan x-text untuk pencegahan XSS) -->
                        <p class="font-isi italic text-xs md:text-[13px] text-[#4A4A4A] leading-relaxed mt-1" x-text="'&ldquo;' + item.ucapan + '&rdquo;'"></p>
                    </div>
                </template>

                <!-- Status Kosong -->
                <p x-show="daftarUcapan.length === 0" class="text-center font-isi text-xs text-stone-500 py-6">
                    Belum ada doa restu. Jadilah yang pertama memberikan doa!
                </p>
            </div>
        </div>

    </div>
</section>