document.addEventListener('DOMContentLoaded', () => {
<<<<<<< HEAD
    const btnAdd = document.getElementById('btnAdd');
    const modalAdd = document.getElementById('modalAdd');
    const btnCloseAdd = document.getElementById('btnCloseAdd');
    const btnCancelAdd = document.getElementById('btnCancelAdd');

    // Pastikan semua elemen ditemukan
    if (!btnAdd || !modalAdd || !btnCloseAdd || !btnCancelAdd) {
        console.error("Elemen modal tambah tidak ditemukan di halaman");
        return;
    }

    // Buka modal
    btnAdd.addEventListener('click', () => {
        modalAdd.classList.remove('hidden');
    });

    // Tutup modal (tombol close dan batal)
    [btnCloseAdd, btnCancelAdd].forEach(btn => {
        btn.addEventListener('click', () => {
            modalAdd.classList.add('hidden');
        });
    });

    // Tutup modal jika klik di luar box
    modalAdd.addEventListener('click', (e) => {
        if (e.target === modalAdd) modalAdd.classList.add('hidden');
    });
=======
    const LS_KEY = 'kelasData';
    const LS_JURUSAN = 'jurusanData';

    const modal = document.getElementById('modal');
    const modalBox = document.getElementById('modalBox');
    const form = document.getElementById('formKelas');
    const btnAdd = document.getElementById('btnAdd');
    const btnCancel = document.getElementById('btnCancel');
    const tableBody = document.getElementById('tableBody');
    const searchInput = document.getElementById('searchInput');
    const filterJurusan = document.getElementById('filterJurusan');

    let data = JSON.parse(localStorage.getItem(LS_KEY)) || [];

    // ===== Load jurusan dari localStorage =====
    const jurusanList = JSON.parse(localStorage.getItem(LS_JURUSAN)) || [];
    filterJurusan.innerHTML += jurusanList.map(j => `<option value="${j.nama}">${j.nama}</option>`).join('');

    // ===== Render Table =====
    function renderTable() {
        const keyword = searchInput.value.toLowerCase();
        const jurusanFilter = filterJurusan.value;
        const filtered = data.filter(k =>
            (k.kode.toLowerCase().includes(keyword) ||
             k.nama.toLowerCase().includes(keyword) ||
             k.wali.toLowerCase().includes(keyword)) &&
            (jurusanFilter ? k.jurusan === jurusanFilter : true)
        );

        // === Jika tidak ada data ===
        if (filtered.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="6">
                        <div class="flex flex-col items-center justify-center py-20 bg-white rounded-xl border border-gray-100 shadow-sm transition-opacity duration-300 ease-in-out opacity-0 animate-fadeIn">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="h-14 w-14 mb-5 text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M2.25 12.75V9.75A2.25 2.25 0 014.5 7.5h4.621a1.5 1.5 0 001.06-.44l1.378-1.378a1.5 1.5 0 011.06-.44h5.379A2.25 2.25 0 0120.25 7.5v1.5m0 0v8.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V9m16.5 0H3.75" />
                            </svg>
                            <p class="font-semibold text-gray-600 text-lg mb-1">Belum ada data kelas</p>
                            <p class="text-sm text-gray-400">
                                Klik tombol <span class="text-orange-500 font-medium">Tambah Kelas</span> untuk menambahkan data baru.
                            </p>
                        </div>
                    </td>
                </tr>
            `;
        } else {
            // === Jika ada data ===
            tableBody.innerHTML = filtered.map((k, i) => `
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">${k.kode}</td>
                    <td class="px-4 py-3">${k.nama}</td>
                    <td class="px-4 py-3">${k.jurusan}</td>
                    <td class="px-4 py-3">${k.wali}</td>
                    <td class="px-4 py-3">${k.siswa}</td>
                    <td class="px-4 py-3 space-x-2">
                        <button onclick="editData(${i})" class="text-blue-500 hover:underline">Edit</button>
                        <button onclick="deleteData(${i})" class="text-red-500 hover:underline">Hapus</button>
                    </td>
                </tr>
            `).join('');
        }

        // Statistik (jika elemen ada)
        const totalKelas = document.getElementById('totalKelas');
        const totalJurusan = document.getElementById('totalJurusan');
        const waliAktif = document.getElementById('waliAktif');
        const totalSiswa = document.getElementById('totalSiswa');
        if (totalKelas) totalKelas.textContent = data.length;
        if (totalJurusan) totalJurusan.textContent = new Set(data.map(d => d.jurusan)).size;
        if (waliAktif) waliAktif.textContent = data.filter(d => d.wali).length;
        if (totalSiswa) totalSiswa.textContent = data.reduce((a, b) => a + Number(b.siswa), 0);
    }

    // ===== Modal Controls =====
    btnAdd.addEventListener('click', () => openModal());
    btnCancel.addEventListener('click', closeModal);
    modal.addEventListener('click', e => {
        if (e.target === modal) closeModal(); // klik di luar modalBox menutup modal
    });

    function openModal(editItem = null) {
        document.body.classList.add('overflow-hidden');
        modal.classList.remove('hidden');

        // animasi buka modal
        setTimeout(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);

        if (editItem) {
            document.getElementById('modalTitle').textContent = 'Edit Data Kelas';
            Object.keys(editItem).forEach(k => {
                if (form[k]) form[k].value = editItem[k];
            });
        } else {
            document.getElementById('modalTitle').textContent = 'Tambah Kelas Baru';
            form.reset();
        }
    }

    function closeModal() {
        modalBox.classList.remove('opacity-100', 'scale-100');
        modalBox.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 250);
    }

    // ===== CRUD =====
    form.addEventListener('submit', e => {
        e.preventDefault();
        const formData = Object.fromEntries(new FormData(form).entries());
        const index = formData.id ? data.findIndex(d => d.id == formData.id) : -1;
        formData.id = formData.id || Date.now();

        if (index >= 0) data[index] = formData;
        else data.push(formData);

        localStorage.setItem(LS_KEY, JSON.stringify(data));
        renderTable();
        closeModal();
    });

    // ===== Edit & Delete =====
    window.editData = i => openModal(data[i]);
    window.deleteData = i => {
        if (confirm('Yakin ingin menghapus data ini?')) {
            data.splice(i, 1);
            localStorage.setItem(LS_KEY, JSON.stringify(data));
            renderTable();
        }
    };

    // ===== Search & Filter =====
    searchInput.addEventListener('input', renderTable);
    filterJurusan.addEventListener('change', renderTable);

    // ===== Animasi Keyframes =====
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out forwards;
        }
    `;
    document.head.appendChild(style);

    // ===== Initial Render =====
    renderTable();
>>>>>>> 9995902 (majors and class)
});
