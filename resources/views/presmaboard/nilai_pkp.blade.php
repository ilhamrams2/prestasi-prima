@extends('presmaboard.partials.layout')

@section('title', 'Nilai PKP Siswa')

@section('content')
<div
    x-data="{
        showCreate:false,
        showEdit:false,
        openDeleteModal:false,
        selectedNilai:{},
        selectedStudent:'',
        selectedSemester:'',
        selectedTahun:'',
        selectedTipe:'',
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

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <template
            x-for="(card, index) in [
                {icon:'ri-trophy-line', color:'orange', title:'Total Data Nilai', value:'{{ $total ?? 0 }}'},
                {icon:'ri-graduation-cap-line', color:'orange', title:'Rata-rata Nilai PKP', value:'{{ number_format($avg ?? 0, 2) }}'},
                {icon:'ri-bar-chart-box-line', color:'orange', title:'UTS Tersimpan', value:'{{ $utsCount ?? 0 }}'},
                {icon:'ri-bar-chart-2-line', color:'orange', title:'UAS Tersimpan', value:'{{ $uasCount ?? 0 }}'},
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
                <select class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-40 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                    <option>Semua Semester</option>
                    <option>1</option>
                    <option>2</option>
                </select>
                <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>

            <div class="relative w-full sm:w-auto">
                <select class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-40 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                    <option>Semua Tahun</option>
                    <option>2024/2025</option>
                    <option>2025/2026</option>
                </select>
                <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>

            <div class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
                <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
                <input type="text" class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm" placeholder="Cari nama siswa" />
            </div>
        </div>

        <button
            @click="showCreate=true"
            class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center"
        >
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
                @php
                    $nilai = [
                        ['id'=>1,'student'=>'Aulia Pratama','semester'=>'1','tahun_ajaran'=>'2024/2025','tipe_ujian'=>'UTS','nilai_pkp'=>92.5],
                        ['id'=>2,'student'=>'Rizky Maulana','semester'=>'1','tahun_ajaran'=>'2024/2025','tipe_ujian'=>'UAS','nilai_pkp'=>88.75],
                        ['id'=>3,'student'=>'Siti Nurhaliza','semester'=>'2','tahun_ajaran'=>'2024/2025','tipe_ujian'=>'UTS','nilai_pkp'=>90.00],
                    ];
                @endphp

                @foreach ($nilai as $item)
                    <tr class="border-t even:bg-gray-50">
                        <td class="px-4 sm:px-6 py-3 font-medium">{{ $item['student'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['semester'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['tahun_ajaran'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['tipe_ujian'] }}</td>
                        <td class="px-4 sm:px-6 py-3 font-semibold text-orange-600">{{ number_format($item['nilai_pkp'],2) }}</td>
                        <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                            <button @click="selectedNilai={{ json_encode($item) }};showEdit=true" class="text-orange-500 hover:text-orange-700">
                                <i class="ri-edit-line text-base sm:text-lg"></i>
                            </button>
                            <button @click="openDeleteModal=true; selectedStudent='{{ $item['student'] }}'; selectedSemester='{{ $item['semester'] }}'; selectedTipe='{{ $item['tipe_ujian'] }}'" class="text-red-500 hover:text-red-700">
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
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
            <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Nilai PKP</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <select class="border rounded-lg px-3 py-2 col-span-2">
                    <option value="">Pilih Siswa</option>
                    <option value="1">Aulia Pratama</option>
                    <option value="2">Rizky Maulana</option>
                    <option value="3">Siti Nurhaliza</option>
                </select>

                <select class="border rounded-lg px-3 py-2">
                    <option value="">Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>

                <input type="text" placeholder="Tahun Ajaran (contoh: 2024/2025)" class="border rounded-lg px-3 py-2" />

                <select class="border rounded-lg px-3 py-2">
                    <option value="">Tipe Ujian</option>
                    <option value="UTS">UTS</option>
                    <option value="UAS">UAS</option>
                </select>

                <input type="number" step="0.01" placeholder="Nilai PKP" class="border rounded-lg px-3 py-2" />
            </div>

            <div class="flex justify-end gap-2 mt-5">
                <button @click="showCreate=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="showCreate=false; addToast('success','Nilai PKP berhasil ditambahkan')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
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
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
            <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Nilai PKP</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <input type="text" x-model="selectedNilai.student" class="border rounded-lg px-3 py-2 col-span-2" readonly />
                <input type="text" x-model="selectedNilai.semester" class="border rounded-lg px-3 py-2" />
                <input type="text" x-model="selectedNilai.tahun_ajaran" class="border rounded-lg px-3 py-2" />
                <input type="text" x-model="selectedNilai.tipe_ujian" class="border rounded-lg px-3 py-2" />
                <input type="number" step="0.01" x-model="selectedNilai.nilai_pkp" class="border rounded-lg px-3 py-2" />
            </div>

            <div class="flex justify-end gap-2 mt-5">
                <button @click="showEdit=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="showEdit=false; addToast('success','Nilai PKP berhasil diperbarui')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
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
            <p class="font-semibold mb-1">Yakin ingin menghapus nilai ini?</p>
            <p class="text-sm text-gray-500 mb-4" x-text="selectedStudent + ' | Semester ' + selectedSemester + ' (' + selectedTipe + ')'"></p>
            <div class="flex justify-center gap-2">
                <button @click="openDeleteModal=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="openDeleteModal=false; addToast('success','Data nilai berhasil dihapus')" class="px-4 py-2 rounded-lg bg-red-500 text-white">Hapus</button>
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
                    : 'bg-white border-rose-200 text-rose-700'">
                <i :class="toast.type==='success'
                    ? 'ri-checkbox-circle-fill text-emerald-500 text-2xl'
                    : 'ri-close-circle-fill text-rose-500 text-2xl'"></i>
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

<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn { animation: fadeIn 0.25s ease-out; }
</style>
@endsection
