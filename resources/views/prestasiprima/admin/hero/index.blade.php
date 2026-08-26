@extends('layouts.admin')

@section('title', 'Manajemen Hero Video')

@section('content')
<div class="space-y-8">
    {{-- ================= HEADER SECTION ================= --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-orange-500/10 text-orange-600 flex items-center justify-center">
                    <i class="ri-play-circle-line text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Hero Video Section</h1>
                    <p class="text-sm text-slate-500 font-medium">Kelola video YouTube background pembuka pada halaman utama website.</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-auto">
            <a href="{{ route('landing') }}#heroVideoSection" target="_blank"
               class="inline-flex items-center justify-center gap-2 bg-white border border-slate-200 hover:border-slate-300 text-slate-700 px-5 py-3 rounded-2xl font-bold transition-all shadow-sm hover:shadow active:scale-95 text-sm">
                <i class="ri-external-link-line text-lg text-slate-400"></i>
                Lihat di Beranda
            </a>
            
            <a href="{{ route('prestasiprima.admin.hero.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-[#FF6B00] hover:bg-[#e66000] text-white px-6 py-3 rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-orange-500/20 active:scale-95 text-sm">
                <i class="ri-add-circle-line text-lg"></i>
                Tambah Preset Video
            </a>
        </div>
    </div>

    {{-- ================= ACTIVE VIDEO HIGHLIGHT CARD ================= --}}
    @if($activeHero)
        <div class="bg-gradient-to-br from-slate-900 via-slate-850 to-slate-900 rounded-[2.5rem] p-6 sm:p-8 md:p-10 text-white relative overflow-hidden shadow-xl border border-slate-800">
            <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                {{-- Video Player Preview --}}
                <div class="lg:col-span-5">
                    <div class="relative aspect-video rounded-3xl overflow-hidden shadow-2xl border border-white/10 bg-black group">
                        <iframe src="{{ $activeHero->embed_url }}"
                                class="w-full h-full object-cover"
                                title="Active YouTube Hero Video"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        <div class="absolute top-3 left-3 bg-emerald-500/90 backdrop-blur-md text-white text-[10px] font-black uppercase px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-lg">
                            <span class="w-2 h-2 rounded-full bg-white animate-ping"></span>
                            Sedang Tayang di Beranda
                        </div>
                    </div>
                </div>

                {{-- Information Details --}}
                <div class="lg:col-span-7 space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-orange-500/20 text-orange-400 text-xs font-bold font-mono">
                        <i class="ri-youtube-line"></i> ID: {{ $activeHero->video_id }}
                    </div>

                    <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">
                        {{ $activeHero->title }}
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-300 italic">
                        {{ $activeHero->tagline }}
                    </p>

                    <p class="text-xs sm:text-sm text-slate-400 leading-relaxed line-clamp-3">
                        {{ $activeHero->description }}
                    </p>

                    {{-- HUD Preview Tags --}}
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="px-3 py-1 rounded-xl bg-white/5 border border-white/10 text-[11px] font-medium text-slate-300">
                            Tag: {{ $activeHero->hud_tag }}
                        </span>
                        <span class="px-3 py-1 rounded-xl bg-white/5 border border-white/10 text-[11px] font-medium text-slate-300">
                            Status: {{ $activeHero->hud_status }}
                        </span>
                        <span class="px-3 py-1 rounded-xl bg-white/5 border border-white/10 text-[11px] font-medium text-slate-300">
                            Mission: {{ $activeHero->hud_mission }}
                        </span>
                    </div>

                    {{-- Action Links --}}
                    <div class="pt-4 flex items-center gap-3">
                        <a href="{{ route('prestasiprima.admin.hero.edit', $activeHero->id) }}"
                           class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-5 py-2.5 rounded-xl font-bold text-xs transition-all backdrop-blur-sm">
                            <i class="ri-edit-line"></i> Edit Konfigurasi
                        </a>
                        <a href="{{ $activeHero->video_url }}" target="_blank"
                           class="inline-flex items-center gap-2 text-slate-400 hover:text-orange-400 text-xs font-bold transition-colors">
                            <i class="ri-external-link-line"></i> Buka di YouTube
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ================= ALL HERO PRESETS TABLE ================= --}}
    <div class="bg-white rounded-3xl sm:rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex items-center justify-between">
            <h2 class="text-base font-extrabold text-slate-800 tracking-tight flex items-center gap-2">
                <i class="ri-list-check-2 text-orange-500"></i> Daftar Preset Video Hero
            </h2>
            <span class="text-xs font-bold text-slate-400">Total: {{ $heroVideos->total() }} preset</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                        <th class="px-6 py-4 w-28">Preview</th>
                        <th class="px-6 py-4">Judul & Tagline</th>
                        <th class="px-6 py-4 hidden md:table-cell">YouTube ID</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse ($heroVideos as $item)
                        <tr class="hover:bg-slate-50/80 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="w-20 aspect-video rounded-xl bg-slate-100 border border-slate-200 overflow-hidden shadow-sm relative">
                                    <img src="https://img.youtube.com/vi/{{ $item->video_id }}/hqdefault.jpg" 
                                         alt="{{ $item->title }}"
                                         onerror="this.src='{{ asset('assets/images/section/hero/herobg2.webp') }}'"
                                         class="w-full h-full object-cover">
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div>
                                    <h4 class="font-extrabold text-slate-800 text-sm group-hover:text-[#FF6B00] transition-colors leading-snug">
                                        {{ $item->title }}
                                    </h4>
                                    <p class="text-xs text-slate-400 italic mt-0.5 line-clamp-1">
                                        {{ $item->tagline }}
                                    </p>
                                </div>
                            </td>

                            <td class="px-6 py-4 hidden md:table-cell">
                                <a href="https://www.youtube.com/watch?v={{ $item->video_id }}" target="_blank"
                                   class="inline-flex items-center gap-1 font-mono text-xs font-bold text-slate-500 hover:text-orange-600">
                                    <i class="ri-youtube-fill text-red-500 text-sm"></i> {{ $item->video_id }}
                                </a>
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if($item->is_active)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Aktif
                                    </span>
                                @else
                                    <form action="{{ route('prestasiprima.admin.hero.set-active', $item->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-500 hover:bg-orange-100 hover:text-orange-600 transition-all cursor-pointer"
                                                title="Klik untuk mengaktifkan video ini">
                                            Jadikan Aktif
                                        </button>
                                    </form>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('prestasiprima.admin.hero.edit', $item->id) }}"
                                       class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-orange-50 text-slate-600 hover:text-[#FF6B00] transition-all duration-300"
                                       title="Edit Preset">
                                        <i class="ri-edit-2-line text-base"></i>
                                    </a>

                                    @if(!$item->is_active)
                                        <form action="{{ route('prestasiprima.admin.hero.destroy', $item->id) }}" method="POST" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus preset \'{{ addslashes($item->title) }}\'?');" 
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="w-9 h-9 flex items-center justify-center rounded-xl bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 transition-all duration-300 cursor-pointer"
                                                    title="Hapus Preset">
                                                <i class="ri-delete-bin-6-line text-base"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center text-slate-400">
                                Belum ada preset video.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($heroVideos->hasPages())
            <div class="p-6 border-t border-slate-50">
                {{ $heroVideos->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
