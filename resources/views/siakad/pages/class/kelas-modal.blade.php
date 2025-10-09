{{-- Modal Tambah --}}
<div id="modalTambah" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Kelas Baru</h2>
        <form id="kelasForm" class="space-y-5">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Kode Kelas</label>
                    <input type="text" name="kode" placeholder="Contoh: KLS-001" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Nama Kelas</label>
                    <input type="text" name="nama" placeholder="Nama Kelas" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
                    <input type="text" name="jurusan" placeholder="Jurusan" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Wali Kelas</label>
                    <input type="text" name="wali" placeholder="Wali Kelas" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Siswa</label>
                <input type="number" name="jumlah" placeholder="Jumlah Siswa" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" onclick="closeModalTambah()" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modalEdit" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Edit Kelas</h2>
        <form id="kelasEditForm" class="space-y-5">
            <!-- input sama seperti modal tambah, tapi nilai akan diisi via JS -->
        </form>
    </div>
</div>

{{-- Modal Detail --}}
<div id="modalDetail" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-4xl overflow-hidden transform transition-all scale-95 opacity-0" id="modalDetailBox">
        <!-- Konten Detail Kelas akan diisi via JS -->
    </div>
</div>
