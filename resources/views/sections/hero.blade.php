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

  <!-- Cinematic Visual Overlays -->
  <div class="absolute inset-0 z-25 pointer-events-none">
      {{-- Vignette & Depth --}}
      <div class="absolute inset-0 bg-[radial-gradient(circle,transparent_50%,rgba(0,0,0,0.5)_120%)]"></div>
      {{-- Soft Grain/Scanline for Texture --}}
      <div class="absolute inset-0 opacity-[0.03] bg-[linear-gradient(rgba(255,255,255,0)_50%,rgba(0,0,0,0.1)_50%)] bg-[length:100%_4px]"></div>
  </div>

  <!-- Digital HUD Elements (Static but Premium) -->
  <div class="absolute top-32 left-8 md:left-12 z-30 pointer-events-none hero-video-element opacity-0 transition-opacity duration-1000">
      <div class="flex items-center gap-4 text-white/40">
          <div class="w-10 h-[1px] bg-orange-500"></div>
          <p class="text-[9px] font-black uppercase tracking-[0.6em] whitespace-nowrap">Institutional Vision / 2025</p>
      </div>
  </div>

  <div class="absolute bottom-32 right-8 md:right-12 z-30 pointer-events-none text-right hero-video-element opacity-0 transition-opacity duration-1000 delay-300">
      <p class="text-[9px] font-black uppercase tracking-[0.4em] text-orange-500/60 mb-1">Status: Active</p>
      <p class="text-[40px] font-black text-white/5 leading-none tracking-tighter uppercase">Mission / 01</p>
  </div>

  <!-- Tombol Lewati (Redesigned: High-End Glassmorphism) -->
  <div id="skipBtnContainer" 
       class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-40 w-full flex justify-center px-6">
    <button id="skipBtn"
            class="group relative flex items-center gap-4 bg-white/10 backdrop-blur-md border border-white/20 px-8 py-3 rounded-2xl transition-all duration-500 hover:bg-orange-600 hover:border-orange-500 hover:-translate-y-1">
      <div class="absolute -inset-1 bg-orange-500 rounded-2xl blur-lg opacity-0 group-hover:opacity-20 transition-opacity"></div>
      <span class="text-[10px] font-black uppercase tracking-[0.3em] text-white">Lewati Intro</span>
      <iconify-icon icon="solar:round-arrow-right-bold" class="text-white text-xl group-hover:translate-x-1 transition-transform"></iconify-icon>
    </button>
  </div>
</section>

