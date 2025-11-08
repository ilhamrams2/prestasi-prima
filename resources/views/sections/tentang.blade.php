<!-- ================= SECTION TENTANG KAMI ================= -->
<section id="tentang" class="relative bg-white py-20 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8 flex flex-col md:flex-row items-center justify-center gap-14 md:gap-20">

    <!-- ========== Background Dekoratif ========== -->
    <div class="absolute inset-0 pointer-events-none">
      <img src="assets/images/section/tentang/bulet.svg" alt="Dekorasi Lingkaran"
        class="absolute -bottom-[80px] -right-[90px] w-[280px] md:w-[420px] opacity-30 object-contain select-none">
    </div>

    <!-- Gambar Kepala Sekolah (Clean & Full Image, Larger) -->
    <div class="relative flex justify-center fade-in-right">
      <div class="w-80 h-[30rem] md:w-[28rem] md:h-[36rem] bg-white rounded-xl flex items-center justify-center">
        <img src="{{ asset('assets/images/program/kepsek.png') }}" alt="Kepala Sekolah"
          class="w-full h-full object-contain">
      </div>
    </div>

    <!-- Teks Tentang Kami -->
    <div class="text-center md:text-left max-w-xl fade-in-left">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-center md:text-left px-4 md:px-0">
        Tentang <span class="text-orange-600">Kami</span>
      </h2>

      <p
        class="text-gray-600 leading-relaxed mb-10 text-base md:text-lg max-w-prose text-center md:text-left px-4 md:px-0">
        Kami adalah lembaga pendidikan yang berkomitmen mencetak generasi unggul, kreatif, dan siap menghadapi tantangan
        masa depan.
        Dengan dukungan tenaga pendidik profesional serta fasilitas modern, kami menghadirkan pengalaman belajar
        berbasis praktik nyata.
        Fokus kami adalah membimbing siswa untuk mengembangkan potensi, mengasah keterampilan, dan membangun karakter
        agar mampu
        bersaing di dunia industri maupun melanjutkan pendidikan ke jenjang lebih tinggi.
      </p>


      <!-- Statistik -->
      <div class="grid grid-cols-2 md:grid-cols-4 mb-10 gap-6 md:gap-8">
        <div class="fade-in-up text-left">
          <div class="flex items-center">
            <div class="border-l-4 border-orange-500 pl-3">
              <p class="stat-number text-3xl font-bold text-black" data-target="2550">0</p>
            </div>
          </div>
          <span class="text-sm text-orange-600 block mt-1">Peserta Didik</span>
        </div>

        <div class="fade-in-up delay-100 text-left">
          <div class="flex items-center">
            <div class="border-l-4 border-orange-500 pl-3">
              <p class="stat-number text-3xl font-bold text-black" data-target="200">0</p>
            </div>
          </div>
          <span class="text-sm text-orange-600 block mt-1">Guru & Tendik</span>
        </div>

        <div class="fade-in-up delay-200 text-left">
          <div class="flex items-center">
            <div class="border-l-4 border-orange-500 pl-3">
              <p class="stat-number text-3xl font-bold text-black" data-target="40">0</p>
            </div>
          </div>
          <span class="text-sm text-orange-600 block mt-1">Ruang Kelas</span>
        </div>

        <div class="fade-in-up delay-300 text-left">
          <div class="flex items-center">
            <div class="border-l-4 border-orange-500 pl-3">
              <p class="stat-number text-3xl font-bold text-black" data-target="6">0</p>
            </div>
          </div>
          <span class="text-sm text-orange-600 block mt-1">Lab Komputer</span>
        </div>
      </div>

      <!-- Tombol -->
      <a href="/tentang/profile-sekolah"
        class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 md:px-8 py-2.5 md:py-3 shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
        Selengkapnya →
      </a>
    </div>
  </div>
</section>

<!-- ================= STYLE ANIMASI ================= -->
<style>
  .fade-in-up,
  .fade-in-left,
  .fade-in-right {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease-out;
  }

  .fade-in-left {
    transform: translateX(-30px);
  }

  .fade-in-right {
    transform: translateX(30px);
  }

  .show {
    opacity: 1;
    transform: translate(0, 0);
  }

  .delay-100 {
    transition-delay: 0.1s;
  }

  .delay-200 {
    transition-delay: 0.2s;
  }

  .delay-300 {
    transition-delay: 0.3s;
  }

  @media (max-width: 768px) {

    .fade-in-left,
    .fade-in-right {
      transform: translateX(0);
    }
  }
</style>

<!-- ================= SCRIPT ANIMASI + STATISTIK ================= -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const fadeElems = document.querySelectorAll(".fade-in-up, .fade-in-left, .fade-in-right");
    const statNumbers = document.querySelectorAll(".stat-number");

    // Animasi angka
    const animateNumber = (el) => {
      const target = +el.dataset.target;
      const duration = 2000;
      const startTime = performance.now();

      const update = (now) => {
        const progress = Math.min((now - startTime) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const value = Math.floor(eased * target);
        el.textContent = value.toLocaleString() + (target >= 100 ? "+" : "");
        if (progress < 1) requestAnimationFrame(update);
      };
      requestAnimationFrame(update);
    };

    // IntersectionObserver untuk fade-in dan angka
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
          if (entry.target.classList.contains("stat-number")) {
            animateNumber(entry.target);
          }
          observer.unobserve(entry.target); // animasi hanya sekali
        }
      });
    }, { threshold: 0.4 });

    fadeElems.forEach(el => observer.observe(el));
    statNumbers.forEach(el => observer.observe(el));
  });
</script>