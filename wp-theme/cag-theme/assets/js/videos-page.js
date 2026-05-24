/* Page-specific scripts for סרטונים (Videos) */
(function () {
    'use strict';

    // [data-anim] scroll reveals are handled globally in script.js (with a
    // refresh-proof fromTo). Do NOT re-animate them here: a second gsap.from()
    // reads each element's current opacity — already 0 from script.js's from-
    // state — as its END value, so it animates 0→0 and the content never shows.

    // ── Lightbox video player ───────────────────────────────
    const lightbox = document.getElementById('vid-lightbox');
    const lbFrame  = document.getElementById('vid-lb-frame');
    const lbTitle  = document.getElementById('vid-lb-title');
    const lbClose  = lightbox?.querySelector('.vid-lb-close');

    function openLightbox(videoId, title) {
        if (!lightbox || !lbFrame || !videoId) return;
        const iframe = document.createElement('iframe');
        iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1&playsinline=1`;
        iframe.title = title || 'YouTube video';
        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
        iframe.allowFullscreen = true;
        lbFrame.innerHTML = '';
        lbFrame.appendChild(iframe);
        if (lbTitle) lbTitle.textContent = title || '';
        lightbox.classList.add('open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.classList.add('vid-lb-open');
        lbClose?.focus();
    }

    function closeLightbox() {
        if (!lightbox) return;
        lightbox.classList.remove('open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('vid-lb-open');
        if (lbFrame) lbFrame.innerHTML = '';
        if (lbTitle) lbTitle.textContent = '';
    }

    document.querySelectorAll('.vid-yt-player').forEach(player => {
        const activate = () => openLightbox(player.dataset.videoId, player.dataset.title || '');
        player.addEventListener('click', activate);
        player.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); activate(); }
        });
        player.setAttribute('role', 'button');
        player.setAttribute('tabindex', '0');
    });

    lbClose?.addEventListener('click', closeLightbox);
    lightbox?.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && lightbox?.classList.contains('open')) closeLightbox();
    });

    // ── Carousels — one per .vg-carousel-wrap ──────────────
    function initCarousel(wrap) {
        const carousel = wrap.querySelector('.vg-carousel');
        const track    = wrap.querySelector('.vg-carousel-track');
        const prevBtn  = wrap.querySelector('.vg-car-arrow--prev');
        const nextBtn  = wrap.querySelector('.vg-car-arrow--next');
        const dotsWrap = wrap.querySelector('.vg-car-dots');
        const slides   = Array.from(track.querySelectorAll('.vg-card'));

        if (!carousel || !track || slides.length === 0) return;

        const GAP   = 20;
        const total = slides.length;
        let current = 0;
        let perPage = 4;

        function getPerPage() {
            const w = window.innerWidth;
            if (w >= 1280) return 4;
            if (w >= 1024) return 3;
            if (w >= 640)  return 2;
            return 1;
        }

        function setSlideWidths() {
            perPage = getPerPage();
            const slideW = (carousel.offsetWidth - (perPage - 1) * GAP) / perPage;
            slides.forEach(s => { s.style.width = slideW + 'px'; });
        }

        function maxIdx() { return Math.max(0, total - perPage); }
        function stepWidth() { return slides[0] ? slides[0].offsetWidth + GAP : 0; }

        function goTo(idx) {
            current = Math.max(0, Math.min(idx, maxIdx()));
            // RTL: first card sits at the right; advancing moves the track right
            // to reveal cards that flow off to the left.
            track.style.transform = `translateX(${current * stepWidth()}px)`;
            if (prevBtn) prevBtn.disabled = current === 0;
            if (nextBtn) nextBtn.disabled = current >= maxIdx();
            renderDots();
        }

        function renderDots() {
            if (!dotsWrap) return;
            const pages = maxIdx() + 1;
            dotsWrap.innerHTML = '';
            for (let i = 0; i < pages; i++) {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'vg-car-dot' + (i === current ? ' active' : '');
                dot.setAttribute('aria-label', `עמוד ${i + 1}`);
                dot.addEventListener('click', () => goTo(i));
                dotsWrap.appendChild(dot);
            }
        }

        prevBtn?.addEventListener('click', () => goTo(current - 1));
        nextBtn?.addEventListener('click', () => goTo(current + 1));

        // Drag / touch swipe
        let dragStartX = null, dragDelta = 0, didDrag = false;

        function onPointerDown(e) {
            if (e.target.tagName === 'IFRAME') return;
            dragStartX = (e.touches ? e.touches[0] : e).clientX;
            dragDelta = 0; didDrag = false;
            track.classList.add('is-dragging');
        }
        function onPointerMove(e) {
            if (dragStartX === null) return;
            dragDelta = (e.touches ? e.touches[0] : e).clientX - dragStartX;
            if (Math.abs(dragDelta) > 6) didDrag = true;
        }
        function onPointerUp() {
            if (dragStartX === null) return;
            track.classList.remove('is-dragging');
            // RTL: drag right → next, drag left → previous (mirror of LTR).
            if (dragDelta > 50) goTo(current + 1);
            else if (dragDelta < -50) goTo(current - 1);
            dragStartX = null;
            if (didDrag) track.addEventListener('click', e => e.stopPropagation(), { capture: true, once: true });
        }

        track.addEventListener('mousedown',  onPointerDown);
        track.addEventListener('mousemove',  onPointerMove);
        track.addEventListener('mouseup',    onPointerUp);
        track.addEventListener('mouseleave', onPointerUp);
        track.addEventListener('touchstart', onPointerDown, { passive: true });
        track.addEventListener('touchmove',  onPointerMove, { passive: true });
        track.addEventListener('touchend',   onPointerUp);

        setSlideWidths();
        goTo(0);

        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => { setSlideWidths(); goTo(Math.min(current, maxIdx())); }, 120);
        });
    }

    document.querySelectorAll('.vg-carousel-wrap').forEach(initCarousel);

})();
