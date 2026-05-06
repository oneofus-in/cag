/* A.G Caravans — inner-page hero behaviour.
   Lazy-loads the hero video, then runs an entrance animation
   (frame opens + content fades in) on page load.
   No scroll-pin — hero is a fixed 72vh banner on inner pages.
*/
(function () {
    'use strict';

    /* ---------- Hero video — lazy-load after page ready, then ping-pong ---------- */
    const heroVideo = document.querySelector('.hero-video');
    if (heroVideo) {
        let reversing = false;
        let lastSeekTs = 0;
        const SEEK_INTERVAL = 50;
        const SEEK_STEP     = 0.12;

        function pingPongTick(ts) {
            if (!reversing) return;
            if (ts - lastSeekTs >= SEEK_INTERVAL) {
                lastSeekTs = ts;
                const next = heroVideo.currentTime - SEEK_STEP;
                if (next <= 0) {
                    reversing = false;
                    heroVideo.currentTime = 0;
                    heroVideo.play();
                    return;
                }
                heroVideo.currentTime = next;
            }
            requestAnimationFrame(pingPongTick);
        }

        heroVideo.addEventListener('ended', () => {
            reversing = true;
            lastSeekTs = 0;
            requestAnimationFrame(pingPongTick);
        });

        const startVideo = () => {
            if (heroVideo.dataset.src && !heroVideo.src) {
                heroVideo.src = heroVideo.dataset.src;
                heroVideo.load();
                heroVideo.play().catch(() => {});
            }
        };
        if (document.readyState === 'complete') startVideo();
        else window.addEventListener('load', startVideo, { once: true });
    }

    /* ---------- Entrance animation ---------- */
    if (!window.gsap) return;
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) return;
    gsap.config({ nullTargetWarn: false });

    const hero = document.getElementById('hero');
    if (!hero) return;

    const heroFrame       = hero.querySelector('.hero-frame');
    const heroBreadcrumbs = hero.querySelector('.hero-breadcrumbs');
    const heroH1Lines     = hero.querySelectorAll('.hero h1 span');
    const heroP           = hero.querySelector('.hero-text');
    const heroActions     = hero.querySelector('.hero-actions');

    /* Set initial states */
    gsap.set(heroFrame,             { borderRadius: 48, scale: 0.97, opacity: 0 });
    gsap.set(heroBreadcrumbs,       { autoAlpha: 0, y: 14 });
    gsap.set(heroH1Lines,           { autoAlpha: 0, y: 22 });
    gsap.set([heroP, heroActions],  { autoAlpha: 0, y: 14 });

    /* Entrance timeline */
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' }, delay: 0.1 });
    tl
        .to(heroFrame,            { borderRadius: 32, scale: 1, opacity: 1, duration: 0.7 })
        .to(heroBreadcrumbs,      { autoAlpha: 1, y: 0, duration: 0.5 },           '-=0.4')
        .to(heroH1Lines,          { autoAlpha: 1, y: 0, duration: 0.6, stagger: 0.08 }, '-=0.35')
        .to([heroP, heroActions], { autoAlpha: 1, y: 0, duration: 0.5 },           '-=0.35');
})();
