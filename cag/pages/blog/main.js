/* Page-specific scripts for בלוג ומאמרים (Blog archive)
   - GSAP scroll animations (matches other inner pages)
   - Category filter pills (toggles .is-hidden on cards)
   - "Load more" stub — reveals additional cards when wired up to a CMS
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

    // ── Category filter ─────────────────────────────────────
    const pills = document.querySelectorAll('.blog-filter-pill');
    const cards = document.querySelectorAll('.blog-grid .article-card');
    const empty = document.querySelector('.blog-empty');

    pills.forEach(pill => {
        pill.addEventListener('click', () => {
            const filter = pill.dataset.filter;

            pills.forEach(p => p.classList.toggle('is-active', p === pill));

            let visible = 0;
            cards.forEach(card => {
                const matches = filter === 'all' || card.dataset.cat === filter;
                card.classList.toggle('is-hidden', !matches);
                if (matches) visible++;
            });

            if (empty) empty.hidden = visible !== 0;
        });
    });

    // ── Load more (placeholder behaviour) ───────────────────
    // No backend yet — for now we just disable the button after one click
    // so it reads as "all loaded". Hook into a CMS endpoint here later.
    const loadBtn = document.getElementById('blog-loadmore');
    loadBtn?.addEventListener('click', () => {
        loadBtn.disabled = true;
        loadBtn.innerHTML = 'הצגת כל הכתבות הזמינות <i class="fa-solid fa-check"></i>';
        loadBtn.classList.add('is-done');
    });
})();
