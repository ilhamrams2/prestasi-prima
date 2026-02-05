@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

{{-- ====== TOP STATS CARDS ====== --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    @php
        $stats = [
            [
                'label' => 'Total Berita',
                'value' => $totalBerita,
                'icon' => 'ri-article-line',
                'color' => 'blue',
                'bg' => 'blue-50',
                'text' => 'blue-600',
                'sub' => 'Publikasi Aktif'
            ],
            [
                'label' => 'Pengunjung Hari Ini',
                'value' => $visitorsToday,
                'icon' => 'ri-user-follow-line',
                'color' => 'orange',
                'bg' => 'orange-50',
                'text' => 'orange-600',
                'sub' => 'Unik (Hari Ini)'
            ],
            [
                'label' => 'Pesan Unread',
                'value' => $unreadMessages,
                'icon' => 'ri-mail-unread-line',
                'color' => 'red',
                'bg' => 'red-50',
                'text' => 'red-600',
                'sub' => 'Butuh Respon'
            ],
            [
                'label' => 'Visitor Bulan Ini',
                'value' => $visitorsMonth,
                'icon' => 'ri-line-chart-line',
                'color' => 'green',
                'bg' => 'green-50',
                'text' => 'green-600',
                'sub' => 'Total ' . now()->format('F')
            ]
        ];
    @endphp

    @foreach($stats as $stat)
    <div class="bg-white p-7 rounded-[40px] shadow-sm border border-slate-100 flex flex-col justify-between hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-300 transform hover:-translate-y-1 group">
        <div class="flex items-center justify-between mb-5">
            <div class="w-14 h-14 bg-{{ $stat['bg'] }} rounded-3xl flex items-center justify-center group-hover:bg-[#FF6B00] group-hover:text-white transition-all duration-300">
                <i class="{{ $stat['icon'] }} text-2xl text-{{ $stat['text'] }} group-hover:text-white"></i>
            </div>
            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-3 py-1.5 rounded-xl uppercase tracking-widest">
                Data Real-time
            </span>
        </div>
        <div>
            <h3 class="text-slate-500 text-sm font-bold tracking-tight mb-1">{{ $stat['label'] }}</h3>
            <p class="text-3xl font-extrabold text-slate-800">{{ number_format($stat['value']) }}</p>
            <p class="text-[11px] text-slate-400 mt-2 font-medium flex items-center gap-1">
                <i class="ri-information-line"></i> {{ $stat['sub'] }}
            </p>
        </div>
    </div>
    @endforeach
</div>

{{-- ====== ANALYTICS & RECENT GRID ====== --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    
    {{-- === VISITORS CHART === --}}
    <div class="xl:col-span-2 space-y-8">
        <div class="bg-white rounded-[48px] shadow-sm border border-slate-100 p-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="text-xl font-extrabold text-slate-800 tracking-tight">Tren Pengunjung</h3>
                    <p class="text-xs text-slate-400 font-medium mt-1">Total pengunjung unik 7 hari terakhir</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-2 bg-orange-50 px-4 py-2 rounded-2xl border border-orange-100">
                        <span class="w-2 h-2 bg-[#FF6B00] rounded-full animate-pulse"></span>
                        <span class="text-xs font-bold text-[#FF6B00]">{{ $visitorsToday }} Hari Ini</span>
                    </div>
                </div>
            </div>
            <div class="h-[350px] w-full">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>

        {{-- === RECENT LOGS === --}}
        <div class="bg-white rounded-[40px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-6 bg-blue-600 rounded-full"></div>
                    <h3 class="text-lg font-extrabold text-slate-800 tracking-tight">Log Aktivitas Terbaru</h3>
                </div>
                <a href="{{ route('prestasiprima.admin.logs.index') }}" class="text-sm font-bold text-blue-600 hover:text-blue-700 transition-colors">Semua Log</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <tbody class="divide-y divide-slate-50">
                        @foreach($latestActivities as $log)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-4">
                                <div class="flex items-center gap-3">
                                    @php
                                        $iconLog = match($log->action) {
                                            'create' => 'ri-add-circle-line bg-green-50 text-green-600',
                                            'update' => 'ri-edit-line bg-blue-50 text-blue-600',
                                            'delete' => 'ri-delete-bin-line bg-red-50 text-red-600',
                                            'login' => 'ri-login-circle-line bg-orange-50 text-orange-600',
                                            default => 'ri-history-line bg-slate-50 text-slate-600',
                                        };
                                    @endphp
                                    <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ $iconLog }}">
                                        <i class="text-lg"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-slate-800 truncate">{{ $log->description }}</p>
                                        <p class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">{{ $log->user_name }} • {{ $log->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- === SIDEBAR WIDGETS === --}}
    <div class="space-y-8">
        {{-- Quick Actions --}}
        <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-[40px] shadow-xl p-8 text-white relative overflow-hidden group">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full blur-3xl group-hover:bg-[#FF6B00]/20 transition-all duration-700"></div>
            <h3 class="text-xl font-extrabold mb-6 relative z-10">Aksi Cepat ⚡</h3>
            <div class="grid grid-cols-2 gap-4 relative z-10">
                <a href="{{ route('prestasiprima.admin.berita.index') }}" class="p-4 bg-white/10 hover:bg-white/20 rounded-[28px] text-center transition-all border border-white/10 hover:border-white/20">
                    <i class="ri-article-line text-2xl block mb-2"></i>
                    <span class="text-[11px] font-bold uppercase tracking-widest">Post Berita</span>
                </a>
                <a href="{{ route('prestasiprima.admin.gallery.index') }}" class="p-4 bg-white/10 hover:bg-white/20 rounded-[28px] text-center transition-all border border-white/10 hover:border-white/20">
                    <i class="ri-image-add-line text-2xl block mb-2"></i>
                    <span class="text-[11px] font-bold uppercase tracking-widest">Upload Galeri</span>
                </a>
                <a href="{{ route('prestasiprima.admin.settings.index') }}" class="p-4 bg-white/10 hover:bg-white/20 rounded-[28px] text-center transition-all border border-white/10 hover:border-white/20">
                    <i class="ri-equalizer-line text-2xl block mb-2"></i>
                    <span class="text-[11px] font-bold uppercase tracking-widest">Pengaturan</span>
                </a>
                <a href="{{ route('prestasiprima.admin.contact.index') }}" class="p-4 bg-white/10 hover:bg-white/20 rounded-[28px] text-center transition-all border border-white/10 hover:border-white/20">
                    <i class="ri-customer-service-2-line text-2xl block mb-2"></i>
                    <span class="text-[11px] font-bold uppercase tracking-widest">Bantuan</span>
                </a>
            </div>
        </div>

        {{-- Latest Inbox Widget --}}
        <div class="bg-white rounded-[40px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-800 tracking-tight">Pesan Terbaru</h3>
                <span class="w-3 h-3 bg-[#FF6B00] rounded-full animate-ping"></span>
            </div>
            <div class="p-6">
                @forelse($latestMessages as $message)
                    <div class="flex items-start gap-4 p-4 rounded-3xl hover:bg-slate-50 transition-colors {{ !$message->is_read ? 'bg-orange-50/30' : '' }} mb-3 group">
                        <div class="w-11 h-11 bg-gradient-to-tr from-slate-100 to-slate-200 rounded-2xl flex items-center justify-center font-bold text-slate-600 group-hover:from-[#FF6B00] group-hover:to-orange-500 group-hover:text-white transition-all">
                            {{ substr($message->nama, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-extrabold text-slate-800 truncate">{{ $message->nama }}</p>
                            <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">{{ $message->pesan }}</p>
                            <p class="text-[10px] text-slate-400 font-bold mt-1 uppercase">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-slate-400 text-sm italic py-8 text-center">Belum ada pesan masuk</p>
                @endforelse
                <a href="{{ route('prestasiprima.admin.contact.index') }}" class="w-full mt-4 py-4 bg-slate-50 text-slate-600 rounded-3xl text-xs font-bold hover:bg-slate-100 transition-all flex items-center justify-center gap-2 border border-slate-100">
                    Buka Seluruh Inbox
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Scripts for Chart.js --}}
{{-- Scripts for Chart.js (Loaded via Internal Bundle) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('visitorChart').getContext('2d');
        
        // Gradient for line chart
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(255, 107, 0, 0.4)');
        gradient.addColorStop(1, 'rgba(255, 107, 0, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartDates),
                datasets: [{
                    label: 'Pengunjung Unik',
                    data: @json($chartVisitors),
                    borderColor: '#FF6B00',
                    borderWidth: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#FF6B00',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    fill: true,
                    backgroundColor: gradient,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        titleFont: { size: 12, weight: 'bold' },
                        bodyFont: { size: 12 },
                        padding: 12,
                        cornerRadius: 12,
                        displayColors: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.03)', drawBorder: false },
                        ticks: { font: { size: 11, weight: 'bold' }, color: '#94a3b8' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 11, weight: 'bold' }, color: '#94a3b8' }
                    }
                }
            }
        });
    });
</script>

@endsection
