@extends('prestasiprima.index')

@section('title', 'PPLG — Pengembangan Perangkat Lunak dan Gim')

@section('content')
<!-- ========== HERO SECTION ========== -->
<section class="py-20">
  <div class="container mx-auto px-6 lg:px-20">
    <div class="flex flex-col lg:flex-row items-center gap-10">
      
      <!-- Left: Text -->
      <div class="w-full lg:w-1/2">
        <h1 class="text-4xl lg:text-5xl font-extrabold text-orange-500">Pengembangan</h1>
        <h2 class="text-3xl lg:text-4xl font-semibold mt-2">Perangkat Lunak dan Gim</h2>
        <p class="mt-6 text-gray-600 leading-relaxed">
          Mengenal lebih dekat dunia pemrograman, inovasi, dan teknologi digital yang membentuk masa depan. 
          Siswa akan belajar merancang, mengembangkan, dan mengelola aplikasi modern termasuk web, mobile, dan gim.
        </p>

        <div class="mt-8 flex items-center gap-4">
          <a href="#about" class="bg-orange-500 text-white px-5 py-3 rounded-lg shadow hover:opacity-95">Pelajari Lebih Lanjut</a>
          <a href="#virtual-tour" class="text-sm text-orange-500 underline">Virtual Tour Lab</a>
        </div>

        <div class="mt-8 text-sm text-gray-400">Scroll ke bawah ⌄</div>
      </div>

      <!-- Right: Image -->
      <div class="w-full lg:w-1/2">
        <div class="rounded-xl overflow-hidden shadow-lg border">
          <img src="{{ asset('assets/images/programs/pplg-hero.jpg') }}" alt="PPLG" class="w-full h-64 object-cover">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========== ABOUT SECTION ========== -->
<section id="about" class="relative py-20 bg-white overflow-hidden">
  <div class="container mx-auto px-6 lg:px-20 text-center">

    <!-- Title -->
    <div class="flex flex-col items-center">
      <div class="bg-orange-500 text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-2">Tentang Jurusan</div>
      <h3 class="text-orange-600 font-medium">Mengenal Rekayasa Perangkat Lunak</h3>
      <div class="flex justify-center items-center mt-2">
        <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
        <span class="w-1.5 h-1 bg-orange-600 rounded-full mx-1"></span>
        <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
      </div>
    </div>

    <!-- Deskripsi -->
    <div class="mt-12 bg-white rounded-2xl shadow-xl border border-orange-100 p-8 max-w-5xl mx-auto">
      <div class="flex items-center space-x-2 mb-4">
        <span class="w-3 h-3 bg-red-400 rounded-full"></span>
        <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
        <span class="w-3 h-3 bg-green-400 rounded-full"></span>
        <p class="text-sm text-orange-400 ml-4">/about/software-engineering</p>
      </div>

      <h4 class="text-left text-orange-500 font-semibold mb-2">Deskripsi Program</h4>
      <p class="text-gray-700 text-justify leading-relaxed">
        Rekayasa Perangkat Lunak adalah program keahlian yang membekali siswa dengan kemampuan merancang, 
        mengembangkan, dan mengelola aplikasi perangkat lunak. Program ini menggabungkan teori komputer 
        science dengan praktik pengembangan software modern, termasuk web development, mobile apps, 
        dan database management. Siswa akan belajar berbagai bahasa pemrograman, framework terkini, 
        dan metodologi pengembangan software yang digunakan di industri teknologi global.
      </p>

      <div class="mt-4 bg-slate-900 text-white text-sm p-3 rounded-lg font-mono text-left">
        ➜ project utama: <span class="text-orange-400">Aplikasi Web dan Mobile</span>
      </div>
    </div>

    <!-- ========== KEPALA PROGRAM ========== -->
    <div class="mt-16 flex flex-col lg:flex-row items-center justify-center gap-10">
      
      <!-- Foto -->
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-orange-200">
        <img src="{{ asset('assets/images/staff/kapro2.jpg') }}" alt="Kepala Program" class="w-64 h-80 object-cover">
      </div>

      <!-- Info -->
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

    <!-- Divider -->
    <div class="flex items-center justify-center mt-12">
      <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
      <i data-lucide="sun" class="text-orange-500 mx-3"></i>
      <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
    </div>
  </div>
</section>

