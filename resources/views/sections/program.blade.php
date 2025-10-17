<!-- ================= SECTION PROGRAM KEAHLIAN ================= -->
<section id="program" class="bg-gray-50 py-20">
  <div class="max-w-7xl mx-auto px-4 md:px-8">

    <!-- Judul -->
    <div class="text-right mb-12 fade-in-up">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
        Program <span class="text-orange-600">Keahlian</span>
      </h2>
      <p class="text-gray-600 max-w-3xl ml-auto">
        Empat jurusan unggulan siap membentukmu jadi generasi kreatif dan kompeten.  
        PPLG dengan dunia coding dan gim, TKJ untuk keahlian jaringan, DKV yang mengekspresikan ide melalui desain,  
        hingga BCF yang mengasah talenta film dan broadcasting.
      </p>
    </div>

    <!-- Grid Program -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Card Template -->
      <div class="relative group rounded-xl overflow-hidden shadow-lg fade-in-up" data-delay="0.1">
        <img src="assets/images/section/program/pplg.png" alt="PPLG" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition-colors duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="assets/images/section/program/icons/pplg.png" alt="icon" class="mx-auto w-12 h-12 mb-3">
          <h3 class="text-white font-bold text-xl">Pengembangan Perangkat Lunak dan Gim</h3>
          <a href="#" class="lihat-selengkapnya mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline"
             data-target="pplg">Lihat Selengkapnya</a>
        </div>
      </div>

      <div class="relative group rounded-xl overflow-hidden shadow-lg fade-in-up" data-delay="0.2">
        <img src="assets/images/section/program/tkj.png" alt="TKJ" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition-colors duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="assets/images/section/program/icons/tkj.png" alt="icon" class="mx-auto w-12 h-12 mb-3">
          <h3 class="text-white font-bold text-xl">Teknik Jaringan Komputer dan Telekomunikasi</h3>
          <a href="#" class="lihat-selengkapnya mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline"
             data-target="tkj">Lihat Selengkapnya</a>
        </div>
      </div>

      <div class="relative group rounded-xl overflow-hidden shadow-lg fade-in-up" data-delay="0.3">
        <img src="assets/images/section/program/bcf.png" alt="Broadcast" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition-colors duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="assets/images/section/program/icons/bcf.png" alt="icon" class="mx-auto w-12 h-12 mb-3">
          <h3 class="text-white font-bold text-xl">Broadcast dan Film</h3>
          <a href="#" class="lihat-selengkapnya mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline"
             data-target="bcf">Lihat Selengkapnya</a>
        </div>
      </div>

      <div class="relative group rounded-xl overflow-hidden shadow-lg fade-in-up" data-delay="0.4">
        <img src="assets/images/section/program/dkv.png" alt="DKV" class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition-colors duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="assets/images/section/program/icons/dkv.png" alt="icon" class="mx-auto w-12 h-12 mb-3">
          <h3 class="text-white font-bold text-xl">Desain Komunikasi Visual</h3>
          <a href="#" class="lihat-selengkapnya mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline"
             data-target="dkv">Lihat Selengkapnya</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SECTION DETAIL JURUSAN ================= -->
<section id="jurusan-detail-wrapper" class="py-20 bg-white hidden opacity-0 transform translate-y-10 transition-all duration-700">
  <div class="max-w-7xl mx-auto px-4 md:px-8" id="jurusan-detail-content"></div>
</section>

<!-- ================= STYLE ANIMASI ================= -->
<style>
.fade-in-up {
  opacity: 0;
  transform: translateY(20px) scale(0.97);
  transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
}
.fade-in-up.show {
  opacity: 1;
  transform: translateY(0) scale(1);
}

/* Card hover effect */
.group:hover img {
  transform: scale(1.07);
  transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
}
.group:hover .absolute.inset-0 {
  background-color: rgba(255, 165, 0, 0.3);
  transition: background-color 0.6s ease;
}

/* Tombol kembali */
#close-detail {
  transition: all 0.3s ease;
}
#close-detail:hover {
  transform: scale(1.05);
  background-color: #f3f3f3;
}
</style>

<!-- ================= SCRIPT TOGGLE & ANIMASI ================= -->
@push('scripts')
<script src="{{ asset('assets/js/prestasiprima/program.js') }}"></script>
@endpush