<!-- ================= HERO CONTENT ================= -->
<section id="heroContentSection"
         class="relative w-full min-h-screen items-center justify-center text-white overflow-hidden hidden">

  <!-- Background Layer -->
  <div class="absolute inset-0 z-0">
    <img src="{{ asset('assets/images/section/hero/herobg2.webp') }}" alt="Hero Background"
         class="w-full h-full object-cover scale-105" loading="lazy">
    <!-- Sophisticated Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/30"></div>
  </div>

  <!-- Decorative Abstract Elements -->
  <div class="absolute inset-0 z-10 pointer-events-none opacity-30">
    <div class="absolute top-20 left-10 w-64 h-64 bg-orange-600/20 blur-[100px] rounded-full animate-pulse-slow"></div>
    <div class="absolute bottom-40 right-20 w-80 h-80 bg-orange-400/10 blur-[120px] rounded-full"></div>
  </div>

  <!-- Content Wrapper -->
  <div class="relative z-20 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-16 flex flex-col items-center md:items-start text-center md:text-left pt-20">
    
    <!-- Ultra-Premium Tagline -->
    <div class="hero-animate mb-6 inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl">
      <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
      <span class="text-[10px] md:text-xs font-black uppercase tracking-[0.3em] text-orange-50 underline-offset-4 decoration-orange-500">
        "If better is possible, good is not enough"
      </span>
    </div>

    <!-- Cinematic Main Title -->
    <h1 class="hero-animate text-5xl md:text-7xl lg:text-8xl font-black leading-[0.95] mb-8 tracking-tighter">
      <span class="block text-white opacity-95">PRESTASI</span>
      <span class="block text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-orange-400 to-yellow-500 filter drop-shadow-[0_0_30px_rgba(234,88,12,0.3)]">PRIMA</span>
    </h1>

    <!-- Elegant Description -->
    <p class="hero-animate text-base md:text-xl text-gray-200/90 max-w-2xl mb-12 font-medium leading-relaxed md:pr-10">
      Mencetak generasi unggul yang tidak hanya kompeten secara teknis, namun juga memiliki integritas karakter untuk memimpin masa depan industri global.
    </p>

    <!-- Premium Action Buttons -->
    <div class="hero-animate flex flex-col sm:flex-row gap-5 items-center">
      <a href="/pendaftaran"
         class="group relative inline-flex items-center gap-3 bg-orange-600 px-10 py-5 rounded-2xl shadow-[0_20px_40px_-10px_rgba(234,88,12,0.4)] hover:shadow-[0_25px_50px_-12px_rgba(234,88,12,0.6)] transform hover:-translate-y-1 transition-all duration-500 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-orange-500 to-orange-700 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        <span class="relative z-10 font-black text-sm uppercase tracking-widest text-white">Daftar Sekarang</span>
        <iconify-icon icon="lucide:arrow-right" class="relative z-10 text-xl group-hover:translate-x-1 transition-transform"></iconify-icon>
      </a>

      <a href="/virtual-tour"
         class="group inline-flex items-center gap-3 px-10 py-5 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 hover:bg-white/20 transition-all duration-500">
        <iconify-icon icon="lucide:play-circle" class="text-2xl text-orange-400"></iconify-icon>
        <span class="font-black text-sm uppercase tracking-widest text-white">Virtual Tour</span>
      </a>
    </div>
  </div>

  <!-- Modern Scroll Indicator -->
  <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 hidden md:flex flex-col items-center gap-3 opacity-0 animate-fade-in delay-1000">
    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-white/40">Scroll Explore</span>
    <div class="w-[2px] h-12 bg-gradient-to-b from-orange-500 to-transparent"></div>
  </div>

  <!-- Floating Social Panel (Redesigned) -->
  <div class="absolute top-1/2 -translate-y-1/2 right-0 flex flex-col items-end z-30 space-y-4 pr-0">
    <!-- Toggle Button -->
    <button id="toggleSocial" aria-label="Buka panel sosial"
            class="bg-white/10 backdrop-blur-2xl hover:bg-orange-600 text-white w-14 h-16 rounded-l-[2rem] shadow-2xl flex items-center justify-center transition-all duration-500 opacity-0 border-y border-l border-white/20 group focus:outline-none">
      <iconify-icon icon="lucide:share-2" class="text-2xl group-hover:scale-110 transition-transform"></iconify-icon>
    </button>

    <!-- Panel -->
    <div id="socialPanel"
         class="social-panel bg-white/95 backdrop-blur-xl rounded-l-[2.5rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.3)] flex flex-col items-center py-6 space-y-6 w-0 overflow-hidden border-y border-l border-orange-100">
      <a href="{{ url('/') }}" class="w-12 h-12 flex items-center justify-center bg-orange-50 rounded-2xl hover:bg-orange-600 group transition-all duration-500 shadow-sm">
        <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo" class="w-7 h-7 object-contain group-hover:brightness-0 group-hover:invert transition-all">
      </a>
      <a href="https://wa.me/6285195928886" target="_blank" class="text-gray-400 hover:text-green-500 transition-colors transform hover:scale-125 duration-300">
        <iconify-icon icon="lucide:message-circle" class="text-2xl"></iconify-icon>
      </a>
      <a href="https://instagram.com/smkprestasiprima" target="_blank" class="text-gray-400 hover:text-pink-500 transition-colors transform hover:scale-125 duration-300">
        <iconify-icon icon="lucide:instagram" class="text-2xl"></iconify-icon>
      </a>
      <a href="https://youtube.com/@SEKOLAHPRESTASIPRIMA" target="_blank" class="text-gray-400 hover:text-red-500 transition-colors transform hover:scale-125 duration-300">
        <iconify-icon icon="lucide:youtube" class="text-2xl"></iconify-icon>
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
      
      // Reset video elements
      document.querySelectorAll(".hero-video-element").forEach(el => el.classList.remove("opacity-100"));
    };

    resetState();

    const ensureVideoVisible = () => {
      video.classList.add("opacity-100");
      video.classList.remove("opacity-0");
      videoSection.style.opacity = 1;

      // Show HUD elements
      setTimeout(() => {
          document.querySelectorAll(".hero-video-element").forEach(el => el.classList.add("opacity-100"));
      }, 800);
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
        toggleBtn.innerHTML = '<iconify-icon icon="lucide:share-2" class="text-2xl"></iconify-icon>';
      } else {
        panel.classList.remove("close");
        panel.classList.add("open");
        toggleBtn.innerHTML = '<iconify-icon icon="lucide:x" class="text-2xl"></iconify-icon>';
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
@keyframes heroSlideIn {
  0% { opacity: 0; transform: translateY(40px) scale(0.98); filter: blur(10px); }
  100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
}
.animate-hero-fast { animation: heroSlideIn 1.2s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }
.hero-animate { opacity: 0; }

@keyframes fadeIn {
  0% { opacity: 0; transform: translate(-50%, 20px); }
  100% { opacity: 1; transform: translate(-50%, 0); }
}
.animate-fade-in { animation: fadeIn 1s ease-out forwards; }

@keyframes pulseSlow {
  0%, 100% { opacity: 0.3; transform: scale(1); }
  50% { opacity: 0.6; transform: scale(1.1); }
}
.animate-pulse-slow { animation: pulseSlow 8s ease-in-out infinite; }

/* Floating Social Panel */
.social-panel {
  transition: width 0.6s cubic-bezier(0.4, 0, 0.2, 1), 
              opacity 0.4s ease-out, 
              transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  opacity: 0;
  transform: translateX(100%);
}
.social-panel.open { width: 80px; opacity: 1; transform: translateX(0); }
.social-panel.close { width: 0; opacity: 0; transform: translateX(100%); }

.delay-1000 { animation-delay: 1.5s; }

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

