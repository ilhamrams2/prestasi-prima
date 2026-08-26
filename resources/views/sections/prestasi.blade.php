<!-- ================= SECTION PRESTASI ================= -->
<section id="prestasi" class="py-20 bg-white relative overflow-hidden">
  @php
    $prestasiLogoPath = 'assets/images/logo-smk.png';
    $prestasiLogoSize = @getimagesize(public_path($prestasiLogoPath)) ?: [256, 256];
    $prestasis = \App\Models\prestasiprima\Prestasi::getForLanding();
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

    <!-- ===== Swiper Wrapper ===== -->
    <div class="relative mt-8 px-4 sm:px-14" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
      <div class="swiper prestasiSwiper !p-10 !-m-10">
        <div class="swiper-wrapper">
          <!-- Dynamic Prestasi Slides from Database -->
          @forelse ($prestasis as $prestasi)
            <div class="swiper-slide">
              <div class="prestasi-card bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 group transition-all duration-300 hover:shadow-md">
                <img src="{{ $prestasi->gambar_url }}" 
                     alt="{{ $prestasi->judul }}" 
                     loading="lazy" 
                     class="w-full aspect-[3/4] object-cover">
              </div>
            </div>
          @empty
            @foreach(['satu.webp', 'dua.webp', 'tiga.webp', 'empat.webp', 'lima.webp', 'enam.webp'] as $defaultImg)
              <div class="swiper-slide">
                <div class="prestasi-card bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                  <img src="{{ asset('assets/images/section/prestasi/' . $defaultImg) }}" 
                       alt="Prestasi Siswa SMK Prestasi Prima" 
                       loading="lazy" 
                       class="w-full aspect-[3/4] object-cover">
                </div>
              </div>
            @endforeach
          @endforelse
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination !-bottom-1"></div>
      </div>

      <!-- Navigation Buttons -->
      <button class="prestasi-nav-prev custom-nav-v3 -left-4 sm:-left-8" aria-label="Sebelumnya">
        <iconify-icon icon="lucide:chevron-left"></iconify-icon>
      </button>
      <button class="prestasi-nav-next custom-nav-v3 -right-4 sm:-right-8" aria-label="Selanjutnya">
        <iconify-icon icon="lucide:chevron-right"></iconify-icon>
      </button>
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

<style>
  /* Swiper Navigation V3 - Premium Glass Look */
  .custom-nav-v3 {
    position: absolute;
    top: 50%;
    z-index: 10;
    width: 42px !important;
    height: 42px !important;
    background-color: white !important;
    border-radius: 9999px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    color: #ea580c !important;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }
  
  /* Hover Effect: Pulse & Glow */
  .custom-nav-v3:hover { 
    background-color: #ea580c !important; 
    color: white !important; 
    transform: scale(1.15); 
    box-shadow: 0 8px 25px rgba(234, 88, 12, 0.4);
    border-color: transparent;
  }

  /* Responsive Adjustments */
  @media (max-width: 639px) {
    .custom-nav-v3 {
      width: 40px !important;
      height: 40px !important;
      background-color: rgba(255, 255, 255, 0.95) !important;
    }
  }

  /* Prestasi Card Hover */
  .prestasi-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    transform-origin: center;
    border: 1px solid #f3f4f6;
  }
  .prestasi-card:hover {
    transform: scale(1.05);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    z-index: 20;
    position: relative;
    border-color: #ffedd5;
  }

  /* Swiper Pagination Dot Custom */
  .swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background: #d1d5db;
    opacity: 1;
    transition: all 0.3s ease;
  }
  .swiper-pagination-bullet-active {
    background: #ea580c;
    width: 24px;
    border-radius: 5px;
  }

  /* Glow Text Header */
  .glow-text { text-shadow: 0 0 8px rgba(255,165,0,0.5); }

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
      navigation: { nextEl: '.prestasi-nav-next', prevEl: '.prestasi-nav-prev' },
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
