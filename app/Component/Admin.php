<?php
/**
 * Silver Quantum ( Admin.php )
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2020. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

namespace SilverQuantum\Component;

use Benlumia007\Backdrop\Contracts\Admin\Admin as AdminPage;

/**
 * Implements Displayable
 */
class Admin extends AdminPage {
	/**
	 * Theme Info
	 */
	private $theme_info = null;
	/**
	 * Construct
	 */
	public function __construct() {
		$this->theme_info = wp_get_theme();
		add_action( 'admin_menu', array( $this, 'menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ), true, '1.0.0' );
	}
	/**
	 * Register Menu
	 */
	public function menu() {
		add_theme_page( $this->theme_info->name, $this->theme_info->name, 'manage_options', 'theme-page', array( $this, 'callback') );
	}

	/**
	 * Render Menu
	 */
	public function callback() {
		echo '<h1 class="admin-title">' . $this->theme_info->name . '</h1>'; // phpcs:ignore
		$this->pages();
	}

	public function tabs( $current = 'introduction' ) {
		$tabs = array(
			'introduction' => esc_html__( 'Introduction', 'silver-quantum' ),
		);

		$admin_nonce = wp_create_nonce( 'admin_nonce' );

		echo '<h2 class="tabs">';
			foreach ( $tabs as $tab => $name ) {
				$class = ( $tab === $current ) ? ' nav-tab-active' : '';
				echo "<a class='nav-tab $class' href='?page=theme-page&tab=$tab&_wp_nonce=$admin_nonce'>$name</a>"; // phpcs:ignore
			}
		echo '</h2>';
	}

	public function pages() {
		global $pagenow;

		if ( isset( $_GET['tab'] ) && isset( $_GET['_wp_nonce'] ) && false !== wp_verify_nonce( $_GET['_wp_nonce'], 'admin_nonce' ) ) {// phpcs:ignore
			$this->tabs( esc_html( wp_unslash( $_GET['tab'] ) ) ); // phpcs:ignore
		} else {
			$this->tabs( 'introduction' );
		}
		echo '<div class="tabs-content">';

		if ( 'themes.php' === $pagenow && 'theme-page' === sanitize_text_field( wp_unslash( $_GET['page'] ) ) ) { // phpcs:ignore
			if ( isset( $_GET['tab'] ) && isset( $_GET['_wp_nonce'] ) && false !== wp_verify_nonce( $_GET['_wp_nonce'], 'admin_nonce' ) ) { // phpcs:ignore
				$this->tab = esc_html( wp_unslash( $_GET['tab'] ) ); // phpcs:ignore
			} else {
				$this->tab = 'introduction';
			}

			switch ( $this->tab ) {
				case 'introduction':
					$this->introduction();
					break;
			}
		}
		echo '</div>';
	}

	public function introduction() { ?>
		<h2 class="admin-title"><?php esc_html_e( 'Theme Info', 'silver-quantum' ); ?></h2>
		<ul>
			<li><?php echo esc_html( __('Theme Name: ', 'silver-quantum' ) . $this->theme_info->name ); ?></li>
			<li><?php echo esc_html( __('Theme Version: ', 'silver-quantum' ) . $this->theme_info->version ); ?></li>
		</ul>
		<h2 class="admin-title"><?php esc_html_e( 'Welcome', 'silver-quantum' ); ?></h2>
		<?php esc_html_e( 'Hope you are enjoying the theme. ', 'silver-quantum' ); ?>
		<h2 class="admin-title"><?php esc_html_e( 'Recommended Plugins', 'silver-quantum' ); ?></h2>
		<ul>
			<li><a href="<?php esc_url( 'https://wordpress.org/plugins/jetpack' ); ?>"><?php esc_html_e( 'Jetpack by WordPress.com', 'silver-quantum' ); ?></a></li>
			<li><a href="<?php esc_url( 'https://wordpress.org/plugins/regenerate-thumbnails' ); ?>"><?php esc_html_e( 'Regenerate Thumbnails', 'silver-quantum' ); ?></a></li>
		</ul>
	<?php }

	public function admin_enqueue() {
		wp_register_style( 'admin-style', get_theme_file_uri() . '/assets/css/admin-styles.css', array(), '1.0.0' );
		wp_enqueue_style( 'admin-style' );
	}
}