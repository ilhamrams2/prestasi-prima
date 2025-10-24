@extends('prestasiprima.index')

@section('title', 'Kegiatan - SMK Prestasi Prima')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-white via-gray-50 to-white pt-36 pb-28 relative overflow-hidden">

  {{-- ======= Ornamen Background ======= --}}
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute top-20 left-1/4 w-72 h-72 bg-orange-100 rounded-full blur-3xl opacity-40"></div>
    <div class="absolute bottom-20 right-1/4 w-96 h-96 bg-gray-200 rounded-full blur-3xl opacity-50"></div>
  </div>

  {{-- ======= Header ======= --}}
  <div class="text-center mb-16" data-aos="fade-down">
    <h1 class="text-4xl md:text-5xl font-bold text-[#0e162e] mb-4">
      Kegiatan Sekolah
    </h1>
    <p class="text-gray-600 max-w-2xl mx-auto text-base md:text-lg">
      Kumpulan dokumentasi kegiatan menarik yang mencerminkan semangat, kreativitas, dan kebersamaan siswa SMK Prestasi Prima.
    </p>
  </div>

  {{-- ======= Grid Card Unik ======= --}}
  <div class="max-w-7xl mx-auto px-4 md:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10" data-aos="fade-up" data-aos-delay="200">

    @foreach ([
      ['judul' => 'Lomba Keterampilan Siswa', 'tanggal' => '12 Oktober 2025', 'gambar' => 'assets/images/kegiatan1.jpg', 'desc' => 'Ajang kompetisi antar siswa untuk mengasah keterampilan bidang kejuruan.'],
      ['judul' => 'Kegiatan Bakti Sosial', 'tanggal' => '5 September 2025', 'gambar' => 'assets/images/kegiatan2.jpg', 'desc' => 'Siswa dan guru berpartisipasi membantu masyarakat sekitar sekolah.'],
      ['judul' => 'Pelatihan Industri', 'tanggal' => '20 Agustus 2025', 'gambar' => 'assets/images/kegiatan3.jpg', 'desc' => 'Pengenalan dunia kerja dan pembekalan pengalaman langsung di industri.'],
    ] as $item)
      <div class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer bg-white border border-gray-100 hover:-translate-y-2">

        {{-- Gambar Utama --}}
        <div class="relative">
          <img src="{{ asset($item['gambar']) }}" alt="{{ $item['judul'] }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
          
          {{-- Overlay Warna Oranye --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

          {{-- Judul di Tengah saat Hover --}}
          <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
            <h3 class="text-white text-lg font-semibold px-4 text-center">
              {{ $item['judul'] }}
            </h3>
          </div>
        </div>

        {{-- Konten Bawah --}}
        <div class="p-6">
          <div class="flex justify-between items-center mb-3">
            <span class="text-sm text-gray-500">{{ $item['tanggal'] }}</span>
            <span class="text-orange-600 text-xs uppercase font-medium tracking-wide">Kegiatan</span>
          </div>
          <p class="text-gray-700 text-sm leading-relaxed">{{ $item['desc'] }}</p>

          {{-- Tombol Lihat Selengkapnya --}}
          <div class="mt-5">
            <a href="#" class="inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-medium text-sm">
              Lihat Selengkapnya
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

      </div>
    @endforeach

  </div>

  {{-- ======= CTA Bawah ======= --}}
  <div class="text-center mt-20" data-aos="fade-up" data-aos-delay="300">
    <h3 class="text-lg md:text-xl font-semibold text-[#0e162e]">
      Ingin tahu lebih banyak kegiatan lainnya?
    </h3>
    <a href="/dokumentasi/berita" 
       class="inline-block mt-5 px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-xl shadow-md transition-all duration-300">
      Lihat Berita Sekolah
    </a>
  </div>

</section>
@endsection
