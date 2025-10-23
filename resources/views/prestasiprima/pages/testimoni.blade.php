@extends('prestasiprima.index')

@section('title', 'Testimoni Siswa & Alumni - SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-white via-gray-50 to-white pt-40 pb-24 relative overflow-hidden">

  <!-- ===== Dekorasi Background ===== -->
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute top-0 left-0 w-64 h-64 bg-orange-100 rounded-full blur-3xl opacity-40 animate-pulse"></div>
    <div class="absolute bottom-10 right-10 w-72 h-72 bg-[#0e162e]/10 rounded-full blur-3xl"></div>
  </div>

  <div class="max-w-7xl mx-auto px-6 text-center">
    <!-- ===== Header ===== -->
    <h1 class="text-4xl md:text-5xl font-bold text-[#0e162e] mb-6" data-aos="fade-down">
      Testimoni Siswa & Alumni
    </h1>
    <p class="text-gray-600 mb-16 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
      Suara dari para siswa dan alumni SMK Prestasi Prima yang telah merasakan pendidikan berkualitas dan lingkungan yang inspiratif.
    </p>

    <!-- ===== Daftar Testimoni ===== -->
    <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10 place-items-center">
      @foreach([
        ['img' => 'alumni1.jpg', 'nama' => 'Ayu Lestari', 'jurusan' => 'PPLG 2022', 'text' => 'Lingkungan belajar yang nyaman dan guru-guru yang mendukung membuat saya siap menghadapi dunia kerja.'],
        ['img' => 'alumni2.jpg', 'nama' => 'Rizky Setiawan', 'jurusan' => 'TJKT 2021', 'text' => 'Pembelajaran berbasis industri di SMK Prestasi Prima benar-benar membuka wawasan saya tentang dunia teknologi.'],
        ['img' => 'alumni3.jpg', 'nama' => 'Dinda Putri', 'jurusan' => 'DKV 2023', 'text' => 'Saya bisa mengembangkan bakat desain dan berhasil diterima magang di perusahaan kreatif berkat bimbingan guru.'],
      ] as $alumni)
      <div class="testimonial-card group relative bg-white shadow-md hover:shadow-xl transition-all duration-300 rounded-3xl p-8 border border-gray-100 max-w-sm" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-md">
          <img src="{{ asset('assets/images/testimoni/' . $alumni['img']) }}" alt="{{ $alumni['nama'] }}" class="w-full h-full object-cover">
        </div>
        <div class="mt-12">
          <p class="text-gray-700 italic mb-6 leading-relaxed">“{{ $alumni['text'] }}”</p>
          <h3 class="font-semibold text-lg text-[#0e162e]">{{ $alumni['nama'] }}</h3>
          <p class="text-orange-500 text-sm">{{ $alumni['jurusan'] }}</p>
        </div>
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-orange-50 via-white to-orange-100 opacity-0 group-hover:opacity-100 transition duration-500 -z-10"></div>
      </div>
      @endforeach
    </div>

    <!-- ===== CTA Penutup ===== -->
    <div class="mt-24" data-aos="fade-up" data-aos-delay="200">
      <h2 class="text-3xl font-bold text-[#0e162e] mb-6">Ingin Bergabung dengan Mereka?</h2>
      <a href="/pendaftaran" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-10 py-4 rounded-full shadow-lg hover:shadow-xl transition duration-300">
        Daftar Sekarang
      </a>
    </div>
  </div>
</section>

<!-- FOTO GEDUNG -->
  <section class="relative w-full bg-white overflow-hidden">
    <img alt="Gedung SMK Prestasi Prima" class="w-full h-[40vh] sm:h-[55vh] lg:h-screen object-cover object-center hover:scale-[1.02] transition-transform duration-700" src="{{ asset('assets/images/gedung/gedung.avif') }}">
  </section>

<!-- ===== STYLE TAMBAHAN ===== -->
<style>
.testimonial-card {
  backdrop-filter: blur(8px);
  transform: translateY(0);
}
.testimonial-card:hover {
  transform: translateY(-6px);
}
</style>
@endsection
