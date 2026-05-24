/* Single Model (דגם) — gallery thumbnail swap + lightbox.
   Lightbox adapted from foodtrucks.js. The spec accordion uses native
   <details>/<summary>, so it needs no JS. [data-anim] reveals are handled
   globally by script.js. */
(function () {
    'use strict';

    const mainBtn = document.getElementById('sm-gallery-main-btn');
    const mainImg = document.getElementById('sm-gallery-main-img');
    const thumbs  = Array.from(document.querySelectorAll('#sm-gallery-thumbs .sm-thumb'));

    if (!mainImg) return;

    // Build the image list from the thumbnails when present; otherwise the
    // single main image is the whole "gallery".
    const imgSrcs = thumbs.length
        ? thumbs.map(t => t.dataset.full)
        : [mainImg.getAttribute('src')];
    const imgAlts = thumbs.length
        ? thumbs.map(t => t.dataset.alt || '')
        : [mainImg.getAttribute('alt') || ''];
    const total = imgSrcs.length;

    let current = 0;

    // ── Thumbnail → main image swap ─────────────────────────
    function selectIndex(idx) {
        current = (idx + total) % total;
        mainImg.src = imgSrcs[current];
        mainImg.alt = imgAlts[current];
        thumbs.forEach((t, i) => t.classList.toggle('is-active', i === current));
        if (mainBtn) mainBtn.dataset.index = String(current);
    }

    thumbs.forEach((thumb, i) => {
        thumb.addEventListener('click', () => selectIndex(i));
    });

    // ── Lightbox ────────────────────────────────────────────
    const lightbox  = document.getElementById('sm-lightbox');
    const lbImg     = document.getElementById('sm-lb-img');
    const lbCounter = document.getElementById('sm-lb-counter');
    const lbPrev    = document.querySelector('.sm-lb-prev');
    const lbNext    = document.querySelector('.sm-lb-next');
    const lbClose   = document.querySelector('.sm-lb-close');

    if (!lightbox || !lbImg) return;

    let lbCurrent = 0;

    function openLightbox(idx) {
        lbCurrent = (idx + total) % total;
        lbImg.src = imgSrcs[lbCurrent];
        lbImg.alt = imgAlts[lbCurrent];
        lbImg.style.opacity = '1';
        if (lbCounter) lbCounter.textContent = `${lbCurrent + 1} / ${total}`;
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
            if (lbCounter) lbCounter.textContent = `${lbCurrent + 1} / ${total}`;
            lbImg.style.opacity = '1';
        }, 180);
    }

    if (mainBtn) {
        mainBtn.addEventListener('click', () => openLightbox(current));
    }

    lbClose?.addEventListener('click', closeLightbox);
    lbPrev?.addEventListener('click',  () => lbGoTo(lbCurrent - 1));
    lbNext?.addEventListener('click',  () => lbGoTo(lbCurrent + 1));

    lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });

    document.addEventListener('keydown', e => {
        if (!lightbox.classList.contains('open')) return;
        if (e.key === 'Escape')     closeLightbox();
        // RTL: ArrowLeft advances, ArrowRight goes back.
        if (e.key === 'ArrowLeft')  lbGoTo(lbCurrent + 1);
        if (e.key === 'ArrowRight') lbGoTo(lbCurrent - 1);
    });

    // Touch swipe inside the lightbox.
    let lbTouchX = null;
    lightbox.addEventListener('touchstart', e => { lbTouchX = e.touches[0].clientX; }, { passive: true });
    lightbox.addEventListener('touchend', e => {
        if (lbTouchX === null) return;
        const dx = e.changedTouches[0].clientX - lbTouchX;
        if (dx > 50)       lbGoTo(lbCurrent - 1);
        else if (dx < -50) lbGoTo(lbCurrent + 1);
        lbTouchX = null;
    });

})();
