@extends('prestasiprima.index')

@section('title', 'Karya & Proyek Siswa - SMK Prestasi Prima')

@section('content')
<section class="relative min-h-screen bg-gradient-to-b from-white via-gray-50 to-white pt-36 pb-32 overflow-hidden">

  {{-- ======= Header Section ======= --}}
  <div class="text-center mb-20 px-6" data-aos="fade-down" data-aos-duration="900">
    <h1 class="text-5xl font-extrabold text-[#0e162e] mb-4 tracking-tight">
      Karya & <span class="text-orange-600">Proyek Siswa</span>
    </h1>
    <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
      Temukan ide, inovasi, dan hasil karya siswa <strong>SMK Prestasi Prima</strong> — mulai dari teknologi, desain, hingga game interaktif yang membanggakan.
    </p>
    <div class="w-24 h-1 bg-orange-600 mx-auto mt-5 rounded-full"></div>
  </div>

  {{-- ======= Project Grid ======= --}}
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
    @foreach ($projects as $project)
      <div 
        class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl border border-gray-100 hover:border-orange-500/30 overflow-hidden relative transition-all duration-500 ease-out transform hover:-translate-y-2"
        data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}"
      >
        {{-- === Image Section === --}}
        <div class="relative overflow-hidden">
          <img src="{{ $project['image'] }}" alt="Karya {{ $project['title'] }}" loading="lazy"
            class="w-full h-64 object-cover transition-transform duration-700 ease-out group-hover:scale-110">

          {{-- === Overlay Gradient === --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

          {{-- === Hover Button === --}}
          <div class="absolute bottom-5 right-5 opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0 transition-all duration-500">
            <button 
              class="bg-orange-600 text-white px-5 py-2 rounded-full font-medium shadow-lg hover:bg-orange-700 transition"
              onclick="openModal({{ $loop->index }})"
            >
              Lihat Detail
            </button>
          </div>
        </div>

        {{-- === Content Section === --}}
        <div class="p-6">
          <span class="text-xs font-semibold text-orange-600 uppercase tracking-wider">{{ $project['category'] }}</span>
          <h3 class="text-2xl font-semibold text-[#0e162e] mt-3 mb-3 group-hover:text-orange-600 transition-colors duration-300">
            {{ $project['title'] }}
          </h3>
          <p class="text-gray-600 text-sm leading-relaxed mb-5">
            {{ Str::limit($project['description'], 100) }}
          </p>

          {{-- Tags --}}
          <div class="flex flex-wrap gap-2">
            @foreach ($project['tags'] as $tag)
              <span class="px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700 hover:bg-orange-600 hover:text-white transition-all duration-300">
                {{ $tag }}
              </span>
            @endforeach
          </div>
        </div>

        {{-- Glow Effect --}}
        <div class="absolute inset-0 bg-gradient-to-br from-orange-100/0 to-orange-200/0 group-hover:from-orange-100/30 group-hover:to-orange-200/20 transition-all duration-700 pointer-events-none rounded-3xl"></div>
      </div>
    @endforeach
  </div>
</section>

{{-- ======= Image Section (Non-clickable) ======= --}}
<section class="relative w-full bg-white overflow-hidden select-none pointer-events-none mt-24">
  <img 
    src="{{ asset('assets/images/gedung/gedung.avif') }}" 
    alt="Gedung SMK Prestasi Prima"
    class="w-full h-[40vh] sm:h-[55vh] lg:h-[80vh] object-cover object-center hover:scale-[1.02] transition-transform duration-700"
  >
</section>

{{-- ======= MODAL POPUP ======= --}}
<div id="projectModal" class="hidden fixed inset-0 z-50 bg-black/70 flex items-center justify-center px-4">
  <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full relative overflow-hidden" data-aos="zoom-in">
    {{-- Close Button --}}
    <button onclick="closeModal()" class="absolute top-4 right-4 bg-gray-200 hover:bg-orange-600 hover:text-white transition p-2 rounded-full">
      ✕
    </button>

    {{-- Modal Content --}}
    <div id="modalContent" class="p-6 sm:p-10 text-center">
      {{-- Content will be inserted by JS --}}
    </div>
  </div>
</div>

{{-- ======= SCRIPT ======= --}}
<script>
  const projects = @json($projects);

  function openModal(index) {
    const modal = document.getElementById('projectModal');
    const content = document.getElementById('modalContent');
    const project = projects[index];

    content.innerHTML = `
      <h2 class="text-3xl font-bold text-[#0e162e] mb-3">${project.title}</h2>
      <p class="text-orange-600 font-semibold uppercase text-sm mb-5">${project.category}</p>
      <img src="${project.image}" alt="${project.title}" class="w-full h-64 object-cover rounded-xl mb-5">
      <p class="text-gray-700 leading-relaxed mb-6">${project.description}</p>
      <div class="flex flex-wrap justify-center gap-2 mb-6">
        ${project.tags.map(tag => `<span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded-full hover:bg-orange-600 hover:text-white transition">${tag}</span>`).join('')}
      </div>
      ${project.link && project.link !== '#' ? `
        <a href="${project.link}" target="_blank" rel="noopener noreferrer" class="inline-block bg-orange-600 text-white px-6 py-2 rounded-full font-medium hover:bg-orange-700 transition">
          Kunjungi Proyek
        </a>
      ` : ''}
    `;

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    const modal = document.getElementById('projectModal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
  }
</script>
@endsection
