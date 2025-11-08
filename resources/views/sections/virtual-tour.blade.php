{{-- ================= SECTION VIRTUAL TOUR ================= --}}
<section id="virtual-tour" class="relative py-24 bg-gradient-to-r from-orange-50 via-white to-orange-50 overflow-hidden">

  <div class="max-w-5xl mx-auto px-4 text-center relative z-10">

    {{-- Judul --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-2 tracking-tight"
        data-aos="fade-up" data-aos-duration="1000">
      Jelajahi SMK Prestasi Prima 
      <span class="text-orange-500">Secara Virtual</span>
    </h2>

    {{-- Subtitle / Microcopy --}}
    <p class="text-sm md:text-base text-gray-500 mb-8"
       data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
      Jelajahi ruang kelas, laboratorium, dan fasilitas unggulan kami dari mana saja!
    </p>

    {{-- Tagline --}}
    <p class="text-lg md:text-xl text-gray-700 mb-12"
       data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
      Rasakan pengalaman menjelajahi sekolah kami melalui tur virtual 360°, lihat fasilitas unggulan, ruang belajar, laboratorium, dan lingkungan sekolah secara interaktif.
    </p>

    {{-- Tombol CTA --}}
    <div class="flex flex-col items-center">
    <a href="{{ route('virtual-tour') }}"
  class="inline-block bg-orange-500 text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:bg-orange-700 transition transform hover:-translate-y-1 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-200 focus-visible:ring-offset-2"
         data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="250">
         Mulai Virtual Tour
      </a>
      {{-- Arrow animasi --}}
      <div class="mt-4 animate-bounce text-orange-500">
        <i class="fa-solid fa-arrow-down"></i>
      </div>
    </div>

    {{-- Preview Card --}}
    <div class="mt-16 flex justify-center"
         data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350">
      <div class="preview-card relative w-full md:w-4/5 lg:w-2/3 rounded-xl overflow-hidden bg-white/20 backdrop-blur-md border border-white/30 shadow-lg transition-transform hover:scale-110 hover:shadow-2xl cursor-pointer"
           onclick="window.location='{{ route('virtual-tour') }}'">
        
        {{-- Badge 360° --}}
  <span class="absolute top-4 left-4 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded-full">
          360° Virtual Tour
        </span>

        <img src="{{ asset('assets/360View/v360-1.jpg') }}" 
             alt="Preview Virtual Tour" 
             class="w-full object-cover aspect-video">

        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent flex items-end p-6">
          <h3 class="text-xl md:text-2xl font-bold text-white drop-shadow-lg">
            Klik untuk Memulai Virtual Tour
          </h3>
        </div>

  <div class="absolute top-4 right-4 bg-orange-500 p-3 rounded-full shadow-lg animate-bounce icon-vr">
          <i class="fa-solid fa-vr-cardboard text-white text-lg md:text-xl"></i>
        </div>
      </div>
    </div>

  </div>

  {{-- Decorative shapes --}}
  <div class="absolute top-0 left-0 w-64 h-64 bg-orange-200/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-float-slow"></div>
  <div class="absolute bottom-0 right-0 w-72 h-72 bg-orange-300/20 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-float-slow"></div>

  {{-- Icons dekoratif lebih besar --}}
  <img src="{{ asset('assets/images/section/virtual-tour/icon1.svg') }}" 
       alt="Icon Dekorasi Kiri" 
       class="absolute top-1/4 left-0 w-80 h-80 opacity-0 glow-icon sway-left"
       data-aos="fade-up-right" data-aos-duration="1200" data-aos-delay="400">

  <img src="{{ asset('assets/images/section/virtual-tour/icon2.svg') }}" 
       alt="Icon Dekorasi Kanan" 
       class="absolute bottom-1/4 right-0 w-80 h-80 opacity-0 glow-icon sway-right"
       data-aos="fade-up-left" data-aos-duration="1200" data-aos-delay="400">

</section>

{{-- CSS untuk floating, hover & efek hidup --}}
<style>
  @keyframes floatSlow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
  .animate-float-slow {
    animation: floatSlow 6s ease-in-out infinite;
  }

  /* Hover card effects */
  .preview-card:hover .icon-vr {
    transform: rotate(15deg);
    transition: transform 0.5s ease;
  }

  /* Glow effect saat muncul */
  .glow-icon {
    filter: drop-shadow(0 0 30px rgba(255, 165, 0, 1));
    transition: filter 0.5s ease, opacity 0.5s ease;
  }
  .glow-icon[data-aos].aos-animate {
    opacity: 1;
  }

  /* Sway animation */
  @keyframes sway-left {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(30px); }
  }
  @keyframes sway-right {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(-30px); }
  }
  .sway-left.aos-animate {
    animation: sway-left 4s ease-in-out infinite alternate;
  }
  .sway-right.aos-animate {
    animation: sway-right 4s ease-in-out infinite alternate;
  }

  /* Responsive scaling untuk mobile */
  @media (max-width: 768px) {
    .w-80.h-80 { display: none !important; } /* Hilangkan ikon di mobile */
    .md\:w-4\/5 { width: 90% !important; }
    .lg\:w-2\/3 { width: 95% !important; }
  }
</style>

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: true });
</script>
