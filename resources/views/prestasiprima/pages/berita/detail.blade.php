@extends('prestasiprima.index')

@section('title', $news->title)

@section('content')
  <!-- ================= PROGRESS BAR ================= -->
  <div id="progressBar" class="fixed top-0 left-0 h-1 bg-orange-600 z-50 w-0 transition-all duration-300"></div>

  <!-- ================= HERO DETAIL ================= -->
  <section class="relative h-[420px] md:h-[500px] overflow-hidden">
    <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}"
      class="absolute inset-0 w-full h-full object-cover brightness-75">
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 md:px-8 h-full flex flex-col justify-end pb-12">
      <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-snug mb-4">
        {{ $news->title }}
      </h1>
      <div class="flex flex-wrap items-center text-gray-200 text-sm gap-3">
        <span><i class="far fa-calendar-alt mr-1 text-orange-400"></i>
          {{ $news->created_at->translatedFormat('d F Y') }}</span>
        <span class="px-2 py-1 bg-orange-600 text-white text-xs rounded-full">
          {{ $news->category->name ?? 'Umum' }}
        </span>
        <span>•</span>
        <span><i class="far fa-user mr-1 text-orange-400"></i> {{ $news->author->name ?? 'Admin' }}</span>
        <span>•</span>
        <span><i class="far fa-clock mr-1 text-orange-400"></i>
          {{ ceil(str_word_count(strip_tags($news->content)) / 200) }} menit baca
        </span>
      </div>
    </div>
  </section>

  <!-- ================= KONTEN BERITA ================= -->
  <section class="bg-gray-50 py-16 relative z-10">
    <div class="max-w-5xl mx-auto px-4 md:px-8">
      <!-- Tombol Share -->
      <div class="flex justify-end mb-6">
        <div class="flex items-center gap-4 text-gray-400">
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
            class="hover:text-blue-600 transition"><i class="fab fa-facebook-f text-lg"></i></a>
          <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}" target="_blank"
            class="hover:text-sky-500 transition"><i class="fab fa-twitter text-lg"></i></a>
          <a href="https://api.whatsapp.com/send?text={{ urlencode(request()->url()) }}" target="_blank"
            class="hover:text-green-500 transition"><i class="fab fa-whatsapp text-lg"></i></a>
        </div>
      </div>

      <!-- Isi Berita -->
      <article data-aos="fade-up" data-aos-duration="800"
        class="bg-white rounded-3xl shadow-xl p-8 md:p-10 leading-relaxed text-gray-800">
        <div class="prose prose-lg prose-orange max-w-none">
          {!! $news->content !!}
        </div>
      </article>

      <!-- ================= BERITA SE-KATEGORI ================= -->
      @php
        $relatedByCategory = \App\Models\Prestasiprima\News::where('category_id', $news->category_id)
          ->where('id', '!=', $news->id)
          ->latest()
          ->take(6)
          ->get();

      @endphp

      @if($relatedByCategory->count() > 0)
        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200" class="mt-20">
          <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 border-l-4 border-orange-500 pl-4">
              Berita Lainnya di Kategori: <span class="text-orange-600">{{ $news->category->name ?? 'Umum' }}</span>
            </h2>
            <a href="{{ route('berita.index', ['category' => $news->category->slug ?? '']) }}"
              class="text-sm text-orange-600 hover:underline font-medium">
              Lihat Semua →
            </a>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($relatedByCategory as $item)
              <a href="{{ route('berita.detail', $item->slug) }}"
                class="group block bg-white rounded-2xl shadow-md hover:shadow-xl overflow-hidden transition-all duration-300">
                <div class="relative h-56 overflow-hidden">
                  <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-4">
                    <span class="bg-orange-600 text-white text-xs font-semibold px-3 py-1 rounded-full inline-block mb-2">
                      {{ $item->category->name ?? 'Umum' }}
                    </span>
                    <h3 class="text-white text-lg font-bold line-clamp-2 leading-snug group-hover:text-orange-300 transition">
                      {{ Str::limit($item->title, 80) }}
                    </h3>
                  </div>
                </div>
                <div class="p-4">
                  <p class="text-gray-600 text-sm line-clamp-3">
                    {{ Str::limit(strip_tags($item->excerpt ?? $item->content), 120) }}
                  </p>
                  <span class="mt-3 inline-block text-orange-600 text-sm font-semibold group-hover:underline">
                    Baca Selengkapnya →
                  </span>
                </div>
              </a>
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </section>

  <!-- ================= JS: READING PROGRESS BAR ================= -->
  <script>
    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;
      const docHeight = document.body.scrollHeight - window.innerHeight;
      const scrollPercent = (scrollTop / docHeight) * 100;
      document.getElementById('progressBar').style.width = scrollPercent + '%';
    });
  </script>
@endsection