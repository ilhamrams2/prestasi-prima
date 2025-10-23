<!-- ================= SECTION INDUSTRI ================= -->
<section id="industri" class="relative py-24 bg-white overflow-hidden">

  <!-- ===== Dekorasi ===== -->
  <img src="{{ asset('assets/images/section/industri/network1.svg') }}"
       alt="Dekorasi Network 1"
       class="absolute top-6 right-6 w-[32rem] sm:w-[36rem] md:w-[40rem] opacity-90 pointer-events-none select-none">

  <img src="{{ asset('assets/images/section/industri/network2.svg') }}"
       alt="Dekorasi Network 2"
       class="absolute bottom-0 left-0 w-44 sm:w-60 md:w-72 opacity-80 pointer-events-none select-none">

  <!-- ===== Konten ===== -->
  <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 text-center">

    <!-- ========== SPONSORSHIP ========== -->
    <div class="mb-20 opacity-0 translate-y-8 transition-all duration-1000 ease-out scroll-fade">
      <p class="text-orange-400 font-semibold tracking-wider uppercase mb-3">Mitra Kami</p>
      <h3 class="text-3xl md:text-4xl font-extrabold text-orange-600 tracking-tight">SPONSORSHIP</h3>

      <div class="mt-10 flex justify-center">
        <div class="relative bg-white/80 backdrop-blur-md rounded-2xl shadow-md p-6 hover:shadow-xl transition-all duration-500">
          <!-- Efek Glow -->
          <div class="absolute inset-0 rounded-2xl bg-orange-400/30 blur-2xl opacity-70 animate-pulse"></div>

          <img src="{{ asset('assets/images/section/industri/prambos.png') }}"
               alt="Prambos"
               class="relative z-10 h-20 md:h-28 object-contain drop-shadow-[0_0_18px_rgba(255,165,0,0.6)] transition-all duration-500">
        </div>
      </div>
    </div>

    <!-- ========== KERJA SAMA INDUSTRI ========== -->
    <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out scroll-fade">
      <h3 class="text-3xl md:text-4xl font-extrabold text-orange-600 mb-6 tracking-tight">
        KERJA SAMA INDUSTRI
      </h3>
      <p class="text-gray-600 max-w-2xl mx-auto mb-14 leading-relaxed">
        Kami menjalin kolaborasi dengan berbagai perusahaan nasional dan internasional untuk mendukung program magang, pelatihan, dan pengembangan karier bagi para siswa.
      </p>
    </div>

    <!-- SCROLL LOGO -->
    <div class="relative w-full overflow-hidden group opacity-0 translate-y-8 transition-all duration-1000 ease-out scroll-fade">
      <div class="flex animate-scroll-modern space-x-14 sm:space-x-20 items-center will-change-transform">

        <!-- Logo Template -->
        <template id="logos">
          @foreach (['telkom', 'komatsu', 'kemenkop', 'jatelindo', 'panasonic', 'antam', 'starvision', 'lemnegara', 'erlangga'] as $logo)
          <div class="logo-item flex items-center justify-center bg-white/80 backdrop-blur-md rounded-2xl shadow-md p-4 transition-all duration-700 hover:shadow-xl hover:scale-105">
            <img src="{{ asset('assets/images/section/industri/' . $logo . '.png') }}"
                 alt="{{ ucfirst($logo) }}"
                 class="h-14 sm:h-20 md:h-24 object-contain transition-all duration-700">
          </div>
          @endforeach
        </template>

        <!-- Duplicate logos for infinite scroll -->
        <script>
          const wrapper = document.currentScript.parentElement;
          const template = wrapper.querySelector('#logos').content;
          for (let i = 0; i < 2; i++) wrapper.append(...template.cloneNode(true).children);
        </script>
      </div>
    </div>

    <!-- Tombol CTA -->
    <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out scroll-fade">
      <a href="{{ route('industri') }}"
         class="inline-block mt-12 px-8 py-3 bg-orange-500 text-white font-semibold rounded-xl shadow-md hover:bg-orange-600 transition-all duration-300">
         Lihat Selengkapnya
      </a>
    </div>
  </div>

  <!-- Gradient fade effect kiri-kanan -->
  <div class="pointer-events-none absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent"></div>
  <div class="pointer-events-none absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent"></div>
</section>

<!-- ================= STYLE ================= -->
<style>
@keyframes scroll-modern {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.animate-scroll-modern {
  display: flex;
  width: max-content;
  animation: scroll-modern 25s linear infinite; /* 💨 Lebih cepat dari sebelumnya */
}

/* Efek fade-in saat scroll */
.scroll-fade {
  opacity: 0;
  transform: translateY(40px);
}
.scroll-fade.show {
  opacity: 1;
  transform: translateY(0);
}
</style>

<!-- ================= SCRIPT ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      } else {
        entry.target.classList.remove("show");
      }
    });
  }, { threshold: 0.2 });

  document.querySelectorAll(".scroll-fade").forEach(el => observer.observe(el));
});
</script>
