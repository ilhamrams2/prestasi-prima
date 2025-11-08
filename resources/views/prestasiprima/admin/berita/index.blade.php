@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

  {{-- ================= HEADER ================= --}}
  <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <h1 class="text-3xl font-semibold text-gray-800 tracking-tight">Manajemen Berita</h1>

    <a href="{{ route('prestasiprima.admin.berita.create') }}"
       class="inline-flex items-center gap-2 bg-gray-800 hover:bg-gray-700 text-white px-5 py-2.5 rounded-lg font-medium transition duration-200">
      <i class="ri-add-line text-lg"></i>
      Tambah Berita
    </a>
  </div>

  {{-- ================= FLASH MESSAGE ================= --}}
  @if (session('success'))
    <div class="mb-5 p-4 bg-gray-50 border border-gray-200 rounded-lg flex items-center text-gray-700">
      <i class="ri-checkbox-circle-line text-green-500 text-xl mr-2"></i>
      {{ session('success') }}
    </div>
  @endif

  {{-- ================= TABEL BERITA ================= --}}
  <div class="overflow-x-auto">
    <table class="w-full text-sm text-left border-collapse">
      <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 uppercase text-xs font-medium">
        <tr>
          <th class="px-5 py-3 w-16">No</th>
          <th class="px-5 py-3">Thumbnail</th>
          <th class="px-5 py-3">Judul</th>
          <th class="px-5 py-3">Tanggal</th>
          <th class="px-5 py-3">Deskripsi</th>
          <th class="px-5 py-3 text-right">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($news as $index => $item)
          <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
            <td class="px-5 py-3 text-gray-700">{{ $loop->iteration }}</td>

            <td class="px-5 py-3">
              @if ($item->thumbnail)
                <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="thumbnail" 
                     class="w-16 h-16 object-cover rounded-md border border-gray-200">
              @else
                <span class="text-gray-400 italic">—</span>
              @endif
            </td>

            <td class="px-5 py-3 font-medium text-gray-800">{{ $item->title }}</td>

            <td class="px-5 py-3 text-gray-600 whitespace-nowrap">
              {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
            </td>

            <td class="px-5 py-3 text-gray-500 truncate max-w-xs">
              {{ Str::limit($item->description, 80) }}
            </td>

            <td class="px-5 py-3 text-right space-x-3">
              <a href="{{ route('prestasiprima.admin.berita.edit', $item->id) }}"
                 class="inline-flex items-center gap-1 text-gray-700 hover:text-gray-900 transition">
                <i class="ri-edit-box-line text-lg"></i> Edit
              </a>

              <form action="{{ route('prestasiprima.admin.berita.destroy', $item->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        onclick="return confirm('Yakin ingin menghapus berita ini?')"
                        class="inline-flex items-center gap-1 text-gray-500 hover:text-red-600 transition">
                  <i class="ri-delete-bin-line text-lg"></i> Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-5 py-8 text-center text-gray-400 italic">Belum ada berita yang tersedia.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- ================= PAGINATION ================= --}}
  <div class="mt-8 flex justify-end">
    {{ $news->links() }}
  </div>
</div>
@endsection
