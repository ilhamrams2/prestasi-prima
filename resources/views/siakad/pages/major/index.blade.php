@extends('siakad.index')

@section('title', 'Jurusan - SIAKAD Sekolah')

@section('content')
<div class="space-y-10">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Manajemen Jurusan</h1>
            <p class="text-sm text-gray-500">Kelola data jurusan sekolah dengan mudah dan profesional</p>
        </div>
        <button onclick="openForm('tambah')" 
            class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-orange-500 to-yellow-500 text-white text-sm font-semibold rounded-xl shadow-lg hover:opacity-90 transition">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Jurusan
        </button>
    </div>

    {{-- Tabel Jurusan --}}
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Nama Jurusan</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">

                {{-- Loop data jurusan --}}
                @foreach([
                    ['nama'=>'PPLG','kode'=>'RPL','desk'=>'Pengembangan Perangkat Lunak & Gim','status'=>'aktif','kepala'=>'Bapak Andi','kelas'=>5,'siswa'=>160],
                    ['nama'=>'DKV','kode'=>'DKV','desk'=>'Desain Komunikasi Visual & Multimedia','status'=>'aktif','kepala'=>'Ibu Sinta','kelas'=>4,'siswa'=>120],
                    ['nama'=>'TJKT','kode'=>'TJKT','desk'=>'Teknik Jaringan Komputer & Telekomunikasi','status'=>'aktif','kepala'=>'Bapak Rudi','kelas'=>6,'siswa'=>180],
                    ['nama'=>'BC','kode'=>'BC','desk'=>'Broadcasting & Produksi Konten','status'=>'aktif','kepala'=>'Ibu Maya','kelas'=>3,'siswa'=>90],
                ] as $i => $jurusan)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $i+1 }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $jurusan['nama'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $jurusan['kode'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $jurusan['desk'] }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            {{ $jurusan['status']=='aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($jurusan['status']) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right flex items-center justify-end gap-2">
                        {{-- Show Detail --}}
                        <button onclick="showDetail(@json($jurusan))" 
                            class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition" title="Lihat Detail">
                            <i data-lucide="eye" class="w-5 h-5"></i>
                        </button>
                        {{-- Edit --}}
                        <button onclick="openForm('edit', @json($jurusan))" 
                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                        </button>
                        {{-- Delete --}}
                        <button onclick="confirmDelete('{{ $jurusan['nama'] }}')" 
                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Show Detail --}}
<div id="modalShow" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl w-full max-w-lg shadow-2xl p-6 animate-fadeIn">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-xl font-bold text-gray-900">Detail Jurusan</h2>
            <button onclick="closeShow()" class="text-gray-500 hover:text-red-500">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <div id="detailContent" class="space-y-4"></div>
    </div>
</div>

{{-- Modal Tambah/Edit --}}
<div id="modalForm" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl w-full max-w-lg shadow-2xl p-6 animate-fadeIn">
        <div class="flex items-center justify-between mb-5">
            <h2 id="formTitle" class="text-xl font-bold text-gray-900">Tambah Jurusan</h2>
            <button onclick="closeForm()" class="text-gray-500 hover:text-red-500">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <form id="jurusanForm" class="space-y-4">
            <div>
                <label class="text-sm text-gray-600">Nama Jurusan</label>
                <input type="text" id="nama" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <label class="text-sm text-gray-600">Kode</label>
                <input type="text" id="kode" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
            </div>
            <div>
                <label class="text-sm text-gray-600">Kepala Program</label>
                <input type="text" id="kepala" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-600">Jumlah Kelas</label>
                    <input type="number" id="kelas" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                    <label class="text-sm text-gray-600">Jumlah Siswa</label>
                    <input type="number" id="siswa" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                </div>
            </div>
            <div>
                <label class="text-sm text-gray-600">Deskripsi</label>
                <textarea id="desk" rows="2" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500"></textarea>
            </div>
            <div>
                <label class="text-sm text-gray-600">Status</label>
                <select id="status" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>
            <div class="pt-3 flex justify-end">
                <button type="button" onclick="saveForm()" class="px-5 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold rounded-lg shadow hover:opacity-90 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Toast Notification --}}
<div id="toast" class="hidden fixed bottom-6 right-6 bg-green-500 text-white px-4 py-2 rounded-xl shadow-lg">
    Data berhasil disimpan!
</div>
@endsection

@push('scripts')
<script>
    lucide.createIcons();

    // === Modal Show Detail ===
    function showDetail(jurusan) {
        let content = `
            <div class="space-y-3">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">${jurusan.nama} (${jurusan.kode})</h3>
                    <p class="text-sm text-gray-600">${jurusan.desk}</p>
                </div>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="p-3 bg-gray-50 rounded-xl">
                        <p class="text-gray-500">Kepala Program</p>
                        <p class="font-medium text-gray-800">${jurusan.kepala}</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-xl">
                        <p class="text-gray-500">Jumlah Kelas</p>
                        <p class="font-medium text-gray-800">${jurusan.kelas}</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-xl">
                        <p class="text-gray-500">Jumlah Siswa</p>
                        <p class="font-medium text-gray-800">${jurusan.siswa}</p>
                    </div>
                    <div class="p-3 bg-gray-50 rounded-xl">
                        <p class="text-gray-500">Status</p>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            ${jurusan.status==='aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
                            ${jurusan.status}
                        </span>
                    </div>
                </div>
            </div>
        `;
        document.getElementById('detailContent').innerHTML = content;
        document.getElementById('modalShow').classList.remove('hidden');
    }
    function closeShow() {
        document.getElementById('modalShow').classList.add('hidden');
    }

    // === Modal Form Tambah/Edit ===
    function openForm(mode, jurusan = null) {
        document.getElementById('modalForm').classList.remove('hidden');
        document.getElementById('formTitle').textContent = mode === 'edit' ? 'Edit Jurusan' : 'Tambah Jurusan';

        // reset form
        document.getElementById('jurusanForm').reset();

        if(mode === 'edit' && jurusan) {
            document.getElementById('nama').value = jurusan.nama;
            document.getElementById('kode').value = jurusan.kode;
            document.getElementById('kepala').value = jurusan.kepala;
            document.getElementById('kelas').value = jurusan.kelas;
            document.getElementById('siswa').value = jurusan.siswa;
            document.getElementById('desk').value = jurusan.desk;
            document.getElementById('status').value = jurusan.status;
        }
    }
    function closeForm() {
        document.getElementById('modalForm').classList.add('hidden');
    }
    function saveForm() {
        closeForm();
        showToast("Data jurusan berhasil disimpan!");
    }

    // === Delete ===
    function confirmDelete(nama) {
        if (confirm('Yakin ingin menghapus jurusan ' + nama + '?')) {
            showToast('Jurusan ' + nama + ' berhasil dihapus!', 'red');
        }
    }

    // === Toast ===
    function showToast(message, color = 'green') {
        let toast = document.getElementById('toast');
        toast.textContent = message;
        toast.classList.remove('hidden');
        toast.classList.remove('bg-green-500','bg-red-500');
        toast.classList.add(color === 'red' ? 'bg-red-500' : 'bg-green-500');
        setTimeout(() => toast.classList.add('hidden'), 3000);
    }
</script>
@endpush
