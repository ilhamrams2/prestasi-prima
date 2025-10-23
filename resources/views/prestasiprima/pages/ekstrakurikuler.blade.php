@extends('prestasiprima.index')

@section('title', 'Ekstrakurikuler SMK Prestasi Prima')

@section('content')
<section 
  class="min-h-screen bg-white dark:bg-gray-900 pt-44 pb-28"
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
          ['nama' => 'Badminton', 'gambar' => 'badminton.jpg'],
          ['nama' => 'Basketball', 'gambar' => 'basketball.jpg'],
          ['nama' => 'Futsal', 'gambar' => 'futsall.jpg'],
          ['nama' => 'Voli', 'gambar' => 'volly.jpg'],
          ['nama' => 'English Club', 'gambar' => 'english.jpg'],
          ['nama' => 'Ganefo', 'gambar' => 'ganefo.jpg'],
          ['nama' => 'ICT Club', 'gambar' => 'ict.jpg'],
          ['nama' => 'KIR', 'gambar' => 'kir.jpg'],
          ['nama' => 'Modern Dance', 'gambar' => 'moderndance.jpg'],
          ['nama' => 'Orange Digital', 'gambar' => 'digital.jpg'],
          ['nama' => 'Orange Network', 'gambar' => 'network.jpg'],
          ['nama' => 'Orange Solution', 'gambar' => 'solution.jpg'],
          ['nama' => 'Orange Studio', 'gambar' => 'studio.jpg'],
          ['nama' => 'PMR', 'gambar' => 'pmr.jpg'],
          ['nama' => 'PPOC', 'gambar' => 'ppoc.jpg'],
          ['nama' => 'Pramuka', 'gambar' => 'pramuka.jpg'],
          ['nama' => 'Rohis', 'gambar' => 'rohis.jpg'],
          ['nama' => 'Rohkris', 'gambar' => 'rohkris.jpg'],
          ['nama' => 'Silat', 'gambar' => 'silat.png'],
          ['nama' => 'Tari Tradisional', 'gambar' => 'tari.jpg'],
          ['nama' => 'Esport', 'gambar' => 'esport.jpg'],
        ];
      @endphp

      @foreach ($ekskul as $index => $item)
      <div 
        class="group relative rounded-tr-[40px] rounded-bl-[40px]
               shadow-md hover:shadow-lg hover:shadow-orange-200/60
               transition duration-500 transform hover:-translate-y-2
               flex flex-col items-center justify-end text-center
               border border-transparent hover:border-orange-100 overflow-hidden min-h-[180px] md:min-h-[200px]"
        data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}"
        style="background-image: url('{{ asset('assets/images/ekskul/' . $item['gambar']) }}'); background-size: cover; background-position: center;"
      >
        <!-- Overlay gelap + efek hover -->
        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/25 transition duration-500"></div>

        <!-- Gradasi bawah untuk teks -->
        <div class="absolute bottom-0 left-0 right-0 h-1/3 bg-gradient-to-t from-black/60 to-transparent"></div>

        <!-- Nama Ekstrakurikuler -->
        <h3 class="relative z-10 text-base md:text-lg font-semibold text-white group-hover:text-orange-400 transition duration-300 mb-4">
          {{ $item['nama'] }}
        </h3>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
