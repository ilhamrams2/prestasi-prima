@extends('prestasiprima.index')

@section('title', 'Karya & Proyek Siswa — SMK Prestasi Prima')

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

  .project-card {
    background: #FFFFFF;
    border-radius: 40px;
    border: 1px solid rgba(14, 22, 46, 0.05);
    transition: all 0.6s cubic-bezier(0.22, 1, 0.36, 1);
  }

  .project-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 40px 80px -20px rgba(14, 22, 46, 0.12);
    border-color: rgba(255, 107, 0, 0.2);
  }

  .tag-pill {
    padding: 6px 16px;
    border-radius: 12px;
    background: #f8f9fa;
    color: #6c757d;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: all 0.3s ease;
  }

  .project-card:hover .tag-pill {
    background: rgba(255, 107, 0, 0.1);
    color: var(--action-orange);
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-48 pb-20 px-6 bg-white relative">
    <!-- Ghost Background Text -->
    <div class="text-ghost top-24 -left-20">WORKS</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Innovation Hub</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Karya Kreatif, <br>
            <span class="highlight-orange">Inovasi Mendatang.</span>
          </h1>
        </div>
      </div>
      
      <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
          Eksplorasi ide, teknologi, dan dedikasi siswa <span class="text-charcoal font-black border-b-4 border-orange-500/20">SMK Prestasi Prima</span> dalam menciptakan solusi digital dan karya seni inspiratif.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== PROJECT GRID ========== --}}
  <section class="py-24 px-6 bg-[#fcfcfd] border-y border-gray-50">
    <div class="max-w-7xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach ($projects as $project)
          @php
            $tagsArr = $project->tags ? explode(',', $project->tags) : [];
          @endphp
          <div class="project-card group overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            {{-- Image container with zoom effect --}}
            <div class="relative h-[280px] overflow-hidden rounded-t-[40px]">
              @if($project->gambar)
                <img src="{{ asset('storage/karya/' . $project->gambar) }}" alt="{{ $project->judul }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
              @else
                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                    <i class="ri-image-line text-6xl"></i>
                </div>
              @endif
              <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
              
              {{-- Category Badge --}}
              <div class="absolute top-6 left-6 px-4 py-2 bg-white/90 backdrop-blur-md rounded-2xl shadow-sm">
                <span class="font-outfit text-[10px] font-black text-orange-600 uppercase tracking-widest">{{ $project->kategori }}</span>
              </div>
            </div>

            <div class="p-10">
              <h3 class="font-outfit text-2xl font-black text-[#0e162e] mb-4 group-hover:text-orange-600 transition-colors">{{ $project->judul }}</h3>
              <p class="font-jakarta text-gray-500 text-base leading-relaxed mb-8 line-clamp-3">
                {{ $project->deskripsi }}
              </p>

              <div class="flex flex-wrap gap-2 mb-8">
                @foreach ($tagsArr as $tag)
                  <span class="tag-pill">{{ trim($tag) }}</span>
                @endforeach
              </div>

              <button onclick="openModal({{ $loop->index }})" class="inline-flex items-center gap-4 text-[#0e162e] font-outfit font-black text-sm uppercase tracking-widest group/btn hover:text-orange-600 transition-colors">
                View Project Details
                <div class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center transition-all group-hover/btn:bg-orange-600 group-hover/btn:border-orange-600 group-hover/btn:text-white group-hover/btn:translate-x-2">
                  <iconify-icon icon="lucide:arrow-right" class="text-lg"></iconify-icon>
                </div>
              </button>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- ========== FULL WIDTH BANNER ========== --}}
  <section class="relative py-32 px-6">
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="relative rounded-[60px] overflow-hidden shadow-3xl group" data-aos="zoom-in">
            <img src="{{ asset('assets/images/gedung/gedung.avif') }}" 
                 alt="SMK Prestasi Prima" 
                 class="w-full h-[65vh] object-cover transform transition-transform duration-1000 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-[#FF6B00]/80 via-[#FF6B00]/20 to-transparent flex flex-col justify-end p-12 md:p-24">
                <div class="max-w-2xl">
                    <h3 class="font-outfit text-white text-5xl md:text-7xl font-black mb-8 leading-[0.9]">Mulai Langkah Inovasimu Sekarang.</h3>
                    <a href="{{ route('pendaftaran') }}" class="inline-flex items-center gap-4 px-10 py-5 bg-white text-orange-600 font-outfit font-black text-sm uppercase tracking-widest rounded-3xl shadow-2xl hover:bg-[#0e162e] hover:text-white transition-all transform hover:scale-105">
                        Daftar Sebagai Siswa Baru
                        <iconify-icon icon="lucide:arrow-right-circle" class="text-2xl"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
  </section>

