@php
    $activeHero = \App\Models\prestasiprima\HeroVideo::getActive();

    $heroVideoId = $activeHero->video_id ?? 'EYzn0caf0_k';
    $heroStartTime = $activeHero->start_time ?? 0;
    $heroTagline = $activeHero->tagline ?? '"If better is possible, good is not enough"';
    $heroHeadlineTop = $activeHero->headline_top ?? 'PRESTASI';
    $heroHeadlineBottom = $activeHero->headline_bottom ?? 'PRIMA';
    $heroDescription = $activeHero->description ?? 'Mencetak generasi unggul yang tidak hanya kompeten secara teknis, namun juga memiliki integritas karakter untuk memimpin masa depan industri global.';
    $heroHudTag = $activeHero->hud_tag ?? 'Institutional Vision / 2025';
    $heroHudStatus = $activeHero->hud_status ?? 'Status: Active';
    $heroHudMission = $activeHero->hud_mission ?? 'Mission / 01';

    $queryParams = [
        'autoplay' => 1,
        'mute' => 1,
        'controls' => 0,
        'loop' => 1,
        'playlist' => $heroVideoId,
        'playsinline' => 1,
        'rel' => 0,
        'showinfo' => 0,
        'iv_load_policy' => 3,
        'cc_load_policy' => 0,
        'cc_lang_pref' => 'none',
        'modestbranding' => 1,
        'disablekb' => 1,
        'fs' => 0,
        'enablejsapi' => 1,
    ];

    if ($heroStartTime > 0) {
        $queryParams['start'] = $heroStartTime;
    }

    $heroEmbedUrl = 'https://www.youtube.com/embed/' . $heroVideoId . '?' . http_build_query($queryParams);
@endphp

