<!-- ================= SECTION PRIMABOARD ================= -->
<section id="primaboard" 
  class="relative flex flex-col md:flex-row items-center justify-between 
         bg-orange-500 px-4 md:px-8 py-6 overflow-hidden min-h-[220px]">

  <!-- Pola Catur Kiri -->
  <div class="absolute left-0 top-0 h-full flex flex-col opacity-90">
    <template id="pattern">
      <div class="flex"><div class="w-10 h-10 bg-orange-500"></div><div class="w-10 h-10 bg-gray-100"></div></div>
      <div class="flex"><div class="w-10 h-10 bg-gray-100"></div><div class="w-10 h-10 bg-orange-500"></div></div>
    </template>
    <script>
      const leftPattern = document.currentScript.parentElement;
      for (let i = 0; i < 6; i++) leftPattern.append(...leftPattern.querySelector('#pattern').content.cloneNode(true).children);
    </script>
  </div>

  <!-- Latar Kotak Oranye Kanan -->
  <div class="absolute right-0 top-0 h-full flex">
    <div class="w-28 sm:w-32 md:w-36 bg-orange-500"></div>
    <div class="w-28 sm:w-32 md:w-36 bg-orange-400"></div>
    <div class="w-28 sm:w-32 md:w-36 bg-orange-300"></div>
    <div class="w-28 sm:w-32 md:w-36 bg-orange-400"></div>
    <div class="w-28 sm:w-32 md:w-36 bg-orange-500"></div>
  </div>

  <!-- Konten Utama -->
  <div class="flex-1 text-center md:text-left text-white space-y-4 sm:space-y-5 z-10 md:pl-12 lg:pl-16">
    
    <!-- Logo -->
    <div class="flex justify-center md:justify-start gap-3 items-center mb-3">
      <img src="assets/images/section/primaboard/logo.webp" alt="Logo 1" class="h-10 sm:h-12">
      <img src="assets/images/section/primaboard/yayasan.png" alt="Logo 2" class="h-10 sm:h-12">
    </div>

    <!-- Deskripsi -->
    <h2 class="text-lg sm:text-xl md:text-2xl font-bold leading-snug drop-shadow">
      Lihat dan temukan siswa berprestasi yang siap bersinar di masa depan, 
      <span class="font-semibold">hanya di sini!</span>
    </h2>

    <!-- Tombol -->
    <a href="#"
       class="inline-flex items-center px-4 sm:px-6 py-2 sm:py-3 mt-3 font-semibold rounded-lg shadow
              bg-white text-orange-600 hover:bg-gray-100 hover:scale-105 transition-all w-max">
      Primaboard <span class="ml-2">→</span>
    </a>

  </div>

  <!-- Gambar Kanan Bawah -->
  <img src="assets/images/section/primaboard/jaringan.png" alt="Primaboard"
       class="absolute bottom-0 right-0 w-36 sm:w-44 md:w-52 lg:w-56 h-auto object-contain z-10">

</section>
