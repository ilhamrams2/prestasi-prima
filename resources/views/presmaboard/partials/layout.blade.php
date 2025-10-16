<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Presma Board')</title>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans text-slate-800 bg-gray-50">
    <div class="flex min-h-screen">

        <div class="z-[10000]">
        @include('presmaboard.partials.sidebar')

</div>
        <main class="flex-1 p-6 bg-gray-50 min-h-screen lg:ml-64 transition-all duration-300">
            @yield('content')
        </main>
    </div>

    <script>
        const sidebar = document.getElementById("sidebar");
        const toggle = document.getElementById("sidebarToggle");
        if (toggle) {
            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("-translate-x-full");
            });
        }
    </script>





</body>

</html>
