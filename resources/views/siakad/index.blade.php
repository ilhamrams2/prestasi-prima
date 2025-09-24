<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SIAKAD Sekolah')</title>

    {{-- Tailwind (via Vite) --}}
    @vite('resources/css/app.css')

    {{-- Font Awesome (opsional kalau masih dipakai) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('siakad.partials.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            
            {{-- Page Content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="bg-white text-center py-3 border-t">
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} SIAKAD Sekolah</p>
            </footer>
        </div>
    </div>

    {{-- Inisialisasi lucide agar ikon muncul --}}
    <script>
        lucide.createIcons();
    </script>

</body>
</html>
