{{-- ================= SECTION VIRTUAL TOUR ================= --}}
<section id="virtual-tour" class="relative py-24 bg-gradient-to-r from-orange-50 via-white to-orange-50 overflow-hidden">

  <div class="max-w-5xl mx-auto px-4 text-center relative z-10">

    {{-- Judul --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4 tracking-tight"
        data-aos="fade-up" data-aos-duration="1000">
      Jelajahi SMK Prestasi Prima 
      <span class="text-orange-500">Secara Virtual</span>
    </h2>

    {{-- Tagline --}}
    <p class="text-lg md:text-xl text-gray-700 mb-12"
       data-aos="fade-up" data-aos-duration="1000" data-aos-delay="150">
      Rasakan pengalaman menjelajahi sekolah kami melalui tur virtual 360°, lihat fasilitas unggulan, ruang belajar, laboratorium, dan lingkungan sekolah secara interaktif.
    </p>

    {{-- Tombol CTA --}}
    <a href="{{ route('virtual-tour') }}"
       class="inline-block bg-orange-500 text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-xl hover:bg-orange-600 transition transform hover:-translate-y-1"
       data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="250">
       Mulai Virtual Tour
    </a>

    {{-- Preview Card --}}
    <div class="mt-16 flex justify-center"
         data-aos="fade-up" data-aos-duration="1000" data-aos-delay="350">
      <div class="relative w-full md:w-3/4 lg:w-1/2 rounded-xl overflow-hidden bg-white/20 backdrop-blur-md border border-white/30 shadow-lg transition-transform hover:scale-105 cursor-pointer"
           onclick="window.location='{{ route('virtual-tour') }}'">
        
        <img src="{{ asset('assets/360View/v360-1.jpg') }}" 
             alt="Preview Virtual Tour" 
             class="w-full object-cover aspect-video">

        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent flex items-end p-6">
          <h3 class="text-xl md:text-2xl font-bold text-white drop-shadow-lg">
            Klik untuk Memulai Virtual Tour
          </h3>
        </div>

        <div class="absolute top-4 right-4 bg-orange-500/80 p-3 rounded-full shadow-lg animate-bounce">
          <i class="fa-solid fa-vr-cardboard text-white text-lg md:text-xl"></i>
        </div>
      </div>
    </div>

  </div>

  {{-- Decorative shape sederhana --}}
  <div class="absolute top-0 left-0 w-64 h-64 bg-orange-200/20 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-float-slow"></div>

</section>

{{-- CSS untuk floating --}}
<style>
  @keyframes floatSlow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
  .animate-float-slow {
    animation: floatSlow 6s ease-in-out infinite;
  }
</style>

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: true });
</script>
