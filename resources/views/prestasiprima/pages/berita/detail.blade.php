@extends('prestasiprima.index')

@section('title', $news->title)

@section('content')
<section class="bg-white py-20">
  <div class="max-w-4xl mx-auto px-4 md:px-8">

    <!-- HEADER -->
    <div class="mb-10 text-center">
      <h1 class="text-4xl font-bold text-gray-900 mb-3">{{ $news->title }}</h1>
      <p class="text-gray-400 text-sm">
        {{ $news->created_at->format('d M Y') }} · 
        <span class="text-orange-600 font-medium">{{ $news->category->name ?? 'Umum' }}</span>
      </p>
    </div>

    <!-- GAMBAR -->
    <img src="{{ asset('storage/' . $news->thumbnail) }}" 
         alt="{{ $news->title }}" 
         class="rounded-2xl shadow-md mb-10 w-full object-cover">

    <!-- KONTEN BERITA -->
    <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
      {!! $news->content !!}
    </article>

    <!-- KEMBALI -->
    <div class="mt-10 text-center">
      <a href="{{ route('berita.index') }}" 
         class="inline-block bg-orange-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-orange-700 transition">
        ← Kembali ke Berita
      </a>
    </div>

  </div>
</section>
@endsection
