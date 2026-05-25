# CAG URL Migration - full audit (old cag.co.il GSC URL -> outcome)

Source: [Table.csv](Table.csv) (186 indexed URLs). New site verified against its Yoast sitemaps + REST API on 2026-05-25.

**Redirection CSV column order:** `source,target,regex,code`. Import at wp-admin -> Tools -> Redirection -> Import/Export -> Import file [redirects-import.csv](redirects-import.csv).

**Legend:** IDENTICAL = same URL on new site, no action ; RENAME = new slug changed to old (see [slug-renames.sh](slug-renames.sh)) ; 301 = redirect row in the CSV ; REGEX = covered by the single /listings/* attachment rule ; PDF = re-upload file manually.

| # | Old path | Outcome |
|---|---|---|
| 1 | `/listings/חבל-לקשירה-והידוק-מטען-טרם-נסיעה/` | IDENTICAL - no action |
| 2 | `/אודותינו-א-ג-נגררים-וקרוואנים/` | RENAME - new page slug set to this old slug |
| 3 | `/קרוואן-למכירה/` | RENAME - new page slug set to this old slug |
| 4 | `/listings/שרשרת-נעילה-14-ממ-מפלדה-מחוסמת/` | IDENTICAL - no action |
| 5 | `/listings/ממיר-מתח-לקראון-12v-2000watt/` | IDENTICAL - no action |
| 6 | `/השכרת-קרוואנים/` | 301 -> / |
| 7 | `/listings/גנרטור-מושתק-לקראוון/` | IDENTICAL - no action |
| 8 | `/listings/קרוואן-tabbert-דגם-puccini/` | IDENTICAL - no action |
| 9 | `/קרוואן-נגרר-איתך-לאורך-כל-הדרך/` | 301 -> /blog/ |
| 10 | `/סרטונים-שלנו-א-ג-קרוואנים/` | RENAME - new page slug set to this old slug |
| 11 | `/` | IDENTICAL - no action |
| 12 | `/listings/סנדל-נעילה-לגלגל-הקרוואן/` | IDENTICAL - no action |
| 13 | `/קראוון-נייד-יכול-להביא-את-השינוי/` | 301 -> /blog/ |
| 14 | `/listings/מטען-מצברים-12-24v-10ah-genius10/` | IDENTICAL - no action |
| 15 | `/קראוונים-weinsberg/` | 301 -> /listings/ |
| 16 | `/listings/קרוואן-weinsberg-דגם-450fu/` | IDENTICAL - no action |
| 17 | `/listings/קרוואן-knaus-דגם-550fsk/` | IDENTICAL - no action |
| 18 | `/מאמרים-קרוואנים/page/2/` | 301 -> /blog/ |
| 19 | `/קרוואן-לטיולים/` | 301 -> /blog/ |
| 20 | `/קרוואן-נגרר/` | 301 -> /blog/ |
| 21 | `/הצצה-אל-העתיד-בית-על-גלגלים/` | 301 -> /blog/ |
| 22 | `/5-צעדים-לבחירת-קראוון/` | 301 -> /blog/ |
| 23 | `/wp-content/uploads/2025/02/כתבה-מלחמת-חרבות-ברזל.pdf` | PDF - re-upload to same path |
| 24 | `/אביזרי-נעילה-לקראוונים/` | 301 -> /אביזרים-נלווים-לקראוונים/ |
| 25 | `/אנחנו-בשטח/` | 301 -> / |
| 26 | `/listings/מנשא-אופניים-לקרוואן/` | IDENTICAL - no action |
| 27 | `/אביזרים-נלווים-לקראוונים/ktg-weinsberg-2017-2018-caraone-450fu-hot-bett-9822-2_72dpi_lowres/` | 301 -> /אביזרים-נלווים-לקראוונים/ |
| 28 | `/listings/קרוואן-weinsberg-דגם-390qd/` | IDENTICAL - no action |
| 29 | `/קראוונים-נגררים-בתקופת-הקורונה/מתחם-היבדק-וסע-של-מדא-בלוד-בדיקות-קורו/` | 301 -> /blog/ |
| 30 | `/listings/קרוואן-tabbert-דגם-da-vinci/` | IDENTICAL - no action |
| 31 | `/listings/קרוואן-tabbert-דגם-rossini/` | IDENTICAL - no action |
| 32 | `/listings/sterckeman-easy-390cp/` | IDENTICAL - no action |
| 33 | `/listings/מנעול-לכף-ריתום-2/` | IDENTICAL - no action |
| 34 | `/listings/מנעול-לכף-ריתום/` | IDENTICAL - no action |
| 35 | `/קרוואנים-weinsberg-tab-knaus-tabbret/` | 301 -> /listings/ |
| 36 | `/listings/קרוואן-weinsberg-דגם-550uk/` | IDENTICAL - no action |
| 37 | `/listings/sterckeman-easy-496pe/` | IDENTICAL - no action |
| 38 | `/listings/sterckeman-evolution-496pe/` | IDENTICAL - no action |
| 39 | `/listings/קרוואן-weinsberg-דגם-550qdk/` | IDENTICAL - no action |
| 40 | `/בית-על-גלגלים-הבית-תמיד-כאן/` | 301 -> /blog/ |
| 41 | `/השוואת-קרוואנים/` | 301 -> /listings/ |
| 42 | `/listings/` | IDENTICAL - no action |
| 43 | `/קראוונים-sterckeman/` | 301 -> /listings/ |
| 44 | `/listings/גנרטור-2000-וואט-zakco/` | IDENTICAL - no action |
| 45 | `/listings/קרוואן-tabbert-דגם-vivaldi/` | IDENTICAL - no action |
| 46 | `/listings/knaus-sudwind-580-qs/` | IDENTICAL - no action |
| 47 | `/listings/קרוואן-weinsberg-דגם-500fdk/` | IDENTICAL - no action |
| 48 | `/הקרוואנים-פותרים-את-מצוקת-הדיור/` | 301 -> /blog/ |
| 49 | `/?taxonomy=serie&term=550qdk` | 301 -> /listings/ |
| 50 | `/צור-קשר-א-ג-קרוואנים-נגררים/` | RENAME - new page slug set to this old slug |
| 51 | `/חניונים-מומלצים/` | RENAME - new page slug set to this old slug |
| 52 | `/listings/קרוואן-weinsberg-דגם-500fdk/550-q-2/` | REGEX 301 -> parent /listings/<model>/ |
| 53 | `/listings/knaus-sudwind-650-pxb/` | IDENTICAL - no action |
| 54 | `/עולם-הקרוואנים-שמתפתח-בישראל/` | 301 -> /blog/ |
| 55 | `/?taxonomy=price&term=185000` | 301 -> /listings/ |
| 56 | `/listings/קרוואן-weinsberg-דגם-550uk/550-u-1-1/` | REGEX 301 -> parent /listings/<model>/ |
| 57 | `/פתרונות-אנרגיה-מצבר-לקראוונים/` | 301 -> /listings/ |
| 58 | `/?taxonomy=makes-special&term=weinsberg` | 301 -> /listings/ |
| 59 | `/קראוונים-נגררים-בתקופת-הקורונה/מתחם-היבדק-וסע-של-מדא-בלוד-בדיקות-קורו-3/` | 301 -> /blog/ |
| 60 | `/קראוונים-נגררים-בתקופת-הקורונה/מתחם-היבדק-וסע-של-מדא-בלוד-בדיקות-קורו-2/` | 301 -> /blog/ |
| 61 | `/?taxonomy=serie&term=500fdk` | 301 -> /listings/ |
| 62 | `/?taxonomy=drive&term=6` | 301 -> /listings/ |
| 63 | `/?taxonomy=serie&term=390qd` | 301 -> /listings/ |
| 64 | `/listings/קרוואן-weinsberg-דגם-420qd/` | IDENTICAL - no action |
| 65 | `/listings/קרוואן-weinsberg-דגם-390qd/390qd/` | REGEX 301 -> parent /listings/<model>/ |
| 66 | `/listings/גנרטור-4500-וואט-zakco/img-20210223-wa0010/` | REGEX 301 -> parent /listings/<model>/ |
| 67 | `/listings/מטען-מצברים-noco-5ah-6-12v/` | IDENTICAL - no action |
| 68 | `/קראוונים-נגררים-בתקופת-הקורונה/מתחם-היבדק-וסע-של-מדא-בלוד-בדיקות-קורונ/` | 301 -> /blog/ |
| 69 | `/listings/קרוואן-weinsberg-דגם-550qdk/550qdk-798x450-1/` | REGEX 301 -> parent /listings/<model>/ |
| 70 | `/רואים-קראוון-למכירה-ושוקלים-פעמיים-כד/` | 301 -> /blog/ |
| 71 | `/listings/גנרטור-4500-וואט-zakco/` | IDENTICAL - no action |
| 72 | `/קרוואן-למכירה/באנר-לקראוונים-תמונה-1-1/` | 301 -> /קרוואן-למכירה/ |
| 73 | `/רואים-קראוון-למכירה-ושוקלים-פעמיים-כד/weinsberg-small/` | 301 -> /blog/ |
| 74 | `/?taxonomy=serie&term=550uk` | 301 -> /listings/ |
| 75 | `/listings/sterckeman-easy-496pe/alba-496-easy-496pe-day-2020/` | REGEX 301 -> parent /listings/<model>/ |
| 76 | `/?taxonomy=serie&term=580qs` | 301 -> /listings/ |
| 77 | `/קרוואן-למכירה/jsa-1-1-1/` | 301 -> /קרוואן-למכירה/ |
| 78 | `/listings/sterckeman-easy-390cp/whatsapp-image-2022-06-12-at-13-20-47/` | REGEX 301 -> parent /listings/<model>/ |
| 79 | `/השכרת-קרוואנים/קרוואן-בטבע/` | 301 -> / |
| 80 | `/מאמרים-קרוואנים/` | 301 -> /blog/ |
| 81 | `/listings/קרוואן-weinsberg-דגם-500fdk/5002-1024x650-1/` | REGEX 301 -> parent /listings/<model>/ |
| 82 | `/?taxonomy=drive&term=3` | 301 -> /listings/ |
| 83 | `/listings/sterckeman-easy-496pe/easy-496pe-kids-2021-11-1/` | REGEX 301 -> parent /listings/<model>/ |
| 84 | `/רוצים-לרכוש-קראוון-אבל-לא-יודעים-מאיפה/` | 301 -> /blog/ |
| 85 | `/קראוונים-tabbret/` | 301 -> /listings/ |
| 86 | `/listings/שרשרת-נעילה-לקראוון-נגרר/` | IDENTICAL - no action |
| 87 | `/?taxonomy=make&term=knaus` | 301 -> /listings/ |
| 88 | `/400l/` | 301 -> / |
| 89 | `/listings/evolution-580pe-kids/` | IDENTICAL - no action |
| 90 | `/קראוונים-weinsberg/wein/` | 301 -> /listings/ |
| 91 | `/listings/קרוואן-knaus-דגם-550fsk/1-2/` | REGEX 301 -> parent /listings/<model>/ |
| 92 | `/קרוואן-למכירה/יצרן-קרוואנים-קנאוס-אברט/` | 301 -> /קרוואן-למכירה/ |
| 93 | `/listings/קרוואן-tabbert-דגם-puccini/קרוואן-tabbert-דגם-puccini-2-3/` | REGEX 301 -> parent /listings/<model>/ |
| 94 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170611_caraone_740udf_uk_n/` | REGEX 301 -> parent /listings/<model>/ |
| 95 | `/קרוואן-tabbert-דגם-puccini-4/` | 301 -> /listings/קרוואן-tabbert-דגם-puccini/ |
| 96 | `/קראוונים-נגררים-בתקופת-הקורונה/מתחם-היבדק-וסע-של-מדא-בלוד-בדיקות-קורו-4/` | 301 -> /blog/ |
| 97 | `/טיפ-שבועי-3/` | 301 -> /blog/ |
| 98 | `/?taxonomy=makes-special&term=sterckeman` | 301 -> /listings/ |
| 99 | `/המילה-האחרונה-בעולם-הטיולים-הקרוואנ/קרוואן-tabbert-דגם-rossini-1-2/` | 301 -> /blog/ |
| 100 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170611_caraone_740udf_uk_t/` | REGEX 301 -> parent /listings/<model>/ |
| 101 | `/listings/מנעול-לכף-ריתום/מנעול-לכף-ריתום-3/` | REGEX 301 -> parent /listings/<model>/ |
| 102 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170610_caraone_390qd_uk_n/` | REGEX 301 -> parent /listings/<model>/ |
| 103 | `/carvan-lp/` | 301 -> /listings/ |
| 104 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170610_caraone_550uk_n/` | REGEX 301 -> parent /listings/<model>/ |
| 105 | `/vivaldi/` | 301 -> /listings/קרוואן-tabbert-דגם-vivaldi/ |
| 106 | `/listings/קרוואן-weinsberg-דגם-420qd/3300_w51_420-qd_gr_t/` | REGEX 301 -> parent /listings/<model>/ |
| 107 | `/listings/page/2/` | IDENTICAL - no action |
| 108 | `/listings/מטען-מצברים-noco-5ah-6-12v/noco-genius5eu-2-1-100x100/` | REGEX 301 -> parent /listings/<model>/ |
| 109 | `/קרוואן-למכירה/קטלוג-קראוון-02-1/` | 301 -> /קרוואן-למכירה/ |
| 110 | `/listings/sterckeman-easy-496pe/alba-496-easy-496pe-night-2020/` | REGEX 301 -> parent /listings/<model>/ |
| 111 | `/listings/sterckeman-evolution-496pe/sterckeman_evolution_moment/` | REGEX 301 -> parent /listings/<model>/ |
| 112 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170610_caraone_550uk_t/` | REGEX 301 -> parent /listings/<model>/ |
| 113 | `/listings/knaus-sudwind-500-pf/500pf/` | REGEX 301 -> parent /listings/<model>/ |
| 114 | `/עולם-הקרוואנים-שמתפתח-בישראל/אוהל-צד-פאנורמה-1-2/` | 301 -> /blog/ |
| 115 | `/listings/knaus-sudwind-500-pf/` | IDENTICAL - no action |
| 116 | `/אביזרים-נלווים-לקראוונים/rz_caraone-450qd-edition-hot-landschaft_72dpi_lowres/` | 301 -> /אביזרים-נלווים-לקראוונים/ |
| 117 | `/קראוונים-knaus/` | 301 -> /listings/ |
| 118 | `/קרוואן-למכירה/cag-2/` | 301 -> /קרוואן-למכירה/ |
| 119 | `/listings/evolution-580pe-kids/detail_roue-artica-evolution/` | REGEX 301 -> parent /listings/<model>/ |
| 120 | `/קרוואן-נגרר/קרוואן-weinsberg-דגם-400lk-2-3/` | 301 -> /blog/ |
| 121 | `/listings/sterckeman-evolution-496pe/artica-496-evolution-496pe-night-2020/` | REGEX 301 -> parent /listings/<model>/ |
| 122 | `/השכרת-קרוואנים/השכרת-קרוואנים-3/` | 301 -> / |
| 123 | `/קרוואן-לטיולים/420qd/` | 301 -> /blog/ |
| 124 | `/קרוואן-נגרר-איתך-לאורך-כל-הדרך/slider-2/` | 301 -> /blog/ |
| 125 | `/listings/page/4/` | IDENTICAL - no action |
| 126 | `/category/טיפ-שבועי/` | 301 -> /blog/ |
| 127 | `/listings/sterckeman-easy-420cp/alba-400-easy-420cp-day-2020/` | REGEX 301 -> parent /listings/<model>/ |
| 128 | `/listings/קרוואן-tabbert-דגם-puccini/קרוואן-tabbert-דגם-puccini-3-798x466/` | REGEX 301 -> parent /listings/<model>/ |
| 129 | `/אביזרים-נלווים-לקראוונים/` | RENAME - new page slug set to this old slug |
| 130 | `/wp-content/uploads/2017/02/חוברת-הדרכה-קרוואנים-22.1.17.pdf` | PDF - re-upload to same path |
| 131 | `/?taxonomy=drive&term=4` | 301 -> /listings/ |
| 132 | `/קרוואן-למכירה/jsa-1/` | 301 -> /קרוואן-למכירה/ |
| 133 | `/קראוונים-tabbret/tabbert/` | 301 -> /listings/ |
| 134 | `/הצצה-אל-העתיד-בית-על-גלגלים/cag/` | 301 -> /blog/ |
| 135 | `/listings/sterckeman-easy-390cp/easy_390cp_2021_3-2/` | REGEX 301 -> parent /listings/<model>/ |
| 136 | `/עמוד-תודה` | 301 -> / |
| 137 | `/קראוונים-נגררים-בתקופת-הקורונה/` | 301 -> /blog/ |
| 138 | `/listings/פאנל-סולארי-170w-36p/` | IDENTICAL - no action |
| 139 | `/מדיניות-פרטיות/` | 301 -> / |
| 140 | `/טיפ-שבועי-2/` | 301 -> /blog/ |
| 141 | `/listings/קרוואן-weinsberg-דגם-390qd/390-2/` | REGEX 301 -> parent /listings/<model>/ |
| 142 | `/listings/מנעול-לכף-ריתום-2/מנעול-לכף-ריתום-קרוואנים-2/` | REGEX 301 -> parent /listings/<model>/ |
| 143 | `/listings/קרוואן-knaus-דגם-500fvu/` | IDENTICAL - no action |
| 144 | `/?taxonomy=price&term=196000` | 301 -> /listings/ |
| 145 | `/listings/קרוואן-knaus-דגם-550fsk/3-2/` | REGEX 301 -> parent /listings/<model>/ |
| 146 | `/הצהרת-נגישות/` | 301 -> / |
| 147 | `/listings/קרוואן-weinsberg-דגם-550qdk/550qdk/` | REGEX 301 -> parent /listings/<model>/ |
| 148 | `/קרוואן-למכירה/באנר-לקראוונים-תמונה-1-1-1/` | 301 -> /קרוואן-למכירה/ |
| 149 | `/listings/sterckeman-easy-390cp/sterckeman_starlett_graphite_390cp_0003/` | REGEX 301 -> parent /listings/<model>/ |
| 150 | `/אביזרים-נלווים-לקראוונים/rz_caraone-450fu-edition-hot-landschaft_72dpi_lowres/` | 301 -> /אביזרים-נלווים-לקראוונים/ |
| 151 | `/קרוואנים-weinsberg-tab-knaus-tabbret/קרוואנים-weinsberg-tab-knaus-tabbret-2/` | 301 -> /listings/ |
| 152 | `/אודותינו-א-ג-נגררים-וקרוואנים/ktg-knaus-2020-2021-suedwind-keyvisual-1/` | 301 -> /אודותינו-א-ג-נגררים-וקרוואנים/ |
| 153 | `/?taxonomy=price&term=164000` | 301 -> /listings/ |
| 154 | `/קראוונים-knaus/logo-knaus-mobile/` | 301 -> /listings/ |
| 155 | `/listings/קרוואן-tabbert-דגם-da-vinci/א-ג-נגררים-וקרוואנים-37/` | REGEX 301 -> parent /listings/<model>/ |
| 156 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170610_caraone_500fdk_n/` | REGEX 301 -> parent /listings/<model>/ |
| 157 | `/?taxonomy=make&term=sterckeman` | 301 -> /listings/ |
| 158 | `/?taxonomy=serie&term=evolution-496pe` | 301 -> /listings/ |
| 159 | `/listings/sterckeman-easy-496pe/sterckeman_evolution_496_pe_0001-1/` | REGEX 301 -> parent /listings/<model>/ |
| 160 | `/?taxonomy=serie&term=easy-420-cp` | 301 -> /listings/ |
| 161 | `/?taxonomy=serie&term=easy-390cp` | 301 -> /listings/ |
| 162 | `/?taxonomy=serie&term=easy-496pe` | 301 -> /listings/ |
| 163 | `/?taxonomy=serie&term=evolution-580pe` | 301 -> /listings/ |
| 164 | `/listings/sterckeman-evolution-496pe/sterckeman_evolution_496pe_0001/` | REGEX 301 -> parent /listings/<model>/ |
| 165 | `/listings/evolution-580pe-kids/detail_gaz-artica-evolution/` | REGEX 301 -> parent /listings/<model>/ |
| 166 | `/?taxonomy=price&term=202000` | 301 -> /listings/ |
| 167 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170610_caraone_550qdk_t/` | REGEX 301 -> parent /listings/<model>/ |
| 168 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170610_caraone_420qd_n/` | REGEX 301 -> parent /listings/<model>/ |
| 169 | `/listings/sterckeman-easy-390cp/whatsapp-image-2022-06-12-at-13-20-44/` | REGEX 301 -> parent /listings/<model>/ |
| 170 | `/?taxonomy=drive&term=7` | 301 -> /listings/ |
| 171 | `/אביזרים-נלווים-לקראוונים/ktg-weinsberg-2017-2018-caraone-450fu-hot-sitzgruppe-9801_72dpi_lowres/` | 301 -> /אביזרים-נלווים-לקראוונים/ |
| 172 | `/?taxonomy=serie&term=420qd` | 301 -> /listings/ |
| 173 | `/?taxonomy=price&term=190000` | 301 -> /listings/ |
| 174 | `/?taxonomy=make&term=availability` | 301 -> /listings/ |
| 175 | `/?taxonomy=price&term=214000` | 301 -> /listings/ |
| 176 | `/?taxonomy=drive&term=2` | 301 -> /listings/ |
| 177 | `/?taxonomy=serie&term=450fu` | 301 -> /listings/ |
| 178 | `/listings/sterckeman-easy-390cp/sterckeman_starlett_graphite_390cp_0002/` | REGEX 301 -> parent /listings/<model>/ |
| 179 | `/listings/קרוואן-weinsberg-דגם-550qdk/20170610_caraone_390qd_n/` | REGEX 301 -> parent /listings/<model>/ |
| 180 | `/listings/knaus-sudwind-580-qs/csm_ktg-knaus-2020-2021-suedwind-580qs-grundriss-tag_0ae74bbe7d/` | REGEX 301 -> parent /listings/<model>/ |
| 181 | `/listings/sterckeman-easy-496pe/easy-496pe-kids-2021-3-1/` | REGEX 301 -> parent /listings/<model>/ |
| 182 | `/listings/קרוואן-weinsberg-דגם-420qd/3300_w51_420-qd_gr_n/` | REGEX 301 -> parent /listings/<model>/ |
| 183 | `/listings/קרוואן-knaus-דגם-550fsk/attachment/4/` | REGEX 301 -> parent /listings/<model>/ |
| 184 | `/listings/פאנל-סולארי-170w-36p/bld-170w-1/` | REGEX 301 -> parent /listings/<model>/ |
| 185 | `/listings/קרוואן-weinsberg-דגם-390qd/3300_w51_390-qd_in_6634_300dpi/` | REGEX 301 -> parent /listings/<model>/ |
| 186 | `/המילה-האחרונה-בעולם-הטיולים-הקרוואנ/` | 301 -> /blog/ |

## Manual / non-CSV items
- Delete the default `/sample-page/` (page id 2) on the new site.
- Re-upload the 2 PDFs (#23, #130) to the same `/wp-content/uploads/...` paths.
- Build Privacy + Accessibility pages (old slugs `מדיניות-פרטיות` , `הצהרת-נגישות`) - see WORDPRESS_MIGRATION.md task. Until built, #139/#146 301 -> homepage.

## Query-string redirects (#49 etc.)
If the Redirection plugin does not match the `?taxonomy=` params, set the group Query Parameters handling to "Exact match", OR add this single .htaccess fallback (covers all of them):
```apache
RewriteCond %{QUERY_STRING} ^taxonomy= [NC]
RewriteRule ^$ /listings/? [R=301,L]
```
