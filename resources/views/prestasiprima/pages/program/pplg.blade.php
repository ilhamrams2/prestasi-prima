@extends('prestasiprima.index')

@section('title', 'PPLG — Pengembangan Perangkat Lunak dan Gim')

@section('content')

{{-- ========== HERO SECTION ========== --}}
<section class="relative pt-32 pb-20 bg-white overflow-hidden">
  <img src="{{ asset('assets/images/program/grid_line.png') }}" 
       alt="Grid Background" 
       class="absolute inset-0 w-full h-full object-cover opacity-25">

  <div class="relative max-w-7xl mx-auto px-6 md:px-10 flex flex-col lg:flex-row items-center gap-12">
    {{-- Text --}}
    <div class="w-full lg:w-1/2">
      <h1 class="text-4xl lg:text-5xl font-extrabold text-orange-500 leading-tight">Pengembangan</h1>
      <h2 class="text-3xl lg:text-4xl font-semibold mt-2 text-gray-800">Perangkat Lunak dan Gim</h2>
      <p class="mt-6 text-gray-600 leading-relaxed text-justify">
        Mengenal lebih dekat dunia pemrograman, inovasi, dan teknologi digital yang membentuk masa depan. 
        Siswa akan belajar merancang, mengembangkan, dan mengelola aplikasi modern termasuk web, mobile, dan gim.
      </p>
      <a href="#about" 
         class="inline-block mt-8 bg-orange-500 text-white px-6 py-3 rounded-xl shadow-md hover:bg-orange-600 transition-all">
        Pelajari Lebih Lanjut
      </a>
    </div>

    {{-- Image --}}
    <div class="w-full lg:w-1/2">
      <img src="{{ asset('assets/images/program/pplg-hero.png') }}" 
           alt="PPLG" 
           class="w-full h-auto object-contain">
    </div>
  </div>
</section>

{{-- ========== ABOUT SECTION ========== --}}
<section id="about" class="relative py-24 bg-white overflow-hidden">
  <img src="{{ asset('assets/images/program/grid_line.png') }}" 
       alt="Grid" 
       class="absolute inset-0 w-full h-full object-cover opacity-20">

  <div class="relative max-w-7xl mx-auto px-6 md:px-10 text-center">
    <div>
      <span class="bg-orange-500 text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-3 inline-block">Tentang Jurusan</span>
      <h3 class="text-orange-600 font-medium text-lg">Mengenal Rekayasa Perangkat Lunak</h3>
      <div class="flex justify-center items-center mt-3 space-x-1">
        <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
        <span class="w-1.5 h-1 bg-orange-600 rounded-full"></span>
        <span class="w-8 h-1 bg-orange-400 rounded-full"></span>
      </div>
    </div>

    <div class="mt-12 bg-white rounded-2xl shadow-xl border border-orange-100 p-8 max-w-5xl mx-auto text-left">
      <div class="flex items-center space-x-2 mb-6">
        @foreach(['red','yellow','green'] as $color)
          <span class="w-3 h-3 bg-{{ $color }}-400 rounded-full"></span>
        @endforeach
        <p class="text-sm text-orange-400 ml-4">~/about/software-engineering</p>
      </div>

      <div class="flex items-center mb-4">
        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-3">
          <i data-lucide="cpu" class="w-6 h-6 text-orange-500"></i>
        </div>
        <h4 class="text-orange-500 font-semibold text-lg">Deskripsi Program</h4>
      </div>

      <p class="text-gray-700 text-justify leading-relaxed">
        Rekayasa Perangkat Lunak membekali siswa dengan kemampuan merancang,
        mengembangkan, dan mengelola aplikasi modern seperti web, mobile, dan database management.
      </p>

      <div class="mt-6 bg-slate-900 text-white text-sm p-4 rounded-xl font-mono leading-relaxed">
        <p class="opacity-80">
          <span class="text-orange-400">&gt;</span> program.initialize() <br>
          <span class="text-green-400">✔</span> Ready to build the future
        </p>
      </div>
    </div>

    {{-- Kepala Program --}}
    <div class="mt-20 flex flex-col lg:flex-row items-center justify-center gap-10">
      <img src="{{ asset('assets/images/staff/kapro2.jpg') }}" 
           alt="Kepala Program" 
           class="w-64 h-80 object-cover rounded-2xl border border-orange-200 shadow-lg">
      <div class="max-w-md text-left">
        <span class="bg-orange-400 text-white px-4 py-1 rounded-full text-sm inline-flex items-center gap-1">
          <i data-lucide="user" class="w-4 h-4"></i> Kepala Program
        </span>
        <h3 class="text-2xl font-bold text-gray-900 mt-3">Agus Nugraha, S.Kom.</h3>
        <blockquote class="mt-4 bg-orange-50 border-l-4 border-orange-400 p-4 rounded-r-lg shadow-sm italic text-gray-700 relative">
          <span class="absolute -top-3 left-4 text-orange-400 text-3xl font-serif">“</span>
          Kami membekali siswa dengan kemampuan teknis, mindset problem solver, 
          dan kesiapan menghadapi dunia industri modern.
        </blockquote>
      </div>
    </div>
  </div>
