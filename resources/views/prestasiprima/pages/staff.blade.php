@extends('prestasiprima.index')

@section('title', 'Struktur Staff & Manajemen - SMK Prestasi Prima')

@section('content')

{{-- === SECTION STRUKTUR STAFF, KEPEMIMPINAN & GURU MAPEL === --}}
<section class="min-h-screen bg-gradient-to-b from-white via-gray-50 to-white py-24 relative overflow-hidden">

  {{-- === ORNAMEN BINTANG BERDENYUT === --}}
  <div class="flex justify-center mt-24 mb-24">
    <div class="relative">
      <div class="flex items-center gap-6">
        <div class="w-20 h-[3px] bg-gradient-to-r from-orange-400 to-yellow-400 rounded-full"></div>
        <div class="relative w-16 h-16 flex items-center justify-center rounded-full bg-gradient-to-br from-orange-50 to-yellow-50 shadow-md animate-pulse-glow">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-500 drop-shadow-[0_0_8px_rgba(255,165,0,0.7)]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2l2.5 6.5L21 9l-5 4 1.5 7L12 16l-5.5 4L8 13 3 9l6.5-.5L12 2z" />
          </svg>
        </div>
        <div class="w-20 h-[3px] bg-gradient-to-l from-orange-400 to-yellow-400 rounded-full"></div>
      </div>
    </div>
  </div>

  {{-- === KEPALA SEKOLAH === --}}
  @php
      $kepala = \DB::table('prestasiprima_staff')->where('kategori', 'kepala')->first();
  @endphp
  <div class="max-w-7xl mx-auto px-6 text-center mb-24">
    <div class="flex flex-col md:flex-row items-center justify-center gap-12" data-aos="fade-up">

      {{-- Foto Kepala Sekolah --}}
      <div class="relative bg-white rounded-3xl shadow-lg border border-orange-100 p-3">
        @if($kepala && $kepala->foto)
          <img src="{{ asset('storage/staff/' . $kepala->foto) }}" alt="Kepala Sekolah" class="rounded-2xl w-72 h-96 object-cover">
        @else
          <div class="w-72 h-96 bg-gray-200 flex items-center justify-center rounded-2xl text-gray-400">
            Tidak ada foto
          </div>
        @endif
        <div class="absolute -top-3 -left-3 w-12 h-12 bg-gradient-to-br from-orange-500 to-yellow-400 rounded-full shadow-md flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2c-3.3 0-9.8 1.7-9.8 4.9V22h19.6v-3.1c0-3.2-6.5-4.9-9.8-4.9z" />
          </svg>
        </div>
      </div>

      {{-- Deskripsi Kepala Sekolah --}}
      <div class="text-left max-w-xl relative">
        <div class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-yellow-400 text-white px-5 py-2 rounded-full text-sm font-semibold shadow-md mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2a4 4 0 014 4v1a4 4 0 01-8 0V6a4 4 0 014-4zm0 10c3.314 0 6 1.343 6 3v3a1 1 0 01-1 1H7a1 1 0 01-1-1v-3c0-1.657 2.686-3 6-3z" />
          </svg>
          Kepala Sekolah
        </div>

        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
          {{ $kepala->nama ?? 'Tidak ada data' }}
        </h2>

        <div class="w-28 h-[3px] bg-gradient-to-r from-orange-500 to-yellow-400 mb-6 rounded-full"></div>

        <div class="relative bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-2xl shadow-md p-8 backdrop-blur-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-400 absolute -top-4 -left-2 opacity-80" viewBox="0 0 24 24" fill="currentColor">
            <path d="M9.5 11a4.5 4.5 0 01-4.5-4.5V4a1 1 0 011-1h3a1 1 0 011 1v2.5a1 1 0 01-1 1H7v.5a2.5 2.5 0 002.5 2.5H11v2h-1.5zM18.5 11a4.5 4.5 0 01-4.5-4.5V4a1 1 0 011-1h3a1 1 0 011 1v2.5a1 1 0 01-1 1H16v.5a2.5 2.5 0 002.5 2.5H20v2h-1.5z" />
          </svg>
          <p class="text-gray-700 italic text-lg leading-relaxed relative z-10">
            {{ $kepala->kutipan ?? 'Tidak ada kutipan.' }}
          </p>
          <div class="absolute right-6 bottom-4 w-4 h-4 bg-gradient-to-r from-orange-500 to-yellow-400 rounded-full animate-pulse"></div>
        </div>
      </div>
    </div>
  </div>

  {{-- === TABS STAFF === --}}
