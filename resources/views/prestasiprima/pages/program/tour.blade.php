{{-- ========== VIRTUAL TOUR (4 Jurusan, Route & Gambar Sama, Smooth Animation) ========== --}}
@php
  $virtualTours = [
    'pplg' => 'Virtual Tour Lab PPLG',
    'dkv'  => 'Virtual Tour Studio DKV',
    'tjkt' => 'Virtual Tour Lab TJKT',
    'bcf'  => 'Virtual Tour Ruang BCF',
  ];

  $program = $program ?? 'pplg';
  $title = $virtualTours[$program] ?? $virtualTours['pplg'];
@endphp

<section id="virtual-tour" class="py-24 bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-10 text-center">
    
    {{-- Judul --}}
    <h3 class="text-2xl font-bold text-orange-600 mb-10"
        data-aos="fade-up"
        data-aos-duration="600"
        data-aos-easing="ease-in-out">
      {{ $title }}
    </h3>

    {{-- Preview Card --}}
    <div class="flex justify-center"
         data-aos="fade-up"
         data-aos-duration="800"
         data-aos-easing="ease-in-out"
         data-aos-delay="150">
      
      <div 
        class="relative w-full md:w-4/5 lg:w-2/3 rounded-2xl overflow-hidden bg-white/20 backdrop-blur-md border border-orange-100 shadow-lg transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer"
        onclick="window.location='{{ route('virtual-tour') }}'">
        
        {{-- Badge 360° --}}
        <span class="absolute top-4 left-4 bg-orange-500/90 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
          360° Virtual Tour
        </span>

        {{-- Gambar Preview (Satu untuk semua) --}}
        <img src="{{ asset('assets/360View/v360-1.jpg') }}" 
             alt="Preview Virtual Tour {{ strtoupper($program) }}" 
             class="w-full aspect-video object-cover">

        {{-- Overlay Teks --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent flex items-end justify-center p-6">
          <h3 class="text-lg md:text-2xl font-semibold text-white drop-shadow-lg">
            Klik untuk Memulai Virtual Tour
          </h3>
        </div>

        {{-- Icon VR Cardboard --}}
        <div class="absolute top-4 right-4 bg-orange-500/80 p-3 rounded-full shadow-md animate-bounce">
          <i class="ri-vr-line text-white text-xl"></i>
        </div>
      </div>
    </div>
  </div>
</section>
