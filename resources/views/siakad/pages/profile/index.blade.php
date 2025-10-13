{{-- resources/views/siakad/pages/profile/index.blade.php --}}
@extends('siakad.index')

@section('content')
    <div class="container mx-auto p-4 sm:p-6 space-y-8" x-data="{ tab: 'profile' }">

        {{-- ================= HEADER PROFIL ================= --}}
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Profil</h2>
            <p class="text-gray-500">Kelola informasi pribadi dan pengaturan akun Anda</p>
        </div>

        {{-- ================= CARD PROFIL UTAMA ================= --}}
        <div
            class="bg-white rounded-xl shadow-md p-6 flex flex-col md:flex-row justify-between items-start md:items-center">
            <div class="flex items-center space-x-4">
                <div
                    class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white text-3xl font-bold">
                    {{ strtoupper(substr($student['nama'], 0, 1)) }}
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ $student['nama'] }}</h3>
                    <p class="text-gray-500 text-sm">{{ $student['email'] }}</p>
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        <span
                            class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">{{ $student['status'] }}</span>
                        <span
                            class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">{{ $student['kelas'] }}</span>
                        <span class="flex items-center text-gray-400 text-xs">
                            <i class="ri-calendar-line mr-1"></i>Bergabung
                            {{ \Carbon\Carbon::parse($student['bergabung'])->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-3 mt-6 md:mt-0">
                <div class="bg-orange-50 border rounded-lg px-4 py-2 text-center">
                    <p class="text-orange-600 font-semibold">#{{ $student['peringkat'] }}</p>
                    <p class="text-xs text-gray-500">Peringkat</p>
                </div>
                <div class="bg-orange-50 border rounded-lg px-4 py-2 text-center">
                    <p class="text-orange-600 font-semibold">{{ $student['rata_rata'] }}</p>
                    <p class="text-xs text-gray-500">Rata-rata</p>
                </div>
                <button class="bg-orange-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                    Edit Profile
                </button>
            </div>
        </div>

        {{-- ================= NAVIGASI TAB ================= --}}
        <div class="border-b flex space-x-6">
            <button @click="tab = 'profile'"
                :class="tab === 'profile' ? 'border-b-2 border-orange-500 text-orange-600' : 'text-gray-500'"
                class="pb-3 font-medium text-sm focus:outline-none">
                Profile
            </button>
            <button @click="tab = 'akademik'"
                :class="tab === 'akademik' ? 'border-b-2 border-orange-500 text-orange-600' : 'text-gray-500'"
                class="pb-3 font-medium text-sm focus:outline-none">
                Akademik
            </button>
            <button @click="tab = 'notifikasi'"
                :class="tab === 'notifikasi' ? 'border-b-2 border-orange-500 text-orange-600' : 'text-gray-500'"
                class="pb-3 font-medium text-sm focus:outline-none">
                Notifikasi
            </button>
        </div>

        {{-- ================= TAB: PROFILE ================= --}}
        <div x-show="tab === 'profile'" x-transition>
            <div class="bg-white p-6 rounded-xl shadow-sm space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-700 mb-3">Informasi Pribadi</h4>
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <label class="text-gray-500">Nama Lengkap</label>
                            <input type="text" value="{{ $student['nama'] }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                        <div>
                            <label class="text-gray-500">Email</label>
                            <input type="text" value="{{ $student['email'] }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                        <div>
                            <label class="text-gray-500">Nomor Telepon</label>
                            <input type="text" value="{{ $student['telepon'] }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                        <div>
                            <label class="text-gray-500">Jenis Kelamin</label>
                            <input type="text" value="{{ $student['jenis_kelamin'] }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                        <div>
                            <label class="text-gray-500">Tanggal Lahir</label>
                            <input type="text"
                                value="{{ \Carbon\Carbon::parse($student['tanggal_lahir'])->format('d/m/Y') }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                        <div>
                            <label class="text-gray-500">NIS</label>
                            <input type="text" value="{{ $student['nis'] }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="text-gray-500">Alamat</label>
                    <textarea class="w-full mt-1 bg-gray-50 rounded-lg border-none"
                        readonly>{{ $student['alamat'] }}</textarea>
                </div>

                <hr>

                <div>
                    <h4 class="font-semibold text-gray-700 mb-3">Informasi Wali</h4>
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <label class="text-gray-500">Nama Wali</label>
                            <input type="text" value="{{ $student['nama_wali'] }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                        <div>
                            <label class="text-gray-500">Nomor Telepon Wali</label>
                            <input type="text" value="{{ $student['telepon_wali'] }}"
                                class="w-full mt-1 bg-gray-50 rounded-lg border-none" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= TAB: AKADEMIK ================= --}}
        <div x-show="tab === 'akademik'" x-transition>
            <div class="bg-white p-6 rounded-xl shadow-sm space-y-6">
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="flex items-center justify-center bg-orange-50 rounded-lg py-4">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-orange-600">#1</p>
                            <p class="text-sm text-gray-500">Peringkat Kelas</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center bg-orange-50 rounded-lg py-4">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-orange-600">88.5</p>
                            <p class="text-sm text-gray-500">Rata-rata Nilai</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center bg-orange-50 rounded-lg py-4">
                        <div class="text-center">
                            <p class="text-3xl font-bold text-orange-600">13</p>
                            <p class="text-sm text-gray-500">Mata Pelajaran</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold text-gray-700 mb-2">Progress Pembelajaran Semester 1</h4>
                    <p class="text-sm text-gray-500 mb-1">XI PPLG 2</p>
                    <div class="bg-gray-100 rounded-full h-3">
                        <div class="bg-orange-500 h-3 rounded-full" style="width:73%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                        <span>73% dari total modul</span>
                        <span>Hari ke 98/152</span>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold text-gray-700 mb-3">Prestasi & Penghargaan</h4>
                    <div class="space-y-3">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="bg-orange-50 border rounded-xl p-3 flex items-center space-x-3">
                                <div class="text-orange-500 text-xl">🏅</div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-700">Juara 1 Olimpiade Matematika</p>
                                    <p class="text-xs text-gray-500">15/8/2024 • Nasional</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= TAB: NOTIFIKASI ================= --}}
        <div x-show="tab === 'notifikasi'" x-transition>
            <div class="bg-white p-6 rounded-xl shadow-sm space-y-6">
                <div>
                    <h4 class="font-semibold text-gray-700">Pengaturan Notifikasi</h4>
                    <p class="text-gray-500 text-sm">Kelola preferensi notifikasi Anda</p>
                </div>

                <div class="divide-y">
                    @php
                        $notifications = [
                            ['label' => 'Email Notifications', 'desc' => 'Terima notifikasi melalui email', 'on' => false],
                            ['label' => 'Push Notifications', 'desc' => 'Notifikasi langsung di browser', 'on' => true],
                            ['label' => 'SMS Notifications', 'desc' => 'Notifikasi via SMS untuk hal penting', 'on' => true],
                            ['label' => 'Assignment Updates', 'desc' => 'Notifikasi tugas dan deadline', 'on' => true],
                            ['label' => 'Grade Updates', 'desc' => 'Notifikasi nilai baru', 'on' => true],
                            ['label' => 'School Announcements', 'desc' => 'Pengumuman sekolah', 'on' => true],
                        ];
                    @endphp

                    @foreach ($notifications as $notif)
                        <div class="flex justify-between items-center py-3">
                            <div>
                                <p class="text-gray-700 font-medium text-sm">{{ $notif['label'] }}</p>
                                <p class="text-gray-500 text-xs">{{ $notif['desc'] }}</p>
                            </div>
                            <label class="inline-flex items-center cursor-pointer relative">
                                <input type="checkbox" class="sr-only peer" {{ $notif['on'] ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-orange-500 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full">
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
