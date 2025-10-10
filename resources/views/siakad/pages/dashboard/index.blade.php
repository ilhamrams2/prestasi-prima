@extends('siakad.index')

@section('content')
<div class="container mx-auto px-4 sm:px-6 py-6 space-y-8">

  {{-- ====== Banner Sambutan ====== --}}
  <div class="bg-gradient-to-r from-orange-500 to-yellow-400 rounded-xl shadow-md p-6 text-white text-center sm:text-left">
    <h2 class="text-lg sm:text-xl font-bold">
      Selamat Datang, {{ Auth::guard('siakad')->user()->name }}
    </h2>
    <p class="text-xs sm:text-sm mt-1">
      Teacher ID: {{ Auth::guard('siakad')->user()->teacher_id }}
    </p>
  </div>

  {{-- ====== Statistik & Grafik ====== --}}
  @include('siakad.pages.dashboard._stats-charts')

  {{-- ====== Card Fitur, Kalender, Notifikasi ====== --}}
  @include('siakad.pages.dashboard._info-cards')

</div>
@endsection

@push('scripts')
  {{-- Chart.js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  {{-- FullCalendar --}}
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade {
      animation: fadeIn 0.5s ease forwards;
    }
  </style>

  {{-- Script Grafik, Kalender, dan Notifikasi --}}
  <script>
    // === Grafik Kehadiran ===
    const ctxKehadiran = document.getElementById('chartKehadiran');
    new Chart(ctxKehadiran, {
      type: 'line',
      data: {
        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
        datasets: [{
          label: 'Kehadiran (%)',
          data: [88, 92, 90, 95, 91],
          borderColor: '#F97316',
          backgroundColor: '#FDBA74',
          tension: 0.4,
          fill: true
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { y: { max: 100, beginAtZero: true } } }
    });

    // === Grafik Nilai ===
    const ctxNilai = document.getElementById('chartNilai');
    new Chart(ctxNilai, {
      type: 'bar',
      data: {
        labels: ['PAI', 'MTK', 'B. Indo', 'PJOK', 'IPS', 'IPA'],
        datasets: [{
          data: [89, 92, 85, 90, 87, 93],
          backgroundColor: ['#60A5FA', '#34D399', '#FBBF24', '#F87171', '#A78BFA', '#F97316']
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { y: { max: 100, beginAtZero: true } } }
    });

    // === FullCalendar ===
    document.addEventListener('DOMContentLoaded', function() {
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 400,
        events: [
          { title: 'Rapat Guru', start: '2025-10-14', color: '#F59E0B' },
          { title: 'Ulangan Harian', start: '2025-10-16', color: '#3B82F6' },
          { title: 'Libur Sekolah', start: '2025-10-21', color: '#10B981' },
        ],
        eventClick: info => Swal.fire({
          icon: 'info',
          title: info.event.title,
          text: `Tanggal: ${info.event.start.toLocaleDateString('id-ID')}`,
          confirmButtonColor: '#f97316'
        })
      });
      calendar.render();
    });

    // === Notifikasi Otomatis ===
    const notifikasiList = document.getElementById('notifikasiList');
    const notifikasiBaru = [
      "📚 Pengumpulan tugas Bahasa Inggris diperpanjang hingga 15 Oktober",
      "🏆 Pengumuman lomba desain poster akan diumumkan Jumat",
      "🕒 Jadwal ujian tengah semester akan keluar minggu depan"
    ];
    let indexNotif = 0;
    setInterval(() => {
      if (indexNotif < notifikasiBaru.length) {
        const li = document.createElement('li');
        li.className = 'bg-blue-50 p-3 rounded-md animate-fade';
        li.textContent = notifikasiBaru[indexNotif];
        notifikasiList.prepend(li);
        indexNotif++;
      }
    }, 10000);
  </script>
@endpush

{{-- INI BAGIAN DASHBOARD YANG MODULAR --}}