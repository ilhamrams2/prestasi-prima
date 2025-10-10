@push('scripts')
<script>
const modal = document.getElementById('modal'),
      modalBox = document.getElementById('modalBox'),
      form = document.getElementById('siswaForm'),
      tableBody = document.querySelector('#siswaTable tbody'),
      searchInput = document.getElementById('searchInput');

function openModal() {
    modal.classList.remove('hidden');
    setTimeout(() => modalBox.classList.remove('scale-95','opacity-0'), 50);
}
function closeModal() {
    modalBox.classList.add('scale-95','opacity-0');
    setTimeout(() => { modal.classList.add('hidden'); form.reset(); }, 200);
}

// Tambah data ke tabel
form.addEventListener('submit', e => {
    e.preventDefault();
    const d = Object.fromEntries(new FormData(form));
    tableBody.insertAdjacentHTML('beforeend', `
        <tr class="border-t hover:bg-gray-50 transition">
            <td class="px-4 py-3">${d.nis}</td>
            <td class="px-4 py-3 font-medium">${d.nama}</td>
            <td class="px-4 py-3">${d.kelas}</td>
            <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">${d.jurusan}</span></td>
            <td class="px-4 py-3">${d.gender}</td>
            <td class="px-4 py-3">
                <span class="${d.status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'} px-2 py-1 rounded text-sm">${d.status}</span>
            </td>
            <td class="px-4 py-3 flex space-x-3">
                <button class="text-blue-500 hover:text-blue-700" title="Lihat"><i class="ri-eye-line"></i></button>
                <button class="text-orange-500 hover:text-orange-700" title="Edit"><i class="ri-edit-line"></i></button>
                <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus"><i class="ri-delete-bin-line"></i></button>
            </td>
        </tr>`);
    closeModal();
});

// Pencarian real-time
searchInput.addEventListener('keyup', e => {
    const val = e.target.value.toLowerCase();
    document.querySelectorAll('#siswaTable tbody tr').forEach(r => {
        r.style.display = r.innerText.toLowerCase().includes(val) ? '' : 'none';
    });
});

// Hapus konfirmasi
function confirmDelete(btn) {
    if (confirm("Apakah yakin ingin menghapus siswa ini?")) btn.closest('tr').remove();
}
</script>
<<<<<<< HEAD
<<<<<<< HEAD
@endpush
=======
@endpush
>>>>>>> 4d80e18 (update siakad)
=======
@endpush
>>>>>>> 911e62f (update frontend siakad)
