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
            top: 50%;
            transform: translateY(-50%);
            width: 210px;
            background: rgba(20, 10, 5, 0.75);
            backdrop-filter: blur(6px);
            border-radius: 15px;
            padding: 12px 0;
            z-index: 1001;
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
            RESET BUTTON
        ========================== */
        .reset-btn {
            position: fixed;
            top: 30px;
            right: 30px;
            width: 44px;
            height: 44px;
            background: #ff7b00;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 20px;
            z-index: 1001;
        }
        .reset-btn:hover { background: #ff9933; }
    </style>
</head>

<body>

    <!-- Loading Screen -->
    <div id="loading-overlay" class="loading-overlay">
        <div>
            <div class="loading-card">
                <span class="loading-ring"></span>
                <span class="loading-ring secondary"></span>
                <img src="{{ asset('assets/images/logo-smk.png') }}" class="loading-logo">
            </div>
            <div class="loading-text">Loading Virtual Tour</div>
            <div class="loading-subtext">Mempersiapkan tampilan 360°</div>
        </div>
    </div>

    <!-- Viewer -->
    <div id="viewer"></div>

    <!-- Navigation -->
    <div id="nav-container" class="nav-container">
        <div class="nav-title">Navigasi</div>
    </div>

    <!-- Title -->
    <div id="title-bar" class="title-bar"></div>

    <!-- Reset Button -->
    <div id="reset-btn" class="reset-btn">⟳</div>

    <script src="https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/core@5/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/markers-plugin@5/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/autorotate-plugin@5/index.min.js"></script>

    <script>
        /* =======================================
            SCENES (ALL 11)
        ======================================= */
        const scenes = [
            { name: 'Field', file: "{{ asset('assets/360View/v360-1.jpg') }}" },
            { name: 'Cooperative', file: "{{ asset('assets/360View/v360-2.jpg') }}" },
            { name: 'Cafeteria', file: "{{ asset('assets/360View/v360-3.jpg') }}" },
            { name: 'Corridor', file: "{{ asset('assets/360View/v360-4.jpg') }}" },
            { name: 'Executive', file: "{{ asset('assets/360View/v360-5.jpg') }}" },
            { name: 'Executive Class', file: "{{ asset('assets/360View/v360-6.jpg') }}" },
            { name: 'PPLG Laboratory', file: "{{ asset('assets/360View/v360-7.jpg') }}" },
            { name: 'BC Laboratory', file: "{{ asset('assets/360View/v360-8.jpg') }}" },
            { name: 'Regular Class', file: "{{ asset('assets/360View/v360-9.jpg') }}" },
            { name: 'Pathway', file: "{{ asset('assets/360View/v360-10.jpg') }}" },
            { name: 'Library', file: "{{ asset('assets/360View/v360-11.jpg') }}" }
        ];

        let currentScene = 0;

        const loading = document.getElementById('loading-overlay');
        const nav = document.getElementById('nav-container');
        const titleBar = document.getElementById('title-bar');
        const resetBtn = document.getElementById('reset-btn');

        /* =======================================
            VIEWER INIT
        ======================================= */
        const viewer = new PhotoSphereViewer.Viewer({
            container: document.querySelector('#viewer'),
            panorama: scenes[0].file,
            navbar: false,
            plugins: [
                [PhotoSphereViewer.MarkersPlugin, {}],
                [PhotoSphereViewer.AutorotatePlugin, {
                    autostartDelay: 3000,
                    autorotateSpeed: '2rpm',
                }]
            ],
        });

        const markers = viewer.getPlugin(PhotoSphereViewer.MarkersPlugin);

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
                    longitude: 0.2,
                    latitude: 0.05,
                    image: "https://cdn-icons-png.flaticon.com/512/1828/1828817.png",
                    width: 48,
                    height: 48,
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
            RESET VIEW BUTTON
        ======================================= */
        resetBtn.onclick = () => {
            viewer.animate({ yaw: 0, pitch: 0, zoom: 0 });
        };

        /* =======================================
            ON PANORAMA LOADED
        ======================================= */
        viewer.addEventListener('panorama-loaded', () => {
            loading.classList.add('hidden');
            updateMenu();
            updateTitle();
            loadHotspots(currentScene);
        });

        updateMenu();
        updateTitle();
    </script>
</body>
</html>