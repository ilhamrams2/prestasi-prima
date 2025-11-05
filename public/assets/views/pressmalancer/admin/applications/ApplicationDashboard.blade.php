@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('title', 'Admin — Detail Lamaran')
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Admin Header (full-bleed) -->
    <header class="bg-gradient-to-r from-orange-600 to-orange-700 shadow-lg -mx-4 sm:-mx-6 lg:-mx-8">
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="pl-6 lg:pl-24">
                    <h1 class="text-2xl font-semibold text-white">Detail Lamaran</h1>
                    <p class="text-purple-100 mt-1">Detail & keputusan admin</p>
                </div>
                <div class="pr-6 lg:pr-24">
                    <div class="text-sm">
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ($application->status === 'accepted' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">{{ ucfirst($application->status) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="pt-36 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">#{{ str_pad($application->id, 6, '0', STR_PAD_LEFT) }}</h1>
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pelamar</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Nama</p>
                    <p class="font-medium text-gray-900">{{ $application->full_name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="font-medium text-gray-900">{{ $application->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Telepon</p>
                    <p class="font-medium text-gray-900">{{ $application->phone }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Posisi</p>
                    <p class="font-medium text-gray-900">{{ $application->job->title ?? '-' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Berkas</h2>
            <div class="flex gap-3">
                @if($application->resume_path)
                    <a href="{{ route('applications.download-resume', $application->id) }}" class="px-4 py-2 bg-gray-100 rounded-md hover:bg-gray-200">Download Resume</a>
                @else
                    <span class="px-4 py-2 bg-gray-100 rounded-md text-gray-500">Resume: tidak tersedia</span>
                @endif

                @if($application->cover_letter_path)
                    <a href="{{ route('applications.download-cover-letter', $application->id) }}" class="px-4 py-2 bg-gray-100 rounded-md hover:bg-gray-200">Download Surat Lamaran</a>
                @else
                    <span class="px-4 py-2 bg-gray-100 rounded-md text-gray-500">Surat Lamaran: tidak tersedia</span>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Catatan & Keputusan Admin</h2>

            <form action="{{ route('admin.applications.review', $application->id) }}" method="POST">
                @csrf

                <label for="admin_notes" class="block text-sm font-medium text-gray-700">Catatan Admin (opsional)</label>
                <textarea id="admin_notes" name="admin_notes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">{{ old('admin_notes', $application->admin_notes) }}</textarea>

                <input type="hidden" name="decision" id="decision_input" value="">

                <div class="mt-4 flex items-center gap-3">
                    @if($application->status === 'pending')
                        <button type="submit" name="decision" value="accepted" class="px-5 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Approve</button>

                        <button type="submit" name="decision" value="rejected" class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Reject</button>
                    @elseif($application->status === 'accepted')
                        <div class="px-4 py-2 rounded-md bg-green-200 text-green-800 font-medium">Accepted</div>
                    @elseif($application->status === 'rejected')
                        <div class="px-4 py-2 rounded-md bg-red-50 text-red-800 font-medium">Rejected</div>
                    @endif

                    <a href="{{ route('admin.applications.index') }}" class="ml-auto inline-flex items-center gap-2 px-4 py-2 bg-orange-500 border border-orange-200 rounded-md text-sm text-white hover:shadow-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-200 transition">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Back
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Lainnya</h2>
            <div class="space-y-2 text-sm text-gray-700">
                <div class="flex justify-between">
                    <span>Submitted at</span>
                    <span class="font-medium">{{ $application->submitted_at ? $application->submitted_at->format('d F Y, H:i') : '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Reviewed by</span>
                    @php
                        $reviewerName = '-';
                        if ($application->reviewed_by) {
                            try {
                                $revUser = \App\Models\User::find($application->reviewed_by);
                                $reviewerName = $revUser ? $revUser->name : (string) $application->reviewed_by;
                            } catch (\Throwable $e) {
                                $reviewerName = (string) $application->reviewed_by;
                            }
                        }
                    @endphp
                    <span class="font-medium">{{ $reviewerName }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Reviewed at</span>
                    <span class="font-medium">{{ $application->reviewed_at ? $application->reviewed_at->format('d F Y, H:i') : '-' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
