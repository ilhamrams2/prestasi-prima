<div id="modalAdd" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 relative">
        <button id="btnCloseAdd" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <i class="ri-close-line text-2xl"></i>
        </button>

        <h2 class="text-2xl font-bold text-orange-600 mb-6">Tambah Kelas</h2>

        <form id="formAddKelas" class="space-y-5">
            <div>
                <label class="text-sm font-medium text-gray-600">Kode Kelas</label>
                <input type="text" name="kode" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>
            <div>
                <label class="text-sm font-medium text-gray-600">Nama Kelas</label>
                <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="flex justify-end gap-2 pt-4 border-t">
                <button type="button" id="btnCancelAdd" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-gray-700">Batal</button>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
