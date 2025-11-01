@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')

<div class="bg-white shadow rounded-2xl p-6">
    {{-- Judul --}}
    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $news->title }}</h1>

    {{-- Kategori dan Tanggal --}}
    <div class="flex items-center text-gray-500 text-sm mb-4 gap-4">
        <span>Kategori: <strong>{{ $news->category->name ?? '-' }}</strong></span>
        <span>Dibuat: {{ $news->created_at->translatedFormat('d M Y') }}</span>
        @if($news->updated_at != $news->created_at)
            <span>Diperbarui: {{ $news->updated_at->translatedFormat('d M Y') }}</span>
        @endif
    </div>

    {{-- Thumbnail --}}
    @if($news->thumbnail)
        <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->title }}" class="w-full max-h-96 object-cover rounded-lg mb-4">
    @endif

    {{-- Konten --}}
    <div class="prose prose-sm sm:prose lg:prose-lg max-w-full text-gray-700">
        {!! nl2br(e($news->content)) !!}
    </div>

    {{-- Tombol Kembali --}}
<div class="mt-6">
    <a href="{{ route('prestasiprima.admin.berita.index') }}" 
       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
       Kembali ke Daftar Berita
    </a>
</div>

</div>

@endsection
