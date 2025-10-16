<aside id="sidebar"
    class="fixed top-0 left-0 h-full w-64 bg-white border-r shadow-lg z-50 flex flex-col transition-transform duration-300 z-[10000]">

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

        <!-- User Details -->
        <div class="flex flex-col w-full min-w-0">
            <!-- Nama -->
            <p class="font-semibold text-sm truncate" title="Ilham Ramadan">
                Ilham Ramadan
            </p>
            <div class="flex items-center justify-between">
                <!-- Email -->
                <span class="text-xs text-gray-500 truncate" title="ilhamramadan@smkprestasiprima.sch.id">
                    ilhamramadan@smkprestasiprima.sch.id
                </span>
                <!-- Role -->
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-green-100 text-green-600 capitalize">
                    admin
                </span>
            </div>
        </div>
    </div>

    <!-- ================= MENU ================= -->
    <nav class="flex-1 overflow-y-auto p-3 text-sm">

        <!-- UTAMA -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-3">Utama</p>
        <a href="{{ route('siakad.dashboard') }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-dashboard-line text-lg"></i>
            <span>Dashboard</span>
        </a>

        <!-- AKADEMIK -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-4">Akademik</p>
        <a href="{{ route('majors.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-book-2-line text-lg"></i>
            <span>Jurusan</span>
        </a>
        <a href="{{ route('classes.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-stack-line text-lg"></i>
            <span>Kelas</span>
        </a>
        <a href="{{ route('students.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-user-3-line text-lg"></i>
            <span>Siswa</span>
        </a>
        <a href="{{ route('teacher.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-presentation-line text-lg"></i>
            <span>Guru</span>
        </a>
        {{-- ✅ Tambahan menu Mata Pelajaran --}}
        <a href="{{ route('subjects.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-book-open-line text-lg"></i>
            <span>Mata Pelajaran</span>
        </a>
        <a href="{{ route('absence.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-calendar-check-line text-lg"></i>
            <span>Absensi</span>
        </a>
        <a href="{{ route('scores.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-bar-chart-2-line text-lg"></i>
            <span>Nilai & Rapor</span>
        </a>

        <!-- KEGIATAN -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-4">Kegiatan</p>
        <a href="{{ route('announcements.index') ?? '#' }}"
           class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
           text-gray-700 hover:bg-orange-50 hover:text-orange-600">
            <i class="ri-megaphone-line text-lg"></i>
            <span>Pengumuman</span>
        </a>

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
