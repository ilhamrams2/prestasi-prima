@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

{{-- ====== QUICK STATS ====== --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    @php
        $stats = [
            [
                'label' => 'Total Berita',
                'value' => $totalBerita,
                'icon' => 'ri-article-line',
                'color' => 'orange',
                'trend' => '+12% from last month'
            ],
            [
                'label' => 'Total Prestasi',
                'value' => $totalPrestasi ?? 0,
                'icon' => 'ri-award-line',
                'color' => 'orange',
                'trend' => '+5 new this week'
            ],
            [
                'label' => 'Total Kegiatan',
                'value' => $totalKegiatan ?? 0,
                'icon' => 'ri-calendar-event-line',
                'color' => 'orange',
                'trend' => '3 upcoming events'
            ],
            [
                'label' => 'Total Staff',
                'value' => $totalStaff ?? 0,
                'icon' => 'ri-user-star-line',
                'color' => 'orange',
                'trend' => 'Active members'
            ]
        ];
    @endphp

    @foreach($stats as $stat)
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-{{ $stat['color'] }}-50 rounded-2xl flex items-center justify-center">
                <i class="{{ $stat['icon'] }} text-2xl text-{{ $stat['color'] }}-600"></i>
            </div>
            <span class="text-[10px] font-bold text-{{ $stat['color'] }}-600 bg-{{ $stat['color'] }}-50 px-2 py-1 rounded-lg uppercase tracking-wider">
                Active
            </span>
        </div>
        <div>
            <h3 class="text-slate-500 text-sm font-semibold">{{ $stat['label'] }}</h3>
            <p class="text-3xl font-extrabold text-slate-800 mt-1">{{ number_format($stat['value']) }}</p>
            <p class="text-[11px] text-slate-400 mt-2 font-medium flex items-center gap-1">
                <i class="ri-arrow-right-up-line"></i> {{ $stat['trend'] }}
            </p>
        </div>
    </div>
    @endforeach
</div>

{{-- ====== MAIN DASHBOARD GRID ====== --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
    
    {{-- === RECENT ACTIVITIES / NEWS === --}}
    <div class="xl:col-span-2 space-y-8">
        <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-6 bg-[#FF6B00] rounded-full"></div>
                    <h3 class="text-lg font-bold text-slate-800 tracking-tight">Postingan Berita Terbaru</h3>
                </div>
                <a href="{{ route('prestasiprima.admin.berita.index') }}" class="text-sm font-bold text-[#FF6B00] hover:text-[#e66000] transition-colors">Lihat Semua</a>
            </div>
            <div class="p-2">
                @if($latestNews->isNotEmpty())
                    <div class="divide-y divide-slate-50">
                        @foreach($latestNews as $news)
                            <div class="p-6 hover:bg-slate-50 transition-colors rounded-2xl group cursor-pointer">
                                <div class="flex items-start gap-4">
                                    <div class="w-14 h-14 bg-slate-100 rounded-xl flex-shrink-0 flex items-center justify-center text-slate-400 group-hover:bg-[#FF6B00] group-hover:text-white transition-all duration-300">
                                        <i class="ri-newspaper-line text-2xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-[10px] font-bold text-[#FF6B00] bg-orange-50 px-2 py-0.5 rounded uppercase tracking-widest">Warta Sekolah</span>
                                            <span class="text-[10px] text-slate-400 font-medium">• {{ $news->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="font-bold text-slate-800 group-hover:text-[#FF6B00] transition-colors line-clamp-1">{{ $news->title }}</p>
                                        <p class="text-xs text-slate-500 mt-1 line-clamp-1">Kelola konten berita ini untuk publikasi ke website utama.</p>
                                    </div>
                                    <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('prestasiprima.admin.berita.show', $news->id) }}" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-[#FF6B00] hover:border-[#FF6B00] transition-all">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                        <a href="{{ route('prestasiprima.admin.berita.edit', $news->id) }}" class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-600 hover:text-[#FF6B00] hover:border-[#FF6B00] transition-all">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <i class="ri-inbox-line text-4xl text-slate-200 block mb-2"></i>
                        <p class="text-slate-400 text-sm italic font-medium">Belum ada berita yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- === SIDEBAR WIDGETS === --}}
    <div class="space-y-8">
        {{-- Achievement Widget --}}
        <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-800 tracking-tight">Prestasi</h3>
                <i class="ri-award-fill text-[#FF6B00] text-xl"></i>
            </div>
            <div class="p-6">
                @if($latestPrestasi->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($latestPrestasi as $prestasi)
                            <div class="flex items-center gap-3 p-3 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                                <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="ri-trophy-line text-[#FF6B00] text-lg"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">{{ $prestasi->judul }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium">{{ $prestasi->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-slate-400 text-sm italic py-4 text-center">No data available</p>
                @endif
                <a href="{{ route('prestasiprima.admin.prestasi.index') }}" class="w-full mt-6 py-3 px-4 bg-[#FF6B00] text-white rounded-2xl text-xs font-bold hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 flex items-center justify-center gap-2">
                    <i class="ri-bar-chart-line text-base"></i>
                    Lihat Semua Statistik
                </a>
            </div>
        </div>

        {{-- Inbox Widget --}}
        <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-800 tracking-tight">Pesan Masuk</h3>
                @if($unreadMessages > 0)
                    <span class="bg-[#FF6B00] text-white text-xs font-bold px-2.5 py-1 rounded-full">{{ $unreadMessages }}</span>
                @else
                    <i class="ri-mail-line text-[#FF6B00] text-xl"></i>
                @endif
            </div>
            <div class="p-6">
                @if($latestMessages->isNotEmpty())
                    <div class="space-y-4">
                        @foreach($latestMessages as $message)
                            <a href="{{ route('prestasiprima.admin.contact.show', $message->id) }}" class="flex items-start gap-3 p-3 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100 {{ !$message->is_read ? 'bg-orange-50/50' : '' }}">
                                <div class="w-10 h-10 bg-gradient-to-br from-[#FF6B00] to-orange-600 rounded-full flex items-center justify-center flex-shrink-0 text-white font-bold text-sm">
                                    {{ strtoupper(substr($message->nama, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-0.5">
                                        <p class="text-sm font-bold text-slate-800 truncate">{{ $message->nama }}</p>
                                        @if(!$message->is_read)
                                            <span class="w-2 h-2 bg-[#FF6B00] rounded-full"></span>
                                        @endif
                                    </div>
                                    <p class="text-xs text-slate-600 line-clamp-1">{{ $message->pesan }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium mt-0.5">{{ $message->created_at->diffForHumans() }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-slate-400 text-sm italic py-4 text-center">Belum ada pesan</p>
                @endif
                <a href="{{ route('prestasiprima.admin.contact.index') }}" class="w-full mt-6 py-3 px-4 bg-[#FF6B00] text-white rounded-2xl text-xs font-bold hover:bg-[#e66000] transition-all shadow-lg shadow-orange-500/20 flex items-center justify-center gap-2">
                    <i class="ri-mail-line text-base"></i>
                    Lihat Semua Pesan
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