<!-- ================= HERO SECTION (YOUTUBE VIDEO) ================= -->
<section id="heroVideoSection" 
         class="relative h-screen w-full overflow-hidden bg-cover bg-center bg-black"
         style="background-image: url('{{ asset('assets/images/section/hero/herobg2.webp') }}');">

  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/40 z-10 pointer-events-none"></div>

  <!-- Hero YouTube Video Background (Direct Fullscreen Embed) -->
  <div id="heroYoutubeWrapper" class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none z-20">
    <iframe id="heroYoutubeIframe"
            src="{{ $heroEmbedUrl }}"
            title="Hero Background Video"
            class="hero-yt-frame absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[177.78vh] min-w-full h-[56.25vw] min-h-full transition-opacity duration-1000 pointer-events-none will-change-transform border-0 opacity-100"
            frameborder="0"
            loading="eager"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin">
    </iframe>
  </div>

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
          <p class="text-[9px] font-black uppercase tracking-[0.6em] whitespace-nowrap">{{ $heroHudTag }}</p>
      </div>
  </div>

  <div class="absolute bottom-32 right-8 md:right-12 z-30 pointer-events-none text-right hero-video-element opacity-0 transition-opacity duration-1000 delay-300">
      <p class="text-[9px] font-black uppercase tracking-[0.4em] text-orange-500/60 mb-1">{{ $heroHudStatus }}</p>
      <p class="text-[40px] font-black text-white/5 leading-none tracking-tighter uppercase">{{ $heroHudMission }}</p>
  </div>

  <!-- Tombol Lewati (High-End Glassmorphism) -->
  <div id="skipBtnContainer" 
       class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-40 w-full flex justify-center px-6">
    <button id="skipBtn"
            type="button"
            class="group relative flex items-center gap-4 bg-white/10 backdrop-blur-md border border-white/20 px-8 py-3 rounded-2xl transition-all duration-500 hover:bg-orange-600 hover:border-orange-500 hover:-translate-y-1 cursor-pointer">
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
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-transparent to-black/60"></div>
  </div>

  <!-- Animated Background Orbs -->
  <div class="absolute -top-40 -left-40 w-96 h-96 bg-orange-600/30 rounded-full blur-[128px] pointer-events-none animate-pulse-slow"></div>
  <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-blue-600/20 rounded-full blur-[128px] pointer-events-none animate-pulse-slow delay-1000"></div>

  <!-- Decorative Geometric Lines -->
  <div class="absolute inset-0 pointer-events-none opacity-20 z-0 flex items-center justify-center">
    <div class="w-[80vw] h-[80vh] border border-white/10 rounded-full absolute"></div>
    <div class="w-[60vw] h-[60vh] border border-white/5 rounded-full absolute"></div>
  </div>

  <!-- Main Content Container -->
  <div class="relative z-10 w-full max-w-7xl mx-auto px-6 sm:px-12 py-32 flex flex-col items-center justify-center text-center">

    <!-- Top Badge / Category -->
    <div class="hero-animate inline-flex items-center gap-3 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 mb-8">
      <span class="flex h-2 w-2 rounded-full bg-orange-500 animate-ping"></span>
      <span class="text-[11px] font-bold uppercase tracking-[0.25em] text-orange-400">SMK Pusat Keunggulan</span>
      <span class="text-white/30 text-xs">|</span>
      <span class="text-[11px] font-medium tracking-wider text-gray-300">Technology & Innovation</span>
    </div>

    <!-- Main Dynamic Headline with Modern Typography -->
    <h1 class="hero-animate text-5xl sm:text-7xl md:text-8xl lg:text-9xl font-black tracking-tight leading-[0.9] uppercase max-w-5xl mb-6">
      <span class="block text-white filter drop-shadow-lg">{{ $heroHeadlineTop }}</span>
      <span class="bg-gradient-to-r from-orange-400 via-orange-500 to-amber-300 bg-clip-text text-transparent italic font-serif">
        {{ $heroHeadlineBottom }}
      </span>
    </h1>

    <!-- Dynamic Tagline and Mission -->
    <p class="hero-animate text-lg sm:text-2xl md:text-3xl font-light text-gray-200 tracking-wide max-w-3xl mb-4 leading-relaxed font-sans">
      {{ $heroTagline }}
    </p>

    <p class="hero-animate text-xs sm:text-sm text-gray-400 max-w-2xl mb-10 leading-normal">
      {{ $heroDescription }}
    </p>

    <!-- Action Buttons (CTA) -->
    <div class="hero-animate flex flex-col sm:flex-row items-center gap-4 sm:gap-6 w-full justify-center max-w-md">
      <!-- Primary Button -->
      <a href="/pendaftaran" 
         class="group w-full sm:w-auto relative inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-white uppercase tracking-wider overflow-hidden rounded-xl bg-orange-600 shadow-[0_0_30px_-5px_rgba(234,88,12,0.5)] transition-all duration-300 hover:bg-orange-500 hover:shadow-[0_0_40px_-5px_rgba(234,88,12,0.8)] hover:-translate-y-0.5">
        <span class="relative z-10 flex items-center gap-2">
          Daftar Sekarang
          <iconify-icon icon="solar:arrow-right-linear" class="text-lg group-hover:translate-x-1 transition-transform"></iconify-icon>
        </span>
        <div class="absolute inset-0 -translate-x-full group-hover:translate-x-0 bg-gradient-to-r from-orange-500 to-amber-500 transition-transform duration-500 ease-out"></div>
      </a>

      <!-- Secondary Glass Button -->
      <a href="/tentang/profile-sekolah" 
         class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-white uppercase tracking-wider rounded-xl bg-white/5 backdrop-blur-md border border-white/20 transition-all duration-300 hover:bg-white/15 hover:border-white/40 hover:-translate-y-0.5">
        Profil Sekolah
      </a>
    </div>

    <!-- Quick Stats Grid Mini -->
    <div class="hero-animate grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-8 mt-16 pt-12 border-t border-white/10 w-full max-w-4xl">
      <div class="flex flex-col items-center">
        <span class="text-2xl sm:text-3xl font-black text-orange-400">A</span>
        <span class="text-[10px] sm:text-xs text-gray-400 uppercase tracking-widest mt-1">Akreditasi Unggul</span>
      </div>
      <div class="flex flex-col items-center">
        <span class="text-2xl sm:text-3xl font-black text-white">100%</span>
        <span class="text-[10px] sm:text-xs text-gray-400 uppercase tracking-widest mt-1">Kesiapan Kerja</span>
      </div>
      <div class="flex flex-col items-center">
        <span class="text-2xl sm:text-3xl font-black text-orange-400">50+</span>
        <span class="text-[10px] sm:text-xs text-gray-400 uppercase tracking-widest mt-1">Mitra Industri</span>
      </div>
      <div class="flex flex-col items-center">
        <span class="text-2xl sm:text-3xl font-black text-white">2026</span>
        <span class="text-[10px] sm:text-xs text-gray-400 uppercase tracking-widest mt-1">Kurikulum Merdeka</span>
      </div>
    </div>

  </div>

  <!-- Bottom Smooth Gradient to Next Section -->
  <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-gray-900 to-transparent pointer-events-none"></div>

  <!-- Floating Social Share Panel -->
  <div class="fixed right-0 top-1/2 transform -translate-y-1/2 z-50 flex items-center">
    <!-- Toggle Button -->
    <button id="toggleSocial" class="bg-orange-600 hover:bg-orange-500 text-white p-3 rounded-l-2xl shadow-2xl transition-all duration-300 flex items-center justify-center focus:outline-none cursor-pointer">
      <iconify-icon icon="lucide:share-2" class="text-2xl"></iconify-icon>
    </button>
    
    <!-- Collapsible Social Links Panel -->
    <div id="socialPanel" class="social-panel bg-white/10 backdrop-blur-xl border border-white/20 py-4 px-3 rounded-l-2xl shadow-2xl flex flex-col items-center space-y-4">
      <a href="https://facebook.com/smkprestasiprima" target="_blank" class="text-gray-400 hover:text-blue-500 transition-colors transform hover:scale-125 duration-300">
        <iconify-icon icon="lucide:facebook" class="text-2xl"></iconify-icon>
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
    const skipBtn = document.getElementById("skipBtn");
    const skipBtnContainer = document.getElementById("skipBtnContainer");
    const contentSection = document.getElementById("heroContentSection");
    const toggleBtn = document.getElementById("toggleSocial");
    const panel = document.getElementById("socialPanel");
    const ytIframe = document.getElementById("heroYoutubeIframe");

    if (!videoSection || !contentSection) {
      return;
    }

    // Disable captions explicitly on iframe load
    if (ytIframe) {
      ytIframe.addEventListener('load', () => {
        try {
          ytIframe.contentWindow.postMessage('{"event":"command","func":"unloadModule","args":["captions"]}', '*');
        } catch (e) {}
      });
    }

    // Reveal digital HUD elements
    setTimeout(() => {
      document.querySelectorAll(".hero-video-element").forEach(el => {
        el.classList.remove("opacity-0");
        el.classList.add("opacity-100");
      });
    }, 800);

    const showContent = () => {
      if (videoSection.dataset.heroContentShown === "1") {
        return;
      }
      videoSection.dataset.heroContentShown = "1";

      // Pause YouTube Video via postMessage
      if (ytIframe && ytIframe.contentWindow) {
        try {
          ytIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        } catch (e) {}
      }

      videoSection.style.transition = "opacity 0.6s ease";
      videoSection.style.opacity = "0";

      setTimeout(() => {
        videoSection.style.display = "none";
        if (skipBtnContainer) skipBtnContainer.style.display = "none";
        contentSection.classList.remove("hidden");
        contentSection.classList.add("flex");
        contentSection.style.opacity = "1";

        document.querySelectorAll(".hero-animate").forEach((el, idx) => {
          el.style.animationDelay = `${idx * 0.1}s`;
          el.classList.add("animate-hero-fast");
        });

        if (toggleBtn) toggleBtn.classList.add("animate-floating");
      }, 500);
    };

    if (skipBtn) {
      skipBtn.onclick = showContent;
    }

    // Social Toggle Drawer
    if (toggleBtn && panel) {
      toggleBtn.onclick = () => {
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
    }
  };

  if (document.readyState !== "loading") {
    initHeroVideo();
  } else {
    document.addEventListener("DOMContentLoaded", initHeroVideo, { once: true });
  }
  document.addEventListener("turbo:load", initHeroVideo);
})();
</script>

<!-- ================= STYLE ================= -->
<style>
/* Fullscreen YouTube frame scaling */
.hero-yt-frame {
  max-width: none !important;
}

/* Hero Smooth Animation */
@keyframes heroSlideIn {
  0% { opacity: 0; transform: translateY(40px) scale(0.98); filter: blur(10px); }
  100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
}
.animate-hero-fast { animation: heroSlideIn 1s cubic-bezier(0.2, 0.8, 0.2, 1) forwards; }
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
  transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1), 
              opacity 0.4s ease-out, 
              transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
  opacity: 0;
  transform: translateX(100%);
}
.social-panel.open { width: 80px; opacity: 1; transform: translateX(0); }
.social-panel.close { width: 0; opacity: 0; transform: translateX(100%); }

/* Floating Button */
@keyframes floatingIn {
  0% { opacity: 0; transform: translateX(100%) scale(0.8); }
  60% { opacity: 1; transform: translateX(-10px) scale(1.05); }
  80% { transform: translateX(5px) scale(0.97); }
  100% { opacity: 1; transform: translateX(0) scale(1); }
}
.animate-floating {
  animation: floatingIn 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
}
</style>
