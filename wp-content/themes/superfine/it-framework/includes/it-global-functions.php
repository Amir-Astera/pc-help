<?php
/**
 *
 * IT-RAYS Framework
 *
 * @author IT-RAYS
 * @license Commercial License
 * @link http://www.it-rays.com
 * @copyright 2015 IT-RAYS Themes
 * @package ITFramework
 * @version 1.0.0
 *
 */

if( ! function_exists( 'after_setup_theme' ) ) {
    function it_after_setup_theme() {
        if ( function_exists( 'add_theme_support' ) ) {
            add_theme_support( 'post-thumbnails' );
        }
        add_theme_support('automatic-feed-links');
        add_image_size( 'blog-large-image', 850, 300, true );
        add_image_size( 'blog-small-image', 400, 380, true );
        
        // add theme support for wp 4.1 and higher.
        add_theme_support( "title-tag" );
        
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', 'status', 'chat',
        ));
        
        add_theme_support( 'custom-background', apply_filters( 'it_custom_background_args', array(
            'default-color' => 'f5f5f5',
        ) ) );

        // Add support for featured content.
        add_theme_support( 'featured-content', array(
            'featured_content_filter' => 'it_get_featured_posts',
            'max_posts' => 6,
        ));

        add_theme_support('custom-header');
        add_theme_support( 'bbpress' );
        add_editor_style();
        define( 'HEADER_IMAGE_WIDTH', apply_filters( 'it_header_image_width', 1920 ) );
        define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'it_header_image_height', 320 ) );
        load_theme_textdomain( 'superfine', THEME_DIR . '/languages' );                     
    }
    add_action( 'after_setup_theme', 'it_after_setup_theme' );
}   
    
if ( ! function_exists( 'is_plugin_active' ) ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
} 
add_filter('media_send_to_editor', 'media_editor', 1, 3);
function media_editor($html, $send_id, $attachment ){
    //get the media's guid and append it to the html
    $post = get_post($send_id);
    $html .= '<media>'.$post->guid.'</media>';
    return $html;
}
// favicon wp hook
if ( theme_option('favicon') != null ) {
    add_action( 'wp_head', 'it_favicon');
    if( ! function_exists( 'it_favicon' ) ){
        function it_favicon(){
          echo "<link rel='icon' type='image/x-icon' href='".esc_url(theme_option('favicon'))."' />";
        }
    }
    
}

// vc column hack
if( ! function_exists( 'get_vc_it_column' ) ) {
  function get_vc_it_column( $width = '' ) {
    $width = explode('/', $width);
    $width = ( $width[0] != '1' ) ? $width[0] * floor(12 / $width[1]) : floor(12 / $width[1]);
    return  $width;
  }
}

// create function if vc is active.
if ( ! function_exists( 'vc_active' ) ) {
    function vc_active() {
        if ( class_exists( 'Vc_Manager' ) && defined( 'WPB_VC_VERSION' ) ) { return true; } else { return false; }
    }
}
if(vc_active()){
    $direc = THEME_DIR.'/layout/vc_templates';
    vc_set_shortcodes_templates_dir( $direc );
}


// create function if woocommerce is active.
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
} 

// Essential grid category
if ( ! function_exists( 'it_eg_category' ) ){
   function it_eg_category() {
        global $post;
        $cats = array();
        $terms = get_the_terms( $post->id, 'essential_grid_category' );
        
        if(is_array( $terms )){
            foreach ( $terms as $term ) { 
                $id = $term->term_id; 
                $cats[] = '<a href="../../'.$term->taxonomy. '/' .$term->slug. '">'.$term->name.'</a>';
            }
            echo implode( '  ,  ', $cats );
        }
        
    }  
}

// Blog listing Excerpt.
if ( ! function_exists( 'it_excerpt' ) ){
    function it_excerpt(){
        global $post;
        $limit = theme_option('it_excerpt');
        $excerpt = get_the_content();
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $the_str = substr($excerpt, 0, $limit);
        if ($excerpt>=$limit) {
            return $the_str .'<a class="more_btn main-color" href="'. esc_url(get_permalink($post->ID)) . '"> '.__('Read more','superfine').'</a>';
        }else{
            return $the_str;
        }
    } 
}

// Forums issue with selected menu item
if ( ! function_exists( 'it_custom_menu_classes' ) ){
   function it_custom_menu_classes( $classes , $item ){
        global $post;
        if ((function_exists('is_bbpress') && is_bbpress()) || ('essential_grid' == get_post_type()) ) {
            
            $post_slug=$post->post_name;
            $classes = str_replace( 'current_page_parent', '', $classes );
            $classes = str_replace( $post_slug, 'current_page_parent', $classes );
        }
        return $classes;
    } 
}
add_filter( 'nav_menu_css_class', 'it_custom_menu_classes', 10, 2 );

