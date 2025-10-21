@extends('prestasiprima.index')
@section('title', 'Staff & Guru - SMK Prestasi Prima')

@section('content')

<!-- ========== STAFF SECTION ========== -->
<section class="relative pt-32 pb-28 overflow-hidden bg-white">

  <!-- Decorative Background Elements -->
  <div class="absolute top-10 left-10 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl animate-float-slow"></div>
  <div class="absolute bottom-10 right-10 w-72 h-72 bg-[#0e162e]/10 rounded-full blur-3xl animate-float-slow delay-300"></div>
  <div class="absolute top-1/2 left-0 w-56 h-56 bg-gradient-to-tr from-orange-400/10 to-[#0e162e]/10 rounded-full blur-2xl animate-float-slow delay-500"></div>

  <div class="relative max-w-7xl mx-auto px-4 md:px-8 text-center">
    <!-- Title -->
    <div class="mb-16">
      <h2 class="text-4xl md:text-5xl font-bold text-[#0e162e] mb-4 animate-fadeIn">
        Struktur Manajemen Sekolah
      </h2>
      <div class="w-32 h-[3px] bg-gradient-to-r from-orange-500 to-[#0e162e] mx-auto mb-4 rounded-full"></div>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">
        Mengenal lebih dekat para tenaga pendidik dan manajemen SMK Prestasi Prima yang berkomitmen membentuk masa depan terbaik untuk siswa.
      </p>
    </div>

    <!-- Kepala Sekolah & Wakil -->
    <div class="grid md:grid-cols-2 gap-10 mb-20 relative z-10">
      <div class="group relative bg-white border border-gray-200 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition duration-500 overflow-hidden animate-slideUp">
        <!-- Decorative accent -->
        <div class="absolute -top-6 -right-6 w-28 h-28 bg-orange-500/15 rounded-full blur-xl"></div>
        <div class="absolute bottom-0 left-0 w-20 h-20 bg-[#0e162e]/10 rounded-tr-[100%]"></div>

        <img src="/assets/images/staff/staff2.png" alt="Kepala Sekolah" class="mx-auto w-44 h-44 object-contain mb-6 relative z-10">
        <h3 class="text-2xl font-semibold text-[#0e162e] group-hover:text-orange-500 transition">Drs. H. Bambang Setiawan</h3>
        <p class="text-gray-500">Kepala Sekolah</p>
      </div>

      <div class="group relative bg-white border border-gray-200 p-8 rounded-3xl shadow-lg hover:shadow-2xl transition duration-500 delay-200 overflow-hidden animate-slideUp">
        <!-- Decorative accent -->
        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-[#0e162e]/10 rounded-full blur-xl"></div>
        <div class="absolute top-0 right-0 w-16 h-16 bg-orange-500/10 rounded-bl-[100%]"></div>

        <img src="/assets/images/staff/staff2.png" alt="Wakil Kepala Sekolah" class="mx-auto w-44 h-44 object-contain mb-6 relative z-10">
        <h3 class="text-2xl font-semibold text-[#0e162e] group-hover:text-orange-500 transition">Siti Nurhaliza, S.Pd</h3>
        <p class="text-gray-500">Wakil Kepala Sekolah</p>
      </div>
    </div>

    <!-- Kepala Program -->
    <div class="relative mb-24 z-10">
      <h3 class="text-3xl font-bold text-[#0e162e] mb-10 animate-fadeIn">Kepala Program</h3>
      <div class="grid md:grid-cols-4 sm:grid-cols-2 gap-10">
        @for ($i = 0; $i < 4; $i++)
          <div class="group relative bg-white border border-gray-200 p-6 rounded-3xl shadow-md hover:shadow-xl transition duration-500 overflow-hidden animate-slideUp">
            <div class="absolute top-0 left-0 w-20 h-20 bg-orange-500/10 rounded-br-[80%]"></div>
            <div class="absolute -bottom-5 -right-5 w-24 h-24 bg-[#0e162e]/10 rounded-tl-[80%] blur-md"></div>
            <img src="/assets/images/staff/staff2.png" alt="Kepala Program" class="mx-auto w-36 h-36 object-contain mb-5 relative z-10">
            <h4 class="text-lg font-semibold text-[#0e162e] group-hover:text-orange-500 transition">Nama Kepala Program {{ $i+1 }}</h4>
            <p class="text-gray-500 text-sm">Kepala Program Keahlian</p>
          </div>
        @endfor
      </div>
    </div>

    <!-- Staff & Guru -->
    <div class="relative p-10 bg-gradient-to-b from-white to-orange-50/40 rounded-3xl shadow-inner border-t-4 border-orange-400/60 z-10">
      <h3 class="text-3xl font-bold text-[#0e162e] mb-10 animate-fadeIn">Staff & Guru</h3>
      <div class="grid md:grid-cols-5 sm:grid-cols-3 grid-cols-2 gap-8">
        @for ($i = 0; $i < 10; $i++)
          <div class="group relative bg-white border border-gray-200 p-5 rounded-3xl shadow-md hover:shadow-xl hover:scale-[1.03] transition duration-500 overflow-hidden animate-slideUp">
            <div class="absolute -top-3 right-3 w-14 h-14 bg-orange-500/10 rounded-bl-[70%]"></div>
            <div class="absolute bottom-0 left-0 w-20 h-20 bg-[#0e162e]/10 rounded-tr-[80%] blur-md"></div>
            <img src="/assets/images/staff/staff2.png" alt="Guru" class="mx-auto w-28 h-28 object-contain mb-4 relative z-10">
            <h4 class="text-base font-semibold text-[#0e162e] group-hover:text-orange-500 transition">Guru {{ $i+1 }}</h4>
            <p class="text-gray-500 text-sm">Pengajar</p>
          </div>
        @endfor
      </div>
    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
@keyframes fadeIn {
  0% { opacity: 0; transform: translateY(30px); }
  100% { opacity: 1; transform: translateY(0); }
}
@keyframes slideUp {
  0% { opacity: 0; transform: translateY(50px); }
  100% { opacity: 1; transform: translateY(0); }
}
@keyframes float-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-15px); }
}
.animate-fadeIn { animation: fadeIn 1.2s ease forwards; }
.animate-slideUp { animation: slideUp 1.3s ease forwards; }
.animate-float-slow { animation: float-slow 6s ease-in-out infinite; }
</style>
@endpush
