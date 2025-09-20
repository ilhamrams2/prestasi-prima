<!-- ================= HERO SECTION (VIDEO) ================= -->
<section id="heroVideoSection" 
         class="relative h-screen w-full overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ asset('assets/images/section/hero/hero-bg.png') }}');">
    
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/40 z-10"></div>

  <!-- Hero Video -->
  <video id="heroVideo" autoplay muted playsinline 
         poster="{{ asset('assets/images/section/hero/hero-bg.png') }}"
         class="absolute inset-0 w-full h-full object-cover z-20 transition-opacity duration-1000">
    <source src="{{ asset('assets/videos/videos.mp4') }}" type="video/mp4">
    Browsermu tidak mendukung video.
  </video>

  <!-- Tombol Lewati -->
  <div id="skipBtnContainer" 
       class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-30 w-full flex justify-center">
    <button id="skipBtn" aria-label="Lewati video intro"
            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md shadow-md text-sm font-medium transition w-full max-w-[120px]">
      Lewati →
    </button>
  </div>
</section>

<!-- ================= HERO CONTENT ================= -->
<section id="heroContentSection"
         class="relative w-full min-h-screen md:h-[90vh] flex items-center text-white pt-8 overflow-hidden hidden">

  <!-- Background -->
  <div class="absolute inset-0">
    <img src="{{ asset('assets/images/section/hero/hero-bg.png') }}" alt="Hero Background" 
         class="w-full h-full object-cover" loading="lazy">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
  </div>

  <!-- Content Wrapper -->
  <div class="relative z-10 w-full max-w-7xl mx-auto px-4 md:px-8 flex flex-col items-center md:items-start text-center md:text-left">
    
    <!-- Logo + Nama (Mobile) -->
    <div class="flex items-center space-x-2 mb-6 md:hidden hero-animate">
      <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo SMK Prestasi Prima" 
           class="w-8 h-8 object-contain">
      <span class="font-semibold text-white text-lg">SMK Prestasi Prima</span>
    </div>

    <!-- Hero Text -->
    <p class="italic text-sm md:text-base mb-3 hero-animate">
      "If better is possible, good is not enough"
    </p>

    <h1 class="text-3xl md:text-6xl font-extrabold leading-tight mb-4 hero-animate">
      PRESTASI PRIMA
    </h1>

    <p class="text-sm md:text-lg mb-6 max-w-xl hero-animate">
      Kami berkomitmen menyelenggarakan pendidikan berkualitas tinggi yang membentuk generasi unggul, berkarakter, 
      dan siap menghadapi tantangan masa depan.
    </p>

    <!-- Button -->
    <a href="#tentang" aria-label="Baca selengkapnya tentang Prestasi Prima"
       class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 hero-animate">
      Selengkapnya →
    </a>
  </div>

  <!-- Floating Social -->
  <div class="absolute top-28 right-0 md:top-32 flex flex-col items-end z-20 space-y-3">
    <!-- Toggle Button -->
    <button id="toggleSocial" aria-label="Buka panel sosial"
            class="bg-orange-500 text-white w-12 h-12 md:w-14 md:h-14 rounded-l-2xl shadow-lg flex items-center justify-center transition opacity-0">
      <i class="fas fa-share-alt"></i>
    </button>

    <!-- Dark Mode Button -->
    <button id="darkModeToggle" aria-label="Mode Gelap"
            class="bg-gray-800 text-white w-12 h-12 md:w-14 md:h-14 rounded-l-2xl shadow-lg flex items-center justify-center transition opacity-0">
      <i class="fas fa-moon"></i>
    </button>

    <!-- Panel -->
    <div id="socialPanel"
         class="social-panel bg-white bg-opacity-95 rounded-l-2xl shadow-lg flex flex-col items-center py-3 space-y-3 w-0 overflow-hidden">
      <a href="{{ url('/') }}" aria-label="Kembali ke halaman utama"
         class="bg-white rounded-2xl shadow-lg p-2 flex items-center justify-center w-10 h-10 md:w-12 md:h-12">
        <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo kecil SMK Prestasi Prima" 
             class="w-6 h-6 md:w-8 md:h-8 object-contain">
      </a>
      <a href="https://wa.me/6289599439033" target="_blank" aria-label="WhatsApp"
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-whatsapp text-lg md:text-xl"></i>
      </a>
      <a href="https://instagram.com" target="_blank" aria-label="Instagram"
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-instagram text-lg md:text-xl"></i>
      </a>
      <a href="https://youtube.com" target="_blank" aria-label="YouTube"
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-youtube text-lg md:text-xl"></i>
      </a>
      <a href="https://tiktok.com" target="_blank" aria-label="TikTok"
         class="text-orange-500 hover:text-orange-600">
        <i class="fab fa-tiktok text-lg md:text-xl"></i>
      </a>
    </div>
  </div>
