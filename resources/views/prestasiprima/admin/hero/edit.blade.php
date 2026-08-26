@extends('layouts.admin')

@section('title', 'Edit Preset Hero Video')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">
    {{-- ================= HEADER ================= --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('prestasiprima.admin.hero.index') }}" 
               class="w-11 h-11 flex items-center justify-center rounded-2xl bg-white border border-slate-200 text-slate-600 hover:bg-orange-50 hover:text-[#FF6B00] hover:border-orange-200 transition-all shadow-sm">
                <i class="ri-arrow-left-line text-xl"></i>
            </a>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Edit Preset Hero Video</h1>
                <p class="text-sm text-slate-500 font-medium">Perbarui konfigurasi video YouTube dan teks hero section.</p>
            </div>
        </div>
    </div>

    {{-- ================= FORM ================= --}}
    <form action="{{ route('prestasiprima.admin.hero.update', $hero->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            {{-- Left Column: Input Fields --}}
            <div class="lg:col-span-7 bg-white rounded-3xl sm:rounded-[2.5rem] shadow-sm border border-slate-100 p-6 sm:p-8 space-y-6">
                {{-- Judul Preset --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Judul Preset Video <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title', $hero->title) }}" required
                           placeholder="Contoh: Video Profil Utama SMK Prestasi Prima"
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none">
                    @error('title')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- URL YouTube Video --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                        Link / URL YouTube <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="video_url" id="video_url_input" value="{{ old('video_url', $hero->video_url) }}" required
                           placeholder="https://www.youtube.com/watch?v=... atau https://youtu.be/..."
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 transition-all outline-none">
                    <p class="text-[11px] text-slate-400">
                        Mendukung semua format link: full link, youtu.be, shorts, embed, maupun ID 11 karakter.
                    </p>
                    @error('video_url')
                        <p class="text-xs text-red-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Headline Section --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">Headline Atas</label>
                        <input type="text" name="headline_top" value="{{ old('headline_top', $hero->headline_top) }}"
                               placeholder="PRESTASI"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold text-slate-800 focus:bg-white focus:border-orange-500 outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">Headline Bawah</label>
                        <input type="text" name="headline_bottom" value="{{ old('headline_bottom', $hero->headline_bottom) }}"
                               placeholder="PRIMA"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-bold text-slate-800 focus:bg-white focus:border-orange-500 outline-none">
                    </div>
                </div>

                {{-- Tagline --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">Tagline / Motto</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $hero->tagline) }}"
                           placeholder='"If better is possible, good is not enough"'
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 outline-none">
                </div>

                {{-- Deskripsi --}}
                <div class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">Deskripsi Singkat</label>
                    <textarea name="description" rows="3"
                              class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-medium text-slate-800 focus:bg-white focus:border-orange-500 outline-none">{{ old('description', $hero->description) }}</textarea>
                </div>

                {{-- HUD Text Elements --}}
                <div class="pt-4 border-t border-slate-100">
                    <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-400 mb-3">Teks Ornamen Digital HUD (Video Overlay)</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">HUD Top Tag</label>
                            <input type="text" name="hud_tag" value="{{ old('hud_tag', $hero->hud_tag) }}"
                                   class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">HUD Status</label>
                            <input type="text" name="hud_status" value="{{ old('hud_status', $hero->hud_status) }}"
                                   class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">HUD Mission</label>
                            <input type="text" name="hud_mission" value="{{ old('hud_mission', $hero->hud_mission) }}"
                                   class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-800 outline-none">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Live Preview & Status --}}
            <div class="lg:col-span-5 space-y-6">
                {{-- Live Preview Box --}}
                <div class="bg-white p-6 rounded-3xl sm:rounded-[2.5rem] border border-slate-100 shadow-sm space-y-4">
                    <h3 class="text-sm font-extrabold text-slate-800 flex items-center gap-2">
                        <i class="ri-tv-line text-orange-500"></i> Live Preview YouTube
                    </h3>

                    <div class="aspect-video rounded-2xl overflow-hidden bg-slate-900 border border-slate-200 shadow-inner relative">
                        <iframe id="preview_iframe"
                                class="w-full h-full"
                                src="https://www.youtube.com/embed/{{ $hero->video_id }}"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-2xl border border-slate-100 flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">
                            <i class="ri-check-line font-bold"></i>
                        </div>
                        <div class="text-xs">
                            <span class="text-slate-400 block text-[10px] uppercase font-bold">Deteksi ID YouTube</span>
                            <span id="detected_yt_id" class="font-mono font-bold text-slate-800">{{ $hero->video_id }}</span>
                        </div>
                    </div>
                </div>

                {{-- Status Aktif Toggle --}}
                <div class="bg-white p-6 rounded-3xl sm:rounded-[2.5rem] border border-slate-100 shadow-sm space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-bold text-slate-800">Jadikan Video Aktif</h4>
                            <p class="text-xs text-slate-400">Video ini akan langsung tampil di latar beranda website.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ $hero->is_active ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#FF6B00]"></div>
                        </label>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex flex-col gap-3">
                        <button type="submit" 
                                class="w-full py-3.5 rounded-2xl bg-[#FF6B00] hover:bg-[#e66000] text-white font-bold text-sm transition-all shadow-lg shadow-orange-500/20 active:scale-95 text-center flex items-center justify-center gap-2 cursor-pointer">
                            <i class="ri-check-line text-lg"></i>
                            Perbarui Video Hero
                        </button>
                        <a href="{{ route('prestasiprima.admin.hero.index') }}" 
                           class="w-full py-3 rounded-2xl border border-slate-200 text-slate-600 font-bold text-xs hover:bg-slate-50 transition-all text-center">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('video_url_input');
    const iframe = document.getElementById('preview_iframe');
    const idBadge = document.getElementById('detected_yt_id');

    const extractYtId = (url) => {
        if (!url) return 'EYzn0caf0_k';
        url = url.trim();
        if (/^[a-zA-Z0-9_\-]{11}$/.test(url)) return url;
        const vMatch = url.match(/[?&]v=([a-zA-Z0-9_\-]{11})/i);
        if (vMatch && vMatch[1]) return vMatch[1];
        const match = url.match(/(?:youtu\.be\/|youtube(?:-nocookie)?\.(?:com|be|sch\.id)\/(?:embed\/|shorts\/|live\/|v\/|watch\?v=|e\/)|youtube\/)([a-zA-Z0-9_\-]{11})/i);
        if (match && match[1]) return match[1];
        const slashMatch = url.match(/[\/=]([a-zA-Z0-9_\-]{11})(?:[?&#\s]|$)/i);
        if (slashMatch && slashMatch[1]) return slashMatch[1];
        const anyMatch = url.match(/([a-zA-Z0-9_\-]{11})/);
        if (anyMatch && anyMatch[1]) return anyMatch[1];
        return 'EYzn0caf0_k';
    };

    const updatePreview = () => {
        const id = extractYtId(input.value);
        idBadge.textContent = id;
        iframe.src = `https://www.youtube.com/embed/${id}`;
    };

    input.addEventListener('input', updatePreview);
    input.addEventListener('paste', () => setTimeout(updatePreview, 100));
    updatePreview();
});
</script>
@endsection
