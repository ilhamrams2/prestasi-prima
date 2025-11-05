{{-- ========== FAQ SECTION (Reusable for All Majors) ========== --}}
@php
  $faqData = [
    'pplg' => [
      ['q' => 'Apa fokus utama jurusan PPLG?', 'a' => 'PPLG berfokus pada pengembangan perangkat lunak, aplikasi web, mobile, dan game.'],
      ['q' => 'Apakah siswa akan belajar pemrograman?', 'a' => 'Ya, siswa belajar berbagai bahasa pemrograman seperti PHP, JavaScript, Python, dan lainnya.'],
      ['q' => 'Bagaimana prospek kerja PPLG?', 'a' => 'Sangat luas, mulai dari software engineer, UI/UX designer, hingga game developer.'],
    ],

    'tjkt' => [
      ['q' => 'Apa yang dipelajari di TJKT?', 'a' => 'Siswa belajar membangun, mengelola, dan mengamankan jaringan komputer dan sistem telekomunikasi.'],
      ['q' => 'Apakah praktik jaringan dilakukan di lab?', 'a' => 'Ya, tersedia laboratorium jaringan lengkap dengan perangkat Mikrotik, Cisco, dan server.'],
      ['q' => 'Bagaimana peluang karier setelah lulus?', 'a' => 'Lulusan dapat bekerja sebagai network engineer, teknisi IT, atau administrator server.'],
    ],

    'dkv' => [
      ['q' => 'Apa itu jurusan DKV?', 'a' => 'DKV mempelajari seni komunikasi visual, desain grafis, branding, dan multimedia digital.'],
      ['q' => 'Software apa yang digunakan di DKV?', 'a' => 'Adobe Photoshop, Illustrator, Premiere Pro, dan After Effects adalah software utama.'],
      ['q' => 'Apakah ada praktik desain langsung?', 'a' => 'Ya, siswa membuat proyek nyata seperti logo, poster, dan animasi digital.'],
    ],

    'bcf' => [
      ['q' => 'Apa itu jurusan BCF?', 'a' => 'BCF (Broadcasting & Film) berfokus pada produksi konten audio visual, film, dan penyiaran.'],
      ['q' => 'Apakah siswa membuat film sendiri?', 'a' => 'Ya, siswa memproduksi film pendek, dokumenter, dan konten digital profesional.'],
      ['q' => 'Apa peluang kerja lulusan BCF?', 'a' => 'Lulusan dapat menjadi editor video, sutradara, jurnalis TV, atau kreator konten.'],
    ],
  ];

  // Ambil data berdasarkan parameter yang dikirim dari include
  $data = $faqData[$jurusan ?? 'pplg'] ?? [];
@endphp

<section class="py-24 bg-gradient-to-b from-orange-50 via-white to-orange-50 relative overflow-hidden">
  <div class="max-w-4xl mx-auto px-6 md:px-10 relative z-10">
    {{-- Header --}}
    <div class="text-center mb-14">
      <div class="bg-orange-500 text-white text-sm font-semibold px-4 py-1.5 rounded-full inline-block mb-3">
        Pertanyaan Umum
      </div>
      <h3 class="text-3xl font-bold text-gray-800">FAQ — {{ strtoupper($jurusan ?? 'PPLG') }}</h3>
      <p class="text-gray-500 mt-2">Temukan jawaban seputar jurusan {{ strtoupper($jurusan ?? 'PPLG') }} di bawah ini</p>
    </div>

    {{-- FAQ List --}}
    <div x-data="{ active: null }" class="space-y-4">
      @foreach($data as $item)
        <div 
          class="bg-white border border-orange-100 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden"
          x-data="{ open: false }"
        >
          <button 
            @click="open = !open" 
            class="w-full flex justify-between items-center px-6 py-5 text-left focus:outline-none"
          >
            <span class="font-medium text-gray-800 text-lg">{{ $item['q'] }}</span>
            <i 
              data-lucide="chevron-down" 
              class="w-5 h-5 text-orange-500 transition-transform duration-300"
              :class="{ 'rotate-180': open }"
            ></i>
          </button>
          <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-orange-100"
          >
            {{ $item['a'] }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
