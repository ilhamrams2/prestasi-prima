{{-- ================= MODAL (Tambah/Edit Kelas) ================= --}}
<div id="modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 id="modalTitle" class="text-xl font-bold text-gray-800 mb-6">Tambah Kelas Baru</h2>

        <form id="formKelas" method="POST" class="space-y-5">
            @csrf
            <input type="hidden" name="id">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kode Kelas</label>
                    <input type="text" name="kode" placeholder="KLS-001"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Kelas</label>
                    <input type="text" name="nama" placeholder="X PPLG 1"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                    <input type="text" name="jurusan" placeholder="Contoh: PPLG / TJKT / DKV"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Wali Kelas</label>
                    <input type="text" name="wali" placeholder="Nama Wali Kelas"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Siswa</label>
                <input type="number" name="siswa" placeholder="Jumlah Siswa"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:border-orange-400" required>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" id="btnCancel"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
