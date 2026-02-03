@extends('layouts.admin')

@section('title', 'Tambah Prestasi')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.prestasi.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Catat Prestasi Baru</h1>
            <p class="text-sm text-slate-500 font-medium">Dokumentasikan pencapaian luar biasa siswa dan siswi SMK Prestasi Prima.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-slate-50">
            @csrf

            <div class="p-8 space-y-8">
                {{-- Judul --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Judul Pencapaian</label>
                    <input type="text" name="judul" value="{{ old('judul') }}" 
                           placeholder="Contoh: Juara 1 LKS Tingkat Nasional 2024"
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                    @error('judul') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>

                {{-- Gambar Upload --}}
                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Dokumentasi Visual</label>
                    <div class="flex flex-col md:flex-row items-center gap-6 p-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] hover:border-orange-400 transition-colors group">
                        <div class="w-40 h-28 bg-white rounded-2xl flex-shrink-0 flex items-center justify-center shadow-sm overflow-hidden border border-slate-100 flex-col gap-1 relative">
                            {{-- Icon Removed --}}
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h4 class="text-sm font-bold text-slate-800 mb-1">Unggah Foto Penghargaan</h4>
                            <p class="text-xs text-slate-500 font-medium mb-4 leading-relaxed">Format: JPG, PNG, WEBP (Maks. 2MB).<br>Gunakan foto berkualitas tinggi.</p>
                            <input type="file" name="gambar" required
                                   class="block w-full text-[11px] text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6B00] file:text-white hover:file:bg-[#e66000] transition-all cursor-pointer">
                        </div>
                    </div>
                    @error('gambar') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Rincian Prestasi</label>
                    <textarea name="deskripsi" rows="5" 
                              placeholder="Ceritakan detail mengenai prestasi yang diraih..."
                              class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.prestasi.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-orange-600 text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Terbitkan Prestasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
