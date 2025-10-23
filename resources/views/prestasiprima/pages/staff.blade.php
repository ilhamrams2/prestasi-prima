@extends('prestasiprima.index')

@section('title', 'Struktur Staff & Manajemen - SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-white via-gray-50 to-white py-32 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 text-center">

    <!-- ===== HEADER ===== -->
    <div data-aos="fade-down" data-aos-duration="700">
      <h1 class="text-4xl md:text-5xl font-bold text-[#0e162e] mb-4">Struktur Staff & Manajemen</h1>
      <p class="text-gray-600 mb-16">SMK Prestasi Prima — Profesional, Berkarakter, dan Inspiratif</p>
    </div>

    <!-- ===== STRUKTUR ORGANISASI ===== -->
    <div class="relative flex flex-col items-center space-y-16">

      <!-- Level 1 -->
      <div class="staff-level" data-aos="zoom-in" data-aos-duration="600">
        <div class="staff-card">
          <img src="{{ asset('assets/images/staff/hendri.jpg') }}" alt="Kepala Sekolah">
        </div>
      </div>

      <!-- Level 2 -->
      <div class="staff-level flex flex-wrap justify-center gap-8" data-aos="zoom-in-up" data-aos-duration="700">
        <div class="staff-card"><img src="{{ asset('assets/images/staff/kapro1.jpg') }}" alt="Kaprok DKV"></div>
        <div class="staff-card"><img src="{{ asset('assets/images/staff/kapro2.jpg') }}" alt="Kaprok PPLG"></div>
        <div class="staff-card"><img src="{{ asset('assets/images/staff/kapro3.jpg') }}" alt="Kaprok TJKT"></div>
        <div class="staff-card"><img src="{{ asset('assets/images/staff/kapro4.jpg') }}" alt="Kaprok BCF"></div>
      </div>

      <!-- Level 3 -->
      <div class="staff-level flex flex-wrap justify-center gap-8" data-aos="fade-up" data-aos-duration="700">
        <div class="staff-card"><img src="{{ asset('assets/images/staff/kurikulum.jpg') }}" alt="Kurikulum"></div>
        <div class="staff-card"><img src="{{ asset('assets/images/staff/kesiswaan.jpg') }}" alt="Kesiswaan"></div>
        <div class="staff-card"><img src="{{ asset('assets/images/staff/humas.jpg') }}" alt="Humas"></div>
      </div>

      <!-- Level 4 -->
      <div class="staff-level grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 md:gap-10" data-aos="fade-up" data-aos-duration="700">
        @for ($i = 1; $i <= 15; $i++)
        <div class="staff-card" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}" data-aos-duration="600">
          <img src="{{ asset("assets/images/staff/grmpl-$i.jpg") }}" alt="Guru {{ $i }}">
        </div>
        @endfor
      </div>
    </div>
  </div>

  <!-- Ornamen Dekoratif -->
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute -top-20 left-1/3 w-96 h-96 bg-orange-100 rounded-full blur-3xl opacity-40 animate-pulse"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-blue-100 rounded-full blur-3xl opacity-40 animate-pulse"></div>
  </div>
</section>

<!-- ===== STYLE TAMBAHAN ===== -->
<style>
.staff-card {
  @apply bg-white shadow-md rounded-2xl overflow-hidden w-36 sm:w-40 md:w-44 hover:shadow-xl transition-transform duration-300 hover:-translate-y-2 border border-gray-100;
}
.staff-card img {
  @apply w-full h-48 object-cover transition-transform duration-500 ease-out hover:scale-105;
}

/* Hilangkan teks di bawah gambar */
.staff-card h3, .staff-card p {
  display: none;
}

/* Responsif dan layout tetap mirip piramida */
.staff-level {
  @apply flex flex-wrap justify-center items-center gap-8 md:gap-10;
}

@media (max-width: 768px) {
  .staff-level {
    gap: 1.25rem;
  }
  .staff-card {
    width: 6rem;
  }
  .staff-card img {
    height: 5.5rem;
  }
}
</style>

<!-- ===== AOS OPTIMIZATION ===== -->
<script>
  AOS.init({
    duration: 600,  // lebih cepat dari sebelumnya
    easing: 'ease-out-cubic',
    once: true,     // animasi hanya sekali agar smooth
    offset: 120,
  });
</script>
@endsection
