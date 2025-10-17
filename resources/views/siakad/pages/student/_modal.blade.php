<div id="modal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-lg shadow-lg w-96 p-6 transform scale-95 opacity-0 transition">
        <h2 class="text-lg font-bold mb-4">Tambah Siswa</h2>
        <form id="siswaForm" class="space-y-4">
            @foreach (['nis'=>'NIS','nama'=>'Nama Lengkap','kelas'=>'Kelas','jurusan'=>'Jurusan'] as $name => $ph)
                <input type="text" name="{{ $name }}" placeholder="{{ $ph }}" class="w-full border rounded px-3 py-2">
            @endforeach
            <select name="gender" class="w-full border rounded px-3 py-2">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="Aktif">Aktif</option>
                <option value="Lulus">Lulus</option>
                <option value="Alumni">Alumni</option>
            </select>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
