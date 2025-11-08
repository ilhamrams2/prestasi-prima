<!-- ================= SECTION PROGRAM KEAHLIAN ================= -->
<section id="program" class="relative bg-gray-50 py-20 overflow-hidden" data-aos="fade-up">

  <!-- ======= LOGO LATAR BELAKANG (stay di section) ======= -->
  <img src="{{ asset('assets/images/logo-smk.webp') }}"
       alt="Logo SMK Prestasi Prima" 
       class="absolute inset-0 m-auto w-[600px] opacity-5 object-contain pointer-events-none select-none">

  <div class="relative max-w-7xl mx-auto px-4 md:px-8 z-10">

    <!-- ================= HEADER ================= -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12"
         data-aos="fade-up" data-aos-delay="100">

      <div data-aos="fade-right" data-aos-delay="200">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">
          Program <span class="text-orange-600">Keahlian</span>
        </h2>
        <p class="text-gray-600 mt-3 max-w-2xl" data-aos="fade-up" data-aos-delay="300">
          Empat jurusan unggulan siap membentuk generasi kreatif dan kompeten:
          PPLG, TKJ, BCF, dan DKV — lengkap dengan kurikulum praktik industri.
        </p>
      </div>

      <div class="flex gap-3 mt-6 md:mt-0" data-aos="zoom-in" data-aos-delay="400">
        <a href="/tentang/program"
           class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg shadow-sm hover:shadow-md transition">
          Semua Program
        </a>
        <a href="/pendaftaran"
           class="inline-flex items-center gap-2 bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-orange-700 transition">
          Daftar Sekarang
        </a>
      </div>
    </div>

    <!-- ================= GRID 4 JURUSAN ================= -->
    <div id="program-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-8">

      <!-- Card: PPLG -->
      <div class="relative group rounded-xl overflow-hidden shadow-lg"
           data-aos="zoom-in-up" data-aos-delay="100">
        <img src="{{ asset('assets/images/section/program/pplg.webp') }}" alt="PPLG"
             class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="{{ asset('assets/images/section/program/icons/pplg.png') }}"
               alt="icon" class="mx-auto w-12 h-12 mb-3" data-aos="fade-up" data-aos-delay="200">
          <h3 class="text-white font-bold text-xl" data-aos="fade-up" data-aos-delay="250">
            Pengembangan Perangkat Lunak dan Gim
          </h3>
          <a href="#" data-target="pplg" aria-controls="jurusan-detail-wrapper"
             class="mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline lihat-selengkapnya"
             data-aos="fade-up" data-aos-delay="300">
             Lihat Selengkapnya
          </a>
        </div>
      </div>

      <!-- Card: TKJ -->
      <div class="relative group rounded-xl overflow-hidden shadow-lg"
           data-aos="zoom-in-up" data-aos-delay="200">
        <img src="{{ asset('assets/images/section/program/tkj.webp') }}" alt="TKJ"
             class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="{{ asset('assets/images/section/program/icons/tkj.png') }}" 
               alt="icon" class="mx-auto w-12 h-12 mb-3" data-aos="fade-up" data-aos-delay="300">
          <h3 class="text-white font-bold text-xl" data-aos="fade-up" data-aos-delay="350">
            Teknik Jaringan Komputer dan Telekomunikasi
          </h3>
          <a href="#" data-target="tkj" aria-controls="jurusan-detail-wrapper"
             class="mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline lihat-selengkapnya"
             data-aos="fade-up" data-aos-delay="400">
             Lihat Selengkapnya
          </a>
        </div>
      </div>

      <!-- Card: BCF -->
      <div class="relative group rounded-xl overflow-hidden shadow-lg"
           data-aos="zoom-in-up" data-aos-delay="300">
        <img src="{{ asset('assets/images/section/program/bcf.png') }}" alt="Broadcast"
             class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="{{ asset('assets/images/section/program/icons/bcf.png') }}" 
               alt="icon" class="mx-auto w-12 h-12 mb-3" data-aos="fade-up" data-aos-delay="400">
          <h3 class="text-white font-bold text-xl" data-aos="fade-up" data-aos-delay="450">
            Broadcast dan Film
          </h3>
          <a href="#" data-target="bcf" aria-controls="jurusan-detail-wrapper"
             class="mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline lihat-selengkapnya"
             data-aos="fade-up" data-aos-delay="500">
             Lihat Selengkapnya
          </a>
        </div>
      </div>

      <!-- Card: DKV -->
      <div class="relative group rounded-xl overflow-hidden shadow-lg"
           data-aos="zoom-in-up" data-aos-delay="400">
        <img src="{{ asset('assets/images/section/program/dkv.png') }}" alt="DKV"
             class="w-full h-96 object-cover">
        <div class="absolute inset-0 bg-black/40 transition duration-700"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-center p-8 z-10">
          <img src="{{ asset('assets/images/section/program/icons/dkv.png') }}" 
               alt="icon" class="mx-auto w-12 h-12 mb-3" data-aos="fade-up" data-aos-delay="500">
          <h3 class="text-white font-bold text-xl" data-aos="fade-up" data-aos-delay="550">
            Desain Komunikasi Visual
          </h3>
          <a href="#" data-target="dkv" aria-controls="jurusan-detail-wrapper"
             class="mt-3 inline-block text-sm text-orange-300 font-semibold hover:underline lihat-selengkapnya"
             data-aos="fade-up" data-aos-delay="600">
             Lihat Selengkapnya
          </a>
        </div>
      </div>
    </div>

    <!-- ================= DETAIL JURUSAN (DINAMIS) ================= -->
    <div id="jurusan-detail-wrapper"
         class="py-10 bg-white hidden opacity-0 transition duration-700 transform translate-y-6"
         data-aos="fade-up" data-aos-delay="200">
      <div id="jurusan-detail-content" class="max-w-7xl mx-auto px-4 md:px-8"></div>
    </div>

    <!-- ================= FEATURED & VIDEO JURUSAN ================= -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch mt-10">

      <!-- Featured Card -->
      <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-white group flex flex-col justify-end h-[480px]"
           data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
        <img src="{{ asset('assets/images/section/program/herobg.png') }}" 
             alt="Featured Program"
             class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

        <div class="relative z-10 p-8 text-white" data-aos="zoom-in" data-aos-delay="400">
          <span class="inline-block bg-orange-500/90 px-3 py-1 rounded-full text-xs font-medium tracking-wide w-fit"
                data-aos="fade-down" data-aos-delay="450">
            Unggulan
          </span>

          <h3 class="mt-4 text-3xl md:text-4xl font-extrabold leading-tight drop-shadow"
              data-aos="fade-up" data-aos-delay="500">
            Belajar Praktis — Dari Koding sampai Produksi Film
          </h3>

          <p class="mt-3 text-sm md:text-base text-orange-100/90 max-w-md"
             data-aos="fade-up" data-aos-delay="600">
            Kurikulum berbasis proyek dengan kolaborasi industri, magang, dan portofolio siap kerja.
          </p>

          <div class="mt-6 flex gap-3 flex-wrap" data-aos="zoom-in" data-aos-delay="700">
            <a href="/tentang/program"
               class="inline-flex items-center gap-2 bg-white/10 border border-white/30 text-white px-5 py-2.5 rounded-lg hover:bg-white/20 transition">
              Pelajari lebih lanjut
            </a>
            <a href="/pendaftaran"
               class="inline-flex items-center gap-2 bg-orange-500 text-white px-5 py-2.5 rounded-lg hover:bg-orange-600 transition">
              Gabung Sekarang
            </a>
          </div>
        </div>
      </div>

      <!-- Video Jurusan -->
      <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-8 flex flex-col justify-between h-[480px] relative overflow-hidden"
           data-aos="fade-left" data-aos-delay="400" data-aos-duration="1000">

        <div class="absolute -top-16 -right-16 w-64 h-64 bg-orange-100 rounded-full opacity-30 blur-2xl"></div>

        <div class="relative text-center mb-6" data-aos="fade-down" data-aos-delay="450">
          <h3 class="text-2xl font-bold text-orange-600 mb-2 flex items-center justify-center gap-2">
            <i class="ph ph-video-camera text-2xl"></i> Video Jurusan Menarik
          </h3>
          <p class="text-gray-600 italic max-w-sm mx-auto">
            Yuk kenali lebih dekat jurusan unggulan di SMK Prestasi Prima!
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 relative z-10">
          <!-- Video 1 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition group cursor-pointer"
               data-aos="zoom-in-up" data-aos-delay="500"
               onclick="openVideoModal('https://www.youtube.com/embed/Asi93VHxRgs')">
            <div class="relative">
              <img src="https://img.youtube.com/vi/Asi93VHxRgs/hqdefault.jpg"
                   class="w-full h-40 object-cover group-hover:scale-105 transition">
              <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                <i class="ph ph-play-circle text-white text-6xl"></i>
              </div>
            </div>
            <div class="p-3 text-center">
              <h4 class="font-semibold text-gray-800 text-sm">Study & Career Expo 2025</h4>
              <p class="text-xs text-gray-500">Pameran karya dan inovasi siswa dari berbagai jurusan SMK Prestasi Prima.</p>
            </div>
          </div>

          <!-- Video 2 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition group cursor-pointer"
               data-aos="zoom-in-up" data-aos-delay="650"
               onclick="openVideoModal('https://www.youtube.com/embed/zQYlLdHDCOI')">
            <div class="relative">
              <img src="https://img.youtube.com/vi/zQYlLdHDCOI/hqdefault.jpg"
                   class="w-full h-40 object-cover group-hover:scale-105 transition">
              <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                <i class="ph ph-play-circle text-white text-6xl"></i>
              </div>
            </div>
            <div class="p-3 text-center">
              <h4 class="font-semibold text-gray-800 text-sm">Saintek Semua Jurusan</h4>
              <p class="text-xs text-gray-500">Kolaborasi siswa lintas jurusan dalam ajang lomba sains dan teknologi sekolah.</p>
            </div>
          </div>
        </div>

        <div class="relative text-center mt-6" data-aos="fade-up" data-aos-delay="750">
          <a href="#galeri-video"
             class="inline-block text-orange-600 font-semibold text-sm hover:text-orange-700">
            Lihat semua video →
          </a>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- ================= STYLE ANIMASI & CUSTOM ================= -->
