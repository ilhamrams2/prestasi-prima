@extends('presmaboard.partials.layout')
@section('title', 'Manajemen Siswa')

@section('content')
<div
    x-data="{
        showCreate:false,
        showEdit:false,
        showView:false,
        openDeleteModal:false,
        selectedSiswa:{},
        selectedName:'',
        selectedNIS:'',
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

    <!-- Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <template
            x-for="(card, index) in [
                {icon:'ri-team-line', color:'orange', title:'Total Siswa', value:'{{ $total ?? 0 }}'},
                {icon:'ri-trophy-line', color:'orange', title:'Siswa Berprestasi', value:'{{ $kelasCount ?? 0 }}'},
                {icon:'ri-men-line', color:'orange', title:'Laki-laki', value:'{{ $male ?? 0 }}'},
                {icon:'ri-women-line', color:'orange', title:'Perempuan', value:'{{ $female ?? 0 }}'},
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
                    <option>Semua Jurusan</option>
                    <option>PPLG</option>
                    <option>TKJ</option>
                    <option>RPL</option>
                </select>
                <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>

            <div class="relative w-full sm:w-auto">
                <select class="appearance-none border border-gray-200 rounded-lg px-3 py-2 pr-8 w-full sm:w-32 focus:ring-2 focus:ring-orange-300 focus:outline-none text-gray-700 text-sm">
                    <option>Semua Kelas</option>
                    <option>X</option>
                    <option>XI</option>
                    <option>XII</option>
                </select>
                <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>

            <div class="flex items-center bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 w-full sm:w-64 focus-within:ring-2 focus-within:ring-orange-300 transition-all duration-300">
                <i class="ri-search-line text-gray-400 text-lg mr-2"></i>
                <input type="text" class="w-full border-none focus:outline-none placeholder-gray-400 text-gray-700 bg-transparent text-sm" placeholder="Cari nama siswa / NIS" />
            </div>
        </div>

        <button
            @click="showCreate=true"
            class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200 w-full md:w-auto justify-center"
        >
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
                @php
                    $siswas = [
                        ['id'=>1,'nis'=>'23001','nama'=>'Aulia Pratama','kelas'=>'XII','jurusan'=>'PPLG','is_active'=>true],
                        ['id'=>2,'nis'=>'23002','nama'=>'Rizky Maulana','kelas'=>'XI','jurusan'=>'TKJ','is_active'=>false],
                        ['id'=>3,'nis'=>'23003','nama'=>'Siti Nurhaliza','kelas'=>'X','jurusan'=>'RPL','is_active'=>true],
                    ];
                @endphp

                @foreach ($siswas as $item)
                    <tr class="border-t even:bg-gray-50">
                        <td class="px-4 sm:px-6 py-3">{{ $item['nis'] }}</td>
                        <td class="px-4 sm:px-6 py-3 font-medium">{{ $item['nama'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['kelas'] }}</td>
                        <td class="px-4 sm:px-6 py-3">{{ $item['jurusan'] }}</td>
                        <td class="px-4 sm:px-6 py-3">
                            <span class="px-2 py-1 text-xs rounded-full font-medium {{ $item['is_active'] ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $item['is_active'] ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="px-4 sm:px-6 py-3 text-center flex gap-2 sm:gap-3 justify-center">
                            <button @click="selectedSiswa={{ json_encode($item) }};showView=true" class="text-gray-500 hover:text-gray-700">
                                <i class="ri-eye-line text-base sm:text-lg"></i>
                            </button>
                            <button @click="selectedSiswa={{ json_encode($item) }};showEdit=true" class="text-orange-500 hover:text-orange-700">
                                <i class="ri-edit-line text-base sm:text-lg"></i>
                            </button>
                            <button @click="openDeleteModal=true; selectedName='{{ $item['nama'] }}'; selectedNIS='{{ $item['nis'] }}'" class="text-red-500 hover:text-red-700">
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
        <h2 class="text-lg font-bold mb-4 text-gray-800">Tambah Siswa</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <input type="text" placeholder="Nama Siswa" class="border rounded-lg px-3 py-2" />
            <input type="text" placeholder="NIS" class="border rounded-lg px-3 py-2" />

            <select class="border rounded-lg px-3 py-2">
                <option value="">Pilih Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>

            <select class="border rounded-lg px-3 py-2">
                <option value="">Pilih Jurusan</option>
                <option value="PPLG">PPLG</option>
                <option value="TKJ">TKJ</option>
                <option value="RPL">RPL</option>
            </select>

            <input type="number" placeholder="Angkatan" class="border rounded-lg px-3 py-2" />
            <input type="email" placeholder="Email" class="border rounded-lg px-3 py-2" />

            <input type="file" class="border rounded-lg px-3 py-2 col-span-2 text-sm" />

            <select class="border rounded-lg px-3 py-2 col-span-2">
                <option value="">Status Keaktifan</option>
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
        </div>

        <div class="flex justify-end gap-2 mt-5">
            <button @click="showCreate=false" class="px-4 py-2 rounded-lg border">Batal</button>
            <button @click="showCreate=false; addToast('success','Siswa berhasil ditambahkan')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
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
    <div class="bg-white rounded-2xl p-6 w-[95%] max-w-5xl shadow-xl overflow-y-auto max-h-[90vh]">
        <!-- Header -->
        <div class="flex flex-wrap md:flex-nowrap items-center gap-5 border-b pb-5 mb-6">
            <div class="flex items-center justify-center w-20 h-20 rounded-full bg-orange-500 text-white text-3xl font-bold shrink-0">
                <span x-text="selectedSiswa.nama.charAt(0)"></span>
            </div>
            <div class="space-y-1 text-sm">
                <h2 class="text-2xl font-bold text-gray-800" x-text="selectedSiswa.nama"></h2>
                <p class="text-gray-600">NIS: <span x-text="selectedSiswa.nis"></span></p>
                <p class="text-gray-600">
                    Kelas: <span x-text="selectedSiswa.kelas"></span> · Jurusan:
                    <span x-text="selectedSiswa.jurusan"></span>
                </p>
                <p class="text-gray-600">Email: ahmad.fadhil@smk.sch.id · No HP: 082345678910</p>
                <p class="text-gray-600">Alamat: Jl. Merdeka No. 125, Jakarta</p>
            </div>
        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 flex flex-col items-center">
                <i class="ri-trophy-line text-3xl text-orange-500 mb-1"></i>
                <h3 class="text-lg font-semibold text-gray-700">Total Prestasi</h3>
                <p class="text-2xl font-bold text-orange-600 mt-1">8</p>
            </div>
            <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 flex flex-col items-center">
                <i class="ri-briefcase-line text-3xl text-orange-500 mb-1"></i>
                <h3 class="text-lg font-semibold text-gray-700">Total Portofolio</h3>
                <p class="text-2xl font-bold text-orange-600 mt-1">5</p>
            </div>
            <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 flex flex-col items-center">
                <i class="ri-star-smile-line text-3xl text-orange-500 mb-1"></i>
                <h3 class="text-lg font-semibold text-gray-700">Nilai PKP</h3>
                <p class="text-2xl font-bold text-orange-600 mt-1">91.2</p>
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
                <div class="flex items-center gap-3 bg-orange-50 border border-orange-100 rounded-lg p-3">
                    <i class="ri-trophy-fill text-orange-500 text-2xl"></i>
                    <p class="text-gray-700 text-sm font-medium">Juara 1 Lomba Web Design Nasional 2025</p>
                </div>
                <div class="flex items-center gap-3 bg-orange-50 border border-orange-100 rounded-lg p-3">
                    <i class="ri-trophy-fill text-orange-500 text-2xl"></i>
                    <p class="text-gray-700 text-sm font-medium">Juara 2 Lomba UI/UX Tingkat Provinsi</p>
                </div>
                <div class="flex items-center gap-3 bg-orange-50 border border-orange-100 rounded-lg p-3">
                    <i class="ri-trophy-fill text-orange-500 text-2xl"></i>
                    <p class="text-gray-700 text-sm font-medium">Top 10 Hackathon SMK se-Indonesia</p>
                </div>
                <div class="flex items-center gap-3 bg-orange-50 border border-orange-100 rounded-lg p-3">
                    <i class="ri-trophy-fill text-orange-500 text-2xl"></i>
                    <p class="text-gray-700 text-sm font-medium">Finalis Olimpiade Informatika</p>
                </div>
            </div>
        </div>

        <!-- Tombol Tutup -->
        <div class="flex justify-end">
            <button
                @click="showView=false"
                class="px-5 py-2 bg-orange-500 text-white rounded-lg font-semibold shadow hover:bg-orange-600">
                Tutup
            </button>
        </div>
    </div>
</div>


<div
    x-show="showEdit"
    x-transition
    @click.self="showEdit=false"
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
>
    <div class="bg-white rounded-xl p-6 w-[90%] max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Siswa</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <input type="text" x-model="selectedSiswa.nama" placeholder="Nama Siswa" class="border rounded-lg px-3 py-2" />
            <input type="text" x-model="selectedSiswa.nis" placeholder="NIS" class="border rounded-lg px-3 py-2" />

            <select x-model="selectedSiswa.kelas" class="border rounded-lg px-3 py-2">
                <option value="">Pilih Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>

            <select x-model="selectedSiswa.jurusan" class="border rounded-lg px-3 py-2">
                <option value="">Pilih Jurusan</option>
                <option value="PPLG">PPLG</option>
                <option value="TKJ">TKJ</option>
                <option value="RPL">RPL</option>
            </select>

            <input type="number" x-model="selectedSiswa.angkatan" placeholder="Angkatan" class="border rounded-lg px-3 py-2" />
            <input type="email" x-model="selectedSiswa.email" placeholder="Email" class="border rounded-lg px-3 py-2" />

            <input type="file" class="border rounded-lg px-3 py-2 col-span-2 text-sm" />

            <select x-model="selectedSiswa.is_active" class="border rounded-lg px-3 py-2 col-span-2">
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>
        </div>

        <div class="flex justify-end gap-2 mt-5">
            <button @click="showEdit=false" class="px-4 py-2 rounded-lg border">Batal</button>
            <button @click="showEdit=false; addToast('success','Data siswa berhasil diperbarui')" class="px-4 py-2 rounded-lg bg-orange-500 text-white">Simpan</button>
        </div>
    </div>
</div>

<!-- ✅ MODAL DELETE (dipindah keluar modal lain) -->
<div
    x-show="openDeleteModal"
    x-transition
    @click.self="openDeleteModal=false"
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50"
>
    <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
        <i class="ri-error-warning-line text-5xl text-red-500 mb-3"></i>
        <p class="font-semibold mb-1">Yakin ingin menghapus siswa ini?</p>
        <p class="text-sm text-gray-500 mb-4" x-text="selectedName + ' (' + selectedNIS + ')'"></p>
        <div class="flex justify-center gap-2">
            <button @click="openDeleteModal=false" class="px-4 py-2 rounded-lg border">Batal</button>
            <button
                @click="openDeleteModal=false; addToast('success','Data siswa berhasil dihapus')"
                class="px-4 py-2 rounded-lg bg-red-500 text-white"
            >
                Hapus
            </button>
        </div>
    </div>
</div>

<!-- ✅ TOAST -->
<div class="fixed top-5 right-5 flex flex-col gap-3 z-[100000] max-w-sm w-full">
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-transition
            class="flex items-center gap-3 p-4 rounded-xl shadow-lg border backdrop-blur-sm"
            :class="toast.type==='success'
                ? 'bg-white border-emerald-200 text-emerald-700'
                : 'bg-white border-rose-200 text-rose-700'"
        >
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


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.effect(() => {
        if (document.getElementById('chartNilai')) {
            new Chart(document.getElementById('chartNilai'), {
                type: 'bar',
                data: {
                    labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt'],
                    datasets: [{
                        label: 'Nilai Rata-rata',
                        data: [80, 82, 85, 83, 88, 90, 91, 89, 92, 95],
                        backgroundColor: '#fb923c'
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true, max: 100 } },
                    plugins: { legend: { display: false } }
                }
            });
        }

        if (document.getElementById('chartPrestasi')) {
            new Chart(document.getElementById('chartPrestasi'), {
                type: 'line',
                data: {
                    labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt'],
                    datasets: [{
                        label: 'Prestasi & Portofolio',
                        data: [1,2,3,2,4,5,6,8,9,11],
                        borderColor: '#f97316',
                        backgroundColor: 'rgba(251,146,60,0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } },
                    plugins: { legend: { position: 'top' } }
                }
            });
        }
    });
});
</script>


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
