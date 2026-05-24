/* Page-specific scripts for בלוג ומאמרים (Blog archive)
   - GSAP scroll animations (matches other inner pages)
   - Category filter pills (toggles .is-hidden on cards)
   - "Load more" stub — reveals additional cards when wired up to a CMS
*/
(function () {
    'use strict';

    // [data-anim] scroll reveals are handled globally in script.js (with a
    // refresh-proof fromTo). Do NOT re-animate them here: a second gsap.from()
    // reads each element's current opacity — already 0 from script.js's from-
    // state — as its END value, so it animates 0→0 and the content never shows.

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
