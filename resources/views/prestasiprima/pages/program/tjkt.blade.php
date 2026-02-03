@extends('prestasiprima.index')

@section('title', 'TJKT — Teknik Jaringan Komputer dan Telekomunikasi')

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
    font-size: clamp(2.5rem, 8vw, 6rem);
    font-weight: 950;
    line-height: 0.95;
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
    color: rgba(14, 22, 46, 0.02);
    -webkit-text-stroke: 1px rgba(14, 22, 46, 0.05);
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

  .dev-window {
    background: #0f172a;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    overflow: hidden;
  }

  .dev-header {
    background: rgba(255, 255, 255, 0.05);
    padding: 12px 20px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .dot { width: 10px; height: 10px; border-radius: 50%; }
  .dot-red { background: #ff5f56; }
  .dot-yellow { background: #ffbd2e; }
  .dot-green { background: #27c93f; }

  .career-card {
    background: white;
    border: 1px solid rgba(14, 22, 46, 0.05);
    border-radius: 32px;
    transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .career-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 30px 60px -12px rgba(14, 22, 46, 0.1);
    border-color: var(--action-orange);
  }

  .grid-bg {
    background-image: radial-gradient(rgba(14, 22, 46, 0.05) 1px, transparent 1px);
    background-size: 40px 40px;
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-48 pb-20 px-6 bg-white relative grid-bg">
    <!-- Ghost Background Text -->
    <div class="text-ghost top-24 -left-20">NETWORK</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-12" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">TJKT SPECIALIZATION</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div data-aos="fade-right" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Jaringan <br>
            <span class="highlight-orange">& Telekomunikasi.</span>
          </h1>
          <p class="mt-8 font-jakarta text-gray-500 text-lg md:text-xl leading-relaxed max-w-xl">
            Menghubungkan dunia melalui infrastruktur digital. Kami membentuk teknisi profesional yang mahir dalam perancangan, implementasi, dan pengelolaan jaringan komputer serta sistem telekomunikasi modern.
          </p>
          <div class="mt-10 flex flex-wrap gap-4">
            <a href="#about" class="px-8 py-4 bg-[#0e162e] text-white font-outfit font-bold rounded-2xl hover:bg-orange-600 transition-all transform hover:scale-105">
                Mulai Eksplorasi
            </a>
            <div class="flex items-center gap-3 px-6 py-4 rounded-2xl border border-gray-100 bg-gray-50/50">
               <iconify-icon icon="lucide:network" class="text-2xl text-orange-600"></iconify-icon>
               <span class="font-jakarta font-bold text-[#0e162e] text-sm tracking-tight text-nowrap">Network Infrastructure</span>
            </div>
          </div>
        </div>
        
        <div class="relative" data-aos="fade-left" data-aos-delay="200">
            <div class="relative rounded-[3rem] overflow-hidden shadow-2xl">
                <img src="{{ asset('assets/images/program/tjkt.png') }}" alt="TJKT Hero" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#0e162e]/40 to-transparent"></div>
            </div>
            <!-- Floating Badge -->
            <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-[2rem] shadow-2xl border border-gray-50 flex items-center gap-4 animate-bounce-slow">
                <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center">
                    <iconify-icon icon="lucide:wifi" class="text-2xl text-orange-600"></iconify-icon>
                </div>
                <div>
                    <div class="font-outfit font-black text-[#0e162e] text-lg">99.9% Uptime</div>
                    <div class="font-jakarta text-xs text-gray-400 font-bold">Network Reliability</div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ========== ABOUT & DEV WINDOW ========== --}}
  <section id="about" class="py-32 px-6 bg-[#fcfcfd] border-y border-gray-50 relative">
    <div class="max-w-7xl mx-auto">
      <div class="grid lg:grid-cols-2 gap-20 items-center">
        <div data-aos="fade-up">
            <span class="font-outfit text-xs font-black text-orange-600 uppercase tracking-[0.3em] mb-4 block">Deep Dive</span>
            <h2 class="font-outfit text-4xl md:text-6xl font-black text-[#0e162e] tracking-tight leading-none mb-8">
                Membangun Infrastruktur <br><span class="highlight-orange">Digital Global.</span>
            </h2>
            <p class="font-jakarta text-gray-500 text-lg leading-relaxed mb-8">
                Program Keahlian Teknik Jaringan Komputer dan Telekomunikasi (TJKT) berfokus pada penguasaan teknologi jaringan berbasis kabel maupun nirkabel, perangkat server, konfigurasi sistem, hingga keamanan jaringan (network security).
            </p>
            
            <div class="space-y-4">
                @foreach(['Network Design & Implementation', 'Server Administration', 'Cybersecurity & Monitoring'] as $item)
                <div class="flex items-center gap-4 group">
                    <div class="w-10 h-10 rounded-xl bg-white border border-gray-100 flex items-center justify-center group-hover:bg-orange-600 group-hover:border-orange-600 transition-all">
                        <iconify-icon icon="lucide:check" class="text-orange-600 group-hover:text-white transition-colors"></iconify-icon>
                    </div>
                    <span class="font-jakarta font-bold text-[#0e162e] text-sm uppercase tracking-widest">{{ $item }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="dev-window" data-aos="zoom-in" data-aos-delay="200">
            <div class="dev-header">
                <div class="dot dot-red"></div>
                <div class="dot dot-yellow"></div>
                <div class="dot dot-green"></div>
                <span class="text-xs font-mono text-gray-400 ml-4">~/prestasiprima/tjkt/network.js</span>
            </div>
            <div class="p-8 font-mono text-sm leading-loose">
                <div class="text-gray-500">// Initialize the next generation of network engineers</div>
                <div class="text-white"><span class="text-pink-500">const</span> <span class="text-blue-400">TJKT</span> = {</div>
                <div class="pl-6 text-white">skills: [<span class="text-green-400">'Networking'</span>, <span class="text-green-400">'Server'</span>, <span class="text-green-400">'Security'</span>],</div>
                <div class="pl-6 text-white">industry_ready: <span class="text-orange-400">true</span>,</div>
                <div class="pl-6 text-white">connectivity: <span class="text-orange-400">Infinity</span>,</div>
                <div class="pl-6 text-white">buildNetwork: () => {</div>
                <div class="pl-12 text-blue-300">return <span class="text-yellow-400">"Connected"</span>;</div>
                <div class="pl-6 text-white">}</div>
                <div class="text-white">};</div>
                <div class="mt-6 text-orange-400 shadow-orange-500/20 shadow-xl inline-block bg-orange-500/10 px-4 py-2 rounded-lg">&gt; TJKT.buildNetwork()</div>
                <div class="mt-2 text-green-400">"Connected"</div>
            </div>
        </div>
      </div>

      {{-- Kapro Card --}}
      <div class="mt-32 flex flex-col md:flex-row items-center gap-12 bg-white p-12 rounded-[3.5rem] shadow-xl border border-gray-50" data-aos="fade-up">
        <img src="{{ asset('assets/images/staff/kapro3.jpg') }}" alt="Kapro TJKT" class="w-48 h-64 object-cover rounded-[2.5rem] shadow-2xl">
        <div>
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 text-orange-600 font-outfit font-black text-[10px] uppercase tracking-widest mb-4">
                <iconify-icon icon="lucide:user"></iconify-icon> Kepala Program
            </div>
            <h3 class="font-outfit text-3xl font-black text-[#0e162e] mb-4">Sopan Sopari, S.Kom.</h3>
            <p class="font-jakarta text-gray-500 text-lg italic leading-relaxed max-w-2xl">
                "Kami mencetak lulusan yang siap menjadi profesional di bidang jaringan, telekomunikasi, dan keamanan sistem informasi global dengan standar industri internasional."
            </p>
        </div>
      </div>
    </div>
  </section>

  {{-- ========== PROSPEK KARIR ========== --}}
  <section class="py-32 px-6 bg-[#0e162e] relative overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-600 blur-[150px] rounded-full"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600 blur-[150px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10 text-center mb-20">
        <span class="font-outfit text-xs font-black text-white/50 uppercase tracking-[0.3em] mb-4 block">Future Careers</span>
        <h2 class="font-outfit text-4xl md:text-6xl font-black text-white tracking-tight leading-none">
            Jejak Langkah <span class="highlight-orange">Profesional.</span>
        </h2>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
      @foreach([
        ['lucide:router', 'Network Administrator', 'Mengelola dan memelihara infrastruktur jaringan perusahaan.'],
        ['lucide:wifi', 'Network Engineer', 'Merancang dan mengimplementasikan solusi jaringan kompleks.'],
        ['lucide:server', 'Server Administrator', 'Mengelola server dan layanan infrastruktur IT.'],
        ['lucide:shield', 'Cyber Security Analyst', 'Melindungi sistem dari ancaman keamanan siber.'],
        ['lucide:radio', 'Teknisi Telekomunikasi', 'Menangani instalasi dan pemeliharaan sistem telekomunikasi.'],
        ['lucide:cpu', 'IT Support Specialist', 'Memberikan dukungan teknis untuk pengguna dan sistem.'],
      ] as [$icon, $title, $desc])
        <div class="bg-white/5 backdrop-blur-md border border-white/10 p-10 rounded-[2.5rem] hover:bg-white/10 transition-all group overflow-hidden" data-aos="fade-up">
            <div class="w-14 h-14 bg-orange-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                <iconify-icon icon="{{ $icon }}" class="text-3xl text-white"></iconify-icon>
            </div>
            <h4 class="font-outfit text-xl font-black text-white mb-4">{{ $title }}</h4>
            <p class="font-jakarta text-white/60 text-sm leading-relaxed">{{ $desc }}</p>
            <div class="mt-8 flex items-center gap-3 text-orange-400 font-outfit font-black text-[10px] uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all translate-y-4 group-hover:translate-y-0">
  
            </div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- ========== TOOLS EQUIPMENT ========== --}}
  <section class="py-24 bg-white border-b border-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 text-center mb-20">
        <h3 class="font-outfit text-xl font-black text-[#0e162e] uppercase tracking-[0.3em]">Network Equipment & Tools</h3>
    </div>
    
    <div class="flex flex-col gap-4 md:gap-8">
        {{-- Row 1: Tech Group A (1-5) --}}
        <div class="relative overflow-hidden">
          <div class="flex gap-6 md:gap-10 w-max animate-marquee py-4">
            @for ($k = 0; $k < 4; $k++)
              @for ($i = 1; $i <= 5; $i++)
                <div class="flex-shrink-0 w-48 md:w-64 h-28 md:h-36 flex items-center justify-center bg-white rounded-[1.5rem] md:rounded-[2rem] shadow-sm border border-gray-100 hover:border-orange-200 transition-all hover:shadow-xl group">
                  <img src="{{ asset('assets/images/program/tjkt/logo (' . $i . ').png') }}" 
                       alt="Tech {{ $i }}" 
                       class="max-h-14 md:max-h-20 grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-110">
                </div>
              @endfor
            @endfor
          </div>
        </div>

        {{-- Row 2: Tech Group B (6-10) --}}
        <div class="relative overflow-hidden">
          <div class="flex gap-6 md:gap-10 w-max animate-marquee-reverse py-4">
            @for ($k = 0; $k < 4; $k++)
              @for ($i = 6; $i <= 10; $i++)
                <div class="flex-shrink-0 w-48 md:w-64 h-28 md:h-36 flex items-center justify-center bg-white rounded-[1.5rem] md:rounded-[2rem] shadow-sm border border-gray-100 hover:border-orange-200 transition-all hover:shadow-xl group">
                  <img src="{{ asset('assets/images/program/tjkt/logo (' . $i . ').png') }}" 
                       alt="Tech {{ $i }}" 
                       class="max-h-14 md:max-h-20 grayscale opacity-40 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-110">
                </div>
              @endfor
            @endfor
          </div>
        </div>
    </div>
  </section>

  {{-- ========== JOURNEY, TOUR, FAQ ========== --}}
  <div class="bg-[#fcfcfd]">
    @include('prestasiprima.pages.program.journey', ['program' => 'tjkt'])
  </div>
  
  <div class="bg-white">
    @include('prestasiprima.pages.program.tour', ['program' => 'tjkt'])
  </div>

  <div class="bg-[#fcfcfd]">
    @include('prestasiprima.pages.program.faq', ['jurusan' => 'tjkt'])
  </div>

</div>

<style>
    @keyframes drift { from { transform: translateX(-50px) translateY(0); } to { transform: translateX(50px) translateY(-30px); } }
    @keyframes marquee { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    @keyframes marquee-reverse { 0% { transform: translateX(-50%); } 100% { transform: translateX(0); } }
    
    .animate-marquee { animation: marquee 40s linear infinite; }
    .animate-marquee-reverse { animation: marquee-reverse 40s linear infinite; }
    
    @media (max-width: 768px) {
        .animate-marquee { animation: marquee 20s linear infinite; }
        .animate-marquee-reverse { animation: marquee-reverse 20s linear infinite; }
    }

    .animate-bounce-slow { animation: bounce 3s infinite; }
    @keyframes bounce { 0%, 100% { transform: translateY(-5%); animation-timing-function: cubic-bezier(0.8,0,1,1); } 50% { transform: none; animation-timing-function: cubic-bezier(0,0,0.2,1); } }
</style>

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
