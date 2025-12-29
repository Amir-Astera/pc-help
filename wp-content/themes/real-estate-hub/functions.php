<?php
/**
 * Real Estate Hub functions and definitions
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

function real_estate_hub_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'real-estate-hub-featured-image', 2000, 1200, true );
	add_image_size( 'real-estate-hub-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'real-estate-hub' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', real_estate_hub_fonts_url() ) );
}
add_action( 'after_setup_theme', 'real_estate_hub_setup' );

/**
 * Register custom fonts.
 */
function real_estate_hub_fonts_url(){
	$real_estate_hub_font_url = '';
	$real_estate_hub_font_family = array();
	$real_estate_hub_font_family[] = 'Instrument Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';

	$real_estate_hub_query_args = array(
		'family'	=> rawurlencode(implode('|',$real_estate_hub_font_family)),
	);
	$real_estate_hub_font_url = add_query_arg($real_estate_hub_query_args,'//fonts.googleapis.com/css');
	return $real_estate_hub_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $real_estate_hub_font_url ) );
}

/**
 * Register widget area.
 */
function real_estate_hub_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'real-estate-hub' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'real-estate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'real-estate-hub' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'real-estate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'real-estate-hub' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'real-estate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'real-estate-hub' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'real-estate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'real-estate-hub' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'real-estate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'real-estate-hub' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'real-estate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'real-estate-hub' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'real-estate-hub' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'real_estate_hub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function real_estate_hub_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'real-estate-hub-fonts', real_estate_hub_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'real-estate-hub-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'real-estate-hub-style',$real_estate_hub_tp_theme_css );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'real-estate-hub-style',$real_estate_hub_tp_theme_css );
	wp_style_add_data('real-estate-hub-style', 'rtl', 'replace');

	// Theme block stylesheet.
	wp_enqueue_style( 'real-estate-hub-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'real-estate-hub-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'real-estate-hub-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/custom.js', array('jquery'), true );

	wp_enqueue_script( 'real-estate-hub-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'real_estate_hub_scripts' );

/*radio button sanitization*/
function real_estate_hub_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

define('REAL_ESTATE_HUB_CREDIT',__('https://www.themespride.com/themes/free-real-estate-wordpress-theme/','real-estate-hub') );
if ( ! function_exists( 'real_estate_hub_credit' ) ) {
	function real_estate_hub_credit(){
		echo "<a href=".esc_url(REAL_ESTATE_HUB_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('real_estate_hub_footer_text',__('Real Estate Hub WordPress Theme','real-estate-hub')))."</a>";
	}
}

//Admin Enqueue for Admin
function real_estate_hub_admin_enqueue_scripts(){
	wp_enqueue_style('real-estate-hub-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/admin.css');
	wp_enqueue_script( 'real-estate-hub-custom-scripts', esc_url( get_template_directory_uri() ). '/assets/js/real-estate-hub-custom.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'real_estate_hub_admin_enqueue_scripts' );

// Sanitize Sortable control.
function real_estate_hub_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

function real_estate_hub_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function real_estate_hub_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function real_estate_hub_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function real_estate_hub_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function real_estate_hub_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function custom_tags_filter($tag_list) {
    // Replace the comma (,) with an empty string
    $tag_list = str_replace(', ', '', $tag_list);

    return $tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $tags = get_the_tags();

    if ($tags) {
        $tags_output = '<div class="post_tag">Tags: ';

        $first_tag = reset($tags);

        foreach ($tags as $tag) {
            $tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $first_tag) {
                $tags_output .= ' ';
            }
        }

        $tags_output .= '</div>';

        echo $tags_output;
    }
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'real_estate_hub_loop_columns');
if (!function_exists('real_estate_hub_loop_columns')) {
	function real_estate_hub_loop_columns() {
		$columns = get_theme_mod( 'real_estate_hub_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'real_estate_hub_per_page', 20 );
function real_estate_hub_per_page( $cols ) {
  	$cols = get_theme_mod( 'real_estate_hub_product_per_page', 9 );
	return $cols;
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function real_estate_hub_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'real_estate_hub_front_page_template' );

function real_estate_hub_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="real-estate-hub-getting-started-notice clearfix">
            <div class="real-estate-hub-theme-notice-content">
                <h2 class="real-estate-hub-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'real-estate-hub' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'real-estate-hub')) ?></p>

                <a class="real-estate-hub-btn-get-started button button-primary button-hero real-estate-hub-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=real-estate-hub-about' )); ?>" ><?php esc_html_e( 'Get started', 'real-estate-hub' ) ?></a><span class="real-estate-hub-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

add_action( 'admin_notices', 'real_estate_hub_activation_notice' );

/**
 * Logo Custamization.
 */

function real_estate_hub_logo_width(){

	$real_estate_hub_logo_width   = get_theme_mod( 'real_estate_hub_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $real_estate_hub_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'real_estate_hub_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * About Theme Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );

/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' ); 

// offer Meta
function real_estate_hub_bn_custom_meta_offer() {
    add_meta_box( 'bn_meta', __( 'Apartment Flat Meta Feilds', 'real-estate-hub' ), 'real_estate_hub_meta_callback_projects', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'real_estate_hub_bn_custom_meta_offer');
}

function real_estate_hub_meta_callback_projects( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'real_estate_hub_projects_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $real_estate_hub_bedroom_no = get_post_meta( $post->ID, 'real_estate_hub_bedroom_no', true );
    $real_estate_hub_bathroom_no = get_post_meta( $post->ID, 'real_estate_hub_bathroom_no', true );
    $real_estate_hub_square_feet_no = get_post_meta( $post->ID, 'real_estate_hub_square_feet_no', true );
    $real_estate_hub_price_no = get_post_meta( $post->ID, 'real_estate_hub_price_no', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'No of Bedroom', 'real-estate-hub' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_hub_bedroom_no" id="real_estate_hub_bedroom_no" value="<?php echo esc_attr($real_estate_hub_bedroom_no); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'No of Bathroom', 'real-estate-hub' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_hub_bathroom_no" id="real_estate_hub_bathroom_no" value="<?php echo esc_attr($real_estate_hub_bathroom_no); ?>" />
                    </td>
                </tr>
               <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'No of Square Feet', 'real-estate-hub' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_hub_square_feet_no" id="real_estate_hub_square_feet_no" value="<?php echo esc_attr($real_estate_hub_square_feet_no); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Price of Flat', 'real-estate-hub' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="real_estate_hub_price_no" id="real_estate_hub_price_no" value="<?php echo esc_attr($real_estate_hub_price_no); ?>" />
                    </td>
                </tr> 
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function real_estate_hub_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['real_estate_hub_projects_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['real_estate_hub_projects_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Goal Amount
    if( isset( $_POST[ 'real_estate_hub_bedroom_no' ] ) ) {
        update_post_meta( $post_id, 'real_estate_hub_bedroom_no', strip_tags( wp_unslash( $_POST[ 'real_estate_hub_bedroom_no' ]) ) );
    }
    // Save Raise amount
    if( isset( $_POST[ 'real_estate_hub_bathroom_no' ] ) ) {
        update_post_meta( $post_id, 'real_estate_hub_bathroom_no', strip_tags( wp_unslash( $_POST[ 'real_estate_hub_bathroom_no' ]) ) );
    }
     // Save Raise amount
    if( isset( $_POST[ 'real_estate_hub_square_feet_no' ] ) ) {
        update_post_meta( $post_id, 'real_estate_hub_square_feet_no', strip_tags( wp_unslash( $_POST[ 'real_estate_hub_square_feet_no' ]) ) );
    }
     // Save Raise amount
    if( isset( $_POST[ 'real_estate_hub_price_no' ] ) ) {
        update_post_meta( $post_id, 'real_estate_hub_price_no', strip_tags( wp_unslash( $_POST[ 'real_estate_hub_price_no' ]) ) );
    }
}
add_action( 'save_post', 'real_estate_hub_bn_metadesig_save' );
