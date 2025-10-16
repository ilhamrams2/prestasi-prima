<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PresmaBoard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

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

        /* === ALERT STYLE (Sama seperti SIAKAD) === */
        #alert-container {
            position: fixed;
            top: 24px;
            right: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            z-index: 9999;
        }

        .custom-alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            border-radius: 12px;
            padding: 14px 18px;
            min-width: 280px;
            max-width: 360px;
            background: #fffdf5;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            border: 1px solid #fde68a80;
            animation: fadeIn 0.3s ease-out;
            font-family: "Inter", sans-serif;
        }

        .custom-alert-icon { font-size: 18px; margin-top: 3px; color: #e09b1b; flex-shrink: 0; }
        .custom-alert-content { flex: 1; color: #1f2937; font-size: 14px; line-height: 1.4; }
        .custom-alert-title { font-weight: 600; font-size: 15px; color: #111827; margin-bottom: 2px; }

        .custom-alert-cta {
            display: inline-block;
            margin-top: 6px;
            color: #e09b1b;
            font-weight: 500;
            font-size: 13px;
            text-decoration: none;
            transition: 0.2s;
        }

        .custom-alert-cta:hover { color: #c47e09; }

        .custom-alert-close {
            background: transparent;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            font-size: 16px;
            margin-left: 8px;
            transition: color 0.2s ease;
        }

        .custom-alert-close:hover { color: #6b7280; }

        @keyframes fadeOut {
            to { opacity: 0; transform: translateY(-8px); }
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
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 text-white mt-2"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
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
    <script> showAlert('error', 'Login Gagal', '{{ $errors->first() }}'); </script>
@elseif (session('error'))
    <script> showAlert('error', 'Error', '{{ session('error') }}'); </script>
@elseif (session('success') === 'login')
    <script>
        showAlert(
            'success',
            'Berhasil Login',
            'Selamat datang, {{ session('username') }} 👋',
            'Lihat Dashboard',
            '{{ route("presmaboard.dashboard") }}'
        );
    </script>
@elseif (session('success') === 'logout')
    <script>
        showAlert(
            'success',
            'Logout Berhasil',
            'Anda telah keluar dari sistem.',
            'Login Lagi',
            '{{ route("presmaboard.login") }}'
        );
    </script>
@elseif (session('success'))
    <script>
        showAlert('success', 'Berhasil', '{{ session("success") }}');
    </script>
@endif