</div>

{{-- ========== MODAL POPUP ========== --}}
<div id="projectModal" class="hidden fixed inset-0 z-[100] bg-black/95 backdrop-blur-2xl flex items-center justify-center p-6" x-data x-cloak>
  <div class="bg-white rounded-[4rem] shadow-2xl max-w-4xl w-full relative overflow-hidden" data-aos="zoom-in">
    {{-- Close Button --}}
    <button onclick="closeModal()" class="absolute top-8 right-8 w-14 h-14 bg-gray-50 text-gray-900 rounded-full flex items-center justify-center hover:bg-orange-600 hover:text-white transition-all z-20 group">
      <iconify-icon icon="lucide:x" class="text-2xl group-hover:rotate-90 transition-transform"></iconify-icon>
    </button>

    {{-- Modal Content Scrollable Area --}}
    <div class="max-h-[85vh] overflow-y-auto custom-scrollbar">
        <div id="modalContent" class="p-10 md:p-20">
            {{-- Content will be inserted by JS --}}
        </div>
    </div>
  </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }

    [x-cloak] { display: none !important; }
</style>

{{-- ======= SCRIPT ======= --}}
<script>
  const projects = @json($projects);

  function openModal(index) {
    const modal = document.getElementById('projectModal');
    const content = document.getElementById('modalContent');
    const project = projects[index];
    const tagsArr = project.tags ? project.tags.split(',') : [];
    const imageUrl = project.gambar ? `/storage/karya/${project.gambar}` : '';

    content.innerHTML = `
      <div class="flex flex-col gap-10">
        <div class="flex flex-col gap-4">
            <span class="font-outfit text-xs font-black text-orange-600 uppercase tracking-[0.3em]">${project.kategori}</span>
            <h2 class="font-outfit text-4xl md:text-6xl font-black text-[#0e162e] tracking-tight leading-none">${project.judul}</h2>
        </div>
        
        <div class="relative h-[400px] overflow-hidden rounded-[3rem]">
            ${imageUrl ? `<img src="${imageUrl}" alt="${project.judul}" class="w-full h-full object-cover">` : '<div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-300"><i class="ri-image-line text-6xl"></i></div>'}
        </div>

        <div class="grid md:grid-cols-3 gap-12">
            <div class="md:col-span-2">
                <h4 class="font-outfit text-xl font-black text-[#0e162e] mb-4">About Project</h4>
                <p class="font-jakarta text-gray-500 text-lg leading-relaxed">${project.deskripsi}</p>
            </div>
            <div>
                <h4 class="font-outfit text-xl font-black text-[#0e162e] mb-4">Technologies</h4>
                <div class="flex flex-wrap gap-2">
                    ${tagsArr.map(tag => `<span class="px-4 py-2 bg-gray-50 text-gray-500 font-jakarta font-bold text-sm rounded-xl border border-gray-100">${tag.trim()}</span>`).join('')}
                </div>
                ${project.link && project.link !== '#' ? `
                    <div class="mt-8">
                        <a href="${project.link}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 px-8 py-4 bg-[#0e162e] text-white font-outfit font-bold rounded-2xl w-full justify-center transition-all hover:bg-orange-600 hover:shadow-xl hover:shadow-orange-500/20">
                            Visit Project
                            <iconify-icon icon="lucide:external-link" class="text-xl"></iconify-icon>
                        </a>
                    </div>
                ` : ''}
            </div>
        </div>
      </div>
    `;

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    const modal = document.getElementById('projectModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (window.initAOS) {
      window.initAOS({ duration: 1000, once: true }).catch(e => console.error(e));
    }
  });
</script>
@endsection
