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
<footer id="footWrapper" class="fixed-footer">
    
    <?php if ( $opts_bot_foot == "1" && $hb_foot_bar != '1') { ?>
    <div class="footer-bottom padding-vertical-0">
        <div class="container">
            <div class="row">

                <div class="copyrights col-md-5 first copy2 white">
                <?php if ( theme_option('enable_copyrights') == "1" ) : ?>
                    <?php if ( theme_option('copyrights'.$langcode) ) : ?>
                        <?php echo wp_kses(theme_option('copyrights'.$langcode),it_allowed_tags()); ?>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
                
                <div class="col-md-7">
                    <div class="bottom-bar-list f-right">
                        <?php echo display_social_icons(); ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- footer bottom bar end -->
    
</footer>