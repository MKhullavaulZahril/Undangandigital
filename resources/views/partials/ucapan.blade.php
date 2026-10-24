<section id="ucapan" class="reveal px-6 py-16 bg-white">
    <h2 class="font-cormorant text-3xl md:text-4xl text-center text-[#3B2F2A] mb-2">
        Ucapan & Doa
    </h2>
    <p class="font-poppins text-sm text-[#3B2F2A]/70 text-center mb-8">
        Kirimkan ucapan dan doa restu untuk kedua mempelai
    </p>

    <!-- Alpine.js untuk Form & List Ucapan -->
    <div 
        x-data="{
            nama: '',
            ucapan: '',
            loading: false,
            success: '',
            error: '',
            daftarUcapan: [],
            
            async loadUcapan() {
                try {
                    const res = await fetch('{{ route('ucapan.index') }}');
                    this.daftarUcapan = await res.json();
                } catch (e) {
                    console.error(e);
                }
            },
            
            async kirimUcapan() {
                this.loading = true;
                this.success = '';
                this.error = '';
                
                try {
                    const res = await fetch('{{ route('ucapan.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            nama: this.nama,
                            ucapan: this.ucapan,
                            bot_trap: ''
                        })
                    });
                    
                    const data = await res.json();
                    
                    if (res.ok && data.success) {
                        this.success = data.message;
                        this.nama = '';
                        this.ucapan = '';
                        this.loadUcapan(); // Reload daftar ucapan
                    } else {
                        // Tampilkan error validasi
                        const msgs = data.errors ? Object.values(data.errors).flat().join(' ') : 'Terjadi kesalahan.';
                        this.error = msgs;
                    }
                } catch (e) {
                    this.error = 'Gagal mengirim ucapan. Silakan coba lagi.';
                } finally {
                    this.loading = false;
                }
            },
            
            init() {
                this.loadUcapan();
            }
        }"
    >
        <!-- Form Ucapan -->
        <form @submit.prevent="kirimUcapan" class="bg-[#F7F1E8] rounded-xl p-6 mb-8 border border-[#B8975A]/20">
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
                <label class="block font-poppins text-sm font-medium text-[#3B2F2A] mb-1">Ucapan & Doa</label>
                <textarea 
                    x-model="ucapan" 
                    required 
                    maxlength="500"
                    rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-[#B8975A]/30 focus:outline-none focus:ring-2 focus:ring-[#8A9A7B] font-poppins text-sm resize-none"
                    placeholder="Tulis ucapan dan doa Anda..."
                ></textarea>
            </div>
            
            <!-- Honeypot -->
            <input type="text" name="bot_trap" class="hidden" tabindex="-1" autocomplete="off">
            
            <!-- Notifikasi -->
            <p x-show="success" x-cloak class="text-sm text-green-600 mb-3" x-text="success"></p>
            <p x-show="error" x-cloak class="text-sm text-red-600 mb-3" x-text="error"></p>
            
            <button 
                type="submit"
                :disabled="loading"
                class="w-full py-2 bg-[#8A9A7B] hover:bg-[#7a8a6b] disabled:opacity-50 text-white font-poppins font-medium rounded-full transition-colors"
            >
                <span x-show="!loading">Kirim Ucapan</span>
                <span x-show="loading" x-cloak>Mengirim...</span>
            </button>
        </form>

        <!-- Daftar Ucapan -->
        <div class="space-y-3 max-h-96 overflow-y-auto pr-2">
            <template x-for="item in daftarUcapan" :key="item.id">
                <div class="bg-[#F7F1E8] rounded-lg p-4 border border-[#B8975A]/10">
                    <div class="flex items-center mb-1">
                        <div class="w-8 h-8 rounded-full bg-[#8A9A7B] text-white flex items-center justify-center font-poppins font-semibold text-sm mr-2" x-text="item.nama.charAt(0).toUpperCase()"></div>
                        <div>
                            <p class="font-poppins text-sm font-semibold text-[#3B2F2A]" x-text="item.nama"></p>
                            <p class="font-poppins text-xs text-[#3B2F2A]/50" x-text="new Date(item.created_at).toLocaleDateString('id-ID', {day:'numeric', month:'short', year:'numeric'})"></p>
                        </div>
                    </div>
                    <p class="font-poppins text-sm text-[#3B2F2A]/80 mt-2" x-text="item.ucapan"></p>
                </div>
            </template>
            <p x-show="daftarUcapan.length === 0" class="text-center text-sm text-[#3B2F2A]/50 font-poppins py-4">
                Belum ada ucapan. Jadilah yang pertama!
            </p>
        </div>
    </div>
</section>