@extends('prestasiprima.index')

@section('title', 'Program Keahlian - SMK Prestasi Prima')

@section('meta')
  {{-- ===== META SEO OPTIMIZATION ===== --}}
  <meta name="description" content="SMK Prestasi Prima memiliki empat Program Keahlian unggulan: PPLG, DKV, TJKT, dan BCF. Mempersiapkan siswa menjadi profesional di dunia IT dan kreatif.">
  <meta name="keywords" content="SMK Prestasi Prima, program keahlian, jurusan SMK, PPLG, DKV, TJKT, BCF, sekolah IT terbaik, sekolah teknologi, prestasi prima">
  <meta property="og:title" content="Program Keahlian - SMK Prestasi Prima">
  <meta property="og:description" content="Kenali empat program keahlian unggulan di SMK Prestasi Prima yang mempersiapkan siswa menghadapi dunia industri digital.">
  <meta property="og:image" content="{{ asset('assets/images/gedung/gedungsiswa.avif') }}">
  <meta property="og:type" content="website">
@endsection

@section('content')
<section class="pt-32 pb-24 bg-white relative overflow-hidden">

  {{-- ==================== PROFIL JURUSAN ==================== --}}
  <div class="max-w-7xl mx-auto px-6 md:px-10 flex flex-col md:flex-row items-center gap-10 md:gap-16">
    <figure class="md:w-1/2">
      <img 
        src="{{ asset('assets/images/program/kepsek.png') }}" 
        alt="Kepala Sekolah SMK Prestasi Prima" 
        loading="lazy"
        decoding="async"
        class="w-full h-auto rounded-2xl object-cover shadow-md"
      >
    </figure>

    <div class="md:w-1/2">
      <h1 class="text-4xl md:text-5xl font-bold text-orange-600 mb-4">Profil Jurusan</h1>
      <p class="text-gray-700 leading-relaxed mb-6 text-justify">
        Di <strong>SMK Prestasi Prima</strong>, kami percaya bahwa masa depan ada di tangan para <em>digital creator</em>.
        Sebagai <strong>Sekolah IT</strong>, kami berkomitmen membentuk talenta unggul melalui empat Program Keahlian yang relevan —
        <span class="font-semibold">DKV</span>, <span class="font-semibold">BCF</span>, <span class="font-semibold">PPLG</span>, dan <span class="font-semibold">TJKT</span> —
        dengan kurikulum berbasis praktik industri. Kami memastikan setiap lulusan siap bersaing di era teknologi.
      </p>
      <a href="#daftar-jurusan" class="inline-flex items-center bg-orange-600 text-white px-5 py-3 rounded-lg font-medium hover:bg-orange-700 transition-all duration-300 focus:ring-2 focus:ring-orange-400">
        Selengkapnya <i class="ms-2 fas fa-arrow-right"></i>
      </a>
    </div>
  </div>

  {{-- ==================== JURUSAN 1 ==================== --}}
  <div class="max-w-6xl mx-auto px-6 md:px-10 mt-24 flex flex-col md:flex-row items-center gap-10">
    <div class="md:w-1/2">
      <img src="{{ asset('assets/images/program/pplg.png') }}" alt="Pengembangan Perangkat Lunak dan Gim" class="rounded-2xl w-full object-cover">
    </div>
    <div class="md:w-1/2">
      <h3 class="text-2xl md:text-3xl font-bold text-orange-600 mb-3">Pengembangan Perangkat Lunak dan Gim</h3>
      <p class="text-gray-700 mb-6 text-justify">
        Jurusan ini mengajarkan siswa cara merancang, membuat, dan menguji aplikasi perangkat lunak (desktop, web, maupun mobile)
        serta mengembangkan permainan digital (<em>game development</em>). Lulusan dipersiapkan menjadi programmer dan developer profesional.
      </p>
      <a href="#" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
        Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
      </a>
    </div>
  </div>

  {{-- ==================== JURUSAN 2 ==================== --}}
  <div class="max-w-6xl mx-auto px-6 md:px-10 mt-24 flex flex-col md:flex-row-reverse items-center gap-10">
    <div class="md:w-1/2">
      <img src="{{ asset('assets/images/program/dkv.png') }}" alt="Desain Komunikasi Visual" class="rounded-2xl w-full object-cover">
    </div>
    <div class="md:w-1/2">
      <h3 class="text-2xl md:text-3xl font-bold text-orange-600 mb-3">Desain Komunikasi Visual</h3>
      <p class="text-gray-700 mb-6 text-justify">
        Jurusan ini melatih siswa menyampaikan pesan atau informasi melalui media visual yang kreatif dan efektif. 
        Mereka belajar desain grafis, fotografi, ilustrasi, serta <em>UI/UX Design</em>. 
        Lulusan siap bekerja sebagai desainer grafis, ilustrator, atau <em>content creator</em>.
      </p>
      <a href="#" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
        Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
      </a>
    </div>
  </div>

  {{-- ==================== JURUSAN 3 ==================== --}}
  <div class="max-w-6xl mx-auto px-6 md:px-10 mt-24 flex flex-col md:flex-row items-center gap-10">
    <div class="md:w-1/2">
      <img src="{{ asset('assets/images/program/tjkt.png') }}" alt="Teknik Jaringan Komputer dan Telekomunikasi" class="rounded-2xl w-full object-cover">
    </div>
    <div class="md:w-1/2">
      <h3 class="text-2xl md:text-3xl font-bold text-orange-600 mb-3">Teknik Jaringan Komputer dan Telekomunikasi</h3>
      <p class="text-gray-700 mb-6 text-justify">
        Fokus utama jurusan ini adalah membangun, mengonfigurasi, dan merawat infrastruktur jaringan komputer dan sistem telekomunikasi. 
        Lulusan dapat menjadi teknisi jaringan, administrator server, atau spesialis keamanan siber.
      </p>
      <a href="#" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
        Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
      </a>
    </div>
  </div>

  {{-- ==================== JURUSAN 4 ==================== --}}
  <div class="max-w-6xl mx-auto px-6 md:px-10 mt-24 flex flex-col md:flex-row-reverse items-center gap-10">
    <div class="md:w-1/2">
      <img src="{{ asset('assets/images/program/bcf.png') }}" alt="Broadcasting dan Film" class="rounded-2xl w-full object-cover">
    </div>
    <div class="md:w-1/2">
      <h3 class="text-2xl md:text-3xl font-bold text-orange-600 mb-3">Broadcasting dan Film</h3>
      <p class="text-gray-700 mb-6 text-justify">
        Jurusan ini berfokus pada produksi konten audiovisual seperti penyiaran (televisi, radio) dan film. 
        Siswa belajar penyutradaraan, sinematografi, penulisan skenario, hingga editing video. 
        Lulusan siap berkarier sebagai <em>filmmaker</em> atau editor profesional.
      </p>
      <a href="#" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
        Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
      </a>
    </div>
  </div>

    {{-- ========== JURUSAN 4: BCF ========== --}}
    <article class="max-w-6xl mx-auto px-6 md:px-10 flex flex-col md:flex-row-reverse items-center gap-10 scroll-mt-20">
      <figure class="md:w-1/2">
        <img 
          src="{{ asset('assets/images/program/bcf.png') }}" 
          alt="Jurusan BCF - Broadcasting dan Film" 
          loading="lazy"
          decoding="async"
          class="rounded-2xl w-full h-auto object-cover shadow-lg"
        >
      </figure>
      <div class="md:w-1/2">
        <h2 class="text-2xl md:text-3xl font-bold text-orange-600 mb-3">Broadcasting dan Film (BCF)</h2>
        <p class="text-gray-700 mb-6 text-justify">
          Jurusan ini berfokus pada produksi konten audiovisual seperti penyiaran (televisi, radio) dan film.
          Siswa belajar penyutradaraan, sinematografi, penulisan skenario, hingga editing video.
          Lulusan siap berkarier sebagai <strong>filmmaker</strong> atau <strong>editor profesional</strong>.
        </p>
        <a href="{{ route('program.bcf') }}" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition-all duration-300 focus:ring-2 focus:ring-orange-400">
          Selengkapnya <i class="ms-2 fas fa-arrow-right"></i>
        </a>
      </div>
    </article>
  </div>
