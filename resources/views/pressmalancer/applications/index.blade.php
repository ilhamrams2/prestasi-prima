@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Lamaran Saya')
@section('content')
<div class="min-h-screen bg-gray-50 flex" x-data="sidebarState()">
    
    {{-- Main Content --}}
    <div class="flex-1 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-900 mb-2">Lamaran Saya</h1>
                <p class="text-gray-600">Kelola dan pantau status lamaran pekerjaan Anda</p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 animate-in slide-in-from-top duration-500">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-sm text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Applications List --}}
            @if($applications->count() > 0)
                <div class="space-y-4">
                    @foreach($applications as $application)
                        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-start gap-4">
                                    {{-- Company Logo --}}
                                    <div class="flex-shrink-0 w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden border">
                                        @if($application->job->company && $application->job->company->logo)
                                            <img src="{{ $application->job->company->logo }}" 
                                                 alt="{{ $application->job->company->name }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    
                                    {{-- Job Info --}}
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-900 mb-1">{{ $application->job->title }}</h3>
                                        <p class="text-sm text-gray-600 mb-2">{{ $application->job->company->name ?? 'PT Digital Teknologi Indonesia' }}</p>
                                        
                                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                </svg>
                                                <span>{{ $application->job->location }}</span>
                                            </div>
                                            
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>Dilamar {{ $application->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        
                                        {{-- Progress Bar --}}
                                        <div class="mt-4">
                                            <div class="flex items-center justify-between text-xs mb-2">
                                                <span class="text-gray-600">Progress</span>
                                                <span class="font-medium text-orange-600">Fase {{ $application->current_phase }} dari 4</span>
                                            </div>
                                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full transition-all duration-500" 
                                                     style="width: {{ ($application->current_phase / 4) * 100 }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Status & Actions --}}
                                    <div class="flex-shrink-0 text-right">
                                        <span class="inline-block px-3 py-1 text-xs rounded-full 
                                            @if($application->status === 'pending') bg-yellow-100 text-yellow-700
                                            @elseif($application->status === 'reviewed') bg-blue-100 text-blue-700
                                            @elseif($application->status === 'accepted') bg-green-100 text-green-700
                                            @elseif($application->status === 'rejected') bg-red-100 text-red-700
                                            @else bg-gray-100 text-gray-700
                                            @endif">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                        
                                        <div class="mt-4 flex flex-col gap-2">
                                            @if($application->current_phase < 4)
                                                <a href="{{ route('applications.phase2', $application->id) }}" 
                                                   class="px-4 py-2 text-sm bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-colors text-center">
                                                    Lanjutkan
                                                </a>
                                            @endif
                                            
                                            <a href="{{ route('applications.edit', $application->id) }}" 
                                               class="px-4 py-2 text-sm border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors text-center">
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('applications.destroy', $application->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus lamaran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="w-full px-4 py-2 text-sm border border-red-200 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($applications->hasPages())
                    <div class="mt-6">
                        {{ $applications->links() }}
                    </div>
                @endif
            @else
                {{-- Empty State --}}
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Lamaran</h3>
                    <p class="text-gray-600 mb-8">Anda belum melamar pekerjaan apapun. Mulai cari lowongan yang sesuai!</p>
                    
                    <a href="{{ route('jobs.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Cari Lowongan
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Alpine.js Script --}}
<script>
function sidebarState() {
    return {
        isCollapsed: false
    }
}
</script>

@endsection
