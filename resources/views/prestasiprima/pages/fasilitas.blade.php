@extends('prestasiprima.index')

@section('title', 'Fasilitas SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-white pt-44 pb-28 relative overflow-hidden">

  {{-- ========== HERO / HEADER ========== --}}
  <div class="text-center mb-16" data-aos="fade-down">
    <h1 class="text-4xl md:text-5xl font-bold text-[#0e162e] mb-4">
      Fasilitas <span class="text-orange-500">Prestasi Prima</span>
    </h1>
    <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
      Kami percaya bahwa setiap siswa memiliki potensi dan keunikan untuk dikembangkan menjadi individu yang utuh 
      dengan karakter kuat, dasar akademik, dan keterampilan tinggi.
    </p>
    <div class="w-24 h-[4px] bg-gradient-to-r from-orange-500 to-yellow-400 mx-auto mt-6 rounded-full shadow-lg shadow-orange-200/70"></div>
  </div>

  {{-- ========== LABORATORIUM & STUDIO ========== --}}
  <div class="max-w-7xl mx-auto px-6 mb-20">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-[#0e162e] mb-10">Laboratorium & Studio</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-6" data-aos="fade-up">
      @for ($i = 0; $i < 5; $i++)
      <div class="overflow-hidden rounded-2xl shadow-md hover:shadow-lg transition duration-300">
        <img src="{{ asset('assets/images/fasilitas/lab1.png') }}" alt="Fasilitas Laboratorium" class="w-full h-52 object-cover">
      </div>
      @endfor
    </div>
  </div>

  {{-- ========== FASILITAS AKADEMIK ========== --}}
  <div class="max-w-7xl mx-auto px-6 mb-20">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-[#0e162e] mb-10">Fasilitas Akademik</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-6" data-aos="fade-up">
      @for ($i = 0; $i < 3; $i++)
      <div class="overflow-hidden rounded-2xl shadow-md hover:shadow-lg transition duration-300">
        <img src="{{ asset('assets/images/fasilitas/lab1.png') }}" alt="Fasilitas Akademik" class="w-full h-52 object-cover">
      </div>
      @endfor
    </div>
  </div>

  {{-- ========== FASILITAS OLAHRAGA ========== --}}
  <div class="max-w-7xl mx-auto px-6 mb-20">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-[#0e162e] mb-10">Fasilitas Olahraga</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-6" data-aos="fade-up">
      @for ($i = 0; $i < 3; $i++)
      <div class="overflow-hidden rounded-2xl shadow-md hover:shadow-lg transition duration-300">
        <img src="{{ asset('assets/images/fasilitas/lab1.png') }}" alt="Fasilitas Olahraga" class="w-full h-52 object-cover">
      </div>
      @endfor
    </div>
  </div>

  {{-- ========== FASILITAS UMUM ========== --}}
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-2xl md:text-3xl font-bold text-center text-[#0e162e] mb-10">Fasilitas Umum</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-6" data-aos="fade-up">
      @for ($i = 0; $i < 4; $i++)
      <div class="overflow-hidden rounded-2xl shadow-md hover:shadow-lg transition duration-300">
        <img src="{{ asset('assets/images/fasilitas/lab1.png') }}" alt="Fasilitas Umum" class="w-full h-52 object-cover">
      </div>
      @endfor
    </div>
  </div>

</section>
@endsection
