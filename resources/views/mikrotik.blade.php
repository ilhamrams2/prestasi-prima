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

    {{-- ====================== CERTIFIED TRAINER SECTION (ELITE SPOTLIGHT REFACTOR) ====================== --}}
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
                                    <img src="{{ asset('assets/images/mikrotik/lana.jpeg') }}" alt="Trainer Ahmad Maulana" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                                </div>
                            </div>

                            {{-- Absolute Badge --}}
                            <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-orange-600 rounded-3xl flex items-center justify-center text-white shadow-2xl rotate-12">
                                <iconify-icon icon="solar:verified-check-bold" class="text-4xl"></iconify-icon>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Content Block (Hierarchical Info) --}}
                    <div class="flex-grow text-center lg:text-left">
                        {{-- Small Context Label --}}
                        <div class="mb-8">
                            <span class="px-6 py-2 rounded-2xl bg-orange-600 text-white text-[10px] font-black uppercase tracking-[0.25em] shadow-xl shadow-orange-950/20">
                                Certified Pro Instructor
                            </span>
                        </div>
                        
                        {{-- Hero Name --}}
                        <h2 class="text-5xl md:text-7xl font-bold text-gray-950 tracking-tighter mb-6 leading-[0.9]">
                           Achmad Maulana, <br class="hidden md:block"> 
                            <span class="text-orange-600 font-black">S.Kom.</span>
                        </h2>
                        
                        {{-- Subtitle/Role --}}
                        <p class="text-xl md:text-2xl text-gray-400 font-medium max-w-xl mb-12 leading-relaxed">
                            Membimbing generasi muda menguasai 
                            <span class="text-gray-900 font-bold block md:inline underline decoration-orange-300 decoration-4 underline-offset-8">Network Engineering Internasional.</span>
                        </p>

                        {{-- Authority Proof (The Certificate Card) --}}
                        <div class="inline-flex flex-col md:flex-row items-center gap-8 p-6 bg-white rounded-[2.5rem] shadow-xl shadow-gray-200 border border-gray-50 group hover:scale-[1.02] transition-all duration-500">
                            {{-- Certificate Preview --}}
                            <a href="{{ asset('assets/images/mikrotik/sertifikat.jpeg') }}" class="glightbox w-36 shrink-0 aspect-[1.414/1] bg-gray-50 rounded-xl overflow-hidden border border-gray-100 relative shadow-sm group/cert block">
                                <img src="{{ asset('assets/images/mikrotik/sertifikat.jpeg') }}" alt="MTCNA Certificate Preview" class="w-full h-full object-cover transition-transform duration-500 group-hover/cert:scale-110">
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover/cert:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <iconify-icon icon="solar:magnifer-zoom-in-bold" class="text-white text-2xl"></iconify-icon>
                                </div>
                                <div class="absolute inset-x-0 bottom-0 py-2 bg-gray-900/40 backdrop-blur-sm text-[6px] text-white text-center font-black uppercase tracking-widest">
                                    Official Credential
                                </div>
                            </a>

                            {{-- Credential Details --}}
                            <div class="md:pr-8 md:pl-2 text-center md:text-left">
                                <div class="flex items-center gap-2 mb-2 justify-center md:justify-start">
                                    <img src="{{ asset('assets/images/mikrotik/logo-mikrotik.png') }}" alt="MikroTik" class="h-4 w-auto object-contain brightness-0 opacity-40">
                                    <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest">Authenticated</span>
                                </div>
                                <p class="text-xl font-black text-gray-950 leading-tight">MTCNA Certified</p>
                                <p class="text-[10px] text-orange-600 font-bold uppercase mt-1 tracking-wider italic">Verify ID: PP-MTCNA-2024</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const lightbox = GLightbox({
            selector: '.glightbox'
        });
    });
</script>
@endpush
