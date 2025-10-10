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

  {{-- ====== Statistik Atas ====== --}}
  <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative flex flex-col justify-between hover:scale-[1.03] transition-transform">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-green-100 p-2 rounded-lg">
        <i data-lucide="check-circle" class="w-5 h-5 sm:w-6 sm:h-6 text-green-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-xs sm:text-sm">Kehadiran</h3>
      <p class="text-xl sm:text-3xl font-bold mt-1 sm:mt-2">90%</p>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative flex flex-col justify-between hover:scale-[1.03] transition-transform">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-yellow-100 p-2 rounded-lg">
        <i data-lucide="trophy" class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-xs sm:text-sm">Rata-Rata Nilai</h3>
      <p class="text-xl sm:text-3xl font-bold mt-1 sm:mt-2">88,9</p>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative flex flex-col justify-between hover:scale-[1.03] transition-transform">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-orange-100 p-2 rounded-lg">
        <i data-lucide="book-open" class="w-5 h-5 sm:w-6 sm:h-6 text-orange-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-xs sm:text-sm">Mata Pelajaran</h3>
      <p class="text-xl sm:text-3xl font-bold mt-1 sm:mt-2">14</p>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative flex flex-col justify-between hover:scale-[1.03] transition-transform">
      <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-blue-100 p-2 rounded-lg">
        <i data-lucide="message-square" class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600"></i>
      </div>
      <h3 class="text-gray-700 font-semibold text-xs sm:text-sm">Pesan</h3>
      <p class="text-xl sm:text-3xl font-bold mt-1 sm:mt-2">3</p>
    </div>
  </div>

  {{-- ====== CARD FITUR ====== --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
    <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition-all hover:scale-[1.02]">
      <div class="flex items-center justify-between">
        <h3 class="font-semibold text-gray-800">Jadwal Pelajaran</h3>
        <i data-lucide="calendar" class="text-orange-500 w-6 h-6"></i>
      </div>
      <p class="text-sm text-gray-500 mt-2">Lihat jadwal pelajaran harian Anda.</p>
      <a href="#" class="text-orange-500 text-sm font-medium mt-3 inline-block">Lihat Jadwal &rarr;</a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition-all hover:scale-[1.02]">
      <div class="flex items-center justify-between">
        <h3 class="font-semibold text-gray-800">Absensi</h3>
        <i data-lucide="clipboard-list" class="text-green-500 w-6 h-6"></i>
      </div>
      <p class="text-sm text-gray-500 mt-2">Pantau riwayat kehadiran Anda.</p>
      <a href="#" class="text-green-600 text-sm font-medium mt-3 inline-block">Cek Kehadiran &rarr;</a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition-all hover:scale-[1.02]">
      <div class="flex items-center justify-between">
        <h3 class="font-semibold text-gray-800">Nilai & Rapor</h3>
        <i data-lucide="bar-chart" class="text-yellow-500 w-6 h-6"></i>
      </div>
      <p class="text-sm text-gray-500 mt-2">Lihat hasil belajar dan rapor Anda.</p>
      <a href="#" class="text-yellow-600 text-sm font-medium mt-3 inline-block">Lihat Nilai &rarr;</a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition-all hover:scale-[1.02]">
      <div class="flex items-center justify-between">
        <h3 class="font-semibold text-gray-800">PKL</h3>
        <i data-lucide="briefcase" class="text-emerald-500 w-6 h-6"></i>
      </div>
      <p class="text-sm text-gray-500 mt-2">Pantau perkembangan kegiatan PKL Anda.</p>
      <a href="#" class="text-emerald-600 text-sm font-medium mt-3 inline-block">Lihat PKL &rarr;</a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition-all hover:scale-[1.02]">
      <div class="flex items-center justify-between">
        <h3 class="font-semibold text-gray-800">Pengumuman</h3>
        <i data-lucide="bell" class="text-indigo-500 w-6 h-6"></i>
      </div>
      <p class="text-sm text-gray-500 mt-2">Lihat informasi terbaru dari sekolah.</p>
      <a href="#" class="text-indigo-600 text-sm font-medium mt-3 inline-block">Lihat Pengumuman &rarr;</a>
    </div>
  </div>

  {{-- ====== Chart Statistik Kehadiran & Nilai ====== --}}
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
      <h3 class="font-semibold text-gray-700 mb-3 text-sm sm:text-base">Grafik Kehadiran Mingguan</h3>
      <canvas id="chartKehadiran" class="w-full h-48"></canvas>
    </div>
    <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
      <h3 class="font-semibold text-gray-700 mb-3 text-sm sm:text-base">Rata-Rata Nilai per Mata Pelajaran</h3>
      <canvas id="chartNilai" class="w-full h-48"></canvas>
    </div>
  </div>

  {{-- ====== Kalender & Notifikasi ====== --}}
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
    {{-- Kalender Interaktif --}}
    <div class="bg-white rounded-xl shadow-md p-5">
      <h3 class="font-semibold text-gray-700 mb-3 text-sm sm:text-base flex items-center gap-2">
        <i data-lucide="calendar-days" class="w-5 h-5 text-orange-500"></i> Kalender Akademik
      </h3>
      <div id="calendar" class="text-xs sm:text-sm"></div>
    </div>

    {{-- Notifikasi Real-time --}}
    <div class="bg-white rounded-xl shadow-md p-5">
      <h3 class="font-semibold text-gray-700 mb-3 text-sm sm:text-base flex items-center gap-2">
        <i data-lucide="bell-ring" class="w-5 h-5 text-indigo-500"></i> Notifikasi Terbaru
      </h3>
      <ul id="notifikasiList" class="space-y-2 text-xs sm:text-sm">
        <li class="bg-indigo-50 p-3 rounded-md animate-fade">📢 Rapat guru minggu depan, Senin pukul 10.00</li>
        <li class="bg-orange-50 p-3 rounded-md animate-fade">🗓️ Ulangan Harian dimulai tanggal 16 Oktober</li>
        <li class="bg-green-50 p-3 rounded-md animate-fade">🎉 Siswa terbaik bulan ini: <b>Rizky Pratama</b></li>
      </ul>
    </div>
  </div>

</div>
@endsection

@push('scripts')
{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- FullCalendar --}}
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>

<style>
  /* Animasi Fade-in untuk notifikasi */
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade {
    animation: fadeIn 0.5s ease forwards;
  }
</style>

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
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true, max: 100 } }
    }
  });

  // === Grafik Nilai ===
  const ctxNilai = document.getElementById('chartNilai');
  new Chart(ctxNilai, {
    type: 'bar',
    data: {
      labels: ['PAI', 'MTK', 'B. Indo', 'PJOK', 'IPS', 'IPA'],
      datasets: [{
        label: 'Nilai Rata-Rata',
        data: [89, 92, 85, 90, 87, 93],
        backgroundColor: ['#60A5FA', '#34D399', '#FBBF24', '#F87171', '#A78BFA', '#F97316']
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true, max: 100 } }
    }
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
      eventClick: function(info) {
        Swal.fire({
          icon: 'info',
          title: info.event.title,
          text: `Tanggal: ${info.event.start.toLocaleDateString('id-ID')}`,
          confirmButtonColor: '#f97316'
        });
      }
    });
    calendar.render();
  });

  // === Notifikasi Real-time (dummy auto-refresh) ===
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

{{-- INI BAGIAN DASHBOARD YANG FULL CODE --}}