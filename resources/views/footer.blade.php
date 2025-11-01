<!-- ====================== MOTTO BERJALAN ====================== -->
<section class="relative flex items-center justify-between bg-orange-500 overflow-hidden">
  <!-- Pola kotak kiri (disembunyikan di mobile) -->
  <div class="absolute left-0 top-0 h-full hidden md:flex flex-col opacity-80">
    <div class="flex">
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
    </div>
    <div class="flex">
      <div class="w-10 h-10 bg-gray-100"></div>
      <div class="w-10 h-10 bg-orange-500"></div>
    </div>
    <div class="flex">
      <div class="w-10 h-10 bg-orange-500"></div>
      <div class="w-10 h-10 bg-gray-100"></div>
    </div>
  </div>

  <!-- Motto teks berjalan -->
  <div class="flex-1 overflow-hidden px-6 md:px-24 py-6 relative z-10">
    <div class="flex whitespace-nowrap animate-marquee">
      <h2
        class="inline-block text-white font-bold text-base sm:text-lg md:text-2xl uppercase tracking-wide drop-shadow leading-snug">
        SMK PRESTASI PRIMA – MENCETAK GENERASI BERPRESTASI! &nbsp;&nbsp; • &nbsp;&nbsp;
        IF BETTER IS POSSIBLE, GOOD IS NOT ENOUGH! &nbsp;&nbsp; • &nbsp;&nbsp;
        BERANI HEBAT, BERANI BERPRESTASI! &nbsp;&nbsp; • &nbsp;&nbsp;
        SMK PRESTASI PRIMA – MENCETAK GENERASI BERPRESTASI! &nbsp;&nbsp; • &nbsp;&nbsp;
        IF BETTER IS POSSIBLE, GOOD IS NOT ENOUGH! &nbsp;&nbsp; • &nbsp;&nbsp;
        BERANI HEBAT, BERANI BERPRESTASI!
      </h2>
    </div>
  </div>

  <!-- Background kotak kanan -->
  <div class="absolute right-0 top-0 h-full hidden md:flex">
    <div class="w-40 md:w-52 bg-orange-600"></div>
    <div class="w-40 md:w-52 bg-orange-400"></div>
    <div class="w-40 md:w-52 bg-orange-300"></div>
  </div>

  <!-- Logo + network -->
  <div class="relative flex items-center gap-3 md:gap-4 pr-4 md:pr-10 z-20">
    <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo Sekolah"
      class="w-10 h-10 md:w-16 md:h-16 rounded-full border-4 border-white shadow-lg relative z-10">
    <img src="{{ asset('assets/images/section/primaboard/jaringan.png') }}" alt="Icon Network"
      class="w-16 md:w-28 opacity-90 relative right-0">
  </div>
</section>

<!-- Animasi CSS -->
<style>
  @keyframes marquee {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-50%);
    }
  }

  /* Kecepatan default (desktop) */
  .animate-marquee {
    animation: marquee 15s linear infinite;
  }

  /* Lebih cepat di mobile */
  @media (max-width: 768px) {
    .animate-marquee {
      animation: marquee 7s linear infinite;
    }
  }
</style>