// Modefied numbers for recent posts.
function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = esc_html__( 'No Comments','superfine' );
    if ( false === $one ) $one = esc_html__( '1 Comment','superfine' );
    if ( false === $more ) $more = esc_html__( '% Comments','superfine' );
    if ( false === $none ) $none = esc_html__( 'Comments Off','superfine' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = esc_html__('Enter your password to view comments.','superfine');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $com_title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( esc_html__('Comment on %s','superfine'), $com_title ) ) . '">';
    $str .= get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? esc_html__('% Comments','superfine') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? esc_html__('No Comments','superfine') : $zero;
    else // must be one
        $output = ( false === $one ) ? esc_html__('1 Comment','superfine') : $one;
 
    return apply_filters('comments_number', $output, $number);
}

// Pagination.
if ( ! function_exists( 'it_paging_nav' ) ) {
    function it_paging_nav() {
        global $wp_query;
        if ( $wp_query->max_num_pages < 2 )
        return;
        $big = 999999999;
        $args = array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type' => 'list',
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>'                    
        );
        
        $pg_pos = theme_option('pager_position');
        
        if ( theme_option('pager_type') == "1" ) {
            if ( theme_option('pager_style') == "1" ) { ?>
            <div class="pagination default <?php echo $pg_pos;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
            <?php }else if (theme_option('pager_style') == "2"){ ?>
            <div class="pagination diamond-pager <?php echo $pg_pos;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
            <?php }else if (theme_option('pager_style') == "3"){ ?>
            <div class="pagination circle-pager <?php echo $pg_pos;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
            <?php }else if (theme_option('pager_style') == "4"){ ?>
            <div class="pagination bottom-border <?php echo $pg_pos;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
            <?php }else if (theme_option('pager_style') == "5"){ ?>
            <div class="pagination bar-1 <?php echo $pg_pos;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
            <?php }else if (theme_option('pager_style') == "6"){ ?>
            <div class="pagination bar-2 <?php echo $pg_pos;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
            <?php }else if (theme_option('pager_style') == "7"){ ?>
            <div class="pagination bar-3 <?php echo $pg_pos;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
            <?php } 
        } else if ( theme_option('pager_type') == "2" ) { ?>
            <div class="old-new shape">
                <div class="f-left"><?php next_posts_link(__('&laquo; Older','superfine')) ?></div>
                <div class="f-right"><?php previous_posts_link(__('Newer &raquo; ','superfine')) ?></div>
            </div>
        <?php } else if ( theme_option('pager_type') == "3" ){
             global $wp_query;
             ?>
             <div class="t-center">
                <a class="btn shape sm load_more" href="#"><?php echo esc_html__('Load more','superfine') ?></a>
                <img alt="" class="pager_loading" src="<?php echo THEME_URI; ?>/assets/images/page-loader.gif" />
            </div>
        <?php }
    }
}

// Infinite scroll pagination
if ( theme_option('pager_type') == "3" && is_home() ){
    add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');
    add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');
}
function wp_infinitepaginate(){ 
    $loopFile        = $_POST['loop_file'];
    $paged           = $_POST['page_no'];
    $posts_per_page  = theme_option("pagesNo");
    query_posts(array('paged' => $paged, 'post_status' => 'publish')); 
    get_template_part( $loopFile );
    exit;
}

// WOO Pagination.
if ( ! function_exists( 'woo_paging' ) ) {
    function woo_paging() {
        global $wp_query;
        if ( $wp_query->max_num_pages < 2 )
            return;
            $big = 999999999;
            $args = array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'type' => 'list',
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>'                    
            );
            
            $pg_pos_woo = theme_option('pager_position_woo');
                if ( theme_option('pager_style_woo') == "1" ) { ?>
                <div class="pagination default <?php echo $pg_pos_woo;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
                <?php }else if (theme_option('pager_style_woo') == "2"){ ?>
                <div class="pagination diamond-pager <?php echo $pg_pos_woo;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
                <?php }else if (theme_option('pager_style_woo') == "3"){ ?>
                <div class="pagination circle-pager <?php echo $pg_pos_woo;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
                <?php }else if (theme_option('pager_style_woo') == "4"){ ?>
                <div class="pagination bottom-border <?php echo $pg_pos_woo;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
                <?php }else if (theme_option('pager_style_woo') == "5"){ ?>
                <div class="pagination bar-1 <?php echo $pg_pos_woo;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
                <?php }else if (theme_option('pager_style_woo') == "6"){ ?>
                <div class="pagination bar-2 <?php echo $pg_pos_woo;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
                <?php }else if (theme_option('pager_style_woo') == "7"){ ?>
                <div class="pagination bar-3 <?php echo $pg_pos_woo;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
        <?php } 
    }
}

