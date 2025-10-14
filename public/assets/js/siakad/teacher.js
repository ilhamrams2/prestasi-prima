// ==================== ELEMENT REFERENSI ====================
<<<<<<< HEAD
<<<<<<< HEAD
const modal = document.getElementById("modal");                // Modal tambah
const modalBox = document.getElementById("modalBox");
const editModal = document.getElementById("editModal");        // Modal edit
const editBox = document.getElementById("editBox");
const detailModal = document.getElementById("detailModal");    // Modal detail
const detailBox = document.getElementById("detailBox");
const deleteModal = document.getElementById("deleteModal");    // Modal delete
const deleteBox = document.getElementById("deleteBox");

=======
const modal = document.getElementById("modal");
=======
const modal = document.getElementById("modal");                // Modal tambah
>>>>>>> cd5a115 (update modal delete siakad teacher)
const modalBox = document.getElementById("modalBox");
const editModal = document.getElementById("editModal");        // Modal edit
const editBox = document.getElementById("editBox");
const detailModal = document.getElementById("detailModal");    // Modal detail
const detailBox = document.getElementById("detailBox");
<<<<<<< HEAD
>>>>>>> 328e99e (update siakad belom kelar)
=======
const deleteModal = document.getElementById("deleteModal");    // Modal delete
const deleteBox = document.getElementById("deleteBox");

>>>>>>> cd5a115 (update modal delete siakad teacher)
const teacherTableBody = document.getElementById("teacherTableBody");
const teacherEmptyState = document.getElementById("teacherEmptyState");
const editForm = document.getElementById("editForm");

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
let deleteId = null; // ID guru yang akan dihapus

// ==================== UTILITAS ANIMASI ====================
function openAnimated(modalEl, boxEl) {
    if (!modalEl || !boxEl) return console.warn("Elemen modal tidak ditemukan!");
<<<<<<< HEAD
=======
// ==================== UTILITAS ANIMASI ====================
function openAnimated(modalEl, boxEl) {
>>>>>>> 328e99e (update siakad belom kelar)
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
    modalEl.classList.remove("hidden");
    setTimeout(() => boxEl.classList.remove("opacity-0", "scale-95"), 50);
}

function closeAnimated(modalEl, boxEl) {
<<<<<<< HEAD
<<<<<<< HEAD
    if (!modalEl || !boxEl) return;
=======
>>>>>>> 328e99e (update siakad belom kelar)
=======
    if (!modalEl || !boxEl) return;
>>>>>>> cd5a115 (update modal delete siakad teacher)
    boxEl.classList.add("opacity-0", "scale-95");
    setTimeout(() => modalEl.classList.add("hidden"), 150);
}

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
// Tutup modal jika klik di luar box
document.addEventListener("click", (e) => {
    [ { modal: modal, box: modalBox },
      { modal: editModal, box: editBox },
      { modal: detailModal, box: detailBox },
      { modal: deleteModal, box: deleteBox }
    ].forEach(({ modal, box }) => {
        if (modal && box && e.target === modal) closeAnimated(modal, box);
    });
});

<<<<<<< HEAD
=======
>>>>>>> 328e99e (update siakad belom kelar)
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
// ==================== MODAL HANDLER ====================
function openModal() { openAnimated(modal, modalBox); }
function closeModal() { closeAnimated(modal, modalBox); }
function openEditModal() { openAnimated(editModal, editBox); }
function closeEditModal() { closeAnimated(editModal, editBox); }
function openDetailModal() { openAnimated(detailModal, detailBox); }
function closeDetailModal() { closeAnimated(detailModal, detailBox); }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
function openDeleteModal(id) {
    deleteId = id;
    openAnimated(deleteModal, deleteBox);
}
function closeDeleteModal() {
    deleteId = null;
    closeAnimated(deleteModal, deleteBox);
}
<<<<<<< HEAD
=======
>>>>>>> 328e99e (update siakad belom kelar)
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)

