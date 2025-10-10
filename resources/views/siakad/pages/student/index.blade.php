@extends('siakad.index')

@section('title', 'Manajemen Siswa')

@section('content')
<<<<<<< HEAD
    <div class="p-6 space-y-8">

        {{-- ================= HEADER ================= --}}
        <div class="bg-gradient-to-r from-orange-50 to-white border rounded-2xl shadow-sm p-5">
            <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
                <a href="#" class="hover:text-orange-600 flex items-center gap-1 transition">
                    <i class="fa-solid fa-home"></i> Dashboard
                </a>
                <span>/</span>
                <span class="font-semibold text-gray-700 flex items-center gap-1">
                    <i class="fa-solid fa-user-graduate text-orange-500"></i> Manajemen Siswa
                </span>
            </nav>
<div class="p-6 space-y-6">
<<<<<<< HEAD
<<<<<<< HEAD

    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <!-- Breadcrumb -->
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="#" class="hover:text-orange-600 flex items-center gap-1 transition-colors">
                <i class="ri-home-4-line text-lg"></i> Dashboard
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-team-line text-lg text-orange-500"></i> Manajemen Siswa
            </span>
        </nav>

            <div class="flex items-center gap-3">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="fa-solid fa-user-graduate text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-orange-600">Manajemen Siswa</h1>
                    <p class="text-gray-600 text-sm mt-1">
                        Kelola data siswa, kelas, jurusan, dan status aktif siswa
                    </p>
                </div>
            </div>
        </div>

        {{-- ================= STATISTIK (4 ITEM) ================= --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-5">
            @php
                $stats = [
                    ['Total Siswa', '520', 'fa-users', 'from-orange-500 to-orange-400'],
                    ['Siswa Aktif', '495', 'fa-user-check', 'from-green-500 to-green-400'],
                    ['Siswa Baru', '120', 'fa-user-plus', 'from-blue-500 to-blue-400'],
                    ['Rata-rata Kehadiran', '92%', 'fa-calendar-check', 'from-purple-500 to-purple-400'],
                ];
            @endphp

            @foreach ($stats as [$label, $value, $icon, $gradient])
                <div
                    class="bg-gradient-to-r {{ $gradient }} text-white rounded-2xl p-5 shadow-sm flex items-center justify-between hover:scale-[1.02] transition">
                    <div>
                        <p class="text-sm opacity-90">{{ $label }}</p>
                        <h3 class="text-2xl font-bold mt-1">{{ $value }}</h3>
                    </div>
                    <i class="fa-solid {{ $icon }} text-3xl opacity-80"></i>
                </div>
            @endforeach
        </div>

        {{-- ================= TOMBOL & FILTER ================= --}}
        <div class="flex items-center justify-between flex-wrap gap-4 mt-6">
            {{-- Tombol Tambah --}}
            <button id="btnTambahSiswa"
                class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
                + Tambah Siswa
            </button>

            {{-- Kotak Filter --}}
            <div class="w-full md:w-2/3">
                <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    {{-- Search --}}
                    <div class="relative">
                        <i class="fa-solid fa-search absolute left-3 top-2.5 text-gray-400"></i>
                        <input type="text" placeholder="Cari nama / NIS / kelas"
                            class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 text-sm text-gray-700" />
                    </div>

                    {{-- Filter Kelas --}}
                    <select
                        class="border rounded-lg px-3 py-2 bg-gray-50 text-sm text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                        <option>Semua Kelas</option>
                        <option>X RPL 1</option>
                        <option>XI RPL 2</option>
                    </select>

                    {{-- Filter Status --}}
                    <select
                        class="border rounded-lg px-3 py-2 bg-gray-50 text-sm text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                        <option>Semua Status</option>
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- Judul -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-team-line text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Siswa</h1>
                    <p class="text-gray-600 text-sm mt-1">Kelola data siswa, kelas, jurusan, dan informasi akademik</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @php
            $stats = [
                ['icon'=>'ri-team-line','bg'=>'bg-orange-100','text'=>'text-orange-600','label'=>'Total Siswa','value'=>'320'],
                ['icon'=>'ri-men-line','bg'=>'bg-blue-100','text'=>'text-blue-600','label'=>'Laki-laki','value'=>'180'],
                ['icon'=>'ri-women-line','bg'=>'bg-pink-100','text'=>'text-pink-600','label'=>'Perempuan','value'=>'140'],
                ['icon'=>'ri-book-line','bg'=>'bg-green-100','text'=>'text-green-600','label'=>'Jumlah Kelas','value'=>'12']
            ];
        @endphp
        @foreach ($stats as $s)
            <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
                <div class="{{ $s['bg'].' '.$s['text'] }} p-3 rounded-lg">
                    <i class="{{ $s['icon'] }} text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">{{ $s['label'] }}</p>
                    <h2 class="text-xl font-bold">{{ $s['value'] }}</h2>
                </div>
            </div>
        @endforeach
    </div>

        {{-- ================= TABEL DATA ================= --}}
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table id="siswaTable" class="w-full text-left border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">NIS</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Kelas</th>
                        <th class="px-4 py-3">Jurusan</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ $student->student_number }}</td>
                            <td class="px-4 py-3 font-medium">{{ $student->name }}</td>
                            <td class="px-4 py-3">{{ $student->email }}</td>
                            <td class="px-4 py-3">
                                {{ $student->class ? $student->class->name : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $student->major ? $student->major->name : '-' }}
                            </td>
                            <td class="px-4 py-3 flex space-x-3">
                                <button class="text-blue-500 hover:text-blue-700" title="Lihat">
                                    <i class="ri-eye-line"></i>
                                </button>
                                <button class="text-orange-500 hover:text-orange-700" title="Edit">
                                    <i class="ri-edit-line"></i>
                                </button>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus siswa ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data siswa</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    {{-- ================= FILTER ================= --}}
    <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 md:grid-cols-4 gap-4">
        <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            <option>Semua Jurusan</option>
        </select>
        <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            <option>Semua Kelas</option>
        </select>
        <select class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            <option>Jenis Kelamin</option>
        </select>
        <input id="searchInput" type="text" placeholder="Cari nama siswa / NIS"
               class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
    </div>

    {{-- ================= TABEL SISWA ================= --}}
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table id="siswaTable" class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">NIS</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3">Jurusan</th>
                    <th class="px-4 py-3">Jenis Kelamin</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ([
                    ['2025001','Ahmad Fauzi','X PPLG 1','PPLG','Laki-laki','Aktif'],
                    ['2025002','Siti Nurhaliza','XI TKJ 2','TKJ','Perempuan','Aktif']
                ] as $s)
                <tr class="border-t hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $s[0] }}</td>
                    <td class="px-4 py-3 font-medium">{{ $s[1] }}</td>
                    <td class="px-4 py-3">{{ $s[2] }}</td>
                    <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">{{ $s[3] }}</span></td>
                    <td class="px-4 py-3">{{ $s[4] }}</td>
                    <td class="px-4 py-3">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">{{ $s[5] }}</span>
                    </td>
                    <td class="px-4 py-3 flex space-x-3">
                        <button class="text-blue-500 hover:text-blue-700" title="Lihat"><i class="ri-eye-line"></i></button>
                        <button class="text-orange-500 hover:text-orange-700" title="Edit"><i class="ri-edit-line"></i></button>
                        <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus"><i class="ri-delete-bin-line"></i></button>
                    </td>
                </tr>
                @endforeach
