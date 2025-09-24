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
        <button onclick="openModal('tambah')" 
            class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-orange-500 to-yellow-500 text-white text-sm font-semibold rounded-xl shadow-lg hover:opacity-90 transition">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Jurusan
        </button>
    </div>

    {{-- Filter & Search --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 bg-white rounded-2xl shadow-sm border">
        <div class="relative w-full md:w-1/3">
            <input type="text" placeholder="Cari jurusan..." 
                class="w-full pl-10 pr-4 py-2.5 border rounded-xl text-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
            <i data-lucide="search" class="absolute left-3 top-3 w-4 h-4 text-gray-400"></i>
        </div>
        <div class="flex gap-3">
            <select class="px-4 py-2.5 border rounded-xl text-sm focus:ring-2 focus:ring-orange-500">
                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
            <button class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 rounded-xl text-sm">Reset</button>
        </div>
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
                    ['nama'=>'PPLG','kode'=>'RPL','desk'=>'Pengembangan Perangkat Lunak & Gim','status'=>'aktif'],
                    ['nama'=>'DKV','kode'=>'DKV','desk'=>'Desain Komunikasi Visual & Multimedia','status'=>'aktif'],
                    ['nama'=>'TJKT','kode'=>'TJKT','desk'=>'Teknik Jaringan Komputer & Telekomunikasi','status'=>'aktif'],
                    ['nama'=>'BC','kode'=>'BC','desk'=>'Broadcasting & Produksi Konten','status'=>'aktif'],
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
                        <button onclick="openModal('edit', '{{ $jurusan['nama'] }}')" 
                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                        </button>
                        <button onclick="confirmDelete('{{ $jurusan['nama'] }}')" 
                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="flex justify-between items-center p-4 bg-gray-50 border-t">
            <p class="text-sm text-gray-500">Menampilkan 1–4 dari 4 jurusan</p>
            <div class="flex items-center gap-1">
                <button class="px-3 py-1 rounded-lg border hover:bg-gray-100">«</button>
                <button class="px-3 py-1 rounded-lg bg-orange-500 text-white">1</button>
                <button class="px-3 py-1 rounded-lg border hover:bg-gray-100">»</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah/Edit --}}
<div id="modalJurusan" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-2xl animate-fadeIn">
        <div class="flex items-center justify-between mb-4">
            <h2 id="modalTitle" class="text-lg font-bold">Tambah Jurusan</h2>
            <button onclick="closeModal()" class="text-gray-500 hover:text-red-500">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <form id="formJurusan">
            <input type="text" placeholder="Nama Jurusan" class="w-full mb-3 px-3 py-2 border rounded-xl focus:ring-2 focus:ring-orange-500">
            <input type="text" placeholder="Kode Jurusan" class="w-full mb-3 px-3 py-2 border rounded-xl focus:ring-2 focus:ring-orange-500">
            <textarea placeholder="Deskripsi" class="w-full mb-3 px-3 py-2 border rounded-xl focus:ring-2 focus:ring-orange-500"></textarea>
            <select class="w-full mb-4 px-3 py-2 border rounded-xl focus:ring-2 focus:ring-orange-500">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-200 rounded-xl">Batal</button>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-xl">Simpan</button>
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

    function openModal(mode, nama = '') {
        document.getElementById('modalJurusan').classList.remove('hidden');
        document.getElementById('modalTitle').textContent = mode === 'edit' ? 'Edit Jurusan: ' + nama : 'Tambah Jurusan';
    }
    function closeModal() {
        document.getElementById('modalJurusan').classList.add('hidden');
    }

    function confirmDelete(nama) {
        if (confirm('Yakin ingin menghapus jurusan ' + nama + '?')) {
            showToast('Jurusan ' + nama + ' berhasil dihapus!', 'red');
        }
    }

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
