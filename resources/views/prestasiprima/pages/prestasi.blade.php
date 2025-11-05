@extends('prestasiprima.index')

@section('title', 'Prestasi Siswa - SMK Prestasi Prima')

@section('content')
<section id="prestasi" class="pt-36 pb-20 bg-white relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    <!-- ===== Header ===== -->
    <div class="text-center mb-12" data-aos="fade-down">
      <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo Sekolah" class="mx-auto h-14 mb-4">
      <h3 class="text-lg font-bold text-gray-800">Prestasi Kami</h3>
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">
        Galeri <span class="text-orange-600">Prestasi Siswa</span>
      </h2>
    </div>

    <!-- ===== Swiper Prestasi ===== -->
    <div class="relative flex items-center justify-center" data-aos="zoom-in" data-aos-delay="100">
      <!-- Tombol Navigasi -->
      <button class="swiper-button-prev custom-nav absolute -left-20 md:-left-24 z-20" aria-label="Previous"></button>
      <button class="swiper-button-next custom-nav absolute -right-20 md:-right-24 z-20" aria-label="Next"></button>

      <div class="swiper prestasiSwiper w-full">
        <div class="swiper-wrapper">
          @foreach ($prestasis->take(5) as $prestasi)
            <div class="swiper-slide">
              <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500">
                <img src="{{ asset('storage/' . $prestasi->gambar) }}"
                     alt="Prestasi Siswa"
                     class="w-full h-72 object-cover hover:scale-105 transition-transform duration-700 ease-in-out">
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="swiper-pagination mt-4 relative"></div>

    <!-- ===== Daftar Prestasi Detail (Bergantian Layout) ===== -->
<div class="mt-20 space-y-16">
  @foreach ($prestasis as $index => $prestasi)
    @php
      $isEven = $loop->iteration % 2 == 0;
    @endphp

    <div class="flex flex-col md:flex-row items-center {{ $isEven ? 'md:flex-row-reverse' : '' }}"
         data-aos="{{ $isEven ? 'fade-left' : 'fade-right' }}"
         data-aos-delay="200">

      <!-- Gambar -->
<div class="w-full md:w-1/3 flex justify-center transition-all duration-500">
  <img src="{{ asset('storage/' . $prestasi->gambar) }}"
       alt="{{ $prestasi->judul }}"
       class="w-56 h-72 object-cover">
</div>

      <!-- Deskripsi -->
      <div class="w-full md:w-2/3 
                  {{ $isEven ? 'md:text-right md:pr-6 flex justify-end' : 'md:text-left md:pl-6 flex justify-start' }}">
        <div class="max-w-md">
          <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $prestasi->judul }}</h3>
          <p class="text-gray-600 leading-relaxed mb-2">{{ $prestasi->deskripsi }}</p>
          <p class="text-sm text-orange-600 font-medium">
            {{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') }}
          </p>
        </div>
      </div>
    </div>
  @endforeach
</div>


  </div>
</section>

<!-- ===== SwiperJS ===== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- ===== AOS ===== -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".prestasiSwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: { delay: 3000, disableOnInteraction: false },
      pagination: { el: ".swiper-pagination", clickable: true },
      navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
      breakpoints: {
        640: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        1024: { slidesPerView: 4 },
      },
    });

    AOS.init({ duration: 1000, once: true });
  });
</script>

<style>
  /* ===== Tombol Navigasi Swiper ===== */
  .custom-nav {
    width: 46px !important;
    height: 46px !important;
    background-color: rgba(255, 255, 255, 0.95);
    border-radius: 50%;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    color: #ea580c;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .swiper-button-next.custom-nav::after,
  .swiper-button-prev.custom-nav::after {
    font-size: 18px !important;
    font-weight: bold;
  }

  .custom-nav:hover {
    background-color: #ea580c;
    color: #fff;
    transform: scale(1.1);
  }

  /* ===== Pagination ===== */
  .swiper-pagination {
    position: relative !important;
    margin-top: 1rem;
  }

  .swiper-pagination-bullet {
    background-color: #ea580c !important;
    opacity: 0.5;
    transition: all 0.3s ease;
  }

  .swiper-pagination-bullet-active {
    background-color: #ea580c !important;
    opacity: 1;
    transform: scale(1.25);
  }

  /* ===== Responsif ===== */
  @media (max-width: 768px) {
    .custom-nav {
      width: 36px !important;
      height: 36px !important;
    }
    .swiper-button-prev {
      left: -10px !important;
    }
    .swiper-button-next {
      right: -10px !important;
    }
  }
</style>
@endsection