<div class="max-w-7xl mx-auto px-6 mb-20">
  <div class="flex justify-center mb-10">
    <div class="inline-flex bg-gradient-to-r from-orange-500 to-yellow-400 rounded-xl p-1 shadow-lg">
      <button class="tab-btn active-tab rounded-lg px-8 py-2 font-semibold text-white transition-all duration-300" data-target="kaprog">Kaprog</button>
      <button class="tab-btn rounded-lg px-8 py-2 font-semibold text-white transition-all duration-300" data-target="kesiswaan">Kesiswaan</button>
    </div>
  </div>

  {{-- Kaprog --}}
  <div id="kaprog" class="tab-content grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-12 show">
    @foreach (\DB::table('prestasiprima_staff')->where('kategori', 'kaprog')->get() as $staff)
      <div class="staff-card">
        <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}">
      </div>
    @endforeach
  </div>

  {{-- Kesiswaan --}}
  <div id="kesiswaan" class="tab-content hidden grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-12">
    @foreach (\DB::table('prestasiprima_staff')->where('kategori', 'kesiswaan')->get() as $staff)
      <div class="staff-card">
        <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}">
      </div>
    @endforeach
  </div>
</div>

  {{-- === GURU MAPEL === --}}
<div class="max-w-7xl mx-auto px-6">
  <div class="text-center mb-12">
    <h2 class="text-3xl font-bold text-orange-500">Guru Mapel</h2>
  </div>

  <div class="relative flex justify-center items-center">
    <!-- === Tombol Kiri (Hanya Desktop) === -->
    <button id="prevBtn"
      class="hidden md:flex absolute left-[-2.5rem] lg:left-[-3rem] top-1/2 -translate-y-1/2 z-20 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg transition">
      <i data-lucide="chevron-left" class="w-5 h-5"></i>
    </button>

    <!-- === Carousel === -->
    <div id="guruMapelWrapper" class="overflow-hidden w-full max-w-6xl">
      <div id="guruMapelCarousel" class="flex gap-6 transition-transform duration-700 ease-out">
        @foreach (\DB::table('prestasiprima_staff')->where('kategori', 'guru_mapel')->get() as $staff)
          <div
            class="flex-shrink-0 w-48 h-[280px] rounded-xl overflow-hidden shadow-lg bg-white transform hover:scale-105 transition">
            <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}"
              class="w-full h-full object-cover">
          </div>
        @endforeach
      </div>
    </div>

    <!-- === Tombol Kanan (Hanya Desktop) === -->
    <button id="nextBtn"
      class="hidden md:flex absolute right-[-2.5rem] lg:right-[-3rem] top-1/2 -translate-y-1/2 z-20 bg-orange-500 hover:bg-orange-600 text-white p-3 rounded-full shadow-lg transition">
      <i data-lucide="chevron-right" class="w-5 h-5"></i>
    </button>
  </div>
</div>


</section>

