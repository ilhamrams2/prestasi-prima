document.addEventListener('DOMContentLoaded', () => {
  // Elements
  const links = document.querySelectorAll('.lihat-selengkapnya');
  const wrapper = document.getElementById('jurusan-detail-wrapper');
  const bg = document.getElementById('jurusan-detail-bg');
  const panel = document.getElementById('jurusan-detail');
  const content = document.getElementById('jurusan-detail-content');

  // ==================== DATA ====================
  const details = {
    pplg: `
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
    tkj: `
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
    bcf: `
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
    dkv: `
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

  // ==================== ANIMASI INTERSECTION OBSERVER ====================
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) e.target.classList.add('show');
    });
  }, { threshold: 0.18 });

  document.querySelectorAll('.fade-in-up').forEach(el => io.observe(el));

  // ==================== SHOW PANEL ====================
  function openDetail(key) {
    if (!details[key]) return;
    content.innerHTML = details[key] + `
      <div class="mt-6 text-right">
        <button id="close-detail" class="inline-flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
          ← Tutup
        </button>
      </div>
    `;
    content.querySelectorAll('.fade-in-up').forEach(el => io.observe(el));
    wrapper.classList.add('active');
    panel.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }

  // ==================== CLOSE PANEL ====================
  function closeDetail() {
    wrapper.classList.remove('active');
    setTimeout(() => content.innerHTML = '', 400);
  }

  // ==================== EVENT HANDLER ====================
  document.body.addEventListener('click', (e) => {
    const targ = e.target.closest('.lihat-selengkapnya');
    if (targ) {
      e.preventDefault();
      const key = targ.dataset.target;
      openDetail(key);
      targ.setAttribute('aria-expanded', 'true');
      return;
    }
    if (e.target.id === 'close-detail' || e.target.closest('#jurusan-detail-bg')) {
      e.preventDefault();
      closeDetail();
      document.querySelectorAll('.lihat-selengkapnya[aria-expanded="true"]').forEach(el => el.setAttribute('aria-expanded', 'false'));
    }
  });

  // Tutup pakai tombol ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeDetail();
  });
});
