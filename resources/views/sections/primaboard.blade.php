<!-- ================= SECTION PRIMABOARD ================= -->
<section id="primaboard"
  class="relative flex flex-col md:flex-row items-center justify-between
         bg-orange-500 px-4 md:px-8 py-6 overflow-hidden min-h-[220px]">

  <!-- Pola Kotak Catur Kiri -->
  <div class="absolute left-0 top-0 h-full hidden md:flex opacity-90 z-0" data-aos="fade-right">
    <!-- Kolom 1 -->
    <div class="flex flex-col">
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
    </div>
    <!-- Kolom 2 -->
    <div class="flex flex-col">
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
    </div>
    <!-- Kolom 3 -->
    <div class="flex flex-col">
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
    </div>
    <!-- Kolom 4 -->
    <div class="flex flex-col">
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
    </div>
  </div>

  <!-- Latar Kotak Oranye Kanan -->
  <div class="absolute right-0 top-0 h-full hidden md:flex z-0" data-aos="fade-left" data-aos-delay="200">
    <div class="w-28 md:w-36 bg-orange-500"></div>
    <div class="w-28 md:w-36 bg-orange-400"></div>
    <div class="w-28 md:w-36 bg-orange-300"></div>
    <div class="w-28 md:w-36 bg-orange-400"></div>
    <div class="w-28 md:w-36 bg-orange-500"></div>
  </div>

  @php
    $primaboardLogos = [
      'primary' => 'assets/images/section/primaboard/logo.webp',
      'foundation' => 'assets/images/section/primaboard/yayasan.png',
      'network' => 'assets/images/section/primaboard/jaringan.png',
    ];
    $primaboardSizes = [];
    foreach ($primaboardLogos as $key => $path) {
      $size = @getimagesize(public_path($path)) ?: [320, 200];
      $primaboardSizes[$key] = ['width' => $size[0], 'height' => $size[1]];
    }
  @endphp

  <!-- Konten Utama -->
  <div class="flex-1 text-white z-10">
    <div class="max-w-7xl mx-auto px-4 md:px-8 text-center md:text-left space-y-4 sm:space-y-5">
      
      <!-- Logo -->
      <div class="flex justify-center md:justify-start gap-3 items-center mb-3" data-aos="zoom-in">
  <img src="{{ asset($primaboardLogos['primary']) }}" alt="Logo 1" width="{{ $primaboardSizes['primary']['width'] }}" height="{{ $primaboardSizes['primary']['height'] }}" class="h-10 w-auto sm:h-12 sm:w-auto max-w-full object-contain">
  <img src="{{ asset($primaboardLogos['foundation']) }}" alt="Logo 2" width="{{ $primaboardSizes['foundation']['width'] }}" height="{{ $primaboardSizes['foundation']['height'] }}" class="h-10 w-auto sm:h-12 sm:w-auto max-w-full object-contain">
      </div>

      <!-- Deskripsi -->
      <h2 class="text-lg sm:text-xl md:text-2xl font-bold leading-snug drop-shadow" data-aos="fade-up" data-aos-delay="150">
  Lihat dan temukan siswa berprestasi yang siap bersinar di masa depan,
        <span class="font-semibold">hanya di sini!</span>
      </h2>

      <!-- Tombol -->
      <a href="/presmaboard"
    class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 mt-3 font-semibold rounded-lg shadow
      bg-white text-orange-800 hover:text-orange-900 hover:bg-gray-100 hover:scale-105 transition-all w-max mx-auto md:mx-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 focus-visible:ring-offset-2"
         data-aos="flip-up" data-aos-delay="300">
        Primaboard <span class="ml-2">→</span>
      </a>

    </div>
  </div>

  <!-- Gambar Kanan Bawah -->
  <img src="{{ asset($primaboardLogos['network']) }}" alt="Primaboard"
    width="{{ $primaboardSizes['network']['width'] }}"
    height="{{ $primaboardSizes['network']['height'] }}"
       class="absolute bottom-0 right-0 w-36 sm:w-44 md:w-52 lg:w-56 h-auto object-contain z-10"
       data-aos="zoom-in-up" data-aos-delay="200">

</section>
