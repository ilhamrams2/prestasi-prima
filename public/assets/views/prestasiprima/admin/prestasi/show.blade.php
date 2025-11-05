@extends('layouts.admin')

@section('title', 'Detail Prestasi')

@section('content')
<div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $prestasi->judul }}</h2>
    <p class="text-gray-600 mb-4">{{ $prestasi->deskripsi }}</p>
    <p class="text-sm text-gray-500">Tanggal: {{ $prestasi->tanggal }}</p>
    @if($prestasi->gambar)
        <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}" class="mt-4 rounded-lg">
    @endif
</div>
@endsection
