<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', \App\Models\prestasiprima\SiteSetting::get('site_name', 'SMK Prestasi Prima'))</title>
  @php
    $defaultDescription = \App\Models\prestasiprima\SiteSetting::get('site_description', 'SMK Prestasi Prima menghadirkan pendidikan kejuruan berkualitas dengan jurusan unggulan, fasilitas modern, dan dukungan karier untuk siswa berprestasi.');
    $siteName = \App\Models\prestasiprima\SiteSetting::get('site_name', 'SMK Prestasi Prima');
  @endphp
  <meta name="description" content="@yield('meta_description', $defaultDescription)">
  <meta name="keywords" content="@yield('meta_keywords', \App\Models\prestasiprima\SiteSetting::get('meta_keywords', 'smk, prestasi, prima, jakarta'))">
  @if (trim($__env->yieldContent('meta_robots')) !== '')
    <meta name="robots" content="@yield('meta_robots')">
  @endif
  <meta property="og:title" content="@yield('title', $siteName)">
  <meta property="og:description" content="@yield('meta_description', $defaultDescription)">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  @php
    $siteLogo = \App\Models\prestasiprima\SiteSetting::get('site_logo');
    $siteFavicon = \App\Models\prestasiprima\SiteSetting::get('site_favicon');
    $primaryColor = \App\Models\prestasiprima\SiteSetting::get('primary_color', '#FF6B00');
    $secondaryColor = \App\Models\prestasiprima\SiteSetting::get('secondary_color', '#1e293b');
  @endphp
  <meta property="og:image" content="{{ $siteLogo ? asset($siteLogo) : asset('assets/images/logo-smk.png') }}">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('title', $siteName)">
  <meta name="twitter:description" content="@yield('meta_description', $defaultDescription)">
  <meta name="theme-color" content="{{ $primaryColor }}">

  {{-- === Dynamic Theme Colors === --}}
  <style>
    :root {
      --primary-color: {{ $primaryColor }};
      --secondary-color: {{ $secondaryColor }};
      --primary-hover: {{ $primaryColor }}dd; /* Transparent version for hover */
    }
    
    /* Dynamic Theme Overrides */
    .text-orange-600, .group-hover\:text-orange-600:hover, .hover\:text-orange-600:hover { color: var(--primary-color) !important; }
    .bg-orange-600, .hover\:bg-orange-600:hover { background-color: var(--primary-color) !important; }
    .text-orange-500, .group-hover\:text-orange-500:hover { color: var(--primary-color) !important; }
    .bg-orange-500, .hover\:bg-orange-500:hover { background-color: var(--primary-color) !important; }
    .border-orange-500 { border-color: var(--primary-color) !important; }
    .focus\:ring-orange-500:focus { --tw-ring-color: var(--primary-color) !important; }
    
    .bg-slate-900 { background-color: var(--secondary-color) !important; }
    .bg-slate-800 { background-color: var(--secondary-color) !important; }
    
    /* Specific overrides for buttons and transitions */
    .nav-link:hover::after { background: var(--primary-color) !important; }
    #backToTop:hover { background-color: var(--primary-color) !important; border-color: var(--primary-color) !important; }
    #accToggle:hover { background-color: var(--primary-color) !important; }
    .acc-btn.active { border-color: var(--primary-color) !important; background-color: color-mix(in srgb, var(--primary-color), white 90%) !important; }
    .acc-btn.active iconify-icon, .acc-btn.active span { color: var(--primary-color) !important; }
  </style>

  {{-- === Favicon === --}}
  <link rel="icon" type="image/png" href="{{ $siteFavicon ? asset($siteFavicon) : asset('assets/images/logo-smk.png') }}">
  <link rel="apple-touch-icon" href="{{ $siteFavicon ? asset($siteFavicon) : asset('assets/images/logo-smk.png') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style> 
    html, body {
      max-width: 100%;
      overflow-x: hidden !important;
      position: relative;
    }
    html { scroll-behavior: smooth; } 
    .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border-width: 0;
    }
    
    /* Performance for HP Kentang */
    img:not([loading="lazy"]) {
        content-visibility: auto;
    }
    
    .will-change-transform {
        will-change: transform;
    }
  </style> 

  @stack('styles')
