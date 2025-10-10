<<<<<<< HEAD
<<<<<<< HEAD
{{-- ================= HEADER ================= --}}
=======
>>>>>>> 4d80e18 (update siakad)
=======
{{-- ================= HEADER ================= --}}
>>>>>>> 911e62f (update frontend siakad)
<div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
    <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
        <a href="#" class="hover:text-orange-600 flex items-center gap-1 transition-colors">
            <i class="ri-home-4-line text-lg"></i> Dashboard
        </a>
        <span>/</span>
        <span class="text-gray-700 font-semibold flex items-center gap-1">
            <i class="ri-team-line text-lg text-orange-500"></i> Manajemen Siswa
        </span>
    </nav>

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 911e62f (update frontend siakad)


{{-- ================= STATISTIK ================= --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    {{-- Total Siswa --}}
    <div class="bg-gradient-to-r from-orange-500 to-orange-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Siswa</p>
            <h3 id="statSiswa" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-user-3-line text-4xl opacity-70"></i>
    </div>

    {{-- Total Kelas --}}
    <div class="bg-gradient-to-r from-blue-500 to-blue-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Kelas</p>
            <h3 id="statKelas" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-stack-line text-4xl opacity-70"></i>
    </div>

    {{-- Total Jurusan --}}
    <div class="bg-gradient-to-r from-green-500 to-green-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Total Jurusan</p>
            <h3 id="statJurusan" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-graduation-cap-line text-4xl opacity-70"></i>
    </div>

    {{-- Siswa Aktif --}}
    <div class="bg-gradient-to-r from-purple-500 to-purple-400 text-white rounded-2xl p-5 shadow-md flex items-center justify-between hover:scale-[1.02] transition">
        <div>
            <p class="text-sm opacity-80">Siswa Aktif</p>
            <h3 id="statAktif" class="text-3xl font-bold mt-1">0</h3>
        </div>
        <i class="ri-user-star-line text-4xl opacity-70"></i>
    </div>
</div>


{{-- ================= CTA + FILTER ================= --}}
<div class="flex items-center justify-between flex-wrap gap-4 mb-6">
    <button onclick="openModal('add')"
        class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-lg shadow transition">
        + Tambah Siswa
    </button>

    <div class="w-full md:w-2/3">
        <div class="bg-white p-4 rounded-lg shadow grid grid-cols-1 sm:grid-cols-3 gap-4">
            {{-- Search --}}
            <div class="relative sm:col-span-2">
                <i class="ri-search-line absolute left-3 top-2.5 text-gray-400"></i>
                <input id="searchInput" type="text" placeholder="Cari nama siswa / NIS / kelas"
                    class="w-full border rounded-lg pl-10 pr-3 py-2 bg-gray-50 focus:ring-2 focus:ring-orange-400">
            </div>
            {{-- Filter Jurusan --}}
            <select id="jurusanFilter" class="border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                <option value="all">Semua Jurusan</option>
                <option value="pplg">PPLG</option>
                <option value="tkj">TKJ</option>
                <option value="akl">AKL</option>
            </select>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
>>>>>>> 4d80e18 (update siakad)
=======
>>>>>>> 911e62f (update frontend siakad)
