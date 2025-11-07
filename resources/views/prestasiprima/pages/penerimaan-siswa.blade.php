@extends('prestasiprima.index')

@section('title', 'Penerimaan Siswa - SMK Prestasi Prima')

@section('content')

<!-- ================= HERO MODERN + COUNTER ================= -->
<section class="relative min-h-screen bg-gradient-to-b from-[#0e162e] via-[#1c2540] to-[#0e162e] overflow-hidden pt-36 pb-32">
  <!-- ===== Dekorasi Partikel ===== -->
  <div class="absolute inset-0 pointer-events-none">
    <canvas id="heroParticles"></canvas>
  </div>

  <div class="max-w-7xl mx-auto px-6 md:px-10 grid md:grid-cols-2 gap-12 items-center relative z-10">
    <!-- ===== Teks Hero ===== -->
    <div data-aos="fade-right" class="space-y-6">
      <h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight bg-clip-text text-transparent bg-gradient-to-r from-orange-400 to-yellow-400">
        Bergabunglah dengan Kami
      </h1>
      <p class="text-gray-300 text-lg leading-relaxed">
        Kami menyambut siswa dari berbagai latar belakang untuk menjadi bagian dari komunitas yang suportif dan berprestasi. 
        Keberagaman adalah kekuatan kami, dan setiap siswa akan merasa diterima sepenuhnya.
      </p>
      <a href="#daftar" class="inline-block bg-orange-500 hover:bg-orange-600 shadow-lg hover:shadow-2xl text-white font-semibold px-10 py-4 rounded-full transition duration-300">
        Daftar Sekarang
      </a>
    </div>

    <!-- ===== Gambar Hero ===== -->
    <div data-aos="fade-left" class="relative group">
      <div class="relative rounded-3xl shadow-2xl overflow-hidden transform group-hover:scale-105 transition duration-700">
        <img src="{{ asset('assets/images/gedung/gedungsiswa.avif') }}" alt="Siswa SMK Prestasi Prima" class="w-full h-auto object-cover">
        <div class="absolute bottom-5 left-5 bg-white/15 backdrop-blur-md rounded-xl px-6 py-4 shadow-md border border-white/20">
          <p class="font-semibold text-white text-lg">SMK Prestasi Prima</p>
          <p class="text-gray-200 text-sm">Membangun Generasi Unggul & Berprestasi</p>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== Counter Jurusan ===== -->
  <div class="max-w-6xl mx-auto px-6 mt-24 text-center relative z-10">
    <h2 class="text-3xl md:text-4xl font-bold text-white mb-14">Jumlah Siswa Per Jurusan</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
      @php
        $jurusan = [
          ['label'=>'DKV','count'=>280],
          ['label'=>'BCF','count'=>210],
          ['label'=>'PPLG','count'=>280],
          ['label'=>'TJKT','count'=>210],
        ];
      @endphp
      @foreach($jurusan as $item)
      <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-3xl p-8 shadow-lg hover:-translate-y-3 hover:scale-105 transition transform duration-500">
        <h3 class="text-gray-300 text-lg mb-2 tracking-wide">{{ $item['label'] }}</h3>
        <h2 class="text-5xl font-bold text-orange-400 counter" data-target="{{ $item['count'] }}">0</h2>
      </div>
      @endforeach
    </div>
  </div>
</section>


<!-- ================= LANGKAH PENDAFTARAN ================= -->
<section id="daftar" class="py-24 bg-gray-50 relative">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-extrabold text-[#0e162e] mb-16">5 Langkah Pendaftaran</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-10">
      @php
        $steps = [
          'Persiapan Dokumen & Pembuatan Akun',
          'Verifikasi Berkas & Pengambilan PIN',
          'Pemilihan Jalur & Sekolah Tujuan',
          'Pelaksanaan Tes Minat & Bakat',
          'Pengumuman & Daftar Ulang'
        ];
      @endphp
      @foreach($steps as $index => $step)
      <div class="relative bg-white rounded-3xl shadow-md hover:shadow-2xl p-8 transition duration-500 transform hover:-translate-y-3">
        <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-orange-500 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg shadow-md">
          {{ $index + 1 }}
        </div>
        <p class="mt-8 text-gray-700 font-medium leading-relaxed">{{ $step }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>


<!-- ================= LANGKAH SETELAH PENDAFTARAN ================= -->
<section class="py-24 bg-[#0e162e] text-white relative overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
    <h2 class="text-4xl font-extrabold mb-16">5 Langkah Setelah Pendaftaran</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-10">
      @php
        $afterSteps = [
          'Pantau Status Verifikasi Berkas',
          'Ikuti Tes Minat & Bakat',
          'Lihat Hasil Seleksi Sementara',
          'Cek Pengumuman Resmi',
          'Lakukan Daftar Ulang (Wajib)'
        ];
      @endphp
      @foreach($afterSteps as $index => $step)
      <div class="relative bg-white/10 backdrop-blur-md border border-white/10 rounded-3xl p-8 hover:shadow-xl transform hover:-translate-y-3 transition duration-500">
        <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-orange-400 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-lg shadow-md">
          {{ $index + 1 }}
        </div>
        <p class="mt-8 text-gray-200 font-medium leading-relaxed">{{ $step }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>


<!-- ================= CTA PENUTUP (Versi Background Putih) ================= -->
<section class="py-28 bg-white text-center relative overflow-hidden">
  <div class="max-w-4xl mx-auto px-6">
    <h2 class="text-5xl font-bold text-[#0e162e] mb-6 leading-tight">
      Siap Menjadi Bagian dari SMK Prestasi Prima?
    </h2>
    <p class="text-gray-700 mb-10 text-lg">
      Jadilah bagian dari sekolah yang mendukung potensi dan kreativitas Anda. 
      Kami siap menyambut langkah pertama Anda menuju masa depan yang gemilang.
    </p>
    <a href="/pendaftaran" 
       class="bg-orange-500 hover:bg-orange-600 shadow-lg hover:shadow-xl text-white font-semibold px-12 py-4 rounded-full transition duration-300">
      Daftar Sekarang
    </a>
  </div>

  <!-- ===== Dekorasi Latar Lembut ===== -->
  <div class="absolute inset-0 -z-10 bg-gradient-to-b from-gray-50 to-white opacity-60"></div>
  <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-[120%] h-40 bg-gradient-to-t from-[#0e162e]/5 to-transparent rounded-t-[100%] blur-2xl"></div>
</section>



<!-- ================= SCRIPT COUNTER ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll('.counter');
  const speed = 100;
  const animate = () => {
    counters.forEach(counter => {
      const target = +counter.dataset.target;
      const count = +counter.innerText;
      const increment = target / speed;
      if (count < target) {
        counter.innerText = Math.ceil(count + increment);
        setTimeout(animate, 20);
      } else {
        counter.innerText = target;
      }
    });
  };
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) animate();
    });
  });
  counters.forEach(counter => observer.observe(counter));
});
</script>

<!-- ================= SCRIPT PARTICLES ================= -->
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2.11.1/tsparticles.min.js"></script>
<script>
tsParticles.load("heroParticles", {
  fpsLimit: 60,
  particles: {
    number: { value: 60 },
    color: { value: "#ffffff" },
    shape: { type: "circle" },
    opacity: { value: 0.25 },
    size: { value: { min: 1, max: 3 } },
    move: { enable: true, speed: 0.6 }
  },
  interactivity: {
    events: { onhover: { enable: true, mode: "repulse" } }
  },
  detectRetina: true
});
</script>

@endsection