<!-- =================== FOOTER MODERN 2-LINE =================== -->
<footer class="relative bg-[#080c1b] text-gray-300 overflow-hidden">
  <!-- Background Pattern -->
  <div class="absolute inset-0 bg-gradient-to-br from-[#0e162e] via-[#0a0f25] to-[#080c1b]"></div>
  <div
    class="absolute inset-0 bg-[url('{{ asset('assets/images/pattern/footer-texture.svg') }}')] opacity-5 mix-blend-overlay">
  </div>

  <!-- Bagian Atas Footer -->
  <div
    class="relative z-10 max-w-7xl mx-auto px-6 md:px-10 lg:px-16 pt-14 pb-10 flex flex-col lg:flex-row items-center justify-between gap-10 border-b border-white/10">
    <!-- Logo dan Motto -->
    <div class="flex flex-col lg:flex-row items-center lg:items-start text-center lg:text-left gap-6">
      <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo"
        class="w-20 h-20 rounded-full border-2 border-orange-500 shadow-xl">
      <div>
        <h2 class="text-2xl font-bold text-white tracking-wide">SMK Prestasi Prima</h2>
        <p class="text-sm text-gray-400 mt-2 max-w-md">
          Mencetak generasi berprestasi melalui pendidikan unggulan dan lingkungan belajar yang inspiratif.
        </p>
        <p class="italic text-orange-400/90 text-xs mt-3">“Berani Hebat, Berani Berprestasi.”</p>
      </div>
    </div>

    <!-- Sosial Media -->
    <div class="flex items-center gap-4">
      <a href="https://www.facebook.com/p/SMK-Prestasi-PRIMA-100035392916117/"
        class="bg-orange-500/90 hover:bg-orange-600 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md"><i
          class="fab fa-facebook-f"></i></a>
      <a href="https://www.instagram.com/smkprestasiprima/"
        class="bg-orange-500/90 hover:bg-orange-600 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md"><i
          class="fab fa-instagram"></i></a>
      <a href="https://www.youtube.com/@SEKOLAHPRESTASIPRIMA"
        class="bg-orange-500/90 hover:bg-orange-600 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md"><i
          class="fab fa-youtube"></i></a>
    </div>
  </div>

  <!-- =================== BAGIAN ATAS FOOTER =================== -->
  <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10 lg:px-16 pt-14 pb-10 border-b border-white/10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
      <!-- Kolom 1: Informasi Sekolah -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-4 relative">
          Informasi Sekolah
          <span
            class="absolute left-0 -bottom-1 w-10 h-[2px] bg-gradient-to-r from-orange-500 to-orange-300 rounded-full"></span>
        </h3>
        <ul class="text-sm text-gray-400 space-y-3 mt-4">
          <li class="flex items-center gap-3"><i class="fa-solid fa-phone text-orange-400 text-base"></i><span>+62 851-9592-8886</span></li>
          <li class="flex items-center gap-3"><i class="fa-solid fa-envelope text-orange-400 text-base"></i><span>smk.prestasiprima.sch.id</span></li>
          <li class="flex items-center gap-3"><i class="fa-solid fa-school text-orange-400 text-base"></i><span>Jl. Hankam Raya No. 89, Cilangkap, Cipayung,Jakarta Timur, DKI Jakarta.</span></li>
          <li class="flex items-center gap-3"><i class="fa-regular fa-clock text-orange-400 text-base"></i><span>Senin –
              Jumat: 06.00 - 17.00</span></li>
        </ul>
      </div>

      <!-- Kolom 2: Menu -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-4 relative">
          Menu
          <span
            class="absolute left-0 -bottom-1 w-10 h-[2px] bg-gradient-to-r from-orange-500 to-orange-300 rounded-full"></span>
        </h3>
        <ul class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm text-gray-400 mt-4">
          <li><a href="/" class="hover:text-orange-400 transition">Beranda</a></li>
          <li><a href="#tentang" class="hover:text-orange-400 transition">Tentang</a></li>
          <li><a href="/tentang/program" class="hover:text-orange-400 transition">Program</a></li>
          <li><a href="/dokumentasi/berita" class="hover:text-orange-400 transition">Berita</a></li>
          <li><a href="/dokumentasi/prestasi" class="hover:text-orange-400 transition">Prestasi</a></li>
          <li><a href="/dokumentasi/gallery" class="hover:text-orange-400 transition">Gallery</a></li>
          <li><a href="/pendaftaran" class="hover:text-orange-400 transition">Pendaftaran</a></li>
          <li><a href="/presmaboard" class="hover:text-orange-400 transition">Presmaboard</a></li>
          <li><a href="/presmalancer" class="hover:text-orange-400 transition">Presmalancer</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Informasi Tambahan -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-4 relative">
          Informasi Tambahan
          <span
            class="absolute left-0 -bottom-1 w-10 h-[2px] bg-gradient-to-r from-orange-500 to-orange-300 rounded-full"></span>
        </h3>
        <ul class="text-sm text-gray-400 space-y-3 mt-4">
          <li><a href="/dokumentasi/kegiatan" class="hover:text-orange-400 transition">Kegiatan Sekolah</a></li>
          <li><a href="/informasi/industri" class="hover:text-orange-400 transition">Kerja Sama Industri</a></li>
          <li><a href="#" class="hover:text-orange-400 transition">Beasiswa & Prestasi</a></li>
          <li><a href="#" class="hover:text-orange-400 transition">Layanan Alumni</a></li>
          <li><a href="{{ asset('assets/files/brosur.pdf') }}" download  class="hover:text-orange-400 transition">Download Brosur</a></li>
        </ul>
      </div>

      <!-- Kolom 4: FAQ -->
      <div>
  <h3 class="text-lg font-semibold text-white mb-4 relative">
    FAQ
    <span class="absolute left-0 -bottom-1 w-10 h-[2px] bg-gradient-to-r from-orange-500 to-orange-300 rounded-full"></span>
  </h3>
  <ul class="space-y-3 text-sm text-gray-400 mt-4">
    <li>
      <span class="font-medium text-white">Bagaimana cara mendaftar?</span><br>
      Pendaftaran dapat dilakukan melalui 
      <a href="/pendaftaran" class="text-orange-400 hover:underline">laman online</a> 
      atau langsung ke sekolah.
    </li>

    <li>
      <span class="font-medium text-white">Kapan jadwal PPDB dibuka?</span><br>
      Setiap tahun mulai <strong>Desember hingga Juni</strong>.
    </li>

    <li>
      <span class="font-medium text-white">Ingin tahu info lebih lanjut?</span><br>
      Kunjungi 
      <a href="/presmacontact" class="text-orange-400 hover:underline">Hubungi Kami</a> 
      untuk informasi lengkap.
    </li>
  </ul>
