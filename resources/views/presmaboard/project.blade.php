@extends('presmaboard.partials.layout')
@section('title', 'Project')

@section('content')

    <div x-data="{
        showCreate: false,
        showEdit: false,
        showView: false,
        openDeleteModal: false,
        selectedProject: {},
        selectedTitle: '',

        filter: {
            category: '{{ request('category') }}',
            search: '{{ request('search') }}',
        },

        filterProjects() {
            let url = '?'
            if (this.filter.category) {
                url += '&category=' + this.filter.category
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
                    <i class="ri-folder-line text-lg text-orange-500"></i> Manajemen Project
                </span>
            </nav>

            <div class="flex items-center gap-3 flex-wrap">
                <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                    <i class="ri-lightbulb-line text-2xl sm:text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-orange-600">Manajemen Project</h1>
                    <p class="text-gray-600 text-xs sm:text-sm mt-1">
                        Kelola project siswa seperti judul, deskripsi, kategori, dan siswa terkait.
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <template
                    x-for="(card, index) in [
                {icon:'ri-folder-line', color:'orange', title:'Total Project', value:'{{ $statistics['project_count'] ?? 0 }}'},
                {icon:'ri-star-line', color:'orange', title:'Siswa Dengan Project Terbanyak', value:'{{ $statistics['most_project_student'] ?? '-' }}'},
                {icon:'ri-brush-line', color:'orange', title:'Jurusan Dengan Project Terbanyak', value:'{{ $statistics['most_category_project'] ?? '-' }}'},
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
                                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mt-1 uppercase" x-text="card.value">
                                </h3>
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
                        <select name="kategori" x-model="filter.category" @change="filterProjects()"
                            class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-56 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                            <option value="0">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->nama }}
                                </option>
                            @endforeach
                        </select>
                        <i
                            class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                    </div>

                    <div
                        class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
                        <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
                        <input type="text" x-model="filter.search" @input.debounce.500ms="filterProjects()"
                            class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm"
                            placeholder="Cari judul project / nama siswa" />
                    </div>
                </div>

                <button @click="showCreate=true"
                    class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center">
                    <i class="ri-add-line text-lg"></i> Tambah Project
                </button>
            </div>


            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-md overflow-x-auto border border-gray-100">
                <table class="min-w-full text-sm text-gray-700 border-collapse">
                    <thead class="bg-orange-50 text-gray-700 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-4 sm:px-6 py-3 text-left">Judul</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Kategori</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Siswa</th>
                            <th class="px-4 sm:px-6 py-3 text-left">Deskripsi</th>
                            <th class="px-4 sm:px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $item)
                            <tr class="border-t even:bg-gray-50">
                                <td class="px-4 sm:px-6 py-3 font-medium">{{ $item->judul }}</td>
                                <td class="px-4 sm:px-6 py-3">{{ $item->category->nama }}</td>
                                <td class="px-4 sm:px-6 py-3">{{ $item->student->nama }}</td>
                                <td class="px-4 sm:px-6 py-3 text-gray-600 truncate max-w-[200px]">{{ $item['deskripsi'] }}
                                </td>
                                <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                                    <button
                                        @click="selectedProject={{ json_encode([
                                            'judul' => $item->judul,
                                            'deskripsi' => $item->deskripsi,
                                            'student' => $item->student->nama,
                                            'kategori' => $item->category->nama,
                                        ]) }};showView=true"
                                        class="text-gray-500 hover:text-gray-700">
                                        <i class="ri-eye-line text-base sm:text-lg"></i>
                                    </button>
                                    <button
                                        @click="selectedProject={{ json_encode([
                                            'id' => $item->id,
                                            'judul' => $item->judul,
                                            'deskripsi' => $item->deskripsi,
                                            'kategori' => $item->category->id,
                                        ]) }};showEdit=true"
                                        class="text-orange-500 hover:text-orange-700">
                                        <i class="ri-edit-line text-base sm:text-lg"></i>
                                    </button>
                                    <button
                                        @click="selectedProject={{ json_encode([
                                            'id' => $item->id,
                                            'judul' => $item->judul,
                                        ]) }};openDeleteModal=true"
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
                <form enctype="multipart/form-data" action="{{ route('presmaboard.admin.project.store') }}" method="POST"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg space-y-3">
                    @csrf
                    <h2 class="text-lg font-bold mb-2 text-orange-600">Tambah Project</h2>
                    <label class="block text-sm font-medium text-gray-700">Judul Project</label>
                    <input name="judul" type="text" placeholder="Masukkan judul project"
                        class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300">

                    <label class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category_id"
                        class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300">
                        <option value="" disabled>-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium text-gray-700">Pilih Siswa</label>
                    <select name="student_id"
                        class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300">
                        <option value="" disabled>-- Pilih Siswa --</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->nama }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Tuliskan deskripsi project"
                        class="w-full border rounded-lg px-3 py-2 h-24 mb-3 focus:ring-2 focus:ring-orange-300"></textarea>

                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input name="foto" type="file" accept="image/*"
                        class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300" required>

                    <div class="flex justify-end gap-2 mt-3">
                        <button type="button" @click="showCreate=false" class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- MODAL VIEW -->
            <div x-show="showView" x-transition @click.self="showView=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg">
                    <h2 class="text-lg font-bold mb-4">Detail Project</h2>
                    <p><strong>Judul:</strong> <span x-text="selectedProject.judul"></span></p>
                    <p><strong>Kategori:</strong> <span x-text="selectedProject.kategori"></span></p>
                    <p><strong>Siswa:</strong> <span x-text="selectedProject.student"></span></p>
                    <p class="mt-2"><strong>Deskripsi:</strong></p>
                    <p x-text="selectedProject.deskripsi" class="text-gray-600"></p>
                    <div class="mt-4 flex justify-end">
                        <button @click="showView=false"
                            class="px-4 py-2 bg-orange-500 text-white rounded-lg">Tutup</button>
                    </div>
                </div>
            </div>

            <!-- MODAL EDIT -->
            <div x-show="showEdit" x-transition @click.self="showEdit=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form enctype="multipart/form-data"
                    :action="`{{ route('presmaboard.admin.project.update', '') }}/${selectedProject.id}`" method="POST"
                    class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg space-y-3">
                    @csrf
                    @method('put')
                    <h2 class="text-lg font-bold mb-2 text-orange-600">Edit Project</h2>
                    <label class="block text-sm font-medium text-gray-700">Judul Project</label>
                    <input name="judul" type="text" x-model="selectedProject.judul"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-300">

                    <label class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="category_id" x-model="selectedProject.kategori"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-300">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endforeach
                    </select>

                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" x-model="selectedProject.deskripsi"
                        class="w-full border rounded-lg px-3 py-2 h-24 focus:ring-2 focus:ring-orange-300"></textarea>

                    <label class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input name="foto" type="file" accept="image/*"
                        class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300" required>

                    <div class="flex justify-end gap-2 mt-3">
                        <button type="button" @click="showEdit=false" class="px-4 py-2 rounded-lg border">Batal</button>
                        <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- MODAL DELETE -->
            <div x-show="openDeleteModal" x-transition @click.self="openDeleteModal=false"
                class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
                <form :action="`{{ route('presmaboard.admin.project.destroy', '') }}/${selectedProject.id}`"
                    method="POST" class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
                    @csrf @method('delete')
                    <i class="ri-error-warning-line text-5xl text-red-500 mb-3"></i>
                    <p class="font-semibold mb-1">Yakin ingin menghapus project ini?</p>
                    <p class="text-sm text-gray-500 mb-4" x-text="selectedTitle"></p>
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
