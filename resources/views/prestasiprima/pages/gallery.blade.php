@extends('prestasiprima.index')

@section('title', 'Galeri Dokumentasi - SMK Prestasi Prima')

@section('content')
<div class="bg-white overflow-hidden min-h-screen pt-24 pb-32"
     x-data="{
         category: 'all',
         visible: 6,
         total: {{ count($galleries) }},
         expanded: false,
         toggleView() {
             this.expanded = !this.expanded;
             this.visible = this.expanded ? this.total : 6;
         }
     }">

    {{-- Decor Elements --}}
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-40 -left-20 w-80 h-80 bg-orange-50 rounded-full blur-[120px] opacity-60"></div>
        <div class="absolute bottom-40 -right-20 w-96 h-96 bg-orange-100 rounded-full blur-[150px] opacity-40"></div>
    </div>

    @php
        $resolveLocalThumbnail = function (?string $videoId, ?string $fallback = null) {
            $localCandidates = [];
            if ($videoId) {
                $localCandidates[] = "assets/images/video-thumbnails/{$videoId}.webp";
                $localCandidates[] = "assets/images/video-thumbnails/{$videoId}.jpg";
                $localCandidates[] = "assets/images/video-thumbnails/{$videoId}.png";
            }
            if ($fallback) {
                if (\Illuminate\Support\Str::startsWith($fallback, ['http://', 'https://'])) return $fallback;
                $localCandidates[] = ltrim($fallback, '/');
            }
            foreach ($localCandidates as $candidate) {
                if (file_exists(public_path($candidate))) return $candidate;
            }
            return $videoId ? "https://i.ytimg.com/vi/{$videoId}/hqdefault.jpg" : null;
        };
    @endphp

    {{-- ====================== HERO SECTION ====================== --}}
    <section class="relative z-10 pt-20 pb-16 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Text Content -->
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <div class="inline-block px-4 py-1.5 rounded-full bg-orange-100 text-orange-700 text-[10px] font-black uppercase tracking-[0.2em] mb-6" data-aos="fade-right">
                        Visual Archives
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-gray-900 leading-[0.95] mb-8 tracking-tighter" data-aos="fade-right" data-aos-delay="100">
                        Dokumentasi <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Prestasi Prima</span>
                    </h1>
                    <p class="text-gray-500 text-lg md:text-xl font-medium max-w-xl mb-10 leading-relaxed" data-aos="fade-right" data-aos-delay="200">
                        Menangkap setiap detik perjalanan, keberhasilan, dan semangat kebersamaan dalam visual yang memukau. Dari kegiatan harian hingga momen kemenangan.
                    </p>
                </div>

                <!-- Featured Card (Cinematic) -->
                <div class="w-full lg:w-1/2" data-aos="zoom-in" data-aos-delay="300">
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-orange-100/50 rounded-[2.5rem] blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border border-gray-100 bg-white">
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
                                        'gradient' => 'from-orange-600 to-orange-400',
                                        'thumbnailPath' => $heroThumbnail,
                                        'wrapperClass' => 'aspect-video',
                                        'behavior' => 'inline'
                                    ])
                                @endif
                            @endif
                            <div class="p-8 bg-white border-t border-gray-50">
                                <div class="flex items-center justify-between mb-4">
                                     <span class="text-[10px] font-black text-orange-600 uppercase tracking-widest">{{ $galleries->first()->category ?? 'Featured' }}</span>
                                     <span class="text-gray-400 text-xs font-bold">{{ $galleries->first()->created_at->format('d M Y') }}</span>
                                </div>
                                <h3 class="text-2xl font-black text-gray-900 leading-tight">
                                    {{ $galleries->first()->title }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== NAVIGATION & FILTER ====================== --}}
    <section class="relative z-10 py-12 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-8 border-y border-gray-100 py-10">
            <h2 class="text-xl font-black text-gray-900 uppercase tracking-widest flex items-center gap-3">
                <iconify-icon icon="solar:filters-bold-duotone" class="text-2xl text-orange-600"></iconify-icon>
                Explore <span class="text-orange-600">Categories</span>
            </h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 w-full max-w-4xl mx-auto">
                @php
                    $categoryIcons = [
                        'all' => 'solar:widget-3-bold',
                        'Kegiatan Sekolah' => 'solar:users-group-rounded-bold',
                        'Prestasi' => 'solar:cup-bold',
                        'Kunjungan' => 'solar:bus-bold',
                        'Lomba' => 'solar:medal-ribbon-bold',
                        'Ekstrakurikuler' => 'solar:star-bold',
                        'Kesehatan' => 'solar:heart-pulse-bold',
                        'Olahraga' => 'solar:basketball-bold',
                    ];
                @endphp

                <button @click="category='all'" 
                        :class="category === 'all' ? 'bg-orange-600 text-white shadow-xl scale-105' : 'bg-white text-gray-500 hover:text-orange-600 border border-gray-100'"
                        class="px-4 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all duration-500 flex items-center justify-center gap-3">
                    <iconify-icon icon="{{ $categoryIcons['all'] }}" class="text-xl"></iconify-icon>
                    Show All
                </button>

                @foreach ($categories as $cat)
                    <button @click="category='{{ $cat }}'" 
                            :class="category === '{{ $cat }}' ? 'bg-orange-600 text-white shadow-xl scale-105' : 'bg-white text-gray-400 hover:text-orange-600 border border-gray-100'"
                            class="px-4 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all duration-500 flex items-center justify-center gap-3">
                        <iconify-icon icon="{{ $categoryIcons[$cat] ?? 'solar:album-bold' }}" class="text-xl"></iconify-icon>
                        {{ $cat }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== GALLERY GRID ====================== --}}
    <section class="relative z-10 pt-10 pb-20 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($galleries as $i => $item)
                    <div x-show="(category==='all' || category==='{{ $item->category }}') && {{ $i }} < visible"
                         x-transition:enter="transition ease-out duration-700 delay-{{ $i % 3 * 100 }}"
                         x-transition:enter-start="opacity-0 translate-y-20 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         class="group relative bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-[0_40px_80px_-15px_rgba(0,0,0,0.1)] transition-all duration-700 hover:-translate-y-4">
                        
                        {{-- Media Area --}}
                        <div class="relative overflow-hidden aspect-video">
                            @if($item->video_url)
                                @php
                                    preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|live\/))([\w\-]+)/", $item->video_url, $matches);
                                    $videoId = $matches[1] ?? null;
                                    $cardThumbnail = $resolveLocalThumbnail($videoId, $item->thumbnail_url ?? null);
                                    $gradients = [
                                        'from-orange-600 to-orange-400',
                                        'from-gray-900 to-gray-700',
                                        'from-orange-500 to-yellow-500'
                                    ];
                                    $gradient = $gradients[$loop->index % count($gradients)];
                                @endphp
                                @if($videoId)
                                    @include('components.youtube-lite', [
                                        'videoId' => $videoId,
                                        'title' => $item->title,
                                        'gradient' => $gradient,
                                        'thumbnailPath' => $cardThumbnail,
                                        'wrapperClass' => 'w-full h-full cursor-pointer',
                                        'behavior' => 'modal'
                                    ])
                                @endif
                            @endif
                        </div>

                        {{-- Content Area --}}
                        <div class="p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="px-3 py-1 bg-orange-50 text-orange-600 text-[9px] font-black uppercase tracking-widest rounded-lg">
                                    {{ $item->category ?? 'Gallery' }}
                                </span>
                                <span class="text-gray-300 text-[10px] font-bold">{{ $item->created_at->format('M Y') }}</span>
                            </div>
                            <h3 class="text-lg md:text-xl font-black text-gray-900 leading-snug group-hover:text-orange-600 transition-colors duration-500 line-clamp-2">
                                {{ $item->title }}
                            </h3>
                        </div>

                        {{-- Decorative Hover Glow --}}
                        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-orange-50 rounded-full blur-[40px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                    </div>
                @endforeach
            </div>

            {{-- Empty State --}}
            <div x-show="total === 0" class="text-center py-40">
                <iconify-icon icon="lucide:image-off" class="text-6xl text-gray-200 mb-6"></iconify-icon>
                <p class="text-gray-400 font-bold uppercase tracking-widest">Belum ada dokumentasi tersedia.</p>
            </div>

            {{-- ====================== LOAD MORE ====================== --}}
            <div class="mt-24 text-center" x-show="visible < total">
                <button
                    @click="toggleView()"
                    class="group relative inline-flex items-center gap-6 px-14 py-6 rounded-[2rem] bg-white border-2 border-orange-500 text-orange-600 font-black text-xs uppercase tracking-[0.4em] transition-all duration-700 hover:bg-orange-600 hover:text-white hover:shadow-[0_25px_50px_-12px_rgba(234,88,12,0.4)] hover:-translate-y-2 active:scale-95 overflow-hidden">
                    
                    <!-- Shiny Animated Grain Background -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-10 pointer-events-none bg-[url('https://grainy-gradients.vercel.app/noise.svg')] bg-repeat"></div>
                    
                    <span class="relative z-10" x-text="expanded ? 'Condense Gallery' : 'Explore More Documents'"></span>
                    
                    <div class="relative z-10 w-10 h-10 rounded-full bg-orange-100 group-hover:bg-white/20 flex items-center justify-center transition-colors duration-500">
                        <iconify-icon icon="lucide:chevron-down" 
                                      class="text-xl group-hover:rotate-180 transition-transform duration-700" 
                                      :class="expanded ? 'rotate-180' : ''"></iconify-icon>
                    </div>

                    <!-- Flowing Border Gradient on Hover -->
                    <div class="absolute inset-0 border-4 border-transparent group-hover:border-white/20 rounded-[2rem] transition-all duration-700"></div>
                </button>
            </div>
        </div>
    </div>

    {{-- ====================== VIDEO MODAL ====================== --}}
    <div id="videoModal"
         class="fixed inset-0 bg-black/95 hidden items-center justify-center z-[100] transition-all duration-500 p-4 md:p-10 backdrop-blur-2xl"
         onclick="closeVideoModal()">
        <div class="relative w-full max-w-5xl bg-black rounded-[2.5rem] overflow-hidden shadow-[0_0_100px_rgba(234,88,12,0.2)] border border-white/10" onclick="event.stopPropagation()">
            <!-- Close Button -->
            <button onclick="closeVideoModal()" 
                    class="absolute top-6 right-6 z-10 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-full flex items-center justify-center transition-all duration-300 group">
                <iconify-icon icon="lucide:x" class="text-2xl group-hover:rotate-90 transition-transform"></iconify-icon>
            </button>
            
            <!-- Video Container -->
            <div class="aspect-video w-full bg-gray-900">
                <iframe id="videoFrame" src="" class="w-full h-full" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

            <!-- Modal Info -->
            <div class="p-8 bg-black/40 backdrop-blur-md border-t border-white/10">
                <h3 id="modalVideoTitle" class="text-2xl font-black text-white tracking-tight"></h3>
                <p class="text-gray-400 text-sm mt-1 uppercase tracking-widest font-bold">Dokumentasi Prestasi Prima</p>
            </div>
        </div>
    </div>
</div>

@include('components.youtube-lite-script')

<script>
    function openVideoModal(videoId, title) {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');
        const titleEl = document.getElementById('modalVideoTitle');
        
        if (modal && frame && titleEl) {
            frame.src = `https://www.youtube-nocookie.com/embed/${videoId}?autoplay=1&modestbranding=1&rel=0`;
            titleEl.innerText = title;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            
            // GSAP style transition if available, or just CSS
            setTimeout(() => { modal.style.opacity = '1'; }, 10);
        }
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');
        
        if (modal && frame) {
            modal.style.opacity = '0';
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                frame.src = '';
                document.body.style.overflow = '';
            }, 500);
        }
    }

    // Support ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeVideoModal();
    });
</script>

<style>
    /* Custom Cinematic Transitions */
    [x-show] { transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    #videoModal { opacity: 0; }
</style>
@endsection
