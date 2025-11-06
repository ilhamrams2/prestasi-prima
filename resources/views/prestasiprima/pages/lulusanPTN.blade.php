@extends('prestasiprima.index')

@section('title', 'Lulusan PTN — Prestasi Prima')

@section('content')
<!-- ========== HEADER SECTION ========== -->
<section 
  class="relative mt-[100px] min-h-[70vh] flex items-center justify-center text-center overflow-hidden md:min-h-[80vh]"
  style="background: url('{{ asset('assets/images/lulusanptn/herobg.png') }}') center/cover no-repeat;">
  
  <!-- Overlay -->
  <div class="absolute inset-0 bg-orange-600/60"></div>

  <!-- Konten teks -->
  <div class="relative z-10 bg-white py-8 px-10 md:px-16 rounded-2xl shadow-lg">
    <h1 
      class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-orange-600 drop-shadow-sm whitespace-nowrap tracking-tight"
      style="word-spacing: 0.1em;">
      SELAMAT & SUKSES
    </h1>
    <p class="text-orange-500 text-base sm:text-lg mt-2 font-medium">
      Untuk yang Dinyatakan Lulus SNBP
    </p>
  </div>
</section>


<!-- ========== GRID FOTO LULUSAN ========== -->
<section class="py-16 md:py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10">
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 justify-items-center">
      @for ($i = 1; $i <= 9; $i++)
        <img 
          src="{{ asset('assets/images/lulusanptn/siswa' . $i . '.png') }}" 
          alt="Lulusan PTN {{ $i }}" 
          class="w-full max-w-[160px] sm:max-w-[200px] md:max-w-xs h-auto object-cover rounded-xl hover:scale-105 transition-transform duration-500 ease-in-out">
      @endfor
    </div>
  </div>
</section>
@endsection
