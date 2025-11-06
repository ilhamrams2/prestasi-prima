@extends('prestasiprima.index')

@section('title', 'BCF — Broadcasting & Film')

@section('content')

{{-- ========== HERO SECTION ========== --}}
<section class="relative pt-32 pb-20 bg-white overflow-hidden">
  <img src="{{ asset('assets/images/program/grid_line.png') }}" 
       alt="Grid Background" 
       class="absolute inset-0 w-full h-full object-cover opacity-25">

  <div class="relative max-w-7xl mx-auto px-6 md:px-10 flex flex-col lg:flex-row items-center gap-12">
    {{-- Text --}}
    <div class="w-full lg:w-1/2">
      <h1 class="text-4xl lg:text-5xl font-extrabold text-orange-500 leading-tight">Broadcasting</h1>
      <h2 class="text-3xl lg:text-4xl font-semibold mt-2 text-gray-800">& Film</h2>
      <p class="mt-6 text-gray-600 leading-relaxed text-justify">
        Jurusan Broadcasting & Film membekali siswa dengan kemampuan produksi audio-visual, 
        dari pra-produksi hingga pasca-produksi. Siswa akan mempelajari sinematografi, penyutradaraan, 
        editing, dan teknik penyiaran modern.
      </p>
      <a href="#about" 
         class="inline-block mt-8 bg-orange-500 text-white px-6 py-3 rounded-xl shadow-md hover:bg-orange-600 transition-all">
        Pelajari Lebih Lanjut
      </a>
    </div>

    {{-- Image --}}
    <div class="w-full lg:w-1/2">
      <img src="{{ asset('assets/images/program/bcf-hero.png') }}" 
           alt="Broadcasting & Film" 
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
      <h3 class="text-orange-600 font-medium text-lg">Mengenal Broadcasting & Film</h3>
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
        <p class="text-sm text-orange-400 ml-4">~/about/broadcasting</p>
      </div>

      <div class="flex items-center mb-4">
        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-3">
          <i data-lucide="video" class="w-6 h-6 text-orange-500"></i>
        </div>
        <h4 class="text-orange-500 font-semibold text-lg">Deskripsi Program</h4>
      </div>

      <p class="text-gray-700 text-justify leading-relaxed">
        Siswa jurusan BCF belajar tentang cara membuat karya audio-visual profesional. 
        Mereka akan mendalami teknik pengambilan gambar, penulisan naskah, penyutradaraan, editing, dan penyiaran.
      </p>

      <div class="mt-6 bg-slate-900 text-white text-sm p-4 rounded-xl font-mono leading-relaxed">
        <p class="opacity-80">
          <span class="text-orange-400">&gt;</span> story.create() <br>
          <span class="text-green-400">✔</span> Lights, camera, action!
        </p>
      </div>
    </div>

    {{-- Kepala Program --}}
    <div class="mt-20 flex flex-col lg:flex-row items-center justify-center gap-10">
      <img src="{{ asset('assets/images/staff/kapro4.jpg') }}" 
           alt="Kepala Program BCF" 
           class="w-64 h-80 object-cover rounded-2xl border border-orange-200 shadow-lg">
      <div class="max-w-md text-left">
        <span class="bg-orange-400 text-white px-4 py-1 rounded-full text-sm inline-flex items-center gap-1">
          <i data-lucide="user" class="w-4 h-4"></i> Kepala Program
        </span>
        <h3 class="text-2xl font-bold text-gray-900 mt-3">Muhamad Ichsan A.Md</h3>
        <blockquote class="mt-4 bg-orange-50 border-l-4 border-orange-400 p-4 rounded-r-lg shadow-sm italic text-gray-700 relative">
          <span class="absolute -top-3 left-4 text-orange-400 text-3xl font-serif">“</span>
          Dunia film dan broadcasting bukan sekadar hiburan, tapi media untuk menyampaikan pesan dan inspirasi.
        </blockquote>
      </div>
    </div>
  </div>
</section>

{{-- ========== PROSPEK KARIR ========== --}}
<section class="py-24 bg-gradient-to-r from-orange-500 to-orange-400 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-10 relative z-10">
    <h3 class="text-3xl font-bold text-white text-center mb-14">Prospek Karir</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach([
        ['camera', 'Sinematografer', '7–14 jt/bulan'],
        ['mic', 'Penyiar / Presenter', '6–10 jt/bulan'],
        ['clapperboard', 'Sutradara', '10–20 jt/bulan'],
        ['film', 'Editor Video / Film', '7–15 jt/bulan'],
        ['radio', 'Produser Program', '8–16 jt/bulan'],
        ['tv', 'Crew Produksi TV', '6–12 jt/bulan'],
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
    <p class="text-gray-600 mt-2">Peralatan produksi dan pasca produksi audio-visual profesional</p>

    <div class="relative mt-14 overflow-hidden">
      <div class="flex gap-10 w-max animate-marquee">
        @for ($i = 1; $i <= 20; $i++)
          <div class="flex-shrink-0 w-40 h-24 flex items-center justify-center bg-white rounded-xl shadow border border-orange-100">
            <img src="{{ asset('assets/images/program/bcf/logo (' . (($i - 1) % 7 + 1) . ').png') }}" 
                 alt="logo {{ $i }}" 
                 class="max-h-16 object-contain">
          </div>
        @endfor
      </div>
    </div>
  </div>
</section>

@include('prestasiprima.pages.program.journey', ['jurusan' => 'bcf'])
@include('prestasiprima.pages.program.tour', ['program' => 'bcf'])
@include('prestasiprima.pages.program.faq', ['jurusan' => 'bcf'])

<script> document.addEventListener("DOMContentLoaded", () => lucide.createIcons()); </script>
@endsection
