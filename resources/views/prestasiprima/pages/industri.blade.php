@extends('prestasiprima.index')

@section('title', 'Mitra Industri')

@section('content')
<section id="industri" class="relative z-10 overflow-hidden pt-32 md:pt-40 pb-24 bg-white">
  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center relative">

    {{-- ===== HEADER & TEKS SATU BLOK ===== --}}
    <div class="mb-20 text-center relative" data-aos="fade-up" data-aos-duration="900">
      <div class="absolute left-1/2 -translate-x-1/2 -top-6 w-16 h-1 bg-orange-500 rounded-full"></div>

      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
        Kolaborasi <span class="text-orange-600">Pendidikan</span> dan <span class="text-orange-500">Industri</span> untuk Masa Depan Unggul
      </h2>

      <p class="text-gray-600 max-w-3xl mx-auto text-lg md:text-xl leading-relaxed">
        <span class="font-semibold text-orange-500">SMK Prestasi Prima</span> menjalin kemitraan strategis dengan berbagai perusahaan dan lembaga industri
        terkemuka guna menciptakan lulusan yang kompeten, berkarakter, dan siap menghadapi tantangan dunia kerja modern.
      </p>
    </div>

    {{-- ===== GRID MITRA DARI DATABASE ===== --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 md:gap-8 relative" data-aos="fade-up" data-aos-delay="200">
      @foreach ($industris as $industri)
      <div 
        class="group bg-white rounded-tr-[40px] rounded-bl-[40px] 
               shadow-md hover:shadow-lg hover:shadow-orange-200/60 
               transition duration-500 transform hover:-translate-y-1
               flex items-center justify-center p-6 border border-transparent hover:border-orange-100 relative overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-br from-orange-50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-700"></div>

        @if($industri->logo)
        <img src="{{ asset('storage/' . $industri->logo) }}" 
             alt="{{ $industri->nama }}" 
             class="relative z-10 max-h-16 md:max-h-20 object-contain opacity-90 group-hover:opacity-100 transition duration-500">
        @else
        <span class="text-gray-400">{{ $industri->nama }}</span>
        @endif
      </div>
      @endforeach
    </div>

  </div>

  {{-- ====== BACKGROUND DEKORATIF (network & race) ====== --}}
  <img src="{{ asset('assets/images/section/prestasi/netowrk.svg') }}"
       alt="Network"
       class="absolute -bottom-20 -left-48 w-[460px] md:w-[560px] opacity-40 select-none pointer-events-none">

  <img src="{{ asset('assets/images/section/prestasi/race.svg') }}"
       alt="Race"
       class="absolute -bottom-72 -right-20 w-[480px] md:w-[600px] opacity-40 select-none pointer-events-none">
</section>

{{-- AOS Animation --}}
<script>
  const config = { duration: 900, once: true };
  if (window.initAOS) {
    window.initAOS(config).catch((error) => console.error('Failed to initialize AOS on Industri page', error));
  } else if (typeof window.ensureAOS === 'function') {
    window.ensureAOS().then((AOS) => AOS.init(config)).catch((error) => console.error('Failed to initialize AOS on Industri page', error));
  } else if (window.AOS) {
    window.AOS.init(config);
  }
</script>
@endsection
