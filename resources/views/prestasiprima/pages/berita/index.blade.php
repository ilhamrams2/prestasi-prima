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
      if (file_exists(public_path($candidate))) return $candidate;
    }
    return null;
  };
@endphp

<section class="bg-[#fafafa] relative z-10 pt-32 md:pt-40 pb-28 min-h-screen overflow-x-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    {{-- ================= HEADER & SEARCH ================= --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16" data-aos="fade-down">
      <div class="max-w-2xl">
        <h1 class="text-3xl sm:text-4xl md:text-6xl font-black text-gray-900 leading-tight tracking-tight">
          Berita & <span class="text-orange-600">Update Terbaru</span>
        </h1>
        <p class="text-gray-500 mt-4 text-lg font-medium">
          Dapatkan wawasan terdalam, berita eksklusif, dan cerita inspiratif dari ekosistem Prestasi Prima.
        </p>
      </div>
      
      <div class="w-full md:w-auto">
        <form action="{{ route('berita.index') }}" method="GET" class="relative group">
          <input type="text" name="search" placeholder="Cari Berita..." value="{{ request('search') }}" 
            class="w-full md:w-80 pl-12 pr-6 py-4 bg-white border border-gray-100 rounded-2xl shadow-sm focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 outline-none transition-all duration-300 font-medium">
          <iconify-icon icon="lucide:search" class="absolute left-4 top-1/2 -translate-y-1/2 text-xl text-gray-400 group-focus-within:text-orange-600 transition-colors"></iconify-icon>
        </form>
      </div>
    </div>

    {{-- ================= LAYOUT GRID ================= --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

      {{-- MAIN AREA (L: 8 COL) --}}
      <div class="lg:col-span-8 space-y-12">

        @if($news->count() > 0)
            @php
                $featured = $news->first();
                $shownIds = [$featured->id];
                // Kita tidak lagi mengecualikan hotNewsIds (Trending) agar list utama tetap penuh
                $remainingNews = $news->filter(fn($item) => !in_array($item->id, $shownIds));
            @endphp

            {{-- FEATURED NEWS (Besar) --}}
            <article class="relative group rounded-[2.5rem] overflow-hidden bg-white shadow-xl hover:shadow-[0_40px_80px_-15px_rgba(0,0,0,0.1)] transition-all duration-700" data-aos="zoom-in">
              <a href="{{ route('berita.detail', $featured->slug) }}" class="block relative overflow-hidden aspect-[16/9]">
                  <img src="{{ asset($featured->thumbnail) }}" alt="{{ $featured->title }}" 
                    class="w-full h-full object-cover transition-transform duration-[1500ms] group-hover:scale-105">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                  
                  <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-orange-600 text-white text-[10px] font-black uppercase tracking-widest mb-4 shadow-lg">
                        {{ $featured->category->name ?? 'Umum' }}
                    </span>
                    <h2 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl font-black text-white leading-tight mb-4 group-hover:text-orange-50 transition-colors">
                        {{ $featured->title }}
                    </h2>
                    <div class="flex items-center gap-4 text-white/70 text-sm font-bold">
                        <span class="flex items-center gap-1.5"><iconify-icon icon="lucide:user"></iconify-icon> Admin</span>
                        <span>•</span>
                        <span>{{ $featured->created_at->format('d M Y') }}</span>
                    </div>
                  </div>
              </a>
            </article>

            {{-- SECONDARY GRID (Kecil) --}}
            <div class="grid sm:grid-cols-2 gap-8">
                @foreach($remainingNews->take(4) as $item)
                  @php $shownIds[] = $item->id @endphp
                  <article class="flex flex-col group" data-aos="fade-up">
                    <a href="{{ route('berita.detail', $item->slug) }}" class="block relative overflow-hidden aspect-[4/3] rounded-3xl mb-4 shadow-md">
                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}"
                          class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </a>
                    <div>
                        <span class="text-[10px] font-black text-orange-600 uppercase tracking-widest mb-2 block">{{ $item->category->name ?? 'Umum' }}</span>
                        <h3 class="text-xl font-black text-gray-900 leading-tight mb-3 group-hover:text-orange-600 transition-colors line-clamp-2">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-500 font-medium line-clamp-2 leading-relaxed mb-4">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                        <div class="flex items-center gap-3 text-[10px] font-bold text-gray-400">
                          <span class="flex items-center gap-1"><iconify-icon icon="lucide:calendar"></iconify-icon> {{ $item->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                  </article>
                @endforeach
            </div>

            {{-- VIDEO SECTION (Banner Style) --}}
            @if($videos->count() > 0)
              <div class="bg-white border border-gray-100 rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-12 text-gray-900 relative overflow-hidden shadow-sm" data-aos="fade-up">
                <div class="absolute top-0 right-0 w-64 h-64 bg-orange-100/50 blur-[100px] rounded-full"></div>
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                  <div>
                    <h3 class="text-2xl md:text-3xl font-black mb-2">Video <span class="text-orange-600">Galeri Sekolah</span></h3>
                    <p class="text-gray-500 font-medium">Tonton liputan langsung aktivitas siswa kami.</p>
                  </div>
                  <a href="{{ route('gallery') }}" class="px-8 py-3 bg-orange-600 text-white rounded-2xl font-black hover:bg-gray-900 transition-all shadow-xl shadow-orange-200">Lihat Semua</a>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6 mt-10 relative z-10">
                  @foreach($videos->take(2) as $video)
                    @php
                        $url = $video->video_url;
                        if(Str::contains($url,'watch?v=')) $videoId = Str::after($url,'watch?v=');
                        elseif(Str::contains($url,'shorts/')) $videoId = Str::after($url,'shorts/');
                        elseif(Str::contains($url,'embed/')) $videoId = Str::after($url,'embed/');
                        elseif(Str::contains($url,'youtu.be/')) $videoId = Str::after($url,'youtu.be/');
                        else $videoId = $url;
                        $videoId = Str::before($videoId,'&');
                        $thumbnailPath = $resolveLocalThumbnail($videoId, $video->thumbnail ?? null);
                    @endphp
                    <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-50">
                      @include('components.youtube-lite', [
                        'videoId' => $videoId,
                        'title' => $video->title,
                        'gradient' => 'from-orange-600 to-orange-400',
                        'thumbnailPath' => $thumbnailPath,
                        'behavior' => 'inline'
                      ])
                    </div>
                  @endforeach
                </div>
              </div>
            @endif

            {{-- OTHER NEWS LIST --}}
            @if($remainingNews->skip(4)->count() > 0)
              <div class="space-y-12">
                <h3 class="text-2xl font-black text-gray-900 border-l-8 border-orange-600 pl-6">Artikel Lainnya</h3>
                <div class="space-y-8">
                  @foreach($remainingNews->skip(4) as $item)
                    <article class="flex flex-col md:flex-row gap-6 p-6 bg-white rounded-3xl border border-gray-50 hover:shadow-xl hover:border-orange-100 transition-all group" data-aos="fade-up">
                      <a href="{{ route('berita.detail', $item->slug) }}" class="block shrink-0 w-full md:w-56 h-40 relative rounded-2xl overflow-hidden shadow-sm">
                        <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                      </a>
                      <div class="flex flex-col justify-center">
                        <span class="text-[10px] font-black text-orange-600 uppercase tracking-widest mb-2">{{ $item->category->name ?? 'Umum' }}</span>
                        <h4 class="text-xl font-black text-gray-900 mb-3 group-hover:text-orange-600 transition-colors line-clamp-2 leading-snug">{{ $item->title }}</h4>
                        <p class="text-sm text-gray-500 font-medium line-clamp-2 mb-4 leading-relaxed">{{ Str::limit(strip_tags($item->content), 120) }}</p>
                        <div class="flex items-center gap-4 text-xs font-bold text-gray-400">
                          <span class="flex items-center gap-1.5"><iconify-icon icon="lucide:calendar"></iconify-icon> {{ $item->created_at->format('d M Y') }}</span>
                        </div>
                      </div>
                    </article>
                  @endforeach
                </div>
              </div>
            @endif

        @else
            <div class="py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-100">
                <iconify-icon icon="lucide:frown" class="text-6xl text-gray-200 mb-6"></iconify-icon>
                <h3 class="text-2xl font-black text-gray-400">Belum Ada Berita Yang Ditemukan</h3>
                <p class="text-gray-400 mt-2 font-medium">Coba gunakan kata kunci pencarian yang berbeda.</p>
                <a href="{{ route('berita.index') }}" class="inline-block mt-8 text-orange-600 font-bold hover:underline">Reset Pencarian</a>
            </div>
        @endif

      </div>

      {{-- SIDEBAR Area (R: 4 COL) --}}
      <aside class="lg:col-span-4 space-y-12 h-fit lg:sticky lg:top-32">
        
        {{-- TRENDING NEWS --}}
        @if($news->count() > 1)
          <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 border border-gray-50 shadow-sm" data-aos="fade-up">
            <h3 class="text-xl font-black text-gray-900 mb-8 flex items-center gap-3">
              <iconify-icon icon="lucide:trending-up" class="text-orange-600 text-2xl"></iconify-icon> Trending
            </h3>
            <div class="space-y-8">
              @foreach($news->skip(1)->take(5) as $index => $item)
                  <a href="{{ route('berita.detail', $item->slug) }}" class="flex gap-4 group">
                    <div class="relative shrink-0">
                      <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}"
                        class="w-20 h-20 object-cover rounded-2xl group-hover:scale-105 transition-transform shadow-sm">
                      <span class="absolute -top-3 -left-3 w-8 h-8 bg-orange-600 text-white text-xs font-black rounded-xl flex items-center justify-center border-4 border-white shadow-lg">{{ $index + 1 }}</span>
                    </div>
                    <div class="flex flex-col justify-center">
                      <h4 class="text-sm font-bold text-gray-900 group-hover:text-orange-600 transition-colors leading-snug line-clamp-2">{{ $item->title }}</h4>
                      <span class="text-[10px] font-black text-orange-500 mt-1 uppercase">{{ $item->category->name ?? 'Umum' }}</span>
                    </div>
                  </a>
              @endforeach
            </div>
          </div>
        @endif

        {{-- CATEGORIES --}}
        <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 border border-gray-50 shadow-sm relative overflow-hidden group" data-aos="fade-up">
           <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-orange-50 blur-[80px] rounded-full group-hover:bg-orange-100 transition-all duration-700"></div>
           <h3 class="text-xl font-black text-gray-900 mb-8 flex items-center gap-3 relative z-10">
              <iconify-icon icon="lucide:grid" class="text-orange-500 text-2xl"></iconify-icon> Topik Hangat
           </h3>
           <div class="flex flex-wrap gap-2 relative z-10">
              @foreach($categories as $category)
                <a href="{{ route('berita.index', ['category' => $category->slug]) }}" 
                   class="px-5 py-2.5 bg-gray-50 hover:bg-orange-600 text-gray-600 hover:text-white rounded-2xl text-xs font-black transition-all border border-gray-100 hover:border-orange-600 shadow-sm">
                   {{ $category->name }}
                </a>
              @endforeach
           </div>
        </div>

        {{-- NEWSLETTER / CTA --}}
        <div class="bg-gradient-to-br from-orange-500 to-orange-400 rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 text-white shadow-2xl shadow-orange-200" data-aos="fade-up">
           <iconify-icon icon="lucide:sparkles" class="text-5xl mb-6 opacity-30"></iconify-icon>
           <h3 class="text-2xl font-black mb-2 leading-tight">Jangan Lewatkan Cerita Menarik</h3>
           <p class="text-white/80 text-sm font-medium mb-8">Dapatkan update eksklusif dan berita terbaru langsung ke inbox Anda.</p>
           <form class="space-y-3" onsubmit="event.preventDefault(); alert('Terima kasih! Anda akan menerima update terbaru kami segera.'); this.reset();">
              <input type="email" placeholder="Email Anda" required class="w-full px-6 py-4 bg-white/20 border border-white/30 rounded-2xl outline-none focus:bg-white focus:text-gray-900 transition-all placeholder:text-white/60 font-bold text-sm">
              <button type="submit" class="w-full py-4 bg-white text-orange-600 rounded-2xl font-black hover:scale-105 transition-transform shadow-xl">Gabung Sekarang</button>
           </form>
        </div>

      </aside>
    </div>

  </div>
</section>

@include('components.youtube-lite-script')

@push('styles')
    <style>
      {{-- Plus Jakarta Sans is already loaded locally via app.js --}}
      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
      }
      .glassmorphism {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
      }
    </style>
@endpush

@push('scripts')
<script>
  const configBeritaIndex = { duration: 1000, once: true, offset: 50, easing: 'ease-out-expo' };
  if (window.initAOS) {
    window.initAOS(configBeritaIndex);
  } else if (typeof window.ensureAOS === 'function') {
    window.ensureAOS().then((AOS) => AOS.init(configBeritaIndex));
  } else if (window.AOS) {
    window.AOS.init(configBeritaIndex);
  }
</script>
@endpush
@endsection
