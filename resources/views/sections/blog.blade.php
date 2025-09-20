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
          <div class="blog-card relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 hover:scale-105 transition-transform duration-300 flex flex-col h-full">
            
            <!-- Badge Baru -->
            <span class="absolute top-3 right-3 bg-orange-500 text-white text-xs px-2 py-1 rounded">Baru</span>

            <img src="assets/images/section/blog/nobar.png" alt="Siswa dan guru nonton bareng kegiatan Prestasi Prima" loading="lazy" class="w-full h-52 object-cover transition-transform duration-300">

            <div class="p-6 flex flex-col justify-between h-full">
              <div>
                <!-- Tanggal dan Kategori -->
                <p class="text-xs text-gray-400 mb-2">12 Sep 2025 | Kegiatan Sekolah</p>

                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Nonton <span class="text-orange-600">Bareng</span> Prestasi Prima
                </h3>
                <p class="text-gray-600 mb-4">
                  Keluarga besar Prestasi Prima mengadakan Nonton Bareng yang seru dan penuh kebersamaan. Acara ini mempererat hubungan antar siswa, guru, dan staf sekolah.
                </p>
              </div>
              <a href="#"
                 aria-label="Selengkapnya tentang Nonton Bareng Prestasi Prima"
                 class="inline-block btn-blog bg-gradient-to-r from-orange-500 to-orange-400 hover:from-orange-600 hover:to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-transform hover:scale-105 shadow">
                Selengkapnya →
              </a>
            </div>
          </div>
        </div>

        <!-- Post 2 -->
        <div class="swiper-slide">
          <div class="blog-card relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 hover:scale-105 transition-transform duration-300 flex flex-col h-full">
            
            <img src="assets/images/section/blog/rapat-guru.png" alt="Guru-guru Prestasi Prima rapat koordinasi strategi pembelajaran" loading="lazy" class="w-full h-52 object-cover transition-transform duration-300">

            <div class="p-6 flex flex-col justify-between h-full">
              <div>
                <p class="text-xs text-gray-400 mb-2">10 Sep 2025 | Kegiatan Guru</p>
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Rapat Guru <span class="text-orange-600">Prestasi</span> Prima
                </h3>
                <p class="text-gray-600 mb-4">
                  Guru-guru Prestasi Prima melaksanakan rapat koordinasi untuk membahas strategi pembelajaran dan meningkatkan kualitas pendidikan.
                </p>
              </div>
              <a href="#"
                 aria-label="Selengkapnya tentang Rapat Guru Prestasi Prima"
                 class="inline-block btn-blog bg-gradient-to-r from-orange-500 to-orange-400 hover:from-orange-600 hover:to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-transform hover:scale-105 shadow">
                Selengkapnya →
              </a>
            </div>
          </div>
        </div>

        <!-- Post 3 -->
        <div class="swiper-slide">
          <div class="blog-card relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 hover:scale-105 transition-transform duration-300 flex flex-col h-full">
            
            <img src="assets/images/section/blog/penghargaan-guru.png" alt="Penghargaan guru Prestasi Prima atas dedikasi dan kontribusi mereka" loading="lazy" class="w-full h-52 object-cover transition-transform duration-300">

            <div class="p-6 flex flex-col justify-between h-full">
              <div>
                <p class="text-xs text-gray-400 mb-2">08 Sep 2025 | Penghargaan</p>
                <h3 class="font-bold text-lg text-gray-900 mb-2">
                  Penghargaan <span class="text-orange-600">Guru Prestasi</span> Prima
                </h3>
                <p class="text-gray-600 mb-4">
                  Prestasi Prima memberikan apresiasi kepada guru-guru berprestasi sebagai bentuk penghargaan atas dedikasi dan kontribusi mereka.
                </p>
              </div>
              <a href="#"
                 aria-label="Selengkapnya tentang Penghargaan Guru Prestasi Prima"
                 class="inline-block btn-blog bg-gradient-to-r from-orange-500 to-orange-400 hover:from-orange-600 hover:to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-transform hover:scale-105 shadow">
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
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
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

<style>
  /* Hover card image zoom handled via Tailwind + custom classes */
  .blog-card img {
    transition: transform 0.3s ease;
  }
  .blog-card:hover img {
    transform: scale(1.05);
  }

  /* CTA Button shadow handled in Tailwind with shadow + hover */
</style>
