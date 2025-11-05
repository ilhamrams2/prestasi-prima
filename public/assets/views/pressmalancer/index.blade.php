@extends('app')

@section('title', 'Daftar Lowongan Kerja')

@section('content')
@section('hideSidebar')@endsection

<div class="min-h-screen bg-gray-50 flex items-start justify-center py-8">
    <div class="w-full max-w-4xl px-4">
        <header class="mb-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-semibold text-gray-900">Daftar Lowongan Kerja</h1>
                <div class="text-sm text-gray-600">{{ $jobs->count() ?? 0 }} lowongan</div>
            </div>
        </header>

        <div id="jobs-container" class="space-y-4" style="max-height: calc(100vh - 200px); overflow-y: auto;">
            @forelse($jobs as $job)
                <div class="job-card bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                            @if($job->company && $job->company->logo)
                                <img src="{{ $job->company->logo }}" alt="{{ $job->company->name }} logo" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h3>
                                    <p class="text-gray-600">{{ $job->company->name ?? '' }} · {{ $job->location }}</p>
                                </div>
                                <a href="{{ route('jobs.show', $job) }}" class="px-3 py-2 bg-orange-500 text-white rounded-lg text-sm">Detail</a>
                            </div>
                            <p class="text-sm text-gray-500 mt-3 line-clamp-2">{{ Str::limit($job->description, 180) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada lowongan ditemukan</h3>
                    <p class="text-gray-500">Coba gunakan kata kunci atau filter yang berbeda</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection