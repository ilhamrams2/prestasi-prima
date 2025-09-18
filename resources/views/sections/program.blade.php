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
<script>
document.addEventListener("DOMContentLoaded", () => {
  const links = document.querySelectorAll(".lihat-selengkapnya");
  const wrapper = document.getElementById("jurusan-detail-wrapper");
  const content = document.getElementById("jurusan-detail-content");

  // Data detail jurusan
  const details = {
    pplg: `
      <div class="mb-12 text-center fade-in-up show"> 
        <h2 class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">Pengembangan Perangkat Lunak dan Gim (PPLG)</h2>
        <p class="text-gray-700 text-lg">Menguasai dunia pemrograman dan industri gim modern</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up">
          <img src="assets/images/section/program/website.jpg" alt="Website" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="font-bold text-lg text-gray-900 mb-2">Pengembangan <span class="text-orange-600">Website</span></h3>
            <p class="text-gray-600">Belajar HTML, CSS, JavaScript, hingga framework modern.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.1s">
          <img src="assets/images/section/program/android.jpg" alt="Android" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="font-bold text-lg text-gray-900 mb-2">Pengembangan <span class="text-orange-600">Android</span></h3>
            <p class="text-gray-600">Membuat aplikasi mobile berbasis Android.</p>
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.2s">
          <img src="assets/images/section/program/game.jpg" alt="Gim" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="font-bold text-lg text-gray-900 mb-2">Pengembangan <span class="text-orange-600">Gim</span></h3>
            <p class="text-gray-600">Mempelajari konsep, desain, hingga implementasi gim interaktif.</p>
          </div>
        </div>
      </div>
    `,
    tkj: `
  <div class="mb-12 text-center fade-in-up show">
    <h2 class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">Teknik Jaringan Komputer dan Telekomunikasi (TJKT)</h2>
    <p class="text-gray-700 text-lg">Mendalami jaringan komputer, server, serta teknologi robotic berbasis Arduino dan fiber optic. Siap menghadapi dunia IT profesional.</p>
  </div>
  <div class="grid md:grid-cols-3 gap-8">
    <!-- Card 1 -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up">
      <img src="assets/images/section/program/jaringan.jpg" alt="Simulasi Jaringan" class="w-full h-48 object-cover">
      <div class="p-6">
        <h3 class="font-bold text-lg text-gray-900 mb-2">Konfigurasi <span class="text-orange-600">Simulasi Jaringan</span></h3>
        <p class="text-gray-600">Belajar membuat dan mengonfigurasi jaringan simulasi untuk memahami alur data dan komunikasi perangkat.</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.1s">
      <img src="assets/images/section/program/splicer.jpg" alt="Alat Splicer" class="w-full h-48 object-cover">
      <div class="p-6">
        <h3 class="font-bold text-lg text-gray-900 mb-2">Menjelaskan <span class="text-orange-600">Alat Splicer</span></h3>
        <p class="text-gray-600">Memahami fungsi, cara kerja, dan teknik penggunaan alat splicer dalam jaringan fiber optic.</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.2s">
      <img src="assets/images/section/program/robotik.jpg" alt="Robotic Arduino" class="w-full h-48 object-cover">
      <div class="p-6">
        <h3 class="font-bold text-lg text-gray-900 mb-2">Membuat <span class="text-orange-600">Robotic dari Arduino</span></h3>
        <p class="text-gray-600">Merancang dan membuat robot berbasis Arduino untuk aplikasi praktis dan pemrograman embedded system.</p>
      </div>
    </div>
  </div>
`,
    bcf: `
      <div class="mb-12 text-center fade-in-up show">
        <h2 class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">Broadcast dan Film (BCF)</h2>
        <p class="text-gray-700 text-lg">Fokus pada produksi film, editing video, dan broadcasting profesional.</p>
      </div>
      <img src="assets/images/section/program/bcf-detail.jpg" alt="BCF" class="rounded-xl shadow-lg mb-8 mx-auto fade-in-up">
    `,
    dkv: `
      <div class="mb-12 text-center fade-in-up show">
        <h2 class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">Desain Komunikasi Visual (DKV)</h2>
        <p class="text-gray-700 text-lg">Desain grafis, ilustrasi, animasi, hingga visual branding kreatif.</p>
      </div>
      <img src="assets/images/section/program/dkv-detail.jpg" alt="DKV" class="rounded-xl shadow-lg mb-8 mx-auto fade-in-up">
    `
  };

  // Fungsi buka detail
  links.forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault();
      const target = link.dataset.target;
      content.innerHTML = details[target] + `
        <div class="mt-12 text-center fade-in-up">
          <a href="#" id="close-detail" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition transform hover:scale-105">
            ← Kembali ke Program
          </a>
        </div>
      `;
      wrapper.classList.remove("hidden");
      setTimeout(() => wrapper.classList.remove("opacity-0", "translate-y-10"), 50);
      wrapper.scrollIntoView({ behavior: "smooth" });

      document.getElementById("close-detail").addEventListener("click", e => {
        e.preventDefault();
        wrapper.classList.add("opacity-0", "translate-y-10");
        setTimeout(() => {
          wrapper.classList.add("hidden");
          content.innerHTML = "";
          document.getElementById("program").scrollIntoView({ behavior: "smooth" });
        }, 500);
      });

      // Re-observe animasi baru
      const newElements = content.querySelectorAll(".fade-in-up");
      newElements.forEach(el => observer.observe(el));
    });
  });

  // Intersection Observer untuk animasi scroll
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      }
    });
  }, { threshold: 0.2 });

  // Observe semua element fade-in-up
  document.querySelectorAll(".fade-in-up").forEach(el => observer.observe(el));
});
</script>
