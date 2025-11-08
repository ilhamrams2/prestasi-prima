@extends('prestasiprima.index')

@section('title', 'Program Keahlian - SMK Prestasi Prima')

@section('content')
<section class="pt-32 pb-24 bg-white relative overflow-hidden">

  {{-- ==================== PROFIL JURUSAN ==================== --}}
  <div class="max-w-7xl mx-auto px-6 md:px-10 flex flex-col md:flex-row items-center gap-10 md:gap-16" data-aos="fade-up">
    <div class="md:w-1/2">
      <div class="relative rounded-2xl overflow-hidden">
        <img src="{{ asset('assets/images/program/kepsek.png') }}" alt="Kepala Sekolah" class="w-full object-cover">
      </div>
    </div>

    <div class="md:w-1/2">
      <h2 class="text-4xl md:text-5xl font-bold text-orange-600 mb-4">Profil Jurusan</h2>
      <p class="text-gray-700 leading-relaxed mb-6 text-justify">
        Di SMK Prestasi Prima, kami percaya bahwa masa depan ada di tangan para <em>digital creator</em>. 
        Sebagai Sekolah IT, kami berkomitmen membentuk talenta unggul melalui empat Program Keahlian yang relevan 
        (DKV, BCF, PPLG, dan TJKT) dengan kurikulum berbasis praktik industri. Kami memastikan setiap lulusan siap 
        bersaing di era teknologi dan menjadi bukti nyata dari visi kami dalam menghasilkan SDM IT profesional.
      </p>
      <a href="#programs" class="inline-flex items-center bg-orange-600 text-white px-5 py-3 rounded-lg font-medium hover:bg-orange-700 transition scroll-link">
        Selengkapnya <i class="ms-2 ri-arrow-down-line"></i>
      </a>
    </div>
  </div>

  {{-- ==================== PROGRAM JURUSAN ==================== --}}
  <div id="programs" class="mt-24 space-y-24">

    {{-- JURUSAN 1 --}}
    <div class="max-w-6xl mx-auto px-6 md:px-10 flex flex-col md:flex-row items-center gap-10" data-aos="fade-right">
      <div class="md:w-1/2">
        <img src="{{ asset('assets/images/program/pplg.png') }}" alt="Pengembangan Perangkat Lunak dan Gim" class="rounded-2xl w-full object-cover">
      </div>
      <div class="md:w-1/2">
        <h3 class="text-2xl md:text-3xl font-bold text-orange-600 mb-3">Pengembangan Perangkat Lunak dan Gim</h3>
        <p class="text-gray-700 mb-6 text-justify">
          Jurusan ini mengajarkan siswa cara merancang, membuat, dan menguji aplikasi perangkat lunak (desktop, web, maupun mobile)
          serta mengembangkan permainan digital (<em>game development</em>). Lulusan dipersiapkan menjadi programmer dan developer profesional.
        </p>
        <a href="{{ route('program.pplg') }}" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
          Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
        </a>
      </div>
    </div>

    {{-- JURUSAN 2 --}}
    <div class="max-w-6xl mx-auto px-6 md:px-10 flex flex-col md:flex-row-reverse items-center gap-10" data-aos="fade-left">
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
        <a href="{{ route('program.dkv') }}" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
          Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
        </a>
      </div>
    </div>

    {{-- JURUSAN 3 --}}
    <div class="max-w-6xl mx-auto px-6 md:px-10 flex flex-col md:flex-row items-center gap-10" data-aos="fade-right">
      <div class="md:w-1/2">
        <img src="{{ asset('assets/images/program/tjkt.png') }}" alt="Teknik Jaringan Komputer dan Telekomunikasi" class="rounded-2xl w-full object-cover">
      </div>
      <div class="md:w-1/2">
        <h3 class="text-2xl md:text-3xl font-bold text-orange-600 mb-3">Teknik Jaringan Komputer dan Telekomunikasi</h3>
        <p class="text-gray-700 mb-6 text-justify">
          Fokus utama jurusan ini adalah membangun, mengonfigurasi, dan merawat infrastruktur jaringan komputer dan sistem telekomunikasi. 
          Lulusan dapat menjadi teknisi jaringan, administrator server, atau spesialis keamanan siber.
        </p>
        <a href="{{ route('program.tjkt') }}" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
          Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
        </a>
      </div>
    </div>

    {{-- JURUSAN 4 --}}
    <div class="max-w-6xl mx-auto px-6 md:px-10 flex flex-col md:flex-row-reverse items-center gap-10" data-aos="fade-left">
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
        <a href="{{ route('program.bcf') }}" class="inline-flex items-center bg-orange-600 text-white px-5 py-2.5 rounded-lg font-medium hover:bg-orange-700 transition">
          Selengkapnya <i class="ms-2 ri-arrow-right-line"></i>
        </a>
      </div>
    </div>

  </div>

</section>
@endsection

@section('scripts')
{{-- AOS Animation & Smooth Scroll --}}
<script>
  const initAOSProgram = () => {
    const config = { duration: 1000, once: true };
    if (window.initAOS) {
      return window.initAOS(config);
    }
    if (typeof window.ensureAOS === 'function') {
      return window.ensureAOS().then((AOS) => {
        AOS.init(config);
        return AOS;
      });
    }
    if (window.AOS) {
      window.AOS.init(config);
      return Promise.resolve(window.AOS);
    }
    return Promise.reject(new Error('AOS loader is not available.'));
  };

  initAOSProgram().catch((error) => {
    console.error('Failed to initialize AOS on Program page', error);
  });

  // Smooth scroll
  document.querySelectorAll('.scroll-link').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const target = document.querySelector(link.getAttribute('href'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
</script>
@endsection
