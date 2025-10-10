document.addEventListener('DOMContentLoaded', () => {
<<<<<<< HEAD
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
=======
>>>>>>> ae60cab (update siakad kelas (belum final))
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

<<<<<<< HEAD
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
=======
    // Tutup modal jika klik di luar box
    modalAdd.addEventListener('click', (e) => {
        if (e.target === modalAdd) modalAdd.classList.add('hidden');
    });
>>>>>>> ae60cab (update siakad kelas (belum final))
});
