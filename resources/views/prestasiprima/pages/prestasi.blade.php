@extends('prestasiprima.index')

@section('title', 'Hall of Fame — Prestasi Siswa SMK Prestasi Prima')

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
  }

  .highlight-orange {
    background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  [x-cloak] { display: none !important; }
</style>
@endpush

@section('content')
<div class="bg-white min-h-screen pb-32 overflow-hidden" 
     x-data="{ 
        modalOpen: false,
        modalImg: '',
        modalTitle: '',
        openModal(img, title) {
            this.modalImg = img;
            this.modalTitle = title;
            this.modalOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.modalOpen = false;
            document.body.style.overflow = '';
        }
     }">

    {{-- ========== HERO SECTION ========== --}}
    <section class="pt-48 pb-20 px-6 bg-white relative">
        <!-- Ghost Background Text -->
        <div class="text-ghost top-24 -left-20">AWARDS</div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                    </span>
                    <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Wall of Fame</span>
                </div>
            </div>

            <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
                <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
                    <h1 class="font-outfit text-mask-hero">
                        Puncak Kejayaan, <br>
                        <span class="highlight-orange">Prestasi Tanpa Batas.</span>
                    </h1>
                </div>
            </div>
            
            <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
                <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
                    Dedikasi dan kerja keras siswa <span class="text-charcoal font-black border-b-4 border-orange-500/20">SMK Prestasi Prima</span> terukir dalam setiap medali dan penghargaan yang membanggakan.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== MAIN GRID ====================== --}}
    <section class="relative z-10 py-12 px-6 bg-gray-50/50">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach ($prestasis as $i => $item)
                    <div class="group relative" 
                         data-aos="fade-up" 
                         data-aos-delay="{{ ($i % 4) * 100 }}">
                        
                        <div class="relative aspect-[4/5] bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-sm transition-all duration-700 hover:shadow-2xl hover:shadow-orange-200 group-hover:-translate-y-2 cursor-pointer"
                             @click="openModal('{{ asset('storage/' . $item->gambar) }}', '{{ $item->judul }}')">
                            
                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center gap-4">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center text-white border border-white/30 transform scale-50 group-hover:scale-100 transition-all duration-500">
                                    <iconify-icon icon="solar:magnifer-zoom-in-bold" class="text-2xl"></iconify-icon>
                                </div>
                                <a href="{{ asset('storage/' . $item->gambar) }}" 
                                   download 
                                   @click.stop 
                                   class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center text-white shadow-xl transform scale-50 group-hover:scale-100 transition-all duration-500 delay-75 hover:bg-orange-700">
                                    <iconify-icon icon="solar:download-square-bold" class="text-2xl"></iconify-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== LIGHTBOX MODAL ====================== --}}
    <div x-show="modalOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-deep-navy/95 backdrop-blur-2xl"
         @keydown.escape.window="closeModal()">
        
        <div class="relative flex flex-col items-center w-[90vw] max-w-[500px]" @click.away="closeModal()">
            <!-- Close Button -->
            <button @click="closeModal()" class="absolute -top-16 right-0 flex items-center gap-3 group/close z-[110]">
                <span class="text-white text-[10px] font-black uppercase tracking-[0.2em] opacity-80 group-hover/close:opacity-100 transition-all">Tutup</span>
                <div class="w-12 h-12 bg-orange-600 text-white rounded-full flex items-center justify-center shadow-2xl transition-all group-hover/close:scale-110 group-hover/close:bg-white group-hover/close:text-orange-600 group-hover/close:rotate-90">
                    <iconify-icon icon="solar:close-circle-bold" class="text-2xl"></iconify-icon>
                </div>
            </button>

            <div class="bg-white p-4 rounded-[3.5rem] shadow-3xl w-full">
                <div class="relative aspect-[4/5] w-full overflow-hidden rounded-[2.5rem] bg-gray-50">
                    <img :src="modalImg" class="w-full h-full object-cover">
                </div>
                
                <div class="mt-6">
                    <a :href="modalImg" 
                       download 
                       class="w-full h-16 bg-[#FF6B00] hover:bg-orange-700 text-white rounded-2xl font-outfit font-bold uppercase tracking-[0.2em] text-xs flex items-center justify-center gap-3 shadow-lg transition-all hover:scale-[1.02] active:scale-[0.98]">
                        <iconify-icon icon="solar:download-square-bold" class="text-2xl"></iconify-icon>
                        Download Sertifikat
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
