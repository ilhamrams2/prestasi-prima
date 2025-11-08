@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- ====== STATISTIC CARDS ====== --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

  {{-- === CARD BERITA === --}}
  <div class="bg-white shadow rounded-2xl p-6 flex items-center justify-between">
    <div>
      <h3 class="text-gray-500 text-sm font-medium">Total Berita</h3>
      <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalBerita }}</p>
    </div>
    <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
      <i class="ri-newspaper-line text-2xl"></i>
    </div>
  </div>

  {{-- === CARD PRESTASI === --}}
  <div class="bg-white shadow rounded-2xl p-6 flex items-center justify-between">
    <div>
      <h3 class="text-gray-500 text-sm font-medium">Total Prestasi</h3>
      <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPrestasi ?? 0 }}</p>
    </div>
    <div class="bg-yellow-100 text-yellow-600 p-3 rounded-xl">
      <i class="ri-trophy-line text-2xl"></i>
    </div>
  </div>

  {{-- === CARD KEGIATAN === --}}
  <div class="bg-white shadow rounded-2xl p-6 flex items-center justify-between">
    <div>
      <h3 class="text-gray-500 text-sm font-medium">Total Kegiatan</h3>
      <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalKegiatan ?? 0 }}</p>
    </div>
    <div class="bg-green-100 text-green-600 p-3 rounded-xl">
      <i class="ri-calendar-event-line text-2xl"></i>
    </div>
  </div>

  {{-- === CARD STAFF === --}}
  <div class="bg-white shadow rounded-2xl p-6 flex items-center justify-between">
    <div>
      <h3 class="text-gray-500 text-sm font-medium">Total Staff</h3>
      <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalStaff ?? 0 }}</p>
    </div>
    <div class="bg-purple-100 text-purple-600 p-3 rounded-xl">
      <i class="ri-user-settings-line text-2xl"></i>
    </div>
  </div>

</div>

{{-- ====== RECENT SECTION ====== --}}
<div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

  {{-- === DAFTAR BERITA TERBARU === --}}
  <div class="bg-white rounded-2xl shadow p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
      <i class="ri-time-line text-gray-600 text-xl"></i> Berita Terbaru
    </h3>

    @if($latestNews->isNotEmpty())
      <ul class="divide-y divide-gray-100">
        @foreach($latestNews as $news)
          <li class="py-3 flex items-start justify-between">
            <div>
              <p class="font-medium text-gray-800">{{ $news->title }}</p>
              <p class="text-sm text-gray-500">
                Diposting: {{ $news->created_at->translatedFormat('d M Y') }}
              </p>
            </div>
            <a href="{{ route('prestasiprima.admin.berita.show', $news->id) }}"
                class="text-blue-600 hover:underline text-sm">Lihat</a>
          </li>
        @endforeach
      </ul>
    @else
      <p class="text-gray-500 text-sm italic">Belum ada berita yang ditambahkan.</p>
    @endif
  </div>

  {{-- === DAFTAR PRESTASI TERBARU === --}}
  <div class="bg-white rounded-2xl shadow p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
      <i class="ri-trophy-line text-gray-600 text-xl"></i> Prestasi Terbaru
    </h3>

    @if($latestPrestasi->isNotEmpty())
      <ul class="divide-y divide-gray-100">
        @foreach($latestPrestasi as $prestasi)
          <li class="py-3 flex items-start justify-between">
            <div>
              <p class="font-medium text-gray-800">{{ $prestasi->title }}</p>
              <p class="text-sm text-gray-500">
                Diposting: {{ $prestasi->created_at->translatedFormat('d M Y') }}
              </p>
            </div>
            <a href="{{ route('prestasiprima.admin.prestasi.show', $prestasi->id) }}"
            class="text-blue-600 hover:underline text-sm">Lihat</a>
          </li>
        @endforeach
      </ul>
    @else
      <p class="text-gray-500 text-sm italic">Belum ada prestasi yang ditambahkan.</p>
    @endif
  </div>

</div>

@endsection
