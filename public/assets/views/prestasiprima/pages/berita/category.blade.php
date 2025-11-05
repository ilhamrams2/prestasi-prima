@extends('prestasiprima.index')

@section('title', 'Kategori: ' . $category->name)

@section('content')
<section class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    <!-- HEADER -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-3">
        Kategori: {{ $category->name }}
      </h1>
      <p class="text-gray-500">Kumpulan berita dengan kategori ini</p>
    </div>

    @if($news->count())
      <div class="grid md:grid-cols-3 gap-8">
        @foreach($news as $item)
          <a href="{{ route('berita.detail', $item->slug) }}" 
             class="bg-gray-50 rounded-2xl shadow-sm hover:shadow-md overflow-hidden group transition-all">
            <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                 alt="{{ $item->title }}" 
                 class="h-56 w-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="p-6">
              <h3 class="text-xl font-semibold text-gray-900 group-hover:text-orange-600 transition">
                {{ Str::limit($item->title, 80) }}
              </h3>
              <p class="mt-2 text-gray-500 text-sm">
                {{ Str::limit($item->excerpt, 120) }}
              </p>
            </div>
          </a>
        @endforeach
      </div>

      <div class="mt-12">
        {{ $news->links() }}
      </div>
    @else
      <p class="text-center text-gray-500">Belum ada berita untuk kategori ini.</p>
    @endif

  </div>
</section>
@endsection
