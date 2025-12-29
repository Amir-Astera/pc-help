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
            <div class="f-left">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" src="<?php echo esc_url(theme_option('minimal-logo')); ?>"></a>
            </div>
            <div class="f-left footer-logo-txt">
                <?php echo wp_kses(theme_option('minimal-text'.$langcode),it_allowed_tags()); ?>
            </div>
            <?php if ( theme_option('address_minimal_footer') == "1" || theme_option('email_minimal_footer') == "1" || theme_option('phone_minimal_footer') == "1" ) { ?>
            <ul class="minimal-info f-right">
                <?php if ( theme_option('address_minimal_footer') == "1" ) { ?>
                <li><span><i class="fa fa-map-marker"></i><?php echo esc_attr(theme_option("contact_address".$langcode)); ?></span></li>
                <?php } ?>
                <?php if ( theme_option('email_minimal_footer') == "1" ) { ?>
                <li><a class="shape" href="mailto:<?php echo esc_html(theme_option("contact_email")); ?>"><i class="fa fa-envelope"></i><?php echo esc_html(theme_option("contact_email")); ?></a></li>
                <?php } ?>
                <?php if ( theme_option('phone_minimal_footer') == "1" ) { ?>
                <li><span><i class="fa fa-phone"></i> <?php echo esc_html(theme_option('contact_phone_title'.$langcode)); ?> <?php echo esc_attr(theme_option("contact_phone")); ?></span></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>    
    </div>
    <?php } ?>
    
    <!-- footer bottom bar start -->
    <?php if ( $opts_bot_foot == "1" && $hb_foot_bar != '1') { ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">

                <div class="copyrights col-md-5">
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