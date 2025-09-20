<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'SMK Prestasi Prima')</title>

  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Font Awesome v6.5 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- AOS CSS (Animate on Scroll) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Vite Assets -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans text-slate-800 bg-white">

  <!-- Header -->
  @include('header')
  
  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  @include('footer')

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      once: false,
      offset: 100,
      duration: 800,
      easing: 'ease-in-out',
    });
  </script>

  <!-- Custom Scripts -->
  @stack('scripts')

  <!-- Navbar Active Link Highlight -->
  <script>
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
  </script>

  <!-- Service Worker Registration -->
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/sw.js')
        .then(() => console.log('Service Worker terdaftar'))
        .catch(err => console.log('Gagal registrasi SW:', err));
    }
  </script>

</body>
</html>