</section>

{{-- ========== PROSPEK KARIR ========== --}}
<section class="py-24 relative overflow-hidden bg-gradient-to-r from-orange-500 to-orange-400">
  {{-- === Latar Ornament === --}}
  <div class="absolute inset-0">
    <img src="{{ asset('assets/images/ornamentbg.png') }}" 
         alt="Ornament Background"
         class="w-full h-full object-cover opacity-20 mix-blend-overlay">
  </div>

  {{-- === Overlay tambahan halus === --}}
  <div class="absolute inset-0 bg-gradient-to-br from-orange-600/30 via-orange-400/10 to-transparent"></div>

  {{-- === Konten utama === --}}
  <div class="max-w-7xl mx-auto px-6 md:px-10 relative z-10">
    <h3 class="text-3xl md:text-4xl font-extrabold text-white text-center mb-14 tracking-tight">
      Prospek Karir
    </h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach([
        ['globe', 'Front-End Developer', '6–12 jt/bulan'],
        ['database', 'Back-End Developer', '7–15 jt/bulan'],
        ['code', 'Full-Stack Developer', '10–20 jt/bulan'],
        ['smartphone', 'Mobile Developer', '8–15 jt/bulan'],
        ['layout', 'UI/UX Designer', '6–12 jt/bulan'],
        ['gamepad', 'Game Developer', '8–11 jt/bulan'],
      ] as [$icon, $title, $salary])
        <div class="group bg-white/15 backdrop-blur-xl border border-white/20 rounded-2xl p-6 text-white hover:-translate-y-2 hover:shadow-2xl hover:bg-white/25 transition-all duration-500">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/20 group-hover:bg-white/30 transition">
              <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>
            </div>
            <div>
              <div class="font-semibold text-lg">{{ $title }}</div>
              <div class="text-sm opacity-80 mt-1">{{ $salary }}</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ========== TOOLS & EQUIPMENT ========== --}}
<section class="py-24 bg-white text-center overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-10">
    <h3 class="text-xl font-semibold text-orange-500">Tools dan Equipment</h3>
    <p class="text-gray-600 mt-2">Perangkat dan software pendukung pengembangan aplikasi, website, dan gim</p>

    <div class="relative mt-14 overflow-hidden">
      <div class="flex gap-10 w-max animate-marquee">
        @for ($i = 1; $i <= 20; $i++)
          <div class="flex-shrink-0 w-40 h-24 flex items-center justify-center bg-white rounded-xl shadow border border-orange-100">
            <img src="{{ asset('assets/images/program/pplg/logo (' . (($i - 1) % 10 + 1) . ').png') }}" 
                 alt="logo {{ $i }}" 
                 class="max-h-16 object-contain">
          </div>
        @endfor
      </div>
    </div>
  </div>
</section>

<style>
@keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
.animate-marquee { animation: marquee 40s linear infinite; }
</style>

{{-- ========== JOURNEY BELAJAR ========== --}}
@include('prestasiprima.pages.program.journey', ['program' => 'pplg'])

{{-- ========== VIRTUAL TOUR ========== --}}
@include('prestasiprima.pages.program.tour', ['program' => 'pplg'])

{{-- ========== FAQ SECTION ========== --}}
@include('prestasiprima.pages.program.faq', ['jurusan' => 'pplg'])

<script> document.addEventListener("DOMContentLoaded", () => lucide.createIcons()); </script>

@endsection
