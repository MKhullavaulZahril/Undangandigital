<section id="rsvp" class="reveal px-4 py-8 bg-[#F9F6EE] relative">
    <!-- Kartu Putih Konfirmasi Kehadiran RSVP -->
    <div 
        x-data="{
            nama: '{{ $tamu !== 'Bapak/Ibu/Saudara/i' ? $tamu : '' }}',
            status: 'hadir',
            jumlah: 2,
            website: '',
            loading: false,
            success: '',
            error: '',
            submitted: false,
            waUrl: '',

            async kirimRsvp() {
                this.loading = true;
                this.error = '';
                this.success = '';

                try {
                    const token = document.querySelector('meta[name=csrf-token]')?.content;
                    const res = await fetch('{{ route('rsvp.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            nama: this.nama,
                            status: this.status,
                            jumlah: this.status === 'hadir' ? parseInt(this.jumlah) : 0,
                            website: this.website
                        })
                    });

                    if (res.status === 429) {
                        this.error = 'Terlalu banyak percobaan, coba lagi sebentar lagi.';
                        return;
                    }

                    const data = await res.json();

                    if (res.ok && data.success) {
                        this.success = data.message || 'Terima kasih, konfirmasi kehadiran Anda sudah kami terima.';
                        this.submitted = true;
                        this.waUrl = data.wa_url || '';

                        // Langsung redirect ke WhatsApp pengantin (lebih andal dari window.open)
                        if (data.wa_url) {
                            window.location.href = data.wa_url;
                        }
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
            }
        }"
        class="bg-white rounded-3xl p-6 sm:p-7 shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-stone-200/70 max-w-sm mx-auto text-left"
    >
        <!-- Header Section RSVP -->
        <div class="text-center mb-6">
            <p class="font-judul text-[11px] md:text-xs tracking-[0.25em] text-[#C5A059] uppercase font-bold mb-1">
                Konfirmasi Kehadiran
            </p>
            <h2 class="font-judul text-2xl md:text-[28px] font-bold text-[#1A1A1A] leading-tight">
                RSVP Kehadiran
            </h2>
        </div>

        <!-- Form RSVP (Disembunyikan Setelah Berhasil Mengirim) -->
        <form x-show="!submitted" @submit.prevent="kirimRsvp()" class="space-y-4">
            
            <!-- Field 1: Nama Lengkap -->
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

            <!-- Field 2: Konfirmasi Kehadiran -->
            <div>
                <label class="block font-isi text-xs font-semibold text-[#1A1A1A] mb-1.5">
                    Konfirmasi Kehadiran
                </label>
                <div class="relative">
                    <select 
                        name="status"
                        x-model="status" 
                        required
                        class="w-full appearance-none px-4 py-3 rounded-2xl border border-stone-200 bg-[#FAF8F5] text-sm text-[#1A1A1A] focus:outline-none focus:border-[#C5A059] focus:ring-1 focus:ring-[#C5A059] transition-all font-isi cursor-pointer pr-10"
                    >
                        <option value="hadir">Insya Allah Hadir</option>
                        <option value="tidak_hadir">Mohon Maaf Tidak Bisa Hadir</option>
                    </select>
                    <!-- Chevron Dropdown Icon -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-stone-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Field 3: Jumlah Tamu (Tampil Hanya Jika Hadir) -->
            <div x-show="status === 'hadir'" x-transition class="space-y-1.5">
                <label class="block font-isi text-xs font-semibold text-[#1A1A1A]">
                    Jumlah Tamu
                </label>
                <div class="relative">
                    <select 
                        name="jumlah"
                        x-model="jumlah" 
                        class="w-full appearance-none px-4 py-3 rounded-2xl border border-stone-200 bg-[#FAF8F5] text-sm text-[#1A1A1A] focus:outline-none focus:border-[#C5A059] focus:ring-1 focus:ring-[#C5A059] transition-all font-isi cursor-pointer pr-10"
                    >
                        <option value="1">1 Orang</option>
                        <option value="2">2 Orang</option>
                        <option value="3">3 Orang</option>
                        <option value="4">4 Orang</option>
                        <option value="5">5 Orang</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-stone-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Field Honeypot (Disembunyikan dengan CSS, Bukan type="hidden") -->
            <div style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;" aria-hidden="true">
                <label for="rsvp_website">Jangan isi bagian ini</label>
                <input type="text" id="rsvp_website" name="website" x-model="website" tabindex="-1" autocomplete="off">
            </div>

            <!-- Pesan Error / Notifikasi Validasi -->
            <div x-show="error" x-cloak class="p-3 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs font-isi leading-relaxed">
                <span x-text="error"></span>
            </div>

            <!-- Tombol Kirim Konfirmasi -->
            <button 
                type="submit"
                :disabled="loading"
                class="w-full py-3.5 px-6 rounded-2xl bg-[#9E783B] hover:bg-[#8A672E] active:scale-95 disabled:opacity-60 text-white font-isi font-bold text-xs uppercase tracking-wider shadow-md transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer mt-4"
            >
                <template x-if="!loading">
                    <span>Kirim Konfirmasi Kehadiran</span>
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

        <!-- Pesan Sukses Setelah Form Terkirim -->
        <div x-show="submitted" x-cloak x-transition class="text-center py-6">
            <div class="w-14 h-14 mx-auto rounded-full bg-emerald-50 border border-emerald-200 flex items-center justify-center text-emerald-600 mb-4 shadow-sm">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="font-judul text-2xl font-bold text-[#1A1A1A] mb-2">
                Terima Kasih!
            </h3>
            <p class="font-isi text-xs text-[#4A4A4A] leading-relaxed max-w-xs mx-auto mb-4" x-text="success">
            </p>

            <!-- Tombol Buka WhatsApp Pengantin -->
            <template x-if="waUrl">
                <a 
                    :href="waUrl" 
                    target="_blank" 
                    rel="noopener"
                    class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-2xl bg-[#25D366] hover:bg-[#20bd5a] text-white font-isi font-semibold text-xs tracking-wide shadow-md transition-all active:scale-95 cursor-pointer"
                >
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    Buka Chat WhatsApp Pengantin
                </a>
            </template>
        </div>

    </div>
</section>