{{-- === STYLE TAMBAHAN === --}}
<style>
  .active-tab { background-color: white; color: #ff7a00; box-shadow: 0 2px 8px rgba(255,165,0,0.25); }
  .tab-content { opacity: 0; transform: translateY(10px); transition: opacity .4s, transform .4s; }
  .tab-content.show { opacity: 1; transform: translateY(0); }
  .staff-card { @apply bg-white border border-gray-100 rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-transform hover:-translate-y-2; }
  .staff-card img { @apply w-full h-64 object-cover; }
  @keyframes pulse-glow { 0%,100%{ box-shadow:0 0 10px rgba(255,165,0,.4),0 0 20px rgba(255,165,0,.2); transform:scale(1); } 50%{ box-shadow:0 0 25px rgba(255,165,0,.8),0 0 45px rgba(255,200,0,.4); transform:scale(1.08); } }
  .animate-pulse-glow { animation:pulse-glow 2.5s ease-in-out infinite; }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll('.tab-btn');
  const contents = document.querySelectorAll('.tab-content');

  // === TABS SWITCHING ===
  tabs.forEach(btn => {
    btn.addEventListener('click', () => {
      tabs.forEach(b => b.classList.remove('active-tab'));
      btn.classList.add('active-tab');
      contents.forEach(c => { c.classList.add('hidden'); c.classList.remove('show'); });
      const target = document.getElementById(btn.dataset.target);
      target.classList.remove('hidden');
      setTimeout(() => target.classList.add('show'), 50);
    });
  });

  // === GURU MAPEL INFINITE CAROUSEL + SWIPE ===
  const carousel = document.getElementById("guruMapelCarousel");
  const nextBtn = document.getElementById("nextBtn");
  const prevBtn = document.getElementById("prevBtn");
  const cards = Array.from(carousel.children);
  const cardWidth = 200 + 24; // lebar kartu + jarak antar kartu
  let currentIndex = 0;

  // Clone awal dan akhir agar loop mulus
  const totalCards = cards.length;
  cards.forEach(card => carousel.appendChild(card.cloneNode(true)));
  cards.forEach(card => carousel.insertBefore(card.cloneNode(true), carousel.firstChild));
  const offset = totalCards * cardWidth;

  carousel.style.transform = `translateX(-${offset}px)`;

  function updatePosition() {
    carousel.style.transition = "transform 0.6s ease";
    carousel.style.transform = `translateX(-${offset + currentIndex * cardWidth}px)`;
  }

  function checkLoop() {
    if (currentIndex >= totalCards) {
      carousel.style.transition = "none";
      currentIndex = 0;
      carousel.style.transform = `translateX(-${offset}px)`;
    } else if (currentIndex < -totalCards) {
      carousel.style.transition = "none";
      currentIndex = 0;
      carousel.style.transform = `translateX(-${offset}px)`;
    }
  }

  nextBtn.addEventListener("click", () => {
    currentIndex++;
    updatePosition();
    setTimeout(checkLoop, 650);
  });

  prevBtn.addEventListener("click", () => {
    currentIndex--;
    updatePosition();
    setTimeout(checkLoop, 650);
  });

  // === AUTO SCROLL ===
  let autoScroll = setInterval(() => {
    currentIndex++;
    updatePosition();
    setTimeout(checkLoop, 650);
  }, 3000);

  // === SWIPE GESTURE (TOUCH) ===
  let startX = 0;
  let moveX = 0;
  let isSwiping = false;

  carousel.addEventListener("touchstart", (e) => {
    clearInterval(autoScroll); // pause auto scroll saat disentuh
    startX = e.touches[0].clientX;
    isSwiping = true;
  });

  carousel.addEventListener("touchmove", (e) => {
    if (!isSwiping) return;
    moveX = e.touches[0].clientX - startX;
  });

  carousel.addEventListener("touchend", () => {
    if (!isSwiping) return;
    isSwiping = false;

    // Gerakan geser signifikan → ubah slide
    if (Math.abs(moveX) > 50) {
      if (moveX < 0) {
        currentIndex++;
      } else {
        currentIndex--;
      }
      updatePosition();
      setTimeout(checkLoop, 650);
    }

    // Reset nilai
    moveX = 0;
    // Lanjut auto scroll setelah beberapa detik
    autoScroll = setInterval(() => {
      currentIndex++;
      updatePosition();
      setTimeout(checkLoop, 650);
    }, 3000);
  });
});
</script>


@endsection
