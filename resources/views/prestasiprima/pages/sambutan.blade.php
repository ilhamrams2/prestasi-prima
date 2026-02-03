@extends('prestasiprima.index')

@section('title', 'Sambutan - SMK Prestasi Prima')

@push('styles')
<style>
    :root {
        --action-orange: #FF6B00;
        --soft-orange: #FFF5EE;
    }

    .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

    .hero-glow {
        background: radial-gradient(circle at top right, rgba(255, 107, 0, 0.05) 0%, transparent 40%);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
    }

    .img-frame {
        position: relative;
        padding-bottom: 20px;
        padding-right: 20px;
    }

    .img-frame::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 80%;
        height: 80%;
        border: 2px solid var(--action-orange);
        border-radius: 40px;
        z-index: -1;
        opacity: 0.15;
    }

    /* Typewriter Caret */
    #quote-text {
        border-right: 2px solid var(--action-orange);
        animation: caret 0.8s infinite;
    }

    @keyframes caret {
        from, to { border-color: transparent; }
        50% { border-color: var(--action-orange); }
    }

    .floating {
        animation: floating 4s ease-in-out infinite;
    }

    @keyframes floating {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
</style>
@endpush

@section('content')

<div class="font-jakarta bg-white overflow-hidden">
    
    {{-- ================= HERO HEADER ================= --}}
    <section class="relative pt-64 pb-20 bg-white hero-glow">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-50 text-[#FF6B00] mb-8 border border-orange-100/50" data-aos="fade-up">
                <span class="text-[10px] font-black uppercase tracking-[0.2em]">Management Greetings</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-black text-[#E65100] mb-6 tracking-tight" data-aos="fade-up" data-aos-delay="100">
                Pesan dari <span class="text-[#FF6B00]">Pimpinan.</span>
            </h1>
            <p class="text-orange-900/60 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Membangun ekosistem pendidikan yang unggul, berkarakter, dan siap menghadapi tantangan masa depan melalui inovasi tanpa batas.
            </p>
        </div>
    </section>

    {{-- ================= DR. WANNEN SECTION ================= --}}
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            {{-- Visual --}}
            <div class="order-2 md:order-1 relative" data-aos="fade-right">
                <div class="img-frame">
                    <div class="relative rounded-[40px] overflow-hidden shadow-2xl z-10">
                        <img src="{{ asset('assets/images/sambutan/dr-wannen.png') }}" 
                             alt="Dr. Wannen Pakpahan, MM"
                             class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700">
                    </div>
                </div>
                {{-- Floating Badge --}}
                <div class="absolute -top-6 -left-6 glass-card p-6 rounded-3xl floating z-20 hidden lg:block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#FF6B00] rounded-2xl flex items-center justify-center text-white">
                            <iconify-icon icon="solar:shield-check-bold-duotone" class="text-2xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-orange-400 uppercase tracking-widest leading-none mb-1">Role</p>
                            <p class="text-sm font-black text-slate-800">Penjamin Mutu</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Text Content --}}
            <div class="order-1 md:order-2" data-aos="fade-left" data-aos-delay="200">
                <div class="mb-8">
                    <h2 class="text-4xl md:text-5xl font-black text-[#E65100] mb-2">Dr. Wannen Pakpahan, MM.</h2>
                    <p class="text-[#FF6B00] font-bold text-lg tracking-wide uppercase">Penjamin Mutu Yayasan</p>
                </div>

                <div class="space-y-6 text-orange-900/60 leading-relaxed text-lg">
                    <p class="font-bold text-[#FF6B00]">Assalamu’alaikum Warahmatullahi Wabarakatuh.</p>
                    <p>
                        Selamat datang di laman resmi <span class="text-[#FF6B00] font-semibold">SMK Prestasi Prima</span>. Kami berkomitmen untuk menghadirkan pendidikan yang tidak hanya unggul dalam teknologi, namun juga membentuk karakter dan kepribadian berakhlak mulia.
                    </p>
                    <div class="py-4">
                        <div class="bg-orange-50 border-l-4 border-[#FF6B00] p-6 rounded-r-3xl">
                             <p class="italic text-orange-800 font-medium text-xl leading-relaxed">
                                "<span id="quote-text"></span>"
                             </p>
                        </div>
                    </div>
                    <p>
                        Melalui pembelajaran berbasis kompetensi abad 21, kami terus berinovasi untuk mencetak generasi yang siap bersaing di dunia industri, khususnya pada bidang teknologi digital.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= FLORES SAGALA SECTION ================= --}}
    <section class="py-24 bg-orange-50/30">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            {{-- Text Content --}}
            <div data-aos="fade-right">
                <div class="mb-8">
                    <h2 class="text-4xl md:text-5xl font-black text-[#E65100] mb-2">Flores Sagala, S.E.</h2>
                    <p class="text-[#FF6B00] font-bold text-lg tracking-wide uppercase">Ketua Yayasan Prestasi Prima</p>
                </div>

                <div class="space-y-6 text-orange-900/60 leading-relaxed text-lg">
                    <p class="font-bold text-[#FF6B00]">Salam sejahtera bagi kita semua.</p>
                    <p>
                        Sebagai Ketua Yayasan Prestasi Prima, kami berkomitmen untuk menjadikan lembaga pendidikan ini sebagai pusat keunggulan yang melahirkan generasi berintegritas, inovatif, dan adaptif terhadap perkembangan zaman.
                    </p>
                    <p>
                        Kami percaya bahwa pendidikan adalah investasi jangka panjang yang akan menentukan arah bangsa. Oleh karena itu, seluruh civitas akademika di lingkungan Yayasan Prestasi Prima terus berupaya memberikan yang terbaik dari segi mutu akademik maupun karakter.
                    </p>
                    <p class="text-[#FF6B00] font-black italic text-2xl tracking-tight leading-relaxed">
                        "Dengan semangat <span class="text-[#E65100]">“Menjadi yang Terbaik”</span>, mari kita bersama-sama melangkah menuju masa depan yang gemilang."
                    </p>
                </div>
            </div>

            {{-- Visual --}}
            <div class="relative" data-aos="fade-left" data-aos-delay="200">
                <div class="img-frame">
                    <div class="relative rounded-[40px] overflow-hidden shadow-2xl z-10 border-4 border-white">
                        <img src="{{ asset('assets/images/sambutan/flores-sagala.jpg') }}" 
                             alt="Flores Sagala, S.E"
                             class="w-full h-[550px] object-cover object-top transform hover:scale-105 transition-transform duration-700">
                    </div>
                </div>
                 {{-- Floating Badge --}}
                 <div class="absolute -bottom-6 -right-6 glass-card p-6 rounded-3xl floating z-20 hidden lg:block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#FF6B00] rounded-2xl flex items-center justify-center text-white">
                            <iconify-icon icon="solar:buildings-bold-duotone" class="text-2xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-orange-400 uppercase tracking-widest leading-none mb-1">Title</p>
                            <p class="text-sm font-black text-slate-800">Ketua Yayasan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= FULL WIDTH BUILDING ================= --}}
    <section class="relative py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="relative rounded-[60px] overflow-hidden shadow-2xl group" data-aos="zoom-in">
                <img src="{{ asset('assets/images/gedung/gedung.avif') }}" 
                     alt="SMK Prestasi Prima" 
                     class="w-full h-[60vh] object-cover transform transition-transform duration-1000 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-[#FF6B00]/60 to-transparent flex flex-col justify-end p-12 md:p-20">
                    <h3 class="text-white text-4xl md:text-6xl font-black mb-4">Langkah Pertama <br> Menuju Sukses.</h3>
                    <a href="{{ route('pendaftaran') }}" class="px-10 py-5 bg-white text-[#FF6B00] font-black rounded-2xl w-fit shadow-xl hover:bg-orange-50 transition-colors">
                        Mulai Masa Depan Anda →
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@push('scripts')
<script>
    (function() {
        const initTypewriter = () => {
            const el = document.getElementById("quote-text");
            if (!el || window.sambutanTypewriterActive) return;
            
            window.sambutanTypewriterActive = true;
            const quote = "Kami menyiapkan generasi muda yang tidak hanya kompeten di bidangnya, tetapi juga siap menghadapi tantangan global dengan karakter dan etika yang kuat.";
            let i = 0;
            el.textContent = ""; 

            const type = () => {
                if (i < quote.length) {
                    el.textContent += quote.charAt(i);
                    i++;
                    setTimeout(type, 30);
                }
            };

            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    type();
                    observer.disconnect();
                }
            }, { threshold: 0.2 });

            observer.observe(el);
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initTypewriter);
        } else {
            initTypewriter();
        }
    })();
</script>
@endpush

@endsection
