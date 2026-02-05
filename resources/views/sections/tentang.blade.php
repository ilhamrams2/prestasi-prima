@push('styles')
{{-- Playfair Display font is now loaded locally via Vite/app.js --}}
<style>
    .serif-quote {
        font-family: 'Playfair Display', serif;
    }
    .signature-font {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        opacity: 0.7;
    }
    .stats-bar {
        border-top: 1px solid rgba(0,0,0,0.05);
        background: rgba(255,255,255,0.5);
        backdrop-filter: blur(10px);
    }
    .bento-stat-card {
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .bento-stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(255,107,0,0.08);
        border-color: rgba(255,107,0,0.2);
    }
    .card-texture {
        position: absolute;
        inset: 0;
        opacity: 0.03;
        pointer-events: none;
        background-image: radial-gradient(#000 1px, transparent 1px);
        background-size: 20px 20px;
    }
</style>
@endpush

<!-- ================= SECTION TENTANG KAMI: THE EXECUTIVE MINIMALIST ================= -->
<section id="tentang" class="relative bg-white py-32 overflow-hidden">
  {{-- Architectural Acent --}}
  <div class="absolute top-1/2 -translate-y-1/2 -left-20 w-[600px] h-[600px] border-[1px] border-orange-500/10 rounded-full z-0 pointer-events-none"></div>

  <div class="max-w-7xl mx-auto px-6 relative z-10">
    <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24 mb-20">
      
      {{-- 1. Visual Block: The Executive Portrait --}}
      <div class="w-full lg:w-1/2" data-aos="fade-right">
        <div class="relative flex justify-center">
          {{-- Thin Orange Curve Anchor --}}
          <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full aspect-square border-[1.5px] border-orange-500/20 rounded-full z-0 scale-90"></div>
          
          {{-- Soft Gray Backdrop Circle --}}
          <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-[80%] aspect-square bg-gray-50 rounded-full -z-10 opacity-70"></div>

          {{-- The Main Photo (PNG Cut-out) --}}
          <img src="{{ asset('assets/images/program/kepsek.png') }}" alt="Kepala Sekolah"
               class="w-[480px] relative z-10 filter drop-shadow-[0_50px_100px_rgba(0,0,0,0.12)]">

         
        </div>
      </div>

      {{-- 2. Content Block: The Vision --}}
      <div class="w-full lg:w-1/2" data-aos="fade-left">
        <div class="max-w-xl">
          <div class="inline-flex items-center gap-3 mb-8">
            <div class="w-8 h-[2px] bg-orange-500"></div>
            <span class="text-[11px] font-black text-gray-400 uppercase tracking-[0.4em]">Digital Leadership Academy</span>
          </div>

          <h2 class="text-4xl md:text-6xl font-extrabold text-[#0D0D0D] tracking-tight leading-[1.05] mb-10">
            Visi Kepemimpinan <br>
            <span class="text-orange-600">di Era Inovasi.</span>
          </h2>

          <div class="relative pl-10 mb-12">
            <iconify-icon icon="ri:double-quotes-l" class="absolute left-0 top-0 text-3xl text-orange-200"></iconify-icon>
            <p class="serif-quote text-2xl text-[#2D3436] italic leading-relaxed">
              "Pendidikan bukan tentang mengikuti arus, tapi tentang menciptakan teknologi yang mengubah arah masa depan."
            </p>
          </div>

          <p class="text-[#636E72] text-lg leading-[1.8] mb-12 font-medium">
            Kami mengintegrasikan <span class="text-gray-900 font-bold">Industry-Standard Tech Stack</span> ke dalam kurikulum inti, memastikan setiap lulusan memiliki peta jalan karir global yang jelas.
          </p>

          <div class="flex flex-wrap gap-6">
            <a href="{{ url('/tentang/profile-sekolah') }}" class="group relative inline-flex items-center gap-4 bg-orange-600 px-10 py-5 rounded-2xl transition-all duration-500 hover:bg-orange-700 hover:-translate-y-1 shadow-[0_20px_40px_-10px_rgba(234,88,12,0.3)]">
              <span class="text-xs font-black text-white uppercase tracking-widest">Eksplorasi Visi</span>
              <iconify-icon icon="solar:round-arrow-right-bold" class="text-white text-xl group-hover:translate-x-1 transition-transform"></iconify-icon>
            </a>
            
            <div class="flex items-center gap-3 px-6 py-2 border-l border-gray-100">
               <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
               <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">AI & IoT Integrated</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Modern Bento Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up">
      {{-- Card 1 --}}
      <div class="bento-stat-card relative overflow-hidden bg-white p-10 rounded-[32px] shadow-[0_10px_20px_rgba(0,0,0,0.04)] border border-gray-50 group">
        <div class="card-texture"></div>
        <div class="relative z-10">
          <span class="stat-number text-[44px] font-black text-[#FF6B00] tracking-tighter leading-none" data-target="2550">0</span>
          <p class="text-[10px] font-bold text-[#4A4A4A] uppercase tracking-[2px] mt-4 opacity-80">Future Leaders Generated</p>
        </div>
      </div>

      {{-- Card 2 --}}
      <div class="bento-stat-card relative overflow-hidden bg-white p-10 rounded-[32px] shadow-[0_10px_20px_rgba(0,0,0,0.04)] border border-gray-50 group">
        <div class="card-texture"></div>
        <div class="relative z-10">
          <span class="stat-number text-[44px] font-black text-[#FF6B00] tracking-tighter leading-none" data-target="200">0</span>
          <p class="text-[10px] font-bold text-[#4A4A4A] uppercase tracking-[2px] mt-4 opacity-80">Expert Mentors</p>
        </div>
      </div>

      {{-- Card 3 --}}
      <div class="bento-stat-card relative overflow-hidden bg-white p-10 rounded-[32px] shadow-[0_10px_20px_rgba(0,0,0,0.04)] border border-gray-50 group">
        <div class="card-texture"></div>
        <div class="relative z-10">
          <span class="stat-number text-[44px] font-black text-[#FF6B00] tracking-tighter leading-none" data-target="40">0</span>
          <p class="text-[10px] font-bold text-[#4A4A4A] uppercase tracking-[2px] mt-4 opacity-80">Innovation Spaces</p>
        </div>
      </div>

      {{-- Card 4 --}}
      <div class="bento-stat-card relative overflow-hidden bg-white p-10 rounded-[32px] shadow-[0_10px_20px_rgba(0,0,0,0.04)] border border-gray-50 group">
        <div class="card-texture"></div>
        <div class="relative z-10">
          <span class="stat-number text-[44px] font-black text-[#FF6B00] tracking-tighter leading-none" data-target="6">0</span>
          <p class="text-[10px] font-bold text-[#4A4A4A] uppercase tracking-[2px] mt-4 opacity-80">Digital Hubs</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .stat-number {
    transition: all 0.5s ease;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const statNumbers = document.querySelectorAll(".stat-number");
 
    // Animasi angka
    const animateNumber = (el) => {
      const target = +el.dataset.target;
      const duration = 2000;
      const startTime = performance.now();
 
      const update = (now) => {
        const progress = Math.min((now - startTime) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const value = Math.floor(eased * target);
        el.textContent = value.toLocaleString() + (target >= 100 ? "+" : "");
        if (progress < 1) requestAnimationFrame(update);
      };
      requestAnimationFrame(update);
    };
 
    // IntersectionObserver untuk angka
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          if (entry.target.classList.contains("stat-number")) {
            animateNumber(entry.target);
          }
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
 
    statNumbers.forEach(el => observer.observe(el));
  });
</script>