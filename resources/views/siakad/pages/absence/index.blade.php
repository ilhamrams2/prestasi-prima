@extends('siakad.index')

@section('title', 'Absensi')

@section('content')
<div class="p-6 space-y-8">

    {{-- ================= HEADER ================= --}}
    <div class="pb-5 border-b bg-gradient-to-r from-orange-50 to-white rounded-xl px-4 py-3 shadow-sm mb-6">
        <nav class="flex items-center text-sm text-gray-500 mb-3 space-x-2">
            <a href="{{ route('siakad.dashboard') }}" class="hover:text-orange-600 transition-colors flex items-center gap-1">
                <i class="ri-home-4-line text-lg"></i> Dashboard
            </a>
            <span>/</span>
            <span class="text-gray-700 font-semibold flex items-center gap-1">
                <i class="ri-clipboard-line text-lg text-orange-500"></i> Absensi
            </span>
        </nav>

        <div class="flex items-center gap-3">
            <div class="p-3 bg-orange-100 text-orange-600 rounded-xl">
                <i class="ri-clipboard-fill text-3xl"></i>
            </div>
            <div>
                <h1 class="text-3xl font-extrabold text-orange-600">Manajemen Absensi</h1>
                <p class="text-gray-600 text-sm mt-1">
                    Lihat riwayat kehadiran harian dan bulanan Anda dengan detail
                </p>
            </div>
        </div>
    </div>

    {{-- ================= STATISTIK ================= --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    
    <!-- Hadir -->
    <div class="flex items-center justify-between bg-gradient-to-r from-green-400 to-green-500 text-white rounded-xl p-5 shadow hover:scale-105 hover:shadow-lg transition">
        <div>
            <h3 class="text-3xl font-extrabold">156</h3>
            <p class="text-sm opacity-90">Hadir</p>
        </div>
        <div class="p-4 bg-white/20 rounded-lg">
            <i class="ri-checkbox-circle-line text-3xl"></i>
        </div>
    </div>

    <!-- Tidak Hadir -->
    <div class="flex items-center justify-between bg-gradient-to-r from-red-400 to-red-500 text-white rounded-xl p-5 shadow hover:scale-105 hover:shadow-lg transition">
        <div>
            <h3 class="text-3xl font-extrabold">17</h3>
            <p class="text-sm opacity-90">Tidak Hadir</p>
        </div>
        <div class="p-4 bg-white/20 rounded-lg">
            <i class="ri-close-circle-line text-3xl"></i>
        </div>
    </div>

    <!-- Terlambat -->
    <div class="flex items-center justify-between bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl p-5 shadow hover:scale-105 hover:shadow-lg transition">
        <div>
            <h3 class="text-3xl font-extrabold">20</h3>
            <p class="text-sm opacity-90">Terlambat</p>
        </div>
        <div class="p-4 bg-white/20 rounded-lg">
            <i class="ri-time-line text-3xl"></i>
        </div>
    </div>

    <!-- Izin -->
    <div class="flex items-center justify-between bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-xl p-5 shadow hover:scale-105 hover:shadow-lg transition">
        <div>
            <h3 class="text-3xl font-extrabold">8</h3>
            <p class="text-sm opacity-90">Izin</p>
        </div>
        <div class="p-4 bg-white/20 rounded-lg">
            <i class="ri-information-line text-3xl"></i>
        </div>
    </div>
</div>


    {{-- ================= TAB MENU ================= --}}
    <div class="flex border-b border-gray-200 mb-6">
        <button id="tab-harian"
            class="flex items-center gap-2 px-5 py-3 -mb-px border-b-2 border-orange-500 font-medium text-orange-600 transition">
            <i class="ri-list-check"></i> Daftar Absensi
        </button>
        <button id="tab-kalender"
            class="flex items-center gap-2 px-5 py-3 font-medium text-gray-500 hover:text-gray-700 transition">
            <i class="ri-calendar-line"></i> Kalender
        </button>
    </div>

    {{-- ================= ABSENSI HARIAN ================= --}}
    <div id="content-harian" class="bg-white shadow rounded-xl p-5">
        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
            <i class="ri-calendar-todo-line text-orange-500"></i> Absensi Harian
        </h3>
        <p class="text-sm text-gray-500 mb-6">Kehadiran Anda dari hari Senin sampai Jumat</p>

        <div class="space-y-3">
            @php
                $harian = [
                    ["hari" => "Senin", "jam" => "07:00", "status" => "Hadir"],
                    ["hari" => "Selasa", "jam" => "07:20", "status" => "Terlambat"],
                    ["hari" => "Rabu", "jam" => "07:05", "status" => "Hadir"],
                    ["hari" => "Kamis", "jam" => "-", "status" => "Tidak Hadir"],
                    ["hari" => "Jumat", "jam" => "-", "status" => "Izin"],
                ];
            @endphp

            @foreach($harian as $absen)
                @php
                    $color = match($absen['status']) {
                        "Hadir" => "green",
                        "Terlambat" => "yellow",
                        "Izin" => "blue",
                        default => "red"
                    };
                    $icon = match($absen['status']) {
                        "Hadir" => "checkbox-circle-line",
                        "Terlambat" => "time-line",
                        "Izin" => "information-line",
                        default => "close-circle-line"
                    };
                @endphp

                <div class="flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="text-{{ $color }}-500 text-lg">
                            <i class="ri-{{ $icon }}"></i>
                        </span>
                        <div>
                            <p class="font-medium text-gray-800">{{ $absen['hari'] }}</p>
                            <p class="text-sm text-gray-500">Jam Masuk: {{ $absen['jam'] }}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-{{ $color }}-100 text-{{ $color }}-700">
                        {{ $absen['status'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ================= KALENDER ================= --}}
    <div id="content-kalender" class="hidden bg-white shadow rounded-xl p-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Kalender Grid -->
            <div class="border rounded-xl p-4 shadow-sm">
                <h3 class="font-semibold mb-3 text-sm flex items-center gap-2">
                    <i class="ri-calendar-event-line text-orange-500"></i> Pilih Tanggal
                </h3>
                <div id="calendar" class="grid grid-cols-7 gap-1 text-center text-xs">
                    <div class="font-semibold">Mon</div>
                    <div class="font-semibold">Tue</div>
                    <div class="font-semibold">Wed</div>
                    <div class="font-semibold">Thu</div>
                    <div class="font-semibold">Fri</div>
                    <div class="font-semibold text-gray-400">Sat</div>
                    <div class="font-semibold text-gray-400">Sun</div>

                    @for($i = 1; $i <= 30; $i++)
                        <div onclick="showSchedule({{ $i }})"
                             class="cursor-pointer h-8 flex items-center justify-center rounded-lg border hover:bg-orange-100 hover:border-orange-400 transition text-sm">
                            {{ $i }}
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Detail Absensi -->
            <div class="border rounded-xl p-4 flex-1 col-span-2 shadow-sm">
                <h3 id="selected-date" class="font-semibold mb-3">Absensi Tanggal 16/9/2025</h3>
                <div id="schedule-list" class="space-y-3">
                    <div class="flex items-center justify-between p-4 rounded-lg border bg-green-50">
                        <div>
                            <p class="font-medium text-gray-800">Senin</p>
                            <p class="text-sm text-gray-500">Jam Masuk: 07:00</p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">Hadir</span>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Bulanan -->
            <div class="border rounded-xl p-4 shadow-sm">
                <h3 class="font-semibold mb-3">Ringkasan Bulan Ini</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex justify-between"><span>Hadir</span><span class="font-medium text-green-600">18 Hari</span></li>
                    <li class="flex justify-between"><span>Izin</span><span class="font-medium text-blue-600">2 Hari</span></li>
                    <li class="flex justify-between"><span>Sakit</span><span class="font-medium text-yellow-600">1 Hari</span></li>
                    <li class="flex justify-between"><span>Alfa</span><span class="font-medium text-red-600">0 Hari</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- ================= SCRIPT ================= --}}
<script>
    const tabHarian = document.getElementById('tab-harian');
    const tabKalender = document.getElementById('tab-kalender');
    const contentHarian = document.getElementById('content-harian');
    const contentKalender = document.getElementById('content-kalender');

    tabHarian.addEventListener('click', () => {
        contentHarian.classList.remove('hidden');
        contentKalender.classList.add('hidden');
        tabHarian.classList.add('border-b-2', 'border-orange-500', 'text-orange-600');
        tabKalender.classList.remove('border-b-2', 'border-orange-500', 'text-orange-600');
        tabKalender.classList.add('text-gray-500');
    });

    tabKalender.addEventListener('click', () => {
        contentKalender.classList.remove('hidden');
        contentHarian.classList.add('hidden');
        tabKalender.classList.add('border-b-2', 'border-orange-500', 'text-orange-600');
        tabHarian.classList.remove('border-b-2', 'border-orange-500', 'text-orange-600');
        tabHarian.classList.add('text-gray-500');
    });

    // Dummy kalender
    function showSchedule(day) {
        const scheduleList = document.getElementById('schedule-list');
        const selectedDate = document.getElementById('selected-date');

        selectedDate.textContent = "Absensi Tanggal " + day + "/9/2025";

        const data = {
            16: [
                {hari: "Senin", jam: "07:00", status: "Hadir"},
                {hari: "Selasa", jam: "07:20", status: "Terlambat"},
                {hari: "Rabu", jam: "07:05", status: "Hadir"}
            ],
            17: [
                {hari: "Kamis", jam: "-", status: "Tidak Hadir"},
                {hari: "Jumat", jam: "-", status: "Izin"}
            ]
        };

        scheduleList.innerHTML = "";

        if (data[day]) {
            data[day].forEach(item => {
                let statusColor, icon;
                switch (item.status) {
                    case "Hadir": statusColor = "green"; icon = "checkbox-circle-line"; break;
                    case "Terlambat": statusColor = "yellow"; icon = "time-line"; break;
                    case "Izin": statusColor = "blue"; icon = "information-line"; break;
                    default: statusColor = "red"; icon = "close-circle-line";
                }

                scheduleList.innerHTML += `
                    <div class="flex items-center justify-between p-3 rounded-lg border bg-${statusColor}-50 shadow-sm">
                        <div class="flex items-center gap-2">
                            <i class="ri-${icon} text-${statusColor}-600"></i>
                            <div>
                                <p class="font-medium text-gray-800">${item.hari}</p>
                                <p class="text-sm text-gray-500">Jam Masuk: ${item.jam}</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-${statusColor}-100 text-${statusColor}-700">
                            ${item.status}
                        </span>
                    </div>
                `;
            });
        } else {
            scheduleList.innerHTML = "<p class='text-gray-500 text-sm'>Tidak ada data absensi.</p>";
        }
    }
</script>
@endsection
