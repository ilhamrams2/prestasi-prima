@extends('prestasiprima.index')

@section('title', 'Program Keahlian - SMK Prestasi Prima')

@section('content')
<section id="program" class="bg-gray-50 pt-36 md:pt-44 pb-20 relative overflow-hidden">
  <!-- Ornamen Latar Belakang -->
  <div class="absolute inset-0 -z-10">
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-[#0e162e]/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#0e162e]/10 rounded-full blur-3xl"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 md:px-8 relative">

    <!-- Judul -->
    <div class="text-center mb-16 fade-in-up">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
        Program <span class="text-orange-600">Keahlian</span>
      </h2>
      <div class="mx-auto w-20 h-1 bg-gradient-to-r from-[#0e162e] to-orange-500 rounded-full mb-6"></div>
      <p class="text-gray-600 max-w-3xl mx-auto">
        Empat jurusan unggulan siap membentukmu jadi generasi kreatif dan kompeten.  
        PPLG dengan dunia coding dan gim, TJKT untuk keahlian jaringan, DKV yang mengekspresikan ide melalui desain,  
        hingga BCF yang mengasah talenta film dan broadcasting.
      </p>
    </div>

    <!-- ================= PPLG ================= -->
    <div class="grid md:grid-cols-2 gap-10 items-center mb-20 fade-in-up">
      <div>
        <img src="{{ asset('assets/images/section/program/pplg.png') }}" 
             alt="PPLG" 
             class="rounded-2xl shadow-lg object-cover w-full h-96 border-4 border-[#0e162e]/10">
      </div>
      <div class="text-left">
        <img src="{{ asset('assets/images/section/program/icons/pplg.png') }}" alt="icon" class="w-14 mb-4">
        <h3 class="text-2xl font-bold text-gray-900 mb-3 border-l-4 border-[#0e162e] pl-3">Pengembangan Perangkat Lunak dan Gim (PPLG)</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Fokus pada pemrograman, desain sistem, dan pembuatan aplikasi berbasis web, Android, hingga pengembangan gim interaktif modern.
        </p>
        <a href="#" class="inline-block text-orange-600 font-semibold hover:text-[#0e162e] transition" data-target="pplg">
          Lihat Selengkapnya →
        </a>
      </div>
    </div>

    <!-- ================= TJKT ================= -->
    <div class="grid md:grid-cols-2 gap-10 items-center mb-20 fade-in-up md:flex-row-reverse">
      <div class="md:order-2">
        <img src="{{ asset('assets/images/section/program/tkj.png') }}" 
             alt="TKJ" 
             class="rounded-2xl shadow-lg object-cover w-full h-96 border-4 border-[#0e162e]/10">
      </div>
      <div class="md:order-1 text-left md:text-right">
        <img src="{{ asset('assets/images/section/program/icons/tkj.png') }}" alt="icon" class="w-14 mb-4 ml-auto md:ml-0">
        <h3 class="text-2xl font-bold text-gray-900 mb-3 border-r-4 border-[#0e162e] pr-3">Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Mempelajari instalasi, konfigurasi, dan pemeliharaan jaringan komputer berbasis kabel, nirkabel, hingga fiber optic.
        </p>
        <a href="#" class="inline-block text-orange-600 font-semibold hover:text-[#0e162e] transition" data-target="tkj">
          Lihat Selengkapnya →
        </a>
      </div>
    </div>

    <!-- ================= BCF ================= -->
    <div class="grid md:grid-cols-2 gap-10 items-center mb-20 fade-in-up">
      <div>
        <img src="{{ asset('assets/images/section/program/bcf.png') }}" 
             alt="BCF" 
             class="rounded-2xl shadow-lg object-cover w-full h-96 border-4 border-[#0e162e]/10">
      </div>
      <div class="text-left">
        <img src="{{ asset('assets/images/section/program/icons/bcf.png') }}" alt="icon" class="w-14 mb-4">
        <h3 class="text-2xl font-bold text-gray-900 mb-3 border-l-4 border-[#0e162e] pl-3">Broadcast dan Film (BCF)</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Mengasah kemampuan dalam dunia perfilman, penyiaran, dan editing video profesional menggunakan peralatan modern.
        </p>
        <a href="#" class="inline-block text-orange-600 font-semibold hover:text-[#0e162e] transition" data-target="bcf">
          Lihat Selengkapnya →
        </a>
      </div>
    </div>

    <!-- ================= DKV ================= -->
    <div class="grid md:grid-cols-2 gap-10 items-center fade-in-up md:flex-row-reverse">
      <div class="md:order-2">
        <img src="{{ asset('assets/images/section/program/dkv.png') }}" 
             alt="DKV" 
             class="rounded-2xl shadow-lg object-cover w-full h-96 border-4 border-[#0e162e]/10">
      </div>
      <div class="md:order-1 text-left md:text-right">
        <img src="{{ asset('assets/images/section/program/icons/dkv.png') }}" alt="icon" class="w-14 mb-4 ml-auto md:ml-0">
        <h3 class="text-2xl font-bold text-gray-900 mb-3 border-r-4 border-[#0e162e] pr-3">Desain Komunikasi Visual (DKV)</h3>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Mengembangkan kreativitas di bidang desain grafis, ilustrasi, animasi, dan visual branding untuk kebutuhan media modern.
        </p>
        <a href="#" class="inline-block text-orange-600 font-semibold hover:text-[#0e162e] transition" data-target="dkv">
          Lihat Selengkapnya →
        </a>
      </div>
    </div>

  </div>
</section>

<style>
.fade-in-up {
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
}
.fade-in-up.show {
  opacity: 1;
  transform: translateY(0);
}
</style>

@push('scripts')
<script src="{{ asset('assets/js/prestasiprima/program.js') }}"></script>
@endpush
@endsection
