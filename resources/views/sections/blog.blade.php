<!-- ==================== SECTION BLOG ==================== -->
<section id="blog" class="relative py-20 bg-gradient-to-b from-orange-50 via-white to-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8">
    
    <!-- ===== Header ===== -->
    <header data-aos="fade-up" data-aos-duration="800" class="mb-14 text-center">
      <p class="text-sm md:text-lg font-semibold text-orange-600 uppercase tracking-widest">
        Blog & Artikel
      </p>
      <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-3 mb-4">
        Cerita & <span class="text-orange-600">Kabar Terbaru</span> dari Kami
      </h2>
      <div class="w-24 h-1 bg-orange-500 mx-auto rounded-full"></div>
      <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
        Dapatkan berbagai informasi menarik seputar kegiatan, prestasi, dan inspirasi dari lingkungan sekolah kami.
      </p>
    </header>

    <!-- ===== Swiper Blog ===== -->
    <div class="swiper blogSwiper relative">
      <div class="swiper-wrapper">

        <!-- ====== CARD TEMPLATE ====== -->
        @php
          $blogs = [
            [
              'img' => 'assets/images/section/blog/nobar.webp',
              'category' => 'Kegiatan',
              'date' => '20 September 2025',
              'title' => 'Nonton Bareng Prestasi Prima',
              'desc' => 'Keluarga besar Prestasi Prima mengadakan Nonton Bareng yang seru dan penuh kebersamaan, mempererat hubungan antar siswa, guru, dan staf sekolah.'
            ],
            [
              'img' => 'assets/images/section/blog/rapat-guru.webp',
              'category' => 'Edukasi',
              'date' => '05 Oktober 2025',
              'title' => 'Rapat Guru Prestasi Prima',
              'desc' => 'Guru-guru Prestasi Prima melaksanakan rapat koordinasi untuk membahas strategi pembelajaran dan peningkatan mutu pendidikan.'
            ],
            [
              'img' => 'assets/images/section/blog/penghargaan-guru.webp',
              'category' => 'Prestasi',
              'date' => '01 Oktober 2025',
              'title' => 'Penghargaan Guru Berprestasi',
              'desc' => 'Sekolah memberikan penghargaan kepada guru-guru berprestasi atas dedikasi dan kerja keras dalam menciptakan pendidikan berkualitas.'
            ],
          ];
        @endphp

        @foreach ($blogs as $index => $blog)
          <div class="swiper-slide" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            <article class="group bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-500 flex flex-col h-full">
              
              <!-- Gambar -->
              <div class="relative overflow-hidden">
                <img src="{{ asset($blog['img']) }}" alt="{{ $blog['title'] }}"
                     class="w-full h-56 object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <span class="absolute top-3 left-3 bg-orange-600 text-white text-xs font-medium px-3 py-1 rounded-full shadow-md">
                  {{ $blog['category'] }}
                </span>
              </div>

              <!-- Konten -->
              <div class="p-6 flex flex-col flex-grow">
                <p class="text-xs text-gray-400 mb-2">{{ $blog['date'] }}</p>
                <h3 class="font-bold text-xl text-gray-900 mb-3 group-hover:text-orange-600 transition-colors">
                  {{ $blog['title'] }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed flex-grow">{{ $blog['desc'] }}</p>
                <a href="#" class="mt-auto inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-semibold text-sm transition">
                  Selengkapnya
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </div>
            </article>
          </div>
        @endforeach
      </div>

      <!-- Navigasi -->
      <div class="swiper-pagination mt-10"></div>
      <div class="swiper-button-prev custom-nav"></div>
      <div class="swiper-button-next custom-nav"></div>
    </div>
  </div>
</section>

<!-- ====== Swiper & AOS ====== -->
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
  /* Equal height fix */
  .blogSwiper .swiper-wrapper { display: flex; align-items: stretch; }
  .blogSwiper .swiper-slide { height: auto !important; display: flex; }
  .blogSwiper article { display: flex; flex-direction: column; height: 100%; }

  /* Navigasi */
  .custom-nav {
    width: 36px !important; height: 36px !important;
    background-color: rgba(255,255,255,0.9);
    border-radius: 9999px;
    box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    color: #ea580c; transition: all 0.3s ease;
  }
  .custom-nav::after { font-size: 16px !important; font-weight: bold; }
  .custom-nav:hover { background-color: #ea580c; color: white; transform: scale(1.1); }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: true, duration: 800, offset: 100 });

  const blogSwiper = new Swiper(".blogSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    breakpoints: {
      640: { slidesPerView: 2, spaceBetween: 24 },
      1024: { slidesPerView: 3, spaceBetween: 28 },
    },
    on: {
      afterInit: equalizeSlideHeights,
      resize: equalizeSlideHeights,
      slideChange: equalizeSlideHeights,
    },
  });

  function equalizeSlideHeights() {
    const slides = document.querySelectorAll(".blogSwiper .swiper-slide article");
    let maxHeight = 0;
    slides.forEach(slide => {
      slide.style.height = "auto";
      maxHeight = Math.max(maxHeight, slide.offsetHeight);
    });
    slides.forEach(slide => slide.style.height = maxHeight + "px");
  }
</script>
@endpush
