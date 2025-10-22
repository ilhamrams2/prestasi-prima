@extends('presmaboard.partials.layout')

@section('title', 'Nilai PKP Siswa')

@section('content')
    <div x-data="{
        showCreate: false,
        showEdit: false,
        openDeleteModal: false,
        selectedScore: {},

        filter: {
            search: '{{ request('search') }}',
            semester: '{{ request('semester') }}',
            tahun_ajar: '{{ request('tahun_ajar') }}',
        },

        filterProjects() {
            let url = '?'
            if (this.filter.semester) {
                url += '&semester=' + this.filter.semester
            }
            if (this.filter.tahun_ajar) {
                url += '&tahun_ajar=' + this.filter.tahun_ajar
            }
            if (this.filter.search) {
                url += '&search=' + this.filter.search
            }
            window.location = url
        },

    }" class="animate-fadeIn relative">
        <!-- Header -->
        <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-3 sm:px-4 py-3 shadow-sm mb-6">
            <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2 overflow-x-auto">
                <a href="" class="hover:text-orange-600 flex items-center gap-1 transition-colors whitespace-nowrap">
                    <i class="ri-home-4-line text-lg"></i> Dashboard
                </a>
                <span>/</span>
                <span class="text-gray-700 font-semibold flex items-center gap-1 whitespace-nowrap">
                    <i class="ri-trophy-line text-lg text-orange-500"></i> Nilai PKP
                </span>
            </nav>

            <div class="flex items-center gap-3 flex-wrap">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-trophy-line text-2xl sm:text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-orange-600">Nilai PKP Siswa</h1>
                    <p class="text-gray-600 text-xs sm:text-sm mt-1">
                        Kelola data nilai UTS/UAS dan prestasi akademik siswa berdasarkan semester dan tahun ajaran.
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <template
                    x-for="(card, index) in [
                {icon:'ri-trophy-line', color:'orange', title:'Total Data Nilai', value:'{{ $statistics['total_scores'] ?? 0 }}'},
                {icon:'ri-trophy-line', color:'orange', title:'Nilai PKP Tertinggi', value:'{{ number_format($statistics['high_score'] ?? 0, 2) }}'},
                {icon:'ri-trophy-line', color:'orange', title:'Rata-rata Nilai', value:'{{ number_format($statistics['average_score'] ?? 0, 2) }}'},
            ]"
                    :key="index">
                    <div
                        :class="`p-4 sm:p-5 bg-gradient-to-br from-${card.color}-50 to-white rounded-2xl shadow-sm border border-gray-100`">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div :class="`p-2 sm:p-3 bg-${card.color}-100 text-${card.color}-600 rounded-xl`">
                                <i :class="`${card.icon} text-xl sm:text-2xl`"></i>
                            </div>
                            <div>
                                <p class="text-xs sm:text-sm text-gray-500 font-medium" x-text="card.title"></p>
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mt-1" x-text="card.value"></h3>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Filter & Pencarian -->
            <div
                class="bg-white p-4 sm:p-5 rounded-2xl shadow-md border border-gray-100 flex flex-col md:flex-row flex-wrap gap-3 items-center justify-between">
                <div class="flex flex-wrap gap-3 items-center w-full md:w-auto">
                    <div class="relative w-full sm:w-auto">
                        <select name="semester" x-model="filter.semester" @change="filterProjects()"
                            class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-40 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                            <option value="">Semua Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <i
                            class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>

                    <div class="relative w-full sm:w-auto">
                        <select name="tahun_ajaran" x-model="filter.tahun_ajaran" @change="filterProjects()"
                            class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-40 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                            <option value="">Semua Tahun</option>
                            @foreach ($tahun_ajar as $item)
                                <option value="{{ $item->tahun_ajaran }}">{{ $item->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                        <i
                            class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>

                    <div
                        class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
                        <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
                        <input type="text" name="search" x-model="filter.search"
                            @input.debounce.500ms="filterProjects()"
                            class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm"
                            placeholder="Cari nama siswa" />
                    </div>
                </div>

                <button @click="showCreate=true"
                    class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center">
                    <i class="ri-add-line text-lg"></i> Tambah Nilai PKP
                </button>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-md overflow-x-auto border border-gray-100">
                <table class="min-w-full text-sm text-gray-700 border-collapse">
                    <thead class="bg-orange-50 text-gray-700 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-4 sm:px-6 py-3 text-left">Nama Siswa</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Semester</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Tahun Ajaran</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Tipe Ujian</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Nilai PKP</th>
                            <th class="px-4 sm:px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($scores as $item)
                            <tr class="border-t even:bg-gray-50">
                                <td class="px-4 sm:px-6 py-3 font-medium">{{ $item->student->nama }}</td>
                                <td class="px-4 sm:px-6 py-3">{{ $item->semester }}</td>
                                <td class="px-4 sm:px-6 py-3">{{ $item->tahun_ajaran }}</td>
                                <td class="px-4 sm:px-6 py-3">{{ $item->tipe_ujian }}</td>
                                <td class="px-4 sm:px-6 py-3 font-semibold text-orange-600">
                                    {{ number_format($item->score, 2) }}</td>
                                <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                                    <button @click="selectedScore={{ json_encode($item) }};showEdit=true"
                                        class="text-orange-500 hover:text-orange-700">
                                        <i class="ri-edit-line text-base sm:text-lg"></i>
                                    </button>
                                    <button @click="openDeleteModal=true;selectedScore={{ json_encode($item) }}"
                                        class="text-red-500 hover:text-red-700">
                                        <i class="ri-delete-bin-6-line text-base sm:text-lg"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-cloak>
            <!-- MODAL CREATE -->
            <div x-show="showCreate" x-transition @click.self="showCreate=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form method="post" action="{{ route('presmaboard.admin.score.store') }}"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
                    @csrf
                    <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Nilai PKP</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <select name="student_id" class="border rounded-lg px-3 py-2 col-span-2" required>
                            <option value="">Pilih Siswa</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->nama }}</option>
                            @endforeach
                        </select>

                        <select name="semester" class="border rounded-lg px-3 py-2" required>
                            <option value="">Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>

                        <input name="tahun_ajaran" type="text" placeholder="Tahun Ajaran (contoh: 2024/2025)"
                            class="border rounded-lg px-3 py-2" required />

                        <select name="tipe_ujian" class="border rounded-lg px-3 py-2" required>
                            <option value="">Tipe Ujian</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                        </select>

                        <input name="score" type="number" step="0.01" placeholder="Nilai PKP"
                            class="border rounded-lg px-3 py-2" required />
                    </div>

                    <div class="flex justify-end gap-2 mt-5">
                        <button type="button" @click="showCreate=false"
                            class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- MODAL EDIT -->
            <div x-show="showEdit" x-transition @click.self="showEdit=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form method="post" :action="`{{ route('presmaboard.admin.score.update', '') }}/${selectedScore.id}`"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
                    <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Nilai PKP</h2>
                    @csrf @method('put')
                    <input type="hidden" name="student_id" x-model="selectedScore.student_id" required>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <input type="text" x-model="selectedScore.student.nama"
                            class="border rounded-lg px-3 py-2 col-span-2" readonly />
                        <input type="text" name="semester" x-model="selectedScore.semester"
                            class="border rounded-lg px-3 py-2" required />
                        <input type="text" name="tahun_ajaran" x-model="selectedScore.tahun_ajaran"
                            class="border rounded-lg px-3 py-2" required />
                        <input type="text" name="tipe_ujian" x-model="selectedScore.tipe_ujian"
                            class="border rounded-lg px-3 py-2" required />
                        <input type="number" name="score" step="0.01" x-model="selectedScore.score"
                            class="border rounded-lg px-3 py-2" required />
                    </div>

                    <div class="flex justify-end gap-2 mt-5">
                        <button type="button" @click="showEdit=false" class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- MODAL DELETE -->
            <div x-show="openDeleteModal" x-transition @click.self="openDeleteModal=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form method="post" :action="`{{ route('presmaboard.admin.score.destroy', '') }}/${selectedScore.id}}`"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
                    @csrf @method('delete')
                    <i class="ri-error-warning-line text-5xl text-red-500 mb-3"></i>
                    <p class="font-semibold mb-1">Yakin ingin menghapus nilai ini?</p>
                    <p class="text-sm text-gray-500 mb-4"
                        x-text="selectedScore.student.nama + ' | Semester ' + selectedScore.semester + ' (' + selectedScore.tahun_ajaran + ')'">
                    </p>
                    <div class="flex justify-center gap-2">
                        <button type="button" @click="openDeleteModal=false"
                            class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Alert --}}
    @if (session('error'))
        <x-presmaboard.alert type="error" title="Terjadi Kesalahan" message="{{ session('error') }}" />
    @endif
    @if (session('success'))
        <x-presmaboard.alert type="success" title="Berhasil" message="{{ session('success') }}" />
    @endif
@endsection
