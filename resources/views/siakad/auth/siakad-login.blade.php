<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - SIAKAD SMK</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: 'Inter', sans-serif; }

    /* Animasi Fade In */
    .fade-in { animation: fadeIn 1s ease-in-out forwards; }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Efek tombol */
    .btn-animate {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-animate:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(249,115,22,0.4);
    }
    .btn-animate:active { transform: scale(0.97); }

    /* Container scaling */
    .login-container {
      width: clamp(300px, 40vw, 450px);
    }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

  <div class="w-full flex items-center justify-center">
    <div class="login-container fade-in">
      <!-- Logo dan Judul -->
      <div class="text-center mb-8">
        <div class="flex items-center justify-center gap-6 mb-4">
          <!-- Logo Kiri -->
          <img src="{{ asset('assets/images/siakad/yayasan.png') }}" 
               alt="Logo Kiri" class="w-[clamp(2.5rem,5vw,3.5rem)] h-auto object-contain">

          <!-- Icon Orang Animasi -->
          <div class="w-[clamp(2.5rem,5vw,3.5rem)] h-[clamp(2.5rem,5vw,3.5rem)] flex items-center justify-center bg-orange-500 rounded-full shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" 
              class="w-[clamp(1.2rem,3vw,2rem)] h-[clamp(1.2rem,3vw,2rem)] text-white animate-bounce" 
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A10 10 0 0112 22a10 10 0 016.879-4.196M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>

          <!-- Logo Kanan -->
          <img src="{{ asset('assets/images/siakad/logo-smk.png') }}" 
               alt="Logo Kanan" class="w-[clamp(2.5rem,5vw,3.5rem)] h-auto object-contain">
        </div>

        <h1 class="text-[clamp(1.2rem,2.5vw,2rem)] font-extrabold text-gray-800">
          SIAKAD SMK
        </h1>
        <p class="text-[clamp(0.7rem,1.5vw,0.9rem)] text-gray-500">
          Sistem Informasi Akademik
        </p>
      </div>

      <!-- Kotak Form -->
      <div class="bg-white rounded-lg shadow-md p-[clamp(1rem,3vw,2rem)]">
        <!-- Judul Login -->
        <div class="text-center mb-6">
          <p class="flex items-center justify-center gap-2 text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-500" 
              fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A10 10 0 0112 22a10 10 0 016.879-4.196M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="font-semibold">Login</span>
          </p>
          <p class="text-xs text-gray-400 mt-1">Masuk ke dalam sistem akademik</p>
        </div>

        <!-- Form -->
        <form action="#" method="POST" class="space-y-4">
          <!-- Username -->
          <div class="fade-in" style="animation-delay:0.2s">
            <input type="text" id="username" name="username" placeholder="Masukkan Username"
              class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-700 text-sm 
              focus:outline-none focus:ring-2 focus:ring-orange-500 transition" />
          </div>

          <!-- Password -->
          <div class="relative fade-in" style="animation-delay:0.4s">
            <input type="password" id="password" name="password" placeholder="Masukkan Password"
              class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-700 text-sm 
              focus:outline-none focus:ring-2 focus:ring-orange-500 pr-10 transition" />
            
            <!-- Show/Hide -->
            <button type="button" onclick="togglePassword()" 
              class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600 transition">
              <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>

          <!-- Tombol Masuk -->
          <div class="fade-in" style="animation-delay:0.6s">
            <button type="submit"
              class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-lg 
              text-white bg-orange-500 hover:bg-orange-600 transition btn-animate">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5 12h14M12 5l7 7-7 7" />
              </svg>
              Masuk
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    // Toggle Password
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const eyeIcon = document.getElementById("eyeIcon");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.228-3.593m3.992-2.494A9.953 9.953 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.132 5.411M15 12a3 3 0 11-6 0 3 3 0 016 0z" />`;
      } else {
        passwordInput.type = "password";
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
      }
    }
  </script>

</body>
</html>
