@extends('presmaboard.partials.layout')
@section('title', 'Project')

@section('content')
@php
    use App\Models\presmaboard_project;

    // Ambil jurusan aktif (contoh: pplg, dkv, tkj, bcf)
    $major = request()->get('major', 'pplg');

    // Ambil kategori berdasarkan jurusan
    $categories = presmaboard_project::getCategoriesByMajor($major);

    // Contoh data siswa
    $students = [
        ['id'=>1, 'name'=>'Ahmad Zidan'],
        ['id'=>2, 'name'=>'Rina Salma'],
        ['id'=>3, 'name'=>'Fadil Rahman'],
        ['id'=>4, 'name'=>'Nur Aisyah'],
    ];

    // Contoh data project (sementara)
    $projects = [
        ['id'=>1,'judul'=>'Smart Fridge IoT','kategori'=>'IoT & Arduino Integration','student'=>'Ahmad Zidan','deskripsi'=>'Kulkas pintar untuk hafalan Qur’an.'],
        ['id'=>2,'judul'=>'EduGame “QSmart”','kategori'=>'Game Development','student'=>'Rina Salma','deskripsi'=>'Game edukatif Islami interaktif.'],
        ['id'=>3,'judul'=>'Website Alumni SMK','kategori'=>'Web & Mobile App','student'=>'Fadil Rahman','deskripsi'=>'Portal data alumni berbasis Laravel.'],
    ];
@endphp

<div
    x-data="{
        showCreate:false,
        showEdit:false,
        showView:false,
        openDeleteModal:false,
        selectedProject:{},
        selectedTitle:'',
        toasts:[],
        addToast(type,message){
            const id=Date.now();
            this.toasts.push({id,type,message});
            setTimeout(()=>this.toasts=this.toasts.filter(t=>t.id!==id),4000);
        }
    }"
    @toast.window="addToast($event.detail.type,$event.detail.message)"
    class="space-y-8 animate-fadeIn relative"
