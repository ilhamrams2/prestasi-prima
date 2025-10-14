{{-- resources/views/siakad/pages/majors/majors-header.blade.php --}}
<<<<<<< HEAD
<<<<<<< HEAD

{{-- ================= HEADER ================= --}}
=======
>>>>>>> e247cf6 (update siakad)
=======

{{-- ================= HEADER ================= --}}
>>>>>>> 911e62f (update frontend siakad)
<div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">

    {{-- Breadcrumb --}}
    <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
        <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
            <i class="ri-home-4-line text-lg"></i> Dashboard
        </a>
        <span>/</span>
        <span class="text-gray-700 font-semibold flex items-center gap-1">
            <i class="ri-graduation-cap-line text-lg text-orange-500"></i> Manajemen Jurusan
        </span>
    </nav>

<<<<<<< HEAD
<<<<<<< HEAD
    {{-- Judul + Deskripsi --}}
    <div class="flex items-center gap-3">
        <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
            <i class="ri-graduation-cap-line text-3xl"></i>
=======
    {{-- Header Utama --}}
    <div class="flex items-center gap-3">
        <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
            <i class="ri-building-4-line text-3xl"></i>
>>>>>>> e247cf6 (update siakad)
=======
    {{-- Judul + Deskripsi --}}
    <div class="flex items-center gap-3">
        <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
            <i class="ri-graduation-cap-line text-3xl"></i>
>>>>>>> 911e62f (update frontend siakad)
        </div>
        <div>
            <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Jurusan</h1>
            <p class="text-gray-600 text-sm mt-1">
<<<<<<< HEAD
<<<<<<< HEAD
                Kelola data jurusan, jumlah kelas, siswa, dan kepala jurusan
            </p>
        </div>
    </div>
</div>


{{-- ================= STATISTIK ================= --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    {{-- Total Jurusan --}}
    <div
        class="bg-gradient-to-r from-orange-500 to-orange-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
<<<<<<< HEAD
        <div>
            <p class="text-sm opacity-80">Total Jurusan</p>
            <h3 id="statJurusan" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-folder-3-line text-4xl opacity-70"></i>
    </div>

    {{-- Total Kelas --}}
    <div
        class="bg-gradient-to-r from-blue-500 to-blue-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Kelas</p>
            <h3 id="statKelas" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-stack-line text-4xl opacity-70"></i>
    </div>

    {{-- Total Siswa --}}
    <div
        class="bg-gradient-to-r from-green-500 to-green-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Siswa</p>
            <h3 id="statSiswa" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-group-line text-4xl opacity-70"></i>
    </div>

    {{-- Kepala Jurusan Aktif --}}
    <div
        class="bg-gradient-to-r from-purple-500 to-purple-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Kepala Jurusan Aktif</p>
            <h3 id="statKepala" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-user-star-line text-4xl opacity-70"></i>
    </div>
</div>


{{-- ================= CTA + FILTER ================= --}}
<div class="flex items-center justify-between flex-wrap gap-4 mb-6">
    <button onclick="openModal('add')"
        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
        + Tambah Jurusan
    </button>

    <div class="w-full md:w-1/3">
        <div class="bg-white p-4 rounded-lg shadow gap-4">
            {{-- Search --}}
            <div class="relative">
                <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                <input id="searchInput" type="text" placeholder="Cari nama jurusan / kode / kepala jurusan"
                    class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
=======
                Kelola data jurusan, angkatan, jumlah kelas, siswa, dan kepala jurusan
=======
                Kelola data jurusan, jumlah kelas, siswa, dan kepala jurusan
>>>>>>> 911e62f (update frontend siakad)
            </p>
        </div>
    </div>
</div>


{{-- ================= STATISTIK ================= --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    {{-- Total Jurusan --}}
    <div class="bg-gradient-to-r from-orange-500 to-orange-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
=======
>>>>>>> de7c788 (Add : CRUD MAJORS)
        <div>
            <p class="text-sm opacity-80">Total Jurusan</p>
            <h3 id="statJurusan" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-folder-3-line text-4xl opacity-70"></i>
    </div>

    {{-- Total Kelas --}}
    <div
        class="bg-gradient-to-r from-blue-500 to-blue-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Kelas</p>
            <h3 id="statKelas" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-stack-line text-4xl opacity-70"></i>
    </div>

<<<<<<< HEAD
        <div class="w-full md:w-1/2">
            <div class="bg-white p-3 rounded-lg shadow flex gap-3 items-center">
                <div class="relative flex-1">
                    <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input id="searchInput" type="text" placeholder="Cari nama jurusan / kode / kepala jurusan"
                        class="w-full border-none rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:outline-none" />
                </div>
                <select id="statusFilter" class="border rounded-lg px-3 py-2 bg-white">
                    <option value="all">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
>>>>>>> e247cf6 (update siakad)
=======
    {{-- Total Siswa --}}
    <div
        class="bg-gradient-to-r from-green-500 to-green-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Siswa</p>
            <h3 id="statSiswa" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-group-line text-4xl opacity-70"></i>
    </div>

    {{-- Kepala Jurusan Aktif --}}
    <div
        class="bg-gradient-to-r from-purple-500 to-purple-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Kepala Jurusan Aktif</p>
            <h3 id="statKepala" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-user-star-line text-4xl opacity-70"></i>
    </div>
</div>


{{-- ================= CTA + FILTER ================= --}}
<div class="flex items-center justify-between flex-wrap gap-4 mb-6">
    <button onclick="openModal('add')"
        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
        + Tambah Jurusan
    </button>

    <div class="w-full md:w-1/3">
        <div class="bg-white p-4 rounded-lg shadow gap-4">
            {{-- Search --}}
            <div class="relative">
                <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                <input id="searchInput" type="text" placeholder="Cari nama jurusan / kode / kepala jurusan"
                    class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
>>>>>>> 911e62f (update frontend siakad)
            </div>
        </div>
    </div>
</div>
