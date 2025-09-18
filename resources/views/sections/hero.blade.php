<!-- ================= HERO SECTION (VIDEO) ================= -->
<section id="heroVideoSection" 
         class="relative h-screen w-full overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ asset('assets/images/hero/hero-bg.png') }}');">
    
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/40 z-10"></div>

  <!-- Hero Video -->
  <video id="heroVideo" autoplay muted playsinline
         class="absolute inset-0 w-full h-full object-cover z-20 transition-opacity duration-1000">
    <source src="{{ asset('assets/videos/videos.mp4') }}" type="video/mp4">
    Browsermu tidak mendukung video.
  </video>

  <!-- Tombol Lewati -->
  <div id="skipBtnContainer" 
       class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-30">
    <button id="skipBtn"
            class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg shadow-lg text-base font-semibold transition">
      Lewati Video →
    </button>
  </div>
</section>

<!-- ================= HERO CONTENT ================= -->
<section id="heroContentSection"
         class="relative w-full min-h-screen md:h-[90vh] flex items-center text-white pt-[32px] overflow-hidden hidden">

  <!-- Background Image -->
  <div class="absolute inset-0">
    <img src="{{ asset('assets/images/hero/hero-bg.png') }}" alt="Hero Background" 
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
  </div>

  <!-- Content Wrapper -->
  <div class="relative z-10 w-full max-w-7xl mx-auto px-4 md:px-8 flex flex-col items-center md:items-start text-center md:text-left animate-slide-left">
    
    <!-- Logo + Nama (Mobile) -->
    <div class="flex items-center space-x-2 mb-6 md:hidden">
      <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo" 
           class="w-8 h-8 object-contain">
      <span class="font-semibold text-white text-lg">SMK Prestasi Prima</span>
    </div>

    <!-- Hero Text -->
    <p class="italic text-sm md:text-base mb-3">
      "If better is possible, good is not enough"
    </p>
    <h1 class="text-3xl md:text-6xl font-extrabold leading-tight mb-4">
      PRESTASI PRIMA
    </h1>
    <p class="text-sm md:text-lg mb-6 max-w-xl">
      Kami berkomitmen menyelenggarakan pendidikan berkualitas tinggi yang membentuk generasi unggul, berkarakter, 
      dan siap menghadapi tantangan masa depan.
    </p>

    <!-- Button -->
    <a href="#tentang"
       class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
      Selengkapnya →
    </a>
  </div>

  <!-- Floating Social -->
  <div class="absolute top-28 right-0 md:top-32 flex flex-col items-end z-10">
    
    <!-- Tombol Toggle -->
    <button id="toggleSocial"
            class="bg-orange-500 text-white w-12 h-12 md:w-14 md:h-14 rounded-l-2xl shadow-lg flex items-center justify-center transition">
      <i class="fas fa-share-alt"></i>
    </button>

    <!-- Panel Sosial -->
    <div id="socialPanel"
         class="bg-white bg-opacity-95 rounded-l-2xl shadow-lg flex flex-col items-center py-3 space-y-3 w-0 overflow-hidden transition-all duration-500">
      <a href="{{ url('/') }}"
         class="bg-white rounded-2xl shadow-lg p-2 flex items-center justify-center w-10 h-10 md:w-12 md:h-12">
        <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo kecil" 
             class="w-6 h-6 md:w-8 md:h-8 object-contain">
      </a>
      <a href="https://wa.me/6289599439033" target="_blank" 
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-whatsapp text-lg md:text-xl"></i>
      </a>
      <a href="https://instagram.com" target="_blank" 
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-instagram text-lg md:text-xl"></i>
      </a>
      <a href="https://youtube.com" target="_blank" 
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-youtube text-lg md:text-xl"></i>
      </a>
      <a href="https://tiktok.com" target="_blank" 
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-tiktok text-lg md:text-xl"></i>
      </a>
    </div>
  </div>
</section>

<!-- ================= SCRIPT ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const toggleBtn = document.getElementById("toggleSocial");
  const panel = document.getElementById("socialPanel");
  let isOpen = false;

  toggleBtn.addEventListener("click", () => {
    if (isOpen) {
      panel.style.width = "0px";
      toggleBtn.innerHTML = '<i class="fas fa-share-alt"></i>';
    } else {
      panel.style.width = "56px"; 
      toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
    }
    isOpen = !isOpen;
  });

  const videoSection = document.getElementById("heroVideoSection");
  const video = document.getElementById("heroVideo");
  const skipBtn = document.getElementById("skipBtn");
  const skipBtnContainer = document.getElementById("skipBtnContainer");
  const contentSection = document.getElementById("heroContentSection");

  function showContent() {
    videoSection.style.transition = "opacity 1s";
    videoSection.style.opacity = 0;

    setTimeout(() => {
      videoSection.style.display = "none";
      skipBtnContainer.style.display = "none";

      contentSection.classList.remove("hidden");
      contentSection.style.opacity = 0;
      contentSection.style.transition = "opacity 1s";

      void contentSection.offsetWidth; // reflow
      contentSection.style.opacity = 1;
    }, 1000);
  }

  video.addEventListener("ended", showContent);
  skipBtn.addEventListener("click", showContent);

  video.muted = true;
  video.play().catch(() => console.warn("Autoplay diblokir browser"));
});
</script>

<!-- ================= STYLE ================= -->
<style>
@keyframes slideLeft {
  0% { opacity: 0; transform: translateX(-60px); }
  100% { opacity: 1; transform: translateX(0); }
}
@keyframes slideRight {
  0% { opacity: 0; transform: translateX(60px); }
  100% { opacity: 1; transform: translateX(0); }
}
.animate-slide-left {
  animation: slideLeft 1s ease-out forwards;
}
.animate-slide-right {
  animation: slideRight 1s ease-out forwards;
}
</style>

<!-- ================= FONT AWESOME ================= -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- ================= AOS (Animate on Scroll) ================= -->
