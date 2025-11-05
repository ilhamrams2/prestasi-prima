@extends('layouts.admin')

@section('title', 'Edit Prestasi')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
  <h3 class="text-lg font-semibold text-gray-800 mb-4">Edit Prestasi</h3>

  <form action="{{ route('prestasiprima.admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @method('PUT')

    <div>
      <label class="block font-medium text-gray-700 mb-2">Judul</label>
      <input type="text" name="judul" value="{{ old('judul', $prestasi->judul) }}"
             class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none">
    </div>

    <div>
      <label class="block font-medium text-gray-700 mb-2">Deskripsi</label>
      <textarea name="deskripsi" rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
    </div>

    <div>
      <label class="block font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
      <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="Gambar" class="w-40 h-40 object-cover rounded-md mb-3">
      <input type="file" name="gambar" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none">
    </div>

    <div class="flex justify-end gap-3">
      <a href="{{ route('prestasiprima.admin.prestasi.index') }}"
         class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
        Batal
      </a>
      <button type="submit"
              class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-500 transition">
        Perbarui
      </button>
    </div>
  </form>
</div>
@endsection
