@extends('siakad.index')

@section('title', 'Absensi')

@section('content')
<div class="p-6">
    <!-- Header -->
    <h2 class="text-2xl font-bold mb-2">Manajemen Absensi</h2>
    <p class="text-gray-600 mb-6">Lihat riwayat kehadiran Anda</p>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <!-- Hadir -->
        <div class="flex items-center bg-green-50 border border-green-200 rounded-xl p-4">
            <span class="text-green-600 text-2xl mr-3"><i class="fas fa-check-circle"></i></span>
            <div>
                <h3 class="text-2xl font-bold text-green-700">156</h3>
                <p class="text-sm text-green-600 font-medium">Hadir</p>
            </div>
        </div>

        <!-- Tidak Hadir -->
        <div class="flex items-center bg-red-50 border border-red-200 rounded-xl p-4">
            <span class="text-red-600 text-2xl mr-3"><i class="fas fa-times-circle"></i></span>
            <div>
                <h3 class="text-2xl font-bold text-red-700">17</h3>
                <p class="text-sm text-red-600 font-medium">Tidak Hadir</p>
            </div>
        </div>

        <!-- Terlambat -->
        <div class="flex items-center bg-yellow-50 border border-yellow-200 rounded-xl p-4">
            <span class="text-yellow-600 text-2xl mr-3"><i class="fas fa-clock"></i></span>
            <div>
                <h3 class="text-2xl font-bold text-yellow-700">20</h3>
                <p class="text-sm text-yellow-600 font-medium">Terlambat</p>
            </div>
        </div>

        <!-- Izin -->
        <div class="flex items-center bg-blue-50 border border-blue-200 rounded-xl p-4">
            <span class="text-blue-600 text-2xl mr-3"><i class="fas fa-info-circle"></i></span>
            <div>
                <h3 class="text-2xl font-bold text-blue-700">8</h3>
                <p class="text-sm text-blue-600 font-medium">Izin</p>
            </div>
        </div>
    </div>

    <!-- Tab Menu -->
    <div class="flex border-b border-gray-200 mb-6">
        <button id="tab-harian" 
            class="flex items-center gap-2 px-4 py-2 -mb-px border-b-2 border-orange-500 font-medium text-orange-600">
            <i class="fas fa-list"></i> Daftar Absensi
        </button>
        <button id="tab-kalender" 
            class="flex items-center gap-2 px-4 py-2 font-medium text-gray-500 hover:text-gray-700">
            <i class="fas fa-calendar-alt"></i> Kalender
        </button>
    </div>

    <!-- Absensi Harian -->
    <div id="content-harian" class="bg-white shadow rounded-xl p-4">
        <h3 class="text-gray-700 font-medium mb-4">Absensi Harian</h3>
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
                @endphp

                <div class="flex items-center justify-between bg-gray-50 px-4 py-3 rounded-lg">
                    <div class="flex items-center gap-3">
                        <span class="text-{{ $color }}-500">
                            <i class="fas fa-{{ $absen['status'] == 'Hadir' ? 'check-circle' : ($absen['status'] == 'Terlambat' ? 'clock' : ($absen['status'] == 'Izin' ? 'info-circle' : 'times-circle')) }}"></i>
                        </span>
                        <div>
                            <p class="font-medium text-gray-800">{{ $absen['hari'] }}</p>
                            <p class="text-sm text-gray-500">Jam Masuk: {{ $absen['jam'] }}</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 rounded text-xs font-medium bg-{{ $color }}-100 text-{{ $color }}-700">
                        {{ $absen['status'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Kalender -->
    <div id="content-kalender" class="hidden bg-white shadow rounded-xl p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Kalender Grid -->
            <div class="border rounded-xl p-3 w-[240px]">
                <h3 class="font-semibold mb-2 text-sm">Pilih Tanggal</h3>
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
                             class="cursor-pointer h-8 flex items-center justify-center rounded-lg border hover:bg-orange-100 text-sm">
                            {{ $i }}
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Detail Absensi -->
            <div class="border rounded-xl p-4 flex-1 col-span-2">
                <h3 id="selected-date" class="font-semibold mb-3">Absensi Tanggal 16/9/2025</h3>
                <div id="schedule-list" class="space-y-3">
                    <div class="flex items-center justify-between p-4 rounded-lg border bg-green-50">
                        <div>
                            <p class="font-medium text-gray-800">Senin</p>
                            <p class="text-sm text-gray-500">Jam Masuk: 07:00</p>
                        </div>
                        <span class="px-3 py-1 rounded text-sm font-medium bg-green-100 text-green-700">Hadir</span>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Bulanan -->
            <div class="border rounded-xl p-4">
                <h3 class="font-semibold mb-3">Ringkasan Bulan Ini</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex justify-between">
                        <span>Hadir</span>
                        <span class="font-medium text-green-600">18 Hari</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Izin</span>
                        <span class="font-medium text-blue-600">2 Hari</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Sakit</span>
                        <span class="font-medium text-yellow-600">1 Hari</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Alfa</span>
                        <span class="font-medium text-red-600">0 Hari</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Script Tab & Dummy Kalender -->
<script>
    // Tab switch
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

    // Dummy data kalender
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
                    case "Hadir":
                        statusColor = "green"; icon = "check-circle"; break;
                    case "Terlambat":
                        statusColor = "yellow"; icon = "clock"; break;
                    case "Izin":
                        statusColor = "blue"; icon = "info-circle"; break;
                    default:
                        statusColor = "red"; icon = "times-circle";
                }

                scheduleList.innerHTML += `
                    <div class="flex items-center justify-between p-3 rounded-lg border bg-${statusColor}-50">
                        <div>
                            <p class="font-medium text-gray-800">${item.hari}</p>
                            <p class="text-sm text-gray-500">Jam Masuk: ${item.jam}</p>
                        </div>
                        <span class="px-2 py-1 rounded text-xs font-medium bg-${statusColor}-100 text-${statusColor}-700">
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
