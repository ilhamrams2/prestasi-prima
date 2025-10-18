@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

  {{-- ================= HEADER ================= --}}
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Galeri</h1>

    <a href="{{ route('prestasiprima.admin.gallery.create') }}" 
       class="inline-flex items-center gap-2 bg-orange-600 hover:bg-orange-500 text-white px-4 py-2 rounded-lg font-medium transition">
      <i class="fa-solid fa-plus"></i> Tambah Galeri
    </a>
  </div>

  {{-- ================= FLASH MESSAGE ================= --}}
  @if (session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-200 rounded-lg">
      {{ session('success') }}
    </div>
  @endif

  {{-- ================= TABEL ================= --}}
  <div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-600">
      <thead class="text-xs uppercase bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-4 py-3 w-16">No</th>
          <th class="px-4 py-3">Thumbnail</th>
          <th class="px-4 py-3">Judul</th>
          <th class="px-4 py-3">Tipe</th>
          <th class="px-4 py-3">Deskripsi</th>
          <th class="px-4 py-3 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($galleries as $index => $gallery)
          <tr class="border-b hover:bg-gray-50 transition">
            <td class="px-4 py-3">{{ $loop->iteration }}</td>

            <td class="px-4 py-3">
              @if ($gallery->thumbnail)
                <img src="{{ asset('storage/' . $gallery->thumbnail) }}" alt="thumbnail" class="w-16 h-16 object-cover rounded-lg">
              @else
                <span class="text-gray-400 italic">Tidak ada</span>
              @endif
            </td>

            <td class="px-4 py-3 font-medium text-gray-800">{{ $gallery->title }}</td>

            <td class="px-4 py-3">
              @if ($gallery->video_url)
                <span class="bg-blue-100 text-blue-700 text-xs font-medium px-2 py-1 rounded">Video</span>
              @else
                <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2 py-1 rounded">Foto</span>
              @endif
            </td>

            <td class="px-4 py-3 text-gray-500 truncate max-w-xs">{{ Str::limit($gallery->description, 60) }}</td>

            <td class="px-4 py-3 text-right space-x-2">
              <a href="{{ route('prestasiprima.admin.gallery.edit', $gallery->id) }}" 
                 class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800">
                <i class="fa-solid fa-pen-to-square"></i> Edit
              </a>

              <form action="{{ route('prestasiprima.admin.gallery.destroy', $gallery->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                        class="inline-flex items-center gap-1 text-red-600 hover:text-red-800">
                  <i class="fa-solid fa-trash"></i> Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada data galeri.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- ================= PAGINATION ================= --}}
  <div class="mt-6">
    {{ $galleries->links() }}
  </div>
</div>
@endsection
