@extends('siakad.index')

@section('title','Nilai & Rapor')

@section('content')
<div class="p-6 space-y-6">

  {{-- ================= HEADER ================= --}}
  <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
        <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
            <i class="ri-home-4-line text-lg"></i> Dashboard
        </a>
        <span>/</span>
        <span class="text-gray-700 font-semibold flex items-center gap-1">
            <i class="ri-file-list-3-line text-lg text-orange-500"></i> Nilai & Rapor
        </span>
    </nav>

    <!-- Title & Action -->
    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-bar-chart-2-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Nilai & Rapor</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Lihat perkembangan akademik, detail nilai, dan download rapor Anda
                </p>
            </div>
        </div>

        <!-- Tombol Download -->
        <div class="flex items-center gap-3">
            <button id="downloadRaporBtn" 
                class="flex items-center gap-2 border border-orange-300 text-orange-600 px-4 py-2 rounded-lg hover:bg-orange-50 transition shadow-sm">
                <i class="ri-download-cloud-line"></i>
                <span class="text-sm">Download Rapor</span>
            </button>
        </div>
    </div>
  </div>


  {{-- ================= SUMMARY NILAI & RAPOR ================= --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

  <!-- Rata-rata Nilai -->
  <div class="rounded-xl p-5 bg-gradient-to-r from-orange-400 to-orange-300 text-white shadow hover:shadow-lg hover:scale-105 transition">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-sm opacity-90">Rata-rata Nilai</p>
        <div class="text-3xl font-extrabold mt-1">89.5</div>
      </div>
      <div class="bg-white/20 p-4 rounded-lg">
        <i class="ri-trophy-line text-3xl"></i>
      </div>
    </div>
  </div>

  <!-- Jumlah Mata Pelajaran -->
  <div class="rounded-xl p-5 bg-white shadow hover:shadow-md hover:scale-105 transition flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-500">Mata Pelajaran</p>
      <div class="text-2xl font-bold mt-1 text-slate-800">13</div>
    </div>
    <div class="bg-indigo-50 p-4 rounded-lg">
      <i class="ri-book-open-line text-indigo-600 text-3xl"></i>
    </div>
  </div>

  <!-- Ketuntasan -->
  <div class="rounded-xl p-5 bg-white shadow hover:shadow-md hover:scale-105 transition flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-500">Ketuntasan</p>
      <div class="text-2xl font-bold mt-1 text-slate-800">85%</div>
    </div>
    <div class="bg-yellow-50 p-4 rounded-lg">
      <i class="ri-award-line text-yellow-600 text-3xl"></i>
    </div>
  </div>

  <!-- Peningkatan -->
  <div class="rounded-xl p-5 bg-white shadow hover:shadow-md hover:scale-105 transition flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-500">Peningkatan</p>
      <div class="text-2xl font-bold mt-1 text-slate-800">+5.2</div>
    </div>
    <div class="bg-emerald-50 p-4 rounded-lg">
      <i class="ri-trending-up-line text-emerald-600 text-3xl"></i>
    </div>
  </div>

</div>


  {{-- TABS --}}
  <div class="bg-white rounded-xl p-4 shadow">
    <div class="flex gap-3 items-center">
      <button class="tab-btn px-4 py-2 rounded-md text-sm font-medium bg-orange-50 text-orange-600" data-tab="nilai">Nilai</button>
      <button class="tab-btn px-4 py-2 rounded-md text-sm font-medium text-gray-600" data-tab="transkrip">Transkrip</button>
      <button class="tab-btn px-4 py-2 rounded-md text-sm font-medium text-gray-600" data-tab="rapor">Rapor</button>
    </div>

    {{-- TAB CONTENT WRAPPER --}}
    <div class="mt-6 space-y-6">

      {{-- TAB: NILAI --}}
      <div id="tab-nilai" class="tab-content">
        <div class="rounded-lg border border-gray-100 p-4">
          <div class="flex items-center justify-between mb-4">
            <div>
              <h3 class="font-semibold text-slate-800">Daftar Nilai Semester Ganjil</h3>
              <p class="text-xs text-gray-500">Tahun Ajaran 2023/2024</p>
            </div>
            <div class="flex items-center gap-3">
              <select class="rounded-md border px-3 py-2 text-sm">
                <option>Semester Ganjil</option>
                <option>Semester Genap</option>
              </select>
              <select class="rounded-md border px-3 py-2 text-sm">
                <option>2023/2024</option>
              </select>
            </div>
          </div>

          {{-- list mapel --}}
          <div class="space-y-3">
            @php
              // dummy array — nanti ambil dari DB
              $mapels = [
                ['name'=>'Matematika','semester'=>'Semester Ganjil','score'=>89],
                ['name'=>'Bahasa Indonesia','semester'=>'Semester Ganjil','score'=>78],
                ['name'=>'Fisika','semester'=>'Semester Ganjil','score'=>95],
                ['name'=>'Algoritma & Pemrograman','semester'=>'Semester Ganjil','score'=>92],
                ['name'=>'Bahasa Jepang','semester'=>'Semester Ganjil','score'=>81],
                ['name'=>'Bahasa Inggris','semester'=>'Semester Ganjil','score'=>100],
              ];
              function letterGrade($n){
                if($n>=90) return 'A';
                if($n>=80) return 'A-';
                if($n>=75) return 'B+';
                if($n>=70) return 'B';
                if($n>=60) return 'C';
                return 'D';
              }
            @endphp

            @foreach($mapels as $m)
            <div class="flex items-center justify-between bg-white rounded-lg p-4 shadow-sm border">
              <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center">
                  <i class="ri-book-2-line text-lg"></i>
                </div>
                <div>
                  <div class="font-medium text-slate-800">{{ $m['name'] }}</div>
                  <div class="text-xs text-gray-500">{{ $m['semester'] }}</div>
                </div>
              </div>

              <div class="flex items-center gap-4 min-w-[220px] justify-end">
                <div class="text-right">
                  <div class="text-2xl font-bold text-slate-800">{{ $m['score'] }}</div>
                  <div class="mt-1">
                    <span class="inline-block text-xs px-2 py-1 rounded-full bg-green-50 text-green-700">{{ letterGrade($m['score']) }}</span>
                  </div>
                </div>

                {{-- progress bar --}}
                <div class="w-40">
                  <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-2 bg-orange-400 rounded-full" style="width: {{ $m['score'] }}%"></div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>

      {{-- TAB: TRANSKRIP --}}
      <div id="tab-transkrip" class="tab-content hidden">
        <div class="rounded-lg border border-gray-100 p-6">
          <h3 class="font-semibold text-slate-800 mb-2">Transkrip Nilai</h3>
          <p class="text-sm text-gray-600 mb-4">Ringkasan nilai seluruh semester</p>

          {{-- konten transkrip --}}
          <div class="bg-white rounded-lg shadow p-5">
            <h2 class="text-lg font-semibold text-slate-800 mb-4">Transkrip Nilai</h2>
            <p class="text-sm text-gray-500 mb-6">Rekap nilai seluruh semester</p>

            <!-- Semester 1 -->
            <div class="mb-6">
              <h3 class="text-sm font-bold text-gray-700 mb-2">Semester 1 (Ganjil)</h3>
              <div class="grid grid-cols-2 gap-3">
                <div class="flex justify-between items-center bg-orange-50 px-4 py-2 rounded">
                  <span>Matematika</span>
                  <span class="font-semibold text-green-600">89 <span class="text-xs">A-</span></span>
                </div>
                <div class="flex justify-between items-center bg-orange-50 px-4 py-2 rounded">
                  <span>Bahasa Indonesia</span>
                  <span class="font-semibold text-green-600">98 <span class="text-xs">A+</span></span>
                </div>
                <div class="flex justify-between items-center bg-orange-50 px-4 py-2 rounded">
                  <span>Fisika</span>
                  <span class="font-semibold text-green-600">86 <span class="text-xs">A-</span></span>
                </div>
              </div>
              <div class="mt-2 text-right text-sm font-semibold text-orange-600">
                Rata-rata Semester: 88.3
              </div>
            </div>

            <!-- Semester 2 -->
            <div>
              <h3 class="text-sm font-bold text-gray-700 mb-2">Semester 2 (Genap)</h3>
              <div class="grid grid-cols-2 gap-3">
                <div class="flex justify-between items-center bg-red-50 px-4 py-2 rounded">
                  <span>Matematika</span>
                  <span class="font-semibold text-red-600">60 <span class="text-xs">D</span></span>
                </div>
                <div class="flex justify-between items-center bg-red-50 px-4 py-2 rounded">
                  <span>Bahasa Indonesia</span>
                  <span class="font-semibold text-red-600">64 <span class="text-xs">C</span></span>
                </div>
                <div class="flex justify-between items-center bg-red-50 px-4 py-2 rounded">
                  <span>Fisika</span>
                  <span class="font-semibold text-red-600">67 <span class="text-xs">C-</span></span>
                </div>
              </div>
              <div class="mt-2 text-right text-sm font-semibold text-red-600">
                Rata-rata Semester: 65.3
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- TAB: RAPOR --}}
      <div id="tab-rapor" class="tab-content hidden">
        <div class="rounded-lg border border-gray-100 p-6 space-y-6">

          {{-- Card Rapor --}}
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card Rapor Aktif -->
            <div class="bg-orange-50 border border-orange-200 rounded-xl p-6 flex flex-col items-center justify-center shadow">
              <div class="text-orange-600 text-5xl mb-3">
                <i class="ri-trophy-line"></i>
              </div>
              <h2 class="text-3xl font-extrabold text-orange-600 mb-1">88.3</h2>
              <p class="text-sm text-gray-600 mb-5">Rata-rata Nilai</p>
              <button class="w-full bg-orange-500 text-white py-2.5 rounded-lg hover:bg-orange-600 transition">
                <i class="ri-download-2-line mr-1"></i> Download Rapor PDF
              </button>
            </div>

            <!-- Card Rapor Lama -->
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 flex flex-col items-center justify-center shadow">
              <div class="text-gray-500 text-5xl mb-3">
                <i class="ri-medal-line"></i>
              </div>
              <h2 class="text-3xl font-extrabold text-gray-700 mb-1">88.3</h2>
              <p class="text-sm text-gray-500 mb-5">Rata-rata Nilai</p>
              <button class="w-full border border-gray-300 text-gray-600 py-2.5 rounded-lg hover:bg-gray-100 transition">
                <i class="ri-download-2-line mr-1"></i> Download Rapor PDF
              </button>
            </div>
          </div>

          {{-- List mapel rapor --}}
          <div class="mt-6">
            <h3 class="font-semibold text-slate-800">Detail Rapor — Semester Ganjil</h3>
            <div class="mt-4 space-y-3">
              @foreach($mapels as $m)
              <div class="flex items-center justify-between p-3 rounded-md bg-white border">
                <div>
                  <div class="font-medium">{{ $m['name'] }}</div>
                  <div class="text-xs text-gray-500">{{ $m['semester'] }}</div>
                </div>
                <div class="text-right">
                  <div class="font-bold text-lg">{{ $m['score'] }}</div>
                  <div class="text-xs text-green-700">{{ letterGrade($m['score']) }}</div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

{{-- SCRIPTS: tabs + small interactions --}}
<script>
  // Tabs
  document.querySelectorAll('.tab-btn').forEach(btn=>{
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tab-btn').forEach(b => {
        b.classList.remove('bg-orange-50','text-orange-600');
        b.classList.add('text-gray-600');
      });
      btn.classList.add('bg-orange-50','text-orange-600');
      btn.classList.remove('text-gray-600');

      const tab = btn.getAttribute('data-tab');
      document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
      document.getElementById('tab-'+tab).classList.remove('hidden');
    });
  });

  // Download button (placeholder)
  document.getElementById('downloadRaporBtn').addEventListener('click', ()=> {
    alert('Fungsi download rapor akan memanggil endpoint export (implementasi backend).');
  });
</script>
@endsection