>
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

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <template
            x-for="(card, index) in [
                {icon:'ri-folder-line', color:'orange', title:'Total Project', value:'{{ $total ?? 0 }}'},
                {icon:'ri-star-line', color:'orange', title:'Project Unggulan', value:'{{ $featured ?? 0 }}'},
                {icon:'ri-brush-line', color:'orange', title:'Desain Kreatif', value:'{{ $creative ?? 0 }}'},
                {icon:'ri-code-line', color:'orange', title:'Pemrograman', value:'{{ $coding ?? 0 }}'},
            ]"
            :key="index"
        >
            <div :class="`p-4 sm:p-5 bg-gradient-to-br from-${card.color}-50 to-white rounded-2xl shadow-sm border border-gray-100`">
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
    <div class="bg-white p-4 sm:p-5 rounded-2xl shadow-md border border-gray-100 flex flex-col md:flex-row flex-wrap gap-3 items-center justify-between">
        <div class="flex flex-wrap gap-3 items-center w-full md:w-auto">
            <div class="relative w-full sm:w-auto">
                <select name="kategori" class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-56 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
                <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>

            <div class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
                <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
                <input type="text" class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm" placeholder="Cari judul project / nama siswa" />
            </div>
        </div>

        <button
            @click="showCreate=true"
            class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center"
        >
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
                        <td class="px-4 sm:px-6 py-3 font-medium">{{ $item['judul'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['kategori'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['student'] }}</td>
                        <td class="px-4 sm:px-6 py-3 text-gray-600 truncate max-w-[200px]">{{ $item['deskripsi'] }}</td>
                        <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                            <button @click="selectedProject={{ json_encode($item) }};showView=true" class="text-gray-500 hover:text-gray-700">
                                <i class="ri-eye-line text-base sm:text-lg"></i>
                            </button>
                            <button @click="selectedProject={{ json_encode($item) }};showEdit=true" class="text-orange-500 hover:text-orange-700">
                                <i class="ri-edit-line text-base sm:text-lg"></i>
                            </button>
                            <button @click="openDeleteModal=true; selectedTitle='{{ $item['judul'] }}'" class="text-red-500 hover:text-red-700">
                                <i class="ri-delete-bin-6-line text-base sm:text-lg"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL CREATE -->
    <div
        x-show="showCreate"
        x-transition
        @click.self="showCreate=false"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg space-y-3">
            <h2 class="text-lg font-bold mb-2 text-orange-600">Tambah Project</h2>
            <label class="block text-sm font-medium text-gray-700">Judul Project</label>
            <input type="text" placeholder="Masukkan judul project" class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300">

            <label class="block text-sm font-medium text-gray-700">Kategori</label>
            <select class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>

            <label class="block text-sm font-medium text-gray-700">Pilih Siswa</label>
            <select class="w-full border rounded-lg px-3 py-2 mb-2 focus:ring-2 focus:ring-orange-300">
                <option value="">-- Pilih Siswa --</option>
                @foreach ($students as $student)
                    <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
                @endforeach
            </select>

            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea placeholder="Tuliskan deskripsi project" class="w-full border rounded-lg px-3 py-2 h-24 mb-3 focus:ring-2 focus:ring-orange-300"></textarea>

            <div class="flex justify-end gap-2 mt-3">
                <button @click="showCreate=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="showCreate=false; addToast('success','Project berhasil ditambahkan')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
            </div>
        </div>
    </div>

    <!-- MODAL VIEW -->
    <div
        x-show="showView"
        x-transition
        @click.self="showView=false"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg">
            <h2 class="text-lg font-bold mb-4">Detail Project</h2>
            <p><strong>Judul:</strong> <span x-text="selectedProject.judul"></span></p>
            <p><strong>Kategori:</strong> <span x-text="selectedProject.kategori"></span></p>
            <p><strong>Siswa:</strong> <span x-text="selectedProject.student"></span></p>
            <p class="mt-2"><strong>Deskripsi:</strong></p>
            <p x-text="selectedProject.deskripsi" class="text-gray-600"></p>
            <div class="mt-4 flex justify-end">
                <button @click="showView=false" class="px-4 py-2 bg-orange-500 text-white rounded-lg">Tutup</button>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div
        x-show="showEdit"
        x-transition
        @click.self="showEdit=false"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg space-y-3">
            <h2 class="text-lg font-bold mb-2 text-orange-600">Edit Project</h2>
            <label class="block text-sm font-medium text-gray-700">Judul Project</label>
            <input type="text" x-model="selectedProject.judul" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-300">

            <label class="block text-sm font-medium text-gray-700">Kategori</label>
            <select x-model="selectedProject.kategori" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-300">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>

            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea x-model="selectedProject.deskripsi" class="w-full border rounded-lg px-3 py-2 h-24 focus:ring-2 focus:ring-orange-300"></textarea>

            <div class="flex justify-end gap-2 mt-3">
                <button @click="showEdit=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="showEdit=false; addToast('success','Perubahan disimpan')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
            </div>
        </div>
    </div>

    <!-- MODAL DELETE -->
    <div
        x-show="openDeleteModal"
        x-transition
        @click.self="openDeleteModal=false"
        class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
            <i class="ri-error-warning-line text-5xl text-red-500 mb-3"></i>
            <p class="font-semibold mb-1">Yakin ingin menghapus project ini?</p>
            <p class="text-sm text-gray-500 mb-4" x-text="selectedTitle"></p>
            <div class="flex justify-center gap-2">
                <button @click="openDeleteModal=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="openDeleteModal=false; addToast('success','Project dihapus')" class="px-4 py-2 rounded-lg bg-red-500 text-white">Hapus</button>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div class="fixed top-5 right-5 flex flex-col gap-3 z-[100000] max-w-sm w-full">
        <template x-for="toast in toasts" :key="toast.id">
            <div
                x-transition
                class="flex items-center gap-3 p-4 rounded-xl shadow-lg border backdrop-blur-sm"
                :class="toast.type==='success'
                    ? 'bg-white border-emerald-200 text-emerald-700'
                    : 'bg-white border-rose-200 text-rose-700'"
            >
                <i :class="toast.type==='success' ? 'ri-checkbox-circle-fill text-emerald-500 text-2xl' : 'ri-close-circle-fill text-rose-500 text-2xl'"></i>
                <div class="flex-1">
                    <p class="font-semibold" x-text="toast.type==='success' ? 'Berhasil!' : 'Gagal!'"></p>
                    <p class="text-sm text-gray-600" x-text="toast.message"></p>
                </div>
                <button @click="toasts=toasts.filter(t=>t.id!==toast.id)" class="text-gray-400 hover:text-gray-600">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
        </template>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn { animation: fadeIn 0.25s ease-out; }
</style>
@endsection
