<div id="modalEdit" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 p-6 relative">
        <button id="btnCloseEdit" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <i class="ri-close-line text-2xl"></i>
        </button>

        <h2 class="text-2xl font-bold text-orange-600 mb-6">Edit Kelas</h2>

        <form id="formEditKelas" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Hidden ID --}}
            <input type="hidden" name="id" id="edit_id">

            {{-- Pilih Jurusan --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Jurusan</label>
                <select name="major_id" id="edit_major"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled selected>Pilih Jurusan</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Pilih Wali Kelas --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Wali Kelas</label>
                <select name="teacher_id" id="edit_teacher"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400" required>
                    <option value="" disabled selected>Pilih Guru</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tingkat --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Tingkat</label>
                <select name="grade" id="edit_grade"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400" required>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>

            {{-- Nomor Kelas --}}
            <div>
                <label class="text-sm font-medium text-gray-600">Nomor Kelas</label>
                <input type="number" name="group_number" id="edit_group" required min="1"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400" placeholder="Contoh: 1">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-2 pt-4 border-t">
                <button type="button" id="btnCancelEdit"
                    class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-gray-700">Batal</button>
                <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg">Simpan
                    Perubahan</button>
            </div>
        </form>
    </div>
</div>


