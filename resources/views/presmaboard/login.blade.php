<!DOCTYPE html>
<html lang="id">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PresmaBoard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        #alert-container {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            z-index: 60;
            width: calc(100% - 3rem);
            max-width: 22rem;
        }

        .custom-alert {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 1rem 1.1rem;
            border-radius: 0.875rem;
            border-left: 0.3rem solid transparent;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12);
            background: #f8fafc;
            color: #0f172a;
            animation: fadeIn 0.35s ease-out;
        }

        .custom-alert.success {
            border-left-color: #22c55e;
            background: #f0fdf4;
            color: #166534;
        }

        .custom-alert.error {
            border-left-color: #ef4444;
            background: #fef2f2;
            color: #991b1b;
        }

        .custom-alert.info {
            border-left-color: #3b82f6;
            background: #eff6ff;
            color: #1d4ed8;
        }

        .custom-alert.warning {
            border-left-color: #f59e0b;
            background: #fffbeb;
            color: #92400e;
        }

        .custom-alert-icon {
            font-size: 1.35rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-alert-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .custom-alert-cta {
            display: inline-flex;
            margin-top: 0.75rem;
            font-weight: 600;
            font-size: 0.85rem;
            color: inherit;
            text-decoration: underline;
        }

        .custom-alert-close {
            background: transparent;
            border: none;
            color: inherit;
            font-size: 1.3rem;
            line-height: 1;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        .custom-alert-close:hover {
            opacity: 0.7;
        }

        .custom-alert-content {
            flex: 1;
            font-size: 0.9rem;
        }

        .fade-in {
            animation: fadeIn 0.45s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateY(-8px);
            }
        }

        @media (max-width: 640px) {
            #alert-container {
                left: 1.5rem;
                right: 1.5rem;
                max-width: none;
            }
        }
    </style>

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
            © {{ date('Y') }} PresmaBoard | Sistem Penilaian Siswa
        </div>
    </div>

    <!-- === ALERT SCRIPT === -->
    <script>
        function showAlert(type, title, message, ctaText = null, ctaLink = null) {
            const container = document.getElementById('alert-container');
            const alert = document.createElement('div');
            alert.className = `custom-alert ${type}`;

            const icons = {
                success: '<i class="ri-check-line"></i>',
                error: '<i class="ri-close-circle-line"></i>',
                info: '<i class="ri-information-line"></i>',
                warning: '<i class="ri-alert-line"></i>',
            };

            alert.innerHTML = `
                <div class="custom-alert-icon">${icons[type] || icons.info}</div>
                <div class="custom-alert-content">
                    <div class="custom-alert-title">${title}</div>
                    <div>${message}</div>
                    ${ctaText && ctaLink ? `<a href="${ctaLink}" class="custom-alert-cta">${ctaText} →</a>` : ""}
                </div>
                <button class="custom-alert-close" onclick="alert.remove()">&times;</button>
            `;

            container.appendChild(alert);
            setTimeout(() => {
                alert.style.animation = 'fadeOut 0.4s ease-in forwards';
                setTimeout(() => alert.remove(), 400);
            }, 5000);
        }
    </script>

    @if ($errors->any())
        <script>
            showAlert('error', 'Login Gagal', '{{ $errors->first() }}');
        </script>
    @elseif (session('error'))
        <script>
            showAlert('error', 'Error', '{{ session('error') }}');
        </script>
    @elseif (session('success') === 'login')
        <script>
            showAlert(
                'success',
                'Berhasil Login',
                'Selamat datang, {{ session('username') }} 👋',
                'Lihat Dashboard',
                '{{ route('presmaboard.dashboard') }}'
            );
        </script>
    @elseif (session('success') === 'logout')
        <script>
            showAlert(
                'success',
                'Logout Berhasil',
                'Anda telah keluar dari sistem.',
                'Login Lagi',
                '{{ route('presmaboard.login') }}'
            );
        </script>
    @elseif (session('success'))
        <script>
            showAlert('success', 'Berhasil', '{{ session('success') }}');
        </script>
    @endif
