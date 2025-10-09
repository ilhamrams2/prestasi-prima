<div class="bg-white rounded-lg shadow overflow-x-auto mt-4">
    <table id="kelasTable" class="w-full text-left border-collapse">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3">Kode Kelas</th>
                <th class="px-4 py-3">Nama Kelas</th>
                <th class="px-4 py-3">Jurusan</th>
                <th class="px-4 py-3">Wali Kelas</th>
                <th class="px-4 py-3">Jumlah Siswa</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="px-4 py-3">KLS-001</td>
                <td class="px-4 py-3 font-medium">X PPLG 1</td>
                <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">PPLG</span></td>
                <td class="px-4 py-3">Budi Santoso</td>
                <td class="px-4 py-3">32</td>
                <td class="px-4 py-3 flex space-x-3">
                    <button title="Detail" class="text-blue-500 hover:text-blue-700" onclick="openModalDetail(this.closest('tr'))"><i class="ri-eye-line"></i></button>
                    <button title="Edit" class="text-orange-500 hover:text-orange-700" onclick="openModalEdit(this.closest('tr'))"><i class="ri-edit-line"></i></button>
                    <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
