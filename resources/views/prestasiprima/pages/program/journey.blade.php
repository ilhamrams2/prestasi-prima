{{-- ========== JOURNEY BELAJAR (Dinamis per Jurusan) ========== --}}
@php
  $journeys = [
    'pplg' => [
      [
        'tahun' => 'Tahun 1',
        'judul' => 'Dasar Pemrograman',
        'icon' => 'bx-book-open',
        'list' => [
          'HTML, CSS, JavaScript',
          'Algoritma & Logika',
          'Database Dasar',
          'Git Version Control'
        ]
      ],
      [
        'tahun' => 'Tahun 2',
        'judul' => 'Pengembangan Aplikasi',
        'icon' => 'bx-code-alt',
        'list' => [
          'React & Vue.js',
          'Node.js & Express',
          'UI/UX Design',
          'Mobile Development'
        ]
      ],
      [
        'tahun' => 'Tahun 3',
        'judul' => 'Magang & Proyek Akhir',
        'icon' => 'bx-briefcase',
        'list' => [
          'Prakerin di Industri',
          'Capstone Project',
          'Sertifikasi Kompetensi',
          'Portfolio Building'
        ]
      ],
    ],

    'dkv' => [
      [
        'tahun' => 'Tahun 1',
        'judul' => 'Dasar Desain Visual',
        'icon' => 'bx-paint',
        'list' => [
          'Prinsip Desain & Warna',
          'Adobe Photoshop & Illustrator',
          'Typography Dasar',
          'Fotografi & Komposisi'
        ]
      ],
      [
        'tahun' => 'Tahun 2',
        'judul' => 'Kreativitas & Branding',
        'icon' => 'bx-bulb',
        'list' => [
          'Desain Logo & Identitas Brand',
          'Desain Kemasan',
          'Layout Majalah & Poster',
          'Desain Media Sosial'
        ]
      ],
      [
        'tahun' => 'Tahun 3',
        'judul' => 'Produksi Kreatif & Magang',
        'icon' => 'bx-briefcase',
        'list' => [
          'Animasi & Motion Graphic',
          'Video Editing Profesional',
          'Proyek Klien & Magang',
          'Portofolio Desain Profesional'
        ]
      ],
    ],

    'tjkt' => [
      [
        'tahun' => 'Tahun 1',
        'judul' => 'Dasar Jaringan Komputer',
        'icon' => 'bx-network-chart',
        'list' => [
          'Perakitan Komputer',
          'Sistem Operasi Jaringan',
          'Dasar IP Address & Subnetting',
          'Topologi & Kabel Jaringan'
        ]
      ],
      [
        'tahun' => 'Tahun 2',
        'judul' => 'Administrasi & Keamanan',
        'icon' => 'bx-shield-quarter',
        'list' => [
          'Mikrotik & Cisco Configuration',
          'Network Security',
          'Server Management (Linux & Windows)',
          'Virtualisasi & Cloud Basic'
        ]
      ],
      [
        'tahun' => 'Tahun 3',
        'judul' => 'Implementasi & Magang',
        'icon' => 'bx-briefcase',
        'list' => [
          'Monitoring & Troubleshooting Jaringan',
          'Prakerin di Industri IT',
          'Sertifikasi Jaringan (MTCNA, CCNA)',
          'Proyek Infrastruktur Jaringan'
        ]
      ],
    ],

    'bcf' => [
      [
        'tahun' => 'Tahun 1',
        'judul' => 'Dasar Bisnis dan Akuntansi',
        'icon' => 'bx-line-chart',
        'list' => [
          'Pengenalan Dunia Bisnis',
          'Administrasi Perkantoran',
          'Dasar Akuntansi & Keuangan',
          'Aplikasi Spreadsheet'
        ]
      ],
      [
        'tahun' => 'Tahun 2',
        'judul' => 'Strategi & Pemasaran',
        'icon' => 'bx-store-alt',
        'list' => [
          'Digital Marketing',
          'Kewirausahaan',
          'Perpajakan Dasar',
          'Public Speaking & Negosiasi'
        ]
      ],
      [
        'tahun' => 'Tahun 3',
        'judul' => 'Manajemen & Praktik Industri',
        'icon' => 'bx-briefcase',
        'list' => [
          'Magang di Dunia Usaha',
          'Analisis Keuangan',
          'Laporan Bisnis & Presentasi',
          'Proyek Kewirausahaan'
        ]
      ],
    ]
  ];
@endphp

@php
  $program = $program ?? 'pplg'; // default ke pplg jika tidak dikirim
  $data = $journeys[$program] ?? $journeys['pplg'];
@endphp

<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 md:px-8">
    <h2 class="text-3xl font-bold text-center text-orange-600 mb-16">
      Journey Belajar — {{ strtoupper($program) }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-gray-700">
      @foreach ($data as $item)
        <div class="flex flex-col">
          <div class="flex items-center mb-4">
            <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white text-3xl shadow-md mr-4">
              <i class='bx {{ $item['icon'] }}'></i>
            </div>
            <div>
              <span class="text-xs bg-gradient-to-r from-orange-400 to-orange-500 text-white px-3 py-0.5 rounded-full font-semibold">{{ $item['tahun'] }}</span>
              <h3 class="text-lg font-semibold text-gray-800 mt-1">{{ $item['judul'] }}</h3>
            </div>
          </div>

          <ul class="text-sm text-gray-600 space-y-2 ml-[4.5rem]">
            @foreach ($item['list'] as $point)
              <li class="flex items-center">
                <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>{{ $point }}
              </li>
            @endforeach
          </ul>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Boxicons --}}
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
