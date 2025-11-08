@extends('prestasiprima.index')

@section('title', 'Testimoni - SMK Prestasi Prima')

@section('content')
<!-- ========== HEADER SECTION ========== -->
<section 
  class="relative mt-[100px] min-h-[70vh] flex items-center justify-center text-center overflow-hidden md:min-h-[80vh]"
  style="background: url('{{ asset('assets/images/lulusanptn/herobg.png') }}') center/cover no-repeat;">
  
  <!-- Overlay -->
  <div class="absolute inset-0 bg-orange-600/60"></div>

  <!-- Konten -->
  <div class="relative z-10 bg-white py-8 px-8 sm:px-10 md:px-16 rounded-2xl shadow-lg">
    <h1 
      class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-orange-600 drop-shadow-sm whitespace-nowrap tracking-tight"
      style="word-spacing: 0.1em;">
      TESTIMONI ALUMNI
    </h1>
    <p class="text-orange-500 text-base sm:text-lg mt-2 font-medium leading-snug">
      Cerita Inspiratif dari Para Lulusan SMK Prestasi Prima
    </p>
  </div>
</section>


<!-- ========== SECTION TESTIMONI DENGAN ORNAMENT & EFEK MODERN ========== -->
<section class="relative py-24 bg-gradient-to-b from-white via-orange-50/30 to-white overflow-hidden">
  <!-- ORNAMENT -->
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-orange-200/40 rounded-full blur-3xl opacity-60 animate-pulse"></div>
  <div class="absolute bottom-0 right-1/3 w-[400px] h-[400px] bg-orange-100/40 rounded-full blur-2xl opacity-60 animate-pulse-slow"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">
    <h2 class="text-3xl font-bold text-center text-orange-500 mb-14" data-aos="fade-up">
      Apa Kata Mereka Tentang SMK Prestasi Prima?
    </h2>

    <!-- SWIPER -->
    <div class="swiper mySwiper" data-aos="fade-up" data-aos-delay="200">
      <div class="swiper-wrapper">
        @for ($i = 1; $i <= 10; $i++)
          <div class="swiper-slide flex justify-center">
            <div class="relative group transition-all duration-500">
              <img 
                src="{{ asset('assets/images/testimoni/testimoni (' . $i . ').png') }}" 
                alt="Testimoni {{ $i }}" 
                class="w-full max-w-md h-64 object-contain transition-transform duration-700 ease-in-out group-hover:scale-105"
              >
              <!-- Efek glow halus -->
              <div class="absolute inset-0 rounded-xl bg-gradient-to-t from-orange-100/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>
          </div>
        @endfor
      </div>
    </div>
  </div>
</section>

<!-- SWIPER (fallback styles for no-JS browsers) -->
<noscript>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</noscript>

<script>
  const initAOSTestimonial = () => {
    const config = { duration: 1000, once: true };
    if (window.initAOS) {
      return window.initAOS(config);
    }
    if (typeof window.ensureAOS === 'function') {
      return window.ensureAOS().then((AOS) => {
        AOS.init(config);
        return AOS;
      });
    }
    if (window.AOS) {
      window.AOS.init(config);
      return Promise.resolve(window.AOS);
    }
    return Promise.reject(new Error('AOS loader is not available.'));
  };

  const initSwiperTestimoni = () => {
    const loadSwiper = () => {
      if (typeof window.ensureSwiper === 'function') {
        return window.ensureSwiper();
      }
      if (window.Swiper) {
        return Promise.resolve(window.Swiper);
      }
      return Promise.reject(new Error('Swiper loader is not available.'));
    };

    return loadSwiper().then((Swiper) => new Swiper('.mySwiper', {
      loop: true,
      centeredSlides: true,
      slidesPerView: 1,
      spaceBetween: 30,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      speed: 1000,
      breakpoints: {
        640: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    }));
  };

  const bootstrapTestimoni = () => {
    initAOSTestimonial().catch((error) => {
      console.error('Failed to initialize AOS on Testimoni page', error);
    });

    initSwiperTestimoni().catch((error) => {
      console.error('Failed to initialize Swiper on Testimoni page', error);
    });
  };

  if (document.readyState !== 'loading') {
    bootstrapTestimoni();
  } else {
    document.addEventListener('DOMContentLoaded', bootstrapTestimoni, { once: true });
  }
</script>

<!-- Animasi tambahan -->
<style>
  @keyframes pulse-slow {
    0%, 100% { opacity: 0.4; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.1); }
  }
  .animate-pulse-slow {
    animation: pulse-slow 8s infinite;
  }
</style>
@endsection
