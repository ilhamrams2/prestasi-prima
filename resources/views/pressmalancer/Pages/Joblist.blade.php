@vite('resources/css/app.css')
@extends('app')
@section('title', 'Daftar Lowongan Kerja')
@section('content')
<div class="min-h-screen bg-gray-50" x-data="jobListApp()">
    <!-- Search Header - Sticky -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Main Search Form -->
            <div class="space-y-4">
                <div class="flex flex-col lg:flex-row gap-4 mb-4">
                    <!-- Search Input -->
                    <div class="flex-1 relative search-container">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input 
                            type="text" 
                            x-model="searchTerm"
                            @input="filterJobs()"
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
                                x-model="selectedLocation"
                                @change="filterJobs()"
                                class="pl-10 h-12 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                            >
                                <option value="">Semua Lokasi</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Yogyakarta">Yogyakarta</option>
                                <option value="Medan">Medan</option>
                                <option value="Semarang">Semarang</option>
                                <option value="Bali">Bali</option>
                                <option value="Malang">Malang</option>
                                <option value="Remote">Remote</option>
                            </select>
                        </div>
                        
                        <button 
                            @click="filterJobs()"
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
                    <template x-for="filter in availableFilters" :key="filter">
                        <button 
                            @click="toggleFilter(filter)"
                            :class="activeFilters.includes(filter) ? 'bg-orange-500 text-white border-orange-500' : 'bg-white text-gray-700 border-gray-300 hover:bg-orange-50 hover:border-orange-300'"
                            class="filter-tag px-3 py-1 text-xs rounded-full border transition-all duration-300 hover:scale-105"
                            x-text="filter"
                        ></button>
                    </template>
                </div>

                <!-- Active Filters Display -->
                <div x-show="activeFilters.length > 0" class="flex flex-wrap items-center gap-2 active-filters">
                    <span class="text-sm text-gray-600">Filter aktif:</span>
                    <template x-for="filter in activeFilters" :key="filter">
                        <span class="inline-flex items-center px-2 py-1 text-xs bg-orange-100 text-orange-800 border border-orange-200 rounded-full">
                            <span x-text="filter"></span>
                            <button @click="removeFilter(filter)" class="ml-1 text-orange-600 hover:text-orange-800">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </span>
                    </template>
                    <button @click="clearAllFilters()" class="text-xs text-orange-600 hover:text-orange-700 hover:bg-orange-50 px-2 py-1 rounded">
                        Hapus Semua
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Job List - Left Side (Scrollable) -->
            <div class="lg:col-span-2">
                <!-- Results Header -->
                <div class="flex items-center justify-between mb-6 results-header">
                    <h2 class="text-xl font-semibold text-gray-900">
                        <span x-text="filteredJobs.length"></span> Lowongan Kerja Ditemukan
                    </h2>
                    <div class="text-sm text-gray-600">
                        Diurutkan berdasarkan: Terbaru
                    </div>
                </div>

                <!-- Job Cards Container -->
                <div class="space-y-4 job-cards-container max-h-[calc(100vh-280px)] pr-2 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                    <template x-for="(job, index) in filteredJobs" :key="job.id">
                        <div 
                            @click="selectJob(job)"
                            :class="selectedJob && selectedJob.id === job.id ? 'border-l-orange-600 shadow-lg shadow-orange-100 bg-orange-50' : 'border-l-orange-500'"
                            class="job-card w-full cursor-pointer bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 border-l-4 hover:-translate-y-1"
                        >
                            <div class="p-6">
                                <div class="flex items-start gap-4">
                                    <!-- Company Logo -->
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                            <img :src="job.logo" :alt="job.company + ' logo'" class="w-full h-full object-cover">
                                        </div>
                                    </div>

                                    <!-- Job Details -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-start justify-between gap-4">
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-gray-900 mb-1" x-text="job.title"></h3>
                                                <p class="text-gray-600 mb-2" x-text="job.company"></p>
                                                
                                                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-3">
                                                    <div class="flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                        </svg>
                                                        <span x-text="job.location"></span>
                                                    </div>
                                                    <div class="flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                        </svg>
                                                        <span x-text="job.salary"></span>
                                                    </div>
                                                    <div class="flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span x-text="job.time"></span>
                                                    </div>
                                                </div>

                                                <div class="flex flex-wrap gap-2 mb-3">
                                                    <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full" x-text="job.type"></span>
                                                    <template x-for="req in job.requirements.slice(0, 3)" :key="req">
                                                        <span class="px-2 py-1 text-xs border border-gray-300 text-gray-700 rounded-full" x-text="req"></span>
                                                    </template>
                                                </div>

                                                <p class="text-gray-600 text-sm line-clamp-2 mb-4" x-text="job.description"></p>
                                            </div>

                                            <!-- Bookmark Button -->
                                            <button 
                                                @click.stop="toggleBookmark(job.id)"
                                                class="flex-shrink-0 h-8 w-8 p-0 text-gray-400 hover:text-orange-500 transition-colors duration-200"
                                            >
                                                <svg :class="job.isBookmarked ? 'fill-orange-500 text-orange-500' : ''" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="flex gap-2 mt-4">
                                            <button 
                                                @click.stop="applyJob(job)"
                                                class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all duration-300 hover:scale-105"
                                            >
                                                Lamar Sekarang
                                            </button>
                                            <button 
                                                @click.stop="selectJob(job)"
                                                class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg transition-all duration-300"
                                            >
                                                Detail Lowongan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- No Results -->
                    <div x-show="filteredJobs.length === 0" class="text-center py-12 no-results">
                        <div class="text-gray-400 text-lg mb-2">Tidak ada lowongan yang ditemukan</div>
                        <p class="text-gray-600">Coba ubah kriteria pencarian Anda</p>
                    </div>
                </div>
            </div>

            <!-- Job Detail Sidebar - Right Side -->
            <div class="lg:col-span-1">
                <div class="company-sidebar sticky top-24 max-h-[calc(100vh-120px)] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                    <!-- Empty State -->
                    <div x-show="!selectedJob" class="bg-white rounded-lg shadow-sm p-8 text-center">
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
                    <div x-show="selectedJob" class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <!-- Job Header -->
                        <div class="text-center bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6">
                            <div class="flex justify-center mb-4">
                                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center overflow-hidden">
                                    <img :src="selectedJob?.logo" :alt="selectedJob?.company + ' logo'" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold" x-text="selectedJob?.title"></h3>
                            <p class="text-orange-100" x-text="selectedJob?.company"></p>
                            <div class="mt-3 flex justify-center gap-2">
                                <span class="px-3 py-1 text-xs bg-orange-400 hover:bg-orange-400 text-orange-50 rounded-full" x-text="selectedJob?.type"></span>
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
                                    <div class="text-xs text-blue-700 mt-1" x-text="selectedJob?.location"></div>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg border border-green-200">
                                    <div class="flex items-center justify-center mb-2">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                    <div class="text-sm font-medium text-green-900">Gaji</div>
                                    <div class="text-xs text-green-700 mt-1" x-text="selectedJob?.salary"></div>
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
                                    <div class="text-sm font-medium text-purple-900" x-text="selectedJob?.time"></div>
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
                                    <p class="text-sm text-gray-700 leading-relaxed" x-text="selectedJob?.description"></p>
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
                                
                                <div class="grid grid-cols-1 gap-3">
                                    <template x-for="(requirement, index) in selectedJob?.requirements" :key="index">
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
                                            <img :src="selectedJob?.logo" :alt="selectedJob?.company + ' logo'" class="w-full h-full object-cover">
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-gray-900" x-text="selectedJob?.company"></div>
                                            <div class="text-sm text-gray-600" x-text="selectedJob?.location"></div>
                                        </div>
                                    </div>

                                    <div class="pt-3 border-t border-orange-200">
                                        <p class="text-xs text-gray-600 leading-relaxed">
                                            <span x-text="selectedJob?.company"></span> adalah perusahaan terkemuka yang berkomitmen untuk memberikan 
                                            lingkungan kerja yang profesional dan kesempatan berkembang bagi karyawan.
                                        </p>
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
                                <button 
                                    @click="applyJob(selectedJob)"
                                    class="w-full bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white py-3 px-4 rounded-lg transition-all duration-300 hover:scale-105 shadow-lg flex items-center justify-center gap-2"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Lamar Pekerjaan Ini
                                </button>
                                
                                <button 
                                    @click="toggleBookmark(selectedJob.id)"
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
</div>

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

