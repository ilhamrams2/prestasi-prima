@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 max-w-3xl mx-auto">

    <h1 class="text-2xl font-semibold mb-6">Edit Galeri</h1>

    <form action="{{ route('prestasiprima.admin.gallery.update', $gallery->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Type --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Tipe</label>
            <select name="type" id="type" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="image" {{ old('type', $gallery->type) == 'image' ? 'selected' : '' }}>Foto</option>
                <option value="video" {{ old('type', $gallery->type) == 'video' ? 'selected' : '' }}>Video YouTube</option>
            </select>
            @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Video URL --}}
        <div class="mb-4" id="video_url_field" style="display: none;">
            <label class="block text-gray-700 font-medium mb-1">URL Video YouTube</label>
            <input type="url" name="video_url" value="{{ old('video_url', $gallery->video_url) }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('video_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            {{-- Preview --}}
            <div id="video_preview" class="mt-3">
                @if($gallery->type === 'video' && $gallery->video_url)
                    @php
                        preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([\w\-]+)/", $gallery->video_url, $matches);
                        $videoId = $matches[1] ?? null;
                    @endphp
                    @if($videoId)
                        <img src="https://img.youtube.com/vi/{{ $videoId }}/hqdefault.jpg" class="w-48 mt-2 rounded shadow">
                    @endif
                @endif
            </div>
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
            <textarea name="description" rows="4" 
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description', $gallery->description) }}</textarea>
        </div>

        {{-- Kategori --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Kategori</label>
            <select name="category" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ old('category', $gallery->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" 
                class="bg-indigo-600 text-white px-5 py-2.5 rounded font-medium hover:bg-indigo-500 transition">
            Perbarui
        </button>
    </form>
</div>

{{-- Script untuk toggle video_url dan preview --}}
<script>
    const typeSelect = document.getElementById('type');
    const videoField = document.getElementById('video_url_field');
    const videoPreview = document.getElementById('video_preview');

    function updateVideoField() {
        if(typeSelect.value === 'video') {
            videoField.style.display = 'block';
        } else {
            videoField.style.display = 'none';
            videoPreview.innerHTML = '';
        }
    }

    typeSelect.addEventListener('change', updateVideoField);
    updateVideoField();

    // Preview thumbnail saat input video URL
    const videoUrlInput = videoField.querySelector('input[name="video_url"]');
    videoUrlInput.addEventListener('input', function() {
        const url = this.value;
        const match = url.match(/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([\w\-]+)/);
        if(match && match[1]) {
            const videoId = match[1];
            videoPreview.innerHTML = `<img src="https://img.youtube.com/vi/${videoId}/hqdefault.jpg" class="w-48 mt-2 rounded shadow">`;
        } else {
            videoPreview.innerHTML = '';
        }
    });
</script>
@endsection
