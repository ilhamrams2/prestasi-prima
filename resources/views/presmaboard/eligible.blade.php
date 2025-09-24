@extends('prestasiprima.index')
@section('title','eligible')

@section('content')
<div class="p-4 md:p-6 min-h-screen flex flex-col items-center mt-32">
    <div class="w-full max-w-[1275px]">
        <!-- Profile + Info -->
        <div class="flex flex-col lg:flex-row gap-4 md:gap-6">
            <!-- Profile Card -->
            <div class="bg-white p-4 md:p-6 rounded-2xl shadow-md flex items-center space-x-4 md:space-x-6 w-full lg:max-w-[500px] lg:h-[240px]">
                <img src="{{ asset('assets/images/presmaboard/bahlil.png') }}" alt="profile" class="w-24 h-24 md:w-[150px] md:h-[150px] rounded-full object-cover">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold">Bahlul</h2>
                    <p class="text-gray-500 text-base md:text-lg font-medium">Goblin</p>
                    <p class="text-gray-600 text-base md:text-lg font-medium">137 Tahun</p>
                </div>
            </div>

            <!-- Info Boxes -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3 md:gap-4 w-full">
                <!-- Rangking -->
                <div class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-2">
                    <div class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0">
                        <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon" class="w-4 h-4 md:w-[17px] md:h-[18px]">
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-500 text-xs md:text-sm font-medium">Rangking</p>
                        <p class="font-extrabold text-lg md:text-xl text-gray-800">3</p>
                    </div>
                </div>

                <!-- Nilai Rata-rata -->
                <div class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-2">
                    <div class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0">
                        <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon" class="w-4 h-4 md:w-[17px] md:h-[18px]">
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-500 text-xs md:text-sm font-medium">Nilai Rata-Rata</p>
                        <p class="font-extrabold text-lg md:text-xl text-gray-800">90/100</p>
                    </div>
                </div>

                <!-- Angkatan -->
                <div class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-2">
                    <div class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0">
                        <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon" class="w-4 h-4 md:w-[17px] md:h-[18px]">
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-500 text-xs md:text-sm font-medium">Angkatan</p>
                        <p class="font-extrabold text-lg md:text-xl text-gray-800">2025/2026</p>
                    </div>
                </div>

                <!-- Kelas -->
                <div class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-3">
                    <div class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0">
                        <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon" class="w-4 h-4 md:w-[17px] md:h-[18px]">
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-500 text-xs md:text-sm font-medium">Kelas</p>
                        <p class="font-extrabold text-lg md:text-xl text-gray-800">DPR</p>
                    </div>
                </div>

                <!-- Jurusan -->
                <div class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-3">
                    <div class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0">
                        <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon" class="w-4 h-4 md:w-[17px] md:h-[18px]">
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-500 text-xs md:text-sm font-medium">Jurusan</p>
                        <p class="font-extrabold text-lg md:text-xl text-gray-800">Sumber Daya</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian bawah: Achievements & Projects -->
        <div class="flex flex-col xl:flex-row gap-4 md:gap-5 mt-4 md:mt-6">
            <!-- Pencapaian -->
            <div class="bg-white p-4 md:p-6 rounded-2xl shadow-md w-full xl:max-w-[500px] xl:h-[563px]">
                <h3 class="text-lg md:text-xl font-semibold mb-3 md:mb-4">Pencapaian Korupsi</h3>
                <div class="max-h-[400px] overflow-y-auto pr-2 divide-y divide-gray-200">
                    <div class="flex items-start space-x-3 py-2">
                        <span class="text-yellow-500 text-2xl">🏆</span>
                        <div>
                            <p class="font-medium">Kasus Korupsi Tambang Batubara</p>
                            <p class="text-gray-600 text-sm">Penyalahgunaan izin eksploitasi batubara oleh oknum pejabat daerah...</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 py-2">
                        <span class="text-yellow-500 text-2xl">🏆</span>
                        <div>
                            <p class="font-medium">Korupsi Perizinan Hutan</p>
                            <p class="text-gray-600 text-sm">Manipulasi dokumen perizinan untuk pembukaan lahan sawit ilegal.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 py-2">
                        <span class="text-yellow-500 text-2xl">🏆</span>
                        <div>
                            <p class="font-medium">Penyelundupan Kayu Ilegal</p>
                            <p class="text-gray-600 text-sm">Perdagangan hasil hutan tanpa izin resmi melalui jalur laut.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 py-2">
                        <span class="text-yellow-500 text-2xl">🏆</span>
                        <div>
                            <p class="font-medium">Penyelewengan Dana Rehabilitasi Lingkungan</p>
                            <p class="text-gray-600 text-sm">Dana perbaikan pasca tambang digunakan untuk kepentingan pribadi.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 py-2">
                        <span class="text-yellow-500 text-2xl">🏆</span>
                        <div>
                            <p class="font-medium">Kasus Korupsi Pertambangan Emas</p>
                            <p class="text-gray-600 text-sm">Oknum pejabat menerima suap terkait izin pertambangan emas ilegal.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 py-2">
                        <span class="text-yellow-500 text-2xl">🏆</span>
                        <div>
                            <p class="font-medium">Penyalahgunaan Izin Ekspor Hasil Laut</p>
                            <p class="text-gray-600 text-sm">Penyelundupan hasil laut bernilai tinggi tanpa membayar pajak negara.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project -->
            <div class="w-full xl:max-w-[719px] xl:h-[533px] p-4 md:p-6">
                <h3 class="text-lg md:text-xl font-semibold mb-2">Project</h3>
                <div class="h-[3px] bg-gray-800 mb-4 w-full"></div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 md:gap-4 max-h-[480px] overflow-y-auto pr-2">
                    @for ($i = 0; $i < 12; $i++)
                    <div class="relative rounded-xl overflow-hidden shadow-md group">
                        <!-- Gambar -->
                        <img src="https://picsum.photos/400/300?random={{ $i }}"
                             alt="project"
                             class="w-full h-24 md:h-32 object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">

                        <!-- Overlay Hover -->
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 flex items-center justify-center
                                    transition-opacity duration-300 group-hover:opacity-100">
                            <p class="text-white font-semibold text-sm md:text-base transform translate-y-4
                                      group-hover:translate-y-0 transition duration-500 ease-out">
                                Portfolio Project
                            </p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