// EDD Pagination.
if ( ! function_exists( 'edd_paging' ) ) {
    function edd_paging() {
        global $wp_query;
        if ( $wp_query->max_num_pages < 2 )
            return;
            $big = 999999999;
            $args = array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'type' => 'list',
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>'                    
            );
            $pg_pos_edd = theme_option('pager_position_edd');
                if ( theme_option('pager_style_edd') == "1" ) { ?>
    <div class="pagination default <?php echo $pg_pos_edd;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
    <?php }else if (theme_option('pager_style_edd') == "2"){ ?>
    <div class="pagination diamond-pager <?php echo $pg_pos_edd;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
    <?php }else if (theme_option('pager_style_edd') == "3"){ ?>
    <div class="pagination circle-pager <?php echo $pg_pos_edd;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
    <?php }else if (theme_option('pager_style_edd') == "4"){ ?>
    <div class="pagination bottom-border <?php echo $pg_pos_edd;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
    <?php }else if (theme_option('pager_style_edd') == "5"){ ?>
    <div class="pagination bar-1 <?php echo $pg_pos_edd;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
    <?php }else if (theme_option('pager_style_edd') == "6"){ ?>
    <div class="pagination bar-2 <?php echo $pg_pos_edd;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
    <?php }else if (theme_option('pager_style_edd') == "7"){ ?>
    <div class="pagination bar-3 <?php echo $pg_pos_edd;?>">
                    <?php echo paginate_links( $args ); ?>
                </div>
    <?php } 
    }
}

// BBP Pagination.
if ( ! function_exists( 'bbp_paging' ) ) {
    function bbp_paging() {
        global $wp_query;
        if ( $wp_query->max_num_pages < 2 )
            return;
            $big = 999999999;
            $args = array(
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'type' => 'list',
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>'                    
        );
        $pg_pos_bbp = theme_option('pager_position_bbp');
        if ( theme_option('pager_style_bbp') == "1" ) { ?>
    <div class="pagination default <?php echo $pg_pos_bbp;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
    <?php }else if (theme_option('pager_style_bbp') == "2"){ ?>
    <div class="pagination diamond-pager <?php echo $pg_pos_bbp;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
    <?php }else if (theme_option('pager_style_bbp') == "3"){ ?>
    <div class="pagination circle-pager <?php echo $pg_pos_bbp;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
    <?php }else if (theme_option('pager_style_bbp') == "4"){ ?>
    <div class="pagination bottom-border <?php echo $pg_pos_bbp;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
    <?php }else if (theme_option('pager_style_bbp') == "5"){ ?>
    <div class="pagination bar-1 <?php echo $pg_pos_bbp;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
    <?php }else if (theme_option('pager_style_bbp') == "6"){ ?>
    <div class="pagination bar-2 <?php echo $pg_pos_bbp;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
    <?php }else if (theme_option('pager_style_bbp') == "7"){ ?>
    <div class="pagination bar-3 <?php echo $pg_pos_bbp;?>">
                <?php echo paginate_links( $args ); ?>
            </div>
    <?php } 
    }
}

