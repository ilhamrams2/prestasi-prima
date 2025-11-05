<!-- WRAPPER UNTUK SIDEBAR + TOGGLE -->
<div x-data="{ open: false }">
    <!-- SIDEBAR -->
    <aside
        class="fixed top-0 left-0 h-full w-64 bg-white border-r shadow-lg z-50 flex flex-col
               transition-transform duration-300 transform -translate-x-full lg:translate-x-0"
        :class="{ 'translate-x-0': open }">
        <!-- HEADER -->
        <div class="h-20 flex items-center border-b px-5 justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-orange-500 text-white rounded-lg flex items-center justify-center">
                    <i class="ri-trophy-line text-xl"></i>
                </div>
                <div>
                    <h1 class="text-base font-bold">PRESMA BOARD</h1>
                    <p class="text-sm text-gray-500">Prestasi Prima</p>
                </div>
            </div>

            <!-- CLOSE BUTTON (Mobile Only) -->
            <button @click="open = false" class="lg:hidden text-gray-600 hover:text-orange-500 text-2xl">
                <i class="ri-close-line"></i>
            </button>
        </div>

        <!-- PROFILE -->
        <div class="flex items-center space-x-3 p-4 border-b">
            <div
                class="w-14 aspect-square rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">
                A
            </div>
            <div class="flex flex-col w-full min-w-0">
                <p class="font-semibold text-sm truncate" title="Admin">Admin</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500 truncate" title="admin@smkprestasiprima.sch.id">
                        admin@smkprestasiprima.sch.id
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-green-100 text-green-600 capitalize">
                        admin
                    </span>
                </div>
            </div>
        </div>

        <!-- NAVIGATION -->
        <nav class="flex-1 overflow-y-auto p-3 text-sm">
            <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-3">Utama</p>

            <a href="{{ route('presmaboard.admin.dashboard') }}"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
                text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.admin.dashboard') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
                <i class="ri-dashboard-line text-lg"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('presmaboard.admin.leaderboard') }}"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
                text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.admin.leaderboard') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
                <i class="ri-bar-chart-box-line text-lg"></i>
                <span>Leaderboard</span>
            </a>

            <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-4">Akademik</p>

            <a href="{{ route('presmaboard.admin.student.index') }}"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
                text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.admin.student.*') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
                <i class="ri-user-3-line text-lg"></i>
                <span>Siswa</span>
            </a>

            <a href="{{ route('presmaboard.admin.project.index') }}"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
                text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.admin.project.*') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
                <i class="ri-code-box-line text-lg"></i>
                <span>Project</span>
            </a>

            <a href="{{ route('presmaboard.admin.achievement.index') }}"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
                text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.admin.achievement.*') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
                <i class="ri-medal-line text-lg"></i>
                <span>Prestasi</span>
            </a>

            <a href="{{ route('presmaboard.admin.score.index') }}"
                class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
                text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.admin.score.*') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
                <i class="ri-file-list-3-line text-lg"></i>
                <span>Nilai PKP</span>
            </a>

            <div class="border-t mt-4 pt-3">
                <a href="{{ route('presmaboard.logout') }}" type="submit"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg transition
                        text-red-600 hover:bg-red-50">
                    <i class="ri-logout-box-r-line text-lg"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </aside>

    <!-- OVERLAY -->
    <div x-show="open" @click="open = false" class="fixed inset-0 bg-black bg-opacity-40 z-40 lg:hidden"
        x-transition.opacity></div>

    <!-- HAMBURGER BUTTON (POSISI KANAN) -->
    <button @click="open = !open"
        class="lg:hidden fixed top-5 right-5 bg-orange-500 text-white rounded-full w-11 h-11 flex items-center justify-center shadow-lg z-[60] transition-transform hover:scale-105 active:scale-95">
        <i class="ri-menu-2-line text-2xl"></i>
    </button>
</div>
