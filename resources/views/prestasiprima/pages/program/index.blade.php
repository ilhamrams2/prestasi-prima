@extends('prestasiprima.index')

@section('title', 'Program Keahlian — SMK Prestasi Prima')

@push('styles')
<style>
  :root {
    --action-orange: #FF6B00;
    --deep-navy: #0e162e;
    --charcoal: #333333;
  }

  .font-outfit { font-family: 'Outfit', sans-serif; }
  .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

  .text-mask-hero {
    font-size: clamp(3.2rem, 10vw, 8rem);
    font-weight: 950;
    line-height: 0.9;
    letter-spacing: -0.04em;
    background: linear-gradient(135deg, var(--deep-navy) 0%, #1a2a4e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-transform: uppercase;
  }

  .text-ghost {
    position: absolute;
    font-family: 'Outfit', sans-serif;
    font-size: clamp(8rem, 25vw, 25rem);
    font-weight: 900;
    line-height: 1;
    color: rgba(230, 81, 0, 0.05);
    -webkit-text-stroke: 1px rgba(230, 81, 0, 0.15);
    white-space: nowrap;
    z-index: 0;
    pointer-events: none;
    text-transform: uppercase;
    animation: drift 20s linear infinite alternate;
  }

  @keyframes drift {
    from { transform: translateX(-50px) translateY(0); }
    to { transform: translateX(50px) translateY(-30px); }
  }

  .highlight-orange {
    background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .ripple-dot {
    position: relative;
    display: flex;
    height: 8px;
    width: 8px;
  }
  .ripple-dot .ping {
    animation: ripple 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    position: absolute;
    display: inline-flex;
    height: 100%;
    width: 100%;
    border-radius: 9999px;
    background-color: var(--action-orange);
    opacity: 0.75;
  }
  @keyframes ripple {
    75%, 100% { transform: scale(3); opacity: 0; }
  }

  .program-card {
    position: relative;
    background: #FFFFFF;
    border-radius: 48px;
    overflow: hidden;
    border: 1px solid rgba(230, 81, 0, 0.12);
    transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 40px 80px -20px rgba(14, 22, 46, 0.08);
  }

  .program-tag {
    font-family: 'Outfit', sans-serif;
    font-size: 0.7rem;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: var(--action-orange);
    background: rgba(255, 107, 0, 0.05);
    padding: 8px 16px;
    border-radius: 100px;
    display: inline-block;
  }

  .btn-explore {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 18px 32px;
    background: var(--deep-navy);
    color: white;
    border-radius: 20px;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    transition: all 0.4s ease;
  }

  .btn-explore:hover {
    background: var(--action-orange);
    padding-right: 40px;
    box-shadow: 0 20px 40px -10px rgba(255, 107, 0, 0.3);
  }

  /* Bento-like logic for descriptions */
  .feature-dot {
    width: 6px;
    height: 6px;
    background: var(--action-orange);
    border-radius: 50%;
    margin-right: 12px;
    flex-shrink: 0;
  }

  .perspective-img {
    perspective: 1000px;
  }
  
  .perspective-img img {
    transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .program-card:hover .perspective-img img {
    transform: scale(1.05) rotateY(-5deg) rotateX(2deg);
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-48 pb-20 px-6 bg-white relative">
    <!-- Ghost Background Text -->
    <div class="text-ghost top-24 -left-20">COURSES</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <div class="ripple-dot">
            <span class="ping"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </div>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Digital Academy</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
           Talenta Global<br>
            <span class="highlight-orange">Keahlian Tanpa Batas.</span>
          </h1>
        </div>
      </div>
      
      <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
          SMK Prestasi Prima menghadirkan <span class="text-charcoal font-black border-b-4 border-orange-500/20">Program Keahlian Unggulan</span> yang didesain khusus untuk melahirkan pemimpin teknologi di industri digital global.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== PROGRAM LIST SECTION ========== --}}
  <section class="py-24 px-6 bg-[#fcfcfd] border-y border-gray-50">
    <div class="max-w-7xl mx-auto flex flex-col gap-24 md:gap-40">

      {{-- PROGRAM 1: PPLG --}}
      <div class="program-card group p-6 md:p-14" data-aos="fade-up">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="perspective-img rounded-[40px] overflow-hidden aspect-[4/5] bg-gray-50">
                <img src="{{ asset('assets/images/program/pplg.png') }}" alt="PPLG" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col items-start gap-8">
                <span class="program-tag">PPLG • Pengembangan Perangkat Lunak dan Gim</span>
                <h2 class="font-outfit text-4xl md:text-6xl font-black text-[#0e162e] tracking-tight leading-none">Ciptakan Solusi <br><span class="highlight-orange">Digital Inovatif.</span></h2>
                <p class="font-jakarta text-gray-500 text-lg md:text-xl leading-relaxed">Merancang, membangun, dan menguji ekosistem aplikasi serta dunia virtual melalui penguasaan coding dan logika algoritma tingkat tinggi.</p>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="300"><div class="feature-dot"></div> Web & Mobile Development</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="400"><div class="feature-dot"></div> Game Engine Architecture</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="500"><div class="feature-dot"></div> UI/UX Design Flow</div>
                </div>
                <a href="{{ route('program.pplg') }}" class="btn-explore">
                    Jelajahi Kurikulum
                    <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
                </a>
            </div>
        </div>
      </div>

      {{-- PROGRAM 2: DKV --}}
      <div class="program-card group p-6 md:p-14" data-aos="fade-up">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="flex flex-col items-start gap-8 order-2 lg:order-1">
                <span class="program-tag">DKV • Desain Komunikasi Visual</span>
                <h2 class="font-outfit text-4xl md:text-6xl font-black text-[#0e162e] tracking-tight leading-none">Visualisasikan <br><span class="highlight-orange">Ide Tanpa Batas.</span></h2>
                <p class="font-jakarta text-gray-500 text-lg md:text-xl leading-relaxed">Menggabungkan estetika seni dengan strategi komunikasi modern untuk menciptakan identitas visual yang ikonik dan berdampak global.</p>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="300"><div class="feature-dot"></div> Branding & Corporate Identity</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="400"><div class="feature-dot"></div> Digital Illustration</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="500"><div class="feature-dot"></div> Motion Graphic Art</div>
                </div>
                <a href="{{ route('program.dkv') }}" class="btn-explore">
                    Jelajahi Kurikulum
                    <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
                </a>
            </div>
            <div class="perspective-img rounded-[40px] overflow-hidden aspect-[4/5] bg-gray-50">
                <img src="{{ asset('assets/images/program/dkv.png') }}" alt="DKV" class="w-full h-full object-cover">
            </div>
        </div>
      </div>

      {{-- PROGRAM 3: TJKT --}}
      <div class="program-card group p-6 md:p-14" data-aos="fade-up">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="perspective-img rounded-[40px] overflow-hidden aspect-[4/5] bg-gray-50">
                <img src="{{ asset('assets/images/program/tkj.png') }}" alt="TJKT" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col items-start gap-8">
                <span class="program-tag">TJKT • Teknik Jaringan Komputer dan Telekomunikasi</span>
                <h2 class="font-outfit text-4xl md:text-6xl font-black text-[#0e162e] tracking-tight leading-none">Arsitektur <br><span class="highlight-orange">Konektivitas Dunia.</span></h2>
                <p class="font-jakarta text-gray-500 text-lg md:text-xl leading-relaxed">Membangun tulang punggung infrastruktur digital melalui konfigurasi jaringan kompleks, keamanan siber, dan manajemen server berskala industri.</p>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="300"><div class="feature-dot"></div> Network Administration</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="400"><div class="feature-dot"></div> Cybersecurity Fundamentals</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="500"><div class="feature-dot"></div> Cloud Computing Infrastructure</div>
                </div>
                <a href="{{ route('program.tjkt') }}" class="btn-explore">
                    Jelajahi Kurikulum
                    <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
                </a>
            </div>
        </div>
      </div>

      {{-- PROGRAM 4: BCF --}}
      <div class="program-card group p-6 md:p-14" data-aos="fade-up">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="flex flex-col items-start gap-8 order-2 lg:order-1">
                <span class="program-tag">BCF • Broadcasting dan Film</span>
                <h2 class="font-outfit text-4xl md:text-6xl font-black text-[#0e162e] tracking-tight leading-none">Narasikan <br><span class="highlight-orange">Kisah Epikmu.</span></h2>
                <p class="font-jakarta text-gray-500 text-lg md:text-xl leading-relaxed">Menguasai teknik sinematografi, penyutradaraan, dan pascaproduksi untuk melahirkan karya audiovisual yang memikat dan berstandar internasional.</p>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="300"><div class="feature-dot"></div> Film Production & Directing</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="400"><div class="feature-dot"></div> TV & Digital Broadcasting</div>
                    <div class="flex items-center font-jakarta font-bold text-[#0e162e] uppercase text-[11px] tracking-widest" data-aos="fade-up" data-aos-delay="500"><div class="feature-dot"></div> Professional Video Editing</div>
                </div>
                <a href="{{ route('program.bcf') }}" class="btn-explore">
                    Jelajahi Kurikulum
                    <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
                </a>
            </div>
            <div class="perspective-img rounded-[40px] overflow-hidden aspect-[4/5] bg-gray-50">
                <img src="{{ asset('assets/images/program/bcf.png') }}" alt="BCF" class="w-full h-full object-cover">
            </div>
        </div>
      </div>

    </div>
  </section>

</div>

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    if (window.initAOS) {
      window.initAOS({ duration: 1000, once: true }).catch(e => console.error(e));
    }
  });
</script>
@endpush
@endsection
