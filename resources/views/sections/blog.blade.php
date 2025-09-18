<!-- ================= SECTION BLOG ================= -->
<section id="blog" class="py-20 bg-white relative">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    <!-- Judul -->
    <div class="mb-12 text-left">
      <p class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Blog</p>
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 leading-snug max-w-3xl">
        Wadah <span class="text-orange-600">informasi dan cerita</span> menarik tentang kegiatan serta kabar terbaru sekolah.
      </h2>
    </div>

    <!-- Swiper Container -->
    <div class="swiper blogSwiper relative">
      <div class="swiper-wrapper">

        <!-- Post 1 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col h-full">
            <img src="assets/images/section/blog/nobar.png" alt="Nonton Bareng" class="w-full h-52 object-cover">
            <div class="p-6 flex flex-col justify-between h-full">
              <div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Nonton <span class="text-orange-600">Bareng</span> Prestasi Prima
                </h3>
                <p class="text-gray-600 mb-4">
                  Keluarga besar Prestasi Prima mengadakan Nonton Bareng yang seru dan penuh kebersamaan. Acara ini mempererat hubungan antar siswa, guru, dan staf sekolah.
                </p>
              </div>
              <a href="#"
                 class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                Selengkapnya →
              </a>
            </div>
          </div>
        </div>

        <!-- Post 2 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col h-full">
            <img src="assets/images/section/blog/rapat-guru.png" alt="Rapat Guru" class="w-full h-52 object-cover">
            <div class="p-6 flex flex-col justify-between h-full">
              <div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Rapat Guru <span class="text-orange-600">Prestasi</span> Prima
                </h3>
                <p class="text-gray-600 mb-4">
                  Guru-guru Prestasi Prima melaksanakan rapat koordinasi untuk membahas strategi pembelajaran dan meningkatkan kualitas pendidikan.
                </p>
              </div>
              <a href="#"
                 class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                Selengkapnya →
              </a>
            </div>
          </div>
        </div>

        <!-- Post 3 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col h-full">
            <img src="assets/images/section/blog/penghargaan-guru.png" alt="Penghargaan Guru" class="w-full h-52 object-cover">
            <div class="p-6 flex flex-col justify-between h-full">
              <div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Penghargaan <span class="text-orange-600">Guru Prestasi</span> Prima
                </h3>
                <p class="text-gray-600 mb-4">
                  Prestasi Prima memberikan apresiasi kepada guru-guru berprestasi sebagai bentuk penghargaan atas dedikasi dan kontribusi mereka.
                </p>
              </div>
              <a href="#"
                 class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                Selengkapnya →
              </a>
            </div>
          </div>
        </div>

      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-6"></div>

      <!-- Navigation Button -->
      <div class="swiper-button-next !w-8 !h-8 text-orange-600"></div>
      <div class="swiper-button-prev !w-8 !h-8 text-orange-600"></div>
    </div>
  </div>
</section>

<!-- SwiperJS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const blogSwiper = new Swiper(".blogSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
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
      640: { slidesPerView: 2 },   // tablet kecil
      768: { slidesPerView: 3 },   // tablet besar
    },
  });
</script>
