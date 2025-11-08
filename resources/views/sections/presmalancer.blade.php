<!-- ================= HERO BANNER ================= -->
<section role="banner" class="relative bg-orange-500 overflow-hidden">

  @php
    $presmalancerImageFiles = [
      'networkTop' => 'assets/images/section/presmalancer/jaringan.png',
      'networkBottom' => 'assets/images/section/presmalancer/jaringan2.png',
      'logoPrimary' => 'assets/images/section/presmalancer/logo.webp',
      'logoFoundation' => 'assets/images/section/presmalancer/yayasan.png',
      'student' => 'assets/images/section/presmalancer/siswa1.png',
    ];
    $presmalancerSizes = [];
    foreach ($presmalancerImageFiles as $key => $relativePath) {
      $size = @getimagesize(public_path($relativePath)) ?: [400, 400];
      $presmalancerSizes[$key] = ['width' => $size[0], 'height' => $size[1]];
    }
  @endphp

  <!-- ===== Dekorasi Jaringan ===== -->
  <img src="{{ asset($presmalancerImageFiles['networkTop']) }}"
       alt="Network Top Right"
       width="{{ $presmalancerSizes['networkTop']['width'] }}"
       height="{{ $presmalancerSizes['networkTop']['height'] }}"
       class="absolute top-0 right-0 w-64 sm:w-80 md:w-96 object-cover opacity-90 brightness-125 aos-init aos-animate" 
       data-aos="fade-down-right" data-aos-duration="1200" data-aos-once="true">
       
  <img src="{{ asset($presmalancerImageFiles['networkBottom']) }}"
       alt="Network Bottom Left"
       width="{{ $presmalancerSizes['networkBottom']['width'] }}"
       height="{{ $presmalancerSizes['networkBottom']['height'] }}"
       class="absolute bottom-0 left-0 w-24 sm:w-32 md:w-40 object-cover opacity-70 aos-init aos-animate" 
       data-aos="fade-up-left" data-aos-duration="1200" data-aos-once="true">

  <!-- ===== Konten Utama ===== -->
  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 md:px-12 py-12 grid md:grid-cols-12 items-center gap-6">

