@extends('prestasiprima.index')

@section('title', 'Penerimaan Siswa - SMK Prestasi Prima')

@push('styles')
<style>
    :root {
        --action-orange: #FF6B00;
        --off-white-orange: #FDF7F2;
        --deep-orange: #E65100;
        --soft-gray: #71717A;
    }

    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    .dot-pattern {
        background-image: radial-gradient(#FF6B00 0.5px, transparent 0.5px);
        background-size: 24px 24px;
        opacity: 0.05;
    }

    .hero-gradient-orb {
        background: radial-gradient(circle at bottom left, rgba(255, 107, 0, 0.08) 0%, transparent 50%);
    }

    .soft-shadow {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.04);
    }

    .card-shadow {
        box-shadow: 0 4px 20px rgba(255, 107, 0, 0.08);
    }

    .hover-lift {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: white;
        position: relative;
        overflow: hidden;
    }

    .hover-lift::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(120deg, transparent, rgba(255, 107, 0, 0.05), transparent);
        transition: all 0.6s ease;
    }

    .hover-lift:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 25px 50px rgba(255, 107, 0, 0.15);
        border-color: rgba(255, 107, 0, 0.3);
    }

    .hover-lift:hover::before {
        left: 100%;
    }

    .hover-lift:hover .icon-container {
        transform: rotate(12deg) scale(1.1);
        background: var(--action-orange);
        color: white;
    }

    /* Unique "Wave Trail" Timeline */
    .wave-container {
        position: relative;
        padding: 6rem 0;
    }

    .wave-path {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 200px;
        transform: translateY(-50%);
        z-index: 0;
        opacity: 0.1;
    }

    .step-card {
        background: white;
        padding: 3.5rem 2rem 2.5rem;
        border-radius: 32px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 10;
        width: 100%;
        text-align: center;
    }

    .step-card:hover {
        transform: translateY(-15px);
        border-color: var(--action-orange);
        box-shadow: 0 30px 60px rgba(255, 107, 0, 0.1);
        background: white;
    }

    .step-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 107, 0, 0.02) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        border-radius: inherit;
    }

    .step-card:hover::before {
        opacity: 1;
    }

    .step-badge {
        position: absolute;
        top: -28px;
        left: 0;
        right: 0;
        margin: 0 auto;
        width: 56px;
        height: 56px;
        background: white;
        border: 2px solid var(--action-orange);
        color: var(--action-orange);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 900;
        font-size: 1.4rem;
        box-shadow: 0 10px 20px rgba(255, 107, 0, 0.1);
        z-index: 20;
    }

    .step-badge::after {
        content: '';
        position: absolute;
        inset: 4px;
        border: 1px dashed var(--action-orange);
        border-radius: 50%;
        opacity: 0.3;
    }

    .step-card:hover .step-badge {
        background: var(--action-orange);
        color: white;
        transform: scale(1.1);
        border-color: white;
    }

    .step-card:hover .step-badge::after {
        border-color: white;
        opacity: 0.5;
    }

    /* Bento Grid */
    .bento-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 1.5rem;
    }

    .bento-item {
        border-radius: 24px;
        padding: 2rem;
        transition: transform 0.3s ease;
    }

    .bento-item:hover {
        transform: scale(1.02);
    }

    .bg-off-white { background-color: var(--off-white-orange); }

    /* Hero Floating Elements */
    .hero-shape {
        position: absolute;
        z-index: 0;
        filter: blur(80px);
        opacity: 0.4;
    }

    .visual-image-wrapper {
        position: relative;
        width: 100%;
        max-width: 520px;
        aspect-ratio: 1/1;
        border-radius: 48px;
        overflow: hidden;
        box-shadow: 0 40px 80px rgba(255, 107, 0, 0.1);
    }

    .hero-glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 107, 0, 0.1);
        border-radius: 24px;
        padding: 1.5rem;
        box-shadow: 0 20px 40px rgba(255, 107, 0, 0.05);
    }

    .cta-btn-glow {
        position: relative;
    }

    .cta-btn-glow::after {
        content: '';
        position: absolute;
        inset: -4px;
        background: var(--action-orange);
        border-radius: 18px;
        filter: blur(15px);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .cta-btn-glow:hover::after {
        opacity: 0.4;
    }

    .visual-frame {
        position: relative;
        padding: 2rem;
    }

    .visual-frame::before {
        content: '';
        position: absolute;
        inset: 0;
        border: 2px solid var(--action-orange);
        border-radius: 40px;
        opacity: 0.1;
        transform: rotate(-3deg);
    }

    .custom-scrollbar-orange::-webkit-scrollbar { width: 5px; }
    .custom-scrollbar-orange::-webkit-scrollbar-track { background: #f1f1f1; }
    .custom-scrollbar-orange::-webkit-scrollbar-thumb { background: var(--action-orange); border-radius: 10px; }
</style>
@endpush

@section('content')

<div class="font-jakarta text-slate-900 bg-white">

    <section class="relative min-h-[100vh] flex items-center pt-80 pb-20 overflow-hidden bg-white">
        <div class="absolute inset-0 dot-pattern opacity-[0.05] pointer-events-none"></div>
        <div class="absolute -top-40 -right-20 w-[600px] h-[600px] bg-orange-50/50 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10 w-full">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                {{-- Content --}}
                <div data-aos="fade-up" data-aos-duration="1000">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-orange-100 text-[#FF6B00] mb-8 font-black uppercase tracking-[0.2em] text-[10px]">
                        Admissions 2025
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-[#E65100] leading-[1.1] mb-8 tracking-tight">
                        Wujudkan <br>
                        <span class="text-[#FF6B00]">Masa Depan</span> <br>
                        Digital Anda.
                    </h1>
                    
                    <p class="text-orange-950/60 text-lg leading-relaxed max-w-lg mb-10">
                        Bergabunglah dengan ribuan siswa berprestasi di ekosistem SMK teknologi terbaik untuk karir global yang gemilang.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-6 items-start sm:items-center">
                        <a href="#daftar" class="px-10 py-5 bg-[#FF6B00] text-white font-bold rounded-2xl shadow-[0_15px_30px_rgba(255,107,0,0.3)] hover:shadow-orange-200 transition-all duration-300 transform hover:-translate-y-1">
                            Daftar Sekarang
                        </a>
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-4">
                                <div class="w-10 h-10 rounded-full bg-orange-100 border-2 border-white flex items-center justify-center text-[#FF6B00]">
                                    <iconify-icon icon="solar:user-bold-duotone" class="text-xl"></iconify-icon>
                                </div>
                                <div class="w-10 h-10 rounded-full bg-[#FF6B00] border-2 border-white flex items-center justify-center text-white shadow-lg relative z-10">
                                    <iconify-icon icon="solar:user-bold-duotone" class="text-xl"></iconify-icon>
                                </div>
                                <div class="w-10 h-10 rounded-full bg-orange-50 border-2 border-white flex items-center justify-center text-[#FF6B00]">
                                    <iconify-icon icon="solar:user-id-bold-duotone" class="text-xl"></iconify-icon>
                                </div>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-orange-400 uppercase tracking-widest leading-none mb-1">Community</p>
                                <p class="text-sm font-bold text-[#FF6B00]">5k+ Alumni Sukses</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Visual --}}
                <div class="relative flex justify-center" data-aos="fade-left" data-aos-duration="1000">
                    <div class="visual-image-wrapper border-4 border-orange-50">
                        <img src="{{ asset('assets/images/gedung/gedungsiswa.avif') }}" 
                             alt="Student Education" 
                             class="w-full h-full object-cover">
                    </div>

                    {{-- Single Clean Floating Card --}}
                    <div class="absolute -bottom-10 -left-6 lg:-left-12 hero-glass-card hidden sm:block border-orange-100" data-aos="fade-up" data-aos-delay="500">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-[#FF6B00] flex items-center justify-center text-white shadow-soft">
                                <iconify-icon icon="solar:medal-star-bold-duotone" class="text-2xl"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-xs font-black text-[#FF6B00]">Sekolah Unggulan</p>
                                <p class="text-[10px] text-orange-400 font-bold uppercase tracking-widest">Akreditasi A+</p>
                            </div>
                        </div>
                    </div>

                    {{-- Simple Contact Trigger --}}
                    <div class="absolute -top-6 -right-6 bg-white border border-orange-100 text-[#FF6B00] p-4 rounded-3xl shadow-xl flex items-center gap-3" data-aos="fade-down" data-aos-delay="700">
                        <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center">
                            <iconify-icon icon="solar:phone-bold" class="text-sm"></iconify-icon>
                        </div>
                        <span class="text-[10px] font-black uppercase tracking-widest leading-none">Live Help</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ================= JUMLAH SISWA PER JURUSAN ================= --}}
    <section class="py-32 bg-off-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-4">Statistik Keahlian</h2>
                <p class="text-gray-500 font-medium">Distribusi siswa aktif pada setiap program kejuruan kami.</p>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $jurusan = [
                        [
                            'label'=>'DKV',
                            'count'=>280, 
                            'desc' => 'Desain Komunikasi Visual',
                            'icon' => 'solar:palette-bold-duotone'
                        ],
                        [
                            'label'=>'BCF',
                            'count'=>210, 
                            'desc' => 'Broadcasting & Film',
                            'icon' => 'solar:camera-bold-duotone'
                        ],
                        [
                            'label'=>'PPLG',
                            'count'=>280, 
                            'desc' => 'Pengembangan Perangkat Lunak',
                            'icon' => 'solar:laptop-minimalistic-bold-duotone'
                        ],
                        [
                            'label'=>'TJKT',
                            'count'=>210, 
                            'desc' => 'Teknologi Jaringan',
                            'icon' => 'solar:server-square-bold-duotone'
                        ],
                    ];
                @endphp

                @foreach($jurusan as $item)
                <div class="bg-white rounded-[24px] p-8 hover-lift border border-slate-100 text-center flex flex-col items-center card-shadow" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mb-6 text-[#FF6B00] icon-container transition-all duration-300">
                        <iconify-icon icon="{{ $item['icon'] }}" class="text-4xl"></iconify-icon>
                    </div>
                    <h3 class="text-gray-400 font-black text-sm uppercase tracking-widest mb-2">{{ $item['label'] }}</h3>
                    <div class="flex items-baseline gap-1 mb-2">
                        <span class="text-5xl font-black text-[#E65100] counter" data-target="{{ $item['count'] }}">0</span>
                    </div>
                    <p class="text-gray-400 text-xs font-medium leading-relaxed">{{ $item['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- ================= 5 LANGKAH PENDAFTARAN (NEW UNIQUE WAVE) ================= --}}
    <section id="daftar" class="py-32 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-4">Alur <span class="text-[#FF6B00]">Pendaftaran</span></h2>
                <p class="text-gray-500 font-medium uppercase tracking-widest text-xs">Informasi prosedur registrasi calon siswa baru</p>
            </div>

            <div class="wave-container relative">
                {{-- Decorative Wave Background --}}
                <svg class="wave-path lg:block hidden" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="var(--action-orange)" fill-opacity="0.1" d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,138.7C672,128,768,160,864,181.3C960,203,1056,213,1152,197.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>

                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 items-start relative z-10">
                    @php
                        $steps = [
                            ['title' => 'Pembuatan Akun', 'desc' => 'Isi berkas digital & buat password pendaftaran.', 'delay' => '0'],
                            ['title' => 'Verifikasi', 'desc' => 'Validasi fisik dokumen & pengambilan nomor.', 'delay' => '100'],
                            ['title' => 'Seleksi Jalur', 'desc' => 'Tentukan jurusan impian & jalur pendaftaran.', 'delay' => '200'],
                            ['title' => 'Tes Minat Bakat', 'desc' => 'Uji potensi diri bersama tim ahli psikologi.', 'delay' => '300'],
                            ['title' => 'Langkah Sukses', 'desc' => 'Pengumuman resmi & registrasi siswa baru.', 'delay' => '400']
                        ];
                    @endphp

                    @foreach($steps as $index => $step)
                    <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="{{ $step['delay'] }}">
                        <div class="step-card">
                            <div class="step-badge">{{ $index + 1 }}</div>
                            <h4 class="font-extrabold text-xl text-slate-800 mb-4">{{ $step['title'] }}</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    {{-- ================= 5 LANGKAH SETELAH PENDAFTARAN (BENTO) ================= --}}
    <section class="py-32 bg-off-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center md:text-left mb-16 max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6">Pasca <span class="text-[#FF6B00]">Pendaftaran</span></h2>
                <p class="text-gray-500 text-lg">Langkah-langkah krusial yang harus Anda perhatikan setelah menyelesaikan pengisian formulir pendaftaran.</p>
            </div>

            <div class="bento-grid">
                {{-- Item 1 --}}
                <div class="bento-item col-span-6 md:col-span-3 lg:col-span-2 bg-white card-shadow" data-aos="fade-up">
                    <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-6">
                        <span class="font-black text-[#FF6B00] text-xl">01</span>
                    </div>
                    <h4 class="font-bold text-lg mb-3">Verifikasi Status</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Pantau secara berkala dashboard Anda untuk melihat status verifikasi dokumen fisik dan digital.</p>
                </div>

                {{-- Item 2 (Accent) --}}
                <div class="bento-item col-span-6 md:col-span-3 lg:col-span-4 bg-white border border-orange-100 card-shadow hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex flex-col md:flex-row gap-8 items-center h-full">
                        <div class="shrink-0 w-20 h-20 bg-orange-100 rounded-2xl flex items-center justify-center text-[#FF6B00] icon-container transition-all duration-300">
                             <iconify-icon icon="solar:user-speak-bold-duotone" class="text-5xl"></iconify-icon>
                        </div>
                        <div>
                            <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4">
                                <span class="font-black text-[#FF6B00] text-xl">02</span>
                            </div>
                            <h4 class="font-bold text-xl mb-3 text-slate-800">Tes Psikotes & Wawancara</h4>
                            <p class="text-slate-500 text-sm leading-relaxed">Ikuti rangkaian tes minat dan bakat sesuai dengan jadwal yang telah ditentukan oleh panitia pendaftaran melalui portal pendaftaran.</p>
                        </div>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="bento-item col-span-6 md:col-span-4 lg:col-span-3 bg-orange-50/50" data-aos="fade-up" data-aos-delay="200">
                     <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mb-6 shadow-sm">
                        <span class="font-black text-[#FF6B00] text-xl">03</span>
                    </div>
                    <h4 class="font-bold text-lg mb-3">Hasil Seleksi Sementara</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Dapatkan transparansi data melalui sistem pemantauan hasil seleksi sementara yang diupdate secara real-time berdasarkan scoring nilai.</p>
                </div>

                {{-- Item 4 --}}
                <div class="bento-item col-span-6 md:col-span-2 lg:col-span-3 bg-white card-shadow" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-6">
                        <span class="font-black text-[#FF6B00] text-xl">04</span>
                    </div>
                    <h4 class="font-bold text-lg mb-3">Informasi Kelulusan</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">Pengumuman resmi kelulusan akan diterbitkan melalui WhatsApp Gateway dan email resmi sekolah.</p>
                </div>

                {{-- Item 5 (Wide) --}}
                <div class="bento-item col-span-6 bg-[#FF6B00] text-white" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                        <div class="flex items-center gap-6">
                            <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center font-black text-2xl">05</div>
                            <div>
                                <h4 class="font-bold text-2xl mb-1">Daftar Ulang Wajib</h4>
                                <p class="text-orange-50 opacity-90">Selesaikan proses administratif akhir untuk mengamankan kursi Anda di T.A {{ date('n') >= 7 ? (date('Y') + 1) . '/' . (date('Y') + 2) : date('Y') . '/' . (date('Y') + 1) }}.</p>
                            </div>
                        </div>
                        <a href="#" class="px-8 py-4 bg-white text-[#FF6B00] font-black rounded-xl hover:bg-orange-50 transition-colors">Unduh Panduan →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ================= FINAL CTA ================= --}}
    <section class="py-40 bg-white relative text-center">
        <div class="max-w-4xl mx-auto px-6 relative z-10" data-aos="zoom-in">
            <h2 class="text-4xl md:text-6xl font-extrabold text-slate-900 mb-8 leading-tight">
                Siap Menjadi Bagian dari <span class="text-[#FF6B00]">SMK Prestasi Prima?</span>
            </h2>
            <p class="text-gray-500 text-lg mb-12 max-w-2xl mx-auto">
                Jadilah bagian dari sekolah yang mendukung potensi dan kreativitas Anda. Langkah pertama menuju masa depan gemilang dimulai di sini.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="/pendaftaran" 
                   class="px-12 py-5 bg-[#FF6B00] text-white font-black rounded-2xl shadow-[0_20px_40px_rgba(255,107,0,0.3)] hover:scale-105 transition-transform duration-300">
                  Amankan Kursi Sekarang
                </a>
                <a href="https://wa.me/6285195928886" target="_blank" class="font-bold text-slate-500 hover:text-[#FF6B00] transition-colors">
                    Hubungi Admin Admissions →
                </a>
            </div>
        </div>
        
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[120%] h-40 bg-gradient-to-t from-orange-50/50 to-transparent rounded-t-[100%] blur-3xl -z-10"></div>
    </section>

</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const animate = () => {
        counters.forEach(counter => {
            const target = +counter.dataset.target;
            const current = +counter.innerText;
            const increment = target / 50;
            if (current < target) {
                counter.innerText = Math.ceil(current + increment);
                setTimeout(animate, 20);
            } else {
                counter.innerText = target;
            }
        });
    };

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animate();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => observer.observe(counter));
});
</script>
@endpush

@endsection