// if wpml is activated
if ( ! function_exists( 'if_wpml_activated' ) ) {
  function if_wpml_activated() {
    if ( class_exists( 'SitePress' ) ) { return true; } else { return false; }
    
  }
}
if ( class_exists( 'SitePress' ) ) {
   define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true); 
}
// theme options add theme options in wp footer hook
add_action( 'wp_footer', 'it_wp_footer');
if ( ! function_exists( 'it_wp_footer' ) ){
    function it_wp_footer(){
        
        // Custom Javascript code from theme options.
        $custom_js = theme_option( 'custom_js' );
        if( $custom_js ) {
          echo '<script type="text/javascript">'. $custom_js .'</script>';
        }
       
       // Analytics code from theme options.
        $analytics = theme_option('analytics');
        if( $analytics ){
            ob_start();
            ?>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', '<?php echo esc_attr($analytics); ?>', 'auto');
              ga('send', 'pageview');

            </script>
            
            
            <?php
            echo ob_get_clean();
        }
        
        // Load More Button Page function. 
        if ( theme_option('pager_type') == "3" && !is_front_page() && is_home() ){
             global $wp_query;
             ?>
            <script type="text/javascript">
                (function($) { 
                    var count = 2;
                    var total = <?php echo $wp_query->max_num_pages; ?>;
                    if($('a.load_more').length > 0){
                        if (count <= total){
                            $('a.load_more').css('display','table');
                        }
                        $('a.load_more').click(function(e){
                            e.preventDefault();
                            if (count > total){
                                $('a.load_more').hide();
                                return false;
                            }else{
                                $('.pager_loading').show();
                                $('a.load_more').css('display','table');
                                loadArticle(count);
                            }
                            count++;
                            if (count > total){
                                $('a.load_more').hide();
                            }
                        });
                    }
                    function loadArticle(pageNumber){    
                      $.ajax({
                          url: "<?php echo esc_attr(site_url()); ?>/wp-admin/admin-ajax.php",
                          type:'POST',
                          data: "action=infinite_scroll&page_no="+ pageNumber + '&loop_file=loop', 
                          success: function(html){
                              $('.pager_loading').hide();
                              
                              var c = $(html).children().unwrap();
                              $("#content").append(c);  
                                 
                              $('.post-password-form input[type="submit"]').addClass('btn main-bg');
                              
                              if($('.masonry').length){
                                  docReady( function() {
                                    var container = document.querySelector('.masonry');
                                    var msnry;
                                    imagesLoaded( container, function() {
                                      msnry = new Masonry( container );
                                    });
                                  });
                              }
                                                            
                              if($('.posts-gal').length){
                                  $('.posts-gal').slick({
                                        dots: true,
                                        arrows:false,
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        autoplay:true
                                  });
                              }
                              
                              var htmlclass = $('html').attr('data-class');
                              
                              $('.shape').addClass(htmlclass);
                              
                              $('.no-touch .fx').waypoint(function() {
                                var anim = $(this).attr('data-animate'),
                                    del = $(this).attr('data-animation-delay');
                                    $(this).addClass('animated '+anim).css({animationDelay: del + 'ms'});
                              },{offset: '90%',triggerOnce: true});
                              
                          }
                      });
                      return false;
                  }
                  })(jQuery);
            </script> 
            <?php
        }
    }
}

if ( ! function_exists( 'it_top_footer' ) ){
    function it_top_footer(){
        $tp_foot_cont = theme_option('footer_top_content');
        $langcode = '';
        if ( class_exists( 'SitePress' ) ) {
            $langcode = '-'.ICL_LANGUAGE_CODE;
        }
        ?>
        <?php if($tp_foot_cont == 'cta'){ ?>
            <div class="col-md-10">
                <?php
                    if (theme_option('footer3_top_left_txt'.$langcode)){
                        echo '<p>'.wp_filter_post_kses(theme_option("footer3_top_left_txt".$langcode)).'</p>';
                    }
                ?>
            </div>
            <div class="col-md-2 buyNow">
                <a class="btn btn-lg alter-bg" href="<?php echo esc_url(theme_option('footer3_top_right_button_link'.$langcode)); ?>"><?php echo wp_filter_post_kses(theme_option('footer3_top_right_button_text'.$langcode)); ?></a>
            </div>
            <?php }else if($tp_foot_cont == 'twitter'){ ?>
                <div id="twitter-feed" class="slick-s shape">
                    <div class="tweet"></div>
                    
                    <a class="twitter-timeline" href="https://twitter.com/<?php echo esc_js(theme_option('twitteruser')); ?>" data-widget-id="<?php echo esc_js(theme_option('wid_id')); ?>"></a>
                    
                    <script>
                        !function(d,s,id){
                            var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                            if(!d.getElementById(id)){
                                js=d.createElement(s);js.id=id;
                                js.src=p+"://platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js,fjs);
                            }
                        }(document,"script","twitter-wjs");
                    </script>
                </div>
            <?php }else if($tp_foot_cont == 'txt'){ ?>
                <?php echo wp_kses(theme_option('footer_top_txt'.$langcode),it_allowed_tags()); ?>
            <?php }else if($tp_foot_cont == 'txt_socs'){ ?>
                <div class="f-left">
                    <p><?php echo wp_kses(theme_option('footer_top_txt_socs'.$langcode),it_allowed_tags()); ?></p>
                </div>
                <div class="bottom-bar-list f-right">
                    <?php echo display_social_icons(); ?>
                </div>
                
            <?php } ?>
        <?php
    }
}

