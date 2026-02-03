@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
<div class="max-w-4xl mx-auto">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('prestasiprima.admin.gallery.index') }}" 
           class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Edit Media</h1>
            <p class="text-sm text-slate-500 font-medium">Perbarui informasi foto atau video pada galeri sekolah.</p>
        </div>
    </div>

    {{-- ================= FORM CARD ================= --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <form action="{{ route('prestasiprima.admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="divide-y divide-slate-50">
            @csrf
            @method('PUT')

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="p-6 bg-red-50/50 border-b border-red-100">
                    <div class="p-4 bg-white border-l-4 border-red-500 rounded-r-xl shadow-sm">
                        <p class="text-sm font-bold text-red-600 mb-1">Terjadi kesalahan input:</p>
                        <ul class="list-disc pl-5 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li class="text-xs text-red-500 font-medium">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="p-8 space-y-8">
                {{-- Judul --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Judul Media</label>
                    <input type="text" name="title" value="{{ old('title', $gallery->title) }}" 
                           placeholder="Masukkan nama atau judul dokumentasi..."
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Tipe --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Tipe Media</label>
                        <div class="relative">
                            <select name="type" id="type" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800 appearance-none" required>
                                <option value="image" {{ old('type', $gallery->type) == 'image' ? 'selected' : '' }}>📸 Foto / Gambar</option>
                                <option value="video" {{ old('type', $gallery->type) == 'video' ? 'selected' : '' }}>🎥 Video YouTube</option>
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xl"></i>
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 tracking-tight">Kategori</label>
                        <div class="relative">
                            <select name="category" 
                                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800 appearance-none" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ old('category', $gallery->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                            <i class="ri-arrow-down-s-line absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xl"></i>
                        </div>
                    </div>
                </div>

                {{-- Video URL --}}
                <div class="space-y-2 transition-all duration-500 overflow-hidden" id="video_url_field" style="display: none;">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Link Video YouTube</label>
                    <div class="relative">
                        <i class="ri-youtube-fill absolute left-5 top-1/2 -translate-y-1/2 text-red-600 text-xl"></i>
                        <input type="url" name="video_url" value="{{ old('video_url', $gallery->video_url) }}" 
                               placeholder="https://www.youtube.com/watch?v=..."
                               class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-5 py-3.5 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800">
                    </div>
                    {{-- Video Preview --}}
                    <div id="video_preview" class="mt-4">
                        @if($gallery->type === 'video' && $gallery->video_url)
                            @php
                                preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([\w\-]+)/", $gallery->video_url, $matches);
                                $videoId = $matches[1] ?? null;
                            @endphp
                            @if($videoId)
                                <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" class="w-64 rounded-2xl shadow-lg shadow-slate-200 border border-slate-100">
                            @endif
                        @endif
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 tracking-tight">Deskripsi Keterangan</label>
                    <textarea name="description" rows="4" 
                              placeholder="Berikan keterangan singkat mengenai foto/video ini..."
                              class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 focus:bg-white outline-none transition-all duration-300 font-medium text-slate-800">{{ old('description', $gallery->description) }}</textarea>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="p-8 bg-slate-50/50 flex flex-col md:flex-row justify-end gap-3">
                <a href="{{ route('prestasiprima.admin.gallery.index') }}" 
                   class="px-8 py-3.5 rounded-2xl bg-white border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all text-center">Batal</a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl bg-[#FF6B00] border border-orange-600 text-white font-bold text-sm hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 active:scale-95">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeSelect = document.getElementById('type');
        const videoField = document.getElementById('video_url_field');
        const videoPreview = document.getElementById('video_preview');
        const videoUrlInput = videoField.querySelector('input[name="video_url"]');

        function toggleVideoField() {
            if (typeSelect.value === 'video') {
                videoField.style.display = 'block';
            } else {
                videoField.style.display = 'none';
                videoPreview.innerHTML = '';
            }
        }
        
        typeSelect.addEventListener('change', toggleVideoField);
        toggleVideoField();

        videoUrlInput.addEventListener('input', function() {
            const url = this.value;
            const match = url.match(/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([\w\-]+)/);
            if(match && match[1]) {
                const videoId = match[1];
                videoPreview.innerHTML = `<img src="https://img.youtube.com/vi/${videoId}/hqdefault.jpg" class="w-64 rounded-2xl shadow-lg shadow-slate-200 border border-slate-100">`;
            } else {
                videoPreview.innerHTML = '';
            }
        });
    });
</script>
@endsection
