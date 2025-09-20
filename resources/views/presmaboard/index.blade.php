@extends('prestasiprima.index')
@section('title','Presmaboard - SMK Prestasi Prima')

@section('content')
<div class="max-w-7xl mx-auto px-4 md:px-8 pt-32 pb-10">

  <!-- Tabs Program -->
  <div class="flex justify-center gap-4 mb-10">
    <button class="bg-orange-500 text-white px-6 py-3 rounded-full font-semibold shadow">PPLG</button>
    <button class="bg-orange-50 text-orange-500 px-6 py-3 rounded-full font-semibold shadow">TJKT</button>
    <button class="bg-orange-50 text-orange-500 px-6 py-3 rounded-full font-semibold shadow">DKV</button>
    <button class="bg-orange-50 text-orange-500 px-6 py-3 rounded-full font-semibold shadow">BCV</button>
  </div>

  <!-- Top 3 Card seperti podium -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 items-end">
    <!-- Card 2 -->
    <div class="w-full max-w-[200px] bg-white rounded-2xl shadow-md overflow-hidden mx-auto">
      <div class="h-40 w-full overflow-hidden">
        <img src="{{ asset('assets/presmaboard/image.png') }}" alt="Panjul" class="w-full h-full object-cover">
      </div>
      <div class="p-4 text-center">
        <h3 class="text-md font-semibold">Panjul</h3>
        <p class="text-2xl font-bold text-gray-900">9177</p>
        <p class="text-xs text-gray-500">Points</p>
      </div>
    </div>
    <!-- Card 1 (paling tinggi) -->
    <div class="w-full max-w-[200px] bg-white rounded-2xl shadow-md overflow-hidden mx-auto md:-translate-y-4">
      <div class="h-44 w-full overflow-hidden">
        <img src="{{ asset('assets/presmaboard/image.png') }}" alt="Idan" class="w-full h-full object-cover">
      </div>
      <div class="p-4 text-center">
        <h3 class="text-md font-semibold">Idan</h3>
        <p class="text-2xl font-bold text-orange-500">9777</p>
        <p class="text-xs text-gray-500">Points</p>
      </div>
    </div>
    <!-- Card 3 -->
    <div class="w-full max-w-[200px] bg-white rounded-2xl shadow-md overflow-hidden mx-auto">
      <div class="h-40 w-full overflow-hidden">
        <img src="{{ asset('assets/presmaboard/image.png') }}" alt="Suranto" class="w-full h-full object-cover">
      </div>
      <div class="p-4 text-center">
        <h3 class="text-md font-semibold">Suranto</h3>
        <p class="text-2xl font-bold text-gray-900">9007</p>
        <p class="text-xs text-gray-500">Points</p>
      </div>
    </div>
  </div>

  <!-- Table (tetap sama) -->
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-2xl shadow">
      <thead>
        <tr class="bg-gray-50 text-left text-gray-700 uppercase text-sm">
          <th class="px-6 py-3">Posisi</th>
          <th class="px-6 py-3">Nama Siswa</th>
          <th class="px-6 py-3">Kelas</th>
          <th class="px-6 py-3">PPLG</th>
          <th class="px-6 py-3">Score</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-t">
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4 flex items-center gap-2">
            <img src="{{ asset('assets/presmaboard/image.png') }}" alt="Gibran" class="w-8 h-8 rounded-full">
            Gibran
          </td>
          <td class="px-6 py-4">X</td>
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4">
            <span class="bg-orange-500 text-white px-3 py-1 rounded-full">8998</span>
          </td>
        </tr>
        <tr class="border-t">
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4 flex items-center gap-2">
            <img src="{{ asset('assets/presmaboard/image.png') }}" alt="Panji" class="w-8 h-8 rounded-full">
            Panji
          </td>
          <td class="px-6 py-4">X</td>
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4">
            <span class="bg-orange-500 text-white px-3 py-1 rounded-full">8989</span>
          </td>
        </tr>
        <tr class="border-t">
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4 flex items-center gap-2">
            <img src="{{ asset('assets/presmaboard/image.png') }}" alt="Dodo" class="w-8 h-8 rounded-full">
            Dodo
          </td>
          <td class="px-6 py-4">X</td>
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4">
            <span class="bg-orange-500 text-white px-3 py-1 rounded-full">8799</span>
          </td>
        </tr>
        <tr class="border-t">
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4 flex items-center gap-2">
            <img src="{{ asset('assets/presmaboard/image.png') }}" alt="Nusa" class="w-8 h-8 rounded-full">
            Nusa
          </td>
          <td class="px-6 py-4">X</td>
          <td class="px-6 py-4">1</td>
          <td class="px-6 py-4">
            <span class="bg-orange-500 text-white px-3 py-1 rounded-full">8399</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
@endsection
