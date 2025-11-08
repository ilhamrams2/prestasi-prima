@extends('prestasiprima.index')
@section('title', 'Berita Prestasi Prima')

@section('content')

@php
  $resolveLocalThumbnail = function (?string $videoId, ?string $fallback = null) {
    $candidates = [];

    if ($videoId) {
      $candidates[] = "assets/images/video-thumbnails/{$videoId}.webp";
      $candidates[] = "assets/images/video-thumbnails/{$videoId}.jpg";
      $candidates[] = "assets/images/video-thumbnails/{$videoId}.png";
    }

    if ($fallback && !\Illuminate\Support\Str::startsWith($fallback, ['http://', 'https://'])) {
      $candidates[] = ltrim($fallback, '/');
    }

    foreach ($candidates as $candidate) {
      if (file_exists(public_path($candidate))) {
        return $candidate;
      }
    }

    return null;
  };
@endphp
<section class="bg-gray-50 relative z-10 pt-28 md:pt-36 pb-20">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    {{-- ================= BAGIAN ATAS ================= --}}
    <div class="text-center mb-10" data-aos="fade-down">
      <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">
        Berita <span class="text-orange-600">Prestasi Prima</span>
      </h1>
      <p class="text-gray-500 max-w-2xl mx-auto">
        Informasi terbaru dan kegiatan sekolah dalam tampilan profesional dan modern.
      </p>
      <div class="mt-4 w-24 h-1 bg-orange-500 mx-auto rounded-full"></div>
    </div>

    {{-- ================= GRID BERITA UTAMA + SIDEBAR ================= --}}
    <div class="grid lg:grid-cols-3 gap-10">

      {{-- BERITA UTAMA (kiri) --}}
      <div class="lg:col-span-2 space-y-8">

        {{-- FORM PENCARIAN --}}
        <form action="{{ route('berita.index') }}" method="GET" class="flex mb-6 shadow-md rounded-xl overflow-hidden" data-aos="fade-up">
          <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}" class="w-full px-4 py-3 border-none focus:ring-0 focus:outline-none">
          <button type="submit" class="bg-orange-600 text-white px-6 py-3 hover:bg-orange-500 transition">Cari</button>
        </form>

        @php
            $hotNewsIds = $news->skip(1)->take(5)->pluck('id')->toArray();
            $shownIds = [];
            $remainingNews = $news->filter(fn($item) => !in_array($item->id, $hotNewsIds));
        @endphp

        {{-- BERITA UTAMA --}}
        @if($news->count() > 0)
            @php
                $first = $news->first();
                $shownIds[] = $first->id;
            @endphp
            <div class="bg-white rounded-2xl shadow-md overflow-hidden" data-aos="zoom-in">
                <img src="{{ asset($first->thumbnail) }}" alt="{{ $first->title }}" class="w-full h-[500px] object-cover">
                <div class="p-6">
                    <span class="bg-orange-600 text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $first->category->name ?? 'Umum' }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-3 mb-4 leading-tight">{{ $first->title }}</h2>
                    <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags($first->content), 300) }}</p>
                    <a href="{{ route('berita.detail', $first->slug) }}" class="inline-block bg-orange-500 hover:bg-orange-600 px-5 py-2 rounded-lg font-medium text-sm transition">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        @endif

        {{-- 3 BERITA AWAL --}}
        @php
            $firstThree = $remainingNews->skip(0)->take(3);
            foreach($firstThree as $item) $shownIds[] = $item->id;
        @endphp
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
            @foreach($firstThree as $item)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300" data-aos="fade-up">
                    <a href="{{ route('berita.detail', $item->slug) }}">
                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-56 object-cover">
                    </a>
                    <div class="p-4">
                        <span class="text-xs text-orange-600 font-semibold">{{ $item->category->name ?? 'Umum' }}</span>
                        <h4 class="font-semibold text-gray-800 mt-2 line-clamp-2">{{ $item->title }}</h4>
                        <p class="text-sm text-gray-500 mt-2 line-clamp-3">{{ Str::limit(strip_tags($item->content), 80) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- CARD TAMBAHAN DENGAN POLA BARIS 2-3 BERULANG --}}
        @php
            $additionalNews = $remainingNews->whereNotIn('id', $shownIds)->values();
            $rowPattern = [2, 3];
            $patternIndex = 0;
        @endphp

        @if($additionalNews->count() > 0)
          @while($additionalNews->count() > 0)
            @php
              $cardsInRow = $rowPattern[$patternIndex % count($rowPattern)];
              $rowItems = $additionalNews->take($cardsInRow);
              $additionalNews = $additionalNews->slice($cardsInRow)->values();
              $patternIndex++;
            @endphp

            <div class="grid sm:grid-cols-{{ $cardsInRow }} gap-6 mt-6">
              @foreach($rowItems as $item)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300" data-aos="fade-up">
                  <a href="{{ route('berita.detail', $item->slug) }}">
                    <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-56 object-cover">
                  </a>
                  <div class="p-4">
                    <span class="text-xs text-orange-600 font-semibold">{{ $item->category->name ?? 'Umum' }}</span>
                    <h4 class="font-semibold text-gray-800 mt-2 line-clamp-2">{{ $item->title }}</h4>
                    <p class="text-sm text-gray-500 mt-2 line-clamp-3">{{ Str::limit(strip_tags($item->content), 80) }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          @endwhile
        @endif

        {{-- ================= VIDEO SECTION ================= --}}
        @if($videos->count() > 0)
          <div class="mt-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 border-b-2 border-orange-500 inline-block pb-1" data-aos="fade-right">
              Video Kegiatan
            </h3>
            <div class="grid md:grid-cols-2 gap-6">
              @foreach($videos->take(4) as $video)
                @php
                  $url = $video->video_url;
                  if(Str::contains($url,'watch?v=')) $videoId = Str::after($url,'watch?v=');
                  elseif(Str::contains($url,'shorts/')) $videoId = Str::after($url,'shorts/');
                  elseif(Str::contains($url,'embed/')) $videoId = Str::after($url,'embed/');
                  elseif(Str::contains($url,'youtu.be/')) $videoId = Str::after($url,'youtu.be/');
                  else $videoId = $url;
                  $videoId = Str::before($videoId,'&');
                  $thumbnailPath = $resolveLocalThumbnail($videoId, $video->thumbnail ?? null);
                  $videoGradients = [
                    'from-orange-500 via-orange-400 to-orange-600',
                    'from-sky-500 via-blue-500 to-indigo-600',
                    'from-emerald-500 via-teal-500 to-sky-500',
                    'from-rose-500 via-pink-500 to-purple-600',
                  ];
                  $gradient = $videoGradients[$loop->index % count($videoGradients)];
                @endphp
                <div class="rounded-xl overflow-hidden shadow-md bg-white hover:shadow-lg transition" data-aos="fade-up">
                  @if(!empty($videoId))
                    @include('components.youtube-lite', [
                        'videoId' => $videoId,
                        'title' => $video->title,
                        'gradient' => $gradient,
                        'thumbnailPath' => $thumbnailPath,
                        'wrapperClass' => 'w-full',
                        'behavior' => 'inline'
                    ])
                  @else
                    <div class="w-full h-56 flex items-center justify-center bg-gray-100 text-gray-500">
                      {{ $video->title }}
                    </div>
                  @endif
                  <div class="p-4">
                    <h3 class="font-semibold text-gray-900 text-sm line-clamp-2">{{ $video->title }}</h3>
                  </div>
                </div>
              @endforeach
            </div>
            @include('components.youtube-lite-script')
          </div>
        @endif

      </div>

      {{-- SIDEBAR (kanan) --}}
      <aside class="lg:col-span-1 space-y-8">

        {{-- AKSES CEPAT --}}
        <div class="bg-white rounded-2xl shadow-md p-5" data-aos="fade-left">
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
{{--  --}}
        {{-- HOT   --}}
        @if($news->count() > 1)
          <div class="bg-white rounded-2xl shadow-md p-5" data-aos="fade-left" data-aos-delay="100">
            <h3 class="text-xl font-bold text-orange-600 border-b-2 border-orange-500 pb-2 mb-4">Hot News</h3>
            @foreach($news->skip(1)->take(5) as $item)
              <a href="{{ route('berita.detail', $item->slug) }}" class="block overflow-hidden rounded-xl mb-4">
                <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-32 object-cover rounded-lg mb-2">
                <h4 class="font-semibold text-gray-800 hover:text-orange-600 transition line-clamp-2">{{ $item->title }}</h4>
              </a>
            @endforeach
          </div>
        @endif

      </aside>
    </div>

  </div>
</section>

@push('scripts')
<script>
  const configBeritaIndex = { duration: 800, once: true, offset: 80 };
  if (window.initAOS) {
    window.initAOS(configBeritaIndex).catch((error) => console.error('Failed to initialize AOS on Berita index', error));
  } else if (typeof window.ensureAOS === 'function') {
    window.ensureAOS().then((AOS) => AOS.init(configBeritaIndex)).catch((error) => console.error('Failed to initialize AOS on Berita index', error));
  } else if (window.AOS) {
    window.AOS.init(configBeritaIndex);
  }
</script>
@endpush
@endsection
