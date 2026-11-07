<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>Pembuat Link Undangan - Admin</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-krem text-cokelat font-isi min-h-screen antialiased py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto space-y-6">

        <!-- Navigasi & Judul Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-stone-200 pb-5">
            <div>
                <a href="{{ route('admin.index') }}" class="inline-flex items-center text-xs sm:text-sm text-sage hover:text-cokelat font-medium mb-2 transition-colors">
                    &larr; Kembali ke Dashboard Admin
                </a>
                <h1 class="text-3xl sm:text-4xl font-bold font-judul text-cokelat tracking-wide">
                    Pembuat Link Undangan
                </h1>
                <p class="text-xs sm:text-sm text-abu mt-1">
                    Daftar yang diunggah tidak disimpan di server.
                </p>
            </div>
            <div>
                <a href="{{ route('undangan.index') }}" target="_blank" rel="noopener" class="inline-flex items-center text-xs sm:text-sm text-emas hover:underline font-medium">
                    Lihat Undangan &rarr;
                </a>
            </div>
        </div>

        <!-- Form Pembuat Link -->
        <div class="bg-white rounded-2xl shadow-sm border border-stone-200 p-5 sm:p-7">
            <form action="{{ route('admin.link.generate') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Input Base URL -->
                <div>
                    <label for="base" class="block text-xs sm:text-sm font-semibold text-cokelat mb-1">
                        Alamat Website (Base URL) <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="url"
                        name="base"
                        id="base"
                        required
                        value="{{ old('base', $base ?? url('/')) }}"
                        placeholder="https://domainanda.com"
                        class="w-full px-3.5 py-2.5 text-sm rounded-lg border @error('base') border-red-500 focus:ring-red-400 @else border-stone-300 focus:ring-sage focus:border-sage @enderror focus:outline-none focus:ring-2 bg-stone-50 text-cokelat"
                    >
                    <p class="text-[11px] text-abu mt-1">Alamat web utama undangan tanpa slug tamu, misal: {{ url('/') }}</p>
                    @error('base')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Template Pesan WhatsApp -->
                <div>
                    <label for="pesan" class="block text-xs sm:text-sm font-semibold text-cokelat mb-1">
                        Template Pesan WhatsApp <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        name="pesan"
                        id="pesan"
                        rows="4"
                        required
                        class="w-full px-3.5 py-2.5 text-sm rounded-lg border @error('pesan') border-red-500 focus:ring-red-400 @else border-stone-300 focus:ring-sage focus:border-sage @enderror focus:outline-none focus:ring-2 bg-stone-50 text-cokelat font-mono"
                    >{{ old('pesan', $pesan ?? '') }}</textarea>
                    <p class="text-[11px] text-abu mt-1">
                        Gunakan placeholder <code class="bg-stone-100 px-1 py-0.5 rounded text-cokelat font-semibold">{nama}</code> untuk nama tamu dan <code class="bg-stone-100 px-1 py-0.5 rounded text-cokelat font-semibold">{link}</code> untuk link undangan personal.
                    </p>
                    @error('pesan')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 pt-2 border-t border-stone-100">
                    <!-- Upload File CSV/TXT -->
                    <div>
                        <label for="file" class="block text-xs sm:text-sm font-semibold text-cokelat mb-1">
                            Unggah File Daftar Tamu (CSV / TXT)
                        </label>
                        <input
                            type="file"
                            name="file"
                            id="file"
                            accept=".csv,.txt"
                            class="w-full text-xs sm:text-sm text-cokelat file:mr-3 file:py-2 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-sage file:text-white hover:file:opacity-90 cursor-pointer border border-stone-300 rounded-lg p-1.5 bg-stone-50"
                        >
                        <p class="text-[11px] text-abu mt-1">Maks. 1 MB. Format baris: Nama, No WA (nomor opsional).</p>
                        @error('file')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Textarea Tempel Daftar Tamu -->
                    <div>
                        <label for="daftar" class="block text-xs sm:text-sm font-semibold text-cokelat mb-1">
                            Atau Tempel Daftar Tamu (Textarea)
                        </label>
                        <textarea
                            name="daftar"
                            id="daftar"
                            rows="4"
                            placeholder="Mbak Dinda, 0812-3456-7890&#10;Bapak Budi &amp; Ibu Siti, 081234567891&#10;Keluarga Bapak Andi,"
                            class="w-full px-3.5 py-2.5 text-xs sm:text-sm rounded-lg border @error('daftar') border-red-500 focus:ring-red-400 @else border-stone-300 focus:ring-sage focus:border-sage @enderror focus:outline-none focus:ring-2 bg-stone-50 text-cokelat font-mono"
                        >{{ old('daftar', $daftar ?? '') }}</textarea>
                        <p class="text-[11px] text-abu mt-1">Maks. 50.000 karakter. Bisa copy-paste langsung dari kolom Excel.</p>
                        @error('daftar')
                            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-3 flex justify-end">
                    <button
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2.5 bg-cokelat text-white font-medium text-sm rounded-lg hover:bg-opacity-90 transition-all shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cokelat"
                    >
                        Buat Link Undangan
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Hasil (Hanya muncul setelah form disubmit dan ada data) -->
        @if(isset($rows) && is_array($rows))
            <div class="bg-white rounded-2xl shadow-sm border border-stone-200 p-5 sm:p-7 space-y-4">
                <!-- Header Hasil & Tombol Aksi Massal -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-stone-100 pb-4">
                    <div>
                        <h2 class="text-xl font-bold font-judul text-cokelat">
                            Daftar Link Undangan Personal
                        </h2>
                        <p class="text-xs text-abu">
                            Total: <span class="font-semibold text-cokelat">{{ count($rows) }}</span> tamu siap dibagikan.
                        </p>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        <button
                            type="button"
                            onclick="salinSemuaLink()"
                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md border border-stone-300 text-cokelat bg-stone-50 hover:bg-stone-100 transition-colors focus:outline-none"
                        >
                            Salin semua link
                        </button>
                        <button
                            type="button"
                            onclick="salinTabelExcel()"
                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md border border-sage text-sage bg-white hover:bg-sage hover:text-white transition-colors focus:outline-none"
                        >
                            Salin tabel untuk Excel
                        </button>
                    </div>
                </div>

                <!-- Tabel Responsif (overflow-x-auto) -->
                <div class="overflow-x-auto rounded-xl border border-stone-200">
                    <table class="min-w-full divide-y divide-stone-200 text-left text-xs sm:text-sm">
                        <thead class="bg-krem text-cokelat font-semibold uppercase tracking-wider text-[11px]">
                            <tr>
                                <th scope="col" class="py-3 px-3.5 w-12 text-center">No</th>
                                <th scope="col" class="py-3 px-3.5 min-w-[140px]">Nama Tamu</th>
                                <th scope="col" class="py-3 px-3.5 min-w-[130px]">No WA</th>
                                <th scope="col" class="py-3 px-3.5 min-w-[200px]">Link Undangan</th>
                                <th scope="col" class="py-3 px-3.5 w-32 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 bg-white text-cokelat">
                            @forelse($rows as $idx => $row)
                                <tr class="hover:bg-stone-50 transition-colors">
                                    <td class="py-3 px-3.5 text-center text-abu font-mono text-xs">
                                        {{ $idx + 1 }}
                                    </td>
                                    <td class="py-3 px-3.5 font-medium">
                                        {{ $row['nama'] }}
                                    </td>
                                    <td class="py-3 px-3.5 font-mono text-xs text-abu">
                                        {{ $row['nomor'] }}
                                    </td>
                                    <td class="py-3 px-3.5 break-all text-xs font-mono text-sage">
                                        <a href="{{ $row['link'] }}" target="_blank" rel="noopener" class="hover:underline">
                                            {{ $row['link'] }}
                                        </a>
                                    </td>
                                    <td class="py-3 px-3.5 text-center">
                                        <div class="inline-flex items-center space-x-1.5">
                                            <button
                                                type="button"
                                                onclick="salinTeks('{{ $row['link'] }}', 'Link disalin')"
                                                title="Salin link undangan"
                                                class="px-2.5 py-1 text-xs font-medium rounded bg-stone-100 text-cokelat hover:bg-stone-200 transition-colors"
                                            >
                                                Salin
                                            </button>
                                            <a
                                                href="{{ $row['wa_url'] }}"
                                                target="_blank"
                                                rel="noopener"
                                                title="Kirim pesan WhatsApp"
                                                class="px-2.5 py-1 text-xs font-medium rounded bg-[#25D366] text-white hover:opacity-90 transition-opacity"
                                            >
                                                WhatsApp
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-abu">
                                        Tidak ada data tamu yang dapat diproses.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>

    <!-- Hidden Textarea untuk Fallback Salin -->
    <textarea id="salin-fallback-input" class="sr-only" aria-hidden="true" tabindex="-1"></textarea>

    <!-- Komponen Toast Notifikasi -->
    <div
        id="toast"
        role="alert"
        aria-live="polite"
        class="fixed bottom-5 right-5 z-50 transform translate-y-16 opacity-0 transition-all duration-300 pointer-events-none bg-cokelat text-white px-4 py-2.5 rounded-lg shadow-lg text-xs sm:text-sm flex items-center space-x-2"
    >
        <svg class="w-4 h-4 text-emas flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span id="toast-message">Link disalin</span>
    </div>

    <!-- Script Salin Data -->
    <script>
        const rowsData = @json($rows ?? []);
        let toastTimeout;

        function tampilkanToast(pesan) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            if (!toast || !toastMessage) return;

            toastMessage.textContent = pesan;
            toast.classList.remove('translate-y-16', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            clearTimeout(toastTimeout);
            toastTimeout = setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-16', 'opacity-0');
            }, 2500);
        }

        function salinTeks(teks, pesanToast) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(teks).then(() => {
                    tampilkanToast(pesanToast);
                }).catch(() => {
                    salinFallback(teks, pesanToast);
                });
            } else {
                salinFallback(teks, pesanToast);
            }
        }

        function salinFallback(teks, pesanToast) {
            const el = document.getElementById('salin-fallback-input');
            if (el) {
                el.value = teks;
                el.select();
                el.setSelectionRange(0, 99999);
                try {
                    document.execCommand('copy');
                    tampilkanToast(pesanToast);
                } catch (err) {
                    alert('Gagal menyalin teks secara otomatis. Silakan salin manual.');
                }
            }
        }

        function salinSemuaLink() {
            if (!rowsData || rowsData.length === 0) return;
            // Format: nama[TAB]link per baris
            const lines = rowsData.map(item => `${item.nama}\t${item.link}`);
            const teks = lines.join('\n');
            salinTeks(teks, `${rowsData.length} link disalin`);
        }

        function salinTabelExcel() {
            if (!rowsData || rowsData.length === 0) return;
            // Header: Nama, No WA, Link Undangan, Link WhatsApp (dipisah tab)
            const header = ['Nama', 'No WA', 'Link Undangan', 'Link WhatsApp'].join('\t');
            const lines = rowsData.map(item => [item.nama, item.nomor, item.link, item.wa_url].join('\t'));
            const teks = [header, ...lines].join('\n');
            salinTeks(teks, 'Tabel Excel disalin');
        }
    </script>
</body>
</html>
