@extends('prestasiprima.index')
@section('title','Sambutan - SMK Prestasi Prima')

@section('content')
  <!-- ================= Section Pendaftaran ================= -->
<section class="bg-slate-900 text-white pt-20 pb-0 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 md:px-8 grid md:grid-cols-2 gap-8 items-center relative z-10">
    
    <!-- Text -->
    <div class="py-12 relative z-20">
      <h1 class="text-2xl md:text-5xl font-extrabold leading-snug mb-3">
        Pendaftaran Siswa Baru <br>
        <span class="text-orange-500">SMK Prestasi Prima</span>
      </h1>
      <p class="text-sm md:text-xl mb-5 max-w-lg">
        Yuk bergabung bersama kami! Daftarkan dirimu sekarang untuk menjadi bagian dari generasi unggul 
        yang siap menghadapi dunia kerja.
      </p>
      <a href="#"
         class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-lg shadow-lg transition text-xs md:text-base">
        Join Now →
      </a>
    </div>

    <!-- Image -->
    <div class="flex justify-center md:justify-end items-center">
      <img src="{{ asset('assets/pendaftaran/siswi.png') }}" 
           alt="Pendaftaran Siswa Baru" 
           class="max-h-[380px] sm:max-h-[440px] md:max-h-[500px] w-auto object-contain drop-shadow-xl">
    </div>

  </div>
</section>


  <!-- ================= Syarat Pendaftaran ================= -->
  <section id="syarat-pendaftaran" class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">

      <!-- Heading -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900">
          Syarat Pendaftaran
        </h2>
      </div>

      <!-- Grid Box -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
        
        <!-- Foto Copy Ijazah SMP -->
        <div class="flex items-center bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <i data-lucide="file-text" class="w-10 h-10 text-orange-500 mr-4"></i>
          <p class="font-semibold text-gray-800">Foto Copy Ijazah SMP</p>
        </div>

        <!-- Foto Copy KK -->
        <div class="flex items-center bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <i data-lucide="id-card" class="w-10 h-10 text-orange-500 mr-4"></i>
          <p class="font-semibold text-gray-800">Foto Copy Kartu Keluarga</p>
        </div>

        <!-- Pas Foto -->
        <div class="flex items-center bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <i data-lucide="user-round" class="w-10 h-10 text-orange-500 mr-4"></i>
          <p class="font-semibold text-gray-800">Pas Foto 3x4 (3 Lembar)</p>
        </div>

        <!-- Wawancara -->
        <div class="flex items-center bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <i data-lucide="file-pen" class="w-10 h-10 text-orange-500 mr-4"></i>
          <p class="font-semibold text-gray-800">Wawancara / Tes Masuk</p>
        </div>

        <!-- Bebas Narkoba -->
        <div class="flex items-center bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <i data-lucide="ban" class="w-10 h-10 text-orange-500 mr-4"></i>
          <p class="font-semibold text-gray-800">Bebas Narkoba</p>
        </div>

        <!-- Pengumuman -->
        <div class="flex items-center bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
          <i data-lucide="megaphone" class="w-10 h-10 text-orange-500 mr-4"></i>
          <p class="font-semibold text-gray-800">Pengumuman Hasil Seleksi</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= Swipe WhatsApp Section ================= -->
  <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-4xl mx-auto px-6">

      <!-- Slider Container -->
      <div id="slider" class="relative flex items-center bg-white shadow-lg rounded-2xl overflow-hidden p-6 select-none">

        <!-- Gambar Swipe -->
        <div id="thumb" class="relative cursor-pointer z-10">
          <img src="{{ asset('assets/pendaftaran/swipe.svg') }}" 
               alt="Swipe" 
               class="w-32 h-32 object-contain">
        </div>

        <!-- Teks Tengah -->
        <div class="flex-1 px-6 text-center md:text-left">
          <h3 class="text-xl font-semibold text-gray-900">Ingin bertanya dulu?</h3>
          <p class="text-gray-700">
            Hubungi Admin Via <span class="font-bold text-green-600">WhatsApp</span>
          </p>
        </div>

        <!-- QR Code -->
        <div class="p-4 relative">
          <img id="qrCode"
               src="{{ asset('assets/pendaftaran/qrcode.png') }}" 
               alt="QR WhatsApp"
               class="w-28 h-28 transition-all duration-300 rounded-xl object-contain">
        </div>
      </div>
    </div>
  </section>

  <!-- ================= Styles ================= -->
  <style>
    /* Efek hijau glow */
    .highlight-green {
      box-shadow: 0 0 20px 5px rgba(34, 197, 94, 0.7);
      border: 3px solid #22c55e;
    }
  </style>

  <!-- ================= Script Swipe WhatsApp ================= -->
  <script>
    const thumb = document.getElementById("thumb");
    const slider = document.getElementById("slider");
    const qrCode = document.getElementById("qrCode");

    let isDragging = false;
    let startX = 0;
    let currentX = 0;

    const whatsappLink = "https://wa.me/6281234567890"; // ganti nomor WA admin

    function getMaxX() {
      const sliderRect = slider.getBoundingClientRect();
      const qrRect = qrCode.getBoundingClientRect();
      const thumbRect = thumb.getBoundingClientRect();

      return (qrRect.left + qrRect.width / 2) - (sliderRect.left + thumbRect.width / 2);
    }

    function startDrag(x) {
      isDragging = true;
      startX = x;
      thumb.style.transition = "none";
    }

    function duringDrag(x) {
      if (!isDragging) return;
      currentX = x - startX;
      if (currentX < 0) currentX = 0;

      const maxX = getMaxX();
      if (currentX > maxX) currentX = maxX;

      thumb.style.transform = `translateX(${currentX}px)`;
    }

    function endDrag() {
      if (!isDragging) return;
      isDragging = false;

      const maxX = getMaxX();
      if (Math.abs(currentX - maxX) < 10) {
        qrCode.classList.add("highlight-green");
        setTimeout(() => {
          window.open(whatsappLink, "_blank");
          qrCode.classList.remove("highlight-green");
          thumb.style.transition = "transform 0.3s ease";
          thumb.style.transform = "translateX(0)";
        }, 600);
      } else {
        thumb.style.transition = "transform 0.3s ease";
        thumb.style.transform = "translateX(0)";
      }
    }

    // Event mouse
    thumb.addEventListener("mousedown", (e) => startDrag(e.clientX));
    document.addEventListener("mousemove", (e) => duringDrag(e.clientX));
    document.addEventListener("mouseup", endDrag);

    // Event touch
    thumb.addEventListener("touchstart", (e) => startDrag(e.touches[0].clientX));
    document.addEventListener("touchmove", (e) => duringDrag(e.touches[0].clientX));
    document.addEventListener("touchend", endDrag);
  </script>

  <!-- ================= Lucide Icons ================= -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
@endsection