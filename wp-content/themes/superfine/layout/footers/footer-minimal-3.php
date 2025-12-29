<?php
/*
Footer Style
*/
$opts_foot_bar = (theme_option('footer_top_show') == '1') ? '1' : '0';
$opts_foot_widgets = (theme_option('enable_footer_widgets') == '1') ? '1' : '0';
$opts_bot_foot = (theme_option('show_bottom_footer') == '1') ? '1' : '0';
$ht_foot_bar = (get_post_meta(c_page_ID(),'hide_top_foot_bar',true) == '1') ? '1' : '0';
$h_foot_widgets = (get_post_meta(c_page_ID(),'hide_foot_widgets',true) == '1') ? '1' : '0';
$hb_foot_bar = (get_post_meta(c_page_ID(),'hide_bottom_foot_bar',true) == '1') ? '1' : '0';  
$langcode = '';
if ( class_exists( 'SitePress' ) ) {
    $langcode = '-'.ICL_LANGUAGE_CODE;
}  
?>
<footer id="footWrapper" class="footer-minimal">
    
    <?php if ( $opts_foot_widgets == "1" && $h_foot_widgets != '1') { ?>
    <div class="footer-middle">
        <div class="container">
            <div class="centered margin-bottom-20">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" src="<?php echo esc_url(theme_option('minimal-logo')); ?>"></a>
            </div>
            
            <div class="centered minimal-socials">
                <?php echo display_social_icons(); ?>
            </div>
            <!-- footer social links right cell end -->
            <div class="clearfix margin-bottom-15"></div>
            <!-- footer copyrights left cell -->
            <div class="copyrights centered">
                <?php if ( theme_option('enable_copyrights') == "1" ) : ?>
                    <?php if ( theme_option('copyrights'.$langcode) ) : ?>
                        <?php echo wp_kses(theme_option('copyrights'.$langcode),it_allowed_tags()); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            
        </div>    
    </div>
    <?php } ?>
    
</footer>