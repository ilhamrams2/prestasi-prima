<!-- ================= SECTION OUR JOURNEY / SEJARAH ================= -->
<section id="sejarahSection" class="relative bg-[#0b172a] py-20 sm:py-28 overflow-hidden">
    <!-- Ambient Lighting & Soft Mesh Glow -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-1/3 -left-48 w-[500px] h-[500px] bg-orange-500/10 rounded-full blur-[140px] mix-blend-screen"></div>
        <div class="absolute bottom-1/3 -right-48 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-[140px] mix-blend-screen"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[length:32px_32px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-orange-500/10 border border-orange-500/30 backdrop-blur-md mb-5"
                 data-aos="fade-down" data-aos-duration="800">
                <span class="w-2 h-2 rounded-full bg-[#FF6B00]"></span>
                <span class="text-[#FF6B00] font-extrabold tracking-[0.2em] text-xs uppercase">Our Journey</span>
            </div>

            <!-- Title -->
            <h2 class="text-3xl sm:text-5xl md:text-6xl font-black text-white tracking-tight leading-tight mb-4"
                data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
                Perjalanan <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-orange-500 to-amber-300">Prestasi Prima</span>
            </h2>

            <!-- Subtitle -->
            <p class="text-xs sm:text-sm md:text-base text-slate-300 font-normal leading-relaxed"
               data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                Jejak langkah, dedikasi, dan transformasi berkelanjutan dalam membentuk generasi unggul sejak 2011 hingga masa kini.
            </p>
        </div>

        <!-- Roadmap Showcase Image -->
        <div class="relative bg-white/[0.02] backdrop-blur-md border border-white/10 rounded-3xl sm:rounded-[2.5rem] p-3 sm:p-6 md:p-8 shadow-2xl shadow-black/40 overflow-hidden"
             data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            
            <div class="overflow-x-auto custom-scrollbar rounded-2xl select-none" id="journeyScrollContainer">
                <div class="min-w-[700px] md:min-w-full flex items-center justify-center">
                    <img src="{{ asset('assets/images/journey.png') }}" 
                         alt="Our Journey - Roadmap Perjalanan SMK Prestasi Prima" 
                         loading="lazy"
                         class="w-full h-auto object-contain rounded-2xl shadow-md"
                         onerror="this.src='{{ asset('assets/images/journey/journey.png') }}'">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Drag-to-scroll script for roadmap -->
<script>
(() => {
    const initJourneyScroll = () => {
        const slider = document.getElementById('journeyScrollContainer');
        if (!slider) return;
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
        });
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.5;
            slider.scrollLeft = scrollLeft - walk;
        });
    };

    if (document.readyState !== 'loading') {
        initJourneyScroll();
    } else {
        document.addEventListener('DOMContentLoaded', initJourneyScroll, { once: true });
    }
    document.addEventListener('turbo:load', initJourneyScroll);
})();
</script>

<style>
/* Custom subtle scrollbar */
.custom-scrollbar::-webkit-scrollbar {
    height: 6px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 9999px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(255, 107, 0, 0.4);
    border-radius: 9999px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 107, 0, 0.8);
}
</style>