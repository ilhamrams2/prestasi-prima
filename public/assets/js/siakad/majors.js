let data = [];

let currentPage = 1;
const perPage = 5;
let currentSort = { key: null, dir: 'asc' };

// ==================== ELEMENTS ====================
const tableBody = document.getElementById('tableBody');
const cardList = document.getElementById('cardList');
const emptyState = document.getElementById('emptyState');
const paginationEl = document.getElementById('pagination');
const summaryText = document.getElementById('summaryText');
const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');

const modal = document.getElementById('modal');
const modalBox = document.getElementById('modalBox');
const modalTitle = document.getElementById('modalTitle');
const formJurusan = document.getElementById('formJurusan');
const btnCancel = document.getElementById('btnCancel');

const modalView = document.getElementById('modalView');
const viewNama = document.getElementById('viewNama');
const viewKepala = document.getElementById('viewKepala');
const viewKode = document.getElementById('viewKode');
const viewKelas = document.getElementById('viewKelas');
const viewSiswa = document.getElementById('viewSiswa');
const viewStatus = document.getElementById('viewStatus');

// ==================== RENDERING ====================
function compare(a, b, key, dir = 'asc') {
    let va = typeof a[key] === 'string' ? a[key].toLowerCase() : a[key];
    let vb = typeof b[key] === 'string' ? b[key].toLowerCase() : b[key];
    if (va < vb) return dir === 'asc' ? -1 : 1;
    if (va > vb) return dir === 'asc' ? 1 : -1;
    return 0;
}

function render() {
    const q = searchInput.value.trim().toLowerCase();
    const filterVal = statusFilter.value;
    let filtered = data.filter(d => {
        const matchQ = [d.nama, d.kode, d.kepala].join(' ').toLowerCase().includes(q);
        const matchStatus = (filterVal === 'all') || (d.status === filterVal);
        return matchQ && matchStatus;
    });

    if (currentSort.key) filtered.sort((a, b) => compare(a, b, currentSort.key, currentSort.dir));

    const total = filtered.length;
    const totalPages = Math.max(1, Math.ceil(total / perPage));
    if (currentPage > totalPages) currentPage = totalPages;
    const start = (currentPage - 1) * perPage;
    const pageData = filtered.slice(start, start + perPage);

    summaryText.textContent = total ? 
        `Menampilkan ${start + 1}-${start + pageData.length} dari ${total} jurusan` : 
        "Tidak ada data";

    renderTable(pageData);
    renderCards(pageData);
    renderPagination(totalPages);
    updateStats();
}

function renderTable(pageData) {
    tableBody.innerHTML = '';
    if (!pageData.length) return emptyState.classList.remove('hidden');
    emptyState.classList.add('hidden');

    pageData.forEach(row => {
        const tr = document.createElement('tr');
        tr.className = 'hover:bg-gray-50';
        tr.innerHTML = `
            <td class="px-4 py-3">${row.nama}</td>
            <td class="px-4 py-3">${row.kode}</td>
            <td class="px-4 py-3">${row.kepala}</td>
            <td class="px-4 py-3">${row.kelas}</td>
            <td class="px-4 py-3">${row.siswa}</td>
            <td class="px-4 py-3">
                <span class="px-2 py-1 rounded text-sm ${row.status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
                    ${row.status}
                </span>
            </td>
            <td class="px-4 py-3 flex gap-2">
                <button onclick="viewJurusan(${row.id})" class="text-gray-500 hover:text-gray-800"><i class="ri-eye-line"></i></button>
                <button onclick="openModal('edit', ${row.id})" class="text-orange-500 hover:text-orange-700"><i class="ri-edit-line"></i></button>
                <button onclick="deleteJurusan(${row.id})" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
            </td>`;
        tableBody.appendChild(tr);
    });
}

function renderCards(pageData) {
    cardList.innerHTML = '';
    pageData.forEach(row => {
        const div = document.createElement('div');
        div.className = 'bg-white p-4 rounded-lg shadow';
        div.innerHTML = `
            <div class="flex justify-between items-start">
                <div>
                    <div class="font-semibold">${row.nama}</div>
                    <div class="text-xs text-gray-500">${row.kode} • ${row.kepala}</div>
                </div>
                <div class="text-sm font-medium ${row.status === 'aktif' ? 'text-green-600' : 'text-red-600'}">${row.status}</div>
            </div>
            <div class="mt-3 text-sm text-gray-600">Kelas: ${row.kelas} • Siswa: ${row.siswa}</div>
            <div class="mt-3 flex gap-3">
                <button onclick="viewJurusan(${row.id})" class="text-gray-500 hover:text-gray-800"><i class="ri-eye-line"></i></button>
                <button onclick="openModal('edit', ${row.id})" class="text-orange-500 hover:text-orange-700"><i class="ri-edit-line"></i></button>
                <button onclick="deleteJurusan(${row.id})" class="text-red-500 hover:text-red-700"><i class="ri-delete-bin-line"></i></button>
            </div>`;
        cardList.appendChild(div);
    });
}

