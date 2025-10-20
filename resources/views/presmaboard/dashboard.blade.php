@extends('presmaboard.partials.layout')

@section('title', 'Dashboard Admin - PresmaBoard')

@section('content')
    <div class="w-full px-6 lg:px-10 py-6 space-y-10">

        {{-- ====== HEADER SELAMAT DATANG ====== --}}
        <div
            class="bg-gradient-to-r from-orange-600 to-yellow-400 text-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-xl font-bold">
                    Selamat Datang, {{ session('username') ?? 'Administrator' }} 👋
                </h2>
                <p class="text-sm mt-1 opacity-90">
                    Anda login sebagai <strong>Administrator PresmaBoard</strong>
                </p>
            </div>

        </div>

        {{-- ====== STATISTIK UTAMA ====== --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $stats = [
                    [
                        'icon' => 'ri-user-3-line',
                        'label' => 'Total Siswa',
                        'value' => $student_count,
                        'color' => 'blue',
                    ],
                    ['icon' => 'ri-user-star-line', 'label' => 'Total Guru', 'value' => 0, 'color' => 'green'],
                    [
                        'icon' => 'ri-trophy-line',
                        'label' => 'Total Prestasi',
                        'value' => $achievement_count,
                        'color' => 'yellow',
                    ],
                    ['icon' => 'ri-folder-open-line', 'label' => 'Proyek Aktif', 'value' => 0, 'color' => 'orange'],
                ];
            @endphp

            @foreach ($stats as $item)
                <div class="bg-white rounded-xl shadow-md p-5 relative hover:shadow-lg transition-all">
                    <div class="absolute top-3 right-3 bg-{{ $item['color'] }}-100 p-2 rounded-lg">
                        <i class="{{ $item['icon'] }} text-{{ $item['color'] }}-600 text-xl"></i>
                    </div>
                    <h3 class="text-gray-600 font-semibold text-sm">{{ $item['label'] }}</h3>
                    <p class="text-2xl font-bold mt-2 text-gray-800">{{ $item['value'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- ====== GRAFIK ANALITIK ====== --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="font-semibold text-gray-700 mb-3 text-sm">Rata-Rata Nilai per Jurusan</h3>
                <canvas id="nilaiChart" height="150"></canvas>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="font-semibold text-gray-700 mb-3 text-sm">Grafik Kemenangan Lomba per Bulan</h3>
                <canvas id="prestasiChart" height="150"></canvas>
            </div>
        </div>

        {{-- ====== AKTIVITAS TERBARU ====== --}}
        <div>
            <h2 class="text-sm font-semibold text-orange-600 mb-3">Aktivitas Terbaru</h2>
            <div class="bg-white rounded-xl shadow-md divide-y">
                @foreach ([['Gibran menambahkan proyek baru "Web Edukasi Sekolah"', '5 menit yang lalu'], ['Ardy memperbarui data prestasi siswa kelas X PPLG', '10 menit yang lalu'], ['Admin menghapus pengumuman lama', '1 jam yang lalu']] as [$text, $time])
                    <div class="flex items-center justify-between p-4 hover:bg-orange-50 transition">
                        <p class="text-gray-700 text-sm">{{ $text }}</p>
                        <span class="text-gray-400 text-xs">{{ $time }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ====== FORM PENGUMUMAN ====== --}}
        <div class="bg-gradient-to-r from-orange-500 to-yellow-400 rounded-xl text-white p-6 shadow-md">
            <h3 class="font-bold text-lg">Buat Pengumuman Baru</h3>
            <p class="text-sm opacity-90 mb-4">Kirimkan informasi penting ke seluruh siswa atau guru.</p>
            <form class="flex flex-col sm:flex-row gap-3">
                <input type="text" placeholder="Tulis pengumuman..."
                    class="flex-1 px-4 py-2 rounded-lg text-gray-800 focus:ring-2 focus:ring-orange-400 outline-none">
                <button
                    class="bg-white text-orange-600 font-semibold px-5 py-2 rounded-lg hover:bg-gray-100 transition">Kirim</button>
            </form>
        </div>

    </div>

    {{-- ====== CHART JS ====== --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const ctxNilai = document.getElementById('nilaiChart');
            new Chart(ctxNilai, {
                type: 'bar',
                data: {
                    labels: ['PPLG', 'DKV', 'TJKT', 'TO', 'TPM'],
                    datasets: [{
                        label: 'Rata-Rata Nilai',
                        data: [89, 86, 91, 84, 88],
                        backgroundColor: '#f97316',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            const ctxPrestasi = document.getElementById('prestasiChart');
            const namaLomba = [
                "Lomba Desain Poster Digital – Juara 1",
                "Hackathon Kampus Merdeka – Juara 3",
                "Debat Bahasa Inggris – Juara 2",
                "Lomba Web Development – Juara 1",
                "Inovasi Teknologi Sains – Juara 1",
                "Lomba Animasi 3D – Juara Harapan 1",
                "AI & Robotics Competition – Juara 2",
                "UI/UX Challenge – Juara 1",
                "Game Development Nasional – Juara 1",
                "Startup Digital Award – Juara Umum"
            ];

            new Chart(ctxPrestasi, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                    datasets: [{
                        label: 'Jumlah Kemenangan',
                        data: [2, 4, 3, 6, 5, 8, 7, 9, 10, 12],
                        borderColor: '#f59e0b',
                        backgroundColor: 'rgba(251, 146, 60, 0.25)',
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#f97316',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#374151'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                title: (items) => `Bulan: ${items[0].label}`,
                                label: (context) =>
                                    `${namaLomba[context.dataIndex]} (${context.parsed.y} kemenangan)`
                            },
                            backgroundColor: '#f97316',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            padding: 10,
                            displayColors: false
                        }
                    }
                }
            });

            // ✅ Tampilkan alert login jika ada session “toast” dari controller
            @if (session('toast') === 'login')
                showAlert('success', 'Berhasil Login', 'Selamat datang, {{ session('username') }} 👋');
            @elseif (session('toast') === 'logout')
                showAlert('success', 'Logout Berhasil', 'Anda telah keluar dari sistem.');
            @endif
        });
    </script>
@endsection
