<!-- ================= SECTION PRESTASI ================= -->
<section id="prestasi" class="py-20 bg-white relative overflow-hidden">
  @php
    $prestasiLogoPath = 'assets/images/logo-smk.png';
    $prestasiLogoSize = @getimagesize(public_path($prestasiLogoPath)) ?: [256, 256];
    $prestasiSlideFiles = ['satu.webp', 'dua.webp', 'tiga.webp', 'empat.webp', 'lima.webp', 'enam.webp'];
    $prestasiSlideSizes = [];
    foreach ($prestasiSlideFiles as $file) {
      $size = @getimagesize(public_path('assets/images/section/prestasi/' . $file)) ?: [1280, 720];
      $prestasiSlideSizes[$file] = ['width' => $size[0], 'height' => $size[1]];
    }
    $prestasiDecorLeft = @getimagesize(public_path('assets/images/section/prestasi/netowrk.svg')) ?: [560, 560];
    $prestasiDecorRight = @getimagesize(public_path('assets/images/section/tentang/race.svg')) ?: [600, 600];
  @endphp
  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">

    <!-- ===== Header ===== -->
    <div class="mb-12 text-center relative">
   <img src="{{ asset($prestasiLogoPath) }}" alt="Logo Sekolah" 
     width="{{ $prestasiLogoSize[0] }}"
     height="{{ $prestasiLogoSize[1] }}"
     class="mx-auto h-14 w-auto max-w-full object-contain mb-4"
           data-aos="zoom-in" data-aos-duration="1000">
      <h3 class="text-lg font-bold text-gray-800 mb-1" 
          data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
        Prestasi Kami
      </h3>
      <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mt-2">
        <span data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
          Mengabadikan momen berharga di balik setiap 
        </span>
        <span class="text-orange-600 font-extrabold glow-text" 
              data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
          kemenangan
        </span>
      </h2>
    </div>

    <!-- ===== Swiper Container ===== -->
    <div class="swiper prestasiSwiper relative">
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition transform duration-500 glow-slide">
            <img src="{{ asset('assets/images/section/prestasi/satu.webp') }}" alt="Juara Dua" width="{{ $prestasiSlideSizes['satu.webp']['width'] }}" height="{{ $prestasiSlideSizes['satu.webp']['height'] }}" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition transform duration-500 glow-slide">
            <img src="{{ asset('assets/images/section/prestasi/dua.webp') }}" alt="Juara Tiga" width="{{ $prestasiSlideSizes['dua.webp']['width'] }}" height="{{ $prestasiSlideSizes['dua.webp']['height'] }}" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition transform duration-500 glow-slide">
            <img src="{{ asset('assets/images/section/prestasi/tiga.webp') }}" alt="Juara Tiga" width="{{ $prestasiSlideSizes['tiga.webp']['width'] }}" height="{{ $prestasiSlideSizes['tiga.webp']['height'] }}" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition transform duration-500 glow-slide">
            <img src="{{ asset('assets/images/section/prestasi/empat.webp') }}" alt="Juara Empat" width="{{ $prestasiSlideSizes['empat.webp']['width'] }}" height="{{ $prestasiSlideSizes['empat.webp']['height'] }}" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition transform duration-500 glow-slide">
            <img src="{{ asset('assets/images/section/prestasi/lima.webp') }}" alt="Juara Lima" width="{{ $prestasiSlideSizes['lima.webp']['width'] }}" height="{{ $prestasiSlideSizes['lima.webp']['height'] }}" class="w-full object-cover">
          </div>
        </div>
        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition transform duration-500 glow-slide">
            <img src="{{ asset('assets/images/section/prestasi/enam.webp') }}" alt="Juara Enam" width="{{ $prestasiSlideSizes['enam.webp']['width'] }}" height="{{ $prestasiSlideSizes['enam.webp']['height'] }}" class="w-full object-cover">
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-6"></div>

      <!-- Navigation Buttons -->
      <div class="swiper-button-prev custom-nav"></div>
      <div class="swiper-button-next custom-nav"></div>
    </div>
  </div>

  <!-- Background Dekoratif -->
  <img src="{{ asset('assets/images/section/prestasi/netowrk.svg') }}" 
    alt="Network" 
    width="{{ $prestasiDecorLeft[0] }}"
    height="{{ $prestasiDecorLeft[1] }}"
       class="bg-deco-left absolute -bottom-16 -left-48 w-[460px] md:w-[560px] opacity-0 select-none pointer-events-none" 
       data-aos="fade-right" data-aos-duration="1200" data-aos-delay="500">

  <img src="{{ asset('assets/images/section/tentang/race.svg') }}" 
    alt="Race" 
    width="{{ $prestasiDecorRight[0] }}"
    height="{{ $prestasiDecorRight[1] }}"
       class="bg-deco-right absolute -bottom-80 -right-24 w-[480px] md:w-[600px] opacity-0 select-none pointer-events-none" 
       data-aos="fade-left" data-aos-duration="1200" data-aos-delay="600">
