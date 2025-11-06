@extends('prestasiprima.index')

@section('title', 'Ekstrakurikuler SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-white via-orange-50/20 to-white pt-44 pb-28 relative overflow-hidden">
  <!-- ======== Header ======== -->
  <div class="text-center mb-16" data-aos="fade-down">
    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-[#0e162e] tracking-tight">
      Ekstrakurikuler <span class="text-orange-500">Prestasi Prima</span>
    </h1>
    <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
      Wadah pengembangan minat dan bakat siswa untuk membentuk karakter unggul, mandiri, dan kreatif.
    </p>
    <div class="w-24 h-[4px] bg-gradient-to-r from-orange-500 to-yellow-400 mx-auto mt-6 rounded-full shadow-lg shadow-orange-200/70"></div>
  </div>

  <!-- ======== Grid Ekstrakurikuler ======== -->
  <div class="max-w-7xl mx-auto px-6 relative">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 md:gap-8" data-aos="fade-up" data-aos-delay="200">

      @php
        $ekskul = [
          ['nama' => 'Badminton', 'gambar' => 'badminton.jpg'],
          ['nama' => 'Bola Basket', 'gambar' => 'basketball.jpg'],
          ['nama' => 'Bola Voli', 'gambar' => 'volly.jpg'],
          ['nama' => 'English Club', 'gambar' => 'english.jpg'],
          ['nama' => 'Futsal', 'gambar' => 'futsall.jpg'],
          ['nama' => 'Ganefo', 'gambar' => 'ganefo.jpg'],
          ['nama' => 'ICT Club', 'gambar' => 'ict.jpg'],
          ['nama' => 'KIR', 'gambar' => 'kir.jpg'],
          ['nama' => 'Modern Dance', 'gambar' => 'moderndance.jpg'],
          ['nama' => 'Orens Digital', 'gambar' => 'digital.jpg'],
          ['nama' => 'Orens Network', 'gambar' => 'network.jpg'],
          ['nama' => 'Orens Solution', 'gambar' => 'solution.jpg'],
          ['nama' => 'Orens Studio', 'gambar' => 'studio.jpg'],
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
        class="relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 group backdrop-blur-md"
        data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}"
      >
        <div 
  class="absolute inset-0 bg-center bg-cover"
  style="background-image: url('{{ asset('assets/images/gedung/gedungsiswa.avif') }}'); filter: blur(2px) brightness(1); transform: scale(1.02);"
></div>


        <!-- Overlay hitam transparan -->
        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-all duration-500"></div>

        <!-- Konten tengah (logo ekskul dan nama) -->
        <div class="relative flex flex-col items-center justify-center py-6 z-10">
          <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-white/80 backdrop-blur-md shadow-md flex items-center justify-center mb-3 border border-white/50">
            <img src="{{ asset('assets/images/ekskul/' . $item['gambar']) }}" alt="{{ $item['nama'] }}" class="w-16 h-16 md:w-20 md:h-20 object-contain rounded-full" />
          </div>
        </div>

        <!-- Nama ekskul -->
        <div class="relative bg-orange-500 text-white text-center py-3 text-sm md:text-base font-semibold z-10">
          {{ $item['nama'] }}
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- FOTO GEDUNG (tidak bisa diklik) -->
  <section class="relative w-full bg-white overflow-hidden select-none pointer-events-none">
    <img alt="Gedung SMK Prestasi Prima" 
         class="w-full h-[40vh] sm:h-[55vh] lg:h-screen object-cover object-center hover:scale-[1.02] transition-transform duration-700" 
         src="{{ asset('assets/images/gedung/gedung.avif') }}">
  </section>
@endsection

