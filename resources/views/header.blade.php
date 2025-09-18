<!-- ================= HEADER (TOPBAR + NAVBAR) ================= -->
<header id="header" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent">

  <!-- ===== TOPBAR ===== -->
  <div class="topbar w-full bg-orange-600 text-white text-sm hidden md:flex transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-end px-4 md:px-8 py-2 w-full">
      <div class="flex items-center divide-x divide-white">

        <!-- Language -->
        <div class="flex items-center space-x-2 px-4">
          <a href="#"><img src="{{ asset('assets/images/bendera/id.png') }}" alt="ID" class="w-5 h-3"></a>
          <a href="#"><img src="{{ asset('assets/images/bendera/us.png') }}" alt="EN" class="w-5 h-3"></a>
        </div>

        <!-- Phone -->
        <div class="flex items-center space-x-2 px-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M3 5a2 2 0 012-2h3.3a1 1 0 01.95.7l1.3 3.9a1 1 0 01-.3 1.1L9.4 10.6a11 11 0 005 5l2-2a1 1 0 011.1-.3l3.9 1.3a1 1 0 01.7.9V19a2 2 0 01-2 2h-1C10.6 21 3 13.4 3 4V5z"/>
          </svg>
          <a href="tel:089599439033">0895 - 9943 - 9033</a>
        </div>

        <!-- Email -->
        <div class="flex items-center space-x-2 px-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M3 8l7.9 5.3a2 2 0 002.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
          <a href="mailto:halo@smkprestasiprima.ac.id">halo@smkprestasiprima.ac.id</a>
        </div>

      </div>
    </div>
  </div>

  <!-- ===== NAVBAR ===== -->
  <div class="navbar transition-all duration-300 bg-transparent">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 md:px-8 py-3">

      <!-- Logo -->
      <a href="/" class="flex items-center space-x-2">
        <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo" class="h-12">
        <span class="font-bold text-lg header-logo text-white">SMK Prestasi Prima</span>
      </a>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex space-x-6 font-medium header-menu">
        <a href="/" class="nav-link relative text-white">Beranda</a>

        <!-- Dropdown Tentang -->
        <div class="relative group">
          <a href="#" class="flex items-center nav-link text-white">
            Tentang
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </a>
          <div class="dropdown-menu absolute left-0 hidden bg-white shadow-lg border border-gray-200 mt-2 rounded-lg w-56 opacity-0 translate-y-2">
            <a href="{{ route('sambutan') }}" class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">Sambutan Pembina Yayasan</a>
            <a href="#" class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">Partner Industri</a>
          </div>
        </div>

        <a href="/program" class="nav-link text-white">Program</a>

        <!-- Dropdown Dokumentasi -->
        <div class="relative group">
          <a href="#" class="flex items-center nav-link text-white">
            Dokumentasi
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </a>
          <div class="dropdown-menu absolute left-0 hidden bg-white shadow-lg border border-gray-200 mt-2 rounded-lg w-40 opacity-0 translate-y-2">
            <a href="#" class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">Galeri</a>
            <a href="#" class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">Berita</a>
          </div>
        </div>

        <a href="/pendaftaran" class="nav-link text-white">Pendaftaran</a>
        <a href="/presmalance" class="nav-link text-white">PresmaLance</a>
      </nav>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
          <rect x="3" y="3" width="4" height="4"/>
          <rect x="10" y="3" width="4" height="4"/>
          <rect x="17" y="3" width="4" height="4"/>
          <rect x="3" y="10" width="4" height="4"/>
          <rect x="10" y="10" width="4" height="4"/>
          <rect x="17" y="10" width="4" height="4"/>
          <rect x="3" y="17" width="4" height="4"/>
          <rect x="10" y="17" width="4" height="4"/>
          <rect x="17" y="17" width="4" height="4"/>
        </svg>
      </button>

    </div>

    <!-- ===== MOBILE MENU ===== -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">

      <!-- Language Selector -->
      <div class="flex space-x-2 px-6 py-3">
        <img src="{{ asset('assets/images/bendera/id.png') }}" alt="ID" class="w-5 h-3">
        <img src="{{ asset('assets/images/bendera/us.png') }}" alt="EN" class="w-5 h-3">
      </div>

      <!-- Menu Links -->
      <a href="/" class="block px-6 py-3 mobile-link text-gray-800 font-medium">Beranda</a>

      <!-- Mobile Dropdown Tentang -->
      <button class="w-full flex justify-between items-center px-6 py-3 mobile-link text-gray-800 font-medium focus:outline-none mobile-dropdown-btn">
        Tentang
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div class="hidden flex-col bg-gray-50 mobile-submenu">
        <a href="{{ route('sambutan') }}" class="block px-10 py-2 mobile-link text-gray-800">Sambutan Pembina Yayasan</a>
        <a href="#" class="block px-10 py-2 mobile-link text-gray-800">Partner Industri</a>
      </div>

      <a href="/program" class="block px-6 py-3 mobile-link text-gray-800 font-medium">Program</a>

      <!-- Mobile Dropdown Dokumentasi -->
      <button class="w-full flex justify-between items-center px-6 py-3 mobile-link text-gray-800 font-medium focus:outline-none mobile-dropdown-btn">
        Dokumentasi
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div class="hidden flex-col bg-gray-50 mobile-submenu">
        <a href="#" class="block px-10 py-2 mobile-link text-gray-800">Galeri</a>
        <a href="#" class="block px-10 py-2 mobile-link text-gray-800">Berita</a>
      </div>

      <a href="/pendaftaran" class="block px-6 py-3 mobile-link text-gray-800 font-medium">Pendaftaran</a>
      <a href="/presmalance" class="block px-6 py-3 mobile-link text-gray-800 font-medium">PresmaLance</a>

    </div>
  </div>
