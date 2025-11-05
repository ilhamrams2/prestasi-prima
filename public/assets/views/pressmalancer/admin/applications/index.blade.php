@extends('app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Admin Header (full-bleed, fixed) -->
    <header class="fixed top-0 left-0 w-full bg-gradient-to-r from-orange-400 to-orange-600 shadow-lg z-40">
        <div class="-mx-4 sm:-mx-6 lg:-mx-8">
            <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <div class="pl-6 lg:pl-24">
                        <h1 class="text-2xl font-semibold text-white">Applications</h1>
                        <p class="text-purple-100 mt-1">Manajemen Lamaran</p>
                    </div>

                    <div x-data>
                        <label for="status" class="sr-only">Status</label>
                        <div class="relative inline-block">
                            <select id="status" x-init="$el.value = '{{ request('status') }}'" @change="(e) => {
                                const v = e.target.value;
                                if (!v) {
                                    window.location.href = '{{ route('admin.applications.index') }}';
                                } else {
                                    window.location.href = '{{ route('admin.applications.index') }}?status=' + encodeURIComponent(v);
                                }
                            }" class="block appearance-none w-40 pl-3 pr-8 py-2 bg-white border border-transparent rounded-md text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-300">
                                <option value="">All</option>
                                <option value="pending">Pending</option>
                                <option value="accepted">Accepted</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
    </div>

    </div>
    </header>

    <div class="pt-28 max-w-7xl mx-auto py-8">
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($applications as $application)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $application->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <a href="{{ route('admin.applications.show', $application->id) }}" class="text-orange-600 hover:underline">{{ $application->full_name ?? ($application->user->name ?? '—') }}</a>
                        <div class="text-xs text-gray-400">{{ $application->email ?? ($application->user->email ?? '') }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $application->job->title ?? '—' }}</td>
                    <td class="px-6 py-4 text-sm">
                        @if($application->status === 'accepted')
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Accepted</span>
                            @elseif($application->status === 'rejected')
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">Rejected</span>
                            @elseif($application->status === 'reviewed')
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">Reviewed</span>
                            @else
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">Pending</span>
                            @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ optional($application->created_at)->format('Y-m-d H:i') }}</td>
                    <td class="px-6 py-4 text-right text-sm">
                        <a href="{{ route('admin.applications.show', $application->id) }}" class="inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition border-orange-200 rounded-md text-sm hover:shadow-md transition">
                            <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            View
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">No applications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $applications->links() }}
    </div>
</div>

@endsection
