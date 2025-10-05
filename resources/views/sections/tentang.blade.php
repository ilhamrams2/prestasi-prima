<!-- ================= SECTION TENTANG KAMI ================= -->
<section id="tentang" class="relative bg-white py-20 overflow-hidden">
  
  <!-- ========== Background Dekoratif ========== -->
  <div class="absolute inset-0 pointer-events-none">
    <!-- Gambar lingkaran kanan bawah -->
    <img src="assets/images/section/tentang/bulet.svg"
         alt="Dekorasi Lingkaran"
         class="absolute -bottom-[80px] -right-[90px] w-[280px] md:w-[420px] opacity-30 object-contain select-none">
  </div>

  <!-- ========== Konten Utama ========== -->
  <div class="relative max-w-7xl mx-auto px-4 md:px-8 flex flex-col md:flex-row items-center justify-center gap-14 md:gap-20">

    <!-- Gambar Kepala Sekolah -->
    <div class="relative flex justify-center fade-in-right">
      <div class="absolute -top-8 -left-8 w-72 h-[26rem] md:w-96 md:h-[32rem] bg-blue-900 hidden sm:block"></div>

      <div class="relative z-10 w-72 h-[26rem] md:w-96 md:h-[32rem] bg-orange-500 overflow-hidden shadow-xl rounded-lg md:rounded-none">
        <img src="assets/images/section/tentang/kepala-sekolah.png"
             alt="Kepala Sekolah"
             class="w-full h-full object-cover object-top">

        <!-- Nama Kepala Sekolah -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-[90%] md:w-[85%] bg-white/95 backdrop-blur-md shadow-lg px-4 md:px-5 py-3 text-left rounded-md">
          <p class="text-sm md:text-base font-bold text-orange-600 leading-snug">
            Hendry Kurniawan, S.Kom., M.I.Kom.
          </p>
          <p class="text-[11px] md:text-xs text-black font-medium tracking-wide">
            Kepala Sekolah SMK Prestasi Prima
          </p>
          <p class="text-sm md:text-base font-bold text-orange-600 leading-snug">
            Hendry Kurniawan, S.Kom., M.I.Kom.
          </p>
          <p class="text-[11px] md:text-xs text-black font-medium tracking-wide">
            Kepala Sekolah SMK Prestasi Prima
          </p>
        </div>
      </div>
    </div>

    <!-- Teks Tentang Kami -->
    <div class="text-center md:text-left max-w-xl fade-in-left">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 text-left">
        Tentang <span class="text-orange-600">Kami</span>
      </h2>
      <p class="text-gray-600 leading-relaxed mb-10 text-sm md:text-base text-left max-w-prose">
        Kami adalah lembaga pendidikan yang berkomitmen mencetak generasi unggul, kreatif, dan siap menghadapi tantangan masa depan.
        Dengan dukungan tenaga pendidik profesional serta fasilitas modern, kami menghadirkan pengalaman belajar berbasis praktik nyata.
        Fokus kami adalah membimbing siswa untuk mengembangkan potensi, mengasah keterampilan, dan membangun karakter agar mampu
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
      <a href="#"
         class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 md:px-8 py-2.5 md:py-3 shadow-lg rounded-lg transition transform hover:scale-105 hover:shadow-xl">
        Selengkapnya →
      </a>
    </div>
  </div>
</section>

<!-- ================= SCRIPT: Animasi Angka Statistik ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const statNumbers = document.querySelectorAll(".stat-number");

  const animateCount = (el, target) => {
    let current = 0;
    const increment = target / 80;
    const update = () => {
      current += increment;
      if (current < target) {
        el.textContent = Math.floor(current);
        requestAnimationFrame(update);
      } else {
        el.textContent = target.toLocaleString();
      }
    };
    update();
  };

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        animateCount(el, parseInt(el.dataset.target));
        obs.unobserve(el);
      }
    });
  }, { threshold: 0.6 });

  statNumbers.forEach(num => observer.observe(num));
});
</script>