function renderPagination(totalPages) {
    paginationEl.innerHTML = '';

    const prevBtn = createPageBtn('« Prev', currentPage > 1, () => { currentPage--; render(); });
    paginationEl.appendChild(prevBtn);

    for (let i = Math.max(1, currentPage - 2); i <= Math.min(totalPages, currentPage + 2); i++) {
        const btn = createPageBtn(i, true, () => { currentPage = i; render(); }, i === currentPage);
        paginationEl.appendChild(btn);
    }

    const nextBtn = createPageBtn('Next »', currentPage < totalPages, () => { currentPage++; render(); });
    paginationEl.appendChild(nextBtn);
}

function createPageBtn(label, enabled, onClick, active = false) {
    const btn = document.createElement('button');
    btn.textContent = label;
    btn.className = 'px-3 py-1 border rounded';
    if (active) btn.classList.add('bg-orange-500', 'text-white');
    btn.disabled = !enabled;
    btn.onclick = onClick;
    return btn;
}

function updateStats() {
    document.getElementById('statJurusan').textContent = data.length;
    document.getElementById('statKelas').textContent = data.reduce((sum,d)=>sum+d.kelas,0);
    document.getElementById('statSiswa').textContent = data.reduce((sum,d)=>sum+d.siswa,0);
}

// ==================== MODAL ACTIONS ====================
function openModal(mode, id=null) {
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalBox.classList.remove('translate-y-6','opacity-0');
        modalBox.classList.add('translate-y-0','opacity-100');
    },20);

    if(mode==='add'){
        modalTitle.textContent='Tambah Jurusan';
        formJurusan.reset();
        formJurusan.id.value='';
    } else if(mode==='edit'){
        modalTitle.textContent='Edit Jurusan';
        const jurusan = data.find(d=>d.id===id);
        formJurusan.id.value=jurusan.id;
        formJurusan.nama.value=jurusan.nama;
        formJurusan.kode.value=jurusan.kode;
        formJurusan.kepala.value=jurusan.kepala;
        formJurusan.kelas.value=jurusan.kelas;
        formJurusan.siswa.value=jurusan.siswa;
        formJurusan.status.value=jurusan.status;
    }
}

function closeModal(type='form'){
    if(type==='form'){
        modalBox.classList.remove('translate-y-0','opacity-100');
        modalBox.classList.add('translate-y-6','opacity-0');
        setTimeout(()=>modal.classList.add('hidden'),180);
    } else if(type==='view'){
        modalView.classList.add('hidden');
    }
}

btnCancel.addEventListener('click', ()=>closeModal('form'));
modal.addEventListener('click', e=>{if(e.target===modal) closeModal('form');});

formJurusan.addEventListener('submit', e=>{
    e.preventDefault();
    const fd = new FormData(formJurusan);
    const id = fd.get('id');

    if(id){
        const idx = data.findIndex(d=>d.id==id);
        data[idx]={ 
            id:Number(id), 
            nama:fd.get('nama'), 
            kode:fd.get('kode'), 
            kepala:fd.get('kepala'), 
            kelas:Number(fd.get('kelas')), 
            siswa:Number(fd.get('siswa')), 
            status:fd.get('status')
        };
    } else {
        data.unshift({ 
            id:Date.now(), 
            nama:fd.get('nama'), 
            kode:fd.get('kode'), 
            kepala:fd.get('kepala'), 
            kelas:Number(fd.get('kelas')), 
            siswa:Number(fd.get('siswa')), 
            status:fd.get('status')
        });
    }

    closeModal('form');
    currentPage = 1;
    render();
});

// ==================== VIEW & DELETE ====================
function viewJurusan(id){
    const jurusan = data.find(d=>d.id===id);
    viewNama.textContent = jurusan.nama;
    viewKepala.textContent = `Kepala Jurusan: ${jurusan.kepala}`;
    viewKode.textContent = jurusan.kode;
    viewKelas.textContent = jurusan.kelas;
    viewSiswa.textContent = jurusan.siswa;
    viewStatus.textContent = jurusan.status;
    viewStatus.className = `px-2 py-1 rounded text-sm ${jurusan.status==='aktif'?'bg-green-100 text-green-700':'bg-red-100 text-red-700'}`;
    modalView.classList.remove('hidden');
}

function deleteJurusan(id){
    if(confirm('Hapus jurusan ini?')){
        data = data.filter(d=>d.id!==id);
        render();
    }
}

// ==================== EVENTS ====================
searchInput.addEventListener('input', ()=>{currentPage=1; render();});
statusFilter.addEventListener('change', ()=>{currentPage=1; render();});
document.querySelectorAll('th[data-sort]').forEach(th=>{
    th.addEventListener('click', ()=>{
        const key = th.dataset.sort;
        currentSort = (currentSort.key===key) ? {key, dir: currentSort.dir==='asc'?'desc':'asc'} : {key, dir:'asc'};
        document.querySelectorAll('.sort-indicator').forEach(el=>el.textContent='');
        th.querySelector('.sort-indicator').textContent = currentSort.dir==='asc'?'↑':'↓';
        render();
    });
});

// ==================== INIT ====================
render();