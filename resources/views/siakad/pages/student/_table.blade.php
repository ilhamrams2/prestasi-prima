<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table id="siswaTable" class="w-full text-left border-collapse">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-3">NIS</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Kelas</th>
                <th class="px-4 py-3">Jurusan</th>
                <th class="px-4 py-3">Jenis Kelamin</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ([ 
                ['2025001','Ahmad Fauzi','X PPLG 1','PPLG','Laki-laki','Aktif'],
                ['2025002','Siti Nurhaliza','XI TKJ 2','TKJ','Perempuan','Aktif']
            ] as $s)
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="px-4 py-3">{{ $s[0] }}</td>
                <td class="px-4 py-3 font-medium">{{ $s[1] }}</td>
                <td class="px-4 py-3">{{ $s[2] }}</td>
                <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">{{ $s[3] }}</span></td>
                <td class="px-4 py-3">{{ $s[4] }}</td>
                <td class="px-4 py-3">
                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">{{ $s[5] }}</span>
                </td>
                <td class="px-4 py-3 flex space-x-3">
                    <button class="text-blue-500 hover:text-blue-700" title="Lihat"><i class="ri-eye-line"></i></button>
                    <button class="text-orange-500 hover:text-orange-700" title="Edit"><i class="ri-edit-line"></i></button>
                    <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus"><i class="ri-delete-bin-line"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
