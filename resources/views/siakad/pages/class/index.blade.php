@extends('siakad.index')

@section('content')
<div x-data="{ openTambah: false }" class="space-y-6">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Kelas</h1>
        <p class="text-gray-500">Kelola data kelas, wali kelas, dan ruangan</p>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow-sm border flex items-center gap-3">
            <div class="bg-orange-100 text-orange-600 p-3 rounded-lg">
                <i data-lucide="layers" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Kelas</p>
                <h2 class="text-xl font-bold">8</h2>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border flex items-center gap-3">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Guru Aktif</p>
                <h2 class="text-xl font-bold">7</h2>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border flex items-center gap-3">
            <div class="bg-yellow-100 text-yellow-600 p-3 rounded-lg">
                <i data-lucide="crown" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Kepala Jurusan</p>
                <h2 class="text-xl font-bold">3</h2>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border flex items-center gap-3">
            <div class="bg-green-100 text-green-600 p-3 rounded-lg">
                <i data-lucide="user-square" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Wali Kelas</p>
                <h2 class="text-xl font-bold">3</h2>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah -->
    <div>
        <button 
            @click="openTambah = true"
            class="bg-orange-500 text-white px-4 py-2 rounded-lg shadow hover:bg-orange-600">
            + Tambah Kelas
        </button>
    </div>

    <!-- Filter -->
    <div class="bg-white p-4 rounded-xl border shadow-sm grid grid-cols-1 md:grid-cols-4 gap-4">
        <select class="border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-500">
            <option>Semua Jurusan</option>
            <option>PPLG</option>
            <option>TKJ</option>
        </select>
        <select class="border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-500">
            <option>Semua Kelas</option>
            <option>X</option>
            <option>XI</option>
        </select>
        <select class="border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-500">
            <option>Jenis Kelamin</option>
            <option>Laki-laki</option>
            <option>Perempuan</option>
        </select>
        <input type="text" placeholder="Cari nama kelas / wali / ruangan"
            class="border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-orange-500">
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-left">
                <tr>
                    <th class="px-4 py-3">Nama Kelas</th>
                    <th class="px-4 py-3">Jurusan</th>
                    <th class="px-4 py-3">Jumlah Siswa</th>
                    <th class="px-4 py-3">Wali Kelas</th>
                    <th class="px-4 py-3">Ruangan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr>
                    <td class="px-4 py-3 font-medium">X PPLG 1</td>
                    <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-xs">PPLG</span></td>
                    <td class="px-4 py-3">32/35</td>
                    <td class="px-4 py-3">Siti Nurhaliza, S.Kom</td>
                    <td class="px-4 py-3">Ruang 14</td>
                    <td class="px-4 py-3">
                        <span class="bg-green-100 text-green-700 px-2 py-1 text-xs rounded-full">Aktif</span>
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <button class="text-blue-500 hover:text-blue-700"><i data-lucide="eye"></i></button>
                        <button class="text-orange-500 hover:text-orange-700"><i data-lucide="edit"></i></button>
                        <button class="text-red-500 hover:text-red-700"><i data-lucide="trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Kelas -->
    <div 
        x-show="openTambah"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        
        <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6 relative">
            <!-- Tombol Close -->
            <button 
                @click="openTambah = false" 
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>

            <!-- Header Modal -->
            <h2 class="text-xl font-bold mb-4">Tambah Kelas</h2>

            <!-- Form Tambah Kelas -->
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm font-medium text-gray-700">Nama Kelas</label>
                    <input type="text" name="nama_kelas" 
                           class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Jurusan</label>
                    <select name="jurusan" class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-2 focus:ring-orange-500">
                        <option value="PPLG">PPLG</option>
                        <option value="TKJ">TKJ</option>
                        <option value="AKL">AKL</option>
                    </select>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Jumlah Siswa</label>
                    <input type="number" name="jumlah_siswa" 
                           class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Wali Kelas</label>
                    <input type="text" name="wali_kelas" 
                           class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-700">Ruangan</label>
                    <input type="text" name="ruangan" 
                           class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring-2 focus:ring-orange-500">
                </div>

                <!-- Tombol Simpan -->
                <div class="flex justify-end gap-2">
                    <button type="button" 
                            @click="openTambah = false"
                            class="px-4 py-2 rounded-lg border hover:bg-gray-100">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
