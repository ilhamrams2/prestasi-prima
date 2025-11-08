@extends('prestasiprima.index')

@section('title', 'Fasilitas SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-white via-orange-50/20 to-white pt-44 pb-32 overflow-hidden">

  {{-- ========== HERO / HEADER ========== --}}
  <div class="text-center mb-20" data-aos="fade-down">
    <h1 class="text-4xl md:text-5xl font-extrabold text-[#0e162e] mb-4 tracking-tight">
      Fasilitas <span class="text-orange-500">Prestasi Prima</span>
    </h1>
    <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed text-lg">
      Kami menyediakan lingkungan belajar modern yang mendukung kreativitas, inovasi, dan pembelajaran berbasis teknologi.
    </p>
    <div class="w-24 h-[3px] bg-gradient-to-r from-orange-500 to-yellow-400 mx-auto mt-6 rounded-full"></div>
  </div>

  {{-- ========== LABORATORIUM & STUDIO ========== --}}
  <div class="max-w-7xl mx-auto px-6 mb-28">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-[#0e162e] mb-12">Laboratorium & Studio</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-10" data-aos="fade-up" data-aos-delay="100">
      @for ($i = 1; $i <= 5; $i++)
      <div class="group flex justify-center items-center bg-white rounded-2xl relative">
        <img src="{{ asset('assets/images/fasilitas/lab' . $i . '.png') }}"
             alt="Laboratorium {{ $i }}"
             class="w-full h-64 object-contain transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)] transform group-hover:scale-105 group-hover:translate-y-[-4px]">
      </div>
      @endfor
    </div>
  </div>

  {{-- ========== FASILITAS AKADEMIK ========== --}}
  <div class="max-w-7xl mx-auto px-6 mb-28">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-[#0e162e] mb-12">Fasilitas Akademik</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-10" data-aos="fade-up" data-aos-delay="200">
      @for ($i = 1; $i <= 3; $i++)
      <div class="group flex justify-center items-center bg-white rounded-2xl relative">
        <img src="{{ asset('assets/images/fasilitas/saranabelajar' . $i . '.png') }}"
             alt="Fasilitas Akademik {{ $i }}"
             class="w-full h-64 object-contain transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)] transform group-hover:scale-105 group-hover:translate-y-[-4px]">
      </div>
      @endfor
    </div>
  </div>

  {{-- ========== FASILITAS UMUM ========== --}}
  <div class="max-w-7xl mx-auto px-6 mb-12">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-[#0e162e] mb-12">Fasilitas Umum</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-10" data-aos="fade-up" data-aos-delay="300">
      @for ($i = 1; $i <= 5; $i++)
      <div class="group flex justify-center items-center bg-white rounded-2xl relative">
        <img src="{{ asset('assets/images/fasilitas/fasum' . $i . '.png') }}"
             alt="Fasilitas Umum {{ $i }}"
             class="w-full h-64 object-contain transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)] transform group-hover:scale-105 group-hover:translate-y-[-4px]">
      </div>
      @endfor
    </div>
  </div>

</section>

{{-- ========== AOS ANIMATION ========== --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const config = { duration: 1000, once: true, offset: 120 };
    if (window.initAOS) {
      window.initAOS(config).catch((error) => console.error('Failed to initialize AOS on Fasilitas page', error));
    } else if (typeof window.ensureAOS === 'function') {
      window.ensureAOS().then((AOS) => AOS.init(config)).catch((error) => console.error('Failed to initialize AOS on Fasilitas page', error));
    } else if (window.AOS) {
      window.AOS.init(config);
    }
  });
</script>
@endsection
