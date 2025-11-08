@extends('app')
@vite('resources/css/app.css')
@if ($errors->any())
    <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
        <ul class="text-red-700 text-sm list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@vite('resources/css/app.css')
@section('title', 'Admin - Kelola Perusahaan')
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Admin Header (full-bleed, fixed) -->
    <header class="fixed top-0 left-0 w-full bg-gradient-to-r from-purple-600 to-purple-700 shadow-lg z-40">
        <div class="-mx-4 sm:-mx-6 lg:-mx-8">
            <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="pl-6 lg:pl-24">
                    <h1 class="text-3xl font-bold text-white">Kelola Perusahaan</h1>
                    <p class="text-purple-100 mt-1">Manajemen Data Perusahaan</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.jobs.index') }}" class="px-4 py-2 bg-white text-purple-700 rounded-lg hover:bg-purple-50 transition-all duration-300 hover:scale-105 font-medium">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Ke Lowongan
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content (add top padding so fixed header doesn't overlap) -->
    <div class="pt-36 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg animate-in fade-in duration-300">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Stats & Actions -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $companies->total() }} Perusahaan Terdaftar</h2>
                    <p class="text-gray-600">Total lowongan aktif: {{ \App\Models\Job::where('is_active', true)->count() }}</p>
                </div>
                <a href="{{ route('admin.companies.create') }}" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-lg transition-all duration-300 hover:scale-105 flex items-center gap-2 font-medium shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Perusahaan
                </a>
            </div>

            <!-- Search -->
            <form action="{{ route('admin.companies.index') }}" method="GET">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input 
                        type="text" 
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari perusahaan..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                    >
                </div>
            </form>
        </div>

        <!-- Companies Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($companies as $company)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border-l-4 border-l-purple-500">
                    <div class="p-6">
                        <!-- Company Header -->
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center overflow-hidden flex-shrink-0 border">
                                @if($company->logo)
                                    <img src="{{ $company->logo }}" alt="{{ $company->company_name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 text-lg">{{ $company->company_name }}</h3>
                                <p class="text-sm text-gray-600">{{ $company->industry ?? 'Industri tidak disebutkan' }}</p>
                            </div>
                        </div>

                        <!-- Company Stats -->
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <div class="bg-purple-50 p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-purple-600">{{ $company->jobs->count() }}</div>
                                <div class="text-xs text-purple-700">Lowongan</div>
                            </div>
                            <div class="bg-green-50 p-3 rounded-lg text-center">
                                <div class="text-2xl font-bold text-green-600">{{ $company->jobs->where('is_active', true)->count() }}</div>
                                <div class="text-xs text-green-700">Aktif</div>
                            </div>
                        </div>

                        <!-- Company Info -->
                        @if($company->description)
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $company->description }}</p>
                        @endif

                        <div class="space-y-2 text-sm text-gray-600 mb-4">
                            @if($company->size)
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <span>{{ $company->size }} karyawan</span>
                                </div>
                            @endif
                            @if($company->website)
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                    <a href="https://{{ $company->website }}" target="_blank" class="text-purple-600 hover:underline truncate">{{ $company->website }}</a>
                                </div>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2 pt-4 border-t border-gray-100">
                            <a href="{{ route('admin.companies.edit', $company) }}" class="flex-1 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors text-center font-medium text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.companies.destroy', $company) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus perusahaan ini? Semua lowongan terkait juga akan dihapus.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors font-medium text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <p class="text-gray-600 font-medium">Tidak ada perusahaan ditemukan</p>
                    <p class="text-gray-500 text-sm mt-1">Mulai dengan menambahkan perusahaan baru</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($companies->hasPages())
            <div class="mt-8">
                {{ $companies->links() }}
            </div>
        @endif
    </div>
</div>
@include('footer')