@extends('prestasiprima.index')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <h1 class="text-2xl font-bold mb-6">✏ Edit Berita</h1>

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" value="{{ $berita->judul }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Isi Berita</label>
            <textarea name="isi" rows="6" class="w-full border p-2 rounded" required>{{ $berita->isi }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Gambar (opsional)</label><br>
            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="gambar" class="w-32 mb-2">
            @endif
            <input type="file" name="gambar" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block font-semibold">Penulis</label>
            <input type="text" name="penulis" value="{{ $berita->penulis }}" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">💾 Update</button>
    </form>
</div>
@endsection
