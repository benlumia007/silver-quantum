<?php
/**
 * silver-quantum ( content-page.php )
 *
 * @package     silver-quantum
 * @copyright   Copyright (C) 2018-2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Benlumia007\Backdrop\Entry\display_title(); ?>
	</header>
	<div class="post-thumbnails">
		<?php $size = 'left-sidebar' === get_theme_mod( 'global_layout', 'left-sidebar' ) ? 'medium' : 'large'; ?>
		<?php the_post_thumbnail( "silver-quantum-{$size}-thumbnails"); ?>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'silver-quantum' ),
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'silver-quantum' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">,</span> ',
				)
			);
			?>
	</div>
</article>
