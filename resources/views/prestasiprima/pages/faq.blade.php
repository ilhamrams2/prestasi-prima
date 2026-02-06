@extends('prestasiprima.index')

@section('title', 'FAQ — SMK Prestasi Prima')

@push('styles')
<style>
  :root {
    --action-orange: #FF6B00;
    --deep-navy: #0e162e;
    --charcoal: #333333;
  }

  .font-outfit { font-family: 'Outfit', sans-serif; }
  .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

  .text-mask-hero {
    font-size: clamp(3.2rem, 10vw, 8rem);
    font-weight: 950;
    line-height: 0.9;
    letter-spacing: -0.04em;
    background: linear-gradient(135deg, var(--deep-navy) 0%, #1a2a4e 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-transform: uppercase;
  }

  .text-ghost {
    position: absolute;
    font-family: 'Outfit', sans-serif;
    font-size: clamp(8rem, 25vw, 25rem);
    font-weight: 900;
    line-height: 1;
    color: rgba(230, 81, 0, 0.05);
    -webkit-text-stroke: 1px rgba(230, 81, 0, 0.15);
    white-space: nowrap;
    z-index: 0;
    pointer-events: none;
    text-transform: uppercase;
  }

  .highlight-orange {
    background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .faq-card {
    background: #FFFFFF;
    border: 1px solid rgba(14, 22, 46, 0.08);
    border-radius: 24px;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
  }

  .faq-card.active {
    border-color: var(--action-orange);
    box-shadow: 0 20px 40px -15px rgba(255, 107, 0, 0.1);
  }

  .faq-icon-box {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: #f8f9fa;
    color: var(--deep-navy);
    transition: all 0.3s ease;
  }

  .faq-card.active .faq-icon-box {
    background: var(--action-orange);
    color: #FFFFFF;
  }
</style>
@endpush

@section('content')
<div class="bg-white overflow-hidden relative" x-data="{ openFaq: null }">
  
  {{-- ========== HERO SECTION ========== --}}
  <section class="pt-48 pb-20 px-6 bg-white relative">
    <!-- Ghost Background Text -->
    <div class="text-ghost top-24 -left-20">HELP</div>
    
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="flex flex-col items-start gap-6 mb-16" data-aos="fade-up">
        <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-orange-50 border border-orange-100">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
          </span>
          <span class="font-outfit text-[10px] font-bold uppercase tracking-[0.2em] text-[#FF6B00]">Information Center</span>
        </div>
      </div>

      <div class="grid lg:grid-cols-12 gap-12 items-end mb-16">
        <div class="lg:col-span-12" data-aos="fade-up" data-aos-delay="100">
          <h1 class="font-outfit text-mask-hero">
            Jawaban Tepat, <br>
            <span class="highlight-orange">Langkah Pasti.</span>
          </h1>
        </div>
      </div>
      
      <div class="lg:col-span-10" data-aos="fade-up" data-aos-delay="200">
        <p class="font-jakarta text-gray-400 text-xl md:text-3xl font-medium leading-[1.4] max-w-5xl tracking-tight">
          Temukan informasi pendukung untuk memudahkan perjalanan pendidikan Anda di <span class="text-charcoal font-black border-b-4 border-orange-500/20">SMK Prestasi Prima</span> melalui panduan tanya-jawab ini.
        </p>
      </div>
    </div>
  </section>

  {{-- ========== FAQ LIST SECTION ========== --}}
  <section class="py-24 px-6 bg-gray-50/50">
    <div class="max-w-4xl mx-auto space-y-6">
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
        class="faq-card group overflow-hidden cursor-pointer"
        :class="{ 'active': openFaq === {{ $index }} }"
        @click="openFaq === {{ $index }} ? openFaq = null : openFaq = {{ $index }}"
        data-aos="fade-up"
        data-aos-delay="{{ $index * 50 }}"
      >
        <div class="p-6 md:p-8 flex items-center gap-6">
          <div class="faq-icon-box shrink-0 group-hover:scale-110 transition-transform">
            <iconify-icon icon="lucide:help-circle" class="text-2xl"></iconify-icon>
          </div>
          <h3 class="font-outfit text-lg md:text-xl font-bold text-[#0e162e] flex-1 leading-tight">
            {{ $faq['question'] }}
          </h3>
          <iconify-icon 
            icon="lucide:chevron-down" 
            class="text-2xl text-gray-300 transition-transform duration-500"
            :class="{ 'rotate-180 text-orange-500': openFaq === {{ $index }} }"
          ></iconify-icon>
        </div>

        <div 
          x-show="openFaq === {{ $index }}"
          x-collapse
          class="px-8 pb-8 md:px-[110px]"
        >
          <div class="pt-6 border-t border-gray-50 font-jakarta text-gray-500 leading-relaxed text-base md:text-lg">
            {!! $faq['answer'] !!}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  {{-- ================= FULL WIDTH BUILDING ================= --}}
  <section class="relative py-24 px-6 bg-white">
      <div class="max-w-7xl mx-auto">
          <div class="relative rounded-[60px] overflow-hidden shadow-2xl group" data-aos="zoom-in">
              <img src="{{ asset('assets/images/gedung/gedung.avif') }}" 
                   alt="SMK Prestasi Prima" 
                   class="w-full h-[60vh] object-cover transform transition-transform duration-1000 group-hover:scale-110">
              <div class="absolute inset-0 bg-gradient-to-t from-[#FF6B00]/60 to-transparent flex flex-col justify-end p-12 md:p-20">
                  <h3 class="text-white text-4xl md:text-6xl font-black mb-4">Langkah Pertama <br> Menuju Sukses.</h3>
                  <a href="{{ route('pendaftaran') }}" class="px-10 py-5 bg-white text-[#FF6B00] font-black rounded-2xl w-fit shadow-xl hover:bg-orange-50 transition-colors">
                      Mulai Masa Depan Anda →
                  </a>
              </div>
          </div>
      </div>
  </section>

</div>

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    if (window.initAOS) {
      window.initAOS({ duration: 1000, once: true }).catch(e => console.error(e));
    }
  });
</script>
@endpush
@endsection
