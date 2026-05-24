/* Page-specific scripts for כתבה בודדת (Blog post)
   - GSAP scroll animations
   - Share button helpers (whatsapp / facebook / linkedin / copy link)
*/
(function () {
    'use strict';

    // [data-anim] scroll reveals are handled globally in script.js (with a
    // refresh-proof fromTo). Do NOT re-animate them here: a second gsap.from()
    // reads each element's current opacity — already 0 from script.js's from-
    // state — as its END value, so it animates 0→0 and the content never shows.

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
