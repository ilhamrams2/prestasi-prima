@extends('siakad.index')

@section('title', 'Jurusan - SIAKAD Sekolah')

@section('content')
    <div class="space-y-10" x-data="majorsHandler()">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">Manajemen Jurusan</h1>
                <p class="text-sm text-gray-500">Kelola data jurusan sekolah dengan mudah</p>
            </div>
            <button @click="openForm('tambah')"
                class="flex items-center px-5 py-2.5 bg-gradient-to-r from-orange-500 to-yellow-500 text-white text-sm font-semibold rounded-xl shadow hover:opacity-90">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Jurusan
            </button>
        </div>

        {{-- Tabel Jurusan --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">#</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Nama Jurusan</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Kode</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase">Deskripsi</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase text-center">Status</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-600 uppercase text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($majors as $i => $jurusan)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $i + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-semibold">{{ $jurusan->name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $jurusan->major_code }}</td>
                            <td class="px-6 py-4 text-sm">{{ $jurusan->description }}</td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full
                            {{ $jurusan->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($jurusan->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right flex gap-2 justify-end">
                                <button @click="showDetail(@js($jurusan))"
                                    class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg">
                                    <i data-lucide="eye" class="w-5 h-5"></i>
                                </button>
                                <button @click="openForm('edit', @js($jurusan))"
                                    class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                                </button>
                                <button
                                    @click="confirmDelete('{{ route('majors.destroy', $jurusan->id) }}', '{{ $jurusan->name }}')"
                                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data jurusan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ================= MODAL FORM (Tambah/Edit) ================= --}}
        <div x-show="isFormOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
            <div class="bg-white w-full max-w-xl rounded-2xl shadow-2xl p-6 relative">

                <button @click="closeForm" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>

                <h2 class="text-xl font-bold mb-6" x-text="formMode === 'tambah' ? 'Tambah Jurusan Baru' : 'Edit Jurusan'">
                </h2>

                <form
                    :action="formMode === 'tambah' ? '{{ route('majors.store') }}' : '{{ url('majors') }}/' + formData.id"
                    method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    <template x-if="formMode === 'edit'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Jurusan</label>
                        <input type="text" name="name" x-model="formData.name"
                            class="mt-1 w-full border-gray-300 rounded-xl shadow-sm focus:ring-orange-500 focus:border-orange-500 text-sm"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Kode Jurusan</label>
                        <input type="text" name="major_code" x-model="formData.major_code"
                            class="mt-1 w-full border-gray-300 rounded-xl shadow-sm focus:ring-orange-500 focus:border-orange-500 text-sm"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" x-model="formData.description"
                            class="mt-1 w-full border-gray-300 rounded-xl shadow-sm focus:ring-orange-500 focus:border-orange-500 text-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Logo / Gambar Jurusan</label>
                        <input type="file" name="image" class="mt-1 w-full text-sm border border-gray-300 rounded-xl"
                            @change="previewImage($event)">
                        <template x-if="formData.image">
                            <img :src="formData.image" alt="Preview" class="mt-2 h-20 rounded-lg border object-cover">
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" x-model="formData.status"
                            class="mt-1 w-full border-gray-300 rounded-xl shadow-sm focus:ring-orange-500 focus:border-orange-500 text-sm">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t">
                        <button type="button" @click="closeForm"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2 rounded-lg bg-gradient-to-r from-orange-500 to-yellow-500 text-white font-semibold shadow hover:opacity-90 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- ================= MODAL DETAIL ================= --}}
        <div x-show="isDetailOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
            <div class="bg-white w-full max-w-lg rounded-2xl shadow-2xl p-6 relative">

                <button @click="isDetailOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>

                <div class="flex items-center gap-3 mb-6 border-b pb-3">
                    <i data-lucide="info" class="w-6 h-6 text-purple-600"></i>
                    <h2 class="text-xl font-bold">Detail Jurusan</h2>
                </div>

                <div class="space-y-4 text-sm">
                    <template x-if="detailData.image">
                        <div class="flex justify-center">
                            <img :src="detailData.image" alt="Jurusan Image"
                                class="h-28 w-28 rounded-xl border object-cover shadow">
                        </div>
                    </template>

                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-gray-500">Nama</p>
                        <p class="col-span-2 font-semibold" x-text="detailData.name"></p>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-gray-500">Kode</p>
                        <p class="col-span-2 font-semibold" x-text="detailData.major_code"></p>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-gray-500">Deskripsi</p>
                        <p class="col-span-2 text-gray-700" x-text="detailData.description || '-'"></p>
                    </div>
                    <div class="grid grid-cols-3 gap-2 items-center">
                        <p class="text-gray-500">Status</p>
                        <div class="col-span-2">
                            <span class="inline-flex items-center gap-1 px-3 py-1 text-sm font-medium rounded-full"
                                :class="detailData.status === 'aktif' ? 'bg-green-100 text-green-700' :
                                    'bg-red-100 text-red-700'">
                                <i :data-lucide="detailData.status === 'aktif' ? 'check-circle' : 'x-circle'"
                                    class="w-4 h-4"></i>
                                <span x-text="detailData.status"></span>
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-gray-500">Dibuat</p>
                        <p class="col-span-2 text-gray-700" x-text="detailData.created_at"></p>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <p class="text-gray-500">Diupdate</p>
                        <p class="col-span-2 text-gray-700" x-text="detailData.updated_at"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function majorsHandler() {
            return {
                isFormOpen: false,
                isDetailOpen: false,
                formMode: 'tambah',
                formData: {
                    id: '',
                    name: '',
                    major_code: '',
                    description: '',
                    status: 'aktif',
                    image: ''
                },
                detailData: {},

                openForm(mode, data = null) {
                    this.formMode = mode;
                    this.formData = mode === 'edit' && data ? {
                        ...data
                    } : {
                        id: '',
                        name: '',
                        major_code: '',
                        description: '',
                        status: 'aktif',
                        image: ''
                    };
                    this.isFormOpen = true;
                },
                closeForm() {
                    this.isFormOpen = false
                },
                showDetail(data) {
                    this.detailData = data;
                    this.isDetailOpen = true
                },
                previewImage(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.formData.image = URL.createObjectURL(file);
                    }
                },
                confirmDelete(url, name) {
                    Swal.fire({
                        title: 'Hapus Jurusan?',
                        text: `Apakah Anda yakin ingin menghapus jurusan ${name}?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e3342f',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = url;
                            form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">`;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                }
            }
        }
    </script>
@endsection
