@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

  {{-- ================= HEADER ================= --}}
  <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <h1 class="text-3xl font-semibold text-gray-800 tracking-tight">Manajemen Galeri</h1>

    <a href="{{ route('prestasiprima.admin.gallery.create') }}"
       class="inline-flex items-center gap-2 bg-gray-800 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg font-medium transition duration-200">
      <i class="ri-add-line text-lg"></i>
      Tambah Galeri
    </a>
  </div>

  {{-- ================= FLASH MESSAGE ================= --}}
  @if (session('success'))
    <div class="mb-5 p-4 bg-gray-50 border border-gray-200 rounded-lg flex items-center text-gray-700">
      <i class="ri-checkbox-circle-line text-green-500 text-xl mr-2"></i>
      {{ session('success') }}
    </div>
  @endif

  {{-- ================= GRID GALERI ================= --}}
  @if ($galleries->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach ($galleries as $gallery)
        <div class="bg-gray-50 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition overflow-hidden flex flex-col group">

          {{-- Thumbnail --}}
          <div class="relative h-48 overflow-hidden">
            @if ($gallery->thumbnail)
              <img src="{{ Str::startsWith($gallery->thumbnail, ['http://','https://']) ? $gallery->thumbnail : asset('storage/' . $gallery->thumbnail) }}" 
     alt="Thumbnail" 
     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
<img src="{{ Str::startsWith($gallery->thumbnail, ['http://','https://']) 
             ? $gallery->thumbnail 
             : asset('storage/' . $gallery->thumbnail) }}" 
     alt="Thumbnail" 
     onerror="this.src='{{ asset('images/no-thumbnail.jpg') }}'"
     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

            @else
              <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-400 text-sm">
                Tidak ada gambar
              </div>
            @endif

            {{-- Badge Tipe --}}
            <span class="absolute top-3 left-3 px-2 py-1 text-xs font-semibold rounded bg-gray-200 text-gray-700">
              {{ $gallery->video_url ? 'Video' : 'Foto' }}
            </span>
          </div>

          {{-- Konten --}}
          <div class="flex flex-col flex-1 p-4">
            <h3 class="font-medium text-gray-800 mb-1 line-clamp-2">
              {{ $gallery->title }}
            </h3>

            {{-- Kategori --}}
            <p class="text-sm text-orange-500 mb-1 font-medium">
              {{ $gallery->category ?? 'Tanpa Kategori' }}
            </p>

            {{-- Deskripsi --}}
            <p class="text-sm text-gray-500 mb-3 line-clamp-3">
              {{ Str::limit($gallery->description, 100) }}
            </p>

            {{-- Tombol Aksi --}}
            <div class="mt-auto flex items-center justify-between pt-3 border-t border-gray-100">
              <a href="{{ route('prestasiprima.admin.gallery.edit', $gallery->id) }}" 
                 class="inline-flex items-center gap-1 text-gray-700 hover:text-gray-900 text-sm font-medium transition">
                <i class="ri-edit-box-line text-lg"></i> Edit
              </a>

              <form action="{{ route('prestasiprima.admin.gallery.destroy', $gallery->id) }}" method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="inline-flex items-center gap-1 text-gray-500 hover:text-red-600 text-sm font-medium transition">
                  <i class="ri-delete-bin-line text-lg"></i> Hapus
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="mt-8 flex justify-end">
      {{ $galleries->links() }}
    </div>
  @else
    <div class="text-center py-16 text-gray-400 italic">
      <i class="ri-image-2-line text-4xl mb-3"></i>
      <p>Belum ada data galeri.</p>
    </div>
  @endif
</div>
@endsection
