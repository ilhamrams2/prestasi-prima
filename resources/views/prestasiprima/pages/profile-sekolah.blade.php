{{-- resources/views/prestasiprima/pages/profile-sekolah.blade.php --}}
@extends('prestasiprima.index')

@section('title', 'Profil Sekolah')

@section('content')

<!-- ====================== HERO SECTION ====================== -->
<section class="relative bg-[#0e1620] text-white pt-36 pb-28 overflow-hidden">
  <div class="absolute inset-0">
    <img src="{{ asset('assets/images/section/profile/hero-sekolah.webp') }}" alt="SMK Prestasi Prima"
      class="w-full h-full object-cover opacity-25">
  </div>

  <div class="relative z-10 text-center max-w-3xl mx-auto px-4" data-aos="fade-down" data-aos-duration="800">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
      Profil <span class="text-orange-500">Sekolah</span>
    </h1>
    <p class="text-gray-200 text-lg leading-relaxed">
      Mencetak generasi unggul, kreatif, dan kompeten untuk masa depan bangsa yang gemilang.
    </p>
  </div>
</section>

<!-- ====================== SEJARAH SEKOLAH ====================== -->
<section class="py-24 bg-[#0e1620] text-white relative overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-[#0e1620] via-[#111a26] to-[#0e1620]"></div>

  <div class="max-w-7xl mx-auto relative px-6">
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="text-4xl font-extrabold mb-3">
        <span class="text-orange-500">Sejarah</span> Sekolah
      </h2>
      <p class="text-gray-300 text-lg max-w-2xl mx-auto">
        Perjalanan panjang SMK Prestasi Prima dalam membangun pendidikan vokasi unggul yang adaptif terhadap perkembangan zaman.
      </p>
    </div>

    <div class="relative border-l-4 border-orange-500 ml-6 space-y-14">
      @php
        $timeline = [
          ['year' => '2011', 'title' => 'Pendirian Awal', 'desc' => 'SMK Prestasi Prima resmi didirikan di Cipayung, Jakarta Timur, dengan semangat mencetak lulusan unggul dan berkarakter.'],
          ['year' => '2013', 'title' => 'Standarisasi Kurikulum', 'desc' => 'Peningkatan kurikulum berbasis industri mulai diterapkan untuk memenuhi kebutuhan dunia kerja modern.'],
          ['year' => '2015', 'title' => 'Perluasan Fasilitas', 'desc' => 'Fasilitas pendukung pembelajaran seperti laboratorium, studio, dan perpustakaan mulai dikembangkan.'],
          ['year' => '2018', 'title' => 'Digitalisasi Pembelajaran', 'desc' => 'Sekolah mulai memanfaatkan teknologi digital dan platform daring untuk kegiatan belajar mengajar.'],
          ['year' => '2021', 'title' => 'Akreditasi A', 'desc' => 'Pencapaian akreditasi tertinggi (A) menjadi bukti kualitas dan konsistensi sekolah dalam memberikan pendidikan terbaik.'],
          ['year' => '2025', 'title' => 'Transformasi Edukasi', 'desc' => 'Penerapan Kurikulum Merdeka dan transformasi digital di seluruh aspek pembelajaran.'],
        ];
      @endphp

      @foreach ($timeline as $i => $item)
        <div class="relative pl-10" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
          <div
            class="absolute -left-4 top-2 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
            <span>{{ substr($item['year'], -2) }}</span>
          </div>
          <div class="bg-[#111a26] rounded-2xl p-6 shadow-lg hover:shadow-orange-500/30 transition">
            <h3 class="text-xl font-semibold text-orange-400 mb-1">{{ $item['year'] }} — {{ $item['title'] }}</h3>
            <p class="text-gray-300 leading-relaxed">{{ $item['desc'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-[#0e1620] to-transparent"></div>
</section>

<!-- ====================== VISI & MISI (Modern Clean Version - White Background) ====================== -->
<section class="relative py-28 bg-white text-gray-800 overflow-hidden">
  {{-- Background dekoratif halus --}}
  <div class="absolute inset-0 bg-gradient-to-br from-white via-orange-50/30 to-white"></div>

  <div class="max-w-7xl mx-auto relative z-10 px-6 md:px-10 grid md:grid-cols-2 gap-14 items-center">
    {{-- Gambar --}}
    <div data-aos="fade-right" data-aos-duration="900">
      <div class="relative group">
        <img src="{{ asset('assets/images/gedung/gedungtinggi.webp') }}" 
             alt="Visi Misi Sekolah"
             class="rounded-3xl shadow-2xl transform group-hover:scale-105 transition duration-700 ease-out">
        <div class="absolute bottom-6 left-6">
          <p class="bg-orange-500/90 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm">
            SMK Prestasi Prima
          </p>
        </div>
      </div>
    </div>

    {{-- Teks Visi Misi --}}
    <div data-aos="fade-left" data-aos-duration="900">
      <h2 class="text-4xl font-extrabold mb-8 leading-tight text-[#0e1620]">
        Visi & <span class="text-orange-500">Misi</span> Sekolah
      </h2>

      {{-- VISI --}}
      <div class="mb-8">
        <h3 class="font-semibold text-xl mb-3 text-orange-600 tracking-wide">Visi</h3>
        <p class="text-gray-700 leading-relaxed text-lg bg-orange-50/60 p-5 rounded-2xl shadow-md border border-orange-100">
          Mewujudkan lulusan yang <strong class="text-orange-600">unggul</strong> dan 
          <strong class="text-orange-600">terpercaya</strong> dalam mengembangkan serta mempersiapkan tenaga terampil 
          di bidang Teknologi Informasi dan Komunikasi yang beriman, bertaqwa, cerdas, percaya diri, 
          berwawasan global, dan berkarakter Pancasila.
        </p>
      </div>

      {{-- MISI --}}
      <div>
        <h3 class="font-semibold text-xl mb-4 text-orange-600 tracking-wide">Misi</h3>
        <ul class="space-y-4">
          <li class="flex items-start gap-3 bg-white rounded-2xl p-4 border border-orange-100 shadow-sm hover:shadow-lg hover:border-orange-300 transition">
            <div class="w-3 h-3 mt-2 bg-orange-500 rounded-full flex-shrink-0 shadow-sm"></div>
            <p class="text-gray-700 leading-relaxed">Menyelenggarakan proses belajar mengajar yang berkualitas dalam mencapai kompetensi peserta didik yang berstandar nasional dan internasional.</p>
          </li>
          <li class="flex items-start gap-3 bg-white rounded-2xl p-4 border border-orange-100 shadow-sm hover:shadow-lg hover:border-orange-300 transition">
            <div class="w-3 h-3 mt-2 bg-orange-500 rounded-full flex-shrink-0 shadow-sm"></div>
            <p class="text-gray-700 leading-relaxed">Menyiapkan tamatan yang mampu berkompetisi pada era revolusi industri 4.0 dan globalisasi sesuai dengan kompetensi bidangnya.</p>
          </li>
          <li class="flex items-start gap-3 bg-white rounded-2xl p-4 border border-orange-100 shadow-sm hover:shadow-lg hover:border-orange-300 transition">
            <div class="w-3 h-3 mt-2 bg-orange-500 rounded-full flex-shrink-0 shadow-sm"></div>
            <p class="text-gray-700 leading-relaxed">Memberikan pelayanan pendidikan berbasis pembelajaran abad 21 agar peserta didik memperoleh ilmu pengetahuan dan teknologi terkini.</p>
          </li>
          <li class="flex items-start gap-3 bg-white rounded-2xl p-4 border border-orange-100 shadow-sm hover:shadow-lg hover:border-orange-300 transition">
            <div class="w-3 h-3 mt-2 bg-orange-500 rounded-full flex-shrink-0 shadow-sm"></div>
            <p class="text-gray-700 leading-relaxed">Mengembangkan sikap profesional yang menghargai etika dan keberagaman serta menerapkan budaya kerja yang membentuk jati diri berkarakter bangsa.</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>


<!-- ====================== FASILITAS SEKOLAH - NEON LINES GRID TERPISAH ====================== -->
<section class="relative bg-gradient-to-b from-white via-gray-50 to-white text-gray-900 overflow-hidden">
  <div class="text-center py-24 px-6">
    <h2 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">
      Fasilitas <span class="text-orange-500 drop-shadow-[0_0_10px_rgba(255,115,0,0.8)]">Sekolah</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
      Setiap fasilitas kami didesain modern dengan sentuhan teknologi dan estetika, mendukung suasana belajar kreatif.
    </p>
  </div>

  @php
    $fasilitas = [
      [
        'title' => 'Laboratorium & Studio',
        'desc' => 'Tempat eksplorasi teknologi, inovasi, dan kreativitas visual siswa dengan perangkat canggih dan ruang inspiratif.',
        'images' => ['lab1.webp','lab2.webp','lab3.webp','lab4.webp'],
      ],
      [
        'title' => 'Fasilitas Akademik',
        'desc' => 'Lingkungan akademik berteknologi tinggi dengan suasana nyaman dan terintegrasi digital.',
        'images' => ['akademik1.webp','akademik2.webp','akademik3.webp','akademik4.webp'],
      ],
      [
        'title' => 'Fasilitas Olahraga',
        'desc' => 'Ruang olahraga modern yang menunjang kesehatan, semangat, dan kebersamaan antar siswa.',
        'images' => ['olahraga1.webp','olahraga2.webp','olahraga3.webp','olahraga4.webp'],
      ],
      [
        'title' => 'Fasilitas Umum Sekolah',
        'desc' => 'Area sosial, hijau, dan interaktif yang mendukung keseimbangan antara akademik dan kehidupan sehari-hari.',
        'images' => ['umum1.webp','umum2.webp','umum3.webp','umum4.webp'],
      ],
    ];
  @endphp

  @foreach ($fasilitas as $index => $item)
  <div class="relative py-24 {{ $loop->even ? 'bg-[#0e1620] text-white' : 'bg-white text-gray-900' }}">
    <div class="max-w-7xl mx-auto px-6 md:px-10 space-y-12 relative">

      {{-- ===== TEKS ===== --}}
      <div data-aos="fade-up" class="relative z-10 text-center md:text-left max-w-3xl mx-auto">
        <h3 class="text-3xl md:text-4xl font-bold mb-4 relative inline-block">
          {{ $item['title'] }}
          <span class="absolute -bottom-1 left-0 w-20 h-[3px] bg-orange-500 shadow-[0_0_15px_rgba(255,115,0,0.8)] rounded-full"></span>
        </h3>
        <p class="opacity-90 leading-relaxed text-lg">{{ $item['desc'] }}</p>
      </div>

      {{-- ===== GRID GAMBAR TERPISAH ===== --}}
      <div data-aos="fade-up" class="relative">
        {{-- Garis artistik dekoratif --}}
        <svg class="absolute inset-0 w-full h-full pointer-events-none opacity-30" viewBox="0 0 800 400" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 100 Q200 0 400 100 T800 100" stroke="url(#orange)" stroke-width="2" />
          <path d="M0 300 Q200 400 400 300 T800 300" stroke="url(#orange)" stroke-width="2" />
          <defs>
            <linearGradient id="orange" x1="0" x2="800" y1="0" y2="0" gradientUnits="userSpaceOnUse">
              <stop stop-color="#ff7b00" stop-opacity="1">
                <animate attributeName="stop-color" values="#ff7b00;#ffaa33;#ff7b00" dur="4s" repeatCount="indefinite"/>
              </stop>
              <stop offset="1" stop-color="#ffaa33" stop-opacity="1">
                <animate attributeName="stop-color" values="#ffaa33;#ff7b00;#ffaa33" dur="4s" repeatCount="indefinite"/>
              </stop>
            </linearGradient>
          </defs>
        </svg>

        {{-- Grid Gambar --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 relative z-10">
          @foreach ($item['images'] as $img)
          <div class="group relative overflow-hidden rounded-2xl shadow-xl border border-orange-400/40 
                      hover:border-orange-500 transition duration-500 hover:shadow-[0_0_25px_rgba(255,115,0,0.6)] hover:scale-[1.03]">
            <img 
              loading="lazy"
              src="{{ asset('assets/images/section/fasilitas/' . $img) }}" 
              alt="{{ $item['title'] }}"
              class="w-full h-48 md:h-56 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
          </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
  @endforeach
</section>

{{-- ======== Tambahkan animasi glow lembut untuk SVG garis ======== --}}
<style>
@keyframes glow-line {
  0%, 100% {
    filter: drop-shadow(0 0 6px rgba(255, 120, 0, 0.6));
  }
  50% {
    filter: drop-shadow(0 0 15px rgba(255, 160, 50, 0.9));
  }
}
svg path {
  animation: glow-line 3s ease-in-out infinite;
}
</style>



<!-- ====================== PRESTASI PREVIEW ====================== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">
      Prestasi & <span class="text-orange-600">Penghargaan</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-10">
      Bukti nyata dedikasi dan kerja keras siswa serta tenaga pendidik dalam mengukir prestasi.
    </p>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
      @foreach (['juara1.webp', 'juara2.webp', 'juara3.webp'] as $img)
        <div class="overflow-hidden rounded-xl shadow-lg group" data-aos="fade-up">
          <img src="{{ asset('assets/images/section/prestasi/' . $img) }}" alt="Prestasi"
            class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500">
        </div>
      @endforeach
    </div>

    <a href="{{ route('prestasi') }}"
      class="inline-block px-6 py-3 bg-orange-500 text-white font-semibold rounded-full hover:bg-orange-600 transition">
      Lihat Semua Prestasi →
    </a>
  </div>
</section>

<!-- ====================== GALERI SEKOLAH ====================== -->
<section class="py-24 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">
      Galeri <span class="text-orange-600">Sekolah</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-10">
      Dokumentasi kegiatan dan suasana belajar di lingkungan SMK Prestasi Prima.
    </p>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach (['galeri1.webp','galeri2.webp','galeri3.webp','galeri4.webp','galeri5.webp','galeri6.webp','galeri7.webp','galeri8.webp'] as $img)
        <div class="overflow-hidden rounded-xl shadow-md group" data-aos="zoom-in">
          <img src="{{ asset('assets/images/section/galeri/' . $img) }}" alt="Galeri"
            class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
