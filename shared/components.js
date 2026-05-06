/* A.G Caravans — shared components loader */
(function () {
    'use strict';

    /* Capture script URL synchronously before any async work */
    const sharedBase = (document.currentScript || {}).src
        .replace(/\/[^/]+$/, '/');

    async function injectPartial(id, file) {
        const el = document.getElementById(id);
        if (!el) return;
        try {
            const res = await fetch(sharedBase + file);
            if (!res.ok) throw new Error(res.status);
            el.innerHTML = await res.text();
        } catch (e) {
            console.warn('[components.js] Could not load', file, e);
        }
    }

    Promise.all([
        injectPartial('site-header', 'header.html'),
        injectPartial('site-footer', 'footer.html'),
    ]).then(initShared);

    function initShared() {

        /* ── Nav links: convert /#section → #section when target exists on this page ── */
        document.querySelectorAll('.nav a, .drawer-nav a').forEach(a => {
            const href = a.getAttribute('href');
            if (href && href.startsWith('/#')) {
                const localId = href.slice(1); // e.g. "#about"
                if (document.querySelector(localId)) {
                    a.setAttribute('href', localId);
                }
            }
        });

        /* ── Mobile drawer ── */
        const hamburger  = document.getElementById('hamburger');
        const drawer     = document.getElementById('drawer');
        const drawerClose = document.getElementById('drawerClose');

        const closeDrawer = () => drawer && drawer.classList.remove('open');
        const openDrawer  = () => drawer && drawer.classList.add('open');

        if (hamburger)  hamburger.addEventListener('click', openDrawer);
        if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
        if (drawer)     drawer.querySelectorAll('a').forEach(a => a.addEventListener('click', closeDrawer));
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDrawer(); });

        /* ── Drawer accordion ── */
        if (drawer) {
            drawer.querySelectorAll('.drawer-toggle').forEach(btn => {
                btn.addEventListener('click', () => btn.closest('.drawer-item').classList.toggle('open'));
            });
        }

        /* ── Header scroll state ── */
        const header = document.getElementById('header');
        const hasHero = !!document.getElementById('hero');

        if (!hasHero && header) {
            /* Inner pages: header is always solid */
            header.classList.add('scrolled');
        } else {
            const onScroll = () => {
                if (!header) return;
                const heroEl = document.getElementById('hero');
                const trigger = heroEl
                    ? Math.max(50, heroEl.offsetHeight - window.innerHeight - 40)
                    : 80;
                header.classList.toggle('scrolled', window.scrollY > trigger);
            };
            window.addEventListener('scroll', onScroll, { passive: true });
            window.addEventListener('resize', onScroll, { passive: true });
            onScroll();
        }

        /* ── Active nav link (section highlight on scroll) ── */
        const navLinks = document.querySelectorAll('.nav a[href^="#"]');
        if (navLinks.length) {
            const map = new Map();
            navLinks.forEach(link => {
                const id = link.getAttribute('href').slice(1);
                const sec = document.getElementById(id);
                if (sec) map.set(sec, link);
            });
            if (map.size) {
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
        }

        /* ── Smooth in-page scroll with header offset ── */
        document.addEventListener('click', e => {
            const a = e.target.closest('a[href^="#"]');
            if (!a) return;
            const href = a.getAttribute('href');
            if (!href || href === '#') return;
            const target = document.querySelector(href);
            if (!target) return;
            e.preventDefault();
            const top = target.getBoundingClientRect().top + window.scrollY - 80;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    }
})();
