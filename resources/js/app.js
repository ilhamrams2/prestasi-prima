import 'remixicon/fonts/remixicon.css';
import '../css/app.css';
import './bootstrap';
import Alpine from 'alpinejs';
import { ensureAOS, ensureSwiper } from './lib/lazy-libs';

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