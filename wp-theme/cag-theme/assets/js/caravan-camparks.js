/* Page-specific scripts for חניוני קרוואנים (Caravan Camparks) */
(function () {
    'use strict';

    /* Hero video — move data-src → src so the browser loads it */
    const heroVideo = document.querySelector('.hero-video[data-src]');
    if (heroVideo) {
        heroVideo.src = heroVideo.dataset.src;
        heroVideo.load();
        heroVideo.play().catch(() => {});
    }

    /* [data-anim] scroll reveals are handled globally by script.js (refresh-proof fromTo). */
})();
