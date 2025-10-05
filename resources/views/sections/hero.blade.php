<!-- ================= HERO SECTION (VIDEO) ================= -->
<section id="heroVideoSection" 
         class="relative h-screen w-full overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ asset('assets/images/section/hero/herobg.png') }}');">
    
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


<!-- ================= HERO CAROUSEL (NEW) ================= -->
<section id="heroCarouselSection" 
         class="relative w-full h-screen hidden overflow-hidden bg-black">

    <!-- Carousel Wrapper -->
    <div id="carouselWrapper" class="absolute inset-0 flex transition-transform duration-700">
        <!-- Gambar Slide -->
        <div class="w-full flex-shrink-0">
            <img src="{{ asset('assets/images/section/hero/slide1.svg') }}" 
                 class="w-full h-screen object-cover" alt="Slide 1">
        </div>
        <div class="w-full flex-shrink-0">
            <img src="{{ asset('assets/images/section/hero/slide2.svg') }}" 
                 class="w-full h-screen object-cover" alt="Slide 2">
        </div>
        <div class="w-full flex-shrink-0">
            <img src="{{ asset('assets/images/section/hero/slide1.svg') }}" 
                 class="w-full h-screen object-cover" alt="Slide 3">
        </div>
        <div class="w-full flex-shrink-0">
            <img src="{{ asset('assets/images/section/hero/slide2.svg') }}" 
                 class="w-full h-screen object-cover" alt="Slide 4">
        </div>
    </div>

    <!-- Tombol Skip Carousel -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-30">
        <button id="skipCarouselBtn"
                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg shadow-lg text-base font-semibold transition">
          Lewati Carousel →
        </button>
    </div>
</section>


<!-- ================= HERO CONTENT ================= -->
<section id="heroContentSection"
         class="relative w-full min-h-screen md:h-[90vh] flex items-center text-white pt-[32px] overflow-hidden hidden">

    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/section/hero/herobg.png') }}" alt="Hero Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>

    <!-- Content Wrapper -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 md:px-8 flex flex-col items-center md:items-start text-center md:text-left animate-slide-left">
        <p class="italic text-sm md:text-base mb-3">"If better is possible, good is not enough"</p>
        <h1 class="text-3xl md:text-6xl font-extrabold leading-tight mb-4">PRESTASI PRIMA</h1>
        <p class="text-sm md:text-lg mb-6 max-w-xl">
            Kami berkomitmen menyelenggarakan pendidikan berkualitas tinggi yang membentuk generasi unggul, berkarakter, 
            dan siap menghadapi tantangan masa depan.
        </p>
        <a href="#tentang"
           class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
            Selengkapnya →
        </a>
    </div>
</section>


<!-- ================= SCRIPT ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const videoSection = document.getElementById("heroVideoSection");
    const video = document.getElementById("heroVideo");
    const skipBtn = document.getElementById("skipBtn");
    const skipBtnContainer = document.getElementById("skipBtnContainer");
    const carouselSection = document.getElementById("heroCarouselSection");
    const carouselWrapper = document.getElementById("carouselWrapper");
    const skipCarouselBtn = document.getElementById("skipCarouselBtn");
    const contentSection = document.getElementById("heroContentSection");

    let currentSlide = 0;
    const totalSlides = carouselWrapper.children.length;
    let carouselInterval;

    // === Tampilkan Carousel setelah Video ===
    function showCarousel() {
        // sembunyikan video
        videoSection.style.display = "none";
        skipBtnContainer.style.display = "none";

        // tampilkan carousel
        carouselSection.classList.remove("hidden");

        // mulai auto slide
        carouselInterval = setInterval(() => {
            currentSlide++;
            if (currentSlide >= totalSlides) {
                clearInterval(carouselInterval);
                showContent(); // otomatis lanjut ke hero content
                return;
            }
            carouselWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
        }, 1500); // 1.5 detik per slide
    }

    // === Tampilkan Hero Content setelah Carousel ===
    function showContent() {
        clearInterval(carouselInterval);
        carouselSection.style.display = "none";

        contentSection.classList.remove("hidden");
        contentSection.style.opacity = 0;
        contentSection.style.transition = "opacity 1s";

        void contentSection.offsetWidth;
        contentSection.style.opacity = 1;
    }

    // event video
    if (video && skipBtn) {
        video.addEventListener("ended", showCarousel);
        skipBtn.addEventListener("click", showCarousel);
    }

    // event skip carousel
    if (skipCarouselBtn) {
        skipCarouselBtn.addEventListener("click", showContent);
    }
});
</script>
