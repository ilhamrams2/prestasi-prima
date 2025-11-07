@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Lamaran Berhasil Dikirim')
@section('hideSidebar')@endsection
@section('content')
<div class="min-h-screen bg-gray-50">

    {{-- Main Content --}}
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            
            {{-- Success Animation --}}
            <div class="text-center mb-8 animate-in zoom-in duration-500">
                <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                
                <h1 class="text-3xl font-semibold text-gray-900 mb-4">Lamaran Berhasil Dikirim! 🎉</h1>
                <p class="text-lg text-gray-600 mb-2">Terima kasih sudah melamar di</p>
                <p class="text-xl font-medium text-orange-600">{{ $application->job->company->name ?? 'PT Digital Indonesia' }}</p>
            </div>

            {{-- Application Summary --}}
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Ringkasan Lamaran</h2>
                
                <div class="space-y-3">
                    <div class="flex justify-between py-2 border-b">
                        <span class="text-gray-600">Posisi:</span>
                        <span class="font-medium text-gray-900">{{ $application->job->title }}</span>
                    </div>
                    
                    <div class="flex justify-between py-2 border-b">
                        <span class="text-gray-600">Perusahaan:</span>
                        <span class="font-medium text-gray-900">{{ $application->job->company->name ?? 'PT Digital Indonesia' }}</span>
                    </div>
                    
                    <div class="flex justify-between py-2 border-b">
                        <span class="text-gray-600">Tanggal Kirim:</span>
                        <span class="font-medium text-gray-900">{{ $application->submitted_at->format('d F Y, H:i') }}</span>
                    </div>
                    
                    <div class="flex justify-between py-2 border-b">
                        <span class="text-gray-600">Status:</span>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-sm rounded-full">Menunggu Review</span>
                    </div>
                    
                    <div class="flex justify-between py-2">
                        <span class="text-gray-600">ID Lamaran:</span>
                        <span class="font-medium text-gray-900">#{{ str_pad($application->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>
            </div>

            {{-- What's Next --}}
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-blue-900 mb-3">Apa Selanjutnya?</h3>
                <ul class="space-y-2 text-sm text-blue-800">
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span>Tim HR akan meninjau lamaran Anda dalam 3-5 hari kerja</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span>Anda akan menerima email konfirmasi di <strong>{{ $application->email }}</strong></span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span>Jika lolos seleksi, kami akan menghubungi Anda untuk tahap wawancara</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span>Pantau status lamaran Anda di halaman "Lamaran Saya"</span>
                    </li>
                </ul>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4">
                <a 
                    href="{{ route('applications.index') }}"
                    class="flex-1 px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all text-center font-medium"
                >
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Lihat Lamaran Saya
                </a>
                
                <a 
                    href="{{ route('jobs.index') }}"
                    class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg transition-all text-center font-medium"
                >
                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Cari Lowongan Lain
                </a>
            </div>

            {{-- Social Share (Optional) --}}
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500 mb-3">Bagikan pencapaian Anda!</p>
                <div class="flex justify-center gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer" class="p-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors" aria-label="Share on Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                        </svg>
                    </a>

                    <a href="https://x.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer" class="p-2 bg-black text-white rounded-lg hover:opacity-90 transition-colors" aria-label="Share on X">
                        <!-- Official-looking X mark (filled) -->
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M7.47 6.47a.75.75 0 10-1.06 1.06L10.94 12l-4.53 4.47a.75.75 0 101.06 1.06L12 13.06l4.47 4.47a.75.75 0 001.06-1.06L13.06 12l4.47-4.47a.75.75 0 10-1.06-1.06L12 10.94 7.47 6.47z" />
                        </svg>
                    </a>

                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank" rel="noopener noreferrer" class="p-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition-colors" aria-label="Share on LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                </div>
            </div>
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