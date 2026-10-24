<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Wedding Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Admin</h1>
        
        <!-- Rekapitulasi -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-500">Total RSVP</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalRsvp }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-500">Total Hadir</p>
                <p class="text-3xl font-bold text-green-600">{{ $totalHadir }} orang</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-500">Tidak Hadir</p>
                <p class="text-3xl font-bold text-red-600">{{ $totalTidakHadir }}</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <p class="text-sm text-gray-500">Total Ucapan</p>
                <p class="text-3xl font-bold text-blue-600">{{ $totalUcapan }}</p>
            </div>
        </div>

        <!-- Link kembali -->
        <a href="{{ route('undangan.index') }}" class="inline-block px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition-colors">
            &larr; Kembali ke Undangan
        </a>
    </div>
</body>
</html>