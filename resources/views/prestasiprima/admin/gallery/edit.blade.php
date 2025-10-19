@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 max-w-3xl mx-auto">

  <h1 class="text-3xl font-semibold text-gray-800 mb-8">Edit Galeri</h1>

  {{-- Flash message / Error --}}
  @if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700">
      <ul class="list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('prestasiprima.admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    {{-- Judul --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Judul</label>
      <input type="text" name="title" value="{{ old('title', $gallery->title) }}" 
             class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-300 focus:outline-none transition" required>
    </div>

    {{-- Tipe --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Tipe</label>
      <select name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-300 focus:outline-none transition" required>
        <option value="foto" {{ old('type', $gallery->video_url ? 'video' : 'foto') == 'foto' ? 'selected' : '' }}>Foto</option>
        <option value="video" {{ old('type', $gallery->video_url ? 'video' : 'foto') == 'video' ? 'selected' : '' }}>Video</option>
      </select>
    </div>

    {{-- Video URL --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">URL Video (jika tipe Video)</label>
      <input type="url" name="video_url" value="{{ old('video_url', $gallery->video_url) }}" 
             class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-300 focus:outline-none transition" placeholder="https://youtube.com/...">
    </div>

    {{-- Thumbnail --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Thumbnail</label>
      <input type="file" name="thumbnail" accept="image/*" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none">
      @if ($gallery->thumbnail)
        <img src="{{ asset('storage/' . $gallery->thumbnail) }}" class="w-32 h-32 object-cover rounded-lg mt-3 border border-gray-200">
      @endif
    </div>

    {{-- Deskripsi --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
      <textarea name="description" rows="6" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-gray-300 focus:outline-none transition" required>{{ old('description', $gallery->description) }}</textarea>
    </div>

    {{-- Tombol --}}
    <div class="flex justify-end gap-3">
      <a href="{{ route('prestasiprima.admin.gallery.index') }}" 
         class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition">Batal</a>
      <button type="submit" 
              class="px-5 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-white font-medium transition">Update</button>
    </div>

  </form>
</div>
@endsection
