@extends('layouts.admin')

@section('title', 'Tambah Industri')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Industri</h1>

    <form action="{{ route('prestasiprima.admin.industri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Industri</label>
            <input type="text" name="nama" class="border px-3 py-2 w-full" value="{{ old('nama') }}" required>
            @error('nama')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Slug</label>
            <input type="text" name="slug" class="border px-3 py-2 w-full" value="{{ old('slug') }}" required>
            @error('slug')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Logo</label>
            <input type="file" name="logo" class="border px-3 py-2 w-full">
            @error('logo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
