@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6">💼 Job Listings</h1>

    @if($jobs->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jobs as $job)
                <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200">
                    <h2 class="text-xl font-semibold mb-2">{{ $job->title }}</h2>
                    <p class="text-gray-600 mb-1">📌 {{ $job->company->name ?? 'Unknown Company' }}</p>
                    <p class="text-gray-600 mb-1">📍 {{ $job->location }}</p>
                    <p class="text-gray-600 mb-1">🕒 {{ ucfirst($job->job_type) }}</p>
                    <p class="text-gray-600 mb-1">💰 {{ $job->salary_range }}</p>
                    <p class="text-gray-600 mb-3">⏳ Deadline: {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</p>

                    <a href="{{ route('jobs.show', $job->id) }}" 
                       class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                       View Details
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $jobs->links() }} {{-- pagination --}}
        </div>
    @else
        <p class="text-gray-500">No jobs available right now.</p>
    @endif
</div>
@endsection
