@extends('prestasiprima.index')

@section('title', 'News Open - Prestasi Prima')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12">
  <!-- Artikel Utama -->
  <div class="lg:col-span-2">
    <!-- Header Artikel -->
    <div class="flex items-center gap-4 mb-4">
      <span class="bg-orange-500 text-white text-sm px-4 py-1 rounded-full">Pendidikan</span>
      <span class="text-gray-500 text-sm">23 Agustus 2025</span>
    </div>

    <!-- Judul -->
    <h1 class="text-4xl font-bold leading-tight mb-6">
      Memberikan penghargaan<br />
      Kepada guru–guru berprestasi
    </h1>

    <!-- Gambar Utama -->
   <img src="https://cdn.pixabay.com/photo/2017/08/06/22/01/school-2596094_960_720.jpg"
     alt="Guru Berprestasi"
     class="w-full rounded-lg">


    <!-- Isi Artikel -->
    <div class="prose max-w-none text-gray-700 leading-relaxed space-y-6">
      <p>
        Memberikan penghargaan kepada guru–guru berprestasi merupakan salah satu bentuk apresiasi sekolah terhadap dedikasi dan kontribusi mereka dalam dunia pendidikan...
      </p>
      <p>
        Penghargaan ini diharapkan mampu menjadi motivasi bagi seluruh tenaga pendidik untuk terus meningkatkan kualitas diri...
      </p>
    </div>

    <!-- Kutipan -->
    <blockquote class="my-12 text-center">
      <p class="text-2xl lg:text-3xl font-bold text-gray-900">
        <span class="text-orange-500">❝</span>
        Membangun Tradisi Apresiasi<br />
        Harapan Sekolah ke Depannya<br />
        <span class="font-normal">Dan Inovasi Pendidikan</span>
        <span class="text-orange-500">❞</span>
      </p>
    </blockquote>

    <!-- Gambar Kedua -->
  <img src="https://cdn.pixabay.com/photo/2017/08/06/22/01/school-2596094_960_720.jpg"
     alt="Guru Berprestasi"
     class="w-full rounded-lg">


    <!-- Lanjutan Artikel -->
    <div class="prose max-w-none text-gray-700 leading-relaxed space-y-6">
      <p>
        Sekolah Prestasi Prima percaya bahwa guru adalah ujung tombak dalam mencetak generasi unggul...
      </p>
    </div>
  </div>

  <!-- Sidebar -->
  <aside class="space-y-8">
    <!-- Hot News -->
    <div class="bg-white shadow rounded-xl overflow-hidden">
      <img src="/img/hotnews.jpg" alt="Hot News" class="w-full h-40 object-cover" />
      <div class="p-4">
        <h3 class="font-semibold text-lg">Kegiatan Akhir Semester Sekolah Prestasi</h3>
        <p class="text-sm text-gray-600 mt-2">
          Siswa-siswi SMK Prestasi Prima berhasil menutup semester dengan berbagai lomba akademik...
        </p>
      </div>
    </div>

    <!-- Akses Cepat -->
    <div class="bg-white shadow rounded-xl p-4">
      <h3 class="font-semibold text-lg border-l-4 border-orange-500 pl-2 mb-4">Akses Cepat</h3>
      <ul class="space-y-2">
        <li class="flex justify-between items-center py-2 border-b">
          <span>Pendidikan</span><span class="text-orange-500">•</span>
        </li>
        <li class="flex justify-between items-center py-2 border-b">
          <span>Event</span><span class="text-orange-500">•</span>
        </li>
        <li class="flex justify-between items-center py-2 border-b">
          <span>Prestasi</span><span class="text-orange-500">•</span>
        </li>
        <li class="flex justify-between items-center py-2">
          <span>Olahraga</span><span class="text-orange-500">•</span>
        </li>
      </ul>
    </div>
  </aside>
</section>


@endsection
