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

        /* Notification Responsive Fix */
        @media (max-width: 640px) {
            #notification-dropdown {
                position: absolute !important;
                right: -4rem !important;
                left: auto !important;
                width: 20rem !important;
                max-width: calc(100vw - 2rem) !important;
                transform-origin: top right !important;
            }
            #profile-dropdown {
                right: 0 !important;
                left: auto !important;
                width: 12rem !important; /* Fixed width for consistency */
                transform-origin: top right !important;
            }
        }

        /* Hamburger Animation */
        .hamburger-line {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .active .line-1 { transform: translateY(6px) rotate(45deg); }
        .active .line-2 { opacity: 0; transform: translateX(-10px); }
        .active .line-3 { transform: translateY(-6px) rotate(-45deg); }

        /* ================= PREMIUM ANIMATIONS & EFFECTS ================= */
        @keyframes cinemaEntry {
            0% { opacity: 0; transform: scale(0.98) translateY(15px); filter: blur(10px); }
            100% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
        }

        .animate-page-entry {
            animation: cinemaEntry 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .sidebar-item {
            position: relative;
            z-index: 1;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .sidebar-item::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%) scaleX(0);
            width: 4px;
            height: 60%;
            background: var(--primary);
            border-radius: 0 4px 4px 0;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform-origin: left;
        }

        .sidebar-item:hover::after, .sidebar-item-active::after {
            transform: translateY(-50%) scaleX(1);
        }

        .sidebar-item-active {
            background: linear-gradient(90deg, rgba(255, 107, 0, 0.08) 0%, transparent 100%) !important;
            color: var(--primary) !important;
            font-weight: 800 !important;
        }

        /* ================= TOAST NOTIFICATION SYSTEM ================= */
        #toast-container {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            pointer-events: none;
        }

        .toast-item {
            min-width: 320px;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 1.25rem;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            pointer-events: auto;
            transform: translateX(120%);
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            overflow: hidden;
        }

        .toast-item.show {
            transform: translateX(0);
        }

        .toast-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
        }

        .toast-success::before { background: transparent; }
        .toast-error::before { background: transparent; }
        .toast-warning::before { background: transparent; }
        .toast-info::before { background: transparent; }

        .toast-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.85rem;
            display: flex;
            items-center;
            justify-content: center;
            flex-shrink: 0;
        }

        .toast-success .toast-icon { background: #ECFDF5; color: #10B981; }
        .toast-error .toast-icon { background: #FEF2F2; color: #EF4444; }
        .toast-warning .toast-icon { background: #FFFBEB; color: #F59E0B; }
        .toast-info .toast-icon { background: #EFF6FF; color: #3B82F6; }

        .toast-content { flex-1: min-0; }
        .toast-title { font-size: 0.875rem; font-weight: 800; color: #1E293B; margin-bottom: 0.125rem; }
        .toast-message { font-size: 0.75rem; color: #64748B; font-weight: 500; line-height: 1.4; }

        .toast-close {
            color: #94A3B8;
            cursor: pointer;
            padding: 0.25rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }
        .toast-close:hover { background: #F1F5F9; color: #64748B; }

        .toast-progress {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .toast-progress-bar {
            width: 100%;
            height: 100%;
            transition: height linear;
        }
        .toast-success .toast-progress-bar { background: #10B981; }
        .toast-error .toast-progress-bar { background: #EF4444; }
        .toast-warning .toast-progress-bar { background: #F59E0B; }
        .toast-info .toast-progress-bar { background: #3B82F6; }

        /* ================= CONFIRMATION MODAL ================= */
        #confirm-modal {
            position: fixed;
            inset: 0;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #confirm-modal.show {
            opacity: 1;
            pointer-events: auto;
        }

        #confirm-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(8px);
        }

        #confirm-modal-content {
            position: relative;
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 2.5rem;
            padding: 2rem;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.2);
            transform: scale(0.9) translateY(20px);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        #confirm-modal.show #confirm-modal-content {
            transform: scale(1) translateY(0);
        }

        .confirm-icon-box {
            width: 4rem;
            height: 4rem;
            border-radius: 1.25rem;
            background: #FEF2F2;
            color: #EF4444;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
        }

        .confirm-title { font-size: 1.5rem; font-weight: 900; color: #1E293B; text-align: center; margin-bottom: 0.75rem; letter-spacing: -0.025em; }
        .confirm-message { font-size: 0.875rem; color: #64748B; text-align: center; margin-bottom: 2rem; line-height: 1.6; font-weight: 500; }

        .confirm-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn-confirm-cancel {
            padding: 0.875rem;
            border-radius: 1.25rem;
            border: 2px solid #F1F5F9;
            background: white;
            color: #64748B;
            font-weight: 800;
            font-size: 0.875rem;
            transition: all 0.2s;
        }
        .btn-confirm-cancel:hover { background: #F8FAFC; border-color: #E2E8F0; color: #1E293B; }

        .btn-confirm-danger {
            padding: 0.875rem;
            border-radius: 1.25rem;
            background: #EF4444;
            color: white;
            font-weight: 800;
            font-size: 0.875rem;
            box-shadow: 0 10px 20px -5px rgba(239, 68, 68, 0.3);
            transition: all 0.2s;
        }
        .btn-confirm-danger:hover { background: #DC2626; transform: translateY(-2px); box-shadow: 0 15px 25px -5px rgba(239, 68, 68, 0.4); }
        .btn-confirm-danger:active { transform: translateY(0); }

        /* ================= FLOATING CHAT WIDGET ================= */
        #admin-chat-widget {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        #chat-window {
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            margin-bottom: 1.5rem;
            transform: scale(0.8) translateY(20px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(255, 107, 0, 0.1);
        }

        #chat-window.show {
            transform: scale(1) translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .chat-header {
            background: linear-gradient(135deg, #FF6B00, #E65100);
            padding: 1.5rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            background: #F8FAFC;
        }

        .message-bubble {
            max-width: 80%;
            padding: 0.75rem 1rem;
            border-radius: 1.25rem;
            font-size: 0.8125rem;
            line-height: 1.5;
            position: relative;
        }

        .message-mine {
            align-self: flex-end;
            background: #FF6B00;
            color: white;
            border-bottom-right-radius: 0.25rem;
        }

        .message-others {
            align-self: flex-start;
            background: white;
            color: #1E293B;
            border-bottom-left-radius: 0.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .chat-input-area {
            padding: 1rem;
            background: white;
            border-top: 1px solid #F1F5F9;
            display: flex;
            gap: 0.75rem;
        }

        #chat-input {
            flex: 1;
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            font-size: 0.8125rem;
            outline: none;
            transition: all 0.2s;
        }

        #chat-input:focus {
            border-color: #FF6B00;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.1);
        }

        .chat-toggle-btn {
            width: 4rem;
            height: 4rem;
            background: #FF6B00;
            border-radius: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.75rem;
            box-shadow: 0 20px 25px -5px rgba(255, 107, 0, 0.3);
            cursor: pointer;
            transition: all 0.3s;
        }

        .chat-toggle-btn:hover {
            transform: scale(1.1) rotate(-5deg);
            background: #E65100;
        }

        .chat-toggle-btn.active {
            transform: scale(0.9) rotate(90deg);
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 transition-colors duration-500">

    {{-- TOAST CONTAINER --}}
    <div id="toast-container"></div>

    {{-- CONFIRM DIALOG --}}
    <div id="confirm-modal">
        <div id="confirm-modal-backdrop" onclick="Confirm.hide()"></div>
        <div id="confirm-modal-content">
            <div class="confirm-icon-box">
                <i class="ri-delete-bin-fill text-4xl"></i>
            </div>
            <h3 class="confirm-title" id="confirm-title">Konfirmasi Hapus</h3>
            <p class="confirm-message" id="confirm-message">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="confirm-actions">
                <button type="button" class="btn-confirm-cancel" onclick="Confirm.hide()">Batal</button>
                <button type="button" class="btn-confirm-danger" id="confirm-execute">Hapus Data</button>
            </div>
        </div>
    </div>
    {{-- Backdrop for mobile sidebar --}}
    <div id="sidebar-backdrop" onclick="toggleMobileSidebar()" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-20 invisible opacity-0 transition-opacity duration-300 lg:hidden"></div>

    {{-- ================= SIDEBAR ================= --}}
    <aside id="admin-sidebar" class="w-[280px] bg-white border-r border-slate-100 flex flex-col fixed inset-y-0 left-0 z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] shadow-2xl lg:shadow-none">
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
                            ['label' => 'Dashboard', 'route' => 'prestasiprima.admin.dashboard', 'icon' => 'ri-dashboard-line', 'active' => $currentRoute === 'prestasiprima.admin.dashboard'],
                        ]
                    ],
                    [
                        'category' => 'Konten & Media',
                        'icon' => 'ri-folder-2-line',
                        'roles' => ['super_admin', 'editor', 'moderator', 'viewer'],
                        'items' => [
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
                            ['label' => 'Manajemen Staff', 'route' => 'prestasiprima.admin.staff.index', 'icon' => 'ri-user-settings-line', 'active' => str_contains($currentRoute, 'staff'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
                            ['label' => 'Kerjasama Industri', 'route' => 'prestasiprima.admin.industri.index', 'icon' => 'ri-building-2-line', 'active' => str_contains($currentRoute, 'industri'), 'roles' => ['super_admin', 'editor', 'moderator', 'viewer']],
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
                        
                        <div id="{{ $categoryId }}" class="dropdown-content overflow-hidden transition-all duration-300 {{ $hasActiveItem ? 'max-h-96' : 'max-h-0' }}">
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
                    <span class="text-sm">Lihat Website Utama</span>
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
    <main class="lg:pl-72 min-h-screen transition-all duration-500 animate-page-entry">
        {{-- HEADER --}}
        <header class="glass-header sticky top-0 z-20 border-b border-slate-200/60 px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    {{-- Premium Hamburger --}}
                    <button id="hamburger-trigger" onclick="toggleMobileSidebar()" class="lg:hidden w-11 h-11 bg-white border border-slate-200 rounded-2xl flex flex-col items-center justify-center gap-1.5 text-slate-500 shadow-sm hover:border-orange-500 hover:text-orange-500 transition-all active:scale-95">
                        <span class="hamburger-line line-1 w-6 h-0.5 bg-current rounded-full"></span>
                        <span class="hamburger-line line-2 w-4 h-0.5 bg-current rounded-full self-start ml-[7px]"></span>
                        <span class="hamburger-line line-3 w-6 h-0.5 bg-current rounded-full"></span>
                    </button>
                    <div class="max-w-[150px] sm:max-w-none">
                        <h2 class="text-sm md:text-xl font-bold text-slate-800 leading-tight truncate">@yield('title')</h2>
                        <p class="hidden md:block text-xs text-slate-500 mt-0.5 font-medium">Selamat datang kembali, Admin!</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-2 md:gap-4">
                    {{-- Notification Bell --}}
                    <div class="relative">
                        <button onclick="toggleNotificationDropdown()" class="w-11 h-11 bg-white border border-slate-200 rounded-2xl flex items-center justify-center text-slate-500 hover:text-orange-500 hover:border-orange-500 transition-all relative group shadow-sm active:scale-95">
                            <i class="ri-notification-3-line text-xl group-hover:animate-swing"></i>
                            <span id="notification-badge" class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] font-bold rounded-full border-2 border-white items-center justify-center hidden">
                                0
                            </span>
                        </button>

                        {{-- Notification Dropdown --}}
                        <div id="notification-dropdown" class="absolute right-0 mt-4 w-80 md:w-96 bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.15)] border border-slate-100 transform origin-top-right transition-all duration-300 opacity-0 scale-95 invisible z-[60] overflow-hidden">
                            <div class="px-6 py-5 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
                                <div>
                                    <h3 class="text-sm font-bold text-slate-800">Notifikasi</h3>
                                    <p class="text-[10px] text-slate-400 font-medium">Update terbaru dari sistem</p>
                                </div>
                                <button onclick="markAllNotificationsAsRead()" class="text-[10px] font-bold text-[#FF6B00] hover:text-[#E65100] transition-colors uppercase tracking-wider">Tandai Baca</button>
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
                                {{ substr(auth('authPP')->user()->name, 0, 1) }}
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm font-bold text-slate-800 leading-none">{{ auth('authPP')->user()->name }}</p>
                                <p class="text-[10px] text-orange-600 font-bold mt-1 uppercase tracking-wider">{{ auth('authPP')->user()->role_label }}</p>
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
        <section class="p-4 sm:p-6 md:p-8 lg:p-10 pb-12 w-full">
            <div class="max-w-7xl">
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

    {{-- Dropdown Toggle Script --}}
    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            const trigger = document.getElementById('hamburger-trigger');
            const isHidden = sidebar.classList.contains('-translate-x-full');

            if (isHidden) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('invisible', 'opacity-0');
                backdrop.classList.add('opacity-100');
                trigger.classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('opacity-0');
                trigger.classList.remove('active');
                setTimeout(() => {
                    backdrop.classList.add('invisible');
                    document.body.style.overflow = '';
                }, 300);
            }
        }

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
                // Hide other dropdowns if open
                document.getElementById('notification-dropdown').classList.add('invisible', 'opacity-0', 'scale-95');
            } else {
                // Hide
                dropdown.classList.add('invisible', 'opacity-0', 'scale-95');
                arrow.classList.remove('rotate-180');
            }
        }

        function toggleNotificationDropdown() {
            const dropdown = document.getElementById('notification-dropdown');
            
            if (dropdown.classList.contains('invisible')) {
                // Show
                dropdown.classList.remove('invisible', 'opacity-0', 'scale-95');
                // Hide other dropdowns if open
                document.getElementById('profile-dropdown').classList.add('invisible', 'opacity-0', 'scale-95');
                document.getElementById('profile-arrow').classList.remove('rotate-180');
                
                // Fetch notifications
                fetchNotifications();
            } else {
                // Hide
                dropdown.classList.add('invisible', 'opacity-0', 'scale-95');
            }
        }

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
                await fetch(`{{ url('/prestasiprima/admin/notifications') }}/${id}/mark-read`, {
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
        // ================= TOAST MANAGER =================
        const Toast = {
            container: document.getElementById('toast-container'),
            
            show(type, title, message, duration = 4000) {
                const id = 'toast-' + Math.random().toString(36).substr(2, 9);
                const icons = {
                    success: 'ri-checkbox-circle-fill',
                    error: 'ri-error-warning-fill',
                    warning: 'ri-alert-fill',
                    info: 'ri-information-fill'
                };

                const html = `
                    <div id="${id}" class="toast-item toast-${type}">
                        <div class="toast-icon">
                            <i class="${icons[type]} text-xl"></i>
                        </div>
                        <div class="toast-content">
                            <div class="toast-title">${title}</div>
                            <div class="toast-message">${message}</div>
                        </div>
                        <div class="toast-close" onclick="Toast.remove('${id}')">
                            <i class="ri-close-line"></i>
                        </div>
                        <div class="toast-progress">
                            <div id="${id}-progress" class="toast-progress-bar"></div>
                        </div>
                    </div>
                `;

                this.container.insertAdjacentHTML('beforeend', html);
                const element = document.getElementById(id);
                const progress = document.getElementById(id + '-progress');

                // Animate entrance
                setTimeout(() => element.classList.add('show'), 10);

                // Progress bar animation
                progress.style.transitionDuration = duration + 'ms';
                setTimeout(() => progress.style.height = '0%', 20);

                // Auto remove
                const timeout = setTimeout(() => this.remove(id), duration);
                element.dataset.timeoutId = timeout;
            },

            remove(id) {
                const element = document.getElementById(id);
                if (!element) return;
                
                clearTimeout(element.dataset.timeoutId);
                element.classList.remove('show');
                setTimeout(() => element.remove(), 500);
            },

            success(message, title = 'Berhasil!') { this.show('success', title, message); },
            error(message, title = 'Kesalahan!') { this.show('error', title, message); },
            warning(message, title = 'Peringatan!') { this.show('warning', title, message); },
            info(message, title = 'Informasi') { this.show('info', title, message); }
        };

        // ================= CONFIRMATION MANAGER =================
        const Confirm = {
            modal: document.getElementById('confirm-modal'),
            title: document.getElementById('confirm-title'),
            message: document.getElementById('confirm-message'),
            executeBtn: document.getElementById('confirm-execute'),
            formToSubmit: null,

            show(form, options = {}) {
                this.formToSubmit = form;
                this.title.textContent = options.title || 'Konfirmasi Hapus';
                this.message.textContent = options.message || 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.';
                this.executeBtn.textContent = options.buttonText || 'Hapus Data';
                
                // Color adjustment if not a danger action
                if(options.type === 'warning') {
                    document.querySelector('.confirm-icon-box').style.background = '#FFFBEB';
                    document.querySelector('.confirm-icon-box').style.color = '#F59E0B';
                    document.querySelector('.confirm-icon-box i').className = 'ri-alert-fill text-4xl';
                    this.executeBtn.style.background = '#F59E0B';
                    this.executeBtn.style.boxShadow = '0 10px 20px -5px rgba(245, 158, 11, 0.3)';
                } else {
                    document.querySelector('.confirm-icon-box').style.background = '#FEF2F2';
                    document.querySelector('.confirm-icon-box').style.color = '#EF4444';
                    document.querySelector('.confirm-icon-box i').className = 'ri-delete-bin-fill text-4xl';
                    this.executeBtn.style.background = '#EF4444';
                    this.executeBtn.style.boxShadow = '0 10px 20px -5px rgba(239, 68, 68, 0.3)';
                }

                this.modal.classList.add('show');
                
                this.executeBtn.onclick = () => {
                    this.formToSubmit.submit();
                    this.hide();
                };
            },

            hide() {
                this.modal.classList.remove('show');
                this.formToSubmit = null;
            }
        };

        // Helper untuk tombol delete di seluruh halaman
        function confirmDelete(event, options = {}) {
            event.preventDefault();
            const form = event.target.closest('form');
            Confirm.show(form, options);
            return false;
        }

        // Handle Laravel Session Flash Messages
        @if(session('success'))
            setTimeout(() => Toast.success("{{ session('success') }}"), 100);
        @endif

        @if(session('error'))
            setTimeout(() => Toast.error("{{ session('error') }}"), 100);
        @endif

        @if(session('warning'))
            setTimeout(() => Toast.warning("{{ session('warning') }}"), 100);
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                setTimeout(() => Toast.error("{{ $error }}", "Validasi Gagal"), 200);
            @endforeach
        @endif

        // Force unregister Service Worker for Admin Area
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.getRegistrations().then(function(registrations) {
                for(let registration of registrations) {
                    registration.unregister();
                    console.log('Service Worker Unregistered for Admin');
                }
            });
        }

        // ================= ADMIN CHAT LOGIC =================
        let chatBadgeCount = 0;
        const currentUserId = {{ auth('authPP')->id() }};

        function toggleChat() {
            const window = document.getElementById('chat-window');
            const toggle = document.getElementById('chat-toggle');
            const icon = document.getElementById('chat-icon');
            const isOpen = window.classList.contains('show');

            if (isOpen) {
                window.classList.remove('show');
                toggle.classList.remove('active');
                icon.className = 'ri-chat-4-fill';
            } else {
                window.classList.add('show');
                toggle.classList.add('active');
                icon.className = 'ri-close-line';
                
                // Clear badge
                chatBadgeCount = 0;
                document.getElementById('chat-badge').classList.add('hidden');
                
                // Fetch messages if first time
                fetchChatMessages();
                
                // Scroll to bottom
                setTimeout(scrollToBottom, 100);
            }
        }

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
            } catch (error) {
                console.error('Fetch Chat Error:', error);
            }
        }

        function appendMessage(msg, animate = true) {
            const container = document.getElementById('chat-messages');
            const isMine = msg.user_id == currentUserId;
            
            const html = `
                <div class="flex flex-col ${isMine ? 'items-end' : 'items-start'} ${animate ? 'animate-page-entry' : ''}">
                    <span class="text-[9px] text-slate-400 font-bold mb-1 px-2">${isMine ? 'Anda' : msg.user_name}</span>
                    <div class="message-bubble ${isMine ? 'message-mine' : 'message-others'}">
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
                console.error('Send Msg Error:', error);
                Toast.error('Gagal mengirim pesan');
            }
        }

        function scrollToBottom() {
            const container = document.getElementById('chat-messages');
            container.scrollTop = container.scrollHeight;
        }

        // Listen for realtime messages
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                if (window.Echo) {
                    window.Echo.join('admin-presence')
                        .listen('.AdminMessageSent', (e) => {
                            console.log('Chat Baru:', e);
                            appendMessage(e.message);
                            
                            // Update badge if chat window is closed
                            if (!document.getElementById('chat-window').classList.contains('show')) {
                                chatBadgeCount++;
                                const badge = document.getElementById('chat-badge');
                                badge.textContent = chatBadgeCount;
                                badge.classList.remove('hidden');
                                badge.classList.add('flex');
                                
                                // Optional: Play notification sound
                                Toast.info('Pesan baru dari ' + e.message.user_name, 'Admin Chat');
                            }
                            
                            scrollToBottom();
                        });
                }
            }, 2000);
        });
    </script>
    {{-- FLOATING CHAT WIDGET --}}
    <div id="admin-chat-widget">
        <div id="chat-window">
            <div class="chat-header">
                <div>
                    <h3 class="text-sm font-extrabold tracking-tight">Admin Live Chat</h3>
                    <p class="text-[10px] text-orange-100 font-medium">Terhubung dengan admin lain</p>
                </div>
                <button onclick="toggleChat()" class="text-white/80 hover:text-white transition-colors">
                    <i class="ri-close-line text-xl"></i>
                </button>
            </div>
            <div id="chat-messages" class="chat-messages">
                <!-- Messages go here -->
                <div class="flex flex-col items-center justify-center h-full text-center p-8">
                    <div class="w-12 h-12 bg-slate-100 rounded-2xl flex items-center justify-center mb-3">
                        <i class="ri-chat-smile-2-line text-slate-400 text-xl"></i>
                    </div>
                    <p class="text-[11px] text-slate-400 font-medium">Halo! Mulai chat dengan admin lain yang sedang online.</p>
                </div>
            </div>
            <div class="chat-input-area">
                <input type="text" id="chat-input" placeholder="Tulis pesan..." onkeypress="if(event.key === 'Enter') sendChatMessage()">
                <button onclick="sendChatMessage()" class="w-10 h-10 bg-orange-100 text-[#FF6B00] rounded-xl flex items-center justify-center hover:bg-[#FF6B00] hover:text-white transition-all active:scale-90">
                    <i class="ri-send-plane-2-fill"></i>
                </button>
            </div>
        </div>
        <div id="chat-toggle" onclick="toggleChat()" class="chat-toggle-btn relative">
            <i class="ri-chat-4-fill" id="chat-icon"></i>
            <span id="chat-badge" class="absolute -top-1 -right-1 w-6 h-6 bg-red-500 text-white text-[10px] font-bold rounded-full border-2 border-white items-center justify-center hidden">0</span>
        </div>
    </div>
</body>
</html>
