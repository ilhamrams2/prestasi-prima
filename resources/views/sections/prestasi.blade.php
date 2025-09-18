<!-- ================= SECTION PRESTASI ================= -->
<section id="prestasi" class="py-20 bg-white relative">
  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">

    <!-- Header -->
    <div class="mb-12">
      <img src="assets/images/logo-smk.png" alt="Logo Sekolah" class="mx-auto h-14 mb-4">
      <h3 class="text-lg font-bold text-gray-800">Prestasi Kami</h3>
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">
        Mengabadikan momen berharga di balik setiap 
        <span class="text-orange-600">kemenangan</span>
      </h2>
    </div>

    <!-- Swiper Container -->
    <div class="swiper mySwiper relative">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/satu.jpg" alt="Juara Dua" class="w-full object-cover">
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/dua.jpg" alt="Juara Tiga" class="w-full object-cover">
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/tiga.png" alt="Juara Tiga" class="w-full object-cover">
          </div>
        </div>

        <!-- Slide 4 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/empat.png" alt="Juara Tiga" class="w-full object-cover">
          </div>
        </div>

        <!-- Slide 5 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/satu.jpg" alt="Juara Lima" class="w-full object-cover">
          </div>
        </div>

        <!-- Slide 6 -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/dua.jpg" alt="Juara Enam" class="w-full object-cover">
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-6"></div>

      <!-- Navigation Buttons -->
      <div class="swiper-button-next text-orange-600"></div>
      <div class="swiper-button-prev text-orange-600"></div>
    </div>
  </div>
</section>

<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
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
      640: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      1024: { slidesPerView: 4 },
    },
  });
</script>
