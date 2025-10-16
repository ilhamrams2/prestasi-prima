<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - @yield('title')</title>

    {{-- Remixicon & Font Awesome --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Vite (Tailwind / Custom CSS) --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    {{-- Sidebar --}}
    @include('siakad.partials.sidebar')

    {{-- Konten utama --}}
    <div class="transition-all duration-300 lg:ml-64">
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    {{-- Library Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Inisialisasi Lucide --}}
    <script>
        lucide.createIcons();
    </script>

    {{-- SweetAlert Notifications --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
                confirmButtonColor: '#f97316'
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonColor: '#f97316'
            });
        </script>
    @elseif (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#f97316'
            });
        </script>
    @endif

    {{-- App Scripts (Vite) --}}
    @vite('resources/js/app.js')

    {{-- Scripts tambahan halaman --}}
    @stack('scripts')
</body>
</html>
