<!-- ========== HEADER ========== -->
<header id="header" 
  class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent">

  <!-- TOPBAR -->
  <div class="hidden md:flex bg-orange-600 text-white text-sm">
    <div class="max-w-7xl mx-auto w-full flex justify-end">
      <div class="flex items-center divide-x divide-white px-4 py-2 rounded-bl-lg">

        <!-- Bahasa -->
        <div class="flex items-center space-x-2 px-4">
          <img src="{{ asset('assets/images/bendera/id.png') }}" alt="ID" class="w-5 h-3">
          <img src="{{ asset('assets/images/bendera/us.png') }}" alt="EN" class="w-5 h-3">
        </div>

        <!-- Telepon -->
        <div class="flex items-center space-x-2 px-4">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 5a2 2 0 012-2h3.3l1.3 3.9-1.9 2a11 11 0 005 5l2-2 3.9 1.3V19a2 2 0 01-2 2h-1C10.6 21 3 13.4 3 4V5z"/>
          </svg>
          <a href="tel:089599439033">0895 - 9943 - 9033</a>
        </div>

        <!-- Email -->
        <div class="flex items-center space-x-2 px-4">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 8l7.9 5.3a2 2 0 002.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
          <a href="mailto:halo@smkprestasiprima.ac.id">halo@smkprestasiprima.ac.id</a>
        </div>

      </div>
    </div>
  </div>

  <!-- NAVBAR -->
  <div class="navbar transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 md:px-8 py-3">

      <!-- Logo -->
      <a href="/" class="flex items-center space-x-2">
        <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo" class="h-12">
        <span class="font-bold text-lg header-logo text-white">SMK Prestasi Prima</span>
      </a>

      <!-- Desktop Menu -->
      <nav class="hidden md:flex space-x-6 font-medium">
        <a href="/" class="nav-link text-white">Beranda</a>

        <!-- Tentang -->
        <div class="dropdown relative group">
          <a href="#" class="nav-link flex items-center text-white">
            Tentang
            <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </a>
          <div class="dropdown-menu absolute left-0 hidden opacity-0 translate-y-3 bg-white shadow-lg border mt-2 rounded-lg w-56 text-gray-800">
            <a href="{{ route('sambutan') }}" class="dropdown-item">Sambutan Pembina Yayasan</a>
            <a href="#" class="dropdown-item">Partner Industri</a>
          </div>
        </div>

        <a href="/program" class="nav-link text-white">Program</a>

        <!-- Dokumentasi -->
        <div class="dropdown relative group">
          <a href="#" class="nav-link flex items-center text-white">
            Dokumentasi
            <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </a>
          <div class="dropdown-menu absolute left-0 hidden opacity-0 translate-y-3 bg-white shadow-lg border mt-2 rounded-lg w-40 text-gray-800">
            <a href="#" class="dropdown-item">Galeri</a>
            <a href="#" class="dropdown-item">Berita</a>
          </div>
        </div>

        <a href="/pendaftaran" class="nav-link text-white">Pendaftaran</a>
        <a href="/presmalance" class="nav-link text-white">PresmaLance</a>
      </nav>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg class="w-7 h-7 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
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

    <!-- MOBILE MENU -->
    <div id="mobile-menu" class="md:hidden bg-white shadow-lg hidden">
      <div class="flex space-x-2 px-6 py-3">
        <img src="{{ asset('assets/images/bendera/id.png') }}" alt="ID" class="w-5 h-3">
        <img src="{{ asset('assets/images/bendera/us.png') }}" alt="EN" class="w-5 h-3">
      </div>

      <a href="/" class="mobile-link">Beranda</a>

      <button class="mobile-dropdown-btn">
        Tentang
        <svg class="w-4 h-4 ml-2 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div class="mobile-submenu">
        <a href="{{ route('sambutan') }}" class="mobile-subitem">Sambutan Pembina Yayasan</a>
        <a href="#" class="mobile-subitem">Partner Industri</a>
      </div>

      <a href="/program" class="mobile-link">Program</a>

      <button class="mobile-dropdown-btn">
        Dokumentasi
        <svg class="w-4 h-4 ml-2 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div class="mobile-submenu">
        <a href="#" class="mobile-subitem">Galeri</a>
        <a href="#" class="mobile-subitem">Berita</a>
      </div>

      <a href="/pendaftaran" class="mobile-link">Pendaftaran</a>
      <a href="/presmalance" class="mobile-link">PresmaLance</a>
    </div>
  </div>