=======
=======
<div class="p-6 space-y-8">
>>>>>>> 911e62f (update frontend siakad)

    {{-- ================= HEADER ================= --}}
    <div class="bg-gradient-to-r from-orange-50 to-white border rounded-2xl shadow-sm p-5">
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="#" class="hover:text-orange-600 flex items-center gap-1 transition">
                <i class="fa-solid fa-home"></i> Dashboard
            </a>
            <span>/</span>
            <span class="font-semibold text-gray-700 flex items-center gap-1">
                <i class="fa-solid fa-user-graduate text-orange-500"></i> Manajemen Siswa
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="fa-solid fa-user-graduate text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-orange-600">Manajemen Siswa</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Kelola data siswa, kelas, jurusan, dan status aktif siswa
                </p>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK (4 ITEM) ================= --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-5">
        @php
            $stats = [
                ['Total Siswa', '520', 'fa-users', 'from-orange-500 to-orange-400'],
                ['Siswa Aktif', '495', 'fa-user-check', 'from-green-500 to-green-400'],
                ['Siswa Baru', '120', 'fa-user-plus', 'from-blue-500 to-blue-400'],
                ['Rata-rata Kehadiran', '92%', 'fa-calendar-check', 'from-purple-500 to-purple-400'],
            ];
        @endphp

        @foreach ($stats as [$label, $value, $icon, $gradient])
            <div
                class="bg-gradient-to-r {{ $gradient }} text-white rounded-2xl p-5 shadow-sm flex items-center justify-between hover:scale-[1.02] transition">
                <div>
                    <p class="text-sm opacity-90">{{ $label }}</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $value }}</h3>
                </div>
                <i class="fa-solid {{ $icon }} text-3xl opacity-80"></i>
            </div>
        @endforeach
    </div>

    {{-- ================= TOMBOL & FILTER ================= --}}
    <div class="flex items-center justify-between flex-wrap gap-4 mt-6">
        {{-- Tombol Tambah --}}
        <button id="btnTambahSiswa"
            class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
            + Tambah Siswa
        </button>

        {{-- Kotak Filter --}}
        <div class="w-full md:w-2/3">
            <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                {{-- Search --}}
                <div class="relative">
                    <i class="fa-solid fa-search absolute left-3 top-2.5 text-gray-400"></i>
                    <input type="text" placeholder="Cari nama / NIS / kelas"
                        class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 text-sm text-gray-700" />
                </div>

                {{-- Filter Kelas --}}
                <select
                    class="border rounded-lg px-3 py-2 bg-gray-50 text-sm text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                    <option>Semua Kelas</option>
                    <option>X RPL 1</option>
                    <option>XI RPL 2</option>
                </select>

                {{-- Filter Status --}}
                <select
                    class="border rounded-lg px-3 py-2 bg-gray-50 text-sm text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Nonaktif</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ================= TABEL DATA ================= --}}
    <div class="bg-white rounded-2xl shadow-sm border mt-5 overflow-hidden">
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
            <tbody>
                {{-- Jika tidak ada data --}}
                <tr>
                    <td colspan="5" class="text-center py-16">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <i class="fa-regular fa-folder-open text-4xl mb-3"></i>
                            <p class="font-semibold mb-1">Belum ada data siswa</p>
                            <p class="text-sm text-gray-400">
                                Klik tombol
                                <span class="text-orange-500 font-semibold">Tambah Siswa</span>
                                untuk menambahkan data baru.
                            </p>
                        </div>
                    </td>
                </tr>
