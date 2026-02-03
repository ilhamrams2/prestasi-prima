@extends('prestasiprima.index')

@section('title', $news->title ?? 'Detail Berita')

@section('content')
  <!-- Progress Bar untuk Reading Depth -->
  <div id="readingProgress" class="fixed top-0 left-0 w-0 h-1 bg-orange-600 z-[100] transition-all duration-300"></div>

  <section class="bg-[#fafafa] relative z-10 pt-28 md:pt-40 pb-20 overflow-x-hidden">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
      
      <!-- ===== BREADCRUMBS ===== -->
      <nav class="flex mb-8 text-sm font-medium text-gray-400" aria-label="Breadcrumb" data-aos="fade-down">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ route('landing') }}" class="hover:text-orange-600 transition-colors flex items-center gap-1">
              <iconify-icon icon="lucide:home" class="text-base"></iconify-icon> Beranda
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <iconify-icon icon="lucide:chevron-right" class="text-gray-300"></iconify-icon>
              <a href="{{ route('berita.index') }}" class="ml-1 hover:text-orange-600 transition-colors md:ml-2">Berita</a>
            </div>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <iconify-icon icon="lucide:chevron-right" class="text-gray-300"></iconify-icon>
              <span class="ml-1 text-gray-500 md:ml-2 truncate max-w-[150px] sm:max-w-xs">{{ $news->title }}</span>
            </div>
          </li>
        </ol>
      </nav>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

        {{-- ================= BAGIAN UTAMA (L: 8 COL) ================= --}}
        <div class="lg:col-span-8">
          
          {{-- Header Artikel --}}
          <header class="mb-10" data-aos="fade-up">
            <div class="inline-block px-4 py-1.5 rounded-full bg-orange-100 text-orange-700 text-xs font-bold uppercase tracking-wider mb-4 shadow-sm border border-orange-200/50">
              {{ $news->category->name ?? 'Umum' }}
            </div>
            
            <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-black text-gray-900 leading-[1.15] mb-8 tracking-tight">
                {{ $news->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-6 py-6 border-y border-gray-100 mb-10">
              <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-orange-400 flex items-center justify-center text-white shadow-md border-2 border-white">
                  <iconify-icon icon="lucide:user" class="text-xl"></iconify-icon>
                </div>
                <div>
                  <p class="text-sm font-bold text-gray-900">{{ $news->author->name ?? 'Admin Presma' }}</p>
                  <p class="text-xs text-gray-500">Editor Utama</p>
                </div>
              </div>

              <div class="h-8 w-px bg-gray-200 hidden sm:block"></div>

              <div class="flex items-center gap-5 text-gray-500">
                <div class="flex items-center gap-1.5">
                  <iconify-icon icon="lucide:calendar" class="text-orange-500"></iconify-icon>
                  <span class="text-xs font-medium">{{ $news->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex items-center gap-1.5">
                  <iconify-icon icon="lucide:clock" class="text-orange-500"></iconify-icon>
                  <span class="text-xs font-medium">{{ ceil(str_word_count(strip_tags($news->content)) / 200) }} mnt baca</span>
                </div>
                <div class="flex items-center gap-1.5">
                  <iconify-icon icon="lucide:eye" class="text-orange-500"></iconify-icon>
                  <span class="text-xs font-medium">{{ number_format($news->views ?? 0) }} view</span>
                </div>
              </div>
            </div>
          </header>

          {{-- Thumbnail Utama --}}
          <div class="relative mb-12 group" data-aos="zoom-in" data-aos-duration="1200">
            <div class="absolute -inset-4 bg-orange-100/30 blur-2xl rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
            <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->title }}"
              class="relative w-full aspect-[16/9] object-cover rounded-[2rem] shadow-2xl border-4 border-white transition-transform duration-700">
          </div>

          {{-- Konten Artikel --}}
          <div class="article-content" data-aos="fade-up">
            <div class="prose max-w-none prose-orange">
                {!! $news->content !!}
            </div>
            
            <!-- Tags Section -->
            <div class="mt-16 flex flex-wrap gap-2 pt-8 border-t border-gray-100">
                <span class="text-sm font-bold text-gray-900 mr-2 uppercase">Tags:</span>
                <a href="#" class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-medium rounded-lg hover:bg-orange-50 hover:text-orange-600 border border-gray-100 transition-all">#SMKPrestasiPrima</a>
                <a href="#" class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-medium rounded-lg hover:bg-orange-50 hover:text-orange-600 border border-gray-100 transition-all">#News</a>
                <a href="#" class="px-4 py-1.5 bg-gray-50 text-gray-600 text-xs font-medium rounded-lg hover:bg-orange-50 hover:text-orange-600 border border-gray-100 transition-all">#PendidikanJuara</a>
            </div>
          </div>

          <!-- Bag Bagian Bawah: Navigasi Prev/Next -->
          <div class="mt-12 flex flex-col sm:flex-row gap-6">
            @if($previous)
              <a href="{{ route('berita.detail', $previous->slug) }}" class="flex-1 group p-6 bg-white border border-gray-100 rounded-3xl hover:border-orange-200 hover:shadow-xl transition-all duration-300">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block">Berita Sebelumnya</span>
                <p class="text-sm font-bold text-gray-900 line-clamp-2 group-hover:text-orange-600 transition-colors">{{ $previous->title }}</p>
              </a>
            @else
              <div class="flex-1 p-6 bg-gray-50 border border-dotted border-gray-200 rounded-3xl opacity-60">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block">Berita Sebelumnya</span>
                <p class="text-sm font-medium text-gray-400">Tidak ada berita sebelumnya</p>
              </div>
            @endif

            @if($next)
              <a href="{{ route('berita.detail', $next->slug) }}" class="flex-1 group p-6 bg-white border border-gray-100 rounded-3xl text-right hover:border-orange-200 hover:shadow-xl transition-all duration-300">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block text-right">Berita Selanjutnya</span>
                <p class="text-sm font-bold text-gray-900 line-clamp-2 group-hover:text-orange-600 transition-colors text-right">{{ $next->title }}</p>
              </a>
            @else
              <div class="flex-1 p-6 bg-gray-50 border border-dotted border-gray-200 rounded-3xl text-right opacity-60">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block text-right">Berita Selanjutnya</span>
                <p class="text-sm font-medium text-gray-400 text-right">Tidak ada berita selanjutnya</p>
              </div>
            @endif
          </div>

        </div>

        {{-- ================= SIDEBAR (R: 4 COL) ================= --}}
        <aside class="lg:col-span-4 space-y-10 lg:sticky lg:top-32 h-fit">
          
          <!-- Tombol Share -->
          <div class="bg-white rounded-[2rem] shadow-sm border border-orange-50 p-6" data-aos="fade-up">
            <h4 class="text-sm font-black text-gray-900 uppercase tracking-widest mb-5 flex items-center gap-2">
              <iconify-icon icon="lucide:share-2" class="text-orange-500"></iconify-icon> Bagikan Berita
            </h4>
            <div class="flex gap-3">
              {{-- Facebook Share --}}
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer"
                 class="w-12 h-12 flex items-center justify-center bg-[#1877F2] text-white rounded-2xl hover:scale-110 transition-transform shadow-lg shadow-blue-200">
                <iconify-icon icon="lucide:facebook" class="text-xl"></iconify-icon>
              </a>

              {{-- Twitter share --}}
              <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer"
                 class="w-12 h-12 flex items-center justify-center bg-[#1DA1F2] text-white rounded-2xl hover:scale-110 transition-transform shadow-lg shadow-sky-100">
                <iconify-icon icon="lucide:twitter" class="text-xl"></iconify-icon>
              </a>

              {{-- WhatsApp Share --}}
              <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->url()) }}" target="_blank" rel="noopener noreferrer"
                 class="w-12 h-12 flex items-center justify-center bg-[#25D366] text-white rounded-2xl hover:scale-110 transition-transform shadow-lg shadow-green-100">
                <iconify-icon icon="ri:whatsapp-line" class="text-xl"></iconify-icon>
              </a>

              {{-- Copy Link --}}
              <button onclick="copyToClipboard()" id="copyLinkBtn"
                 class="w-12 h-12 flex items-center justify-center bg-[#F00000] text-white rounded-2xl hover:scale-110 transition-transform shadow-lg shadow-red-100">
                <iconify-icon icon="lucide:link" class="text-xl" id="copyIcon"></iconify-icon>
              </button>
            </div>
          </div>

          {{-- TRENDING / HOT NEWS --}}
          @if($hotNews->count() > 0)
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
              <h3 class="text-xl font-black text-gray-900 mb-8 flex items-center gap-3">
                <iconify-icon icon="lucide:flame" class="text-orange-500 text-2xl"></iconify-icon>
                Hot News
              </h3>
              <div class="space-y-8">
                @foreach($hotNews as $index => $item)
                  <a href="{{ route('berita.detail', $item->slug) }}" class="flex gap-4 group">
                    <div class="relative shrink-0">
                      <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}"
                        class="w-20 h-20 object-cover rounded-2xl shadow-sm border border-gray-50 group-hover:scale-105 transition-transform duration-500">
                      <span class="absolute -top-2 -left-2 w-6 h-6 bg-orange-600 text-white text-[10px] font-bold rounded-lg flex items-center justify-center shadow-lg border-2 border-white">{{ $index + 1 }}</span>
                    </div>
                    <div class="flex flex-col justify-center">
                      <h4 class="text-sm font-bold text-gray-800 group-hover:text-orange-600 transition-colors leading-snug line-clamp-2">{{ $item->title }}</h4>
                      <p class="text-[10px] font-medium text-gray-400 mt-1 uppercase">{{ $item->created_at->format('d M Y') }}</p>
                    </div>
                  </a>
                @endforeach
              </div>
            </div>
          @endif

          {{-- AKSES CEPAT / CATEGORIES --}}
          <div class="bg-orange-600 rounded-[2rem] shadow-2xl p-6 md:p-8 text-white relative overflow-hidden group" data-aos="fade-up">
            <!-- Dekorasi BG -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all duration-700"></div>
            
            <h3 class="relative text-xl font-black mb-8 flex items-center gap-3">
              <iconify-icon icon="lucide:box" class="text-white text-2xl"></iconify-icon>
              Akses Cepat
            </h3>
            <ul class="relative space-y-4">
              @foreach($categories as $category)
                <li>
                  <a href="{{ route('berita.index', ['category' => $category->slug]) }}"
                    class="flex items-center justify-between px-5 py-3.5 rounded-2xl bg-white/10 hover:bg-white text-white hover:text-orange-600 font-bold text-sm transition-all duration-300 border border-white/10 hover:border-white shadow-sm hover:translate-x-2">
                    <span>{{ $category->name }}</span>
                    <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>

        </aside>
      </div>

      {{-- ================= BERITA TERKAIT SECTION (BOTTOM) ================= --}}
      @if($related->count() > 0)
        <div class="mt-28" data-aos="fade-up">
          <div class="flex items-center justify-between mb-12">
            <div>
                <h3 class="text-3xl md:text-4xl font-black text-gray-900 tracking-tight">Eksplorasi <span class="text-orange-600">Berita Terkait</span></h3>
                <p class="text-gray-500 mt-2 font-medium">Temukan artikel serupa yang mungkin menarik bagi Anda</p>
            </div>
            <a href="{{ route('berita.index') }}" class="hidden md:flex items-center gap-2 text-orange-600 font-bold hover:gap-3 transition-all underline decoration-2 decoration-orange-200 underline-offset-8">
                Lihat Berita Lainnya <iconify-icon icon="lucide:arrow-right"></iconify-icon>
            </a>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($related as $index => $item)
              <a href="{{ route('berita.detail', $item->slug) }}"
                class="group bg-white rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden flex flex-col h-full hover:-translate-y-2">
                <div class="relative overflow-hidden aspect-[4/3]">
                  <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" 
                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                  <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                  <span class="text-[10px] font-black text-orange-600 uppercase tracking-widest mb-3 block">{{ $item->category->name ?? 'Umum' }}</span>
                  <h4 class="font-bold text-gray-900 line-clamp-2 group-hover:text-orange-600 transition-colors leading-tight mb-4">{{ $item->title }}</h4>
                  <div class="mt-auto pt-4 border-t border-gray-50 flex items-center gap-2 text-[10px] font-bold text-gray-400">
                    <iconify-icon icon="lucide:calendar"></iconify-icon>
                    {{ $item->created_at->format('d M Y') }}
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
      @endif

    </div>
  </section>

  @push('styles')
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
      
      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
      }

      .article-content {
        line-height: 1.8;
      }

      .prose p {
        margin-bottom: 2em;
        font-size: 1.125rem;
        color: #374151;
        letter-spacing: -0.011em;
      }

      /* First paragraph style */
      .prose p:first-of-type {
        font-size: 1.25rem;
        font-weight: 500;
        color: #111827;
        line-height: 1.6;
      }

      /* Drop Cap */
      .prose p:first-of-type::first-letter {
        float: left;
        font-size: 4.5rem;
        font-weight: 900;
        line-height: 1;
        margin-right: 0.15em;
        margin-top: 0.05em;
        color: #ea580c;
        font-family: 'serif';
      }

      .prose h2 {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: -0.025em;
        margin-top: 2.5em;
        margin-bottom: 1em;
        color: #111827;
      }

      .prose blockquote {
        border-left: none;
        background: #fff;
        padding: 2rem;
        border-radius: 2rem;
        font-style: italic;
        font-weight: 600;
        font-size: 1.125rem;
        color: #111827;
        margin: 2em 0;
        position: relative;
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
        border: 1px solid #f3f4f6;
      }

      @media (min-width: 768px) {
        .prose blockquote {
          padding: 3rem;
          font-size: 1.5rem;
        }
      }

      .prose blockquote::before {
        content: "“";
        position: absolute;
        top: 10px;
        left: 20px;
        font-size: 5rem;
        color: #ea580c;
        opacity: 0.1;
        font-family: serif;
      }

      @media (min-width: 768px) {
        .prose blockquote::before {
          top: 20px;
          left: 30px;
          font-size: 8rem;
        }
      }

      .prose img {
        border-radius: 2rem;
        margin: 3em 0;
        box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.15);
      }

      .prose strong {
        color: #111827;
        font-weight: 700;
      }

      /* Line Animation for headers */
      .prose h2::after {
        content: '';
        display: block;
        width: 60px;
        height: 6px;
        background: #ea580c;
        border-radius: 10px;
        margin-top: 0.5em;
      }
    </style>
  @endpush

  @push('scripts')
    <script>
      // Reading Progress Logic
      window.onscroll = function() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("readingProgress").style.width = scrolled + "%";
      };

      const configBeritaDetail = { duration: 1000, once: true, offset: 50, easing: 'ease-out-expo' };
      if (window.initAOS) {
        window.initAOS(configBeritaDetail);
      } else if (typeof window.ensureAOS === 'function') {
        window.ensureAOS().then((AOS) => AOS.init(configBeritaDetail));
      } else if (window.AOS) {
        window.AOS.init(configBeritaDetail);
      }

      // Copy to Clipboard Function
      function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            // Visual Feedback: Ganti icon link jadi check
            const btn = document.getElementById('copyLinkBtn');
            const icon = document.getElementById('copyIcon');
            
            // Backup styling
            const originalBg = btn.style.backgroundColor;
            
            // Change style
            btn.style.backgroundColor = '#10B981'; // Green color
            icon.setAttribute('icon', 'lucide:check');
            
            // Revert after 2 seconds
            setTimeout(() => {
                btn.style.backgroundColor = ''; // Reset to class default
                icon.setAttribute('icon', 'lucide:link');
            }, 2000);

            // Optional: Basic Alert (bisa diganti toast kalo ada library)
            // alert('Link berhasil disalin!');
        }).catch(err => {
            console.error('Gagal menyalin link: ', err);
            // Fallback manual copy logic for older browsers could go here
        });
      }
    </script>
  @endpush
@endsection