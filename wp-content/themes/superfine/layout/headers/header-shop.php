<?php
$clsticky = '';
$effect = 'effect-'.theme_option('menu_effect');
$show_bar = theme_option("show_top_bar");
$ht_bar = get_post_meta(c_page_ID(),'hide_top_bar',true);
$h_menu = get_post_meta(c_page_ID(),'hide_menu',true);
if ( theme_option('sticky_header_on') == '1'){
    $clsticky = 'data-sticky="true"';
}
$header_class = get_post_meta(c_page_ID(),'meta_header_extra_class',true);
if(isset($header_class)){
    $clas = ' '.$header_class;
}else{
    $clas = '';
}
$langcode = '';
if ( class_exists( 'SitePress' ) ) {
    $langcode = '-'.ICL_LANGUAGE_CODE;
}
?>
<?php
    $cls='';
    if (theme_option("show_top_bar") == "0"){
        $cls = 'margin-top-0';
    }
?>
<div id="headWrapper" class="clearfix">
<?php 
if ( $show_bar == '1') {
    if($ht_bar == '' || $ht_bar == '0'){
    get_template_part( 'layout/headers/top-bar');
    } 
} 
?>
<?php if ( !$h_menu == '1') { ?>
<header class="top-head<?php echo $clas ?> header-4 shop-head <?php echo $cls; ?>" <?php echo $clsticky; ?>>
        <div class="up-head">
            <div class="container">
                <div class="logo">
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
            
                <?php if (is_woocommerce_activated()){ ?>
                <?php if(theme_option("show_cart")){ ?>
                <div class="top-cart">
                    <?php echo it_wo_cart(); ?>
                </div>
                <?php } ?>
                <?php } ?>
                
                <?php if(theme_option("show_search")){ ?>
                <div class="top-search vis-search shape">
                    <?php get_search_form(); ?>
                </div>
                <?php } ?>
                
                <div class="f-right top-shop-links">
                    <a href="<?php echo esc_url(theme_option('link_1_link'.$langcode)); ?>" class="shape sm"><i class="fa fa-folder-open"></i><?php echo esc_html(theme_option('link_1_text'.$langcode)); ?></a>
                    <a href="<?php echo esc_url(theme_option('link_2_link'.$langcode)); ?>" class="shape sm"><i class="fa fa-money"></i><?php echo esc_html(theme_option('link_2_text'.$langcode)); ?></a>
                    <a href="<?php echo esc_url(theme_option('link_3_link'.$langcode)); ?>" class="shape sm"><i class="fa fa-gift"></i><?php echo esc_html(theme_option('link_3_text'.$langcode)); ?></a>
                </div>
            
            </div>
            
            
        </div>    
</header>
<?php } ?>
<?php if ( get_header_image() ) : ?>
<div class="custom-header">
    <img src="<?php esc_attr(header_image()); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
</div>
<?php endif; ?>
</div>
