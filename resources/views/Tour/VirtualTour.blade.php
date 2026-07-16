<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Tour SMK Prestasi Prima</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/core@5/index.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/markers-plugin@5/index.min.css" />
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #0c0602;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        #viewer {
            width: 100%;
            height: 100%;
        }

        /* ==========================
            LOADING SCREEN
        ========================== */
       .loading-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #040100;
            z-index: 9999;
            transition: opacity 400ms ease, visibility 400ms ease;
            overflow: hidden;
        }
        .loading-overlay::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(255, 136, 0, 0.28) 0%, rgba(48, 24, 6, 0.9) 45%, rgba(4, 1, 0, 0.95) 80%, rgba(0, 0, 0, 1) 100%);
            pointer-events: none;
        }
        .loading-overlay.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .loading-card {
            position: relative;
            width: min(260px, 60vw);
            height: min(260px, 60vw);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }
         .loading-ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 4px solid rgba(255, 145, 0, 0.18);
            border-top-color: #ff7b00;
            border-bottom-color: #ff9900;
            animation: spin 2.4s linear infinite;
            box-shadow: 0 0 45px rgba(255, 140, 0, 0.25);
        }

        .loading-ring.secondary {
            inset: 16px;
            border-width: 3px;
            border-top-color: rgba(255, 231, 199, 0.85);
            border-bottom-color: rgba(255, 131, 0, 0.65);
            animation-duration: 1.6s;
            animation-direction: reverse;
            opacity: 0.85;
        }

       @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
      .loading-logo {
            position: relative;
            width: min(120px, 32vw);
            height: min(120px, 32vw);
            object-fit: contain;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.45));
        }

        .loading-text {
            margin-top: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            font-size: 0.85rem;
            color: #ffdfb8;
            text-align: center;
            position: relative;
            z-index: 1;
        }

       .loading-subtext {
            margin-top: 0.4rem;
            font-size: 0.7rem;
            color: rgba(255, 214, 176, 0.65);
            text-transform: uppercase;
            text-align: center;
            letter-spacing: 0.12em;
            position: relative;
            z-index: 1;
        }

        /* ==========================
            LEFT NAVIGATION MENU
        ========================== */
        .nav-container {
            position: fixed;
            left: 20px;
            top: 20px;
            width: 210px;
            background: rgba(20, 10, 5, 0.75);
            backdrop-filter: blur(6px);
            border-radius: 15px;
            padding: 12px 0;
            z-index: 1001;
            transition: all 0.3s ease;
            max-height: 80vh;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 136, 0, 0.45) transparent;
        }
        .nav-container::-webkit-scrollbar {
            width: 6px;
        }
        .nav-container::-webkit-scrollbar-track {
            background: transparent;
        }
        .nav-container::-webkit-scrollbar-thumb {
            background: rgba(255, 136, 0, 0.45);
            border-radius: 4px;
        }
        .nav-container.collapsed {
            width: 50px;
            height: 50px;
            padding: 0;
            overflow: hidden;
        }
        .nav-container.collapsed .nav-title,
        .nav-container.collapsed .nav-item {
            display: none;
        }
        .nav-toggle {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 40px;
            height: 40px;
            background: #ff7b00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 24px;
            transition: transform 0.3s ease, background 0.3s ease;
            z-index: 2;
        }
        .nav-toggle:hover {
            background: #ff9933;
            transform: rotate(90deg);
        }
        .nav-container.collapsed .nav-toggle {
            position: static;
            margin: 5px;
        }
        .nav-title {
            padding: 12px 18px;
            font-size: 14px;
            color: #ffbc6b;
            text-transform: uppercase;
            font-weight: bold;
        }
        .nav-item {
            padding: 12px 18px;
            margin: 4px 10px;
            border-radius: 10px;
            background: rgba(55, 40, 25, 0.45);
            color: #e6d7c3;
            cursor: pointer;
            transition: 0.25s;
        }
        .nav-item:hover {
            background: rgba(255, 150, 60, 0.35);
        }
        .nav-item.active {
            background: #ff7b00;
            color: white;
            box-shadow: 0 0 12px #ffae42, 0 0 24px #ff7b00;
            font-weight: bold;
        }

        .back-button {
            position: fixed;
            bottom: 24px;
            right: 24px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 26px;
            background: linear-gradient(135deg, #ffb347, #ff6a00);
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            border-radius: 999px;
            box-shadow: 0 15px 26px rgba(255, 126, 0, 0.4);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            z-index: 1002;
            overflow: hidden;
            animation: backButtonFloat 4.8s ease-in-out infinite;
        }
        .back-button::before {
            content: '';
            position: absolute;
            inset: 2px;
            border-radius: inherit;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0));
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        .back-button span {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            z-index: 1;
        }
        .back-button-icon {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.18);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, background 0.3s ease;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.55);
        }
        .back-button-icon svg {
            width: 15px;
            height: 15px;
            color: #ffffff;
        }
        .back-button:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 20px 34px rgba(255, 126, 0, 0.48);
        }
        .back-button:hover::before {
            opacity: 1;
        }
        .back-button:hover .back-button-icon {
            transform: translateX(-4px);
            background: rgba(255, 255, 255, 0.3);
        }
        .back-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: -55%;
            width: 45%;
            height: 160%;
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-50%) rotate(30deg);
            transition: transform 0.6s ease;
            pointer-events: none;
        }
        .back-button:hover::after {
            transform: translate(220%, -50%) rotate(30deg);
        }

        @keyframes backButtonFloat {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-4px);
            }
        }

        /* ==========================
            TITLE BAR
        ========================== */
        .title-bar {
            position: fixed;
            top: 25px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(90deg, #7c4d1b, #3d2311);
            padding: 12px 26px;
            border-radius: 14px;
            color: #ffdfb8;
            font-size: 15px;
            border: 1px solid rgba(255,190,120,0.4);
            z-index: 1001;
        }

        /* ==========================
            MOBILE RESPONSIVE
        ========================== */
        @media (max-width: 768px) {
            .nav-container {
                left: 10px;
                top: 10px;
                width: 180px;
                padding: 8px 0;
            }
            .nav-container.collapsed {
                width: 44px;
                height: 44px;
            }
            .nav-title {
                padding: 8px 12px;
                font-size: 12px;
            }
            .nav-item {
                padding: 10px 12px;
                margin: 3px 8px;
                font-size: 13px;
            }
            .nav-toggle {
                width: 34px;
                height: 34px;
                font-size: 18px;
            }
            .title-bar {
                top: 15px;
                padding: 8px 16px;
                font-size: 13px;
            }
            .back-button {
                bottom: 16px;
                right: 16px;
                padding: 12px 22px;
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- Loading Screen -->
    <div id="loading-overlay" class="loading-overlay">
        <div>
            <div class="loading-card">
                <span class="loading-ring"></span>
                <span class="loading-ring secondary"></span>
                <img src="{{ asset('assets/images/logo-smk.png') }}" alt="SMK Prestasi Prima Logo" class="loading-logo">
            </div>
            <div class="loading-text">Loading Virtual Tour</div>
            <div class="loading-subtext">Mempersiapkan tampilan 360°</div>
        </div>
    </div>

    <!-- Viewer -->
    <div id="viewer"></div>

    <!-- Navigation -->
    <div id="nav-container" class="nav-container collapsed">
        <div class="nav-toggle" id="nav-toggle">▼</div>
        <div class="nav-title">Navigasi</div>
    </div>

    <a href="{{ url('/') }}" class="back-button" aria-label="Kembali ke beranda">
        <span>
            <span class="back-button-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                    <circle cx="12" cy="12" r="9.5" fill="none" stroke="currentColor" stroke-width="1.5" opacity="0.75" />
                    <path d="M13.5 8.5L9.5 12l4 3.5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    <line x1="10" y1="12" x2="15" y2="12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span>Beranda</span>
        </span>
    </a>

    <!-- Title -->
    <div id="title-bar" class="title-bar"></div>

    <script src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/core@5/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/markers-plugin@5/index.min.js"></script>

    <script>
        /* =======================================
            SCENES (ALL 15)
        ======================================= */
        const scenes = [
            { name: 'Field', file: "{{ asset('assets/360View/lapangan.jpeg') }}" },
            { name: 'Mora Hall', file: "{{ asset('assets/360View/aula-mora.jpeg') }}" },
            { name: 'Cafeteria', file: "{{ asset('assets/360View/kantin.jpeg') }}" },
            { name: 'Cafeteria 2', file: "{{ asset('assets/360View/kantin-2.jpg') }}" },
            { name: 'Bilingual Class 1', file: "{{ asset('assets/360View/kelas-bilingual.jpeg') }}" },
            { name: 'Bilingual Class 3', file: "{{ asset('assets/360View/kelas-bilingual-3.jpeg') }}" },
            { name: 'Bilingual Class 4', file: "{{ asset('assets/360View/kelas-bilingual-4.jpeg') }}" },
            { name: 'Regular Class', file: "{{ asset('assets/360View/ruang-kelas.jpeg') }}" },
            { name: 'BCF Laboratory', file: "{{ asset('assets/360View/lab-dkv.jpeg') }}" },
            { name: 'PPLG Laboratory', file: "{{ asset('assets/360View/lab-pplg.jpg') }}" },
            // { name: 'Bilingual Corridor', file: "{{ asset('assets/360View/lorong-bilingual.jpg') }}" },
            // { name: 'Corridor', file: "{{ asset('assets/360View/lorong.jpg') }}" },
            { name: 'Prayer Room', file: "{{ asset('assets/360View/mushola.jpeg') }}" },
            { name: 'Front Library', file: "{{ asset('assets/360View/perpustakaan.jpeg') }}" },
            { name: 'Back Library', file: "{{ asset('assets/360View/perpustakaan-2.jpg') }}" },
            { name: 'PPDB room', file: "{{ asset('assets/360View/ppdb.jpeg') }}" },
            { name: 'Flores Room', file: "{{ asset('assets/360View/ruang-rapat.jpeg') }}" },
        ];

        let currentScene = 0;
        let userInteractionTimeout = null;
        let isRotating = true;
        let rotationInterval = null;

        const loading = document.getElementById('loading-overlay');
        const nav = document.getElementById('nav-container');
        const navToggle = document.getElementById('nav-toggle');
        const titleBar = document.getElementById('title-bar');

        /* =======================================
            VIEWER INIT
        ======================================= */
        const viewer = new PhotoSphereViewer.Viewer({
            container: document.querySelector('#viewer'),
            panorama: scenes[0].file,
            navbar: false,
            defaultYaw: 0,
            defaultPitch: 0,
            fisheye: false,
            plugins: [
                [PhotoSphereViewer.MarkersPlugin, {}]
            ],
        });

        const markers = viewer.getPlugin(PhotoSphereViewer.MarkersPlugin);
        
        /* =======================================
            MANUAL AUTO ROTATION (100% WORKS!)
        ======================================= */
        function startRotation() {
            if (rotationInterval) {
                clearInterval(rotationInterval);
            }

            isRotating = true;
            console.log('🔄 Manual rotation STARTED');

            rotationInterval = setInterval(() => {
                if (!isRotating) {
                    return;
                }

                const { yaw, pitch } = viewer.getPosition();
                viewer.rotate({
                    yaw: yaw + 0.0015,
                    pitch
                });
            }, 16); // ~60fps
        }

        function stopRotation() {
            if (!isRotating) {
                return;
            }

            isRotating = false;
            console.log('⏸️ Manual rotation STOPPED');
        }

        function scheduleRotationResume() {
            if (userInteractionTimeout) {
                clearTimeout(userInteractionTimeout);
            }

            userInteractionTimeout = setTimeout(() => {
                console.log('▶️ Resume rotation after inactivity');
                startRotation();
            }, 3000);
        }

        /* =======================================
            BUILD NAV MENU
        ======================================= */
        scenes.forEach((scene, i) => {
            const item = document.createElement('div');
            item.classList.add('nav-item');
            item.textContent = scene.name;
            item.onclick = () => loadScene(i);
            nav.appendChild(item);
        });

        function updateMenu() {
            document.querySelectorAll('.nav-item').forEach((el, i) => {
                el.classList.toggle('active', i === currentScene);
            });
        }

        function updateTitle() {
            titleBar.textContent = scenes[currentScene].name;
        }

        /* =======================================
            LOAD SCENE
        ======================================= */
        function loadScene(i) {
            currentScene = i;
            loading.classList.remove('hidden');
            viewer.setPanorama(scenes[i].file).catch(() => loading.classList.add('hidden'));
        }

        /* =======================================
            HOTSPOTS
        ======================================= */
        function loadHotspots(i) {
            markers.clearMarkers();

            if (i < scenes.length - 1) {
                markers.addMarker({
                    id: "hs-" + i,
                    position: { yaw: 0.2, pitch: 0.05 },
                    image: "https://cdn-icons-png.flaticon.com/512/1828/1828817.png",
                    size: { width: 48, height: 48 },
                    tooltip: "Menuju " + scenes[i+1].name,
                    data: { target: i + 1 }
                });
            }
        }

        markers.addEventListener('select-marker', ({ marker }) => {
            if (marker.data.target !== undefined) {
                loadScene(marker.data.target);
            }
        });

        /* =======================================
            NAVIGATION TOGGLE
        ======================================= */
        navToggle.onclick = () => {
            nav.classList.toggle('collapsed');
            navToggle.textContent = nav.classList.contains('collapsed') ? '▼' : '✕';
        };

        /* =======================================
            USER INTERACTION HANDLING
        ======================================= */
        const stopEvents = ['pointerdown', 'mousedown', 'touchstart'];
        const resumeEvents = ['pointerup', 'mouseup', 'touchend', 'touchcancel'];

        stopEvents.forEach(evt => {
            viewer.container.addEventListener(evt, () => {
                stopRotation();
                if (userInteractionTimeout) {
                    clearTimeout(userInteractionTimeout);
                    userInteractionTimeout = null;
                }
            }, { passive: true });
        });

        resumeEvents.forEach(evt => {
            viewer.container.addEventListener(evt, () => {
                scheduleRotationResume();
            }, { passive: true });
        });

        viewer.container.addEventListener('wheel', () => {
            stopRotation();
            scheduleRotationResume();
        }, { passive: true });

        /* =======================================
            ON PANORAMA LOADED
        ======================================= */
        viewer.addEventListener('ready', () => {
            console.log('✅ Viewer ready - Starting MANUAL rotation');
            loading.classList.add('hidden');
            updateMenu();
            updateTitle();
            loadHotspots(currentScene);
            
            // Start manual rotation
            startRotation();
        });

        viewer.addEventListener('panorama-loaded', () => {
            console.log('✅ Panorama loaded - Restarting MANUAL rotation');
            loading.classList.add('hidden');
            updateMenu();
            updateTitle();
            loadHotspots(currentScene);
            
            // Restart rotation setiap ganti scene
            startRotation();
        });

        updateMenu();
        updateTitle();
    </script>
</body>
</html>