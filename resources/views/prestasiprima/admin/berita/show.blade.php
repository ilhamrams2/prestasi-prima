@extends('prestasiprima.index')

@section('title', 'Detail Berita')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <h1 class="text-2xl font-bold mb-4">{{ $berita->judul }}</h1>
    <p class="text-sm text-gray-500 mb-4">🖊 {{ $berita->penulis }} | 📅 {{ $berita->created_at->format('d M Y') }}</p>

    @if($berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="gambar" class="w-full mb-6 rounded">
    @endif

    <div class="prose">
        {!! nl2br(e($berita->isi)) !!}
    </div>

    <a href="{{ route('admin.berita.index') }}" class="inline-block mt-6 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">⬅ Kembali</a>
</div>
@endsection
