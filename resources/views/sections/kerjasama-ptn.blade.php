<!-- =============== SECTION KERJA SAMA PTN (DYNAMIC ANIMATION) =============== -->
<section id="ptn" class="relative py-16 md:py-20 bg-white overflow-hidden">

  <!-- ===== Dekorasi Latar ===== -->
  <div class="absolute inset-0 pointer-events-none overflow-hidden">
    <!-- Grid Latar Bergerak -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(255,165,0,0.08)_1px,transparent_1px)] bg-[length:40px_40px] animate-slow-pulse"></div>
    <div class="absolute inset-0 bg-[linear-gradient(130deg,rgba(255,140,0,0.05)_25%,transparent_25%,transparent_50%,rgba(255,140,0,0.05)_50%,rgba(255,140,0,0.05)_75%,transparent_75%,transparent)] bg-[length:80px_80px] opacity-40 animate-slide"></div>

    @php
      $ptnList = \App\Models\prestasiprima\LulusanPtn::getActive();
      $ptnDecorLeft = @getimagesize(public_path('assets/images/section/ptn/network.svg')) ?: [640, 480];
      $ptnDecorRight = @getimagesize(public_path('assets/images/section/ptn/race.svg')) ?: [660, 480];
    @endphp

    <!-- Dekorasi Kiri -->
    <img src="{{ asset('assets/images/section/ptn/network.svg') }}"
         alt="Dekorasi Kiri"
         width="{{ $ptnDecorLeft[0] }}"
         height="{{ $ptnDecorLeft[1] }}"
         data-aos="zoom-in-up"
         data-aos-delay="200"
         data-aos-duration="1200"
         data-aos-once="false"
         class="absolute bottom-0 left-0 w-[320px] sm:w-[480px] md:w-[640px] opacity-0 object-contain animated-decor decor-left">

    <!-- Dekorasi Kanan -->
    <img src="{{ asset('assets/images/section/ptn/race.svg') }}"
         alt="Dekorasi Kanan"
         width="{{ $ptnDecorRight[0] }}"
         height="{{ $ptnDecorRight[1] }}"
         data-aos="zoom-in-up"
         data-aos-delay="400"
         data-aos-duration="1200"
         data-aos-once="false"
         class="absolute -bottom-[220px] sm:-bottom-[320px] md:-bottom-[380px] right-0 w-[340px] sm:w-[520px] md:w-[660px] opacity-0 object-contain animated-decor decor-right">
  </div>

  <!-- ===== Konten ===== -->
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 text-center z-10">
    <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-orange-600 tracking-wide drop-shadow-sm"
        data-aos="zoom-in" data-aos-duration="1000">
      LULUSAN PTN
    </h3>

    <div class="mt-10 sm:mt-14 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 gap-6 sm:gap-8 md:gap-10 items-center justify-items-center px-4 sm:px-10">
      @forelse ($ptnList as $index => $ptn)
        @if ($ptn->link_website)
          <a href="{{ $ptn->link_website }}" target="_blank" rel="noopener noreferrer"
             class="flex items-center justify-center bg-white/60 backdrop-blur-md p-6 sm:p-8 rounded-2xl border border-orange-100/50 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 w-full aspect-square max-w-[160px] group"
             data-aos="fade-up"
             data-aos-delay="{{ 100 * (($index % 8) + 1) }}"
             data-aos-duration="800"
             title="{{ $ptn->nama_kampus }}">
            <img src="{{ $ptn->logo_url }}"
                 alt="{{ $ptn->nama_kampus }}"
                 loading="lazy"
                 class="w-full h-full object-contain transition-all duration-700 group-hover:scale-110 select-none filter group-hover:drop-shadow-lg">
          </a>
        @else
          <div class="flex items-center justify-center bg-white/60 backdrop-blur-md p-6 sm:p-8 rounded-2xl border border-orange-100/50 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 w-full aspect-square max-w-[160px] group"
               data-aos="fade-up"
               data-aos-delay="{{ 100 * (($index % 8) + 1) }}"
               data-aos-duration="800"
               title="{{ $ptn->nama_kampus }}">
            <img src="{{ $ptn->logo_url }}"
                 alt="{{ $ptn->nama_kampus }}"
                 loading="lazy"
                 class="w-full h-full object-contain transition-all duration-700 group-hover:scale-110 select-none filter group-hover:drop-shadow-lg">
          </div>
        @endif
      @empty
        <div class="col-span-full py-8 text-center text-slate-400 font-medium">
          Belum ada data kampus mitra.
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- ===== ANIMASI TAMBAHAN ===== -->
<style>
  @keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
    50% { transform: translateY(-12px) rotate(-1deg) scale(1.02); }
  }

  @keyframes slide {
    from { background-position: 0 0; }
    to { background-position: 80px 80px; }
  }
  .animate-slide {
    animation: slide 14s linear infinite;
  }
  @keyframes slow-pulse {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 0.6; }
  }
  .animate-slow-pulse {
    animation: slow-pulse 7s ease-in-out infinite;
  }

  /* Efek melayang lembut */
  .animated-decor {
    animation: float-slow 8s ease-in-out infinite;
  }
  .decor-left {
    animation-delay: 0s;
  }
  .decor-right {
    animation-delay: 2s;
  }
</style>
