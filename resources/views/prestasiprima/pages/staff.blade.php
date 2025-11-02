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
          <div
            class="relative w-16 h-16 flex items-center justify-center rounded-full bg-gradient-to-br from-orange-50 to-yellow-50 shadow-md animate-pulse-glow">
            <svg xmlns="http://www.w3.org/2000/svg"
              class="w-8 h-8 text-orange-500 drop-shadow-[0_0_8px_rgba(255,165,0,0.7)]" fill="currentColor"
              viewBox="0 0 24 24">
              <path d="M12 2l2.5 6.5L21 9l-5 4 1.5 7L12 16l-5.5 4L8 13 3 9l6.5-.5L12 2z" />
            </svg>
          </div>
          <div class="w-20 h-[3px] bg-gradient-to-l from-orange-400 to-yellow-400 rounded-full"></div>
        </div>
      </div>
    </div>

    {{-- === KEPALA SEKOLAH === --}}
    <div class="max-w-7xl mx-auto px-6 text-center mb-24">
      <div class="flex flex-col md:flex-row items-center justify-center gap-12" data-aos="fade-up">

        {{-- Foto Kepala Sekolah --}}
        <div class="relative bg-white rounded-3xl shadow-lg border border-orange-100 p-3">
          <img src="{{ asset('assets/images/staff/hendri.jpg') }}" alt="Kepala Sekolah"
            class="rounded-2xl w-72 h-96 object-cover">
          <div
            class="absolute -top-3 -left-3 w-12 h-12 bg-gradient-to-br from-orange-500 to-yellow-400 rounded-full shadow-md flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2c-3.3 0-9.8 1.7-9.8 4.9V22h19.6v-3.1c0-3.2-6.5-4.9-9.8-4.9z" />
            </svg>
          </div>
        </div>

        {{-- Deskripsi Kepala Sekolah --}}
        <div class="text-left max-w-xl relative">
          <div
            class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-yellow-400 text-white px-5 py-2 rounded-full text-sm font-semibold shadow-md mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M12 2a4 4 0 014 4v1a4 4 0 01-8 0V6a4 4 0 014-4zm0 10c3.314 0 6 1.343 6 3v3a1 1 0 01-1 1H7a1 1 0 01-1-1v-3c0-1.657 2.686-3 6-3z" />
            </svg>
            Kepala Sekolah
          </div>

          <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
            Hendry Kurniawan, <span class="text-orange-600">S.Kom., M.I.Kom.</span>
          </h2>

          <div class="w-28 h-[3px] bg-gradient-to-r from-orange-500 to-yellow-400 mb-6 rounded-full"></div>

          <div
            class="relative bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-2xl shadow-md p-8 backdrop-blur-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-400 absolute -top-4 -left-2 opacity-80"
              viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M9.5 11a4.5 4.5 0 01-4.5-4.5V4a1 1 0 011-1h3a1 1 0 011 1v2.5a1 1 0 01-1 1H7v.5a2.5 2.5 0 002.5 2.5H11v2h-1.5zM18.5 11a4.5 4.5 0 01-4.5-4.5V4a1 1 0 011-1h3a1 1 0 011 1v2.5a1 1 0 01-1 1H16v.5a2.5 2.5 0 002.5 2.5H20v2h-1.5z" />
            </svg>
            <p class="text-gray-700 italic text-lg leading-relaxed relative z-10">
              “Pendidikan bukan hanya tentang ilmu pengetahuan, tetapi tentang membangun karakter dan mencetak generasi
              yang siap menghadapi masa depan dengan akhlak mulia.”
            </p>
            <div
              class="absolute right-6 bottom-4 w-4 h-4 bg-gradient-to-r from-orange-500 to-yellow-400 rounded-full animate-pulse">
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- === TABS STAFF === --}}
    <div class="max-w-7xl mx-auto px-6 mb-20">
      <div class="flex justify-center mb-10">
        <div class="inline-flex bg-gradient-to-r from-orange-500 to-yellow-400 rounded-xl p-1 shadow-lg">
          <button class="tab-btn active-tab rounded-lg px-8 py-2 font-semibold text-white transition-all duration-300"
            data-target="kaprog">Kaprog</button>
          <button class="tab-btn rounded-lg px-8 py-2 font-semibold text-white transition-all duration-300"
            data-target="kesiswaan">Kesiswaan</button>
        </div>
      </div>

      <div id="kaprog" class="tab-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-12 show">
        @foreach (['kapro1', 'kapro2', 'kapro3', 'kapro4'] as $i)
          <div class="staff-card">
            <img src="{{ asset("assets/images/staff/$i.jpg") }}" alt="Kepala Program {{ $i }}">
          </div>
        @endforeach
      </div>

      <div id="kesiswaan" class="tab-content hidden grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mt-12">
        @foreach (['kesiswaan1', 'kesiswaan2', 'kesiswaan3', 'kesiswaan4'] as $i)
          <div class="staff-card">
            <img src="{{ asset("assets/images/staff/$i.jpg") }}" alt="Staff Kesiswaan {{ $i }}">
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
        <!-- Tombol kiri -->
        <button id="prevBtn"
          class="absolute -left-16 md:-left-20 z-10 bg-orange-500 text-white p-4 rounded-full shadow-xl hover:bg-orange-600 hover:scale-110 transition-all duration-300">
          <i class="ri-arrow-left-s-line text-2xl"></i>
        </button>

        <!-- Wrapper Carousel -->
        <div id="guruMapelWrapper" class="overflow-hidden w-full max-w-6xl">
          <div id="guruMapelCarousel" class="flex gap-6 transition-transform duration-700 ease-out">
            @for ($i = 1; $i <= 15; $i++)
              <div
                class="flex-shrink-0 w-48 h-[280px] rounded-xl overflow-hidden shadow-lg bg-white dark:bg-gray-800 transform hover:scale-105 transition">
                <img src="{{ asset('assets/images/staff/grmpl-' . $i . '.jpg') }}" alt="Guru Mapel {{ $i }}"
                  class="w-full h-full object-cover">
              </div>
            @endfor
          </div>
        </div>

        <!-- Tombol kanan -->
        <button id="nextBtn"
          class="absolute -right-16 md:-right-20 z-10 bg-orange-500 text-white p-4 rounded-full shadow-xl hover:bg-orange-600 hover:scale-110 transition-all duration-300">
          <i class="ri-arrow-right-s-line text-2xl"></i>
        </button>
      </div>
    </div>

  </section>

  {{-- === STYLE TAMBAHAN === --}}
  <style>
    .active-tab {
      background-color: white;
      color: #ff7a00;
      box-shadow: 0 2px 8px rgba(255, 165, 0, 0.25);
    }

    .tab-content {
      opacity: 0;
      transform: translateY(10px);
      transition: opacity .4s, transform .4s;
    }

    .tab-content.show {
      opacity: 1;
      transform: translateY(0);
    }

    .staff-card {
      @apply bg-white border border-gray-100 rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-transform hover:-translate-y-2;
    }

    .staff-card img {
      @apply w-full h-64 object-cover;
    }

    @keyframes pulse-glow {

      0%,
      100% {
        box-shadow: 0 0 10px rgba(255, 165, 0, .4), 0 0 20px rgba(255, 165, 0, .2);
        transform: scale(1);
      }

      50% {
        box-shadow: 0 0 25px rgba(255, 165, 0, .8), 0 0 45px rgba(255, 200, 0, .4);
        transform: scale(1.08);
      }
    }

    .animate-pulse-glow {
      animation: pulse-glow 2.5s ease-in-out infinite;
    }
  </style>

  {{-- === SCRIPT INTERAKTIF === --}}
  <script>
