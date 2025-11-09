<!-- ================= HERO SECTION (VIDEO) ================= -->
<section id="heroVideoSection" 
         class="relative h-screen w-full overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ asset('assets/images/section/hero/herobg2.webp') }}');">

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/40 z-10"></div>

  <!-- Hero Video -->
  <video id="heroVideo" preload="auto" autoplay muted playsinline 
    poster="{{ asset('assets/images/section/hero/herobg2.webp') }}"
    class="absolute inset-0 w-full h-full object-cover z-20 opacity-0 transition-opacity duration-700 will-change-transform">
    <source src="{{ asset('assets/videos/videos.mp4') }}" type="video/mp4">
    Browsermu tidak mendukung video.
  </video>

  <!-- Tombol Lewati -->
  <div id="skipBtnContainer" 
       class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-30 w-full flex justify-center">
    <button id="skipBtn"
            class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-md shadow-md text-sm font-medium transition w-full max-w-[120px] focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-orange-200 focus-visible:ring-offset-orange-500">
      <span class="sr-only">Lewati video intro</span>
      <span aria-hidden="true">Lewati →</span>
    </button>
  </div>
</section>

<!-- ================= HERO CONTENT ================= -->
<section id="heroContentSection"
         class="relative w-full min-h-screen md:h-[90vh] items-center text-white pt-8 overflow-hidden hidden">

  <!-- Background -->
  <div class="absolute inset-0">
    <img src="{{ asset('assets/images/section/hero/herobg2.webp') }}" alt="Hero Background"
         class="w-full h-full object-cover" loading="lazy">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
  </div>

  <!-- Content Wrapper -->
  <div class="relative z-10 w-full max-w-7xl mx-auto px-4 md:px-8 flex flex-col items-center md:items-start text-center md:text-left">
    
    <!-- Logo + Nama (Mobile) -->
    <div class="flex items-center space-x-2 mb-6 md:hidden hero-animate">
  <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo SMK Prestasi Prima"
           class="w-8 h-8 object-contain" loading="lazy">
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
    <a href="/pendaftaran"
       class="inline-block bg-orange-500 hover:bg-orange-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-200 focus-visible:ring-offset-2 focus-visible:ring-offset-black/40 hero-animate">
      <span class="sr-only">Buka halaman pendaftaran</span>
      <span aria-hidden="true">Daftar Sekarang →</span>
    </a>
  </div>

  <!-- Floating Social -->
  <div class="absolute top-28 right-0 md:top-32 flex flex-col items-end z-20 space-y-3">
    <!-- Toggle Button -->
    <button id="toggleSocial" aria-label="Buka panel sosial"
    class="bg-orange-500 hover:bg-orange-700 text-white w-12 h-12 md:w-14 md:h-14 rounded-l-2xl shadow-lg flex items-center justify-center transition opacity-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-200 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-500">
  <i class="ri-share-forward-line text-xl"></i>
    </button>

    <!-- Panel -->
    <div id="socialPanel"
         class="social-panel bg-white bg-opacity-95 rounded-l-2xl shadow-lg flex flex-col items-center py-3 space-y-3 w-0 overflow-hidden">
      <a href="{{ url('/') }}" aria-label="Kembali ke halaman utama"
         class="bg-white rounded-2xl shadow-lg p-2 flex items-center justify-center w-10 h-10 md:w-12 md:h-12">
  <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo kecil SMK Prestasi Prima"
             class="w-6 h-6 md:w-8 md:h-8 object-contain" loading="lazy">
      </a>
      <a href="https://wa.me/6289599439033" target="_blank" aria-label="WhatsApp"
         class="text-orange-500 hover:text-orange-600">
        <i class="ri-whatsapp-line text-lg md:text-xl"></i>
      </a>
      <a href="https://instagram.com" target="_blank" aria-label="Instagram"
         class="text-orange-500 hover:text-orange-600">
        <i class="ri-instagram-line text-lg md:text-xl"></i>
      </a>
      <a href="https://youtube.com" target="_blank" aria-label="YouTube"
         class="text-orange-500 hover:text-orange-600">
        <i class="ri-youtube-line text-lg md:text-xl"></i>
      </a>
      <a href="https://tiktok.com" target="_blank" aria-label="TikTok"
         class="text-orange-500 hover:text-orange-600">
        <i class="ri-tiktok-fill text-lg md:text-xl"></i>
      </a>
    </div>
  </div>
</section>

