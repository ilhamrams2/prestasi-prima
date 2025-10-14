<!-- ========== MODAL EDIT JURUSAN ========== -->
<div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center hidden z-50">
    <div id="modalEditBox" class="bg-white rounded-2xl shadow-xl w-full max-w-lg transform scale-95 opacity-0 transition-all duration-200">
        <form id="formEditJurusan" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            <h2 id="modalEditTitle" class="text-xl font-semibold text-gray-700 mb-2">Edit Jurusan</h2>

            <!-- Input Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Nama Jurusan</label>
                <input type="text" name="name" id="edit_name" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:outline-none">
            </div>

            <!-- Input Kode -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Kode Jurusan</label>
                <input type="text" name="major_code" id="edit_major_code" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:outline-none">
            </div>

            {{-- <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Deskripsi</label>
                <textarea name="description" id="edit_description" rows="3" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400 focus:outline-none"></textarea>
            </div> --}}


            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3 pt-3 border-t">
                <button type="button" id="btnCancelEdit" class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const modalEdit = document.getElementById("modalEdit");
    const modalEditBox = document.getElementById("modalEditBox");
    const btnCancelEdit = document.getElementById("btnCancelEdit");
    const formEditJurusan = document.getElementById("formEditJurusan");

    // === BUKA MODAL EDIT ===
    function openModalEdit(data) {
        modalEdit.classList.remove("hidden");
        setTimeout(() => {
            modalEditBox.classList.remove("scale-95", "opacity-0");
            modalEditBox.classList.add("scale-100", "opacity-100");
        }, 50);

        // Isi form otomatis
        formEditJurusan.action = `/siakad/majors/${data.id}`;
        document.getElementById("edit_name").value = data.name;
        document.getElementById("edit_major_code").value = data.major_code;
        document.getElementById("edit_description").value = data.description;
        document.getElementById("edit_status").value = data.status;
    }

    // === TUTUP MODAL EDIT ===
    function closeModalEdit() {
        modalEditBox.classList.add("scale-95", "opacity-0");
        setTimeout(() => {
            modalEdit.classList.add("hidden");
        }, 150);
    }

    btnCancelEdit.addEventListener("click", closeModalEdit);
    modalEdit.addEventListener("click", (e) => {
        if (e.target === modalEdit) closeModalEdit();
    });
</script>
