@php
    $milestones = [
        ['year' => '2011', 'title' => 'The Genesis', 'desc' => 'Fondasi pertama SMK Prestasi Prima diletakkan dengan visi mencetak generasi unggul.', 'icon' => 'rocket-2-fill'],
        ['year' => '2014', 'title' => 'Momentum', 'desc' => 'Resmi beroperasi dengan fasilitas modern dan kurikulum yang mulai berdetak.', 'icon' => 'bar-chart-fill'],
        ['year' => '2017', 'title' => 'Expansion', 'desc' => 'Program Prakerin diperluas untuk mengasah soft skill siswa di industri nyata.', 'icon' => 'global-fill'],
        ['year' => '2021', 'title' => 'Gold Standard', 'desc' => 'Pencapaian Akreditasi A sebagai pengakuan atas kualitas tanpa henti.', 'icon' => 'medal-fill'],
        ['year' => '2025', 'title' => 'Future Ready', 'desc' => 'Transformasi Digital & Kurikulum Merdeka. Kami membentuk masa depan.', 'icon' => 'cpu-line'],
    ];
@endphp

<section id="sejarahSection" class="relative bg-[#0c1d3a] py-20 overflow-hidden">
    <!-- Clean Digital Background -->
    <div class="absolute inset-0 z-0 pointer-events-none opacity-[0.03]" 
         style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
    </div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-orange-500/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500/10 blur-[120px] rounded-full"></div>

    <div class="max-w-4xl mx-auto px-6 relative z-20">
        <!-- Minimalist Header -->
        <div class="text-center mb-24">
            <span class="text-orange-500 font-bold tracking-widest text-xs uppercase mb-3 block" data-aos="fade-up">Our Legacy</span>
            <h2 class="text-white text-3xl md:text-5xl font-black tracking-tighter mb-6" data-aos="fade-up" data-aos-delay="100">
                Langkah Inovasi Kami.
            </h2>
            <div class="w-12 h-1 bg-gradient-to-r from-orange-500 to-yellow-500 mx-auto rounded-full" data-aos="zoom-in" data-aos-delay="200"></div>
        </div>

        <!-- Vertical Timeline Container -->
        <div class="relative">
            <!-- Central Line -->
            <div class="absolute left-[21px] md:left-1/2 md:-translate-x-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-white/20 to-transparent">
                <!-- Glowing Progress Line -->
                <div id="verticalProgressLine" class="absolute top-0 left-0 w-full bg-gradient-to-b from-orange-500 to-yellow-500 shadow-[0_0_10px_rgba(234,88,12,0.5)] origin-top scale-y-0"></div>
            </div>

            <div class="space-y-16">
                @foreach($milestones as $index => $m)
                    <div class="milestone-row relative flex flex-col md:flex-row items-center md:justify-between w-full group" data-index="{{ $index }}">
                        
                        <!-- Marker -->
                        <div class="absolute left-0 md:left-1/2 md:-translate-x-1/2 w-11 h-11 rounded-full bg-[#0c1d3a] border-4 border-white/10 z-30 flex items-center justify-center transition-all duration-500 group-hover:border-orange-500/50">
                            <div class="w-2.5 h-2.5 rounded-full bg-white/20 transition-all duration-500 marker-inner"></div>
                        </div>

                        <!-- Content Side -->
                        <div class="w-full md:w-[42%] ml-14 md:ml-0 {{ $index % 2 == 0 ? 'md:text-right' : 'md:order-last md:text-left' }}">
                            <div class="milestone-card p-6 rounded-2xl bg-white/[0.02] border border-white/10 backdrop-blur-sm hover:border-orange-500/30 transition-all duration-500 translate-y-4 opacity-0">
                                <span class="text-orange-500 font-black text-xl mb-1 block tracking-tight">{{ $m['year'] }}</span>
                                <h3 class="text-white text-lg font-bold mb-2 group-hover:text-orange-400 transition-colors">{{ $m['title'] }}</h3>
                                <p class="text-gray-400 text-sm leading-relaxed">{{ $m['desc'] }}</p>
                            </div>
                        </div>

                        <!-- Empty Side (Icon Reveal) -->
                        <div class="hidden md:flex w-[42%] justify-center items-center opacity-0 scale-50 transition-all duration-700 milestone-icon-box">
                             <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/5 shadow-inner">
                                <i class="ri-{{ $m['icon'] }} text-3xl text-gray-500/50 group-hover:text-orange-500/80 transition-all duration-700"></i>
                             </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<script>
(function() {
    const initSejarahMinimal = () => {
        gsap.registerPlugin(ScrollTrigger);

        // Progress Line Animation
        gsap.to('#verticalProgressLine', {
            scaleY: 1,
            ease: "none",
            scrollTrigger: {
                trigger: ".milestone-row",
                start: "top center",
                endTrigger: ".milestone-row:last-child",
                end: "bottom center",
                scrub: 1.5
            }
        });

        // Rows Reveal
        document.querySelectorAll('.milestone-row').forEach((row, i) => {
            const card = row.querySelector('.milestone-card');
            const icon = row.querySelector('.milestone-icon-box');
            const marker = row.querySelector('.marker-inner');

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: row,
                    start: "top 80%",
                    end: "top 40%",
                    toggleActions: "play none none reverse"
                }
            });

            tl.to(card, { opacity: 1, y: 0, duration: 0.6, ease: "power2.out" })
              .to(marker, { backgroundColor: "#f97316", scale: 1.2, duration: 0.3 }, "-=0.4")
              .to(icon, { opacity: 1, scale: 1, duration: 0.5, ease: "back.out(1.7)" }, "-=0.3");
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSejarahMinimal);
    } else {
        initSejarahMinimal();
    }
    document.addEventListener('turbo:load', initSejarahMinimal);
})();
</script>
@endpush

<style>
.milestone-card {
    will-change: transform, opacity;
}
.milestone-row:hover .marker-inner {
    background-color: #f97316 !important;
    transform: scale(1.5);
    box-shadow: 0 0 15px rgba(249, 115, 22, 0.8);
}
</style>