</section>

<!-- ================= SCRIPT ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const videoSection = document.getElementById("heroVideoSection");
  const video = document.getElementById("heroVideo");
  const skipBtn = document.getElementById("skipBtn");
  const skipBtnContainer = document.getElementById("skipBtnContainer");
  const contentSection = document.getElementById("heroContentSection");
  const toggleBtn = document.getElementById("toggleSocial");
  const darkModeBtn = document.getElementById("darkModeToggle");
  const panel = document.getElementById("socialPanel");

  let isOpen = false;

  // Video selesai → tampilkan hero content + floating buttons
  function showContent() {
    videoSection.style.transition = "opacity 0.6s";
    videoSection.style.opacity = 0;

    setTimeout(() => {
      videoSection.style.display = "none";
      skipBtnContainer.style.display = "none";
      contentSection.classList.remove("hidden");
      contentSection.style.opacity = 1;

      // Hero animation
      document.querySelectorAll(".hero-animate").forEach((el, idx) => {
        el.style.animationDelay = `${idx * 0.15}s`;
        el.classList.add("animate-hero-fast");
      });

      // Floating Button animasi (Social + Dark Mode)
      toggleBtn.classList.add("animate-floating");
      darkModeBtn.classList.add("animate-floating");
    }, 600);
  }

  video.addEventListener("ended", showContent);
  skipBtn.addEventListener("click", showContent);
  video.muted = true;
  video.play().catch(() => console.warn("Autoplay diblokir browser"));

  // Toggle Floating Social
  toggleBtn.addEventListener("click", () => {
    if (isOpen) {
      panel.classList.remove("open");
      panel.classList.add("close");
      toggleBtn.innerHTML = '<i class="fas fa-share-alt"></i>';
    } else {
      panel.classList.remove("close");
      panel.classList.add("open");
      toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
    }
    isOpen = !isOpen;
  });

  // Dark mode toggle
  darkModeBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark");
    darkModeBtn.innerHTML = document.body.classList.contains("dark") 
      ? '<i class="fas fa-sun"></i>' 
      : '<i class="fas fa-moon"></i>';
  });
});
</script>

<!-- ================= STYLE ================= -->
<style>
/* Hero Smooth Animation - versi cepat */
@keyframes heroSlideInFast {
  0% { opacity: 0; transform: translateX(-80px) scale(0.95); filter: blur(4px); }
  60% { opacity: 1; transform: translateX(10px) scale(1.02); filter: blur(0); }
  80% { transform: translateX(-4px) scale(0.98); }
  100% { opacity: 1; transform: translateX(0) scale(1); }
}
.animate-hero-fast { animation: heroSlideInFast 0.9s cubic-bezier(0.25, 1, 0.5, 1) forwards; }
.hero-animate { opacity: 0; }

/* Floating Social Panel */
.social-panel {
  transition: width 0.5s ease, opacity 0.5s ease, transform 0.5s ease;
  opacity: 0;
  transform: translateX(50%) scale(0.8);
}
.social-panel.open { width: 56px; opacity: 1; transform: translateX(0) scale(1); }
.social-panel.close { width: 0; opacity: 0; transform: translateX(50%) scale(0.8); }

/* Floating Button muncul setelah video */
@keyframes floatingIn {
  0% { opacity: 0; transform: translateX(100%) scale(0.8); }
  60% { opacity: 1; transform: translateX(-10px) scale(1.05); }
  80% { transform: translateX(5px) scale(0.97); }
  100% { opacity: 1; transform: translateX(0) scale(1); }
}
.animate-floating {
  animation: floatingIn 0.9s cubic-bezier(0.25, 1, 0.5, 1) forwards;
}
</style>