<!-- ================= SCRIPT ================= -->
<script>
(() => {
  const initHeroVideo = () => {
    const videoSection = document.getElementById("heroVideoSection");
    const video = document.getElementById("heroVideo");
    const skipBtn = document.getElementById("skipBtn");
    const skipBtnContainer = document.getElementById("skipBtnContainer");
    const contentSection = document.getElementById("heroContentSection");
    const toggleBtn = document.getElementById("toggleSocial");
    const panel = document.getElementById("socialPanel");

    if (!videoSection || !video || !skipBtn || !skipBtnContainer || !contentSection || !toggleBtn || !panel) {
      return;
    }

    const resetState = () => {
      videoSection.style.display = "";
      videoSection.style.opacity = "";
      skipBtnContainer.style.display = "";
      contentSection.classList.add("hidden");
      contentSection.classList.remove("flex");
      contentSection.style.opacity = 0;
      toggleBtn.classList.remove("animate-floating");
      panel.classList.remove("open", "close");
      toggleBtn.innerHTML = '<i class="ri-share-forward-line text-xl"></i>';
      delete video.dataset.heroContentShown;
    };

    resetState();

    const ensureVideoVisible = () => {
      video.classList.add("opacity-100");
      video.classList.remove("opacity-0");
      videoSection.style.opacity = 1;
    };

    const showContent = () => {
      if (video.dataset.heroContentShown === "1") {
        return;
      }

      video.dataset.heroContentShown = "1";
      window.clearTimeout(video._heroFallbackTimer);
      videoSection.style.transition = "opacity 0.5s";
      videoSection.style.opacity = 0;

      setTimeout(() => {
        video.pause();
        video.currentTime = 0;
        videoSection.style.display = "none";
        skipBtnContainer.style.display = "none";
        contentSection.classList.remove("hidden");
        contentSection.classList.add("flex");
        contentSection.style.opacity = 1;

        document.querySelectorAll(".hero-animate").forEach((el, idx) => {
          el.style.animationDelay = `${idx * 0.12}s`;
          el.classList.add("animate-hero-fast");
        });

        toggleBtn.classList.add("animate-floating");
      }, 500);
    };

    const handleToggle = () => {
      const isOpen = panel.classList.contains("open");
      if (isOpen) {
        panel.classList.remove("open");
        panel.classList.add("close");
        toggleBtn.innerHTML = '<i class="ri-share-forward-line text-xl"></i>';
      } else {
        panel.classList.remove("close");
        panel.classList.add("open");
        toggleBtn.innerHTML = '<i class="ri-close-line text-xl"></i>';
      }
    };

    const bindUnique = (element, event, handler, key) => {
      if (!element) return;
      const storeKey = `_hero_${key}`;
      if (element[storeKey]) {
        element.removeEventListener(event, element[storeKey]);
      }
      element.addEventListener(event, handler);
      element[storeKey] = handler;
    };

    const visibilityEvents = ["loadeddata", "canplay", "canplaythrough", "playing"];
    visibilityEvents.forEach(event => {
      bindUnique(video, event, ensureVideoVisible, `visible_${event}`);
    });
    bindUnique(video, "error", ensureVideoVisible, "visible_error");

    bindUnique(video, "ended", showContent, "ended");
    bindUnique(skipBtn, "click", showContent, "skip");
    bindUnique(toggleBtn, "click", handleToggle, "toggle");

    if (video.readyState >= 2) {
      ensureVideoVisible();
    }

    video.muted = true;
    video.autoplay = true;
    video.playsInline = true;
    video.preload = "auto";
    video.load();

    const playPromise = video.play();
    if (playPromise && typeof playPromise.catch === "function") {
      playPromise.catch(() => {
        ensureVideoVisible();
      });
    }

    window.clearTimeout(video._heroFallbackTimer);
    video._heroFallbackTimer = window.setTimeout(() => {
      ensureVideoVisible();
    }, 1800);
  };

  const cleanupHeroVideo = () => {
    const video = document.getElementById("heroVideo");
    const videoSection = document.getElementById("heroVideoSection");
    const skipBtnContainer = document.getElementById("skipBtnContainer");
    const contentSection = document.getElementById("heroContentSection");
    const toggleBtn = document.getElementById("toggleSocial");
    const panel = document.getElementById("socialPanel");

    if (video) {
      video.pause();
      video.currentTime = 0;
      video.classList.remove("opacity-100");
      video.classList.add("opacity-0");
      delete video.dataset.heroContentShown;
      window.clearTimeout(video._heroFallbackTimer);
    }

    if (videoSection) {
      videoSection.removeAttribute("style");
    }

    if (skipBtnContainer) {
      skipBtnContainer.removeAttribute("style");
    }

    if (contentSection) {
      contentSection.classList.add("hidden");
      contentSection.classList.remove("flex");
      contentSection.style.opacity = 0;
    }

    if (toggleBtn) {
      toggleBtn.classList.remove("animate-floating");
      toggleBtn.innerHTML = '<i class="ri-share-forward-line text-xl"></i>';
    }

    if (panel) {
      panel.classList.remove("open", "close");
    }
  };

  if (document.readyState !== "loading") {
    initHeroVideo();
  } else {
    document.addEventListener("DOMContentLoaded", initHeroVideo, { once: true });
  }
  document.addEventListener("turbo:load", initHeroVideo);
  document.addEventListener("turbo:before-cache", cleanupHeroVideo);
})();
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

