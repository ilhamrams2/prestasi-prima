@extends('prestasiprima.index')

@section('title', 'Kegiatan Sekolah — SMK Prestasi Prima')

@push('styles')
<style>
  :root {
    --action-orange: #E65100;
    --deep-navy: #0e162e;
    --charcoal: #333333;
    --dark-orange: #BF4300;
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

  /* Activity Card Styling */
  .kegiatan-card {
    background: #ffffff;
    border: 1px solid rgba(230, 81, 0, 0.12);
    border-radius: 32px;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .kegiatan-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 30px 60px -15px rgba(255, 107, 0, 0.15);
    border-color: rgba(255, 107, 0, 0.2);
  }

  .kegiatan-image-wrapper {
    position: relative;
    aspect-ratio: 16/10;
    overflow: hidden;
    background: #f1f5f9;
  }

  .kegiatan-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
  }

  .kegiatan-card:hover .kegiatan-image {
    transform: scale(1.1);
  }

  .date-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 10px 16px;
    border-radius: 16px;
    text-align: center;
    box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    z-index: 10;
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

  .swiper-container {
    padding: 40px 20px 80px 20px !important;
    margin: 0 -20px;
  }

  /* Modal styling */
  .modal-backdrop {
    background: rgba(14, 22, 46, 0.8);
    backdrop-filter: blur(10px);
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative" x-data="{ 
    selectedKegiatan: null,
    openModal(item) {
        this.selectedKegiatan = item;
        document.body.style.overflow = 'hidden';
    },
    closeModal() {
        this.selectedKegiatan = null;
        document.body.style.overflow = 'auto';
    }
}">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-32 md:pt-48 pb-12 md:pb-20 px-6 bg-white relative">
    <div class="text-ghost top-16 md:top-24 -left-10 md:-left-20">ACTIVITIES</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-200">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-600 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#E65100]"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#E65100]">School Events</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Energi Kreativitas, <br>
            <span class="highlight-orange">Inspirasi Tanpa Batas.</span>
          </h1>
        </div>
      </div>
      
      <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
          Saksikan setiap momen berharga dan <span class="text-charcoal font-black border-b-4 border-[#E65100]/20">prestasi gemilang</span> yang membentuk karakter dan masa depan siswa kami.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== CONTENT SECTION ========== --}}
  <section class="pb-32 px-6 relative">
    <div class="max-w-7xl mx-auto">
      
      @if(count($kegiatan) >= 3)
        {{-- Slider Mode --}}
        <div class="relative group/swiper">
            <div id="kegiatan-swiper" class="swiper swiper-container overflow-visible">
              <div class="swiper-wrapper">
                @foreach($kegiatan as $item)
                  <div class="swiper-slide h-auto">
                    <div class="kegiatan-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                      <div class="kegiatan-image-wrapper">
                        @if($item->gambar)
                          <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="kegiatan-image">
                        @else
                          <div class="w-full h-full flex items-center justify-center bg-orange-50">
                            <iconify-icon icon="solar:gallery-bold-duotone" class="text-6xl text-orange-200"></iconify-icon>
                          </div>
                        @endif
                        <div class="date-badge">
                            <span class="block text-xl font-black text-[#E65100] leading-none">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</span>
                            <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M Y') }}</span>
                        </div>
                      </div>
                      <div class="p-8 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="px-3 py-1 bg-orange-50 text-[#E65100] rounded-lg text-[10px] font-black uppercase tracking-wider">Event</span>
                            <span class="text-gray-300 text-xs">|</span>
                            <span class="text-gray-400 text-xs font-bold">{{ $item->jam }} WIB</span>
                        </div>
                        <h3 class="font-outfit text-2xl font-black text-[#0e162e] mb-4 line-clamp-2 leading-tight">{{ $item->judul }}</h3>
                        <p class="font-jakarta text-gray-400 text-sm leading-relaxed mb-8 line-clamp-3">
                          {{ $item->deskripsi }}
                        </p>
                        <div class="mt-auto flex items-center justify-between">
                            <div class="flex items-center gap-2 text-gray-400">
                                <iconify-icon icon="solar:map-point-bold-duotone" class="text-[#E65100]"></iconify-icon>
                                <span class="text-xs font-bold">{{ $item->tempat }}</span>
                            </div>
                            <button @click="openModal({{ json_encode($item) }})" class="w-12 h-12 rounded-2xl bg-orange-50 text-[#E65100] hover:bg-[#E65100] hover:text-white transition-all duration-300">
                                <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            {{-- Navigation Buttons --}}
            <div class="absolute top-1/2 -left-4 lg:-left-20 -translate-y-1/2 z-20 hidden md:block">
                <button class="kegiatan-prev w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-white shadow-xl shadow-orange-900/5 flex items-center justify-center text-[#0e162e] hover:bg-[#E65100] hover:text-white transition-all transform hover:scale-110 active:scale-95 border border-gray-50">
                    <iconify-icon icon="lucide:chevron-left" class="text-xl lg:text-2xl"></iconify-icon>
                </button>
            </div>
            <div class="absolute top-1/2 -right-4 lg:-right-20 -translate-y-1/2 z-20 hidden md:block">
                <button class="kegiatan-next w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-white shadow-xl shadow-orange-900/5 flex items-center justify-center text-[#0e162e] hover:bg-[#E65100] hover:text-white transition-all transform hover:scale-110 active:scale-95 border border-gray-50">
                    <iconify-icon icon="lucide:chevron-right" class="text-xl lg:text-2xl"></iconify-icon>
                </button>
            </div>

            <div class="kegiatan-pagination flex justify-center gap-2 mt-8 md:mt-12"></div>
        </div>
      @else
        {{-- Grid Mode --}}
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($kegiatan as $item)
            <div class="kegiatan-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="kegiatan-image-wrapper">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="kegiatan-image">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-orange-50">
                            <iconify-icon icon="solar:gallery-bold-duotone" class="text-6xl text-orange-200"></iconify-icon>
                        </div>
                    @endif
                    <div class="date-badge">
                        <span class="block text-xl font-black text-[#E65100] leading-none">{{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}</span>
                        <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M Y') }}</span>
                    </div>
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-orange-50 text-[#E65100] rounded-lg text-[10px] font-black uppercase tracking-wider">Event</span>
                        <span class="text-gray-300 text-xs">|</span>
                        <span class="text-gray-400 text-xs font-bold">{{ $item->jam }} WIB</span>
                    </div>
                    <h3 class="font-outfit text-2xl font-black text-[#0e162e] mb-4 line-clamp-2 leading-tight">{{ $item->judul }}</h3>
                    <p class="font-jakarta text-gray-400 text-sm leading-relaxed mb-8 line-clamp-3">
                        {{ $item->deskripsi }}
                    </p>
                    <div class="mt-auto flex items-center justify-between">
                        <div class="flex items-center gap-2 text-gray-400">
                            <iconify-icon icon="solar:map-point-bold-duotone" class="text-[#E65100]"></iconify-icon>
                            <span class="text-xs font-bold">{{ $item->tempat }}</span>
                        </div>
                        <button @click="openModal({{ json_encode($item) }})" class="w-12 h-12 rounded-2xl bg-orange-50 text-[#E65100] hover:bg-[#E65100] hover:text-white transition-all duration-300">
                            <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      @endif

      {{-- "Lihat Semua" Section --}}
      <div class="mt-20 text-center" data-aos="zoom-in">
        <a href="{{ route('berita.index') }}" class="group inline-flex items-center gap-4 px-10 py-5 bg-[#0e162e] text-white rounded-[2rem] font-bold transition-all hover:bg-[#E65100] hover:shadow-2xl hover:shadow-orange-900/30">
            Lihat Berita Sekolah Lainnya
            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white/20 transition-colors">
                <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
            </div>
        </a>
      </div>
    </div>
  </section>

  {{-- ========== DETAIL MODAL ========== --}}
  <template x-if="selectedKegiatan">
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8">
        <div class="absolute inset-0 modal-backdrop" @click="closeModal()"></div>
        
        <div class="relative bg-white w-full max-w-5xl rounded-[3rem] overflow-hidden shadow-2xl flex flex-col md:flex-row max-h-[90vh]" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">
            
            {{-- Image Side --}}
            <div class="md:w-1/2 relative bg-slate-50 h-[300px] md:h-auto">
                <template x-if="selectedKegiatan.gambar">
                    <img :src="'{{ asset('storage') }}/' + selectedKegiatan.gambar" class="w-full h-full object-cover">
                </template>
                <template x-if="!selectedKegiatan.gambar">
                    <div class="w-full h-full flex items-center justify-center">
                        <iconify-icon icon="solar:gallery-bold-duotone" class="text-8xl text-orange-800/20"></iconify-icon>
                    </div>
                </template>
                
                {{-- Floating Close Btn (Mobile) --}}
                <button @click="closeModal()" class="md:hidden absolute top-6 right-6 w-12 h-12 rounded-full bg-white/80 backdrop-blur-md flex items-center justify-center text-[#0e162e]">
                    <iconify-icon icon="lucide:x" class="text-2xl"></iconify-icon>
                </button>
            </div>

            {{-- Content Side --}}
            <div class="md:w-1/2 p-10 md:p-16 flex flex-col overflow-y-auto custom-scrollbar-orange">
                <div class="hidden md:flex justify-end mb-8">
                    <button @click="closeModal()" class="w-14 h-14 rounded-2xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-orange-50 hover:text-[#E65100] transition-all">
                        <iconify-icon icon="lucide:x" class="text-2xl"></iconify-icon>
                    </button>
                </div>

                <div class="flex items-center gap-4 mb-6">
                    <div class="px-4 py-2 bg-orange-50 rounded-xl text-[#E65100] font-bold text-xs uppercase tracking-widest">Agenda Sekolah</div>
                    <span class="text-gray-400 font-bold" x-text="selectedKegiatan.tanggal"></span>
                </div>

                <h2 class="font-outfit text-3xl md:text-5xl font-black text-[#0e162e] mb-8 leading-tight" x-text="selectedKegiatan.judul"></h2>

                <div class="flex flex-wrap gap-6 mb-10">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-[#E65100]">
                            <iconify-icon icon="solar:clock-circle-bold-duotone" class="text-xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Waktu</p>
                            <p class="font-bold text-[#0e162e]" x-text="selectedKegiatan.jam + ' WIB'"></p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-[#E65100]">
                            <iconify-icon icon="solar:map-point-bold-duotone" class="text-xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Lokasi</p>
                            <p class="font-bold text-[#0e162e]" x-text="selectedKegiatan.tempat"></p>
                        </div>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none">
                    <p class="font-jakarta text-gray-500 text-lg leading-relaxed mb-6" x-text="selectedKegiatan.deskripsi"></p>
                </div>

                <div class="mt-auto pt-10">
                    <a href="https://wa.me/6285195928886" target="_blank" class="w-full flex items-center justify-center gap-3 px-8 py-5 bg-[#E65100] text-white rounded-2xl font-bold shadow-xl shadow-orange-900/20 hover:scale-[1.02] transition-all">
                        Tanyakan Detail via WhatsApp
                        <iconify-icon icon="lucide:message-circle" class="text-xl"></iconify-icon>
                    </a>
                </div>
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
    if (window.ensureSwiper && document.getElementById('kegiatan-swiper')) {
      window.ensureSwiper().then(SwiperModule => {
        const Swiper = SwiperModule.default || SwiperModule;
        new Swiper('#kegiatan-swiper', {
          slidesPerView: 1,
          spaceBetween: 30,
          loop: true,
          centeredSlides: false,
          autoplay: {
            delay: 4000,
            disableOnInteraction: false,
          },
          pagination: {
            el: '.kegiatan-pagination',
            clickable: true,
            bulletClass: 'nav-dot',
            bulletActiveClass: 'active',
          },
          navigation: {
            nextEl: '.kegiatan-next',
            prevEl: '.kegiatan-prev',
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
