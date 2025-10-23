@extends('prestasiprima.index')

@section('title', 'Program Keahlian')

@section('content')
<section class="bg-white relative z-10 pt-28 md:pt-36 pb-24 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-12 text-center">
    
    <!-- ============ HEADER ============ -->
    <div class="mb-20">
      <h2 class="text-4xl md:text-5xl font-bold text-[#0e162e] mb-4">Program Keahlian</h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">SMK Prestasi Prima memiliki berbagai program keahlian unggulan yang siap membentuk generasi profesional, kreatif, dan berdaya saing di dunia kerja.</p>
    </div>

    <!-- ============ DAFTAR PROGRAM ============ -->
    <div class="space-y-24">
      
      <!-- ===== RPL ===== -->
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div>
          <img src="{{ asset('assets/images/section/program/pplg.png') }}" alt="RPL" class="rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 hover:scale-105">
        </div>
        <div class="text-left">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/pplg.png') }}" alt="Icon RPL" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">Rekayasa Perangkat Lunak</h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Mempelajari pembuatan aplikasi berbasis web, mobile, dan desktop dengan teknologi terkini.
          </p>
          <button onclick="openModal('modalRPL')" class="inline-block bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-orange-700 transition-all">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

      <!-- ===== TJKT ===== -->
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div class="md:order-2">
          <img src="{{ asset('assets/images/section/program/tkj.png') }}" alt="TJKT" class="rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 hover:scale-105">
        </div>
        <div class="text-left md:order-1">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/tkj.png') }}" alt="Icon TJKT" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">Teknik Jaringan Komputer dan Telekomunikasi</h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Belajar membangun dan mengelola jaringan komputer, server, serta sistem keamanan data.
          </p>
          <button onclick="openModal('modalTJKT')" class="inline-block bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-orange-700 transition-all">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

      <!-- ===== DKV ===== -->
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div>
          <img src="{{ asset('assets/images/section/program/dkv.png') }}" alt="DKV" class="rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 hover:scale-105">
        </div>
        <div class="text-left">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/dkv.png') }}" alt="Icon DKV" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">Desain Komunikasi Visual</h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Fokus pada desain grafis, multimedia, dan komunikasi visual kreatif untuk berbagai media.
          </p>
          <button onclick="openModal('modalDKV')" class="inline-block bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-orange-700 transition-all">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

      <!-- ===== BCF ===== -->
      <div class="grid md:grid-cols-2 gap-12 items-center fade-in-up">
        <div class="md:order-2">
          <img src="{{ asset('assets/images/section/program/bcf.png') }}" alt="BCF" class="rounded-2xl shadow-lg w-full h-72 md:h-96 object-cover border-4 border-orange-100 transition-transform duration-500 hover:scale-105">
        </div>
        <div class="text-left md:order-1">
          <div class="flex items-center gap-3 mb-4">
            <img src="{{ asset('assets/images/section/program/icons/bcf.png') }}" alt="Icon BCF" class="w-12 h-12">
            <h3 class="text-3xl font-semibold text-[#0e162e]">Broadcasting & Cinematography</h3>
          </div>
          <p class="text-gray-700 text-[17px] leading-relaxed mb-6">
            Mempelajari produksi siaran televisi, sinematografi, editing video, dan komunikasi visual audio untuk berbagai media kreatif.
          </p>
          <button onclick="openModal('modalBCF')" class="inline-block bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:bg-orange-700 transition-all">
            Lihat Selengkapnya
          </button>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= MODALS ================= -->

<!-- Modal RPL -->
<div id="modalRPL" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-8 text-left relative animate-fadeIn">
    <button onclick="closeModal('modalRPL')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600">
      <i class="fas fa-times text-xl"></i>
    </button>
    <h3 class="text-3xl font-bold text-orange-600 mb-4">Rekayasa Perangkat Lunak</h3>
    <p class="text-gray-700 leading-relaxed mb-4">
      Jurusan ini mengajarkan pengembangan software berbasis web, mobile, dan desktop. Siswa akan mempelajari bahasa pemrograman modern seperti JavaScript, PHP, Python, serta framework populer seperti Laravel, React, dan Flutter.
    </p>
    <p class="text-gray-700 leading-relaxed">
      Lulusan RPL memiliki peluang besar di dunia kerja sebagai programmer, software engineer, web developer, dan masih banyak lagi.
    </p>
  </div>
</div>

<!-- Modal TJKT -->
<div id="modalTJKT" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-8 text-left relative animate-fadeIn">
    <button onclick="closeModal('modalTJKT')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600">
      <i class="fas fa-times text-xl"></i>
    </button>
    <h3 class="text-3xl font-bold text-orange-600 mb-4">Teknik Jaringan Komputer dan Telekomunikasi</h3>
    <p class="text-gray-700 leading-relaxed mb-4">
      Di jurusan ini siswa akan belajar tentang jaringan komputer, server, keamanan data, dan sistem komunikasi digital. 
    </p>
    <p class="text-gray-700 leading-relaxed">
      Siswa juga diajarkan mengkonfigurasi router, switch, dan perangkat jaringan modern menggunakan teknologi terbaru.
    </p>
  </div>
</div>

<!-- Modal DKV -->
<div id="modalDKV" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-8 text-left relative animate-fadeIn">
    <button onclick="closeModal('modalDKV')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600">
      <i class="fas fa-times text-xl"></i>
    </button>
    <h3 class="text-3xl font-bold text-orange-600 mb-4">Desain Komunikasi Visual</h3>
    <p class="text-gray-700 leading-relaxed mb-4">
      Jurusan DKV menyiapkan siswa menjadi desainer grafis kreatif yang menguasai Adobe Photoshop, Illustrator, dan After Effects.
    </p>
    <p class="text-gray-700 leading-relaxed">
      Lulusan DKV dapat bekerja di bidang desain grafis, multimedia, periklanan, fotografi, hingga produksi konten kreatif.
    </p>
  </div>
</div>

<!-- Modal BCF -->
<div id="modalBCF" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full p-8 text-left relative animate-fadeIn">
    <button onclick="closeModal('modalBCF')" class="absolute top-4 right-4 text-gray-500 hover:text-orange-600">
      <i class="fas fa-times text-xl"></i>
    </button>
    <h3 class="text-3xl font-bold text-orange-600 mb-4">Broadcasting & Cinematography</h3>
    <p class="text-gray-700 leading-relaxed mb-4">
      Jurusan ini berfokus pada dunia penyiaran dan perfilman. Siswa akan mempelajari teknik pengambilan gambar, penyuntingan video, audio mixing, serta proses produksi film dan program televisi.
    </p>
    <p class="text-gray-700 leading-relaxed">
      Lulusan BCF siap bekerja di industri broadcasting, rumah produksi, stasiun TV, hingga menjadi content creator profesional.
    </p>
  </div>
</div>

@endsection

@push('scripts')
<script>
  // Modal Controls
  function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  }
  function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  }

  // Scroll Animation
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
  .fade-in-up {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease;
  }
  .fade-in-up.show {
    opacity: 1;
    transform: translateY(0);
  }
  .animate-fadeIn {
    animation: fadeIn 0.3s ease;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
  }
</style>
@endpush