.no-results {
    animation: fadeInUp 0.8s ease-out 0.5s both;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>

<!-- Alpine.js Component -->
<script>
function jobListApp() {
    return {
        // Sample Jobs Data
        allJobs: [
            {
                id: 1,
                title: "Junior Web Developer",
                company: "PT Aditya Birla",
                location: "Jakarta Selatan",
                salary: "Rp 8-12 juta",
                type: "Full Time",
                time: "2 hari yang lalu",
                description: "Kami mencari Junior Web Developer yang berpengalaman dalam React, Node.js, dan database management. Kandidat ideal memiliki pemahaman yang baik tentang modern web development.",
                requirements: ["React", "Node.js", "JavaScript", "HTML/CSS", "Git"],
                logo: "https://images.unsplash.com/photo-1611224923853-80b023f02d71?w=100&h=100&fit=crop&crop=center",
                isBookmarked: false
            },
            {
                id: 2,
                title: "UI & UX Designer",
                company: "Jaetindo Creative",
                location: "Bandung",
                salary: "Rp 6-10 juta",
                type: "Full Time",
                time: "1 hari yang lalu",
                description: "Bergabunglah dengan tim kreatif kami sebagai UI/UX Designer. Anda akan bertanggung jawab merancang interface yang user-friendly dan engaging untuk berbagai platform digital.",
                requirements: ["Figma", "Adobe XD", "Prototyping", "User Research", "Wireframing"],
                logo: "https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=100&h=100&fit=crop&crop=center",
                isBookmarked: true
            },
            {
                id: 3,
                title: "Back End Developer",
                company: "Panasonic Indonesia",
                location: "Jakarta Utara",
                salary: "Rp 12-18 juta",
                type: "Full Time",
                time: "3 hari yang lalu",
                description: "Posisi Back End Developer untuk mengembangkan dan maintain sistem backend yang scalable. Pengalaman dengan microservices dan cloud technology akan menjadi nilai plus.",
                requirements: ["Java", "Spring Boot", "PostgreSQL", "Docker", "AWS"],
                logo: "https://images.unsplash.com/photo-1560472355-536de3962603?w=100&h=100&fit=crop&crop=center",
                isBookmarked: false
            },
            {
                id: 4,
                title: "Full Stack Developer",
                company: "Komatsu Indonesia",
                location: "Bekasi",
                salary: "Rp 15-22 juta",
                type: "Full Time",
                time: "1 minggu yang lalu",
                description: "Kami membutuhkan Full Stack Developer berpengalaman untuk mengembangkan aplikasi web enterprise. Kandidat harus menguasai both frontend dan backend technologies.",
                requirements: ["React", "Node.js", "MongoDB", "Express", "TypeScript"],
                logo: "https://images.unsplash.com/photo-1549923746-c502d488b3ea?w=100&h=100&fit=crop&crop=center",
                isBookmarked: false
            },
            {
                id: 5,
                title: "Data Science Analyst",
                company: "Telkom Indonesia",
                location: "Jakarta Pusat",
                salary: "Rp 10-15 juta",
                type: "Full Time",
                time: "4 hari yang lalu",
                description: "Bergabung dengan tim Data Science untuk menganalisis big data dan memberikan insights bisnis. Pengalaman dengan machine learning dan statistical analysis sangat diutamakan.",
                requirements: ["Python", "SQL", "Machine Learning", "Pandas", "Tableau"],
                logo: "https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=100&h=100&fit=crop&crop=center",
                isBookmarked: true
            },
            {
                id: 6,
                title: "Tukang Wifi",
                company: "Telkom Indonesia",
                location: "Malang",
                salary: "Rp 4-6 juta",
                type: "Part Time",
                time: "2 hari yang lalu",
                description: "Dibutuhkan teknisi untuk instalasi dan maintenance jaringan wifi. Kandidat harus memiliki pengetahuan dasar networking dan troubleshooting.",
                requirements: ["Networking", "Hardware", "Troubleshooting", "Customer Service"],
                logo: "https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=100&h=100&fit=crop&crop=center",
                isBookmarked: false
            },
            {
                id: 7,
                title: "Content Creator",
                company: "Kamaramen Production",
                location: "Yogyakarta",
                salary: "Rp 5-8 juta",
                type: "Freelance",
                time: "1 hari yang lalu",
                description: "Mencari content creator kreatif untuk membuat konten video dan foto untuk social media. Pengalaman dengan editing software dan understanding tentang social media trends diperlukan.",
                requirements: ["Video Editing", "Photography", "Social Media", "Creativity", "Adobe Suite"],
                logo: "https://images.unsplash.com/photo-1596636404847-29d04bb8d5fa?w=100&h=100&fit=crop&crop=center",
                isBookmarked: false
            },
            {
                id: 8,
                title: "3D Modeler",
                company: "Wiha Studios",
                location: "Remote",
                salary: "Rp 8-12 juta",
                type: "Contract",
                time: "5 hari yang lalu",
                description: "Kami membutuhkan 3D Modeler untuk proyek game dan animasi. Kandidat harus mahir menggunakan software 3D modeling dan memiliki portfolio yang strong.",
                requirements: ["Blender", "Maya", "3D Modeling", "Animation", "Game Development"],
                logo: "https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?w=100&h=100&fit=crop&crop=center",
                isBookmarked: false
            },
            {
                id: 9,
                title: "Video Editor",
                company: "Wiha Creative",
                location: "Surabaya",
                salary: "Rp 6-9 juta",
                type: "Full Time",
                time: "3 hari yang lalu",
                description: "Posisi Video Editor untuk membuat konten video berkualitas tinggi. Pengalaman dengan motion graphics dan color grading akan menjadi nilai tambah.",
                requirements: ["After Effects", "Premiere Pro", "Motion Graphics", "Color Grading", "Storytelling"],
                logo: "https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?w=100&h=100&fit=crop&crop=center",
                isBookmarked: false
            }
        ],
        
        searchTerm: '',
        selectedLocation: '',
        activeFilters: [],
        availableFilters: ['Remote Work', 'Full Time', 'Part Time', 'Fresh Graduate', 'Experienced', 'Contract', 'Freelance'],
        selectedJob: null,
        filteredJobs: [],

        init() {
            this.filteredJobs = [...this.allJobs];
        },

        filterJobs() {
            this.filteredJobs = this.allJobs.filter(job => {
                const matchesSearch = this.searchTerm === '' || 
                    job.title.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                    job.company.toLowerCase().includes(this.searchTerm.toLowerCase()) ||
                    job.requirements.some(req => req.toLowerCase().includes(this.searchTerm.toLowerCase()));
                
                const matchesLocation = this.selectedLocation === '' || 
                    job.location.toLowerCase().includes(this.selectedLocation.toLowerCase());
                
                const matchesFilters = this.activeFilters.length === 0 || 
                    this.activeFilters.some(filter => {
                        if (filter === 'Remote Work') return job.location.toLowerCase().includes('remote');
                        if (filter === 'Full Time') return job.type === 'Full Time';
                        if (filter === 'Part Time') return job.type === 'Part Time';
                        if (filter === 'Contract') return job.type === 'Contract';
                        if (filter === 'Freelance') return job.type === 'Freelance';
                        return false;
                    });

                return matchesSearch && matchesLocation && matchesFilters;
            });
        },

        toggleFilter(filter) {
            const index = this.activeFilters.indexOf(filter);
            if (index === -1) {
                this.activeFilters.push(filter);
            } else {
                this.activeFilters.splice(index, 1);
            }
            this.filterJobs();
        },

        removeFilter(filter) {
            const index = this.activeFilters.indexOf(filter);
            if (index !== -1) {
                this.activeFilters.splice(index, 1);
            }
            this.filterJobs();
        },

        clearAllFilters() {
            this.activeFilters = [];
            this.filterJobs();
        },

        selectJob(job) {
            this.selectedJob = job;
        },

        toggleBookmark(jobId) {
            const job = this.allJobs.find(j => j.id === jobId);
            if (job) {
                job.isBookmarked = !job.isBookmarked;
            }
            this.filterJobs();
        },

        applyJob(job) {
            alert(`Melamar untuk posisi "${job.title}" di ${job.company}!\n\nFitur aplikasi akan mengarahkan ke form lamaran.`);
        }
    }
}
</script>

<!-- Include Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@include('footer')