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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $stats = [
                    [
                        'icon' => 'ri-user-3-line',
                        'label' => 'Total Siswa',
                        'value' => $student_count,
                        'color' => 'blue',
                    ],
                    [
                        'icon' => 'ri-trophy-line',
                        'label' => 'Total Prestasi',
                        'value' => $achievement_count,
                        'color' => 'yellow',
                    ],
                    [
                        'icon' => 'ri-folder-open-line',
                        'label' => 'Total Projek',
                        'value' => $project_count,
                        'color' => 'orange',
                    ],
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


        {{-- ====== CHART JS ====== --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const average_major_score = @json($average_major_score);
            const achievement_average = @json($achievement_average);
            console.log(achievement_average.Apr.length);

            document.addEventListener("DOMContentLoaded", () => {
                const ctxNilai = document.getElementById('nilaiChart');
                new Chart(ctxNilai, {
                    type: 'bar',
                    data: {
                        labels: ['BCF', 'PPLG', 'DKV', 'TKJ'].map(k => k.toUpperCase()),
                        datasets: [{
                            label: 'Rata-Rata Nilai',
                            data: [average_major_score.bcf, average_major_score.pplg,
                                average_major_score.dkv, average_major_score.tkj
                            ],
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
                    achievement_average.Jan.desc ?? '',
                    achievement_average.Feb.desc ?? '',
                    achievement_average.Mar.desc ?? '',
                    achievement_average.Apr.desc ?? '',
                    achievement_average.May.desc ?? '',
                    achievement_average.Jun.desc ?? '',
                    achievement_average.Jul.desc ?? '',
                    achievement_average.Aug.desc ?? '',
                    achievement_average.Sep.desc ?? '',
                    achievement_average.Oct.desc ?? '',
                    achievement_average.Nov.desc ?? '',
                    achievement_average.Dec.desc ?? '',
                ];

                new Chart(ctxPrestasi, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                            'Dec'
                        ],
                        datasets: [{
                            label: 'Jumlah Kemenangan',
                            data: [
                                achievement_average.Jan.count ?? 0,
                                achievement_average.Feb.count ?? 0,
                                achievement_average.Mar.count ?? 0,
                                achievement_average.Apr.count ?? 0,
                                achievement_average.May.count ?? 0,
                                achievement_average.Jun.count ?? 0,
                                achievement_average.Jul.count ?? 0,
                                achievement_average.Aug.count ?? 0,
                                achievement_average.Sep.count ?? 0,
                                achievement_average.Oct.count ?? 0,
                                achievement_average.Nov.count ?? 0,
                                achievement_average.Dec.count ?? 0
                            ],
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
            });
        </script>
    @endsection
