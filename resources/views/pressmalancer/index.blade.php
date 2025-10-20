<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JobPortal - Daftar Lowongan Kerja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: 'var(--background)',
                        foreground: 'var(--foreground)',
                        card: 'var(--card)',
                        'card-foreground': 'var(--card-foreground)',
                        primary: 'var(--primary)',
                        'primary-foreground': 'var(--primary-foreground)',
                        secondary: 'var(--secondary)',
                        'secondary-foreground': 'var(--secondary-foreground)',
                        border: 'var(--border)',
                        ring: 'var(--ring)',
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --background: #ffffff;
            --foreground: rgb(2 6 23);
            --card: #ffffff;
            --card-foreground: rgb(2 6 23);
            --primary: #030213;
            --primary-foreground: #ffffff;
            --secondary: rgb(241 245 249);
            --secondary-foreground: #030213;
            --border: rgba(0, 0, 0, 0.1);
            --ring: rgb(148 163 184);
        }

        .animate-fade-in {
            animation: fadeIn 1.2s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: rgb(249 115 22) rgb(251 146 60);
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: linear-gradient(to bottom, rgb(254 215 170), rgb(253 186 116));
            border-radius: 4px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, rgb(249 115 22), rgb(234 88 12));
            border-radius: 4px;
            border: 1px solid rgb(251 146 60);
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, rgb(234 88 12), rgb(194 65 12));
        }

        .job-card.selected {
            ring-width: 2px;
            ring-color: rgb(249 115 22);
            border-color: rgb(253 186 116);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .modal {
            backdrop-filter: blur(8px);
        }

        .modal.show {
            display: flex !important;
        }

        /* SVG Icons */
        .icon {
            width: 1rem;
            height: 1rem;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-blue-50">
    <!-- Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 bg-gray-50 flex items-center justify-center z-50">
        <div class="text-center">
            <div class="w-16 h-16 border-4 border-orange-200 border-t-orange-500 rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-gray-600">Memuat lowongan kerja...</p>
        </div>
    </div>

    <div id="app" class="opacity-0">
        <!-- Header -->
        <header class="bg-white/90 backdrop-blur-lg shadow-lg border-b border-orange-100 sticky top-0 z-10">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-medium bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">JobPortal</h1>
                    </div>
                    <button class="px-4 py-2 border border-orange-200 text-orange-600 hover:bg-orange-50 rounded-lg transition-colors duration-200 text-sm font-medium">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                        Simpan Pencarian
                    </button>
                </div>
                
                <!-- Dual Search Bar -->
                <form id="search-form" class="flex gap-4 items-center" method="GET" action="{{ route('jobs.index') ?? '#' }}">
                    <div class="relative flex-1">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input
                            type="text"
                            name="search"
                            id="search-input"
                            placeholder="Cari posisi atau perusahaan..."
                            value="{{ request('search') ?? '' }}"
                            class="w-full pl-10 h-12 border border-orange-200 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 rounded-lg outline-none transition-all duration-200"
                        />
                    </div>
                    <div class="relative min-w-[200px]">
                        <select name="location" id="location-select" class="w-full h-12 border border-orange-200 focus:border-orange-400 focus:ring-2 focus:ring-orange-200 rounded-lg pl-10 pr-4 appearance-none bg-white outline-none transition-all duration-200">
                            <option value="">Semua Lokasi</option>
                            <option value="jakarta" {{ request('location') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                            <option value="bandung" {{ request('location') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                            <option value="surabaya" {{ request('location') == 'surabaya' ? 'selected' : '' }}>Surabaya</option>
                            <option value="medan" {{ request('location') == 'medan' ? 'selected' : '' }}>Medan</option>
                            <option value="semarang" {{ request('location') == 'semarang' ? 'selected' : '' }}>Semarang</option>
                            <option value="makassar" {{ request('location') == 'makassar' ? 'selected' : '' }}>Makassar</option>
                            <option value="palembang" {{ request('location') == 'palembang' ? 'selected' : '' }}>Palembang</option>
                            <option value="yogyakarta" {{ request('location') == 'yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                            <option value="denpasar" {{ request('location') == 'denpasar' ? 'selected' : '' }}>Denpasar</option>
                            <option value="balikpapan" {{ request('location') == 'balikpapan' ? 'selected' : '' }}>Balikpapan</option>
                        </select>
                        <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <svg class="w-4 h-4 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <button type="submit" class="bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white h-12 px-8 rounded-lg shadow-lg transition-all duration-200 font-medium">
                        Cari
                    </button>
                </form>

                <!-- Filter Tags -->
                <div class="flex gap-2 mt-4 overflow-x-auto pb-2">
                    @php
                        $filters = ['All', 'Web Development', 'UI/UX Design', 'Data Science', 'Mobile Development'];
                    @endphp
                    @foreach($filters as $filter)
                    <span class="filter-tag cursor-pointer whitespace-nowrap px-3 py-1 rounded-full border transition-all duration-200 text-sm font-medium
                        {{ request('category') == $filter || (!request('category') && $filter == 'All') ? 'bg-orange-500 text-white border-orange-500' : 'border-gray-200 text-gray-600 hover:bg-orange-50 hover:border-orange-200' }}"
                        data-filter="{{ $filter }}">
                        {{ $filter }}
                    </span>
                    @endforeach
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-6">
            <div class="grid grid-cols-1 xl:grid-cols-4 gap-6 h-[calc(100vh-200px)]">
              
                <!-- Left Sidebar - Company Info -->
                <div class="xl:col-span-1">
                    <div class="h-full bg-gradient-to-b from-white to-orange-50/30 border border-orange-100 shadow-xl rounded-lg">
                        <div class="h-full overflow-y-auto custom-scrollbar" id="company-sidebar">
                            <!-- Featured Company Header -->
                            <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white p-6 rounded-t-lg" id="company-header">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-white/20 backdrop-blur">
                                        <img id="company-logo" src="https://images.unsplash.com/photo-1662052955098-042b46e60c2b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0ZWNobm9sb2d5JTIwY29tcGFueSUyMGxvZ298ZW58MXx8fHwxNzU4ODg1MTkzfDA&ixlib=rb-4.1.0&q=80&w=1080" alt="Company logo" class="w-full h-full object-cover" />
                                    </div>
                                    <div>
                                        <h2 class="font-semibold mb-1" id="company-name">PT Aditya Birla Indonesia</h2>
                                        <p class="text-orange-100" id="company-industry">Technology & Manufacturing</p>
                                    </div>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-400 text-yellow-900 text-sm font-medium">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                    Featured Company
                                </span>
                            </div>

                            <!-- Stats Grid -->
                            <div class="p-6 grid grid-cols-2 gap-4" id="company-stats">
                                <div class="text-center p-4 bg-gradient-to-br from-orange-100 to-orange-200 rounded-xl">
                                    <div class="text-2xl font-bold text-orange-600" id="active-jobs">15</div>
                                    <div class="text-sm text-orange-700">Lowongan Aktif</div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl">
                                    <div class="text-2xl font-bold text-blue-600" id="employees-count">1000+</div>
                                    <div class="text-sm text-blue-700">Karyawan</div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-br from-green-100 to-green-200 rounded-xl">
                                    <div class="text-2xl font-bold text-green-600" id="company-rating">4.8</div>
                                    <div class="text-sm text-green-700">Rating Perusahaan</div>
                                    <div class="flex justify-center mt-1" id="rating-stars">
                                        <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                        <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    </div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-br from-purple-100 to-purple-200 rounded-xl">
                                    <div class="text-2xl font-bold text-purple-600" id="reviews-count">1200</div>
                                    <div class="text-sm text-purple-700">Reviews</div>
                                    <div class="text-xs text-purple-600 mt-1">Glassdoor</div>
                                </div>
                            </div>

                            <!-- Company Information -->
                            <div class="px-6 pb-6 space-y-6" id="company-details">
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        Informasi Perusahaan
                                    </h3>
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                            <span class="text-gray-500 flex items-center gap-2">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                </svg>
                                                Lokasi
                                            </span>
                                            <span class="text-gray-900">Jakarta, Indonesia</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                            <span class="text-gray-500 flex items-center gap-2">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                                Ukuran Perusahaan
                                            </span>
                                            <span class="text-gray-900">1000+ karyawan</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                            <span class="text-gray-500 flex items-center gap-2">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6M4 21h16a2 2 0 002-2V7a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                Didirikan
                                            </span>
                                            <span class="text-gray-900">1995</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                            <span class="text-gray-500 flex items-center gap-2">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                                </svg>
                                                Website
                                            </span>
                                            <span class="text-blue-600">www.adityabirla.co.id</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- About Company -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900">Tentang Perusahaan</h3>
                                    <p class="text-gray-600 leading-relaxed mb-4">PT Aditya Birla Indonesia adalah perusahaan multinasional yang bergerak di bidang teknologi dan manufaktur. Kami berkomitmen untuk memberikan solusi inovatif dan berkualitas tinggi kepada klien di seluruh Indonesia.</p>
                                    
                                    <div class="space-y-2">
                                        <p class="font-medium text-gray-900">Highlights:</p>
                                        <div class="flex items-start gap-2 text-gray-600">
                                            <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Perusahaan dengan pertumbuhan 15% year-over-year
                                        </div>
                                        <div class="flex items-start gap-2 text-gray-600">
                                            <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Work-life balance rating 4.5/5 oleh karyawan
                                        </div>
                                        <div class="flex items-start gap-2 text-gray-600">
                                            <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Sertifikasi ISO 9001:2015 & ISO 14001:2015
                                        </div>
                                    </div>
                                </div>

                                <!-- Benefits -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                        Benefit & Fasilitas
                                    </h3>
                                    <div class="grid grid-cols-1 gap-2">
                                        <div class="flex items-center gap-2 text-gray-600 p-2 bg-green-50 rounded-lg">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Asuransi Kesehatan
                                        </div>
                                        <div class="flex items-center gap-2 text-gray-600 p-2 bg-green-50 rounded-lg">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Tunjangan Transport
                                        </div>
                                        <div class="flex items-center gap-2 text-gray-600 p-2 bg-green-50 rounded-lg">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Bonus Kinerja
                                        </div>
                                        <div class="flex items-center gap-2 text-gray-600 p-2 bg-green-50 rounded-lg">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Cuti Tahunan
                                        </div>
                                        <div class="flex items-center gap-2 text-gray-600 p-2 bg-green-50 rounded-lg">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Training & Development
                                        </div>
                                        <div class="flex items-center gap-2 text-gray-600 p-2 bg-green-50 rounded-lg">
                                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Work Life Balance
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact & Office -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900">Kontak & Kantor</h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-3 text-gray-600">
                                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            +62 21 1234 5678
                                        </div>
                                        <div class="flex items-center gap-3 text-gray-600">
                                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            careers@adityabirla.co.id
                                        </div>
                                        <div class="flex items-center gap-3 text-gray-600">
                                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Senin - Jumat: 08:00 - 17:00 WIB
                                        </div>
                                    </div>
                                </div>

                                <!-- Performance -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                        </svg>
                                        Performa Perusahaan
                                    </h3>
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center p-3 bg-gradient-to-r from-green-50 to-green-100 rounded-lg">
                                            <div>
                                                <div class="text-lg font-bold text-green-700">+23%</div>
                                                <div class="text-sm text-green-600">Revenue Growth</div>
                                            </div>
                                            <div class="text-xs text-green-600">Year over Year</div>
                                        </div>
                                        <div class="flex justify-between items-center p-3 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg">
                                            <div>
                                                <div class="text-lg font-bold text-blue-700">92%</div>
                                                <div class="text-sm text-blue-600">Employee Satisfaction</div>
                                            </div>
                                            <div class="text-xs text-blue-600">Internal Survey 2024</div>
                                        </div>
                                        <div class="flex justify-between items-center p-3 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg">
                                            <div>
                                                <div class="text-lg font-bold text-purple-700">Top 3</div>
                                                <div class="text-sm text-purple-600">Market Position</div>
                                            </div>
                                            <div class="text-xs text-purple-600">Industry Ranking</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="space-y-3 pt-4">
                                    <button class="w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white py-3 rounded-lg font-medium transition-all duration-200">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Lihat Semua Lowongan
                                    </button>
                                    <button class="w-full border border-orange-200 text-orange-600 hover:bg-orange-50 py-3 rounded-lg font-medium transition-all duration-200">
                                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                        Follow Perusahaan
                                    </button>
                                </div>

                                <!-- Other Companies -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900">Perusahaan Lainnya</h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-3 p-3 bg-white rounded-lg border border-gray-100 hover:border-orange-200 cursor-pointer transition-all duration-200 hover:shadow-md company-card" data-company-id="2">
                                            <div class="w-10 h-10 rounded-lg overflow-hidden bg-gray-100">
                                                <img src="https://images.unsplash.com/photo-1695891583421-3cbbf1c2e3bd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvZmZpY2UlMjBidWlsZGluZyUyMGNvcnBvcmF0ZXxlbnwxfHx8fDE3NTg4MzkyNDB8MA&ixlib=rb-4.1.0&q=80&w=1080" alt="Jaetindo Creative logo" class="w-full h-full object-cover" />
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="font-medium text-gray-900 truncate">Jaetindo Creative</div>
                                                <div class="text-sm text-gray-500">Creative & Design</div>
                                                <div class="text-xs text-orange-600">8 lowongan</div>
                                            </div>
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job List - Center Scrollable -->
                <div class="xl:col-span-2">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-600">
                            <span id="jobs-count">{{ $jobs->count() ?? 5 }}</span> lowongan ditemukan
                        </p>
                        <button class="px-4 py-2 border border-orange-200 text-orange-600 hover:bg-orange-50 rounded-lg transition-colors duration-200 text-sm font-medium">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                            </svg>
                            Filter Lanjutan
                        </button>
                    </div>
                    
                    <div class="space-y-4 overflow-y-auto h-full pr-2 custom-scrollbar" id="jobs-container">
                        @php
                            $defaultJobs = [
                                [
                                    'id' => 1,
                                    'title' => 'Junior Web Developer',
                                    'company_name' => 'PT Aditya Birla Indonesia',
                                    'company_logo' => 'https://images.unsplash.com/photo-1662052955098-042b46e60c2b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0ZWNobm9sb2d5JTIwY29tcGFueSUyMGxvZ298ZW58MXx8fHwxNzU4ODg1MTkzfDA&ixlib=rb-4.1.0&q=80&w=1080',
                                    'location' => 'Jakarta Selatan',
                                    'salary' => '5-8 juta',
                                    'type' => 'Full Time',
                                    'posted' => '2 hari lalu',
                                    'description' => 'Kami mencari Junior Web Developer yang passionate untuk bergabung dengan tim kami. Kandidat yang ideal memiliki pengalaman dalam HTML, CSS, JavaScript, dan framework modern.',
                                    'requirements' => ['HTML5, CSS3, JavaScript', 'React atau Vue.js', 'Git & GitHub', 'Responsive Design', 'Problem Solving'],
                                    'application_deadline' => '30 September 2025'
                                ],
                                [
                                    'id' => 2,
                                    'title' => 'UI & UX Designer',
                                    'company_name' => 'Jaetindo Creative',
                                    'company_logo' => 'https://images.unsplash.com/photo-1695891583421-3cbbf1c2e3bd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvZmZpY2UlMjBidWlsZGluZyUyMGNvcnBvcmF0ZXxlbnwxfHx8fDE3NTg4MzkyNDB8MA&ixlib=rb-4.1.0&q=80&w=1080',
                                    'location' => 'Jakarta Pusat',
                                    'salary' => '8-12 juta',
                                    'type' => 'Full Time',
                                    'posted' => '1 hari lalu',
                                    'description' => 'Mencari UI/UX Designer kreatif untuk menciptakan pengalaman pengguna yang luar biasa. Bertanggung jawab dalam research, wireframing, prototyping, dan design system.',
                                    'requirements' => ['Figma & Adobe Creative Suite', 'User Research', 'Prototyping', 'Design System', 'Collaboration Skills'],
                                    'application_deadline' => '15 Oktober 2025'
                                ],
                                [
                                    'id' => 3,
                                    'title' => 'Back End Developer',
                                    'company_name' => 'Panasonic',
                                    'company_logo' => 'https://images.unsplash.com/photo-1674394345184-44ca6d3fe4f3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb21wYW55JTIwb2ZmaWNlJTIwYnVpbGRpbmd8ZW58MXx8fHwxNzU4ODcyNjMyfDA&ixlib=rb-4.1.0&q=80&w=1080',
                                    'location' => 'Bekasi',
                                    'salary' => '10-15 juta',
                                    'type' => 'Full Time',
                                    'posted' => '3 hari lalu',
                                    'description' => 'Bergabunglah dengan tim engineering Panasonic untuk mengembangkan sistem backend yang robust dan scalable untuk produk IoT dan smart home solutions.',
                                    'requirements' => ['Node.js atau Python', 'Database Design', 'API Development', 'Cloud Services', 'Security Best Practices'],
                                    'application_deadline' => '20 Oktober 2025'
                                ],
                                [
                                    'id' => 4,
                                    'title' => 'Full Stack Developer',
                                    'company_name' => 'KOMATSU',
                                    'company_logo' => 'https://images.unsplash.com/photo-1674394345184-44ca6d3fe4f3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb21wYW55JTIwb2ZmaWNlJTIwYnVpbGRpbmd8ZW58MXx8fHwxNzU4ODcyNjMyfDA&ixlib=rb-4.1.0&q=80&w=1080',
                                    'location' => 'Jakarta Barat',
                                    'salary' => '12-18 juta',
                                    'type' => 'Full Time',
                                    'posted' => '1 minggu lalu',
                                    'description' => 'Kesempatan untuk mengembangkan aplikasi industrial IoT dan monitoring systems untuk heavy machinery. Kerja dengan teknologi cutting-edge dalam industri konstruksi.',
                                    'requirements' => ['React & Node.js', 'Industrial IoT', 'Real-time Systems', 'Data Visualization', 'Agile Development'],
                                    'application_deadline' => '5 Oktober 2025'
                                ],
                                [
                                    'id' => 5,
                                    'title' => 'Data Scientist',
                                    'company_name' => 'Telkom Indonesia',
                                    'company_logo' => 'https://images.unsplash.com/photo-1674394345184-44ca6d3fe4f3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb21wYW55JTIwb2ZmaWNlJTIwYnVpbGRpbmd8ZW58MXx8fHwxNzU4ODcyNjMyfDA&ixlib=rb-4.1.0&q=80&w=1080',
                                    'location' => 'Jakarta Selatan',
                                    'salary' => '15-25 juta',
                                    'type' => 'Full Time',
                                    'posted' => '4 hari lalu',
                                    'description' => 'Menganalisis big data untuk insights bisnis, mengembangkan model machine learning, dan membantu dalam digital transformation Telkom Indonesia.',
                                    'requirements' => ['Python & R', 'Machine Learning', 'Big Data Analytics', 'Statistical Analysis', 'Data Visualization'],
                                    'application_deadline' => '25 Oktober 2025'
                                ]
                            ];
                            $jobsToShow = $jobs ?? collect($defaultJobs);
                        @endphp
                        
                        @forelse($jobsToShow as $index => $job)
                        <div class="job-card cursor-pointer transition-all duration-300 hover:shadow-xl hover:border-orange-200 transform hover:scale-[1.02] bg-gradient-to-r from-white to-orange-50/30 border border-gray-200 rounded-lg {{ $index === 0 ? 'selected' : '' }}"
                             data-job-id="{{ is_object($job) ? $job->id : $job['id'] }}"
                             style="animation-delay: {{ $index * 100 }}ms">
                            <div class="p-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 bg-gradient-to-br from-orange-100 to-orange-200 p-2">
                                        <img src="{{ is_object($job) ? ($job->company_logo ?? $job['company_logo']) : $job['company_logo'] }}" 
                                             alt="{{ is_object($job) ? $job->company_name : $job['company_name'] }} logo" 
                                             class="w-full h-full object-cover rounded-lg" />
                                    </div>
                                    
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-start justify-between mb-2">
                                            <div>
                                                <h3 class="font-semibold text-gray-900 mb-1">{{ is_object($job) ? $job->title : $job['title'] }}</h3>
                                                <p class="text-orange-600 mb-2">{{ is_object($job) ? $job->company_name : $job['company_name'] }}</p>
                                            </div>
                                            <button class="detail-btn bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-lg text-sm font-medium"
                                                    data-job-id="{{ is_object($job) ? $job->id : $job['id'] }}">
                                                Detail
                                                <svg class="w-4 h-4 ml-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="flex items-center gap-4 text-gray-600 mb-3">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                </svg>
                                                {{ is_object($job) ? $job->location : $job['location'] }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ is_object($job) ? $job->created_at->diffForHumans() : $job['posted'] }}
                                            </span>
                                        </div>
                                        
                                        <div class="flex items-center justify-between">
                                            <div class="flex gap-2">
                                                <span class="px-3 py-1 bg-gradient-to-r from-orange-50 to-orange-100 text-orange-700 border border-orange-200 rounded-full text-sm font-medium">
                                                    {{ is_object($job) ? $job->type : $job['type'] }}
                                                </span>
                                                <span class="px-3 py-1 bg-gradient-to-r from-green-50 to-green-100 text-green-700 border border-green-200 rounded-full text-sm font-medium">
                                                    {{ is_object($job) ? $job->salary : $job['salary'] }}
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <div class="flex">
                                                    @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                    </svg>
                                                    @endfor
                                                </div>
                                                <span class="text-gray-600 ml-1">4.5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada lowongan ditemukan</h3>
                            <p class="text-gray-500">Coba gunakan kata kunci atau filter yang berbeda</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Job Details - Right Sidebar Scrollable -->
                <div class="xl:col-span-1">
                    <div class="h-full bg-gradient-to-b from-white to-blue-50/30 border border-blue-100 shadow-xl rounded-lg">
                        <div class="h-full overflow-y-auto custom-scrollbar" id="job-details">
                            <!-- Default job details for first job -->
                            <div class="sticky top-0 bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-6 z-10 rounded-t-lg">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-white/20 backdrop-blur">
                                        <img src="https://images.unsplash.com/photo-1662052955098-042b46e60c2b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0ZWNobm9sb2d5JTIwY29tcGFueSUyMGxvZ298ZW58MXx8fHwxNzU4ODg1MTkzfDA&ixlib=rb-4.1.0&q=80&w=1080" alt="Company logo" class="w-full h-full object-cover" />
                                    </div>
                                    <div>
                                        <h2 class="font-semibold mb-1">Junior Web Developer</h2>
                                        <p class="text-blue-100">PT Aditya Birla Indonesia</p>
                                    </div>
                                </div>
                                
                                <button class="w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 border-0 shadow-lg text-white py-3 rounded-lg font-medium transition-all duration-200">
                                    Lamar Sekarang
                                </button>
                            </div>

                            <div class="p-6 space-y-6">
                                <!-- Job Stats -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="text-center p-4 bg-gradient-to-br from-orange-100 to-orange-200 rounded-xl">
                                        <svg class="w-6 h-6 text-orange-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        </svg>
                                        <div class="text-sm text-orange-700">Jakarta Selatan</div>
                                    </div>
                                    <div class="text-center p-4 bg-gradient-to-br from-green-100 to-green-200 rounded-xl">
                                        <svg class="w-6 h-6 text-green-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div class="text-sm text-green-700">2 hari lalu</div>
                                    </div>
                                </div>

                                <!-- Job Description -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                        <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-indigo-500 rounded"></div>
                                        Deskripsi Pekerjaan
                                    </h3>
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl">
                                        <p class="text-gray-700 leading-relaxed">Kami mencari Junior Web Developer yang passionate untuk bergabung dengan tim kami. Kandidat yang ideal memiliki pengalaman dalam HTML, CSS, JavaScript, dan framework modern.</p>
                                    </div>
                                </div>

                                <!-- Requirements -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                        <div class="w-2 h-6 bg-gradient-to-b from-orange-500 to-red-500 rounded"></div>
                                        Persyaratan
                                    </h3>
                                    <div class="space-y-3">
                                        <div class="flex items-start gap-3 p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg">
                                            <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-gray-700">HTML5, CSS3, JavaScript</span>
                                        </div>
                                        <div class="flex items-start gap-3 p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg">
                                            <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-gray-700">React atau Vue.js</span>
                                        </div>
                                        <div class="flex items-start gap-3 p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg">
                                            <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-gray-700">Git & GitHub</span>
                                        </div>
                                        <div class="flex items-start gap-3 p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg">
                                            <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-gray-700">Responsive Design</span>
                                        </div>
                                        <div class="flex items-start gap-3 p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg">
                                            <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class="text-gray-700">Problem Solving</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Salary & Type -->
                                <div>
                                    <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                        <div class="w-2 h-6 bg-gradient-to-b from-yellow-500 to-orange-500 rounded"></div>
                                        Gaji & Tipe Kerja
                                    </h3>
                                    <div class="grid grid-cols-1 gap-3">
                                        <div class="p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl text-center">
                                            <div class="text-2xl font-bold text-orange-600 mb-1">5-8 juta</div>
                                            <div class="text-sm text-orange-700">Gaji per bulan</div>
                                        </div>
                                        <div class="p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl text-center">
                                            <div class="text-lg font-bold text-blue-600 mb-1">Full Time</div>
                                            <div class="text-sm text-blue-700">Tipe Pekerjaan</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Apply Buttons -->
                                <div class="space-y-3 pt-4">
                                    <button class="w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 shadow-lg text-white py-3 rounded-lg font-medium transition-all duration-200">
                                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                        Lamar Pekerjaan Ini
                                    </button>
                                    <button class="w-full border border-blue-200 text-blue-600 hover:bg-blue-50 py-3 rounded-lg font-medium transition-all duration-200">
                                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                        </svg>
                                        Simpan Lowongan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @auth
        @if(auth()->user()->hasRole('admin'))
        <!-- Add/Edit Job Modal -->
        <div id="job-modal" class="fixed inset-0 bg-black/50 modal backdrop-blur-sm hidden items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center mb-4">
                    <h3 id="modal-title" class="text-lg font-semibold">Tambah Lowongan Baru</h3>
                    <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form id="job-form" method="POST">
                    @csrf
                    <input type="hidden" id="job-id" name="job_id">
                    <input type="hidden" id="form-method" name="_method">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Pekerjaan</label>
                            <input type="text" id="title" name="title" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none">
                        </div>
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                            <input type="text" id="company_name" name="company_name" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none">
                        </div>
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                            <input type="text" id="job_location" name="location" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none">
                        </div>
                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">Gaji</label>
                            <input type="text" id="salary" name="salary" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none">
                        </div>
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tipe Pekerjaan</label>
                            <select id="type" name="type" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        <div>
                            <label for="application_deadline" class="block text-sm font-medium text-gray-700 mb-1">Batas Lamaran</label>
                            <input type="date" id="application_deadline" name="application_deadline" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none">
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Pekerjaan</label>
                        <textarea id="description" name="description" rows="4" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none"></textarea>
                    </div>
                    
                    <div class="mt-4">
                        <label for="requirements" class="block text-sm font-medium text-gray-700 mb-1">Persyaratan (Pisahkan dengan koma)</label>
                        <textarea id="requirements" name="requirements" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-200 focus:border-orange-400 outline-none"></textarea>
                    </div>
                    
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" id="cancel-btn" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors duration-200">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 font-medium transition-colors duration-200">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Floating Add Button -->
        <button id="add-job-btn" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center z-40">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
        </button>
        @endif
        @endauth
    </div>

    <!-- JavaScript -->
    <script>
        // Job data (this would come from your Laravel backend)
        const jobs = [
            {
                id: 1,
                title: "Junior Web Developer",
                company_name: "PT Aditya Birla Indonesia",
                company_logo: "https://images.unsplash.com/photo-1662052955098-042b46e60c2b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0ZWNobm9sb2d5JTIwY29tcGFueSUyMGxvZ298ZW58MXx8fHwxNzU4ODg1MTkzfDA&ixlib=rb-4.1.0&q=80&w=1080",
                location: "Jakarta Selatan",
                salary: "5-8 juta",
                type: "Full Time",
                posted: "2 hari lalu",
                description: "Kami mencari Junior Web Developer yang passionate untuk bergabung dengan tim kami. Kandidat yang ideal memiliki pengalaman dalam HTML, CSS, JavaScript, dan framework modern.",
                requirements: ["HTML5, CSS3, JavaScript", "React atau Vue.js", "Git & GitHub", "Responsive Design", "Problem Solving"],
                application_deadline: "30 September 2025"
            },
            {
                id: 2,
                title: "UI & UX Designer",
                company_name: "Jaetindo Creative",
                company_logo: "https://images.unsplash.com/photo-1695891583421-3cbbf1c2e3bd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxvZmZpY2UlMjBidWlsZGluZyUyMGNvcnBvcmF0ZXxlbnwxfHx8fDE3NTg4MzkyNDB8MA&ixlib=rb-4.1.0&q=80&w=1080",
                location: "Jakarta Pusat",
                salary: "8-12 juta",
                type: "Full Time",
                posted: "1 hari lalu",
                description: "Mencari UI/UX Designer kreatif untuk menciptakan pengalaman pengguna yang luar biasa. Bertanggung jawab dalam research, wireframing, prototyping, dan design system.",
                requirements: ["Figma & Adobe Creative Suite", "User Research", "Prototyping", "Design System", "Collaboration Skills"],
                application_deadline: "15 Oktober 2025"
            },
            // Add more jobs as needed
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Loading animation
            setTimeout(() => {
                document.getElementById('loading-overlay').style.display = 'none';
                document.getElementById('app').classList.remove('opacity-0');
                document.getElementById('app').classList.add('animate-fade-in');
            }, 1500);

            let selectedJob = jobs[0] || null;

            // Job card click handlers
            document.querySelectorAll('.job-card').forEach(card => {
                card.addEventListener('click', function() {
                    const jobId = parseInt(this.dataset.jobId);
                    const job = jobs.find(j => j.id === jobId);
                    
                    if (job) {
                        // Remove previous selection
                        document.querySelectorAll('.job-card').forEach(c => c.classList.remove('selected'));
                        // Add selection to current card
                        this.classList.add('selected');
                        
                        selectedJob = job;
                        loadJobDetails(job);
                    }
                });
            });

            // Detail button click handlers
            document.querySelectorAll('.detail-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const jobId = parseInt(this.dataset.jobId);
                    const job = jobs.find(j => j.id === jobId);
                    
                    if (job) {
                        // Remove previous selection
                        document.querySelectorAll('.job-card').forEach(c => c.classList.remove('selected'));
                        // Add selection to parent card
                        this.closest('.job-card').classList.add('selected');
                        
                        selectedJob = job;
                        loadJobDetails(job);
                    }
                });
            });

            // Filter tags
            document.querySelectorAll('.filter-tag').forEach(tag => {
                tag.addEventListener('click', function() {
                    const filter = this.dataset.filter;
                    
                    // Update URL with filter
                    const url = new URL(window.location);
                    if (filter === 'All') {
                        url.searchParams.delete('category');
                    } else {
                        url.searchParams.set('category', filter);
                    }
                    window.location.href = url.toString();
                });
            });

            // Search form
            document.getElementById('search-form').addEventListener('submit', function(e) {
                // Let the form submit naturally for server-side filtering
            });

            // Live search
            let searchTimeout;
            document.getElementById('search-input').addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    // For now, just submit the form
                    // In production, you might want to implement AJAX search
                    this.closest('form').submit();
                }, 500);
            });

            // Location change
            document.getElementById('location-select').addEventListener('change', function() {
                this.closest('form').submit();
            });

            // Admin functionality
            @auth
            @if(auth()->user()->hasRole('admin'))
            const modal = document.getElementById('job-modal');
            const addBtn = document.getElementById('add-job-btn');
            const closeBtn = document.getElementById('close-modal');
            const cancelBtn = document.getElementById('cancel-btn');
            const form = document.getElementById('job-form');

            addBtn?.addEventListener('click', openModal);
            closeBtn?.addEventListener('click', closeModal);
            cancelBtn?.addEventListener('click', closeModal);

            // Edit job functionality
            document.addEventListener('click', function(e) {
                if (e.target.closest('.edit-job-btn')) {
                    const jobId = e.target.closest('.edit-job-btn').dataset.jobId;
                    const job = jobs.find(j => j.id === parseInt(jobId));
                    if (job) {
                        openModal(job);
                    }
                }
                
                if (e.target.closest('.delete-job-btn')) {
                    const jobId = e.target.closest('.delete-job-btn').dataset.jobId;
                    if (confirm('Apakah Anda yakin ingin menghapus lowongan ini?')) {
                        deleteJob(jobId);
                    }
                }
            });

            form?.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const jobId = formData.get('job_id');
                const method = jobId ? 'PUT' : 'POST';
                const url = jobId ? `/jobs/${jobId}` : '/jobs';
                
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-HTTP-Method-Override': method
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        closeModal();
                        location.reload(); // Refresh page to show changes
                    } else {
                        alert('Error: ' + (data.message || 'Something went wrong'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error saving job');
                });
            });

            function openModal(job = null) {
                const modalTitle = document.getElementById('modal-title');
                const jobIdInput = document.getElementById('job-id');
                const methodInput = document.getElementById('form-method');
                
                if (job) {
                    modalTitle.textContent = 'Edit Lowongan';
                    jobIdInput.value = job.id;
                    methodInput.value = 'PUT';
                    
                    // Fill form with job data
                    document.getElementById('title').value = job.title || '';
                    document.getElementById('company_name').value = job.company_name || '';
                    document.getElementById('job_location').value = job.location || '';
                    document.getElementById('salary').value = job.salary || '';
                    document.getElementById('type').value = job.type || '';
                    document.getElementById('application_deadline').value = job.application_deadline || '';
                    document.getElementById('description').value = job.description || '';
                    document.getElementById('requirements').value = job.requirements ? job.requirements.join(', ') : '';
                } else {
                    modalTitle.textContent = 'Tambah Lowongan Baru';
                    jobIdInput.value = '';
                    methodInput.value = 'POST';
                    form.reset();
                }
                
                modal.classList.remove('hidden');
                modal.classList.add('show');
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('show');
            }

            function deleteJob(jobId) {
                fetch(`/jobs/${jobId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error deleting job');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting job');
                });
            }
            @endif
            @endauth

            function loadJobDetails(job) {
                const jobDetailsContainer = document.getElementById('job-details');
                
                const requirements = Array.isArray(job.requirements) ? job.requirements : 
                                   (job.requirements ? job.requirements.split(',').map(r => r.trim()) : []);
                
                jobDetailsContainer.innerHTML = `
                    <div class="sticky top-0 bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-6 z-10 rounded-t-lg">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-white/20 backdrop-blur">
                                <img src="${job.company_logo || 'https://images.unsplash.com/photo-1662052955098-042b46e60c2b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0ZWNobm9sb2d5JTIwY29tcGFueSUyMGxvZ298ZW58MXx8fHwxNzU4ODg1MTkzfDA&ixlib=rb-4.1.0&q=80&w=1080'}" 
                                     alt="${job.company_name} logo" 
                                     class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <h2 class="font-semibold mb-1">${job.title}</h2>
                                <p class="text-blue-100">${job.company_name}</p>
                            </div>
                        </div>
                        
                        <button class="w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 border-0 shadow-lg text-white py-3 rounded-lg font-medium">
                            Lamar Sekarang
                        </button>
                        
                        @auth
                        @if(auth()->user()->hasRole('admin'))
                        <div class="flex gap-2 mt-3">
                            <button class="edit-job-btn flex-1 bg-yellow-500 hover:bg-yellow-600 text-white py-2 rounded-lg font-medium" data-job-id="${job.id}">
                                Edit
                            </button>
                            <button class="delete-job-btn flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg font-medium" data-job-id="${job.id}">
                                Hapus
                            </button>
                        </div>
                        @endif
                        @endauth
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Job Stats -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-gradient-to-br from-orange-100 to-orange-200 rounded-xl">
                                <svg class="w-6 h-6 text-orange-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                <div class="text-sm text-orange-700">${job.location}</div>
                            </div>
                            <div class="text-center p-4 bg-gradient-to-br from-green-100 to-green-200 rounded-xl">
                                <svg class="w-6 h-6 text-green-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="text-sm text-green-700">${job.posted}</div>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div>
                            <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                <div class="w-2 h-6 bg-gradient-to-b from-blue-500 to-indigo-500 rounded"></div>
                                Deskripsi Pekerjaan
                            </h3>
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-4 rounded-xl">
                                <p class="text-gray-700 leading-relaxed">${job.description || 'Deskripsi tidak tersedia'}</p>
                            </div>
                        </div>

                        <!-- Requirements -->
                        <div>
                            <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                <div class="w-2 h-6 bg-gradient-to-b from-orange-500 to-red-500 rounded"></div>
                                Persyaratan
                            </h3>
                            <div class="space-y-3">
                                ${requirements.map(req => `
                                    <div class="flex items-start gap-3 p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg">
                                        <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-gray-700">${req}</span>
                                    </div>
                                `).join('')}
                            </div>
                        </div>

                        <!-- Salary & Type -->
                        <div>
                            <h3 class="font-semibold mb-3 text-gray-900 flex items-center gap-2">
                                <div class="w-2 h-6 bg-gradient-to-b from-yellow-500 to-orange-500 rounded"></div>
                                Gaji & Tipe Kerja
                            </h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl text-center">
                                    <div class="text-2xl font-bold text-orange-600 mb-1">${job.salary}</div>
                                    <div class="text-sm text-orange-700">Gaji per bulan</div>
                                </div>
                                <div class="p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl text-center">
                                    <div class="text-lg font-bold text-blue-600 mb-1">${job.type}</div>
                                    <div class="text-sm text-blue-700">Tipe Pekerjaan</div>
                                </div>
                            </div>
                        </div>

                        <!-- Apply Buttons -->
                        <div class="space-y-3 pt-4">
                            <button class="w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 shadow-lg text-white py-3 rounded-lg font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                                Lamar Pekerjaan Ini
                            </button>
                            <button class="w-full border border-blue-200 text-blue-600 hover:bg-blue-50 py-3 rounded-lg font-medium">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                                Simpan Lowongan
                            </button>
                        </div>
                    </div>
                `;
            }
        });
    </script>
</body>
</html>