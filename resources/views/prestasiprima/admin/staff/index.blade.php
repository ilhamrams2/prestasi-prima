@extends('layouts.admin')

@section('title', 'Manajemen Staff')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Staff</h1>
    <a href="{{ route('prestasiprima.admin.staff.create') }}" 
       class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg shadow-md transition">
       Tambah Staff
    </a>
</div>

<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($staffs as $staff)
            <tr>
                <td class="px-6 py-4">
                    @if($staff->foto)
                        <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}" class="w-16 h-20 object-cover rounded">
                    @else
                        <div class="w-16 h-20 bg-gray-200 rounded flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4">{{ $staff->nama }}</td>
                <td class="px-6 py-4">{{ $staff->jabatan }}</td>
                <td class="px-6 py-4">{{ ucfirst($staff->kategori) }}</td>
                <td class="px-6 py-4 flex justify-center gap-2">
                    <a href="{{ route('prestasiprima.admin.staff.show', $staff->id) }}" 
                       class="text-blue-500 hover:text-blue-700"><i class="ri-eye-line text-lg"></i></a>
                    <a href="{{ route('prestasiprima.admin.staff.edit', $staff->id) }}" 
                       class="text-yellow-500 hover:text-yellow-700"><i class="ri-edit-line text-lg"></i></a>
                    <form action="{{ route('prestasiprima.admin.staff.destroy', $staff->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:text-red-700">
                            <i class="ri-delete-bin-line text-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $staffs->links() }}
</div>

@endsection
