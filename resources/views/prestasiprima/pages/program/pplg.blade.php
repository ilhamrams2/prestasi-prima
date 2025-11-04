@extends('prestasiprima.index')

@section('title', 'PPLG — Pengembangan Perangkat Lunak dan Gim')

@section('content')

{{-- ========== HERO SECTION ========== --}}
<section class="relative pt-32 pb-20 bg-white overflow-hidden">
  {{-- Background Grid --}}
  <div class="absolute inset-0">
    <img 
      src="{{ asset('assets/images/program/grid_line.png') }}" 
      alt="Grid Background" 
      class="w-full h-full object-cover opacity-25"
    >
  </div>

  {{-- Content --}}
  <div class="relative max-w-7xl mx-auto px-6 md:px-10 flex flex-col lg:flex-row items-center gap-12">
    
    {{-- Left: Text --}}
    <div class="w-full lg:w-1/2">
      <h1 class="text-4xl lg:text-5xl font-extrabold text-orange-500 leading-tight">
        Pengembangan
      </h1>
      <h2 class="text-3xl lg:text-4xl font-semibold mt-2 text-gray-800">
        Perangkat Lunak dan Gim
      </h2>
      <p class="mt-6 text-gray-600 leading-relaxed text-justify">
        Mengenal lebih dekat dunia pemrograman, inovasi, dan teknologi digital yang membentuk masa depan. 
        Siswa akan belajar merancang, mengembangkan, dan mengelola aplikasi modern termasuk web, mobile, dan gim.
      </p>
      <div class="mt-8">
        <a href="#about" 
           class="bg-orange-500 text-white px-6 py-3 rounded-xl shadow-md hover:bg-orange-600 transition-all duration-300">
          Pelajari Lebih Lanjut
        </a>
      </div>
    </div>

    {{-- Right: Image (bersih tanpa border) --}}
    <div class="w-full lg:w-1/2 relative z-10">
      <img 
        src="{{ asset('assets/images/program/pplg-hero.png') }}" 
        alt="PPLG" 
        class="w-full h-auto object-contain"
      >
    </div>

  </div>
</section>


