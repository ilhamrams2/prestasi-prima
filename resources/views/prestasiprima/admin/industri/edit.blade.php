@extends('layouts.admin')

@section('title', 'Edit Industri')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.industri.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Perbarui Data Partner</h1>
            <p class="text-sm text-slate-500 font-medium">Ubah informasi kerja sama industri atau perbarui identitas visual (logo).</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.industri.update', $industri->id) }}" method="POST" enctype="multipart/form-data" class="divide-y divide-slate-50">
            @csrf
            @method('PUT')

            <div class="p-8 space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Nama Industri --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Nama Perusahaan / Industri</label>
                        <input type="text" name="nama" id="industri_nama" value="{{ old('nama', $industri->nama) }}"
                               placeholder="Contoh: PT. Digital Solusi Indonesia"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('nama') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Slug Identitas (URL-Friendly)</label>
                        <input type="text" name="slug" id="industri_slug" value="{{ old('slug', $industri->slug) }}"
                               placeholder="ptux-digital-solusi"
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                        @error('slug') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Logo Upload --}}
                <div class="space-y-4">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Logo Perusahaan</label>
                    <div class="flex flex-col md:flex-row items-center gap-6 p-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] hover:border-orange-400 transition-colors group">
                        <div class="w-24 h-24 bg-white rounded-2xl flex-shrink-0 flex items-center justify-center shadow-sm overflow-hidden border border-slate-100 flex-col gap-1 relative p-4">
                            @if($industri->logo)
                                <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="max-w-full max-h-full object-contain">
                            @else
                                {{-- Icon Removed --}}
                            @endif
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h4 class="text-sm font-bold text-slate-800 mb-1">Ganti Logo Partner</h4>
                            <p class="text-xs text-slate-500 font-medium mb-4 leading-relaxed">Biarkan kosong jika tidak ingin mengubah logo.<br>Format: PNG, JPG, WEBP (Maks. 1MB).</p>
                            <input type="file" name="logo" 
                                   class="block w-full text-[11px] text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6B00] file:text-white hover:file:bg-[#e66000] transition-all cursor-pointer">
                        </div>
                    </div>
                    @error('logo') <span class="text-xs text-red-500 font-bold ml-1">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.industri.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-[#FF6B00] text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Update Partner
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('industri_nama').addEventListener('input', function() {
        const title = this.value;
        const slug = title.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('industri_slug').value = slug;
    });
</script>
@endsection
