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
});