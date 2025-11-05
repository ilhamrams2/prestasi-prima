@extends('layouts.admin')

@section('title', 'Detail Staff')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Detail Staff</h2>

    <div class="flex gap-6">
        <div>
            <img src="{{ asset('storage/staff/' . $staff->foto) }}" alt="{{ $staff->nama }}" class="w-48 h-60 object-cover rounded-lg shadow">
        </div>
        <div class="flex-1">
            <p><strong>Nama:</strong> {{ $staff->nama }}</p>
            <p><strong>Jabatan:</strong> {{ $staff->jabatan }}</p>
            <p><strong>Kategori:</strong> {{ ucfirst($staff->kategori) }}</p>
            <p><strong>Kutipan:</strong> {{ $staff->kutipan ?? '-' }}</p>

            <div class="mt-4 flex gap-2">
                <a href="{{ route('prestasiprima.admin.staff.edit', $staff->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Edit</a>
                <a href="{{ route('prestasiprima.admin.staff.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