</header>

<!-- SCRIPT -->
<script>
  // Desktop dropdown hover
  document.querySelectorAll('.dropdown').forEach(drop => {
    const menu = drop.querySelector('.dropdown-menu');
    let timeout;
    drop.addEventListener('mouseenter', () => {
      clearTimeout(timeout);
      menu.classList.remove('hidden');
      setTimeout(() => menu.classList.add('opacity-100','translate-y-0'), 10);
    });
    drop.addEventListener('mouseleave', () => {
      menu.classList.remove('opacity-100','translate-y-0');
      timeout = setTimeout(() => menu.classList.add('hidden'), 200);
    });
  });

  // Mobile menu toggle
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  let open = false;

  menuBtn.addEventListener('click', () => {
    open = !open;
    if (open) {
      mobileMenu.classList.remove('hidden');
      requestAnimationFrame(() => mobileMenu.classList.add('open'));
    } else {
      mobileMenu.classList.remove('open');
      setTimeout(() => mobileMenu.classList.add('hidden'), 300);
    }
  });

  // Mobile dropdown toggle
  document.querySelectorAll('.mobile-dropdown-btn').forEach(btn => {
    const submenu = btn.nextElementSibling;
    const icon = btn.querySelector('svg');
    btn.addEventListener('click', () => {
      submenu.classList.toggle('open');
      icon.classList.toggle('rotate-180');
    });
  });

  // Scroll & color header
  const headerEl = document.getElementById('header'),
        logoEl = document.querySelector('.header-logo'),
        navLinkEls = document.querySelectorAll('.nav-link'),
        isHomePage = window.location.pathname === '/';

  function updateNavbarColor() {
    const isMobile = window.innerWidth < 768;
    if (isMobile) {
      headerEl.classList.add('bg-white','shadow');
      headerEl.classList.remove('bg-transparent');
      logoEl.classList.replace('text-white','text-orange-600');
      navLinkEls.forEach(l => l.classList.replace('text-white','text-orange-600'));
    } else if (isHomePage) {
      if (window.scrollY > 50) {
        headerEl.classList.add('bg-white','shadow');
        logoEl.classList.replace('text-white','text-orange-600');
        navLinkEls.forEach(l => l.classList.replace('text-white','text-orange-600'));
      } else {
        headerEl.classList.remove('bg-white','shadow');
        logoEl.classList.replace('text-orange-600','text-white');
        navLinkEls.forEach(l => l.classList.replace('text-orange-600','text-white'));
      }
    } else {
      headerEl.classList.add('bg-white','shadow');
      logoEl.classList.replace('text-white','text-orange-600');
      navLinkEls.forEach(l => l.classList.replace('text-white','text-orange-600'));
    }
  }

  window.addEventListener('scroll', updateNavbarColor);
  window.addEventListener('resize', updateNavbarColor);
  updateNavbarColor();

// Animasi kompleks saat halaman load
window.addEventListener("DOMContentLoaded", () => {
  const header = document.getElementById("header");
  const topbar = header.querySelector(".topbar");
  const navbar = header.querySelector(".navbar");
  const logo = header.querySelector(".header-logo");
  const navItems = header.querySelectorAll(".nav-link");

  // Header utama
  header.classList.add("animate-header");

  // Bagian dalam
  if (topbar) topbar.classList.add("animate-topbar");
  if (navbar) navbar.classList.add("animate-navbar");
  if (logo) logo.classList.add("animate-logo");

  // Menu item dengan staggered delay
  navItems.forEach((item, index) => {
    item.classList.add("animate-nav-item");
    item.style.animationDelay = `${0.9 + index * 0.15}s`; // jeda per item
  });
});


</script>

<style>
/* ===============================
   GENERAL TRANSITIONS
================================== */
.dropdown-menu,
.mobile-submenu,
.rotate-180,
.nav-link,
.dropdown-item,
.mobile-link,
.mobile-dropdown-btn,
.mobile-subitem {
  transition: all .3s ease;
}

/* ===============================
   DESKTOP NAVIGATION
================================== */
.nav-link {
  position: relative;
  transition: color .3s ease;
}

