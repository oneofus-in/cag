/* Page-specific scripts for יצירת קשר (Contact Us) */
(function () {
    'use strict';

    /* [data-anim] scroll reveals are handled globally in script.js (with a
       refresh-proof fromTo). Do NOT re-animate them here: a second gsap.from()
       reads each element's current opacity — already 0 from script.js's from-
       state — as its END value, so it animates 0→0 and the content never shows. */

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
