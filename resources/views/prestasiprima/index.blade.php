<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'SMK Prestasi Prima')</title>
  @php
    $defaultDescription = 'SMK Prestasi Prima menghadirkan pendidikan kejuruan berkualitas dengan jurusan unggulan, fasilitas modern, dan dukungan karier untuk siswa berprestasi.';
  @endphp
  @if (trim($__env->yieldContent('meta_description')) !== '')
    <meta name="description" content="@yield('meta_description')">
  @else
    <meta name="description" content="{{ $defaultDescription }}">
  @endif
  @if (trim($__env->yieldContent('meta_keywords')) !== '')
    <meta name="keywords" content="@yield('meta_keywords')">
  @endif
  @if (trim($__env->yieldContent('meta_robots')) !== '')
    <meta name="robots" content="@yield('meta_robots')">
  @endif
  <meta property="og:title" content="@yield('title', 'SMK Prestasi Prima')">
  <meta property="og:description" content="@yield('meta_description', $defaultDescription)">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('assets/images/logo-smk.png') }}">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('title', 'SMK Prestasi Prima')">
  <meta name="twitter:description" content="@yield('meta_description', $defaultDescription)">

  {{-- === Favicon === --}}
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-smk.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-smk.png') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style> html { scroll-behavior: smooth; } </style>

  @stack('styles')
</head>

<body class="antialiased font-sans text-slate-800 bg-white transition-colors duration-300 relative overflow-x-hidden">

  {{-- ==================== PRELOADER ==================== --}}
  <div id="pageLoader" class="fixed inset-0 bg-white flex flex-col items-center justify-center z-[9999] transition-opacity duration-700 ease-out">
    <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo SMK Prestasi Prima" class="w-16 h-16 mb-4 animate-pulse select-none" loading="lazy">
    <p id="loaderText" class="text-gray-700 font-semibold text-base">Sedang memuat halaman...</p>
    <div class="mt-3 w-40 h-1.5 bg-gray-200 rounded-full overflow-hidden">
      <div class="h-full bg-orange-500 animate-loading-bar"></div>
    </div>
  </div>

  {{-- ==================== HEADER ==================== --}}
  @include('header')

  {{-- ==================== MAIN ==================== --}}
  <main>
    @yield('content')
    @include('ChatbotUI')
  </main>

  {{-- ==================== FOOTER ==================== --}}
  @include('footer')

  {{-- ==================== SCRIPTS ==================== --}}
  <script src="https://unpkg.com/lucide@latest" defer></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
  // === INIT AOS ===
  if (window.initAOS) {
    window.initAOS({ once: false, offset: 100, duration: 800, easing: 'ease-in-out' }).catch((error) => {
      console.error('Failed to initialize AOS', error);
    });
  } else if (window.AOS) {
    window.AOS.init({ once: false, offset: 100, duration: 800, easing: 'ease-in-out' });
  }

  // === AKTIFKAN ICON LUCIDE ===
  if (window.lucide) lucide.createIcons();

  // === ACTIVE LINK ===
  const path = window.location.pathname;
  document.querySelectorAll("#navbar .nav-link").forEach(link => {
    const href = link.getAttribute("href");
    if ((href === "/" && path === "/") || (href !== "/" && path.startsWith(href)))
      link.classList.add("border-b-2", "border-orange-500");
  });

  // === PRELOADER ===
  const loader = document.getElementById("pageLoader");
  const loaderText = document.getElementById("loaderText");

  const pageMap = {
    "/": "Sedang memuat halaman Beranda...",
    "/tentang/program": "Sedang memuat halaman Program Keahlian...",
    "/tentang/profile-sekolah": "Sedang memuat Profil Sekolah...",
    "/tentang/staffmanagement": "Sedang memuat halaman Staff & Guru...",
    "/tentang/sambutan": "Sedang memuat halaman Sambutan...",
    "/siswa/prestasi": "Sedang memuat halaman Prestasi Siswa...",
    "/siswa/ekstrakurikuler": "Sedang memuat halaman Ekstrakurikuler...",
    "/siswa/penerimaan-siswa": "Sedang memuat halaman Penerimaan Siswa...",
    "/siswa/karya-proyek": "Sedang memuat halaman Karya & Proyek Siswa...",
    "/informasi/testimoni": "Sedang memuat halaman Testimoni Siswa...",
    "/informasi/faq": "Sedang memuat halaman FAQ...",
    "/informasi/industri": "Sedang memuat halaman Industri...",
    "/dokumentasi/gallery": "Sedang memuat halaman Galeri...",
    "/dokumentasi/berita": "Sedang memuat halaman Berita...",
    "/dokumentasi/kegiatan": "Sedang memuat halaman Kegiatan...",
    "/presmaboard": "Sedang memuat halaman Presma Board...",
    "/presmalance": "Sedang memuat halaman Presma Lance...",
    "/pendaftaran": "Sedang memuat halaman Pendaftaran..."
  };

  loaderText.textContent = pageMap[path] || "Sedang memuat halaman...";

  const hideLoader = () => {
    if (!loader) return;
    loader.style.opacity = "0";
    setTimeout(() => loader.remove(), 600);
  };

  if (document.readyState === "complete") {
    requestAnimationFrame(hideLoader);
  } else {
    window.addEventListener("load", hideLoader, { once: true });
    setTimeout(hideLoader, 1800);
  }
});

  </script>

  <style>
    @keyframes loadingBar {
      0% { transform: translateX(-100%); }
      50% { transform: translateX(0); }
      100% { transform: translateX(100%); }
    }
    .animate-loading-bar { animation: loadingBar 1.8s ease-in-out infinite; }
  </style>

  @stack('scripts')
</body>
</html>
