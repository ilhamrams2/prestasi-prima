@extends('prestasiprima.index')

@section('title', 'Ekstrakurikuler SMK Prestasi Prima')

@section('content')
<section 
  class="min-h-screen bg-gradient-to-b from-orange-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-950 dark:to-gray-900 pt-44 pb-28"
>
  <!-- ======== Header ======== -->
  <div class="text-center mb-20" data-aos="fade-down">
    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-[#0e162e] dark:text-white tracking-tight">
      Ekstrakurikuler <span class="text-orange-500">Prestasi Prima</span>
    </h1>
    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto leading-relaxed">
      Ekstrakurikuler di SMK Prestasi Prima adalah wadah pengembangan minat dan bakat siswa
      untuk membentuk karakter unggul, mandiri, dan kreatif.
    </p>
    <div class="w-24 h-[4px] bg-gradient-to-r from-orange-500 to-yellow-400 mx-auto mt-8 rounded-full shadow-lg shadow-orange-200/70"></div>
  </div>

  <!-- ======== Grid Ekstrakurikuler ======== -->
  <div class="max-w-7xl mx-auto px-6 relative">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 md:gap-8 relative" data-aos="fade-up" data-aos-delay="200">

      @php
        $ekskul = [
          ['nama' => 'Badminton', 'gambar' => 'badminton.png'],
          ['nama' => 'Basketball', 'gambar' => 'basketball.png'],
          ['nama' => 'Futsal', 'gambar' => 'futsal.png'],
          ['nama' => 'Voli', 'gambar' => 'voli.png'],
          ['nama' => 'English Club', 'gambar' => 'english.png'],
          ['nama' => 'FPP (Film Photography Production)', 'gambar' => 'fpp.png'],
          ['nama' => 'GAMDEP', 'gambar' => 'gamdep.png'],
          ['nama' => 'ICT Club', 'gambar' => 'ict.png'],
          ['nama' => 'KIR', 'gambar' => 'kir.png'],
          ['nama' => 'Modern Dance', 'gambar' => 'dance.png'],
          ['nama' => 'Orange Digital', 'gambar' => 'digital.png'],
          ['nama' => 'Orange Network', 'gambar' => 'network.png'],
          ['nama' => 'Orange Solution', 'gambar' => 'solution.png'],
          ['nama' => 'Orange Studio', 'gambar' => 'studio.png'],
          ['nama' => 'PMR', 'gambar' => 'pmr.png'],
          ['nama' => 'PPOC', 'gambar' => 'ppoc.png'],
          ['nama' => 'Pramuka', 'gambar' => 'pramuka.png'],
          ['nama' => 'Rohis', 'gambar' => 'rohis.png'],
          ['nama' => 'Seni Bela Diri', 'gambar' => 'beladiri.png'],
          ['nama' => 'Silat', 'gambar' => 'silat.png'],
          ['nama' => 'Tari Tradisional', 'gambar' => 'tari.png'],
          ['nama' => 'Esport', 'gambar' => 'esport.jpg'],
        ];
      @endphp

      @foreach ($ekskul as $index => $item)
      <div 
        class="group bg-white dark:bg-gray-800 rounded-tr-[40px] rounded-bl-[40px]
               shadow-md hover:shadow-lg hover:shadow-orange-200/60
               transition duration-500 transform hover:-translate-y-2
               flex flex-col items-center justify-center p-6
               border border-transparent hover:border-orange-100 relative overflow-hidden"
        data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}"
      >
        <!-- Efek Hover Gradasi -->
        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-700"></div>

        <!-- Gambar Ekstrakurikuler -->
        <img 
          src="{{ asset('assets/images/ekskul/' . $item['gambar']) }}" 
          alt="{{ $item['nama'] }}" 
          class="relative z-10 max-h-16 md:max-h-20 object-contain opacity-90 group-hover:opacity-100 transition duration-500"
        >

        <!-- Nama Ekstrakurikuler -->
        <h3 class="relative z-10 mt-4 text-sm md:text-base font-semibold text-gray-700 dark:text-gray-100 group-hover:text-orange-500 transition duration-300 text-center">
          {{ $item['nama'] }}
        </h3>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
