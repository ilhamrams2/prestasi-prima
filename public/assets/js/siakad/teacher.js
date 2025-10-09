// ==================== ELEMENT REFERENSI ====================
const modal = document.getElementById("modal");
const modalBox = document.getElementById("modalBox");
const editModal = document.getElementById("editModal");
const editBox = document.getElementById("editBox");
const detailModal = document.getElementById("detailModal");
const detailBox = document.getElementById("detailBox");
const teacherTableBody = document.getElementById("teacherTableBody");
const teacherEmptyState = document.getElementById("teacherEmptyState");
const editForm = document.getElementById("editForm");

// ==================== UTILITAS ANIMASI ====================
function openAnimated(modalEl, boxEl) {
    modalEl.classList.remove("hidden");
    setTimeout(() => boxEl.classList.remove("opacity-0", "scale-95"), 50);
}

function closeAnimated(modalEl, boxEl) {
    boxEl.classList.add("opacity-0", "scale-95");
    setTimeout(() => modalEl.classList.add("hidden"), 150);
}

// ==================== MODAL HANDLER ====================
function openModal() { openAnimated(modal, modalBox); }
function closeModal() { closeAnimated(modal, modalBox); }
function openEditModal() { openAnimated(editModal, editBox); }
function closeEditModal() { closeAnimated(editModal, editBox); }
function openDetailModal() { openAnimated(detailModal, detailBox); }
function closeDetailModal() { closeAnimated(detailModal, detailBox); }

// ==================== FETCH DATA GURU ====================
async function loadTeachers() {
    try {
        const res = await fetch("/siakad/teacher/data");
        const data = await res.json();

        teacherTableBody.innerHTML = "";
        teacherEmptyState.classList.toggle("hidden", data.length > 0);
        if (!data.length) return;

        data.forEach((teacher, index) => {
            const statusBadge = `
                <span class="px-2 py-1 rounded-full text-xs font-semibold ${
                    teacher.status === "Active" ? "bg-green-100 text-green-700" : "bg-red-100 text-red-700"
                }">
                    ${teacher.status === "Active" ? "Aktif" : "Tidak Aktif"}
                </span>
            `;

            const row = document.createElement("tr");
            row.className = "border-b hover:bg-gray-50 transition";
            row.innerHTML = `
                <td class="px-6 py-3">${index + 1}</td>
                <td class="px-6 py-3">${teacher.teacher_id}</td>
                <td class="px-6 py-3 font-medium text-gray-800">${teacher.name}</td>
                <td class="px-6 py-3">${teacher.subject}</td>
                <td class="px-6 py-3">${teacher.position}</td>
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
                    <button onclick="deleteTeacher(${teacher.id})" 
                        class="text-red-500 hover:text-red-700" title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            teacherTableBody.appendChild(row);
        });
    } catch (error) {
        console.error("Gagal memuat data guru:", error);
    }
}

// ==================== DETAIL GURU ====================
function showTeacherDetail(id) {
    fetch(`/siakad/teacher/${id}`)
        .then(res => res.json())
        .then(t => {
            if (!t) return;

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
        .catch(err => console.error("Gagal memuat detail guru:", err));
}

// ==================== EDIT GURU ====================
function openEditTeacher(id) {
    fetch(`/siakad/teacher/${id}`)
        .then(res => res.json())
        .then(data => {
            if (!data) return;

            // Isi form modal edit
            editForm.action = `/siakad/teacher/${id}`; // set form action dinamis
            editForm.querySelector('#editTeacherId').value = data.teacher_id;
            editForm.querySelector('#editName').value = data.name;
            editForm.querySelector('#editSubject').value = data.subject;
            editForm.querySelector('#editPosition').value = data.position;
            editForm.querySelector('#editEmail').value = data.email;
            editForm.querySelector('#editPhone').value = data.phone;
            editForm.querySelector('#editStatus').value = data.status;

            openEditModal();
        })
        .catch(err => console.error("Gagal memuat data untuk edit:", err));
}

// ==================== DELETE GURU ====================
async function deleteTeacher(id) {
    if (!confirm("Yakin ingin menghapus guru ini?")) return;

    try {
        const res = await fetch(`/siakad/teacher/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            },
        });

        if (res.ok) loadTeachers();
        else alert("Gagal menghapus data guru!");
    } catch (error) {
        console.error("Gagal menghapus:", error);
    }
}

// ==================== INIT ====================
document.addEventListener("DOMContentLoaded", loadTeachers);
