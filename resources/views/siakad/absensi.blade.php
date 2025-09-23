@extends('siakad.layouts.siakad')

@section('title', 'Manajemen Absensi')

@section('content')
<div class="p-6">
  <!-- Header -->
  <div class="flex justify-between items-start mb-6">
    <div>
      <h2 class="text-2xl font-bold">Manajemen Absensi</h2>
      <p class="text-gray-500">Lihat riwayat kehadiran Anda</p>
    </div>
    <span class="text-sm text-gray-500">Semester Genap 2023/2024</span>
  </div>

  <!-- Statistik Kehadiran -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <!-- Hadir -->
    <div class="flex items-center justify-between p-4 bg-green-50 border border-green-200 rounded-lg shadow-sm">
      <div>
        <p class="text-2xl font-bold text-green-600">156</p>
        <p class="text-gray-500 text-sm">Hadir</p>
      </div>
      <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-100">
        <i data-lucide="check-circle" class="text-green-600 w-7 h-7"></i>
      </div>
    </div>

    <!-- Tidak Hadir -->
    <div class="flex items-center justify-between p-4 bg-red-50 border border-red-200 rounded-lg shadow-sm">
      <div>
        <p class="text-2xl font-bold text-red-600">17</p>
        <p class="text-gray-500 text-sm">Tidak Hadir</p>
      </div>
      <div class="w-12 h-12 flex items-center justify-center rounded-full bg-red-100">
        <i data-lucide="x-circle" class="text-red-600 w-7 h-7"></i>
      </div>
    </div>

    <!-- Terlambat -->
    <div class="flex items-center justify-between p-4 bg-yellow-50 border border-yellow-200 rounded-lg shadow-sm">
      <div>
        <p class="text-2xl font-bold text-yellow-600">20</p>
        <p class="text-gray-500 text-sm">Terlambat</p>
      </div>
      <div class="w-12 h-12 flex items-center justify-center rounded-full bg-yellow-100">
        <i data-lucide="clock" class="text-yellow-500 w-7 h-7"></i>
      </div>
    </div>

    <!-- Izin -->
    <div class="flex items-center justify-between p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
      <div>
        <p class="text-2xl font-bold text-blue-600">8</p>
        <p class="text-gray-500 text-sm">Izin</p>
      </div>
      <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100">
        <i data-lucide="info" class="text-blue-500 w-7 h-7"></i>
      </div>
    </div>
  </div>

  <!-- Tabs -->
  <div class="flex items-center gap-2 mb-4">
    <button id="tabAbsensi" 
      class="flex items-center gap-2 px-4 py-2 rounded-md shadow-sm border transition 
             bg-orange-500 text-white border-orange-500">
      <i data-lucide="list" class="w-4 h-4"></i> Daftar Absensi
    </button>
    <button id="tabKalender" 
      class="flex items-center gap-2 px-4 py-2 rounded-md shadow-sm border transition 
             bg-white text-gray-600 border-gray-200 hover:bg-gray-100">
      <i data-lucide="calendar" class="w-4 h-4"></i> Kalender
    </button>
  </div>

  <!-- Content -->
  <div>
    <!-- Daftar Absensi -->
    <div id="contentAbsensi" class="bg-white rounded-xl shadow p-4">
      <div class="mb-4">
        <h3 class="text-gray-700 font-semibold">Riwayat Absensi</h3>
        <p class="text-gray-400 text-sm">Daftar kehadiran anda dalam 30 hari terakhir</p>
      </div>
      <ul class="space-y-3">
        <!-- Matematika (Terlambat) -->
        <li class="flex justify-between items-center bg-gray-50 rounded-lg px-4 py-3">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-yellow-100">
              <i data-lucide="clock" class="text-yellow-500 w-5 h-5"></i>
            </span>
            <div>
              <p class="font-medium text-gray-700">Matematika</p>
              <p class="text-sm text-gray-400">07:00 - 08:00</p>
            </div>
          </div>
          <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500">08:15</span>
            <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-600">Terlambat</span>
          </div>
        </li>

        <!-- DDPK (Hadir) -->
        <li class="flex justify-between items-center bg-gray-50 rounded-lg px-4 py-3">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-green-100">
              <i data-lucide="check-circle" class="text-green-500 w-5 h-5"></i>
            </span>
            <div>
              <p class="font-medium text-gray-700">DDPK</p>
              <p class="text-sm text-gray-400">08:00 - 09:00</p>
            </div>
          </div>
          <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500">08:00</span>
            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-600">Hadir</span>
          </div>
        </li>

        <!-- Bahasa Jepang (Tidak Hadir) -->
        <li class="flex justify-between items-center bg-gray-50 rounded-lg px-4 py-3">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-red-100">
              <i data-lucide="x-circle" class="text-red-500 w-5 h-5"></i>
            </span>
            <div>
              <p class="font-medium text-gray-700">Bahasa Jepang</p>
              <p class="text-sm text-gray-400">11:00 - 12:00</p>
            </div>
          </div>
          <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500">-</span>
            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-600">Tidak Hadir</span>
          </div>
        </li>

        <!-- Sejarah (Terlambat) -->
        <li class="flex justify-between items-center bg-gray-50 rounded-lg px-4 py-3">
          <div class="flex items-center gap-3">
            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-yellow-100">
              <i data-lucide="clock" class="text-yellow-500 w-5 h-5"></i>
            </span>
            <div>
              <p class="font-medium text-gray-700">Sejarah</p>
              <p class="text-sm text-gray-400">12:00 - 13:00</p>
            </div>
          </div>
          <div class="flex items-center gap-3">
            <span class="text-sm text-gray-500">13:40</span>
            <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-600">Terlambat</span>
          </div>
        </li>
      </ul>
    </div>

    <!-- Kalender -->
    <div id="contentKalender" class="hidden bg-white rounded-xl shadow p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Kalender -->
        <div class="border rounded-xl p-4">
          <h4 class="font-semibold mb-2 flex items-center gap-2">
            <i data-lucide="calendar" class="w-5 h-5 text-orange-500"></i>
            Pilih Tanggal
          </h4>
          <div class="flex justify-between items-center mb-2">
            <button class="text-gray-500 hover:text-gray-700">&lt;</button>
            <span class="font-medium">September 2025</span>
            <button class="text-gray-500 hover:text-gray-700">&gt;</button>
          </div>
          <div class="grid grid-cols-7 text-center text-sm text-gray-500 mb-1">
            <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
          </div>
          <div class="grid grid-cols-7 gap-1 text-center">
            <span class="text-gray-400">28</span>
            <span class="text-gray-400">29</span>
            <span class="text-gray-400">30</span>
            <span class="text-gray-400">31</span>
            <span>1</span><span>2</span><span>3</span>
            <span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span>
            <span>11</span><span>12</span><span>13</span><span>14</span><span>15</span>
            <span class="bg-orange-500 text-white rounded-full px-2 py-1">16</span>
            <span>17</span><span>18</span><span>19</span><span>20</span><span>21</span><span>22</span><span>23</span>
            <span>24</span><span>25</span><span>26</span><span>27</span><span>28</span><span>29</span><span>30</span>
          </div>
        </div>

        <!-- Detail Absensi -->
        <div class="border rounded-xl p-4">
          <h4 class="font-semibold mb-4">Absensi Tanggal 16/9/2025</h4>
          <div class="space-y-3">
            <div class="flex justify-between items-center bg-orange-50 p-3 rounded-lg border-l-4 border-orange-400">
              <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="text-green-500 w-5 h-5"></i>
                <div>
                  <p class="font-medium text-gray-700">Matematika</p>
                  <p class="text-sm text-gray-400">08:00 - 10:00</p>
                </div>
              </div>
              <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">Hadir</span>
            </div>

            <div class="flex justify-between items-center bg-blue-50 p-3 rounded-lg border-l-4 border-blue-400">
              <div class="flex items-center gap-3">
                <i data-lucide="clock" class="text-yellow-500 w-5 h-5"></i>
                <div>
                  <p class="font-medium text-gray-700">Matematika</p>
                  <p class="text-sm text-gray-400">10:00 - 12:00</p>
                </div>
              </div>
              <span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full">Terlambat</span>
            </div>

            <div class="flex justify-between items-center bg-green-50 p-3 rounded-lg border-l-4 border-green-400">
              <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="text-green-500 w-5 h-5"></i>
                <div>
                  <p class="font-medium text-gray-700">Fisika</p>
                  <p class="text-sm text-gray-400">13:00 - 15:00</p>
                </div>
              </div>
              <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">Hadir</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CDN Lucide + Script -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();

  const tabAbsensi = document.getElementById('tabAbsensi');
  const tabKalender = document.getElementById('tabKalender');
  const contentAbsensi = document.getElementById('contentAbsensi');
  const contentKalender = document.getElementById('contentKalender');

  tabAbsensi.addEventListener('click', () => {
    contentAbsensi.classList.remove('hidden');
    contentKalender.classList.add('hidden');
    tabAbsensi.classList.add('bg-orange-500','text-white','border-orange-500');
    tabAbsensi.classList.remove('bg-white','text-gray-600','border-gray-200');
    tabKalender.classList.remove('bg-orange-500','text-white','border-orange-500');
    tabKalender.classList.add('bg-white','text-gray-600','border-gray-200');
  });

  tabKalender.addEventListener('click', () => {
    contentAbsensi.classList.add('hidden');
    contentKalender.classList.remove('hidden');
    tabKalender.classList.add('bg-orange-500','text-white','border-orange-500');
    tabKalender.classList.remove('bg-white','text-gray-600','border-gray-200');
    tabAbsensi.classList.remove('bg-orange-500','text-white','border-orange-500');
    tabAbsensi.classList.add('bg-white','text-gray-600','border-gray-200');
  });
</script>
@endsection
