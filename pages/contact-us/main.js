/* Page-specific scripts for יצירת קשר (Contact Us) */
(function () {
    'use strict';

    /* ── GSAP scroll animations for [data-anim] elements on this page ── */
    if (window.gsap && window.ScrollTrigger) {
        gsap.registerPlugin(ScrollTrigger);

        document.querySelectorAll('[data-anim]').forEach(el => {
            const type  = el.dataset.anim;
            const delay = parseFloat(el.dataset.delay || 0);
            let from = { opacity: 0, y: 36 };
            if (type === 'fade-right')      from = { opacity: 0, x: 40 };
            else if (type === 'fade-left')  from = { opacity: 0, x: -40 };
            else if (type === 'zoom-in')    from = { opacity: 0, scale: 0.94, y: 20 };

            gsap.from(el, {
                ...from,
                duration: 0.9,
                ease: 'power3.out',
                delay,
                scrollTrigger: { trigger: el, start: 'top 88%' },
            });
        });
    }

    /* ── Contact form submit handler (placeholder — wire to backend later) ── */
    const form = document.querySelector('.contact-us .contact-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // TODO: replace with real submission (fetch to backend / form service)
            form.classList.add('is-sent');

            // Scroll the success message into view
            const success = form.querySelector('.form-success');
            if (success) {
                success.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    }
})();
