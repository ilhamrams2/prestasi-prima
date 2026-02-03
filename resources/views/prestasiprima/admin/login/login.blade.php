<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal — SMK Prestasi Prima</title>
  
  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    :root {
      --action-orange: #FF6B00;
      --soft-orange: #FFF5EE;
      --glass-bg: rgba(255, 255, 255, 0.9);
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #ffffff;
      overflow: hidden;
    }

    .font-outfit { font-family: 'Outfit', sans-serif; }

    .mesh-gradient {
      position: fixed;
      inset: 0;
      z-index: -1;
      background-color: #ffffff;
      background-image: 
        radial-gradient(at 0% 0%, rgba(255, 107, 0, 0.12) 0px, transparent 50%),
        radial-gradient(at 100% 0%, rgba(255, 107, 0, 0.08) 0px, transparent 50%),
        radial-gradient(at 100% 100%, rgba(255, 107, 0, 0.12) 0px, transparent 50%),
        radial-gradient(at 0% 100%, rgba(255, 107, 0, 0.08) 0px, transparent 50%);
    }

    .glass-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 107, 0, 0.1);
      box-shadow: 0 50px 100px -20px rgba(255, 107, 0, 0.15);
      border-radius: 48px;
    }

    .input-group:focus-within .input-icon {
      color: var(--action-orange);
      transform: scale(1.1);
    }

    .input-field:focus {
      border-color: var(--action-orange);
      background: #ffffff;
      box-shadow: 0 0 0 4px rgba(255, 107, 0, 0.1);
    }

    .btn-login {
      background: var(--action-orange);
      transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .btn-login:hover {
      background: #e66000;
      transform: translateY(-2px);
      box-shadow: 0 20px 40px -10px rgba(255, 107, 0, 0.4);
    }

    .branding-side {
      background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%);
    }

    /* Floating shapes */
    .shape {
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
      z-index: -1;
      opacity: 0.5;
      animation: float 20s infinite alternate;
    }

    @keyframes float {
      from { transform: translate(0, 0) rotate(0deg); }
      to { transform: translate(60px, 60px) rotate(25deg); }
    }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen p-6">
  
  <div class="mesh-gradient"></div>
  
  <!-- Background Elements -->
  <div class="shape w-96 h-96 bg-orange-100 -top-20 -left-20"></div>
  <div class="shape w-96 h-96 bg-orange-50 -bottom-20 -right-20" style="animation-delay: -5s;"></div>

  <div class="w-full max-w-[1100px] glass-card overflow-hidden flex flex-col md:flex-row shadow-[0_0_100px_rgba(255,107,0,0.1)]" data-aos="zoom-in" data-aos-duration="1000">
    
    <!-- Branding Side (Orange) -->
    <div class="hidden md:flex flex-col justify-between w-[42%] branding-side p-16 text-white relative overflow-hidden">
      <!-- Decorative Overlay -->
      <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
      <div class="absolute top-0 right-0 w-80 h-80 bg-white/20 blur-[100px] rounded-full"></div>
      
      <div class="relative z-10">
        <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center shadow-2xl mb-10">
            <img src="{{ asset('assets/images/logo-smk.png') }}" alt="SMK PP Logo" class="w-14 h-14 object-contain">
        </div>
        <h2 class="font-outfit text-sm font-black uppercase tracking-[0.4em] text-white/80 mb-4">Management Portal</h2>
        <h1 class="font-outfit text-5xl font-black leading-none tracking-tight">Navigasi <br>Digital <br>Pendidikan.</h1>
      </div>

      <div class="relative z-10 pt-10 border-t border-white/20">
        <p class="font-jakarta text-white/90 text-sm font-medium leading-relaxed max-w-xs">
          Panel eksklusif untuk mengelola ekosistem digital dan prestasi SMK Prestasi Prima secara terpadu.
        </p>
      </div>

      <!-- Large Ghost Icon -->
      <iconify-icon icon="lucide:layout-dashboard" class="absolute -bottom-16 -right-16 text-[24rem] text-white/5 opacity-40"></iconify-icon>
    </div>

    <!-- Form Side (White/Clean) -->
    <div class="flex-1 bg-white/60 p-12 md:p-20 relative">
      <div class="mb-14">
        <div class="md:hidden flex items-center mb-8">
             <img src="{{ asset('assets/images/logo-smk.png') }}" class="h-12 mr-4">
             <h4 class="font-outfit font-black text-orange-600 tracking-tighter text-xl">SMK PP</h4>
        </div>
        <h3 class="font-outfit text-4xl font-black text-[#1a1a1a] mb-3 tracking-tight">Selamat Datang</h3>
        <p class="text-gray-400 font-medium text-lg">Silakan masuk untuk mengelola sistem.</p>
      </div>

      <form method="POST" action="{{ route('authPP.login.post') }}" class="space-y-8">
        @csrf

        <!-- Email -->
        <div class="space-y-3 group input-group">
          <label class="block font-outfit text-[11px] font-black text-orange-600 uppercase tracking-[0.2em] ml-1">Alamat Email</label>
          <div class="relative">
            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-300 transition-all duration-300 input-icon">
              <iconify-icon icon="lucide:mail" class="text-2xl"></iconify-icon>
            </span>
            <input type="email" name="email" placeholder="admin@prestasiprima.sch.id" required
                   class="w-full h-20 bg-[#fafafa] border border-gray-100 rounded-3xl pl-16 pr-8 font-jakarta text-[#1a1a1a] font-bold text-sm transition-all focus:outline-none input-field shadow-sm">
          </div>
        </div>

        <!-- Password -->
        <div class="space-y-3 group input-group">
          <label class="block font-outfit text-[11px] font-black text-orange-600 uppercase tracking-[0.2em] ml-1">Kata Sandi</label>
          <div class="relative">
            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-300 transition-all duration-300 input-icon">
              <iconify-icon icon="lucide:lock-keyhole" class="text-2xl"></iconify-icon>
            </span>
            <input type="password" name="password" placeholder="••••••••" required
                   class="w-full h-20 bg-[#fafafa] border border-gray-100 rounded-3xl pl-16 pr-8 font-jakarta text-[#1a1a1a] font-bold text-sm transition-all focus:outline-none input-field shadow-sm">
          </div>
        </div>

        @if ($errors->any())
          <div class="bg-orange-50 border border-orange-100 text-orange-700 p-5 rounded-3xl text-xs font-bold animate-pulse flex items-center gap-4">
            <iconify-icon icon="lucide:info" class="text-xl"></iconify-icon>
            {{ $errors->first() }}
          </div>
        @endif

        <div class="pt-6">
          <button type="submit" class="w-full h-20 rounded-3xl text-white font-outfit font-black uppercase tracking-[0.2em] text-sm flex items-center justify-center gap-4 btn-login">
            Masuk Sekarang
            <iconify-icon icon="lucide:arrow-right" class="text-2xl"></iconify-icon>
          </button>
        </div>
      </form>

      <div class="mt-20 pt-10 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-6">
         <div class="flex items-center gap-4">
             <img src="{{ asset('assets/images/logo-smk.png') }}" class="h-6 grayscale opacity-30">
             <span class="w-px h-4 bg-gray-200"></span>
             <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">SMK Prestasi Prima</p>
         </div>
         <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">© 2025 All Rights Reserved</p>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
