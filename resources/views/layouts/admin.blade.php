<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Prestasi Prima</title>

    {{-- FONT & ICON --}}

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #FF6B00;
            --primary-dark: #cc5500;
            --secondary: #64748B;
            --accent: #F59E0B;
            --bg-body: #F9FAFB; /* Filament uses a slightly warmer gray */
            --bg-sidebar: #FFFFFF;
            --sidebar-width: 280px;
            --filament-danger: #ef4444;
            --filament-success: #10b981;
            --filament-warning: #f59e0b;
            --filament-info: #3b82f6;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: #1E293B;
            -webkit-tap-highlight-color: transparent;
            overflow-x: hidden;
            width: 100%;
        }

        /* FORCE INTERACTIVITY */
        * { -webkit-tap-highlight-color: transparent; box-sizing: border-box; }
        button, a, input, select, textarea, [role="button"], label { cursor: pointer; pointer-events: auto !important; }
        input, textarea, select { user-select: text !important; -webkit-user-select: text !important; }

        /* LAYOUT AND Z-INDEX */
        main { position: relative; z-index: 10; }
        #admin-sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: var(--sidebar-width); background: white; z-index: 50; transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); border-right: 1px solid #e5e7eb; }
        
        /* BACKDROP */
        #sidebar-backdrop { position: fixed; inset: 0; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(4px); z-index: 45; opacity: 0; visibility: hidden; display: none; pointer-events: none; transition: opacity 0.3s ease; }
        #sidebar-backdrop.show { display: block; opacity: 1; visibility: visible; pointer-events: auto; }

        /* RESPONSIVE */
        @media (max-width: 1023px) {
            #admin-sidebar { transform: translateX(-100%); z-index: 9999; }
            #admin-sidebar.show { transform: translateX(0); }
            main { padding-left: 0 !important; }
            .glass-header { position: sticky; top: 0; z-index: 40; }
            #sidebar-backdrop { z-index: 9990; }
        }
        @media (min-width: 1024px) {
            #admin-sidebar { transform: translateX(0); box-shadow: none; }
            main { padding-left: var(--sidebar-width); }
            #sidebar-backdrop { display: none !important; }
            #hamburger-trigger { display: none !important; }
        }

        /* UTILS */
        .glass-header { background: rgba(255, 255, 255, 0.95); border-bottom: 1px solid #e5e7eb; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        .sidebar-item { position: relative; overflow: hidden; transition: all 0.2s ease; font-weight: 500; }
        .sidebar-item-active { background: #FFF7ED; color: #FF6B00 !important; font-weight: 600; }
        .dropdown-content { transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .table-container { width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; }
        .hamburger-line { transition: all 0.3s ease; transform-origin: center; }
        button.active .line-1 { transform: translateY(6px) rotate(45deg); }
        button.active .line-2 { opacity: 0; transform: translateX(-10px); }
        button.active .line-3 { transform: translateY(-6px) rotate(-45deg); }

        /* ================= FILAMENT-STYLE TOASTS ================= */
        #toast-container {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            pointer-events: none;
            width: auto;
            max-width: 420px;
        }

        @media (max-width: 640px) {
            #toast-container { top: 1rem; left: 1rem; right: 1rem; max-width: none; }
        }

        .toast-item {
            pointer-events: auto;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border: 1px solid #E5E7EB; /* Subtle border */
            display: flex;
            align-items: flex-start;
            padding: 1rem;
            gap: 0.75rem;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .toast-item.show { transform: translateX(0); opacity: 1; }

        /* Toast Colors */
        .toast-success .toast-icon { color: var(--filament-success); background: #ECFDF5; }
        .toast-danger .toast-icon { color: var(--filament-danger); background: #FEF2F2; }
        .toast-warning .toast-icon { color: var(--filament-warning); background: #FFFBEB; }
        .toast-info .toast-icon { color: var(--filament-info); background: #EFF6FF; }

        .toast-icon {
            flex-shrink: 0;
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toast-content { flex: 1; min-width: 0; }
        .toast-title { font-weight: 700; font-size: 0.875rem; color: #111827; margin-bottom: 0.125rem; }
        .toast-message { font-size: 0.8125rem; color: #6B7280; line-height: 1.4; }

        .toast-close {
            color: #9CA3AF;
            padding: 0.25rem;
            border-radius: 0.375rem;
            transition: color 0.2s;
        }
        .toast-close:hover { color: #4B5563; background: #F3F4F6; }

        /* ================= FILAMENT-STYLE MODAL ================= */
        #confirm-modal { position: fixed; inset: 0; z-index: 10001; display: flex; align-items: center; justify-content: center; padding: 1rem; opacity: 0; visibility: hidden; transition: all 0.2s; }
        #confirm-modal.show { opacity: 1; visibility: visible; pointer-events: auto; }
        #confirm-modal-backdrop { position: absolute; inset: 0; background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(4px); transition: opacity 0.3s; }
        
        #confirm-modal-content {
            position: relative;
            background: white;
            width: 100%;
            max-width: 400px;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: scale(0.95);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        #confirm-modal.show #confirm-modal-content { transform: scale(1); }

        .modal-body { padding: 1.5rem; text-align: center; }
        .modal-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 9999px;
            background: #FEF2F2;
            color: #EF4444;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        .modal-title { font-weight: 700; font-size: 1.125rem; color: #111827; margin-bottom: 0.5rem; }
        .modal-message { font-size: 0.875rem; color: #6B7280; line-height: 1.5; }
        
        .modal-footer {
            padding: 1rem 1.5rem;
            background: #F9FAFB;
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            border-top: 1px solid #F3F4F6;
        }
        
        .btn-modal {
            flex: 1;
            padding: 0.625rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s;
            text-align: center;
        }
        .btn-cancel { background: white; color: #374151; border: 1px solid #D1D5DB; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .btn-cancel:hover { background: #F9FAFB; border-color: #9CA3AF; }
        
        .btn-confirm { background: #EF4444; color: white; border: 1px solid transparent; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .btn-confirm:hover { background: #DC2626; }
        .btn-confirm:focus { ring: 2px solid #FCA5A5; }

        /* ================= FIXED CHAT WIDGET ================= */
        #admin-chat-widget {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 9950;
        }

        #chat-toggle {
            width: 3.5rem;
            height: 3.5rem;
            background: #FF6B00;
            color: white;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(255, 107, 0, 0.3);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        #chat-toggle:hover { transform: scale(1.1); background: #EA580C; }
        #chat-toggle.active { transform: rotate(45deg); background: #4B5563; }

        #chat-window {
            position: absolute;
            bottom: 4.5rem;
            right: 0;
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid #E5E7EB;
            display: flex;
            flex-direction: column;
            transform-origin: bottom right;
            transform: scale(0.9) translateY(20px);
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
        }

        #chat-window.show {
            transform: scale(1) translateY(0);
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        @media (max-width: 640px) {
            #admin-chat-widget { bottom: 1.5rem; right: 1.5rem; }
            #chat-window { 
                position: fixed; 
                right: 1rem; 
                left: 1rem; 
                bottom: 6rem;
                width: auto; 
                max-height: 60vh;
            }
        }

        .chat-header { background: #FF6B00; color: white; padding: 1rem; display: flex; align-items: center; justify-content: space-between; }
        .chat-messages { flex: 1; padding: 1rem; overflow-y: auto; background: #F9FAFB; display: flex; flex-direction: column; gap: 0.75rem; }
        .chat-input-area { padding: 0.75rem; border-top: 1px solid #E5E7EB; display: flex; gap: 0.5rem; background: white; }
        #chat-input { flex: 1; padding: 0.5rem 0.75rem; border-radius: 0.5rem; border: 1px solid #D1D5DB; font-size: 0.875rem; }
        #chat-input:focus { outline: none; border-color: #FF6B00; ring: 2px solid rgba(255,107,0,0.2); }
    </style></head>

<body class="min-h-screen bg-slate-50 transition-colors duration-500">

    {{-- TOAST CONTAINER --}}
    <div id="toast-container"></div>

    {{-- CONFIRM DIALOG --}}
    <div id="confirm-modal">
        <div id="confirm-modal-backdrop" onclick="Confirm.hide()"></div>
        <div id="confirm-modal-content">
            <div class="modal-body">
                <div class="modal-icon">
                    <i class="ri-delete-bin-line text-2xl"></i>
                </div>
                <h3 class="modal-title" id="confirm-title">Konfirmasi Hapus</h3>
                <p class="modal-message" id="confirm-message">Apakah Anda yakin? Data yang dihapus tidak dapat dikembalikan lagi.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal btn-cancel" onclick="Confirm.hide()">Batal</button>
                <button type="button" class="btn-modal btn-confirm" id="confirm-execute">Ya, Hapus</button>
            </div>
        </div>
    </div>
    {{-- Backdrop for mobile sidebar --}}
    <div id="sidebar-backdrop" onclick="toggleMobileSidebar()"></div>

    {{-- ================= SIDEBAR ================= --}}
    <aside id="admin-sidebar" class="flex flex-col shadow-2xl lg:shadow-none border-r border-slate-100">
        {{-- Logo Section --}}
        <div class="px-8 py-8 flex items-center justify-between lg:justify-start gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/20">
                    <i class="ri-dashboard-fill text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-slate-800 tracking-tight">Admin<span class="text-[#FF6B00]">PP</span></h1>
                    <p class="text-[10px] text-slate-400 font-medium tracking-widest uppercase">Portal Management</p>
                </div>
            </div>
            {{-- Close Btn Mobile --}}
            <button onclick="toggleMobileSidebar()" class="lg:hidden w-8 h-8 flex items-center justify-center text-slate-400 hover:text-red-500">
                <i class="ri-close-line text-2xl"></i>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-2">
            @php
                $currentRoute = Route::currentRouteName();
                $user = auth('authPP')->user();
                
                $menuCategories = [
                    [
                        'category' => 'Dashboard',
                        'icon' => 'ri-home-5-line',
                        'roles' => ['super_admin', 'editor', 'moderator', 'viewer'],
                        'items' => [
                            ['label' => 'Dashboard', 'route' => 'prestasiprima.admin.dashboard', 'icon' => 'ri-dashboard-line', 'active' => $currentRoute === 'prestasiprima.admin.dashboard', 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                        ]
                    ],
                    [
                        'category' => 'Konten & Media',
                        'icon' => 'ri-folder-2-line',
                        'roles' => ['super_admin', 'editor', 'moderator', 'viewer'],
                        'items' => [
                            ['label' => 'Hero Video Section', 'route' => 'prestasiprima.admin.hero.index', 'icon' => 'ri-play-circle-line', 'active' => str_contains($currentRoute, 'hero'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Manajemen Berita', 'route' => 'prestasiprima.admin.berita.index', 'icon' => 'ri-article-line', 'active' => str_contains($currentRoute, 'berita'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Manajemen Galeri', 'route' => 'prestasiprima.admin.gallery.index', 'icon' => 'ri-image-2-line', 'active' => str_contains($currentRoute, 'gallery'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Inbox Pesan', 'route' => 'prestasiprima.admin.contact.index', 'icon' => 'ri-mail-line', 'active' => str_contains($currentRoute, 'contact'), 'roles' => ['super_admin', 'moderator']],
                            ['label' => 'Testimoni', 'route' => 'prestasiprima.admin.testimoni.index', 'icon' => 'ri-chat-voice-line', 'active' => str_contains($currentRoute, 'testimoni'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                        ]
                    ],
                    [
                        'category' => 'Akademik',
                        'icon' => 'ri-book-2-line',
                        'roles' => ['super_admin', 'editor', 'moderator', 'viewer'],
                        'items' => [
                            ['label' => 'Manajemen Prestasi', 'route' => 'prestasiprima.admin.prestasi.index', 'icon' => 'ri-award-line', 'active' => str_contains($currentRoute, 'prestasi'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Manajemen Kegiatan', 'route' => 'prestasiprima.admin.kegiatan.index', 'icon' => 'ri-calendar-event-line', 'active' => str_contains($currentRoute, 'kegiatan'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Ekstrakurikuler', 'route' => 'prestasiprima.admin.ekstrakurikuler.index', 'icon' => 'ri-group-line', 'active' => str_contains($currentRoute, 'ekstra'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Manajemen Karya', 'route' => 'prestasiprima.admin.karya.index', 'icon' => 'ri-lightbulb-flash-line', 'active' => str_contains($currentRoute, 'karya'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                        ]
                    ],
                    [
                        'category' => 'Kemitraan',
                        'icon' => 'ri-team-line',
                        'roles' => ['super_admin', 'editor', 'moderator', 'viewer'],
                        'items' => [
                            ['label' => 'Trainer MikroTik', 'route' => 'prestasiprima.admin.mikrotik.index', 'icon' => 'ri-medal-line', 'active' => str_contains($currentRoute, 'mikrotik'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Kerjasama Industri', 'route' => 'prestasiprima.admin.industri.index', 'icon' => 'ri-building-2-line', 'active' => str_contains($currentRoute, 'industri'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Lulusan PTN', 'route' => 'prestasiprima.admin.lulusan-ptn.index', 'icon' => 'ri-government-line', 'active' => str_contains($currentRoute, 'lulusan-ptn'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                        ]
                    ],
                    [
                        'category' => 'Sistem & Keamanan',
                        'icon' => 'ri-settings-4-line',
                        'roles' => ['super_admin'],
                        'items' => [
                            ['label' => 'Manajemen User', 'route' => 'prestasiprima.admin.users.index', 'icon' => 'ri-user-follow-line', 'active' => str_contains($currentRoute, 'users'), 'roles' => ['super_admin']],
                            ['label' => 'Log Aktivitas', 'route' => 'prestasiprima.admin.logs.index', 'icon' => 'ri-history-line', 'active' => str_contains($currentRoute, 'logs'), 'roles' => ['super_admin']],
                            ['label' => 'Pengaturan Situs', 'route' => 'prestasiprima.admin.settings.index', 'icon' => 'ri-equalizer-line', 'active' => str_contains($currentRoute, 'settings'), 'roles' => ['super_admin']],
                            ['label' => 'Backup & Database', 'route' => 'prestasiprima.admin.backup.index', 'icon' => 'ri-database-2-line', 'active' => str_contains($currentRoute, 'backup'), 'roles' => ['super_admin']],
                        ]
                    ],
                ];
            @endphp

            <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-4">Main Menu</p>

            @foreach($menuCategories as $index => $category)
                @php
                    // Filter items based on user role
                    $allowedItems = array_filter($category['items'], function($item) use ($user) {
                        return in_array($user->role, $item['roles'] ?? []);
                    });

                    // Skip category if no allowed items
                    if (empty($allowedItems)) continue;

                    $hasActiveItem = collect($allowedItems)->contains('active', true);
                    $categoryId = 'category-' . $index;
                @endphp

                @if($category['category'] === 'Dashboard')
                    {{-- Dashboard tanpa dropdown --}}
                    @php $dashboardItem = $allowedItems[0]; @endphp
                    <a href="{{ route($dashboardItem['route']) }}"
                       class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl group
                       {{ $dashboardItem['active'] ? 'sidebar-item-active shadow-sm ring-1 ring-orange-100' : 'text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50/50' }}">
                        <i class="{{ $category['icon'] }} text-xl {{ $dashboardItem['active'] ? 'text-[#FF6B00]' : 'text-slate-400 group-hover:text-[#FF6B00] group-hover:scale-110 transition-transform' }}"></i>
                        <span class="text-sm flex-1">{{ $dashboardItem['label'] }}</span>
                    </a>
                @else
                    {{-- Category dengan dropdown --}}
                    <div class="dropdown-category">
                        <button type="button" 
                                onclick="toggleDropdown('{{ $categoryId }}')"
                                class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl group
                                {{ $hasActiveItem ? 'sidebar-item-active' : 'text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50/50' }}">
                            <i class="{{ $category['icon'] }} text-xl {{ $hasActiveItem ? 'text-[#FF6B00]' : 'text-slate-400 group-hover:text-[#FF6B00] group-hover:scale-110 transition-transform' }}"></i>
                            <span class="text-sm flex-1 text-left">{{ $category['category'] }}</span>
                            <i class="ri-arrow-down-s-line text-lg transition-transform duration-300 dropdown-arrow {{ $hasActiveItem ? 'rotate-180' : '' }}" id="arrow-{{ $categoryId }}"></i>
                        </button>
                        
                        <div id="{{ $categoryId }}" class="dropdown-content overflow-hidden transition-all duration-300 {{ $hasActiveItem ? 'max-h-[600px]' : 'max-h-0' }}">
                            <div class="pl-4 pr-2 py-2 space-y-1">
                                @foreach($allowedItems as $item)
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

                <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-4">Eksternal</p>
                
                {{-- Swagger API Docs --}}
                <a href="{{ url('/api/documentation') }}" target="_blank"
                    class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50 transition-all duration-200 group">
                    <i class="ri-book-read-line text-xl text-slate-400 group-hover:text-[#FF6B00]"></i>
                    <span class="text-sm">Dokumentasi API</span>
                </a>

                {{-- Docusaurus / Project Docs --}}
                <a href="http://localhost:3000" target="_blank"
                    class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50 transition-all duration-200 group">
                    <i class="ri-file-list-3-line text-xl text-slate-400 group-hover:text-[#FF6B00]"></i>
                    <span class="text-sm">Dokumentasi Sistem</span>
                </a>

                {{-- Live Website --}}
                <a href="/" target="_blank"
                    class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-[#FF6B00] hover:bg-orange-50 transition-all duration-200 group">
                    <i class="ri-external-link-line text-xl text-slate-400 group-hover:text-[#FF6B00]"></i>
                    <span class="text-sm">Lihat Website</span>
                </a>
            </div>
        </nav>

        {{-- User Section / Logout --}}
        <div class="p-6 border-t border-slate-100 bg-slate-50">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-3 bg-white border border-slate-200 hover:bg-red-50 text-slate-600 hover:text-red-600 font-bold px-4 py-3 rounded-xl transition-all duration-300 shadow-sm cursor-pointer">
                    <i class="ri-logout-circle-r-line text-xl"></i>
                    <span class="text-sm">Keluar Panel</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Backdrop for mobile --}}
    <div id="sidebar-backdrop" onclick="toggleMobileSidebar()"></div>

    {{-- MAIN WRAPPER --}}
    <main class="min-h-screen flex flex-col transition-all duration-300">
        
        {{-- HEADER / NAVBAR --}}
        <header class="glass-header sticky top-0 px-4 sm:px-6 md:px-8 lg:px-10 py-3.5 z-40 transition-all">
            <div class="flex items-center justify-between">
                {{-- Hamburger Mobile & Page Title --}}
                <div class="flex items-center gap-3 md:gap-4">
                    <button id="hamburger-trigger" onclick="toggleMobileSidebar()" 
                            class="lg:hidden w-10 h-10 flex flex-col items-center justify-center gap-1 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-all cursor-pointer select-none">
                        <span class="hamburger-line line-1 w-5 h-0.5 bg-slate-600 rounded-full"></span>
                        <span class="hamburger-line line-2 w-5 h-0.5 bg-slate-600 rounded-full"></span>
                        <span class="hamburger-line line-3 w-5 h-0.5 bg-slate-600 rounded-full"></span>
                    </button>
                    <div>
                        <h2 class="text-base sm:text-lg md:text-xl font-bold text-slate-800 tracking-tight leading-tight">
                            @yield('title', 'Dashboard')
                        </h2>
                        <p class="text-[10px] sm:text-xs text-slate-400 font-medium hidden sm:block">Panel Administrasi SMK Prestasi Prima</p>
                    </div>
                </div>

                {{-- Right Actions --}}
                <div class="flex items-center gap-2 sm:gap-4">
                    {{-- Quick Action: Website --}}
                    <a href="/" target="_blank" class="hidden sm:flex items-center gap-2 px-4 py-2 bg-slate-50 hover:bg-orange-50 text-slate-600 hover:text-[#FF6B00] rounded-xl text-xs font-bold transition-all border border-slate-200/60 shadow-sm">
                        <i class="ri-external-link-line"></i>
                        <span>Lihat Web</span>
                    </a>

                    {{-- Notification Bell --}}
                    <div class="relative">
                        <button onclick="toggleNotificationDropdown()" class="w-11 h-11 bg-white border border-slate-200 rounded-2xl flex items-center justify-center text-slate-500 hover:text-orange-500 hover:border-orange-500 transition-all relative group shadow-sm active:scale-95 cursor-pointer">
                            <i class="ri-notification-3-line text-xl group-hover:animate-swing"></i>
                            <span id="notification-badge" class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] font-bold rounded-full border-2 border-white items-center justify-center hidden">
                                0
                            </span>
                        </button>

                        {{-- Notification Dropdown --}}
                        <div id="notification-dropdown" class="fixed sm:absolute left-3 right-3 sm:left-auto sm:right-0 mt-4 w-auto sm:w-96 bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.15)] border border-slate-100 transform origin-top-right transition-all duration-300 opacity-0 scale-95 invisible z-[60] overflow-hidden">
                            <div class="px-6 py-5 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
                                <div>
                                    <h3 class="text-sm font-bold text-slate-800">Notifikasi</h3>
                                    <p class="text-[10px] text-slate-400 font-medium">Update terbaru dari sistem</p>
                                </div>
                                <button onclick="markAllNotificationsAsRead()" class="text-[10px] font-bold text-[#FF6B00] hover:text-[#E65100] transition-colors uppercase tracking-wider cursor-pointer">Tandai Baca</button>
                            </div>
                            <div id="notification-list" class="max-h-96 overflow-y-auto divide-y divide-slate-50">
                                {{-- Notifications will be loaded here via AJAX --}}
                                <div class="p-8 text-center">
                                    <div class="w-12 h-12 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i class="ri-notification-off-line text-slate-300 text-xl"></i>
                                    </div>
                                    <p class="text-xs text-slate-400 font-medium italic">Tidak ada notifikasi baru</p>
                                </div>
                            </div>
                            <div class="p-3 bg-slate-50/50 border-t border-slate-50 text-center">
                                <a href="{{ route('prestasiprima.admin.logs.index') }}" class="text-[11px] font-bold text-slate-500 hover:text-[#FF6B00] transition-colors uppercase tracking-widest">Lihat Semua Aktivitas</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div onclick="toggleProfileDropdown()" class="flex items-center gap-3 px-2 py-1.5 rounded-full hover:bg-slate-50 transition-colors cursor-pointer group select-none">
                            <div class="w-9 h-9 bg-gradient-to-tr from-[#FF6B00] to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md shadow-orange-500/20 uppercase tracking-tighter">
                                {{ substr(auth('authPP')->user()->name ?? 'A', 0, 1) }}
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm font-bold text-slate-800 leading-none">{{ auth('authPP')->user()->name ?? 'Admin' }}</p>
                                <p class="text-[10px] text-orange-600 font-bold mt-1 uppercase tracking-wider">{{ auth('authPP')->user()->role_label ?? 'Staff' }}</p>
                            </div>
                            <i id="profile-arrow" class="ri-arrow-down-s-line text-slate-400 group-hover:text-slate-600 transition-transform duration-300"></i>
                        </div>

                        {{-- Dropdown Menu --}}
                        <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 transform origin-top-right transition-all duration-200 opacity-0 scale-95 invisible z-50">
                            <div class="p-2 space-y-1">
                                <a href="{{ route('prestasiprima.admin.password.edit') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-orange-50 hover:text-[#FF6B00] transition-colors text-sm font-medium">
                                    <i class="ri-lock-password-line"></i> Ganti Password
                                </a>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-red-600 hover:bg-red-50 transition-colors text-sm font-medium cursor-pointer">
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
        <section class="p-4 sm:p-6 md:p-8 lg:p-10 pb-12 w-full">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </section>

        {{-- FOOTER --}}
        <footer class="px-8 py-6 text-center">
            <p class="text-sm text-slate-400 font-medium uppercase tracking-widest text-[10px]">
                &copy; {{ date('Y') }} SMK Prestasi Prima • Developed by Ardy & Abi
            </p>
        </footer>
    </main>

    {{-- Dropdown & Sidebar Toggle Script --}}
    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            const trigger = document.getElementById('hamburger-trigger');
            if (!sidebar) return;
            
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                if (backdrop) backdrop.classList.remove('show');
                if (trigger) trigger.classList.remove('active');
                document.body.style.overflow = '';
            } else {
                sidebar.classList.add('show');
                if (backdrop) backdrop.classList.add('show');
                if (trigger) trigger.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function toggleDropdown(categoryId) {
            const dropdown = document.getElementById(categoryId);
            const arrow = document.getElementById('arrow-' + categoryId);
            if (!dropdown) return;
            
            if (dropdown.classList.contains('max-h-0')) {
                dropdown.classList.remove('max-h-0');
                dropdown.classList.add('max-h-[600px]');
                if (arrow) arrow.classList.add('rotate-180');
            } else {
                dropdown.classList.remove('max-h-[600px]', 'max-h-96');
                dropdown.classList.add('max-h-0');
                if (arrow) arrow.classList.remove('rotate-180');
            }
        }

        // Profile Dropdown Toggle
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            const arrow = document.getElementById('profile-arrow');
            if (!dropdown) return;
            
            if (dropdown.classList.contains('invisible')) {
                dropdown.classList.remove('invisible', 'opacity-0', 'scale-95');
                if (arrow) arrow.classList.add('rotate-180');
                const notifDropdown = document.getElementById('notification-dropdown');
                if (notifDropdown) notifDropdown.classList.add('invisible', 'opacity-0', 'scale-95');
            } else {
                dropdown.classList.add('invisible', 'opacity-0', 'scale-95');
                if (arrow) arrow.classList.remove('rotate-180');
            }
        }

        function toggleNotificationDropdown() {
            const dropdown = document.getElementById('notification-dropdown');
            if (!dropdown) return;
            
            if (dropdown.classList.contains('invisible')) {
                dropdown.classList.remove('invisible', 'opacity-0', 'scale-95');
                const profileDropdown = document.getElementById('profile-dropdown');
                const profileArrow = document.getElementById('profile-arrow');
                if (profileDropdown) profileDropdown.classList.add('invisible', 'opacity-0', 'scale-95');
                if (profileArrow) profileArrow.classList.remove('rotate-180');
                
                fetchNotifications();
            } else {
                dropdown.classList.add('invisible', 'opacity-0', 'scale-95');
            }
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            const notifDropdown = document.getElementById('notification-dropdown');
            const notifBtn = e.target.closest('button[onclick="toggleNotificationDropdown()"]');
            
            if (notifDropdown && !notifBtn && !notifDropdown.contains(e.target) && !notifDropdown.classList.contains('invisible')) {
                notifDropdown.classList.add('opacity-0', 'scale-95', 'invisible');
            }

            const profileDropdown = document.getElementById('profile-dropdown');
            const profileTrigger = e.target.closest('div[onclick="toggleProfileDropdown()"]');
            
            if (profileDropdown && !profileTrigger && !profileDropdown.contains(e.target) && !profileDropdown.classList.contains('invisible')) {
                profileDropdown.classList.add('opacity-0', 'scale-95', 'invisible');
                const arrow = document.getElementById('profile-arrow');
                if (arrow) arrow.classList.remove('rotate-180');
            }
        });

        async function fetchNotifications() {
            try {
                const response = await fetch('{{ route("prestasiprima.admin.notifications.index") }}');
                const data = await response.json();
                
                const list = document.getElementById('notification-list');
                const badge = document.getElementById('notification-badge');
                
                // Update badge
                if (data.unreadCount > 0) {
                    badge.textContent = data.unreadCount;
                    badge.classList.remove('hidden');
                    badge.classList.add('flex');
                } else {
                    badge.classList.add('hidden');
                    badge.classList.remove('flex');
                }

                // Update list
                if (data.notifications.length > 0) {
                    let html = '';
                    data.notifications.forEach(notif => {
                        const date = new Date(notif.created_at).toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit' });
                        html += `
                            <div class="px-6 py-4 hover:bg-slate-50 transition-colors group relative cursor-pointer" onclick="markNotificationRead('${notif.id}', '${notif.data.link || '#'}')">
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-orange-50 text-[#FF6B00] flex items-center justify-center flex-shrink-0 group-hover:bg-[#FF6B00] group-hover:text-white transition-all">
                                        <i class="${notif.data.icon || 'ri-notification-3-line'} text-lg"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-0.5">
                                            <h4 class="text-xs font-bold text-slate-800 truncate pr-4">${notif.data.title}</h4>
                                            <span class="text-[10px] text-slate-400 font-medium">${date}</span>
                                        </div>
                                        <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">${notif.data.message}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    list.innerHTML = html;
                } else {
                    list.innerHTML = `
                        <div class="p-8 text-center">
                            <div class="w-12 h-12 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="ri-notification-off-line text-slate-300 text-xl"></i>
                            </div>
                            <p class="text-xs text-slate-400 font-medium italic">Tidak ada notifikasi baru</p>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Error fetching notifications:', error);
            }
        }

        async function markNotificationRead(id, link) {
            try {
                await fetch(`{{ url('/admin/notifications') }}/${id}/mark-read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                });
                if (link && link !== '#') {
                    window.location.href = link;
                } else {
                    fetchNotifications();
                }
            } catch (error) {
                console.error('Error marking as read:', error);
            }
        }

        async function markAllNotificationsAsRead() {
            try {
                await fetch('{{ route("prestasiprima.admin.notifications.mark-all-read") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                });
                fetchNotifications();
            } catch (error) {
                console.error('Error marking all as read:', error);
            }
        }

        // Initial fetch and set interval loop for fallback
        document.addEventListener('DOMContentLoaded', () => {
            fetchNotifications();

            // WebSockets Listener
            setTimeout(() => {
                if (window.Echo) {
                    console.log('Status Echo: Mencoba mencari channel admin-activity...');
                    window.Echo.channel('admin-activity')
                        .listen('.ActivityLogged', (e) => {
                            console.log('Event Diterima:', e); // Debugging
                            // Update Badge
                            const badge = document.getElementById('notification-badge');
                            let count = parseInt(badge.textContent) || 0;
                            count++;
                            badge.textContent = count;
                            badge.classList.remove('hidden');
                            badge.classList.add('flex');

                            // Play Sound
                            // const audio = new Audio('/sounds/notification.mp3');
                            // audio.play().catch(e => console.log('Audio play failed', e));

                            // Update List
                            const list = document.getElementById('notification-list');
                            const noNotif = list.querySelector('.text-slate-400.italic');
                            if (noNotif && noNotif.textContent.includes('Tidak ada notifikasi')) {
                                // Clear empty state container
                                if (noNotif.closest('.p-8')) noNotif.closest('.p-8').remove();
                            }

                            const html = `
                                <div class="px-6 py-4 hover:bg-slate-50 transition-colors group relative cursor-pointer animate-page-entry bg-orange-50/30">
                                    <div class="flex gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#FF6B00] flex items-center justify-center flex-shrink-0">
                                            <i class="ri-notification-3-fill text-lg"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between mb-0.5">
                                                <h4 class="text-xs font-bold text-slate-800 truncate pr-4">Aktivitas Baru</h4>
                                                <span class="text-[10px] text-slate-400 font-medium">Baru saja</span>
                                            </div>
                                            <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">${e.description}</p>
                                            <p class="text-[10px] text-orange-500 mt-1 font-bold">${e.user} • ${e.action}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            list.insertAdjacentHTML('afterbegin', html);
                            
                            // Toast Notification
                            if (typeof Toast !== 'undefined') {
                                Toast.info(e.description, 'Aktivitas Baru');
                            }
                        });
                    console.log('Echo listening on admin-activity');

                    // Presence Channel for Live Visitor Counter
                    window.Echo.join('admin-presence')
                        .here((users) => {
                            updateOnlineCount(users.length);
                        })
                        .joining((user) => {
                            console.log('User Join:', user.name);
                            updateOnlineCount(); // Trigger refresh count
                        })
                        .leaving((user) => {
                            console.log('User Leave:', user.name);
                            updateOnlineCount(); // Trigger refresh count
                        })
                        .error((error) => {
                            console.error('Presence Error:', error);
                        });

                    function updateOnlineCount(count = null) {
                        const el = document.getElementById('online-count');
                        if (count !== null) {
                            el.textContent = count;
                        } else {
                            // If count is not provided, we can either re-fetch or use a more robust way
                            // For simplicity, Echo here() will handle initial count
                        }
                    }
                }
            }, 1000);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const profileDropdown = document.getElementById('profile-dropdown');
            const profileArrow = document.getElementById('profile-arrow');
            const notificationDropdown = document.getElementById('notification-dropdown');
            
            const profileTrigger = event.target.closest('[onclick="toggleProfileDropdown()"]');
            const notificationTrigger = event.target.closest('[onclick="toggleNotificationDropdown()"]');
            
            if (!profileTrigger && !profileDropdown.contains(event.target) && !profileDropdown.classList.contains('invisible')) {
                profileDropdown.classList.add('invisible', 'opacity-0', 'scale-95');
                profileArrow.classList.remove('rotate-180');
            }

            if (!notificationTrigger && !notificationDropdown.contains(event.target) && !notificationDropdown.classList.contains('invisible')) {
                notificationDropdown.classList.add('invisible', 'opacity-0', 'scale-95');
            }
        });
    </script>
    <script>
        // ================= GLOBAL UI MANAGER =================
        window.Toast = {
            container: document.getElementById('toast-container'),
            
            show(type, title, message, duration = 5000) {
                const id = 'toast-' + Math.random().toString(36).substr(2, 9);
                const icons = {
                    success: 'ri-checkbox-circle-fill',
                    error: 'ri-close-circle-fill',
                    warning: 'ri-alert-fill',
                    info: 'ri-information-fill'
                };
                
                // Allow simple usage: Toast.success('Message')
                if (!message) { message = title; title = type.charAt(0).toUpperCase() + type.slice(1); }

                const html = `
                    <div id="${id}" class="toast-item toast-${type}">
                        <div class="toast-icon">
                            <i class="${icons[type]} text-lg"></i>
                        </div>
                        <div class="toast-content">
                            <div class="toast-title">${title}</div>
                            <div class="toast-message">${message}</div>
                        </div>
                        <button class="toast-close" onclick="Toast.remove('${id}')">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                `;

                this.container.insertAdjacentHTML('beforeend', html);
                const element = document.getElementById(id);
                
                // Small delay to allow DOM paint before transition
                requestAnimationFrame(() => {
                    setTimeout(() => element.classList.add('show'), 10);
                });

                setTimeout(() => this.remove(id), duration);
            },

            remove(id) {
                const element = document.getElementById(id);
                if (element) {
                    element.classList.remove('show');
                    setTimeout(() => element.remove(), 400);
                }
            },

            success(msg, title = 'Berhasil') { this.show('success', title, msg); },
            error(msg, title = 'Error') { this.show('error', title, msg); },
            warning(msg, title = 'Peringatan') { this.show('warning', title, msg); },
            info(msg, title = 'Info') { this.show('info', title, msg); }
        };

        window.Confirm = {
            modal: document.getElementById('confirm-modal'),
            title: document.getElementById('confirm-title'),
            msg: document.getElementById('confirm-message'),
            btn: document.getElementById('confirm-execute'),
            icon: document.querySelector('.modal-icon i'),
            iconBox: document.querySelector('.modal-icon'),
            
            show(form, options = {}) {
                this.form = form;
                this.title.textContent = options.title || 'Konfirmasi Hapus';
                this.msg.textContent = options.message || 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.';
                this.btn.textContent = options.btnText || 'Ya, Hapus';
                
                // Style based on type
                if (options.type === 'warning') {
                     this.iconBox.style.background = '#FFFBEB';
                     this.iconBox.style.color = '#F59E0B';
                     this.icon.className = 'ri-alert-fill text-2xl';
                     this.btn.style.background = '#F59E0B';
                     this.btn.style.borderColor = '#F59E0B';
                } else {
                     this.iconBox.style.background = '#FEF2F2';
                     this.iconBox.style.color = '#EF4444';
                     this.icon.className = 'ri-delete-bin-line text-2xl';
                     this.btn.style.background = '#EF4444';
                     this.btn.style.borderColor = '#EF4444'; 
                }
                
                this.modal.classList.add('show');
                this.btn.onclick = () => { form.submit(); this.hide(); };
            },
            hide() { this.modal.classList.remove('show'); }
        };

        window.confirmDelete = function(e) {
            e.preventDefault();
            Confirm.show(e.target.closest('form'));
            return false;
        };

        // ================= SESSION HANDLERS =================
        @if(session('success')) setTimeout(() => Toast.success("{{ session('success') }}"), 300); @endif
        @if(session('error')) setTimeout(() => Toast.error("{{ session('error') }}"), 300); @endif
        @if(session('warning')) setTimeout(() => Toast.warning("{{ session('warning') }}"), 300); @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
                setTimeout(() => Toast.error("{{ $error }}", "Validasi Gagal"), 300);
            @endforeach
        @endif

        // ================= GLOBAL CHAT WIDGET =================
        let chatBadgeCount = 0;
        const currentUserId = {{ auth('authPP')->id() ?? 0 }};

        window.toggleChat = function() {
            const win = document.getElementById('chat-window');
            const btn = document.getElementById('chat-toggle');
            const isOpen = win.classList.contains('show');
            
            if (isOpen) {
                win.classList.remove('show');
                btn.classList.remove('active');
            } else {
                win.classList.add('show');
                btn.classList.add('active');
                
                // Clear badge
                chatBadgeCount = 0;
                document.getElementById('chat-badge').classList.add('hidden');
                
                // Fetch messages if empty
                if(document.getElementById('chat-messages').children.length <= 1) {
                    fetchChatMessages();
                }
                setTimeout(scrollToBottom, 100);
            }
        };

        async function fetchChatMessages() {
            try {
                const response = await fetch('{{ route("prestasiprima.admin.chat.index") }}');
                const messages = await response.json();
                const container = document.getElementById('chat-messages');
                
                if (messages.length > 0) {
                    container.innerHTML = '';
                    messages.forEach(msg => appendMessage(msg, false));
                    scrollToBottom();
                }
            } catch (error) { console.error('Chat Error:', error); }
        }

        function appendMessage(msg, animate = true) {
            const container = document.getElementById('chat-messages');
            const isMine = msg.user_id == currentUserId;
            
            // Simple logic to prevent "You" from seeing "You" as name
            const name = isMine ? 'Anda' : (msg.user_name || 'Admin');
            
            const html = `
                <div class="flex flex-col ${isMine ? 'items-end' : 'items-start'} ${animate ? 'animate-page-entry' : ''} mb-3">
                    <span class="text-[10px] text-slate-400 font-bold mb-1 px-1">${name}</span>
                    <div class="relative max-w-[85%] p-3 rounded-2xl text-xs leading-relaxed shadow-sm
                        ${isMine ? 'bg-[#FF6B00] text-white rounded-br-none' : 'bg-white text-slate-700 border border-slate-100 rounded-bl-none'}">
                        ${msg.message}
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        async function sendChatMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            if (!message) return;

            input.value = '';
            try {
                const response = await fetch('{{ route("prestasiprima.admin.chat.store") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ message })
                });
                const chat = await response.json();
                appendMessage(chat);
                scrollToBottom();
            } catch (error) {
                Toast.error('Gagal mengirim pesan');
            }
        }

        function scrollToBottom() {
            const container = document.getElementById('chat-messages');
            container.scrollTop = container.scrollHeight;
        }

        // Realtime Listener
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                if (window.Echo) {
                    window.Echo.join('admin-presence')
                        .listen('.AdminMessageSent', (e) => {
                            if(e.message.user_id != currentUserId) {
                                appendMessage(e.message);
                                if (!document.getElementById('chat-window').classList.contains('show')) {
                                    chatBadgeCount++;
                                    const badge = document.getElementById('chat-badge');
                                    badge.textContent = chatBadgeCount;
                                    badge.classList.remove('hidden');
                                    badge.classList.add('flex');
                                    Toast.info('Pesan baru dari ' + e.message.user_name, 'Admin Chat');
                                }
                                scrollToBottom();
                            }
                        });
                }
            }, 2000);
        });
    </script>
    {{-- NEW CHAT WIDGET --}}
    <div id="admin-chat-widget">
        <div id="chat-window">
             <div class="chat-header">
                 <div class="flex flex-col">
                    <span class="font-bold text-sm">Admin Live Chat</span>
                    <span class="text-[10px] opacity-90 font-medium">Global Room</span>
                 </div>
                 <button onclick="toggleChat()" class="hover:bg-white/20 p-1 rounded transition-colors"><i class="ri-close-line text-lg"></i></button>
             </div>
             <div class="chat-messages custom-scrollbar" id="chat-messages">
                 <div class="flex flex-col items-center justify-center h-full text-center p-8 opacity-50">
                     <i class="ri-chat-smile-2-line text-4xl mb-2 text-slate-300"></i>
                     <p class="text-[10px] text-slate-400">Mulai percakapan dengan admin lain.</p>
                 </div>
             </div>
             <div class="chat-input-area">
                 <input type="text" id="chat-input" placeholder="Ketik pesan..." onkeypress="if(event.key === 'Enter') sendChatMessage()">
                 <button onclick="sendChatMessage()" class="text-[#FF6B00] hover:bg-orange-50 p-2 rounded-lg transition-colors"><i class="ri-send-plane-fill text-xl"></i></button>
             </div>
        </div>
        <div id="chat-toggle" onclick="toggleChat()">
            <i class="ri-chat-4-fill" id="chat-icon"></i>
            <span id="chat-badge" class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] font-bold rounded-full border-2 border-white items-center justify-center hidden flex">0</span>
        </div>
    </div>

    {{-- CRITICAL MOBILE FIX - Load this script to fix backdrop and interaction issues --}}
    <script src="{{ asset('js/admin-mobile-fix.js') }}"></script>
</body>
</html>
