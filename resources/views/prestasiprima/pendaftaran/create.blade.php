@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 mt-6">

    <h2 class="text-2xl font-bold mb-4">Formulir Pendaftaran Siswa</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('formulir.store') }}" method="POST">
        @csrf

        {{-- DATA SISWA --}}
        <h3 class="text-lg font-semibold mt-4 mb-2">Data Siswa</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block">NISN</label>
                <input type="text" name="nisn" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded p-2">
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label class="block">Agama</label>
                <input type="text" name="agama" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" class="w-full border rounded p-2">
            </div>
        </div>

        {{-- DATA KONTAK --}}
        <h3 class="text-lg font-semibold mt-6 mb-2">Data Kontak</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block">Alamat</label>
                <textarea name="alamat" class="w-full border rounded p-2"></textarea>
            </div>
            <div>
                <label class="block">Kelurahan</label>
                <input type="text" name="kelurahan" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Kecamatan</label>
                <input type="text" name="kecamatan" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Kota</label>
                <input type="text" name="kota" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Kode Pos</label>
                <input type="text" name="kode_pos" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">No HP</label>
                <input type="text" name="no_hp" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2">
            </div>
        </div>

        {{-- PILIHAN JURUSAN --}}
        <h3 class="text-lg font-semibold mt-6 mb-2">Pilihan Jurusan</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block">Pilihan Jurusan 1</label>
                <select name="pilihan_jurusan_1" class="w-full border rounded p-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="PPLG">PPLG</option>
                    <option value="TKJ">TKJ</option>
                    <option value="BCF">BCF</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>
            <div>
                <label class="block">Pilihan Jurusan 2</label>
                <select name="pilihan_jurusan_2" class="w-full border rounded p-2">
                    <option value="">-- Pilih --</option>
                    <option value="PPLG">PPLG</option>
                    <option value="TKJ">TKJ</option>
                    <option value="BCF">BCF</option>
                    <option value="DKV">DKV</option>
                </select>
            </div>
        </div>

        {{-- DATA TAMBAHAN --}}
        <h3 class="text-lg font-semibold mt-6 mb-2">Data Tambahan</h3>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block">Hobi</label>
                <input type="text" name="hobi" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Prestasi</label>
                <input type="text" name="prestasi" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Riwayat Kesehatan</label>
                <input type="text" name="riwayat_kesehatan" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Tinggi Badan (cm)</label>
                <input type="number" name="tinggi_badan" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block">Berat Badan (kg)</label>
                <input type="number" name="berat_badan" class="w-full border rounded p-2">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Simpan Formulir
            </button>
        </div>
    </form>
</div>
@endsection
