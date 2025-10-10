<!-- ================= SIDEBAR + TOGGLE RESPONSIVE ================= -->
<!-- Navbar / Topbar (muncul di layar kecil) -->
<header class="flex items-center justify-between bg-white border-b h-16 px-4 shadow-sm lg:hidden z-50">
  <button id="sidebarToggle" class="text-gray-700 text-2xl focus:outline-none">
    <i class="ri-menu-line"></i>
  </button>
  <h1 class="font-semibold text-gray-800 text-lg">SIAKAD</h1>
</header>

<!-- Sidebar -->
<aside id="sidebar"
    class="fixed top-0 left-0 h-full w-64 bg-white border-r shadow-lg z-50 flex flex-col transition-transform duration-300">

  <!-- ================= LOGO ================= -->
  <div class="h-20 flex items-center border-b px-5">
    <div class="flex items-center space-x-3">
      <!-- Icon -->
      <div class="w-10 h-10 bg-orange-500 text-white rounded-lg flex items-center justify-center">
        <i class="ri-graduation-cap-line text-xl"></i>
      </div>
      <!-- Text -->
      <div>
        <h1 class="text-base font-bold">SIAKAD</h1>
        <p class="text-sm text-gray-500">Prestasi Prima</p>
      </div>
    </div>
  </div>

  <!-- ================= USER INFO ================= -->
  <div class="flex items-center space-x-3 p-4 border-b">
    <!-- Avatar -->
    <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">
      I
    </div>

<<<<<<< HEAD
    <!-- User Details -->
    <div class="flex flex-col w-full min-w-0">
      <p class="font-semibold text-sm truncate" title="Ilham Ramadan">
        Ilham Ramadan
      </p>
      <div class="flex items-center justify-between">
        <span class="text-xs text-gray-500 truncate" title="ilhamramadan@smkprestasiprima.sch.id">
          ilhamramadan@smkprestasiprima.sch.id
        </span>
        <span class="text-[10px] px-2 py-0.5 rounded-full bg-green-100 text-green-600 capitalize">
          admin
        </span>
      </div>
=======
    <!-- ================= USER INFO ================= -->
    <div class="flex items-center space-x-3 p-4 border-b">
        <!-- Avatar -->
        <div class="w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">
            I
        </div>

        <!-- User Details -->
        <div class="flex flex-col w-full min-w-0">
            <p class="font-semibold text-sm truncate" title="Ilham Ramadan">
                Ilham Ramadan
            </p>
            <div class="flex items-center justify-between">
                <span class="text-xs text-gray-500 truncate" title="ilhamramadan@smkprestasiprima.sch.id">
                    ilhamramadan@smkprestasiprima.sch.id
                </span>
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-green-100 text-green-600 capitalize">
                    admin
                </span>
            </div>
        </div>
>>>>>>> c4ec90b (update sidebar)
    </div>
  </div>

  <!-- ================= MENU ================= -->
<nav class="flex-1 overflow-y-auto p-3 text-sm">

        <!-- UTAMA -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-3">Utama</p>
        <a href="{{ route('siakad.dashboard') }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('siakad.dashboard') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-dashboard-line text-lg"></i>
            <span>Dashboard</span>
        </a>

        <!-- AKADEMIK -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-4">Akademik</p>
<<<<<<< HEAD
=======
        <a href="{{ route('majors.index') ?? '#' }}"

>>>>>>> c4ec90b (update sidebar)
        <a href="{{ route('majors.index') ?? '#' }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('majors.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-book-2-line text-lg"></i>
            <span>Jurusan</span>
        </a>
<<<<<<< HEAD
=======
        <a href="{{ route('classes.index') ?? '#' }}"

>>>>>>> c4ec90b (update sidebar)
        <a href="{{ route('classes.index') ?? '#' }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('classes.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-stack-line text-lg"></i>
            <span>Kelas</span>
        </a>
<<<<<<< HEAD
=======
        <a href="{{ route('students.index') ?? '#' }}"

>>>>>>> c4ec90b (update sidebar)
        <a href="{{ route('students.index') ?? '#' }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('students.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-user-3-line text-lg"></i>
            <span>Siswa</span>
        </a>
<<<<<<< HEAD
=======
        <a href="{{ route('teacher.index') ?? '#' }}"

>>>>>>> c4ec90b (update sidebar)
        <a href="{{ route('teacher.index') ?? '#' }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('teacher.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-presentation-line text-lg"></i>
            <span>Guru</span>
        </a>
        {{-- ✅ Tambahan menu Mata Pelajaran --}}
<<<<<<< HEAD
=======
        <a href="{{ route('subjects.index') ?? '#' }}"

>>>>>>> c4ec90b (update sidebar)
        <a href="{{ route('subjects.index') ?? '#' }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('subjects.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-book-open-line text-lg"></i>
            <span>Mata Pelajaran</span>
        </a>
<<<<<<< HEAD
=======
        <a href="{{ route('absence.index') ?? '#' }}"

>>>>>>> c4ec90b (update sidebar)
        <a href="{{ route('absence.index') ?? '#' }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('absence.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-calendar-check-line text-lg"></i>
            <span>Absensi</span>
        </a>
<<<<<<< HEAD
=======
        <a href="{{ route('scores.index') ?? '#' }}"

>>>>>>> c4ec90b (update sidebar)
        <a href="{{ route('scores.index') ?? '#' }}" 
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('scores.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-bar-chart-2-line text-lg"></i>
            <span>Nilai & Rapor</span>
        </a>

<<<<<<< HEAD
  <!-- KEGIATAN -->
  <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-4">Kegiatan</p>
  <a href="{{ route('announcements.index') ?? '#' }}"
     class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
     {{ request()->routeIs('announcements.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
      <i class="ri-megaphone-line text-lg"></i>
      <span>Pengumuman</span>
  </a>
=======
        <!-- KEGIATAN -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-4">Kegiatan</p>
        <a href="{{ route('announcements.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           {{ request()->routeIs('announcements.*') ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600' }}">
            <i class="ri-megaphone-line text-lg"></i>
            <span>Pengumuman</span>
        </a>
>>>>>>> c4ec90b (update sidebar)

        <!-- LOGOUT -->
        <div class="border-t mt-4 pt-3">
            <a href="{{ route('siakad.logout') ?? '#' }}" 
               class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
               text-red-600 hover:bg-red-50">
                <i class="ri-logout-box-r-line text-lg"></i>
                <span>Logout</span>
            </a>
        </div>
    </nav>
</aside>

<!-- Overlay -->
<div id="sidebarOverlay" 
  class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity duration-300"></div>

<!-- Script -->
<script>
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');
  const toggle = document.getElementById('sidebarToggle');

  toggle.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
  });
</script>
