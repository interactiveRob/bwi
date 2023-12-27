import 'objectFitPolyfill';

import SmoothScroll from 'smooth-scroll/dist/smooth-scroll.polyfills.js';
import LazySrc from '@/modules/LazySrc';

document.addEventListener('DOMContentLoaded', function () {
    const smoothScroll = new SmoothScroll('a[href*="#"]', {
        speed: 800,
    });

    LazySrc.init({
        selector: `[data-lazy-src]`,
    });
});

window.addEventListener('load', () => {});
