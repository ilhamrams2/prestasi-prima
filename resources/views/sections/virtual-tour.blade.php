{{-- ================= SECTION VIRTUAL TOUR ================= --}}
<section id="virtual-tour" class="relative py-32 bg-white overflow-hidden">
  
  <!-- Subtle Background Pattern -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(234,88,12,0.03),transparent)] pointer-events-none"></div>

  <div class="max-w-6xl mx-auto px-6 text-center relative z-10">

    <div class="inline-block px-4 py-1.5 rounded-full bg-orange-100 text-orange-700 text-[10px] font-black uppercase tracking-widest mb-6" data-aos="fade-up">
      Interactive Experience
    </div>

    <h2 class="text-4xl md:text-6xl font-black text-gray-900 mb-6 tracking-tight leading-tight" data-aos="fade-up" data-aos-delay="100">
      Jelajahi Kampus <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Secara Virtual</span>
    </h2>

    <p class="text-lg md:text-xl text-gray-500 max-w-3xl mx-auto mb-12 font-medium leading-relaxed" data-aos="fade-up" data-aos-delay="200">
      Melihat belum pernah semudah ini. Nikmati pengalaman tur interaktif 360° untuk melihat setiap sudut fasilitas unggulan kami langsung dari perangkat Anda.
    </p>

    <!-- Preview Interaction Card -->
    <div class="relative group max-w-4xl mx-auto" data-aos="zoom-in" data-aos-delay="300">
      <!-- Glow Effect -->
      <div class="absolute -inset-1 bg-gradient-to-r from-orange-600 to-orange-400 rounded-[2.5rem] blur opacity-20 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
      
      <div class="relative bg-white rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-100 cursor-pointer" 
           onclick="window.location='{{ route('virtual-tour') }}'">
        
        <div class="relative aspect-video">
           <img src="{{ asset('assets/360View/lapangan.jpeg') }}" 
                alt="Preview Virtual Tour" 
                class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
           
           <!-- Overlay Overlay -->
           <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-all duration-700"></div>

           <!-- Central Play Indicator -->
           <div class="absolute inset-0 flex items-center justify-center">
              <div class="w-20 h-20 md:w-28 md:h-28 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center border border-white/40 shadow-2xl group-hover:scale-110 transition-transform duration-500">
                 <div class="w-14 h-14 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center shadow-lg">
                    <iconify-icon icon="solar:play-bold" class="text-3xl md:text-5xl text-orange-600 ml-1.5 md:ml-2"></iconify-icon>
                 </div>
              </div>
           </div>

           <!-- Info Badges -->
           <div class="absolute top-6 left-6 px-4 py-2 bg-black/60 backdrop-blur-md rounded-xl text-white text-[10px] font-black uppercase tracking-[0.2em] border border-white/20">
              360° Immersive
           </div>
           
           <div class="absolute bottom-6 left-6 right-6 flex items-center justify-between text-white">
              <div class="text-left">
                 <p class="text-[10px] font-black uppercase tracking-widest opacity-80 mb-1">Lokasi Utama</p>
                 <h4 class="text-xl md:text-2xl font-black">Main Atrium & Lobby</h4>
              </div>
              <div class="hidden md:flex gap-2">
                 <span class="w-2 h-2 rounded-full bg-white opacity-40"></span>
                 <span class="w-2 h-2 rounded-full bg-white opacity-40"></span>
                 <span class="w-2 h-2 rounded-full bg-white"></span>
              </div>
           </div>
        </div>
      </div>
    </div>

    <!-- Features Row -->
    <div class="mt-16 grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl mx-auto">
      <div class="flex flex-col items-center gap-3" data-aos="fade-up" data-aos-delay="400">
        <div class="w-12 h-12 rounded-2xl bg-orange-50 flex items-center justify-center text-orange-600">
          <iconify-icon icon="lucide:glasses" class="text-2xl"></iconify-icon>
        </div>
        <p class="text-xs font-black uppercase tracking-widest text-gray-900">Virtual Reality</p>
      </div>
      <div class="flex flex-col items-center gap-3" data-aos="fade-up" data-aos-delay="500">
        <div class="w-12 h-12 rounded-2xl bg-orange-50 flex items-center justify-center text-orange-600">
          <iconify-icon icon="lucide:maximize" class="text-2xl"></iconify-icon>
        </div>
        <p class="text-xs font-black uppercase tracking-widest text-gray-900">High Definition</p>
      </div>
      <div class="flex flex-col items-center gap-3" data-aos="fade-up" data-aos-delay="600">
        <div class="w-12 h-12 rounded-2xl bg-orange-50 flex items-center justify-center text-orange-600">
          <iconify-icon icon="lucide:mouse-pointer" class="text-2xl"></iconify-icon>
        </div>
        <p class="text-xs font-black uppercase tracking-widest text-gray-900">Interaktif</p>
      </div>
    </div>

  </div>

  <!-- Subtle Decorations -->
  <div class="absolute top-1/4 -left-20 w-80 h-80 bg-orange-50 rounded-full blur-[100px] pointer-events-none"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-gray-50 rounded-full blur-[100px] pointer-events-none"></div>
</section>

{{-- CSS untuk floating, hover & efek hidup --}}
<style>
  @keyframes floatSlow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }
  .animate-float-slow {
    animation: floatSlow 6s ease-in-out infinite;
  }
</style>
