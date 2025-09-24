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

                {{-- Loop data jurusan dari DB --}}
                @forelse($majors as $i => $jurusan)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $i+1 }}</td>
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $jurusan->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $jurusan->major_code }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $jurusan->description }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            {{ $jurusan->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($jurusan->status) }}
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
                        <form action="{{ route('majors.destroy', $jurusan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus jurusan {{ $jurusan->name }}?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </form>
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
</div>
@endsection
