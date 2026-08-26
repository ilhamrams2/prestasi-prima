@extends('layouts.admin')

@section('title', 'Edit Kampus Mitra PTN')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('prestasiprima.admin.lulusan-ptn.index') }}" 
               class="w-11 h-11 flex items-center justify-center rounded-2xl bg-white border border-slate-200 text-slate-600 hover:bg-orange-50 hover:text-[#FF6B00] hover:border-orange-200 transition-all shadow-sm">
                <i class="ri-arrow-left-line text-xl"></i>
            </a>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Edit Kampus Mitra PTN</h1>
                <p class="text-sm text-slate-500 font-medium">Perbarui logo dan informasi perguruan tinggi.</p>
            </div>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-3xl sm:rounded-[2.5rem] shadow-sm border border-slate-100 p-6 sm:p-8 md:p-10">
        <form action="{{ route('prestasiprima.admin.lulusan-ptn.update', $ptn->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                {{-- Nama Kampus & Singkatan --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Nama Lengkap Kampus / Universitas <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_kampus" value="{{ old('nama_kampus', $ptn->nama_kampus) }}" required
                               placeholder="Contoh: Universitas Indonesia"
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none">
                        @error('nama_kampus')
                            <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Singkatan / Kode
                        </label>
                        <input type="text" name="singkatan" value="{{ old('singkatan', $ptn->singkatan) }}"
                               placeholder="Contoh: UI"
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none uppercase font-mono">
                        @error('singkatan')
                            <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Upload Logo with Live Preview --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Logo Resmi Kampus
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                        {{-- Preview Box --}}
                        <div class="md:col-span-1">
                            <div class="w-full aspect-square bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl overflow-hidden flex flex-col items-center justify-center relative p-4" id="logoPreviewContainer">
                                <img id="logoPreviewImage" src="{{ $ptn->logo_url }}" alt="{{ $ptn->nama_kampus }}" class="max-w-full max-h-full object-contain">
                            </div>
                        </div>

                        {{-- File Input Details --}}
                        <div class="md:col-span-2 space-y-4">
                            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 space-y-3">
                                <div class="flex items-center gap-3">
                                    <i class="ri-file-upload-line text-2xl text-orange-500"></i>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-800">Ganti File Logo</h4>
                                        <p class="text-xs text-slate-400">Biarkan kosong jika tidak ingin mengubah logo.</p>
                                    </div>
                                </div>
                                <input type="file" name="logo" id="logoInput" accept="image/png,image/svg+xml,image/webp,image/jpeg,image/jpg"
                                       class="block w-full text-xs text-slate-500 file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6B00] file:text-white hover:file:bg-[#e66000] file:transition-colors file:cursor-pointer cursor-pointer">
                            </div>
                            <p class="text-[11px] text-slate-400 leading-relaxed italic">
                                💡 Format yang didukung: PNG, SVG, WEBP, JPG (Maksimal 10MB).
                            </p>
                        </div>
                    </div>
                    @error('logo')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Website URL & Display Order --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="sm:col-span-2 space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Website Resmi Kampus (Opsional)
                        </label>
                        <input type="url" name="link_website" value="{{ old('link_website', $ptn->link_website) }}"
                               placeholder="https://ui.ac.id"
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none">
                        @error('link_website')
                            <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Nomor Urutan Tampil
                        </label>
                        <input type="number" name="urutan" value="{{ old('urutan', $ptn->urutan) }}" min="1"
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none">
                        @error('urutan')
                            <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Status Aktif Toggle --}}
                <div class="p-4 rounded-2xl bg-orange-50/50 border border-orange-100 flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Tampilkan di Landing Page</h4>
                        <p class="text-xs text-slate-500">Logo kampus ini akan langsung aktif dan terlihat oleh pengunjung.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ old('is_active', $ptn->is_active) ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#FF6B00]"></div>
                    </label>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.lulusan-ptn.index') }}" 
                   class="w-full sm:w-auto px-6 py-3.5 rounded-2xl border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">
                    Batal
                </a>
                <button type="submit" 
                        class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-[#FF6B00] hover:bg-[#e66000] text-white font-bold text-sm transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95 text-center flex items-center justify-center gap-2">
                    <i class="ri-check-line text-lg"></i>
                    Perbarui Kampus
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('logoInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.getElementById('logoPreviewImage');
                previewImg.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
