@extends('layouts.admin')

@section('title', 'Edit Industri')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Industri</h1>

    <form action="{{ route('prestasiprima.admin.industri.update', $industri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Nama Industri</label>
            <input type="text" name="nama" class="border px-3 py-2 w-full" value="{{ old('nama', $industri->nama) }}" required>
            @error('nama')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Slug</label>
            <input type="text" name="slug" class="border px-3 py-2 w-full" value="{{ old('slug', $industri->slug) }}" required>
            @error('slug')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Logo</label>
            @if($industri->logo)
                <img src="{{ asset('storage/' . $industri->logo) }}" alt="{{ $industri->nama }}" class="h-10 mb-2">
            @endif
            <input type="file" name="logo" class="border px-3 py-2 w-full">
            @error('logo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
