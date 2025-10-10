<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> ae60cab (update siakad kelas (belum final))
<div id="modalAdd" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 relative">
        <button id="btnCloseAdd" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <i class="ri-close-line text-2xl"></i>
        </button>
<<<<<<< HEAD

        <h2 class="text-2xl font-bold text-orange-600 mb-6">Tambah Kelas</h2>

        <form id="formAddKelas" action="{{ route('classes.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Pilih Jurusan --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Jurusan</label>
                <select name="major_id"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400" required>
                    <option value="" disabled selected>Pilih Jurusan</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Pilih Wali Kelas --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Wali Kelas</label>
                <select name="teacher_id"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400" required>
                    <option value="" disabled selected>Pilih Guru</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tingkat (Grade) --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Tingkat</label>
                <select name="grade"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400" required>
                    <option value="" disabled selected>Pilih Tingkat</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            {{-- Nomor Kelas --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Nomor Kelas</label>
                <input type="number" name="group_number" required min="1"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400"
                    placeholder="Contoh: 1">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-2 pt-4 border-t">
                <button type="button" id="btnCancelAdd"
                    class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-gray-700">Batal</button>
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">Simpan</button>
=======
{{-- ================= MODAL (Tambah/Edit Kelas) ================= --}}
<div id="modal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div id="modalBox" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 transform transition-all scale-95 opacity-0">
        <h2 id="modalTitle" class="text-xl font-bold text-gray-800 mb-6">Tambah Kelas Baru</h2>
=======
>>>>>>> ae60cab (update siakad kelas (belum final))

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

<<<<<<< HEAD
            <div class="flex justify-end gap-3 pt-4 border-t">
                <button type="button" id="btnCancel"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">
                    Simpan
                </button>
>>>>>>> 9995902 (majors and class)
=======
            <div class="flex justify-end gap-2 pt-4 border-t">
                <button type="button" id="btnCancelAdd" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-gray-700">Batal</button>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">Simpan</button>
>>>>>>> ae60cab (update siakad kelas (belum final))
            </div>
        </form>
    </div>
</div>
