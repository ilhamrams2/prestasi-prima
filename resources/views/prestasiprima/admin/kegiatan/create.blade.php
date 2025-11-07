@extends('layouts.admin')

@section('title', 'Tambah Kegiatan')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 max-w-4xl mx-auto">

  {{-- ================= HEADER ================= --}}
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-semibold text-gray-800 tracking-tight">Tambah Kegiatan</h1>

  <a href="{{ route('prestasiprima.admin.kegiatan.index') }}"
       class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition text-sm font-medium">
      <i class="ri-arrow-left-line text-lg"></i>
      Kembali
    </a>
  </div>

  {{-- ================= FORM TAMBAH KEGIATAN ================= --}}
  <form action="{{ route('prestasiprima.admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- JUDUL --}}
    <div>
      <label for="judul" class="block text-gray-700 font-medium mb-2">Judul Kegiatan</label>
  <input type="text" id="judul" name="judul"
             class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-gray-600 focus:border-gray-600 transition"
             placeholder="Masukkan judul kegiatan" required>
      @error('judul')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- TANGGAL --}}
    <div>
      <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal</label>
  <input type="date" id="tanggal" name="tanggal"
             class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-gray-600 focus:border-gray-600 transition"
             required>
      @error('tanggal')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- JAM --}}
    <div>
      <label for="jam" class="block text-gray-700 font-medium mb-2">Jam</label>
  <input type="time" id="jam" name="jam"
             class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-gray-600 focus:border-gray-600 transition"
             required>
      @error('jam')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- TEMPAT --}}
    <div>
      <label for="tempat" class="block text-gray-700 font-medium mb-2">Tempat</label>
  <input type="text" id="tempat" name="tempat"
             class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-gray-600 focus:border-gray-600 transition"
             placeholder="Masukkan tempat kegiatan" required>
      @error('tempat')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- DESKRIPSI --}}
    <div>
      <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
      <textarea id="deskripsi" name="deskripsi" rows="5" 
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-gray-600 focus:border-gray-600 transition"
                placeholder="Tulis deskripsi kegiatan..." required></textarea>
      @error('deskripsi')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- TOMBOL SIMPAN --}}
    <div class="pt-4 flex justify-end gap-3">
  <a href="{{ route('prestasiprima.admin.kegiatan.index') }}"
         class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
        Batal
      </a>
  <button type="submit"
              class="px-6 py-2.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-white font-medium transition">
        Simpan Kegiatan
      </button>
    </div>
  </form>

</div>
@endsection