document.addEventListener("DOMContentLoaded", () => {
  // === TAB SWITCHING ===
  const tabs = document.querySelectorAll('.tab-btn');
  const contents = document.querySelectorAll('.tab-content');

  tabs.forEach(btn => {
    btn.addEventListener('click', () => {
      // ubah status tombol
      tabs.forEach(b => b.classList.remove('active-tab'));
      btn.classList.add('active-tab');

      // sembunyikan semua konten tab
      contents.forEach(c => {
        c.classList.add('hidden');
        c.classList.remove('show');
      });

      // tampilkan tab target
      const target = document.getElementById(btn.dataset.target);
      target.classList.remove('hidden');
      setTimeout(() => target.classList.add('show'), 50);
    });
  });

  // === GURU MAPEL CAROUSEL ===
  const carousel = document.getElementById("guruMapelCarousel");
  const cards = carousel.children;
  const cardWidth = 200 + 24;
  let currentIndex = 0;

  // Clone untuk infinite loop
  carousel.innerHTML += carousel.innerHTML;

  function updatePosition() {
    carousel.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
    if (currentIndex >= cards.length) {
      carousel.style.transition = "none";
      currentIndex = 0;
      carousel.style.transform = `translateX(0)`;
      setTimeout(() => carousel.style.transition = "transform 0.7s ease-out", 20);
    }
  }

  document.getElementById("nextBtn").addEventListener("click", () => {
    currentIndex++;
    updatePosition();
  });
  document.getElementById("prevBtn").addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + cards.length) % cards.length;
    updatePosition();
  });

  // Auto slide
  setInterval(() => {
    currentIndex++;
    updatePosition();
  }, 2500);
});
</script>


@endsection