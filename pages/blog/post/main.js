/* Page-specific scripts for כתבה בודדת (Blog post)
   - GSAP scroll animations
   - Share button helpers (whatsapp / facebook / linkedin / copy link)
*/
(function () {
    'use strict';

    // ── GSAP scroll animations ──────────────────────────────
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

    // ── Share buttons ──────────────────────────────────────
    const shareBtns = document.querySelectorAll('.post-share-btn');
    if (!shareBtns.length) return;

    const url   = encodeURIComponent(location.href);
    const title = encodeURIComponent(document.title);

    shareBtns.forEach(btn => {
        const icon = btn.querySelector('i');
        if (!icon) return;
        const cls = icon.className;

        btn.addEventListener('click', e => {
            e.preventDefault();

            if (cls.includes('facebook')) {
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'noopener');
            } else if (cls.includes('whatsapp')) {
                window.open(`https://wa.me/?text=${title}%20${url}`, '_blank', 'noopener');
            } else if (cls.includes('linkedin')) {
                window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`, '_blank', 'noopener');
            } else if (cls.includes('fa-link')) {
                navigator.clipboard?.writeText(location.href).then(() => {
                    const original = btn.innerHTML;
                    btn.innerHTML = '<i class="fa-solid fa-check"></i>';
                    setTimeout(() => { btn.innerHTML = original; }, 1500);
                });
            }
        });
    });
})();
