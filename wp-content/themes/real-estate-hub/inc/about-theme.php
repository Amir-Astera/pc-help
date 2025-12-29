<?php
/**
 * Real Estate Hub Theme page
 *
 * @package Real Estate Hub
 */

function real_estate_hub_admin_scriptss() {
	wp_dequeue_script('real-estate-hub-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'real_estate_hub_admin_scriptss' );

if ( ! defined( 'REAL_ESTATE_HUB_FREE_THEME_URL' ) ) {
	define( 'REAL_ESTATE_HUB_FREE_THEME_URL', 'https://www.themespride.com/themes/free-real-estate-wordpress-theme/' );
}
if ( ! defined( 'REAL_ESTATE_HUB_PRO_THEME_URL' ) ) {
	define( 'REAL_ESTATE_HUB_PRO_THEME_URL', 'https://www.themespride.com/themes/estate-agency-wordpress-theme/' );
}
if ( ! defined( 'REAL_ESTATE_HUB_DEMO_THEME_URL' ) ) {
	define( 'REAL_ESTATE_HUB_DEMO_THEME_URL', 'https://www.themespride.com/real-estate-hub-pro/' );
}
if ( ! defined( 'REAL_ESTATE_HUB_DOCS_THEME_URL' ) ) {
    define( 'REAL_ESTATE_HUB_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/real-estate-hub/' );
}
if ( ! defined( 'REAL_ESTATE_HUB_RATE_THEME_URL' ) ) {
    define( 'REAL_ESTATE_HUB_RATE_THEME_URL', 'https://wordpress.org/support/theme/real-estate-hub/reviews/#new-post' );
}
if ( ! defined( 'REAL_ESTATE_HUB_CHANGELOG_THEME_URL' ) ) {
    define( 'REAL_ESTATE_HUB_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'REAL_ESTATE_HUB_SUPPORT_THEME_URL' ) ) {
    define( 'REAL_ESTATE_HUB_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/real-estate-hub/' );
}

/**
 * Add theme page
 */
function real_estate_hub_menu() {
	add_theme_page( esc_html__( 'About Theme', 'real-estate-hub' ), esc_html__( 'About Theme', 'real-estate-hub' ), 'edit_theme_options', 'real-estate-hub-about', 'real_estate_hub_about_display' );
}
add_action( 'admin_menu', 'real_estate_hub_menu' );

/**
 * Display About page
 */
function real_estate_hub_about_display() {
	$real_estate_hub_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $real_estate_hub_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$real_estate_hub_description = explode( '. ', $real_estate_hub_theme->get( 'Description' ) );

					array_pop( $real_estate_hub_description );

					$real_estate_hub_description = implode( '. ', $real_estate_hub_description );

					echo esc_html( $real_estate_hub_description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( REAL_ESTATE_HUB_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'real-estate-hub' ); ?></a>

					<a href="<?php echo esc_url( REAL_ESTATE_HUB_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'real-estate-hub' ); ?></a>

					<a href="<?php echo esc_url( REAL_ESTATE_HUB_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'real-estate-hub' ); ?></a>

					<a href="<?php echo esc_url( REAL_ESTATE_HUB_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'real-estate-hub' ); ?></a>

					<a href="<?php echo esc_url( REAL_ESTATE_HUB_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'real-estate-hub' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $real_estate_hub_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'real-estate-hub' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'real-estate-hub-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'real-estate-hub-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'real-estate-hub' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'real-estate-hub-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'real-estate-hub' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'real-estate-hub-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'real-estate-hub' ); ?></a>
		</nav>

		<?php
			real_estate_hub_main_screen();

			real_estate_hub_changelog_screen();

			real_estate_hub_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'real-estate-hub' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'real-estate-hub' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'real-estate-hub' ) : esc_html_e( 'Go to Dashboard', 'real-estate-hub' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function real_estate_hub_main_screen() {
	if ( isset( $_GET['page'] ) && 'real-estate-hub-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'real-estate-hub' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'real-estate-hub' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'real-estate-hub' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'real-estate-hub' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'real-estate-hub' ) ?></p>
				<p><a href="<?php echo esc_url( REAL_ESTATE_HUB_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'real-estate-hub' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'real-estate-hub' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'real-estate-hub' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="real_estate_hub_text_copyied()"><?php esc_html_e( 'GETPro20', 'real-estate-hub' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function real_estate_hub_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'real-estate-hub' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'real_estate_hub_changelog_file', REAL_ESTATE_HUB_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = real_estate_hub_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function real_estate_hub_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function real_estate_hub_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'real-estate-hub' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'real-estate-hub' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'real-estate-hub' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'real-estate-hub' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'real-estate-hub' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url( REAL_ESTATE_HUB_PRO_THEME_URL );?>"><?php esc_html_e( 'Go for Premium', 'real-estate-hub' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
