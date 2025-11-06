@extends('prestasiprima.index')

@section('title', 'TJKT — Teknik Jaringan Komputer dan Telekomunikasi')

@section('content')

{{-- ========== HERO SECTION ========== --}}
<section class="relative pt-32 pb-20 bg-white overflow-hidden">
  <img src="{{ asset('assets/images/program/grid_line.png') }}" 
       alt="Grid Background" 
       class="absolute inset-0 w-full h-full object-cover opacity-25">

  <div class="relative max-w-7xl mx-auto px-6 md:px-10 flex flex-col lg:flex-row items-center gap-12">
    {{-- Text --}}
    <div class="w-full lg:w-1/2">
      <h1 class="text-4xl lg:text-5xl font-extrabold text-orange-500 leading-tight">Teknik Jaringan</h1>
      <h2 class="text-3xl lg:text-4xl font-semibold mt-2 text-gray-800">Komputer dan Telekomunikasi</h2>
      <p class="mt-6 text-gray-600 leading-relaxed text-justify">
        Jurusan TJKT membekali siswa dengan kemampuan untuk membangun, mengelola, dan memelihara jaringan komputer serta sistem telekomunikasi modern.
        Siswa akan mempelajari teknologi jaringan berbasis kabel maupun nirkabel, perangkat server, hingga keamanan jaringan (network security).
      </p>
      <a href="#about" 
         class="inline-block mt-8 bg-orange-500 text-white px-6 py-3 rounded-xl shadow-md hover:bg-orange-600 transition-all">
        Pelajari Lebih Lanjut
      </a>
    </div>

    {{-- Image --}}
    <div class="w-full lg:w-1/2">
      <img src="{{ asset('assets/images/program/tjkt-hero.png') }}" 
           alt="TJKT" 
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
      <h3 class="text-orange-600 font-medium text-lg">Mengenal Teknik Jaringan Komputer dan Telekomunikasi</h3>
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
        <p class="text-sm text-orange-400 ml-4">~/about/network-telecommunication</p>
      </div>

      <div class="flex items-center mb-4">
        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-3">
          <i data-lucide="network" class="w-6 h-6 text-orange-500"></i>
        </div>
        <h4 class="text-orange-500 font-semibold text-lg">Deskripsi Program</h4>
      </div>

      <p class="text-gray-700 text-justify leading-relaxed">
        TJKT adalah jurusan yang mempelajari tentang perancangan dan implementasi jaringan komputer,
        perangkat keras jaringan (router, switch, server), serta konfigurasi dan troubleshooting sistem komunikasi data.
        Lulusan diharapkan mampu menjadi teknisi jaringan, administrator sistem, atau profesional IT support di berbagai bidang.
      </p>

      <div class="mt-6 bg-slate-900 text-white text-sm p-4 rounded-xl font-mono leading-relaxed">
        <p class="opacity-80">
          <span class="text-orange-400">&gt;</span> network.initialize() <br>
          <span class="text-green-400">✔</span> Ready to connect the world
        </p>
      </div>
    </div>

    {{-- Kepala Program --}}
    <div class="mt-20 flex flex-col lg:flex-row items-center justify-center gap-10">
      <img src="{{ asset('assets/images/staff/kapro3.jpg') }}" 
           alt="Kepala Program TJKT" 
           class="w-64 h-80 object-cover rounded-2xl border border-orange-200 shadow-lg">
      <div class="max-w-md text-left">
        <span class="bg-orange-400 text-white px-4 py-1 rounded-full text-sm inline-flex items-center gap-1">
          <i data-lucide="user" class="w-4 h-4"></i> Kepala Program
        </span>
        <h3 class="text-2xl font-bold text-gray-900 mt-3">Sopan Sopari, S.Kom.</h3>
        <blockquote class="mt-4 bg-orange-50 border-l-4 border-orange-400 p-4 rounded-r-lg shadow-sm italic text-gray-700 relative">
          <span class="absolute -top-3 left-4 text-orange-400 text-3xl font-serif">“</span>
          Kami mencetak lulusan yang siap menjadi profesional di bidang jaringan, telekomunikasi,
          dan keamanan sistem informasi global.
        </blockquote>
      </div>
    </div>
  </div>
</section>

{{-- ========== PROSPEK KARIR ========== --}}
<section class="py-24 bg-gradient-to-r from-orange-500 to-orange-400 relative overflow-hidden">
  <div class="absolute inset-0 opacity-20 bg-[url('data:image/svg+xml,%3Csvg width=\'24\' height=\'24\' ... %3E')]"></div>

  <div class="max-w-7xl mx-auto px-6 md:px-10 relative z-10">
    <h3 class="text-3xl font-bold text-white text-center mb-14">Prospek Karir</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach([
        ['router', 'Network Administrator', '7–15 jt/bulan'],
        ['wifi', 'Network Engineer', '8–16 jt/bulan'],
        ['server', 'Server Administrator', '7–14 jt/bulan'],
        ['shield', 'Cyber Security Analyst', '9–20 jt/bulan'],
        ['radio', 'Teknisi Telekomunikasi', '6–12 jt/bulan'],
        ['cpu', 'IT Support Specialist', '6–10 jt/bulan'],
      ] as [$icon, $title, $salary])
        <div class="bg-white/15 backdrop-blur-lg border border-white/20 rounded-2xl p-6 text-white hover:-translate-y-1 hover:shadow-lg transition">
          <div class="flex items-start gap-4">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-white/20">
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
    <p class="text-gray-600 mt-2">Perangkat pendukung praktik jaringan dan telekomunikasi modern</p>

    <div class="relative mt-14 overflow-hidden">
      <div class="flex gap-10 w-max animate-marquee">
        @for ($i = 1; $i <= 20; $i++)
          <div class="flex-shrink-0 w-40 h-24 flex items-center justify-center bg-white rounded-xl shadow border border-orange-100">
            <img src="{{ asset('assets/images/program/tjkt/logo (' . (($i - 1) % 10 + 1) . ').png') }}" 
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
@include('prestasiprima.pages.program.journey', ['program' => 'tjkt'])

{{-- ========== VIRTUAL TOUR ========== --}}
@include('prestasiprima.pages.program.tour', ['program' => 'tjkt'])

{{-- ========== FAQ SECTION ========== --}}
@include('prestasiprima.pages.program.faq', ['jurusan' => 'tjkt'])

<script> document.addEventListener("DOMContentLoaded", () => lucide.createIcons()); </script>

@endsection
