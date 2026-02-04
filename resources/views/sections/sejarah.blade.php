@php
    $milestones = [
        ['year' => '2011', 'title' => 'The Genesis', 'desc' => 'Fondasi pertama SMK Prestasi Prima diletakkan dengan visi mencetak generasi unggul.', 'icon' => 'rocket-2-fill'],
        ['year' => '2014', 'title' => 'Momentum', 'desc' => 'Resmi beroperasi dengan fasilitas modern dan kurikulum yang mulai berdetak.', 'icon' => 'bar-chart-fill'],
        ['year' => '2017', 'title' => 'Expansion', 'desc' => 'Program Prakerin diperluas untuk mengasah soft skill siswa di industri nyata.', 'icon' => 'global-fill'],
        ['year' => '2021', 'title' => 'Gold Standard', 'desc' => 'Pencapaian Akreditasi A sebagai pengakuan atas kualitas tanpa henti.', 'icon' => 'medal-fill'],
        ['year' => '2025', 'title' => 'Future Ready', 'desc' => 'Transformasi Digital & Kurikulum Merdeka. Kami membentuk masa depan.', 'icon' => 'cpu-line'],
    ];
@endphp

<section id="sejarahSection" class="relative bg-[#0c1d3a] py-32 overflow-hidden perspective-1000">
    <!-- Clean Digital Background (Parallax Layer 1) -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-[0.05]" 
         style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
    </div>
    
    <!-- Parallax Blobs -->
    <div class="parallax-blob absolute top-0 -left-20 w-[500px] h-[500px] bg-orange-600/20 blur-[100px] rounded-full mix-blend-screen" data-speed="0.2"></div>
    <div class="parallax-blob absolute bottom-0 -right-20 w-[600px] h-[600px] bg-blue-600/10 blur-[120px] rounded-full mix-blend-screen" data-speed="-0.1"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-20">
        <!-- Enhanced Header with Visual Elements -->
        <div class="text-center mb-4 sm:mb-8 relative">
            
            <!-- Decorative Badge (Enhanced & Interactive) -->
            <div class="inline-flex items-center gap-2 sm:gap-3 mb-8 group">
                <span class="hidden sm:block h-px w-8 sm:w-16 bg-gradient-to-r from-transparent via-orange-500/40 to-orange-500/60 transition-all duration-500 group-hover:w-20 group-hover:via-orange-500/60"></span>
                <div class="flex items-center gap-2 sm:gap-2.5 px-3 py-1.5 sm:px-5 sm:py-2.5 rounded-full bg-orange-500/10 border border-orange-500/30 backdrop-blur-md hover:bg-orange-500/20 hover:border-orange-500/50 hover:scale-105 transition-all duration-300 cursor-pointer shadow-lg hover:shadow-orange-500/20">
                    <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-orange-500 animate-pulse shadow-[0_0_8px_rgba(249,115,22,0.6)]"></span>
                    <span class="text-orange-500 font-bold tracking-[0.15em] sm:tracking-[0.2em] text-xs sm:text-sm uppercase hover:text-orange-400 transition-colors">Our Journey</span>
                </div>
                <span class="hidden sm:block h-px w-8 sm:w-16 bg-gradient-to-l from-transparent via-orange-500/40 to-orange-500/60 transition-all duration-500 group-hover:w-20 group-hover:via-orange-500/60"></span>
            </div>

            <div class="relative py-12 sm:py-20">
                <!-- TIMELINE Background Text (More Visible) -->
                <h2 class="text-[60px] md:text-[160px] font-black absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white/[0.05] select-none pointer-events-none tracking-[0.25em] whitespace-nowrap" 
                    style="-webkit-text-stroke: 1.5px rgba(255,255,255,0.08);">
                    TIMELINE
                </h2>

                <!-- Main Title -->
                <h1 class="text-white text-4xl md:text-8xl font-black tracking-tighter leading-none relative z-10" data-gsap="title-reveal">
                    Perjalanan<br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600">Kami.</span>
                </h1>
            </div>

        </div>

        <!-- Vertical Timeline Container -->
        <div class="relative">
            <!-- Central Line Track -->
            <div class="absolute left-[28px] md:left-1/2 md:-translate-x-1/2 top-0 bottom-0 w-[2px] bg-white/5 rounded-full overflow-hidden">
                <!-- Glowing Progress Line (Animated) -->
                <div id="verticalProgressLine" class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-orange-500 via-yellow-500 to-orange-600 shadow-[0_0_20px_rgba(249,115,22,0.6)] origin-top scale-y-0"></div>
            </div>

            <div class="space-y-32 md:space-y-48 pb-20">
                @foreach($milestones as $index => $m)
                    <div class="milestone-row relative flex flex-col md:flex-row items-center w-full group perspective-card">
                        
                        <!-- Marker (Center) -->
                        <div class="absolute left-[8px] md:left-1/2 md:-translate-x-1/2 top-0 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0b172a] border border-white/10 z-30 flex items-center justify-center transition-all duration-500 group-hover:border-orange-500 group-hover:shadow-[0_0_30px_rgba(249,115,22,0.3)] shadow-xl">
                             <div class="w-3 h-3 md:w-4 md:h-4 rounded-full bg-slate-600 transition-all duration-300 marker-dot group-hover:bg-orange-500 group-hover:scale-125"></div>
                        </div>

                        <!-- Content Side -->
                        <div class="w-full md:w-[45%] pl-20 md:pl-0 {{ $index % 2 == 0 ? 'md:text-right md:pr-24' : 'md:order-last md:text-left md:pl-24' }}">
                            <div class="milestone-card opacity-0 translate-y-20 transform-style-3d">
                                <span class="text-7xl md:text-9xl font-black text-white/[0.03] absolute -top-16 {{ $index % 2 == 0 ? 'right-0' : 'left-0' }} select-none transition-transform duration-700 group-hover:scale-110">{{ $m['year'] }}</span>
                                <div class="relative z-10">
                                    <div class="inline-block px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-500 text-xs font-bold tracking-widest mb-4 backdrop-blur-md">
                                        {{ $m['year'] }}
                                    </div>
                                    <h3 class="text-white text-3xl md:text-4xl font-bold mb-4 leading-none group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-orange-400 group-hover:to-yellow-500 transition-all duration-300">{{ $m['title'] }}</h3>
                                    <p class="text-slate-400 text-sm md:text-base leading-relaxed">{{ $m['desc'] }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Empty Side (Parallax Icon - More Spacing) -->
                        <div class="hidden md:flex w-[45%] {{ $index % 2 == 0 ? 'justify-start pl-24' : 'justify-end pr-24' }} opacity-0 scale-50 milestone-icon-box">
                             <div class="w-24 h-24 rounded-[2rem] bg-gradient-to-br from-white/5 to-transparent border border-white/10 flex items-center justify-center backdrop-blur-md group-hover:-translate-y-4 group-hover:shadow-[0_20px_40px_-10px_rgba(249,115,22,0.2)] transition-all duration-500">
                                <i class="ri-{{ $m['icon'] }} text-4xl text-slate-500 group-hover:text-orange-500 transition-colors duration-300"></i>
                             </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Check if GSAP is loaded via app.js
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        initSejarahParallax();
    } else {
        // Retry if loaded async
        window.addEventListener('load', () => {
             if (typeof gsap !== 'undefined') initSejarahParallax();
        });
    }

    function initSejarahParallax() {
        // 1. Progress Line
        gsap.to('#verticalProgressLine', {
            scaleY: 1,
            ease: "none",
            scrollTrigger: {
                trigger: "#sejarahSection",
                start: "top center",
                end: "bottom bottom",
                scrub: 0.5
            }
        });

        // 2. Parallax Elements (Blobs & Text)
        gsap.utils.toArray('[data-speed]').forEach(el => {
            const speed = parseFloat(el.getAttribute('data-speed'));
            gsap.to(el, {
                y: (i, target) => ScrollTrigger.maxScroll(window) * speed,
                ease: "none",
                scrollTrigger: {
                    trigger: "#sejarahSection",
                    start: "top bottom",
                    end: "bottom top",
                    scrub: 0
                }
            });
        });

        // 3. Header Text Reveal
        gsap.from('[data-gsap="title-reveal"]', {
            y: 100,
            opacity: 0,
            duration: 1.2,
            ease: "power4.out",
            scrollTrigger: { trigger: '[data-gsap="title-reveal"]', start: "top 80%" }
        });

        // 4. Milestone Cards (Advanced Reveal)
        document.querySelectorAll('.milestone-row').forEach((row) => {
            const card = row.querySelector('.milestone-card');
            const icon = row.querySelector('.milestone-icon-box');
            const marker = row.querySelector('.marker-dot');

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: row,
                    start: "top 80%", // Adjusted trigger point
                    end: "top 20%",
                    toggleActions: "play none none reverse"
                }
            });

            tl.to(card, { 
                opacity: 1, 
                y: 0, 
                rotationX: 0, 
                duration: 1, 
                ease: "power3.out" 
            })
            .to(marker, { 
                backgroundColor: "#f97316", 
                scale: 1, 
                duration: 0.3 
            }, "-=0.8")
            .to(icon, { 
                opacity: 1, 
                scale: 1, 
                duration: 0.8, 
                ease: "elastic.out(1, 0.7)" 
            }, "-=0.9");
        });
    }
});
</script>
@endpush

<style>
.perspective-card {
    perspective: 1000px;
}
.transform-style-3d {
    transform-style: preserve-3d;
}
</style>