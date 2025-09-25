<!-- Bungkus semua konten utama dengan x-data -->
<main x-data="classHandler()" class="flex-1 p-6 space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold">Manajemen Kelas</h1>
        <p class="text-sm text-gray-600">Kelola data kelas, wali kelas, dan ruangan</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-2xl font-bold">8</p>
            <p class="text-sm text-gray-600">Total Kelas</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-2xl font-bold">7</p>
            <p class="text-sm text-gray-600">Guru Aktif</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-2xl font-bold">3</p>
            <p class="text-sm text-gray-600">Kepala Jurusan</p>
        </div>
        <div class="bg-white rounded-lg shadow p-4 text-center">
            <p class="text-2xl font-bold">3</p>
            <p class="text-sm text-gray-600">Wali Kelas</p>
        </div>
    </div>

    <!-- Tombol tambah -->
    <button 
        @click="isClassFormOpen = true" 
        class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
        + Tambah Kelas
    </button>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow mt-6">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th class="px-4 py-2">Nama Kelas</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Jumlah Siswa</th>
                    <th class="px-4 py-2">Wali Kelas</th>
                    <th class="px-4 py-2">Aksi</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="px-4 py-2">X PPLG 1</td>
                    <td class="px-4 py-2"><span class="px-2 py-1 rounded bg-gray-100">PPLG</span></td>
                    <td class="px-4 py-2">32/35</td>
                    <td class="px-4 py-2">Siti Nurhaliza, S.Kom</td>
                    <td class="px-4 py-2">Ruang 14</td>
                    <td class="px-4 py-2"><span class="px-2 py-1 bg-green-100 text-green-700 rounded">Aktif</span></td>
                    <td class="px-4 py-2 flex gap-2">
                        <button class="text-blue-500 hover:text-blue-700"><i data-lucide="eye" class="w-5 h-5"></i></button>
                        <button class="text-orange-500 hover:text-orange-700"><i data-lucide="edit" class="w-5 h-5"></i></button>
                        <button class="text-red-500 hover:text-red-700"><i data-lucide="trash" class="w-5 h-5"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Kelas -->
    <div 
        x-show="isClassFormOpen" 
        x-cloak
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" 
        @click.self="isClassFormOpen = false"
        x-transition.opacity>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 space-y-4" x-transition.scale>
            <h2 class="text-lg font-bold">Tambah Kelas</h2>
            <div class="space-y-3">
                <input type="text" placeholder="Nama Kelas" class="w-full border rounded-lg px-3 py-2 text-sm">
                <select class="w-full border rounded-lg px-3 py-2 text-sm">
                    <option>Pilih Jurusan</option>
                    <option>PPLG</option>
                    <option>TKJ</option>
                </select>
                <input type="number" placeholder="Jumlah Siswa" class="w-full border rounded-lg px-3 py-2 text-sm">
                <input type="text" placeholder="Wali Kelas" class="w-full border rounded-lg px-3 py-2 text-sm">
            </div>
            <div class="flex justify-end gap-3 pt-4">
                <button @click="isClassFormOpen = false" class="px-4 py-2 rounded-lg border">Batal</button>
                <button class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Simpan</button>
            </div>
        </div>
    </div>
</main>

<!-- Script -->
<script>
    function classHandler() {
        return {
            isClassFormOpen: false,
        }
    }
</script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script> lucide.createIcons(); </script>