</div>

    </div>
  </div>

  <!-- =================== BAGIAN BAWAH FOOTER =================== -->
  <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10 lg:px-16 py-12 grid grid-cols-1 lg:grid-cols-2 gap-10">

    <!-- =================== LOKASI KAMI (TINGGI DIKURANGI) =================== -->
    <div>
      <h2 class="text-lg font-semibold text-white mb-4 relative">
        Lokasi Kami
        <span
          class="absolute left-0 -bottom-1 w-10 h-[2px] bg-gradient-to-r from-orange-500 to-orange-300 rounded-full"></span>
      </h2>
      <div
        class="rounded-2xl overflow-hidden shadow-lg border border-white/10 h-[230px] sm:h-[260px] md:h-[280px] lg:h-[300px]">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4748268020353!2d106.8972187!3d-6.332476499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2681bc7c67%3A0x777152b1d3f74a62!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1756647265168!5m2!1sid!2sid"
          width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy">
        </iframe>
      </div>
    </div>


    <!-- Hubungi Kami -->
    <div class="flex flex-col justify-between">
      <div>
        <h2 class="text-lg font-semibold text-white mb-4 relative">
          Hubungi Kami
          <span
            class="absolute left-0 -bottom-1 w-10 h-[2px] bg-gradient-to-r from-orange-500 to-orange-300 rounded-full"></span>
        </h2>
        <form class="space-y-3">  
          <input type="text" placeholder="Nama Anda"
            class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-sm text-gray-200 focus:ring-2 focus:ring-orange-400 focus:outline-none">
          <input type="email" placeholder="Email"
            class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-sm text-gray-200 focus:ring-2 focus:ring-orange-400 focus:outline-none">
          <textarea rows="3" placeholder="Pesan Anda"
            class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-sm text-gray-200 focus:ring-2 focus:ring-orange-400 focus:outline-none"></textarea>
          <button type="submit"
            class="bg-orange-500 hover:bg-orange-600 w-full py-2 rounded-lg text-sm font-medium text-white transition">
            Kirim Pesan
          </button>
        </form>
      </div>

      <div class="mt-4 text-center">
        <p class="text-gray-400 text-sm mb-2">Support by:</p>
        <img src="{{ asset('assets/images/support/logo.png') }}" alt="Support Logo"
          class="mx-auto w-48 md:w-64 opacity-90 hover:opacity-100 transition duration-300 drop-shadow-xl">
      </div>
    </div>
  </div>

  <!-- =================== FOOTER BOTTOM =================== -->
  <div class="border-t border-white/10 bg-[#070b18]/90 py-4 relative z-10">
    <div
      class="max-w-7xl mx-auto px-6 md:px-10 lg:px-16 flex flex-col md:flex-row items-center justify-between gap-2 text-xs md:text-sm">
      <p class="flex items-center gap-2 text-gray-400">
        <span>© {{ date('Y') }} SMK Prestasi Prima</span>
        <span class="mx-2 text-white/30">|</span>
        <span>Oren Solution - <span class="font-medium text-white">Version 2.0</span></span>
      </p>
      <p class="text-gray-500 text-sm text-center md:text-right">
        Dibuat oleh: <span class="text-orange-400 font-medium">Zwingli, Gilbran, Hamba Allah, Ardy, Chia</span>
      </p>
    </div>
  </div>
</footer>