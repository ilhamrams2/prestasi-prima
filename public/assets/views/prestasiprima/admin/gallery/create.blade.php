@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 max-w-3xl mx-auto">

    <h1 class="text-2xl font-semibold mb-6">Tambah Galeri</h1>

    <form action="{{ route('prestasiprima.admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Tipe --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Tipe</label>
            <select name="type" id="type" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="image" {{ old('type')=='image'?'selected':'' }}>Foto</option>
                <option value="video" {{ old('type')=='video'?'selected':'' }}>Video YouTube</option>
            </select>
            @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Thumbnail --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Upload Thumbnail</label>
            <input type="file" name="thumbnail" accept="image/*" class="w-full">
            @error('thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Video URL --}}
        <div class="mb-4" id="video_url_field" style="display: none;">
            <label class="block text-gray-700 font-medium mb-1">URL Video YouTube</label>
            <input type="url" name="video_url" value="{{ old('video_url') }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description') }}</textarea>
        </div>

        {{-- Kategori --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Kategori</label>
            <select name="category" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ old('category')==$cat?'selected':'' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded font-medium hover:bg-indigo-500 transition">Simpan</button>
    </form>
</div>

<script>
    const typeSelect = document.getElementById('type');
    const videoField = document.getElementById('video_url_field');

    function toggleVideoField() {
        videoField.style.display = typeSelect.value==='video' ? 'block':'none';
    }
    typeSelect.addEventListener('change', toggleVideoField);
    toggleVideoField();
</script>
@endsection
