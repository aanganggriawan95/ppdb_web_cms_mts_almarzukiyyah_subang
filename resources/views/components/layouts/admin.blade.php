@props(['title'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <link rel="icon" type="image/png" href="logopst.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

   
</head>

<body class="bg-gray-100 w-full">

<x-admin-wrapper :title="$title">
    {{ $slot }}
</x-admin-wrapper>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')



</body>
</html>