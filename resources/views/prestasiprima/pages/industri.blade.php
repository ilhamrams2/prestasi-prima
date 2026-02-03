@extends('prestasiprima.index')

@section('title', 'Kemitraan Industri — Prestasi Prima')

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
    color: rgba(14, 22, 46, 0.02);
    -webkit-text-stroke: 1px rgba(14, 22, 46, 0.05);
    white-space: nowrap;
    z-index: 0;
    pointer-events: none;
    text-transform: uppercase;
  }

  .highlight-orange {
    background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  /* Marquee Styling */
  .marquee-wrapper {
    display: flex;
    overflow: hidden;
    user-select: none;
    gap: 30px;
    padding: 20px 0;
  }

  .marquee-content {
    flex-shrink: 0;
    display: flex;
    justify-content: space-around;
    gap: 30px;
    min-width: 100%;
  }

  .scroll-left {
    animation: scroll-left 50s linear infinite;
  }

  .scroll-right {
    animation: scroll-right 50s linear infinite;
  }

  @keyframes scroll-left {
    from { transform: translateX(0); }
    to { transform: translateX(calc(-100% - 30px)); }
  }

  @keyframes scroll-right {
    from { transform: translateX(calc(-100% - 30px)); }
    to { transform: translateX(0); }
  }

  .industry-card-item {
    width: 320px;
    height: 180px;
    background: #ffffff;
    border: 1px solid rgba(14, 22, 46, 0.08);
    border-radius: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 36px;
    transition: all 0.4s ease;
  }

  .industry-card-item:hover {
    border-color: var(--action-orange);
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -15px rgba(255, 107, 0, 0.15);
  }

  .logo-img-normal {
    max-height: 100px;
    width: auto;
    object-contain: contain;
    transition: transform 0.4s ease;
  }

  .industry-card-item:hover .logo-img-normal {
    transform: scale(1.05);
  }

  .marquee-wrapper:hover .marquee-content {
    animation-play-state: paused;
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-48 pb-20 px-6 bg-white relative">
    <div class="text-ghost top-24 -left-20">PARTNERS</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Strategic Alliance</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Sinergi Industri, <br>
            <span class="highlight-orange">Masa Depan Unggul.</span>
          </h1>
        </div>
      </div>
      
      <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
          SMK Prestasi Prima menjalin kemitraan strategis dengan <span class="text-charcoal font-black border-b-4 border-orange-500/20">perusahaan terkemuka</span> untuk menciptakan lulusan siap kerja berskala global.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== DYNAMIC MARQUEE ========== --}}
  <section class="py-20 bg-gray-50/30 border-y border-gray-100 overflow-hidden">
    @php
        $row1 = $industris->take(ceil($industris->count() / 2));
        $row2 = $industris->skip(ceil($industris->count() / 2));
    @endphp

    {{-- Row 1: Left --}}
    <div class="marquee-wrapper">
      <div class="marquee-content scroll-left">
        @foreach($row1 as $industri)
          <div class="industry-card-item">
            @if($industri->logo)
              <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="logo-img-normal">
            @else
              <span class="text-deep-navy font-bold opacity-30">{{ $industri->nama }}</span>
            @endif
          </div>
        @endforeach
      </div>
      {{-- Duplicate for seamless loop --}}
      <div class="marquee-content scroll-left">
        @foreach($row1 as $industri)
          <div class="industry-card-item">
             @if($industri->logo)
              <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="logo-img-normal">
            @else
              <span class="text-deep-navy font-bold opacity-30">{{ $industri->nama }}</span>
            @endif
          </div>
        @endforeach
      </div>
    </div>

    {{-- Row 2: Right --}}
    <div class="marquee-wrapper mt-4">
      <div class="marquee-content scroll-right">
        @foreach($row2 as $industri)
          <div class="industry-card-item">
            @if($industri->logo)
              <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="logo-img-normal">
            @else
              <span class="text-deep-navy font-bold opacity-30">{{ $industri->nama }}</span>
            @endif
          </div>
        @endforeach
      </div>
      {{-- Duplicate for seamless loop --}}
      <div class="marquee-content scroll-right">
        @foreach($row2 as $industri)
          <div class="industry-card-item">
             @if($industri->logo)
              <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="logo-img-normal">
            @else
              <span class="text-deep-navy font-bold opacity-30">{{ $industri->nama }}</span>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ========== CTA SECTION ========== --}}
  <div class="py-24 px-6">
    <div class="max-w-7xl mx-auto text-center" data-aos="zoom-in">
        <div class="inline-block p-12 rounded-[3.5rem] bg-white shadow-2xl shadow-gray-200/50 border border-gray-100 max-w-3xl relative overflow-hidden">
          <div class="relative z-10">
            <h3 class="font-outfit text-3xl font-black text-[#0e162e] mb-4">Ingin berkolaborasi bersama kami?</h3>
            <p class="font-jakarta text-gray-500 mb-8 max-w-xl mx-auto text-lg leading-relaxed">
              Jadilah bagian dari ekosistem pendidikan kami dan bentuk masa depan talenta digital Indonesia bersama-sama.
            </p>
            <a href="https://wa.me/6285195928886?text=Halo%20SMK%20Prestasi%20Prima,%20saya%20tertarik%20untuk%20bekerja%20sama%20sebagai%20mitra%20industri." target="_blank" class="inline-flex items-center gap-3 px-8 py-4 bg-[#25D366] text-white font-outfit font-bold rounded-2xl transition-all hover:scale-105 hover:shadow-2xl hover:shadow-green-500/30">
              <iconify-icon icon="logos:whatsapp-icon" class="text-2xl"></iconify-icon>
              Ajukan Kemitraan via WA
            </a>
          </div>
        </div>
    </div>
  </div>

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
