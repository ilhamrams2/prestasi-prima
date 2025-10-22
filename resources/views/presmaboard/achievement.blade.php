@extends('presmaboard.partials.layout')

@section('title', 'Manajemen Prestasi Siswa')

@section('content')
    <div x-data="{
        showCreate: false,
        showEdit: false,
        showView: false,
        openDeleteModal: false,
        selectedAchievement: {},

        filter: {
            search: '{{ request('search') }}',
        },

        filterProjects() {
            let url = '?'
            if (this.filter.search) {
                url += '&search=' + this.filter.search
            }
            window.location = url
        },
    }" class="space-y-8 animate-fadeIn relative">
        <!-- Header -->
        <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-3 sm:px-4 py-3 shadow-sm mb-6">
            <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2 overflow-x-auto">
                <a href="#" class="hover:text-orange-600 flex items-center gap-1 transition-colors whitespace-nowrap">
                    <i class="ri-home-4-line text-lg"></i> Dashboard
                </a>
                <span>/</span>
                <span class="text-gray-700 font-semibold flex items-center gap-1 whitespace-nowrap">
                    <i class="ri-trophy-line text-lg text-orange-500"></i> Manajemen Prestasi
                </span>
            </nav>

            <div class="flex items-center gap-3 flex-wrap">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-trophy-line text-2xl sm:text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-orange-600">Manajemen Prestasi Siswa</h1>
                    <p class="text-gray-600 text-xs sm:text-sm mt-1">
                        Kelola data prestasi yang diraih siswa seperti lomba, penghargaan, atau kejuaraan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
            <template
                x-for="(card, index) in [
                {icon:'ri-trophy-line', color:'orange', title:'Total Prestasi', value:'{{ $statistics['total_achievements'] ?? 0 }}'},
                {icon:'ri-user-star-line', color:'orange', title:'Siswa Dengan Prestasi Paling Banyak', value:'{{ $statistics['most_achievement_student'] ?? 0 }}'},
                {icon:'ri-medal-line', color:'orange', title:'Jurusan Dengan Prestasi Terbanyak', value:'{{ $prestasiNasional ?? 0 }}'},
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
            <div
                class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
                <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
                <input type="text" name="search" x-model="filter.search" @input.debounce.500ms="filterProjects()"
                    class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm"
                    placeholder="Cari judul prestasi / nama siswa" />
            </div>

            <button @click="showCreate=true"
                class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center">
                <i class="ri-add-line text-lg"></i> Tambah Prestasi
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-md overflow-x-auto border border-gray-100">
            <table class="min-w-full text-sm text-gray-700 border-collapse">
                <thead class="bg-orange-50 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 sm:px-6 py-3 text-left">Nama Siswa</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Judul Prestasi</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Deskripsi</th>
                        <th class="px-4 sm:px-6 py-3 text-left">Tanggal</th>
                        <th class="px-4 sm:px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($achievements as $item)
                        <tr class="border-t even:bg-gray-50">
                            <td class="px-4 sm:px-6 py-3 font-medium">{{ $item->student->nama }}</td>
                            <td class="px-4 sm:px-6 py-3">{{ $item->judul }}</td>
                            <td class="px-4 sm:px-6 py-3">{{ $item->deskripsi }}</td>
                            <td class="px-4 sm:px-6 py-3">{{ $item->tanggal }}</td>
                            <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                                <button @click="selectedAchievement={{ json_encode($item) }};showView=true"
                                    class="text-gray-500 hover:text-gray-700">
                                    <i class="ri-eye-line text-base sm:text-lg"></i>
                                </button>
                                <button @click="selectedAchievement={{ json_encode($item) }};showEdit=true"
                                    class="text-orange-500 hover:text-orange-700">
                                    <i class="ri-edit-line text-base sm:text-lg"></i>
                                </button>
                                <button @click="openDeleteModal=true; selectedAchievement={{ json_encode($item) }}"
                                    class="text-red-500 hover:text-red-700">
                                    <i class="ri-delete-bin-6-line text-base sm:text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div x-cloak>
            <!-- MODAL CREATE -->
            <div x-show="showCreate" x-transition @click.self="showCreate=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form method="POST" action="{{ route('presmaboard.admin.achievement.store') }}"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
                    @csrf
                    <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Prestasi</h2>
                    <div class="grid grid-cols-1 gap-3">
                        <select name="student_id" class="border rounded-lg px-3 py-2" required>
                            <option value="">Pilih Siswa</option>
                            @foreach ($students as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        <input name="judul" type="text" placeholder="Judul Prestasi"
                            class="border rounded-lg px-3 py-2" required />
                        <textarea name="deskripsi" placeholder="Deskripsi" class="border rounded-lg px-3 py-2" required></textarea>
                        <input name="tanggal" type="date" class="border rounded-lg px-3 py-2" required />
                    </div>

                    <div class="flex justify-end gap-2 mt-5">
                        <button type="button" @click="showCreate=false" class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- MODAL VIEW -->
            <div x-show="showView" x-transition.opacity.scale.80 @click.self="showView=false"
                class="fixed inset-0 bg-black/40 backdrop-opacity-sm flex items-center justify-center z-50">
                <div
                    class="bg-white rounded-2xl shadow-2xl border border-orange-100 w-[90%] max-w-md p-6 relative overflow-hidden animate-fadeIn">
                    <!-- Header -->
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-12 h-12 bg-orange-500 text-white rounded-full flex items-center justify-center shadow-md">
                            <i class="ri-trophy-fill text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-lg sm:text-xl font-bold text-gray-800 leading-tight"
                                x-text="selectedAchievement.judul || 'Prestasi Siswa'"></h2>
                            <p class="text-sm text-gray-500 mt-0.5">Detail prestasi siswa</p>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="space-y-2 text-sm text-gray-600 mb-5">
                        <p><span class="font-semibold text-gray-800">Oleh:</span> <span
                                x-text="selectedAchievement.student.nama"></span>
                        </p>
                        <p><span class="font-semibold text-gray-800">Tanggal:</span> <span
                                x-text="selectedAchievement.tanggal"></span></p>
                    </div>

                    <!-- Deskripsi -->
                    <p class="text-gray-700 text-sm mb-6 leading-relaxed" x-text="selectedAchievement.deskripsi"></p>

                    <!-- Tombol Tutup -->
                    <button @click="showView=false"
                        class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-2.5 rounded-xl hover:from-orange-600 hover:to-orange-700 hover:scale-[1.02] active:scale-95 transition-all duration-200 shadow-md">
                        <i class="ri-close-line text-lg"></i> Tutup
                    </button>
                </div>
            </div>

            <!-- MODAL EDIT -->
            <div x-show="showEdit" x-transition @click.self="showEdit=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form method="POST"
                    :action="`{{ route('presmaboard.admin.achievement.update', '') }}/${selectedAchievement.id}`"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
                    @csrf @method('put')
                    <input type="hidden" name="student_id" x-model="selectedAchievement.student_id">
                    <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Prestasi</h2>

                    <div class="grid grid-cols-1 gap-3">
                        <input type="text" x-model="selectedAchievement.student.nama" disabled
                            class="border rounded-lg px-3 py-2 bg-gray-100" />
                        <input name="judul" type="text" x-model="selectedAchievement.judul"
                            class="border rounded-lg px-3 py-2" required />
                        <textarea name="deskripsi" x-model="selectedAchievement.deskripsi" class="border rounded-lg px-3 py-2" required></textarea>
                        <input name="tanggal" type="date" x-model="selectedAchievement.tanggal"
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
                <form method="POST"
                    :action="`{{ route('presmaboard.admin.achievement.destroy', '') }}/${selectedAchievement.id}`"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
                    @csrf @method('delete')
                    <i class="ri-error-warning-line text-5xl text-red-500 mb-3"></i>
                    <p class="font-semibold mb-1">Yakin ingin menghapus prestasi ini?</p>
                    <p class="text-sm text-gray-500 mb-4" x-text="selectedAchievement.judul"></p>
                    <div class="flex justify-center gap-2">
                        <button type="button" @click="openDeleteModal=false"
                            class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 text-white">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('error'))
        <x-presmaboard.alert type="error" title="Terjadi Kesalahan" message="{{ session('error') }}" />
    @endif
    @if (session('success'))
        <x-presmaboard.alert type="success" title="Berhasil" message="{{ session('success') }}" />
    @endif

@endsection
