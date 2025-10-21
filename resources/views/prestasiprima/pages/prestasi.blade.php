@extends('prestasiprima.index')

@section('title', 'Prestasi Kami')

@section('content')
<!-- ================= PAGE PRESTASI ================= -->
<section id="prestasi" class="pt-36 pb-20 bg-white relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">

    <!-- ===== Header ===== -->
    <div class="mb-12">
      <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo Sekolah" class="mx-auto h-14 mb-4">
      <h3 class="text-lg font-bold text-gray-800">Prestasi Kami</h3>
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">
        Mengabadikan momen berharga di balik setiap
        <span class="text-orange-600">kemenangan</span>
      </h2>
    </div>

    <!-- ===== Swiper Container (wrapper relative untuk tombol absolute) ===== -->
    <div class="relative">
      <!-- Tombol navigasi di luar slide (posisi absolute relatif ke parent) -->
      <button class="swiper-button-prev custom-nav absolute -left-8 top-1/2 -translate-y-1/2 z-20" aria-label="Previous"></button>
      <button class="swiper-button-next custom-nav absolute -right-8 top-1/2 -translate-y-1/2 z-20" aria-label="Next"></button>

      <!-- Swiper utama: tambahkan padding-bottom supaya pagination tidak tumpang tindih -->
      <div class="swiper prestasiSwiper pb-16">
        <div class="swiper-wrapper">
          @foreach ([
            ['satu.webp', 'Juara Dua'],
            ['dua.webp', 'Juara Tiga'],
            ['tiga.webp', 'Juara Empat'],
            ['empat.webp', 'Juara Lima'],
            ['satu.webp', 'Juara Enam'],
            ['dua.webp', 'Juara Tujuh']
          ] as $item)
          <div class="swiper-slide">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
              <img src="{{ asset('assets/images/section/prestasi/' . $item[0]) }}" alt="{{ $item[1] }}" class="w-full object-cover">
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <!-- Pagination (diletakkan di luar bawah slider) -->
      <div class="swiper-pagination mt-4"></div>
    </div>

    <!-- ===== GRID PRESTASI TAMBAHAN (HANYA GAMBAR) ===== -->
    <div class="mt-12">
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ([
          'satu.webp','dua.webp','tiga.webp','empat.webp','satu.webp',
          'dua.webp','tiga.webp','empat.webp','satu.webp','dua.webp'
        ] as $img)
        <div class="rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 group">
          <img src="{{ asset('assets/images/section/prestasi/' . $img) }}"
               alt="Prestasi"
               class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
        </div>
        @endforeach
      </div>
    </div>

  </div>
</section>

<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Custom Style Navigasi -->
<style>
  /* Tombol navigasi (di luar area gambar) */
  .custom-nav {
    width: 36px !important;
    height: 36px !important;
    background-color: rgba(255, 255, 255, 0.95);
    border-radius: 9999px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.12);
    color: #ea580c;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.22s ease, background-color 0.22s ease;
    border: none;
    cursor: pointer;
  }
  /* Default Swiper pseudo content (panah) styling */
  .swiper-button-next.custom-nav::after,
  .swiper-button-prev.custom-nav::after {
    font-size: 16px !important;
    font-weight: 700;
    color: inherit;
  }
  .custom-nav:hover {
    background-color: #ea580c;
    color: white;
    transform: scale(1.06);
  }

  /* Posisikan pagination benar di bawah (tidak overlapping) */
  .swiper-pagination {
    position: relative !important;
    z-index: 10;
    display: flex;
    justify-content: center;
    gap: 6px;
    margin-top: 0.75rem;
  }

  /* Optional: ubah warna bullet aktif supaya sesuai tema */
  .swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    opacity: 0.6;
    background: #cbd5e1; /* gray-300 */
  }
  .swiper-pagination-bullet-active {
    background: #ea580c; /* orange theme */
    opacity: 1;
    width: 10px;
    height: 10px;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .custom-nav { width: 30px !important; height: 30px !important; }
    .swiper-button-next { right: -6px !important; }
    .swiper-button-prev { left: -6px !important; }
  }

  /* Pastikan slide image tidak ter-overflow oleh tombol visual */
  .swiper .swiper-slide { overflow: visible; }
</style>

<!-- Swiper Config -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
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
        bulletClass: 'swiper-pagination-bullet',
        bulletActiveClass: 'swiper-pagination-bullet-active'
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

    // Background dekoratif (gunakan asset() supaya path benar)
    const prestasiSection = document.getElementById("prestasi");
    if (prestasiSection) {
      const networkImg = document.createElement("img");
      networkImg.src = "{{ asset('assets/images/section/prestasi/netowrk.svg') }}";
      networkImg.alt = "Network";
      networkImg.className =
        "absolute -bottom-16 -left-48 w-[460px] md:w-[560px] opacity-40 select-none pointer-events-none";
      prestasiSection.appendChild(networkImg);

      const raceImg = document.createElement("img");
      raceImg.src = "{{ asset('assets/images/section/tentang/race.svg') }}";
      raceImg.alt = "Race";
      raceImg.className =
        "absolute -bottom-80 -right-24 w-[480px] md:w-[600px] opacity-40 select-none pointer-events-none";
      prestasiSection.appendChild(raceImg);
    }
  });
</script>
@endsection
