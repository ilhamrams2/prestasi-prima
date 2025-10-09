const modalTambah = document.getElementById('modalTambah');
const modalEdit = document.getElementById('modalEdit');
const modalDetail = document.getElementById('modalDetail');
const modalBoxTambah = modalTambah.querySelector('div');
const modalBoxEdit = modalEdit.querySelector('div');
const modalDetailBox = document.getElementById('modalDetailBox');
const formTambah = document.getElementById('kelasForm');
const formEdit = document.getElementById('kelasEditForm');
const tableBody = document.querySelector('#kelasTable tbody');

function openModalTambah() {
    modalTambah.classList.remove('hidden');
    setTimeout(()=>modalBoxTambah.classList.remove('scale-95','opacity-0'),50);
}
function closeModalTambah() {
    modalBoxTambah.classList.add('scale-95','opacity-0');
    setTimeout(()=>{modalTambah.classList.add('hidden'); formTambah.reset();},200);
}

function openModalEdit(row) {
    const cells = row.children;
    formEdit.innerHTML = `
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Kode Kelas</label>
            <input type="text" name="kode" value="${cells[0].innerText}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Kelas</label>
            <input type="text" name="nama" value="${cells[1].innerText}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Jurusan</label>
            <input type="text" name="jurusan" value="${cells[2].innerText.replace(/<[^>]*>?/gm,'')}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Wali Kelas</label>
            <input type="text" name="wali" value="${cells[3].innerText}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
        </div>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah Siswa</label>
        <input type="number" name="jumlah" value="${cells[4].innerText}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-400">
    </div>
    <div class="flex justify-end gap-3 pt-4 border-t">
        <button type="button" onclick="closeModalEdit()" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">Update</button>
    </div>
    `;

    modalEdit.classList.remove('hidden');
    setTimeout(()=>modalBoxEdit.classList.remove('scale-95','opacity-0'),50);

    formEdit.onsubmit = function(e){ 
        e.preventDefault();
        const formData = new FormData(formEdit);
        cells[0].innerText = formData.get('kode');
        cells[1].innerText = formData.get('nama');
        cells[2].innerHTML = `<span class="bg-gray-100 px-2 py-1 rounded text-sm">${formData.get('jurusan')}</span>`;
        cells[3].innerText = formData.get('wali');
        cells[4].innerText = formData.get('jumlah');
        closeModalEdit();
    }
}

function closeModalEdit() {
    modalBoxEdit.classList.add('scale-95','opacity-0');
    setTimeout(()=>{ modalEdit.classList.add('hidden'); formEdit.reset();},200);
}

function openModalDetail(row) {
    const cells = row.children;
    modalDetailBox.innerHTML = `
        <div class="flex justify-between items-center px-8 py-5 border-b">
            <h2 class="text-2xl font-bold text-gray-900">Detail Kelas</h2>
            <button onclick="closeModalDetail()" class="text-gray-400 hover:text-gray-600 transition">
                <i class="ri-close-line text-3xl"></i>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 divide-x">
            <div class="col-span-1 p-6 flex flex-col items-center text-center space-y-4">
                <div class="w-24 h-24 rounded-full bg-orange-500 flex items-center justify-center text-white text-4xl font-extrabold shadow-lg">${cells[1].innerText.charAt(0).toUpperCase()}</div>
                <h3 class="text-xl font-semibold text-gray-900">${cells[1].innerText}</h3>
                <span class="mt-1 inline-block px-3 py-1 text-sm font-medium rounded-full bg-green-100 text-green-700">Aktif</span>
            </div>
            <div class="col-span-2 p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-bar-chart-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Kode Kelas</p>
                        <p class="text-gray-800 text-lg">${cells[0].innerText}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-book-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Jurusan</p>
                        <p class="text-gray-800 text-lg">${cells[2].innerText.replace(/<[^>]*>?/gm,'')}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-user-3-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Wali Kelas</p>
                        <p class="text-gray-800 text-lg">${cells[3].innerText}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-lg shadow-sm">
                    <i class="ri-group-line text-orange-500 text-2xl"></i>
                    <div>
                        <p class="text-sm font-semibold text-gray-600">Jumlah Siswa</p>
                        <p class="text-gray-800 text-lg">${cells[4].innerText}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end px-8 py-4 border-t">
            <button onclick="closeModalDetail()" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">Tutup</button>
        </div>
    `;
    modalDetail.classList.remove('hidden');
    setTimeout(()=> modalDetailBox.classList.remove('scale-95','opacity-0'),50);
}

function closeModalDetail() {
    modalDetailBox.classList.add('scale-95','opacity-0');
    setTimeout(()=> modalDetail.classList.add('hidden'),200);
}

formTambah.addEventListener('submit', function(e){
    e.preventDefault();
    const data = new FormData(formTambah);
    const row = document.createElement('tr');
    row.classList.add('border-t','hover:bg-gray-50','transition');
    row.innerHTML = `
        <td class="px-4 py-3">${data.get('kode')}</td>
        <td class="px-4 py-3 font-medium">${data.get('nama')}</td>
        <td class="px-4 py-3"><span class="bg-gray-100 px-2 py-1 rounded text-sm">${data.get('jurusan')}</span></td>
        <td class="px-4 py-3">${data.get('wali')}</td>
        <td class="px-4 py-3">${data.get('jumlah')}</td>
        <td class="px-4 py-3 flex space-x-3">
            <button title="Detail" class="text-blue-500 hover:text-blue-700" onclick="openModalDetail(this.closest('tr'))"><i class="ri-eye-line"></i></button>
            <button title="Edit" class="text-orange-500 hover:text-orange-700" onclick="openModalEdit(this.closest('tr'))"><i class="ri-edit-line"></i></button>
            <button title="Hapus" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
        </td>`;
    tableBody.appendChild(row);
    closeModalTambah();
});

function confirmDelete(btn) { 
    if(confirm("Apakah yakin ingin menghapus kelas ini?")) btn.closest('tr').remove(); 
}

// Close modal jika klik di luar
[modalTambah, modalEdit, modalDetail].forEach(modal => {
    modal.addEventListener('click', e => { if(e.target === modal){ modal.classList.add('hidden'); } });
});