>>>>>>> 26ae217 (update siakad student)
            </tbody>
        </table>
    </div>

<<<<<<< HEAD
<<<<<<< HEAD
        {{-- ================= PAGINATION ================= --}}
        <div class="flex justify-end items-center mt-3 space-x-1">
            <button class="px-3 py-1 border rounded-lg text-gray-500 text-sm hover:bg-gray-50">&laquo; Prev</button>
            <button class="px-3 py-1 bg-orange-500 text-white text-sm rounded-lg">1</button>
            <button class="px-3 py-1 border rounded-lg text-gray-500 text-sm hover:bg-gray-50">2</button>
            <button class="px-3 py-1 border rounded-lg text-gray-500 text-sm hover:bg-gray-50">Next &raquo;</button>
    {{-- ================= PAGINATION ================= --}}
    <div class="flex justify-between items-center mt-4">
        <p class="text-sm text-gray-500">Menampilkan 1-2 dari 320 siswa</p>
        <div class="space-x-2">
            <button class="px-3 py-1 border rounded hover:bg-gray-100">&laquo; Prev</button>
            <button class="px-3 py-1 border rounded bg-orange-500 text-white">1</button>
            <button class="px-3 py-1 border rounded hover:bg-gray-100">2</button>
            <button class="px-3 py-1 border rounded hover:bg-gray-100">Next &raquo;</button>
        </div>
    </div>

    {{-- ================= MODAL TAMBAH SISWA ================= --}}
    <div id="modalSiswa" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
        <div id="modalBox" class="bg-white w-96 rounded-2xl shadow-2xl p-6 transform scale-95 opacity-0 transition">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-orange-500"></i>
                Tambah Siswa
            </h2>

            {{-- ================= FORM TAMBAH SISWA ================= --}}
            <form action="{{ route('students.store') }}" method="POST" class="space-y-3">
                @csrf

                {{-- Nama Siswa --}}
                <div>
                    <label class="text-sm text-gray-600">Nama Siswa</label>
                    <input type="text" name="name" required
                        class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400"
                        placeholder="Masukkan nama siswa">
                </div>

                {{-- NIS (student_number) --}}
                <div>
                    <label class="text-sm text-gray-600">NIS</label>
                    <input type="text" name="student_number" required
                        class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400"
                        placeholder="Masukkan NIS siswa">
                </div>

                {{-- Email --}}
                <div>
                    <label class="text-sm text-gray-600">Email</label>
                    <input type="email" name="email" required
                        class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400"
                        placeholder="Masukkan email siswa">
                </div>

                {{-- Password --}}
                <div>
                    <label class="text-sm text-gray-600">Password</label>
                    <input type="password" name="password" required
                        class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400"
                        placeholder="Masukkan password">
                </div>

                {{-- Jurusan --}}
                <div>
                    <label class="text-sm text-gray-600">Jurusan</label>
                    <select name="major_id"
                        class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
                        <option value="">Pilih Jurusan</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Kelas --}}
                <div>
                    <label class="text-sm text-gray-600">Kelas</label>
                    <select name="class_id"
                        class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
                        <option value="">Pilih Kelas</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-2 mt-5">
                    <button type="button" id="btnBatal"
                        class="px-3 py-2 border rounded-xl text-gray-600 hover:bg-gray-100 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-xl transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
{{-- ================= MODAL TAMBAH ================= --}}
<div id="modal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-lg shadow-lg w-96 p-6 transform scale-95 opacity-0 transition">
        <h2 class="text-lg font-bold mb-4">Tambah Siswa</h2>
        <form id="siswaForm" class="space-y-4">
            @foreach (['nis'=>'NIS','nama'=>'Nama Lengkap','kelas'=>'Kelas','jurusan'=>'Jurusan'] as $name => $ph)
                <input type="text" name="{{ $name }}" placeholder="{{ $ph }}" class="w-full border rounded px-3 py-2">
            @endforeach
            <select name="gender" class="w-full border rounded px-3 py-2">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="Aktif">Aktif</option>
                <option value="Lulus">Lulus</option>
                <option value="Alumni">Alumni</option>
            </select>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
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
{{-- ================= SCRIPT ================= --}}
<script>
const modal = document.getElementById('modal'),
      modalBox = document.getElementById('modalBox'),
      form = document.getElementById('siswaForm'),
      tableBody = document.querySelector('#siswaTable tbody'),
      searchInput = document.getElementById('searchInput');

        btnTambah.addEventListener('click', () => {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalBox.classList.remove('scale-95', 'opacity-0');
                modalBox.classList.add('scale-100', 'opacity-100');
            }, 50);
        });

        btnBatal.addEventListener('click', () => {
            modalBox.classList.remove('scale-100', 'opacity-100');
            modalBox.classList.add('scale-95', 'opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 200);
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modalBox.classList.remove('scale-100', 'opacity-100');
                modalBox.classList.add('scale-95', 'opacity-0');
                setTimeout(() => modal.classList.add('hidden'), 200);
            }
        });
    </script>
