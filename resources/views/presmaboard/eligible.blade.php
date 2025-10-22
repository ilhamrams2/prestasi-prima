@extends('prestasiprima.index')
@section('title', 'eligible')

@section('content')
    <style>
        /* Fade In Up */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out both;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            /* gray-400 */
            border-radius: 9999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
            /* gray-500 */
        }
    </style>

    <div class="p-4 md:p-6 min-h-screen flex flex-col items-center mt-32">
        <div class="w-full max-w-[1275px] space-y-6">
            <!-- Profile + Info -->
            <div class="flex flex-col lg:flex-row gap-4 md:gap-6">
                <!-- Profile Card -->
                <div
                    class="bg-white p-4 md:p-6 rounded-2xl shadow-md flex items-center space-x-4 md:space-x-6
                        w-full lg:max-w-[500px] lg:h-[240px] animate-fadeInUp transform transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <img src="{{ $student->foto ? asset('storage/presmaboard/students/' . $student->foto) : asset('assets/images/presmaboard/user.png') }}"
                        alt="profile" class="w-24 h-24 md:w-[150px] md:h-[150px] rounded-full object-cover">
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold">{{ $student->nama }}</h2>
                        <p class="text-gray-500 text-base md:text-lg font-medium">
                            {{ $student->gender == 'l' ? 'Laki-laki' : 'Perempuan' }}</p>
                        {{-- <p class="text-gray-600 text-base md:text-lg font-medium">137 Tahun</p> --}}
                    </div>
                </div>

                <!-- Info Boxes -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3 md:gap-4 w-full">
                    <!-- Rangking -->
                    <div
                        class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-2
                            animate-fadeInUp transform transition duration-300 hover:-translate-y-1 hover:shadow-lg group">
                        <div
                            class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0 relative overflow-hidden">
                            <span
                                class="absolute inset-0 rounded-xl border-2 border-orange-400 opacity-0 group-hover:opacity-100 animate-ping"></span>
                            <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon"
                                class="w-4 h-4 md:w-[17px] md:h-[18px] relative z-10">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-500 text-xs md:text-sm font-medium">Rangking</p>
                            <p class="font-extrabold text-lg md:text-xl text-gray-800">{{ $student->rank }}</p>
                        </div>
                    </div>

                    <!-- Nilai Rata-rata -->
                    <div
                        class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-2
                            animate-fadeInUp transform transition duration-300 hover:-translate-y-1 hover:shadow-lg group">
                        <div
                            class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0 relative overflow-hidden">
                            <span
                                class="absolute inset-0 rounded-xl border-2 border-orange-400 opacity-0 group-hover:opacity-100 animate-ping"></span>
                            <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon"
                                class="w-4 h-4 md:w-[17px] md:h-[18px] relative z-10">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-500 text-xs md:text-sm font-medium">Nilai Rata-Rata</p>
                            <p class="font-extrabold text-lg md:text-xl text-gray-800">
                                {{ number_format($student->scores_avg_score, 2) }}</p>
                        </div>
                    </div>

                    <!-- Angkatan -->
                    <div
                        class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-2
                            animate-fadeInUp transform transition duration-300 hover:-translate-y-1 hover:shadow-lg group">
                        <div
                            class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0 relative overflow-hidden">
                            <span
                                class="absolute inset-0 rounded-xl border-2 border-orange-400 opacity-0 group-hover:opacity-100 animate-ping"></span>
                            <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon"
                                class="w-4 h-4 md:w-[17px] md:h-[18px] relative z-10">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-500 text-xs md:text-sm font-medium">Angkatan</p>
                            <p class="font-extrabold text-lg md:text-xl text-gray-800">{{ $student->angkatan }}</p>
                        </div>
                    </div>

                    <!-- Kelas -->
                    <div
                        class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-3
                            animate-fadeInUp transform transition duration-300 hover:-translate-y-1 hover:shadow-lg group">
                        <div
                            class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0 relative overflow-hidden">
                            <span
                                class="absolute inset-0 rounded-xl border-2 border-orange-400 opacity-0 group-hover:opacity-100 animate-ping"></span>
                            <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon"
                                class="w-4 h-4 md:w-[17px] md:h-[18px] relative z-10">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-500 text-xs md:text-sm font-medium">Kelas</p>
                            <p class="font-extrabold text-lg md:text-xl text-gray-800">{{ $student->kelas }}</p>
                        </div>
                    </div>

                    <!-- Jurusan -->
                    <div
                        class="bg-white rounded-2xl shadow-md p-4 md:p-5 flex items-center space-x-3 md:space-x-4 lg:col-span-3
                            animate-fadeInUp transform transition duration-300 hover:-translate-y-1 hover:shadow-lg group">
                        <div
                            class="bg-orange-500 rounded-xl flex items-center justify-center w-10 h-10 md:w-12 md:h-12 flex-shrink-0 relative overflow-hidden">
                            <span
                                class="absolute inset-0 rounded-xl border-2 border-orange-400 opacity-0 group-hover:opacity-100 animate-ping"></span>
                            <img src="{{ asset(path: 'assets/images/presmaboard/user.svg') }}" alt="icon"
                                class="w-4 h-4 md:w-[17px] md:h-[18px] relative z-10">
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-500 text-xs md:text-sm font-medium">Jurusan</p>
                            <p class="font-extrabold text-lg md:text-xl text-gray-800 uppercase">{{ $student->jurusan }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian bawah: Achievements & Projects -->
            <div class="flex flex-col xl:flex-row gap-4 md:gap-5 mt-4 md:mt-6">
                <!-- Pencapaian -->
                <div
                    class="bg-white p-4 md:p-6 rounded-2xl shadow-md w-full xl:max-w-[500px] xl:h-[563px] animate-fadeInUp">
                    <h3 class="text-lg md:text-xl font-semibold mb-3 md:mb-4">Pencapaian</h3>
                    <div class="max-h-[400px] overflow-y-auto pr-2 divide-y divide-gray-200">
                        @foreach ($student->achievements as $achievement)
                            <div class="flex items-start space-x-3 py-2">
                                <span class="text-yellow-500 text-2xl">🏆</span>
                                <div>
                                    <p class="font-medium">{{ $achievement->judul }}</p>
                                    <p class="text-gray-600 text-sm">
                                        {{ $achievement->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Project -->
                <div class="w-full xl:max-w-[719px] xl:h-[533px] p-4 md:p-6 animate-fadeInUp">
                    <h3 class="text-lg md:text-xl font-semibold mb-2">Project</h3>
                    <div class="h-[3px] bg-gray-800 mb-4 w-full"></div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 md:gap-4 max-h-[480px] overflow-y-auto pr-2">

                        @foreach ($student->projects as $project)
                            <div
                                class="relative rounded-xl overflow-hidden shadow-md group transform transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                                <!-- Gambar -->
                                <img src="{{ asset('storage/presmaboard/projects/' . $project->gambar) }}" alt="project"
                                    class="w-full h-24 md:h-32 object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">

                                <!-- Overlay Hover -->
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-50 opacity-0 flex items-center justify-center
                                    transition-opacity duration-300 group-hover:opacity-100">
                                    <p
                                        class="text-white font-semibold text-sm md:text-base transform translate-y-4
                                      group-hover:translate-y-0 transition duration-500 ease-out">
                                        Portfolio Project
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
