@vite('resources/css/app.css')
@section('title', 'Lamar Pekerjaan - Fase 2')
@section('content')
<div class="min-h-screen bg-gray-50 flex justify-center items-start py-8">
    {{-- Sidebar --}}

    {{-- Main Content --}}
    <div class="flex-1 lg:ml-0 transition-all duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Fase 1 Selesai!</h2>
                <p class="text-gray-600 mb-8">Data Anda berhasil disimpan. Fase 2 akan segera tersedia.</p>
                
                <a 
                    href="{{ route('jobs.index') }}"
                    class="inline-block px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all"
                >
                    Kembali ke Daftar Lowongan
                </a>
            </div>
        </div>
    </div>
</div>