@extends('presmaboard.partials.layout')

@section('title', 'Manajemen Prestasi Siswa')

@section('content')
<div
    x-data="{
        showCreate:false,
        showEdit:false,
        showView:false,
        openDeleteModal:false,
        selectedPrestasi:{},
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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <template
            x-for="(card, index) in [
                {icon:'ri-trophy-line', color:'orange', title:'Total Prestasi', value:'{{ $totalPrestasi ?? 0 }}'},
                {icon:'ri-user-star-line', color:'orange', title:'Siswa Berprestasi', value:'{{ $siswaBerprestasi ?? 0 }}'},
                {icon:'ri-medal-line', color:'orange', title:'Prestasi Nasional', value:'{{ $prestasiNasional ?? 0 }}'},
                {icon:'ri-award-line', color:'orange', title:'Prestasi Internasional', value:'{{ $prestasiInternasional ?? 0 }}'},
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
        <div class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
            <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
            <input type="text" class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm" placeholder="Cari judul prestasi / nama siswa" />
        </div>

        <button
            @click="showCreate=true"
            class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center"
        >
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
                @php
                    $prestasis = [
                        ['id'=>1,'nama'=>'Aulia Pratama','judul_prestasi'=>'Juara 1 Web Design Nasional','deskripsi'=>'Lomba tingkat nasional bidang web design','tanggal'=>'2025-06-10'],
                        ['id'=>2,'nama'=>'Rizky Maulana','judul_prestasi'=>'Finalis Olimpiade Informatika','deskripsi'=>'Peserta final OI tingkat provinsi','tanggal'=>'2025-05-20'],
                    ];
                @endphp

                @foreach ($prestasis as $item)
                    <tr class="border-t even:bg-gray-50">
                        <td class="px-4 sm:px-6 py-3 font-medium">{{ $item['nama'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['judul_prestasi'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['deskripsi'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['tanggal'] }}</td>
                        <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                            <button @click="selectedPrestasi={{ json_encode($item) }};showView=true" class="text-gray-500 hover:text-gray-700">
                                <i class="ri-eye-line text-base sm:text-lg"></i>
                            </button>
                            <button @click="selectedPrestasi={{ json_encode($item) }};showEdit=true" class="text-orange-500 hover:text-orange-700">
                                <i class="ri-edit-line text-base sm:text-lg"></i>
                            </button>
                            <button @click="openDeleteModal=true; selectedTitle='{{ $item['judul_prestasi'] }}'" class="text-red-500 hover:text-red-700">
                                <i class="ri-delete-bin-6-line text-base sm:text-lg"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MODAL CREATE -->
    <div x-show="showCreate" x-transition @click.self="showCreate=false" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
            <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Prestasi</h2>

            <div class="grid grid-cols-1 gap-3">
                <select class="border rounded-lg px-3 py-2">
                    <option value="">Pilih Siswa</option>
                    <option value="1">Aulia Pratama</option>
                    <option value="2">Rizky Maulana</option>
                </select>

                <input type="text" placeholder="Judul Prestasi" class="border rounded-lg px-3 py-2" />
                <textarea placeholder="Deskripsi" class="border rounded-lg px-3 py-2"></textarea>
                <input type="date" class="border rounded-lg px-3 py-2" />
            </div>

            <div class="flex justify-end gap-2 mt-5">
                <button @click="showCreate=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="showCreate=false; addToast('success','Prestasi berhasil ditambahkan')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
            </div>
        </div>
    </div>

    <!-- MODAL VIEW -->
   <!-- MODAL VIEW -->
<div
    x-show="showView"
    x-transition.opacity.scale.80
    @click.self="showView=false"
    class="fixed inset-0 bg-black/40 backdrop-opacity-sm flex items-center justify-center z-50"
>
    <div
        class="bg-white rounded-2xl shadow-2xl border border-orange-100 w-[90%] max-w-md p-6 relative overflow-hidden animate-fadeIn"
    >
        <!-- Header -->
        <div class="flex items-center gap-3 mb-4">
<div class="w-12 h-12 bg-orange-500 text-white rounded-full flex items-center justify-center shadow-md">
                <i class="ri-trophy-fill text-2xl"></i>
            </div>
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-gray-800 leading-tight" x-text="selectedPrestasi.judul_prestasi || 'Prestasi Siswa'"></h2>
                <p class="text-sm text-gray-500 mt-0.5">Detail prestasi siswa</p>
            </div>
        </div>

        <!-- Info -->
        <div class="space-y-2 text-sm text-gray-600 mb-5">
            <p><span class="font-semibold text-gray-800">Oleh:</span> <span x-text="selectedPrestasi.nama"></span></p>
            <p><span class="font-semibold text-gray-800">Tanggal:</span> <span x-text="selectedPrestasi.tanggal"></span></p>
        </div>

        <!-- Deskripsi -->
        <p class="text-gray-700 text-sm mb-6 leading-relaxed" x-text="selectedPrestasi.deskripsi"></p>

        <!-- Tombol Tutup -->
        <button
            @click="showView=false"
            class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-2.5 rounded-xl hover:from-orange-600 hover:to-orange-700 hover:scale-[1.02] active:scale-95 transition-all duration-200 shadow-md"
        >
            <i class="ri-close-line text-lg"></i> Tutup
        </button>
    </div>
</div>


    <!-- MODAL EDIT -->
    <div x-show="showEdit" x-transition @click.self="showEdit=false" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
            <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Prestasi</h2>

            <div class="grid grid-cols-1 gap-3">
                <input type="text" x-model="selectedPrestasi.nama" disabled class="border rounded-lg px-3 py-2 bg-gray-100" />
                <input type="text" x-model="selectedPrestasi.judul_prestasi" class="border rounded-lg px-3 py-2" />
                <textarea x-model="selectedPrestasi.deskripsi" class="border rounded-lg px-3 py-2"></textarea>
                <input type="date" x-model="selectedPrestasi.tanggal" class="border rounded-lg px-3 py-2" />
            </div>

            <div class="flex justify-end gap-2 mt-5">
                <button @click="showEdit=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="showEdit=false; addToast('success','Prestasi berhasil diperbarui')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
            </div>
        </div>
    </div>

    <!-- MODAL DELETE -->
    <div x-show="openDeleteModal" x-transition @click.self="openDeleteModal=false" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
            <i class="ri-error-warning-line text-5xl text-red-500 mb-3"></i>
            <p class="font-semibold mb-1">Yakin ingin menghapus prestasi ini?</p>
            <p class="text-sm text-gray-500 mb-4" x-text="selectedTitle"></p>
            <div class="flex justify-center gap-2">
                <button @click="openDeleteModal=false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button @click="openDeleteModal=false; addToast('success','Prestasi berhasil dihapus')" class="px-4 py-2 rounded-lg bg-red-500 text-white">Hapus</button>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div class="fixed top-5 right-5 flex flex-col gap-3 z-[100000] max-w-sm w-full">
        <template x-for="toast in toasts" :key="toast.id">
            <div x-transition class="flex items-center gap-3 p-4 rounded-xl shadow-lg border backdrop-blur-sm"
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

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
  animation: fadeIn 0.6s ease-out;
}
</style>
@endsection
