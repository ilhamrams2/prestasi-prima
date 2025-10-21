@extends('prestasiprima.index')
@include('ChatbotUI')

@section('content')
<!-- ===================== SECTION SAMBUTAN ===================== -->
<section class="mt-20 md:mt-28 bg-gradient-to-br from-white via-gray-50 to-gray-100 relative overflow-hidden">

  <!-- Ornamen Latar Animasi -->
  <div class="absolute inset-0 -z-10">
    <div class="absolute top-0 left-1/3 w-64 sm:w-80 md:w-96 h-64 sm:h-80 md:h-96 bg-orange-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    <div class="absolute bottom-0 right-1/4 w-64 sm:w-80 md:w-96 h-64 sm:h-80 md:h-96 bg-blue-100 rounded-full blur-3xl opacity-30 animate-pulse-slow delay-2000"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-16 md:py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-16 items-center">

    <!-- FOTO SAMBUTAN -->
    <div class="relative opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0s;">
      <div class="absolute -top-4 -left-4 w-full h-full bg-[#1e2a53] rounded-3xl -z-10 shadow-xl md:shadow-2xl"></div>
      <img src="{{ asset('assets/images/sambutan/dr-wannen.png') }}" 
           alt="Penjamin Mutu Yayasan Prestasi Prima"
           class="rounded-3xl shadow-xl md:shadow-2xl w-full object-cover">
    </div>

    <!-- TEKS SAMBUTAN -->
    <div class="space-y-6 sm:space-y-8">
      
      <!-- Judul -->
      <div class="space-y-1 sm:space-y-2 opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.2s;">
        <h3 class="text-xs sm:text-sm font-semibold text-orange-600 tracking-wide uppercase">Penjamin Mutu Yayasan Prestasi Prima</h3>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-400">
          Dr. Wannen Pakpahan, MM.
        </h2>
      </div>

      <!-- Paragraf -->
      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.4s;">
        <span class="font-semibold text-gray-900">Assalamu’alaikum Warahmatullahi Wabarakatuh.</span><br>
        Selamat datang di website resmi <span class="font-medium text-gray-900">SMK Prestasi Prima</span>.
        Kami percaya, lulusan unggul bukan hanya yang cakap teknologi, tapi juga yang berkarakter, beriman, dan percaya diri.
      </p>

      <!-- Quote dengan typing effect -->
      <blockquote class="border-l-4 border-orange-500 pl-3 sm:pl-4 italic text-gray-600 text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.6s;">
        <span id="quote-text"></span>
      </blockquote>

      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 0.8s;">
        Melalui pendekatan abad 21 dan pembelajaran berbasis kompetensi, kami membentuk siswa siap bersaing di dunia kerja
        dan dunia global — terutama di bidang <span class="font-medium text-gray-900">PPLG, TJKT, DKV,</span> dan <span class="font-medium text-gray-900">Broadcasting</span>.
      </p>

      <p class="text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 1s;">
        Karena bagi kami, sekolah bukan sekadar tempat belajar, tapi tempat bertumbuh dan bermimpi.
        Terima kasih atas kunjungan Anda.
      </p>

      <p class="text-gray-800 font-semibold text-sm sm:text-base md:text-lg opacity-0 transform translate-x-8 animate-load" style="animation-delay: 1.2s;">
        Wassalamu’alaikum Warahmatullahi Wabarakatuh.
      </p>

      <!-- Tombol CTA -->
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

      <!-- Tanda tangan -->
      <div class="pt-6 sm:pt-8 opacity-0 transform translate-x-8 animate-load" style="animation-delay: 1.6s;">
        <img src="{{ asset('assets/images/sambutan/ttd-wannen.png') }}" alt="Tanda tangan Dr. Wannen"
             class="h-12 sm:h-16 opacity-80 mx-auto lg:mx-0">
      </div>
    </div>
  </div>
  <section class="relative w-full bg-white overflow-hidden">
<img alt="Gedung SMK Prestasi Prima" class="w-full h-[40vh] sm:h-[55vh] lg:h-screen object-cover object-center hover:scale-[1.02] transition-transform duration-700" src="{{ asset('assets/images/gedung/gedung.avif') }}">
</section>
</section>

<!-- ===================== ANIMASI CUSTOM ===================== -->
<style>
@keyframes pulse-slow {
  0%, 100% { transform: scale(1); opacity: 0.3; }
  50% { transform: scale(1.1); opacity: 0.5; }
}
.animate-pulse-slow {
  animation: pulse-slow 8s infinite;
}
.delay-2000 {
  animation-delay: 2s;
}

/* Typing effect untuk quote */
#quote-text {
  display: inline-block;
  border-right: 2px solid #f97316;
  white-space: nowrap;
  overflow: hidden;
}

/* Animasi load otomatis */
@keyframes fadeSlideIn {
  0% { opacity: 0; transform: translateX(2rem); }
  100% { opacity: 1; transform: translateX(0); }
}
.animate-load {
  animation: fadeSlideIn 0.8s forwards;
}
</style>

<!-- ===================== SCRIPT TYPING EFFECT ===================== -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  const quote = "Kami menyiapkan generasi muda yang tidak hanya kompeten di bidangnya, tapi juga siap menghadapi tantangan global dengan karakter dan etika yang kuat.";
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