</header>

<!-- ================= SCRIPT ================= -->
<script>
  // ===== Desktop Dropdown =====
  document.querySelectorAll('.group').forEach(drop => {
    const menu = drop.querySelector('.dropdown-menu');
    drop.addEventListener('mouseenter', () => {
      menu.classList.remove('hidden','opacity-0','translate-y-2');
      menu.classList.add('opacity-100','translate-y-0');
    });
    drop.addEventListener('mouseleave', () => {
      menu.classList.remove('opacity-100','translate-y-0');
      menu.classList.add('opacity-0','translate-y-2');
      setTimeout(() => menu.classList.add('hidden'), 300);
    });
  });

  // ===== Mobile Menu Toggle =====
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });

  // ===== Mobile Dropdown Toggle =====
  document.querySelectorAll('.mobile-dropdown-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const submenu = btn.nextElementSibling;
      const icon = btn.querySelector('svg');
      submenu.classList.toggle('hidden');
      icon.classList.toggle('rotate-180');
    });
  });

  // ===== Scroll & Navbar Color =====
  const headerEl = document.getElementById('header');
  const logoEl = document.querySelector('.header-logo');
  const navLinkEls = document.querySelectorAll('.nav-link');
  const mobileLinkEls = document.querySelectorAll('.mobile-link');
  const isHomePage = window.location.pathname === '/';

  function updateNavbarColor() {
    if(isHomePage) {
      if(window.scrollY > 50) {
        headerEl.classList.add('bg-white','shadow');
        logoEl.classList.replace('text-white','text-orange-600');
        navLinkEls.forEach(l => l.classList.replace('text-white','text-orange-600'));
        mobileLinkEls.forEach(l => l.classList.replace('text-white','text-orange-600'));
      } else {
        headerEl.classList.remove('bg-white','shadow');
        logoEl.classList.replace('text-orange-600','text-white');
        navLinkEls.forEach(l => l.classList.replace('text-orange-600','text-white'));
        mobileLinkEls.forEach(l => l.classList.replace('text-orange-600','text-white'));
      }
    } else {
      headerEl.classList.add('bg-white','shadow');
      logoEl.classList.replace('text-white','text-orange-600');
      navLinkEls.forEach(l => l.classList.replace('text-white','text-orange-600'));
      mobileLinkEls.forEach(l => l.classList.replace('text-white','text-orange-600'));
    }
  }

  window.addEventListener('scroll', updateNavbarColor);
  updateNavbarColor();

  // ===== Active Links =====
  const currentURL = window.location.href;
  navLinkEls.forEach(link => { 
    if(link.href === currentURL) link.classList.add('border-b-2','border-orange-500'); 
  });
  mobileLinkEls.forEach(link => { 
    if(link.href === currentURL) link.classList.add('font-semibold','bg-orange-100','rounded-md'); 
  });
</script>

<!-- ================= STYLES ================= -->
<style>
  .dropdown-menu, .mobile-submenu { transition: all 0.3s ease; }
  .rotate-180 { transform: rotate(180deg); transition: transform 0.3s ease; }
  .mobile-link { transition: all 0.3s ease; }
  .mobile-link:hover { background-color: #fff7ed; color: #ea580c; }
</style>
