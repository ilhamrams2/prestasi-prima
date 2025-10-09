{{-- resources/views/siakad/pages/majors/majors-modal.blade.php --}}

{{-- ================= MODAL (Tambah/Edit) ================= --}}
<div id="modal" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div id="modalBox" class="bg-white w-96 rounded-2xl shadow-2xl p-6 transform translate-y-6 opacity-0 transition">
        <h2 id="modalTitle" class="text-lg font-bold mb-3"></h2>
        <form id="formJurusan" class="space-y-3">
            <input type="hidden" name="id">
            <input name="nama" placeholder="Nama Jurusan" class="w-full border rounded px-3 py-2" required>
            <input name="kode" placeholder="Kode (contoh: RPL)" class="w-full border rounded px-3 py-2" required>
            <input name="kepala" placeholder="Kepala Jurusan" class="w-full border rounded px-3 py-2" required>
            <div class="flex gap-2">
                <input name="kelas" placeholder="Jumlah Kelas" class="w-1/2 border rounded px-3 py-2" required>
                <input name="siswa" placeholder="Jumlah Siswa" class="w-1/2 border rounded px-3 py-2" required>
            </div>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
            <div class="flex justify-end gap-2 mt-2">
                <button type="button" id="btnCancel" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL VIEW ================= --}}
<div id="modalView" class="fixed inset-0 bg-black/50 hidden z-40 flex items-center justify-center">
    <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">
        <button onclick="closeModal('view')" class="absolute top-3 right-3 text-gray-500 hover:text-red-500">
            <i class="ri-close-line text-2xl"></i>
        </button>
        <h2 id="viewNama" class="text-2xl font-bold text-gray-800 mb-3"></h2>
        <p class="text-sm text-gray-500 mb-4" id="viewKepala"></p>
        <p class="text-gray-600 mb-4">Kode: <span id="viewKode"></span></p>
        <p class="text-gray-600 mb-4">Jumlah Kelas: <span id="viewKelas"></span> · Jumlah Siswa: <span id="viewSiswa"></span></p>
        <span id="viewStatus" class="px-2 py-1 rounded text-sm"></span>
    </div>
</div>
