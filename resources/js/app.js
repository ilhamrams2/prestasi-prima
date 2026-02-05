import '../css/app.css';
import './bootstrap';
import Alpine from 'alpinejs';
import { ensureAOS, ensureSwiper } from './lib/lazy-libs';

// === SELF-HOSTED ASSETS ===
// Fonts
import '@fontsource/outfit/400.css';
import '@fontsource/outfit/700.css';
import '@fontsource/outfit/900.css';
import '@fontsource/plus-jakarta-sans/400.css';
import '@fontsource/plus-jakarta-sans/500.css';
import '@fontsource/plus-jakarta-sans/700.css';
import '@fontsource/plus-jakarta-sans/800.css';
import '@fontsource/inter/400.css';
import '@fontsource/inter/600.css';
import '@fontsource/inter/700.css';

// Icons
import 'remixicon/fonts/remixicon.css';
import 'iconify-icon';
import { createIcons, icons } from 'lucide';
import Chart from 'chart.js/auto';
import '@fontsource/playfair-display/400.css';
import '@fontsource/playfair-display/400-italic.css';
import '@fontsource/playfair-display/700.css';
import '@fontsource/playfair-display/700-italic.css';

window.Chart = Chart;
window.lucide = { createIcons, icons };

// === GSAP (Locally Hosted) ===
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;
window.Alpine = Alpine;
window.ensureAOS = ensureAOS;
window.ensureSwiper = ensureSwiper;

window.initAOS = (options = {}) => {
	const config = { once: true, ...options };
	return ensureAOS().then((AOS) => {
		AOS.init(config);
		return AOS;
	});
};

Alpine.start();