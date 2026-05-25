#!/bin/bash
# CAG SEO: rename new WP page slugs to match the OLD indexed URLs (byte-identical, no redirect).
# Run inside Local: right-click the cag-wp site -> Open site shell, then: bash slug-renames.sh
set -e

# about-us  (page id 6)
wp post update 6 --post_name='אודותינו-א-ג-נגררים-וקרוואנים'
# caravans  (page id 23)
wp post update 23 --post_name='קרוואן-למכירה'
# videos-page  (page id 29)
wp post update 29 --post_name='סרטונים-שלנו-א-ג-קרוואנים'
# contact-us  (page id 27)
wp post update 27 --post_name='צור-קשר-א-ג-קרוואנים-נגררים'
# caravan-camparks  (page id 17)
wp post update 17 --post_name='חניונים-מומלצים'
# accessories  (page id 21)
wp post update 21 --post_name='אביזרים-נלווים-לקראוונים'

wp rewrite flush
echo "Done. Verify each page resolves at its old slug on cag-wp.local."
