<!-- =============== SECTION KERJA SAMA PTN =============== -->
<section id="ptn" class="relative py-16 md:py-20 bg-white overflow-hidden">

  <!-- ===== Dekorasi Latar ===== -->
  <div class="absolute inset-0 pointer-events-none">
    <img src="assets/images/section/ptn/network.svg" 
         alt=""
         class="absolute bottom-0 left-0 w-[320px] sm:w-[480px] md:w-[640px] opacity-40 object-contain">
    <img src="assets/images/section/ptn/race.svg" 
         alt=""
         class="absolute -bottom-[220px] sm:-bottom-[320px] md:-bottom-[380px] right-0 w-[340px] sm:w-[520px] md:w-[660px] opacity-40 object-contain">
  </div>

  <!-- ===== Konten ===== -->
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 text-center">
    
    <!-- Judul -->
    <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-orange-600 tracking-wide"
        data-aos="zoom-in" data-aos-duration="1000">
      LULUSAN PTN
    </h3>

    {{-- <!-- Deskripsi -->
    <p class="mt-3 sm:mt-4 text-gray-600 text-sm sm:text-base md:text-lg max-w-2xl mx-auto"
       data-aos="fade-up" data-aos-delay="100">
      SMK Prestasi Prima menjalin kerja sama dengan berbagai Perguruan Tinggi Negeri maupun Swasta ternama 
      sebagai bentuk dukungan dalam pengembangan pendidikan dan karier siswa.
    </p> --}}

    <!-- Grid Logo -->
    <div class="mt-10 sm:mt-12 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 sm:gap-8 md:gap-10 items-center justify-center">
      <!-- Daftar Logo -->
      @foreach ([
        ['unj.png', 'Universitas Negeri Jakarta'],
        ['ipb.png', 'Institut Pertanian Bogor'],
        ['unpad.png', 'Universitas Padjadjaran'],
        ['trisakti.png', 'Universitas Trisakti'],
        ['uin2.png', 'UIN Syarif Hidayatullah Jakarta'],
        ['isi2.png', 'Institut Seni Indonesia Surakarta'],
        ['politeknik.png', 'Politeknik Prestasi Prima'],
        ['ui3.png', 'Universitas Indonesia'],
      ] as $index => [$src, $alt])
        <div class="flex justify-center" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
          <img src="assets/images/section/ptn/{{ $src }}" 
               alt="{{ $alt }}" 
               class="max-h-16 sm:max-h-20 md:max-h-24 object-contain transition-transform duration-300 hover:scale-110 hover:shadow-lg mix-blend-multiply select-none">
        </div>
      @endforeach
    </div>

  </div>
</section>
