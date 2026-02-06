@extends('prestasiprima.index')

@section('title', 'Karya & Proyek Siswa — SMK Prestasi Prima')

@push('styles')
<style>
  :root {
    --action-orange: #E65100;
    --deep-navy: #0e162e;
    --charcoal: #333333;
    --soft-bg: #f8fafc;
  }

  .font-outfit { font-family: 'Outfit', sans-serif; }
  .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

  .text-mask-hero {
    font-size: clamp(3.2rem, 10vw, 8rem);
    font-weight: 950;
    line-height: 0.9;
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
    background: linear-gradient(135deg, #E65100 0%, #FF6B00 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .project-card {
    background: #FFFFFF;
    border-radius: 40px;
    border: 1px solid rgba(230, 81, 0, 0.12);
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .project-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 40px 80px -20px rgba(230, 81, 0, 0.15);
    border-color: rgba(230, 81, 0, 0.05);
  }

  .tag-pill {
    padding: 6px 16px;
    border-radius: 12px;
    background: #f1f5f9;
    color: #64748b;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: all 0.3s ease;
  }

  .project-card:hover .tag-pill {
    background: rgba(230, 81, 0, 0.1);
    color: var(--action-orange);
  }

  /* Swiper Custom */
  .swiper-container-projects {
    padding: 40px 20px 80px 20px !important;
    margin: 0 -20px;
  }

  .nav-dot {
    width: 10px;
    height: 10px;
    border-radius: 20px;
    background: #FED7AA !important;
    cursor: pointer;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    opacity: 1 !important;
  }

  .nav-dot.active {
    width: 30px;
    background: #E65100 !important;
  }

  /* Modal styling */
  .modal-backdrop {
    background: rgba(14, 22, 46, 0.8);
    backdrop-filter: blur(15px);
  }

  .custom-scrollbar-projects::-webkit-scrollbar { width: 6px; }
  .custom-scrollbar-projects::-webkit-scrollbar-track { background: transparent; }
  .custom-scrollbar-projects::-webkit-scrollbar-thumb { background: #E65100; border-radius: 10px; }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative" x-data="{ 
    selectedProject: null,
    openModal(project) {
        this.selectedProject = project;
        document.body.style.overflow = 'hidden';
    },
    closeModal() {
        this.selectedProject = null;
        document.body.style.overflow = 'auto';
    }
}">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-32 md:pt-48 pb-12 md:pb-20 px-6 bg-white relative">
    <!-- Ghost Background Text -->
    <div class="text-ghost top-16 md:top-24 -left-10 md:-left-20">WORKS</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-200">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-600 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#E65100]"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#E65100]">Innovation Hub</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Karya Kreatif, <br>
            <span class="highlight-orange">Inovasi Mendatang.</span>
          </h1>
        </div>
      </div>
      
      <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
          Eksplorasi ide, teknologi, dan dedikasi siswa <span class="text-charcoal font-black border-b-4 border-[#E65100]/20">SMK Prestasi Prima</span> dalam menciptakan solusi digital dan karya seni inspiratif.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== PROJECTS SECTION ========== --}}
  <section class="pb-32 px-6 bg-white relative">
    <div class="max-w-7xl mx-auto">
      
      @if(count($projects) >= 3)
        {{-- Slider Mode --}}
        <div class="relative group/swiper">
          <div id="projects-swiper" class="swiper swiper-container-projects overflow-visible">
            <div class="swiper-wrapper">
              @foreach ($projects as $project)
                  <div class="swiper-slide h-auto">
                      @include('prestasiprima.components.project-card', ['project' => $project])
                  </div>
              @endforeach
            </div>
          </div>
          
          {{-- Navigation Buttons --}}
          <div class="absolute top-1/2 -left-4 lg:-left-20 -translate-y-1/2 z-20 hidden md:block">
              <button class="project-prev w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-white shadow-xl shadow-orange-900/5 flex items-center justify-center text-[#0e162e] hover:bg-[#E65100] hover:text-white transition-all transform hover:scale-110 active:scale-95 border border-gray-50">
                  <iconify-icon icon="lucide:chevron-left" class="text-xl lg:text-2xl"></iconify-icon>
              </button>
          </div>
          <div class="absolute top-1/2 -right-4 lg:-right-20 -translate-y-1/2 z-20 hidden md:block">
              <button class="project-next w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-white shadow-xl shadow-orange-900/5 flex items-center justify-center text-[#0e162e] hover:bg-[#E65100] hover:text-white transition-all transform hover:scale-110 active:scale-95 border border-gray-50">
                  <iconify-icon icon="lucide:chevron-right" class="text-xl lg:text-2xl"></iconify-icon>
              </button>
          </div>

          <div class="projects-pagination flex justify-center gap-2 mt-8 md:mt-12"></div>
        </div>
      @else
        {{-- Grid Mode --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @foreach ($projects as $project)
                @include('prestasiprima.components.project-card', ['project' => $project])
            @endforeach
        </div>
      @endif

    </div>
  </section>

  {{-- ========== FULL WIDTH BANNER ========== --}}
  <section class="relative py-32 px-6">
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="relative rounded-[60px] overflow-hidden shadow-3xl group" data-aos="zoom-in">
            <img src="{{ asset('assets/images/gedung/gedung.avif') }}" 
                 alt="SMK Prestasi Prima" 
                 class="w-full h-[50vh] md:h-[65vh] object-cover transform transition-transform duration-1000 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-[#E65100]/90 via-[#E65100]/40 to-transparent flex flex-col justify-end p-8 md:p-24">
                <div class="max-w-2xl">
                    <h3 class="font-outfit text-white text-3xl md:text-7xl font-black mb-6 md:mb-8 leading-tight md:leading-[0.9]">Mulai Langkah Inovasimu Sekarang.</h3>
                    <a href="{{ route('pendaftaran') }}" class="inline-flex items-center gap-4 px-8 py-4 md:px-10 md:py-5 bg-white text-[#E65100] font-outfit font-black text-xs md:text-sm uppercase tracking-widest rounded-2xl md:rounded-3xl shadow-2xl hover:bg-[#0e162e] hover:text-white transition-all transform hover:scale-105">
                        Daftar Sebagai Siswa Baru
                        <iconify-icon icon="lucide:arrow-right-circle" class="text-xl md:text-2xl"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
  </section>

  {{-- ========== DETAIL MODAL ========== --}}
  <template x-if="selectedProject">
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8">
        <div class="absolute inset-0 modal-backdrop" @click="closeModal()"></div>
        
        <div class="relative bg-white w-full max-w-5xl rounded-[3.5rem] overflow-hidden shadow-2xl flex flex-col md:flex-row max-h-[90vh]" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">
            
            {{-- Close Button (Absolute) --}}
            <button @click="closeModal()" class="absolute top-8 right-8 w-14 h-14 rounded-full bg-white/80 backdrop-blur-md flex items-center justify-center text-[#0e162e] z-50 hover:bg-[#E65100] hover:text-white transition-all duration-300">
                <iconify-icon icon="lucide:x" class="text-2xl"></iconify-icon>
            </button>

            {{-- Left Side: Image/Visual --}}
            <div class="md:w-1/2 relative bg-slate-50 h-[300px] md:h-auto overflow-hidden">
                <template x-if="selectedProject.gambar">
                    <img :src="'{{ asset('assets/images/karya-proyek') }}/' + selectedProject.gambar" class="w-full h-full object-cover">
                </template>
                <template x-if="!selectedProject.gambar">
                    <div class="w-full h-full flex items-center justify-center">
                        <iconify-icon icon="solar:gallery-bold-duotone" class="text-9xl text-orange-800/20"></iconify-icon>
                    </div>
                </template>
            </div>

            {{-- Right Side: Content --}}
            <div class="md:w-1/2 p-8 md:p-16 flex flex-col overflow-y-auto custom-scrollbar-projects">
                <div class="flex items-center gap-4 mb-6">
                    <div class="px-3 py-1.5 md:px-4 md:py-2 bg-orange-50 rounded-lg md:rounded-xl text-[#E65100] font-bold text-[9px] md:text-[10px] uppercase tracking-widest" x-text="selectedProject.kategori"></div>
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                    <span class="text-gray-400 font-bold text-[10px] uppercase tracking-widest">Student Innovation</span>
                </div>

                <h2 class="font-outfit text-2xl md:text-5xl font-black text-[#0e162e] mb-6 md:mb-8 leading-tight" x-text="selectedProject.judul"></h2>

                <div class="prose prose-slate max-w-none mb-8 md:mb-10">
                    <p class="font-jakarta text-gray-500 text-base md:text-lg leading-relaxed" x-text="selectedProject.deskripsi"></p>
                </div>

                <div class="mb-10">
                    <h4 class="font-outfit text-sm font-black text-[#0e162e] uppercase tracking-widest mb-4">Core Technologies</h4>
                    <div class="flex flex-wrap gap-2">
                        <template x-for="tag in (selectedProject.tags ? selectedProject.tags.split(',') : [])">
                            <span class="px-4 py-2 bg-gray-50 border border-gray-100 rounded-xl text-gray-500 font-bold text-xs uppercase tracking-tight" x-text="tag.trim()"></span>
                        </template>
                    </div>
                </div>

                <template x-if="selectedProject.link && selectedProject.link !== '#'">
                    <div class="mt-auto">
                        <a :href="selectedProject.link" target="_blank" class="flex items-center justify-center gap-3 px-8 py-5 bg-[#0e162e] text-white rounded-2xl font-bold shadow-xl hover:bg-[#E65100] hover:scale-[1.02] transition-all duration-300">
                            Explore Live Project
                            <iconify-icon icon="lucide:external-link" class="text-xl"></iconify-icon>
                        </a>
                    </div>
                </template>
            </div>
        </div>
    </div>
  </template>

</div>

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Initialize AOS
    if (window.initAOS) {
      window.initAOS({ duration: 1000, once: true }).catch(e => console.error(e));
    }

    // Initialize Swiper if needed
    if (window.ensureSwiper && document.getElementById('projects-swiper')) {
      window.ensureSwiper().then(SwiperModule => {
        const Swiper = SwiperModule.default || SwiperModule;
        new Swiper('#projects-swiper', {
          slidesPerView: 1,
          spaceBetween: 30,
          loop: true,
          centeredSlides: false,
          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
          },
          pagination: {
            el: '.projects-pagination',
            clickable: true,
            bulletClass: 'nav-dot',
            bulletActiveClass: 'active',
          },
          navigation: {
            nextEl: '.project-next',
            prevEl: '.project-prev',
          },
          breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
          }
        });
      });
    }
  });
</script>
@endpush
@endsection
