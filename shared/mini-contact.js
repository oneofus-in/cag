/* A.G Caravans — mini-contact component
   Fetches mini-contact.html into <div id="mini-contact">, then wires the form.
   Include after GSAP + components.js so scroll animations pick up the injected markup.
*/
(function () {
    'use strict';

    const base = (document.currentScript || {}).src.replace(/\/[^/]+$/, '/');

    async function init() {
        const host = document.getElementById('mini-contact');
        if (!host) return;

        try {
            const res = await fetch(base + 'mini-contact.html');
            if (!res.ok) throw new Error(res.status);
            host.innerHTML = await res.text();
        } catch (e) {
            console.warn('[mini-contact.js] Could not load mini-contact.html', e);
            return;
        }

        wireForm(host);
        wireAnimations(host);
    }

    function wireForm(host) {
        const form = host.querySelector('.mini-contact-form');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const name  = form.querySelector('[name="name"]').value.trim();
            const phone = form.querySelector('[name="phone"]').value.trim();
            if (!name || !phone) return;

            form.classList.add('is-sent');

            let msg = host.querySelector('.mini-contact-success');
            if (!msg) {
                msg = document.createElement('p');
                msg.className = 'mini-contact-success';
                msg.textContent = 'תודה! נחזור אליך בהקדם.';
                form.insertAdjacentElement('afterend', msg);
            }
            msg.classList.add('is-visible');
        });
    }

    function wireAnimations(host) {
        if (!window.gsap || !window.ScrollTrigger) return;
        host.querySelectorAll('[data-anim]').forEach(el => {
            if (el._miniContactAnimDone) return;
            el._miniContactAnimDone = true;
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

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
