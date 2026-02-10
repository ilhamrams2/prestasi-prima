<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situs Sedang Pemeliharaan - SMK Prestasi Prima</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-smk.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle at top right, #fff5eb 0%, #ffffff 50%, #f8fafc 100%);
        }
        .orbit-container {
            perspective: 1000px;
        }
        .orbit-ring {
            transform-style: preserve-3d;
            animation: orbit 20s linear infinite;
        }
        @keyframes orbit {
            0% { transform: rotateY(0deg) rotateX(20deg); }
            100% { transform: rotateY(360deg) rotateX(20deg); }
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="antialiased font-sans text-slate-800 overflow-hidden">
    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative">
        
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-orange-100/50 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[400px] h-[400px] bg-blue-50/50 rounded-full blur-[100px]"></div>
        </div>

        <!-- Main Card -->
        <div class="relative z-10 max-w-2xl w-full text-center space-y-12">
            
            <!-- Logo Section -->
            <div class="flex flex-col items-center gap-4">
                <div class="w-24 h-24 p-4 bg-white rounded-3xl shadow-2xl shadow-orange-500/10 border border-orange-50 floating">
                    <img src="{{ asset('assets/images/logo-smk.png') }}" alt="Logo SMK" class="w-full h-full object-contain">
                </div>
                <div class="px-4 py-1.5 bg-orange-600 text-white text-[10px] font-black uppercase tracking-[0.3em] rounded-full shadow-lg shadow-orange-500/30">
                    System Update
                </div>
            </div>

            <!-- Content -->
            <div class="space-y-6">
                <h1 class="text-4xl md:text-6xl font-black text-slate-900 tracking-tighter leading-none">
                    SEGERA <span class="text-orange-600">KEMBALI.</span>
                </h1>
                <p class="text-slate-500 text-base md:text-xl font-medium max-w-lg mx-auto leading-relaxed">
                    Mohon maaf, saat ini website kami sedang dalam proses pemeliharaan rutin untuk meningkatkan kualitas layanan.
                </p>
            </div>

            <!-- Progress/Illustration Hint -->
            <div class="flex items-center justify-center gap-8 py-8">
                <div class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center text-xl shadow-sm border border-orange-100">
                        <i class="ri-settings-3-line animate-spin"></i>
                    </div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Optimizing</span>
                </div>
                <div class="h-[1px] w-12 bg-slate-100"></div>
                <div class="flex flex-col items-center gap-2 text-slate-300">
                    <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-xl border border-slate-100">
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <span class="text-[10px] font-bold text-slate-300 uppercase tracking-widest">Securing</span>
                </div>
                <div class="h-[1px] w-12 bg-slate-100"></div>
                <div class="flex flex-col items-center gap-2 text-slate-300">
                    <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-xl border border-slate-100">
                        <i class="ri-rocket-line"></i>
                    </div>
                    <span class="text-[10px] font-bold text-slate-300 uppercase tracking-widest">Deploying</span>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="pt-12 border-t border-slate-100">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">Butuh bantuan segera?</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="mailto:info@prestasiprima.sch.id" class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 hover:border-orange-500 hover:text-orange-600 transition-all shadow-sm flex items-center gap-2">
                        <i class="ri-mail-line"></i> info@prestasiprima.sch.id
                    </a>
                    <a href="https://instagram.com/smkprestasiprima" target="_blank" class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 hover:border-orange-500 hover:text-orange-600 transition-all shadow-sm flex items-center gap-2">
                        <i class="ri-instagram-line"></i> @smkprestasiprima
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="absolute bottom-8 left-0 right-0 text-center">
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.4em]">
                &copy; {{ date('Y') }} SMK PRESTASI PRIMA
            </p>
        </div>
    </div>
</body>
</html>
