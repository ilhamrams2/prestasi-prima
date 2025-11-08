@extends('app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('title', 'Lamar Pekerjaan - Fase 3: Design Draft')
@section('hideSidebar')@endsection
@section('content')
<div class="min-h-screen bg-gray-50" x-data="phase3Form()">

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
                    
                    <div class="h-0.5 w-16 sm:w-24 bg-orange-500"></div>
                    
                    {{-- Step 3 - Active --}}
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center font-semibold shadow-lg">
                            3
                        </div>
                        <span class="mt-2 text-xs sm:text-sm font-medium text-orange-600">Design Draft</span>
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

            {{-- Page Title --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl font-semibold text-gray-900 mb-2">Design Draft Lamaran</h1>
                <p class="text-gray-600">Pilih template dan preview lamaran Anda sebelum dikirim</p>
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

            <form action="{{ route('applications.phase3.store', $application->id) }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- Left Sidebar - Template Selection --}}
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-sm p-6 sticky top-8">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Pilih Template</h2>
                            
                            <div class="space-y-3">
                                @foreach($templates as $key => $template)
                                    <label 
                                        class="block border-2 rounded-lg p-4 cursor-pointer transition-all"
                                        :class="selectedTemplate === '{{ $key }}' ? 'border-orange-500 bg-orange-50' : 'border-gray-200 hover:border-orange-300'"
                                    >
                                        <input 
                                            type="radio" 
                                            name="template_choice" 
                                            value="{{ $key }}"
                                            x-model="selectedTemplate"
                                            class="sr-only"
                                            {{ (old('template_choice', $application->template_choice) == $key) ? 'checked' : '' }}
                                        >
                                        <div class="flex items-start gap-3">
                                            <div 
                                                class="w-5 h-5 rounded-full border-2 flex-shrink-0 flex items-center justify-center mt-0.5"
                                                :class="selectedTemplate === '{{ $key }}' ? 'border-orange-500 bg-orange-500' : 'border-gray-300'"
                                            >
                                                <div 
                                                    x-show="selectedTemplate === '{{ $key }}'"
                                                    class="w-2 h-2 bg-white rounded-full"
                                                ></div>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-medium text-gray-900">{{ $template['name'] }}</h3>
                                                <p class="text-xs text-gray-600 mt-1">{{ $template['description'] }}</p>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <div class="mt-6 pt-6 border-t">
                                <button type="button" class="w-full text-sm text-gray-600 hover:text-gray-900 flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Tampilan Preview
                                </button>

                                <button type="button" class="w-full mt-2 text-sm text-gray-600 hover:text-gray-900 flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Gabungan Lengkap
                                </button>
                            </div>

                            @error('template_choice')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Right Content - Preview --}}
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg shadow-sm">
                            {{-- Preview Header --}}
                            <div class="p-6 border-b flex items-center justify-between">
                                <h2 class="text-lg font-semibold text-gray-900">Preview Lamaran</h2>
                                <div class="flex gap-2">
                                    <button type="button" class="px-4 py-2 text-sm border border-orange-500 text-orange-600 rounded-lg hover:bg-orange-50 transition-colors">
                                        Download PDF
                                    </button>
                                    <button type="button" class="px-4 py-2 text-sm bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                                        Print
                                    </button>
                                </div>
                            </div>

                            {{-- Preview Content --}}
                            <div class="p-6 space-y-6">
                                {{-- Modern Professional Preview --}}
                                <div x-show="selectedTemplate === 'modern_professional'" x-cloak>
                                    <div>
                                        <h3 class="text-xl font-semibold text-blue-600 mb-1">{{ $application->full_name }}</h3>
                                        <p class="text-gray-600">{{ $application->email }}</p>
                                        <p class="text-gray-600">{{ $application->phone }}</p>
                                        <p class="text-sm text-gray-500 mt-2">{{ $application->address }}</p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 pt-4 border-t">
                                        <div>
                                            <h4 class="text-sm font-medium text-blue-600 mb-2">Posisi yang Dilamar:</h4>
                                            <p class="font-medium text-gray-900">{{ $application->job->title }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-blue-600 mb-2">Perusahaan:</h4>
                                            <p class="font-medium text-gray-900">{{ $application->job->company->name ?? 'PT Digital Indonesia' }}</p>
                                        </div>
                                    </div>

                                    <div class="pt-4 border-t">
                                        <h4 class="text-sm font-medium text-blue-600 mb-2">Informasi Utama</h4>
                                        <div class="space-y-2">
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Ekspektasi Gaji:</span>
                                                <span class="font-medium">Di atas Rp 20.000.000</span>
                                            </div>
                                            <div class="flex justify-between">
                                                <span class="text-gray-600">Preferensi Kerja:</span>
                                                <span class="font-medium">Work from Home</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Corporate Classic Preview --}}
                                <div x-show="selectedTemplate === 'corporate_classic'" x-cloak>
                                    <div class="font-sans">
                                        <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $application->full_name }}</h3>
                                        <p class="text-gray-700">{{ $application->email }} · {{ $application->phone }}</p>
                                        <p class="text-sm text-gray-500 mt-2">{{ $application->address }}</p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 pt-4 border-t text-sm text-gray-800">
                                        <div>
                                            <h4 class="text-xs font-medium text-gray-600 mb-1">Posisi</h4>
                                            <p class="font-medium">{{ $application->job->title }}</p>
                                        </div>
                                        <div>
                                            <h4 class="text-xs font-medium text-gray-600 mb-1">Perusahaan</h4>
                                            <p class="font-medium">{{ $application->job->company->name ?? 'PT Digital Indonesia' }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Creative Design Preview --}}
                                <div x-show="selectedTemplate === 'creative_design'" x-cloak>
                                    <div class="text-indigo-700">
                                        <h3 class="text-2xl font-bold mb-1">{{ $application->full_name }}</h3>
                                        <p class="italic text-sm text-indigo-600">{{ $application->job->title }}</p>
                                    </div>

                                    <div class="pt-4 border-t">
                                        <p class="text-gray-700">{{ \Illuminate\Support\Str::limit($application->cover_letter_text ?? 'Belum ada surat lamaran', 300) }}</p>
                                    </div>
                                </div>

                                {{-- Minimal Clean Preview --}}
                                <div x-show="selectedTemplate === 'minimal_clean'" x-cloak>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-1">{{ $application->full_name }}</h3>
                                        <p class="text-gray-600">{{ $application->email }}</p>
                                    </div>
                                    <div class="pt-4 border-t text-sm text-gray-700">
                                        <div class="flex justify-between">
                                            <div>
                                                <div class="text-xs text-gray-500">Posisi</div>
                                                <div class="font-medium">{{ $application->job->title }}</div>
                                            </div>
                                            <div>
                                                <div class="text-xs text-gray-500">Perusahaan</div>
                                                <div class="font-medium">{{ $application->job->company->name ?? 'PT Digital Indonesia' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Manual - user creates own design: show upload + instructions --}}
                                <div x-show="selectedTemplate === 'manual'" x-cloak>
                                    <div class="space-y-4">
                                        <p class="text-sm text-gray-600">Pilih file desain Anda atau beri instruksi desain di bawah. (Catatan: instruksi/manual belum disimpan ke database — saya bisa tambahkan penyimpanan jika mau.)</p>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Unggah Desain (PDF/PNG/JPG)</label>
                                            <input type="file" name="manual_design_file" accept="application/pdf,image/*" class="mt-2">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Instruksi Desain</label>
                                            <textarea name="manual_instructions" rows="4" class="w-full mt-2 px-3 py-2 border rounded-md" placeholder="Contoh: header biru, font serif untuk nama, sertakan foto di kanan atas..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Cover Letter Text (common editable area) --}}
                                <div class="pt-4 border-t">
                                    <h4 class="text-sm font-medium text-blue-600 mb-2">Motivasi Melamar</h4>
                                    <textarea 
                                        name="cover_letter_text"
                                        rows="6"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                        placeholder="Tulis motivasi Anda melamar posisi ini..."
                                    >{{ old('cover_letter_text', $application->cover_letter_text) }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex justify-between gap-4 mt-6">
                            <a 
                                href="{{ route('applications.phase2', $application->id) }}"
                                class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors"
                            >
                                Kembali
                            </a>
                            
                            <button 
                                type="submit"
                                class="px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all duration-300 hover:scale-105 shadow-lg font-medium"
                            >
                                Lanjutkan ke Review Final
                            </button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>

{{-- Alpine.js Script --}}
<script>
function phase3Form() {
    return {
        selectedTemplate: '{{ old('template_choice', $application->template_choice ?? 'modern_professional') }}'
    }
}
</script>

@endsection