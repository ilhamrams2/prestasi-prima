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
      <p class="text-gray-700 text-lg">Mendalami jaringan komputer, server, serta teknologi robotic berbasis Arduino dan fiber optic.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up">
        <img src="assets/images/section/program/jaringan.jpg" alt="Simulasi Jaringan" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Konfigurasi <span class="text-orange-600">Simulasi Jaringan</span></h3>
          <p class="text-gray-600">Belajar membuat dan mengonfigurasi jaringan simulasi untuk memahami alur data dan komunikasi perangkat.</p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.1s">
        <img src="assets/images/section/program/splicer.jpg" alt="Alat Splicer" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Menjelaskan <span class="text-orange-600">Alat Splicer</span></h3>
          <p class="text-gray-600">Memahami fungsi, cara kerja, dan teknik penggunaan alat splicer dalam jaringan fiber optic.</p>
        </div>
      </div>
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
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up">
        <img src="assets/images/section/program/bcf-shooting.jpg" alt="Produksi Film" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Produksi <span class="text-orange-600">Film & Video</span></h3>
          <p class="text-gray-600">Mempelajari proses produksi film mulai dari pra-produksi, shooting, hingga editing akhir.</p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.1s">
        <img src="assets/images/section/program/bcf-editing.jpg" alt="Editing Video" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Editing <span class="text-orange-600">Video Profesional</span></h3>
          <p class="text-gray-600">Belajar software editing seperti Adobe Premiere Pro dan DaVinci Resolve untuk hasil berkualitas.</p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.2s">
        <img src="assets/images/section/program/bcf-broadcast.jpg" alt="Broadcast" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Teknik <span class="text-orange-600">Broadcast & Studio</span></h3>
          <p class="text-gray-600">Mengenal sistem siaran televisi, penggunaan kamera studio, dan pengaturan pencahayaan.</p>
        </div>
      </div>
    </div>
  `,

        dkv: `
    <div class="mb-12 text-center fade-in-up show">
      <h2 class="text-3xl md:text-4xl font-bold text-orange-600 mb-2">Desain Komunikasi Visual (DKV)</h2>
      <p class="text-gray-700 text-lg">Desain grafis, ilustrasi, animasi, hingga visual branding kreatif.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up">
        <img src="assets/images/section/program/dkv-desain.jpg" alt="Desain Grafis" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Desain <span class="text-orange-600">Grafis Digital</span></h3>
          <p class="text-gray-600">Mempelajari pembuatan desain poster, logo, dan layout menggunakan Adobe Illustrator & Photoshop.</p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.1s">
        <img src="assets/images/section/program/dkv-branding.jpg" alt="Branding Visual" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Kreativitas <span class="text-orange-600">Branding Visual</span></h3>
          <p class="text-gray-600">Menciptakan identitas visual merek yang kuat melalui kombinasi warna, tipografi, dan logo.</p>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in-up" style="transition-delay:0.2s">
        <img src="assets/images/section/program/dkv-animasi.jpg" alt="Animasi 2D & 3D" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="font-bold text-lg text-gray-900 mb-2">Desain <span class="text-orange-600">Animasi 2D & 3D</span></h3>
          <p class="text-gray-600">Belajar animasi digital untuk kebutuhan iklan, film pendek, hingga media interaktif.</p>
        </div>
      </div>
    </div>
  `,
    };

    // Fungsi buka detail
    links.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const target = link.dataset.target;
            content.innerHTML =
                details[target] +
                `
        <div class="mt-12 text-center fade-in-up">
          <a href="#" id="close-detail" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-lg font-semibold transition transform hover:scale-105">
            ← Kembali ke Program
          </a>
        </div>
      `;
            wrapper.classList.remove("hidden");
            setTimeout(
                () => wrapper.classList.remove("opacity-0", "translate-y-10"),
                50
            );
            wrapper.scrollIntoView({ behavior: "smooth" });

            document
                .getElementById("close-detail")
                .addEventListener("click", (e) => {
                    e.preventDefault();
                    wrapper.classList.add("opacity-0", "translate-y-10");
                    setTimeout(() => {
                        wrapper.classList.add("hidden");
                        content.innerHTML = "";
                        document
                            .getElementById("program")
                            .scrollIntoView({ behavior: "smooth" });
                    }, 500);
                });

            // Re-observe animasi baru
            const newElements = content.querySelectorAll(".fade-in-up");
            newElements.forEach((el) => observer.observe(el));
        });
    });

    // Intersection Observer untuk animasi scroll
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        },
        { threshold: 0.2 }
    );

    // Observe semua element fade-in-up
    document
        .querySelectorAll(".fade-in-up")
        .forEach((el) => observer.observe(el));
});
