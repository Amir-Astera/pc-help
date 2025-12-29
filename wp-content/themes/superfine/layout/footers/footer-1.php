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
<footer id="footWrapper">
   <?php if ( $opts_foot_bar == '1' && $ht_foot_bar != '1'){ ?>
    <div class="footer-top main-bg">
        <div class="container">
            <?php it_top_footer(); ?>
        </div>
    </div>
    <?php }?>
    <?php if ( $opts_foot_widgets == "1" && $h_foot_widgets != '1') { ?>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <?php if(is_active_sidebar('footer-widgets')){ ?>
                    <?php dynamic_sidebar('footer-widgets'); ?>
                <?php } ?>
            </div>
            <?php if(is_active_sidebar('bottom-md-footer-widgets')){ ?>
                <div class="clearfix margin-bottom-30"></div>
                <div class="bottom-md-footer">
                    <?php dynamic_sidebar('bottom-md-footer-widgets'); ?>
                </div>
            <?php } ?>
        </div>    
    </div>
    <?php } ?>
    
    <!-- footer bottom bar start -->
    <?php if ( $opts_bot_foot == "1" && $hb_foot_bar != '1') { ?>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- footer copyrights left cell -->
                <?php if ( theme_option('enable_copyrights') == "1" ) : ?>
                    <div class="copyrights col-md-5">
                        <?php if ( theme_option('copyrights'.$langcode) ) : ?>
                            <?php echo wp_kses(theme_option('copyrights'.$langcode),it_allowed_tags()); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <!-- footer social links right cell start -->
                <?php if(is_active_sidebar('bottom-right-footer-widgets')){ ?>
                    <div class="col-md-7">
                        <div class="right no-bord">
                            <?php dynamic_sidebar('bottom-right-footer-widgets'); ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- footer social links right cell end -->
                
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- footer bottom bar end -->
    
</footer>