// get current page ID
if ( ! function_exists( 'c_page_ID' ) ){
    function c_page_ID(){
        global $post;

        $pageID = '';

        if( ( get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) && is_home() )) {
            $pageID = get_option('page_for_posts');
        } else {
            if(isset($post) && !is_search()) {
                $pageID = $post->ID;
            }

            if(class_exists('Woocommerce')) {
                if(is_shop() || is_tax('product_cat') || is_tax('product_tag')) {
                    $pageID = get_option('woocommerce_shop_page_id');
                }
            }
        }
        return $pageID;
    }
}

// Custom Page Title
if ( ! function_exists( 'it_custom_page_title' ) ){
    function it_custom_page_title() {
        global $post;
        $page_title = get_the_title();    
        
        if(is_front_page()){
            $page_title = get_bloginfo( 'name' );
        } else if( is_home() ) {
            $page_title = get_the_title(get_option('page_for_posts', true));
        }else if( is_search() ) {
            $page_title = get_search_query();
        }else if( is_404() ) {
            $page_title = esc_html__('Page Not Found', 'superfine');
        }else if( is_archive()) {
            if ( is_day() ) {
                $page_title = esc_html__( 'Daily Archives:', 'superfine' ) . '<span> ' . get_the_date() . '</span>';
            } else if ( is_month() ) {
                $page_title = esc_html__( 'Monthly Archives:', 'superfine' ) . '<span> ' . get_the_date( _x( 'F Y', 'monthly archives date format', 'superfine' ) ) . '</span>';
            } elseif ( is_year() ) {
                $page_title = esc_html__( 'Yearly Archives:', 'superfine' ) . '<span> ' . get_the_date( _x( 'Y', 'yearly archives date format', 'superfine' ) ) . '</span>';
            } elseif ( is_author() ) {
                $curauth = get_user_by( 'id', get_query_var( 'author' ) );
                $auth = '';
                if($curauth->first_name || $curauth->last_name){
                    $auth = $curauth->first_name. ' ' .$curauth->last_name;
                } else{
                    $auth = $curauth->nickname;
                }
                $page_title = $auth;
            } else if( post_type_exists ( 'download' )){
                if(! is_post_type_archive()){
                    $page_title = single_cat_title( '', false );
                } else {
                    $page_title = post_type_archive_title( '', false );
                }
            }else if( class_exists( 'Woocommerce' ) && is_woocommerce() && ( is_product() || is_shop() ) && ! is_search() ) {
                $page_title = woocommerce_page_title( false );
            } else if(class_exists( 'Woocommerce' ) && is_product_category()){
                $page_title = single_cat_title('', false);
            } else {
                $page_title = get_the_title();
            }
        }else if( class_exists( 'Woocommerce' ) && is_woocommerce() && ( is_product() || is_shop() ) && ! is_search() ) {
            if( ! is_product() ) {
                $page_title = woocommerce_page_title( false );
            }
        }else{
            $page_title = get_the_title();
        }

        return $page_title;
    }
}

// Custom Page Title Icon
if ( ! function_exists( 'it_page_title_icon' ) ){
    function it_page_title_icon(){
        $page_icon = '';
        $meta_icon = get_post_meta( c_page_ID() , 'title_icon' , true);
        $theme_page_icon = theme_option('title_icon');
        if($meta_icon != ''){
           $page_icon = $meta_icon; 
        }else{
           $page_icon = $theme_page_icon; 
        }
        echo $page_icon;
    }
}

// Get logged in user
if ( !function_exists('loggedUser') ){
    function loggedUser(){
       global $user_identity;
       echo $user_identity; 
    }
}

// Theme Header
if ( ! function_exists( 'it_theme_header' ) ){
    function it_theme_header(){
        $hide_header = get_post_meta( c_page_ID() , 'hide_header' , true);
        $meta_header = get_post_meta( c_page_ID() , 'meta_header_style' , true);
        
        $hd_style = '';
        
        if ($meta_header == '' ){
            $hd_style = theme_option("header_layout");
        }else {
            $hd_style = $meta_header;
        }
        
        if (!$hide_header == '1' ){
            get_template_part( 'layout/headers/'.$hd_style);
        }
    }
}

if ( ! function_exists('it_select_menu') ){
    function it_select_menu(){
        $options = get_post_custom(get_the_ID());
        if(isset($options['select_menu'])){
            $menu = $options['select_menu'][0];
        }else{
            $menu = 'main-menu';
        }
        
        if ( has_nav_menu( $menu ) ) {
            it_nav_menu( array( 'theme_location' => $menu) ); 
        }else{
            echo '<span class="menu-message">'.__('Please go to admin panel > Menus > select Main menu and add items to it.','superfine').'</span>';
        }
    }
}

