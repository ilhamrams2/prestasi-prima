<!-- ================= SECTION PRESTASI ================= -->
<section id="prestasi" class="py-20 bg-white relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">

    <!-- ===== Header ===== -->
    <div class="mb-12">
      <img src="assets/images/logo-smk.png" alt="Logo Sekolah" class="mx-auto h-14 mb-4">
      <h3 class="text-lg font-bold text-gray-800">Prestasi Kami</h3>
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">
        Mengabadikan momen berharga di balik setiap 
        <span class="text-orange-600">kemenangan</span>
      </h2>
    </div>

    <!-- ===== Swiper Container ===== -->
    <div class="swiper prestasiSwiper relative">
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/satu.jpg" alt="Juara Dua" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/dua.jpg" alt="Juara Tiga" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/tiga.png" alt="Juara Tiga" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/empat.png" alt="Juara Empat" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/satu.jpg" alt="Juara Lima" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="assets/images/section/prestasi/dua.jpg" alt="Juara Enam" class="w-full object-cover">
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-6"></div>

      <!-- Navigation Buttons (Custom Style) -->
      <div class="swiper-button-prev custom-nav"></div>
      <div class="swiper-button-next custom-nav"></div>
    </div>
  </div>
</section>

<!-- ===== SwiperJS ===== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- ===== Custom Style Navigasi ===== -->
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
    .custom-nav {
      width: 24px !important;
      height: 24px !important;
    }
    .custom-nav::after {
      font-size: 12px !important;
    }
    .swiper-button-prev { left: 2px !important; }
    .swiper-button-next { right: 2px !important; }
  }
</style>

<!-- ===== Swiper Config ===== -->
<script>
  const prestasiSwiper = new Swiper(".prestasiSwiper", {
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
      640: { slidesPerView: 2, spaceBetween: 20 },
      768: { slidesPerView: 3, spaceBetween: 24 },
      1024: { slidesPerView: 4, spaceBetween: 28 },
    },
  });

  // Tambahkan background dekoratif (Network & Race)
  document.addEventListener("DOMContentLoaded", () => {
    const prestasiSection = document.getElementById("prestasi");

    const networkImg = document.createElement("img");
    networkImg.src = "assets/images/section/prestasi/netowrk.svg";
    networkImg.alt = "Network";
    networkImg.className =
      "absolute -bottom-16 -left-48 w-[460px] md:w-[560px] opacity-40 select-none pointer-events-none";
    prestasiSection.appendChild(networkImg);

    const raceImg = document.createElement("img");
    raceImg.src = "assets/images/section/tentang/race.svg";
    raceImg.alt = "Race";
    raceImg.className =
      "absolute -bottom-80 -right-24 w-[480px] md:w-[600px] opacity-40 select-none pointer-events-none";
    prestasiSection.appendChild(raceImg);
  });
</script>
