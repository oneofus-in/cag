/* Page-specific scripts for פוד טראקים (Food Trucks) */
(function () {
    'use strict';

    /* [data-anim] scroll reveals are handled globally by script.js (refresh-proof fromTo). */

    // ── Gallery Carousel ────────────────────────────────────
    const carousel  = document.getElementById('ft-carousel');
    const track     = document.getElementById('ft-carousel-track');
    const dotsWrap  = document.getElementById('ft-car-dots');
    const prevBtn   = document.querySelector('.ft-car-arrow--prev');
    const nextBtn   = document.querySelector('.ft-car-arrow--next');
    const slides    = Array.from(document.querySelectorAll('.ft-carousel-slide'));

    if (!carousel || !track || slides.length === 0) return;

    const GAP       = 16;
    const total     = slides.length;
    let   current   = 0;
    let   perPage   = 3;

    function getPerPage() {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 640)  return 2;
        return 1;
    }

    function setSlideWidths() {
        perPage = getPerPage();
        const slideW = (carousel.offsetWidth - (perPage - 1) * GAP) / perPage;
        slides.forEach(s => { s.style.width = slideW + 'px'; });
    }

    function maxIdx() { return Math.max(0, total - perPage); }

    function stepWidth() {
        return slides[0] ? slides[0].offsetWidth + GAP : 0;
    }

    function goTo(idx) {
        current = Math.max(0, Math.min(idx, maxIdx()));
        track.style.transform = `translateX(-${(maxIdx() - current) * stepWidth()}px)`;
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
            dot.className = 'ft-car-dot' + (i === current ? ' active' : '');
            dot.setAttribute('aria-label', `תמונה ${i + 1}`);
            dot.addEventListener('click', () => goTo(i));
            dotsWrap.appendChild(dot);
        }
    }

    prevBtn?.addEventListener('click', () => goTo(current - 1));
    nextBtn?.addEventListener('click', () => goTo(current + 1));

    // Drag / touch swipe
    let dragStartX = null, dragDelta = 0, didDrag = false;

    function onPointerDown(e) {
        dragStartX = (e.touches ? e.touches[0] : e).clientX;
        dragDelta  = 0;
        didDrag    = false;
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
        if (dragDelta > 50) goTo(current + 1);
        else if (dragDelta < -50) goTo(current - 1);
        dragStartX = null;
        // suppress click if user dragged
        if (didDrag) {
            track.addEventListener('click', e => e.stopPropagation(), { capture: true, once: true });
        }
    }

    track.addEventListener('mousedown',  onPointerDown);
    track.addEventListener('mousemove',  onPointerMove);
    track.addEventListener('mouseup',    onPointerUp);
    track.addEventListener('mouseleave', onPointerUp);
    track.addEventListener('touchstart', onPointerDown, { passive: true });
    track.addEventListener('touchmove',  onPointerMove, { passive: true });
    track.addEventListener('touchend',   onPointerUp);

    // Init + resize
    function init() {
        setSlideWidths();
        goTo(0);
    }

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => { setSlideWidths(); goTo(Math.min(current, maxIdx())); }, 120);
    });

    init();

    // ── Lightbox ────────────────────────────────────────────
    const lightbox  = document.getElementById('ft-lightbox');
    const lbImg     = document.getElementById('ft-lb-img');
    const lbCounter = document.getElementById('ft-lb-counter');
    const lbPrev    = document.querySelector('.ft-lb-prev');
    const lbNext    = document.querySelector('.ft-lb-next');
    const lbClose   = document.querySelector('.ft-lb-close');
    const imgSrcs   = slides.map(s => s.querySelector('img').src);
    const imgAlts   = slides.map(s => s.querySelector('img').alt);
    let   lbCurrent = 0;

    function openLightbox(idx) {
        lbCurrent = idx;
        lbImg.src = imgSrcs[idx];
        lbImg.alt = imgAlts[idx];
        lbImg.style.opacity = '1';
        lbCounter.textContent = `${idx + 1} / ${total}`;
        lightbox.classList.add('open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    function lbGoTo(idx) {
        lbCurrent = (idx + total) % total;
        lbImg.style.opacity = '0';
        setTimeout(() => {
            lbImg.src = imgSrcs[lbCurrent];
            lbImg.alt = imgAlts[lbCurrent];
            lbCounter.textContent = `${lbCurrent + 1} / ${total}`;
            lbImg.style.opacity = '1';
        }, 180);
    }

    slides.forEach((slide, i) => {
        slide.addEventListener('click', () => openLightbox(i));
    });

    lbClose?.addEventListener('click', closeLightbox);
    lbPrev?.addEventListener('click',  () => lbGoTo(lbCurrent - 1));
    lbNext?.addEventListener('click',  () => lbGoTo(lbCurrent + 1));

    lightbox?.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });

    document.addEventListener('keydown', e => {
        if (!lightbox?.classList.contains('open')) return;
        if (e.key === 'Escape')      closeLightbox();
        if (e.key === 'ArrowLeft')   lbGoTo(lbCurrent + 1);
        if (e.key === 'ArrowRight')  lbGoTo(lbCurrent - 1);
    });

    // Touch swipe inside lightbox
    let lbTouchX = null;
    lightbox?.addEventListener('touchstart', e => { lbTouchX = e.touches[0].clientX; }, { passive: true });
    lightbox?.addEventListener('touchend', e => {
        if (lbTouchX === null) return;
        const dx = e.changedTouches[0].clientX - lbTouchX;
        if (dx > 50)       lbGoTo(lbCurrent - 1);
        else if (dx < -50) lbGoTo(lbCurrent + 1);
        lbTouchX = null;
    });

})();
