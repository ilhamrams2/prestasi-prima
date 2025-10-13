<aside id="sidebar"
    class="fixed top-0 left-0 h-full w-64 bg-white border-r shadow-lg z-50 flex flex-col transition-transform duration-300">

    <!-- ================= LOGO ================= -->
    <div class="h-20 flex items-center border-b px-5">
        <div class="flex items-center space-x-3">
            <!-- Icon -->
            <div class="w-10 h-10 bg-orange-500 text-white rounded-lg flex items-center justify-center">
                <i class="ri-trophy-line text-xl"></i>
            </div>
            <!-- Text -->
            <div>
                <h1 class="text-base font-bold">PRESMA BOARD</h1>
                <p class="text-sm text-gray-500">Prestasi Prima</p>
            </div>
        </div>
    </div>

    <!-- ================= USER INFO ================= -->
    <div class="flex items-center space-x-3 p-4 border-b">
        <!-- Avatar -->
        <div class="w-14 aspect-square rounded-full bg-orange-500 flex items-center justify-center text-white font-bold">
            A
        </div>

        <!-- User Details -->
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

    <!-- ================= MENU ================= -->
    <nav class="flex-1 overflow-y-auto p-3 text-sm">

        <!-- UTAMA -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-3">Utama</p>

        <a href="{{ route('presmaboard.dashboard') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
            text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.dashboard') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
            <i class="ri-dashboard-line text-lg"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('presmaboard.leaderboard') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
            text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.leaderboard') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
            <i class="ri-bar-chart-box-line text-lg"></i>
            <span>Leaderboard</span>
        </a>

        <!-- AKADEMIK -->
        <p class="text-gray-400 uppercase text-xs font-semibold mb-2 mt-4">Akademik</p>

        <a href="{{ route('presmaboard.siswa') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
            text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.siswa') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
            <i class="ri-user-3-line text-lg"></i>
            <span>Siswa</span>
        </a>

        <a href="{{ route('presmaboard.project') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
            text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.project') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
            <i class="ri-code-box-line text-lg"></i>
            <span>Project</span>
        </a>

        <a href="{{ route('presmaboard.prestasi') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
            text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.prestasi') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
            <i class="ri-medal-line text-lg"></i>
            <span>Prestasi</span>
        </a>

        <a href="{{ route('presmaboard.nilai_pkp') }}"
            class="flex items-center space-x-3 px-3 py-2 rounded-lg transition
            text-gray-700 hover:bg-orange-50 hover:text-orange-600 {{ request()->routeIs('presmaboard.nilai_pkp') ? 'bg-orange-50 text-orange-600 font-semibold' : '' }}">
            <i class="ri-file-list-3-line text-lg"></i>
            <span>Nilai PKP</span>
        </a>

        <!-- LOGOUT -->
        <div class="border-t mt-4 pt-3">
            <form action="{{ route('presmaboard.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg transition
                    text-red-600 hover:bg-red-50">
                    <i class="ri-logout-box-r-line text-lg"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
</aside>
