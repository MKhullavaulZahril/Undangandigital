<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'The Wedding of [Nama Pria] & [Nama Wanita]')</title>

    {{-- Jangan diindeks Google --}}
    <meta name="robots" content="noindex, nofollow">

    {{-- Preview link WhatsApp / sosial media --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="The Wedding of [Nama Pria] & [Nama Wanita]">
    <meta property="og:description" content="[Hari, tanggal bulan tahun]">
    <meta property="og:image" content="{{ asset('images/cover.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:locale" content="id_ID">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cokelat font-isi antialiased">

    {{-- Bingkai mobile: di desktop dibatasi 480px dan di tengah --}}
    <main class="mx-auto w-full max-w-[480px] min-h-screen bg-krem overflow-x-hidden shadow-2xl">
        @yield('content')
    </main>

</body>
</html>