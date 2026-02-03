@extends('layouts.admin')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.kegiatan.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Perbarui Agenda</h1>
            <p class="text-sm text-slate-500 font-medium">Lakukan perubahan rincian pada jadwal kegiatan yang sudah terdaftar.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data" class="divide-y divide-slate-50">
            @csrf
            @method('PUT')

            <div class="p-8 space-y-8">
                {{-- Judul --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Judul Agenda Kegiatan</label>
                    <input type="text" name="judul" value="{{ old('judul', $kegiatan->judul) }}" 
                           placeholder="Contoh: Rapat Orientasi Siswa Baru 2024"
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                    @error('judul') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>

                {{-- Waktu & Lokasi Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {{-- Tanggal --}}
                    <div class="space-y-2 md:col-span-1">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal ? \Carbon\Carbon::parse($kegiatan->tanggal)->format('Y-m-d') : '') }}"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('tanggal') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Jam --}}
                    <div class="space-y-2 md:col-span-1">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Waktu / Jam</label>
                        <input type="time" name="jam" value="{{ old('jam', $kegiatan->jam) }}"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('jam') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tempat --}}
                    <div class="space-y-2 md:col-span-1">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Lokasi / Tempat</label>
                        <input type="text" name="tempat" value="{{ old('tempat', $kegiatan->tempat) }}"
                               placeholder="Contoh: Aula Serbaguna"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('tempat') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Deskripsi Agenda</label>
                    <textarea name="deskripsi" rows="5" 
                              placeholder="Berikan rincian agenda atau instruksi tambahan untuk kegiatan ini..."
                              class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                    @error('deskripsi') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.kegiatan.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-orange-600 text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Update Agenda
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
