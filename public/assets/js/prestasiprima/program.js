<<<<<<< HEAD
document.addEventListener('DOMContentLoaded', () => {
  // Elements
  const links = document.querySelectorAll('.lihat-selengkapnya');
  const wrapper = document.getElementById('jurusan-detail-wrapper');
  const bg = document.getElementById('jurusan-detail-bg');
  const panel = document.getElementById('jurusan-detail');
  const content = document.getElementById('jurusan-detail-content');

  // DATA (ke isi dengan html string seperti yang sudah ada di program.js)
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

  // Intersection Observer untuk animasi fade-in-up
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) e.target.classList.add('show');
    });
  }, { threshold: 0.18 });

  document.querySelectorAll('.fade-in-up').forEach(el => io.observe(el));

  // Show panel
  function openDetail(key) {
    if (!details[key]) return;
    content.innerHTML = details[key] + `
      <div class="mt-6 text-right">
        <button id="close-detail" class="inline-flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
          ← Tutup
        </button>
      </div>
    `;
    // observe new fade-in-up inside content
    content.querySelectorAll('.fade-in-up').forEach(el => io.observe(el));

    wrapper.classList.add('active');
    panel.scrollIntoView({ behavior: 'smooth', block: 'center' });
    // set aria-expanded on clicked link handled in handler
  }

  // Close panel
  function closeDetail() {
    wrapper.classList.remove('active');
    // small delay to allow transition then clear content
    setTimeout(() => content.innerHTML = '', 400);
  }

  // Delegated handlers (prevents multi-binding)
  document.body.addEventListener('click', (e) => {
    const targ = e.target.closest('.lihat-selengkapnya');
    if (targ) {
      e.preventDefault();
      const key = targ.dataset.target;
      openDetail(key);
      // mark aria-expanded
      targ.setAttribute('aria-expanded', 'true');
      return;
    }
    if (e.target.id === 'close-detail' || e.target.closest('#jurusan-detail-bg')) {
      e.preventDefault();
      closeDetail();
      // restore aria-expanded for any active links
      document.querySelectorAll('.lihat-selengkapnya[aria-expanded="true"]').forEach(el => el.setAttribute('aria-expanded','false'));
    }
  });

  // close on ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeDetail();
  });
=======
document.addEventListener("DOMContentLoaded", () => {
  const links = document.querySelectorAll(".lihat-selengkapnya");
  const wrapper = document.getElementById("jurusan-detail-wrapper");
  const content = document.getElementById("jurusan-detail-content");

  // ==================== DATA DETAIL JURUSAN ====================
  const details = {
    pplg: `
      <div class="mb-12 text-center fade-in-up show"> 
        <h2 class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">Pengembangan Perangkat Lunak dan Gim (PPLG)</h2>
        <p class="text-gray-700 text-lg">Menguasai dunia pemrograman dan industri gim modern</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        ${createCard("website.jpg", "Website", "Pengembangan", "Website", "Belajar HTML, CSS, JavaScript, hingga framework modern.")}
        ${createCard("android.jpg", "Android", "Pengembangan", "Android", "Membuat aplikasi mobile berbasis Android.", 0.1)}
        ${createCard("game.jpg", "Gim", "Pengembangan", "Gim", "Mempelajari konsep, desain, hingga implementasi gim interaktif.", 0.2)}
      </div>
    `,
    // --- lanjut untuk tkj, bcf, dkv (tetap seperti struktur sebelumnya) ---
    // kamu bisa isi sama persis seperti kode awal kamu, tapi sudah lebih rapi
  };

  // ==================== HELPER: BUAT KARTU DETAIL ====================
  function createCard(img, alt, prefix, highlight, desc, delay = 0) {
    return `
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:${delay}s">
        <img src="assets/images/section/program/${img}" alt="${alt}" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">${prefix} <span class="text-orange-600">${highlight}</span></h3>
          <p class="text-gray-600">${desc}</p>
        </div>
      </div>
    `;
  }

  // ==================== FUNGSI: TAMPILKAN DETAIL ====================
  function showDetail(target) {
    if (!details[target]) return;
    content.innerHTML = `
      ${details[target]}
      <div class="mt-12 text-center fade-in-up">
        <a href="#" id="close-detail" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition transform hover:scale-105">
          ← Kembali ke Program
        </a>
      </div>
    `;
    wrapper.classList.remove("hidden");
    setTimeout(() => wrapper.classList.remove("opacity-0", "translate-y-10"), 50);
    wrapper.scrollIntoView({ behavior: "smooth" });
    observeElements(content.querySelectorAll(".fade-in-up"));
    bindCloseButton();
  }

  // ==================== FUNGSI: TUTUP DETAIL ====================
  function hideDetail() {
    wrapper.classList.add("opacity-0", "translate-y-10");
    setTimeout(() => {
      wrapper.classList.add("hidden");
      content.innerHTML = "";
      document.getElementById("program").scrollIntoView({ behavior: "smooth" });
    }, 500);
  }

  // ==================== EVENT HANDLER ====================
  links.forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault();
      showDetail(link.dataset.target);
    });
  });

  function bindCloseButton() {
    const closeBtn = document.getElementById("close-detail");
    if (closeBtn) closeBtn.addEventListener("click", e => {
      e.preventDefault();
      hideDetail();
    });
  }

  // ==================== ANIMASI INTERSECTION OBSERVER ====================
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add("show");
    });
  }, { threshold: 0.2 });

  function observeElements(elements) {
    elements.forEach(el => observer.observe(el));
  }

  // Jalankan untuk elemen awal
  observeElements(document.querySelectorAll(".fade-in-up"));
>>>>>>> dd3f041 (update program dan blade)
});