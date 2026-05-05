/* Page-specific scripts for security-trailers */
(function () {
    'use strict';

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

        /* Counting-up numbers */
        document.querySelectorAll('.stat-num').forEach(el => {
            const target = parseInt(el.dataset.target, 10);
            const obj = { val: 0 };
            gsap.to(obj, {
                val: target,
                duration: 2,
                ease: 'power2.out',
                scrollTrigger: { trigger: el, start: 'top 88%', once: true },
                onUpdate() { el.textContent = Math.round(obj.val); },
            });
        });
    }

})();
