<footer class="bg-[#1e2a53] text-gray-300">
  <div class="container mx-auto px-6 py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">

    <!-- LOGO & ABOUT -->
    <div class="text-left">
      <img src="assets/images/logo-smk.png" alt="Logo SMK Prestasi Prima" class="w-20 mb-4">
      <p class="text-sm leading-relaxed max-w-xs">
        SMK Prestasi Prima berkomitmen mencetak generasi berprestasi 
        dengan program pendidikan unggulan dan fasilitas modern.
      </p>
      <!-- Sosial Media -->
      <div class="flex justify-start gap-3 mt-5">
        <a href="#" aria-label="Facebook" class="bg-orange-500 hover:bg-orange-600 text-white w-9 h-9 flex items-center justify-center rounded-full shadow-md transition-transform hover:scale-110">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" aria-label="Instagram" class="bg-orange-500 hover:bg-orange-600 text-white w-9 h-9 flex items-center justify-center rounded-full shadow-md transition-transform hover:scale-110">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" aria-label="YouTube" class="bg-orange-500 hover:bg-orange-600 text-white w-9 h-9 flex items-center justify-center rounded-full shadow-md transition-transform hover:scale-110">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>

    <!-- MENU -->
    <div class="text-left">
      <h2 class="font-bold text-lg mb-3 relative inline-block after:content-[''] after:block after:w-10 after:h-1 after:bg-orange-500 after:mt-1">MENU</h2>
      <ul class="space-y-2 mt-4">
        <li><a href="#" class="hover:text-orange-400 transition">Beranda</a></li>
        <li><a href="#" class="hover:text-orange-400 transition">Tentang</a></li>
        <li><a href="#" class="hover:text-orange-400 transition">Program</a></li>
        <li><a href="#" class="hover:text-orange-400 transition">Pendaftaran</a></li>
        <li><a href="#" class="hover:text-orange-400 transition">Dokumentasi</a></li>
        <li><a href="#" class="hover:text-orange-400 transition">Prestasi</a></li>
      </ul>
    </div>

    <!-- INFORMATION -->
    <div class="text-left">
      <h2 class="font-bold text-lg mb-3 relative inline-block after:content-[''] after:block after:w-10 after:h-1 after:bg-orange-500 after:mt-1">INFORMATION</h2>
      <div class="mt-4 space-y-4 text-sm">

        <!-- Address -->
        <p class="flex items-start gap-2">
          <i class="fas fa-map-marker-alt text-orange-400 mt-1"></i>
          <span>Jl. Hankam Raya No. 89, Cilangkap, Cipayung,<br>Jakarta Timur, DKI Jakarta.</span>
        </p>

        <!-- Phone -->
        <p class="flex items-center gap-2">
          <i class="fas fa-phone-alt text-orange-400"></i>
          <a href="tel:+6285195928886" class="hover:text-orange-400">+62 851-9592-8886</a>
        </p>

        <!-- Email -->
        <p class="flex items-center gap-2">
          <i class="fas fa-envelope text-orange-400"></i>
          <a href="mailto:ppdb@prestasiprima.sch.id" class="hover:text-orange-400">ppdb@prestasiprima.sch.id</a>
        </p>

      </div>
    </div>

    <!-- NEWSLETTER -->
    <div class="text-left">
      <h2 class="font-bold text-lg mb-3 relative inline-block after:content-[''] after:block after:w-10 after:h-1 after:bg-orange-500 after:mt-1">NEWSLETTER</h2>
      <p class="text-sm mt-4">Dapatkan berita & informasi terbaru seputar SMK Prestasi Prima langsung ke email Anda.</p>
      <form action="#" method="POST" class="mt-4 flex">
        <input type="email" placeholder="Masukkan email Anda" class="w-full px-3 py-2 rounded-l-lg text-gray-800 focus:outline-none">
        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 rounded-r-lg transition">Kirim</button>
      </form>
    </div>

  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom text-center py-4 text-xs md:text-sm text-white relative z-10">
    <p class="flex items-center justify-center gap-2 shimmer">
      <i class="far fa-copyright"></i>
      2025 SMK Prestasi Prima | Oren Solution - Version 2.0
    </p>
    <p class="mt-1">Dibuat oleh: Zwingli, Gilbran, Abi, Ardy, Chia</p>
  </div>
</footer>

<style>
  /* Gradient dominan orange */
  .footer-bottom {
    background: linear-gradient(135deg, 
      #ff9800,   /* orange utama */
      #ff6a00,   /* orange neon */
      #ff4500,   /* merah-oranye */
      #ffb300,   /* gold orange */
      #ff7e00    /* orange pekat */
    );
    background-size: 250% 250%;
    animation: gradientMove 10s ease infinite;
    position: relative;
    overflow: hidden;
  }

  @keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  /* Efek glow lembut */
  .footer-bottom::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,140,0,0.25) 0%, transparent 70%);
    animation: glowMove 8s linear infinite;
  }

  @keyframes glowMove {
    0% { transform: translate(0,0); }
    50% { transform: translate(15%, 15%); }
    100% { transform: translate(0,0); }
  }

  /* Efek api gelombang (flame wave) */
  .footer-bottom::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 200%;
    height: 150%;
    background: radial-gradient(ellipse at bottom, rgba(255,120,0,0.25), transparent 70%);
    animation: flameWave 6s ease-in-out infinite alternate;
    transform: rotate(-5deg);
    pointer-events: none;
  }

  @keyframes flameWave {
    0% { transform: translateX(0) rotate(-5deg) scaleY(1); opacity: 0.6; }
    50% { transform: translateX(-25%) rotate(-3deg) scaleY(1.2); opacity: 0.85; }
    100% { transform: translateX(-50%) rotate(-7deg) scaleY(1); opacity: 0.6; }
  }

  /* Efek shimmer di teks (emas-oranye) */
  .shimmer {
    position: relative;
    display: inline-block;
    color: #fff;
    background: linear-gradient(90deg, 
      #ffeb99 0%,   /* kuning emas */
      #ffffff 50%,  /* putih highlight */
      #ffcc66 100%  /* orange keemasan */
    );
    background-size: 300% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shimmerMove 3s linear infinite;
    text-shadow: 0 0 10px rgba(255,120,0,0.8); /* glow oranye */
  }

  @keyframes shimmerMove {
    0% { background-position: -300% center; }
    100% { background-position: 300% center; }
  }
</style>
