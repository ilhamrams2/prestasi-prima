/* =========================================================
   File: public/assets/js/siakad/majors.js
   Fungsi: CRUD Jurusan dengan penyimpanan localStorage
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {
    const storageKey = "data_jurusan";
    let jurusanList = JSON.parse(localStorage.getItem(storageKey)) || [];

    // Elemen-elemen penting
    const tableBody = document.getElementById("tableBody");
    const cardList = document.getElementById("cardList");
    const emptyState = document.getElementById("emptyState");
    const summaryText = document.getElementById("summaryText");

    const modal = document.getElementById("modal");
    const modalBox = document.getElementById("modalBox");
    const modalView = document.getElementById("modalView");
    const form = document.getElementById("formJurusan");
    const modalTitle = document.getElementById("modalTitle");

    const btnCancel = document.getElementById("btnCancel");

    let editMode = false;
    let editId = null;

    /* ========================== FUNGSI CORE ========================== */

    function saveToStorage() {
        localStorage.setItem(storageKey, JSON.stringify(jurusanList));
    }

    function renderTable() {
        tableBody.innerHTML = "";
        cardList.innerHTML = "";

        if (jurusanList.length === 0) {
            emptyState.classList.remove("hidden");
            summaryText.textContent = "";
            return;
        }

        emptyState.classList.add("hidden");
        summaryText.textContent = `Menampilkan ${jurusanList.length} jurusan`;

        jurusanList.forEach((item, index) => {
            // === Desktop Table ===
            const tr = document.createElement("tr");
            tr.className = "hover:bg-orange-50 transition";

            tr.innerHTML = `
                <td class="px-4 py-2">${item.nama}</td>
                <td class="px-4 py-2">${item.kode}</td>
                <td class="px-4 py-2">${item.kepala}</td>
                <td class="px-4 py-2">${item.kelas}</td>
                <td class="px-4 py-2">${item.siswa}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-sm ${
                        item.status === "aktif"
                            ? "bg-green-100 text-green-700"
                            : "bg-gray-200 text-gray-700"
                    }">
                        ${item.status}
                    </span>
                </td>
                <td class="px-4 py-2 space-x-2">
                    <button class="text-blue-600 hover:text-blue-800" onclick="viewJurusan(${index})">
                        <i class="ri-eye-line"></i>
                    </button>
                    <button class="text-orange-600 hover:text-orange-800" onclick="editJurusan(${index})">
                        <i class="ri-edit-line"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800" onclick="deleteJurusan(${index})">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </td>
            `;
            tableBody.appendChild(tr);

            // === Mobile Card ===
            const card = document.createElement("div");
            card.className =
                "border rounded-lg p-4 shadow-sm bg-white space-y-1";

            card.innerHTML = `
                <h3 class="text-lg font-semibold text-gray-800">${item.nama}</h3>
                <p class="text-sm text-gray-500">${item.kode} · ${item.kepala}</p>
                <p class="text-sm text-gray-500">Kelas: ${item.kelas}, Siswa: ${item.siswa}</p>
                <p class="text-sm">
                    Status: <span class="${
                        item.status === "aktif"
                            ? "text-green-600"
                            : "text-gray-500"
                    }">${item.status}</span>
                </p>
                <div class="flex gap-3 mt-2">
                    <button class="text-blue-600" onclick="viewJurusan(${index})"><i class="ri-eye-line"></i></button>
                    <button class="text-orange-600" onclick="editJurusan(${index})"><i class="ri-edit-line"></i></button>
                    <button class="text-red-600" onclick="deleteJurusan(${index})"><i class="ri-delete-bin-line"></i></button>
                </div>
            `;
            cardList.appendChild(card);
        });
    }

    /* ========================== MODAL HANDLING ========================== */

    function openModal() {
        modal.classList.remove("hidden");
        setTimeout(() => {
            modalBox.classList.remove("scale-95", "opacity-0");
            modalBox.classList.add("scale-100", "opacity-100");
        }, 10);
    }

    function closeModal() {
        modalBox.classList.add("scale-95", "opacity-0");
        setTimeout(() => {
            modal.classList.add("hidden");
        }, 200);
    }

    function openModalView() {
        modalView.classList.remove("hidden");
    }

    function closeModalView() {
        modalView.classList.add("hidden");
    }

    /* ========================== CRUD ACTIONS ========================== */

    // Tambah Jurusan
    window.addJurusan = function () {
        editMode = false;
        editId = null;
        form.reset();
        modalTitle.textContent = "Tambah Jurusan Baru";
        openModal();
    };

    // Edit Jurusan
    window.editJurusan = function (index) {
        editMode = true;
        editId = index;
        const data = jurusanList[index];

        modalTitle.textContent = "Edit Jurusan";
        form.nama.value = data.nama;
        form.kode.value = data.kode;
        form.kepala.value = data.kepala;
        form.kelas.value = data.kelas;
        form.siswa.value = data.siswa;
        form.status.value = data.status;

        openModal();
    };

    // Hapus Jurusan
    window.deleteJurusan = function (index) {
        if (confirm("Apakah Anda yakin ingin menghapus jurusan ini?")) {
            jurusanList.splice(index, 1);
            saveToStorage();
            renderTable();
        }
    };

    // Lihat Jurusan
    window.viewJurusan = function (index) {
        const item = jurusanList[index];

        document.getElementById("viewNama").textContent = item.nama;
        document.getElementById("viewKepala").textContent = item.kepala;
        document.getElementById("viewKode").textContent = item.kode;
        document.getElementById("viewKelas").textContent = item.kelas;
        document.getElementById("viewSiswa").textContent = item.siswa;

        const statusEl = document.getElementById("viewStatus");
        statusEl.textContent = item.status;
        statusEl.className =
            "px-2 py-1 rounded text-sm " +
            (item.status === "aktif"
                ? "bg-green-100 text-green-700"
                : "bg-gray-200 text-gray-700");

        openModalView();
    };

    window.closeModal = function (type = "form") {
        if (type === "view") closeModalView();
        else closeModal();
    };

    /* ========================== FORM SUBMIT ========================== */
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const data = {
            nama: form.nama.value.trim(),
            kode: form.kode.value.trim(),
            kepala: form.kepala.value.trim(),
            kelas: parseInt(form.kelas.value),
            siswa: parseInt(form.siswa.value),
            status: form.status.value,
        };

        if (editMode) {
            jurusanList[editId] = data;
        } else {
            jurusanList.push(data);
        }

        saveToStorage();
        renderTable();
        closeModal();
    });

    btnCancel.addEventListener("click", closeModal);

    /* ========================== INIT ========================== */
    renderTable();
});
