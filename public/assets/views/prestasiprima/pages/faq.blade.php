@extends('prestasiprima.index')

@section('title', 'FAQ - SMK Prestasi Prima')

@section('content')
<section 
  class="relative min-h-screen bg-white pt-44 pb-28 overflow-hidden"
  x-data="{ open: null }"
>
  {{-- Dekorasi Latar --}}
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute top-10 left-20 w-96 h-96 bg-orange-200/30 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-0 right-10 w-[28rem] h-[28rem] bg-orange-100/40 rounded-full blur-3xl animate-pulse-slow delay-1000"></div>
  </div>

  {{-- Header --}}
  <div class="max-w-5xl mx-auto text-center px-6 mb-16">
    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 mb-6 relative inline-block">
      Pertanyaan Umum
      <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-orange-500 to-orange-400 rounded-full"></span>
    </h1>
    <p class="text-gray-600 text-lg max-w-2xl mx-auto">
      Klik pertanyaan di bawah untuk melihat jawabannya.
    </p>
  </div>

  {{-- List FAQ per baris --}}
  <div class="max-w-4xl mx-auto space-y-6 px-6">
    @php
      $faqs = [
        [
          'question' => 'Kurikulum apa yang digunakan di SMK Prestasi Prima?',
          'answer' => 'SMK Prestasi Prima menerapkan Kurikulum Merdeka, yang berfokus pada pengembangan kompetensi, karakter, serta kesiapan siswa menghadapi dunia kerja dan industri kreatif modern.',
        ],
        [
          'question' => 'Ada berapa jurusan di SMK Prestasi Prima?',
          'answer' => '<strong>SMK Prestasi Prima</strong> memiliki empat jurusan unggulan:<br><br>
            <strong>PPLG</strong> – Pemrograman, aplikasi, dan gim digital.<br>
            <strong>BCF</strong> – Broadcasting, penyiaran, dan perfilman.<br>
            <strong>TJKT</strong> – Jaringan komputer & teknologi komunikasi.<br>
            <strong>DKV</strong> – Desain grafis, ilustrasi digital, dan media kreatif.',
        ],
        [
          'question' => 'Ada berapa jumlah ekstrakurikuler di SMK Prestasi Prima?',
          'answer' => 'SMK Prestasi Prima memiliki <strong>21 kegiatan ekstrakurikuler</strong> untuk mengembangkan minat, bakat, dan kemampuan sosial siswa di luar kegiatan akademik.',
        ],
        [
          'question' => 'Apakah sekolah memiliki sistem keamanan yang baik?',
          'answer' => 'Ya, seluruh area sekolah dilengkapi dengan CCTV serta petugas keamanan yang selalu siaga demi kenyamanan dan keselamatan seluruh warga sekolah.',
        ],
        [
          'question' => 'Berapa biaya sekolah saat ini?',
          'answer' => 'Informasi biaya pendidikan dapat diperoleh melalui kantor administrasi sekolah. Evaluasi biaya dilakukan setiap bulan Januari untuk tahun ajaran berikutnya.',
        ],
        [
          'question' => 'Apakah sekolah memiliki fasilitas lengkap?',
          'answer' => 'Tersedia laboratorium untuk setiap jurusan: lab komputer, studio desain, lab broadcasting, serta ruang praktik yang mendukung pembelajaran berbasis industri.',
        ],
        [
          'question' => 'Apa akreditasi SMK Prestasi Prima?',
          'answer' => 'SMK Prestasi Prima telah meraih <strong>Akreditasi A (Unggul)</strong> — bukti mutu pendidikan dan kualitas pembelajaran yang tinggi.',
        ],
        [
          'question' => 'Ada berapa gedung di area pembelajaran?',
          'answer' => 'Terdapat empat gedung utama:<br><br>
            <strong>Gedung A:</strong> administrasi, perpustakaan, dan lab kimia.<br>
            <strong>Gedung B:</strong> ruang kelas dan lab PPLG, DKV, TJKT, BCF.<br>
            <strong>Gedung C:</strong> ruang OSIS, administrasi tambahan.<br>
            <strong>Gedung D:</strong> unit produksi & ruang praktik kewirausahaan.',
        ],
      ];
    @endphp

    @foreach ($faqs as $index => $faq)
    <div 
      class="bg-white backdrop-blur-xl rounded-2xl border border-gray-100 shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden cursor-pointer group"
      @click="open === {{ $index }} ? open = null : open = {{ $index }}"
      :class="{ 'ring-2 ring-orange-400/70 scale-[1.01]': open === {{ $index }} }"
      x-data="{ show: false }"
      x-intersect.once="show = true"
      x-transition:enter="transition ease-out duration-700"
      x-transition:enter-start="opacity-0 translate-y-6"
      x-transition:enter-end="opacity-100 translate-y-0"
    >
      {{-- Pertanyaan --}}
      <div class="flex items-center gap-4 px-6 py-6">
        <div class="p-3 rounded-xl bg-orange-100 text-orange-500 shadow-md group-hover:bg-orange-500 group-hover:text-white transition-all duration-300">
          <i data-lucide="help-circle" class="w-6 h-6"></i>
        </div>
        <h2 class="text-lg md:text-xl font-semibold text-gray-800 leading-snug flex-1">
          {{ $faq['question'] }}
        </h2>
        <i 
          data-lucide="chevron-down" 
          class="w-5 h-5 text-orange-400 transition-transform duration-500"
          :class="{ 'rotate-180 text-orange-600': open === {{ $index }} }"
        ></i>
      </div>

      {{-- Jawaban --}}
      <div 
        x-show="open === {{ $index }}"
        x-transition:enter="transition-all ease-in-out duration-700"
        x-transition:enter-start="max-h-0 opacity-0"
        x-transition:enter-end="max-h-[1000px] opacity-100"
        x-transition:leave="transition-all ease-in-out duration-500"
        x-transition:leave-start="max-h-[1000px] opacity-100"
        x-transition:leave-end="max-h-0 opacity-0"
        class="px-6 pb-6 text-gray-600 text-sm md:text-base leading-relaxed border-t border-gray-100 overflow-hidden"
      >
        {!! $faq['answer'] !!}
      </div>
    </div>
    @endforeach
  </div>

  {{-- CTA --}}
  <div class="mt-24 text-center">
    <p class="text-gray-700 text-lg mb-6">Masih ada pertanyaan lain?</p>
    <a href="{{ url('/presmacontact') }}"
      class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-10 py-4 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
      Hubungi Kami Sekarang
      <i data-lucide="message-circle" class="w-5 h-5"></i>
    </a>
  </div>
</section>

{{-- FOTO GEDUNG --}}
<section class="relative w-full bg-white overflow-hidden select-none pointer-events-none">
  <img alt="Gedung SMK Prestasi Prima" 
       class="w-full h-[40vh] sm:h-[55vh] lg:h-screen object-cover object-center hover:scale-[1.02] transition-transform duration-700" 
       src="{{ asset('assets/images/gedung/gedung.avif') }}">
</section>

@push('scripts')
<script>
  lucide.createIcons();
</script>
@endpush

<style>
@keyframes pulse-slow {
  0%, 100% { transform: scale(1); opacity: 0.5; }
  50% { transform: scale(1.1); opacity: 0.9; }
}
.animate-pulse-slow { animation: pulse-slow 10s ease-in-out infinite; }
</style>
@endsection
