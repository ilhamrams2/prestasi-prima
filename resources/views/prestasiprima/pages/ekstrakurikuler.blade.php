@extends('prestasiprima.index')

@section('title', 'Ekstrakurikuler SMK Prestasi Prima')

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
    background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-24 md:pt-32 pb-20 px-6 bg-white relative">
    <div class="text-ghost top-24 -left-20">ACTIVITY</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Talent Development</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Eksplorasi Bakat, <br>
            <span class="highlight-orange">Prestasi Tanpa Batas.</span>
          </h1>
        </div>
      </div>
      
      <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
          SMK Prestasi Prima menyediakan wadah bagi siswa untuk mengembangkan <span class="text-charcoal font-black border-b-4 border-orange-500/20">minat dan bakat</span> melalui berbagai kegiatan ekstrakurikuler yang inspiratif dan berprestasi.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== GRID EKSTRAKURIKULER ========== --}}
  <section class="py-20 bg-gray-50/30 border-y border-gray-100 relative">
    <div class="max-w-7xl mx-auto px-6 relative">
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-8" data-aos="fade-up" data-aos-delay="200">

        @foreach ($ekskulList as $index => $item)
        <div
          class="group relative aspect-[4/5] sm:aspect-square rounded-[2rem] overflow-hidden bg-white shadow-md hover:shadow-2xl transition-all duration-700 hover:-translate-y-2 border border-gray-100"
          data-aos="zoom-in" data-aos-delay="{{ $index * 30 }}"
        >
          <!-- Background Reveal Image (Subtle) -->
          <div class="absolute inset-0 opacity-0 group-hover:opacity-5 scale-110 group-hover:scale-100 transition-all duration-1000 bg-cover bg-center"
               style="background-image: url('{{ asset('assets/images/gedung/gedungsiswa.avif') }}')"></div>
          
          <!-- Animated Aesthetic Gradient -->
          <div class="absolute -inset-2 bg-gradient-to-br from-orange-500/0 via-orange-500/0 to-orange-500/0 group-hover:from-orange-500/10 group-hover:via-transparent group-hover:to-orange-500/5 transition-all duration-700"></div>

          <!-- Main Content -->
          <div class="relative h-full flex flex-col items-center justify-center p-4 sm:p-6 z-10">
            <!-- Logo Circle -->
            <div class="w-24 h-24 md:w-36 md:h-36 flex-shrink-0 rounded-full overflow-hidden shadow-lg group-hover:shadow-2xl transition-all duration-500 flex items-center justify-center mb-6 border-4 border-white group-hover:border-orange-500/20 bg-gray-50">
              @if($item->gambar)
                  <img src="{{ asset('assets/images/ekskul/' . $item->gambar) }}" 
                       alt="{{ $item->nama }}" 
                       class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
              @else
                  <div class="flex flex-col items-center gap-2 text-slate-300">
                    <i class="ri-group-line text-4xl"></i>
                  </div>
              @endif
            </div>
            
            <!-- Name Tracking -->
            <h3 class="text-[10px] md:text-sm font-black text-gray-800 uppercase tracking-[0.15em] group-hover:text-orange-600 transition-colors text-center px-2">
              {{ $item->nama }}
            </h3>

            <!-- Decorative Line -->
            <div class="w-0 group-hover:w-8 h-1 bg-orange-500 mt-3 rounded-full transition-all duration-500"></div>
          </div>

          <!-- Hover Pulse Glow -->
          <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-orange-500/10 blur-[40px] rounded-full group-hover:scale-150 transition-transform duration-700"></div>
        </div>
        @endforeach

      </div>
    </div>
  </section>

    <section class="relative py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="relative rounded-[60px] overflow-hidden shadow-2xl group" data-aos="zoom-in">
                <img src="{{ asset('assets/images/gedung/gedung.avif') }}" 
                     alt="SMK Prestasi Prima" 
                     class="w-full h-[60vh] object-cover transform transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-[#FF6B00]/60 to-transparent flex flex-col justify-end p-12 md:p-20">
                    <h3 class="text-white text-4xl md:text-6xl font-black mb-4">Langkah Pertama <br> Menuju Sukses.</h3>
                    <a href="{{ route('pendaftaran') }}" class="px-10 py-5 bg-white text-[#FF6B00] font-black rounded-2xl w-fit shadow-xl hover:bg-orange-50 transition-colors">
                        Mulai Masa Depan Anda →
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    if (window.initAOS) {
      window.initAOS({ duration: 1000, once: true }).catch(e => console.error(e));
    }
  });
</script>
@endpush
@endsection

