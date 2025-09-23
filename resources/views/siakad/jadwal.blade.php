@extends('siakad.layouts.siakad')

@section('title', 'Jadwal Pelajaran')

@section('content')
<div class="p-6">

  <!-- Header -->
  <div class="flex justify-between items-start mb-6">
    <div>
      <h2 class="text-2xl font-bold">Jadwal Pelajaran</h2>
      <p class="text-gray-500">Jadwal Pelajaran X PPLG 1</p>
    </div>
    <div class="text-sm text-gray-500">
      Semester Genap 2023/2024
    </div>
  </div>

  <!-- Statistik -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 animate-fade-in">
    <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-3 hover:shadow-lg transition">
      <div class="bg-orange-100 text-orange-500 p-2 rounded-lg animate-pulse">
        <i class="ri-time-line text-xl"></i>
      </div>
      <div>
        <p class="text-sm text-gray-500">Jam Pelajaran/Minggu</p>
        <h3 class="text-xl font-bold">64</h3>
      </div>
    </div>
    <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-3 hover:shadow-lg transition">
      <div class="bg-blue-100 text-blue-500 p-2 rounded-lg animate-pulse">
        <i class="ri-book-open-line text-xl"></i>
      </div>
      <div>
        <p class="text-sm text-gray-500">Mata Pelajaran</p>
        <h3 class="text-xl font-bold">15</h3>
      </div>
    </div>
    <div class="bg-white shadow rounded-lg p-4 flex items-center space-x-3 hover:shadow-lg transition">
      <div class="bg-yellow-100 text-yellow-500 p-2 rounded-lg animate-pulse">
        <i class="ri-map-pin-line text-xl"></i>
      </div>
      <div>
        <p class="text-sm text-gray-500">Ruangan</p>
        <h3 class="text-xl font-bold">15</h3>
      </div>
    </div>
  </div>

  <!-- Tab Hari -->
  <div class="mb-6 border-b border-gray-200">
    <nav class="flex space-x-2">
      <button class="px-4 py-2 rounded-t-lg bg-orange-500 text-white font-medium shadow-md">Senin</button>
      <button class="px-4 py-2 rounded-t-lg text-gray-600 hover:text-orange-500">Selasa</button>
      <button class="px-4 py-2 rounded-t-lg text-gray-600 hover:text-orange-500">Rabu</button>
      <button class="px-4 py-2 rounded-t-lg text-gray-600 hover:text-orange-500">Kamis</button>
      <button class="px-4 py-2 rounded-t-lg text-gray-600 hover:text-orange-500">Jumat</button>
    </nav>
  </div>

  <!-- Jadwal Hari Senin -->
  <div class="space-y-3">

    <!-- Card Orange -->
    <div class="p-4 rounded-lg border border-orange-500 bg-orange-50 shadow-md flex items-start space-x-3 
                hover:shadow-orange-200 hover:border-orange-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-orange-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-orange-600 text-sm">07:30 - 08:14</p>
        <p class="text-gray-800 font-medium">Matematika</p>
        <p class="text-xs text-gray-500">Ms. Dinda • Ruang 14</p>
      </div>
    </div>

    <div class="p-4 rounded-lg border border-orange-500 bg-orange-50 shadow-md flex items-start space-x-3 
                hover:shadow-orange-200 hover:border-orange-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-orange-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-orange-600 text-sm">08:30 - 09:14</p>
        <p class="text-gray-800 font-medium">PAI</p>
        <p class="text-xs text-gray-500">Ms. Elanto • Ruang 14</p>
      </div>
    </div>

    <!-- Card Biru -->
    <div class="p-4 rounded-lg border border-blue-500 bg-blue-50 shadow-md flex items-start space-x-3 
                hover:shadow-blue-200 hover:border-blue-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-blue-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-blue-600 text-sm">10:30 - 11:14</p>
        <p class="text-gray-800 font-medium">Seni Budaya</p>
        <p class="text-xs text-gray-500">Sir Yance • Ruang 14</p>
      </div>
    </div>

    <div class="p-4 rounded-lg border border-blue-500 bg-blue-50 shadow-md flex items-start space-x-3 
                hover:shadow-blue-200 hover:border-blue-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-blue-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-blue-600 text-sm">11:30 - 12:14</p>
        <p class="text-gray-800 font-medium">Sejarah</p>
        <p class="text-xs text-gray-500">Sir Ilham • Ruang 14</p>
      </div>
    </div>

    <!-- Orange lagi -->
    <div class="p-4 rounded-lg border border-orange-500 bg-orange-50 shadow-md flex items-start space-x-3 
                hover:shadow-orange-200 hover:border-orange-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-orange-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-orange-600 text-sm">12:30 - 13:14</p>
        <p class="text-gray-800 font-medium">Bahasa Jepang</p>
        <p class="text-xs text-gray-500">Ms. Qijah • Ruang 14</p>
      </div>
    </div>

    <div class="p-4 rounded-lg border border-orange-500 bg-orange-50 shadow-md flex items-start space-x-3 
                hover:shadow-orange-200 hover:border-orange-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-orange-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-orange-600 text-sm">13:30 - 14:14</p>
        <p class="text-gray-800 font-medium">Bahasa Indonesia</p>
        <p class="text-xs text-gray-500">Sir Sapta • Ruang 14</p>
      </div>
    </div>

    <!-- Biru lagi -->
    <div class="p-4 rounded-lg border border-blue-500 bg-blue-50 shadow-md flex items-start space-x-3 
                hover:shadow-blue-200 hover:border-blue-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-blue-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-blue-600 text-sm">14:30 - 15:14</p>
        <p class="text-gray-800 font-medium">DDPK</p>
        <p class="text-xs text-gray-500">Sir Agus • Ruang 14</p>
      </div>
    </div>

    <div class="p-4 rounded-lg border border-blue-500 bg-blue-50 shadow-md flex items-start space-x-3 
                hover:shadow-blue-200 hover:border-blue-600 transition transform hover:scale-[1.02] animate-fade-in-up">
      <i class="ri-time-line text-blue-500 text-lg mt-1 animate-pulse"></i>
      <div>
        <p class="font-bold text-blue-600 text-sm">15:30 - 16:14</p>
        <p class="text-gray-800 font-medium">KDKA</p>
        <p class="text-xs text-gray-500">Ms. Hana • Ruang 14</p>
      </div>
    </div>

  </div>
</div>

<!-- Tambahkan animasi via Tailwind -->
<style>
  @keyframes fade-in-up {
    0% {opacity: 0; transform: translateY(15px);}
    100% {opacity: 1; transform: translateY(0);}
  }
  .animate-fade-in-up {animation: fade-in-up 0.6s ease forwards;}
  .animate-fade-in {animation: fade-in-up 0.8s ease forwards;}
</style>
@endsection
