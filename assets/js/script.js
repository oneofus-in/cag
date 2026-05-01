/* A.G Caravans — interactions + GSAP animations */
(function () {
    'use strict';

    /* ---------- Hero video — lazy-load after page ready, then ping-pong ---------- */
    const heroVideo = document.querySelector('.hero-video');
    if (heroVideo) {
        let reversing = false;
        let lastSeekTs = 0;
        const SEEK_INTERVAL = 50;   // ms between seeks — safe for browser seek queue
        const SEEK_STEP     = 0.12; // seconds jumped back per seek → ~2.4× reverse speed

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

        // Load the video only after the page finishes loading critical assets,
        // so the 12 MB file never competes with fonts/CSS/images on first paint.
        // The poster image (hero-compound.jpg) is shown instantly in the meantime.
        const startVideo = () => {
            if (heroVideo.dataset.src && !heroVideo.src) {
                heroVideo.src = heroVideo.dataset.src;
                heroVideo.load();
                heroVideo.play().catch(() => {});
            }
        };
        if (document.readyState === 'complete') {
            startVideo();
        } else {
            window.addEventListener('load', startVideo, { once: true });
        }
    }

    /* ---------- Mobile drawer ---------- */
    const hamburger = document.getElementById('hamburger');
    const drawer = document.getElementById('drawer');
    const drawerClose = document.getElementById('drawerClose');

    const closeDrawer = () => drawer && drawer.classList.remove('open');
    const openDrawer = () => drawer && drawer.classList.add('open');

    if (hamburger) hamburger.addEventListener('click', openDrawer);
    if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
    if (drawer) drawer.querySelectorAll('a').forEach(a => a.addEventListener('click', closeDrawer));
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDrawer(); });

    /* ---------- Header scroll state ---------- */
    const header = document.getElementById('header');
    const onScroll = () => {
        if (!header) return;
        const heroEl = document.getElementById('hero');
        // header fills right when the hero pin scroll has finished
        // (hero offsetHeight - viewport height) is when hero bottom reaches viewport bottom
        const trigger = heroEl ? Math.max(50, heroEl.offsetHeight - window.innerHeight - 40) : 30;
        if (window.scrollY > trigger) header.classList.add('scrolled');
        else header.classList.remove('scrolled');
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    onScroll();

    /* ---------- Tabs (catalog) ---------- */
    const animateTabPane = (pane) => {
        if (!window.gsap) return;
        const cards = pane.querySelectorAll('.w-card');
        if (!cards.length) return;
        gsap.fromTo(cards,
            { opacity: 0, y: 20 },
            { opacity: 1, y: 0, duration: 0.5, ease: 'power2.out', stagger: 0.06, clearProps: 'all' }
        );
    };

    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.tab;
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            const pane = document.querySelector(`[data-pane="${target}"]`);
            if (pane) {
                pane.classList.add('active');
                animateTabPane(pane);
            }
        });
    });

    /* ---------- Smooth in-page scroll offset ---------- */
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const href = a.getAttribute('href');
            if (!href || href === '#') return;
            const t = document.querySelector(href);
            if (!t) return;
            e.preventDefault();
            const top = t.getBoundingClientRect().top + window.scrollY - 70;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });

    /* ---------- GSAP ---------- */
    if (window.gsap) {
        const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (window.ScrollTrigger) gsap.registerPlugin(ScrollTrigger);
        gsap.config({ nullTargetWarn: false });

        if (!reduce && window.ScrollTrigger) {

            /* ===== HERO PINNED FOLD =====
               Phase 1: image only, content + meta off-screen + veil transparent.
               Scroll: image gently zooms, veil fades in, content slides up,
                       meta strip fades up. All scrubbed.
            */
            const hero = document.getElementById('hero');
            const heroStage = hero?.querySelector('.hero-stage');
            const heroFrame = hero?.querySelector('.hero-frame');
            const heroImg = hero?.querySelector('.hero-img');
            const heroVeil = hero?.querySelector('.hero-veil');
            const heroScrim = hero?.querySelector('.hero-scrim');
            const heroEyebrow = hero?.querySelector('.hero-eyebrow');
            const heroH1Lines = hero?.querySelectorAll('.hero h1 span');
            const heroP = hero?.querySelector('.hero-text');
            const heroActions = hero?.querySelector('.hero-actions');
            const heroMeta = hero?.querySelector('.hero-meta');

            const isMobile = window.matchMedia('(max-width: 900px)').matches;
            if (hero && heroStage && heroFrame && !isMobile) {
                const tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: hero,
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 0.6,
                        pin: heroStage,
                        pinSpacing: false,
                        anticipatePin: 1,
                    },
                });

                // Phase 1 (0 → 0.55): content + veil fade out, image becomes fully visible
                // Phase 2 (0.55 → 1): frame expands to full bleed, image keeps breathing
                tl
                    // content fades out first
                    .to([heroEyebrow, heroP, heroActions], { opacity: 0, y: -28, ease: 'power2.in', duration: 0.25 }, 0)
                    .to(heroH1Lines, { opacity: 0, y: -28, ease: 'power3.in', duration: 0.3, stagger: 0.04 }, 0.02)
                    .to(heroMeta, { opacity: 0, ease: 'power2.in', duration: 0.3 }, 0)
                    // veil/scrim fade — clean image revealed
                    .to(heroVeil, { opacity: 0, ease: 'power2.in', duration: 0.45 }, 0.05)
                    .to(heroScrim, { opacity: 0, ease: 'power2.in', duration: 0.45 }, 0.05)
                    // small zoom on image throughout
                    .to(heroImg, { scale: 1.08, ease: 'none', duration: 1 }, 0)
                    // PHASE 2 — frame expands to fullbleed AFTER image is revealed
                    .to(heroFrame, {
                        top: 0, right: 0, bottom: 0, left: 0,
                        borderRadius: 0,
                        ease: 'power2.out',
                        duration: 0.4,
                    }, 0.55);
            }

            /* ===== Generic [data-anim] outside hero ===== */
            document.querySelectorAll('section:not(.hero) [data-anim]').forEach(el => {
                const type = el.dataset.anim;
                const delay = parseFloat(el.dataset.delay || 0);
                const base = { duration: 0.9, ease: 'power3.out', delay };
                let from = { opacity: 0, y: 36 };

                if (type === 'fade-right') from = { opacity: 0, x: 40 };
                else if (type === 'fade-left') from = { opacity: 0, x: -40 };
                else if (type === 'zoom-in') from = { opacity: 0, scale: 0.94, y: 20 };

                gsap.from(el, {
                    ...from, ...base,
                    scrollTrigger: { trigger: el, start: 'top 88%' },
                });
            });

            /* ===== Stagger inner items ===== */
            const stagger = (selector, child, opts = {}) => {
                document.querySelectorAll(selector).forEach(parent => {
                    const items = parent.querySelectorAll(child);
                    if (!items.length) return;
                    gsap.from(items, {
                        opacity: 0, y: 30,
                        duration: 0.7, ease: 'power3.out',
                        stagger: 0.08,
                        scrollTrigger: { trigger: parent, start: 'top 85%' },
                        ...opts,
                    });
                });
            };
            stagger('.bullets', 'li');
            // stagger('.contact-rows', '.contact-row');

            /* Catalog active pane: stagger its cards on first scroll-into-view */
            const activePane = document.querySelector('.tab-pane.active');
            if (activePane) {
                gsap.from(activePane.querySelectorAll('.w-card'), {
                    opacity: 0, y: 24,
                    duration: 0.55, ease: 'power3.out', stagger: 0.06,
                    scrollTrigger: { trigger: '.catalog-tabs', start: 'top 85%', once: true },
                    clearProps: 'all',
                });
            }

            /* ===== Authorities bg parallax ===== */
            const authBg = document.querySelector('.auth-bg img');
            if (authBg) {
                gsap.to(authBg, {
                    yPercent: 12,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: '.authorities',
                        start: 'top bottom',
                        end: 'bottom top',
                        scrub: true,
                    },
                });
            }

            /* ===== Social marquee — smooth speed control ===== */
            const marquee = document.querySelector('.social-marquee');
            const track = marquee?.querySelector('.marquee-track');
            if (marquee && track) {
                // Track width is duplicated content -> animate -50% to scroll one full set
                const tween = gsap.to(track, {
                    xPercent: -50,
                    ease: 'none',
                    duration: 60,
                    repeat: -1,
                });
                // Smooth slowdown on hover (no animation restart)
                marquee.addEventListener('mouseenter', () => {
                    gsap.to(tween, { timeScale: 0.18, duration: 0.8, ease: 'power2.out' });
                });
                marquee.addEventListener('mouseleave', () => {
                    gsap.to(tween, { timeScale: 1, duration: 0.8, ease: 'power2.out' });
                });
            }
        }
    }

    /* ---------- Articles tabs (blog / newsletters / press) ---------- */
    document.querySelectorAll('.art-tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.artTab;
            document.querySelectorAll('.art-tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.art-pane').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            const pane = document.querySelector(`[data-art-pane="${target}"]`);
            if (pane) {
                pane.classList.add('active');
                if (window.gsap) {
                    const cards = pane.querySelectorAll('.article-card, .nl-card, .press-card');
                    if (cards.length) gsap.fromTo(cards,
                        { opacity: 0, y: 18 },
                        { opacity: 1, y: 0, duration: 0.45, ease: 'power2.out', stagger: 0.06, clearProps: 'all' }
                    );
                }
            }
        });
    });

    /* ---------- Active nav link ---------- */
    const navLinks = document.querySelectorAll('.nav a[href^="#"]');
    if (navLinks.length) {
        const map = new Map();
        navLinks.forEach(l => {
            const id = l.getAttribute('href').slice(1);
            const sec = document.getElementById(id);
            if (sec) map.set(sec, l);
        });
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    navLinks.forEach(l => l.classList.remove('is-active'));
                    const link = map.get(e.target);
                    if (link) link.classList.add('is-active');
                }
            });
        }, { rootMargin: '-50% 0px -50% 0px' });
        map.forEach((_, sec) => obs.observe(sec));
    }
})();
