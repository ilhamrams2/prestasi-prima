@extends('layouts.admin')

@section('title', 'Daftar Industri')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Industri</h1>

    <a href="{{ route('prestasiprima.admin.industri.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Tambah Industri
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full border border-gray-200 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">No</th>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Slug</th>
                <th class="p-2 border">Logo</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($industris as $index => $industri)
            <tr class="text-center">
                <td class="p-2 border">{{ $index + 1 }}</td>
                <td class="p-2 border">{{ $industri->nama }}</td>
                <td class="p-2 border">{{ $industri->slug }}</td>
                <td class="p-2 border">
                    @if($industri->logo)
                        <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="h-10 mx-auto">
                    @else
                        <span class="text-gray-400">Tidak ada</span>
                    @endif
                </td>
                <td class="p-2 border space-x-2">
                    <a href="{{ route('prestasiprima.admin.industri.edit', $industri->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded">Edit</a>

                    <form action="{{ route('prestasiprima.admin.industri.destroy', $industri->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
