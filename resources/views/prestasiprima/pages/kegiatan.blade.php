@extends('prestasiprima.index')

@section('title', 'Kegiatan - SMK Prestasi Prima')

@section('content')
<section class="bg-gradient-to-b from-gray-50 to-white relative z-10 pt-28 md:pt-36 pb-24 overflow-hidden">
  {{-- === Dekorasi Latar === --}}
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute w-72 h-72 bg-orange-200/30 blur-[120px] -top-24 -left-24 rounded-full"></div>
    <div class="absolute w-72 h-72 bg-yellow-300/20 blur-[100px] bottom-0 right-0 rounded-full"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 md:px-8 text-center relative z-10">
    {{-- === Judul & Deskripsi === --}}
    <h2 class="text-3xl md:text-4xl font-extrabold text-orange-600 mb-4" data-aos="fade-down">
      Kegiatan Sekolah
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12 leading-relaxed" data-aos="fade-up">
      Berbagai kegiatan seru dan inspiratif dari <span class="font-semibold text-orange-500">SMK Prestasi Prima</span>,
      mencerminkan semangat pembelajaran, kreativitas, dan inovasi para siswa.
    </p>

    <div class="h-1 w-32 bg-gradient-to-r from-orange-500 to-yellow-400 mx-auto rounded-full mb-16" data-aos="zoom-in"></div>

    {{-- === GRID CARD === --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @forelse ($kegiatan as $item)
      <div 
        class="group relative bg-white border border-gray-100 rounded-2xl p-6 shadow-sm transition-all duration-500 ease-out hover:shadow-xl hover:-translate-y-1 hover:border-orange-300 overflow-hidden"
        data-aos="fade-up"
      >
        {{-- Garis Hover Presisi di Dalam Card --}}
        <div class="absolute top-[1px] left-[1px] right-[1px] h-[3px] bg-gradient-to-r from-orange-500 to-yellow-400 
                    rounded-t-[14px] opacity-0 scale-x-0 origin-center 
                    transition-all duration-500 ease-out group-hover:opacity-100 group-hover:scale-x-100">
        </div>

        {{-- Tanggal & Waktu --}}
        <div class="mb-3 text-sm text-gray-500 flex justify-between items-center">
          <span class="font-semibold text-orange-500">
            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tanggal)->translatedFormat('l, d F Y') }}
          </span>
          <span class="text-gray-400">{{ $item->waktu }}</span>
        </div>

        {{-- Judul --}}
        <h3 class="text-lg font-bold text-gray-800 mb-3 transition-all duration-300 group-hover:text-orange-600 group-hover:tracking-wide">
          {{ $item->judul }}
        </h3>

        {{-- Deskripsi --}}
        <p class="text-gray-600 leading-relaxed mb-5 line-clamp-4">
          {{ $item->deskripsi }}
        </p>

        {{-- Info Bawah --}}
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

    {{-- Tombol Lihat Semua --}}
    <div class="mt-16" data-aos="zoom-in">
      <a href="/berita" 
         class="inline-block px-8 py-3 bg-orange-500 text-white font-semibold rounded-full transition-all duration-300 hover:bg-orange-600 hover:-translate-y-1 shadow-md">
        Lihat Semua Kegiatan
      </a>
    </div>
  </div>
</section>

{{-- === Style tambahan untuk line clamp === --}}
<style>
  .line-clamp-4 {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>
@endsection
