{{-- resources/views/siakad/pages/classes/classes-header.blade.php --}}

{{-- ================= HEADER ================= --}}
<div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">

<<<<<<< HEAD
<<<<<<< HEAD
    {{-- ===== Breadcrumb (mengikuti format sebelumnya) ===== --}}
=======
    {{-- Breadcrumb --}}
>>>>>>> 9995902 (majors and class)
=======
    {{-- ===== Breadcrumb (mengikuti format sebelumnya) ===== --}}
>>>>>>> ae60cab (update siakad kelas (belum final))
    <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
        <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
            <i class="ri-home-4-line text-lg"></i> Dashboard
        </a>
        <span>/</span>
        <span class="text-gray-700 font-semibold flex items-center gap-1">
            <i class="ri-community-line text-lg text-orange-500"></i> Manajemen Kelas
        </span>
    </nav>

<<<<<<< HEAD
<<<<<<< HEAD
    {{-- ===== Judul dan Deskripsi ===== --}}
=======
    {{-- Judul + Deskripsi --}}
>>>>>>> 9995902 (majors and class)
=======
    {{-- ===== Judul dan Deskripsi ===== --}}
>>>>>>> ae60cab (update siakad kelas (belum final))
    <div class="flex items-center gap-3">
        <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
            <i class="ri-community-line text-3xl"></i>
        </div>
        <div>
            <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Kelas</h1>
            <p class="text-gray-600 text-sm mt-1">
                Kelola data kelas, jurusan, wali kelas, dan informasi akademik
            </p>
        </div>
    </div>
</div>


{{-- ================= STATISTIK ================= --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 9995902 (majors and class)
=======

>>>>>>> ae60cab (update siakad kelas (belum final))
    {{-- Total Kelas --}}
    <div class="bg-gradient-to-r from-orange-500 to-orange-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Kelas</p>
            <h3 id="statKelas" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-building-2-line text-4xl opacity-70"></i>
    </div>

    {{-- Total Jurusan --}}
    <div class="bg-gradient-to-r from-blue-500 to-blue-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Jurusan</p>
            <h3 id="statJurusan" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-bank-line text-4xl opacity-70"></i>
    </div>

<<<<<<< HEAD
<<<<<<< HEAD
    {{-- Kelas Aktif --}}
=======
    {{-- Wali Kelas Aktif --}}
>>>>>>> 9995902 (majors and class)
=======
    {{-- Kelas Aktif --}}
>>>>>>> ae60cab (update siakad kelas (belum final))
    <div class="bg-gradient-to-r from-green-500 to-green-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Kelas Aktif</p>
            <h3 id="statWali" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-user-star-line text-4xl opacity-70"></i>
    </div>

    {{-- Total Siswa --}}
    <div class="bg-gradient-to-r from-purple-500 to-purple-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Siswa</p>
            <h3 id="statSiswa" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-group-line text-4xl opacity-70"></i>
    </div>
</div>


{{-- ================= CTA + FILTER ================= --}}
<div class="flex items-center justify-between flex-wrap gap-4 mb-6">
    <button id="btnAdd"
        class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
        + Tambah Kelas
    </button>

<<<<<<< HEAD
<<<<<<< HEAD
    {{-- Filter Container --}}
    <div class="w-full md:w-2/3">
        <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            {{-- Jurusan --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Jurusan</label>
                <select id="filterJurusan" class="border rounded-lg px-3 py-2 w-full bg-gray-50 focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua Jurusan</option>
                    <option value="PPLG">PPLG</option>
                    <option value="TJKT">TJKT</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>

            {{-- Kelas --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Kelas</label>
                <select id="filterKelas" class="border rounded-lg px-3 py-2 w-full bg-gray-50 focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Jenis Kelamin</label>
                <select id="filterGender" class="border rounded-lg px-3 py-2 w-full bg-gray-50 focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            {{-- Pencarian --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Pencarian</label>
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                    <input id="searchInput" type="text" placeholder="Nama Kelas, Wali Kelas, Ruangan"
                        class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>

=======
=======
    {{-- Filter Container --}}
>>>>>>> ae60cab (update siakad kelas (belum final))
    <div class="w-full md:w-2/3">
        <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            {{-- Jurusan --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Jurusan</label>
                <select id="filterJurusan" class="border rounded-lg px-3 py-2 w-full bg-gray-50 focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua Jurusan</option>
                    <option value="PPLG">PPLG</option>
                    <option value="TJKT">TJKT</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>

            {{-- Kelas --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Kelas</label>
                <select id="filterKelas" class="border rounded-lg px-3 py-2 w-full bg-gray-50 focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Jenis Kelamin</label>
                <select id="filterGender" class="border rounded-lg px-3 py-2 w-full bg-gray-50 focus:ring-2 focus:ring-orange-400">
                    <option value="">Semua</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            {{-- Pencarian --}}
            <div>
                <label class="text-sm font-medium text-gray-600 mb-1 block">Pencarian</label>
                <div class="relative">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                    <input id="searchInput" type="text" placeholder="Nama Kelas, Wali Kelas, Ruangan"
                        class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>

<<<<<<< HEAD
            {{-- Filter Jurusan --}}
            <select id="filterJurusan" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                <option value="">Semua Jurusan</option>
            </select>
>>>>>>> 9995902 (majors and class)
=======
>>>>>>> ae60cab (update siakad kelas (belum final))
        </div>
    </div>
</div>
