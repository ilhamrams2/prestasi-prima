@php
  $footerLogoPath = 'assets/images/logo-smk.png';
  $footerLogoSize = @getimagesize(public_path($footerLogoPath)) ?: [256, 256];
  $footerNetworkPath = 'assets/images/section/primaboard/jaringan.png';
  $footerNetworkSize = @getimagesize(public_path($footerNetworkPath)) ?: [320, 200];
@endphp
<!-- ====================== MOTTO BERJALAN ====================== -->
<section class="relative flex items-center justify-between bg-gradient-to-r from-orange-900 via-orange-800 to-orange-700 overflow-hidden">
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
    <div class="relative z-10 flex items-center justify-center w-10 h-10 md:w-16 md:h-16 rounded-full border-4 border-white shadow-lg bg-white">
      <img src="{{ asset($footerLogoPath) }}" alt="Logo Sekolah"
        width="{{ $footerLogoSize[0] }}"
        height="{{ $footerLogoSize[1] }}"
        class="max-h-full max-w-full object-contain">
    </div>
    <img src="{{ asset($footerNetworkPath) }}" alt="Icon Network"
      width="{{ $footerNetworkSize[0] }}"
      height="{{ $footerNetworkSize[1] }}"
      class="h-10 md:h-16 w-auto opacity-90 relative right-0 object-contain">
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
      <div class="flex items-center justify-center w-20 h-20 rounded-full border-2 border-orange-500 shadow-xl bg-white">
        <img src="{{ asset($footerLogoPath) }}" alt="Logo"
          width="{{ $footerLogoSize[0] }}"
          height="{{ $footerLogoSize[1] }}"
          class="max-h-full max-w-full object-contain">
      </div>
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
        class="bg-orange-500/90 hover:bg-orange-600 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md"
        aria-label="Facebook SMK Prestasi Prima"><i class="ri-facebook-fill text-lg"></i></a>
      <a href="https://www.instagram.com/smkprestasiprima/"
        class="bg-orange-500/90 hover:bg-orange-600 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md"
        aria-label="Instagram SMK Prestasi Prima"><i class="ri-instagram-line text-lg"></i></a>
      <a href="https://www.youtube.com/@SEKOLAHPRESTASIPRIMA"
        class="bg-orange-500/90 hover:bg-orange-600 w-10 h-10 flex items-center justify-center rounded-full transition shadow-md"
        aria-label="YouTube SMK Prestasi Prima"><i class="ri-youtube-fill text-lg"></i></a>
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
      <li class="flex items-center gap-3"><i class="ri-phone-line text-orange-400 text-base"></i><span>+62 851-9592-8886</span></li>
      <li class="flex items-center gap-3"><i class="ri-mail-line text-orange-400 text-base"></i><span>smk.prestasiprima.sch.id</span></li>
      <li class="flex items-center gap-3"><i class="ri-building-4-line text-orange-400 text-base"></i><span>Jl. Hankam Raya No. 89, Cilangkap, Cipayung,Jakarta Timur, DKI Jakarta.</span></li>
      <li class="flex items-center gap-3"><i class="ri-time-line text-orange-400 text-base"></i><span>Senin –
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
          width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy" title="Lokasi SMK Prestasi Prima">
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
          <label for="footer-contact-name" class="sr-only">Nama Anda</label>
          <input id="footer-contact-name" type="text" placeholder="Nama Anda"
            class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-sm text-gray-200 focus:ring-2 focus:ring-orange-400 focus:outline-none">
          <label for="footer-contact-email" class="sr-only">Email</label>
          <input id="footer-contact-email" type="email" placeholder="Email"
            class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-sm text-gray-200 focus:ring-2 focus:ring-orange-400 focus:outline-none">
          <label for="footer-contact-message" class="sr-only">Pesan Anda</label>
          <textarea id="footer-contact-message" rows="3" placeholder="Pesan Anda"
            class="w-full px-3 py-2 rounded-lg bg-white/5 border border-white/10 text-sm text-gray-200 focus:ring-2 focus:ring-orange-400 focus:outline-none"></textarea>
          <button type="submit"
            class="bg-orange-800 hover:bg-orange-900 w-full py-2 rounded-lg text-sm font-medium text-white transition focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-200 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">
            Kirim Pesan
          </button>
        </form>
      </div>

      @php
        $supportLogoPaths = [
            ['path' => 'assets/images/support/logo.png', 'alt' => 'Support Logo'],
        ];
        $supportLogos = [];
        foreach ($supportLogoPaths as $item) {
          $size = @getimagesize(public_path($item['path'])) ?: [400, 160];
          $supportLogos[] = [
            'src' => asset($item['path']),
            'alt' => $item['alt'],
            'width' => $size[0],
            'height' => $size[1],
          ];
        }
      @endphp
      <div class="mt-6">
        <p class="text-gray-400 text-sm mb-3 text-center">Support by:</p>
        @foreach ($supportLogos as $logo)
          <div class="w-full bg-white/95 rounded-3xl shadow-lg shadow-black/20 ring-1 ring-white/60 px-6 py-4 md:px-8 md:py-5 transition-transform duration-200 hover:scale-[1.01]">
            <img src="{{ $logo['src'] }}" alt="{{ $logo['alt'] }}"
              width="{{ $logo['width'] }}"
              height="{{ $logo['height'] }}"
              class="w-full max-w-full object-contain mx-auto">
          </div>
        @endforeach
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
        Dibuat oleh: <span class="text-orange-400 font-medium">Zwingli, Gibran, Abimanyu, Ardy</span>
      </p>
    </div>
  </div>
</footer>