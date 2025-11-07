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
            <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->title }}"
              class="w-full h-[450px] object-cover rounded-2xl shadow-md">
          </div>

          {{-- Konten --}}
          <div class="prose max-w-none text-gray-700 text-justify">
            {!! $news->content !!}
          </div>



          {{-- Berita Terkait --}}
          @if($related->count() > 0)
            <div class="mt-12" data-aos="fade-up">
              <h3 class="text-xl font-bold text-orange-600 mb-6">Berita Terkait</h3>
              <div class="grid md:grid-cols-2 gap-6">
                @foreach($related as $item)
                  <a href="{{ route('berita.detail', $item->slug) }}"
                    class="bg-white rounded-xl shadow-md hover:shadow-lg overflow-hidden transition transform hover:-translate-y-1 duration-300">
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
                  <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}"
                    class="w-full h-32 object-cover rounded-lg mb-2">
                  <h4 class="font-semibold text-gray-800 hover:text-orange-600 transition line-clamp-2">{{ $item->title }}
                  </h4>
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
                  <a href="{{ route('berita.index', ['category' => $category->slug]) }}"
                    class="flex items-center justify-between px-4 py-2 rounded-lg border border-gray-200 hover:bg-orange-50 hover:text-orange-600 transition">
                    <span>{{ $category->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
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

  @push('styles')
    <style>
      .prose p {
        margin-bottom: 1.6em;
        line-height: 1.9;
        text-align: justify;
        font-size: 1.05rem;
        color: #333;
      }

      /* Paragraf pertama dengan drop cap */
      .prose p:first-of-type::first-letter {
        float: left;
        font-size: 3rem;
        font-weight: 700;
        line-height: 1;
        margin-right: 0.15em;
        color: #ff6600;
        font-family: "Georgia", serif;
      }

      /* Judul-judul dalam konten */
      .prose h2,
      .prose h3 {
        color: #0e162e;
        font-weight: 700;
        margin-top: 2em;
        margin-bottom: 0.8em;
        line-height: 1.3;
      }

      /* Teks tebal dan miring */
      .prose strong {
        color: #ff6600;
        font-weight: 600;
      }

      .prose em {
        color: #555;
        font-style: italic;
      }

      /* Link dalam teks */
      .prose a {
        color: #ff6600;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
      }

      .prose a:hover {
        text-decoration: underline;
        color: #e55b00;
      }

      /* Kutipan / blockquote */
      .prose blockquote {
        border-left: 4px solid #ff6600;
        background: #fff8f0;
        padding: 1.2rem 1.5rem;
        border-radius: 0.75rem;
        font-style: italic;
        color: #555;
        margin: 2em 0;
        position: relative;
      }

      .prose blockquote::before {
        content: "❝";
        position: absolute;
        top: -15px;
        left: 15px;
        font-size: 2.5rem;
        color: #ff6600;
        opacity: 0.2;
      }

      /* List */
      .prose ul,
      .prose ol {
        padding-left: 1.6rem;
        margin-bottom: 1.5em;
      }

      .prose li {
        margin-bottom: 0.5em;
        line-height: 1.8;
      }

      /* Gambar di dalam konten */
      .prose img {
        border-radius: 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        margin: 2em 0;
      }

      /* Caption gambar */
      .prose figcaption {
        text-align: center;
        font-size: 0.9rem;
        color: #888;
        margin-top: -0.5em;
        font-style: italic;
      }

      /* Paragraf dengan kutipan khusus */
      .prose .highlight {
        background: linear-gradient(to right, #fff7f0, #fff);
        border-left: 4px solid #ff6600;
        padding: 1rem 1.2rem;
        border-radius: 0.6rem;
        margin: 1.5em 0;
        color: #444;
      }
    </style>
  @endpush

  @push('scripts')
    <script>
      const configBeritaDetail = { duration: 800, once: true, offset: 80 };
      if (window.initAOS) {
        window.initAOS(configBeritaDetail).catch((error) => console.error('Failed to initialize AOS on Berita detail', error));
      } else if (typeof window.ensureAOS === 'function') {
        window.ensureAOS().then((AOS) => AOS.init(configBeritaDetail)).catch((error) => console.error('Failed to initialize AOS on Berita detail', error));
      } else if (window.AOS) {
        window.AOS.init(configBeritaDetail);
      }
    </script>
  @endpush
@endsection