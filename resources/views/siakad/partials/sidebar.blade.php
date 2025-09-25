<!-- Wrapper -->
<div x-data="{ open: false }" class="flex">

    <!-- Tombol Hamburger (Mobile) -->
    <header
        class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white border-b flex items-center justify-between px-4 py-3">
        <button @click="open = !open" class="text-gray-700 focus:outline-none">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        <h1 class="text-sm font-bold">SIAKAD</h1>
    </header>

    <!-- Overlay -->
    <div x-show="open" x-transition.opacity @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden">
    </div>

    <!-- Sidebar -->
    <aside
        class="fixed lg:static top-0 left-0 w-64 bg-white border-r min-h-screen flex flex-col z-50 transform transition-transform duration-300"
        :class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        {{-- Logo --}}
        <div class="p-6 flex items-center gap-3 border-b">
            <div class="bg-orange-500 text-white p-3 rounded-2xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 14l6.16-3.422A12.083 12.083 0 0118 20.944a11.954 11.954 0 01-12 0 12.083 12.083 0 01-.16-10.366L12 14z" />
                </svg>
            </div>
            <div>
                <h1 class="text-sm font-bold leading-tight">SIAKAD</h1>
                <p class="text-xs text-gray-500">Prestasi Prima</p>
            </div>
        </div>

        {{-- User profile --}}
        <div class="p-4 border-b">
            <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div
                        class="bg-orange-500 text-white w-12 h-12 rounded-full flex items-center justify-center text-lg font-bold flex-shrink-0 shadow-sm">
                        A
                    </div>
                    <div class="min-w-0">
                        <div class="text-sm font-semibold text-gray-800 truncate">
                            {{ Auth::guard('siakad')->user()->name }}
                        </div>
                        <div class="text-xs text-gray-500 truncate"> {{ Auth::guard('siakad')->user()->email }}</div>
                    </div>
                </div>
                <span class="text-xs px-2 py-0.5 rounded-full bg-green-100 text-green-700 font-medium">{{ Auth::guard('siakad')->user()->role }}</span>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 space-y-6 overflow-y-auto">

            {{-- Utama --}}
            <div>
                <p class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase">Utama</p>
                <a href="{{ route('siakad.dashboard') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-orange-500 text-white font-medium">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
            </div>

            {{-- Akademik --}}
            <div>
                <p class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase">Akademik</p>
                <a href="{{ route('majors.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                    <span>Majors</span>
                </a>
                <a href="{{ route('absence.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i data-lucide="check-square" class="w-5 h-5"></i>
                    <span>Absensi</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                    <span>Nilai & Rapor</span>
                </a>
            </div>

            {{-- Kegiatan --}}
            <div>
                <p class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase">Kegiatan</p>
                {{-- <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i data-lucide="briefcase" class="w-5 h-5"></i>
                    <span>PKL</span>
                </a> --}}
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span>Pengumuman</span>
                </a>
            </div>

            {{-- Komunikasi --}}
            {{-- <div>
                <p class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase">Komunikasi</p>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i data-lucide="message-square" class="w-5 h-5"></i>
                    <span>Pesan</span>
                </a>
            </div> --}}

            {{-- Pengaturan --}}
            <div>
                <p class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase">Pengaturan</p>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i data-lucide="settings" class="w-5 h-5"></i>
                    <span>Pengaturan Profil</span>
                </a>
            </div>

        </nav>

        {{-- Logout --}}
        <div class="p-4 border-t mt-auto">
            <a href="{{ route('siakad.logout') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-red-50">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                Logout
            </a>
        </div>
    </aside>
</div>

<!-- Tambahkan Alpine.js kalau belum ada -->
<script src="//unpkg.com/alpinejs" defer></script>
