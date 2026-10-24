<section id="rsvp" class="reveal px-6 py-16 bg-[#F7F1E8]">
    <h2 class="font-cormorant text-3xl md:text-4xl text-center text-[#3B2F2A] mb-2">
        Konfirmasi Kehadiran
    </h2>
    <p class="font-poppins text-sm text-[#3B2F2A]/70 text-center mb-8">
        Mohon konfirmasi kehadiran Anda
    </p>

    <!-- Alpine.js Form RSVP -->
    <div 
        x-data="{
            nama: '',
            status: '',
            jumlah: 1,
            loading: false,
            success: '',
            error: '',
            submitted: false,
            
            async kirimRsvp() {
                this.loading = true;
                this.success = '';
                this.error = '';
                
                try {
                    const res = await fetch('{{ route('rsvp.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            nama: this.nama,
                            status: this.status,
                            jumlah: this.status === 'hadir' ? this.jumlah : 1,
                            bot_trap: ''
                        })
                    });
                    
                    const data = await res.json();
                    
                    if (res.ok && data.success) {
                        this.success = data.message;
                        this.submitted = true;
                    } else {
                        const msgs = data.errors ? Object.values(data.errors).flat().join(' ') : 'Terjadi kesalahan.';
                        this.error = msgs;
                    }
                } catch (e) {
                    this.error = 'Gagal mengirim konfirmasi. Silakan coba lagi.';
                } finally {
                    this.loading = false;
                }
            }
        }"
    >
        <!-- Form (tersembunyi setelah submit berhasil) -->
        <form x-show="!submitted" @submit.prevent="kirimRsvp" class="bg-white rounded-xl p-6 border border-[#B8975A]/20">
            <div class="mb-4">
                <label class="block font-poppins text-sm font-medium text-[#3B2F2A] mb-1">Nama</label>
                <input 
                    type="text" 
                    x-model="nama" 
                    required 
                    maxlength="100"
                    class="w-full px-4 py-2 rounded-lg border border-[#B8975A]/30 focus:outline-none focus:ring-2 focus:ring-[#8A9A7B] font-poppins text-sm"
                    placeholder="Nama Anda"
                >
            </div>
            
            <div class="mb-4">
                <label class="block font-poppins text-sm font-medium text-[#3B2F2A] mb-2">Konfirmasi Kehadiran</label>
                <div class="flex gap-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" x-model="status" value="hadir" required class="mr-2 accent-[#8A9A7B]">
                        <span class="font-poppins text-sm text-[#3B2F2A]">Hadir</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" x-model="status" value="tidak_hadir" required class="mr-2 accent-[#8A9A7B]">
                        <span class="font-poppins text-sm text-[#3B2F2A]">Berhalangan</span>
                    </label>
                </div>
            </div>
            
            <!-- Jumlah tamu (hanya muncul jika hadir) -->
            <div x-show="status === 'hadir'" x-transition class="mb-4">
                <label class="block font-poppins text-sm font-medium text-[#3B2F2A] mb-1">Jumlah Tamu (1-5)</label>
                <select 
                    x-model="jumlah"
                    class="w-full px-4 py-2 rounded-lg border border-[#B8975A]/30 focus:outline-none focus:ring-2 focus:ring-[#8A9A7B] font-poppins text-sm"
                >
                    <option value="1">1 Orang</option>
                    <option value="2">2 Orang</option>
                    <option value="3">3 Orang</option>
                    <option value="4">4 Orang</option>
                    <option value="5">5 Orang</option>
                </select>
            </div>
            
            <!-- Honeypot -->
            <input type="text" name="bot_trap" class="hidden" tabindex="-1" autocomplete="off">
            
            <!-- Notifikasi -->
            <p x-show="error" x-cloak class="text-sm text-red-600 mb-3" x-text="error"></p>
            
            <button 
                type="submit"
                :disabled="loading"
                class="w-full py-2 bg-[#8A9A7B] hover:bg-[#7a8a6b] disabled:opacity-50 text-white font-poppins font-medium rounded-full transition-colors"
            >
                <span x-show="!loading">Kirim Konfirmasi</span>
                <span x-show="loading" x-cloak>Mengirim...</span>
            </button>
        </form>

        <!-- Pesan Terima Kasih (muncul setelah submit berhasil) -->
        <div x-show="submitted" x-transition class="bg-white rounded-xl p-6 text-center border border-[#B8975A]/20">
            <svg class="w-16 h-16 mx-auto text-[#8A9A7B] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <p class="font-cormorant text-xl text-[#3B2F2A] mb-2">Terima Kasih!</p>
            <p class="font-poppins text-sm text-[#3B2F2A]/70" x-text="success"></p>
        </div>
    </div>
</section>