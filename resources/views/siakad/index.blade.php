<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - @yield('title')</title>

    {{-- Remixicon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    {{-- Vite --}}
    @vite('resources/css/app.css')


     <style>
        /* === CLEAN FILAMENT-LIKE ALERT === */
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
            background: #fffcf2;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            animation: fadeIn 0.3s ease-out;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .custom-alert.success {
            background: #fffdf5;
        }
        .custom-alert.error {
            background: #fef4f4;
        }
        .custom-alert.info {
            background: #f5f9ff;
        }
        .custom-alert.warning {
            background: #fff9eb;
        }

        .custom-alert-icon {
            font-size: 18px;
            margin-top: 3px;
            flex-shrink: 0;
            opacity: 0.9;
        }

        /* Icon Colors */
        .custom-alert.success .custom-alert-icon { color: #e09b1b; }
        .custom-alert.error .custom-alert-icon { color: #e63946; }
        .custom-alert.info .custom-alert-icon { color: #2563eb; }
        .custom-alert.warning .custom-alert-icon { color: #f59e0b; }

        .custom-alert-content {
            flex: 1;
            color: #1f2937;
            line-height: 1.4;
        }

        .custom-alert-title {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 2px;
            color: #111827;
        }

        .custom-alert-close {
            background: transparent;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            font-size: 16px;
            margin-left: 8px;
            transition: color 0.2s ease;
        }

        .custom-alert-close:hover {
            color: #6b7280;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(-8px); }
        }
    </style>


</head>
<body class="bg-gray-100">

    {{-- Sidebar --}}
    @include('siakad.partials.sidebar')

    {{-- Content --}}
    <main class="ml-64 p-6">
        @yield('content')
    </main>

   <div id="alert-container"></div>

    <script>
        function showAlert(type, title, message) {
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
                </div>
                <button class="custom-alert-close" onclick="alert.remove()">&times;</button>
            `;

            container.appendChild(alert);
            setTimeout(() => {
                alert.style.animation = 'fadeOut 0.4s ease-in forwards';
                setTimeout(() => alert.remove(), 400);
            }, 4000);
        }
    </script>

    {{-- Flash Message --}}
    @if ($errors->any())
        <script> showAlert('error', 'Oops...', '{{ $errors->first() }}'); </script>
    @elseif (session('error'))
        <script> showAlert('error', 'Login Gagal', '{{ session('error') }}'); </script>
    @elseif (session('success'))
        <script> showAlert('success', 'Berhasil', '{{ session('success') }}'); </script>
    @endif

    @vite('resources/js/app.js')

    {{-- Scripts tambahan halaman --}}
    @stack('scripts')
</body>
</html>