<style>
.fade-in-up {
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.7s cubic-bezier(.22,1,.36,1);
}
.fade-in-up.show {
  opacity: 1;
  transform: translateY(0);
}
.group:hover img {
  transform: scale(1.07);
  transition: transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
}
.group:hover .absolute.inset-0 {
  background-color: rgba(255, 165, 0, 0.25);
  transition: background-color 0.6s ease;
}
/* jurusan detail minor styling */
#jurusan-detail-wrapper { will-change: opacity, transform; }
.jurusan-detail-card { border-radius: .75rem; box-shadow: 0 12px 30px rgba(15,23,42,0.06); overflow: hidden; }
</style>

<!-- ================= SCRIPT (Animasi, Toggle Detail, Modal) ================= -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  // Intersection Observer untuk semua .fade-in-up (dipakai ulang)
  const fadeElements = document.querySelectorAll(".fade-in-up");
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add("show");
      else entry.target.classList.remove("show");
    });
  }, { threshold: 0.18 });
  fadeElements.forEach(el => io.observe(el));

  // Data detail jurusan (HTML sebagai template string)
  const details = {
    pplg: `<!-- PPLG content (same structure as your JS earlier) -->
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-orange-600">Pengembangan Perangkat Lunak dan Gim (PPLG)</h2>
        <p class="text-gray-600 mt-1">Menguasai dunia pemrograman dan industri gim modern.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/website.jpg" loading="lazy" alt="Website" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Website</h4>
            <p class="text-sm text-gray-600">Belajar HTML, CSS, JavaScript, hingga framework modern.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/android.jpg" loading="lazy" alt="Android" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Android</h4>
            <p class="text-sm text-gray-600">Membuat aplikasi mobile berbasis Android.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/game.jpg" loading="lazy" alt="Gim" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Gim</h4>
            <p class="text-sm text-gray-600">Konsep dan implementasi gim interaktif.</p>
          </div>
        </div>
      </div>
    `,
    tkj: `<!-- TKJ content -->
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-emerald-600">Teknik Jaringan Komputer & Telekomunikasi</h2>
        <p class="text-gray-600 mt-1">Mendalami jaringan, server, dan teknologi fiber-optic.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/jaringan.jpg" loading="lazy" alt="Jaringan" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Simulasi Jaringan</h4>
            <p class="text-sm text-gray-600">Konfigurasi dan analisis alur data pada jaringan.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/splicer.jpg" loading="lazy" alt="Splicer" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Alat Splicer</h4>
            <p class="text-sm text-gray-600">Teknik penggunaan splicer fiber optic.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/robotik.jpg" loading="lazy" alt="Robotik" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Robotik Arduino</h4>
            <p class="text-sm text-gray-600">Merancang robot berbasis mikrokontroler.</p>
          </div>
        </div>
      </div>
    `,
    bcf: `<!-- BCF content -->
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-violet-600">Broadcast & Film</h2>
        <p class="text-gray-600 mt-1">Produksi film, editing, dan teknik siaran studio.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/bcf-shooting.jpg" loading="lazy" alt="Shooting" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Produksi Film</h4>
            <p class="text-sm text-gray-600">Dari pra-produksi sampai pasca-editing.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/bcf-editing.jpg" loading="lazy" alt="Editing" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Editing Profesional</h4>
            <p class="text-sm text-gray-600">Pelatihan Adobe Premiere & DaVinci Resolve.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/bcf-broadcast.jpg" loading="lazy" alt="Broadcast" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Broadcast Studio</h4>
            <p class="text-sm text-gray-600">Teknik kamerawan & pencahayaan studio.</p>
          </div>
        </div>
      </div>
    `,
    dkv: `<!-- DKV content -->
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-indigo-600">Desain Komunikasi Visual</h2>
        <p class="text-gray-600 mt-1">Grafis, branding, ilustrasi, dan animasi.</p>
      </div>
      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/dkv-desain.jpg" loading="lazy" alt="Grafis" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Grafis Digital</h4>
            <p class="text-sm text-gray-600">Poster, logo, layout dengan tools industri.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/dkv-branding.jpg" loading="lazy" alt="Branding" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Branding Visual</h4>
            <p class="text-sm text-gray-600">Identitas merek & strategi visual.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
          <img src="assets/images/section/program/dkv-animasi.jpg" loading="lazy" alt="Animasi" class="w-full h-40 object-cover">
          <div class="p-4">
            <h4 class="font-semibold">Animasi 2D & 3D</h4>
            <p class="text-sm text-gray-600">Animasi untuk film pendek, iklan, dan interaktif.</p>
          </div>
        </div>
      </div>
    `
  };

  // Element references
  const links = document.querySelectorAll(".lihat-selengkapnya");
  const wrapper = document.getElementById("jurusan-detail-wrapper");
  const content = document.getElementById("jurusan-detail-content");

  // Utility: show detail (single open at a time)
  function showDetail(key) {
    if (!details[key]) return;
    // Masukkan HTML + tombol kembali
    content.innerHTML = details[key] + `
      <div class="mt-8 text-center fade-in-up">
        <a href="#" id="close-detail" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition transform hover:scale-105">
          ← Kembali ke Program
        </a>
      </div>
    `;

    // Tampilkan wrapper dengan animasi
    wrapper.classList.remove("hidden");
    // small delay agar transition terbaca
    setTimeout(() => {
      wrapper.classList.remove("opacity-0", "translate-y-6");
    }, 40);

    // Scroll halus ke wrapper
    wrapper.scrollIntoView({ behavior: "smooth", block: "start" });

    // Observe new fade-in-up elements di dalam content agar anim berjalan
    const newEls = content.querySelectorAll(".fade-in-up");
    newEls.forEach(el => io.observe(el));

    // Pasang event listener tombol close (pastikan hanya sekali)
    const closeBtn = document.getElementById("close-detail");
    if (closeBtn) {
      closeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        hideDetail();
      }, { once: true });
    }
  }

  // Utility: hide detail
  function hideDetail() {
    wrapper.classList.add("opacity-0", "translate-y-6");
    // delay hide agar anim selesai
    setTimeout(() => {
      wrapper.classList.add("hidden");
      content.innerHTML = "";
      // scroll kembali ke grid program
      const grid = document.getElementById("program-grid");
      if (grid) grid.scrollIntoView({ behavior: "smooth", block: "start" });
    }, 480);
  }

  // Attach click ke setiap link "Lihat Selengkapnya"
  links.forEach(link => {
    link.addEventListener("click", function(e) {
      e.preventDefault();
      const targetKey = this.dataset.target;
      // jika wrapper sudah terbuka dengan jurusan yang sama -> tutup
      // (alternatif: selalu replace konten)
      showDetail(targetKey);
    });
  });

  // Support keyboard ESC untuk menutup detail bila terbuka
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      if (!wrapper.classList.contains("hidden")) hideDetail();
      // juga tutup video modal jika terbuka
      closeVideoModal();
    }
  });
});

// Modal Video (simple)
function openVideoModal(url) {
  const modal = document.getElementById("videoModal");
  const iframe = document.getElementById("videoFrame");
  iframe.src = url;
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}
function closeVideoModal() {
  const modal = document.getElementById("videoModal");
  const iframe = document.getElementById("videoFrame");
  if (iframe) iframe.src = "";
  if (modal) {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }
}
</script>
