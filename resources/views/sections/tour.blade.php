@push('styles')
<style>
    .tour-hero {
        position: relative;
        min-height: calc(100vh - 120px);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: #ffffff;
        color: #fff6e5;
    }

    .tour-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-color: #ffffff;
        transform: scale(1.08);
        filter: brightness(0.45) saturate(1.1);
        z-index: 0;
    }

    .tour-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background-color: #ffffff;
        z-index: 1;
    }

    .tour-overlay {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 1.5rem;
    }

    .tour-loader {
        position: relative;
        width: min(260px, 60vw);
        height: min(260px, 60vw);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tour-ring {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 4px solid rgba(255, 145, 0, 0.18);
        border-top-color: #ff7b00;
        border-bottom-color: #ff9900;
        animation: tour-spin 2.4s linear infinite;
        box-shadow: 0 0 45px rgba(255, 140, 0, 0.25);
    }

    .tour-ring.secondary {
        inset: 16px;
        border-width: 3px;
        border-top-color: rgba(255, 231, 199, 0.85);
        border-bottom-color: rgba(255, 131, 0, 0.65);
        animation-duration: 1.6s;
        animation-direction: reverse;
        opacity: 0.85;
    }

    .tour-logo {
        position: relative;
        width: min(120px, 32vw);
        height: min(120px, 32vw);
        object-fit: contain;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.45));
    }

    .tour-title {
        text-transform: uppercase;
        letter-spacing: 0.16em;
        font-size: clamp(1.25rem, 2vw, 1.6rem);
        color: #ffdfb8;
    }

    .tour-subtitle {
        font-size: clamp(0.75rem, 1.6vw, 0.95rem);
        color: rgba(255, 214, 176, 0.75);
        text-transform: uppercase;
        letter-spacing: 0.1em;
        max-width: 480px;
    }

    .tour-button {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.85rem 2.4rem;
        border-radius: 999px;
        background: linear-gradient(135deg, #ff7f0a 0%, #ffb347 100%);
        color: #0b0500;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        text-decoration: none;
        box-shadow: 0 20px 35px rgba(255, 143, 26, 0.28);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .tour-button:hover {
        transform: translateY(-4px);
        box-shadow: 0 26px 40px rgba(255, 143, 26, 0.38);
    }

    .tour-button i {
        font-size: 1.25rem;
    }

    @keyframes tour-spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @media (max-width: 768px) {
        .tour-hero {
            min-height: calc(100vh - 80px);
        }
        .tour-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

<section class="tour-hero">
    <div class="tour-overlay">
        <div class="tour-loader">
            <span class="tour-ring"></span>
            <span class="tour-ring secondary"></span>
            <img src="{{ asset('assets/images/logo-smk.png') }}" alt="SMK Prestasi Prima" class="tour-logo">
        </div>
        <div>
            <div class="tour-title">Mulaikan Virtual Tour SMK Prestasi Prima</div>
            <div class="tour-subtitle">Rasakan pengalaman imersif menjelajahi SMK Prestasi Prima secara 360°</div>
        </div>
        <a href="{{ route('virtual-tour') }}" class="tour-button">
            <i class="ri-play-circle-line"></i>
            Mulai Virtual Tour
        </a>
    </div>
</section>