// Maintenace Mode.
function maintenace_mode() {
    if(theme_option('enable_maintenace_mode') == '1'){
        if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() || !(current_user_can( 'administrator' ) ||  current_user_can( 'super admin' )) ) {
          //wp_die('<h1>Website Under Maintenance</h1>');
          get_template_part('layout/others/soon');
          exit(0);
      }
    }
}
add_action('get_header', 'maintenace_mode');

// Theme Footer
if ( ! function_exists( 'it_theme_footer' ) ){
    function it_theme_footer(){
        
        $hide_footer = get_post_meta(c_page_ID(),'hide_footer',true);
        $meta_footer = get_post_meta( c_page_ID() , 'meta_footer_style' , true);
        
        $ft_style = '';
        
        if ($meta_footer == '' ){
            $ft_style = theme_option("footer_style");
        }else {
            $ft_style = $meta_footer;
        }
        
        if (!$hide_footer == '1' ){
            get_template_part( 'layout/footers/footer-'.$ft_style);
        }
    }
}

// Theme page title style
if ( ! function_exists( 'it_title_style' ) ){
    function it_title_style(){
        if( is_search() ) {
            get_template_part( 'layout/page-titles/title-search');
        } else {
            $hide_title = get_post_meta(c_page_ID(),'hide_page_title',true);
            $cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
            if($cust_title == '1' && get_post_meta(c_page_ID(),'title_style',true) != '0'){
                $titl_styl = get_post_meta(c_page_ID(),'title_style',true);
            }else{
               $titl_styl = theme_option("page_head_style");
            }
            if (!$hide_title == '1' ){ 
                get_template_part( 'layout/page-titles/title-'.$titl_styl);
            }
        }
    }
}

// page title meta.
if ( ! function_exists( 'it_page_title_meta' ) ){
    function it_page_title_meta(){
        
        $cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
        if($cust_title == '1'){
           $titl_text = get_post_meta(c_page_ID(),'custom_title_txt',true);
           $subtitl_text = get_post_meta(c_page_ID(),'custom_subtitle',true); 
        }
    }
}

// Custom Pahe title css that will be put in header css
if ( ! function_exists( 'it_title_css' ) ){
    function it_title_css(){
    
        $cust_title = get_post_meta(c_page_ID(),'chck_custom_title',true);
        $title_bg_col = get_post_meta(c_page_ID(),'title_bg_color',true);
        $title_bg_img = get_post_meta(c_page_ID(),'title_bg_img',true);
        $title_full_bg = get_post_meta(c_page_ID(),'title_full_bg',true);
        $title_fixed_bg = get_post_meta(c_page_ID(),'title_fixed_bg',true);
        $title_bg_repeat = get_post_meta(c_page_ID(),'title_bg_repeat',true);
        $title_overlay = get_post_meta(c_page_ID(),'title_bg_overlay',true);
        $title_over_opacity = get_post_meta(c_page_ID(),'title_bg_overlay_opacity',true);
        $sub_col = get_post_meta(c_page_ID(),'subtitle_color',true);
        $title_col = get_post_meta(c_page_ID(),'title_color',true);
        $title_height = get_post_meta(c_page_ID(),'title_height',true);
        ?>
        <style type="text/css">
            <?php if($cust_title == '1'){ ?>
            
               <?php if($title_bg_col != ''){ ?>
               .page-title.title-1,.page-title.title-2,.page-title.title-3,.page-title.title-4{
                   background-color: <?php echo esc_attr($title_bg_col); ?> !important;
                   background-image: none !important;
               }
               <?php } ?>
               
               <?php if($title_bg_img != '' && !is_tag() && !is_archive()){ ?>
               .page-title.title-1,.page-title.title-2,.page-title.title-3,.page-title.title-4{
                   background-image: url('<?php echo esc_url($title_bg_img); ?>') !important;
                   background-repeat: <?php echo $title_bg_repeat; ?> !important;
                   <?php if($title_full_bg == '1'){ ?>
                   background-size: 100% 100%;
                   <?php }else{ ?>
                   background-size: initial !important;    
                   <?php } ?>
                   <?php if($title_fixed_bg == '1'){ ?>
                   background-attachment: fixed;
                   <?php }else{ ?>
                   background-attachment: scroll !important;    
                   <?php } ?>
               }
               <?php } ?>
               <?php if($title_col){ ?>
               .page-title h1 {
                  color: <?php echo esc_attr($title_col); ?> !important; 
               }
               <?php } ?>
               <?php if($sub_col){ ?>
               .page-title h3.sub-title {
                  color: <?php echo esc_attr($sub_col); ?> !important; 
               }
               <?php } ?>
               
               <?php if($title_height){ ?>
               .page-title > .container > .row{
                    height: <?php echo esc_attr($title_height); ?> !important;
                }
                <?php } ?>
                <?php if(isset($title_overlay)){ ?>
                .title-overlay{
                    background-color: <?php echo esc_attr($title_overlay); ?>;
                    opacity: <?php echo esc_attr($title_over_opacity); ?>;
                }
                <?php } ?>
                
            <?php } ?>
        </style>
        <?php
    }
}

