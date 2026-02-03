@extends('layouts.admin')

@section('title', 'Tambah Ekskul')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.ekstrakurikuler.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Ekstrakurikuler</h1>
            <p class="text-sm text-slate-500 font-medium">Daftarkan kegiatan baru untuk memfasilitasi minat dan bakat siswa.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-slate-50">
            @csrf

            <div class="p-8 space-y-8">
                {{-- Nama --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                           placeholder="Contoh: Paskibra / Robotik"
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                </div>

                {{-- Image Upload --}}
                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Gambar / Ikon Ekskul</label>
                    <div class="flex flex-col md:flex-row items-center gap-6 p-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] hover:border-orange-400 transition-colors group">
                        <div class="w-40 h-28 bg-white rounded-2xl flex-shrink-0 flex items-center justify-center shadow-sm overflow-hidden border border-slate-100 flex-col gap-1 relative">
                            {{-- Icon Removed --}}
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h4 class="text-sm font-bold text-slate-800 mb-1">Pilih Gambar Sampul</h4>
                            <p class="text-xs text-slate-500 font-medium mb-4 leading-relaxed">Format: JPG, PNG, WEBP (Maks. 2MB).<br>Gunakan rasio 16:9 untuk hasil terbaik.</p>
                            <input type="file" name="gambar" 
                                   class="block w-full text-[11px] text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6B00] file:text-white hover:file:bg-[#e66000] transition-all cursor-pointer">
                        </div>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi" rows="5" 
                              placeholder="Jelaskan mengenai kegiatan, jadwal, atau persyaratan ekskul ini..."
                              class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800">{{ old('deskripsi') }}</textarea>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.ekstrakurikuler.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-[#FF6B00] text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Tambah Ekskul
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
