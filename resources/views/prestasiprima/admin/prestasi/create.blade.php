@extends('layouts.admin')

@section('title', 'Tambah Prestasi Siswa')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('prestasiprima.admin.prestasi.index') }}" 
               class="w-11 h-11 flex items-center justify-center rounded-2xl bg-white border border-slate-200 text-slate-600 hover:bg-orange-50 hover:text-[#FF6B00] hover:border-orange-200 transition-all shadow-sm">
                <i class="ri-arrow-left-line text-xl"></i>
            </a>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Prestasi Siswa</h1>
                <p class="text-sm text-slate-500 font-medium">Unggah poster penghargaan dan informasi prestasi siswa.</p>
            </div>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-3xl sm:rounded-[2.5rem] shadow-sm border border-slate-100 p-6 sm:p-8 md:p-10">
        <form action="{{ route('prestasiprima.admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="space-y-6">
                {{-- Judul Prestasi --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Judul Pencapaian / Kejuaraan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="judul" value="{{ old('judul') }}" required
                           placeholder="Contoh: Juara 1 LKS Tingkat Nasional Bidang IT Network 2024"
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none">
                    @error('judul')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Upload Poster Gambar with Live Preview --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Foto / Poster Penghargaan <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                        {{-- Preview Box --}}
                        <div class="md:col-span-1">
                            <div class="w-full aspect-[3/4] bg-slate-50 border-2 border-dashed border-slate-200 rounded-2xl overflow-hidden flex flex-col items-center justify-center relative group" id="posterPreviewContainer">
                                <img id="posterPreviewImage" src="#" alt="Preview Poster" class="w-full h-full object-cover hidden">
                                <div id="posterPlaceholder" class="text-center p-4">
                                    <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-image-add-line text-2xl"></i>
                                    </div>
                                    <p class="text-xs font-bold text-slate-700">Preview Poster</p>
                                    <p class="text-[10px] text-slate-400 mt-1">Rasio 3:4 direkomendasikan</p>
                                </div>
                            </div>
                        </div>

                        {{-- File Input Details --}}
                        <div class="md:col-span-2 space-y-4">
                            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 space-y-3">
                                <div class="flex items-center gap-3">
                                    <i class="ri-file-upload-line text-2xl text-orange-500"></i>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-800">Pilih File Poster</h4>
                                        <p class="text-xs text-slate-400">Format: JPG, PNG, WEBP (Maksimal 15MB)</p>
                                    </div>
                                </div>
                                <input type="file" name="gambar" id="gambarInput" accept="image/jpeg,image/png,image/webp,image/jpg" required
                                       class="block w-full text-xs text-slate-500 file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6B00] file:text-white hover:file:bg-[#e66000] file:transition-colors file:cursor-pointer cursor-pointer">
                            </div>
                            <p class="text-[11px] text-slate-400 leading-relaxed italic">
                                💡 <strong>Tips:</strong> Gunakan poster vertikal (orientasi potret) agar tampilan kartu di carousel landing page tampak tajam, simetris, dan estetis.
                            </p>
                        </div>
                    </div>
                    @error('gambar')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi Prestasi --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Deskripsi / Rincian Penghargaan (Opsional)
                    </label>
                    <textarea name="deskripsi" rows="4"
                              placeholder="Tuliskan nama siswa, tingkatan kejuaraan (Kota/Provinsi/Nasional), instansi penyelenggara, atau catatan penting lainnya..."
                              class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none leading-relaxed">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.prestasi.index') }}" 
                   class="w-full sm:w-auto px-6 py-3.5 rounded-2xl border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">
                    Batal
                </a>
                <button type="submit" 
                        class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-[#FF6B00] hover:bg-[#e66000] text-white font-bold text-sm transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95 text-center flex items-center justify-center gap-2">
                    <i class="ri-check-line text-lg"></i>
                    Simpan Prestasi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.getElementById('posterPreviewImage');
                const placeholder = document.getElementById('posterPlaceholder');
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
