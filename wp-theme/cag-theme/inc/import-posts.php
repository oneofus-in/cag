<?php
/**
 * One-time post import from posts.csv
 *
 * Trigger: visit  /wp-admin/?cag_import=1  while logged in as admin.
 * Remove:  delete this file + the require_once in functions.php when done.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_init', function () {

	if ( ! isset( $_GET['cag_import'] ) ) {
		return;
	}

	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Access denied.' );
	}

	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$csv_path = get_template_directory() . '/posts.csv';
	$dry_run  = isset( $_GET['dry'] );
	$force    = isset( $_GET['force'] );

	// ── CSV parser ────────────────────────────────────────────────────────────

	$rows = cag_import_parse_csv( $csv_path );
	if ( ! $rows ) {
		wp_die( 'Could not read posts.csv from ' . esc_html( $csv_path ) );
	}
	array_shift( $rows ); // drop header row

	// ── Run import ────────────────────────────────────────────────────────────

	$results = [];

	foreach ( $rows as $row ) {
		while ( count( $row ) < 8 ) {
			$row[] = '';
		}

		$title     = trim( $row[1] );
		$content   = cag_import_clean_content( $row[2] );
		$date      = trim( $row[3] );
		$image_url = trim( $row[4] );
		$image_alt = trim( $row[5] );
		$cats_raw  = trim( $row[6] );

		if ( $title === '' ) {
			continue;
		}

		// Idempotency — skip existing unless ?force
		if ( ! $force ) {
			$existing = get_page_by_title( $title, OBJECT, 'post' );
			if ( $existing ) {
				$results[] = [
					'title'  => $title,
					'status' => 'skipped',
					'note'   => 'כבר קיים (ID ' . $existing->ID . ')',
				];
				continue;
			}
		}

		if ( $dry_run ) {
			$results[] = [
				'title'  => $title,
				'status' => 'dry-run',
				'note'   => 'Image: ' . ( $image_url ?: '—' ) . ' | קטגוריות: ' . ( $cats_raw ?: '—' ),
			];
			continue;
		}

		// Insert post
		$post_id = wp_insert_post( [
			'post_title'   => $title,
			'post_content' => $content,
			'post_date'    => $date,
			'post_status'  => 'publish',
			'post_type'    => 'post',
			'post_author'  => get_current_user_id(),
		], true );

		if ( is_wp_error( $post_id ) ) {
			$results[] = [
				'title'  => $title,
				'status' => 'error',
				'note'   => $post_id->get_error_message(),
			];
			continue;
		}

		// Categories
		if ( $cats_raw !== '' ) {
			$cat_ids = [];
			foreach ( array_filter( array_map( 'trim', explode( ',', $cats_raw ) ) ) as $cat_name ) {
				$term = get_term_by( 'name', $cat_name, 'category' );
				if ( $term ) {
					$cat_ids[] = $term->term_id;
				} else {
					$new = wp_insert_term( $cat_name, 'category' );
					if ( ! is_wp_error( $new ) ) {
						$cat_ids[] = $new['term_id'];
					}
				}
			}
			if ( $cat_ids ) {
				wp_set_post_categories( $post_id, $cat_ids );
			}
		}

		// Featured image — sideload from old site
		$img_note = '—';
		if ( $image_url !== '' ) {
			$att_id = media_sideload_image( $image_url, $post_id, $image_alt ?: $title, 'id' );
			if ( is_wp_error( $att_id ) ) {
				$img_note = 'תמונה נכשלה: ' . $att_id->get_error_message();
			} else {
				set_post_thumbnail( $post_id, $att_id );
				$img_note = 'תמונה יובאה (#' . $att_id . ')';
			}
		}

		$results[] = [
			'title'  => $title,
			'status' => 'created',
			'note'   => 'Post #' . $post_id . ' | ' . $img_note . ' | קטגוריות: ' . ( $cats_raw ?: '—' ),
		];
	}

	// ── Output ────────────────────────────────────────────────────────────────

	$counts = array_count_values( array_column( $results, 'status' ) );
	$badge  = [
		'created'  => '#2e7d32',
		'skipped'  => '#1565c0',
		'error'    => '#b71c1c',
		'dry-run'  => '#e65100',
	];

	?><!DOCTYPE html>
<html lang="he" dir="rtl">
<head>
<meta charset="UTF-8">
<title>CAG — ייבוא פוסטים</title>
<style>
  * { box-sizing: border-box; }
  body { font-family: Arial, sans-serif; margin: 40px auto; max-width: 960px;
         padding: 0 20px; direction: rtl; color: #222; }
  h1 { font-size: 22px; border-bottom: 2px solid #333; padding-bottom: 10px; }
  .actions { display: flex; gap: 12px; margin: 20px 0; flex-wrap: wrap; }
  .btn { display: inline-block; padding: 10px 20px; border-radius: 4px;
         color: #fff; text-decoration: none; font-size: 14px; }
  .btn-blue   { background: #1565c0; }
  .btn-red    { background: #b71c1c; }
  .btn-gray   { background: #555; }
  .btn-orange { background: #e65100; }
  table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
  th { background: #333; color: #fff; padding: 10px; text-align: right; }
  td { padding: 9px 10px; border-bottom: 1px solid #e0e0e0; vertical-align: top; }
  tr:hover td { background: #fafafa; }
  .badge { display: inline-block; padding: 2px 8px; border-radius: 4px;
           color: #fff; font-size: 12px; font-weight: bold; white-space: nowrap; }
  .summary { background: #f5f5f5; border-radius: 6px; padding: 14px 18px; margin-top: 20px; font-size: 14px; }
  .warning { background: #fff3cd; border: 1px solid #ffc107; border-radius: 6px;
             padding: 14px 18px; margin-top: 16px; font-size: 14px; }
  .dry-label { color: #e65100; font-weight: bold; margin-bottom: 10px; }
</style>
</head>
<body>

<h1>CAG — ייבוא פוסטים מ-posts.csv</h1>

<div class="actions">
	<?php if ( $dry_run ) : ?>
		<a class="btn btn-blue" href="<?= esc_url( admin_url( '?cag_import=1' ) ) ?>">הרץ ייבוא אמיתי</a>
	<?php else : ?>
		<a class="btn btn-orange" href="<?= esc_url( admin_url( '?cag_import=1&dry=1' ) ) ?>">תצוגה מקדימה (Dry Run)</a>
		<a class="btn btn-red" href="<?= esc_url( admin_url( '?cag_import=1&force=1' ) ) ?>"
		   onclick="return confirm('זה ייצור כפילויות! להמשיך?')">כפה יצירה מחדש</a>
	<?php endif; ?>
	<a class="btn btn-gray" href="<?= esc_url( admin_url( 'edit.php' ) ) ?>" target="_blank">כל הפוסטים</a>
</div>

<?php if ( $dry_run ) : ?>
	<p class="dry-label">מצב Dry Run — לא נוצר שום פוסט</p>
<?php endif; ?>

<table>
	<thead>
		<tr>
			<th>#</th>
			<th>כותרת</th>
			<th>סטטוס</th>
			<th>פרטים</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $results as $i => $r ) : ?>
		<tr>
			<td><?= $i + 1 ?></td>
			<td><?= esc_html( $r['title'] ) ?></td>
			<td>
				<span class="badge" style="background:<?= $badge[ $r['status'] ] ?? '#555' ?>">
					<?= esc_html( $r['status'] ) ?>
				</span>
			</td>
			<td style="color:#555"><?= esc_html( $r['note'] ) ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="summary">
	<strong>סיכום:</strong>
	<?php foreach ( $counts as $s => $c ) : ?>
		<span class="badge" style="background:<?= $badge[ $s ] ?? '#555' ?>"><?= $c ?> <?= esc_html( $s ) ?></span>&nbsp;
	<?php endforeach; ?>
	| סה"כ שורות: <?= count( $results ) ?>
</div>

<?php if ( ! $dry_run && ( $counts['created'] ?? 0 ) > 0 ) : ?>
<div class="warning">
	✅ הייבוא הסתיים. <strong>זכור למחוק את השורה ב-functions.php ואת הקובץ inc/import-posts.php</strong> מהשרת.
</div>
<?php endif; ?>

</body>
</html><?php

	exit;
} );

// ── Helpers ───────────────────────────────────────────────────────────────────

function cag_import_parse_csv( $path ) {
	$text = @file_get_contents( $path );
	if ( $text === false ) {
		return false;
	}
	$text = ltrim( $text, "\xEF\xBB\xBF" ); // strip BOM

	$rows     = [];
	$row      = [];
	$field    = '';
	$in_quote = false;
	$len      = strlen( $text );

	for ( $i = 0; $i < $len; $i++ ) {
		$ch   = $text[ $i ];
		$next = $i + 1 < $len ? $text[ $i + 1 ] : '';

		if ( $in_quote ) {
			if ( $ch === '"' && $next === '"' ) {
				$field .= '"';
				$i++;
			} elseif ( $ch === '"' ) {
				$in_quote = false;
			} else {
				$field .= $ch;
			}
		} else {
			if ( $ch === '"' ) {
				$in_quote = true;
			} elseif ( $ch === ',' ) {
				$row[] = $field;
				$field = '';
			} elseif ( $ch === "\n" ) {
				$row[] = $field;
				$rows[] = $row;
				$row   = [];
				$field = '';
			} elseif ( $ch !== "\r" ) {
				$field .= $ch;
			}
		}
	}
	if ( $field !== '' || count( $row ) ) {
		$row[]  = $field;
		$rows[] = $row;
	}

	return $rows;
}

function cag_import_clean_content( $content ) {
	// Strip all shortcodes (VC wrappers, stm_* blocks, etc.)
	$content = preg_replace( '/\[[^\]]*\]/', '', $content );

	// Remove old-theme wrapper divs/articles — keep inner text
	$content = preg_replace( '/<\/?div[^>]*>/i', '', $content );
	$content = preg_replace( '/<\/?article[^>]*>/i', '', $content );

	// Collapse excess blank lines
	$content = preg_replace( '/\n{3,}/', "\n\n", $content );

	return trim( $content );
}
