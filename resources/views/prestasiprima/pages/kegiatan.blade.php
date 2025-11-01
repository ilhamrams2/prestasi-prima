@extends('prestasiprima.index')

@section('title', 'Kegiatan - SMK Prestasi Prima')

@section('content')
<section class="bg-gray-50 relative z-10 pt-28 md:pt-36 pb-24">
  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-orange-600 mb-4" data-aos="fade-down">
      Kegiatan Sekolah
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12" data-aos="fade-up">
      Berikut adalah berbagai kegiatan terbaru dari SMK Prestasi Prima yang menjadi bagian dari pembelajaran, kreativitas, dan inovasi siswa.
    </p>

    <div class="h-1 w-32 bg-gradient-to-r from-orange-500 to-yellow-400 mx-auto rounded-full mb-16" data-aos="zoom-in"></div>

    <!-- GRID CARD KEGIATAN -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

      @forelse ($kegiatan as $item)
      <div class="group relative bg-white border border-orange-100 rounded-2xl p-6 shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 hover:border-orange-400" data-aos="fade-up">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-orange-500 to-yellow-400 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-all duration-300"></div>

        <div class="mb-3 text-sm text-gray-500 flex justify-between items-center">
          <span class="font-semibold text-orange-500">
            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tanggal)->translatedFormat('l, d F Y') }}
          </span>
          <span class="text-gray-400">{{ $item->waktu }}</span>
        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-orange-600 transition-colors duration-300">
          {{ $item->judul }}
        </h3>

        <p class="text-gray-600 leading-relaxed mb-5">
          {{ $item->deskripsi }}
        </p>

        <div class="flex justify-between items-center text-sm text-gray-500 border-t pt-3 border-gray-100">
          <span class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12.414a2 2 0 00-2.828 0l-4.243 4.243M21 21l-6-6M3 7h18M3 3h18M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            {{ $item->tempat }}
          </span>

          <a href="#" class="text-orange-500 font-semibold hover:underline hover:text-orange-600 transition-colors duration-200">
            Lihat Detail →
          </a>
        </div>
      </div>
      @empty
      <p class="text-gray-500 col-span-full text-center">Belum ada kegiatan yang tersedia.</p>
      @endforelse

    </div>

    <div class="mt-16" data-aos="zoom-in">
      <a href="/berita" class="inline-block px-8 py-3 bg-orange-500 text-white font-semibold rounded-full transition-all duration-300 hover:bg-orange-600 hover:-translate-y-1 shadow-md">
        Lihat Semua Kegiatan
      </a>
    </div>
  </div>
</section>
@endsection
