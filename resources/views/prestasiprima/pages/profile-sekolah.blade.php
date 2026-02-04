{{-- resources/views/prestasiprima/pages/profile-sekolah.blade.php --}}
@extends('prestasiprima.index')

@section('title', 'Profil Sekolah - SMK Prestasi Prima')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    :root {
        --action-orange: #FF6B00;
        --soft-gray: #F8F9FA;
        --dark-text: #1A1A1A;
        --body-text: #4A4A4A;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #FFFFFF;
    }

    .profile-headline {
        font-size: clamp(48px, 5vw, 64px);
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -0.02em;
    }

    .profile-body {
        font-size: 16px;
        line-height: 1.6;
        color: var(--body-text);
    }

    .modern-card {
        background: #FFFFFF;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        border: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .modern-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(255, 107, 0, 0.1);
    }

    .pill-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 32px;
        border-radius: 9999px;
        font-weight: 700;
        transition: all 0.3s ease;
        background: var(--action-orange);
        color: white;
    }

    .pill-button:hover {
        transform: translateY(-3px);
        background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
        box-shadow: 0 10px 20px rgba(255, 107, 0, 0.3);
    }

    .section-padding {
        padding-top: 120px;
        padding-bottom: 120px;
    }

    .video-overlay {
        background: linear-gradient(to bottom, rgba(255, 107, 0, 0.2), rgba(255, 107, 0, 0.6));
    }

    .play-pulse {
        animation: pulse-orange 2s infinite;
    }

    @keyframes pulse-orange {
        0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255, 107, 0, 0.7); }
        70% { transform: scale(1.1); box-shadow: 0 0 0 20px rgba(255, 107, 0, 0); }
        100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255, 107, 0, 0); }
    }

    .artistic-map-frame {
        border-radius: 35px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .gradient-text {
        background: linear-gradient(135deg, var(--action-orange) 0%, #FF8533 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .pioneer-headline {
        font-size: clamp(56px, 8vw, 96px);
        font-weight: 900;
        line-height: 0.9;
        letter-spacing: -0.04em;
        color: #1A1A1A;
        z-index: 30;
        position: relative;
    }

    .gradient-orange-white {
        background: linear-gradient(135deg, #FF6B00 0%, #FFB07C 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .mesh-bg {
        background-color: #ffffff;
        background-image: radial-gradient(at 0% 0%, hsla(25,100%,96%,1) 0, transparent 50%), 
                          radial-gradient(at 100% 0%, hsla(225,30%,94%,1) 0, transparent 50%),
                          radial-gradient(at 100% 100%, hsla(25,100%,96%,1) 0, transparent 50%);
    }

    /* Refined Luxe Glassmorphic Floating Cards */
    .pioneer-glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 107, 0, 0.12); /* Ultra-thin soft orange border */
        padding: 10px 18px;
        border-radius: 100px;
        box-shadow: none;
        position: absolute;
        z-index: 40;
        animation: float-y 6s ease-in-out infinite;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .pioneer-glass-card span {
        font-size: 11px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        color: #1A1A1A;
    }

    @keyframes float-y {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }

    .depth-of-field {
        filter: contrast(1.05) saturate(1.1);
        mask-image: linear-gradient(to bottom, black 85%, transparent 100%);
    }

    .photo-bg-blur {
        position: absolute;
        inset: 0;
        filter: blur(4px);
        transform: scale(1.1);
        opacity: 0.6;
    }

    .main-img-frame {
        position: relative;
        z-index: 10;
        border-radius: 40px; /* Uniform grounding */
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.05); /* Soft premium shadow */
        transition: all 0.6s ease;
    }

    /* Timeline Specific Styling */
    .chronicle-card {
        background: #FFFFFF;
        border-radius: 32px;
        position: relative;
        overflow: hidden;
        border: 1px dashed rgba(255, 107, 0, 0.2);
        padding: 40px;
        transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        z-index: 10;
    }

    .chronicle-card:hover {
        border-style: solid;
        border-color: var(--action-orange);
        transform: translateY(-12px);
        box-shadow: 0 40px 80px rgba(255, 107, 0, 0.1);
    }

    .chronicle-watermark {
        position: absolute;
        top: 10px;
        right: -10px;
        font-size: 100px;
        font-weight: 900;
        color: rgba(255, 107, 0, 0.05);
        line-height: 1;
        z-index: 0;
        pointer-events: none;
        user-select: none;
        letter-spacing: -0.05em;
    }

    .timeline-connector {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 2px;
        background: repeating-linear-gradient(to right, #FF6B00 0, #FF6B00 10px, transparent 10px, transparent 20px);
        z-index: 0;
        opacity: 0.3;
    }

    .timeline-node {
        width: 16px;
        height: 16px;
        background: var(--action-orange);
        border: 4px solid #FFF;
        border-radius: 50%;
        position: absolute;
        top: -7px;
        left: -8px;
        box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.2);
    }
</style>
@endpush

@section('content')

@php
    $resolveLocalThumbnail = function (?string $videoId, ?string $fallback = null) {
        $candidates = [];
        if ($videoId) {
            $candidates[] = "assets/images/video-thumbnails/{$videoId}.webp";
            $candidates[] = "assets/images/video-thumbnails/{$videoId}.jpg";
            $candidates[] = "assets/images/video-thumbnails/{$videoId}.png";
        }
        if ($fallback && !\Illuminate\Support\Str::startsWith($fallback, ['http://', 'https://'])) {
            $candidates[] = ltrim($fallback, '/');
        }
        foreach ($candidates as $candidate) {
            if (file_exists(public_path($candidate))) return $candidate;
        }
        return null;
    };
@endphp

<!-- ====================== INSTITUTIONAL HEADER: ASYMMETRIC PIONEER ====================== -->
<section class="relative py-48 lg:py-60 overflow-hidden mesh-bg">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-[1.2fr_0.8fr] gap-16 items-center">
            
            {{-- Left Content: Headline & Vision --}}
            <div class="relative z-30" data-aos="fade-right">
                <h1 class="pioneer-headline mb-12 lg:-mr-40 relative">
                    Mencetak Pionir <br>
                    Era <span class="gradient-orange-white">Digital.</span>
                </h1>
                
                <div class="max-w-[500px] border-l-4 border-[#FF6B00] pl-8">
                    <p class="text-slate-900 text-2xl md:text-3xl font-black leading-tight mb-6">
                        Integrasi teknologi dan <br> integritas karakter.
                    </p>
                    <p class="text-slate-500 text-lg leading-relaxed font-medium">
                        Kami tidak hanya mengajar teknis, kami membentuk visi untuk mendominasi masa depan teknologi.
                    </p>
                </div>
            </div>

            {{-- Right Content: Photo & Atmosphere --}}
            <div class="relative mt-20 lg:mt-0" data-aos="zoom-out" data-aos-delay="200">
                <div class="relative w-full max-w-[500px] mx-auto group">
                    {{-- Main Photo Frame with Depth Effect --}}
                    <div class="main-img-frame aspect-[4/5] rounded-[60px] shadow-[0_40px_100px_rgba(255,107,0,0.1)] overflow-hidden relative">
                        {{-- Background Blur (Depth of Field Simulation) --}}
                        <div class="absolute inset-0 bg-orange-50"></div>
                        <img src="{{ asset('assets/images/gedung/gedungsiswa.avif') }}" 
                             alt="Digital Pioneer Students" 
                             class="w-full h-full object-cover depth-of-field transition-transform duration-700 group-hover:scale-110">
                    </div>

                    {{-- Strategic Glassmorphic Elements: Repositioned & Stylized --}}
                    <div class="pioneer-glass-card -top-8 -left-20" style="animation-delay: 0s">
                        <div class="w-6 h-6 rounded-full bg-orange-100 flex items-center justify-center">
                            <iconify-icon icon="solar:cpu-bold-duotone" class="text-[#FF6B00] text-sm"></iconify-icon>
                        </div>
                        <span class="text-slate-800">AI Integrated</span>
                    </div>

                    <div class="pioneer-glass-card -bottom-4 -right-24" style="animation-delay: 2.5s">
                        <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                            <iconify-icon icon="solar:shield-check-bold-duotone" class="text-green-500 text-sm"></iconify-icon>
                        </div>
                        <span class="text-slate-800">Industry-Standard Curriculum</span>
                    </div>

                    {{-- Dynamic Background Shape --}}
                    <div class="absolute -z-10 -bottom-10 -right-10 w-64 h-64 bg-orange-100/40 rounded-full blur-3xl animate-pulse"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ====================== SEJARAH SEKOLAH ====================== -->
<section class="section-padding bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="profile-headline text-slate-900 mb-6">
                Perjalanan <span class="gradient-text">Sejarah</span>
            </h2>
            <p class="profile-body max-w-2xl mx-auto">
                Berdiri dengan visi mencetak talenta digital bermutu tinggi, SMK Prestasi Prima terus bertransformasi menjadi pusat keunggulan vokasi di Jakarta.
            </p>
        </div>

        <div class="relative">
            {{-- Horizontal Timeline Line (Desktop Only) --}}
            <div class="hidden lg:block absolute top-[110px] left-0 w-full h-[2px] bg-orange-100/50 z-0"></div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12 relative z-10">
                @php
                $timeline = [
                    ['year' => '2011', 'icon' => 'solar:flag-2-bold-duotone', 'title' => 'Pendirian Awal', 'desc' => 'Didirikan dengan semangat mencetak lulusan unggul dan berkarakter.'],
                    ['year' => '2013', 'icon' => 'solar:star-fall-bold-duotone', 'title' => 'Standarisasi', 'desc' => 'Peningkatan kurikulum berbasis industri untuk dunia kerja modern.'],
                    ['year' => '2015', 'icon' => 'solar:buildings-bold-duotone', 'title' => 'Fasilitas', 'desc' => 'Pengembangan laboratorium, studio, dan perpustakaan modern.'],
                    ['year' => '2018', 'icon' => 'solar:code-circle-bold-duotone', 'title' => 'Digitalisasi', 'desc' => 'Memanfaatkan teknologi digital dalam setiap proses belajar mengajar.'],
                    ['year' => '2021', 'icon' => 'solar:medal-ribbon-bold-duotone', 'title' => 'Akreditasi A', 'desc' => 'Bukti kualitas dan konsistensi sekolah dalam pendidikan terbaik.'],
                    ['year' => '2025', 'icon' => 'solar:rocket-bold-duotone', 'title' => 'Transformasi', 'desc' => 'Penerapan Kurikulum Merdeka dan transformasi digital penuh.'],
                ];
                @endphp
                @foreach ($timeline as $i => $item)
                <div class="chronicle-card group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">


                    {{-- Watermark Text (Certified Pro Style) --}}
                    <div class="chronicle-watermark">{{ $item['year'] }}</div>

                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-[#FF6B00] mb-8 group-hover:bg-[#FF6B00] group-hover:text-white transition-all duration-300 shadow-sm">
                            <iconify-icon icon="{{ $item['icon'] }}" class="text-3xl"></iconify-icon>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-[#FF6B00] transition-colors">{{ $item['title'] }}</h3>
                        <p class="profile-body text-gray-500 leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                    
                
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ====================== VISI & MISI ====================== -->
<section class="section-padding bg-[#F8F9FA] relative">
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-20 items-center">
        <div class="relative" data-aos="fade-right">
            <div class="rounded-[40px] overflow-hidden shadow-2xl relative z-10">
                <img src="{{ asset('assets/images/gedung/gedungtinggi.webp') }}" alt="Visi Misi Sekolah" class="w-full h-auto">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
            </div>
            <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-orange-100 rounded-full blur-3xl opacity-60"></div>
        </div>

        <div data-aos="fade-left">
            <h2 class="profile-headline text-slate-900 mb-10">Visi & <span class="gradient-text">Misi.</span></h2>
            
            <div class="modern-card p-10 mb-10 border-l-8 border-[#FF6B00]">
                <h3 class="text-xs font-black text-[#FF6B00] uppercase tracking-[0.2em] mb-4">Masa Depan Kami</h3>
                <p class="text-xl font-bold text-slate-800 leading-relaxed italic">
                    "Mewujudkan lulusan yang unggul dan terpercaya dalam bidang Teknologi Informasi, beriman, bertaqwa, dan berkarakter Pancasila."
                </p>
            </div>

            <div class="space-y-6">
                @foreach ([
                    'Proses belajar berkualitas tinggi berstandar internasional.',
                    'Siap berkompetisi di era Revolusi Industri 4.0.',
                    'Pendidikan berbasis teknologi abad 21.',
                    'Membentuk jati diri berkarakter dan budaya kerja profesional.'
                ] as $point)
                <div class="flex items-center gap-4 bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all">
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0 text-[#FF6B00]">
                        <iconify-icon icon="solar:check-circle-bold" class="text-xl"></iconify-icon>
                    </div>
                    <p class="profile-body font-medium">{{ $point }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ====================== SAMBUTAN KEPALA SEKOLAH ====================== -->
<section class="section-padding bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">
        <div data-aos="fade-right">
            <h2 class="profile-headline text-slate-900 mb-8">Pesan <br> <span class="gradient-text">Kepala Sekolah.</span></h2>
            <div class="space-y-6">
                <p class="profile-body text-lg font-medium text-slate-700">Assalamu’alaikum Warahmatullahi Wabarakatuh.</p>
                <p class="profile-body">
                    Dengan penuh rasa syukur, SMK Prestasi Prima terus berkomitmen menjadi lembaga pendidikan yang tidak hanya menyiapkan peserta didik untuk dunia kerja, tetapi juga membentuk karakter unggul, kreatif, dan berdaya saing global.
                </p>
                <div class="py-6 border-y border-orange-100">
                    <p id="typing-quote" class="text-2xl font-bold text-slate-900 italic leading-snug"></p>
                </div>
                <div class="pt-4">
                    <p class="text-xl font-black text-slate-900 mb-1">Hendry Kurniawan, S.Kom., M.I.Kom.</p>
                    <p class="text-[#FF6B00] font-bold uppercase tracking-widest text-xs">Kepala Sekolah SMK Prestasi Prima</p>
                </div>
            </div>
        </div>

        <div class="relative flex justify-center" data-aos="fade-left">
            <div class="relative">
                {{-- Orange Glow Backdrop --}}
                <div class="absolute -inset-4 bg-orange-100 blur-2xl rounded-[50px] opacity-40 -z-10"></div>
                <img src="{{ asset('assets/images/section/tentang/kepala-sekolah.png') }}" alt="Kepala Sekolah"
                     class="w-[450px] relative z-20 rounded-[40px] shadow-2xl">
            </div>
            <div class="absolute -top-10 -right-10 w-64 h-64 bg-orange-100 rounded-full blur-3xl opacity-50 -z-10"></div>
        </div>
    </div>
</section>

<!-- ====================== VIDEO PROFIL SEKOLAH ====================== -->
<section class="section-padding bg-[#F8F9FA] relative">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="profile-headline text-slate-900 mb-8" data-aos="fade-up">Tonton <span class="gradient-text">Eksplorasi.</span></h2>
        
        @php
            $profileVideoId = 'EYzn0caf0_k';
            $profileThumbnail = $resolveLocalThumbnail($profileVideoId, null);
        @endphp
        
        <div class="max-w-4xl mx-auto relative group rounded-[32px] overflow-hidden shadow-2xl" data-aos="zoom-in">
            @include('components.youtube-lite', [
                'videoId' => $profileVideoId,
                'title' => 'Video Profil SMK Prestasi Prima',
                'thumbnailPath' => $profileThumbnail,
                'wrapperClass' => 'w-full aspect-video',
                'behavior' => 'inline'
            ])
        </div>
    </div>
</section>

<!-- ====================== TESTIMONI CTA ====================== -->
<section class="section-padding bg-white">
    <div class="max-w-4xl mx-auto text-center px-6" data-aos="fade-up">
        <h2 class="profile-headline text-slate-900 mb-8">Suara dari <span class="gradient-text">Hati.</span></h2>
        <p class="profile-body mb-12">
            Bergabunglah dengan komunitas kami. Ribuan alumni telah membuktikan bahwa Prestasi Prima adalah jembatan menuju mimpi mereka.
        </p>
        <a href="{{ url('/informasi/testimoni') }}" class="pill-button group">
            Lihat Testimoni Alumni
            <iconify-icon icon="solar:arrow-right-bold" class="ml-2 group-hover:translate-x-2 transition-transform"></iconify-icon>
        </a>
    </div>
</section>

<!-- ====================== LOKASI SEKOLAH ====================== -->
<section class="section-padding bg-[#F8F9FA]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div class="artistic-map-frame" data-aos="fade-right">
                <iframe class="w-full h-[600px] grayscale-[0.3] hover:grayscale-0 transition-all duration-700"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4748268020353!2d106.8972187!3d-6.332476499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2681bc7c67%3A0x777152b1d3f74a62!2sSMK%20Prestasi%20Prima!5e0!3m2!1sid!2sid!4v1756647265168!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div data-aos="fade-left">
                <h2 class="profile-headline text-slate-900 mb-6">Hubungi <span class="gradient-text">Kami.</span></h2>
                <div class="space-y-10">
                    <div class="flex gap-6">
                        <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center flex-shrink-0 text-[#FF6B00]">
                            <iconify-icon icon="solar:map-point-bold-duotone" class="text-3xl"></iconify-icon>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Lokasi Utama</h4>
                            <p class="profile-body">Jl. Hankam Raya No.89, Cipayung, Jakarta Timur 13870. <br> <span class="text-[#FF6B00] font-semibold text-sm">Dekat Markas Besar TNI AL Cilangkap.</span></p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <a href="https://maps.app.goo.gl/B2M79S8N4VpS8B4S6" target="_blank" class="pill-button">
                            Petunjuk Arah
                        </a>
                        <a href="/contact" class="pill-button bg-white !text-[#FF6B00] border-2 border-orange-100 hover:border-[#FF6B00]">
                            Kirim Pesan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
@include('components.youtube-lite-script')
<script>
(function() {
    const initTypewriter = () => {
        const el = document.getElementById("typing-quote");
        if (!el || window.profileQuoteActive) return;
        
        window.profileQuoteActive = true;
        const text = "“Pendidikan bukan hanya tentang masa depan, tetapi tentang membangun masa kini dengan penuh makna dan tanggung jawab.”";
        let i = 0;
        el.textContent = ""; 

        function type() {
            if (i < text.length) {
                el.textContent += text.charAt(i);
                i++;
                setTimeout(type, 30);
            }
        }

        const observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                type();
                observer.disconnect();
            }
        }, { threshold: 0.5 });

        observer.observe(el);
    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initTypewriter);
    } else {
        initTypewriter();
    }
})();
</script>
@endpush

@endsection
