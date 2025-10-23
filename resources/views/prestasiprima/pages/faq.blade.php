@extends('prestasiprima.index')

@section('title', 'FAQ Sekolah Prestasi Prima')

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
      Klik atau arahkan kursor pada pertanyaan untuk melihat jawabannya.
    </p>
  </div>

  {{-- Grid FAQ --}}
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 px-6">
    @php
      $faqs = [
        ['icon' => 'GraduationCap', 'question' => 'Bagaimana cara mendaftar di Sekolah Prestasi Prima?', 'answer' => 'Pendaftaran dapat dilakukan secara online melalui laman resmi sekolah, atau dengan datang langsung ke bagian administrasi sambil membawa dokumen yang dibutuhkan.'],
        ['icon' => 'Clock', 'question' => 'Kapan penerimaan siswa baru dibuka?', 'answer' => 'Pendaftaran biasanya dimulai pada bulan Januari hingga Juli. Informasi lebih lanjut akan diumumkan di website dan media sosial sekolah.'],
        ['icon' => 'Award', 'question' => 'Apakah sekolah ini menyediakan program beasiswa?', 'answer' => 'Ya, kami menyediakan berbagai program beasiswa akademik dan non-akademik bagi siswa berprestasi dan siswa dari keluarga kurang mampu.'],
        ['icon' => 'Lightbulb', 'question' => 'Bagaimana sistem pembelajaran di Sekolah Prestasi Prima?', 'answer' => 'Kami menggabungkan metode pembelajaran konvensional dengan teknologi digital, membangun karakter, kreativitas, dan kolaborasi siswa.'],
        ['icon' => 'Building2', 'question' => 'Apa saja fasilitas unggulan sekolah?', 'answer' => 'Kami memiliki laboratorium komputer, perpustakaan modern, ruang multimedia, lapangan olahraga, dan area belajar yang nyaman serta aman.'],
        ['icon' => 'PhoneCall', 'question' => 'Bagaimana cara menghubungi pihak sekolah?', 'answer' => 'Anda dapat menghubungi kami melalui halaman Kontak, email resmi, atau datang langsung ke sekolah pada jam operasional (Senin–Jumat, 08.00–15.00).'],
      ];
    @endphp

    @foreach ($faqs as $index => $faq)
    <div 
      class="relative bg-white backdrop-blur-xl rounded-2xl border border-gray-100 shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden cursor-pointer group"
      @click="open === {{ $index }} ? open = null : open = {{ $index }}"
      @mouseenter="window.innerWidth >= 768 ? open = {{ $index }} : null"
      @mouseleave="window.innerWidth >= 768 ? open = null : null"
      :class="{ 'ring-2 ring-orange-400/70 scale-[1.02]': open === {{ $index }} }"
    >
      {{-- Pertanyaan --}}
      <div class="flex items-center gap-4 px-6 py-6">
        <div class="p-3 rounded-xl bg-orange-100 text-orange-500 shadow-md group-hover:bg-orange-500 group-hover:text-white transition-all duration-300">
          <i data-lucide="{{ $faq['icon'] }}" class="w-6 h-6"></i>
        </div>
        <h2 class="text-lg md:text-xl font-semibold text-gray-800 leading-snug flex-1">
          {{ $faq['question'] }}
        </h2>
        <i 
          data-lucide="chevron-down" 
          class="w-5 h-5 text-orange-400 transition-transform duration-300"
          :class="{ 'rotate-180 text-orange-600': open === {{ $index }} }"
        ></i>
      </div>

      {{-- Jawaban --}}
      <div 
        x-show="open === {{ $index }}"
        x-collapse
        class="px-6 pb-6 text-gray-600 text-sm md:text-base leading-relaxed border-t border-gray-100"
      >
        {{ $faq['answer'] }}
      </div>
    </div>
    @endforeach
  </div>

  {{-- CTA --}}
  <div class="mt-24 text-center">
    <p class="text-gray-700 text-lg mb-6">Masih ada pertanyaan lain?</p>
    <a href="#"
      class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-10 py-4 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
      Hubungi Kami Sekarang
      <i data-lucide="message-circle" class="w-5 h-5"></i>
    </a>
  </div>
</section>

{{-- Lucide Icons --}}
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
