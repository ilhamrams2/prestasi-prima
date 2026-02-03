@extends('prestasiprima.index')

@section('title', 'Testimoni Alumni - SMK Prestasi Prima')

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
    color: rgba(14, 22, 46, 0.02);
    -webkit-text-stroke: 1px rgba(14, 22, 46, 0.05);
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

  .testimonial-card {
    background: #FFFFFF;
    border-radius: 40px;
    padding: 48px;
    display: flex;
    flex-direction: column;
    gap: 48px;
    height: 100%;
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    border: 1px solid rgba(14, 22, 46, 0.05);
    position: relative;
  }

  @media (min-width: 1024px) {
    .testimonial-card {
      flex-direction: row;
      align-items: flex-start;
    }
  }

  .alumni-image-wrapper {
    flex-shrink: 0;
    width: 100%;
    aspect-ratio: 4/5;
    border-radius: 32px;
    overflow: hidden;
    background: #f8fafc;
  }

  @media (min-width: 1024px) {
    .alumni-image-wrapper {
      width: 320px;
    }
  }

  .alumni-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
  }

  .testimonial-card:hover .alumni-image {
    transform: scale(1.05);
  }

  .swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background: var(--deep-navy) !important;
    opacity: 0.1;
    transition: all 0.3s ease;
  }

  .swiper-pagination-bullet-active {
    width: 40px;
    border-radius: 10px;
    opacity: 1;
    background: var(--action-orange) !important;
  }

  .nav-btn {
    width: 60px;
    height: 60px;
    background: #FFFFFF;
    color: var(--deep-navy);
    border-radius: 20px;
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
    box-shadow: 0 15px 30px rgba(255, 107, 0, 0.2);
  }

  .quote-icon {
    position: absolute;
    top: 40px;
    right: 40px;
    font-size: 80px;
    color: rgba(255, 107, 0, 0.05);
    pointer-events: none;
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-48 pb-24 px-6 bg-white relative">
    <!-- Ghost Background Text -->
    <div class="text-ghost top-24 -left-20">ALUMNI</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Future-Ready Mentality</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Evolusi Skill, <br>
            <span class="highlight-orange">Revolusi Karier.</span>
          </h1>
        </div>
      </div>
      
      <div class="mt-12 lg:col-span-8" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-4xl tracking-tight">
          Kami tidak hanya memberikan ijazah, tapi <span class="text-charcoal font-black border-b-4 border-orange-500/20">cetak biru</span> menuju industri global.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== TESTIMONIAL SLIDER ========== --}}
  <section class="py-24 px-6 bg-white relative">
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center justify-between mb-16">
        <div data-aos="fade-right">
          <h2 class="font-outfit text-2xl font-bold text-gray-400 uppercase tracking-[0.3em]">Story of Impact</h2>
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

      <div class="swiper testimoniSwiper overflow-visible">
        <div class="swiper-wrapper py-10">
          @foreach($testimonis as $item)
          <div class="swiper-slide h-auto">
            <div class="testimonial-card">
              <iconify-icon icon="ri:double-quotes-r" class="quote-icon"></iconify-icon>
              
              <div class="alumni-image-wrapper">
                @if($item->foto)
                    <img src="{{ asset('storage/testimoni/' . $item->foto) }}" class="alumni-image" alt="{{ $item->nama }}">
                @else
                    <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                        <i class="ri-user-line text-6xl"></i>
                    </div>
                @endif
              </div>
              
              <div class="flex-1 flex flex-col justify-center">
                <div class="mb-8">
                  <h3 class="font-outfit text-4xl md:text-5xl font-black text-var(--deep-navy) mb-3 tracking-tighter" style="color: var(--deep-navy);">{{ $item->nama }}</h3>
                  <div class="flex items-center gap-3">
                    <span class="w-10 h-[2px] bg-orange-500"></span>
                    <p class="font-outfit font-bold text-orange-500 uppercase tracking-[0.2em] text-[10px]">{{ $item->jabatan }}</p>
                  </div>
                </div>

                <div class="mb-10">
                  <p class="font-jakarta font-bold text-gray-800 text-xl md:text-2xl leading-snug">
                    {{ $item->jabatan }}
                  </p>
                </div>

                <p class="font-jakarta text-gray-600 text-lg md:text-2xl leading-[1.6] italic opacity-80">
                  "{{ $item->pesan }}"
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        
        <div class="swiper-pagination mt-16 !relative !flex !justify-start"></div>
      </div>
    </div>
  </section>

</div>

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Initialize AOS
    if (window.initAOS) {
      window.initAOS({ duration: 1000, once: true }).catch(e => console.error("AOS Load", e));
    }

    // Initialize Swiper via ensureSwiper
    if (window.ensureSwiper) {
      window.ensureSwiper().then(SwiperModule => {
        const Swiper = SwiperModule.default || SwiperModule;
        
        new Swiper('.testimoniSwiper', {
          slidesPerView: 1,
          spaceBetween: 40,
          loop: true,
          grabCursor: true,
          autoplay: {
            delay: 6000,
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
        });
      });
    }
  });
</script>
@endpush
@endsection
