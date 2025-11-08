<!-- ================= SECTION INDUSTRI ================= -->
<section id="industri" class="relative py-28 bg-gradient-to-b from-white via-orange-50/30 to-white overflow-hidden">

  <!-- ===== Dekorasi ===== -->
<img src="{{ asset('assets/images/section/industri/network1.svg') }}"
     alt="Dekorasi Kanan"
     class="absolute top-0 right-0 w-72 sm:w-[34rem] md:w-[48rem] opacity-45 pointer-events-none select-none animate-float-fast"
     data-aos="fade-zoom-right"
     data-aos-delay="100"
     data-aos-duration="900"
     data-aos-easing="ease-out-cubic"
     data-rellax-speed="3">

<img src="{{ asset('assets/images/section/industri/network2.svg') }}"
     alt="Dekorasi Kiri"
     class="absolute bottom-0 left-0 w-52 sm:w-64 md:w-80 opacity-30 pointer-events-none select-none animate-float-reverse-fast"
     data-aos="fade-up"
     data-aos-delay="300"
     data-aos-duration="1000"
     data-aos-easing="ease-out-cubic"
     data-rellax-speed="-2">


  @php
  $industryLogoKeys = ['telkom', 'komatsu', 'kemenkop', 'jatelindo', 'panasonic', 'antam', 'starvision', 'lemnegara', 'erlangga', 'wika'];
    $industryLogos = [];
    foreach ($industryLogoKeys as $logoKey) {
      $path = public_path('assets/images/section/industri/' . $logoKey . '.webp');
      $size = @getimagesize($path) ?: [400, 160];
      $industryLogos[$logoKey] = ['width' => $size[0], 'height' => $size[1]];
    }
    $prambosSize = @getimagesize(public_path('assets/images/section/industri/prambos.webp')) ?: [400, 160];
  @endphp

  <!-- ===== Konten ===== -->
  <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 text-center">

    <!-- ========== SPONSORSHIP ========== -->
    <div data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="900" class="mb-20">
      <p class="text-orange-500 font-semibold tracking-widest uppercase mb-3">Mitra Kami</p>
      <h3 class="text-3xl md:text-4xl font-extrabold text-orange-600 tracking-tight">SPONSORSHIP</h3>

      <div class="mt-10 flex justify-center">
        <div class="relative bg-white/80 backdrop-blur-md rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-700 p-6 group">
          <div class="absolute inset-0 rounded-2xl bg-orange-400/20 blur-2xl opacity-70 group-hover:opacity-90 transition-all duration-500"></div>
    <img src="{{ asset('assets/images/section/industri/prambos.webp') }}"
      alt="Prambos"
      width="{{ $prambosSize[0] }}"
      height="{{ $prambosSize[1] }}"
      loading="lazy"
      decoding="async"
      class="relative z-10 w-auto h-24 md:h-28 object-contain drop-shadow-[0_0_18px_rgba(255,165,0,0.4)] transition-transform duration-700 group-hover:scale-110">
        </div>
      </div>
    </div>

    <!-- ========== KERJA SAMA INDUSTRI ========== -->
    <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="900">
      <h3 class="text-3xl md:text-4xl font-extrabold text-orange-600 mb-6 tracking-tight">
        KERJA SAMA INDUSTRI
      </h3>
      <p class="text-gray-600 max-w-2xl mx-auto mb-16 leading-relaxed">
        Kami menjalin kolaborasi dengan berbagai perusahaan nasional dan internasional untuk mendukung program magang, pelatihan, dan pengembangan karier bagi para siswa.
      </p>
    </div>

    <!-- ========== SCROLL LOGO ========== -->
    <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="900" class="relative w-full overflow-hidden group">
      <div class="flex animate-scroll-horizontal space-x-14 sm:space-x-20 items-center will-change-transform">

   @foreach ($industryLogoKeys as $logo)
        <div class="logo-item flex items-center justify-center bg-white/80 backdrop-blur-md rounded-2xl shadow-md p-4 transition-all duration-700 hover:shadow-xl hover:scale-105 hover:-translate-y-1">
    <img src="{{ asset('assets/images/section/industri/' . $logo . '.webp') }}"
      alt="{{ ucfirst($logo) }}"
     width="{{ $industryLogos[$logo]['width'] }}"
     height="{{ $industryLogos[$logo]['height'] }}"
     loading="lazy"
     decoding="async"
               class="w-auto h-16 sm:h-20 md:h-24 object-contain transition-all duration-700 hover:drop-shadow-[0_0_16px_rgba(234,88,12,0.4)]">
        </div>
        @endforeach

        <!-- Duplicate for infinite scroll -->
   @foreach ($industryLogoKeys as $logo)
        <div class="logo-item flex items-center justify-center bg-white/80 backdrop-blur-md rounded-2xl shadow-md p-4 transition-all duration-700 hover:shadow-xl hover:scale-105 hover:-translate-y-1">
    <img src="{{ asset('assets/images/section/industri/' . $logo . '.webp') }}"
      alt="{{ ucfirst($logo) }}"
     width="{{ $industryLogos[$logo]['width'] }}"
     height="{{ $industryLogos[$logo]['height'] }}"
     loading="lazy"
     decoding="async"
               class="w-auto h-16 sm:h-20 md:h-24 object-contain transition-all duration-700 hover:drop-shadow-[0_0_16px_rgba(234,88,12,0.4)]">
        </div>
        @endforeach
      </div>
    </div>

    <!-- Tombol CTA -->
    <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="900">
    <a href="#"
      class="inline-block mt-14 px-8 py-3 bg-orange-800 text-white font-semibold rounded-xl shadow-md hover:bg-orange-900 hover:shadow-lg transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-200 focus-visible:ring-offset-2">
         Lihat Selengkapnya
      </a>
    </div>
  </div>

  <!-- Gradient fade effect kiri-kanan -->
  <div class="pointer-events-none absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-white to-transparent"></div>
  <div class="pointer-events-none absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-white to-transparent"></div>
