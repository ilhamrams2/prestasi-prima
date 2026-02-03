@extends('prestasiprima.index')
@section('title','Pendaftaran - SMK Prestasi Prima')

@push('styles')
<style>
    :root {
        --primary-white: #FFFFFF;
        --action-orange: #FF6B00;
        --soft-gray: #F8F9FA;
        --dark-slate: #1A1A1A;
    }

    .font-outfit { font-family: 'Outfit', sans-serif; }
    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    .font-inter { font-family: 'Inter', sans-serif; }

    .mesh-gradient {
        background-color: #ffffff;
        background-image: 
            radial-gradient(at 100% 0%, rgba(255, 107, 0, 0.05) 0px, transparent 50%),
            radial-gradient(at 0% 100%, rgba(255, 107, 0, 0.03) 0px, transparent 50%);
    }

    .geometric-frame {
        position: relative;
        width: 100%;
        max-width: 500px;
        aspect-ratio: 1/1;
    }

    .geometric-frame::before {
        content: '';
        position: absolute;
        top: 10%;
        right: 0;
        width: 80%;
        height: 80%;
        background: var(--soft-gray);
        border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        z-index: 0;
        animation: blob-bounce 10s infinite alternate;
    }

    @keyframes blob-bounce {
        0% { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; transform: scale(1); }
        100% { border-radius: 60% 40% 30% 70% / 50% 60% 40% 60%; transform: scale(1.1); }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .bento-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-auto-rows: minmax(140px, auto);
        gap: 1.5rem;
    }

    .bento-item {
        border-radius: 24px;
        padding: 2rem;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid #EEEEEE;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }

    .bento-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(255, 107, 0, 0.1);
        border-color: rgba(255, 107, 0, 0.2);
    }

    .cta-button {
        background: var(--action-orange);
        box-shadow: 0 15px 35px rgba(255, 107, 0, 0.3);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .cta-button:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 20px 45px rgba(255, 107, 0, 0.4);
    }

    .custom-scrollbar-orange::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar-orange::-webkit-scrollbar-track { background: #f1f1f1; }
    .custom-scrollbar-orange::-webkit-scrollbar-thumb { background: var(--action-orange); border-radius: 10px; }
</style>
@endpush

@section('content')
<div class="mesh-gradient min-h-screen pt-24 overflow-x-hidden font-jakarta text-dark-slate">
    
    {{-- ================= HERO SECTION ================= --}}
    <section class="relative py-20 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-16 relative z-10">
            
            {{-- Content --}}
            <div class="flex-1 text-center md:text-left" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 text-orange-600 mb-6 border border-orange-100">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                    </span>
                    <span class="text-xs font-black uppercase tracking-widest font-outfit">Penerimaan Siswa Baru T.A {{ date('n') >= 7 ? (date('Y') + 1) . '/' . (date('Y') + 2) : date('Y') . '/' . (date('Y') + 1) }}</span>
                </div>
                
                <h1 class="text-4xl md:text-7xl font-black font-outfit leading-[1.1] tracking-tight mb-8">
                    <span class="block whitespace-nowrap">Ukir Masa Depanmu</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-400">Dimulai Dari Sini.</span>
                </h1>
                
                <p class="text-gray-500 text-lg md:text-xl font-medium max-w-xl mb-12 leading-relaxed">
                    Siapkan dirimu untuk bertransformasi menjadi tenaga ahli profesional yang siap bersaing di industri global. Pendaftaran kini lebih mudah & praktis.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-6">
                    <a href="https://spmb.prestasiprima.sch.id/pendaftaran" target="_blank"
                       class="cta-button group px-10 py-5 bg-orange-600 text-white font-black rounded-2xl flex items-center gap-3 transition-all">
                       <span class="font-outfit uppercase tracking-widest">Daftar Sekarang</span>
                       <iconify-icon icon="lucide:arrow-right" class="text-2xl transition-transform group-hover:translate-x-1"></iconify-icon>
                    </a>
                    
                    <a href="#syarat-pendaftaran" class="font-black text-gray-400 uppercase tracking-widest text-xs hover:text-orange-600 transition-colors">
                        Pelajari Syarat & Ketentuan →
                    </a>
                </div>
            </div>

            {{-- Visual --}}
            <div class="flex-1 relative flex justify-center" data-aos="fade-left">
                <div class="geometric-frame">
                    <img src="{{ asset('assets/images/pendaftaran/siswi.png') }}" 
                         alt="Siswa Prestasi Prima" 
                         class="relative z-10 w-full h-full object-contain filter drop-shadow-[0_20px_50px_rgba(0,0,0,0.15)] transform hover:scale-105 transition-transform duration-700">
                    
                    {{-- Decorative Elements --}}
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-orange-500/10 rounded-3xl blur-2xl animate-pulse"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-orange-500/5 rounded-full blur-3xl animate-pulse delay-700"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= SYARAT PENDAFTARAN (BENTO GRID) ================= --}}
    <section id="syarat-pendaftaran" class="py-32 bg-white relative">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
                <div data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-black font-outfit text-dark-slate mb-4 uppercase">Syarat <span class="text-orange-600">Pendaftaran</span></h2>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-xs">Pastikan semua dokumen lengkap sebelum mendaftar</p>
                </div>
                <div class="hidden md:block h-px flex-1 bg-gray-100 mx-10 mb-6"></div>
                <div class="bg-orange-50 px-6 py-3 rounded-2xl border border-orange-100" data-aos="fade-left">
                    <p class="text-orange-600 font-black text-xs uppercase tracking-tighter italic whitespace-nowrap">Proses Cepat & Transparan</p>
                </div>
            </div>

            <div class="bento-grid">
                {{-- 1. Ijazah (Large) --}}
                <div class="bento-item glass-card col-span-6 md:col-span-3 row-span-2 group flex flex-col justify-between" data-aos="fade-up">
                    <div class="flex flex-col gap-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-400 rounded-3xl shadow-xl shadow-orange-200 flex items-center justify-center transition-transform group-hover:rotate-12">
                            <iconify-icon icon="solar:document-bold-duotone" class="text-4xl text-white"></iconify-icon>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black font-outfit mb-3">Foto Copy Ijazah</h3>
                            <p class="text-gray-500 font-medium leading-relaxed">Dokumen utama yang membuktikan kelulusan dari jenjang pendidikan sebelumnya (SMP/MTS Sederajat).</p>
                        </div>
                    </div>
                    <div class="mt-8 pt-8 border-t border-gray-50 flex items-center justify-between">
                        <span class="text-[10px] font-black uppercase text-orange-600 tracking-widest italic">Dokumen Wajib</span>
                        <div class="w-8 h-1 bg-orange-100 rounded-full"></div>
                    </div>
                </div>

                {{-- 2. KK (Regular) --}}
                <div class="bento-item glass-card col-span-6 md:col-span-3 row-span-1 group flex items-start gap-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center shrink-0 group-hover:bg-orange-600 transition-colors">
                        <iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="text-3xl text-orange-600 group-hover:text-white transition-colors"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-xl font-black font-outfit mb-2">Kartu Keluarga</h3>
                        <p class="text-gray-500 text-sm font-medium">Validasi data kependudukan dan wali murid.</p>
                    </div>
                </div>

                {{-- 3. Pas Foto (Regular) --}}
                <div class="bento-item glass-card col-span-6 md:col-span-3 row-span-1 group flex items-start gap-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center shrink-0 group-hover:bg-orange-600 transition-colors">
                        <iconify-icon icon="solar:user-rounded-bold-duotone" class="text-3xl text-orange-600 group-hover:text-white transition-colors"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-xl font-black font-outfit mb-2">Pas Foto 3x4</h3>
                        <p class="text-gray-500 text-sm font-medium">Siapkan 3 lembar foto terbaru dengan latar belakang merah.</p>
                    </div>
                </div>

                {{-- 4. Wawancara (Large) --}}
                <div class="bento-item glass-card col-span-6 md:col-span-2 row-span-2 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex flex-col gap-6">
                        <div class="w-16 h-16 bg-orange-50 rounded-3xl flex items-center justify-center group-hover:bg-orange-600 transition-colors">
                            <iconify-icon icon="solar:chat-round-call-bold-duotone" class="text-4xl text-orange-600 group-hover:text-white transition-colors"></iconify-icon>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black font-outfit mb-3 text-orange-600 uppercase">Tes Wawancara</h3>
                            <p class="text-gray-500 text-sm font-medium leading-relaxed">Dialog langsung untuk mengenal potensi, minat, dan bakat calon siswa secara mendalam guna menentukan konsentrasi keahlian yang tepat.</p>
                        </div>
                    </div>
                </div>

                {{-- 5. Bebas Narkoba (Large) --}}
                <div class="bento-item glass-card col-span-6 md:col-span-2 row-span-2 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex flex-col gap-6">
                        <div class="w-16 h-16 bg-gray-50 rounded-3xl flex items-center justify-center group-hover:bg-red-500 transition-colors">
                            <iconify-icon icon="solar:shield-warning-bold-duotone" class="text-4xl text-gray-400 group-hover:text-white transition-colors"></iconify-icon>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black font-outfit mb-3 uppercase">Bebas Narkoba</h3>
                            <p class="text-gray-500 text-sm font-medium leading-relaxed">Menyertakan Surat Keterangan Bebas Narkoba (SKBN) untuk menjamin lingkungan sekolah yang sehat, aman, dan bersih dari penyalahgunaan zat terlarang.</p>
                        </div>
                    </div>
                </div>

                {{-- 6. Pengumuman (Large) --}}
                <div class="bento-item bg-dark-slate col-span-6 md:col-span-2 row-span-2 group flex flex-col justify-between border-0 shadow-2xl shadow-gray-200" data-aos="fade-up" data-aos-delay="500">
                    <div class="flex flex-col gap-6">
                        <div class="w-16 h-16 bg-orange-600 rounded-3xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <iconify-icon icon="solar:bell-bold-duotone" class="text-4xl text-white"></iconify-icon>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black font-outfit mb-3 text-white uppercase">Hasil Seleksi</h3>
                            <p class="text-gray-400 text-sm font-medium leading-relaxed">Pantau status pendaftaran dan hasil seleksi Anda secara real-time. Informasi kelulusan akan diumumkan langsung melalui dashboard sistem pendaftaran online.</p>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-white/10">
                        <span class="text-[10px] font-black uppercase text-orange-500 tracking-widest italic flex items-center gap-2">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                            </span>
                            Update Real-time
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= CONTACT SECTION (UX RE-DESIGN) ================= --}}
    <section class="py-32 px-6 bg-gray-50 relative overflow-hidden">
        {{-- Floating Shapes --}}
        <div class="absolute top-1/2 left-10 w-64 h-64 bg-orange-200/20 blur-3xl rounded-full"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-orange-100/10 blur-3xl rounded-full"></div>

        <div class="max-w-4xl mx-auto relative z-10" data-aos="zoom-in">
            <div class="bg-white rounded-[3rem] p-8 md:p-12 shadow-[0_40px_100px_rgba(0,0,0,0.08)] border border-gray-100">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    
                    {{-- QR Column --}}
                    <div class="relative group cursor-pointer" onclick="window.open('https://wa.me/6281234567890', '_blank')">
                        <div class="absolute inset-0 bg-orange-600 rounded-[2.5rem] blur-xl opacity-0 group-hover:opacity-20 transition-opacity"></div>
                        <div class="relative bg-white p-6 rounded-[2.5rem] border-2 border-dashed border-gray-100 group-hover:border-orange-500 transition-colors">
                            <img src="{{ asset('assets/images/pendaftaran/qrcode.png') }}" 
                                 alt="WA QR Code" 
                                 class="w-32 h-32 md:w-40 md:h-40 object-contain grayscale group-hover:grayscale-0 transition-all duration-700">
                            
                            <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-orange-600 text-white text-[8px] font-bold px-4 py-1 rounded-full uppercase tracking-widest whitespace-nowrap shadow-xl">
                                Scan To Chat
                            </div>
                        </div>
                    </div>

                    {{-- Info Column --}}
                    <div class="flex-1 text-center md:text-left">
                        <div class="inline-flex gap-2 text-green-600 bg-green-50 px-4 py-1.5 rounded-full mb-6">
                            <iconify-icon icon="solar:whatsapp-bold" class="text-xl"></iconify-icon>
                            <span class="text-[10px] font-black uppercase tracking-widest">Admin Fast Response</span>
                        </div>
                        
                        <h3 class="text-3xl md:text-4xl font-black font-outfit mb-4">Butuh Bantuan?</h3>
                        <p class="text-gray-500 font-medium mb-10 leading-relaxed">Tim pendaftaran kami siap membantu menjawab pertanyaan Anda via WhatsApp setiap hari kerja.</p>
                        
                        <a href="https://wa.me/6281234567890" target="_blank"
                           class="inline-flex items-center gap-4 text-orange-600 font-black uppercase tracking-widest text-sm group">
                           Mulai Percakapan Baru
                           <div class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center group-hover:bg-orange-600 group-hover:text-white transition-all">
                               <iconify-icon icon="lucide:arrow-right" class="text-xl"></iconify-icon>
                           </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
