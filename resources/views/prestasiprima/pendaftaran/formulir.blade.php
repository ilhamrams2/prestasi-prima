@extends('layouts.app')

@section('content')
<div class="pt-28"> {{-- Biar konten turun dari bawah navbar fixed --}}
    
    <div class="bg-gray-900 text-center py-24 md:py-32 px-4">
        <h1 class="text-5xl md:text-6xl font-bold text-white leading-snug">
            Formulir Pendaftaran <br>
            <span class="text-orange-500">SMK Prestasi Prima</span>
        </h1>
    </div>

    <!-- Container -->
    <div class="max-w-6xl mx-auto px-4 md:px-8 py-12">

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pendaftaran.formulir') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Data Siswa -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Data Siswa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @include('pages.pendaftaran.components.input', ['label' => 'Nama Siswa', 'name' => 'nama_siswa', 'required' => true])
                    @error('nama_siswa') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'NISN', 'name' => 'nisn'])
                    @error('nisn') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Tempat Lahir', 'name' => 'tempat_lahir'])
                    @error('tempat_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Tanggal Lahir', 'name' => 'tanggal_lahir', 'type' => 'date'])
                    @error('tanggal_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.select', [
                        'label' => 'Jenis Kelamin',
                        'name' => 'jenis_kelamin',
                        'options' => ['Laki-laki', 'Perempuan']
                    ])
                    @error('jenis_kelamin') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Agama', 'name' => 'agama'])
                    @error('agama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Kewarganegaraan', 'name' => 'kewarganegaraan'])
                    @error('kewarganegaraan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Data Kontak -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Data Kontak</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @include('pages.pendaftaran.components.textarea', ['label' => 'Alamat', 'name' => 'alamat'])
                    @error('alamat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Kelurahan', 'name' => 'kelurahan'])
                    @error('kelurahan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Kecamatan', 'name' => 'kecamatan'])
                    @error('kecamatan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Kota', 'name' => 'kota'])
                    @error('kota') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Kode Pos', 'name' => 'kode_pos'])
                    @error('kode_pos') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'No HP', 'name' => 'no_hp'])
                    @error('no_hp') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Email', 'name' => 'email', 'type' => 'email'])
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Pilihan Jurusan -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Pilihan Jurusan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @include('pages.pendaftaran.components.select', [
                        'label' => 'Pilihan Jurusan 1',
                        'name' => 'pilihan_jurusan_1',
                        'options' => ['PPLG', 'TKJ', 'BCF', 'DKV'],
                        'required' => true
                    ])
                    @error('pilihan_jurusan_1') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Data Tambahan -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Data Tambahan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @include('pages.pendaftaran.components.input', ['label' => 'Hobi', 'name' => 'hobi'])
                    @error('hobi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Prestasi', 'name' => 'prestasi'])
                    @error('prestasi') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Riwayat Kesehatan', 'name' => 'riwayat_kesehatan'])
                    @error('riwayat_kesehatan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Tinggi Badan (cm)', 'name' => 'tinggi_badan', 'type' => 'number'])
                    @error('tinggi_badan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

                    @include('pages.pendaftaran.components.input', ['label' => 'Berat Badan (kg)', 'name' => 'berat_badan', 'type' => 'number'])
                    @error('berat_badan') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-10 py-3 rounded-full transition">
                    Simpan Formulir
                </button>
            </div>
        </form>

        <p class="text-sm text-gray-600 mt-6 text-center">
            *Note: Silakan melanjutkan proses pendaftaran di sekolah beserta dokumen persyaratan yang telah ditentukan
        </p>
    </div>
</div>
@endsection
