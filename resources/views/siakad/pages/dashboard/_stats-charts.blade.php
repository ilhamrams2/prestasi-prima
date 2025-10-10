{{-- Statistik Atas --}}
<div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
  @php
    $stats = [
      ['title' => 'Kehadiran', 'value' => '90%', 'color' => 'green', 'icon' => 'check-circle'],
      ['title' => 'Rata-Rata Nilai', 'value' => '88,9', 'color' => 'yellow', 'icon' => 'trophy'],
      ['title' => 'Mata Pelajaran', 'value' => '14', 'color' => 'orange', 'icon' => 'book-open'],
      ['title' => 'Pesan', 'value' => '3', 'color' => 'blue', 'icon' => 'message-square']
    ];
  @endphp

  @foreach ($stats as $stat)
  <div class="bg-white rounded-xl shadow-md p-4 sm:p-5 relative flex flex-col justify-between hover:scale-[1.03] transition-transform">
    <div class="absolute top-3 right-3 sm:top-4 sm:right-4 bg-{{ $stat['color'] }}-100 p-2 rounded-lg">
      <i data-lucide="{{ $stat['icon'] }}" class="w-5 h-5 sm:w-6 sm:h-6 text-{{ $stat['color'] }}-600"></i>
    </div>
    <h3 class="text-gray-700 font-semibold text-xs sm:text-sm">{{ $stat['title'] }}</h3>
    <p class="text-xl sm:text-3xl font-bold mt-1 sm:mt-2">{{ $stat['value'] }}</p>
  </div>
  @endforeach
</div>

{{-- Grafik Statistik --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 mt-6">
  <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
    <h3 class="font-semibold text-gray-700 mb-3 text-sm sm:text-base">Grafik Kehadiran Mingguan</h3>
    <canvas id="chartKehadiran" class="w-full h-48"></canvas>
  </div>
  <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
    <h3 class="font-semibold text-gray-700 mb-3 text-sm sm:text-base">Rata-Rata Nilai per Mata Pelajaran</h3>
    <canvas id="chartNilai" class="w-full h-48"></canvas>
  </div>
</div>
