/* A.G Caravans — FAQ accordion component
   Fetches faq.html into <div id="site-faq">, then wires GSAP scroll animations.
*/
(function () {
    'use strict';

    const base = (document.currentScript || {}).src.replace(/\/[^/]+$/, '/');

    async function init() {
        const host = document.getElementById('site-faq');
        if (!host) return;

        try {
            const res = await fetch(base + 'faq.html');
            if (!res.ok) throw new Error(res.status);
            host.innerHTML = await res.text();
        } catch (e) {
            console.warn('[faq.js] Could not load faq.html', e);
            return;
        }

        wireAnimations(host);
    }

    function wireAnimations(host) {
        if (!window.gsap || !window.ScrollTrigger) return;
        host.querySelectorAll('[data-anim]').forEach(el => {
            if (el._faqAnimDone) return;
            el._faqAnimDone = true;
            gsap.from(el, {
                opacity: 0, y: 36,
                duration: 0.9,
                ease: 'power3.out',
                scrollTrigger: { trigger: el, start: 'top 88%' },
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
