<!-- ================= HERO BANNER ================= -->
<section role="banner" class="relative bg-orange-500 overflow-hidden">

    <!-- ===== Dekorasi Jaringan ===== -->
    <img src="assets/images/section/presmalancer/jaringan.png" alt="Network Top Right"
        class="absolute top-0 right-0 w-64 sm:w-80 md:w-96 object-cover opacity-90 brightness-125">
    <img src="assets/images/section/presmalancer/jaringan2.png" alt="Network Bottom Left"
        class="absolute bottom-0 left-0 w-24 sm:w-32 md:w-40 object-cover opacity-70">

    <!-- ===== Konten Utama ===== -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 md:px-12 py-12 grid md:grid-cols-12 items-center gap-6">

        <!-- ===== Bagian Kiri: Teks dan Logo ===== -->
        <div class="md:col-span-8 text-white space-y-4 sm:space-y-6 md:pr-8 text-center md:text-left">

            <!-- Logo (desktop) -->
            <div class="flex justify-center md:justify-start gap-3 sm:gap-4 mb-2 hidden md:flex">
                <img src="assets/images/section/presmalancer/logo.webp" alt="Logo 1"
                    class="h-10 sm:h-12 drop-shadow-md">
                <img src="assets/images/section/presmalancer/yayasan.png" alt="Logo 2"
                    class="h-10 sm:h-12 drop-shadow-md">
            </div>

            <!-- Deskripsi -->
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold leading-snug max-w-2xl mx-auto md:mx-0">
                Presmalance hadir untuk siswa dan alumni SMK. Temukan magang, kerja paruh waktu, dan proyek freelance
                sesuai keahlianmu. Tingkatkan skill dan wujudkan karier impianmu!
            </h2>

            <!-- Tombol -->
            <a href="/presmalance" class="inline-flex items-center px-5 py-2.5 font-semibold rounded-lg shadow 
                bg-white text-orange-600 hover:bg-gray-100 hover:scale-105 transition-all w-max mx-auto md:mx-0">
                Presmalancer <span class="ml-2">→</span>
            </a>
        </div>

        <!-- ===== Bagian Kanan: Gambar Siswa ===== -->
<div class="relative md:col-span-4 flex justify-center md:justify-end mt-6 md:mt-0">
  <div class="relative flex items-center justify-center">

    <!-- === Lingkaran hanya muncul di MOBILE === -->
    <div class="absolute w-[340px] h-[340px] sm:w-[400px] sm:h-[400px] bg-white/25 rounded-full block md:hidden"></div>
    <div class="absolute w-[260px] h-[260px] sm:w-[320px] sm:h-[320px] bg-white/40 rounded-full block md:hidden"></div>

    <!-- ===== Gambar Siswa + Efek Blur ===== -->
    <div class="relative flex items-center justify-center">
      <img 
        src="assets/images/section/presmalancer/siswa1.png" 
        alt="Siswa" 
        class="relative z-20 max-h-[420px] sm:max-h-[440px] object-contain drop-shadow-2xl select-none">

      <!-- ===== Efek Blur Menyatu (Desktop & Mobile) ===== -->
      <div class="absolute bottom-0 left-1/2 -translate-x-1/2 rounded-t-full z-30
                  w-[65%] h-14 sm:w-[70%] sm:h-16 
                  md:w-[85%] md:h-24 
                  bg-gradient-to-t from-orange-500/95 via-orange-500/70 to-transparent 
                  backdrop-blur-[6px] md:backdrop-blur-[10px] 
                  transition-all duration-500 ease-in-out">
      </div>
    </div>
  </div>
</div>


        <!-- ===== Lingkaran Background di Desktop ===== -->
        <div class="absolute top-1/2 left-[12%] -translate-y-1/2 
                w-[400px] sm:w-[500px] md:w-[600px] 
                h-[400px] sm:h-[500px] md:h-[600px] 
                bg-white/20 rounded-full hidden md:block"></div>
                bg-white/20 rounded-full hidden md:block"></div>

        <div class="absolute top-1/2 left-[35%] -translate-x-1/2 -translate-y-1/2 
                w-[300px] sm:w-[350px] md:w-[400px] 
                h-[300px] sm:h-[350px] md:h-[400px] 
                bg-white/40 rounded-full hidden md:block"></div>
    </div>

    <!-- ===== Logo Sekolah (Desktop Only) ===== -->
    <img src="assets/images/section/presmalancer/logo.webp" alt="Logo Sekolah" class="absolute bottom-0 -right-16 sm:-right-20 md:-right-24 
              w-36 sm:w-40 md:w-48 opacity-50 pointer-events-none hidden md:block">

    <!-- ===== Logo (Mobile di pojok kiri atas) ===== -->
    <div class="absolute top-4 left-4 flex gap-2 md:hidden z-30">
        <img src="assets/images/section/presmalancer/logo.webp" alt="Logo Mobile 1" class="h-8 sm:h-9 drop-shadow-md">
        <img src="assets/images/section/presmalancer/yayasan.png" alt="Logo Mobile 2" class="h-8 sm:h-9 drop-shadow-md">
    </div>

</section>

<!-- ======= RESPONSIVE STYLE ======= -->
<style>
    @media (max-width: 768px) {
        section[role="banner"] .grid {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: center !important;
            text-align: center !important;
            padding: 4rem 1rem 3.5rem !important;
            gap: 0.5rem !important;
            /* jarak antar elemen lebih rapat */
        }

        /* Gambar di tengah, sedikit lebih dekat ke teks */
        section[role="banner"] .md\:col-span-4 {
            order: -1 !important;
            margin-bottom: 0.5rem !important;
            /* jarak bawah lebih kecil */
        }

        section[role="banner"] img[alt="Siswa"] {
            position: relative !important;
            z-index: 20 !important;
            max-height: 230px !important;
            margin: 0 auto 0.3rem !important;
            /* jarak ke bawah teks lebih rapat */
        }

        /* Sembunyikan logo di bawah teks */
        section[role="banner"] .md\:col-span-8>div:first-child {
            display: none !important;
        }

        /* Teks lebih rapat dan kecil */
        section[role="banner"] .md\:col-span-8 h2 {
            font-size: 0.95rem !important;
            line-height: 1.45 !important;
            width: 90% !important;
            margin: 0.25rem auto !important;
        }

        /* Tombol lebih dekat dengan teks */
        section[role="banner"] .md\:col-span-8 a {
            font-size: 0.9rem !important;
            margin: 0.3rem auto 0 !important;
            padding: 0.5rem 1.2rem !important;
        }

        /* Hilangkan logo pojok kanan bawah */
        section[role="banner"] img[alt="Logo Sekolah"] {
            display: none !important;
        }
    }
</style>