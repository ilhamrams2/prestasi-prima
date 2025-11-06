@extends('prestasiprima.index')
@section('title', 'Eligible')

@section('content')
    <style>
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

        /* Scrollbar lembut */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
    </style>

    <div class="bg-gray-50 p-4 md:p-6 min-h-screen flex flex-col items-center mt-28">
        <div class="w-full max-w-7xl space-y-6">

            <!-- Profile + Info -->
            <div class="flex flex-col lg:flex-row gap-6">
                <!-- Profile Card -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-sm flex items-center space-x-6 w-full lg:max-w-sm animate-fadeInUp hover:shadow-md transition duration-300">
                    <img src="{{ $student->foto ? asset('storage/presmaboard/students/' . $student->foto) : asset('assets/images/presmaboard/user.png') }}"
     alt="profile"
     class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm" />

                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">{{ $student->nama }}</h2>
                        <p class="text-slate-500 text-base">{{ $student->gender == 'l' ? 'Laki-laki' : 'Perempuan' }}</p>
                    </div>
                </div>

                <!-- Info Boxes -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 w-full">
                    @php
                        $info = [
                            ['Rangking', $student->rank],
                            ['Nilai Rata-Rata', number_format($student->scores_avg_score, 2)],
                            ['Angkatan', $student->angkatan],
                            ['Kelas', strtoupper($student->kelas)],
                            ['Jurusan', strtoupper($student->jurusan)],
                        ];
                    @endphp

                    @foreach ($info as $item)
                        <div
                            class="bg-white rounded-2xl shadow-sm p-5 flex flex-col items-center justify-center text-center
                               hover:shadow-md hover:-translate-y-1 transition duration-300 animate-fadeInUp">
                            <div
                                class="bg-gradient-to-br from-orange-400 to-orange-500 w-11 h-11 flex items-center justify-center rounded-xl mb-2 shadow-sm">
                                <img src="{{ asset('assets/images/presmaboard/user.svg') }}" alt="icon"
                                    class="w-4 h-4 filter brightness-0 invert">
                            </div>
                            <p class="text-slate-500 text-sm font-medium">{{ $item[0] }}</p>
                            <p class="text-slate-800 text-lg font-extrabold">{{ $item[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-4">
                <!-- Achievements -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-sm animate-fadeInUp xl:col-span-1 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold mb-4 text-slate-800">Pencapaian</h3>
                    <div class="max-h-[460px] overflow-y-auto divide-y divide-gray-200">
                        @forelse ($student->achievements as $achievement)
                            <div class="flex items-start gap-3 py-3">
                                <span class="text-yellow-500 text-2xl">🏆</span>
                                <div>
                                    <p class="font-medium text-slate-800">{{ $achievement->judul }}</p>
                                    <p class="text-slate-600 text-sm">{{ $achievement->deskripsi }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 italic text-center py-10">Belum ada pencapaian yang ditambahkan.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Projects -->
                <div
                    class="bg-white p-6 rounded-2xl shadow-sm animate-fadeInUp xl:col-span-2 hover:shadow-md transition duration-300">
                    <h3 class="text-lg font-semibold mb-4 text-slate-800">Project</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 max-h-[460px] overflow-y-auto">
                        @forelse ($student->projects as $project)
                            <div
                                class="relative rounded-xl overflow-hidden shadow-sm group hover:shadow-lg transition duration-300">
                                <img src="{{ asset('storage/presmaboard/projects/' . $project->gambar) }}" alt="project"
                                    class="w-full h-28 object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out">
                                <div
                                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-300">
                                    <p class="text-white text-sm font-semibold">{{ $project->judul ?? 'Project Siswa' }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-400 italic text-center col-span-full py-10">Belum ada project yang diunggah.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
