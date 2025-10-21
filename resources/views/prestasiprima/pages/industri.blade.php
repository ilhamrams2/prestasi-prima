@extends('prestasiprima.index')

@section('title', 'Mitra Industri')

@section('content')
<section class="relative z-10 overflow-hidden pt-28 md:pt-36 pb-24 bg-gradient-to-b from-white via-orange-50/40 to-white">
  <div class="absolute inset-0 -z-10">
    {{-- Aksen background oranye lembut --}}
    <div class="absolute top-[-100px] right-[-120px] w-[350px] h-[350px] bg-orange-200/40 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-[-120px] left-[-120px] w-[300px] h-[300px] bg-orange-300/30 blur-[100px] rounded-full"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 w-[80%] h-[1px] bg-gradient-to-r from-transparent via-orange-300/30 to-transparent"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center relative">

    {{-- ===== TEKS PEMBUKA ===== --}}
    <div class="mb-14" data-aos="fade-down" data-aos-duration="900">
      <p class="text-orange-600 font-semibold tracking-wide uppercase mb-4">
        Sinergi Dunia Pendidikan & Industri
      </p>
      <h3 class="text-xl md:text-2xl text-gray-700 font-medium leading-relaxed max-w-4xl mx-auto mb-4">
        <span class="text-orange-500 font-semibold">SMK Prestasi Prima</span> berkomitmen menciptakan lulusan yang
        siap menghadapi tantangan dunia kerja melalui kemitraan strategis dengan berbagai
        perusahaan dan lembaga industri terkemuka di Indonesia.
      </h3>
      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed mb-3">
        Melalui kerja sama yang erat, kami menghadirkan pengalaman belajar berbasis industri
        yang mengintegrasikan teori dan praktik nyata. Program magang, pelatihan profesional,
        serta bimbingan karier menjadi wujud nyata dari kolaborasi yang berkesinambungan.
      </p>
      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">
        Kolaborasi ini tidak hanya meningkatkan kompetensi peserta didik, tetapi juga membangun
        jejaring kemitraan yang memperkuat ekosistem pendidikan vokasi menuju masa depan yang berdaya saing.
      </p>
    </div>
    
    {{-- ===== HEADER ELEGAN ===== --}}
    <div class="mb-16 relative" data-aos="fade-up" data-aos-duration="800">
      <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-24 h-24 bg-gradient-to-tr from-orange-100 to-transparent rounded-full blur-2xl opacity-60"></div>
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4 tracking-tight">
        Mitra <span class="text-orange-600">Industri</span>
      </h2>
      <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed text-base md:text-lg">
        Kolaborasi strategis bersama perusahaan, lembaga, dan institusi ternama untuk mendukung 
        pembelajaran berbasis industri serta peningkatan kompetensi peserta didik.
      </p>
    </div>

    {{-- ===== GRID MITRA (tetap sama) ===== --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 md:gap-8 relative" data-aos="fade-up" data-aos-delay="200">
      @php
        $mitras = [
          'antam' => 'Antam',
          'erlangga' => 'Erlangga',
          'jatelindo' => 'Jatelindo',
          'kemenkop' => 'Kemenkop',
          'komatsu' => 'Komatsu',
          'lemnegara' => 'Lemnegara',
          'panasonic' => 'Panasonic',
          'prambos' => 'Prambos',
          'starvision' => 'Starvision',
          'telkom' => 'Telkom',
          'wika' => 'WIKA'
        ];
      @endphp

      @foreach ($mitras as $slug => $name)
      <div 
        class="group bg-white rounded-tr-[40px] rounded-bl-[40px] 
               shadow-md hover:shadow-lg hover:shadow-orange-200/60 
               transition duration-500 transform hover:-translate-y-1
               flex items-center justify-center p-6 border border-transparent hover:border-orange-100 relative overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-700"></div>

        <img src="{{ asset('assets/images/section/industri/' . $slug . '.png') }}" 
             alt="{{ $name }}" 
             class="relative z-10 max-h-16 md:max-h-20 object-contain opacity-90 group-hover:opacity-100 transition duration-500">
      </div>
      @endforeach
    </div>
  </div>

  {{-- ===== AKSEN GELOMBANG BAWAH ===== --}}
  <div class="absolute bottom-0 left-0 w-full">
    <svg class="w-full h-28 md:h-36 text-orange-100" viewBox="0 0 1440 320" fill="currentColor">
      <path fill-opacity="1" 
        d="M0,288 
           C80,280,160,272,240,240
           C320,208,400,144,480,138.7
           C560,133,640,187,720,202.7
           C800,219,880,197,960,170.7
           C1040,144,1120,112,1200,130.7
           C1280,149,1360,219,1440,300
           L1440,320L0,320Z">
      </path>
    </svg>
  </div>
</section>

{{-- AOS Animation --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 900, once: true });
</script>
@endsection