function openModal() {
    modal.classList.remove('hidden');
    setTimeout(() => modalBox.classList.remove('scale-95','opacity-0'), 50);
}
function closeModal() {
    modalBox.classList.add('scale-95','opacity-0');
    setTimeout(() => { modal.classList.add('hidden'); form.reset(); }, 200);
}

// Tambah data ke tabel
form.addEventListener('submit', e => {
    e.preventDefault();
    const d = Object.fromEntries(new FormData(form));
    tableBody.insertAdjacentHTML('beforeend', `
        <tr class="border-t hover:bg-gray-50 transition">
            <td class="px-4 py-3">${d.nis}</td>
            <td class="px-4 py-3 font-medium">${d.nama}</td>
            <td class="px-4 py-3">${d.kelas}</td>
            <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">${d.jurusan}</span></td>
            <td class="px-4 py-3">${d.gender}</td>
            <td class="px-4 py-3">
                <span class="${d.status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'} px-2 py-1 rounded text-sm">${d.status}</span>
            </td>
            <td class="px-4 py-3 flex space-x-3">
                <button class="text-blue-500 hover:text-blue-700" title="Lihat"><i class="ri-eye-line"></i></button>
                <button class="text-orange-500 hover:text-orange-700" title="Edit"><i class="ri-edit-line"></i></button>
                <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus"><i class="ri-delete-bin-line"></i></button>
            </td>
        </tr>`);
    closeModal();
});

