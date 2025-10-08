<!-- ================= SECTION BLOG ================= -->
<section id="blog" class="relative py-16 md:py-20 bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8">
    <!-- ===== Judul ===== -->
    <div class="mb-10 md:mb-12 text-left">
      <p class="text-sm sm:text-base md:text-lg font-semibold text-orange-600 uppercase tracking-wide">
        Blog
      </p>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mt-2 leading-snug max-w-3xl">
        Wadah <span class="text-orange-600">informasi dan cerita</span> menarik 
        tentang kegiatan serta kabar terbaru sekolah.
      </h2>
    </div>

    <!-- ===== Swiper Container ===== -->
    <div class="swiper blogSwiper relative">
      <div class="swiper-wrapper">

        <!-- ===== Post 1 ===== -->
        <div class="swiper-slide">
          <article class="bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-300 flex flex-col h-full">
            <div class="overflow-hidden">
              <img src="assets/images/section/blog/nobar.png"
                   alt="Nonton Bareng"
                   class="w-full h-52 sm:h-56 object-cover hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5 sm:p-6 flex flex-col flex-1">
              <div class="flex-1">
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Nonton <span class="text-orange-600">Bareng</span> Prestasi Prima
                </h3>
                <p class="text-gray-600 text-sm sm:text-base">
                  Keluarga besar Prestasi Prima mengadakan Nonton Bareng yang seru dan penuh kebersamaan. 
                  Acara ini mempererat hubungan antar siswa, guru, dan staf sekolah.
                </p>
              </div>
              <a href="#"
                 class="mt-5 inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                Selengkapnya →
              </a>
            </div>
          </article>
        </div>

        <!-- ===== Post 2 ===== -->
        <div class="swiper-slide">
          <article class="bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-300 flex flex-col h-full">
            <div class="overflow-hidden">
              <img src="assets/images/section/blog/rapat-guru.png"
                   alt="Rapat Guru"
                   class="w-full h-52 sm:h-56 object-cover hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5 sm:p-6 flex flex-col flex-1">
              <div class="flex-1">
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Rapat Guru <span class="text-orange-600">Prestasi</span> Prima
                </h3>
                <p class="text-gray-600 text-sm sm:text-base">
                  Guru-guru Prestasi Prima melaksanakan rapat koordinasi untuk membahas strategi pembelajaran 
                  dan meningkatkan kualitas pendidikan.
                </p>
              </div>
              <a href="#"
                 class="mt-5 inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                Selengkapnya →
              </a>
            </div>
          </article>
        </div>

        <!-- ===== Post 3 ===== -->
        <div class="swiper-slide">
          <article class="bg-white rounded-2xl shadow-md hover:shadow-2xl overflow-hidden transition-all duration-300 flex flex-col h-full">
            <div class="overflow-hidden">
              <img src="assets/images/section/blog/penghargaan-guru.png"
                   alt="Penghargaan Guru"
                   class="w-full h-52 sm:h-56 object-cover hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-5 sm:p-6 flex flex-col flex-1">
              <div class="flex-1">
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Penghargaan <span class="text-orange-600">Guru</span> Prestasi Prima
                </h3>
                <p class="text-gray-600 text-sm sm:text-base">
                  Prestasi Prima memberikan apresiasi kepada guru-guru berprestasi sebagai bentuk penghargaan 
                  atas dedikasi dan kontribusi mereka.
                </p>
              </div>
              <a href="#"
                 class="mt-5 inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                Selengkapnya →
              </a>
            </div>
          </article>
        </div>

      </div>

      <!-- ===== Pagination & Navigation ===== -->
      <div class="swiper-pagination mt-8"></div>
      <div class="swiper-button-prev custom-nav"></div>
      <div class="swiper-button-next custom-nav"></div>
    </div>
  </div>
</section>

<!-- ========== SwiperJS ========== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- ========== Custom Style Navigasi & Card ========== -->
<style>
  .custom-nav {
    width: 28px !important;
    height: 28px !important;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 9999px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    color: #ea580c;
    transition: all 0.3s ease;
  }
  .custom-nav::after {
    font-size: 14px !important;
    font-weight: bold;
  }
  .custom-nav:hover {
    background-color: #ea580c;
    color: white;
    transform: scale(1.05);
  }
  .swiper-button-prev { left: 4px !important; }
  .swiper-button-next { right: 4px !important; }

  @media (max-width: 640px) {
    .custom-nav { width: 24px !important; height: 24px !important; }
    .custom-nav::after { font-size: 12px !important; }
    .swiper-button-prev { left: 2px !important; }
    .swiper-button-next { right: 2px !important; }
  }
</style>

<script>
  const blogSwiper = new Swiper(".blogSwiper", {
    slidesPerView: 1,
    spaceBetween: 16,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      480: { slidesPerView: 1, spaceBetween: 16 },
      640: { slidesPerView: 2, spaceBetween: 20 },
      1024: { slidesPerView: 3, spaceBetween: 24 },
    },
    on: {
      init: () => adjustCardHeight(),
      resize: () => adjustCardHeight(),
    }
  });

  function adjustCardHeight() {
    const slides = document.querySelectorAll('.swiper-slide article');
    let maxHeight = 0;
    slides.forEach(slide => {
      slide.style.height = 'auto'; // reset
      if(slide.offsetHeight > maxHeight) maxHeight = slide.offsetHeight;
    });
    slides.forEach(slide => slide.style.height = maxHeight + 'px');
  }
</script>
