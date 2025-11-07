@extends('app')

@section('title', 'Daftar Lowongan Kerja')

@section('content')
<div class="min-h-screen bg-gray-50 flex" x-data="sidebarState()">
   
    <div class="min-h-screen bg-gray-50 flex-1 flex items-start py-8">
    <div class="w-full max-w-none px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-10" x-data="jobListApp()">


        
        <!-- Search Header - Sticky -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-10">
    <div class="w-full px-4 sm:px-6 lg:px-10 xl:px-14 2xl:px-16 py-6">
            <!-- Main Search Form -->
            <form action="{{ route('jobs.index') }}" method="GET" class="space-y-4">
                <div class="flex flex-col lg:flex-row gap-4 mb-4">
                    <!-- Search Input -->
                    <div class="flex-1 relative search-container">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input 
                            type="text" 
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari posisi, perusahaan, atau skill..."
                            class="w-full pl-10 h-12 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                        >
                    </div>
                    
                    <!-- Location Select -->
                    <div class="flex gap-2">
                        <div class="relative min-w-48 location-container">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5 z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <select 
                                name="location"
                                class="pl-10 h-12 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                            >
                                <option value="">Semua Lokasi</option>
                                <option value="Jakarta" {{ request('location') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                                <option value="Bandung" {{ request('location') == 'Bandung' ? 'selected' : '' }}>Bandung</option>
                                <option value="Surabaya" {{ request('location') == 'Surabaya' ? 'selected' : '' }}>Surabaya</option>
                                <option value="Yogyakarta" {{ request('location') == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta</option>
                                <option value="Medan" {{ request('location') == 'Medan' ? 'selected' : '' }}>Medan</option>
                                <option value="Semarang" {{ request('location') == 'Semarang' ? 'selected' : '' }}>Semarang</option>
                                <option value="Bali" {{ request('location') == 'Bali' ? 'selected' : '' }}>Bali</option>
                                <option value="Malang" {{ request('location') == 'Malang' ? 'selected' : '' }}>Malang</option>
                                <option value="Remote" {{ request('location') == 'Remote' ? 'selected' : '' }}>Remote</option>
                            </select>
                        </div>
                        
                        <button 
                            type="submit"
                            class="h-12 px-6 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all duration-300 hover:scale-105 search-btn"
                        >
                            Cari
                        </button>
                    </div>
                </div>

                <!-- Filter Tags -->
                <div class="flex flex-wrap items-center gap-2 mb-4 filter-container">
                    <div class="flex items-center gap-1 text-sm text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                        </svg>
                        <span>Filter:</span>
                    </div>
                    
                    <button 
                        type="submit"
                        name="job_type"
                        value="Full Time"
                        class="filter-tag px-3 py-1 text-xs rounded-full border transition-all duration-300 hover:scale-105 {{ request('job_type') == 'Full Time' ? 'bg-orange-500 text-white border-orange-500' : 'bg-white text-gray-700 border-gray-300 hover:bg-orange-50 hover:border-orange-300' }}"
                    >
                        Full Time
                    </button>
                    
                    <button 
                        type="submit"
                        name="job_type"
                        value="Part Time"
                        class="filter-tag px-3 py-1 text-xs rounded-full border transition-all duration-300 hover:scale-105 {{ request('job_type') == 'Part Time' ? 'bg-orange-500 text-white border-orange-500' : 'bg-white text-gray-700 border-gray-300 hover:bg-orange-50 hover:border-orange-300' }}"
                    >
                        Part Time
                    </button>
                    
                    <button 
                        type="submit"
                        name="job_type"
                        value="Freelance"
                        class="filter-tag px-3 py-1 text-xs rounded-full border transition-all duration-300 hover:scale-105 {{ request('job_type') == 'Freelance' ? 'bg-orange-500 text-white border-orange-500' : 'bg-white text-gray-700 border-gray-300 hover:bg-orange-50 hover:border-orange-300' }}"
                    >
                        Freelance
                    </button>
                    
                    <button 
                        type="submit"
                        name="job_type"
                        value="Contract"
                        class="filter-tag px-3 py-1 text-xs rounded-full border transition-all duration-300 hover:scale-105 {{ request('job_type') == 'Contract' ? 'bg-orange-500 text-white border-orange-500' : 'bg-white text-gray-700 border-gray-300 hover:bg-orange-50 hover:border-orange-300' }}"
                    >
                        Contract
                    </button>
                    
                    @if(request()->has('search') || request()->has('location') || request()->has('job_type'))
                        <a 
                            href="{{ route('jobs.index') }}"
                            class="px-3 py-1 text-xs bg-red-100 text-red-700 border border-red-300 rounded-full hover:bg-red-200 transition-all"
                        >
                            Hapus Semua
                        </a>
                    @endif
                </div>

                <!-- Active Filters Display -->
                @if(request()->has('search') || request()->has('location') || request()->has('job_type'))
                    <div class="flex flex-wrap items-center gap-2 active-filters">
                        <span class="text-sm text-gray-600">Filter aktif:</span>
                        
                        @if(request('search'))
                            <span class="inline-flex items-center px-2 py-1 text-xs bg-orange-100 text-orange-800 border border-orange-200 rounded-full">
                                <span>Pencarian: "{{ request('search') }}"</span>
                            </span>
                        @endif
                        
                        @if(request('location'))
                            <span class="inline-flex items-center px-2 py-1 text-xs bg-orange-100 text-orange-800 border border-orange-200 rounded-full">
                                <span>Lokasi: {{ request('location') }}</span>
                            </span>
                        @endif
                        
                        @if(request('job_type'))
                            <span class="inline-flex items-center px-2 py-1 text-xs bg-orange-100 text-orange-800 border border-orange-200 rounded-full">
                                <span>Tipe: {{ request('job_type') }}</span>
                            </span>
                        @endif
                    </div>
                @endif
            </form>
        </div>
    </header>

    @if($jobs->count() == 0 && !request()->hasAny(['search', 'location', 'job_type']))
        <!-- Empty State - No Jobs in Database -->
    <div class="w-full px-4 sm:px-6 lg:px-10 xl:px-14 2xl:px-16 py-16">
            <div class="text-center">
                <div class="flex justify-center mb-8">
                    <div class="relative">
                        <div class="w-32 h-32 bg-gradient-to-br from-orange-100 to-orange-200 rounded-full flex items-center justify-center animate-pulse">
                            <svg class="w-16 h-16 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-blue-400 rounded-full animate-bounce"></div>
                        <div class="absolute -bottom-2 -left-2 w-4 h-4 bg-green-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                </div>

                <h2 class="text-3xl font-bold text-gray-900 mb-4">Belum Ada Lowongan Kerja</h2>
                <p class="text-lg text-gray-600 mb-8">Database masih kosong. Jalankan seeder atau tambahkan lowongan melalui admin panel</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto">
                    <a href="{{ route('admin.jobs.create') }}" class="bg-white rounded-xl shadow-sm border-2 border-gray-200 p-6 hover:border-orange-500 transition-all hover:shadow-md">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Tambah Lowongan</h3>
                        <p class="text-sm text-gray-600">Via Admin Panel</p>
                    </a>
                </div>
            </div>
        </div>
    @else
        <!-- Main Content -->
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-10 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 xl:gap-10 2xl:gap-12">
                <!-- Job List - Left Side (Scrollable) -->
                <div class="lg:col-span-7 xl:col-span-7 2xl:col-span-7">
                    <!-- Results Header -->
                    <div class="flex items-center justify-between mb-6 results-header">
                        <h2 class="text-xl font-semibold text-gray-900">
                            {{ $jobs->total() }} Lowongan Kerja Ditemukan
                        </h2>
                        <div class="text-sm text-gray-600">
                            Diurutkan berdasarkan: Terbaru
                        </div>
                    </div>

                    <!-- Job Cards Container -->
                    <div class="space-y-4 job-cards-container max-h-[calc(100vh-280px)] pr-2 lg:pr-3 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                        @forelse($jobs as $job)
                            <div 
                                @click="selectJob({{ $job->id }})"
                                :class="selectedJobId === {{ $job->id }} ? 'border-l-orange-600 shadow-lg shadow-orange-100 bg-orange-50' : 'border-l-orange-500'"
                                class="job-card w-full cursor-pointer bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 border-l-4 hover:-translate-y-1"
                            >
                                <div class="p-6">
                                    <div class="flex items-start gap-4">
                                        <!-- Company Logo -->
                                        <div class="flex-shrink-0">
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                                @if($job->company && $job->company->logo)
                                                    <img src="{{ $job->company->logo }}" alt="{{ $job->company->name }} logo" class="w-full h-full object-cover">
                                                @else
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Job Details -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-start justify-between gap-4">
                                                <div class="flex-1">
                                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $job->title }}</h3>
                                                    <p class="text-gray-600 mb-2">{{ $job->company->name ?? 'Unknown Company' }}</p>
                                                    
                                                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-3">
                                                        <div class="flex items-center gap-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                            </svg>
                                                            <span>{{ $job->location }}</span>
                                                        </div>
                                                        <div class="flex items-center gap-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                            </svg>
                                                            <span>{{ $job->salary_range }}</span>
                                                        </div>
                                                        <div class="flex items-center gap-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                            <span>{{ $job->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-wrap gap-2 mb-3">
                                                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full">{{ $job->job_type }}</span>
                                                        @foreach(array_slice(explode(',', $job->requirements ?? ''), 0, 3) as $req)
                                                            <span class="px-2 py-1 text-xs border border-gray-300 text-gray-700 rounded-full">{{ trim($req) }}</span>
                                                        @endforeach
                                                    </div>

                                                    <p class="text-gray-600 text-sm line-clamp-2 mb-4">{{ $job->description }}</p>
                                                </div>

                                                <!-- Bookmark Button -->
                                                <button 
                                                    @click.stop="toggleBookmark({{ $job->id }})"
                                                    class="flex-shrink-0 h-8 w-8 p-0 text-gray-400 hover:text-orange-500 transition-colors duration-200"
                                                >
                                                    <svg :class="bookmarkedJobs.includes({{ $job->id }}) ? 'fill-orange-500 text-orange-500' : ''" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div class="flex gap-2 mt-4">
                                                <a 
                                                    href="{{ route('jobs.show', $job) }}"
                                                    class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all duration-300 hover:scale-105"
                                                >
                                                    Lamar Sekarang
                                                </a>
                                                <button 
                                                    @click.stop="selectJob({{ $job->id }})"
                                                    class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg transition-all duration-300"
                                                >
                                                    Detail Lowongan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12 no-results">
                                <div class="text-gray-400 text-lg mb-2">Tidak ada lowongan yang ditemukan</div>
                                <p class="text-gray-600">Coba ubah kriteria pencarian Anda</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($jobs->hasPages())
                        <div class="mt-6">
                            {{ $jobs->links() }}
                        </div>
                    @endif
                </div>

                <!-- Job Detail Sidebar - Right Side -->
                <div class="lg:col-span-5 xl:col-span-5 2xl:col-span-5">
                    <div class="company-sidebar sticky top-24 max-h-[calc(100vh-120px)] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                        <!-- Empty State -->
                        <div x-show="!selectedJobData" class="bg-white rounded-lg shadow-sm p-8 text-center">
                            <div class="flex flex-col items-center justify-center space-y-4">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Pilih Lowongan</h3>
                                    <p class="text-gray-600">Klik pada lowongan di sebelah kiri untuk melihat detail lengkap</p>
                                </div>
                            </div>
                        </div>

                        <!-- Selected Job Detail -->
                        <div x-show="selectedJobData" class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <!-- Job Header -->
                            <div class="text-center bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6">
                                <div class="flex justify-center mb-4">
                                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                        <img :src="selectedJobData?.company_logo || '/default-logo.png'" :alt="selectedJobData?.company_name" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <h3 class="text-xl font-semibold" x-text="selectedJobData?.title"></h3>
                                <p class="text-orange-100" x-text="selectedJobData?.company_name"></p>
                                <div class="mt-3 flex justify-center gap-2">
                                    <span class="px-3 py-1 text-xs bg-orange-400 text-orange-50 rounded-full" x-text="selectedJobData?.job_type"></span>
                                </div>
                            </div>

                            <div class="p-6 space-y-6">
                                <!-- Job Info Grid -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-200">
                                        <div class="flex items-center justify-center mb-2">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-sm font-medium text-blue-900">Lokasi</div>
                                        <div class="text-xs text-blue-700 mt-1" x-text="selectedJobData?.location"></div>
                                    </div>
                                    <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg border border-green-200">
                                        <div class="flex items-center justify-center mb-2">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                        </div>
                                        <div class="text-sm font-medium text-green-900">Gaji</div>
                                        <div class="text-xs text-green-700 mt-1" x-text="selectedJobData?.salary_range"></div>
                                    </div>
                                </div>

                                <!-- Posted Time -->
                                <div class="flex items-center gap-3 p-3 bg-purple-50 rounded-lg border border-purple-200">
                                    <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-purple-600">Dipublikasikan</div>
                                        <div class="text-sm font-medium text-purple-900" x-text="selectedJobData?.created_at"></div>
                                    </div>
                                </div>

                                <!-- Job Description -->
                                <div class="space-y-4">
                                    <h4 class="font-semibold text-gray-900 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Deskripsi Pekerjaan
                                    </h4>
                                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 rounded-lg border">
                                        <p class="text-sm text-gray-700 leading-relaxed" x-text="selectedJobData?.description"></p>
                                    </div>
                                </div>

                                <!-- Requirements -->
                                <div class="space-y-4">
                                    <h4 class="font-semibold text-gray-900 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Kualifikasi & Keahlian yang Diperlukan
                                    </h4>
                                    
                                    <div class="grid grid-cols-1 gap-5">
                                        <template x-for="(requirement, index) in selectedJobData?.requirements || []" :key="index">
                                            <div class="flex items-center gap-3 p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200">
                                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-sm font-medium text-gray-800" x-text="requirement"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Company Info Section -->
                                <div class="space-y-4 bg-gradient-to-br from-orange-50 to-amber-50 p-4 rounded-lg border border-orange-200">
                                    <h4 class="font-semibold text-gray-900 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        Tentang Perusahaan
                                    </h4>
                                    
                                    <div class="space-y-3">
                                        <div class="flex items-start gap-3">
                                            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center overflow-hidden flex-shrink-0 border border-orange-200">
                                                <img :src="selectedJobData?.company_logo || '/default-logo.png'" :alt="selectedJobData?.company_name" class="w-full h-full object-cover">
                                            </div>
                                            <div class="flex-1">
                                                <div class="font-semibold text-gray-900" x-text="selectedJobData?.company_name"></div>
                                                <div class="text-sm text-gray-600" x-text="selectedJobData?.location"></div>
                                            </div>
                                        </div>

                                        <div class="pt-3 border-t border-orange-200">
                                            <p class="text-xs text-gray-600 leading-relaxed" x-text="selectedJobData?.company_description || (selectedJobData?.company_name + ' adalah perusahaan terkemuka yang berkomitmen untuk memberikan lingkungan kerja yang profesional dan kesempatan berkembang bagi karyawan.')"></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Info -->
                                <div class="space-y-3 bg-blue-50 p-4 rounded-lg border border-blue-200">
                                    <h4 class="font-semibold text-blue-900 text-sm flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        Informasi Tambahan
                                    </h4>
                                    <div class="space-y-2 text-xs text-blue-700">
                                        <div class="flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                            <span>Proses rekrutmen 2-3 minggu</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                            <span>Wawancara dilakukan secara online & offline</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                                            <span>Kontrak kerja sesuai regulasi ketenagakerjaan</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="space-y-3 pt-4">
                                    <a 
                                        :href="'/jobs/' + selectedJobId"
                                        class="block w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-3 px-4 rounded-lg transition-all duration-300 hover:scale-105 shadow-lg text-center"
                                    >
                                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        Lamar Pekerjaan Ini
                                    </a>
                                    
                                    <button 
                                        @click="toggleBookmark(selectedJobId)"
                                        class="w-full border-2 border-orange-200 hover:bg-orange-50 hover:border-orange-300 text-orange-600 py-3 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    @endif
    </div> {{-- Close main content area --}}
</div> {{-- Close flex container --}}

<!-- CSS Animations & Styles -->
<style>
/* Custom scrollbar */
.scrollbar-thin {
    scrollbar-width: thin;
    scrollbar-color: #d1d5db #f3f4f6;
}

.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background-color: #d1d5db;
    border-radius: 0.5rem;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background-color: #f3f4f6;
    border-radius: 0.5rem;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background-color: #9ca3af;
}

.scrollbar-thumb-gray-300::-webkit-scrollbar-thumb {
    background-color: #d1d5db;
}

.scrollbar-track-gray-100::-webkit-scrollbar-track {
    background-color: #f3f4f6;
}

/* Line clamp utility */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Page Load Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Apply animations */
header {
    animation: fadeInDown 0.6s ease-out;
}

.search-container {
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.location-container {
    animation: fadeInUp 0.8s ease-out 0.3s both;
}

.search-btn {
    animation: scaleIn 0.6s ease-out 0.4s both;
}

.filter-container {
    animation: fadeInUp 0.8s ease-out 0.5s both;
}

.results-header {
    animation: fadeInLeft 0.8s ease-out 0.6s both;
}

.job-card {
    animation: fadeInUp 0.8s ease-out forwards;
}

.company-sidebar {
    animation: fadeInRight 0.8s ease-out 0.7s both;
}

.job-cards-container {
    width: 100%;
}

.no-results {
    animation: fadeInUp 0.8s ease-out 0.5s both;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Prevent body scroll when mobile sidebar is open */
body.sidebar-open {
    overflow: hidden;
}

/* Sidebar z-index hierarchy */
/* Ensure sidebar components are above content */
.sidebar-wrapper {
    position: relative;
    z-index: 50;
}
</style>

<!-- Alpine.js Components -->
<script>
// Sidebar state sync
function sidebarState() {
    return {
        isCollapsed: false,
        toggleCollapse() {
            this.isCollapsed = !this.isCollapsed;
        }
    }
}

function jobListApp() {
    return {
        selectedJobId: null,
        selectedJobData: null,
        bookmarkedJobs: JSON.parse(localStorage.getItem('bookmarkedJobs') || '[]'),
        
        // Jobs data from Laravel
        jobsData: @json($jobs->items()),
        
        selectJob(jobId) {
            this.selectedJobId = jobId;
            
            // Find job data
            const job = this.jobsData.find(j => j.id === jobId);
            
            if (job) {
                this.selectedJobData = {
                    id: job.id,
                    title: job.title,
                    company_name: job.company?.name || job.company?.company_name || 'Unknown Company',
                    company_logo: job.company?.logo || null,
                    company_description: job.company?.description || null,
                    location: job.location,
                    salary_range: job.salary_range,
                    job_type: job.job_type,
                    description: job.description,
                    requirements: job.requirements ? job.requirements.split(',').map(r => r.trim()) : [],
                    created_at: this.formatDate(job.created_at)
                };
            }
        },
        
        toggleBookmark(jobId) {
            const index = this.bookmarkedJobs.indexOf(jobId);
            if (index > -1) {
                this.bookmarkedJobs.splice(index, 1);
            } else {
                this.bookmarkedJobs.push(jobId);
            }
            localStorage.setItem('bookmarkedJobs', JSON.stringify(this.bookmarkedJobs));
        },
        
        formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffTime = Math.abs(now - date);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            if (diffDays === 0) return 'Hari ini';
            if (diffDays === 1) return '1 hari yang lalu';
            if (diffDays < 7) return diffDays + ' hari yang lalu';
            if (diffDays < 30) return Math.floor(diffDays / 7) + ' minggu yang lalu';
            return Math.floor(diffDays / 30) + ' bulan yang lalu';
        }
    }
}
</script>

@endsection
