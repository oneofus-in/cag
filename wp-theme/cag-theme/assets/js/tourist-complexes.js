/* Page-specific scripts for מתחמי תיירות (Tourist Complexes) */
(function () {
    'use strict';

    /* Hero video — move data-src → src so the browser loads it */
    const heroVideo = document.querySelector('.hero-video[data-src]');
    if (heroVideo) {
        heroVideo.src = heroVideo.dataset.src;
        heroVideo.load();
        heroVideo.play().catch(() => {});
    }

    /* [data-anim] scroll reveals are handled globally by script.js (refresh-proof fromTo). */

    /* ── Projects slider ── */
    const track   = document.getElementById('tcTrack');
    const prevBtn = document.getElementById('tcPrev');
    const nextBtn = document.getElementById('tcNext');
    const dotsWrap = document.getElementById('tcDots');

    if (track && prevBtn && nextBtn && dotsWrap) {
        const slides = track.querySelectorAll('.tc-project-slide');
        const total  = slides.length;
        let current  = 0;
        let timer    = null;

        /* Build dot indicators */
        slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.className = 'tc-slider-dot' + (i === 0 ? ' is-active' : '');
            dot.setAttribute('aria-label', 'שקופית ' + (i + 1));
            dot.addEventListener('click', () => goTo(i));
            dotsWrap.appendChild(dot);
        });

        function updateDots() {
            dotsWrap.querySelectorAll('.tc-slider-dot').forEach((d, i) => {
                d.classList.toggle('is-active', i === current);
            });
        }

        function goTo(index) {
            current = (index + total) % total;
            /* RTL track: positive translateX shifts the strip rightward, bringing the
               next (left-positioned) slide into view — matches the left-pointing "next" arrow. */
            track.style.transform = 'translateX(' + (current * 100) + '%)';
            updateDots();
        }

        prevBtn.addEventListener('click', () => goTo(current - 1));
        nextBtn.addEventListener('click', () => goTo(current + 1));

        /* Auto-advance every 5 seconds */
        function startAuto() {
            timer = setInterval(() => goTo(current + 1), 5000);
        }

        function stopAuto() {
            clearInterval(timer);
        }

        const sliderWrap = document.querySelector('.tc-slider-wrap');
        if (sliderWrap) {
            sliderWrap.addEventListener('mouseenter', stopAuto);
            sliderWrap.addEventListener('mouseleave', startAuto);
        }

        startAuto();
    }

})();
