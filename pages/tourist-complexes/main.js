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

    /* GSAP scroll animations for [data-anim] elements on this page */
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
    }

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
