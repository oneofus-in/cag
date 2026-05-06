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

    /* GSAP scroll animations for [data-anim] elements on this page */
    if (window.gsap && window.ScrollTrigger) {
        gsap.registerPlugin(ScrollTrigger);

        document.querySelectorAll('[data-anim]').forEach(el => {
            const type  = el.dataset.anim;
            const delay = parseFloat(el.dataset.delay || 0);
            let from = { opacity: 0, y: 36 };
            if (type === 'fade-right') from = { opacity: 0, x: 40 };
            else if (type === 'fade-left') from = { opacity: 0, x: -40 };
            else if (type === 'zoom-in')  from = { opacity: 0, scale: 0.94, y: 20 };

            gsap.from(el, {
                ...from,
                duration: 0.9,
                ease: 'power3.out',
                delay,
                scrollTrigger: { trigger: el, start: 'top 88%' },
            });
        });
    }
})();
