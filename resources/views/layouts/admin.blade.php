<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Prestasi Prima</title>

    {{-- FONT & ICON --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #FF6B00;
            --primary-dark: #cc5500;
            --secondary: #64748B;
            --accent: #F59E0B;
            --bg-body: #F8FAFC;
            --bg-sidebar: #FFFFFF;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: #1E293B;
        }

        .sidebar-item {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-item-active {
            background: #FFF7ED; /* orange-50 */
            color: #FF6B00 !important;
            border-right: 3px solid #FF6B00;
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="min-h-screen flex overflow-hidden">

    {{-- ================= SIDEBAR ================= --}}
    <aside class="w-72 bg-white border-r border-slate-100 flex flex-col fixed inset-y-0 left-0 z-30 transition-all duration-300">
        {{-- Logo Section --}}
        <div class="px-8 py-8 flex items-center gap-3">
            <div class="w-10 h-10 bg-[#FF6B00] rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/20">
                <i class="ri-dashboard-fill text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold text-slate-800 tracking-tight">Admin<span class="text-[#FF6B00]">PP</span></h1>
                <p class="text-[10px] text-slate-400 font-medium tracking-widest uppercase">Portal Management</p>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-2">
            @php
                $currentRoute = Route::currentRouteName();
                
                $menuCategories = [
                    [
                        'category' => 'Dashboard',
                        'icon' => 'ri-home-5-line',
                        'items' => [
                            ['label' => 'Dashboard', 'route' => 'prestasiprima.admin.dashboard', 'icon' => 'ri-dashboard-line', 'active' => $currentRoute === 'prestasiprima.admin.dashboard'],
                        ]
                    ],
                    [
                        'category' => 'Konten & Media',
                        'icon' => 'ri-folder-2-line',
                        'items' => [
                            ['label' => 'Manajemen Berita', 'route' => 'prestasiprima.admin.berita.index', 'icon' => 'ri-article-line', 'active' => str_contains($currentRoute, 'berita')],
                            ['label' => 'Manajemen Galeri', 'route' => 'prestasiprima.admin.gallery.index', 'icon' => 'ri-image-2-line', 'active' => str_contains($currentRoute, 'gallery')],
                            ['label' => 'Testimoni', 'route' => 'prestasiprima.admin.testimoni.index', 'icon' => 'ri-chat-voice-line', 'active' => str_contains($currentRoute, 'testimoni')],
                        ]
                    ],
                    [
                        'category' => 'Akademik',
                        'icon' => 'ri-book-2-line',
                        'items' => [
                            ['label' => 'Manajemen Prestasi', 'route' => 'prestasiprima.admin.prestasi.index', 'icon' => 'ri-award-line', 'active' => str_contains($currentRoute, 'prestasi')],
                            ['label' => 'Manajemen Kegiatan', 'route' => 'prestasiprima.admin.kegiatan.index', 'icon' => 'ri-calendar-event-line', 'active' => str_contains($currentRoute, 'kegiatan')],
                            ['label' => 'Ekstrakurikuler', 'route' => 'prestasiprima.admin.ekstrakurikuler.index', 'icon' => 'ri-group-line', 'active' => str_contains($currentRoute, 'ekstra')],
                            ['label' => 'Manajemen Karya', 'route' => 'prestasiprima.admin.karya.index', 'icon' => 'ri-lightbulb-flash-line', 'active' => str_contains($currentRoute, 'karya')],
                        ]
                    ],
                    [
                        'category' => 'Kemitraan',
                        'icon' => 'ri-team-line',
                        'items' => [
                            ['label' => 'Manajemen Staff', 'route' => 'prestasiprima.admin.staff.index', 'icon' => 'ri-user-settings-line', 'active' => str_contains($currentRoute, 'staff')],
                            ['label' => 'Kerjasama Industri', 'route' => 'prestasiprima.admin.industri.index', 'icon' => 'ri-building-2-line', 'active' => str_contains($currentRoute, 'industri')],
                        ]
                    ],
                ];
            @endphp

            <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-4">Main Menu</p>

            @foreach($menuCategories as $index => $category)
                @php
                    $hasActiveItem = collect($category['items'])->contains('active', true);
                    $categoryId = 'category-' . $index;
                @endphp

                @if($category['category'] === 'Dashboard')
                    {{-- Dashboard tanpa dropdown --}}
                    <a href="{{ route($category['items'][0]['route']) }}"
                       class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group
                       {{ $category['items'][0]['active'] ? 'bg-orange-50 text-[#FF6B00] font-bold shadow-sm ring-1 ring-orange-100' : 'text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50' }}">
                        <i class="{{ $category['icon'] }} text-xl {{ $category['items'][0]['active'] ? 'text-[#FF6B00]' : 'text-slate-400 group-hover:text-[#FF6B00]' }}"></i>
                        <span class="text-sm flex-1">{{ $category['items'][0]['label'] }}</span>
                    </a>
                @else
                    {{-- Category dengan dropdown --}}
                    <div class="dropdown-category">
                        <button type="button" 
                                onclick="toggleDropdown('{{ $categoryId }}')"
                                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group
                                {{ $hasActiveItem ? 'bg-orange-50 text-[#FF6B00] font-bold' : 'text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50' }}">
                            <i class="{{ $category['icon'] }} text-xl {{ $hasActiveItem ? 'text-[#FF6B00]' : 'text-slate-400 group-hover:text-[#FF6B00]' }}"></i>
                            <span class="text-sm flex-1 text-left">{{ $category['category'] }}</span>
                            <i class="ri-arrow-down-s-line text-lg transition-transform duration-300 dropdown-arrow {{ $hasActiveItem ? 'rotate-180' : '' }}" id="arrow-{{ $categoryId }}"></i>
                        </button>
                        
                        <div id="{{ $categoryId }}" class="dropdown-content overflow-hidden transition-all duration-300 {{ $hasActiveItem ? 'max-h-96' : 'max-h-0' }}">
                            <div class="pl-4 pr-2 py-2 space-y-1">
                                @foreach($category['items'] as $item)
                                    <a href="{{ route($item['route']) }}"
                                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 group
                                       {{ $item['active'] ? 'bg-orange-100 text-[#FF6B00] font-semibold' : 'text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50' }}">
                                        <i class="{{ $item['icon'] }} text-base {{ $item['active'] ? 'text-[#FF6B00]' : 'text-slate-400 group-hover:text-[#FF6B00]' }}"></i>
                                        <span class="text-sm">{{ $item['label'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="pt-6">
                <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-4">External</p>
                <a href="/" target="_blank"
                    class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50 transition-all duration-200 group">
                    <i class="ri-external-link-line text-xl text-slate-400 group-hover:text-[#FF6B00]"></i>
                    <span class="text-sm">Lihat Website</span>
                </a>
            </div>
        </nav>

        {{-- User Section / Logout --}}
        <div class="p-6 border-t border-slate-100 bg-slate-50">
            <form action="{{ route('authPP.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-3 bg-white border border-slate-200 hover:bg-red-50 text-slate-600 hover:text-red-600 font-bold px-4 py-3 rounded-xl transition-all duration-300 shadow-sm">
                    <i class="ri-logout-circle-r-line text-xl"></i>
                    <span class="text-sm">Keluar Panel</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- ================= MAIN CONTENT ================= --}}
    <main class="flex-1 ml-72 h-screen overflow-y-auto">
        {{-- HEADER --}}
        <header class="glass-header sticky top-0 z-20 border-b border-slate-200/60 px-8 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">@yield('title')</h2>
                    <p class="text-xs text-slate-500 mt-0.5 font-medium">Selamat datang kembali, Admin!</p>
                </div>
                
                <div class="flex items-center gap-4">
                    {{-- Notification Removed --}}
                    
                    <div class="relative">
                        <div onclick="toggleProfileDropdown()" class="flex items-center gap-3 px-2 py-1.5 rounded-full hover:bg-slate-50 transition-colors cursor-pointer group select-none">
                            <div class="w-9 h-9 bg-gradient-to-tr from-[#FF6B00] to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md shadow-orange-500/20">
                                A
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm font-bold text-slate-800 leading-none">Administrator</p>
                                <p class="text-[10px] text-green-600 font-bold mt-1 uppercase tracking-wider">Online</p>
                            </div>
                            <i id="profile-arrow" class="ri-arrow-down-s-line text-slate-400 group-hover:text-slate-600 transition-transform duration-300"></i>
                        </div>

                        {{-- Dropdown Menu --}}
                        <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 transform origin-top-right transition-all duration-200 opacity-0 scale-95 invisible z-50">
                            <div class="p-2 space-y-1">
                                <a href="{{ route('prestasiprima.admin.password.edit') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-orange-50 hover:text-[#FF6B00] transition-colors text-sm font-medium">
                                    <i class="ri-lock-password-line"></i> Ganti Password
                                </a>
                                <form action="{{ route('authPP.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-red-600 hover:bg-red-50 transition-colors text-sm font-medium">
                                        <i class="ri-logout-box-r-line"></i> Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <section class="p-8 pb-12 max-w-7xl mx-auto">
            @yield('content')
        </section>

        {{-- FOOTER --}}
        <footer class="px-8 py-6 text-center">
            <p class="text-sm text-slate-400 font-medium uppercase tracking-widest text-[10px]">
                &copy; {{ date('Y') }} SMK Prestasi Prima • Developed by Ardy & Abi
            </p>
        </footer>
    </main>

    {{-- Dropdown Toggle Script --}}
    <script>
        function toggleDropdown(categoryId) {
            const dropdown = document.getElementById(categoryId);
            const arrow = document.getElementById('arrow-' + categoryId);
            
            if (dropdown.style.maxHeight && dropdown.style.maxHeight !== '0px') {
                dropdown.style.maxHeight = '0px';
                arrow.classList.remove('rotate-180');
            } else {
                dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                arrow.classList.add('rotate-180');
            }
        }

        // Auto-expand active category on page load
        document.addEventListener('DOMContentLoaded', function() {
            const activeCategories = document.querySelectorAll('.dropdown-content.max-h-96');
            activeCategories.forEach(function(category) {
                category.style.maxHeight = category.scrollHeight + 'px';
            });
        });

        // Profile Dropdown Toggle
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            const arrow = document.getElementById('profile-arrow');
            
            if (dropdown.classList.contains('invisible')) {
                // Show
                dropdown.classList.remove('invisible', 'opacity-0', 'scale-95');
                arrow.classList.add('rotate-180');
            } else {
                // Hide
                dropdown.classList.add('invisible', 'opacity-0', 'scale-95');
                arrow.classList.remove('rotate-180');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profile-dropdown');
            const arrow = document.getElementById('profile-arrow');
            const trigger = event.target.closest('[onclick="toggleProfileDropdown()"]');
            
            if (!trigger && !dropdown.contains(event.target) && !dropdown.classList.contains('invisible')) {
                dropdown.classList.add('invisible', 'opacity-0', 'scale-95');
                arrow.classList.remove('rotate-180');
            }
        });
    </script>
</body>

</html>
