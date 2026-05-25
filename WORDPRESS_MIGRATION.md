# cag.co.il — Static-to-WordPress Migration Log

**Goal:** Convert the existing static HTML/CSS/JS site (vanilla + GSAP) into a fully functional WordPress site, preserving the design system, animations, and Hebrew/RTL behavior.

**Source:** `c:/Users/snoofkin/ProjectCag/cag/` (this repo, `oneofus-in/cag` on GitHub)
**Started:** 2026-05-20
**Owner:** Itamar

---

## Why WordPress?

*(To be filled in — capture the actual reasons: client needs CMS access? blog? form handling? SEO plugins? Decide here so later choices stay aligned.)*

- [ ] Reason 1:
- [ ] Reason 2:

---

## Current Status (read this first when resuming)

**Local site:** `http://cag-wp.local/` · Local WP at `C:\Users\snoofkin\Local Sites\cag-wp\app\public\` · Theme symlinked from `c:/Users/snoofkin/ProjectCag/cag/wp-theme/cag-theme/` · Active theme: "CAG".

**Done:**
- ✅ Theme scaffolding, design system, fonts, Font Awesome, GSAP+ScrollTrigger
- ✅ `header.php`, `footer.php` (with WhatsApp float button, pre-footer contact section, drawer)
- ✅ `front-page.php` (full homepage port — hero, models, about, foodtrack, authorities, security, catalog, articles, social marquee)
- ✅ `page-templates/about-us.php` (first inner page, pattern established)
- ✅ CSS consolidated: `style.css` (global, ~800 lines) + `assets/css/front-page.css` (homepage-only) + per-template files in `assets/css/`
- ✅ Auto-enqueue helper, template-part helpers, Template Name dropdown, body-class filter, favicon
- ✅ **Dynamic chrome:** header/footer editable via ACF options page + registered nav menus (see Progress Log)
- ✅ **Dynamic forms:** footer + mini-contact forms swapped to Contact Form 7 (Make webhook integration deferred — Itamar, later in project)
- ✅ **Dynamic template parts:** FAQ + mini-contact text from ACF options page; inner hero centralized into one part (Yoast breadcrumb + page title + page excerpt, badge removed) and wired into all 12 page templates
- ✅ **Dynamic page content — about-us:** per-page ACF (`inc/acf-about-us.php`, `au_rows` repeater, auto-zigzag layout, fallback to original rows). First per-page template — the pattern for the rest.
- ✅ **Model CPT** (`model` post type, `/listings/<slug>`): `single-model.php` fully built — gallery+lightbox, brand logo, price/quote box, editable spec accordion repeater (`m_spec_groups`, WYSIWYG content), YouTube embed, docs link, related models, mini-contact, FAQ. ACF fields in `acf-json/group_cag_models.json`. Mobile spec rows: column layout with centered text + `#0050cc` divider between label and value.

**Remaining inner pages to port** (0 of 13 left — all inner pages done. about-us + Batches 1–5. `blog` shipped as native WP posts, not a static port):

- [x] `accessories`        — ported (Tier 2, Batch 3)
- [x] `blog`               — ported as **native WP posts** (Batch 5): `home.php` (archive) + `single.php` (post)
- [x] `caravan-camparks`   — ported (Tier 1, Batch 2)
- [x] `caravans`           — ported (Tier 2, Batch 3)
- [x] `contact-us`         — ported (Batch 4)
- [x] `foodtrucks`         — ported (Tier 1, Batch 1)
- [x] `kachol-lavan`       — ported (Tier 1, Batch 1)
- [x] `local-models`       — ported (Tier 2, Batch 3)
- [x] `security-living`    — ported (Tier 1, Batch 1)
- [x] `security-trailers`  — ported (Tier 1, Batch 2)
- [x] `tourist-complexes`  — ported (Tier 1, Batch 2)
- [x] `videos`             — ported (Batch 4; template basename `videos-page` — see log)

All static pages are ported. **All 13 inner pages + the homepage are now ACF-dynamic. Per-page ACF phase: COMPLETE (2026-05-24).**

**Remaining — make page content editable (per-page ACF field groups).** ⚠️ **Workflow changed 2026-05-24 — field groups are now UI-managed via ACF Local JSON, not PHP.** Create/edit each page's group in the ACF admin UI; ACF auto-saves it to `wp-theme/cag-theme/acf-json/group_*.json` (version-controlled, deploys with the theme). Do **not** create new `inc/acf-{template}.php` files. Canonical JSON example = `acf-json/group_cag_kachol_lavan.json`. See the 2026-05-24 log entry for the rationale + the one-time Sync step.

- [x] `about-us`          — done (the pattern: per-template field group + repeater, auto-zigzag, fallback)
- [x] `kachol-lavan`      — done (2 repeaters: model cards + auto-zigzag split sections w/ nested FA-icon repeater; 2 hidden sections removed)
- [x] `foodtrucks`        — done (2026-05-24; ACF JSON `group_cag_foodtrucks.json`)
- [x] `security-living`   — done (gallery repeater + carousel; use-case cards repeater; intro split + bullets repeater + CTA; ACF JSON `group_cag_security_living.json`)
- [x] `security-trailers` — done (same structure as security-living; gallery repeater + carousel; use-case cards repeater; intro split + bullets repeater + CTA; ACF JSON `group_cag_security_trailers.json`)
- [x] `caravan-camparks`  — done (2-tab JSON: intro section with badge+stamp+split heading+wysiwyg; `cc_campsites` repeater with radio media_type, map_query/image conditional, wysiwyg body, nested meta repeater, CTA link; auto-zigzag by index; closing stays hardcoded)
- [x] `tourist-complexes` — done (5 sections: intro, projects slider, solutions, models w/ nested specs, why-us checklist; new `cag_field()` helper)
- [x] `accessories`       — done (2026-05-24; ACF JSON `group_cag_accessories.json` — relationship field pulling from `model` CPT)
- [x] `caravans`           — done (2026-05-24; ACF JSON `group_cag_caravans.json`)
- [x] `local-models`      — done (2026-05-24; ACF JSON `group_cag_local_models.json` — 3-tab JSON: models page-repeater, features repeater, Custom Made specs repeater + all headings/CTAs editable)
- [x] `contact-us`        — done (no new ACF group; all values wired from הגדרות אתר options via `cag_opt()`: phone, WhatsApp, email, address, hours repeater, map embed URL built from address)
- [x] `videos-page`       — done (3-tab JSON: each tab has heading+highlight+intro+videos repeater; thumbnail URL auto-built from video_id; real IDs still placeholder — Itamar must enter them)
- [x] `front-page.php`    — done (homepage: models, about, foodtrack, authorities, security, catalog tabs, articles tabs, social marquee)

One page at a time, with verification between (Itamar's cadence). Ask which page is next.

**Also outstanding (not the per-page ACF phase):**

- ✅ **RESOLVED — Model CPT built + model card migration done (2026-05-24).** The `model` CPT is live at `/listings/<slug>`. Single template `single-model.php` complete. All pages that hardcoded model cards (`caravans.php`, `local-models.php`, front-page repeaters, kachol-lavan `kl_models`, tourist-complexes `tc_models`) now query the CPT. `.cv-model-card` markup reused across all.
- Make webhook for the CF7 forms — deferred (Itamar, later in project).
- Real content: video IDs ✅ done · photos ✅ done · social links ✅ done · blog/article content ✅ done (2026-05-25).
- ⬜ **Visual QA — manual review of every page after ACF content is entered.** Required stage: once all pages are dynamic and content is populated, walk every page by eye and click every button and link to catch broken/missing ones. Checklist per page:
  1. Open the page on `cag-wp.local` and scroll top to bottom — spot any empty sections, broken images, or layout regressions.
  2. Click every CTA button and internal link — confirm it lands on the right page (not a 404, not `#` stub, not a dead anchor like the caravans `#contact`).
  3. Click every external link — confirm it opens the correct target in a new tab.
  4. Check every form — submit a test entry and confirm CF7 sends the email.
  5. On mobile width (~390px) — repeat the scroll + click pass.
  Applies to: homepage · all 13 inner pages · `single-model.php` · blog archive + a sample post.
  **This stage was added 2026-05-25 — Itamar does the visual pass himself after the per-page ACF phase is complete.**

- ⬜ **SEO — match WP page slugs to the OLD live site's URLs (don't lose rankings).** The WP pages were created with Hebrew titles, so WordPress auto-generated **URL-encoded Hebrew slugs** that almost certainly **don't match** the URLs Google has indexed for cag.co.il. Before/at launch:
  1. **Pull the real indexed URLs** of the current live site — Google Search Console (Pages/Coverage), the live `sitemap.xml`, or a `site:cag.co.il` search. Don't trust the prototype's `/cag/pages/{slug}/` dev paths; confirm the actual production structure (flat `/foodtrucks/` vs `/pages/foodtrucks/` vs Hebrew slugs).
  2. **Set each WP page slug to match** its old URL exactly (wp-admin → Pages → Edit → Permalink). The template stays attached regardless of slug (Template Name approach), so changing slugs is safe.
  3. **301-redirect anything that can't match 1:1** — old `/pages/{slug}/` → new `/{slug}/`, the blog post URLs (now native WP posts), and the model pages (CPT base is `/listings/<slug>` — check whether the old site used a different path for individual models). Use a redirects plugin (e.g. Redirection) or `.htaccess`.
  4. **Re-submit the new sitemap** in Search Console after go-live and watch Coverage for 404s.

  Slug checklist (one per ported page — confirm each against the live URL): `accessories` · `blog` · `caravan-camparks` · `caravans` · `contact-us` · `foodtrucks` · `kachol-lavan` · `local-models` · `security-living` · `security-trailers` · `tourist-complexes` · `videos` · `about-us`. ⚠️ Itamar to confirm the old site's exact URL structure first, then set slugs + redirects.
- End-state skill (write at the very end — see bottom of this doc).

---

## Visual QA — Issues Found

> Logged during the visual QA pass. Each item: page · location · what's wrong. Check off when fixed.

- [ ] **Homepage / Hero / Mobile** — CTA button in the hero section is not visible enough on mobile. Needs higher contrast or more prominent styling.

---

## Per-Page Porting Recipe (do this for each page)

> Reference: see how `about-us` was done. It's the canonical example. Files:
> [page-templates/about-us.php](wp-theme/cag-theme/page-templates/about-us.php),
> [assets/css/about-us.css](wp-theme/cag-theme/assets/css/about-us.css),
> [assets/js/about-us.js](wp-theme/cag-theme/assets/js/about-us.js).

### 1. Read the static source

Open the page's three files in `cag/pages/{slug}/`:
- `index.html` — markup
- `style.css` — page-scoped styles
- `main.js` — page-scoped JS

Inspect the `<link>` / `<script>` tags at the top/bottom of `index.html` to see which shared template parts the page uses. Look for: `shared/inner-hero.css/.js`, `shared/faq.css/.js`, `shared/mini-contact.css/.js`. Also check the body for placeholder divs: `<div id="site-faq"></div>`, `<div id="site-mini-contact"></div>`.

### 2. Pre-flight: verify all referenced assets exist in the theme

Grep the static `index.html` for image references:

```bash
grep -oE 'assets/img/[^"]+|uploads/[^"]+' cag/pages/{slug}/index.html | sort -u
```

For each path, check it exists in `wp-theme/cag-theme/assets/`. If anything is missing, `cp` it over first. (`assets/img/` already has all the static homepage images; foodtrack and security WhatsApp folders are in `assets/uploads/Images/`. Other folders under `cag/uploads/Images/` may need copying.)

### 3. Create the page template

`wp-theme/cag-theme/page-templates/{slug}.php`:

```php
<?php
/**
 * Template Name: {Human Name}
 *
 * Ported from the static prototype's pages/{slug}/index.html.
 */
get_header();
?>

<main class="page-top">

	<!-- Hero (inner-page variant — copy the <section class="hero"> ... </section> block
	     from the static index.html, with these path transforms applied) -->

	[...page body content here...]

	<!-- If the static page had <div id="site-faq"></div>, replace with: -->
	<?php get_template_part( 'template-parts/faq/faq' ); ?>

	<!-- Same for mini-contact: -->
	<?php get_template_part( 'template-parts/mini-contact/mini-contact' ); ?>

</main>

<?php
get_footer();
```

**Path transforms applied while copying markup:**
| Static | → | WordPress |
|---|---|---|
| `/cag/` (homepage link) | → | `<?php echo esc_url( home_url( '/' ) ); ?>` |
| `/cag/pages/{other-slug}/` | → | `<?php echo esc_url( home_url( '/{other-slug}/' ) ); ?>` |
| `/cag/pages/X.html` (dead `.html` link) | → | `<?php echo esc_url( home_url( '/X/' ) ); ?>` if a WP equivalent exists, else `#` |
| `/cag/assets/img/X` | → | `<?php echo esc_url( get_theme_file_uri( 'assets/img/X' ) ); ?>` |
| `/cag/uploads/Images/X` | → | `<?php echo esc_url( get_theme_file_uri( 'assets/uploads/Images/X' ) ); ?>` |
| `/cag/uploads/bg.mp4` | → | `<?php echo esc_url( get_theme_file_uri( 'assets/uploads/bg.mp4' ) ); ?>` |
| `#anchor` (same-page) | → | unchanged |

