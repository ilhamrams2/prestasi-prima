@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Lamar Pekerjaan - Fase 2')
@section('hideSidebar')@endsection
@section('content')
<div class="min-h-screen bg-gray-50">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            {{-- Progress Steps --}}
            <div class="mb-8 animate-in fade-in duration-500">
                <div class="flex items-center justify-center gap-4 sm:gap-8">
                    {{-- Step 1 - Completed --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="mt-2 text-xs sm:text-sm font-medium text-green-600">Info Posisi & Dokumen</span>
                    </div>
                    
                    <div class="h-0.5 w-16 sm:w-24 bg-green-500"></div>
                    
                    {{-- Step 2 - Active --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center font-semibold shadow-lg">
                            2
                        </div>
                        <span class="mt-2 text-xs sm:text-sm font-medium text-orange-600">Jawab Pertanyaan Perusahaan</span>
                    </div>
                    
                    <div class="h-0.5 w-16 sm:w-24 bg-gray-300"></div>
                    
                    {{-- Step 3 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold">
                            3
                        </div>
                        <span class="mt-2 text-xs sm:text-sm text-gray-500">Desain Draft</span>
                    </div>
                    
                    <div class="h-0.5 w-16 sm:w-24 bg-gray-300"></div>
                    
                    {{-- Step 4 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold">
                            4
                        </div>
                        <span class="mt-2 text-xs sm:text-sm text-gray-500">Review & Kirim</span>
                    </div>
                </div>
            </div>

            {{-- Success Alert --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6 animate-in slide-in-from-top duration-500">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="flex-1">
                            <p class="text-sm text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Phase 1 Summary Card --}}
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6 animate-in slide-in-from-bottom duration-500">
                <div class="flex items-start justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-900">Data Fase 1 - Tersimpan</h2>
                    <a 
                        href="{{ route('applications.edit', $application->id) }}"
                        class="text-sm text-orange-600 hover:text-orange-700 flex items-center gap-1"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs text-gray-500">Nama Lengkap</label>
                        <p class="text-sm font-medium text-gray-900">{{ $application->full_name }}</p>
                    </div>
                    
                    <div>
                        <label class="text-xs text-gray-500">Email</label>
                        <p class="text-sm font-medium text-gray-900">{{ $application->email }}</p>
                    </div>
                    
                    <div>
                        <label class="text-xs text-gray-500">Telepon</label>
                        <p class="text-sm font-medium text-gray-900">{{ $application->phone }}</p>
                    </div>
                    
                    <div>
                        <label class="text-xs text-gray-500">Sumber Info</label>
                        <p class="text-sm font-medium text-gray-900">{{ $application->source ?? '-' }}</p>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="text-xs text-gray-500">Alamat</label>
                        <p class="text-sm font-medium text-gray-900">{{ $application->address }}</p>
                    </div>
                    
                    <div>
                        <label class="text-xs text-gray-500">Resume</label>
                        <p class="text-sm font-medium text-gray-900">
                            @if($application->resume_path)
                                <a href="{{ route('applications.download-resume', $application->id) }}" 
                                   class="text-orange-600 hover:text-orange-700 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download Resume
                                </a>
                            @else
                                <span class="text-gray-400">Tidak disertakan</span>
                            @endif
                        </p>
                    </div>
                    
                    <div>
                        <label class="text-xs text-gray-500">Surat Lamaran</label>
                        <p class="text-sm font-medium text-gray-900">
                            @if($application->cover_letter_path)
                                <a href="{{ route('applications.download-cover-letter', $application->id) }}" 
                                   class="text-orange-600 hover:text-orange-700 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download Surat Lamaran
                                </a>
                            @else
                                <span class="text-gray-400">Tidak disertakan</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Phase 2 Form --}}
            <form action="{{ route('applications.phase2.store', $application->id) }}" method="POST">
                @csrf
                
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6 animate-in slide-in-from-bottom duration-500 delay-100">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Fase 2 - Jawab Pertanyaan Perusahaan</h2>
                    
                    <p class="text-gray-600 mb-6">
                        Perusahaan tidak memiliki pertanyaan tambahan untuk posisi ini. 
                        Anda dapat langsung melanjutkan ke fase berikutnya.
                    </p>

                    {{-- Example Questions (Optional) --}}
                    <div class="space-y-4 hidden">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Pertanyaan 1: Mengapa Anda tertarik dengan posisi ini?
                            </label>
                            <textarea 
                                name="answers[question_1]"
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="Tulis jawaban Anda di sini..."
                            >{{ old('answers.question_1', $application->phase2_answers['question_1'] ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Pertanyaan 2: Apa kelebihan Anda yang relevan dengan posisi ini?
                            </label>
                            <textarea 
                                name="answers[question_2]"
                                rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                placeholder="Tulis jawaban Anda di sini..."
                            >{{ old('answers.question_2', $application->phase2_answers['question_2'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-between gap-4">
                    <a 
                        href="{{ route('applications.phase1.edit', $application->id) }}"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors"
                    >
                        Kembali ke Fase 1
                    </a>
                    
                    <button 
                        type="submit"
                        class="px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all duration-300 hover:scale-105 shadow-lg font-medium"
                    >
                        Lanjutkan ke Fase 3
                    </button>
                </div>
            </form>

            {{-- Job Info --}}
            <div class="bg-gray-100 rounded-lg p-4 animate-in fade-in duration-500 delay-200">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-lg flex items-center justify-center overflow-hidden border">
                        @if($application->job->company && $application->job->company->logo)
                            <img src="{{ $application->job->company->logo }}" alt="{{ $application->job->company->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        @endif
                    </div>
                    
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">{{ $application->job->title }}</h4>
                        <p class="text-sm text-gray-600">{{ $application->job->company->name ?? 'PT Digital Teknologi Indonesia' }}</p>
                    </div>
                    
                    <span class="px-3 py-1 text-xs bg-orange-500 text-white rounded-full">
                        {{ $application->status }}
                    </span>
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
