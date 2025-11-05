@extends('prestasiprima.index')

@section('content')
<!-- ===================== SECTION SAMBUTAN ===================== -->
<section class="mt-20 md:mt-28 bg-white relative overflow-hidden">

  <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-16 md:py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">

    <!-- FOTO SAMBUTAN PENJAMIN MUTU -->
    <div class="relative opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0s;">
      <div class="absolute -top-4 -left-4 w-full h-full bg-[#1e2a53] rounded-3xl -z-10 shadow-xl md:shadow-2xl"></div>
      <img src="{{ asset('assets/images/sambutan/dr-wannen.png') }}" 
           alt="Penjamin Mutu Yayasan Prestasi Prima"
           class="rounded-3xl shadow-xl md:shadow-2xl w-full object-cover select-none pointer-events-none">
    </div>

    <!-- TEKS SAMBUTAN PENJAMIN MUTU -->
    <div class="space-y-6 sm:space-y-8">
      <div class="space-y-1 sm:space-y-2 opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.2s;">
        <h3 class="text-xs sm:text-sm font-semibold text-orange-600 tracking-wide uppercase">Penjamin Mutu Yayasan Prestasi Prima</h3>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-400">
          Dr. Wannen Pakpahan, MM.
        </h2>
      </div>

      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.4s;">
        <span class="font-semibold text-gray-900">Assalamu’alaikum Warahmatullahi Wabarakatuh.</span><br>
        Selamat datang di laman resmi <span class="font-medium text-gray-900">SMK Prestasi Prima</span>. Kami berkomitmen untuk menghadirkan pendidikan yang tidak hanya unggul dalam teknologi, namun juga membentuk karakter dan kepribadian berakhlak mulia.
      </p>

      <blockquote class="border-l-4 border-orange-500 pl-3 sm:pl-4 italic text-gray-600 text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.6s;">
        <span id="quote-text"></span>
      </blockquote>

      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.8s;">
        Melalui pembelajaran berbasis kompetensi abad 21, kami terus berinovasi untuk mencetak generasi yang siap bersaing di dunia industri, khususnya pada bidang <span class="font-medium text-gray-900">PPLG, TJKT, DKV,</span> dan <span class="font-medium text-gray-900">Broadcasting</span>.
      </p>

      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 1s;">
        Sekolah ini bukan hanya tempat menimba ilmu, melainkan tempat untuk membentuk kepribadian, menumbuhkan mimpi, dan mewujudkan cita-cita.
      </p>

      <p class="text-gray-800 font-semibold text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 1.2s;">
        Wassalamu’alaikum Warahmatullahi Wabarakatuh.
      </p>

      <div class="pt-4 opacity-0 transform translate-x-8 animate-load" style="animation-delay: 1.4s;">
        <a href="{{ route('pendaftaran') }}" 
           class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-400 text-white font-semibold py-2.5 sm:py-3 px-5 sm:px-6 rounded-xl shadow-lg hover:scale-105 hover:shadow-2xl transition-all duration-300 text-sm sm:text-base">
           Daftar Sekarang
           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                   d="M13 7l5 5m0 0l-5 5m5-5H6" />
           </svg>
        </a>
      </div>
    </div>
  </div>

  <!-- ===================== SAMBUTAN KETUA YAYASAN ===================== -->
  <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-20 md:py-24 grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">
    <!-- TEKS -->
    <div class="order-2 lg:order-1 space-y-6 sm:space-y-8">
      <div class="space-y-1 sm:space-y-2 opacity-0 transform -translate-x-8 animate-load" style="animation-delay: 0.2s;">
        <h3 class="text-xs sm:text-sm font-semibold text-orange-600 tracking-wide uppercase">Ketua Yayasan Prestasi Prima</h3>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-400">
          Flores Sagala, S.E.
        </h2>
      </div>

      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform -translate-x-8 animate-load" style="animation-delay: 0.4s;">
        <span class="font-semibold text-gray-900">Salam sejahtera bagi kita semua.</span><br>
        Sebagai Ketua Yayasan Prestasi Prima, kami berkomitmen untuk menjadikan lembaga pendidikan ini sebagai pusat keunggulan yang melahirkan generasi berintegritas, inovatif, dan adaptif terhadap perkembangan zaman.
      </p>

      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform -translate-x-8 animate-load" style="animation-delay: 0.6s;">
        Kami percaya bahwa pendidikan adalah investasi jangka panjang yang akan menentukan arah bangsa. Oleh karena itu, seluruh civitas akademika di lingkungan Yayasan Prestasi Prima terus berupaya memberikan yang terbaik — baik dalam mutu akademik, karakter, maupun pelayanan pendidikan.
      </p>

      <p class="text-gray-800 font-semibold text-sm sm:text-base md:text-lg opacity-0 transform -translate-x-8 animate-load" style="animation-delay: 0.8s;">
        Dengan semangat “Menjadi yang Terbaik”, mari kita bersama-sama melangkah menuju masa depan yang gemilang.
      </p>
    </div>

    <!-- FOTO KETUA YAYASAN -->
    <div class="order-1 lg:order-2 relative opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0s;">
      <div class="absolute -top-4 -right-4 w-full h-full bg-[#1e2a53] rounded-3xl -z-10 shadow-xl md:shadow-2xl"></div>
      <img src="{{ asset('assets/images/sambutan/flores-sagala.jpg') }}" 
           alt="Ketua Yayasan Prestasi Prima"
           class="rounded-3xl shadow-xl md:shadow-2xl w-full object-cover select-none pointer-events-none">
    </div>
  </div>

  <!-- FOTO GEDUNG (tidak bisa diklik) -->
  <section class="relative w-full bg-white overflow-hidden select-none pointer-events-none">
    <img alt="Gedung SMK Prestasi Prima" 
         class="w-full h-[40vh] sm:h-[55vh] lg:h-screen object-cover object-center hover:scale-[1.02] transition-transform duration-700" 
         src="{{ asset('assets/images/gedung/gedung.avif') }}">
  </section>
</section>

<!-- ===================== STYLE & SCRIPT ===================== -->
<style>
#quote-text {
  display: inline-block;
  border-right: 2px solid #f97316;
  white-space: nowrap;
  overflow: hidden;
}

@keyframes fadeSlideIn {
  0% { opacity: 0; transform: translateX(2rem); }
  100% { opacity: 1; transform: translateX(0); }
}
.animate-load {
  animation: fadeSlideIn 0.8s forwards;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const quote = "Kami menyiapkan generasi muda yang tidak hanya kompeten di bidangnya, tetapi juga siap menghadapi tantangan global dengan karakter dan etika yang kuat.";
  const el = document.getElementById("quote-text");
  let i = 0;

  function typeWriter() {
    if (i < quote.length) {
      el.innerHTML += quote.charAt(i);
      i++;
      setTimeout(typeWriter, 25);
    }
  }
  typeWriter();
});
</script>
@endsection
