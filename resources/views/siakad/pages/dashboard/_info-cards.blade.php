{{-- Bagian Card Fitur --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6 mt-6">
  @php
    $cards = [
      ['icon' => 'calendar', 'title' => 'Jadwal Pelajaran', 'desc' => 'Lihat jadwal belajar harian', 'color' => 'blue'],
      ['icon' => 'user-check', 'title' => 'Absensi', 'desc' => 'Cek kehadiran siswa', 'color' => 'green'],
      ['icon' => 'award', 'title' => 'Nilai & Rapor', 'desc' => 'Pantau perkembangan nilai', 'color' => 'yellow'],
      ['icon' => 'briefcase', 'title' => 'PKL', 'desc' => 'Informasi praktik kerja lapangan', 'color' => 'orange'],
      ['icon' => 'megaphone', 'title' => 'Pengumuman', 'desc' => 'Berita & info terbaru', 'color' => 'red']
    ];
  @endphp

  @foreach ($cards as $c)
  <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg hover:scale-[1.03] transition-all">
    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-{{ $c['color'] }}-100 mb-3">
      <i data-lucide="{{ $c['icon'] }}" class="text-{{ $c['color'] }}-600 w-6 h-6"></i>
    </div>
    <h3 class="font-semibold text-gray-700 text-sm">{{ $c['title'] }}</h3>
    <p class="text-gray-500 text-xs mt-1">{{ $c['desc'] }}</p>
  </div>
  @endforeach
</div>

{{-- Kalender & Notifikasi --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 mt-6">
  <div class="bg-white rounded-xl shadow-md p-5">
    <h3 class="font-semibold text-gray-700 mb-3 flex items-center gap-2 text-sm sm:text-base">
      <i data-lucide="calendar" class="w-5 h-5 text-orange-500"></i> Kalender Akademik
    </h3>
    <div id="calendar" class="text-xs sm:text-sm"></div>
  </div>

  <div class="bg-white rounded-xl shadow-md p-5">
    <h3 class="font-semibold text-gray-700 mb-3 flex items-center gap-2 text-sm sm:text-base">
      <i data-lucide="bell" class="w-5 h-5 text-indigo-500"></i> Notifikasi Terbaru
    </h3>
    <ul id="notifikasiList" class="space-y-2 text-xs sm:text-sm">
      <li class="bg-indigo-50 p-3 rounded-md animate-fade">📢 Rapat guru minggu depan, Senin pukul 10.00</li>
      <li class="bg-orange-50 p-3 rounded-md animate-fade">🗓️ Ulangan Harian dimulai tanggal 16 Oktober</li>
      <li class="bg-green-50 p-3 rounded-md animate-fade">🎉 Siswa terbaik bulan ini: <b>Rizky Pratama</b></li>
    </ul>
  </div>
</div>
