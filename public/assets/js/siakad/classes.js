document.addEventListener('DOMContentLoaded', () => {
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
});
