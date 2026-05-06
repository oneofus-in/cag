# cag.co.il — v2 Demo Website

**Client:** א.ג קראוונים (A.G Caravans)
**Language/direction:** Hebrew, RTL (`dir="rtl"`, `lang="he"`)
**Previous version:** `../v1/`

---

## Tech Stack

- Pure HTML/CSS/JS — no framework or build step
- **Fonts:** Rubik, Frank Ruhl Libre, Heebo (Google Fonts)
- **Icons:** Font Awesome 6.5.1 (CDN)
- **Animation:** GSAP 3.12.5 + ScrollTrigger (CDN)
- **No backend** — contact form is front-end only (shows success message on submit)

---

## File Structure

```
v2/
├── index.html
├── assets/
│   ├── css/styles.css
│   ├── js/script.js
│   └── img/
│       ├── logo.png / logo_white.png
│       ├── hero-compound.jpg
│       ├── model-shahaf.jpg / model-loft.jpg / model-school.jpg
│       ├── services-bath.jpg
│       ├── desert-caravan.jpg / towing.jpg
│       ├── caravan-front.jpg / caravan-side.jpg
│       ├── article1.jpg / article2.jpg / article3.jpg
│       └── social-1.png / social-2.png / social-3.png
└── uploads/
    ├── cag_texts.txt       ← original client content reference
    ├── logo.png / logo_white.png
    ├── cag_screenshot.pdf
    └── gov-il-screen.pdf
```

---

## Page Sections (top to bottom)

| Section ID | Description |
|---|---|
| `#header` | Fixed header, transparent over hero → white on scroll. Dual logo (white/dark). |
| `#hero` | GSAP scroll-pinned hero. Rounded frame expands to full-bleed as user scrolls. |
| `#models` | 4-card grid: שחף, לופט, בית ספר שדה, מבנה שירות |
| `#about` | 2-col: text + stacked media grid with badge |
| `#authorities` | Full-bleed bg image + authority icon cards (מבני ציבור, משרדים, כיתות, מבני שירות) |
| *(catalog)* | Tabbed catalog: ייצור מקומי כחול לבן / דגמים מייבוא (Weinsberg models) |
| `#articles` | 3-card blog strip (placeholder content) |
| `#videos` | Social marquee (GSAP infinite scroll, slows on hover) |
| `#contact` | Split: feature image card + lead form (name, email, phone, consent checkbox) |
| *(footer)* | 4-col footer: about, catalog links, hours, contact. Gradient background. |

---

## Design System

- **Primary palette:** `--blue-950` (#071c38) → `--blue-500` (#0068f5), accent `--accent` (#38bdf8)
- **Gradient:** `linear-gradient(305deg, #0c3058, #0068f5)` — used on header CTA, buttons, footer
- **Border radii:** sm 8px, base 14px, lg 22px, xl 30px
- **Fonts:** display headings → Frank Ruhl Libre; body/UI → Rubik/Heebo
- **Breakpoints:** 1200px, 1100px, 900px, 640px

---

## Business Info

- **Phone:** 050-550-0180
- **Email:** ag0505500180@gmail.com
- **Address:** יוחנן הסנדלר 8, אזור תעשייה כפר סבא
- **Hours:** א–ה 08:00–16:00 | שישי 08:00–12:00 | שבת סגור
- **WhatsApp:** https://wa.me/972505500180

---

## Known Issues / Open Items

1. **Missing topbar** — `styles.css` defines full `.topbar` styles; header CSS uses `top: 50px` expecting a topbar above it. No `<div class="topbar">` exists in the HTML. Decision needed: add the topbar or reset header `top` to `0`.

2. **Dead nav links** — Nav and mobile drawer link to `#blue-white` (כחול לבן) and `#security-sector` (מגזר בטחוני) but neither section exists in the HTML.

3. **Placeholder images** — `services-bath.jpg` is reused across 4+ sections. `caravan-front/side.jpg` alternate in the import tab. Real photos needed.

4. **Article content** — Article titles and images are placeholder. No real blog content yet.

5. **Social links** — All platform links (`href="#"`) are empty. Real URLs needed.

---

## GSAP Hero Animation Logic

- Hero `height: 220vh` — stage is pinned while user scrolls through the extra 120vh
- **Phase 1 (0→0.55):** content, veil, scrim fade out → clean image revealed
- **Phase 2 (0.55→1):** frame corners expand to full-bleed (top/right/bottom/left → 0, borderRadius → 0)
- Subsequent sections use `[data-anim]` attributes: `fade-up`, `fade-right`, `fade-left`, `zoom-in`
