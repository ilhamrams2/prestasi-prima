@extends('siakad.index')

@section('title', 'Manajemen Siswa')

@section('content')
<div class="p-6 space-y-6">

    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="#" class="hover:text-orange-600 transition">Dashboard</a>
            <span>/</span>
            <span class="font-semibold text-gray-700">Manajemen Siswa</span>
        </nav>

        <h1 class="text-2xl md:text-3xl font-bold text-orange-600 mb-1 flex items-center gap-2">
            <span class="bg-orange-100 p-2 rounded-xl">
                <i class="fa-solid fa-user-graduate text-orange-500 text-lg"></i>
            </span>
            Manajemen Siswa
        </h1>
        <p class="text-gray-500">Kelola data siswa, kelas, dan status aktif siswa</p>
    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex items-center gap-4 bg-white rounded-xl p-5 shadow-sm border">
            <div class="bg-orange-100 p-3 rounded-xl text-orange-500 text-xl">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Siswa</p>
                <h3 class="text-xl font-bold text-gray-800">100</h3>
            </div>
        </div>

        <div class="flex items-center gap-4 bg-white rounded-xl p-5 shadow-sm border">
            <div class="bg-blue-100 p-3 rounded-xl text-blue-500 text-xl">
                <i class="fa-solid fa-mars"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Siswa Laki-laki</p>
                <h3 class="text-xl font-bold text-gray-800">60</h3>
            </div>
        </div>

        <div class="flex items-center gap-4 bg-white rounded-xl p-5 shadow-sm border">
            <div class="bg-pink-100 p-3 rounded-xl text-pink-500 text-xl">
                <i class="fa-solid fa-venus"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Siswa Perempuan</p>
                <h3 class="text-xl font-bold text-gray-800">40</h3>
            </div>
        </div>
    </div>

    {{-- ================= TOMBOL & PENCARIAN ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-center mt-6 gap-3">
        <button id="btnTambahSiswa"
            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
            <i class="fa-solid fa-plus"></i>
            Tambah Siswa
        </button>

        <div class="flex gap-2 items-center">
            <div class="relative">
                <input type="text" placeholder="Cari nama / NIS / kelas"
                    class="border rounded-lg pl-10 pr-4 py-2 w-64 focus:ring-2 focus:ring-orange-300 focus:border-orange-400 text-sm text-gray-700" />
                <i class="fa-solid fa-search absolute left-3 top-2.5 text-gray-400"></i>
            </div>
            <select
                class="border rounded-lg px-3 py-2 text-sm text-gray-600 focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Nonaktif</option>
            </select>
        </div>
    </div>

    {{-- ================= TABEL DATA ================= --}}
    <div class="bg-white rounded-xl shadow-sm border mt-4 overflow-hidden">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="bg-gray-50 text-gray-700 font-semibold">
                <tr>
                    <th class="px-6 py-3">Nama Siswa</th>
                    <th class="px-6 py-3">NIS</th>
                    <th class="px-6 py-3">Kelas</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            {{-- ==== GANTI BAGIAN INI SAAT ADA DATA ==== --}}
            <tbody class="text-gray-700">
                {{-- Jika tidak ada data --}}
                <tr>
                    <td colspan="5" class="text-center py-16">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <i class="fa-regular fa-folder-open text-4xl mb-3"></i>
                            <p class="font-semibold mb-1">Belum ada data siswa</p>
                            <p class="text-sm text-gray-400">
                                Klik tombol <span class="text-orange-500 font-semibold">Tambah Siswa</span> untuk menambahkan data baru.
                            </p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- PAGINATION (dummy) --}}
    <div class="flex justify-end items-center mt-3">
        <button class="px-3 py-1 border rounded-l-lg text-gray-500 text-sm hover:bg-gray-50">&laquo; Prev</button>
        <button class="px-3 py-1 bg-orange-500 text-white text-sm">1</button>
        <button class="px-3 py-1 border rounded-r-lg text-gray-500 text-sm hover:bg-gray-50">Next &raquo;</button>
    </div>
</div>

{{-- ================= MODAL TAMBAH / EDIT SISWA ================= --}}
<div id="modalSiswa" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div id="modalBox"
        class="bg-white w-96 rounded-2xl shadow-2xl p-6 transform translate-y-6 opacity-0 transition">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-user-plus text-orange-500"></i>
            Tambah Siswa
        </h2>

        <form class="space-y-3">
            <div>
                <label class="text-sm text-gray-600">Nama Siswa</label>
                <input type="text" class="w-full border rounded-lg px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
            </div>
            <div>
                <label class="text-sm text-gray-600">NIS</label>
                <input type="text" class="w-full border rounded-lg px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
            </div>
            <div>
                <label class="text-sm text-gray-600">Kelas</label>
                <select class="w-full border rounded-lg px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
                    <option>Pilih Kelas</option>
                    <option>X RPL 1</option>
                    <option>XI RPL 2</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Status</label>
                <select class="w-full border rounded-lg px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
                    <option>Aktif</option>
                    <option>Nonaktif</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 mt-5">
                <button type="button" id="btnBatal" class="px-3 py-2 border rounded-lg text-gray-600 hover:bg-gray-100 transition">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ================= SCRIPT MODAL ================= --}}
<script>
    const modal = document.getElementById('modalSiswa');
    const modalBox = document.getElementById('modalBox');
    const btnTambah = document.getElementById('btnTambahSiswa');
    const btnBatal = document.getElementById('btnBatal');

    btnTambah.addEventListener('click', () => {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalBox.classList.remove('translate-y-6', 'opacity-0');
        }, 50);
    });

    btnBatal.addEventListener('click', () => {
        modalBox.classList.add('translate-y-6', 'opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 200);
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modalBox.classList.add('translate-y-6', 'opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 200);
        }
    });
</script>
@endsection
