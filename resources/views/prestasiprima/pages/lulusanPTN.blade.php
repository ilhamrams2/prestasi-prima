@extends('prestasiprima.index')

@section('title', 'Lulusan PTN — Prestasi Prima')

@push('styles')
<style>
  :root {
    --action-orange: #FF6B00;
    --deep-navy: #0e162e;
    --charcoal: #333333;
  }

  .font-outfit { font-family: 'Outfit', sans-serif; }
  .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

  .text-mask-hero {
    font-size: clamp(3.5rem, 12vw, 9rem);
    font-weight: 900;
    line-height: 0.85;
    letter-spacing: -0.04em;
    background: linear-gradient(135deg, var(--deep-navy) 0%, #1a2a4e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-transform: uppercase;
  }

  .text-ghost {
    position: absolute;
    font-family: 'Outfit', sans-serif;
    font-size: clamp(8rem, 25vw, 25rem);
    font-weight: 900;
    line-height: 1;
    color: rgba(230, 81, 0, 0.05);
    -webkit-text-stroke: 1px rgba(230, 81, 0, 0.15);
    white-space: nowrap;
    z-index: 0;
    pointer-events: none;
    text-transform: uppercase;
  }

  .highlight-orange {
    background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .ptn-swiper .swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background: var(--deep-navy) !important;
    opacity: 0.1;
    transition: all 0.3s ease;
  }

  .ptn-swiper .swiper-pagination-bullet-active {
    width: 32px;
    border-radius: 6px;
    opacity: 1;
    background: var(--action-orange) !important;
  }

  .nav-btn {
    width: 56px;
    height: 56px;
    background: #FFFFFF;
    color: var(--deep-navy);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 1px solid rgba(14, 22, 46, 0.1);
  }

  .nav-btn:hover {
    background: var(--action-orange);
    color: #FFFFFF;
    border-color: var(--action-orange);
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(255, 107, 0, 0.2);
  }

  .nav-btn.swiper-button-disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-48 pb-12 px-6 bg-white relative">
    <!-- Ghost Background Text -->
    <div class="text-ghost top-24 -left-20">CAMPUS</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Academic Excellence</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-12">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Gerbang Emas, <br>
            <span class="highlight-orange">Kampus Impian.</span>
          </h1>
        </div>
      </div>
      
      <div class="flex flex-col md:flex-row items-end justify-between mb-16 gap-8">
        <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
          <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-4xl tracking-tight">
            Kebanggaan kami, lulusan <span class="text-charcoal font-black border-b-4 border-orange-500/20">SMK Prestasi Prima</span> yang berhasil menembus Perguruan Tinggi Negeri ternama.
          </p>
        </div>
        
        <div class="flex items-center gap-4" data-aos="fade-left">
          <div class="nav-btn prev-btn">
            <iconify-icon icon="lucide:arrow-left" class="text-2xl"></iconify-icon>
          </div>
          <div class="nav-btn next-btn">
            <iconify-icon icon="lucide:arrow-right" class="text-2xl"></iconify-icon>
          </div>
        </div>
      </div>

      {{-- ========== AUTO SLIDER GRID (BELOW TEXT) ========== --}}
      <div class="relative" data-aos="fade-up" data-aos-delay="300">
        <div class="swiper ptn-swiper overflow-visible">
          <div class="swiper-wrapper py-8">
            @php
              $currentYear = date('Y');
              $students = [
                ['year' => $currentYear, 'img' => 'ptn1jpg.jpg'],
                ['year' => $currentYear, 'img' => 'ptn2jpg.jpg'],
                ['year' => $currentYear, 'img' => $currentYear == '2026' ? 'ptn3.jpg' : 'ptn3.jpg'], // Logic remains simple as we only have these assets
                ['year' => $currentYear, 'img' => 'ptn-4.jpg'],
                ['year' => $currentYear, 'img' => 'ptn5.jpg'],
                ['year' => $currentYear, 'img' => 'ptn6.jpg']
              ];
            @endphp

            @foreach($students as $index => $student)
            <div class="swiper-slide h-auto">
              <div class="group relative overflow-hidden rounded-[2.5rem] bg-gray-50 border border-gray-100 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                {{-- Image Container --}}
                <div class="aspect-[4/5] md:aspect-[3/4] overflow-hidden relative">
                  <img src="{{ asset('assets/images/ptn/' . $student['img']) }}" 
                       class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                       alt="Lulusan PTN">
                  
                  {{-- Overlay Year --}}
                  <div class="absolute bottom-6 left-6">
                     <div class="px-5 py-2 bg-orange-500 rounded-full shadow-lg shadow-orange-500/30">
                        <span class="text-white text-sm font-bold tracking-wider">Tahun {{ $student['year'] }}</span>
                     </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="swiper-pagination !-bottom-12"></div>
        </div>
      </div>
    </div>
  </section>

</div>

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    if (window.ensureSwiper) {
      window.ensureSwiper().then(SwiperModule => {
        const Swiper = SwiperModule.default || SwiperModule;
        
        new Swiper('.ptn-swiper', {
          slidesPerView: 1.2,
          spaceBetween: 20,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.next-btn',
            prevEl: '.prev-btn',
          },
          breakpoints: {
            640: {
              slidesPerView: 2.2,
              spaceBetween: 30,
            },
            1024: {
              slidesPerView: 3.5,
              spaceBetween: 40,
            }
          }
        });
      });
    }

    if (window.initAOS) {
      window.initAOS({ duration: 1000, once: true }).catch(e => console.error(e));
    }
  });
</script>
@endpush
@endsection