{{-- ========== ABOUT SECTION ========== --}}
<section id="about" class="relative py-24 bg-white overflow-hidden">
  {{-- Background Grid --}}
  <div class="absolute inset-0">
    <img 
      src="{{ asset('assets/images/program/grid_line.png') }}" 
      alt="Grid Background" 
      class="w-full h-full object-cover opacity-20"
    >
  </div>

  {{-- Content --}}
  <div class="relative max-w-7xl mx-auto px-6 md:px-10 text-center">
    <div>
      <div class="bg-orange-500 text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-3 inline-block">
        Tentang Jurusan
      </div>
      <h3 class="text-orange-600 font-medium text-lg">Mengenal Rekayasa Perangkat Lunak</h3>
      <div class="flex justify-center items-center mt-3">
        <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
        <span class="w-1.5 h-1 bg-orange-600 rounded-full mx-1"></span>
        <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
      </div>
    </div>

    <div class="mt-12 bg-white rounded-2xl shadow-xl border border-orange-100 p-8 max-w-5xl mx-auto text-left">
      <div class="flex items-center space-x-2 mb-6">
        <span class="w-3 h-3 bg-red-400 rounded-full"></span>
        <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
        <span class="w-3 h-3 bg-green-400 rounded-full"></span>
        <p class="text-sm text-orange-400 ml-4">~/about/software-engineering</p>
      </div>

      <div class="flex items-center mb-4">
        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-3">
          <i data-lucide="cpu" class="w-6 h-6 text-orange-500"></i>
        </div>
        <h4 class="text-orange-500 font-semibold text-lg">Deskripsi Program</h4>
      </div>

      <p class="text-gray-700 text-justify leading-relaxed">
        Rekayasa Perangkat Lunak adalah program keahlian yang membekali siswa dengan kemampuan merancang,
        mengembangkan, dan mengelola aplikasi perangkat lunak. Program ini menggabungkan teori komputer
        dengan praktik pengembangan software modern, termasuk web development, mobile apps,
        dan database management.
      </p>

      <div class="mt-6 bg-slate-900 text-white text-sm p-4 rounded-xl font-mono leading-relaxed">
        <p class="opacity-80">
          <span class="text-orange-400">&gt;</span> program.initialize() <br>
          <span class="text-green-400">✔</span> Ready to build the future
        </p>
      </div>
    </div>

    {{-- Divider --}}
    <div class="flex items-center justify-center my-14 relative">
      <div class="flex items-center">
        <div class="w-3 h-3 rotate-45 bg-orange-400"></div>
        <div class="w-20 h-[2px] bg-gradient-to-r from-orange-300 to-orange-500"></div>
      </div>
      <div class="relative mx-3">
        <i data-lucide="star" class="w-9 h-9 text-orange-500 relative z-10"></i>
        <div class="absolute inset-0 animate-pulse">
          <div class="w-9 h-9 rounded-full border-2 border-orange-400 opacity-50 absolute top-0 left-0"></div>
        </div>
      </div>
      <div class="flex items-center">
        <div class="w-20 h-[2px] bg-gradient-to-l from-orange-300 to-orange-500"></div>
        <div class="w-3 h-3 rotate-45 bg-orange-400"></div>
      </div>
    </div>

    {{-- Kepala Program --}}
    <div class="mt-16 flex flex-col lg:flex-row items-center justify-center gap-10">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-orange-200">
        <img src="{{ asset('assets/images/staff/kapro2.jpg') }}" alt="Kepala Program" class="w-64 h-80 object-cover">
      </div>

      <div class="max-w-md text-left">
        <div class="bg-orange-400 text-white px-4 py-1 rounded-full text-sm inline-flex items-center gap-1">
          <i data-lucide="user" class="w-4 h-4"></i> Kepala Program
        </div>

        <h3 class="text-2xl font-bold text-gray-900 mt-3">Agus Nugraha, S.Kom.</h3>
        <div class="mt-4 bg-orange-50 border-l-4 border-orange-400 p-4 rounded-r-lg shadow-sm relative">
          <span class="absolute -top-3 left-4 text-orange-400 text-3xl font-serif">“</span>
          <p class="text-gray-700 italic ml-4">
            Kami membekali siswa dengan kemampuan teknis, mindset problem solver, 
            dan kesiapan menghadapi dunia industri modern.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


