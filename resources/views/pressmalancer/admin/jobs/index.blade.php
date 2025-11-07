@extends('app')
@vite('resources/css/app.css')
@section('title', 'Admin - Kelola Lowongan Kerja')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Admin Header (full-bleed, fixed) -->
    <header class="fixed top-0 left-0 w-full bg-gradient-to-r from-orange-500 to-orange-600 shadow-lg z-40">
        <div class="-mx-4 sm:-mx-6 lg:-mx-8">
            <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="pl-6 lg:pl-24">
                    <h1 class="text-3xl font-bold text-white">Admin Panel</h1>
                    <p class="text-orange-100 mt-1">Kelola Lowongan Pekerjaan</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('jobs.index') }}" class="px-4 py-2 bg-white text-orange-600 rounded-lg hover:bg-orange-50 transition-all duration-300 hover:scale-105 font-medium">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Ke Halaman Publik
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

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-sm border-l-4 border-l-blue-500 p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Total Lowongan</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $jobs->total() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border-l-4 border-l-green-500 p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Lowongan Aktif</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Job::where('is_active', true)->count() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border-l-4 border-l-orange-500 p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Lowongan Inactive</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Job::where('is_active', false)->count() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border-l-4 border-l-purple-500 p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Perusahaan</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Company::count() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Bar -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden" x-data="{ search: '' }">
            @if ($errors->any())
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    <ul class="text-red-700 text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
    <!-- Live Search Bar -->
    <div class="p-6 border-b bg-gray-50 flex justify-between items-center flex-wrap gap-4">
        <div class="relative w-full sm:w-96">
            <input
                type="text"
                placeholder="Cari lowongan (judul, perusahaan, lokasi)..."
                x-model="search"
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
            >
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>

        <div class="flex gap-2">
            <a href="{{ route('admin.companies.index') }}" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all duration-300 font-medium shadow-md flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                Kelola Perusahaan
            </a>

            <a href="{{ route('admin.jobs.create') }}" class="px-5 py-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-lg transition-all duration-300 font-medium shadow-md flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Lowongan
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 border-b border-gray-200 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold uppercase text-xs">Lowongan</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase text-xs">Perusahaan</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase text-xs">Lokasi</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase text-xs">Tipe</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase text-xs">Gaji</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase text-xs">Status</th>
                    <th class="px-6 py-3 text-left font-semibold uppercase text-xs">Dibuat</th>
                    <th class="px-6 py-3 text-center font-semibold uppercase text-xs">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200" id="jobTable">
                @foreach($jobs as $job)
                    <tr class="hover:bg-gray-50 transition-colors"
                        x-show="
                            '{{ strtolower($job->title) }}'.includes(search.toLowerCase()) ||
                            '{{ strtolower(optional($job->company)->company_name ?? '') }}'.includes(search.toLowerCase()) ||
                            '{{ strtolower($job->location) }}'.includes(search.toLowerCase()) ||
                            '{{ strtolower($job->job_type) }}'.includes(search.toLowerCase())
                        ">
                        <!-- Lowongan -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                    @if($job->company && $job->company->logo)
                                        <img src="{{ $job->company->logo }}" alt="{{ $job->company->company_name }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-gray-400 m-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 .552-.448 1-1 1H6v5h12v-5h-5c-.552 0-1-.448-1-1V7H8v4z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $job->title }}</div>
                                    <div class="text-xs text-gray-600">{{ Str::limit($job->description, 60) }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- Perusahaan -->
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $job->company->company_name ?? 'N/A' }}</td>

                        <!-- Lokasi -->
                        <td class="px-6 py-4 text-gray-700">{{ $job->location }}</td>

                        <!-- Tipe -->
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full whitespace-nowrap
                                @if($job->job_type === 'Full Time') bg-blue-100 text-blue-800
                                @elseif($job->job_type === 'Part Time') bg-green-100 text-green-800
                                @elseif($job->job_type === 'Contract') bg-purple-100 text-purple-800
                                @elseif($job->job_type === 'Freelance') bg-pink-100 text-pink-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ $job->job_type }}
                            </span>
                        </td>

                        <!-- Gaji -->
                        <td class="px-6 py-4 text-gray-800">{{ $job->salary_range }}</td>

                        <!-- Status -->
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.jobs.toggle-status', $job) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1 text-xs font-medium rounded-full transition-all duration-200 hover:scale-105
                                    {{ $job->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                    <span class="w-2 h-2 rounded-full {{ $job->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    {{ $job->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </button>
                            </form>
                        </td>

                        <!-- Dibuat -->
                        <td class="px-6 py-4 text-gray-700">
                            <div>{{ $job->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $job->time_ago }}</div>
                        </td>

                        <!-- Aksi -->
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.jobs.edit', $job) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                <tr x-show="
    !('{{ implode('', $jobs->pluck('title')->toArray()) }}'.toLowerCase().includes(search.toLowerCase()))
">

                    <td colspan="8" class="px-6 py-10 text-center text-gray-500">Tidak ada lowongan ditemukan</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


            <!-- Pagination -->
            @if($jobs->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $jobs->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Page Load Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-in {
    animation: fadeIn 0.5s ease-out;
}
</style>
@endsection


  <!-- Filter & Add Button -->
                {{-- <div class="flex gap-2 w-full lg:w-auto">
                    <select
                        name="status"
                        onchange="window.location.href='{{ route('admin.jobs.index') }}?status=' + this.value"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                    >
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>

                    <a href="{{ route('admin.companies.index') }}" class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all duration-300 hover:scale-105 flex items-center gap-2 font-medium shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Kelola Perusahaan
                    </a>

                    <a href="{{ route('admin.jobs.create') }}" class="px-6 py-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-lg transition-all duration-300 hover:scale-105 flex items-center gap-2 font-medium shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Lowongan
                    </a>
                </div>
            </div>
        </div> --}}