<!-- ===== Bagian Kiri: Teks dan Logo ===== -->
    <div class="md:col-span-8 text-white space-y-4 sm:space-y-6 md:pr-8 text-center md:text-left"
         data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
      
      <!-- Logo (Desktop) -->
      <div class="flex justify-center md:justify-start gap-3 sm:gap-4 mb-2 hidden md:flex aos-init aos-animate" data-aos="fade-down" data-aos-duration="800">
  <img src="{{ asset($presmalancerImageFiles['logoPrimary']) }}" alt="Logo 1" width="{{ $presmalancerSizes['logoPrimary']['width'] }}" height="{{ $presmalancerSizes['logoPrimary']['height'] }}" class="h-10 w-auto sm:h-12 sm:w-auto max-w-full object-contain drop-shadow-md">
  <img src="{{ asset($presmalancerImageFiles['logoFoundation']) }}" alt="Logo 2" width="{{ $presmalancerSizes['logoFoundation']['width'] }}" height="{{ $presmalancerSizes['logoFoundation']['height'] }}" class="h-10 w-auto sm:h-12 sm:w-auto max-w-full object-contain drop-shadow-md">
      </div>

      <!-- Deskripsi -->
      <h2 class="text-base sm:text-lg md:text-2xl lg:text-3xl font-bold leading-snug max-w-2xl mx-auto md:mx-0 aos-init aos-animate"
          data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
        Presmalance hadir untuk siswa dan alumni SMK. Temukan magang, kerja paruh waktu, 
        dan proyek freelance sesuai keahlianmu. Tingkatkan skill dan wujudkan karier impianmu!
      </h2>

      <!-- Tombol -->
      <a href="/presmalance" 
         class="inline-flex items-center px-5 py-2.5 font-semibold rounded-lg shadow 
                bg-white text-orange-600 hover:bg-gray-100 hover:scale-105 
                transition-all w-max mx-auto md:mx-0 aos-init aos-animate"
         data-aos="zoom-in" data-aos-duration="800" data-aos-delay="600">
        Presmalancer <span class="ml-2">→</span>
      </a>
    </div>

    <!-- ===== Bagian Kanan: Gambar Siswa ===== -->
    <div class="relative md:col-span-4 flex justify-center md:justify-end mt-6 md:mt-0">
      <div class="relative flex items-center justify-center">

        <!-- === Lingkaran (Mobile Only) === -->
        <div class="absolute w-[340px] h-[340px] sm:w-[400px] sm:h-[400px] bg-white/25 rounded-full block md:hidden"></div>
        <div class="absolute w-[260px] h-[260px] sm:w-[320px] sm:h-[320px] bg-white/40 rounded-full block md:hidden"></div>

        <!-- ===== Gambar Siswa + Efek Blur ===== -->
        <div class="relative flex items-center justify-center">
    <img src="{{ asset($presmalancerImageFiles['student']) }}"
      alt="Siswa"
      width="{{ $presmalancerSizes['student']['width'] }}"
      height="{{ $presmalancerSizes['student']['height'] }}"
               class="relative z-20 max-h-[420px] sm:max-h-[440px] object-contain drop-shadow-2xl select-none">

          <!-- ===== Efek Blur Menyatu (Natural Fade) ===== -->
          <div class="absolute -bottom-10 left-1/2 -translate-x-1/2 z-30
                      w-[65%] h-24 sm:w-[70%] sm:h-28 md:w-[85%] md:h-32 
                      rounded-t-full 
                      bg-gradient-to-b from-orange-400/60 via-orange-500/85 to-orange-500
                      backdrop-blur-[10px] md:backdrop-blur-[14px]
                      shadow-[0_-10px_60px_#f97316cc]
                      transition-all duration-700 ease-in-out
                      blend-blur">
          </div>
        </div>
      </div>
    </div>

    <!-- ===== Lingkaran Background di Desktop ===== -->
    <div class="absolute top-1/2 left-[12%] -translate-y-1/2 
                w-[400px] sm:w-[500px] md:w-[600px] 
                h-[400px] sm:h-[500px] md:h-[600px] 
                bg-white/20 rounded-full hidden md:block"></div>

    <div class="absolute top-1/2 left-[35%] -translate-x-1/2 -translate-y-1/2 
                w-[300px] sm:w-[350px] md:w-[400px] 
                h-[300px] sm:h-[350px] md:h-[400px] 
                bg-white/40 rounded-full hidden md:block"></div>
  </div>

  <!-- ===== Logo Sekolah (Desktop Only) ===== -->
  <img src="{{ asset($presmalancerImageFiles['logoPrimary']) }}" 
    alt="Logo Sekolah" 
    width="{{ $presmalancerSizes['logoPrimary']['width'] }}"
    height="{{ $presmalancerSizes['logoPrimary']['height'] }}"
       class="absolute bottom-0 -right-16 sm:-right-20 md:-right-24 
              w-36 sm:w-40 md:w-48 opacity-50 pointer-events-none hidden md:block aos-init aos-animate"
       data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">

  <!-- ===== Logo (Mobile Only, pojok kiri atas) ===== -->
  <div class="absolute top-4 left-4 flex gap-2 md:hidden z-30 aos-init aos-animate" data-aos="fade-down" data-aos-duration="800">
  <img src="{{ asset($presmalancerImageFiles['logoPrimary']) }}" alt="Logo Mobile 1" width="{{ $presmalancerSizes['logoPrimary']['width'] }}" height="{{ $presmalancerSizes['logoPrimary']['height'] }}" class="h-8 w-auto sm:h-9 sm:w-auto max-w-full object-contain drop-shadow-md">
  <img src="{{ asset($presmalancerImageFiles['logoFoundation']) }}" alt="Logo Mobile 2" width="{{ $presmalancerSizes['logoFoundation']['width'] }}" height="{{ $presmalancerSizes['logoFoundation']['height'] }}" class="h-8 w-auto sm:h-9 sm:w-auto max-w-full object-contain drop-shadow-md">
  </div>

</section>

<!-- ======= RESPONSIVE STYLE ======= -->
<style>
  /* ================= MOBILE VIEW ================= */
  @media (max-width: 768px) {

    /* Atur grid supaya tetap stabil */
    section[role="banner"] .grid {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 3.5rem 1rem;
      gap: 0.75rem;
    }

    /* Gambar di atas teks */
    section[role="banner"] .md\:col-span-4 {
      order: -1;
      margin-bottom: 0.75rem;
    }

    /* Ukuran gambar siswa */
    section[role="banner"] img[alt="Siswa"] {
      position: relative;
      z-index: 20;
      max-height: 230px;
      margin: 0 auto 0.5rem;
    }

    /* === LINGKARAN DEKORASI === */
    section[role="banner"] .md\:col-span-4 > div.absolute {
      width: 220px !important;
      height: 220px !important;
      opacity: 0.25 !important;
    }

    /* Efek blur bawah gambar — lebih kecil dan halus */
    section[role="banner"] .blend-blur {
      width: 65%;
      height: 55px;
      bottom: -18px;
      background: linear-gradient(
        to bottom,
        rgba(249, 115, 22, 0.5),
        rgba(249, 115, 22, 0.85),
        rgba(249, 115, 22, 1)
      );
      border-top-left-radius: 9999px;
      border-top-right-radius: 9999px;
      filter: blur(2px);
    }

    /* === TEKS === */
    section[role="banner"] h2 {
      font-size: 0.95rem;
      line-height: 1.45;
      width: 90%;
      margin: 0.4rem auto;
    }

    /* === TOMBOL === */
    section[role="banner"] a {
      font-size: 0.9rem;
      padding: 0.55rem 1.3rem;
      margin: 0.5rem auto 0;
    }

    /* Sembunyikan logo desktop di bawah */
    section[role="banner"] img[alt="Logo Sekolah"] {
      display: none;
    }

    /* Hilangkan logo ganda di atas teks */
    section[role="banner"] .md\:col-span-8 > div:first-child {
      display: none;
    }
  }

  /* ================= DESKTOP VIEW ================= */
  @media (min-width: 768px) {
    .blend-blur {
      mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 1) 70%, rgba(0, 0, 0, 0));
      -webkit-mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 1) 70%, rgba(0, 0, 0, 0));
    }
  }
</style>

<!-- ===== ANIMASI FLOATING UNTUK DEKORASI ===== -->
<style>
  @keyframes float {
    0%, 100% { transform: translateY(0px) translateX(0px); }
    25% { transform: translateY(-8px) translateX(3px); }
    50% { transform: translateY(-4px) translateX(-3px); }
    75% { transform: translateY(4px) translateX(2px); }
  }

  /* Floating efek untuk jaringan */
  img[alt="Network Top Right"],
  img[alt="Network Bottom Left"] {
    animation: float 6s ease-in-out infinite;
  }
</style>

<!-- ===== INISIALISASI AOS ===== -->
<script>
  AOS.init({
    once: true,
    easing: 'ease-in-out',
    duration: 1000,
  });
</script>