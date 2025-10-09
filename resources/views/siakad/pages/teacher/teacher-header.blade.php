{{-- resources/views/siakad/pages/teacher/teacher-header.blade.php --}}
<<<<<<< HEAD
<div class="bg-gradient-to-r from-orange-50 to-white border rounded-2xl shadow-sm p-5 mb-6">
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
        <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
            <i class="ri-home-4-line text-lg"></i> Dashboard
=======
<div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
        <a href="#" class="hover:text-orange-600 transition-colors flex items-center gap-1">
            <i class="ri-home-4-line text-lg"></i> Dasbor
>>>>>>> 328e99e (update siakad belom kelar)
        </a>
        <span>/</span>
        <span class="text-gray-700 font-semibold flex items-center gap-1">
            <i class="ri-presentation-line text-lg text-orange-500"></i> Manajemen Guru
        </span>
    </nav>

    <!-- Title -->
<<<<<<< HEAD
    <div class="flex items-center gap-3">
        <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
            <i class="ri-presentation-line text-2xl"></i>
        </div>
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-orange-600">Manajemen Guru</h1>
            <p class="text-gray-600 text-sm mt-1">Kelola data guru, mata pelajaran, jadwal, dan informasi akademik</p>
=======
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-presentation-line text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Guru</h1>
                <p class="text-gray-600 text-sm mt-1">Kelola data guru, mata pelajaran, jadwal, dan informasi akademik</p>
            </div>
>>>>>>> 328e99e (update siakad belom kelar)
        </div>
    </div>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
<<<<<<< HEAD
    <!-- Total Guru -->
    <div class="bg-orange-500 text-white p-5 rounded-xl shadow flex items-center justify-between">
        <div>
            <p class="text-sm opacity-90">Total Guru</p>
            <h2 class="text-2xl font-bold">{{ $totalTeachers }}</h2>
        </div>
        <i class="ri-graduation-cap-line text-3xl opacity-80"></i>
    </div>

    <!-- Guru Aktif -->
    <div class="bg-blue-500 text-white p-5 rounded-xl shadow flex items-center justify-between">
        <div>
            <p class="text-sm opacity-90">Guru Aktif</p>
            <h2 class="text-2xl font-bold">{{ $activeTeachers }}</h2>
        </div>
        <i class="ri-user-follow-line text-3xl opacity-80"></i>
    </div>

    <!-- Kepala Jurusan -->
    <div class="bg-green-500 text-white p-5 rounded-xl shadow flex items-center justify-between">
        <div>
            <p class="text-sm opacity-90">Kepala Jurusan</p>
            <h2 class="text-2xl font-bold">{{ $headOfDepartment }}</h2>
        </div>
        <i class="ri-briefcase-4-line text-3xl opacity-80"></i>
    </div>

    <!-- Wali Kelas -->
    <div class="bg-purple-500 text-white p-5 rounded-xl shadow flex items-center justify-between">
        <div>
            <p class="text-sm opacity-90">Wali Kelas</p>
            <h2 class="text-2xl font-bold">{{ $homeroomTeachers }}</h2>
        </div>
        <i class="ri-team-line text-3xl opacity-80"></i>
=======
    <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
        <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-graduation-cap-line text-2xl"></i></div>
        <div>
            <p class="text-sm text-gray-500">Total Guru</p>
            <h2 class="text-xl font-bold">{{ $totalTeachers }}</h2>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
        <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-user-follow-line text-2xl"></i></div>
        <div>
            <p class="text-sm text-gray-500">Guru Aktif</p>
            <h2 class="text-xl font-bold">{{ $activeTeachers }}</h2>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
        <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-briefcase-4-line text-2xl"></i></div>
        <div>
            <p class="text-sm text-gray-500">Kepala Jurusan</p>
            <h2 class="text-xl font-bold">{{ $headOfDepartment }}</h2>
        </div>
    </div>
    <div class="bg-white p-4 rounded-xl shadow flex items-center space-x-3">
        <div class="bg-orange-100 text-orange-600 p-3 rounded-lg"><i class="ri-team-line text-2xl"></i></div>
        <div>
            <p class="text-sm text-gray-500">Wali Kelas</p>
            <h2 class="text-xl font-bold">{{ $homeroomTeachers }}</h2>
        </div>
>>>>>>> 328e99e (update siakad belom kelar)
    </div>
</div>