</section>

<!-- ===== Styles & Scripts ===== -->
<noscript>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</noscript>

<style>
  /* Swiper Navigation */
  .custom-nav {
    width: 28px !important;
    height: 28px !important;
    background-color: rgba(255,255,255,0.9);
    border-radius: 9999px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    color: #ea580c;
    transition: all 0.3s ease;
  }
  .custom-nav::after { font-size: 14px !important; font-weight: bold; }
  .custom-nav:hover { background-color: #ea580c; color: white; transform: scale(1.05); }
  .swiper-button-prev { left: 4px !important; }
  .swiper-button-next { right: 4px !important; }
  @media (max-width: 640px){
    .custom-nav { width: 24px !important; height: 24px !important; }
    .custom-nav::after { font-size: 12px !important; }
    .swiper-button-prev { left: 2px !important; }
    .swiper-button-next { right: 2px !important; }
  }

  /* Slide Glow */
  .glow-slide:hover {
    box-shadow: 0 0 30px rgba(255,165,0,0.6), 0 10px 20px rgba(0,0,0,0.2);
    transform: scale(1.08);
  }

  /* Glow Text Header */
  .glow-text { text-shadow: 0 0 8px rgba(255,165,0,0.7), 0 0 15px rgba(255,165,0,0.4); }

  /* Floating Background */
  @keyframes float-left {
    0% { transform: translateY(0) translateX(0); }
    50% { transform: translateY(-10px) translateX(10px); }
    100% { transform: translateY(0) translateX(0); }
  }
  @keyframes float-right {
    0% { transform: translateY(0) translateX(0); }
    50% { transform: translateY(-12px) translateX(-12px); }
    100% { transform: translateY(0) translateX(0); }
  }
  .bg-deco-left.floating { animation: float-left 6s ease-in-out infinite; }
  .bg-deco-right.floating { animation: float-right 7s ease-in-out infinite; }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const ensureSwiperInstance = () => {
    if (typeof window.ensureSwiper === 'function') {
      return window.ensureSwiper();
    }
    if (window.Swiper) {
      return Promise.resolve(window.Swiper);
    }
    return Promise.reject(new Error('Swiper loader is not available.'));
  };

  const ensureAOSInstance = () => {
    if (typeof window.ensureAOS === 'function') {
      return window.ensureAOS();
    }
    if (window.AOS) {
      return Promise.resolve(window.AOS);
    }
    return Promise.reject(new Error('AOS loader is not available.'));
  };

  ensureSwiperInstance().then((Swiper) => {
    new Swiper('.prestasiSwiper', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: { delay: 3000, disableOnInteraction: false },
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      breakpoints: {
        640: { slidesPerView: 2, spaceBetween: 20 },
        768: { slidesPerView: 3, spaceBetween: 24 },
        1024: { slidesPerView: 4, spaceBetween: 28 }
      }
    });

    return ensureAOSInstance();
  }).then((AOS) => {
    if (AOS) {
      AOS.init({ once: true, mirror: false });
    }

    const decoLeft = document.querySelector('.bg-deco-left');
    const decoRight = document.querySelector('.bg-deco-right');

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('floating');
          entry.target.classList.add('aos-animate');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    if (decoLeft) observer.observe(decoLeft);
    if (decoRight) observer.observe(decoRight);
  }).catch((err) => {
    console.error('Failed to bootstrap prestasi Swiper/AOS', err);
  });
});
</script>
