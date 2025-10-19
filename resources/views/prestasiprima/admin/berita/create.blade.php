@extends('layouts.admin')

@section('title', isset($news) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 max-w-3xl mx-auto">

  <h1 class="text-3xl font-semibold text-gray-800 mb-8">
    {{ isset($news) ? 'Edit Berita' : 'Tambah Berita' }}
  </h1>

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

  <form action="{{ isset($news) ? route('prestasiprima.admin.berita.update', $news->id) : route('prestasiprima.admin.berita.store') }}" 
        method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if(isset($news))
        @method('PUT')
    @endif

    {{-- Judul --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Judul</label>
      <input type="text" name="title" 
             value="{{ old('title', $news->title ?? '') }}" 
             class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-gray-300 focus:outline-none transition" required>
    </div>

    {{-- Kategori --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Kategori</label>
      <select name="category_id" class="w-full border rounded-lg px-3 py-2" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" 
                  @if(old('category_id', $news->category_id ?? '') == $category->id) selected @endif>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Thumbnail --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Thumbnail</label>
      @if (!empty($news->thumbnail))
        <div class="mb-2">
          <img src="{{ asset($news->thumbnail) }}" alt="Thumbnail" class="w-32 h-20 object-cover rounded-lg">
        </div>
      @endif
      <input type="file" name="thumbnail" accept="image/*" 
             class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none">
      <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah thumbnail</p>
    </div>

    {{-- Konten --}}
    <div>
      <label class="block text-gray-700 font-medium mb-2">Konten</label>
      <textarea name="content" rows="8" 
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-gray-300 focus:outline-none transition" 
                required>{{ old('content', $news->content ?? '') }}</textarea>
    </div>

    {{-- Tombol --}}
    <div class="flex justify-end gap-3">
      <a href="{{ route('prestasiprima.admin.berita.index') }}" 
         class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition">Batal</a>
      <button type="submit" 
              class="px-5 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-white font-medium transition">
        {{ isset($news) ? 'Simpan Perubahan' : 'Simpan' }}
      </button>
    </div>

  </form>
</div>
@endsection
