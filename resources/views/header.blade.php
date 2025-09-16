<!-- ================= HEADER (TOPBAR + NAVBAR) ================= -->
<header id="header"
  class="fixed top-0 left-0 w-full z-50 transition-all duration-300 
  {{ Request::is('/') ? 'bg-transparent' : 'bg-white shadow' }}">

  <!-- TOPBAR -->
  <div class="topbar w-full bg-orange-600 text-white text-sm hidden md:flex transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-end px-4 md:px-8 py-2 w-full">
      <div class="flex items-center divide-x divide-white">

        <!-- Language -->
        <div class="flex items-center space-x-2 px-4">
          <img src="assets/images/id.png" alt="ID" class="w-5 h-3">
          <img src="assets/images/us.png" alt="EN" class="w-5 h-3">
        </div>

        <!-- Phone -->
        <div class="flex items-center space-x-2 px-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 5a2 2 0 012-2h3.3a1 1 0 01.95.7l1.3 3.9a1 1 0 01-.3 1.1L9.4 10.6a11 11 0 005 5l2-2a1 1 0 011.1-.3l3.9 1.3a1 1 0 01.7.9V19a2 2 0 01-2 2h-1C10.6 21 3 13.4 3 4V5z" />
          </svg>
          <span>0895 - 9943 - 9033</span>
        </div>

        <!-- Email -->
        <div class="flex items-center space-x-2 px-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 8l7.9 5.3a2 2 0 002.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          <span>halo@smkprestasiprima.ac.id</span>
        </div>

      </div>
    </div>
  </div>

  <!-- NAVBAR -->
  <div class="navbar transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 md:px-8 py-3">

      <!-- Logo -->
      <a href="{{ route('home') }}" class="flex items-center space-x-2">
        <img src="assets/images/logo.webp" alt="Logo" class="h-12">
        <span class="font-bold text-lg 
          {{ Request::is('/') ? 'text-white' : 'text-orange-600' }}">
          SMK Prestasi Prima
        </span>
      </a>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex space-x-6 font-medium 
        {{ Request::is('/') ? 'text-white' : 'text-orange-600' }}">
        <a href="{{ route('home') }}" class="hover:text-orange-300">Beranda</a>

        <!-- Dropdown Tentang -->
        <div class="relative group dropdown">
          <a href="#" class="flex items-center hover:text-orange-300">
            Tentang
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </a>
          <div
            class="dropdown-menu absolute left-0 hidden group-hover:block bg-white shadow-lg border border-gray-200 mt-2 rounded-lg w-56 opacity-0 translate-y-2 transition-all duration-300">
            <a href="{{ route('sambutan') }}"
              class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">
              Sambutan Pembina Yayasan
            </a>
            <a href="#"
              class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">
              Partner Industri
            </a>
          </div>
        </div>

        <a href="#" class="hover:text-orange-300">Program</a>

        <!-- Dropdown Dokumentasi -->
        <div class="relative group dropdown">
          <a href="#" class="flex items-center hover:text-orange-300">
            Dokumentasi
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 9l-7 7-7-7" />
            </svg>
          </a>
          <div
            class="dropdown-menu absolute left-0 hidden group-hover:block bg-white shadow-lg border border-gray-200 mt-2 rounded-lg w-40 opacity-0 translate-y-2 transition-all duration-300">
            <a href="{{ route('galeri') }}"
              class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">
              Galeri
            </a>
            <a href="#"
              class="dropdown-link block px-4 py-2 text-gray-800 hover:bg-orange-500 hover:text-white rounded-md">
              Berita
            </a>
          </div>
        </div>

        <a href="{{ route('pendaftaran') }}" class="hover:text-orange-300">Pendaftaran</a>
        <a href="{{ route('presmalance.welcome') }}" class="hover:text-orange-300">PresmaLance</a>
      </nav>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
      <a href="{{ route('home') }}"
        class="block px-6 py-3 text-gray-700 hover:bg-orange-500 hover:text-white">Beranda</a>
      <a href="#"
        class="block px-6 py-3 text-gray-700 hover:bg-orange-500 hover:text-white">Tentang</a>
      <a href="#"
        class="block px-6 py-3 text-gray-700 hover:bg-orange-500 hover:text-white">Program</a>
      <a href="#"
        class="block px-6 py-3 text-gray-700 hover:bg-orange-500 hover:text-white">Dokumentasi</a>
      <a href="#"
        class="block px-6 py-3 text-gray-700 hover:bg-orange-500 hover:text-white">Pendaftaran</a>
      <a href="#"
        class="block px-6 py-3 text-gray-700 hover:bg-orange-500 hover:text-white">PresmaLance</a>
    </div>
  </div>
</header>

<!-- ================= SCRIPT ================= -->
<script>
  // Animasi hover dropdown
  document.querySelectorAll('.dropdown').forEach(drop => {
    const menu = drop.querySelector('.dropdown-menu');
    drop.addEventListener('mouseenter', () => {
      menu.classList.remove('hidden');
      setTimeout(() => {
        menu.classList.remove('opacity-0', 'translate-y-2');
        menu.classList.add('opacity-100', 'translate-y-0');
      }, 10);
    });
    drop.addEventListener('mouseleave', () => {
      menu.classList.add('opacity-0', 'translate-y-2');
      menu.classList.remove('opacity-100', 'translate-y-0');
      setTimeout(() => {
        if (menu.classList.contains('opacity-0')) menu.classList.add('hidden');
      }, 300);
    });
  });

  // Tutup dropdown kalau klik di luar
  window.addEventListener('click', e => {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      if (!menu.contains(e.target) && !e.target.closest('.dropdown')) {
        menu.classList.add('hidden', 'opacity-0', 'translate-y-2');
        menu.classList.remove('opacity-100', 'translate-y-0');
      }
    });
  });

  // Mobile menu toggle
  const menuBtn = document.getElementById("menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");
  menuBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
  });

  // Scroll effect (topbar + navbar ikut turun)
  const header = document.getElementById("header");
  const links = header.querySelectorAll("nav a:not(.dropdown-link)");
  const isHome = "{{ Request::is('/') ? 'true' : 'false' }}" === "true";

  window.addEventListener("scroll", () => {
    if (isHome) {
      // === Halaman HOME ===
      if (window.scrollY > 50) {
        header.classList.remove("bg-transparent");
        header.classList.add("bg-white", "shadow");
        links.forEach(a => {
          a.classList.remove("text-white");
          a.classList.add("text-gray-700");
        });
      } else {
        header.classList.add("bg-transparent");
        header.classList.remove("bg-white", "shadow");
        links.forEach(a => {
          a.classList.remove("text-gray-700");
          a.classList.add("text-white");
        });
      }
    } else {
      // === Halaman selain HOME ===
      if (window.scrollY > 50) {
        header.classList.add("shadow");
      } else {
        header.classList.remove("shadow");
      }
      // Link tetap default (tidak diubah ke putih)
    }
  });
</script>