### 4. Copy the page-scoped CSS and JS

```bash
cp cag/pages/{slug}/style.css wp-theme/cag-theme/assets/css/{slug}.css
cp cag/pages/{slug}/main.js   wp-theme/cag-theme/assets/js/{slug}.js
```

The auto-enqueue helper picks these up automatically — no functions.php edit needed for these.

### 5. Edit functions.php — only if the page uses shared template parts

If the page uses inner-hero, faq, or mini-contact (check what you saw in step 1), add a conditional inside `cag_enqueue_assets()`:

```php
if ( is_page_template( 'page-templates/{slug}.php' ) ) {
	cag_enqueue_inner_hero();   // only if used
	cag_enqueue_faq();          // only if used
	cag_enqueue_mini_contact(); // only if used
}
```

If the page uses none of them, skip this step entirely.

### 6. Ask Itamar to create the WP page in admin

Tell him:
1. wp-admin → Pages → Add New
2. Title: in Hebrew (whatever he wants displayed in nav and `<title>`)
3. Slug: anything — doesn't matter (decoupled from template thanks to Template Name approach)
4. **Page Attributes → Template** → pick "**{Human Name}**" from the dropdown
5. Publish
6. Visit the page URL (whatever WP assigned)

### 7. Verify visually

- Header, footer, drawer, WhatsApp button render
- Inner-page hero (if present) renders with breadcrumb, title, video bg
- All page sections render correctly
- All images load (DevTools → Network tab should show 200 for each)
- Scroll animations fire (look for `[data-anim]` elements to fade in)
- FAQ accordion expands (if FAQ template part is on the page)
- Mobile breakpoints look right (resize to ~640px)
- Body has `class="{slug}"` (DevTools → Elements → `<body>` should have the template basename as a class — confirms `cag_body_class_from_template` is working and any `.{slug} .selector` CSS will match)

---

## Common Gotchas (from past steps)