</section>

{{-- ========== STRUCTURED DATA (JSON-LD) ========== --}}
@section('structured-data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "EducationalOrganization",
  "name": "SMK Prestasi Prima",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('assets/images/logo.png') }}",
  "sameAs": [
    "https://www.instagram.com/smkprestasiprima/",
    "https://www.facebook.com/smkprestasiprima/",
    "https://www.youtube.com/@smkprestasiprima"
  ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jl. Kelapa Dua Wetan No.17, Ciracas, Jakarta Timur",
    "addressLocality": "Jakarta Timur",
    "addressRegion": "DKI Jakarta",
    "postalCode": "13730",
    "addressCountry": "ID"
  },
  "department": [
    {
      "@type": "Course",
      "name": "Pengembangan Perangkat Lunak dan Gim (PPLG)",
      "description": "Mempelajari pembuatan perangkat lunak dan pengembangan gim digital untuk berbagai platform.",
      "provider": { "@type": "EducationalOrganization", "name": "SMK Prestasi Prima" }
    },
    {
      "@type": "Course",
      "name": "Desain Komunikasi Visual (DKV)",
      "description": "Melatih kreativitas dalam menyampaikan pesan melalui desain grafis, fotografi, dan UI/UX.",
      "provider": { "@type": "EducationalOrganization", "name": "SMK Prestasi Prima" }
    },
    {
      "@type": "Course",
      "name": "Teknik Jaringan Komputer dan Telekomunikasi (TJKT)",
      "description": "Fokus pada jaringan komputer, administrasi server, dan keamanan siber.",
      "provider": { "@type": "EducationalOrganization", "name": "SMK Prestasi Prima" }
    },
    {
      "@type": "Course",
      "name": "Broadcasting dan Film (BCF)",
      "description": "Mempelajari penyutradaraan, sinematografi, penulisan skenario, dan editing video profesional.",
      "provider": { "@type": "EducationalOrganization", "name": "SMK Prestasi Prima" }
    }
  ]
}
</script>
@endsection
@endsection