<!-- ========== PROSPEK KARIR ========== -->
<section class="py-16 bg-gradient-to-r from-orange-500 to-orange-400 relative overflow-hidden">
  <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg%3E%3Ccircle cx=\'1\' cy=\'1\' r=\'1\' fill=\'white\' fill-opacity=\'0.2\'/%3E%3C/svg%3E')] opacity-20"></div>
  <div class="container mx-auto px-6 lg:px-20 relative z-10">
    <h3 class="text-center text-2xl font-bold text-white">Prospek Karir</h3>

    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
      @php
        $careers = [
          ['icon' => 'globe', 'title' => 'Front-End Developer'],
          ['icon' => 'database', 'title' => 'Back-End Developer'],
          ['icon' => 'code', 'title' => 'Full-Stack Developer'],
          ['icon' => 'smartphone', 'title' => 'Mobile Developer'],
          ['icon' => 'layout', 'title' => 'UI/UX Designer'],
          ['icon' => 'gamepad', 'title' => 'Game Developer']
        ];
      @endphp

      @foreach($careers as $career)
        <div class="bg-white/10 backdrop-blur-md rounded-xl border border-white/20 p-6 text-white text-center flex flex-col items-center justify-center hover:scale-105 transition-transform duration-300">
          <div class="text-4xl mb-3"><i data-lucide="{{ $career['icon'] }}"></i></div>
          <div class="font-semibold text-lg">{{ $career['title'] }}</div>
          <div class="text-xs opacity-80 mt-1">Peluang Karir</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ========== TOOLS & EQUIPMENT ========== -->
<section class="py-12">
  <div class="container mx-auto px-6 lg:px-20 text-center">
    <h3 class="text-xl font-semibold text-orange-500">Tools dan Equipment</h3>
    <p class="text-gray-600 mt-2">Untuk pembelajaran, kami menggunakan tool & teknologi modern</p>

    <div class="mt-6 flex flex-wrap justify-center items-center gap-6">
      @php $logos = ['vscode','git','nodejs','vue','react','mysql','laravel','nextjs']; @endphp
      @foreach($logos as $logo)
        <div class="w-24 h-12 flex items-center justify-center bg-white rounded-lg shadow-sm">
          <img src="{{ asset('assets/logos/' . $logo . '.svg') }}" alt="{{ $logo }}" class="max-h-8">
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ========== JOURNEY BELAJAR ========== -->
<section class="py-12 bg-white">
  <div class="container mx-auto px-6 lg:px-20">
    <h3 class="text-2xl font-bold text-orange-600 text-center">Journey Belajar</h3>
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach([
        ['Tahap 1 — Dasar Pemrograman', ['HTML, CSS, JavaScript', 'Algoritma & Struktur Data dasar', 'Git & Version Control']],
        ['Tahap 2 — Pengembangan Aplikasi', ['Backend (PHP/Laravel, Node.js)', 'Frontend (Vue/React)', 'Database & RESTful API']],
        ['Tahap 3 — Magang & Proyek Akhir', ['Magang di industri', 'Proyek akhir: Aplikasi / Gim', 'Portfolio & Presentasi']]
      ] as [$title, $items])
        <div class="p-6 border rounded-lg">
          <div class="font-semibold">{{ $title }}</div>
          <ul class="mt-3 text-sm text-gray-600 space-y-1">
            @foreach($items as $item)
              <li>• {{ $item }}</li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ========== VIRTUAL TOUR ========== -->
<section id="virtual-tour" class="py-12 bg-orange-100">
  <div class="container mx-auto px-6 lg:px-20 text-center">
    <h3 class="text-xl font-semibold">Virtual Tour Lab PPLG</h3>
    <div class="mt-6 inline-block w-full md:w-2/3">
      <div class="bg-white rounded-lg overflow-hidden shadow-lg p-6">
        <img src="{{ asset('assets/images/programs/virtual-tour.jpg') }}" alt="Virtual Tour" class="w-full h-48 object-cover rounded">
        <div class="mt-4 text-sm text-gray-600">Klik untuk Memulai Virtual Tour</div>
      </div>
    </div>
  </div>
</section>

<!-- ========== FAQ SECTION ========== -->
<section class="py-12">
  <div class="container mx-auto px-6 lg:px-20">
    <h3 class="text-2xl font-semibold text-center text-orange-600">Pertanyaan yang Sering Diajukan</h3>
    <div class="mt-6 space-y-3 max-w-3xl mx-auto">
      @foreach([
        'Apa perbedaan PPLG dengan jurusan lain?',
        'Apakah ada program magang di perusahaan besar?',
        'Bagaimana peluang kerja setelah lulus?'
      ] as $q)
        <details class="p-4 border rounded">
          <summary class="font-medium">{{ $q }}</summary>
          <p class="mt-2 text-sm text-gray-600">Jawaban singkat mengenai: {{ $q }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>
@endsection
