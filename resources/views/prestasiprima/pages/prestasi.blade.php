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

    <!-- ===== Swiper Container ===== -->
    <div class="swiper prestasiSwiper relative mb-20">
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

      <!-- Pagination -->
      <div class="swiper-pagination mt-6"></div>

      <!-- Navigation -->
      <div class="swiper-button-prev custom-nav"></div>
      <div class="swiper-button-next custom-nav"></div>
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

<!-- Swiper Config -->
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

  // Background dekoratif
  document.addEventListener("DOMContentLoaded", () => {
    const prestasiSection = document.getElementById("prestasi");

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
  });
</script>
@endsection
