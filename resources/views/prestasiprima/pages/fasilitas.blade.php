@extends('prestasiprima.index')

@section('title', 'Fasilitas - SMK Prestasi Prima')

@push('styles')
<style>
  :root {
    --action-orange: #FF6B00;
  }
  
  .font-outfit { font-family: 'Outfit', sans-serif; }
  .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

  .facility-card {
    background: #FFFFFF;
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.04);
    transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .facility-card:hover {
    transform: translateY(-8px);
    box-shadow: 0px 30px 60px rgba(255, 107, 0, 0.1);
  }

  .facility-image-wrapper {
    position: relative;
    overflow: hidden;
    aspect-ratio: 16/9;
  }

  .facility-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    filter: saturate(1.1);
  }

  .facility-card:hover .facility-image {
    transform: scale(1.08);
  }

  .label-overlay {
    position: absolute;
    bottom: 16px;
    left: 16px;
    padding: 12px 24px;
    background: rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.4s ease;
    max-width: calc(100% - 32px);
  }

  .facility-card:hover .label-overlay {
    opacity: 1;
    transform: translateY(0);
  }

  .tab-btn {
    position: relative;
    padding: 12px 28px;
    font-weight: 800;
    font-family: 'Outfit', sans-serif;
    color: #94a3b8;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 12px;
    font-size: 0.875rem;
    letter-spacing: 0.025em;
  }

  .tab-btn.active {
    color: #FFFFFF;
    background: var(--action-orange);
    box-shadow: 0 10px 20px rgba(255, 107, 0, 0.2);
  }

  /* Swiper Custom */
  .swiper-pagination-bullet-active {
    background: var(--action-orange) !important;
  }

  .nav-dots-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-top: 48px;
  }

  .nav-dot {
    width: 10px;
    height: 10px;
    border-radius: 20px;
    background: #FED7AA !important; /* Orange Muda (Inactive) */
    cursor: pointer;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    opacity: 1 !important;
    margin: 0 !important;
    display: inline-block;
  }

  .nav-dot.active {
    width: 10px;
    background: #FF6B00 !important; /* Orange Tua (Active) */
    box-shadow: 0 4px 15px rgba(255, 107, 0, 0.3);
  }

  .section-spacing {
    padding-top: 80px;
    padding-bottom: 80px;
  }

  .section-spacing-hero {
    padding-top: 180px;
    padding-bottom: 140px;
  }

  .section-spacing-gallery {
    padding-top: 20px;
    padding-bottom: 80px;
  }

  .section-spacing-tight {
    padding-top: 60px;
    padding-bottom: 60px;
  }

  .animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 8s ease infinite;
  }

  @keyframes gradient-x {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }

  .text-outline-orange {
    -webkit-text-stroke: 1px var(--action-orange);
    color: transparent;
  }

  .text-mask-title {
    font-size: clamp(4rem, 12vw, 15rem);
    font-weight: 950;
    line-height: 0.8;
    letter-spacing: -0.05em;
    background: linear-gradient(135deg, #FF6B00 0%, #FFB800 50%, #FF6B00 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 5s linear infinite;
  }

  @keyframes shine {
    to { background-position: 200% center; }
  }

  .virtual-wrapper {
    background: radial-gradient(circle at top right, rgba(255,107,0,0.05), transparent 400px),
                radial-gradient(circle at bottom left, rgba(255,107,0,0.05), transparent 400px);
  }

  .floating-image {
    animation: floating 6s ease-in-out infinite;
  }

  @keyframes floating {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
  }

  .asymmetrical-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 24px;
  }

  /* Responsive Grids */
  @media (max-width: 768px) {
    .asymmetrical-grid {
      display: flex;
      flex-direction: column;
    }
    .hero-title {
      font-size: 3.5rem;
      line-height: 1;
    }
    .text-mask-title {
      font-size: 5rem;
    }
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden">
  
 {{-- ========== VIRTUAL TOUR REDIRECT SECTION ========== --}}
  <section class="section-spacing pt-32 md:pt-48 px-6 bg-white overflow-hidden virtual-wrapper">
    <div class="max-w-7xl mx-auto">
      <div class="relative grid md:grid-cols-2 gap-16 items-center">
        
        <div data-aos="fade-right" class="relative z-20">
          <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 border border-orange-100 mb-6">
            <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
            <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Virtual Experience</span>
          </div>
          
          <h2 class="font-outfit text-5xl md:text-7xl font-black text-[#0e162e] mb-8 leading-[0.9] tracking-tighter">
            Jelajahi Setiap <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B00] to-[#FF9D00]">Sudut Sekolah.</span>
          </h2>
          
          <p class="font-jakarta text-gray-500 text-lg md:text-xl leading-relaxed mb-10 max-w-lg">
            Masuki dunia virtual SMK Prestasi Prima. Rasakan atmosfer belajar secara langsung melalui teknologi imersif 360° kami.
          </p>
          
          <div class="flex flex-wrap items-center gap-6">
            <a href="/virtual-tour" class="group relative px-10 py-5 bg-[#FF6B00] text-white rounded-2xl font-bold text-lg overflow-hidden transition-all hover:scale-105 hover:shadow-[0_20px_40px_rgba(255,107,0,0.3)] shadow-lg shadow-orange-100">
              <span class="relative z-10 flex items-center gap-3">
                Mulai Virtual Tour
                <iconify-icon icon="lucide:play-circle" class="text-2xl transition-transform group-hover:rotate-12"></iconify-icon>
              </span>
              <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
            </a>
            
            <a href="/pendaftaran" class="font-outfit font-bold text-[#0e162e] hover:text-[#FF6B00] transition-colors flex items-center gap-2 group">
              Daftar Sekarang
              <iconify-icon icon="lucide:arrow-up-right" class="transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"></iconify-icon>
            </a>
          </div>
        </div>
        
        <div class="relative" data-aos="fade-left">
          <!-- Text Masking Effect Background -->
          <div class="absolute inset-0 flex items-center justify-center opacity-20 select-none pointer-events-none -translate-y-12">
             <span class="text-mask-title">VIRTUAL</span>
          </div>
          
          <div class="relative z-10">
            <div class="relative rounded-[3rem] overflow-hidden aspect-[16/10] md:aspect-video group shadow-2xl bg-gray-50/50">
              <img src="{{ asset('assets/images/gedung/gedung.avif') }}" class="w-full h-full object-contain transition-transform duration-1000 group-hover:scale-105" alt="Virtual Tour Preview">
              <div class="absolute inset-0 bg-gradient-to-t from-[#0e162e]/20 via-transparent to-transparent"></div>
              
              <!-- Floating text over image with masking feel -->
              <div class="absolute inset-x-0 bottom-0 p-10">
                <h3 class="font-outfit text-6xl md:text-8xl font-black text-white/20 leading-none mb-4 select-none tracking-tighter">
                  360<span class="text-white/10 uppercase">view</span>
                </h3>
                <p class="font-jakarta text-white/60 text-sm font-medium tracking-widest uppercase">Immersive Environment</p>
              </div>
            </div>
            
            <!-- Floating Decorative Card -->
            <div class="absolute -bottom-10 -left-10 bg-white p-6 rounded-3xl shadow-2xl border border-gray-100 hidden md:block floating-image">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center text-[#FF6B00]">
                  <iconify-icon icon="lucide:cpu" class="text-2xl"></iconify-icon>
                </div>
                <div>
                  <p class="font-outfit font-bold text-[#0e162e]">High-End Lab</p>
                  <p class="font-jakarta text-gray-400 text-xs">Standard Industry</p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Masking Text Background Lower -->
           <div class="absolute -bottom-10 -right-10 pointer-events-none opacity-20">
              <h4 class="text-mask-title">TOUR</h4>
           </div>
        </div>
        
      </div>
    </div>
  </section>


  {{-- ========== LABORATORIUM & STUDIO (CORE VALUE) ========== --}}
  <section class="section-spacing-gallery px-6">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
        <div data-aos="fade-right">
          <span class="font-outfit text-[#FF6B00] font-bold uppercase tracking-widest text-xs mb-3 block">Digital Innovation Center</span>
          <h2 class="font-outfit text-2xl md:text-4xl font-black text-[#0e162e]">Laboratorium & Studio</h2>
        </div>
        <p class="font-jakarta text-gray-500 max-w-md md:text-right text-sm leading-relaxed" data-aos="fade-left">
          Pusat pengembangan skill teknis dengan standar industri internasional dan perangkat terbaru.
        </p>
      </div>

      <div class="asymmetrical-grid">
        {{-- Lab 1 --}}
        <div class="col-span-12 md:col-span-4" data-aos="fade-up" data-aos-delay="0">
          <div class="facility-card h-full">
            <div class="facility-image-wrapper h-64 md:h-full">
              <img src="{{ asset('assets/images/fasilitas/lab1.png') }}" class="facility-image" alt="Lab RPL">
              <div class="label-overlay">
                <p class="font-jakarta font-bold text-[#0e162e] text-sm">Laboratorium RPL</p>
                <p class="font-jakarta text-gray-600 text-[11px]">Pengembangan Software & Web</p>
              </div>
            </div>
          </div>
        </div>

        {{-- Lab 2 --}}
        <div class="col-span-12 md:col-span-4" data-aos="fade-up" data-aos-delay="100">
          <div class="facility-card h-full">
            <div class="facility-image-wrapper h-64 md:h-full">
              <img src="{{ asset('assets/images/fasilitas/lab2.png') }}" class="facility-image" alt="Lab TKJ">
              <div class="label-overlay">
                <p class="font-jakarta font-bold text-[#0e162e] text-sm">Laboratorium TKJ</p>
                <p class="font-jakarta text-gray-600 text-[11px]">Administrasi Jaringan & Server</p>
              </div>
            </div>
          </div>
        </div>

        {{-- Lab 3 --}}
        <div class="col-span-12 md:col-span-4" data-aos="fade-up" data-aos-delay="200">
          <div class="facility-card h-full">
            <div class="facility-image-wrapper h-64 md:h-full">
              <img src="{{ asset('assets/images/fasilitas/lab3.png') }}" class="facility-image" alt="Lab Multimedia">
              <div class="label-overlay">
                <p class="font-jakarta font-bold text-[#0e162e] text-sm">Laboratorium Multimedia</p>
                <p class="font-jakarta text-gray-600 text-[11px]">Editing Video & Desain Grafis</p>
              </div>
            </div>
          </div>
        </div>

        {{-- Lab 4 (Studio Highlight) --}}
        <div class="col-span-12 md:col-span-7" data-aos="fade-up" data-aos-delay="300">
          <div class="facility-card h-[300px] md:h-[450px]">
            <div class="facility-image-wrapper h-full">
              <img src="{{ asset('assets/images/fasilitas/lab4.png') }}" class="facility-image w-full h-full object-cover" alt="Studio Broadcasting">
              <div class="label-overlay">
                <div class="flex items-center gap-2 mb-1">
                  <span class="px-2 py-0.5 bg-orange-100 text-[#FF6B00] rounded text-[10px] font-black uppercase tracking-wider">Premium Facility</span>
                </div>
                <p class="font-outfit font-black text-[#0e162e] text-xl">Studio Podcast & Broadcasting</p>
                <p class="font-jakarta text-gray-600 text-sm">Produksi Konten Kreatif Standar Industri Digital</p>
              </div>
            </div>
          </div>
        </div>

        {{-- Lab 5 --}}
        <div class="col-span-12 md:col-span-5" data-aos="fade-up" data-aos-delay="400">
          <div class="facility-card h-[300px] md:h-[450px]">
            <div class="facility-image-wrapper h-full">
              <img src="{{ asset('assets/images/fasilitas/lab5.png') }}" class="facility-image w-full h-full object-cover" alt="Lab Inovasi">
              <div class="label-overlay">
                <p class="font-jakarta font-bold text-[#0e162e] text-sm">Laboratorium Inovasi</p>
                <p class="font-jakarta text-gray-600 text-[11px]">Pusat Riset & Pengembangan IoT</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <div class="h-12"></div> {{-- Subtle spacer --}}

  {{-- ========== AKADEMIK & UMUM (TABBED SLIDER) ========== --}}
  <section class="section-spacing-tight bg-gray-50/30" x-data="{ activeTab: 'akademik' }">
    <div class="max-w-7xl mx-auto px-6">
      <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="font-outfit text-3xl md:text-5xl font-black text-[#0e162e] mb-8">Fasilitas Penunjang</h2>
        
        <div class="flex items-center justify-center gap-4 bg-white p-2 rounded-2xl shadow-sm border border-gray-100 inline-flex">
          <button @click="activeTab = 'akademik'" :class="activeTab === 'akademik' ? 'active' : ''" class="tab-btn">
            Akademik
          </button>
          <button @click="activeTab = 'umum'" :class="activeTab === 'umum' ? 'active' : ''" class="tab-btn">
            Fasilitas Umum
          </button>
        </div>
      </div>

      {{-- Tab Content: Akademik --}}
      <div x-show="activeTab === 'akademik'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">
        <div id="swiper-akademik" class="swiper overflow-visible px-4">
          <div class="swiper-wrapper py-10">
            {{-- Akademik 1 --}}
            <div class="swiper-slide">
              <div class="facility-card">
                <div class="facility-image-wrapper aspect-16-9">
                  <img src="{{ asset('assets/images/fasilitas/saranabelajar1.png') }}" class="facility-image" alt="Ruang Kelas Modern">
                </div>
                <div class="p-6">
                  <h4 class="font-outfit font-bold text-[#0e162e] mb-2">Modern Classroom</h4>
                  <p class="font-jakarta text-gray-500 text-sm leading-relaxed">Ruang kelas ergonomis dengan ventilasi udara optimal dan pencahayaan yang mendukung fokus belajar.</p>
                </div>
              </div>
            </div>
            {{-- Akademik 2 --}}
            <div class="swiper-slide">
              <div class="facility-card">
                <div class="facility-image-wrapper aspect-16-9">
                  <img src="{{ asset('assets/images/fasilitas/saranabelajar2.png') }}" class="facility-image" alt="Smart Board">
                </div>
                <div class="p-6">
                  <h4 class="font-outfit font-bold text-[#0e162e] mb-2">Interactive Smart Board</h4>
                  <p class="font-jakarta text-gray-500 text-sm leading-relaxed">Implementasi teknologi layar sentuh interaktif untuk pengalaman belajar yang lebih kolaboratif.</p>
                </div>
              </div>
            </div>
            {{-- Akademik 3 --}}
            <div class="swiper-slide">
              <div class="facility-card">
                <div class="facility-image-wrapper aspect-16-9">
                  <img src="{{ asset('assets/images/fasilitas/saranabelajar3.png') }}" class="facility-image" alt="Digital Library">
                </div>
                <div class="p-6">
                  <h4 class="font-outfit font-bold text-[#0e162e] mb-2">Digital Library</h4>
                  <p class="font-jakarta text-gray-500 text-sm leading-relaxed">Koleksi buku fisik dan akses ke ribuan e-book internasional melalui portal literasi mandiri.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="akademik-pagination nav-dots-container"></div>
        </div>
      </div>

      {{-- Tab Content: Umum --}}
      <div x-show="activeTab === 'umum'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
        <div id="swiper-umum" class="swiper overflow-visible px-4">
          <div class="swiper-wrapper py-10">
            @php
              $fasumData = [
                ['name' => 'Masjid Al-Ikhlas', 'desc' => 'Pusat pembinaan spiritual dan character building seluruh civitas akademika.', 'img' => 'fasum1.png'],
                ['name' => 'Lapangan Olahraga', 'desc' => 'Sarana pengembangan fisik dan kegiatan luar ruangan yang luas dan nyaman.', 'img' => 'fasum2.png'],
                ['name' => 'Auditorium Utama', 'desc' => 'Gedung serbaguna untuk kegiatan seminar, pertunjukan seni, hingga upacara resmi.', 'img' => 'fasum3.png'],
                ['name' => 'Kantin Sehat', 'desc' => 'Menyediakan hidangan higienis dengan sistem pembayaran non-tunai yang modern.', 'img' => 'fasum4.png'],
                ['name' => 'Student Lounge', 'desc' => 'Area diskusi terbuka bergaya co-working space untuk menunjang kreativitas siswa.', 'img' => 'fasum5.png'],
              ];
            @endphp

            @foreach($fasumData as $index => $item)
            <div class="swiper-slide">
              <div class="facility-card">
                <div class="facility-image-wrapper aspect-16-9">
                  <img src="{{ asset('assets/images/fasilitas/'.$item['img']) }}" class="facility-image" alt="{{ $item['name'] }}">
                </div>
                <div class="p-6">
                  <h4 class="font-outfit font-bold text-[#0e162e] mb-2">{{ $item['name'] }}</h4>
                  <p class="font-jakarta text-gray-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="umum-pagination nav-dots-container"></div>
        </div>
      </div>
    </div>
  </section>
 
</div>

{{-- ========== SCRIPTS ========== --}}
@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // 1. Initialize AOS
    if (window.initAOS) {
      window.initAOS().catch(e => console.error("AOS Load", e));
    }

    // 2. Initialize Swipers via ensureSwiper
    if (window.ensureSwiper) {
      window.ensureSwiper().then(SwiperModule => {
        const Swiper = SwiperModule.default || SwiperModule;
        
        // Swiper Akademik
        const swiperAkademik = new Swiper('#swiper-akademik', {
          slidesPerView: 1,
          spaceBetween: 24,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
          },
          pagination: {
            el: '.akademik-pagination',
            clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + ' nav-dot"></span>';
            },
            bulletActiveClass: 'active'
          }
        });

        // Swiper Umum
        const swiperUmum = new Swiper('#swiper-umum', {
          slidesPerView: 1,
          spaceBetween: 24,
          loop: true,
          autoplay: {
            delay: 3000,
            disableOnInteraction: false,
          },
          breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
          },
          pagination: {
            el: '.umum-pagination',
            clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + ' nav-dot"></span>';
            },
            bulletActiveClass: 'active'
          }
        });

        // Refresh swiper when tab changes (needed because swiper might mismatch size when hidden)
        document.addEventListener('click', (e) => {
          if (e.target.closest('.tab-btn')) {
            setTimeout(() => {
              swiperAkademik.update();
              swiperUmum.update();
            }, 100);
          }
        });
      });
    }
  });
</script>
@endpush
@endsection

