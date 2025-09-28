@extends('siakad.index') {{-- sesuaikan layout mu --}}

@section('content')
<div class="px-6 py-6">
    {{-- Breadcrumb --}}
    <div class="mb-4 text-sm text-gray-500">
        Dashboard / <span class="font-medium text-gray-700">Manajemen Siswa</span>
    </div>

    {{-- Header --}}
    <div class="bg-orange-50 rounded-xl p-6 mb-6 shadow">
        <h1 class="text-2xl font-semibold text-orange-600">Manajemen Siswa</h1>
        <p class="text-gray-600">Kelola data siswa, kelas, jurusan, dan status siswa</p>
    </div>

    {{-- Info Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-gray-500 text-sm">Total Siswa</div>
            <div class="text-2xl font-bold text-gray-800">320</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-gray-500 text-sm">Kelas Aktif</div>
            <div class="text-2xl font-bold text-gray-800">24</div>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-gray-500 text-sm">Siswa Baru Tahun Ini</div>
            <div class="text-2xl font-bold text-gray-800">120</div>
        </div>
    </div>

    {{-- Tombol tambah --}}
    <div class="flex items-center justify-between mb-4">
        <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Siswa
        </button>
        <div class="flex space-x-2">
            <select class="border border-gray-300 rounded-lg px-3 py-2">
                <option>Semua Kelas</option>
                <option>X RPL</option>
                <option>XI TKJ</option>
            </select>
            <select class="border border-gray-300 rounded-lg px-3 py-2">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Nonaktif</option>
            </select>
            <input type="text" placeholder="Cari nama / NIS" 
                class="border border-gray-300 rounded-lg px-3 py-2">
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4">Nama Siswa</th>
                    <th class="py-3 px-4">NIS</th>
                    <th class="py-3 px-4">Kelas</th>
                    <th class="py-3 px-4">Jurusan</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="py-3 px-4">Ahmad Rudi</td>
                    <td class="py-3 px-4">2023001</td>
                    <td class="py-3 px-4">X RPL 1</td>
                    <td class="py-3 px-4">RPL</td>
                    <td class="py-3 px-4">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">Aktif</span>
                    </td>
                    <td class="py-3 px-4 text-center space-x-2">
                        <button class="text-blue-500 hover:text-blue-700">👁️</button>
                        <button class="text-yellow-500 hover:text-yellow-700">✏️</button>
                        <button class="text-red-500 hover:text-red-700">🗑️</button>
                    </td>
                </tr>
                <tr class="border-t">
                    <td class="py-3 px-4">Siti Aminah</td>
                    <td class="py-3 px-4">2023002</td>
                    <td class="py-3 px-4">XI TKJ 2</td>
                    <td class="py-3 px-4">TKJ</td>
                    <td class="py-3 px-4">
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">Nonaktif</span>
                    </td>
                    <td class="py-3 px-4 text-center space-x-2">
                        <button class="text-blue-500 hover:text-blue-700">👁️</button>
                        <button class="text-yellow-500 hover:text-yellow-700">✏️</button>
                        <button class="text-red-500 hover:text-red-700">🗑️</button>
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="flex justify-end items-center px-4 py-3">
            <nav class="flex space-x-2">
                <a href="#" class="px-3 py-1 border rounded">« Prev</a>
                <a href="#" class="px-3 py-1 border bg-orange-500 text-white rounded">1</a>
                <a href="#" class="px-3 py-1 border rounded">Next »</a>
            </nav>
        </div>
    </div>
</div>
@endsection
