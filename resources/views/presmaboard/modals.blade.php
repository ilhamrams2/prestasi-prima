<div id="globalModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-11/12 md:w-1/2 p-6">
        <h3 id="modalTitle" class="text-xl font-semibold mb-4"></h3>
        <form id="modalForm" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" id="modalType">

            <div id="modalBody"></div>

            <div class="flex justify-end mt-4 space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(type) {
    document.getElementById('globalModal').classList.remove('hidden');
    document.getElementById('modalType').value = type;
    document.getElementById('modalTitle').innerText = 'Tambah ' + type.charAt(0).toUpperCase() + type.slice(1);

    let formHTML = '';
    switch (type) {
        case 'student':
            formHTML = `
                <input name="nama" placeholder="Nama" class="w-full border p-2 rounded mb-2">
                <input name="email" placeholder="Email" class="w-full border p-2 rounded mb-2">
                <input name="kelas" placeholder="Kelas" class="w-full border p-2 rounded mb-2">
                <input name="jurusan" placeholder="Jurusan" class="w-full border p-2 rounded mb-2">
                <input name="angkatan" placeholder="Angkatan" class="w-full border p-2 rounded mb-2">
                <input type="file" name="foto" class="w-full border p-2 rounded mb-2">`;
            break;
        case 'project':
            formHTML = `
                <input name="student_id" placeholder="ID Siswa" class="w-full border p-2 rounded mb-2">
                <input name="judul_project" placeholder="Judul Project" class="w-full border p-2 rounded mb-2">
                <textarea name="deskripsi" placeholder="Deskripsi" class="w-full border p-2 rounded mb-2"></textarea>
                <input name="kategori" placeholder="Kategori" class="w-full border p-2 rounded mb-2">
                <input type="file" name="gambar" class="w-full border p-2 rounded mb-2">`;
            break;
        case 'achievement':
            formHTML = `
                <input name="student_id" placeholder="ID Siswa" class="w-full border p-2 rounded mb-2">
                <input name="judul_prestasi" placeholder="Judul Prestasi" class="w-full border p-2 rounded mb-2">
                <textarea name="deskripsi" placeholder="Deskripsi" class="w-full border p-2 rounded mb-2"></textarea>
                <input type="date" name="tanggal" class="w-full border p-2 rounded mb-2">`;
            break;
        case 'score':
            formHTML = `
                <input name="student_id" placeholder="ID Siswa" class="w-full border p-2 rounded mb-2">
                <input name="nilai_pkp" placeholder="Nilai PKP" class="w-full border p-2 rounded mb-2">
                <input name="semester" placeholder="Semester" class="w-full border p-2 rounded mb-2">
                <input name="tahun_ajaran" placeholder="Tahun Ajaran" class="w-full border p-2 rounded mb-2">
                <select name="tipe_ujian" class="w-full border p-2 rounded mb-2">
                    <option value="UTS">UTS</option>
                    <option value="UAS">UAS</option>
                </select>`;
            break;
    }
    document.getElementById('modalBody').innerHTML = formHTML;
    document.getElementById('modalForm').action = "{{ route('presmaboard.store') }}";
}

function closeModal() {
    document.getElementById('globalModal').classList.add('hidden');
}
</script>
