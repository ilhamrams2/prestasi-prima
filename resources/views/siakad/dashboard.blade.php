@extends('siakad.layouts.siakad')

@section('title', 'Dashboard SIAKAD')

@section('content')
  <!-- Header -->
<div class="rounded-xl p-6 mb-6 text-white shadow-lg animate-fade-in-down"
     style="background: linear-gradient(to right, #ea580c, #f97316, #fb923c);">
  <h2 class="text-2xl font-bold">Selamat Datang, Ardy Albanna!</h2>
  <p class="text-sm">Kelas X PPLG • NIS: 10298109207</p>
</div>


  <!-- Statistik -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    @php
      $stats = [
        ['Kehadiran', '90%', 'ri-calendar-check-line', 'bg-green-100 text-green-500'],
        ['Rata-rata Nilai', '88,9', 'ri-trophy-line', 'bg-yellow-100 text-yellow-500'],
        ['Mata Pelajaran', '14', 'ri-book-open-line', 'bg-orange-100 text-orange-500'],
        ['Pesan', '3', 'ri-message-3-line', 'bg-blue-100 text-blue-500'],
      ];
    @endphp
    @foreach($stats as $index => $s)
      <div class="bg-white shadow-md rounded-lg p-4 relative hover:shadow-lg hover:-translate-y-1 transition duration-300 
                  animate-fade-in-up"
           style="animation-delay: {{ $index * 0.2 }}s;">
        <div class="absolute top-3 right-3 {{ $s[3] }} p-2 rounded-lg">
          <i class="{{ $s[2] }} text-lg"></i>
        </div>
        <p class="text-gray-500 text-sm">{{ $s[0] }}</p>
        <h3 class="text-2xl font-bold text-gray-800">{{ $s[1] }}</h3>
      </div>
    @endforeach
  </div>

  <!-- Card Menu -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @php
      $menus = [
        ['Jadwal Pelajaran', 'siakad.jadwal', 'Lihat Jadwal Harian', 'ri-calendar-line', 'text-orange-400'],
        ['Absensi', 'siakad.absensi', 'Cek Kehadiran', 'ri-checkbox-circle-line', 'text-blue-400'],
        ['Nilai & Rapor', 'siakad.nilai', 'Lihat Nilai', 'ri-award-line', 'text-yellow-400'],
        ['PKL', 'siakad.pkl', 'Lihat Perkembangan PKL', 'ri-briefcase-line', 'text-green-400'],
        ['Pengumuman', 'siakad.pengumuman', 'Info Terbaru', 'ri-notification-3-line', 'text-purple-400'],
      ];
    @endphp
    @foreach($menus as $index => $m)
      <div class="bg-white shadow-md rounded-lg p-4 relative hover:shadow-lg hover:-translate-y-1 transition duration-300 
                  animate-fade-in-up"
           style="animation-delay: {{ $index * 0.3 }}s;">
        <div class="absolute top-3 right-3 {{ $m[4] }}">
          <i class="{{ $m[3] }} text-2xl opacity-30"></i>
        </div>
        <p class="font-semibold text-gray-800">{{ $m[0] }}</p>
        <a href="{{ route($m[1]) }}" class="text-orange-600 text-sm mt-2 inline-block hover:underline">
          {{ $m[2] }}
        </a>
      </div>
    @endforeach
  </div>

  <!-- Aktivitas Terbaru -->
  <div class="bg-white shadow-md rounded-lg p-4 animate-fade-in-up" style="animation-delay: 1s;">
    <h3 class="font-semibold mb-3 text-gray-800">Aktivitas Terbaru</h3>
    <ul class="space-y-2 text-sm">
      <li class="flex items-center space-x-2 bg-orange-50 p-2 rounded hover:bg-orange-100 transition">
        <span class="w-3 h-3 bg-orange-400 rounded-full"></span>
        <span>Tugas Matematika telah dinilai - Nilai: 88</span>
      </li>
      <li class="flex items-center space-x-2 bg-blue-50 p-2 rounded hover:bg-blue-100 transition">
        <span class="w-3 h-3 bg-blue-400 rounded-full"></span>
        <span>Tugas Pai telah dinilai - Nilai: 98</span>
      </li>
    </ul>
  </div>
@endsection

@push('styles')
<style>
  @keyframes fade-in-down {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  @keyframes fade-in-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-down { animation: fade-in-down 0.6s ease-out forwards; }
  .animate-fade-in-up { animation: fade-in-up 0.6s ease-out forwards; }
</style>
@endpush
