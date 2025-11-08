{{-- ========== FAQ SECTION (Reusable for All Majors) ========== --}}
@php
  $faqData = [
    'pplg' => [
      [
        'q' => 'Apa yang dipelajari di jurusan PPLG?',
        'a' => 'Siswa PPLG belajar membuat aplikasi web, mobile, dan game. Selain coding, mereka juga diajarkan desain UI/UX, database, dan logika pemrograman modern.'
      ],
      [
        'q' => 'Apakah ada praktik langsung dalam pembelajaran?',
        'a' => 'Tentu. Setiap proyek berbasis praktik, seperti membuat website, aplikasi Android, hingga game 2D sederhana yang langsung diuji di lab komputer.'
      ],
      [
        'q' => 'Bagaimana peluang kerja setelah lulus?',
        'a' => 'Lulusan PPLG bisa jadi web developer, game developer, atau UI/UX designer. Banyak juga yang bekerja freelance atau membuat startup sendiri.'
      ],
    ],

    'tjkt' => [
      [
        'q' => 'Apa fokus utama jurusan TJKT?',
        'a' => 'TJKT berfokus pada jaringan komputer dan sistem komunikasi. Siswa belajar merancang, mengelola, dan mengamankan jaringan dari dasar hingga tingkat lanjut.'
      ],
      [
        'q' => 'Apakah pembelajaran dilakukan secara praktik?',
        'a' => 'Ya, sebagian besar kegiatan dilakukan di lab jaringan. Siswa menggunakan perangkat Mikrotik, Cisco, dan server untuk simulasi konfigurasi jaringan nyata.'
      ],
      [
        'q' => 'Apa prospek kerja lulusan TJKT?',
        'a' => 'Lulusan TJKT dapat bekerja sebagai teknisi IT, network engineer, atau system administrator di berbagai perusahaan teknologi dan perkantoran.'
      ],
    ],

    'dkv' => [
      [
        'q' => 'Apa yang dipelajari di jurusan DKV?',
        'a' => 'Siswa DKV belajar menciptakan karya visual seperti desain grafis, animasi, video, dan branding menggunakan software desain profesional.'
      ],
      [
        'q' => 'Apakah siswa belajar menggunakan software desain?',
        'a' => 'Ya, mereka menggunakan Adobe Photoshop, Illustrator, Premiere Pro, dan After Effects untuk mengerjakan proyek desain dan multimedia.'
      ],
      [
        'q' => 'Bagaimana prospek kerja setelah lulus?',
        'a' => 'Lulusan DKV bisa bekerja di agensi kreatif, media digital, atau jadi kreator konten profesional di dunia industri kreatif modern.'
      ],
    ],

    'bcf' => [
      [
        'q' => 'Apa yang dipelajari di jurusan BCF?',
        'a' => 'Jurusan BCF mengajarkan produksi film, siaran televisi, dan konten digital. Siswa belajar sinematografi, editing, dan teknik penyiaran.'
      ],
      [
        'q' => 'Apakah siswa membuat film sendiri?',
        'a' => 'Ya, siswa memproduksi film pendek, dokumenter, dan konten digital menggunakan kamera, lighting, dan peralatan profesional.'
      ],
      [
        'q' => 'Bagaimana peluang karier lulusan BCF?',
        'a' => 'Lulusan BCF bisa jadi editor video, kameramen, sutradara, jurnalis TV, atau kreator konten di platform digital.'
      ],
    ],
  ];

  $data = $faqData[$jurusan ?? 'pplg'] ?? [];
@endphp


<section class="py-24 bg-gradient-to-b from-orange-50 via-white to-orange-50 relative overflow-hidden">
  <div class="max-w-4xl mx-auto px-6 md:px-10 relative z-10">
    
    {{-- ===== Header ===== --}}
    <div class="text-center mb-16">
      <div class="bg-orange-500 text-white text-sm font-semibold px-4 py-1.5 rounded-full inline-block mb-4 shadow-sm">
        Pertanyaan Umum
      </div>
      <h3 class="text-3xl md:text-4xl font-extrabold text-gray-800 tracking-tight">
        FAQ — {{ strtoupper($jurusan ?? 'PPLG') }}
      </h3>
      <p class="text-gray-500 mt-3 text-base">
        Temukan jawaban seputar jurusan {{ strtoupper($jurusan ?? 'PPLG') }} di bawah ini
      </p>
    </div>

    {{-- ===== FAQ List ===== --}}
    <div class="space-y-4" x-data="{ active: null }">
      @foreach($data as $index => $item)
        <div 
          x-data="{ open: false }"
          class="bg-white border border-orange-100 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden"
        >
          {{-- Pertanyaan --}}
          <button 
            @click="open = !open" 
            class="w-full flex justify-between items-center px-6 py-5 text-left focus:outline-none"
          >
            <span class="font-semibold text-gray-800 text-lg leading-snug">
              {{ $item['q'] }}
            </span>
            <i 
              data-lucide="chevron-down" 
              class="w-5 h-5 text-orange-500 transition-transform duration-300 ease-in-out"
              :class="{ 'rotate-180': open }"
            ></i>
          </button>

          {{-- Jawaban --}}
          <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="px-6 pt-4 pb-6 text-gray-600 text-base leading-relaxed border-t border-orange-100"
          >
            {{ $item['a'] }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
