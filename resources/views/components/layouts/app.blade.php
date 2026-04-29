<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" type="image/png" href="logopst.png">
    {{-- Title --}}
    <title>{{ $title ?? 'MTS Almarzukiyyah' }}</title>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 overflow-x-hidden">

    {{-- Navbar --}}
    <x-navbar />

    {{-- CONTENT (pengganti @yield) --}}
    <main class="pt-20 overflow-x-hidden">
        {{ $slot }}
    </main>
<x-footer-section />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
</body>
</html>