{{-- ========== PROSPEK KARIR ========== --}}
<section class="py-24 bg-gradient-to-r from-orange-500 to-orange-400 relative overflow-hidden">
  {{-- Pola Latar --}}
  <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'2\' cy=\'2\' r=\'1.5\' fill=\'white\' fill-opacity=\'0.25\'/%3E%3C/svg%3E')] opacity-20"></div>

  <div class="max-w-7xl mx-auto px-6 md:px-10 relative z-10">
    {{-- Judul --}}
    <h3 class="text-3xl font-bold text-white text-center mb-14">Prospek Karir</h3>

    {{-- Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach([
        ['globe', 'Front-End Developer', '6–12 jt/bulan'],
        ['database', 'Back-End Developer', '7–15 jt/bulan'],
        ['code', 'Full-Stack Developer', '10–20 jt/bulan'],
        ['smartphone', 'Mobile Developer', '8–15 jt/bulan'],
        ['layout', 'UI/UX Designer', '6–12 jt/bulan'],
        ['gamepad', 'Game Developer', '8–11 jt/bulan'],
      ] as [$icon, $title, $salary])
      <div class="bg-white/15 backdrop-blur-lg border border-white/20 rounded-2xl p-6 text-white hover:translate-y-[-6px] hover:shadow-lg hover:shadow-white/10 transition duration-300">
        <div class="flex items-start gap-4">
          {{-- Icon --}}
          <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-xl bg-white/20">
            <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>
          </div>
          {{-- Text --}}
          <div class="text-left">
            <div class="font-semibold text-lg">{{ $title }}</div>
            <div class="text-sm opacity-80 mt-1">{{ $salary }}</div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  lucide.createIcons();
</script>


{{-- ========== TOOLS & EQUIPMENT ========== --}}
<section class="py-24 bg-white text-center overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-10">
    <h3 class="text-xl font-semibold text-orange-500">Tools dan Equipment</h3>
    <p class="text-gray-600 mt-2">Kami menggunakan teknologi modern untuk mendukung pembelajaran</p>

    {{-- ======= Logo Slider ======= --}}
    <div class="relative mt-14 w-full overflow-hidden">
      <div class="flex gap-10 w-max animate-marquee">
        {{-- Loop 1 --}}
        @for ($i = 1; $i <= 10; $i++)
          <div class="flex-shrink-0 w-40 h-24 flex items-center justify-center bg-white rounded-xl shadow border border-orange-100">
            <img src="{{ asset('assets/images/program/wspp/logo (' . $i . ').png') }}" 
                 alt="logo {{ $i }}" 
                 class="max-h-16 object-contain" />
          </div>
        @endfor

        {{-- Loop 2 (duplikasi agar seamless) --}}
        @for ($i = 1; $i <= 10; $i++)
          <div class="flex-shrink-0 w-40 h-24 flex items-center justify-center bg-white rounded-xl shadow border border-orange-100">
            <img src="{{ asset('assets/images/program/wspp/logo (' . $i . ').png') }}" 
                 alt="logo {{ $i }}" 
                 class="max-h-16 object-contain" />
          </div>
        @endfor
      </div>
    </div>
  </div>
</section>

{{-- ===== CSS (tambahkan di file style atau dalam <style> bawah) ===== --}}
<style>
@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.animate-marquee {
  display: flex;
  animation: marquee 40s linear infinite;
  width: max-content;
}
</style>

<!-- ========== JOURNEY BELAJAR (Desain Final Mirip Gambar) ========== -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 md:px-8">
    <h2 class="text-3xl font-bold text-center text-orange-600 mb-16">Journey Belajar</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-gray-700">

      <!-- ====== TAHUN 1 ====== -->
      <div class="flex flex-col">
        <!-- Header Icon + Tahun + Judul -->
        <div class="flex items-center mb-4">
          <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-3xl shadow-md mr-4">
            <i class='bx bx-book-open'></i>
          </div>
          <div>
            <span class="text-xs bg-gradient-to-r from-orange-400 to-orange-500 text-white px-3 py-0.5 rounded-full font-semibold">Tahun 1</span>
            <h3 class="text-lg font-semibold text-gray-800 mt-1">Dasar Pemrograman</h3>
          </div>
        </div>

        <!-- List -->
        <ul class="text-sm text-gray-600 space-y-2 ml-[4.5rem]">
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>HTML, CSS, JavaScript</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Algoritma & Logika</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Database Dasar</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Git Version Control</li>
        </ul>
      </div>

      <!-- ====== TAHUN 2 ====== -->
      <div class="flex flex-col">
        <!-- Header Icon + Tahun + Judul -->
        <div class="flex items-center mb-4">
          <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-3xl shadow-md mr-4">
            <i class='bx bx-code-alt'></i>
          </div>
          <div>
            <span class="text-xs bg-gradient-to-r from-orange-400 to-orange-500 text-white px-3 py-0.5 rounded-full font-semibold">Tahun 2</span>
            <h3 class="text-lg font-semibold text-gray-800 mt-1">Pengembangan Aplikasi</h3>
          </div>
        </div>

        <!-- List -->
        <ul class="text-sm text-gray-600 space-y-2 ml-[4.5rem]">
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>React & Vue.js</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Node.js & Express</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>UI/UX Design</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Mobile Development</li>
        </ul>
      </div>

      <!-- ====== TAHUN 3 ====== -->
      <div class="flex flex-col">
        <!-- Header Icon + Tahun + Judul -->
        <div class="flex items-center mb-4">
          <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-3xl shadow-md mr-4">
            <i class='bx bx-briefcase'></i>
          </div>
          <div>
            <span class="text-xs bg-gradient-to-r from-orange-400 to-orange-500 text-white px-3 py-0.5 rounded-full font-semibold">Tahun 3</span>
            <h3 class="text-lg font-semibold text-gray-800 mt-1">Magang & Proyek Akhir</h3>
          </div>
        </div>

        <!-- List -->
        <ul class="text-sm text-gray-600 space-y-2 ml-[4.5rem]">
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Prakerin di Industri</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Capstone Project</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Sertifikasi Kompetensi</li>
          <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>Portfolio Building</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Boxicons -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


{{-- ========== VIRTUAL TOUR ========== --}}
<section id="virtual-tour" class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 md:px-10 text-center">
    
    {{-- Judul --}}
    <h3 class="text-2xl font-bold text-orange-600 mb-10">
      Virtual Tour Lab PPLG
    </h3>

    {{-- Preview Card --}}
    <div class="flex justify-center"
         data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350">
      
      <div class="relative w-full md:w-4/5 lg:w-2/3 rounded-2xl overflow-hidden bg-white/20 backdrop-blur-md border border-orange-100 shadow-lg transition-transform hover:scale-105 hover:shadow-2xl cursor-pointer"
           onclick="window.location='{{ route('virtual-tour') }}'">
        
        {{-- Badge 360° --}}
        <span class="absolute top-4 left-4 bg-orange-500/90 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
          360° Virtual Tour
        </span>

        {{-- Gambar Preview --}}
        <img src="{{ asset('assets/360View/v360-1.jpg') }}" 
             alt="Preview Virtual Tour" 
             class="w-full aspect-video object-cover">

        {{-- Overlay Teks --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent flex items-end justify-center p-6">
          <h3 class="text-lg md:text-2xl font-semibold text-white drop-shadow-lg">
            Klik untuk Memulai Virtual Tour
          </h3>
        </div>

        {{-- Icon VR Cardboard --}}
        <div class="absolute top-4 right-4 bg-orange-500/80 p-3 rounded-full shadow-md animate-bounce">
          <i class="fa-solid fa-vr-cardboard text-white text-xl"></i>
        </div>

      </div>
    </div>
  </div>
</section>


{{-- ========== FAQ SECTION ========== --}}
<section class="py-24 bg-gradient-to-b from-orange-50 via-white to-orange-50 relative overflow-hidden">
  <div class="max-w-4xl mx-auto px-6 md:px-10 relative z-10">
    {{-- Header --}}
    <div class="text-center mb-14">
      <div class="bg-orange-500 text-white text-sm font-semibold px-4 py-1.5 rounded-full inline-block mb-3">
        Pertanyaan Umum
      </div>
      <h3 class="text-3xl font-bold text-gray-800">FAQ — Pertanyaan yang Sering Diajukan</h3>
      <p class="text-gray-500 mt-2">Temukan jawaban seputar jurusan PPLG di bawah ini</p>
    </div>

    {{-- FAQ List --}}
    <div x-data="{ active: null }" class="space-y-4">
      @foreach([
        ['q' => 'Apa perbedaan PPLG dengan jurusan lain?', 'a' => 'PPLG berfokus pada pengembangan software, aplikasi, dan game berbasis teknologi modern.'],
        ['q' => 'Apakah ada program magang di perusahaan besar?', 'a' => 'Ya, siswa memiliki kesempatan magang di perusahaan teknologi ternama untuk memperdalam pengalaman industri.'],
        ['q' => 'Bagaimana peluang kerja setelah lulus?', 'a' => 'Peluangnya sangat luas, mulai dari front-end, back-end, mobile, hingga game developer.']
      ] as $i => $item)
        <div 
          class="bg-white border border-orange-100 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden"
          x-data="{ open: false }"
        >
          <button 
            @click="open = !open" 
            class="w-full flex justify-between items-center px-6 py-5 text-left focus:outline-none"
          >
            <span class="font-medium text-gray-800 text-lg">{{ $item['q'] }}</span>
            <i 
              data-lucide="chevron-down" 
              class="w-5 h-5 text-orange-500 transition-transform duration-300"
              :class="{ 'rotate-180': open }"
            ></i>
          </button>
          <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-orange-100"
          >
            {{ $item['a'] }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();
  });
</script>


@endsection
