@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Lamar Pekerjaan - Fase 4: Review & Kirim')
@section('hideSidebar')@endsection
@section('content')
<div class="min-h-screen bg-gray-50">

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
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
                    
                    {{-- Step 2 - Completed --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="mt-2 text-xs sm:text-sm font-medium text-green-600">Jawab Pertanyaan</span>
                    </div>
                    
                    <div class="h-0.5 w-16 sm:w-24 bg-green-500"></div>
                    
                    {{-- Step 3 - Completed --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="mt-2 text-xs sm:text-sm font-medium text-green-600">Design Draft</span>
                    </div>
                    
                    <div class="h-0.5 w-16 sm:w-24 bg-orange-500"></div>
                    
                    {{-- Step 4 - Active --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center font-semibold shadow-lg">
                            4
                        </div>
                        <span class="mt-2 text-xs sm:text-sm font-medium text-orange-600">Review & Kirim</span>
                    </div>
                </div>
            </div>

            {{-- Page Title --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl font-semibold text-gray-900 mb-2">Review Final Lamaran Kerja</h1>
            </div>

            {{-- Success Alert --}}
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

            {{-- Review Cards --}}
            <div class="space-y-4">
                
                {{-- 1. Informasi Posisi --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Informasi Posisi</h2>
                        <a 
                            href="{{ route('applications.phase1.edit', $application->id) }}"
                            class="px-4 py-2 text-sm border border-orange-500 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors"
                        >
                            Edit
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs text-gray-500">Posisi yang Dilamar</label>
                            <p class="text-sm font-medium text-gray-900">{{ $application->job->title }}</p>
                        </div>
                        
                        <div>
                            <label class="text-xs text-gray-500">Perusahaan</label>
                            <p class="text-sm font-medium text-gray-900">{{ $application->job->company->name ?? 'PT Digital Indonesia' }}</p>
                        </div>
                        
                        <div>
                            <label class="text-xs text-gray-500">Departemen</label>
                            <p class="text-sm font-medium text-gray-900">{{ $application->job->department ?? 'SDD' }}</p>
                        </div>
                        
                        <div>
                            <label class="text-xs text-gray-500">Tipe Pekerjaan</label>
                            <p class="text-sm font-medium text-gray-900">{{ $application->job->type ?? 'full-time' }}</p>
                        </div>
                    </div>
                </div>

                {{-- 2. Informasi Pribadi --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500 delay-100">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Informasi Pribadi</h2>
                        <a 
                            href="{{ route('applications.phase1.edit', $application->id) }}"
                            class="px-4 py-2 text-sm border border-orange-500 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors"
                        >
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
                            <label class="text-xs text-gray-500">Nomor Telepon</label>
                            <p class="text-sm font-medium text-gray-900">{{ $application->phone }}</p>
                        </div>
                        
                        <div>
                            <label class="text-xs text-gray-500">Alamat</label>
                            <p class="text-sm font-medium text-gray-900">{{ $application->address }}</p>
                        </div>
                    </div>
                </div>

                {{-- 3. Resume --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500 delay-200">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Resume</h2>
                        <a 
                            href="{{ route('applications.phase1.edit', $application->id) }}"
                            class="px-4 py-2 text-sm border border-orange-500 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors"
                        >
                            Edit
                        </a>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        @if($application->resume_path)
                            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Resume tersedia</p>
                                <a href="{{ route('applications.download-resume', $application->id) }}" 
                                   class="text-sm text-orange-600 hover:text-orange-700 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download Resume
                                </a>
                            </div>
                        @else
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <p class="text-sm text-gray-600">Resume tidak disertakan</p>
                        @endif
                    </div>
                </div>

                {{-- 4. Surat Lamaran --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500 delay-300">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Surat Lamaran</h2>
                        <a 
                            href="{{ route('applications.phase1.edit', $application->id) }}"
                            class="px-4 py-2 text-sm border border-orange-500 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors"
                        >
                            Edit
                        </a>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        @if($application->cover_letter_path)
                            <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Surat lamaran tersedia</p>
                                <a href="{{ route('applications.download-cover-letter', $application->id) }}" 
                                   class="text-sm text-orange-600 hover:text-orange-700 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download Surat Lamaran
                                </a>
                            </div>
                        @else
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <p class="text-sm text-gray-600">Surat lamaran tidak disertakan</p>
                        @endif
                    </div>
                </div>

            </div>

            {{-- Final Action Buttons --}}
            <form action="{{ route('applications.submit', $application->id) }}" method="POST" class="mt-8" x-ref="finalForm">
                @csrf
                
                {{-- Optional Final Notes --}}
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Catatan Tambahan (Opsional)</h2>
                    <textarea 
                        name="final_notes"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        placeholder="Tambahkan catatan atau informasi tambahan yang ingin Anda sampaikan..."
                    >{{ old('final_notes', $application->final_notes) }}</textarea>
                </div>

                <div class="flex justify-between gap-4">
                    <a 
                        href="{{ route('applications.phase3', $application->id) }}"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors"
                    >
                        Kembali
                    </a>
                    
                    <div x-data="phase4State()" class="relative">
                        <button 
                            type="button"
                            @click="openModal()"
                            class="px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all duration-300 hover:scale-105 shadow-lg font-medium"
                        >
                            Kirim Lamaran
                        </button>

                        <!-- Confirmation Modal -->
                        <div x-show="showConfirm" x-cloak class="fixed inset-0 z-40 flex items-center justify-center">
                            <div x-show="showConfirm" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-40"></div>

                            <div x-show="showConfirm" x-transition:enter="duration-300" x-transition:enter-start="opacity-0 scale-95 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="duration-200" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-4" class="bg-white rounded-lg shadow-xl max-w-lg w-full mx-4 z-50">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Kirim Lamaran</h3>
                                    <p class="mt-2 text-sm text-gray-600">Apakah Anda yakin ingin mengirim lamaran ini? Setelah dikirim, lamaran tidak dapat diubah.</p>

                                    <div class="mt-6 flex justify-end gap-3">
                                        <button type="button" @click="closeModal()" class="px-4 py-2 bg-white border rounded-md text-gray-700 hover:bg-gray-50">Batal</button>
                                        <button type="button" @click="confirmSubmit()" class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Ya, Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Alpine.js Script --}}
<script>
function phase4State() {
    return {
        showConfirm: false,
        openModal() { this.showConfirm = true; document.body.classList.add('overflow-hidden'); },
        closeModal() { this.showConfirm = false; document.body.classList.remove('overflow-hidden'); },
        confirmSubmit() {
            // find the form referenced by x-ref on the page and submit it
            const form = document.querySelector('[x-ref="finalForm"]');
            if (form) {
                // remove modal to avoid blocking UI and submit
                this.closeModal();
                form.submit();
            } else {
                this.closeModal();
                document.querySelector('form')?.submit();
            }
        }
    }
}
</script>

@endsection