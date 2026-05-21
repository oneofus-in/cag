/* Page-specific scripts for הדגמים שלנו (Local Models) */
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

    /* FAQ — single-open accordion behavior */
    const faqItems = document.querySelectorAll('.lm-faq-item');
    faqItems.forEach(item => {
        item.addEventListener('toggle', () => {
            if (item.open) {
                faqItems.forEach(other => {
                    if (other !== item) other.open = false;
                });
            }
        });
    });

})();
