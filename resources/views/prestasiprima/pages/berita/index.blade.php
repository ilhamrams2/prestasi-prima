@extends('prestasiprima.index')

@section('title', 'Berita Prestasi Prima')

@section('content')
<!-- ===================== SECTION BERITA ===================== -->
<section class="bg-gray-50 relative z-10 pt-28 md:pt-36 pb-20">
  <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 lg:grid-cols-3 gap-10">

    <!-- =================== KOLOM KIRI: DAFTAR BERITA =================== -->
    <div class="lg:col-span-2">

      <!-- ====== HEADER ====== -->
      <div class="text-center mb-10" data-aos="fade-down">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">
          Berita <span class="text-orange-600">Prestasi Prima</span>
        </h1>
        <p class="text-gray-500 max-w-2xl mx-auto">
          Informasi terbaru dan kegiatan sekolah dalam tampilan profesional dan modern.
        </p>
        <div class="mt-4 w-24 h-1 bg-orange-500 mx-auto rounded-full"></div>
      </div>

      <!-- ====== FORM PENCARIAN ====== -->
      <form action="{{ route('berita.index') }}" method="GET" class="flex mb-8 shadow-md rounded-xl overflow-hidden" data-aos="fade-up">
        <input type="text" name="search" placeholder="Cari berita..." 
               value="{{ request('search') }}" 
               class="w-full px-4 py-3 border-none focus:ring-0 focus:outline-none">
        <button type="submit" class="bg-orange-600 text-white px-6 py-3 hover:bg-orange-500 transition">Cari</button>
      </form>

      <!-- ====== DAFTAR BERITA DENGAN POLA DINAMIS ====== -->
      @if($news->count() > 0)
        @foreach($news->chunk(7) as $chunk)
          @php
            // urutan berita di setiap chunk:
            // [0] besar, [1-3] kecil, [4] besar, [5-6] kecil
          @endphp

          <!-- ====== BERITA BESAR PERTAMA ====== -->
          @if(isset($chunk[0]))
            <div class="mb-10 relative rounded-2xl overflow-hidden shadow-lg group" data-aos="zoom-in" data-aos-duration="800">
              <img src="{{ asset('storage/' . $chunk[0]->thumbnail) }}" 
                   alt="{{ $chunk[0]->title }}" 
                   class="w-full h-80 md:h-[450px] object-cover transition-transform duration-700 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
              <div class="absolute bottom-6 left-6 text-white max-w-xl">
                <span class="bg-orange-600 text-xs font-semibold px-3 py-1 rounded-full">
                  {{ $chunk[0]->category->name ?? 'Umum' }}
                </span>
                <h2 class="text-3xl md:text-4xl font-bold mt-3 mb-2 leading-tight">
                  {{ $chunk[0]->title }}
                </h2>
                <p class="text-gray-200 text-sm mb-4 line-clamp-3">
                  {{ Str::limit(strip_tags($chunk[0]->content), 150) }}
                </p>
                <a href="{{ route('berita.detail', $chunk[0]->slug) }}"
                   class="inline-block bg-orange-500 hover:bg-orange-600 px-5 py-2 rounded-lg font-medium text-sm transition">
                  Baca Selengkapnya
                </a>
              </div>
            </div>
          @endif

          <!-- ====== 3 BERITA KECIL BERJEJER ====== -->
          @if(isset($chunk[1]))
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-14" data-aos="fade-up" data-aos-delay="200">
              @foreach($chunk->slice(1, 3) as $item)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300">
                  <a href="{{ route('berita.detail', $item->slug) }}">
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                         alt="{{ $item->title }}" 
                         class="w-full h-40 object-cover">
                  </a>
                  <div class="p-4">
                    <span class="text-xs text-orange-600 font-semibold">{{ $item->category->name ?? 'Umum' }}</span>
                    <h4 class="font-semibold text-gray-800 mt-2 line-clamp-2">
                      {{ $item->title }}
                    </h4>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-3">
                      {{ Str::limit(strip_tags($item->content), 100) }}
                    </p>
                    <a href="{{ route('berita.detail', $item->slug) }}" 
                       class="text-orange-600 text-sm font-medium mt-3 inline-block">Selengkapnya →</a>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          <!-- ====== 1 BERITA BESAR + 2 KECIL DI BAWAHNYA ====== -->
          @if(isset($chunk[4]))
            <div class="mb-10 bg-white rounded-2xl overflow-hidden shadow-lg group flex flex-col md:flex-row" data-aos="fade-left" data-aos-duration="700">
              <img src="{{ asset('storage/' . $chunk[4]->thumbnail) }}" 
                   alt="{{ $chunk[4]->title }}" 
                   class="w-full md:w-2/3 h-72 object-cover transition group-hover:scale-105 duration-500">
              <div class="p-6 flex flex-col justify-center md:w-1/3">
                <span class="text-orange-600 text-xs font-semibold mb-2">
                  {{ $chunk[4]->category->name ?? 'Umum' }}
                </span>
                <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition">
                  {{ $chunk[4]->title }}
                </h3>
                <p class="text-gray-600 line-clamp-3">
                  {{ Str::limit(strip_tags($chunk[4]->content), 120) }}
                </p>
                <a href="{{ route('berita.detail', $chunk[4]->slug) }}" 
                   class="text-orange-600 text-sm font-medium mt-3">Baca Selengkapnya →</a>
              </div>
            </div>
          @endif

          @if(isset($chunk[5]))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-14" data-aos="fade-up" data-aos-delay="200">
              @foreach($chunk->slice(5, 2) as $small)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300">
                  <a href="{{ route('berita.detail', $small->slug) }}">
                    <img src="{{ asset('storage/' . $small->thumbnail) }}" 
                         alt="{{ $small->title }}" 
                         class="w-full h-48 object-cover">
                  </a>
                  <div class="p-4">
                    <h4 class="font-semibold text-gray-800 mt-1 line-clamp-2">{{ $small->title }}</h4>
                    <p class="text-gray-500 text-sm mt-2 line-clamp-3">{{ Str::limit(strip_tags($small->content), 100) }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        @endforeach
      @else
        <div class="text-center py-20 bg-white rounded-xl shadow" data-aos="fade-up">
          <p class="text-gray-500 text-lg">Belum ada berita yang tersedia.</p>
        </div>
      @endif

      <!-- ====== PAGINATION ====== -->
      <div class="mt-12 flex items-center justify-center gap-2" data-aos="fade-up">
        {{ $news->links('pagination::tailwind') }}
      </div>
    </div>

    <!-- =================== KOLOM KANAN: SIDEBAR =================== -->
    <aside class="lg:col-span-1 space-y-8">

      <!-- ====== HOT NEWS ====== -->
      @if($news->count() > 0)
        <div class="bg-white rounded-2xl shadow-md p-5" data-aos="fade-left">
          <h3 class="text-xl font-bold text-orange-600 border-b-2 border-orange-500 pb-2 mb-4">Hot News</h3>
          @php $hot = $news->first(); @endphp
          <a href="{{ route('berita.detail', $hot->slug) }}" class="block overflow-hidden rounded-xl">
            <img src="{{ asset('storage/' . $hot->thumbnail) }}" 
                 alt="{{ $hot->title }}" 
                 class="w-full h-40 object-cover rounded-lg mb-3">
            <h4 class="font-semibold text-gray-800 hover:text-orange-600 transition">
              {{ Str::limit($hot->title, 70) }}
            </h4>
          </a>
        </div>
      @endif

      <!-- ====== AKSES CEPAT ====== -->
      <div class="bg-white rounded-2xl shadow-md p-5" data-aos="fade-left" data-aos-delay="100">
        <h3 class="text-xl font-bold text-orange-600 border-b-2 border-orange-500 pb-2 mb-4">Akses Cepat</h3>
        <ul class="space-y-3">
          @foreach($categories as $category)
            <li>
              <a href="{{ route('berita.index', ['category' => $category->slug]) }}" 
                 class="flex items-center justify-between px-4 py-2 rounded-lg border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">
                <span>{{ $category->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </aside>
  </div>
</section>

<!-- ====== SCRIPT ANIMASI AOS ====== -->
@push('scripts')
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true,
      offset: 80,
    });
  </script>
@endpush
@endsection