// Pencarian real-time
searchInput.addEventListener('keyup', e => {
    const val = e.target.value.toLowerCase();
    document.querySelectorAll('#siswaTable tbody tr').forEach(r => {
        r.style.display = r.innerText.toLowerCase().includes(val) ? '' : 'none';
    });
});

// Hapus konfirmasi
function confirmDelete(btn) {
    if (confirm("Apakah yakin ingin menghapus siswa ini?")) btn.closest('tr').remove();
}
</script>
@endsection

{{-- ================= MODAL TAMBAH SISWA ================= --}}
=======
    @include('siakad.pages.student._header')
    @include('siakad.pages.student._statistik')
    @include('siakad.pages.student._filter')
    @include('siakad.pages.student._table')
    @include('siakad.pages.student._modal')
=======
    {{-- PAGINATION (dummy) --}}
    <div class="flex justify-end items-center mt-3">
        <button class="px-3 py-1 border rounded-l-lg text-gray-500 text-sm hover:bg-gray-50">&laquo; Prev</button>
        <button class="px-3 py-1 bg-orange-500 text-white text-sm">1</button>
        <button class="px-3 py-1 border rounded-r-lg text-gray-500 text-sm hover:bg-gray-50">Next &raquo;</button>
=======
    {{-- ================= PAGINATION ================= --}}
    <div class="flex justify-end items-center mt-3 space-x-1">
        <button class="px-3 py-1 border rounded-lg text-gray-500 text-sm hover:bg-gray-50">&laquo; Prev</button>
        <button class="px-3 py-1 bg-orange-500 text-white text-sm rounded-lg">1</button>
        <button class="px-3 py-1 border rounded-lg text-gray-500 text-sm hover:bg-gray-50">2</button>
        <button class="px-3 py-1 border rounded-lg text-gray-500 text-sm hover:bg-gray-50">Next &raquo;</button>
>>>>>>> 911e62f (update frontend siakad)
    </div>
>>>>>>> 26ae217 (update siakad student)
</div>

{{-- ================= MODAL TAMBAH / EDIT SISWA ================= --}}
<div id="modalSiswa" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div id="modalBox"
        class="bg-white w-96 rounded-2xl shadow-2xl p-6 transform scale-95 opacity-0 transition">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-user-plus text-orange-500"></i>
            Tambah Siswa
        </h2>

        <form class="space-y-3">
            <div>
                <label class="text-sm text-gray-600">Nama Siswa</label>
                <input type="text"
                    class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
            </div>
            <div>
                <label class="text-sm text-gray-600">NIS</label>
                <input type="text"
                    class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
            </div>
            <div>
                <label class="text-sm text-gray-600">Kelas</label>
                <select
                    class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
                    <option>Pilih Kelas</option>
                    <option>X RPL 1</option>
                    <option>XI RPL 2</option>
                </select>
            </div>
            <div>
                <label class="text-sm text-gray-600">Status</label>
                <select
                    class="w-full border rounded-xl px-3 py-2 mt-1 text-sm focus:ring-2 focus:ring-orange-300 focus:border-orange-400">
                    <option>Aktif</option>
                    <option>Nonaktif</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 mt-5">
                <button type="button" id="btnBatal"
                    class="px-3 py-2 border rounded-xl text-gray-600 hover:bg-gray-100 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-xl transition">
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
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 50);
    });

    btnBatal.addEventListener('click', () => {
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 200);
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modalBox.classList.remove('scale-100', 'opacity-100');
            modalBox.classList.add('scale-95', 'opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 200);
        }
    });
</script>
@endsection
>>>>>>> 4d80e18 (update siakad)
