@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="bg-white rounded-xl shadow p-6 max-w-3xl mx-auto">

  <h1 class="text-2xl font-bold mb-6">Edit Berita</h1>

  {{-- Flash message --}}
  @if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-200 rounded-lg">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('prestasiprima.admin.berita.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    {{-- Judul --}}
    <div>
      <label class="block font-medium mb-1">Judul</label>
      <input type="text" name="title" value="{{ old('title', $news->title) }}" 
             class="w-full border rounded-lg px-3 py-2" required>
    </div>

    {{-- Kategori --}}
    <div>
      <label class="block font-medium mb-1">Kategori</label>
      <select name="category_id" class="w-full border rounded-lg px-3 py-2" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id', $news->category_id) == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Thumbnail --}}
    <div>
      <label class="block font-medium mb-1">Thumbnail</label>
      <input type="file" name="thumbnail" accept="image/*" class="w-full">
      @if ($news->thumbnail)
        <img src="{{ asset('storage/' . $news->thumbnail) }}" class="w-32 h-32 object-cover rounded-lg mt-2">
      @endif
    </div>

    {{-- Konten --}}
    <div>
      <label class="block font-medium mb-1">Konten</label>
      <textarea name="content" rows="8" class="w-full border rounded-lg px-3 py-2" required>{{ old('content', $news->content) }}</textarea>
    </div>

    {{-- Submit --}}
    <div class="flex justify-end">
      <a href="{{ route('prestasiprima.admin.berita.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 mr-2">Batal</a>
      <button type="submit" class="px-4 py-2 rounded-lg bg-orange-600 hover:bg-orange-500 text-white font-medium">Update</button>
    </div>

  </form>
</div>
@endsection
