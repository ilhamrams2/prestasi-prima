@extends('prestasiprima.index')

@section('title', 'Program Keahlian')

@section('content')
<section class="relative overflow-hidden pt-28 md:pt-36 pb-24 bg-gradient-to-b from-white via-orange-50/40 to-[#fefefe]">
  {{-- ======= Ornamen Latar Menyilang ======= --}}
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute -top-20 -left-32 w-[30rem] h-[30rem] bg-[#0e162e]/5 rotate-12 rounded-3xl blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-[25rem] h-[25rem] bg-orange-400/10 -rotate-12 rounded-3xl blur-2xl"></div>
    <div class="absolute top-1/2 left-1/2 w-[50rem] h-[50rem] bg-gradient-to-r from-orange-100/30 to-[#0e162e]/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 md:px-12 text-center relative z-10">
    
    <!-- ============ HEADER ============ -->
    <div class="mb-20">
      <h2 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight">
        <span class="text-[#0e162e] relative after:absolute after:bottom-0 after:left-0 after:w-full after:h-[3px] after:bg-orange-500/70 after:rounded-full after:translate-y-2">
          Program
        </span>
        <span class="text-orange-600 ml-2">Keahlian</span>
      </h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
        SMK Prestasi Prima memiliki berbagai program keahlian unggulan yang siap membentuk generasi profesional, kreatif, dan berdaya saing tinggi di dunia kerja modern.
      </p>
    </div>

    <!-- ============ DAFTAR PROGRAM ============ -->
    <div class="space-y-24">

      {{-- ===== RPL ===== --}}
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div class="relative group">
          <div class="absolute inset-0 bg-gradient-to-tr from-orange-500/10 to-[#0e162e]/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500"></div>
          <img src="{{ asset('assets/images/section/program/pplg.png') }}" alt="RPL"
            class="relative rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 group-hover:scale-105">
        </div>
        <div class="text-left">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/pplg.png') }}" alt="Icon RPL" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">
              Rekayasa <span class="text-orange-600">Perangkat Lunak</span>
            </h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Mempelajari pembuatan aplikasi berbasis web, mobile, dan desktop dengan teknologi terkini.
          </p>
          <button onclick="openModal('modalRPL')" 
            class="inline-block bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:scale-105 transition-all duration-300">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

      {{-- ===== TJKT ===== --}}
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div class="md:order-2 relative group">
          <div class="absolute inset-0 bg-gradient-to-tl from-[#0e162e]/10 to-orange-400/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500"></div>
          <img src="{{ asset('assets/images/section/program/tkj.png') }}" alt="TJKT"
            class="relative rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 group-hover:scale-105">
        </div>
        <div class="text-left md:order-1">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/tkj.png') }}" alt="Icon TJKT" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">
              Teknik <span class="text-orange-600">Jaringan Komputer & Telekomunikasi</span>
            </h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Belajar membangun dan mengelola jaringan komputer, server, serta sistem keamanan data.
          </p>
          <button onclick="openModal('modalTJKT')" 
            class="inline-block bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:scale-105 transition-all duration-300">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

      {{-- ===== DKV ===== --}}
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div class="relative group">
          <div class="absolute inset-0 bg-gradient-to-tr from-[#0e162e]/10 to-orange-400/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500"></div>
          <img src="{{ asset('assets/images/section/program/dkv.png') }}" alt="DKV"
            class="relative rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 group-hover:scale-105">
        </div>
        <div class="text-left">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/dkv.png') }}" alt="Icon DKV" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">
              Desain <span class="text-orange-600">Komunikasi Visual</span>
            </h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Fokus pada desain grafis, multimedia, dan komunikasi visual kreatif untuk berbagai media.
          </p>
          <button onclick="openModal('modalDKV')" 
            class="inline-block bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:scale-105 transition-all duration-300">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

      {{-- ===== BCF ===== --}}
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div class="md:order-2 relative group">
          <div class="absolute inset-0 bg-gradient-to-tl from-orange-400/10 to-[#0e162e]/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition duration-500"></div>
          <img src="{{ asset('assets/images/section/program/bcf.png') }}" alt="BCF"
            class="relative rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 group-hover:scale-105">
        </div>
        <div class="text-left md:order-1">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/bcf.png') }}" alt="Icon BCF" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">
              Broadcasting <span class="text-orange-600">& Cinematography</span>
            </h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Mempelajari produksi siaran televisi, sinematografi, editing video, dan komunikasi visual audio untuk berbagai media kreatif.
          </p>
          <button onclick="openModal('modalBCF')" 
            class="inline-block bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:scale-105 transition-all duration-300">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ==================== MODAL PROGRAM ==================== --}}
<div id="modalRPL" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-6">
  <div class="bg-white rounded-2xl max-w-lg w-full shadow-2xl p-8 relative">
    <button onclick="closeModal('modalRPL')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600 text-2xl">&times;</button>
    <h3 class="text-2xl font-bold text-orange-600 mb-4">Rekayasa Perangkat Lunak</h3>
    <p class="text-gray-700 leading-relaxed">
      Program RPL membekali siswa dengan kemampuan membuat aplikasi berbasis web, mobile, dan desktop menggunakan teknologi modern seperti JavaScript, PHP, dan Framework populer.
    </p>
  </div>
</div>

<div id="modalTJKT" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-6">
  <div class="bg-white rounded-2xl max-w-lg w-full shadow-2xl p-8 relative">
    <button onclick="closeModal('modalTJKT')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600 text-2xl">&times;</button>
    <h3 class="text-2xl font-bold text-orange-600 mb-4">Teknik Jaringan Komputer & Telekomunikasi</h3>
    <p class="text-gray-700 leading-relaxed">
      Program ini memfokuskan pada penguasaan jaringan komputer, konfigurasi server, dan keamanan jaringan agar siswa siap menjadi teknisi jaringan profesional.
    </p>
  </div>
</div>

<div id="modalDKV" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-6">
  <div class="bg-white rounded-2xl max-w-lg w-full shadow-2xl p-8 relative">
    <button onclick="closeModal('modalDKV')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600 text-2xl">&times;</button>
    <h3 class="text-2xl font-bold text-orange-600 mb-4">Desain Komunikasi Visual</h3>
    <p class="text-gray-700 leading-relaxed">
      Program DKV mengajarkan siswa tentang desain grafis, multimedia, fotografi, dan komunikasi visual yang kreatif untuk dunia digital modern.
    </p>
  </div>
</div>

<div id="modalBCF" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-6">
  <div class="bg-white rounded-2xl max-w-lg w-full shadow-2xl p-8 relative">
    <button onclick="closeModal('modalBCF')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600 text-2xl">&times;</button>
    <h3 class="text-2xl font-bold text-orange-600 mb-4">Broadcasting & Cinematography</h3>
    <p class="text-gray-700 leading-relaxed">
      Program ini melatih siswa dalam produksi siaran, sinematografi, editing, dan komunikasi visual berbasis audio visual modern.
    </p>
  </div>
</div>

{{-- ==================== ANIMASI & SCRIPT ==================== --}}
@push('scripts')
<script>
  function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  }
  function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  }

  document.addEventListener("DOMContentLoaded", () => {
    const faders = document.querySelectorAll(".fade-in-up");
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });
    faders.forEach(fader => observer.observe(fader));
  });
</script>

<style>
.fade-in-up { opacity: 0; transform: translateY(40px); transition: all 0.8s ease; }
.fade-in-up.show { opacity: 1; transform: translateY(0); }
</style>
@endpush
@endsection
