<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PresmaBoard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

</head>

<body class="bg-gradient-to-br from-orange-50 to-white flex items-center justify-center min-h-screen">

    <!-- ALERT CONTAINER -->
    <div id="alert-container"></div>

    <!-- LOGIN CARD -->
    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-xl fade-in">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-12 h-12 flex items-center justify-center bg-orange-500 rounded-full shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white mt-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 2H6a1 1 0 0 0-1 1v3H3a1 1 0 0 0 0 2h2a5 5 0 0 0 4 4.9V14H9a3 3 0 0 0-3 3v1h12v-1a3 3 0 0 0-3-3h-1v-1.1A5 5 0 0 0 19 8h2a1 1 0 0 0 0-2h-2V3a1 1 0 0 0-1-1z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-gray-800">PresmaBoard</h1>
            </div>
            <p class="text-sm text-gray-500">Masuk untuk mengelola sistem leaderboard & eligible</p>
        </div>

        <form action="{{ route('presmaboard.authenticate') }}" method="POST" class="space-y-5">
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
            </div>

            <button type="submit"
                class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-lg text-white bg-orange-500 hover:bg-orange-600 transition btn-animate font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Masuk
            </button>
        </form>

        <div class="text-center text-xs text-gray-400 mt-6">
            © {{ date('Y') }} PresmaBoard | Sistem Penilaian Mahasiswa
        </div>
    </div>

    @if (session('error'))
        <x-presmaboard.alert type="error" title="Terjadi Kesalahan" message="{{ session('error') }}" />
    @endif
    @if (session('success'))
        <x-presmaboard.alert type="success" title="Berhasil" message="{{ session('success') }}" />
    @endif
