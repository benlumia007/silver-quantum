<?php
/**
 * Silver Quantum ( header.php )
 *
 * @package   Silver Quantum
 * @copyright Copyright (C) 2014-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://benjlu.com )
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'silver-quantum' ) ?></a>
<div id="masthead" class="top-navigation">
	<?php Benlumia007\Backdrop\View\display( 'menu', [ 'primary' ] ); ?>
</div>
<div id="container" class="site-container">
	<header id="site-header" class="site-header header-image">
		<div class="site-branding">
			<?php Benlumia007\Backdrop\Site\display_site_title(); ?>
			<?php Benlumia007\Backdrop\Site\display_site_description(); ?>
		</div>
	</header>
