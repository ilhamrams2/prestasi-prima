@extends('prestasiprima.index')

@section('title', 'Berita Prestasi Prima')

@section('content')
<section class="bg-gray-50 py-16">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    <!-- ================= HEADER ================= -->
    <div class="text-center mb-16">
      <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
        Berita <span class="text-orange-600">Terbaru</span>
      </h1>
      <p class="text-gray-500 max-w-2xl mx-auto">
        Kumpulan informasi terbaru dan kegiatan dari Sekolah Prestasi Prima.
      </p>
      <div class="mt-4 w-24 h-1 bg-orange-500 mx-auto rounded-full"></div>
    </div>

    <!-- ================= GRID BERITA ================= -->
    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($news as $item)
        <a href="{{ route('berita.detail', $item->slug) }}" 
           class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
          
          <!-- Thumbnail -->
          <div class="relative overflow-hidden">
            <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                 alt="{{ $item->title }}" 
                 class="w-full h-60 object-cover transition-transform duration-500 group-hover:scale-110">
            <span class="absolute top-4 left-4 bg-orange-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
              {{ $item->category->name ?? 'Umum' }}
            </span>
          </div>

          <!-- Konten -->
          <div class="p-6">
            <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">
              {{ Str::limit($item->title, 80) }}
            </h3>
            <p class="text-gray-500 text-sm leading-relaxed mb-4">
              {{ Str::limit($item->excerpt ?? strip_tags($item->content), 110) }}
            </p>
            <div class="flex items-center justify-between text-sm text-gray-400">
              <span>{{ $item->created_at->format('d M Y') }}</span>
              <span class="text-orange-500 font-medium group-hover:underline">Selengkapnya →</span>
            </div>
          </div>

        </a>
      @endforeach
    </div>

    <!-- ================= PAGINATION ================= -->
    <div class="mt-16 flex justify-center">
      {{ $news->links() }}
    </div>

  </div>
</section>
@endsection
