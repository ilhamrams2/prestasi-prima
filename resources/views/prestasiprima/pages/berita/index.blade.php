@extends('prestasiprima.index')

@section('title', 'Berita Prestasi Prima')

@section('content')
<section class="bg-gray-50 relative z-10 pt-28 md:pt-36 pb-20">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    {{-- ================= BAGIAN ATAS: BERITA UTAMA + HOT NEWS ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      
      {{-- BERITA UTAMA (kiri) --}}
      <div class="lg:col-span-2">
        <div class="text-center mb-10" data-aos="fade-down">
          <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">
            Berita <span class="text-orange-600">Prestasi Prima</span>
          </h1>
          <p class="text-gray-500 max-w-2xl mx-auto">
            Informasi terbaru dan kegiatan sekolah dalam tampilan profesional dan modern.
          </p>
          <div class="mt-4 w-24 h-1 bg-orange-500 mx-auto rounded-full"></div>
        </div>

        {{-- FORM PENCARIAN --}}
        <form action="{{ route('berita.index') }}" method="GET" class="flex mb-8 shadow-md rounded-xl overflow-hidden" data-aos="fade-up">
          <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}" class="w-full px-4 py-3 border-none focus:ring-0 focus:outline-none">
          <button type="submit" class="bg-orange-600 text-white px-6 py-3 hover:bg-orange-500 transition">Cari</button>
        </form>

        {{-- BERITA UTAMA --}}
        @if($news->count() > 0)
          @php $first = $news->first(); @endphp
          <div class="mb-10 relative rounded-2xl overflow-hidden shadow-lg group" data-aos="zoom-in">
            <img src="{{ asset($first->thumbnail) }}" alt="{{ $first->title }}" class="w-full h-80 md:h-[450px] object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
            <div class="absolute bottom-6 left-6 text-white max-w-xl">
              <span class="bg-orange-600 text-xs font-semibold px-3 py-1 rounded-full">
                {{ $first->category->name ?? 'Umum' }}
              </span>
              <h2 class="text-3xl md:text-4xl font-bold mt-3 mb-2 leading-tight">{{ $first->title }}</h2>
              <p class="text-gray-200 text-sm mb-4 line-clamp-3">{{ Str::limit(strip_tags($first->content), 150) }}</p>
              <a href="{{ route('berita.detail', $first->slug) }}" class="inline-block bg-orange-500 hover:bg-orange-600 px-5 py-2 rounded-lg font-medium text-sm transition">
                Baca Selengkapnya
              </a>
            </div>
          </div>
        @endif
      </div>

      {{-- SIDEBAR (kanan) --}}
      <aside class="lg:col-span-1 space-y-8">

        {{-- HOT NEWS --}}
        @if($news->count() > 0)
          <div class="bg-white rounded-2xl shadow-md p-5" data-aos="fade-left">
            <h3 class="text-xl font-bold text-orange-600 border-b-2 border-orange-500 pb-2 mb-4">Hot News</h3>
            @php $hot = $news->first(); @endphp
            <a href="{{ route('berita.detail', $hot->slug) }}" class="block overflow-hidden rounded-xl">
              <img src="{{ asset($hot->thumbnail) }}" alt="{{ $hot->title }}" class="w-full h-40 object-cover rounded-lg mb-3">
              <h4 class="font-semibold text-gray-800 hover:text-orange-600 transition">{{ Str::limit($hot->title, 70) }}</h4>
            </a>
          </div>
        @endif

        {{-- AKSES CEPAT --}}
        <div class="bg-white rounded-2xl shadow-md p-5" data-aos="fade-left" data-aos-delay="100">
          <h3 class="text-xl font-bold text-orange-600 border-b-2 border-orange-500 pb-2 mb-4">Akses Cepat</h3>
          <ul class="space-y-3">
            @foreach($categories as $category)
              <li>
                <a href="{{ route('berita.index', ['category' => $category->slug]) }}" class="flex items-center justify-between px-4 py-2 rounded-lg border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">
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

    {{-- ================= BARIS KEDUA: 3 CARD LEBAR ================= --}}
    <div class="grid md:grid-cols-4 gap-6 mt-20 items-start">
      <div class="md:col-span-3 grid sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($news->skip(1)->take(3) as $item)
          <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300">
            <a href="{{ route('berita.detail', $item->slug) }}">
              <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-56 object-cover">
            </a>
            <div class="p-4">
              <span class="text-xs text-orange-600 font-semibold">{{ $item->category->name ?? 'Umum' }}</span>
              <h4 class="font-semibold text-gray-800 mt-2 line-clamp-2">{{ $item->title }}</h4>
              <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ Str::limit(strip_tags($item->content), 80) }}</p>
            </div>
          </div>
        @endforeach
      </div>

      {{-- VIDEO --}}
      <div class="md:col-span-1 flex flex-col justify-end space-y-6">
        @foreach($videos->take(2) as $video)
          @php
            $url = $video->video_url;
            if(Str::contains($url,'watch?v=')) $videoId = Str::after($url,'watch?v=');
            elseif(Str::contains($url,'shorts/')) $videoId = Str::after($url,'shorts/');
            elseif(Str::contains($url,'embed/')) $videoId = Str::after($url,'embed/');
            elseif(Str::contains($url,'youtu.be/')) $videoId = Str::after($url,'youtu.be/');
            else $videoId = $url;
            $videoId = Str::before($videoId,'&');
            $embedUrl = "https://www.youtube.com/embed/{$videoId}";
          @endphp
          <div class="rounded-xl overflow-hidden shadow-md bg-white hover:shadow-lg transition">
            <iframe src="{{ $embedUrl }}" title="{{ $video->title }}" class="w-full h-48" allowfullscreen loading="lazy"></iframe>
            <div class="p-3">
              <h3 class="font-semibold text-gray-900 text-sm line-clamp-2">{{ $video->title }}</h3>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- ================= BARIS KETIGA & KEEMPAT: CARD VARIASI ================= --}}
    <div class="mt-20 space-y-16">
      {{-- 3 KOLON --}}
      <div class="grid md:grid-cols-3 gap-8">
        @foreach($news->skip(4)->take(3) as $item)
          <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300">
            <a href="{{ route('berita.detail', $item->slug) }}">
              <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-44 object-cover">
            </a>
            <div class="p-4">
              <span class="text-xs text-orange-600 font-semibold">{{ $item->category->name ?? 'Umum' }}</span>
              <h4 class="font-semibold text-gray-800 mt-2 line-clamp-2">{{ $item->title }}</h4>
            </div>
          </div>
        @endforeach
      </div>

      {{-- 2 KOLON LEBAR --}}
      <div class="grid md:grid-cols-2 gap-8">
        @foreach($news->skip(7)->take(2) as $item)
          <div class="bg-white rounded-2xl shadow-md hover:shadow-xl overflow-hidden transition transform hover:-translate-y-1 duration-300">
            <a href="{{ route('berita.detail', $item->slug) }}">
              <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-64 object-cover">
            </a>
            <div class="p-6">
              <span class="text-xs text-orange-600 font-semibold">{{ $item->category->name ?? 'Umum' }}</span>
              <h4 class="font-bold text-gray-800 mt-3 text-lg line-clamp-2">{{ $item->title }}</h4>
              <p class="text-gray-500 text-sm mt-2 line-clamp-3">{{ Str::limit(strip_tags($item->content), 100) }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>

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
