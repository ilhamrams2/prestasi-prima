@extends('prestasiprima.index')

@section('title', 'Galeri Kegiatan Sekolah')

@section('content')
<section 
    class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 py-16 pt-44"
    x-data="{
        category: 'all',
        visible: 3,
        total: {{ count($galleries) }},
        expanded: false,
        toggleView() {
            this.expanded = !this.expanded;
            this.visible = this.expanded ? this.total : 3;
        }
    }"
>

    @php
        $resolveLocalThumbnail = function (?string $videoId, ?string $fallback = null) {
            $localCandidates = [];

            if ($videoId) {
                $localCandidates[] = "assets/images/video-thumbnails/{$videoId}.webp";
                $localCandidates[] = "assets/images/video-thumbnails/{$videoId}.jpg";
                $localCandidates[] = "assets/images/video-thumbnails/{$videoId}.png";
            }

            if ($fallback) {
                if (\Illuminate\Support\Str::startsWith($fallback, ['http://', 'https://'])) {
                    return $fallback;
                }

                $localCandidates[] = ltrim($fallback, '/');
            }

            foreach ($localCandidates as $candidate) {
                if (file_exists(public_path($candidate))) {
                    return $candidate;
                }
            }

            return $videoId ? "https://i.ytimg.com/vi/{$videoId}/hqdefault.jpg" : null;
        };
    @endphp

    {{-- ====================== JUDUL UTAMA ====================== --}}
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 dark:text-white mb-3 tracking-tight animate-fade-down">
            Dokumentasi Kegiatan Sekolah
        </h1>
        <p class="text-gray-600 dark:text-gray-300 text-base animate-fade-up">
            Mengabadikan momen terbaik dari berbagai kegiatan dan prestasi siswa kami
        </p>
    </div>

    {{-- ====================== VIDEO UTAMA ====================== --}}
    <div class="mb-14 flex justify-center animate-fade-in">
        <div class="relative w-full md:w-3/4 lg:w-2/3 overflow-hidden rounded-2xl shadow-2xl bg-white/10 backdrop-blur-md border border-gray-200 dark:border-gray-700 hover:scale-[1.02] transition-transform duration-500">
            @if($galleries->isNotEmpty() && $galleries->first()->video_url)
                @php
                    preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|live\/))([\w\-]+)/", $galleries->first()->video_url, $matches);
                    $videoId = $matches[1] ?? null;
                    $heroThumbnail = $resolveLocalThumbnail($videoId, $galleries->first()->thumbnail_url ?? null);
                @endphp
                @if($videoId)
                    @include('components.youtube-lite', [
                        'videoId' => $videoId,
                        'title' => $galleries->first()->title,
                        'gradient' => 'from-orange-500 via-orange-400 to-orange-600',
                        'thumbnailPath' => $heroThumbnail,
                        'wrapperClass' => 'w-full h-full',
                        'behavior' => 'inline'
                    ])
                @else
                    <div class="w-full aspect-video flex items-center justify-center bg-gray-100 text-gray-500 rounded-2xl">
                        Tidak ada video tersedia
                    </div>
                @endif
            @else
                <div class="w-full aspect-video flex items-center justify-center bg-gray-100 text-gray-500 rounded-2xl">
                    Tidak ada video tersedia
                </div>
            @endif
        </div>
    </div>

    {{-- ====================== FILTER KATEGORI ====================== --}}
    <div class="flex flex-wrap justify-center gap-4 mb-16">
        @php
            $icons = [
                'all' => 'ri-stack-line',
                'Kegiatan Sekolah' => 'ri-community-line',
                'Prestasi' => 'ri-trophy-line',
                'Kunjungan' => 'ri-route-line',
                'Lomba' => 'ri-medal-line',
                'Ekstrakurikuler' => 'ri-team-line',
                'Kesehatan' => 'ri-heart-pulse-line',
                'Olahraga' => 'ri-dumbbell-line',
            ];
        @endphp

        <button
            @click="category='all'; visible=3"
            :class="category==='all'
                ? 'bg-gradient-to-r from-orange-600 to-orange-500 text-white shadow-lg scale-105'
                : 'bg-white/60 dark:bg-gray-800/60 text-gray-700 dark:text-gray-200 hover:bg-orange-500 hover:text-white'"
            class="flex items-center gap-2 px-5 py-2.5 text-sm rounded-full font-medium transition-all duration-300 transform hover:scale-105 backdrop-blur-md border border-gray-200 dark:border-gray-700"
        >
            <i class="{{ $icons['all'] }} text-lg"></i>
            <span>Semua</span>
        </button>

        @foreach ($categories as $cat)
            @php $icon = $icons[$cat] ?? 'ri-image-line'; @endphp
            <button
                @click="category='{{ $cat }}'; visible=3"
                :class="category==='{{ $cat }}'
                    ? 'bg-gradient-to-r from-orange-600 to-orange-500 text-white shadow-lg scale-105'
                    : 'bg-white/60 dark:bg-gray-800/60 text-gray-700 dark:text-gray-200 hover:bg-orange-500 hover:text-white'"
                class="flex items-center gap-2 px-5 py-2.5 text-sm rounded-full font-medium transition-all duration-300 transform hover:scale-105 backdrop-blur-md border border-gray-200 dark:border-gray-700"
            >
                <i class="{{ $icon }} text-lg"></i>
                <span>{{ $cat }}</span>
            </button>
        @endforeach
    </div>

    {{-- ====================== GRID GALERI ====================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
        @foreach ($galleries as $i => $item)
            <template x-if="(category==='all' || category==='{{ $item->category }}') && {{ $i }} < visible">
                <div
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-75 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    class="overflow-hidden rounded-2xl shadow-md bg-white/70 dark:bg-gray-800/80 border border-gray-100 dark:border-gray-700 backdrop-blur-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-[1.02] hover:ring-4 hover:ring-orange-400/30"
                >
                    @if($item->video_url)
                        @php
                            preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|live\/))([\w\-]+)/", $item->video_url, $matches);
                            $videoId = $matches[1] ?? null;
                            $cardThumbnail = $resolveLocalThumbnail($videoId, $item->thumbnail_url ?? null);
                            $gradients = [
                                'from-orange-500 via-orange-400 to-orange-600',
                                'from-sky-500 via-blue-500 to-indigo-600',
                                'from-emerald-500 via-teal-500 to-sky-500',
                                'from-amber-500 via-orange-600 to-rose-500',
                            ];
                            $gradient = $gradients[$loop->index % count($gradients)];
                        @endphp
                        @if($videoId)
                            @include('components.youtube-lite', [
                                'videoId' => $videoId,
                                'title' => $item->title,
                                'gradient' => $gradient,
                                'thumbnailPath' => $cardThumbnail,
                                'wrapperClass' => 'w-full',
                                'behavior' => 'inline'
                            ])
                        @else
                            <div class="w-full aspect-video flex items-center justify-center bg-gray-100 text-gray-500 rounded-t-2xl">
                                {{ $item->title }}
                            </div>
                        @endif
                    @else
                        <div class="w-full aspect-video flex items-center justify-center bg-gray-100 text-gray-500 rounded-t-2xl">
                            {{ $item->title }}
                        </div>
                    @endif

                    <div class="p-5 text-center">
                        <h3 class="text-base font-semibold text-gray-800 dark:text-gray-100 line-clamp-2 hover:text-orange-500 transition-colors duration-300">
                            {{ $item->title }}
                        </h3>
                        <p class="text-sm text-orange-500 mt-1 font-medium">
                            {{ $item->category ?? 'Tanpa Kategori' }}
                        </p>
                    </div>
                </div>
            </template>
        @endforeach
    </div>

    {{-- ====================== TOMBOL LIHAT SEMUA / TUTUP ====================== --}}
    <div class="mt-20 text-center">
        <button
            @click="toggleView()"
            x-transition.opacity
            class="px-8 py-3 font-semibold text-white bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105 focus:ring-4 focus:ring-orange-300 focus:outline-none"
            x-text="expanded ? 'Tutup Galeri' : 'Lihat Semua Video'"
        ></button>
    </div>

</section>

{{-- ====================== ANIMASI ====================== --}}
<style>
@keyframes fadeDown { from {opacity: 0; transform: translateY(-10px);} to {opacity: 1; transform: translateY(0);} }
@keyframes fadeUp { from {opacity: 0; transform: translateY(10px);} to {opacity: 1; transform: translateY(0);} }
@keyframes fadeIn { from {opacity: 0;} to {opacity: 1;} }
.animate-fade-down { animation: fadeDown 0.8s ease-out forwards; }
.animate-fade-up { animation: fadeUp 0.8s ease-out forwards; }
.animate-fade-in { animation: fadeIn 1s ease-out forwards; }
</style>

@include('components.youtube-lite-script')

@endsection