- **Page template doesn't appear in dropdown** → check file is at `page-templates/{name}.php` (depth 1), not nested in `page-templates/{name}/{name}.php` (depth 2 — WP can't auto-scan that deep). Lesson logged below.
- **Hebrew page title generates URL-encoded slug** → fine, doesn't break anything. The Template Name dropdown decouples slug from template. No need to manually override.
- **Static URLs `/cag/pages/X.html` are sometimes broken** in the static site (file doesn't exist). Map to the closest WP equivalent or leave as `#`.
- **Some `uploads/Images/{subfolder}/` images aren't yet in the theme.** Copy as needed when porting a page that references them.
- **The static site's `<div id="site-faq"></div>` etc.** were client-side injected by `shared/components.js`. In WP, **always** replace with `get_template_part( 'template-parts/{x}/{x}' )` — never load `components.js`, it's obsolete in WP.
- **`wp_get_attachment_image()` adds `width`/`height` HTML attributes that break CSS `aspect-ratio` on the `<img>` itself.** WordPress always injects the attachment's actual pixel dimensions as `width="…" height="…"` on the `<img>` tag. This gives the image an intrinsic ratio that overrides any `aspect-ratio` rule written on the `<img>`. **Fix:** put `aspect-ratio` on the *container* element (e.g. `.lm-model-media { aspect-ratio: 4/3; overflow: hidden; border-radius: … }`), and set the `<img>` to `width:100%; height:100%; object-fit:cover`. The container's CSS-defined shape holds regardless of the uploaded image's natural dimensions. Applied to `local-models.css` on 2026-05-24.
- **`script.js` is enqueued globally** and contains both global behaviors (drawer toggle, header scroll) and homepage-specific behaviors (GSAP pin). The defensive null-checks (`if (heroVideo) { ... }`) prevent errors on inner pages — don't refactor it without testing.
- **CSS selectors like `.about-us .au-row-section`** (page-name-prefixed) keep working because of the `cag_body_class_from_template` filter. The body class is derived from the template basename, not the page slug — so the CSS still matches even when the page slug is Hebrew.
- **ACF field type for links — project convention (Itamar's rule, applies to future projects too):** use the **`url`** field *only* for links that always point **outside the site** (external — e.g. the Make webhook endpoint, social profiles). For **every other link** — internal pages, or links the editor might point either way — use the **`link`** field (the client picks a page or pastes a URL and sets the target). Read link fields through the `cag_link_url()` / `cag_link_target()` helpers (handle return_format array/url + ACF-inactive). Applied here: the footer's accessibility / privacy / address(Waze) links were switched from `url` → `link`; the Make webhook stays a `url` field (external). Don't default to `url` fields for convenience — that's the trap this rule prevents.

---

## Progress Log

> Append entries here as we work. Newest at the top. Date format: YYYY-MM-DD.

### 2026-05-25 — Blog/article content complete. All real content now entered.

- Blog posts written and entered in wp-admin. All real content phases complete: video IDs, photos, social links, and blog/article content.
- **Remaining before launch:** SEO slug alignment (pull indexed URLs → set WP slugs → 301 redirects → resubmit sitemap); caravans `#contact` dead anchor decision; deployment to SiteGround via All-in-One WP Migration.

---

### 2026-05-24 — Content + CPT migration wrap-up

- **Video IDs** ✅ — real YouTube IDs entered in the videos-page repeaters.
- **Photos** ✅ — placeholder/reused photos replaced.
- **Blog/article content** ✅ — done (2026-05-25).
- **CPT model card migration** ✅ — all pages that hardcoded model cards (`local-models`, front-page, kachol-lavan, tourist-complexes`) now query the `model` CPT. `.cv-model-card` markup reused.
- **Social links** ✅ — `social_links` repeater (platform icons + URLs) and `social_posts` repeater (marquee images) populated on the front-page ACF tab "רשתות חברתיות".

---

### 2026-05-24 — Per-page ACF, page 13: caravans. All 13 inner pages + homepage now ACF-dynamic. Phase complete.

**caravans** — ACF JSON `group_cag_caravans.json`. Per-page ACF phase is now fully complete across all pages.

---

### 2026-05-24 — Per-page ACF, pages 11–12: accessories + local-models. 12 of 13 inner pages now ACF-dynamic.

**accessories** — field group `group_cag_accessories.json` (already existed as a single `acc_items` relationship field pulling from the `model` CPT; no new content added this session — the group was already in place from the CPT phase). Marked complete.

**local-models** — 3-tab ACF JSON (`group_cag_local_models.json`). Tab 1 "דגמים": `lm_models` page-level repeater (image, tag, name, price + note, desc, nested `specs` repeater of FA-icon + value, CTA link). Tab 2 "מאפיינים משותפים": `lm_feat_heading` + `lm_feat_subtitle` + `lm_features` repeater (icon/title/desc). Tab 3 "Custom Made": eyebrow, split heading (`lm_custom_heading` + `lm_custom_heading_em`), subtitle, stamp, `lm_custom_specs` repeater (icon/title/desc/range), CTA link, meta text. All section headings and CTAs fully editable. `is-reverse` alternation, model numbers, spec numbers (01/02…), and animation delays are all auto-derived in the template — the editor never manages layout.

**Gotcha found (logged in Common Gotchas below):** `wp_get_attachment_image()` adds explicit `width` and `height` HTML attributes to `<img>` elements. These intrinsic dimensions override CSS `aspect-ratio` on the image itself. **Fix pattern:** move `aspect-ratio` to the *container* (`overflow: hidden`; `border-radius` there too), and let the image do only `width:100%; height:100%; object-fit:cover`. This ensures the CSS controls the shape regardless of the uploaded image's natural dimensions.

---

### 2026-05-24 — Foodtrucks ACF complete + Model CPT single-listing page fully built.

**foodtrucks** — per-page ACF content is now fully dynamic (`acf-json/group_cag_foodtrucks.json`). All sections editable via ACF repeaters; fallback to original hardcoded markup when fields are empty. Confirmed working in browser. This completes 9 of 13 inner pages in the ACF phase.

**Model CPT + `single-model.php`** — the `model` post type (`/listings/<slug>`) is fully built end-to-end:
- **Gallery + lightbox:** ACF `m_gallery` (normalizes raw IDs or ACF image objects), main image + thumbnail strip, JS-driven lightbox with prev/next/counter (`assets/js/single-model.js`).
- **Brand:** יצרן taxonomy (`brand`), term logo from `acf-json/group_cag_brand.json`, brand name displayed in the aside.
- **Price / quote box:** `m_price` (optional, formatted with commas + ₪ symbol), `m_price_label` (fallback CTA headline), `m_cta_override` (link field) → button always targets `#contact`.
- **Spec accordion:** `m_spec_groups` repeater (editable title + WYSIWYG content per group); first group open by default. CSS styles plain `ul/li` and `.content-wrap/.label/.value` markup from the WYSIWYG.
- **Mobile spec rows:** column layout (not row), label + value centered, small `#0050cc` 40px divider (`::after` on `.label`) between them. Defined in the `@media (max-width:640px)` block in `assets/css/single-model.css`.
- **YouTube embed:** `m_youtube` — supports watch?v=, youtu.be/, embed/, shorts/ URLs; auto-extracted video ID → embed URL.
- **Docs link:** `m_docs` (ACF link field); hidden when empty.
- **Related models:** 3 posts — same brand/series first, topped up with most-recent others. Uses `.cv-model-card` markup (same as kachol-lavan model cards).
- **Template parts:** inner-hero, mini-contact, FAQ (all shared, fully dynamic).
- **ACF fields:** `acf-json/group_cag_models.json` (UI-managed Local JSON, synced via wp-admin → Custom Fields → Sync available).

**Remaining (CPT migration — not blocking launch):** `caravans.php`, `local-models.php`, front-page, kachol-lavan, and tourist-complexes still hardcode model cards as repeaters. Future work: query the `model` CPT instead. Reuse `.cv-model-card` markup already in place.

---

### 2026-05-24 — Per-page ACF, pages 4–6: caravan-camparks, videos-page, contact-us.

**caravan-camparks** — 2-tab ACF JSON (`group_cag_caravan_camparks.json`). Tab 1 "מבוא": badge image (`id`), stamp text (textarea → `nl2br` so newlines become `<br>` in the badge span), split heading (`cc_intro_heading` + `cc_intro_highlight`), wysiwyg body — with full original 3-paragraph fallback. Tab 2 "רשימת חניונים": `cc_campsites` repeater (layout: block). Each campsite: `media_type` radio (maps | image) with **conditional logic** on `map_query` (shown when maps) and `image` (shown when image); `heading`; `body` wysiwyg (handles h3/h4/p/ul/li — editor puts rich content here, not in the meta repeater); `meta` nested repeater (FA icon class + label — for phone/email/address rows); `cta` link (hidden when empty). **Auto-zigzag:** `is-reverse` on odd rows (`$cc_i % 2 !== 0`), same pattern as about-us/kachol-lavan. **Fallback:** all 9 original hardcoded campsites in the `else` branch — including the one row (#9) that uses a local image (`desert-caravan.jpg`) rather than a map embed. Closing section stays hardcoded (static summary). PHP lint clean.
- **Itamar:** wp-admin → **Custom Fields → Sync available** → Sync **תוכן עמוד חניוני קרוואנים**, then populate on the caravan-camparks page. Workflow per campsite: choose Maps/Image → fill map query or upload image → heading → body wysiwyg (rich text) → meta rows for contact info → CTA link if needed.
- **Gotcha to watch:** if you paste contact-info rows into the wysiwyg body field, they'll render twice (once from wysiwyg, once from the meta repeater). Keep plain `<p>` / `<ul>` content in the body; use the meta repeater for icon+text contact rows.

**videos-page** — 3-tab ACF JSON (`group_cag_videos_page.json`), one tab per section: "פוד טראקים", "קרוואנים ומבני לינה", "מגזר ביטחוני". Each tab: `heading` + `highlight` (gradient word) + `intro` (textarea) + a `videos` repeater (`video_id` / `title` / `description`). Thumbnail URL is **auto-built** in PHP: `https://i.ytimg.com/vi/{video_id}/hqdefault.jpg` — no separate thumbnail field. The YouTube play-button SVG is captured once in `$vg_play_svg` and echoed per card (avoids repeating 5-line SVG in every article). Section IDs (`#food-trucks`, `#caravans`, `#security`) and the lightbox div stay hardcoded. **Fallback:** all original placeholder cards (`OkAlWJ4C_Fs`) in each `else` branch — renders identically until real IDs are entered. PHP lint clean.
- **Itamar:** Sync **תוכן עמוד סרטונים**, then enter the real YouTube video IDs in each section's repeater. The video_id is the code after `?v=` in a YouTube URL (e.g. `dQw4w9WgXcQ`). Until populated, placeholder thumbnail still shows.

**contact-us** — **No new ACF group.** All 4 contact method cards (phone, WhatsApp, email, address) now read from the existing הגדרות אתר options fields via `cag_opt()` / `cag_link_url()` — same pattern as the footer. The hours `<ul class="cu-hours">` uses the global `hours` repeater (same data as the footer's שעות פתיחה), with a `cu-closed` class auto-applied when the time value is "סגור" or empty. The map iframe `src` is built from `contact_address`: `rawurlencode($cu_addr).'&output=embed'` — so changing the address in הגדרות אתר updates both the method card link and the embed. The navigation button uses `cag_link_url('contact_address_link')`. Section headings and intro text stay hardcoded. PHP lint clean.
- **Nothing for Itamar to do** — all values already populated in הגדרות אתר. Verify the contact-us page in the browser to confirm phone/email/address/hours/map all reflect the live option values.

### 2026-05-24 — Per-page ACF, page 3: tourist-complexes (5 sections editable). First page built on the Local JSON workflow + new `cag_field()` helper.

- Biggest per-page conversion yet — 5 content sections, 4 repeaters (one with a nested repeater). Built as **Local JSON from the start** (`acf-json/group_cag_tourist_complexes.json`, 5 tabs), no PHP field-group file. JSON validated, template + functions PHP-lint clean.
- **New helper `cag_field( $name, $fallback )`** in functions.php — the per-post analog of `cag_opt()` (guards `function_exists('get_field')`, returns fallback when empty/ACF-off). Cleans up the singular-field-with-fallback pattern that about-us/kachol-lavan did inline. Use it for all future per-page templates.
- **Sections:** (1) **tc-intro** — split heading + intro text. (2) **tc-projects** (slider) — heading/subhead + `tc_projects` repeater of slides; kept `#tcTrack`/`#tcPrev`/`#tcNext`/`#tcDots` intact so the existing slider JS rebuilds dots for any slide count. (3) **tc-solutions** — `tc_solutions_items` repeater (FA icon + title + desc), `data-delay` auto (`i*0.06`). (4) **tc-models** — `tc_models` repeater with **nested `specs` repeater**; **model number auto** (`$i+1`) and **zigzag `is-reverse` auto** (`$i%2`), price + price_note, CTA link (hidden when empty). (5) **tc-chars** — image (+ tag), split heading with `<br>`, `tc_chars_items` checklist repeater (icon **fixed** `fa-check` — they're all checkmarks, so not editable), CTA link (always shown, falls back to `#contact`).
- **Split-heading variants handled:** most headings highlight the *end* word (`{heading} <span>{highlight}</span>`), but **intro** and **models** highlight a *middle* word — those got a 3-field **before / highlight / after** split so the colored span lands mid-sentence. Pattern worth reusing: when the gradient word isn't at the end, give the editor before+after text fields around the highlight.
- Every section wrapped `have_rows(...) … else [original markup] … endif`; singular fields via `cag_field()` with the original copy as fallback — so until Itamar populates + syncs, the page renders identically. **Browser-verified ✅ (2026-05-24):** Itamar confirmed the template renders correctly after Sync.
- **Itamar:** wp-admin → **Custom Fields → Sync available** → Sync the new **תוכן עמוד מתחמי תיירות** group (alongside the others), then populate on the tourist-complexes page. **Heads-up (same gotcha as kachol-lavan):** don't paste icon/structural HTML into the textarea/wysiwyg fields — the repeaters render those.
- **Same-day fix — tc-projects heading de-split.** The projects heading was a 2-field split (`{heading} <span class="gradient-text-light">{highlight}</span>`), but **`.gradient-text-light` is `background:white` clipped to text — not a gradient**, and `.tc-projects-head h2` is *already* `color:#fff` on the `--blue-950` band, so the span did nothing visible. With the highlight word also entered separately it rendered the word twice ("פרויקטים אחרונים אחרונים"). Removed `tc_projects_highlight` from the JSON and render the heading as one plain `<h2>` (modified bumped → re-sync). **Lesson:** before splitting a heading for a highlight, confirm the highlight class actually styles differently *in that section* — `gradient-text-light` only matters on light backgrounds where the base text isn't already white; on a dark band with white headings it's a no-op, so don't split there.

### 2026-05-24 — ACF field groups moved from PHP registration → UI-managed (Local JSON). Reverses the earlier convention.

- **Why:** Itamar wants to see and edit field groups in the ACF admin UI (add/remove fields by clicking), not by editing PHP files. PHP-registered groups (`acf_add_local_field_group`) are **read-only in the UI** by design — that's the trade-off the earlier convention accepted for version-control. **ACF Local JSON gives both:** edit in the UI, and ACF auto-mirrors every save to `acf-json/*.json` in the theme, so the definitions still version-control and deploy with the theme.
- **What changed:**
  - New folder `wp-theme/cag-theme/acf-json/` with `group_cag_about_us.json`, `group_cag_kachol_lavan.json`, `group_cag_site_settings.json`. ACF auto-registers the active theme's `acf-json/` as a load+save point (no config needed), so these load as local field groups exactly like the PHP did — **field keys preserved verbatim**, so all existing entered content (e.g. about-us rows, Site Settings values) stays linked. JSON validated (parses clean, no BOM).
  - **Removed PHP registration:** deleted `inc/acf-about-us.php` and `inc/acf-kachol-lavan.php`; removed their `require_once` from functions.php. `inc/acf-options.php` now registers **only the options *page*** (`acf_add_options_page` — the הגדרות אתר admin menu, kept in PHP so the menu always exists); its field group moved to JSON. PHP lint clean.
- **One-time step for Itamar (promotes JSON → editable DB groups):** wp-admin → **Custom Fields → Field Groups → Sync available** → the 3 groups appear → **Sync** them. After syncing they're fully UI-editable, and ACF writes future edits back to the JSON automatically. (Before syncing, fields still render on pages — JSON loads as a local group — they're just not yet UI-editable. So nothing is broken in the meantime.)
- **Verify after sync:** open about-us / kachol-lavan page editors + הגדרות אתר and confirm all fields show with their existing values intact (keys were preserved). If a group's fields *don't* appear on a page after this change, the JSON failed to load — tell Claude (non-destructive; data stays in the DB by key).
- **Convention going forward (replaces the old "one `inc/acf-{template}.php` per template" rule):** create each new page's field group **in the ACF UI**; ACF saves it to `acf-json/`. Commit the JSON. No more PHP field-group files. The options *page* stays PHP.
- **Lesson for the skill:** PHP-registered ACF groups vs UI/Local-JSON is a real fork — PHP = code-authored, locked in UI; Local JSON = UI-authored, auto-exported to repo. If the client wants to self-manage fields, **Local JSON is the answer** (UI editing + version control). Migrating PHP→JSON safely: replicate the exact group/field **keys** (ACF links saved data by key), drop the JSON in `acf-json/`, remove the PHP registration, and have the client hit **Sync** once. Loss-free because JSON-as-local keeps fields rendering during the switch.

### 2026-05-24 — Per-page ACF, page 2: kachol-lavan content is now editable (2 repeaters + nested icon repeater). Hidden sections removed.

- Second per-page conversion, applying the about-us pattern to a richer page. New field group `inc/acf-kachol-lavan.php` (required in functions.php after acf-about-us), location-ruled to `page_template == page-templates/kachol-lavan.php`. Two ACF tabs in the editor:
  - **Models section** — `kl_models_heading` (text), `kl_models_intro` (wysiwyg), `kl_models_cta` (**link** field → internal, per Itamar's url-vs-link rule), and `kl_models` repeater (image `id` / tag / title). Heading/intro/CTA are **singular fields with per-field fallback** to the original copy (so they always render even if untouched); the card grid uses the `have_rows … else [original 4 cards] … endif` wrap. `data-delay` auto-derived (`number_format($i*0.08,2)`) so the zoom-in stagger holds for any card count.
  - **Split sections** — ONE `kl_splits` repeater replaces the two hardcoded `resort-split` blocks (מתחמי נופש + פודטראקים). **Auto-zigzag like about-us, but the flip here is DOM-order + anim-direction, not a background class:** even row = content(`fade-right`) then image-grid(`fade-left`); odd row = image-grid(`fade-right`) then content(`fade-left`) — reproduces resort (row 0) and foodtrucks (row 1) exactly. Each row: heading, body (wysiwyg), `image_top` + `image_bot` (bot falls back to top), a **nested `features` repeater** (table layout) of icon+label, and a `cta` link field (button hidden when empty). *(An optional `anchor_id` subfield was dropped same-day — the section CTAs link to other pages, not in-page anchors, so per-section `id`s weren't needed; sections now render plain `<section class="section">`.)* Whole thing wrapped `have_rows('kl_splits') … else [original resort + foodtrucks verbatim] … endif`.
- **Feature icons — Itamar's call: a repeater with a free-text icon-class field + label**, not a curated dropdown. Icon library is the theme's **Font Awesome 6.5.1** (functions.php:156), so the client types the FA class (e.g. `fa-solid fa-utensils`); `placeholder`/instructions show the format. Rendered `<i class="{icon}"></i>` (esc_attr), label esc_html.
- **Two hidden sections removed (Itamar's call):** the `display:none` "ידע, ניסיון וביצוע" about block and the "פרויקטים" projects grid (the one with "להשלים תמונות נוספות" placeholders) were deleted from the template entirely — dead markup, not made editable.
- **No functions.php enqueue change** — the existing `is_page_template('page-templates/kachol-lavan.php')` block already loads inner-hero + mini-contact + faq, and no new assets/parts were added. **No CSS/JS touched** — output reuses the exact prototype classes (`.models-grid/.model-card`, `.resort-split/.resort-content/.resort-img-grid/.feature-icons`), so existing styles apply as-is. `#contact` CTAs resolve to this page's mini-contact (`id="contact"`), unlike the dead anchor on caravans.
- **Lint:** acf-kachol-lavan / kachol-lavan / functions all clean (`php -l`, Local's bundled PHP 7.4). **Browser-verified ✅ (2026-05-24):** Itamar populated a split row and confirmed the template renders correctly — zigzag, nested icons, images, CTA, RTL all good.
- **Gotcha found during verification (reusable):** the section showed **two `.feature-icons` rows**. Not a template bug — the icon markup had been **pasted into the תוכן (body) wysiwyg field** in addition to living in the `features` repeater, so it rendered twice (the template echoes the wysiwyg HTML raw, then renders the repeater). Fix = strip the `<div class="feature-icons">` out of the body field (Text/HTML tab), leaving only `<p>`s; the repeater is the sole icon source. **Lesson:** on any page where a wysiwyg body sits next to a repeater that renders structural markup, warn the editor not to paste that same markup into the wysiwyg — copying rendered content into TinyMCE drags the HTML along and double-renders.
- **CSS follow-up (same day):** `<strong>` inside `.resort-content` is now brand-blue via `.resort-content strong { color: var(--blue-700); font-weight:700 }` in `kachol-lavan.css` — the static markup set this inline, but wysiwyg-authored bold needs the rule. Also **removed the `anchor_id` subfield** (the section CTAs link to other pages, not in-page anchors), so split sections render plain `<section class="section">`.
- **Lesson for the skill:** the about-us repeater pattern extends to pages with **mixed content** — use singular fields (with per-field fallback) for one-off heading/intro/CTA and repeaters only for the genuinely-repeating parts; you don't have to force the whole section under one `have_rows`. **Nested repeaters** handle "a list of blocks, each containing its own list" (split section → its feature icons). When the zigzag is **DOM-order based** (not a background class), branch the markup with `if ($reverse)` before/after the content `<div>` rather than just swapping CSS classes. Add an optional **anchor-id field** when the original sections had `id="…"` deep-link targets, so dynamic sections keep them. For icon pickers, a free-text class field tied to the loaded icon library is the low-effort path (client must know/copy class names) vs. a curated dropdown — Itamar chose free-text.

### 2026-05-24 — Verified live: about-us per-page ACF is good.

- Itamar populated the `au_rows` repeater and confirmed the about-us page renders correctly on the Local site. The per-page ACF pattern (repeater + auto-zigzag + fallback) is now end-to-end verified, not just lint-clean — it's the trusted template for the remaining inner pages and the homepage.

### 2026-05-21 — Per-page ACF, page 1: about-us content is now editable (repeater + auto-zigzag). Pattern for the rest.

- First page-content conversion (chrome/parts were already dynamic; this is the page *body*). The about-us page was 5 structurally-identical text+image rows hardcoded in the template — now driven by a per-page ACF repeater. **This establishes the per-page pattern** the other inner pages + homepage will follow.
- **Field group in its own file:** `inc/acf-about-us.php`, PHP-registered (`acf_add_local_field_group`, repo-portable), `require`d in functions.php next to `acf-options.php`. **Convention going forward: one `inc/acf-{template}.php` per page template**, location-ruled to `page_template == 'page-templates/{template}.php'` so the group shows only on that template's pages.
- **One repeater `au_rows`** (block layout), sub-fields: `eyebrow`, `heading`, `heading_highlight`, `body` (wysiwyg/basic), `tagline` (optional), `image` (return `id`). Itamar's three calls: **(1) repeater** (add/remove/reorder rows, not fixed); **(2) split heading** — plain `heading` + `heading_highlight` rendered as `<h2>{heading} <span class="gradient-text">{highlight}</span></h2>`, so the two-tone heading stays editable without the client touching HTML; **(3) fallback** to the original hardcoded rows when the repeater is empty.
- **Layout is auto-derived, not a field.** `$i % 2` flips every other row: even = normal (`au-row`, text `fade-right`, media `fade-left`), odd = `au-row--reverse` + `au-row-section--alt` background (anim directions swapped). So the zigzag + alternating background hold for any number of rows, in any order — the editor never manages layout.
- **Image →** `wp_get_attachment_image( $id, 'large', false, ['loading'=>'lazy'] )` (responsive srcset + alt from the media library), an upgrade over the static raw `<img src>`. **Body →** echoed raw (ACF wysiwyg returns already-formatted, trusted admin HTML — `esc_html` would break it); all other fields are `esc_html`/`esc_attr`.
- **Template edit was non-destructive:** wrapped the existing 5 rows in `<?php if ( have_rows('au_rows') ) : ?>` … `<?php else : ?>` [original rows] `<?php endif; ?>` — two small edits, fallback markup untouched. `have_rows('au_rows')` (no post-id) resolves to the current page via ACF's singular default. PHP-linted acf-about-us / functions / about-us — clean.
- **The fallback "cliff" (inherent to the chosen approach):** with the repeater empty the page renders identically to before; the instant the first repeater row is added, the hardcoded fallback is replaced — so all 5 rows must be entered in one sitting (or the page shows just the one). Documented for Itamar; gave him the per-row heading/highlight split to paste in.
- **Browser-verified ✅ (2026-05-24):** Itamar populated the repeater and confirmed the about-us page renders correctly — split gradient heading, zigzag alternation, responsive image sizes, and RTL all good.
- **Lesson for the skill:** for a static→WP page that's a series of same-shape blocks, model it as **one repeater**, not N fixed fields — gives reorder/add/remove for free and one render loop. **Auto-derive layout** (sides/backgrounds/anim) from row index instead of asking the editor. **Split, don't HTML:** a two-tone heading becomes two text fields the template recombines. **Wrap, don't rewrite:** make the dynamic loop the `if` branch and keep the original markup as the `else` fallback (non-destructive, page never blanks) — but note the empty-→-first-row cliff with repeater fallbacks. One `inc/acf-{template}.php` per template keeps groups isolated and portable.

### 2026-05-21 — Verified live: dynamic template parts working on the site

- Itamar populated the ACF options-page fields and confirmed the dynamic FAQ / mini-contact / inner-hero parts render correctly on the live (Local) site. The prior day's work (below) is now end-to-end verified, not just lint-clean.
- **Inner-hero wp-admin setup complete:** Yoast SEO installed + breadcrumbs enabled, page **parents** set (multi-level trails), per-page **Excerpts** set (hero sub-text), and the FAQ + mini-contact options fields populated. The inner hero now renders fully from page data + Yoast on every inner page — no remaining setup dependency.
- En route there was a brief "I updated the FAQ fields and the pages didn't change" — **not a bug:** the changes were being viewed on the **static prototype** (`cag/`), not the WordPress site (`cag-wp.local`). ACF only drives the WP theme. Worth remembering during a static→WP migration: both sites coexist, so always confirm you're looking at the WP URL when checking dynamic content.

### 2026-05-20 — Template parts went dynamic: FAQ + mini-contact (ACF options) and inner hero (per-page + Yoast)

- Made all three shared template parts data-driven. FAQ and mini-contact pull global content from the options page; the inner hero pulls per-page content from the page itself.
- **FAQ (`template-parts/faq/faq.php`) → global ACF on the options page.** New "שאלות נפוצות (FAQ)" tab in `inc/acf-options.php`: `faq_heading` (text), `faq_subheading` (textarea), and `faq_items` (**repeater**, block layout, sub-fields `question`/`answer`). faq.php renders heading/sub via `cag_opt()` and loops `have_rows('faq_items','option')` — first row gets `open`, empty-question rows are skipped, answers run through `wpautop(esc_html())`. **Full hardcoded fallback kept:** if ACF is off or the repeater is empty, the original 6 foodtruck Q&As render, so the section is never blank. Rationale: the prototype showed the *same* FAQ on every page, so it's global (options page), not per-page.
- **Mini-contact (`template-parts/mini-contact/mini-contact.php`) → text from options page.** New "בלוק יצירת קשר (Mini Contact)" tab: `minicontact_heading` + `minicontact_text`. The heading/paragraph now read via `cag_opt()` with the current copy as fallback. The form itself is unchanged (CF7 shortcode `2ee59e8`) — only the surrounding text became editable.
- **Inner hero — the big one. Centralized 12 inlined copies into ONE dynamic template part.** The hero was previously **inlined** in every page template (not a `get_template_part`), so "make it dynamic" first meant centralizing it. Rewrote `template-parts/inner-hero/inner-hero.php` to be fully dynamic and replaced the inline `<section class="hero" id="hero">…</section>` block in all 12 page templates with a single `<?php get_template_part( 'template-parts/inner-hero/inner-hero' ); ?>`.
  - **Breadcrumb → Yoast.** `yoast_breadcrumb( '<nav class="hero-breadcrumbs" aria-label="פירורי לחם">', '</nav>' )`, guarded by `function_exists('yoast_breadcrumb')`. Fallback (Yoast inactive) = a בית › [title] trail in the same markup. To keep the prototype look, added `add_filter( 'wpseo_breadcrumb_separator', … )` in functions.php returning our FontAwesome chevron `<i class="fa-solid fa-chevron-left">` — so the existing `.hero-breadcrumbs i` styling applies to Yoast's separator. Yoast also emits `aria-current="page"` on the last crumb, which our `.hero-breadcrumbs [aria-current="page"]` rule already styles.
  - **Title → `the_title()`** wrapped in `<h1><span class="hero-line-1">…</span></h1>` (the `<span>` is required — `inner-hero.js` animates `.hero h1 span`).
  - **Sub-text → the page Excerpt**, via `has_excerpt() ? get_the_excerpt() : ''`. The `has_excerpt()` guard is deliberate: it avoids dumping WP's *auto-generated* excerpt into the hero when none is set. The `<p class="hero-text">` is **always output even when empty** — `inner-hero.js` does `gsap.set([heroP, heroActions], …)` and an all-null target array throws (the exact regression logged under "What Didn't Go Well"); always rendering the `<p>` keeps `heroP` non-null.
  - **Badge removed.** The per-page `.hero-dimension` rotated side-badge (12 different texts) was dropped entirely — Itamar's call ("remove it, I don't even see it"). Not made dynamic. The `.hero-dimension` CSS is now dead but harmless; left in place.
  - **Video** poster/src stay theme assets (`hero-compound.jpg` / `bg.mp4`) — global brand video, not page content.
- **functions.php:** `add_post_type_support( 'page', 'excerpt' )` in `cag_theme_setup()` — **pages don't support excerpts by default**, and the hero now uses the excerpt as its sub-text, so without this the Excerpt field wouldn't appear in the page editor (same class of gotcha as the missing `post-thumbnails` support for the blog). Plus the `wpseo_breadcrumb_separator` filter above.
- **Behavior change to note:** the hero `<h1>` is now the **WP page title verbatim**. In the prototype the H1, the breadcrumb's current label, and the would-be page title sometimes differed (e.g. kachol-lavan H1 was "בנייה כחול לבן" while the crumb said "כחול לבן"). Now they're unified to the page title — so the page title in wp-admin drives both the nav/`<title>` and the hero headline.
- **Mechanics of the 12-file edit:** scripted a guarded regex replace (`(?s)…<section class="hero" id="hero">.*?</section>`), writing **UTF-8 without BOM** (`System.Text.UTF8Encoding $false`) so no BOM is prepended to a PHP file (would cause "headers already sent" + stray output). Required exactly 1 match per file before writing; all 12 = 1. A second pass normalized indentation to 1 tab and stripped the leftover `<!-- ══ Hero ══ -->` comments (two files used a different comment style the first pass didn't catch). PHP-linted all 17 touched files (acf-options, functions, 3 template parts, 12 page templates) — clean.
- **Itamar must do in wp-admin (until then, sensible fallbacks/empties render):**
  1. **FAQ:** הגדרות אתר → שאלות נפוצות → set heading/sub + add the Q&A rows. *(Until done, every page shows the 6 placeholder foodtruck questions.)*
  2. **Mini-contact:** הגדרות אתר → בלוק יצירת קשר → heading + text. *(Fallback = current copy.)*
  3. **Inner hero — Yoast:** install + activate **Yoast SEO**, then enable **Breadcrumbs** (Yoast → Settings → Advanced → Breadcrumbs). *(Without it, the hero shows only בית › [title].)* For multi-level trails (e.g. כחול לבן › פודטראקים), set the **page Parent** under Page Attributes — Yoast builds the trail from page hierarchy, not the old hardcoded links.
  4. **Inner hero — Excerpts:** set each page's **Excerpt** = the hero sub-text. *(No excerpt → empty hero sub-text by design.)* The page **Title** is the hero H1 — title pages accordingly.
  - **Not browser-verified.** Needs a visual pass on: Yoast breadcrumb spacing/separators inside `.hero-breadcrumbs` (Yoast's single-`<span>` wrapper vs. our inline-flex gap), the hero entrance animation still firing, the FAQ repeater output, and RTL.
- **Lesson for the skill:** (a) decide each shared part's data **scope** first — *global* content (same everywhere → ACF options page, e.g. FAQ/mini-contact) vs *per-page* content (→ the page's own title/excerpt/fields, e.g. the hero). (b) If a "template part" was actually **inlined** across many pages, centralizing into a real `get_template_part` is step zero of making it dynamic — script the block replacement with a guarded single-match regex and **UTF-8-no-BOM** writes. (c) Yoast breadcrumbs: wrap `yoast_breadcrumb()` in your own nav class + use `wpseo_breadcrumb_separator` to inject your separator markup, so you keep the prototype styling; always guard with `function_exists` + a fallback trail. (d) Enable `add_post_type_support('page','excerpt')` whenever a page template reads `get_the_excerpt()` — pages lack it by default. (e) Always render animation-targeted elements (here `.hero-text`) even when empty — see the all-null GSAP throw.

### 2026-05-20 — Forms went dynamic: both contact forms swapped to Contact Form 7 (footer + mini-contact)

- Companion to the header/footer dynamic-chrome entry below. The two hardcoded HTML contact forms are now **Contact Form 7** shortcodes — the client edits fields/labels/mail in the CF7 admin, no theme edit needed.
  - **Footer (pre-footer-contact):** `footer.php` form markup → `[contact-form-7 id="755eb9a" title="Footer Form" html_class="pfc-form"]`.
  - **Mini-contact template part:** `mini-contact.php` form markup → `[contact-form-7 id="2ee59e8" title="Mini Contact" html_class="mini-contact-form"]`.
- **CSS — reuse the prototype look, retarget only CF7's extra markup.** Kept all existing form styles (`.pfc-form/.pfc-field/.pfc-row-2/.pfc-privacy` in `style.css`; `.mini-contact-form/.mini-contact-form-row` in the template-part `mini-contact.css`) by passing `html_class` that matches the prototype's form class. Added small "CF7 INTEGRATION" blocks only for markup CF7 emits that the static HTML didn't:
  - `style.css` (footer, ~lines 705–733): `.pfc-form .wpcf7-acceptance` styled to replicate the old `.pfc-privacy` consent-checkbox row (flex, 18px box, blue accent, underlined links); plus `.wpcf7-not-valid-tip` (inline validation) and `.wpcf7-response-output` (submit feedback) spacing.
  - `mini-contact.css` (lines 140–147): `.wpcf7-form-control-wrap { display:block }` so CF7's field-wrap span fills its grid cell (CF7 wraps each control in an inline span by default, which broke the `.mini-contact-form-row` grid); `.wpcf7-not-valid-tip` colored white for the dark gradient background.
- **functions.php:** added `add_filter( 'wpcf7_autop_or_not', '__return_false' )` (line 497). Disables CF7's auto-`<p>`/`<br>` insertion — without it CF7 injects paragraph/break tags between fields and **destroys the flex/grid field layout**. Single most important line for making a custom-styled CF7 form look right.
- **The field HTML lives in the CF7 admin, NOT the theme — portability caveat.** The shortcodes only reference form IDs (`755eb9a`, `2ee59e8`); the actual field markup (`.pfc-field` labels, the `.pfc-row-2` two-up row, the `wpcf7-acceptance` consent box, the `.mini-contact-form-row`) is authored inside each CF7 form's template in wp-admin. So: (a) the theme CSS only matches if those CF7 forms are configured with that exact wrapper markup; (b) **CF7 form IDs are DB-resident — they don't travel with the theme files.** The `.wpress` migration bundle carries them (CF7 forms are a CPT), but a fresh DB needs the two forms re-created and the IDs in the shortcodes updated. Flagged so the deploy step doesn't show two empty form slots / literal shortcode text.
- **Old static form JS is now dead (and was already a no-op).** `mini-contact.js`'s fetch-and-inject + `.is-sent` "תודה!" success handler keys off `#mini-contact` (a placeholder div that doesn't exist in WP) → returns early, exactly as logged earlier. CF7's own plugin JS now handles AJAX submit + validation + the success/response message (`.wpcf7-response-output`). The `.mini-contact-form.is-sent` success CSS in `mini-contact.css` is consequently dead too — left in place (harmless). `cag_enqueue_mini_contact()` still enqueues the obsolete JS (unchanged).
- **Submission backend = CF7 default mail for now. The Make webhook is deferred — Itamar will wire it later in the project.** So the ACF `url`-field Make-webhook note in Common Gotchas (above) describes a *planned* external endpoint, not yet connected to these forms. Current behavior: CF7 sends its configured email on submit.
- **Itamar must do in wp-admin (or the forms render empty / as literal shortcode text):** (1) install + activate **Contact Form 7**; (2) confirm the two forms exist with IDs `755eb9a` (Footer Form) and `2ee59e8` (Mini Contact) — if the IDs differ, update the two shortcodes in `footer.php` / `mini-contact.php`; (3) author each form's fields with the wrapper classes the CSS expects (`.pfc-field`, `.pfc-row-2`, `wpcf7-acceptance` for the footer; `.mini-contact-form-row` for the mini); (4) set the mail recipient. **Not browser-verified** — needs a visual check that both forms render with the prototype styling (field grid, consent checkbox, focus rings) and that validation tips and the success message appear styled.
- **Lesson for the skill:** converting a static styled form to CF7 is three moves — (a) drop the shortcode with an `html_class` that matches the prototype's form class so existing CSS applies as-is; (b) `wpcf7_autop_or_not` → `__return_false` so CF7 stops mangling the layout with auto-paragraphs; (c) add a thin retarget layer for CF7-only markup (`.wpcf7-acceptance`, `.wpcf7-form-control-wrap`, `.wpcf7-not-valid-tip`, `.wpcf7-response-output`) instead of restyling from scratch. Remember the field HTML is admin-authored and DB-resident — document the form IDs + required wrapper classes so the form can be rebuilt on a fresh install.

### 2026-05-20 — Dynamic chrome: header + footer now editable (ACF options page + registered nav menus)

- First step turning the pixel-perfect static theme into a real dynamic theme: the **header and footer chrome** is no longer hardcoded.
- **Nav menus (no custom walker — Itamar's call).** Registered two locations in `cag_theme_setup()`: `primary` (תפריט ראשי) and `footer` (תפריט פוטר). `header.php` renders `primary` twice via `wp_nav_menu()` with **standard output** — once as `<ul class="nav" id="nav">` (desktop), once as `<ul class="drawer-nav">` (mobile drawer). Footer "production lines" column renders the `footer` location. Both have PHP fallbacks (`cag_primary_menu_fallback` = empty so the header doesn't fill with all pages before a menu is built; `cag_footer_menu_fallback` = the original 4 links).
- **CSS retargeted to WP menu classes** (`style.css`): dropdowns now key off `.nav > .menu-item-has-children:hover > .sub-menu` (was `.nav-item:hover .dropdown`); drawer accordion off `.drawer-nav .menu-item-has-children.open > .sub-menu` (was `.drawer-item.open .drawer-sub`). Two notable details: (1) the link **underline moved from `::after` to `::before`** so `::after` is free for the dropdown **chevron** (added via Font Awesome `\f078` content, since standard menu output has no `<i>` chevron); (2) `.nav`/`.drawer-nav` get `list-style:none; margin:0; padding:0` (now `<ul>`s).
- **Drawer accordion JS** (`script.js`): standard menu output has no toggle button, so the drawer init now **injects a `.drawer-caret` button** into each `.menu-item-has-children` — the parent link still navigates, the caret expands/collapses its `.sub-menu`. Replaced the old `.drawer-toggle` handler.
- **ACF options page** "הגדרות אתר" + field group **registered in PHP** (`inc/acf-options.php`, hooked on `acf/init`) so definitions are version-controlled and deploy with the theme — the client only edits values. Tabs: Header (logo white/dark, phone label + number), Footer (tagline, hours repeater, copyright, accessibility/privacy URLs), Contact (pre-footer heading/text/image, contact phone/email/address + nav URL, WhatsApp number).
- **`cag_opt( $name, $fallback )`** helper reads `get_field($name,'option')` but is fully guarded by `function_exists('get_field')` and returns the fallback when ACF is inactive or the field is empty — so `header.php`/`footer.php` keep rendering the original hardcoded chrome even with ACF off. tel:/mailto:/wa.me links are derived from the stored numbers (digits stripped). Added `title-tag` theme support and removed the manual `<title>` from header.php.
- **Lint:** functions.php, inc/acf-options.php, header.php, footer.php all clean (`php -l`). **Not browser-verified** — the nav CSS/JS rewrite touches the global header on every page, so the dropdown-hover, drawer accordion, logo scroll-swap, and chevrons need a visual check.
- **Itamar must do in wp-admin (or the header nav is empty):** (1) Appearance → Menus → build the menu with parent items + children, assign it to **תפריט ראשי**; optionally a second menu → **תפריט פוטר**. (2) הגדרות אתר → fill logo/phone/footer/WhatsApp values (until then, fallbacks = current values show).
- **Lesson for the skill:** going dynamic with standard `wp_nav_menu` output (no walker) means (a) retargeting the static `.nav-item/.dropdown` CSS to `.menu-item-has-children/.sub-menu`, (b) re-homing any pseudo-element that collides with an injected chevron, and (c) injecting mobile-accordion toggles in JS (WP emits no toggle button). Always give `fallback_cb` a custom empty/known callback so an unassigned location doesn't dump `wp_page_menu`. Register ACF options pages/fields in PHP for repo-portability, and guard every `get_field()` so the theme degrades gracefully without the plugin.

### 2026-05-20 — Blog post content: native editor blocks auto-styled to match the design (no HTML for the client)

- **Problem:** the rich article styling (lead, checkmark list, numbered circles, quote box, "טיפ מקצועי" callout) relied on hand-authored classes (`.post-lead`, `.post-list`, `.post-numbered`, `.post-quote`, `.post-callout`). A non-technical client writing posts in the block editor would never produce those — so single posts would look plain.
- **Fix (Itamar's call — "configure it with the html selector"):** appended a "Native editor blocks → article styling" section to `assets/css/single.css` that maps the **bare HTML the editor emits** to the existing look, scoped under `.post-article`, mirroring the original `.post-*` values. The client just uses standard blocks:
  - **Quote block** (`blockquote`) → quote box.
  - **Bulleted list** (`ul`) → blue checkmark rows.
  - **Numbered list** (`ol`) → blue number circles.
  - **Lead intro** (exrept.png) → the post **Excerpt field**, printed by single.php as `<p class="post-lead">` *before* `the_content()`, styled by the existing `.post-lead`. (Superseded the original auto `:first-of-type` rule — see correction below.)
  - **Whole-italic paragraph** (`p:has(> em:only-child)`) → tip callout; bold a lead-in phrase for the box heading. *(Fix: the box reserves a fixed inline-start gutter (`padding-inline-start`) for the icon — initially only the `<strong>` heading was indented, so a heading-less callout had the info icon overlapping the first line of text. Gutter preserved in the 900px media query too.)*

  **Correction (after live review):** the lead was first done as `.post-article > p:first-of-type` (auto-style the first content paragraph). On a real post that started with an `<h2>`, that landed the lead treatment on a mid-flow paragraph and there was no proper intro. Per Itamar's call, switched the lead to the **Excerpt field**: single.php now renders `if ( has_excerpt() )` → `<p class="post-lead">…</p>` as the first thing inside `.post-article`, and the excerpt was **removed from the hero subtitle** to avoid showing the same text twice. The `:first-of-type` CSS rule (and its 900px variant) were deleted; `.post-lead` stays. **Lesson:** prefer an explicit, author-controlled source (the Excerpt field) over auto-detecting "the first paragraph" — content order varies (a post may open with a heading), so positional auto-styling is unreliable.
- **Robustness details:** every native selector is guarded with `:not(.post-list/.post-numbered/.post-quote/.post-lead)` so it never collides with — or double-renders icons over — any pasted custom-HTML that still uses the original classes (both systems coexist). Icons are injected via Font Awesome 6 `::before` (the class versions use real `<i>` tags). `:has(> em:only-child)` means inline italic of a few words stays normal italic — only a fully-italicized paragraph becomes a callout. No PHP/enqueue change: `the_content()` is already inside `.post-article`, and FA + design tokens already load on single posts.
- **Lesson for the skill:** for a static→WP port of a richly-styled article, don't expect editors to add CSS classes. Style the **native block output** (`.wp-block-*` / bare `blockquote`/`ul`/`ol`/`p`) under the content wrapper instead, reusing the prototype's values, and guard with `:not()` so it coexists with any literal-HTML content. Trigger conventions that map to a single editor action (whole-paragraph italic = callout, first paragraph = lead) keep authoring to zero extra clicks.
- **Open follow-ups (offered, not yet done):** (a) mirror the same styling into the **block editor** via `add_editor_style()` so the author previews it while writing (needs tokens + FA in the editor iframe); (b) map the **Image block** (`figure.wp-block-image`) to the `.post-figure` look — not in this pass since Itamar's list was blockquote/em/excerpt/ol/ul.

### 2026-05-20 — Batch 5: blog ported as NATIVE WP POSTS (home.php + single.php). All inner pages now done.

- First non-static port. Instead of hardcoding cards, the blog is driven by real WP posts via the Loop. **`blog/index.html` → `home.php`** (the posts index, shown for the page set in Settings → Reading → "Posts page"); **`blog/post/index.html` → `single.php`** (single post). These are template-hierarchy files, **not** custom page Templates — so the auto-enqueue helper and `is_page_template()` don't apply; everything keys off `is_home()` / `is_singular('post')` instead.
- **Itamar's two product decisions:** featured "hottest article" slot = **latest post automatically** (excluded from the grid so it doesn't appear twice); post list paging = **keep the static "load more" button as-is** (visual stub, no real loading — it just disables itself on click, exactly like the prototype). Logged so the next person doesn't mistake the stub for a bug.
- **home.php** — hero (static, video bg) + featured (a `WP_Query` for the latest 1 post, id captured) + posts grid (the main Loop, `continue`-skips the featured id) + category pills + load-more stub + mini-contact. **Category pills are generated from real WP categories** (`get_categories( hide_empty )`), each `data-filter="{slug}"`; every card carries `data-cat="{first category slug}"`, so the existing `blog.js` client-side filter keeps working. (Limitation: a multi-category post matches only its *first* category in the filter — fine for now.)
- **single.php** — post hero (featured image as `.hero-img`, category pill, title, excerpt as subtitle only `if ( has_excerpt() )`, meta = author/date/read-time) + `the_content()` inside `.post-article` + tags/share footer + related posts + mini-contact. The post CSS styles **generic** `.post-article h2/h3/p`, so normal editor content (plain `<p>`/`<h2>`) is styled without needing the prototype's hand-authored helper classes (`.post-lead`, `.post-list`, `.post-quote`, `.post-callout`, etc. still style any post that happens to use them).
  - **Related posts** = a `WP_Query` for up to 3 posts sharing the primary category, `post__not_in` the current post; the whole section renders only if matches exist.
  - **Tags** via `get_the_tags()` (rendered `#name`, linked to the tag archive); the tags row is hidden if the post has none. **Share buttons** kept verbatim — `single.js` wires them off `location.href` / `document.title`, which are correct per-post in WP.
- **Three small helpers added to functions.php** (reused across both templates): `cag_thumb_url($size)` — featured image with `assets/img/article1.jpg` fallback; `cag_reading_time()` — whitespace-token count ÷200 wpm (whitespace split, not `str_word_count`, so Hebrew counts correctly); `cag_blog_url()` — permalink of the posts page (Settings → Reading), else home.
- **Body classes:** the prototype scopes CSS with `.blog-page` (archive) and `.blog-post-page` (single). WP doesn't add those to `home.php`/`single.php`, so extended `cag_body_class_from_template` to append `blog-page` on `is_home()` and `blog-page blog-post-page` on `is_singular('post')`. Same root lesson as the videos `.videos-page` case: when prototype CSS is scoped by a body class WP won't supply, add it explicitly.
- **Enqueue:** `is_home()` → `blog.css` + `blog.js` + inner-hero + mini-contact. `is_singular('post')` → `blog.css` **and** `single.css` (single reuses the archive's `.article-card`/`.blog-grid` styles for related posts, exactly as the static post page loaded `../style.css`) + `single.js` + inner-hero + mini-contact. No `blog.js` on single (no filter/load-more there — matches the static post page, which didn't load the archive JS). Asset copies: `blog.css`, `blog.js`, `single.css`, `single.js`. No images copied (cards now use post thumbnails; only hero-compound.jpg + bg.mp4 + the article1.jpg fallback are referenced, all present). PHP-linted home/single/functions — clean.
- **Itamar next (different from the other pages — this needs real WP setup):**
  1. Create a Page titled e.g. "בלוג" (any slug). **Don't** assign it a template.
  2. Settings → Reading → **Posts page** = that page. (Front page stays your static homepage.)
  3. Create the post **Categories** you want the filter pills to show — suggested to match the prototype: כחול לבן, פוד טראקים, קראוונים, מגזר ביטחוני, תיירות ולינה.
  4. Write a few **Posts**, each with a **Featured image** (used by the hero + cards) and a category. Optionally set an **Excerpt** (used as the card text + the single-post subtitle; auto-generated if left blank). Add **Tags** if you want the tag row on single posts.
  5. Visit the blog page + a single post to verify.

### 2026-05-20 — Batch 4: ported contact-us, videos (2 pages). Only `blog` remains.

- Same recipe. Both pages render **inner-hero only** — neither has a `#mini-contact` or active `#site-faq` div, so no other template-parts. PHP-linted both + functions.php (clean). Zero asset copies (only `hero-compound.jpg` + `bg.mp4`, both present; Google Maps + YouTube are external).
- **contact-us** — straightforward: hero + 4 contact-method cards (tel/WhatsApp/mailto/Maps) + hours/Maps-embed section. The static page loaded `mini-contact.css`, `contact-shell.css`, and `faq.css`, **but rendered none of them**: there's no `#mini-contact` div and the `<div id="site-faq">` is commented out in the source. So I enqueued inner-hero only and did not include those parts (faithful to what actually rendered). Real contact submission already lives in the footer's `pre-footer-contact` form. The page's own `style.css` carries `.cu-*` styling and a `data:image/svg+xml` URI (not a file path → no rewrite). Its `main.js` has a leftover `.contact-us .contact-form` submit handler for a form that isn't in the markup → harmless no-op, copied verbatim.
- **videos — template basename is `videos-page.php`, not `videos.php` (deliberate).** The static body class was `videos-page` (not the slug `videos`), and the page CSS scopes its heading reset with `.videos-page h2/h3/h4`. Our `cag_body_class_from_template` filter derives the body class from the **template basename**, so naming the file `videos-page.php` makes the body carry `videos-page` and those selectors keep matching. Template Name in the editor is still **"Videos"**; assets are `assets/css/videos-page.css` + `assets/js/videos-page.js` (auto-enqueue derives from basename). functions.php block keys off `page-templates/videos-page.php`.
  - **Lesson:** when a static page's body class differs from its slug AND the page CSS is scoped by that body class, match the **template basename** to the static body class (not the slug). The body-class-from-template filter then reproduces the exact class the CSS expects, with no markup change and no extra hardcoded body class.
  - Content: hero + three `.vg-section` carousels (food-trucks / caravans / security), each a `.vg-carousel-wrap`; YouTube-thumbnail cards (`i.ytimg.com` thumbs kept verbatim, `data-video-id`/`data-title` preserved) that open a shared `.vid-lightbox` (kept after `</main>`, like the security-trailers/foodtrucks lightboxes). `main.js` builds the lightbox YouTube embed, the per-section carousels, and scroll animations — self-contained, copied verbatim. **Heads-up:** every card currently points at the same placeholder video id `OkAlWJ4C_Fs` — real ids need filling in later (a content task, not a migration one).
- **Itamar next:** create 2 WP pages (Hebrew titles, any slug, pick Template **"Contact Us"** / **"Videos"**), then verify. See "What I need from you".

### 2026-05-20 — Tier 2 / Batch 3: ported accessories, caravans, local-models (3 pages in one pass)

- Third batch, same recipe, one pass. Read all three static `index.html` + `style.css` + `main.js` up front. PHP-linted all four touched files (`php -l` via Local's bundled PHP 8.2.29 at `…\lightning-services\php-8.2.29+0\bin\win32\php.exe`) — all clean.
- **Zero asset copies.** Every referenced image already in the theme: `Lock.jpeg`, `wein.png`, `sterckeman_logo_small.jpg`, `tabbert.png`, `logo-knaus-mobile.png`, `Screenshot 2026-05-05 at 13.51.43.png`, `hero-compound.jpg` (all `assets/img/`); the `WhatsApp Image 2026-04-26 at 13.46.56*.jpeg` set + `bg.mp4` (`assets/uploads/`).
- **Grepped all three `style.css` for `url(` — none.** CSS + JS copied verbatim to `assets/css/{slug}.css` / `assets/js/{slug}.js`.
- **Templates** at `page-templates/accessories.php`, `caravans.php`, `local-models.php`. Standard strip (`<head>`, `<body>`, header/footer placeholder divs, bottom `<script>` block). Path transforms uniform: `/cag/` → `home_url('/')`; images → `get_theme_file_uri('assets/...')`; local-models breadcrumb `/cag/pages/kachol-lavan/` → `home_url('/kachol-lavan/')`; `#contact`/`#anchor` left as-is.
- **Shared template-parts (placeholder `<div>`s → `get_template_part()`):**
  - accessories: inner-hero + mini-contact. No FAQ (static had no `faq.css` / `#site-faq`).
  - caravans: inner-hero + faq. **No mini-contact** — static loaded no `mini-contact.css` and has no `#mini-contact` div.
  - local-models: inner-hero + mini-contact (mid-page, between the model rows and the features grid — order preserved) + faq.
- **`functions.php`:** three new `is_page_template()` blocks after the tourist-complexes one. Auto-enqueue helper untouched.
- **inner-hero judgment call (same as tourist-complexes in Batch 2):** `local-models` static loaded `inner-hero.css` but **not** `inner-hero.js` (its own `main.js` lazy-loads the hero video). Enqueued `cag_enqueue_inner_hero()` for all three anyway — bundles the hero CSS (all three need it) + canonical hero JS. Net: local-models **gains** the hero entrance animation; its `main.js` redundant video-load is harmless (`inner-hero.js` guards with `!heroVideo.src`). accessories' and caravans' `main.js` don't load the video at all, so inner-hero is strictly required there.
- **Flag — caravans `#contact` is a dead anchor (pre-existing, faithfully ported).** All 12 brand-model "לפרטים" buttons link to `#contact`, but caravans has no mini-contact section and the footer's `pre-footer-contact` has **no `id="contact"`** — so the links go nowhere, exactly as in the static site. Options for Itamar: (a) add a mini-contact section to caravans, (b) repoint those CTAs at a real contact page, or (c) give the footer form `id="contact"`. Left untouched pending his call.
- **Minor — local-models `main.js` has dead FAQ code (pre-existing, copied verbatim).** Lines 35–45 wire a single-open accordion against `.lm-faq-item`, but the shared FAQ part renders `.faq-item` (native `<details>`), so the handler matches nothing. Native `<details>` still works (allows multiple open). Harmless no-op; flagged only so nobody hunts for a bug later.
- **Itamar next:** create 3 WP pages in admin (Hebrew titles, any slug, pick the matching Template), then visit each and verify. See "What I need from you" below.

### 2026-05-20 — Tier 1 / Batch 2: ported security-trailers, caravan-camparks, tourist-complexes (3 pages in one pass)

- Second batch, same recipe as Batch 1, one pass. Read all three static `index.html`s + `style.css`s + `main.js`s up front, plus re-read the inner-hero / mini-contact / faq template parts to confirm IDs and JS behaviour before wiring enqueues.
- **No missing assets — zero copies needed.** All referenced images already in the theme from earlier work: `hero-compound.jpg`, `aboutimage.png`, `imagestacking.png`, `desert-caravan.jpg` (already in `assets/img/`); `bg.mp4`, the two `security/WhatsApp Image 2026-04-28 at 12.29.0{1,2}.jpeg`, and the `WhatsApp Image 2026-04-26 at 13.46.56*.jpeg` set (already in `assets/uploads/Images/`). Verified each path against the theme before writing the templates.
- **Grepped all three page `style.css` for `url(` — none.** CSS + JS copied verbatim to `assets/css/{slug}.css` / `assets/js/{slug}.js`; auto-enqueue picks them up. No CSS path-rewriting.
- **Templates created** at `page-templates/security-trailers.php`, `caravan-camparks.php`, `tourist-complexes.php`. Each: `Template Name:` header + `get_header()` + ported `<main>` + `get_footer()`. Stripped `<head>`, `<body>` tag, `#site-header`/`#site-footer` divs, and the bottom `<script>` block. **security-trailers** keeps its `.st-lightbox` markup after `</main>` (same placement as foodtrucks' lightbox).
- **Path transforms (uniform):** `/cag/` → `home_url('/')`; image refs → `get_theme_file_uri('assets/...')`; `#contact` / `#anchor` left as-is. Page-specific link maps: security-trailers breadcrumb `/cag/#security-sector` → `home_url('/#security-sector')` (homepage in-page anchor, same as security-living); tourist-complexes breadcrumb `/cag/pages/kachol-lavan/` → `home_url('/kachol-lavan/')`.
- **Google Maps `<iframe>`s in caravan-camparks left verbatim** (8 embeds — 7 `?q=…&output=embed` query embeds + 1 Street View `?pb=…` panorama). External URLs, no transform. The Hebrew place names in the query strings render fine.
- **Shared template-parts (replaced static placeholder `<div>`s with `get_template_part()`):**
  - security-trailers: inner-hero + mini-contact. **No FAQ** — static never loaded `faq.css` and has no `#site-faq`.
  - caravan-camparks: inner-hero + mini-contact + faq (all three).
  - tourist-complexes: inner-hero + mini-contact + faq. mini-contact sits **mid-page** (between the solutions grid and the model rows) — preserved that order.
- **`functions.php`:** added three `is_page_template()` blocks after the security-living one, mirroring the established pattern. Auto-enqueue helper untouched.
- **Judgment call — inner-hero on tourist-complexes:** the static `tourist-complexes/index.html` loaded `inner-hero.css` but **not** `inner-hero.js` (its own `main.js` lazy-loads the hero video instead, and the page had no hero entrance animation). I enqueued `cag_enqueue_inner_hero()` anyway for all three, because the helper bundles CSS+JS as a unit (all three need the hero CSS) and `inner-hero.js` is the canonical inner-page hero behaviour (lazy-load + entrance animation + ping-pong loop). Net effect on tourist-complexes: it now **gains** the hero entrance animation, matching its siblings. The redundant video-load in its `main.js` (and caravan-camparks' `main.js`) is harmless — `inner-hero.js` guards with `if (heroVideo.dataset.src && !heroVideo.src)`, so whichever runs first wins and the other no-ops. **security-trailers' `main.js` does NOT load the video at all**, so inner-hero is strictly required there.
- **Observation (pre-existing, not touched):** `mini-contact.js` and `faq.js` are static-era fetch-and-inject scripts that look for `#mini-contact` / `#site-faq` placeholder divs. In WP those divs don't exist (replaced by server-rendered `get_template_part()` output: `<section class="mini-contact" id="contact">` and `<section class="faq-section" id="faq">`), so both scripts hit `if (!host) return;` and no-op. Consequence: the FAQ accordion still works (native `<details>`/`<summary>`) but the mini-contact **form submit handler** (preventDefault + "תודה!" success message) never wires up — affects every ported page that uses mini-contact, including Batch 1. The enqueue helpers still load these JS files. Left as-is to stay consistent with Batch 1; flagged here as a candidate cleanup (either gut the obsolete fetch code and re-wire the form against `#contact`, or stop enqueuing the JS).
- **Itamar next:** create 3 WP pages in admin (Hebrew titles, any slug, pick the matching Template), then visit each and verify. See "What I need from you" below.

### 2026-05-20 — Tier 1 / Batch 1: ported kachol-lavan, foodtrucks, security-living (3 pages in one pass)

- First multi-page batch using the established recipe. No improvisation — followed the per-page steps to the letter. Took the batch in one pass: read all three static `index.html`s up front to inventory referenced assets, copied missing images once, then created the three templates back-to-back. Saved a roundtrip vs. doing one page at a time.
- **Missing images copied (one-time prep):** 8 `WhatsApp Image 2026-04-26 at 13.46.56*.jpeg` files from `cag/uploads/Images/` → `wp-theme/cag-theme/assets/uploads/Images/`. Already-present images (hero-compound.jpg, bg.mp4, imagestacking.png, aboutimage.png, both security/ jpegs) reused as-is. The foodtrack/ subfolder images were already in the theme from the homepage port — not referenced by these three pages.
- **Grepped page CSS for `url(`** before copying — none of the three has any. No CSS path-rewriting needed; CSS files copied verbatim to `assets/css/{slug}.css` and JS to `assets/js/{slug}.js`, auto-enqueue picks them up.
- **Templates created** at `page-templates/kachol-lavan.php`, `foodtrucks.php`, `security-living.php`. Each one: `Template Name:` header + `get_header()` + ported main + `get_footer()`. Stripped the static `<head>`, `<body>` tag, header/footer placeholder divs, and bottom `<script>` block — all handled by header.php/footer.php/enqueue.
- **Path transforms applied uniformly across all three:** `/cag/` → `home_url('/')`; `/cag/pages/{slug}/` → `home_url('/{slug}/')`; image refs → `get_theme_file_uri('assets/...')`. Breadcrumb middle-link in security-living (`/cag/#security-sector`) preserved as an in-page anchor on the homepage.
- **Shared template-parts (replaced static `<div id="...">` placeholders with `get_template_part()`):**
  - kachol-lavan: inner-hero (inline hero markup, same pattern as about-us), mini-contact, faq → all 3.
  - foodtrucks: inner-hero, mini-contact, faq → all 3. Note the static page has the mini-contact div sandwiched between sections — preserved the order; sections render around it without changes.
  - security-living: inner-hero, mini-contact only — the static page never loaded faq.css and has no `#site-faq` div, so no faq part.
- **`functions.php` per-template blocks added:** three `is_page_template()` conditionals, mirroring the about-us pattern. The auto-enqueue helper continues to pick up `{slug}.css`/`{slug}.js` automatically — no changes to it.
- **Hidden sections kept verbatim:** kachol-lavan's static has two trailing sections (`.kl-about-section` and `.kl-projects-section`) with `style="display:none;"`. Kept as-is — they were intentionally hidden in the static prototype and may be reactivated later; nothing to gain from removing them at this step.
- **Inline `style=` attributes preserved** (e.g. `style="color:var(--blue-700);font-weight:700;"` inside `<strong>` tags, the `.kl-about-section` h2 font-weight override, the about-us-clone img sizing). Static-site decisions, not worth rewriting now.
- **Itamar next:** create 3 WP pages in admin (titles in Hebrew, any slug, pick the matching Template from the sidebar), then visit each and verify. See "What I need from you" below.

### 2026-05-20
- Cloned `oneofus-in/cag` into `c:/Users/snoofkin/ProjectCag/cag/`.
- Confirmed git push/pull access (Itamar / itamar@oneofus.in, Credential Manager active).
- Analyzed codebase — confirmed all 13 inner pages built out, shared-component loader pattern, GSAP-driven animations. See conversation summary.
- Created this migration log.
- **Decided: local dev with Local WP.** New site will live at `C:\Users\snoofkin\Local Sites\<site-name>\app\public\` (path TBD once Local creates it).
- **Decided: folder strategy = Option 2 (symlinked theme).** Custom theme will live at `c:/Users/snoofkin/ProjectCag/cag/wp-theme/cag-theme/` inside this repo, symlinked into Local's `wp-content/themes/cag-theme`. Keeps everything in one git repo, pushable to GitHub.
- **Decided: deployment = All-in-One WP Migration plugin** → `.wpress` export → import on SiteGround (or wherever). The symlink is invisible to the migration tool; the exported bundle contains real theme files.
- Itamar created Local site `cag-wp` at `C:\Users\snoofkin\Local Sites\cag-wp\`, URL `http://cag-wp.local/`. Confirmed WP install structure intact.
- Confirmed Windows Developer Mode is ON.
- Scaffolded minimal theme in repo: `wp-theme/cag-theme/style.css` (theme header) + `index.php` (smoke-test page).
- Created symlink: `Local Sites\cag-wp\app\public\wp-content\themes\cag-theme` → `ProjectCag\cag\wp-theme\cag-theme`. Verified via bash that both paths show identical files.
- Itamar activated the "CAG" theme; smoke-test page rendered at `cag-wp.local`. End-to-end pipe (repo → symlink → WP) confirmed working.
- **Step "globals & design system" done.** Added the design-system tokens (`:root` with blue/ink scales, shadows, radii, fonts, container, transition), base resets, `.container`, `.gradient-text`/`.gradient-text-light` directly into the theme's `style.css` (the WP-mandatory main stylesheet — no parallel `design-system.css`). Created `functions.php` that enqueues Google Fonts (Rubik + Frank Ruhl Libre + Heebo) and `style.css`, with style.css depending on the fonts so order is guaranteed.
- Itamar refreshed `cag-wp.local`, confirmed Rubik loading and the design system is live.
- **Step "shared components → template parts" done.** Identified the 3 reusable trios in static `shared/` (faq, inner-hero, mini-contact). Created `wp-theme/cag-theme/template-parts/` with three subfolders, copied the 9 files into them. HTML files renamed `.html → .php` so they'll be ready for `get_template_part()` later; CSS/JS extensions preserved.
- Pre-flight check before renaming `.html → .php`: grepped for `<?` in the static HTML files (would cause unintended PHP parsing). None found, safe to rename.
- Not in scope for this step (deferred): `header.html` / `footer.html` (become root theme files later), `shared.css` / `contact-shell.css` (will be enqueued globally), `components.js` (obsolete in WP — server-side `get_header()`/`get_footer()` replaces it).
- **Step "header + footer" done.** Created `header.php` (WP boilerplate + ported header.html + drawer markup) and `footer.php` (pre-footer-contact + footer markup + WhatsApp float button). Replaced `index.php` smoke test with a minimal fallback that calls `get_header()` / `get_footer()`. Copied 3 images (logo, logo_white, aboutimage) into `assets/img/` and `shared.css` into `assets/css/`. Updated `functions.php` to enqueue Font Awesome (CDN, 6.5.1) and `shared.css` (deps on `cag-style` so design tokens load first).
- **URL strategy used in templates:** all internal URLs converted to `<?php echo esc_url( home_url('/path/') ); ?>` so the site is portable (works on cag-wp.local AND on SiteGround post-migration). Stripped the `/cag/` and `/pages/` prefixes from the static URLs so paths anticipate WP's structure (`/about-us/`, etc.). Inner-page links will 404 until those WP pages exist — expected for now.
- **Image URLs used:** `<?php echo esc_url( get_theme_file_uri( 'assets/img/X' ) ); ?>` — also portable.
- **Not in scope (deferred to next step):** `script.js` for drawer toggle, hamburger animation, scroll-triggered `.scrolled` class on header. Visual styling works; interactivity does not.
- **Step "homepage port" done.** Used `front-page.php` (WP canonical name for homepage template; not `homepage.php`). Ported the full body of static `index.html` (~575 lines) into `front-page.php` — hero with GSAP-pinned video, 4 model cards, about section, foodtrack gallery, authorities strip, security panels, catalog with tabs, articles with 3 tabs (blog/newsletters/press), social marquee. Stripped the `<head>`, `<body>`, `#site-header` placeholder, `#site-footer` placeholder, `<script>` tags (now handled by enqueue), and `.float-wa` (now in footer.php).
- **Image and link transforms applied:** all `/cag/assets/img/X` → `<?php echo esc_url( get_theme_file_uri( 'assets/img/X' ) ); ?>`. All `/cag/uploads/X` → same with `assets/uploads/X`. Internal page links normalized to `home_url('/slug/')` (dropped `/cag/pages/`). In-page anchors (`#models`, `#contact`, etc.) kept as-is.
- **Asset copies:** all 14 images in `assets/img/`, two CSS files (`shared.css`, `styles.css`), `script.js`, `bg.mp4` (hero video, ~12MB), 3 foodtrack WhatsApp jpegs, 2 security WhatsApp jpegs. Total ~30 files in theme `assets/`.
- **Enqueue additions in `functions.php`:** GSAP 3.12.5 + ScrollTrigger from cdnjs (both `in_footer=true`), `script.js` (depends on ScrollTrigger, in footer), conditional `styles.css` (only via `is_front_page()`). Order matches static cascade: fonts → font-awesome → cag-style (tokens) → cag-shared (chrome) → cag-homepage (front-page only).
- Homepage verified rendering. GSAP hero scroll animation, drawer toggle, header scroll state, catalog/articles tabs, social marquee, WhatsApp button — all working.
- **Step "first inner page (about-us)" done — establishing the pattern for all inner pages.**
  - Created `page-about-us.php` at theme root (WP auto-picks for the page with slug `about-us`).
  - Page-scoped assets copied to `assets/css/pages/about-us.css` and `assets/js/pages/about-us.js`.
  - The hero markup is inline in the page template (5 au-row sections + FAQ template part at bottom).
  - Replaced the static site's client-side `<div id="site-faq"></div>` injection with server-side `get_template_part( 'template-parts/faq/faq' )`.
  - **Added 3 reusable helper functions** to `functions.php` — `cag_enqueue_inner_hero()`, `cag_enqueue_faq()`, `cag_enqueue_mini_contact()` — for any page template to call when it uses one of those template parts. Keeps per-page enqueue blocks short.
  - **Added `body_class` filter** that injects the page slug as a body class (so the static site's `.about-us .au-row-section { ... }` selectors keep working without rewriting the CSS).
- **Established pattern for inner pages (use for the rest):**
  1. Create `wp-theme/cag-theme/page-templates/{name}.php` with a `Template Name:` header comment and the ported markup. (Flat depth-1 layout — WP auto-scans it; no filter needed.)
  2. Drop page-scoped CSS at `assets/css/{name}.css` and JS at `assets/js/{name}.js`. The auto-enqueue helper (`cag_auto_enqueue_template_assets()`) picks them up by convention from those exact paths.
  3. In `functions.php`, the **only** edit per template: a tiny conditional block listing which template-parts the page uses (e.g. `if ( is_page_template( 'page-templates/foo.php' ) ) { cag_enqueue_inner_hero(); cag_enqueue_faq(); }`). If a template uses no shared parts, no edit needed at all.
  4. In wp-admin, edit any WP page and pick the template from the **Template** dropdown in the page sidebar.

### 2026-05-20 — All custom assets live under `assets/`, not next to their PHP templates (file-organization convention)

- **Context:** After CSS consolidation (next entry), `front-page.css` lived at theme root next to `front-page.php`, and per-page assets like `about-us.css/.js` lived inside `page-templates/` next to `about-us.php`. The reasoning was "CSS lives next to the PHP template it belongs to."
- **What was suboptimal:** Internally consistent, but **externally inconsistent** with the rest of the theme — all other assets (images, JS, uploads) lived under `assets/`. So custom CSS had a different rule than custom JS or images, which is confusing. And the root folder started accumulating files.
- **Fix / convention adopted:** **All custom CSS in `assets/css/`. All custom JS in `assets/js/`. Templates (PHP) stay wherever WordPress needs them** (theme root for `front-page.php`, `page-templates/` for custom-name templates, etc.). One mental rule for assets, one for templates. The auto-enqueue helper now derives paths by basename only: `assets/css/{name}.css`, `assets/js/{name}.js` — same derivation whether the template is at theme root or in a subfolder.
- **Lesson for the skill:** Decouple **asset location** from **PHP-template location** in WP themes. WP forces certain PHP files to specific paths (`style.css`, `front-page.php`, `header.php`, etc.) — but it imposes nothing on where assets live. Pick one home (`assets/`) for all custom assets and stick to it. Resist the "co-locate everything for the same feature" instinct here; it creates a different rule for every template's CSS than for the theme's images/JS, and the inconsistency adds cognitive load. The "files together" benefit is small because the auto-enqueue helper makes the connection explicit anyway.

### 2026-05-20 — CSS consolidation: from 3 files with duplicates to 2 files with one job each (CRUCIAL — read before porting CSS on any project like this)

- **Context:** After porting the homepage + first inner page, we had **three** CSS files:
  1. `style.css` at theme root — design tokens + resets + utilities.
  2. `assets/css/shared.css` (~755 lines) — chrome (header, drawer, footer, buttons, pre-footer, float-wa) **but with `:root`/resets/`.container`/`.gradient-text` duplicated at the top**.
  3. `assets/css/styles.css` (~2025 lines) — homepage sections (hero, models, articles, marquee, etc.) **but with `:root`/resets duplicated at the top AND most of the chrome from shared.css duplicated mid-file**.
  Inner pages loaded files 1+2 (with the design tokens defined twice). The homepage loaded all three (with tokens defined three times and chrome defined twice). About ~430 lines of CSS were redundant on the homepage and ~90 on inner pages.
- **Where the duplication came from:** The **static site** loaded `shared.css` *or* `styles.css` per page, never both — so chrome was copy-pasted into both files to avoid breaking either. In WP we load conditionally, so the duplication has no purpose anymore.
- **The wrong "fix" — DO NOT DO THIS:** Merge **everything** (tokens + chrome + homepage sections) into one giant `style.css`. Looks "simple" but inner pages then download ~1500 lines of homepage-specific CSS (hero animations, model cards, marquee tracks) that they never use. ~25KB+ wasted per inner-page load. We explicitly considered and rejected this because the whole point of `is_front_page()` conditional enqueueing is to avoid exactly that.
- **The right consolidation (what we did):**
  1. Merge `shared.css` into `style.css` (theme root). One stylesheet at theme root carries the design system AND all site chrome. Loads on every page via `get_stylesheet_uri()`.
  2. Extract the homepage-unique sections from `styles.css` into `front-page.css` at theme root. Loads only when `is_front_page()` is true.
  3. **Delete** the old `assets/css/shared.css` and `assets/css/styles.css` entirely. Delete the now-empty `assets/css/` directory.
  4. Per-page templates keep their own CSS next to their `.php` (e.g. `page-templates/about-us.css`) — unchanged.
  - Result: **one file per scope.** Global stuff lives in `style.css` (loaded everywhere). Homepage-only stuff lives in `front-page.css` (conditional). Inner-page stuff lives in `page-templates/{name}.css` (auto-enqueued by convention). No duplicates anywhere.
  - Line-count went from 117+755+2025 = 2897 → 800+1468 = 2268 (~22% reduction, exactly the duplicated content).
- **Judgment calls flagged during the extraction** (kept in front-page.css as homepage-only overrides — drop if you intentionally moved the chrome elsewhere):
  - `.header { top: 50px; }` and `.header.scrolled { top: 0; }` — homepage header sits below a 50px topbar slot, inner pages sit at the top.
  - The full `.contact` / `.contact-shell` / `.contact-form` block (~200 lines) — distinct from `.pre-footer-contact` / `.pfc-*` in chrome. Different markup, different class names. Kept since it might still be referenced.
- **Lesson for the skill (the rule of thumb):**
  - **One CSS file = one scope.** Three valid scopes: "every page" (global), "this single page" (per-template), "this section across multiple pages" (component / template-part).
  - **Never split a scope into two files** ("globals.css" + "tokens.css" — no real benefit, see earlier lesson).
  - **Never merge two scopes into one file** ("global + homepage" — pays cost on every inner page).
  - When porting a static site to WP, **always audit for duplicated headers/chrome across multiple stylesheets** — it's almost always a leftover from the static site's "one file per page" loading pattern and serves no purpose in WP's conditional-enqueue world.
  - Delete files you no longer need; don't leave them as "just in case." Empty `assets/css/` directory — remove it too. Cruft attracts more cruft.

### 2026-05-20 — Nested-folder templates don't appear in the editor dropdown (depth-1 scan limit), then refactored to flat layout

- **Context:** Switched to the "Template Name:" mechanism with templates at `page-templates/{name}/{name}.php`. The Template dropdown never appeared.
- **What went wrong:** WordPress core's `WP_Theme::get_post_templates()` calls `$this->get_files( 'php', 1, true )` — depth 1 only. Our `Template Name:` comment was at depth 2, so WP silently never saw it. No error, just no dropdown.
- **First fix (kept the nested folders):** Register templates explicitly via the `theme_page_templates` filter — `add_filter` with an array of `'path/to/template.php' => 'Human Name'`. Works at any depth.
- **Better fix (adopted):** Flatten the layout. PHP at depth 1 in `page-templates/{name}.php` with its sibling `{name}.css` and `{name}.js` next to it (WP's PHP scan ignores .css/.js so they're invisible to it but visually grouped for humans). No filter at all. Plus added `cag_auto_enqueue_template_assets()` — a one-time helper that derives the .css/.js path from the active template path and enqueues whichever exist. **Result: adding a new page template requires editing functions.php only if the page uses shared template-parts (faq/inner-hero/mini-contact).**
- **Lesson for the skill:** WordPress auto-scans `Template Name:` headers only at depth 1. Two ways to live with this:
  1. Keep nested folders → register via `theme_page_templates` filter (one line per template).
  2. **(Preferred)** Keep templates flat at depth 1 with their CSS/JS as siblings in the same folder. Use an auto-enqueue helper that derives asset paths from `get_page_template_slug()`. Zero registration boilerplate, zero per-template asset enqueue boilerplate. Only edit `functions.php` per-template if you need to call template-part helpers.
- Silent failure (no error when depth-2 templates are invisible) makes this confusing to debug. If a Template Name comment "should be working" but the dropdown is empty, suspect file depth before suspecting cache.

### 2026-05-20 — Switched from slug-based template matching to explicit Template Name choice

- **Context:** First inner page port (about-us). Initial pattern used `page-{slug}.php` at theme root, which WP auto-applies to pages whose slug matches.
- **What went wrong:** Slug-coupled templates force the page's URL to dictate which template renders it. For a Hebrew site this is brittle — Hebrew titles auto-generate URL-encoded slugs that don't match `about-us`, so the user would have to remember to manually override every slug to English. And reusing the same template across multiple pages is impossible.
- **Fix / workaround:** Switched to the `Template Name:` PHP comment mechanism. Templates now live in `page-templates/{name}/{name}.php` with a `Template Name: ...` doc comment. In wp-admin, the editor shows a "Template" dropdown — user explicitly picks which template to apply. `functions.php` swapped `is_page( 'about-us' )` → `is_page_template( 'page-templates/about-us/about-us.php' )`. Body-class filter swapped from "page slug" to "template basename" so `.about-us` body class derives from `about-us.php` regardless of the page slug.
- **Lesson for the skill:** Default to the `Template Name:` mechanism for page templates, not slug-based `page-{slug}.php`. Slug-matching couples URL choice to layout choice — fine for trivial sites, fragile for multilingual ones and for any template reused across pages. The explicit dropdown also makes the WP editor experience more discoverable: the user can see which template is in effect without having to know the file-naming convention.
- **Where to put the assets:** Keep the .css/.js/.php together inside one folder per template (mirrors the `template-parts/` pattern). Don't fragment them into separate `assets/css/pages/` and `assets/js/pages/` folders — one folder = one mental unit.

- **Step "CSS consolidation" done (crucial — see lesson below).** Merged `shared.css` into the theme's `style.css` (now the single global stylesheet at theme root, ~800 lines: design system + chrome). Extracted the homepage-unique sections into a new `front-page.css` at theme root (~1468 lines, loaded only via `is_front_page()`). Deleted `assets/css/shared.css` and `assets/css/styles.css` and removed the now-empty `assets/css/` directory. Updated `functions.php`: dropped the `cag-shared` enqueue, renamed `cag-homepage` → `cag-front-page` with new path, updated every dep from `cag-shared` → `cag-style` (in the auto-enqueue helper and all three `cag_enqueue_*` template-part helpers). Total CSS line count: 2897 → 2268 (-22%), all eliminated lines were duplicates.
- **Next step:** Itamar refreshes the homepage AND `/אודותינו/` page to verify both still render identically. Especially watch for: the floating WhatsApp button (was in shared.css `.float-wa`), the gradient buttons (`.btn-primary` was in shared.css), the contact form section (the `.pre-footer-contact` chrome). If anything looks off, the consolidation may have lost a rule. Then we pick the next inner page.

---

## What Didn't Go Well (lessons captured live)

> Every time we hit a snag, blocker, or "I wish I'd known X before Y" — log it here so the future skill can warn the next person.

### 2026-05-20 — Removing the hero subtitle silently broke the whole single-post hero (shared JS depended on it)

- **Context:** moving the post excerpt from the hero subtitle to the body lead, I deleted the `.hero-text` element from `single.php`. It looked safe — `.hero-text` is `display:none` on single anyway.
- **What went wrong:** `inner-hero.js` (the shared entrance animation) does `gsap.set(heroFrame, { opacity: 0 })` first, then `gsap.set([heroP, heroActions], …)` where `heroP = querySelector('.hero-text')`. On single, `heroActions` was always null, so the array was `[<p>, null]` — GSAP tolerates one null. After deleting `.hero-text` it became `[null, null]` (all-null), which **throws**, so the entrance timeline that animates the frame back to `opacity:1` never runs. Result: the **entire hero** (featured image + title + breadcrumb + meta) stayed invisible — a blank white band. It read as "the thumbnail stopped showing."
- **I initially mis-diagnosed it.** I reasoned "GSAP is defensive, won't throw on null targets" and told Itamar my change wasn't the cause. The blank-hero screenshot proved the timeline wasn't running — i.e. it *did* throw. **The user's correlation ("it broke right after that change") was correct and I should have trusted it over my mental model of GSAP.**
- **Fix:** keep a hidden `<p class="hero-text" aria-hidden="true"></p>` in the single hero (always output, not conditional) so the animation always has its target. Invisible via the existing CSS; zero visual impact. Lint clean.
- **Lesson for the skill:** before deleting an element from a template, grep the theme's JS for its selector/class — shared animation/interaction scripts may target it positionally. A "hidden, unused" element can still be load-bearing for JS. And: an all-null GSAP target array throws (a single null among valid ones is tolerated) — so removing the *last* element a `gsap.set([...])` references is exactly the trap. When a user reports a regression right after a specific change, trust the temporal correlation and re-open that change first. (Follow-up offered: harden `inner-hero.js` to filter null targets so it no longer depends on `.hero-text` existing — deferred since it's shared across every inner hero and needs in-browser testing.)

### 2026-05-20 — Blog featured images: theme never declared `post-thumbnails` support

- **Context:** After porting the blog to native WP posts (Batch 5), Itamar reported the post editor had **no "Featured image" option at all**.
- **What went wrong:** The theme was scaffolded minimally and never called `add_theme_support( 'post-thumbnails' )`. Without it WordPress (a) hides the Featured image panel in the editor and (b) makes `the_post_thumbnail()` / `has_post_thumbnail()` always return empty. So `home.php`/`single.php` would have *silently* shown the `article1.jpg` fallback for every post, and there was no way to set a real image. The blog templates were written assuming thumbnail support that didn't exist.
- **Fix:** Added a `cag_theme_setup()` on `after_setup_theme` with `add_theme_support( 'post-thumbnails' )` (plus `automatic-feed-links` and `html5`). Featured image panel appears immediately on reload; existing posts can now have images set.
- **Lesson for the skill:** A from-scratch theme has **no** default `add_theme_support`. Before (or as part of) writing any template that calls `the_post_thumbnail()`, `the_custom_logo()`, post formats, title-tag, etc., add the matching `add_theme_support()` in an `after_setup_theme` hook. For a static-to-WP port this is easy to miss because the static pages used plain `<img>` tags — the need for thumbnail support only appears the moment the blog becomes real posts. Check this the same time you write the Loop, not after the client notices the missing panel.

### 2026-05-20 — Symlink creation needed `mklink`, not PowerShell's `New-Item`

- **Context:** Setting up the theme symlink from Local's themes folder to the cag repo. Developer Mode was confirmed ON.
- **What went wrong:** `New-Item -ItemType SymbolicLink ...` failed with "Administrator privilege required" even with Dev Mode on. Probably a PowerShell session/token quirk.
- **Fix / workaround:** Used `cmd /c mklink /D "<link>" "<target>"` instead. Worked instantly without elevation.
- **Lesson for the skill:** On Windows with Dev Mode on, prefer `mklink /D` (directory junction-style symlink) over PowerShell's `New-Item -ItemType SymbolicLink`. The latter sometimes still demands elevation in non-elevated PowerShell sessions.

### 2026-05-20 — Almost split the design system into its own file for no real reason

- **Context:** First step of the CSS port — "copy globals and design system into the WP theme."
- **What went wrong:** I proposed creating a separate `design-system.css` to hold `:root` tokens, resets, and a couple of utilities. Itamar (correctly) asked: "why not just put it in style.css?"
- **Fix / workaround:** Put the design tokens at the top of the theme's required `style.css`, right under the theme header comment. One file, one enqueue, no extra ordering concerns. The static site has the same mental model (one big `styles.css`).
- **Lesson for the skill:** Every WP theme already has a mandatory `style.css` with the theme header. Default to expanding it for global styles instead of creating parallel files. Only split a CSS file out when (a) it loads conditionally on certain pages/template parts, or (b) it's literally shared across multiple themes. "Cleanliness" and "separation of concerns" alone are not justifications — they create cognitive overhead without delivering anything concrete. Reuse the WP convention (`style.css` = main theme stylesheet) instead of inventing a parallel one.

### 2026-05-20 — User pre-created the theme folder before the symlink step

- **Context:** I described what the symlink would point to (`wp-content/themes/cag-theme/` with style.css + index.php inside). The user, anticipating, manually created that folder in Local and put files inside.
- **What went wrong:** That created a duplicate of the repo files in a separate physical location — they would have drifted the moment we edited one. The whole point of the symlink is to have a single source of truth.
- **Fix / workaround:** Deleted the duplicate folder, recreated it as a symlink to the repo. No data lost — the files were near-duplicates of what was already in the repo.
- **Lesson for the skill:** Before describing the symlink target path to a non-technical user, **explicitly say**: "don't create this folder yourself — I'll create it as a symlink, not a real folder." Otherwise people will helpfully pre-make it. Also: when something pre-exists at the symlink target path, always inspect (`Test-Path` + `Get-Item` for ReparsePoint attribute) before deleting — never assume.

---

## Reference Files in This Repo

- [project.md](project.md) — original v2 design/content spec
- [design-system.md](design-system.md) — colors, type, spacing tokens
- [index.html](index.html) — homepage source of truth
- [shared/](shared/) — header, footer, inner-hero, faq, mini-contact partials
- [assets/css/styles.css](assets/css/styles.css) — page-specific styles
- [shared/shared.css](shared/shared.css) — base/nav/footer styles
- [assets/js/script.js](assets/js/script.js) — GSAP + interactions

---

## End-state Skill (write at the very end)

When the migration is done, distill this log into a **brand-new** skill — do NOT edit any existing skill. Name TBD (`/static-to-wp`, `/html-to-wordpress`, or similar). It should capture:
- The actual ordering that worked (no upfront plan, only what we learned by doing)
- The pitfalls from "What Didn't Go Well"
- RTL/Hebrew-specific WP gotchas we hit
- File-mapping pattern (static partial → WP template part)
- ACF conventions: PHP-registered options page + field groups (repo-portable), `cag_opt()` guarded reads with fallbacks, and the **`url` field = external-only, `link` field = everything else** rule.
- CF7 conventions: shortcode `html_class` matches the prototype form class to reuse existing CSS; `wpcf7_autop_or_not` → `__return_false`; thin retarget layer for CF7-only markup; field HTML is admin-authored + DB-resident (document form IDs + required wrapper classes for rebuild on a fresh install).

Location target: `~/.claude/skills/<new-skill-name>/` (exact name + structure decided at the end).
