<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- === Title Dinamis === --}}
  <title>@yield('title', 'SMK Prestasi Prima')</title>

  {{-- === Font & Icon === --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  {{-- === Animate On Scroll === --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  {{-- === Favicon / Logo Tab === --}}
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-smk.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-smk.png') }}">


  {{-- === Vite Build Assets === --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    html {
      smooth-scroll-behavior: smooth;
    }
  </style>
</head>

<body class="antialiased font-sans text-slate-800 bg-white dark:bg-gray-900 transition-colors duration-300">

  {{-- === Header === --}}
  @include('header')

  {{-- === Main Content === --}}
  <main>
    @yield('content')
    @include('ChatbotUI')

    
  </main>

  {{-- === Footer === --}}
  @include('footer')

  {{-- === Scripts Section === --}}
  {{-- Lucide Icons --}}
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>lucide.createIcons();</script>

  {{-- Alpine.js (Interaktivitas FAQ, Navbar, dll) --}}
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  {{-- Animate On Scroll --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      once: false,
      offset: 100,
      duration: 800,
      easing: 'ease-in-out',
    });
  </script>

  {{-- Custom Blade Scripts (Injectable via @push('scripts')) --}}
  @stack('scripts')

  {{-- Active Link Detection --}}
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const currentURL = window.location.pathname;
      const navLinkEls = document.querySelectorAll("#navbar .nav-link");

      navLinkEls.forEach(link => {
        const href = link.getAttribute("href");
        if (
          (href === "/" && currentURL === "/") ||
          (href !== "/" && currentURL.startsWith(href))
        ) {
          link.classList.add("border-b-2", "border-orange-500");
        }
      });
    });
  </script>

</body>
</html>