</section>

<!-- ================= STYLE ================= -->
@push('styles')
<style>
@keyframes scroll-horizontal {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.animate-scroll-horizontal {
  animation: scroll-horizontal 28s linear infinite;
  width: max-content;
}
/* Animasi melayang */
@keyframes float-fast {
  0%, 100% { transform: translateY(0) scale(1); }
  50% { transform: translateY(8px) scale(1.02); }
}
@keyframes float-reverse-fast {
  0%, 100% { transform: translateY(0) scale(1); }
  50% { transform: translateY(-8px) scale(1.02); }
}
.animate-float-fast {
  animation: float-fast 6s ease-in-out infinite;
}
.animate-float-reverse-fast {
  animation: float-reverse-fast 7s ease-in-out infinite;
}

/* Custom AOS - fade zoom from right */
[data-aos="fade-zoom-right"] {
  opacity: 0;
  transform: translateX(40px) scale(0.95);
  transition-property: transform, opacity;
}
[data-aos="fade-zoom-right"].aos-animate {
  opacity: 1;
  transform: translateX(0) scale(1);
}
</style>
@endpush

<!-- ================= SCRIPT ================= -->
@push('scripts')
<script>
  const configIndustriSection = { once: true, duration: 1000, offset: 100, easing: 'ease-out-cubic' };
  if (window.initAOS) {
    window.initAOS(configIndustriSection).catch((error) => console.error('Failed to initialize AOS on Industri section', error));
  } else if (typeof window.ensureAOS === 'function') {
    window.ensureAOS().then((AOS) => AOS.init(configIndustriSection)).catch((error) => console.error('Failed to initialize AOS on Industri section', error));
  } else if (window.AOS) {
    window.AOS.init(configIndustriSection);
  }
</script>
@endpush