/* Hover underline effect */
.nav-link::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -2px;
  width: 0;
  height: 2px;
  background: #EA580C; /* oranye */
  transition: width .3s ease;
}

.nav-link:hover {
  color: #EA580C;
}
.nav-link:hover::after {
  width: 100%;
}

/* Saat header putih → pakai oranye tua */
#header.bg-white .nav-link:hover {
  color: #C2410C;
}
#header.bg-white .nav-link::after {
  background: #C2410C;
}

/* Dropdown items (desktop) */
.dropdown-item {
  display: block;
  padding: .5rem 1rem;
  border-radius: .375rem;
  transition: background-color .3s ease, color .3s ease;
}
.dropdown-item:hover {
  background: #EA580C;
  color: #fff;
}

/* Icon rotate for dropdown */
.rotate-180 {
  transform: rotate(180deg);
}

/* ===============================
   MOBILE NAVIGATION
================================== */

/* Link utama */
.mobile-link {
  display: block;
  padding: .75rem 1.5rem;
  font-weight: 500;
  color: #374151;
}
.mobile-link:hover {
  background: #fff7ed;
  color: #EA580C;
}

/* Tombol dropdown */
.mobile-dropdown-btn {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: .75rem 1.5rem;
  font-weight: 500;
  color: #374151;
}
.mobile-dropdown-btn:hover {
  background: #fff7ed;
  color: #EA580C;
}

/* Subitem dropdown */
.mobile-subitem {
  display: block;
  padding: .5rem 2.5rem;
  color: #374151;
}
.mobile-subitem:hover {
  background: #fff7ed;
  color: #EA580C;
}

/* ===============================
   MOBILE MENU ANIMATION
================================== */
#mobile-menu {
  overflow: hidden;
  max-height: 0;
  opacity: 0;
  transform: translateY(-8px);
  transition: max-height .4s ease-in-out,
              opacity .35s ease-in-out,
              transform .35s ease-in-out;
}
#mobile-menu.open {
  max-height: 800px;
  opacity: 1;
  transform: translateY(0);
}
#mobile-menu.closing {
  transition: max-height .6s ease-in-out,
              opacity .5s ease-in-out,
              transform .5s ease-in-out;
}

/* Submenu animation */
.mobile-submenu {
  overflow: hidden;
  max-height: 0;
  opacity: 0;
  transform: translateY(-5px);
  transition: max-height .35s ease-in-out,
              opacity .3s ease-in-out,
              transform .3s ease-in-out;
}
.mobile-submenu.open {
  max-height: 300px;
  opacity: 1;
  transform: translateY(0);
}
.mobile-submenu.closing {
  transition: max-height .55s ease-in-out,
              opacity .45s ease-in-out,
              transform .45s ease-in-out;
}

/* ===============================
   MOBILE HEADER STYLING
================================== */
@media (max-width: 768px) {
  #header {
    background-color: #fff !important;
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  #header .header-logo {
    color: #EA580C !important;
  }
  #header .nav-link {
    color: #EA580C !important;
  }
}

/* ===============================
   HEADER ENTRANCE ANIMATION (Complex)
================================== */
@keyframes headerSlideDown {
  0% {
    opacity: 0;
    transform: translateY(-60px);
  }
  70% {
    opacity: 0.9;
    transform: translateY(8px); /* overshoot */
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-header {
  animation: headerSlideDown 1.6s cubic-bezier(0.19, 1, 0.22, 1) forwards;
}

/* Topbar muncul dari atas */
@keyframes fadeDown {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-topbar {
  animation: fadeDown 1.4s ease forwards;
  animation-delay: 0.3s;
  opacity: 0;
}

/* Navbar muncul dari bawah */
@keyframes fadeUp {
  0% {
    opacity: 0;
    transform: translateY(25px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-navbar {
  animation: fadeUp 1.4s ease forwards;
  animation-delay: 0.5s;
  opacity: 0;
}

/* Logo efek zoom in */
@keyframes fadeZoom {
  0% {
    opacity: 0;
    transform: scale(0.95);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}
.animate-logo {
  animation: fadeZoom 1.2s ease forwards;
  animation-delay: 0.7s;
  opacity: 0;
}

/* Menu items staggered */
.animate-nav-item {
  opacity: 0;
  transform: translateY(15px);
  animation: fadeUp 1s ease forwards;
}


</style>