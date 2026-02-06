@extends('prestasiprima.index')

@section('title', 'MikroTik Academy - SMK Prestasi Prima')

@section('content')
<div class="bg-white min-h-screen pt-24 pb-32 overflow-x-hidden font-sans">
    {{-- Ambient Decorations --}}
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-orange-50 rounded-full blur-[150px] opacity-60"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[400px] h-[400px] bg-orange-100/40 rounded-full blur-[120px] opacity-40"></div>
    </div>

    {{-- Premium Background Watermark --}}
    <div class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-5xl opacity-[0.03] select-none pointer-events-none z-0 overflow-hidden">
        <img src="{{ asset('assets/images/mikrotik/logo-mikrotik.png') }}" class="w-full grayscale brightness-0">
    </div>

    {{-- ====================== HERO SECTION (REFACTORED) ====================== --}}
    <section class="relative z-10 pt-20 pb-24 px-6 overflow-hidden bg-white/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                {{-- Left Column: Text & Branding --}}
                <div data-aos="fade-right" class="max-w-xl">
                    <div class="mb-10 flex flex-col items-start gap-4">
                        <img src="{{ asset('assets/images/mikrotik/logo-mikrotik.png') }}" alt="MikroTik Logo" class="h-14 w-auto object-contain">
                        <div class="h-0.5 w-12 bg-[#F58220]"></div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em]">Official Academy Center</p>
                    </div>
                    
                    <h1 class="text-[2.5rem] md:text-[3.5rem] font-bold text-gray-950 leading-[1.1] tracking-tight mb-10">
                        Mencetak <span class="text-[#F58220]">Certified</span> <br>Network Associate.
                    </h1>

                    {{-- Principal Quote Box --}}
                    <div class="bg-white border-l-[6px] border-[#F58220] py-4 pl-8 md:pl-10">
                        <p class="text-gray-600 text-lg md:text-xl leading-relaxed font-medium mb-6 italic">
                            "Di SMK Prestasi Prima, kami menjembatani kurikulum sekolah dengan kebutuhan industri global melalui MikroTik Academy, membekali siswa dengan sertifikasi MTCNA yang diakui dunia."
                        </p>
                        <div class="flex flex-col">
                            <h4 class="font-bold text-gray-950 text-xl">Hendry Kurniawan, S.Kom., M.I.Kom.</h4>
                            <p class="text-sm font-semibold text-gray-400 uppercase tracking-widest mt-1">Kepala SMK Prestasi Prima</p>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Visual --}}
                <div class="relative flex justify-center lg:justify-end" data-aos="fade-left">
                    <div class="relative">
                        {{-- Orange Glow Backdrop --}}
                             <div class="absolute -inset-4 bg-orange-100 blur-2xl rounded-[50px] opacity-40 -z-10"></div>
                <img src="{{ asset('assets/images/section/tentang/kepala-sekolah.png') }}" alt="Kepala Sekolah"
                     class="w-[450px] relative z-20 rounded-[40px] shadow-2xl">
            </div>

                    {{-- Minimalist Floating Badge --}}
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-xl shadow-orange-100 border border-orange-50 hidden md:block z-30">
                        <div class="flex items-center gap-4">
                            <iconify-icon icon="solar:verified-check-bold" class="text-4xl text-[#F58220]"></iconify-icon>
                            <div>
                                <p class="font-black text-gray-950 text-sm">Industrial Integration</p>
                                <p class="text-xs text-gray-500 font-medium">Global Curriculum Standard</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== DESCRIPTION SECTION ====================== --}}
    <section class="py-24 bg-gray-50 relative z-10 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-gray-950 tracking-tighter mb-6 uppercase">Program <span class="text-[#F58220]">Academy</span></h2>
                <div class="w-16 h-1.5 bg-[#F58220] mx-auto rounded-full mb-8"></div>
                <p class="text-gray-500 max-w-3xl mx-auto text-lg leading-relaxed font-medium">
                    MikroTik Academy di SMK Prestasi Prima adalah program kemitraan resmi dengan MikroTik Latvia yang mengintegrasikan sertifikasi <span class="text-gray-900 font-bold">MTCNA</span> langsung ke dalam kurikulum kejuruan.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                {{-- Card 1 --}}
                <div class="group bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-orange-200/40 hover:border-orange-500/20" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-orange-600 transition-colors duration-500">
                        <iconify-icon icon="solar:document-bold-duotone" class="text-4xl text-[#F58220] group-hover:text-white transition-colors duration-500"></iconify-icon>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-950 mb-4 group-hover:text-orange-600 transition-colors duration-500">Sertifikasi Global</h3>
                    <p class="text-gray-500 leading-relaxed font-medium text-sm">Lulusan berhak mengikuti ujian sertifikasi <span class="text-gray-900 font-bold">MTCNA</span> yang diakui secara internasional di dunia IT.</p>
                </div>

                {{-- Card 2 --}}
                <div class="group bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-orange-200/40 hover:border-orange-500/20" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-orange-600 transition-colors duration-500">
                        <iconify-icon icon="solar:laptop-minimalistic-bold-duotone" class="text-4xl text-[#F58220] group-hover:text-white transition-colors duration-500"></iconify-icon>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-950 mb-4 group-hover:text-orange-600 transition-colors duration-500">Kurikulum Industri</h3>
                    <p class="text-gray-500 leading-relaxed font-medium text-sm">Materi pembelajaran selalu diperbarui sesuai dengan standar teknologi <span class="text-gray-900 font-bold">MikroTik RouterOS</span> terbaru.</p>
                </div>

                {{-- Card 3 --}}
                <div class="group bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:shadow-orange-200/40 hover:border-orange-500/20" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-orange-600 transition-colors duration-500">
                        <iconify-icon icon="solar:medal-star-bold-duotone" class="text-4xl text-[#F58220] group-hover:text-white transition-colors duration-500"></iconify-icon>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-950 mb-4 group-hover:text-orange-600 transition-colors duration-500">Keunggulan Lulusan</h3>
                    <p class="text-gray-500 leading-relaxed font-medium text-sm">Mencetak tenaga ahli jaringan yang siap kerja dengan kredibilitas tinggi di level <span class="text-gray-900 font-bold">Internasional</span>.</p>
                </div>
            </div>
        </div>
    </section>
   
    {{-- ====================== CURRICULUM SECTION (ORANGE & WHITE REFACTOR) ====================== --}}
    <section class="py-32 bg-white relative z-10 overflow-hidden">
        {{-- Subtle decorative background elements --}}
        <div class="absolute top-0 left-0 w-64 h-64 bg-orange-50 rounded-full blur-3xl opacity-40 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-50 rounded-full blur-3xl opacity-40 translate-x-1/3 translate-y-1/3"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-50 text-[#F58220] mb-4">
                    <span class="text-[10px] font-black uppercase tracking-widest">Global Standards</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-950 tracking-tight uppercase mb-6">Materi <span class="text-[#F58220]">MTCNA</span></h2>
                <div class="w-16 h-1.5 bg-orange-100 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $materi = [
                        ['id' => '01', 'title' => 'Introduction', 'desc' => 'Tampilan WebFig, WinBox, dan dasar-dasar CLI MikroTik.'],
                        ['id' => '02', 'title' => 'DHCP', 'desc' => 'Konfigurasi DHCP Client & Server untuk manajemen IP otomatis.'],
                        ['id' => '03', 'title' => 'Bridging', 'desc' => 'Menghubungkan jaringan lokal melalui fitur Bridge.'],
                        ['id' => '04', 'title' => 'Routing', 'desc' => 'Implementasi Static Routing dan manajemen tabel routing.'],
                        ['id' => '05', 'title' => 'Wireless', 'desc' => 'Keamanan jaringan nirkabel dan konfigurasi AP/Client.'],
                        ['id' => '06', 'title' => 'Firewall', 'desc' => 'Implementasi NAT, Mangle, dan Filter Rules keamanan.'],
                        ['id' => '07', 'title' => 'QoS', 'desc' => 'Manajemen bandwidth menggunakan Simple Queue dan PCQ.'],
                        ['id' => '08', 'title' => 'Tunnels', 'desc' => 'Konfigurasi VPN dan Point-to-Point Tunneling Protokol.'],
                    ];
                @endphp

                @foreach($materi as $i => $item)
                <div class="group relative bg-orange-50/40 border border-orange-100 p-10 rounded-[2.5rem] transition-all duration-500 hover:bg-white hover:border-[#F58220] hover:shadow-2xl hover:shadow-orange-200/50 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    {{-- Hover Accent Line --}}
                    <div class="absolute top-0 left-10 right-10 h-1 bg-[#F58220] rounded-b-full scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <span class="text-[#F58220]/20 font-black text-5xl mb-6 block transition-colors group-hover:text-[#F58220]/40 tracking-tighter">{{ $item['id'] }}</span>
                    <h3 class="text-gray-950 font-bold text-xl mb-4 tracking-tight group-hover:text-[#F58220] transition-colors">{{ $item['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-semibold transition-colors">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== CERTIFIED TRAINER SECTION (DYNAMIC REFACTOR) ====================== --}}
    @foreach($trainers as $trainer)
    <section class="py-32 px-6 bg-white overflow-hidden border-t border-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="relative bg-gray-50 rounded-[4rem] p-10 md:p-16 lg:p-24 overflow-hidden border border-gray-100" data-aos="fade-up">
                {{-- Decorative background text watermark --}}
                <div class="absolute -top-10 -right-20 text-[200px] font-black text-gray-950/[0.02] select-none pointer-events-none uppercase tracking-tighter hidden lg:block">
                    Trainer
                </div>

                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
                    
                    {{-- 1. Visual Block (The Instructor) --}}
                    <div class="w-full lg:w-[400px] shrink-0">
                        <div class="relative">
                            {{-- Geometric Accent --}}
                            <div class="absolute -inset-4 border-2 border-orange-100 rounded-[3.5rem] rotate-3 scale-105"></div>
                            
                            {{-- Main Photo Container --}}
                            <div class="relative rounded-[3rem] overflow-hidden shadow-2xl bg-white p-3 border border-gray-100 transform -rotate-2 transition-transform duration-700 hover:rotate-0">
                                <div class="aspect-square rounded-[2rem] overflow-hidden bg-gray-100 shadow-inner">
                                    <img src="{{ asset('storage/mikrotik/trainers/' . $trainer->photo) }}" alt="Trainer {{ $trainer->name }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                                </div>
                            </div>

                            {{-- Absolute Badge --}}
                            <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-[#F58220] rounded-3xl flex items-center justify-center text-white shadow-2xl rotate-12">
                                <iconify-icon icon="solar:verified-check-bold" class="text-4xl"></iconify-icon>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Content Block (Hierarchical Info) --}}
                    <div class="flex-grow text-center lg:text-left">
                        {{-- Small Context Label --}}
                        <div class="mb-8">
                            <span class="px-6 py-2 rounded-2xl bg-[#F58220] text-white text-[10px] font-black uppercase tracking-[0.25em] shadow-xl shadow-orange-950/20">
                                {{ $trainer->role }}
                            </span>
                        </div>
                        
                        {{-- Hero Name --}}
                        <h2 class="text-5xl md:text-7xl font-bold text-gray-950 tracking-tighter mb-6 leading-[0.9]">
                           {{ explode(',', $trainer->name)[0] }}, <br class="hidden md:block"> 
                            <span class="text-[#F58220] font-black">{{ $trainer->title }}</span>
                        </h2>
                        
                        {{-- Subtitle/Role --}}
                        <p class="text-xl md:text-2xl text-gray-400 font-medium max-w-xl mb-12 leading-relaxed">
                            {{ $trainer->description }}
                        </p>

                        {{-- Certificate Spotlight Trigger --}}
                        <div x-data="{ openModal: false, swiper: null }" class="relative">
                            {{-- The Trigger Card --}}
                            <div @click="openModal = true; $nextTick(() => { 
                                    window.ensureSwiper().then(Swiper => {
                                        if(!swiper) {
                                            swiper = new Swiper($refs.certSwiper, {
                                                effect: 'cards',
                                                grabCursor: true,
                                                pagination: { el: $refs.swiperPagination, clickable: true },
                                                navigation: { nextEl: $refs.nextBtn, prevEl: $refs.prevBtn },
                                            });
                                        }
                                    });
                                })" 
                                class="inline-flex flex-col md:flex-row items-center gap-10 p-8 bg-white rounded-[3rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.08)] border border-gray-50 group cursor-pointer hover:scale-[1.02] hover:shadow-2xl transition-all duration-500">
                                
                                {{-- Visual Stack Preview --}}
                                <div class="relative w-48 shrink-0">
                                    {{-- Stack Effect --}}
                                    @if($trainer->certificates->count() > 1)
                                        <div class="absolute inset-0 bg-gray-100 rounded-2xl rotate-6 translate-x-2 translate-y-2 opacity-50"></div>
                                        <div class="absolute inset-0 bg-gray-50 rounded-2xl -rotate-3 -translate-x-1 -translate-y-1 opacity-80"></div>
                                    @endif

                                    <div class="relative w-full aspect-[1.414/1] bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition-transform duration-500 group-hover:-translate-y-2">
                                        <img src="{{ asset('storage/mikrotik/certificates/' . $trainer->certificates->first()->image) }}" 
                                             alt="Certification Preview" 
                                             class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-orange-600/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        
                                        @if($trainer->certificates->count() > 1)
                                        <div class="absolute top-3 right-3 bg-gray-950/80 backdrop-blur-md text-white text-[10px] font-black px-3 py-1.5 rounded-full flex items-center gap-1.5">
                                            <iconify-icon icon="solar:gallery-bold" class="text-xs"></iconify-icon>
                                            {{ $trainer->certificates->count() }}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- Textual CTA --}}
                                <div class="text-center md:text-left flex-grow">
                                    <div class="flex items-center gap-3 mb-3 justify-center md:justify-start">
                                        <div class="w-8 h-8 rounded-xl bg-orange-50 flex items-center justify-center">
                                            <iconify-icon icon="solar:medal-star-bold" class="text-lg text-[#F58220]"></iconify-icon>
                                        </div>
                                        <span class="text-[10px] font-black text-[#F58220] uppercase tracking-[0.2em]">Verified Credentials</span>
                                    </div>
                                    <h4 class="text-2xl font-black text-gray-950 mb-3 tracking-tight">Lihat Riwayat Sertifikasi</h4>
                                    <p class="text-sm text-gray-400 font-medium leading-loose">
                                        {{ $trainer->certificates->count() }} Sertifikat Internasional Aktif. Klik untuk verifikasi detail dan validasi ID.
                                    </p>
                                </div>

                                {{-- Action Indicator --}}
                                <div class="shrink-0 w-14 h-14 rounded-full border-2 border-orange-50 flex items-center justify-center group-hover:bg-[#F58220] group-hover:border-[#F58220] transition-all duration-500">
                                    <iconify-icon icon="solar:arrow-right-up-bold" class="text-2xl text-[#F58220] group-hover:text-white transition-colors"></iconify-icon>
                                </div>
                            </div>

                            {{-- THE SLIDER MODAL (Teleport to Body for best UI) --}}
                            <template x-teleport="body">
                                <div x-show="openModal" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 z-[10000] flex items-center justify-center p-6 sm:p-12">
                                    
                                    {{-- Backdrop --}}
                                    <div @click="openModal = false" class="absolute inset-0 bg-gray-950/90 backdrop-blur-2xl"></div>

                                    {{-- Close Button --}}
                                    <button @click="openModal = false" class="absolute top-8 right-8 w-14 h-14 bg-white/10 hover:bg-white/20 text-white rounded-2xl flex items-center justify-center transition-all z-50">
                                        <iconify-icon icon="solar:close-circle-bold" class="text-3xl"></iconify-icon>
                                    </button>

                                    {{-- Modal Content --}}
                                    <div x-show="openModal" 
                                         x-transition:enter="transition ease-out duration-500 delay-100"
                                         x-transition:enter-start="opacity-0 translate-y-12"
                                         x-transition:enter-end="opacity-100 translate-y-0"
                                         class="relative w-full max-w-5xl z-10">
                                        
                                        {{-- Header Info --}}
                                        <div class="text-center mb-12">
                                            <p class="text-[10px] font-black text-orange-500 uppercase tracking-[0.5em] mb-3">Official Certification Record</p>
                                            <h3 class="text-3xl sm:text-4xl font-bold text-white tracking-tighter">{{ $trainer->name }}</h3>
                                        </div>

                                        {{-- Swiper Container --}}
                                        <div class="relative px-12 md:px-20">
                                            <div x-ref="certSwiper" class="swiper overflow-visible">
                                                <div class="swiper-wrapper">
                                                    @foreach($trainer->certificates as $cert)
                                                    <div class="swiper-slide h-auto">
                                                        <div class="bg-white rounded-[2rem] sm:rounded-[3rem] p-6 sm:p-10 shadow-2xl flex flex-col items-center">
                                                            {{-- Certificate Image --}}
                                                            <div class="relative w-full aspect-[1.414/1] rounded-2xl overflow-hidden border border-gray-100 shadow-inner mb-10 group/modal-img">
                                                                <img src="{{ asset('storage/mikrotik/certificates/' . $cert->image) }}" 
                                                                     alt="{{ $cert->title }}" 
                                                                     class="w-full h-full object-contain bg-gray-50 scale-95 group-hover/modal-img:scale-100 transition-transform duration-700">
                                                                
                                                                <a href="{{ asset('storage/mikrotik/certificates/' . $cert->image) }}" target="_blank"
                                                                   class="absolute top-4 right-4 w-12 h-12 bg-white/80 backdrop-blur-md rounded-xl flex items-center justify-center text-gray-900 opacity-0 group-hover/modal-img:opacity-100 transition-opacity">
                                                                    <iconify-icon icon="solar:magnifer-zoom-in-bold" class="text-2xl"></iconify-icon>
                                                                </a>
                                                            </div>

                                                            {{-- Info --}}
                                                            <div class="text-center">
                                                                <div class="flex items-center gap-3 justify-center mb-4">
                                                                    <img src="{{ asset('assets/images/mikrotik/logo-mikrotik.png') }}" class="h-6 w-auto opacity-50 brightness-0">
                                                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                                                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Authenticated</span>
                                                                </div>
                                                                <h4 class="text-2xl sm:text-3xl font-black text-gray-950 mb-3 tracking-tight">{{ $cert->title }}</h4>
                                                                @if($cert->verify_id)
                                                                <div class="inline-flex items-center gap-2 bg-orange-50 px-4 py-2 rounded-xl border border-orange-100">
                                                                    <span class="text-[9px] font-black text-orange-600 uppercase tracking-widest">Verify ID:</span>
                                                                    <span class="text-sm font-bold text-gray-900 font-mono">{{ $cert->verify_id }}</span>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            {{-- Navigation --}}
                                            @if($trainer->certificates->count() > 1)
                                            <button x-ref="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 w-14 h-14 bg-white/10 hover:bg-orange-600 text-white rounded-2xl flex items-center justify-center transition-all z-20">
                                                <iconify-icon icon="solar:alt-arrow-left-bold" class="text-2xl"></iconify-icon>
                                            </button>
                                            <button x-ref="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 w-14 h-14 bg-white/10 hover:bg-orange-600 text-white rounded-2xl flex items-center justify-center transition-all z-20">
                                                <iconify-icon icon="solar:alt-arrow-right-bold" class="text-2xl"></iconify-icon>
                                            </button>
                                            
                                            {{-- Pagination --}}
                                            <div x-ref="swiperPagination" class="!relative !bottom-0 mt-10 flex justify-center custom-swiper-dots"></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endforeach

    @if($trainers->isEmpty())
    {{-- Fallback: Original Hardcoded Section if no data in DB yet --}}
    <section class="py-32 px-6 bg-white overflow-hidden border-t border-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="relative bg-gray-50 rounded-[4rem] p-10 md:p-16 lg:p-24 overflow-hidden border border-gray-100" data-aos="fade-up">
                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-16 lg:gap-24 opacity-50">
                    <div class="flex-grow text-center">
                        <iconify-icon icon="solar:medal-star-bold-duotone" class="text-8xl text-orange-200 mb-6"></iconify-icon>
                        <h2 class="text-3xl font-bold text-gray-400">Belum ada trainer terdaftar.</h2>
                        <p class="text-gray-400 mt-2">Silakan tambahkan trainer melalui panel admin.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection

@push('scripts')
{{-- GLightbox CDN removed. Image will open directly. --}}
<script>
    // Optional: Add simple lightbox behavior if needed, or rely on browser default.
</script>
@endpush
