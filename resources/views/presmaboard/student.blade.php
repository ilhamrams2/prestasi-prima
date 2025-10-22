@extends('presmaboard.partials.layout')
@section('title', 'Manajemen Siswa')


@section('content')
    <div x-data="{
        showCreate: false,
        showEdit: false,
        showView: false,
        openDeleteModal: false,
        selectedStudent: {},

        filter: {
            search: '{{ request('search') }}',
            jurusan: '{{ request('jurusan') }}',
            kelas: '{{ request('kelas') }}',
        },

        filterProjects() {
            let url = '?'
            if (this.filter.kelas) {
                url += '&kelas=' + this.filter.kelas
            }
            if (this.filter.jurusan) {
                url += '&jurusan=' + this.filter.jurusan
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
                <a href="#" class="hover:text-orange-600 flex items-center gap-1 transition-colors whitespace-nowrap">
                    <i class="ri-home-4-line text-lg"></i> Dashboard
                </a>
                <span>/</span>
                <span class="text-gray-700 font-semibold flex items-center gap-1 whitespace-nowrap">
                    <i class="ri-user-line text-lg text-orange-500"></i> Manajemen Siswa
                </span>
            </nav>

            <div class="flex items-center gap-3 flex-wrap">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-team-line text-2xl sm:text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-orange-600">Manajemen Siswa</h1>
                    <p class="text-gray-600 text-xs sm:text-sm mt-1">
                        Kelola data siswa seperti biodata, kelas, jurusan, nilai, dan status keaktifan.
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <template
                    x-for="(card, index) in [
                {icon:'ri-team-line', color:'orange', title:'Total Siswa', value:'{{ $statistics['student_count'] ?? 0 }}'},
                {icon:'ri-trophy-line', color:'orange', title:'Siswa Berprestasi', value:'{{ $statistics['student_has_achievement'] ?? 0 }}'},
                {icon:'ri-men-line', color:'orange', title:'Laki-laki', value:'{{ $statistics['male'] ?? 0 }}'},
                {icon:'ri-women-line', color:'orange', title:'Perempuan', value:'{{ $statistics['female'] ?? 0 }}'},
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
                        <select name="jurusan" x-model="filter.jurusan" @change="filterProjects()"
                            class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-40 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                            <option value="">Semua Jurusan</option>
                            <option value="pplg">PPLG</option>
                            <option value="dkv">DKV</option>
                            <option value="tkj">TKJ</option>
                            <option value="bcf">BCF</option>
                        </select>
                        <i
                            class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>

                    <div class="relative w-full sm:w-auto">
                        <select name="kelas" x-model="filter.kelas" @change="filterProjects()"
                            class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-32 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                            <option value="">Semua Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        <i
                            class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>

                    <div
                        class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
                        <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
                        <input type="text" x-model="filter.search" @input.debounce.500ms="filterProjects()"
                            class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm"
                            placeholder="Cari nama siswa / NIS" />
                    </div>
                </div>

                <button @click="showCreate=true"
                    class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center">
                    <i class="ri-add-line text-lg"></i> Tambah Siswa
                </button>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-md overflow-x-auto border border-gray-100">
                <table class="min-w-full text-sm text-gray-700 border-collapse">
                    <thead class="bg-orange-50 text-gray-700 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-4 sm:px-6 py-3 text-left">NIS</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Nama</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Kelas</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Jurusan</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Status</th>
                            <th class="px-4 sm:px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $item)
                            <tr class="border-t even:bg-gray-50">
                                <td class="px-4 sm:px-6 py-3">{{ $item->nis }}</td>
                                <td class="px-4 sm:px-6 py-3 font-medium">{{ $item->nama }}</td>
                                <td class="px-4 sm:px-6 py-3">{{ $item->kelas }}</td>
                                <td class="px-4 sm:px-6 py-3 uppercase">{{ $item->jurusan }}</td>
                                <td class="px-4 sm:px-6 py-3">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full font-medium {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                                    <button @click="selectedStudent={{ json_encode($item) }};showView=true"
                                        class="text-gray-500 hover:text-gray-700">
                                        <i class="ri-eye-line text-base sm:text-lg"></i>
                                    </button>
                                    <button @click="selectedStudent={{ json_encode($item) }};showEdit=true"
                                        class="text-orange-500 hover:text-orange-700">
                                        <i class="ri-edit-line text-base sm:text-lg"></i>
                                    </button>
                                    <button @click="selectedStudent={{ json_encode($item) }};openDeleteModal=true"
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
                <form method="POST" enctype="multipart/form-data" action="{{ route('presmaboard.admin.student.store') }}"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto">
                    @csrf
                    <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Siswa</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <input name="nama" type="text" placeholder="Nama Siswa" class="border rounded-lg px-3 py-2"
                            required />
                        <input name="nis" type="number" placeholder="NIS" class="border rounded-lg px-3 py-2"
                            required />

                        <select name="kelas" class="border rounded-lg px-3 py-2"required>
                            <option value="">Pilih Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>

                        <select name="jurusan" class="border rounded-lg px-3 py-2"required>
                            <option value="">Pilih Jurusan</option>
                            <option value="pplg">PPLG</option>
                            <option value="dkv">DKV</option>
                            <option value="tkj">TKJ</option>
                            <option value="bcf">BCF</option>
                        </select>

                        <input name="angkatan" type="number" placeholder="Angkatan" class="border rounded-lg px-3 py-2"
                            required />
                        <input name="email" type="email" placeholder="Email" class="border rounded-lg px-3 py-2"
                            required />

                        <input name="foto" type="file" class="border rounded-lg px-3 py-2 col-span-2 text-sm" />

                        <select name="is_active" class="border rounded-lg px-3 py-2 col-span-2" required>
                            <option value="">Status Keaktifan</option>
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 mt-5">
                        <button type="button" @click="showCreate=false"
                            class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- MODAL VIEW -->
            <div x-show="showView" x-transition @click.self="showView=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <div class="bg-white rounded-2xl p-6 w-[95%] max-w-5xl shadow-xl overflow-y-auto max-h-[90vh]">
                    <!-- Header -->
                    <div class="flex flex-wrap md:flex-nowrap items-center gap-5 border-b pb-5 mb-6">
                        <div
                            class="flex items-center justify-center w-20 h-20 rounded-full bg-orange-500 text-white text-3xl font-bold shrink-0">
                            <span x-text="selectedStudent.nama.charAt(0)"></span>
                        </div>
                        <div class="space-y-1 text-sm">
                            <h2 class="text-2xl font-bold text-gray-800" x-text="selectedStudent.nama"></h2>
                            <p class="text-gray-600">NIS: <span x-text="selectedStudent.nis"></span></p>
                            <p class="text-gray-600">
                                Kelas: <span x-text="selectedStudent.kelas"></span> · Jurusan:
                                <span x-text="selectedStudent.jurusan"></span>
                            </p>
                            <p class="text-gray-600">Email: <span x-text="selectedStudent.email"></span></p>
                        </div>
                    </div>

                    <!-- Statistik -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 flex flex-col items-center">
                            <i class="ri-trophy-line text-3xl text-orange-500 mb-1"></i>
                            <h3 class="text-lg font-semibold text-gray-700">Total Prestasi</h3>
                            <p class="text-2xl font-bold text-orange-600 mt-1">
                                <span x-text="selectedStudent.achievements.length ?? 0"></span>
                            </p>
                        </div>
                        <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 flex flex-col items-center">
                            <i class="ri-briefcase-line text-3xl text-orange-500 mb-1"></i>
                            <h3 class="text-lg font-semibold text-gray-700">Total Portofolio</h3>
                            <p class="text-2xl font-bold text-orange-600 mt-1">
                                <span x-text="selectedStudent.projects_count ?? 0"></span>
                            </p>
                        </div>
                        <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 flex flex-col items-center">
                            <i class="ri-star-smile-line text-3xl text-orange-500 mb-1"></i>
                            <h3 class="text-lg font-semibold text-gray-700">Nilai PKP</h3>
                            <p class="text-2xl font-bold text-orange-600 mt-1">
                                <span x-text="(Number(selectedStudent.scores_avg_score) || 0).toFixed(2)"></span>
                            </p>
                        </div>
                        <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 flex flex-col items-center">
                            <i class="ri-medal-line text-3xl text-orange-500 mb-1"></i>
                            <h3 class="text-lg font-semibold text-gray-700">Tingkat Prestasi</h3>
                            <p class="text-2xl font-bold text-orange-600 mt-1">A+</p>
                        </div>
                    </div>

                    <!-- Grafik -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="p-4 bg-orange-50 rounded-xl shadow-sm border border-orange-100">
                            <h3 class="font-bold text-gray-800 mb-3">Grafik Nilai Bulanan</h3>
                            <canvas id="chartNilai"></canvas>
                        </div>
                        <div class="p-4 bg-orange-50 rounded-xl shadow-sm border border-orange-100">
                            <h3 class="font-bold text-gray-800 mb-3">Grafik Capaian Prestasi & Portofolio</h3>
                            <canvas id="chartPrestasi"></canvas>
                        </div>
                    </div>

                    <!-- Daftar Prestasi -->
                    <div class="bg-white border border-orange-100 rounded-xl p-5 shadow-sm mb-6">
                        <h3 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="ri-award-line text-orange-500 text-xl"></i>
                            Daftar Prestasi Siswa
                        </h3>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <template x-for="(achievement, index) in selectedStudent.achievements" :key="index">
                                <div class="flex items-center gap-3 bg-orange-50 border border-orange-100 rounded-lg p-3">
                                    <i class="ri-trophy-fill text-orange-500 text-2xl"></i>
                                    <p class="text-gray-700 text-sm font-medium">
                                        <span x-text="achievement.judul"></span>
                                    </p>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Tombol Tutup -->
                    <div class="flex justify-end">
                        <button @click="showView=false"
                            class="px-5 py-2 bg-orange-500 text-white rounded-lg font-semibold shadow hover:bg-orange-600">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>

            <!-- MODAL EDIT -->
            <div x-show="showEdit" x-transition @click.self="showEdit=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form enctype="multipart/form-data" method="POST"
                    :action="`{{ route('presmaboard.admin.student.update', '') }}/${selectedStudent.id}`"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
                    @csrf @method('put')
                    <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Siswa</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <input name="nama" type="text" x-model="selectedStudent.nama" placeholder="Nama Siswa"
                            class="border rounded-lg px-3 py-2" required />
                        <input name="nis" type="number" x-model="selectedStudent.nis" placeholder="NIS"
                            class="border rounded-lg px-3 py-2" required />

                        <select name="kelas" x-model="selectedStudent.kelas" class="border rounded-lg px-3 py-2"
                            required>
                            <option value="">Pilih Kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>

                        <select name="jurusan" x-model="selectedStudent.jurusan" class="border rounded-lg px-3 py-2"
                            required>
                            <option value="">Pilih Jurusan</option>
                            <option value="pplg">PPLG</option>
                            <option value="dkv">DKV</option>
                            <option value="tkj">TKJ</option>
                            <option value="bcf">BCF</option>
                        </select>

                        <input name="angkatan" type="number" x-model="selectedStudent.angkatan" placeholder="Angkatan"
                            class="border rounded-lg px-3 py-2" required />
                        <input name="email" type="email" x-model="selectedStudent.email" placeholder="Email"
                            class="border rounded-lg px-3 py-2" required />

                        <input name="foto" type="file" class="border rounded-lg px-3 py-2 col-span-2 text-sm" />

                        <select name="is_active" x-model="selectedStudent.is_active"
                            class="border rounded-lg px-3 py-2 col-span-2" required>
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
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
                <form :action="`{{ route('presmaboard.admin.student.destroy', '') }}/${selectedStudent.id}`"
                    method="post" class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
                    @csrf @method('delete')
                    <i class="ri-error-warning-line text-5xl text-red-500 mb-3"></i>
                    <p class="font-semibold mb-1">Yakin ingin menghapus siswa ini?</p>
                    <p class="text-sm text-gray-500 mb-4"
                        x-text="selectedStudent.nama + ' (' + selectedStudent.nis + ')'">
                    </p>
                    <div class="flex justify-center gap-2">
                        <button type="button" @click="openDeleteModal=false"
                            class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.effect(() => {
                if (document.getElementById('chartNilai')) {
                    new Chart(document.getElementById('chartNilai'), {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep',
                                'Okt'
                            ],
                            datasets: [{
                                label: 'Nilai Rata-rata',
                                data: [80, 82, 85, 83, 88, 90, 91, 89, 92, 95],
                                backgroundColor: '#fb923c'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                }

                if (document.getElementById('chartPrestasi')) {
                    new Chart(document.getElementById('chartPrestasi'), {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep',
                                'Okt'
                            ],
                            datasets: [{
                                label: 'Prestasi & Portofolio',
                                data: [1, 2, 3, 2, 4, 5, 6, 8, 9, 11],
                                borderColor: '#f97316',
                                backgroundColor: 'rgba(251,146,60,0.2)',
                                fill: true,
                                tension: 0.4
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top'
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>

    {{-- Alert --}}
    @if (session('error'))
        <x-presmaboard.alert type="error" title="Terjadi Kesalahan" message="{{ session('error') }}" />
    @endif
    @if (session('success'))
        <x-presmaboard.alert type="success" title="Berhasil" message="{{ session('success') }}" />
    @endif
@endsection