</head>

<body class="antialiased font-sans text-slate-800 bg-white transition-colors duration-300 relative overflow-x-hidden">
  
  {{-- ==================== ACCESSIBILITY: SKIP TO CONTENT ==================== --}}
  <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[10000] focus:px-6 focus:py-3 focus:bg-orange-600 focus:text-white focus:rounded-xl focus:font-bold focus:shadow-2xl">
    Lanjut ke Konten Utama
  </a>

  {{-- ==================== MODERN PRELOADER (TECH ORBIT v3) ==================== --}}
  <div id="pageLoader" class="fixed inset-0 bg-white z-[9999] flex flex-col items-center justify-center transition-all duration-1000 ease-[cubic-bezier(0.87,0,0.13,1)]">
    
    <!-- Tighter Orbit Container (Medium Size) -->
    <div class="relative w-28 h-28 flex items-center justify-center mb-4">
      
      <!-- Tech Rings (Tight Fit) -->
      <!-- Ring 1: Outer static-ish -->
      <div class="absolute inset-0 border border-orange-100 rounded-full opacity-50"></div>
      
      <!-- Ring 2: Rotating Orange -->
      <div class="absolute inset-[2px] border-t-[3px] border-r-[1px] border-orange-500 rounded-full animate-[spin_3s_linear_infinite]"></div>
      
      <!-- Ring 3: Counter-Rotating Darker -->
      <div class="absolute inset-[6px] border-b-[3px] border-l-[1px] border-orange-600 rounded-full animate-[spin_2s_linear_infinite_reverse]"></div>

      <!-- Logo (Fitted & Medium) -->
      <div class="absolute inset-0 flex items-center justify-center z-10 p-3">
        <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo" class="w-full h-full object-contain drop-shadow-md">
      </div>
    </div>

    <!-- Simple Text -->
    <p class="text-[10px] font-black text-orange-600 tracking-[0.2em] uppercase animate-pulse">Sedang memuat halaman...</p>
    
  </div>
    @keyframes loading {
      0% { left: -50%; width: 50%; }
      50% { left: 25%; width: 75%; }
      100% { left: 100%; width: 50%; }
    }
  </style>


  <div id="acc-content-wrapper" class="transition-all duration-300 bg-white min-h-screen relative z-10">
    {{-- ==================== HEADER ==================== --}}
    @include('header')

    {{-- ==================== MAIN ==================== --}}
    <main id="main-content" tabindex="-1" class="outline-none overflow-x-hidden w-full relative">
      @yield('content')
    </main>

    {{-- ==================== FOOTER ==================== --}}
    @include('footer')
  </div>

  {{-- ==================== SCRIPTS ==================== --}}
  {{-- Scripts loaded via Vite --}}

  <script>
    document.addEventListener('DOMContentLoaded', () => {
        // === UNREGISTER/CLEANUP PWA SERVICE WORKER ===
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.getRegistrations().then(function(registrations) {
                for(let registration of registrations) {
                    registration.unregister().then(function(boolean) {
                        console.log('Service Worker Unregistered:', boolean);
                    });
                }
            });
        }

  // === INIT AOS ===
  if (window.initAOS) {
    window.initAOS({ once: false, offset: 100, duration: 800, easing: 'ease-in-out' }).catch((error) => {
      console.error('Failed to initialize AOS', error);
    });
  } else if (window.AOS) {
    window.AOS.init({ once: false, offset: 100, duration: 800, easing: 'ease-in-out' });
  }

  // === AKTIFKAN ICON LUCIDE ===
  if (window.lucide) lucide.createIcons({ icons: window.lucide.icons });

  // === ACTIVE LINK ===
  const path = window.location.pathname;
  document.querySelectorAll("#navbar .nav-link").forEach(link => {
    const href = link.getAttribute("href");
    if ((href === "/" && path === "/") || (href !== "/" && path.startsWith(href)))
      link.classList.add("border-b-2", "border-orange-500");
  });

});
  </script>

  {{-- === ISOLATED PRELOADER SCRIPT (Guaranteed Execution) === --}}
  <script>
    (function() {
        const loader = document.getElementById("pageLoader");
        if (!loader) return;

        // SETTING: Minimum display time in ms (e.g., 1500 = 1.5 seconds)
        // This ensures the animation is viewed even on fast connections.
        const minimumDuration = 1500; 
        const startTime = Date.now();

        function vanish() {
            const elapsedTime = Date.now() - startTime;
            const remainingTime = Math.max(0, minimumDuration - elapsedTime);

            // Wait for the remaining time if page loaded too fast
            setTimeout(() => {
                loader.classList.add("opacity-0", "pointer-events-none");
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 1000); // Wait for CSS transition (1s)
            }, remainingTime);
        }

        // Failsafe: If internet is fast, hide after minimal delay
        // If slow, wait for load event
        if (document.readyState === 'complete') {
            vanish();
        } else {
            window.addEventListener('load', vanish);
            // Backup if 'load' hangs
            setTimeout(vanish, 5000); 
        }

        // BFCache fix (Back button)
        window.addEventListener('pageshow', (e) => {
            if (e.persisted) vanish();
        });
    })();
  </script>

  </script>

  {{-- ==================== BACK TO TOP BUTTON ==================== --}}
  <button id="backToTop" 
    class="fixed bottom-8 right-8 w-14 h-14 bg-white border-2 border-orange-500 text-orange-600 rounded-2xl shadow-2xl flex items-center justify-center translate-y-20 opacity-0 transition-all duration-500 z-[90] hover:bg-orange-600 hover:text-white hover:-translate-y-2 group focus-visible:ring-4 focus-visible:ring-orange-500/50 outline-none"
    onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
    aria-label="Kembali ke atas">
    <iconify-icon icon="lucide:arrow-up" class="text-2xl transition-transform duration-300 group-hover:-translate-y-1" aria-hidden="true"></iconify-icon>
  </button>

  @stack('scripts')
  
  <script>
    // === BACK TO TOP LOGIC ===
    const backToTopBtn = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 400) {
        backToTopBtn.classList.remove('translate-y-20', 'opacity-0');
        backToTopBtn.classList.add('translate-y-0', 'opacity-100');
      } else {
        backToTopBtn.classList.add('translate-y-20', 'opacity-0');
        backToTopBtn.classList.remove('translate-y-0', 'opacity-100');
      }
    });
  </script>

  {{-- ==================== ACCESSIBILITY WIDGET (PRESTASI PRIMA STYLE) ==================== --}}
  <div id="accessibilityWidget" class="fixed bottom-24 right-8 z-[1000]">
    <button id="accToggle" 
      class="w-14 h-14 bg-white border-2 border-orange-500 text-orange-600 rounded-2xl shadow-2xl flex items-center justify-center transition-all duration-300 hover:bg-orange-600 hover:text-white hover:-translate-y-1 group focus-visible:ring-4 focus-visible:ring-orange-500/50 outline-none"
      aria-label="Buka Menu Aksesibilitas"
      aria-expanded="false"
      aria-controls="accMenu">
      <iconify-icon icon="material-symbols:accessibility-new" class="text-3xl transition-transform group-hover:scale-110"></iconify-icon>
    </button>
    
    <div id="accMenu" role="region" aria-label="Menu Aksesibilitas" 
      class="absolute bottom-16 -right-2 w-[calc(100vw-4rem)] sm:w-[380px] max-w-[380px] bg-white rounded-[2rem] sm:rounded-[2.5rem] shadow-[0_30px_100px_rgba(234,88,12,0.15)] border border-orange-100 overflow-hidden opacity-0 translate-y-10 pointer-events-none transition-all duration-500">
      
      {{-- Header --}}
      <div class="bg-gradient-to-r from-orange-600 to-orange-500 p-5 sm:p-6 flex items-center justify-between text-white">
        <div>
          <h3 class="font-black text-xs sm:text-sm uppercase tracking-widest flex items-center gap-2">
            <iconify-icon icon="lucide:settings-2"></iconify-icon>
            Aksesibilitas
          </h3>
          <p class="text-[9px] sm:text-[10px] font-bold opacity-80 mt-1 uppercase tracking-tighter">Personalisasi tampilan Anda</p>
        </div>
        <button onclick="toggleAccMenu(false)" class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl sm:rounded-2xl hover:bg-white/20 flex items-center justify-center transition-all">
          <iconify-icon icon="lucide:x" class="text-xl sm:text-2xl"></iconify-icon>
        </button>
      </div>

      <div class="p-4 sm:p-6 max-h-[60vh] sm:max-h-[65vh] overflow-y-auto custom-scrollbar-orange bg-white">
        
        {{-- Banner Logic --}}
        <div id="accGuideOpen" class="bg-orange-50 rounded-xl sm:rounded-2xl p-3 sm:p-4 mb-4 sm:mb-6 flex items-center justify-center gap-2 sm:gap-3 text-orange-700 text-[10px] sm:text-[11px] font-black cursor-pointer hover:bg-orange-100 transition-all border border-orange-100 shadow-sm hover:shadow-md group">
          <iconify-icon icon="lucide:sparkles" class="text-base sm:text-lg animate-pulse group-hover:rotate-12 transition-transform"></iconify-icon>
          PANDUAN AKSESIBILITAS INKLUSIF
        </div>

        {{-- Main Grid --}}
        <div class="grid grid-cols-2 gap-3 sm:gap-4 mb-6 sm:mb-8">
          {{-- Contrast Stage --}}
          <button data-acc-type="contrast" class="acc-btn group" data-label-base="Kontras">
            <iconify-icon icon="material-symbols:contrast" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Kontras Standard</span>
          </button>
          
          {{-- Spacing Stage --}}
          <button data-acc-type="text-spacing" class="acc-btn group" data-label-base="Spasi">
            <iconify-icon icon="material-symbols:format-letter-spacing" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Spasi Standard</span>
          </button>

          {{-- Saturation Stage --}}
          <button data-acc-type="saturation" class="acc-btn group" data-label-base="Warna">
            <iconify-icon icon="lucide:droplet" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Warna Standard</span>
          </button>

          {{-- Bigger Text Stage --}}
          <button data-acc-type="bigger-text" class="acc-btn group" data-label-base="Teks">
            <span class="text-xl font-black group-[.active]:text-orange-600">tT</span>
            <span>Teks Standard</span>
          </button>

          {{-- Highlight Links --}}
          <button data-acc-type="highlight-links" class="acc-btn group">
            <iconify-icon icon="lucide:link-2" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Sorot Tautan</span>
          </button>

          {{-- Stop Animations --}}
          <button data-acc-type="stop-animations" class="acc-btn group">
            <iconify-icon icon="material-symbols:motion-photos-off" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Animasi Dijeda</span>
          </button>

          {{-- Hide Images --}}
          <button data-acc-type="hide-images" class="acc-btn group">
            <iconify-icon icon="lucide:image-off" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Sembunyikan Gambar</span>
          </button>

          {{-- Dyslexic Font --}}
          <button data-acc-type="dyslexic" class="acc-btn group">
            <span class="text-xl font-black group-[.active]:text-orange-600">Df</span>
            <span>Ramah Disleksia</span>
          </button>

          {{-- Bigger Cursor --}}
          <button data-acc-type="big-cursor" class="acc-btn group">
            <iconify-icon icon="material-symbols:mouse" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Kursor Besar</span>
          </button>

          {{-- Line Height Stage --}}
          <button data-acc-type="line-height" class="acc-btn group" data-label-base="Baris">
            <iconify-icon icon="material-symbols:format-line-spacing" class="text-2xl group-[.active]:text-orange-600"></iconify-icon>
            <span>Tinggi Baris</span>
          </button>

        </div>

        {{-- Accessibility Guide Modal --}}
        <div id="accGuideModal" class="hidden fixed inset-0 z-[1001] bg-black/60 backdrop-blur-sm flex items-center justify-center p-3 sm:p-4 transition-all duration-300">
          <div class="bg-white w-full max-w-lg rounded-[1.5rem] sm:rounded-[3rem] overflow-hidden shadow-[0_50px_100px_rgba(0,0,0,0.3)] border border-orange-100 animate-in fade-in zoom-in duration-300">
            {{-- Modal Header --}}
            <div class="bg-gradient-to-r from-orange-600 to-orange-500 p-5 sm:p-8 flex items-center justify-between text-white border-b border-orange-400">
              <div>
                <h3 class="font-black text-base sm:text-xl uppercase tracking-widest flex items-center gap-2 sm:gap-3">
                  <iconify-icon icon="lucide:info" class="text-xl sm:text-2xl"></iconify-icon>
                  Panduan Inklusif
                </h3>
                <p class="text-[9px] sm:text-xs font-bold opacity-80 mt-1 uppercase tracking-widest">SMK Prestasi Prima</p>
              </div>
              <button id="accGuideClose" class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl bg-white/10 hover:bg-white/20 flex items-center justify-center transition-all">
                <iconify-icon icon="lucide:x" class="text-xl sm:text-2xl"></iconify-icon>
              </button>
            </div>
            
            {{-- Modal Body --}}
            <div class="p-4 sm:p-8 max-h-[55vh] sm:max-h-[60vh] overflow-y-auto custom-scrollbar-orange space-y-4 sm:space-y-6">
              <div class="space-y-3 sm:space-y-4">
                {{-- Item 1 --}}
                <div class="flex gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl sm:rounded-2xl bg-orange-50 border border-orange-100 transition-all hover:bg-white hover:shadow-lg group">
                  <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 bg-white rounded-lg sm:rounded-xl shadow-sm flex items-center justify-center border border-orange-100 group-hover:bg-orange-600 transition-colors">
                    <iconify-icon icon="material-symbols:contrast" class="text-xl sm:text-2xl text-orange-600 group-hover:text-white"></iconify-icon>
                  </div>
                  <div class="flex-1">
                    <h4 class="font-black text-[10px] sm:text-xs uppercase tracking-widest text-orange-700">Mode Kontras</h4>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-500 leading-tight sm:leading-relaxed mt-0.5 sm:mt-1">Pilih tingkat kecerahan (Standard, Terang, Tinggi, atau Invert).</p>
                  </div>
                </div>

                {{-- Item 2 --}}
                <div class="flex gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl sm:rounded-2xl bg-orange-50 border border-orange-100 transition-all hover:bg-white hover:shadow-lg group">
                  <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 bg-white rounded-lg sm:rounded-xl shadow-sm flex items-center justify-center border border-orange-100 group-hover:bg-orange-600 transition-colors">
                    <span class="text-lg sm:text-xl font-black text-orange-600 group-hover:text-white">tT</span>
                  </div>
                  <div class="flex-1">
                    <h4 class="font-black text-[10px] sm:text-xs uppercase tracking-widest text-orange-700">Teks & Gaya</h4>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-500 leading-tight sm:leading-relaxed mt-0.5 sm:mt-1">Ubah ukuran font, spasi, dan mode ramah disleksia.</p>
                  </div>
                </div>

                {{-- Item 3 --}}
                <div class="flex gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl sm:rounded-2xl bg-orange-50 border border-orange-100 transition-all hover:bg-white hover:shadow-lg group">
                  <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 bg-white rounded-lg sm:rounded-xl shadow-sm flex items-center justify-center border border-orange-100 group-hover:bg-orange-600 transition-colors">
                    <iconify-icon icon="lucide:link-2" class="text-xl sm:text-2xl text-orange-600 group-hover:text-white"></iconify-icon>
                  </div>
                  <div class="flex-1">
                    <h4 class="font-black text-[10px] sm:text-xs uppercase tracking-widest text-orange-700">Navigasi</h4>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-500 leading-tight sm:leading-relaxed mt-0.5 sm:mt-1">Sorot tautan (links) atau gunakan kursor berukuran besar.</p>
                  </div>
                </div>

                {{-- Item 4 --}}
                <div class="flex gap-3 sm:gap-4 p-3 sm:p-4 rounded-xl sm:rounded-2xl bg-orange-50 border border-orange-100 transition-all hover:bg-white hover:shadow-lg group">
                  <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 bg-white rounded-lg sm:rounded-xl shadow-sm flex items-center justify-center border border-orange-100 group-hover:bg-orange-600 transition-colors">
                    <iconify-icon icon="material-symbols:motion-photos-off" class="text-xl sm:text-2xl text-orange-600 group-hover:text-white"></iconify-icon>
                  </div>
                  <div class="flex-1">
                    <h4 class="font-black text-[10px] sm:text-xs uppercase tracking-widest text-orange-700">Kontrol Visual</h4>
                    <p class="text-[10px] sm:text-[11px] font-bold text-gray-500 leading-tight sm:leading-relaxed mt-0.5 sm:mt-1">Hentikan animasi atau sembunyikan gambar untuk fokus.</p>
                  </div>
                </div>
              </div>
            </div>

            {{-- Modal Footer --}}
            <div class="p-5 sm:p-8 bg-orange-50 border-t border-orange-100 flex items-center justify-center text-center">
              <p class="text-[9px] sm:text-[10px] font-black text-orange-700 italic uppercase tracking-widest">Inklusivitas Adalah Prioritas Kami</p>
            </div>
          </div>
        </div>

        {{-- Reset Button --}}
        <button id="resetAcc" class="w-full bg-orange-600 text-white py-5 rounded-2xl font-black text-xs mb-8 flex items-center justify-center gap-3 hover:bg-orange-700 hover:scale-[1.02] transition-all shadow-xl shadow-orange-200 uppercase tracking-widest">
          <iconify-icon icon="lucide:rotate-ccw" class="text-lg"></iconify-icon>
          Reset Semua Pengaturan
        </button>

        <p class="text-center text-[10px] font-black text-gray-400 italic uppercase">Inspirasi & Inovasi: SMK Prestasi Prima</p>

      </div>
    </div>
  </div>

  @stack('scripts')
  
  <style>
    /* Custom Scrollbar Orange */
    .custom-scrollbar-orange::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar-orange::-webkit-scrollbar-track { background: #fff7ed; }
    .custom-scrollbar-orange::-webkit-scrollbar-thumb { 
      background: #fed7aa; 
      border-radius: 20px;
    }
    .custom-scrollbar-orange::-webkit-scrollbar-thumb:hover { background: #fb923c; }

    /* --- Accessibility Menu Buttons --- */
    .acc-btn {
      background-color: white;
      border: 2px solid #f9fafb;
      border-radius: 1.5rem;
      padding: 1.5rem 1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      cursor: pointer;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
    }
    .acc-btn:hover {
      border-color: #ffedd5;
      background-color: #fffaf5;
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(234, 88, 12, 0.05);
    }
    .acc-btn.active {
      border-color: #ea580c;
      background-color: #fff7ed;
      box-shadow: 0 15px 30px rgba(234, 88, 12, 0.1);
    }
    .acc-btn span {
      font-size: 10px;
      font-weight: 900;
      color: #4b5563;
      text-align: center;
      line-height: 1.2;
      text-transform: uppercase;
      tracking-tight;
    }
    .acc-btn.active span { color: #ea580c; }
    .acc-btn iconify-icon { color: #9ca3af; transition: color 0.3s; }
    .acc-btn.active iconify-icon { color: #ea580c; }

    /* --- Implementation Classes --- */
    
    /* Bigger Text */
    html.acc-bigger-text-1 { font-size: 112% !important; }
    html.acc-bigger-text-2 { font-size: 125% !important; }
    html.acc-bigger-text-3 { font-size: 145% !important; }

    /* Text Spacing */
    html.acc-text-spacing-1 * { letter-spacing: 0.08em !important; }
    html.acc-text-spacing-2 * { letter-spacing: 0.15em !important; word-spacing: 0.1em !important; }
    html.acc-text-spacing-3 * { letter-spacing: 0.25em !important; word-spacing: 0.2em !important; }

    /* Line Height */
    html.acc-line-height-1 * { line-height: 1.8 !important; }
    html.acc-line-height-2 * { line-height: 2.3 !important; }
    html.acc-line-height-3 * { line-height: 2.8 !important; }

    /* Saturation (Kejenuhan) */
    html.acc-saturation-1 #acc-content-wrapper { filter: saturate(0.5) !important; }
    html.acc-saturation-2 #acc-content-wrapper { filter: saturate(0) grayscale(1) !important; }
    html.acc-saturation-3 #acc-content-wrapper { filter: saturate(2.5) !important; }

    /* Contrast (Terang, Tinggi/B&W, Gelap/Invert) */
    html.acc-contrast-1 #acc-content-wrapper { filter: contrast(1.2) brightness(1.2) !important; } 
    html.acc-contrast-2 #acc-content-wrapper { filter: contrast(2) !important; background: #000 !important; }
    html.acc-contrast-2 #acc-content-wrapper * { color: #fff !important; border-color: #fff !important; }
    html.acc-contrast-3 #acc-content-wrapper { filter: invert(1) hue-rotate(180deg) !important; background: #fff !important; }

    /* Fixed Class Toggles */
    html.acc-highlight-links a { text-decoration: underline !important; background: #ea580c !important; color: #fff !important; padding: 0 4px !important; border-radius: 4px !important; }
    html.acc-stop-animations *, html.acc-stop-animations *::before, html.acc-stop-animations *::after { transition: none !important; animation: none !important; scroll-behavior: auto !important; }
    html.acc-hide-images img, html.acc-hide-images [style*="background-image"] { visibility: hidden !important; opacity: 0 !important; }
    html.acc-dyslexic body { font-family: 'OpenDyslexic', 'Comic Sans MS', cursive !important; }
    html.acc-big-cursor { cursor: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 24 24'%3E%3Cpath fill='%23ea580c' stroke='white' stroke-width='1' d='M7 2l12 11.2l-5.8.5l3.3 7.3l-2.2 1l-3.2-7.4L7 19V2z'/%3E%3C/svg%3E"), auto !important; }
    html.acc-big-cursor a, html.acc-big-cursor button { cursor: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 24 24'%3E%3Cpath fill='%23ea580c' stroke='white' stroke-width='1' d='M7 2l12 11.2l-5.8.5l3.3 7.3l-2.2 1l-3.2-7.4L7 19V2z'/%3E%3C/svg%3E"), pointer !important; }

    /* Target standard focus indicator */
    :focus-visible { outline: 3px solid #ea580c !important; outline-offset: 4px !important; }
  </style>

  <script>
    // === REFINED ACCESSIBILITY LOGIC ===
    const accToggle = document.getElementById('accToggle');
    const accMenu = document.getElementById('accMenu');
    const accBtns = document.querySelectorAll('.acc-btn');
    const resetBtn = document.getElementById('resetAcc');

    function toggleAccMenu(open) {
      const isCurrentlyOpen = accMenu.classList.contains('opacity-100');
      const shouldOpen = open !== undefined ? open : !isCurrentlyOpen;
      
      if (shouldOpen) {
        accMenu.classList.remove('opacity-0', 'translate-y-10', 'pointer-events-none');
        accMenu.classList.add('opacity-100', 'translate-y-0');
        accToggle.setAttribute('aria-expanded', 'true');
      } else {
        accMenu.classList.remove('opacity-100', 'translate-y-0');
        accMenu.classList.add('opacity-0', 'translate-y-10', 'pointer-events-none');
        accToggle.setAttribute('aria-expanded', 'false');
      }
    }

    accToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleAccMenu();
    });

    document.addEventListener('click', (e) => {
      if (accMenu.classList.contains('opacity-100') && !document.getElementById('accessibilityWidget').contains(e.target)) {
        toggleAccMenu(false);
      }
    });

    // === GUIDE MODAL LOGIC ===
    const accGuideOpen = document.getElementById('accGuideOpen');
    const accGuideClose = document.getElementById('accGuideClose');
    const accGuideModal = document.getElementById('accGuideModal');

    accGuideOpen.addEventListener('click', (e) => {
        e.stopPropagation();
        accGuideModal.classList.remove('hidden');
        accGuideModal.classList.add('flex');
    });

    accGuideClose.addEventListener('click', (e) => {
        e.stopPropagation();
        accGuideModal.classList.remove('flex');
        accGuideModal.classList.add('hidden');
    });

    accGuideModal.addEventListener('click', (e) => {
        if (e.target === accGuideModal) {
            accGuideModal.classList.remove('flex');
            accGuideModal.classList.add('hidden');
        }
    });

    const labels = {
        'bigger-text': ['Teks Standard', 'Teks Besar', 'Teks Ekstrim', 'Teks Super'],
        'text-spacing': ['Spasi Standard', 'Spasi Kecil', 'Spasi Sedang', 'Spasi Besar'],
        'line-height': ['Baris Standard', 'Baris Lega', 'Baris Luas', 'Baris Ekstrim'],
        'saturation': ['Warna Standard', 'Warna Redup', 'Monokrom', 'Warna Tajam'],
        'contrast': ['Kontras Standard', 'Kontras Terang', 'Kontras Tinggi', 'Kontras Gelap']
    };

    accBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const type = btn.dataset.accType;
        
        if (labels[type]) {
          // Multi-level setting
          let level = parseInt(btn.dataset.level || 0);
          if (level > 0) document.documentElement.classList.remove(`acc-${type}-${level}`);
          
          level = (level + 1) % 4; // 0, 1, 2, 3
          btn.dataset.level = level;
          
          if (level > 0) {
            document.documentElement.classList.add(`acc-${type}-${level}`);
            btn.classList.add('active');
            btn.querySelector('span').textContent = labels[type][level];
          } else {
            btn.classList.remove('active');
            btn.querySelector('span').textContent = labels[type][0];
          }
        } else {
          // Binary toggle
          const bodyClass = `acc-${type}`;
          const isActive = document.documentElement.classList.toggle(bodyClass);
          if (isActive) btn.classList.add('active');
          else btn.classList.remove('active');
        }
      });
    });

    resetBtn.addEventListener('click', () => {
      const accClasses = Array.from(document.documentElement.classList).filter(c => c.startsWith('acc-'));
      accClasses.forEach(c => document.documentElement.classList.remove(c));
      
      accBtns.forEach(btn => {
        btn.classList.remove('active');
        const type = btn.dataset.accType;
        if (btn.dataset.level) {
          btn.dataset.level = 0;
          btn.querySelector('span').textContent = labels[type][0];
        }
      });
    });

    // Back to top (Ensure it exists in layout)
    const bttBtn = document.getElementById('backToTop');
    if(bttBtn) {
      window.addEventListener('scroll', () => {
        if (window.scrollY > 400) {
          bttBtn.classList.remove('translate-y-20', 'opacity-0');
          bttBtn.classList.add('translate-y-0', 'opacity-100');
        } else {
          bttBtn.classList.add('translate-y-20', 'opacity-0');
          bttBtn.classList.remove('translate-y-0', 'opacity-100');
        }
      });
    }
  </script>
  @php
    $gaId = \App\Models\prestasiprima\SiteSetting::get('google_analytics_id');
  @endphp
  @if($gaId)
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $gaId }}');
    </script>
  @endif
</body>
</html>
