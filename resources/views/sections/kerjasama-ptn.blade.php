<!-- =============== SECTION KERJA SAMA PTN =============== -->
<section id="ptn" class="relative py-20 sm:py-24 bg-slate-50/50 overflow-hidden border-y border-slate-100">

  <!-- ===== Soft Ambient Background (Minimalist & Clean) ===== -->
  <div class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[350px] bg-orange-500/[0.04] rounded-full blur-3xl"></div>
  </div>

  @php
    $ptnList = \App\Models\prestasiprima\LulusanPtn::getActive();
  @endphp

  <!-- ===== Konten ===== -->
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 text-center z-10">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 border border-orange-200/60 mb-4"
         data-aos="fade-down" data-aos-duration="800">
      <span class="w-2 h-2 rounded-full bg-orange-500"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-orange-600">Alumni & Kemitraan</span>
    </div>

    <h3 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight"
        data-aos="zoom-in" data-aos-duration="1000">
      LULUSAN <span class="text-orange-600">PTN</span>
    </h3>
    <p class="text-xs sm:text-sm text-slate-500 max-w-xl mx-auto mt-2"
       data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
      Alumni SMK Prestasi Prima melanjutkan studi ke berbagai Perguruan Tinggi Negeri dan Perguruan Tinggi terkemuka di Indonesia.
    </p>

    <div class="mt-10 sm:mt-12 grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 md:gap-8 items-center justify-items-center max-w-5xl mx-auto">
      @forelse ($ptnList as $index => $ptn)
        @if ($ptn->link_website)
          <a href="{{ $ptn->link_website }}" target="_blank" rel="noopener noreferrer"
             class="flex items-center justify-center bg-white p-6 sm:p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-orange-200 hover:-translate-y-1.5 transition-all duration-300 w-full aspect-square max-w-[170px] group"
             data-aos="fade-up"
             data-aos-delay="{{ 80 * (($index % 8) + 1) }}"
             data-aos-duration="700"
             title="{{ $ptn->nama_kampus }}">
            <img src="{{ $ptn->logo_url }}"
                 alt="{{ $ptn->nama_kampus }}"
                 loading="lazy"
                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110 select-none">
          </a>
        @else
          <div class="flex items-center justify-center bg-white p-6 sm:p-7 rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:border-orange-200 hover:-translate-y-1.5 transition-all duration-300 w-full aspect-square max-w-[170px] group"
               data-aos="fade-up"
               data-aos-delay="{{ 80 * (($index % 8) + 1) }}"
               data-aos-duration="700"
               title="{{ $ptn->nama_kampus }}">
            <img src="{{ $ptn->logo_url }}"
                 alt="{{ $ptn->nama_kampus }}"
                 loading="lazy"
                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-110 select-none">
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
