@extends('siakad.index')

@section('title', 'Manajemen Mata Pelajaran')

@section('content')
<div class="p-6 space-y-6">

    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
                <i class="ri-home-4-line text-lg"></i> Dashboard
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-book-2-line text-lg text-orange-500"></i> Manajemen Mata Pelajaran
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl shadow-inner">
                <i class="ri-book-open-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Mata Pelajaran</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Kelola data mata pelajaran, kode mapel, guru pengampu, dan status aktif
                </p>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition flex items-center gap-4">
            <div class="p-3 rounded-lg bg-orange-50 text-orange-600">
                <i class="ri-bookmark-line text-2xl"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500">Total Mapel</p>
                <div id="statMapel" class="text-lg font-bold text-gray-800">0</div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition flex items-center gap-4">
            <div class="p-3 rounded-lg bg-yellow-50 text-yellow-600">
                <i class="ri-user-star-line text-2xl"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500">Guru Pengampu</p>
                <div id="statGuru" class="text-lg font-bold text-gray-800">0</div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-md hover:shadow-lg transition flex items-center gap-4">
            <div class="p-3 rounded-lg bg-emerald-50 text-emerald-600">
                <i class="ri-timer-2-line text-2xl"></i>
            </div>
            <div>
                <p class="text-xs text-gray-500">Jam Belajar</p>
                <div id="statJam" class="text-lg font-bold text-gray-800">0</div>
            </div>
        </div>
    </div>

    {{-- ================= CTA ================= --}}
    <div class="flex items-center justify-between gap-4">
        <button onclick="openModal('add')" 
                class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-lg shadow-md hover:shadow-lg transition font-semibold">
            + Tambah Mata Pelajaran
        </button>

        {{-- Search & Filter --}}
        <div class="w-full md:w-1/2">
            <div class="bg-white p-3 rounded-lg shadow flex gap-3 items-center">
                <div class="relative flex-1">
                    <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input id="searchInput" type="text" 
                           placeholder="Cari nama mapel / kode / guru pengampu"
                           class="w-full border-none rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-400"/>
                </div>
                <select id="statusFilter" class="border rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-orange-400">
                    <option value="all">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ================= TABEL ================= --}}
    <div class="bg-white rounded-lg shadow overflow-hidden">
        {{-- Desktop --}}
        <div class="hidden md:block">
            <table class="w-full table-auto">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        @foreach(['nama' => 'Nama Mapel', 'kode' => 'Kode', 'guru' => 'Guru Pengampu', 'jam' => 'Jam Pelajaran'] as $key => $label)
                            <th class="px-4 py-3 text-left cursor-pointer hover:text-orange-600 transition" data-sort="{{ $key }}">
                                {{ $label }} <span class="sort-indicator text-xs"></span>
                            </th>
                        @endforeach
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="divide-y"></tbody>
            </table>
        </div>

        {{-- Mobile --}}
        <div id="cardList" class="md:hidden p-4 space-y-3"></div>

        {{-- Empty State --}}
        <div id="emptyState" class="hidden p-8 text-center text-gray-400">
            <div class="text-4xl mb-2 text-orange-500"><i class="ri-book-3-line"></i></div>
            <div class="font-semibold mb-1">Belum ada data mata pelajaran</div>
            <div class="text-sm">Klik tombol <span class="font-medium text-orange-600">Tambah Mata Pelajaran</span> untuk menambahkan data baru.</div>
        </div>
    </div>

    {{-- ================= PAGINATION ================= --}}
    <div class="flex items-center justify-between mt-4">
        <div id="summaryText" class="text-sm text-gray-500"></div>
        <div id="pagination" class="flex items-center gap-2"></div>
    </div>
</div>

{{-- ================= MODAL (Tambah/Edit) ================= --}}
<div id="modal" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div id="modalBox" class="bg-white w-96 rounded-2xl shadow-2xl p-6 transform translate-y-6 opacity-0 transition">
        <h2 id="modalTitle" class="text-lg font-bold mb-3 text-orange-600"></h2>
        <form id="formMapel" class="space-y-3">
            <input type="hidden" name="id">
            <input name="nama" placeholder="Nama Mapel" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-orange-400" required>
            <input name="kode" placeholder="Kode (contoh: MTK01)" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-orange-400" required>
            <input name="guru" placeholder="Guru Pengampu" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-orange-400" required>
            <input name="jam" placeholder="Jumlah Jam (contoh: 4)" type="number" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-orange-400" required>
            <select name="status" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-orange-400">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
            <div class="flex justify-end gap-2 mt-2">
                <button type="button" id="btnCancel" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL VIEW ================= --}}
<div id="modalView" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">
        <button onclick="closeModal('view')" class="absolute top-3 right-3 text-gray-500 hover:text-red-500">
            <i class="ri-close-line text-2xl"></i>
        </button>
        <h2 id="viewNama" class="text-2xl font-bold text-gray-800 mb-3"></h2>
        <p class="text-sm text-gray-500 mb-4" id="viewGuru"></p>
        <p class="text-gray-600 mb-4">Kode: <span id="viewKode"></span></p>
        <p class="text-gray-600 mb-4">Jumlah Jam: <span id="viewJam"></span></p>
        <span id="viewStatus" class="px-2 py-1 rounded text-sm"></span>
    </div>
</div>
@endsection
