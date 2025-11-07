@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('hideSidebar')@endsection
@section('title', 'Lamar Pekerjaan - Fase 1')
@section('content')
<div class="min-h-screen bg-gray-50 flex justify-center" x-data="applicationForm({{ isset($application) ? 'true' : 'false' }})">
    <div class="w-full max-w-4xl px-4 sm:px-6 lg:px-8 py-8">
            
            {{-- Progress Steps --}}
            <div class="mb-8 animate-in fade-in duration-500">
                <div class="flex items-center justify-center gap-4 sm:gap-8">
                    {{-- Step 1 - Active --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center font-semibold shadow-lg">
                            1
                        </div>
                        <span class="mt-2 text-xs sm:text-sm font-medium text-orange-600">Info Posisi & Dokumen</span>
                    </div>
                    
                    <div class="h-0.5 w-16 sm:w-24 bg-gray-300"></div>
                    
                    {{-- Step 2 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full border-2 border-gray-300 text-gray-400 flex items-center justify-center font-semibold">
                            2
                        </div>
                        <span class="mt-2 text-xs sm:text-sm text-gray-500">Jawab Pertanyaan Perusahaan</span>
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
                        
                        </div>
                        <span class="mt-2 text-xs sm:text-sm text-gray-500">Review & Kirim</span>
                    </div>
            </div>

        <form id="phase1Form" action="{{ isset($application) ? route('applications.phase1.update', $application->id) : route('applications.phase1.store') }}" 
            method="POST" 
            enctype="multipart/form-data"
            class="space-y-6">
                @csrf
                @if(isset($application))
                    @method('PUT')
                @endif
                
                <input type="hidden" name="job_id" value="{{ $job->id }}">

                {{-- Konfirmasi Lamaran --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Konfirmasi Lamaran</h2>
                    <p class="text-sm text-gray-600 mb-4">Pastikan informasi posisi yang Anda lamar sudah benar</p>
                    
                    {{-- Job Info Card --}}
                    <div class="border-l-4 border-orange-500 bg-gray-50 rounded-lg p-4 mb-4">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-16 h-16 bg-white rounded-lg flex items-center justify-center overflow-hidden border">
                                @if($job->company && $job->company->logo)
                                    <img src="{{ $job->company->logo }}" alt="{{ $job->company->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                @endif
                            </div>
                            
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-1">{{ $job->title }}</h3>
                                <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span>{{ $job->company->name ?? 'PT Digital Teknologi Indonesia' }}</span>
                                </div>
                                
                                <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    </svg>
                                    <span>{{ $job->location }}</span>
                                </div>
                                
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $job->created_at->diffForHumans() }}</span>
                                </div>
                                
                                <div class="mt-3 flex items-center gap-2">
                                    <span class="px-3 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">
                                        {{ $job->company->name ?? 'PKL/Magang' }}
                                    </span>
                                    <span class="px-3 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                                        {{ $job->salary_range }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex-shrink-0">
                                <span class="inline-block px-3 py-1 text-xs bg-orange-500 text-white rounded-full">
                                    KIRIM LAMARAN
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-4 grid grid-cols-3 gap-4 pt-4 border-t border-gray-200">
                            <div>
                                <div class="text-xs text-gray-500">Department</div>
                                <div class="text-sm font-medium text-gray-900">Information Technology</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Program</div>
                                <div class="text-sm font-medium text-gray-900">Program PKL/Magang untuk Siswa SMK</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Qualification</div>
                                <div class="text-sm font-medium text-gray-900">SMK Jurusan TKJ/RPL/MM</div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Warning Box for SMK Students --}}
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm text-yellow-800">
                                    <strong>Informasi Penting untuk Siswa SMK:</strong><br>
                                    Pastikan jadwal PKL/Magang sesuai dengan jadwal sekolah dan tidak mengganggu proses belajar mengajar lamaran
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Source Input --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Dari mana Anda mengetahui lowongan PKL/Magang ini? <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="source"
                            value="{{ old('source', $application->source ?? '') }}"
                            placeholder="Pilih sumber informasi..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                        >
                        @error('source')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Informasi Pribadi --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500 delay-100">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pribadi</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        {{-- Nama Depan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Depan <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="first_name"
                                value="{{ old('first_name', $application->first_name ?? '') }}"
                                placeholder="Masukkan nama depan"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                            >
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- Nama Belakang --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Belakang <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                name="last_name"
                                value="{{ old('last_name', $application->last_name ?? '') }}"
                                placeholder="Masukkan nama belakang"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                            >
                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    {{-- Alamat Rumah --}}
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat Rumah <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="address"
                            rows="3"
                            placeholder="Masukkan alamat lengkap"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                        >{{ old('address', $application->address ?? '') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Nomor Telepon --}}
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Telepon <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="tel" 
                            name="phone"
                            value="{{ old('phone', $application->phone ?? '') }}"
                            placeholder="Contoh: +62812345678"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                        >
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Alamat Email --}}
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email"
                            value="{{ old('email', $application->email ?? '') }}"
                            placeholder="contoh@email.com"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Simpan Button --}}
                    <div class="mt-6">
                        <button 
                            type="button"
                            @click="savePersonalInfo()"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 px-4 rounded-lg transition-all duration-300 hover:scale-105 shadow-lg font-medium"
                        >
                            Simpan
                        </button>
                    </div>
                </div>

                {{-- Resume --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500 delay-200">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Resume</h2>
                    
                    <div class="space-y-3">
                        {{-- Upload File --}}
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input 
                                type="radio" 
                                name="resume_type" 
                                value="upload"
                                x-model="resumeType"
                                checked
                                class="w-5 h-5 text-orange-500 border-gray-300 focus:ring-orange-500"
                            >
                            <span class="text-gray-700 group-hover:text-orange-600 transition-colors">Unggah file</span>
                        </label>
                        
                        <div x-show="resumeType === 'upload'" class="ml-8 mt-2">
                            <button 
                                type="button"
                                onclick="document.getElementById('resume').click()"
                                class="px-6 py-2 border-2 border-orange-500 text-orange-500 rounded-lg hover:bg-orange-50 transition-colors font-medium"
                            >
                                Pilih File
                            </button>
                            <input 
                                type="file" 
                                id="resume"
                                name="resume"
                                accept=".pdf,.doc,.docx"
                                class="hidden"
                                @change="handleFileSelect($event, 'resume')"
                            >
                            <p class="mt-2 text-sm text-gray-500" x-show="resumeFileName">
                                File dipilih: <span class="font-medium" x-text="resumeFileName"></span>
                            </p>
                        </div>
                        
                        {{-- Drop & Upload --}}
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input 
                                type="radio" 
                                name="resume_type" 
                                value="drop"
                                x-model="resumeType"
                                class="w-5 h-5 text-orange-500 border-gray-300 focus:ring-orange-500"
                            >
                            <span class="text-gray-700 group-hover:text-orange-600 transition-colors">Drop & Upload</span>
                        </label>
                        
                        {{-- Don't Include --}}
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input 
                                type="radio" 
                                name="resume_type" 
                                value="none"
                                x-model="resumeType"
                                class="w-5 h-5 text-orange-500 border-gray-300 focus:ring-orange-500"
                            >
                            <span class="text-gray-700 group-hover:text-orange-600 transition-colors">Jangan sertakan resume</span>
                        </label>
                    </div>
                    
                    <p class="mt-4 text-xs text-gray-500">
                        * Format file yang didukung: PDF, DOC, DOCX. Maksimal ukuran file 5MB
                    </p>
                </div>

                {{-- Surat Lamaran --}}
                <div class="bg-white rounded-lg shadow-sm p-6 animate-in slide-in-from-bottom duration-500 delay-300">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Surat Lamaran</h2>
                    
                    <div class="space-y-3">
                        {{-- Upload File --}}
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input 
                                type="radio" 
                                name="cover_letter_type" 
                                value="upload"
                                x-model="coverLetterType"
                                checked
                                class="w-5 h-5 text-orange-500 border-gray-300 focus:ring-orange-500"
                            >
                            <span class="text-gray-700 group-hover:text-orange-600 transition-colors">Unggah file</span>
                        </label>
                        
                        <div x-show="coverLetterType === 'upload'" class="ml-8 mt-2">
                            <button 
                                type="button"
                                onclick="document.getElementById('cover_letter').click()"
                                class="px-6 py-2 border-2 border-orange-500 text-orange-500 rounded-lg hover:bg-orange-50 transition-colors font-medium"
                            >
                                Pilih File
                            </button>
                            <input 
                                type="file" 
                                id="cover_letter"
                                name="cover_letter"
                                accept=".pdf,.doc,.docx"
                                class="hidden"
                                @change="handleFileSelect($event, 'coverLetter')"
                            >
                            <p class="mt-2 text-sm text-gray-500" x-show="coverLetterFileName">
                                File dipilih: <span class="font-medium" x-text="coverLetterFileName"></span>
                            </p>
                        </div>
                        
                        {{-- Drop & Upload --}}
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input 
                                type="radio" 
                                name="cover_letter_type" 
                                value="drop"
                                x-model="coverLetterType"
                                class="w-5 h-5 text-orange-500 border-gray-300 focus:ring-orange-500"
                            >
                            <span class="text-gray-700 group-hover:text-orange-600 transition-colors">Drop & Upload</span>
                        </label>
                        
                        {{-- Don't Include --}}
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input 
                                type="radio" 
                                name="cover_letter_type" 
                                value="none"
                                x-model="coverLetterType"
                                class="w-5 h-5 text-orange-500 border-gray-300 focus:ring-orange-500"
                            >
                            <span class="text-gray-700 group-hover:text-orange-600 transition-colors">Jangan sertakan surat lamaran</span>
                        </label>
                    </div>
                    
                    <p class="mt-4 text-xs text-gray-500">
                        * Format file yang didukung: PDF, DOC, DOCX. Maksimal ukuran file 5MB
                    </p>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-center animate-in fade-in duration-500 delay-400">
                    <button 
                        type="submit"
                        class="px-12 py-3 bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white rounded-lg transition-all duration-300 hover:scale-105 shadow-lg font-medium"
                    >
                        Lanjutkan
                    </button>
                </div>
{{-- Alpine.js Script --}}
            </form>

            <!-- Saved popup modal (inside Alpine scope) -->
            <div x-show="showSavedPopup" x-transition class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50" style="display: none;">
                <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-md p-6 transform transition-all scale-100 animate-pop">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Informasi anda telah disimpan!</h3>
                    <p class="text-sm text-gray-600 mb-4" x-text="savedMessage"> </p>
                    <div class="text-right">
                        <button @click="showSavedPopup = false" class="px-4 py-2 bg-orange-500 text-white rounded-md">OK</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Alpine.js Script --}}
<script>
function applicationForm() {
    return {
        isCollapsed: false,
        showSavedPopup: false,
        savedMessage: '',
        resumeType: 'upload',
        coverLetterType: 'upload',
        resumeFileName: '',
        coverLetterFileName: '',
        
        handleFileSelect(event, type) {
            const file = event.target.files[0];
            if (file) {
                if (type === 'resume') {
                    this.resumeFileName = file.name;
                } else if (type === 'coverLetter') {
                    this.coverLetterFileName = file.name;
                }
            }
        },
        
    async savePersonalInfo() {
            // Submit the phase1 form via AJAX (FormData to include files)
            try {
                const form = document.getElementById('phase1Form');
                const url = "{{ route('applications.phase1.save') }}";
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const formData = new FormData(form);

                const res = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: formData,
                    credentials: 'same-origin'
                });

                if (!res.ok) {
                    const err = await res.json().catch(() => ({}));
                    const msg = err.errors ? Object.values(err.errors).flat().join('\n') : 'Terjadi kesalahan saat menyimpan.';
                    this.savedMessage = msg;
                    this.showSavedPopup = true;
                    return;
                }

                const data = await res.json();
                if (data.success) {
                    this.savedMessage = data.message || 'Informasi anda telah disimpan!';
                    this.showSavedPopup = true;
                    // mark form as saved so Lanjutkan (submit) is enabled
                    this.saved = true;
                    this.applicationId = data.application_id || this.applicationId;
                    // Optionally update the form action to use update route if application_id returned
                    if (data.application_id) {
                        // replace form action to the update route and ensure method spoofing for PUT
                        const updateUrl = "{{ url('/applications') }}" + '/' + data.application_id + '/phase1';
                        form.setAttribute('action', updateUrl);

                        // If the form wasn't originally rendered as an 'update' (no @method('PUT')),
                        // inject a hidden _method input so Laravel will treat the next submit as PUT.
                        let methodInput = form.querySelector('input[name="_method"]');
                        if (!methodInput) {
                            methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'PUT';
                            form.appendChild(methodInput);
                        } else {
                            methodInput.value = 'PUT';
                        }
                    }
                }
            } catch (e) {
                this.savedMessage = 'Terjadi kesalahan jaringan. Silakan coba lagi.';
                this.showSavedPopup = true;
            }
        },
        // track saved state and application id for submit handling
        saved: false,
        applicationId: null,
        isInitiallySaved: false
    }
}
</script>

@endsection

<style>
.animate-pop{animation: pop 220ms ease-out}
@keyframes pop{0%{transform:translateY(6px) scale(.96);opacity:0}100%{transform:translateY(0) scale(1);opacity:1}}
</style>

@push('styles')
<style>
    /* When this view hides the sidebar, remove the left margin applied by the layout and center the main area */
    body.no-sidebar .flex-1.transition-all.duration-300 {
        margin-left: 0 !important;
    }

    /* Ensure the inner container is centered and has comfortable spacing */
    body.no-sidebar .w-full.max-w-4xl {
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>
@endpush
