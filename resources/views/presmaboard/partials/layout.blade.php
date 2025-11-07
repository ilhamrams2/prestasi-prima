<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Presma Board')</title>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans text-slate-800 bg-gray-50">
    <div class="flex min-h-screen">

        <div class="z-30">
            @include('presmaboard.partials.sidebar')

        </div>
        <main class="flex-1 p-6 bg-gray-50 min-h-screen lg:ml-64 transition-all duration-300">
            @yield('content')
        </main>
    </div>

    <script>
        const sidebar = document.getElementById("sidebar");
        const toggle = document.getElementById("sidebarToggle");
        if (toggle) {
            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("-translate-x-full");
            });
        }
    </script>
    <!-- Chart.js removed from global layout to avoid loading on pages without charts. Loaded lazily where needed. -->



    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-animate {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-animate:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(249, 115, 22, 0.4);
        }

        .btn-animate:active {
            transform: scale(0.97);
        }

        [x-cloak] {
            display: none !important;
        }

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

        .custom-alert-icon {
            font-size: 18px;
            margin-top: 3px;
            color: #e09b1b;
            flex-shrink: 0;
        }

        .custom-alert-content {
            flex: 1;
            color: #1f2937;
            font-size: 14px;
            line-height: 1.4;
        }

        .custom-alert-title {
            font-weight: 600;
            font-size: 15px;
            color: #111827;
            margin-bottom: 2px;
        }

        .custom-alert-cta {
            display: inline-block;
            margin-top: 6px;
            color: #e09b1b;
            font-weight: 500;
            font-size: 13px;
            text-decoration: none;
            transition: 0.2s;
        }

        .custom-alert-cta:hover {
            color: #c47e09;
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

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateY(-8px);
            }
        }
    </style>
</body>

</html>
