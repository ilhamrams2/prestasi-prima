<!-- ================= SECTION TENTANG KAMI ================= -->
<section id="tentang" class="relative bg-white py-20 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8 flex flex-col md:flex-row items-center justify-center gap-14 md:gap-20">

    <!-- Gambar Kepala Sekolah -->
    <div class="relative flex justify-center fade-in-right">
      <!-- Kotak Biru (desktop) -->
      <div class="absolute -top-8 -left-8 w-72 h-[26rem] md:w-96 md:h-[32rem] bg-blue-900 hidden sm:block"></div>

      <!-- Kotak Orange dengan Gambar -->
      <div class="relative z-10 w-72 h-[26rem] md:w-96 md:h-[32rem] bg-orange-500 overflow-hidden shadow-xl rounded-lg md:rounded-none">
        <img src="assets/images/section/tentang/kepala-sekolah.png" 
             alt="Kepala Sekolah" 
             class="w-full h-full object-cover">
        
        <!-- Nama Kepala Sekolah -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-[90%] md:w-[85%] bg-white/95 backdrop-blur-md shadow-lg px-4 md:px-5 py-3 text-left rounded-md">
          <p class="text-sm md:text-base font-bold text-orange-600 leading-snug">Hendry Kurniawan, S.Kom., M.I.Kom.</p>
          <p class="text-[11px] md:text-xs text-black font-medium tracking-wide">Kepala Sekolah SMK Prestasi Prima</p>
        </div>
      </div>
    </div>

    <!-- Teks Tentang Kami -->  
    <div class="text-center md:text-left max-w-xl fade-in-left">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-left">
        Tentang <span class="text-orange-600">Kami</span>
      </h2>
      <p class="text-gray-600 leading-relaxed mb-10 text-sm md:text-base text-left">
        Kami adalah lembaga pendidikan yang berkomitmen mencetak generasi unggul, kreatif, dan siap menghadapi tantangan masa depan.
        Dengan dukungan tenaga pendidik profesional serta fasilitas modern, kami menghadirkan pengalaman belajar berbasis praktik nyata.
        Fokus kami adalah membimbing siswa untuk mengembangkan potensi, mengasah keterampilan, dan membangun karakter agar mampu
        bersaing di dunia industri maupun melanjutkan pendidikan ke jenjang lebih tinggi.
      </p>

      <!-- Statistik -->
      <div class="grid grid-cols-2 md:grid-cols-4 mb-10 gap-6 md:gap-8">
        <!-- Item Statistik -->
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
      <a href="#" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 md:px-8 py-2.5 md:py-3 shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
        Selengkapnya →
      </a>
    </div>
  </div>
</section>

<!-- ================= STYLE ANIMASI ================= -->
<style>
/* Animasi */
.fade-in-up, .fade-in-left, .fade-in-right {
  opacity: 0;
  transform: translateY(10px);
  transition: all 0.8s ease-out;
}
.fade-in-left { transform: translateX(-15px); }
.fade-in-right { transform: translateX(15px); }

.show { opacity: 1; transform: translate(0,0); }

/* Delay animasi */
.delay-100 { transition-delay: 0.1s; }
.delay-200 { transition-delay: 0.2s; }
.delay-300 { transition-delay: 0.3s; }

/* Responsif */
@media (max-width: 768px) {
  .fade-in-left, .fade-in-right { transform: translateX(0); }
}
</style>

<!-- ================= SCRIPT ANIMASI + COUNT UP ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const fadeElems = document.querySelectorAll(".fade-in-up, .fade-in-left, .fade-in-right");
  const statNumbers = document.querySelectorAll(".stat-number");

  const animateNumber = (el) => {
    const target = +el.dataset.target;
    const duration = 2000;
    const startTime = performance.now();

    const update = (now) => {
      const progress = Math.min((now - startTime) / duration, 1);
      const value = Math.floor(progress * target);
      el.textContent = value.toLocaleString() + (target >= 100 ? "+" : "");
      if (progress < 1) requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  };

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        if (entry.target.classList.contains("stat-number")) animateNumber(entry.target);
      } else {
        entry.target.classList.remove("show");
        if (entry.target.classList.contains("stat-number")) entry.target.textContent = "0";
      }
    });
  }, { threshold: 0.3 });

  fadeElems.forEach(el => observer.observe(el));
  statNumbers.forEach(el => observer.observe(el));
});
</script>