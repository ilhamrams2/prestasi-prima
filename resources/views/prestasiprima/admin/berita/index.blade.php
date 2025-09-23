@extends('prestasiprima.index')

@section('title', 'Daftar Berita')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <h1 class="text-2xl font-bold mb-6">📋 Daftar Berita</h1>

    <a href="{{ route('admin.berita.create') }}" 
       class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
       ➕ Tambah Berita
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 mt-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse mt-6">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-3 border">Judul</th>
                <th class="p-3 border">Penulis</th>
                <th class="p-3 border">Tanggal</th>
                <th class="p-3 border text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $berita)
                <tr class="border hover:bg-gray-50">
                    <td class="p-3">{{ $berita->judul }}</td>
                    <td class="p-3">{{ $berita->penulis }}</td>
                    <td class="p-3">{{ $berita->created_at->format('d M Y') }}</td>
                    <td class="p-3 text-center">
                        <a href="{{ route('admin.berita.show', $berita->id) }}" class="text-blue-600">👁 Lihat</a> |
                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-yellow-600">✏ Edit</a> |
                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus berita ini?')" class="text-red-600">🗑 Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-3 text-center text-gray-500">Belum ada berita</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $beritas->links() }}
    </div>
</div>
@endsection
