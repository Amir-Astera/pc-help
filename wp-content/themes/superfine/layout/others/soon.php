<?php
    $langcode = '';
if ( class_exists( 'SitePress' ) ) {
    $langcode = '-'.ICL_LANGUAGE_CODE;
}
$lghead = theme_option('soon_large_heading'.$langcode);
$lghead_col = theme_option('soon_lg_head_color');
$lghead_h2 = theme_option('soon_large_heading2'.$langcode);
$lghead_h2_col = theme_option('soon_lg_head2_color');
$desc = theme_option('soon_decription'.$langcode);
$desc_col = theme_option('soon_desc_color');
$showlinks = theme_option('show_social_links');
$digits = theme_option('show_count_down');
$fb = theme_option('soon_facebook');
$tw = theme_option('soon_twitter');
$ln = theme_option('soon_linkedin');
$gplus = theme_option('soon_google-plus');
$sky = theme_option('soon_skype');
$rss = theme_option('soon_rss');
$ut = theme_option('soon_youtube');
$pghead = theme_option('show_page_head');
$soon_bg = theme_option('soon_bg');
if($lghead_h2_col){
    $lg2colhead = ' style="color:'.esc_attr($lghead_h2_col).'"';
}
if($lghead_col){
    $lgcolhead = ' style="color:'.esc_attr($lghead_col).'"';
}
if($desc_col){
    $lg3colhead = ' style="color:'.esc_attr($desc_col).'"';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo theme_option('shape'); ?>" data-class="<?php echo theme_option('shape'); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <?php
        if ( ! function_exists( '_wp_render_title_tag' ) ) :
            function theme_slug_render_title() {
        ?>
        <title><?php wp_title( ' | ', true, 'right' ); ?></title>
        <?php
        }
        add_action( 'wp_head', 'theme_slug_render_title' );
        endif;
        ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" media="screen" />
        <?php if ( ! isset( $content_width ) ) $content_width = 960; ?>
        <?php it_title_css(); ?>
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class('soon-page'); ?>>
        <?php if ( theme_option('page-loader') ) : ?>
            <!-- site preloader start -->
            <div class="page-loader"></div>
            <!-- site preloader end -->
        <?php endif; ?>
        <div class="pageWrapper <?php echo theme_option('layout'); ?>">
        
        <div id="contentWrapper">
                
                <div class="container">
                    
                        <div class="clearfix over-hidden">
                            <!-- Logo start -->
                            <div class="logo soon-logo shape">
                                <?php if(theme_option("header_logo_image")){ ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                        <img alt="" src="<?php echo esc_url(theme_option('header_logo_image')); ?>">
                                    </a>
                                <?php } else if(theme_option("site_title".$langcode)){ ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                        <i class="logo-txt"><?php echo esc_html(theme_option("site_title".$langcode)); ?></i>
                                        <span><?php echo esc_html(theme_option("site_slogan".$langcode)); ?></span>
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">     
                                        <i class="logo-txt"><?php bloginfo( 'name' ); ?></i>
                                        <span><?php bloginfo('description'); ?></span>
                                    </a>
                               <?php } ?>
                            </div>
                            <!-- Logo end -->
                            
                        </div>
                                            
                        <div class="t-center">
                            
                            <div class="soon-heading">
                                
                                <?php if($lghead != ''){ ?>
                                    <h1 class="bold soon-lg-head"<?php echo $lgcolhead ?>><?php echo wp_filter_post_kses($lghead); ?></h1>
                                <?php } ?>
                                <?php if($lghead_h2 != ''){ ?>
                                    <h2 class=" bold uppercase"<?php echo $lg2colhead ?>><?php echo wp_filter_post_kses($lghead_h2); ?></h2>
                                <?php } ?>
                                <?php if($desc != ''){ ?>
                                    <h3<?php echo $lg3colhead ?>><?php echo wp_kses($desc,it_allowed_tags());  ?></h3>
                                <?php } ?>                            
                                
                            </div>
                            
                            <?php if($digits == '1'){ ?>            
                                <div id="holder">
                                    <div class="count-down">
                                        <div class="digits"></div>
                                    </div>
                                </div>
                            <?php } ?>
                            
                        </div>
                        
                
                    <?php if($showlinks == '1'){ ?>
                    <div class="centered padding-vertical-25">
                        <ul class="social-list">
                            <?php if($fb != ''){ ?>
                                <li><a class="lg-icon white-border shape fa fa-facebook white" href="<?php echo esc_url($fb); ?>"></a></li>
                            <?php } ?>
                            <?php if($tw != ''){ ?>
                                <li><a class="lg-icon white-border shape fa fa-twitter white" href="<?php echo esc_url($tw); ?>"></a></li>
                            <?php } ?>
                            <?php if($ln != ''){ ?>
                                <li><a class="lg-icon white-border shape fa fa-linkedin white" href="<?php echo esc_url($ln); ?>"></a></li>
                            <?php } ?>
                            <?php if($gplus != ''){ ?>
                                <li><a class="lg-icon white-border shape fa fa-google-plus white" href="<?php echo esc_url($gplus); ?>"></a></li>
                            <?php } ?>
                            <?php if($sky != ''){ ?>
                                <li><a class="lg-icon white-border shape fa fa-skype white" href="<?php echo esc_url($sky); ?>"></a></li>
                            <?php } ?>
                            <?php if($rss != ''){ ?>
                                <li><a class="lg-icon white-border shape fa fa-rss white" href="<?php echo esc_url($rss); ?>"></a></li>
                            <?php } ?>
                            <?php if($ut != ''){ ?>
                                <li><a class="lg-icon white-border shape fa fa-youtube white" href="<?php echo esc_url($ut); ?>"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                    
                    <?php if ( theme_option('enable_copyrights') == "1" ) { ?>

                        <div class="clearfix margin-bottom-15"></div>

                        <div class="copyrights centered white">
                            <?php if ( theme_option('copyrights'.$langcode) ) : ?>
                                <?php echo wp_kses(theme_option('copyrights'.$langcode),it_allowed_tags()); ?>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                                                                                    
                </div>
            </div>
            
                
            </div>
            <!-- Content End -->
            
            
        </div>                
        
</div>            
</div>
<?php wp_footer(); ?>
<?php
    $soon_date = theme_option('soon_date');
        ?>
        <script type="text/javascript">
            if(jQuery(".digits").length > 0){
                jQuery('.digits').countdown('<?php echo esc_attr($soon_date); ?>').on('update.countdown', function(event) {
                  var $this = jQuery(this).html(event.strftime('<ul>'
                     + '<li><span>%-w</span><p> <?php echo __('weeks','superfine'); ?> </p> </li>'
                     + '<li><span>%-d</span><p> <?php echo __('days','superfine'); ?> </p></li>'
                     + '<li><span>%H</span><p> <?php echo __('Hours','superfine'); ?> </p></li>'
                     + '<li><span>%M</span><p> <?php echo __('Minutes','superfine'); ?> </p></li>'
                     + '<li><span>%S</span><p> <?php echo __('Seconds','superfine'); ?> </p></li>'
                     +'</ul>'));
                 });
            }
        </script>
</body>
</html>