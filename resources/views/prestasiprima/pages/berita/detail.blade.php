@extends('prestasiprima.index')

@section('title', $news->title ?? 'Detail Berita')

@section('content')
<section class="bg-gray-50 relative z-10 pt-28 md:pt-36 pb-20">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

      {{-- ================= BAGIAN UTAMA ================= --}}
      <div class="lg:col-span-2">

        {{-- Judul & Info --}}
        <div class="mb-8" data-aos="fade-down">
          <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">
            {{ $news->title }}
          </h1>
          <div class="flex items-center space-x-4 text-gray-500 text-sm">
            <span>{{ $news->category->name ?? 'Umum' }}</span>
            <span>•</span>
            <span>{{ $news->created_at->format('d M Y') }}</span>
          </div>
        </div>

        {{-- Thumbnail --}}
        <div class="mb-8" data-aos="fade-up">
          <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-[450px] object-cover rounded-2xl shadow-md">
        </div>

        {{-- Konten --}}
        <div class="prose max-w-none text-gray-700" data-aos="fade-up">
          {!! $news->content !!}
        </div>

        {{-- Berita Terkait --}}
        @if($related->count() > 0)
          <div class="mt-12" data-aos="fade-up">
            <h3 class="text-xl font-bold text-orange-600 mb-6">Berita Terkait</h3>
            <div class="grid md:grid-cols-2 gap-6">
              @foreach($related as $item)
                <a href="{{ route('berita.detail', $item->slug) }}" class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300">
                  <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover">
                  <div class="p-4">
                    <span class="text-xs text-orange-600 font-semibold">{{ $item->category->name ?? 'Umum' }}</span>
                    <h4 class="font-semibold text-gray-800 mt-2 line-clamp-2">{{ $item->title }}</h4>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        @endif

      </div>

      {{-- ================= SIDEBAR ================= --}}
      <aside class="lg:col-span-1 space-y-8">

        {{-- HOT NEWS --}}
        @if($hotNews->count() > 0)
          <div class="bg-white rounded-2xl shadow-md p-5" data-aos="fade-left">
            <h3 class="text-xl font-bold text-orange-600 border-b-2 border-orange-500 pb-2 mb-4">Hot News</h3>
            @foreach($hotNews as $item)
              <a href="{{ route('berita.detail', $item->slug) }}" class="block overflow-hidden rounded-xl mb-4">
                <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-32 object-cover rounded-lg mb-2">
                <h4 class="font-semibold text-gray-800 hover:text-orange-600 transition line-clamp-2">{{ $item->title }}</h4>
              </a>
            @endforeach
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