// Header banner
if ( ! function_exists( 'header_banner' ) ){
    function header_banner(){
        $banner_img = get_post_meta(c_page_ID(),'meta_header_banner',true);
        $banner_link = get_post_meta(c_page_ID(),'meta_header_banner_link',true);
        $theme_banner_img = theme_option('header_banner');
        $theme_banner_link = theme_option('header_banner_link');
        
        if($banner_img != '') {
            if($banner_link !='') {
                echo '<a href="'.esc_url($banner_link).'"><img alt="" src="'.esc_url($banner_img).'" /></a>';
            }else{
                echo '<img alt="" src="'.esc_url($banner_img).'" />';
            }
        }else if ($theme_banner_img !=''){
            if($theme_banner_link !='') {
                echo '<a href="'.esc_url($theme_banner_link).'"><img alt="" src="'.esc_url($theme_banner_img).'" /></a>';
            }else{
                echo '<img alt="" src="'.esc_url($theme_banner_img).'" />';
            } 
        }
        
    }
}

// woo shopping cart in header.
if ( ! function_exists( 'it_wo_cart' ) ){
   function it_wo_cart(){
        if(class_exists('Woocommerce')) {
            //if(is_shop() || is_tax('product_cat') || is_tax('product_tag') || is_singular('product') || is_checkout()) {
                global $woocommerce;
                ?>
                <a href="#"><span class="fa fa-shopping-cart"></span><i class="cart-num main-bg white"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'superfine'), $woocommerce->cart->cart_contents_count);?></i></a>
                <div class="cart-box">
                <div class="mini-cart">
                    <ul class="cart_list mini-cart-list product_list_widget">

                        <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

                            <?php
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

                                        ?>
                                        <li>
                                        <?php if ( ! $_product->is_visible() ) { ?>
                                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                        <?php } else { ?>
                                            <a class="cart-mini-lft" href="<?php echo esc_url(get_permalink( $product_id )); ?>">
                                                <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                            </a>
                                        <?php } ?>
                                            <div class="cart-body"><?php echo WC()->cart->get_item_data( $cart_item ); ?>
                                            <a href="<?php echo esc_url(get_permalink( $product_id )); ?>"><?php echo $product_name ?></a>
                                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ,'superfine' ) . '</span>', $cart_item, $cart_item_key ); ?></div>
                                        </li>
                                        <?php
                                    }
                                }
                            ?>

                        <?php else : ?>

                            <li class="empty"><?php _e( 'Your Shopping cart is empty.', 'superfine' ); ?></li>

                        <?php endif; ?>

                    </ul>

                    <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                        <div class="mini-cart-total"><div class="f-left"><?php _e( 'Subtotal', 'superfine' ); ?>:</div><div class="f-right"> <?php echo WC()->cart->get_cart_subtotal(); ?></div></div>
                        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
                        <div class="checkout">
                            <a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="btn main-bg"><?php _e( 'View Cart', 'superfine' ); ?></a>
                            <a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="btn btn-default"><?php _e( 'Checkout', 'superfine' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>                                  
        <?php
            //}
        }
    } 
}

// woo shopping cart in header.
if ( ! function_exists( 'it_topbar_wo_cart' ) ){
   function it_topbar_wo_cart(){
        if(class_exists('Woocommerce')) {
        global $woocommerce;
        ?>
        <a href="#"><span class="fa fa-shopping-cart"></span><i class="cart-num main-bg white"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'superfine'), $woocommerce->cart->cart_contents_count);?></i></a>
                <div class="cart-box">
                <div class="mini-cart">
                    <ul class="cart_list mini-cart-list product_list_widget">

                        <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

                            <?php
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

                                        ?>
                                        <li>
                                        <?php if ( ! $_product->is_visible() ) { ?>
                                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                        <?php } else { ?>
                                            <a class="cart-mini-lft" href="<?php echo esc_url(get_permalink( $product_id )); ?>">
                                                <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                            </a>
                                        <?php } ?>
                                            <div class="cart-body"><?php echo WC()->cart->get_item_data( $cart_item ); ?>
                                            <a href="<?php echo esc_url(get_permalink( $product_id )); ?>"><?php echo $product_name ?></a>
                                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price, 'superfine' ) . '</span>', $cart_item, $cart_item_key ); ?></div>
                                        </li>
                                        <?php
                                    }
                                }
                            ?>

                        <?php else : ?>

                            <li class="empty"><?php _e( 'Your Shopping cart is empty.', 'superfine' ); ?></li>

                        <?php endif; ?>

                    </ul>

                    <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                        <div class="mini-cart-total"><div class="f-left"><?php _e( 'Subtotal', 'superfine' ); ?>:</div><div class="f-right"> <?php echo WC()->cart->get_cart_subtotal(); ?></div></div>
                        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
                        <div class="checkout">
                            <a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" class="btn main-bg"><?php _e( 'View Cart', 'superfine' ); ?></a>
                            <a href="<?php echo esc_url(WC()->cart->get_checkout_url()); ?>" class="btn btn-default"><?php _e( 'Checkout', 'superfine' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        }
    } 
}

