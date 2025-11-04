<!-- ================= HERO SECTION ================= -->
<section id="heroSection"
         class="relative w-full min-h-screen md:h-[90vh] flex items-center text-white pt-8 overflow-hidden bg-slate-950">
  <picture class="absolute inset-0">
    <img src="{{ asset('assets/images/section/hero/herobg.png') }}"
         alt="Gedung SMK Prestasi Prima"
         width="1920"
         height="1080"
         fetchpriority="high"
         decoding="async"
         loading="eager"
         class="w-full h-full object-cover" />
  </picture>

  <video id="heroVideo"
         class="pointer-events-none absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-700"
         playsinline
         muted
         loop
         preload="none"
         poster="{{ asset('assets/images/section/hero/herobg.png') }}"
         data-video-src="{{ asset('assets/videos/videos.mp4') }}"
         tabindex="-1"></video>

  <div class="absolute inset-0 bg-black/45"></div>

  <div class="relative z-10 w-full max-w-7xl mx-auto px-4 md:px-8 flex flex-col items-center md:items-start text-center md:text-left">
    <div class="flex items-center space-x-2 mb-6 md:hidden hero-animate">
      <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo SMK Prestasi Prima"
           class="w-8 h-8 object-contain" width="64" height="64" loading="lazy">
      <span class="font-semibold text-white text-lg">SMK Prestasi Prima</span>
    </div>

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

   <a href="/pendaftaran"
     class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transform hover:scale-105 hero-animate">
    Daftar Sekarang →
    </a>
  </div>

  <div class="absolute top-28 right-0 md:top-32 flex flex-col items-end z-20 space-y-3">
    <button id="heroSocialToggle" aria-label="Buka panel sosial"
            class="bg-orange-500 text-white w-12 h-12 md:w-14 md:h-14 rounded-l-2xl shadow-lg flex items-center justify-center transition opacity-0">
      <i class="fas fa-share-alt"></i>
    </button>

    <div id="heroSocialPanel"
         class="social-panel bg-white/95 rounded-l-2xl shadow-lg flex flex-col items-center py-3 space-y-3 w-0 overflow-hidden">
      <a href="{{ url('/') }}" class="bg-white rounded-2xl shadow-lg p-2 flex items-center justify-center w-10 h-10 md:w-12 md:h-12">
        <img src="{{ asset('assets/images/logo-icon.svg') }}" alt="Logo kecil SMK Prestasi Prima"
             class="w-6 h-6 md:w-8 md:h-8 object-contain" width="64" height="64" loading="lazy">
      </a>
      <a href="https://wa.me/6289599439033" target="_blank" class="text-orange-500 hover:text-orange-600" aria-label="WhatsApp">
        <i class="fab fa-whatsapp text-lg md:text-xl"></i>
      </a>
      <a href="https://instagram.com" target="_blank" class="text-orange-500 hover:text-orange-600" aria-label="Instagram">
        <i class="fab fa-instagram text-lg md:text-xl"></i>
      </a>
      <a href="https://youtube.com" target="_blank" class="text-orange-500 hover:text-orange-600" aria-label="YouTube">
        <i class="fab fa-youtube text-lg md:text-xl"></i>
      </a>
      <a href="https://tiktok.com" target="_blank" class="text-orange-500 hover:text-orange-600" aria-label="TikTok">
        <i class="fab fa-tiktok text-lg md:text-xl"></i>
      </a>
    </div>
  </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const animatedElements = document.querySelectorAll('.hero-animate');
  animatedElements.forEach((el, idx) => {
    el.style.animationDelay = `${idx * 0.12}s`;
    el.classList.add('animate-hero-fast');
  });

  const toggleBtn = document.getElementById('heroSocialToggle');
  const panel = document.getElementById('heroSocialPanel');

  const video = document.getElementById('heroVideo');
  const sourceUrl = video?.dataset.videoSrc;

  const hydrateVideo = () => {
    if (!video || !sourceUrl || video.dataset.loaded) return;
    video.src = sourceUrl;
    video.dataset.loaded = 'true';
    video.addEventListener('loadeddata', () => {
      video.classList.add('opacity-100');
      video.play().catch(() => {});
    }, { once: true });
    video.load();
  };

  if ('IntersectionObserver' in window && video) {
    new IntersectionObserver((entries, observer) => {
      if (entries.some(entry => entry.isIntersecting)) {
        hydrateVideo();
        observer.disconnect();
      }
    }, { rootMargin: '200px' }).observe(video);
  } else {
    window.addEventListener('load', hydrateVideo, { once: true });
  }

  if (toggleBtn && panel) {
    toggleBtn.classList.add('animate-floating');
    toggleBtn.addEventListener('click', () => {
      const isOpen = panel.classList.toggle('open');
      panel.classList.toggle('close', !isOpen);
      toggleBtn.innerHTML = isOpen ? '<i class="fas fa-times"></i>' : '<i class="fas fa-share-alt"></i>';
    });
  }
});
</script>
@endpush

<style>
@keyframes heroSlideInFast {
  0% { opacity: 0; transform: translateX(-80px) scale(0.95); filter: blur(4px); }
  60% { opacity: 1; transform: translateX(10px) scale(1.02); filter: blur(0); }
  80% { transform: translateX(-4px) scale(0.98); }
  100% { opacity: 1; transform: translateX(0) scale(1); }
}
.animate-hero-fast { animation: heroSlideInFast 0.9s cubic-bezier(0.25, 1, 0.5, 1) forwards; }
.hero-animate { opacity: 0; }

.social-panel {
  transition: width 0.5s ease, opacity 0.5s ease, transform 0.5s ease;
  opacity: 0;
  transform: translateX(50%) scale(0.8);
}
.social-panel.open { width: 56px; opacity: 1; transform: translateX(0) scale(1); }
.social-panel.close { width: 0; opacity: 0; transform: translateX(50%) scale(0.8); }

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
