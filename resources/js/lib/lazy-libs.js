let aosPromise;
let swiperPromise;

/**
 * Lazily loads AOS (Animate On Scroll) from the Vite bundle the first time it is requested.
 * Returns a promise that resolves with the AOS instance once both JS and CSS are ready.
 */
export const ensureAOS = () => {
  if (window.AOS) {
    return Promise.resolve(window.AOS);
  }

  if (!aosPromise) {
    aosPromise = Promise.all([
      import('aos/dist/aos.css'),
      import('aos')
    ]).then(([_, module]) => {
      const AOS = module.default;
      window.AOS = AOS;
      return AOS;
    }).catch((error) => {
      aosPromise = undefined;
      throw error;
    });
  }

  return aosPromise;
};

/**
 * Lazily loads Swiper from the Vite bundle and exposes it globally the first time it is requested.
 * Resolves with the Swiper constructor once the JS and CSS chunks finish loading.
 */
export const ensureSwiper = () => {
  if (window.Swiper) {
    return Promise.resolve(window.Swiper);
  }

  if (!swiperPromise) {
    swiperPromise = Promise.all([
      import('swiper/swiper-bundle.css'),
      import('swiper/bundle')
    ]).then(([_, module]) => {
      const Swiper = module.default;
      window.Swiper = Swiper;
      return Swiper;
    }).catch((error) => {
      swiperPromise = undefined;
      throw error;
    });
  }

  return swiperPromise;
};
