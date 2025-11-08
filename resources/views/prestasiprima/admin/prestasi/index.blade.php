@extends('layouts.admin')

@section('title', 'Manajemen Prestasi')

@section('content')
<div class="flex justify-between items-center mb-6">
  <h3 class="text-lg font-semibold text-gray-800">Daftar Prestasi Siswa</h3>
  <a href="{{ route('prestasiprima.admin.prestasi.create') }}"
     class="inline-flex items-center gap-2 bg-orange-600 hover:bg-orange-500 text-white px-4 py-2 rounded-lg transition">
    <i class="ri-add-line text-lg"></i> Tambah Prestasi
  </a>
</div>

@if (session('success'))
  <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-4">
    {{ session('success') }}
  </div>
@endif

<div class="overflow-x-auto bg-white rounded-lg shadow">
  <table class="min-w-full divide-y divide-gray-200 text-sm">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left font-medium text-gray-700">No</th>
        <th class="px-6 py-3 text-left font-medium text-gray-700">Gambar</th>
        <th class="px-6 py-3 text-left font-medium text-gray-700">Judul</th>
        <th class="px-6 py-3 text-left font-medium text-gray-700">Deskripsi</th>
        <th class="px-6 py-3 text-center font-medium text-gray-700">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @forelse ($prestasis as $index => $prestasi)
        <tr class="hover:bg-gray-50 transition">
          <td class="px-6 py-4">{{ $index + 1 }}</td>
          <td class="px-6 py-4">
            <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="Prestasi" class="w-16 h-16 object-cover rounded-md">
          </td>
          <td class="px-6 py-4 font-semibold text-gray-800">{{ $prestasi->judul }}</td>
          <td class="px-6 py-4 text-gray-600 truncate max-w-xs">{{ Str::limit($prestasi->deskripsi, 60) }}</td>
          <td class="px-6 py-4 text-center space-x-2">
            <a href="{{ route('prestasiprima.admin.prestasi.edit', $prestasi->id) }}"
               class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition">
              <i class="ri-pencil-line text-lg"></i>
            </a>
            <form action="{{ route('prestasiprima.admin.prestasi.destroy', $prestasi->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Yakin ingin menghapus prestasi ini?')"
                      class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition">
                <i class="ri-delete-bin-line text-lg"></i>
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center text-gray-500 py-6">Belum ada data prestasi.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