//Limit number of tags inside widget
if ( ! function_exists( 'tag_widget_limit' ) ){
    function tag_widget_limit($args){
        $tagsNo = theme_option('tags_limit');
         //Check if taxonomy option inside widget is set to tags
         if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
          $args['number'] = esc_attr($tagsNo); //Limit number of tags
         }

         return $args;
    }
}
add_filter('widget_tag_cloud_args', 'tag_widget_limit');

// get ID by slug
if(! function_exists('get_ID_by_slug')) {
    function get_ID_by_slug($page_slug) {
        $page = get_page_by_path($page_slug);
        if ($page) {
            return $page->ID;
        } else {
            return null;
        }
    }
}

// buddypress activity for public
add_filter( 'bbp_is_site_public', 'it_enable_bbp_activity', 10, 2);
function it_enable_bbp_activity( $public, $site_id ) {
    return true;
} 

// number of tags allowed
if ( ! function_exists('it_allowed_tags')){
    function it_allowed_tags(){
        global $allowedtags;
        $attrs = array('class'=>array(),'style'=>array(),'id'=>array(),'src'=>array(),'alt'=>array(),'title'=>array(),'href'=>array());
        
        $allowedtags['span'] = $attrs;
        $allowedtags['div'] = $attrs;
        $allowedtags['p'] = $attrs;
        $allowedtags['img'] = $attrs;
        $allowedtags['b'] = $attrs;
        $allowedtags['i'] = $attrs;
        $allowedtags['strong'] = $attrs;
        $allowedtags['a'] = $attrs;
        
        return $allowedtags;
    }
}

// Display Social Icons
if ( ! function_exists('soc_item')){
   function soc_item(){
        $options = get_option( 'theme_options' );
        $ico='';
        if ( isset($options[ 'social_icons' ]) ){
           $ico = $options['social_icons']; 
        }
        
        return $ico;
    } 
}
if ( ! function_exists( 'display_social_icons' ) ) {
    function display_social_icons(){
        $langcode = '';
        if ( class_exists( 'SitePress' ) ) {
            $langcode = '-'.ICL_LANGUAGE_CODE;
        }
        $socio_list ='<ul class="social-list">';
        for($i = 0; $i < soc_item() ; ++$i){
            $g = $i+1;
            $socio_list .='<li>';
                if(theme_option("social_icon".$g)){ 
                    $socio_list .='<a href="'.esc_attr(theme_option("social_icon_link".$g)).'" class="shape sm '.esc_html(theme_option("social_icon".$g)).'" title="'.esc_attr(theme_option("social_icon_title".$g)).'"></a>';
                }
            $socio_list .='</li>';
        }
        $socio_list .='</ul>';    
        return $socio_list;    
    }    
}

// fix tags issue in custom post type ess. grid
if(! function_exists('post_type_tags_fix')){
    function post_type_tags_fix($request) {
        if ( isset($request['tag']) && !isset($request['post_type']) )
        $request['post_type'] = 'essential_grid';
        return $request;
    }
    add_filter('request', 'post_type_tags_fix');
}

function it_fix_tags( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        $post_types = get_post_types();

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'it_fix_tags' );

function allow_data_event_content() {
    global $allowedposttags, $allowedtags;
    //$newattribute = "class";
    $newattribute = "style"; 
    $allowedposttags["span"][$newattribute] = true;
    $allowedtags["span"][$newattribute] = true;
    $allowedposttags["ul"][$newattribute] = true;
    $allowedtags["ul"][$newattribute] = true;
    $allowedposttags["li"][$newattribute] = true;
    $allowedtags["li"][$newattribute] = true;
}
add_action( 'init', 'allow_data_event_content' );