// ==================== FETCH DATA GURU ====================
async function loadTeachers() {
    try {
        const res = await fetch("/siakad/teacher/data");
<<<<<<< HEAD
<<<<<<< HEAD
        if (!res.ok) throw new Error(`HTTP Error: ${res.status}`);
        const data = await res.json();
        if (!Array.isArray(data)) throw new Error("Respon bukan array valid");
=======
        const data = await res.json();
>>>>>>> 328e99e (update siakad belom kelar)
=======
        if (!res.ok) throw new Error(`HTTP Error: ${res.status}`);
        const data = await res.json();
        if (!Array.isArray(data)) throw new Error("Respon bukan array valid");
>>>>>>> cd5a115 (update modal delete siakad teacher)

        teacherTableBody.innerHTML = "";
        teacherEmptyState.classList.toggle("hidden", data.length > 0);
        if (!data.length) return;

        data.forEach((teacher, index) => {
            const statusBadge = `
                <span class="px-2 py-1 rounded-full text-xs font-semibold ${
<<<<<<< HEAD
<<<<<<< HEAD
                    teacher.status === "Active"
                        ? "bg-green-100 text-green-700"
                        : "bg-red-100 text-red-700"
=======
                    teacher.status === "Active" ? "bg-green-100 text-green-700" : "bg-red-100 text-red-700"
>>>>>>> 328e99e (update siakad belom kelar)
=======
                    teacher.status === "Active"
                        ? "bg-green-100 text-green-700"
                        : "bg-red-100 text-red-700"
>>>>>>> cd5a115 (update modal delete siakad teacher)
                }">
                    ${teacher.status === "Active" ? "Aktif" : "Tidak Aktif"}
                </span>
            `;

            const row = document.createElement("tr");
            row.className = "border-b hover:bg-gray-50 transition";
            row.innerHTML = `
                <td class="px-6 py-3">${index + 1}</td>
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
                <td class="px-6 py-3">${teacher.teacher_id ?? "-"}</td>
                <td class="px-6 py-3 font-medium text-gray-800">${teacher.name ?? "-"}</td>
                <td class="px-6 py-3">${teacher.subject ?? "-"}</td>
                <td class="px-6 py-3">${teacher.position ?? "-"}</td>
<<<<<<< HEAD
                <td class="px-6 py-3">${statusBadge}</td>
                <td class="px-6 py-3 flex items-center gap-3">
                    <button onclick="showTeacherDetail(${teacher.id})"
                        class="text-gray-600 hover:text-gray-800" title="Detail">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                    <button onclick="openEditTeacher(${teacher.id})"
                        class="text-blue-500 hover:text-blue-700" title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button onclick="openDeleteModal(${teacher.id})"
=======
                <td class="px-6 py-3">${teacher.teacher_id}</td>
                <td class="px-6 py-3 font-medium text-gray-800">${teacher.name}</td>
                <td class="px-6 py-3">${teacher.subject}</td>
                <td class="px-6 py-3">${teacher.position}</td>
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
                <td class="px-6 py-3">${statusBadge}</td>
                <td class="px-6 py-3 flex items-center gap-3">
                    <button onclick="showTeacherDetail(${teacher.id})"
                        class="text-gray-600 hover:text-gray-800" title="Detail">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                    <button onclick="openEditTeacher(${teacher.id})"
                        class="text-blue-500 hover:text-blue-700" title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
<<<<<<< HEAD
                    <button onclick="deleteTeacher(${teacher.id})" 
>>>>>>> 328e99e (update siakad belom kelar)
=======
                    <button onclick="openDeleteModal(${teacher.id})"
>>>>>>> cd5a115 (update modal delete siakad teacher)
                        class="text-red-500 hover:text-red-700" title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            teacherTableBody.appendChild(row);
        });
    } catch (error) {
        console.error("Gagal memuat data guru:", error);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
        teacherTableBody.innerHTML = `
            <tr><td colspan="7" class="text-center py-4 text-gray-500">
                Terjadi kesalahan saat memuat data.
            </td></tr>`;
<<<<<<< HEAD
=======
>>>>>>> 328e99e (update siakad belom kelar)
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
    }
}

// ==================== DETAIL GURU ====================
function showTeacherDetail(id) {
    fetch(`/siakad/teacher/${id}`)
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
        .then(res => {
            if (!res.ok) throw new Error("Gagal mengambil data detail guru.");
            return res.json();
        })
<<<<<<< HEAD
        .then(t => {
            if (!t || !t.id) throw new Error("Data guru tidak ditemukan.");
=======
        .then(res => res.json())
        .then(t => {
            if (!t) return;
>>>>>>> 328e99e (update siakad belom kelar)
=======
        .then(t => {
            if (!t || !t.id) throw new Error("Data guru tidak ditemukan.");
>>>>>>> cd5a115 (update modal delete siakad teacher)

            document.getElementById("detailTeacherId").textContent = t.teacher_id || "-";
            document.getElementById("detailName").textContent = t.name || "-";
            document.getElementById("detailSubject").textContent = t.subject || "-";
            document.getElementById("detailPosition").textContent = t.position || "-";
            document.getElementById("detailEmail").textContent = t.email || "-";
            document.getElementById("detailPhone").textContent = t.phone || "-";

            const statusEl = document.getElementById("detailStatus");
            if (t.status === "Active") {
                statusEl.textContent = "Aktif";
                statusEl.className = "inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700";
            } else {
                statusEl.textContent = "Tidak Aktif";
                statusEl.className = "inline-block px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700";
            }

            // Foto / Inisial
            const photoEl = document.getElementById("detailPhoto");
            const initialEl = document.getElementById("detailInitial");
            if (t.photo) {
                photoEl.src = `/storage/${t.photo}`;
                photoEl.classList.remove("hidden");
                initialEl.classList.add("hidden");
            } else {
                initialEl.textContent = t.name ? t.name.charAt(0).toUpperCase() : "G";
                photoEl.classList.add("hidden");
                initialEl.classList.remove("hidden");
            }

            openDetailModal();
        })
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
        .catch(err => {
            console.error("Gagal memuat detail guru:", err);
            alert("Gagal memuat detail guru!");
        });
<<<<<<< HEAD
=======
        .catch(err => console.error("Gagal memuat detail guru:", err));
>>>>>>> 328e99e (update siakad belom kelar)
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
}

// ==================== EDIT GURU ====================
function openEditTeacher(id) {
    fetch(`/siakad/teacher/${id}`)
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
        .then(res => {
            if (!res.ok) throw new Error("Gagal mengambil data guru untuk edit.");
            return res.json();
        })
<<<<<<< HEAD
        .then(data => {
            if (!data || !editForm) throw new Error("Data guru tidak valid atau form tidak ditemukan.");

            // Isi form modal edit
            editForm.action = `/siakad/teacher/${id}`;
            editForm.querySelector("#editTeacherId").value = data.teacher_id ?? "";
            editForm.querySelector("#editName").value = data.name ?? "";
            editForm.querySelector("#editSubject").value = data.subject ?? "";
            editForm.querySelector("#editPosition").value = data.position ?? "";
            editForm.querySelector("#editEmail").value = data.email ?? "";
            editForm.querySelector("#editPhone").value = data.phone ?? "";
            editForm.querySelector("#editStatus").value = data.status ?? "Inactive";

            openEditModal();
        })
        .catch(err => {
            console.error("Gagal memuat data untuk edit:", err);
            alert("Tidak dapat memuat data guru untuk edit.");
        });
}

// ==================== DELETE GURU (Modal Confirm) ====================
async function confirmDelete() {
    if (!deleteId) return;
    try {
        const res = await fetch(`/siakad/teacher/${deleteId}`, {
=======
        .then(res => res.json())
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
        .then(data => {
            if (!data || !editForm) throw new Error("Data guru tidak valid atau form tidak ditemukan.");

            // Isi form modal edit
            editForm.action = `/siakad/teacher/${id}`;
            editForm.querySelector("#editTeacherId").value = data.teacher_id ?? "";
            editForm.querySelector("#editName").value = data.name ?? "";
            editForm.querySelector("#editSubject").value = data.subject ?? "";
            editForm.querySelector("#editPosition").value = data.position ?? "";
            editForm.querySelector("#editEmail").value = data.email ?? "";
            editForm.querySelector("#editPhone").value = data.phone ?? "";
            editForm.querySelector("#editStatus").value = data.status ?? "Inactive";

            openEditModal();
        })
        .catch(err => {
            console.error("Gagal memuat data untuk edit:", err);
            alert("Tidak dapat memuat data guru untuk edit.");
        });
}

// ==================== DELETE GURU (Modal Confirm) ====================
async function confirmDelete() {
    if (!deleteId) return;
    try {
<<<<<<< HEAD
        const res = await fetch(`/siakad/teacher/${id}`, {
>>>>>>> 328e99e (update siakad belom kelar)
=======
        const res = await fetch(`/siakad/teacher/${deleteId}`, {
>>>>>>> cd5a115 (update modal delete siakad teacher)
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            },
        });

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cd5a115 (update modal delete siakad teacher)
        if (res.ok) {
            closeDeleteModal();
            loadTeachers();
        } else {
            alert("Gagal menghapus data guru!");
        }
<<<<<<< HEAD
    } catch (error) {
        console.error("Gagal menghapus:", error);
        alert("Terjadi kesalahan saat menghapus data guru.");
=======
        if (res.ok) loadTeachers();
        else alert("Gagal menghapus data guru!");
    } catch (error) {
        console.error("Gagal menghapus:", error);
>>>>>>> 328e99e (update siakad belom kelar)
=======
    } catch (error) {
        console.error("Gagal menghapus:", error);
        alert("Terjadi kesalahan saat menghapus data guru.");
>>>>>>> cd5a115 (update modal delete siakad teacher)
    }
}

// ==================== INIT ====================
document.addEventListener("DOMContentLoaded", loadTeachers);
