<section class="relative bg-[#0c1d3a] pt-12 pb-20 md:pt-16 md:pb-32 overflow-visible">
  <!-- Container -->
  <div class="max-w-7xl mx-auto px-6 text-center">
    <!-- Heading -->
    <div class="mb-8 md:mb-12">
      <h4 class="text-white text-3xl md:text-4xl font-semibold mb-4 md:mb-5">Sejarah</h4>
      <h2 class="text-lg sm:text-2xl md:text-4xl font-bold text-white leading-snug md:leading-tight px-4 md:px-0 text-balance">
        Dari Awal Perjalanan hingga <br />
        <span class="text-orange-400">Meraih Prestasi Gemilang</span>
      </h2>
    </div>
  </div>

  <!-- Timeline Image -->
  @php
    $historyImageSize = @getimagesize(public_path('assets/images/section/sejarah/sejarah2.png')) ?: [1600, 900];
  @endphp
  <div class="relative flex justify-center">
    <div class="relative w-full max-w-6xl mx-auto">
      <img
        src="{{ asset('assets/images/section/sejarah/sejarah2.png') }}"
        alt="Sejarah"
        width="{{ $historyImageSize[0] }}"
        height="{{ $historyImageSize[1] }}"
        class="relative z-10 w-full -mb-10 md:-mb-20 drop-shadow-2xl"
      />

      <!-- Dekorasi di bawah gambar -->
      <div
        class="absolute inset-x-0 bottom-0 translate-y-1/2 h-16 md:h-20 opacity-80 bg-[radial-gradient(circle_at_center,_rgba(255,138,76,0.45)_0%,_rgba(255,138,76,0.15)_45%,_transparent_70%)] bg-repeat-x bg-[length:120px_100%]"
      ></div>
    </div>
  </div>
</section>
