<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PresmaBoard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .fade-in { animation: fadeIn 1s ease-in-out forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-animate { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .btn-animate:hover { transform: translateY(-2px); box-shadow: 0 8px 15px rgba(249,115,22,0.4); }
        .btn-animate:active { transform: scale(0.97); }
    </style>
</head>
<body class="bg-gradient-to-br from-orange-50 to-white flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-xl fade-in">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-3 mb-4">
<div class="w-12 h-12 flex items-center justify-center bg-orange-500 rounded-full shadow-md">
  <svg xmlns="http://www.w3.org/2000/svg"
       class="w-7 h-7 text-white mt-2"
       fill="none"
       viewBox="0 0 24 24"
       stroke="currentColor"
       stroke-width="3">
    <path stroke-linecap="round" stroke-linejoin="round"
          d="M18 2H6a1 1 0 0 0-1 1v3H3a1 1 0 0 0 0 2h2a5 5 0 0 0 4 4.9V14H9a3 3 0 0 0-3 3v1h12v-1a3 3 0 0 0-3-3h-1v-1.1A5 5 0 0 0 19 8h2a1 1 0 0 0 0-2h-2V3a1 1 0 0 0-1-1z" />
  </svg>
</div>





                <h1 class="text-2xl font-extrabold text-gray-800">PresmaBoard</h1>
            </div>
            <p class="text-sm text-gray-500">Masuk untuk mengelola sistem leaderboard & eligible</p>
        </div>

        <form action="{{ route('presmaboard.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                       placeholder="admin@presmaboard.com"
                       class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 transition" />
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••"
                       class="w-full px-4 py-3 rounded-lg bg-gray-100 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 pr-10 transition" />
                <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-7 right-3 flex items-center text-gray-400 hover:text-gray-600 transition">
         
                </button>
            </div>

            <button type="submit"
                    class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-lg text-white bg-orange-500 hover:bg-orange-600 transition btn-animate font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Masuk
            </button>
        </form>

        <div class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} PresmaBoard | Sistem Penilaian Mahasiswa
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="mt-4 p-3 bg-red-100 text-red-600 rounded-lg text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif
    </div>

    <!-- Scripts -->
    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            const icon = document.getElementById("eyeIcon");
            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.228-3.593m3.992-2.494A9.953 9.953 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.132 5.411M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>`;
            } else {
                input.type = "password";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '{{ $errors->first() }}',
                confirmButtonColor: '#f97316'
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonColor: '#f97316'
            });
        </script>
    @elseif (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#f97316'
            });
        </script>
    @endif
</body>
</html>
