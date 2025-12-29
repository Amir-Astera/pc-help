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
<?php if ( !$h_menu == '1') { ?>
<header class="top-head<?php echo $clas ?> boxed-transparent" <?php echo $clsticky; ?>>
    <div class="container">
        <div class="logo">
            <?php if(theme_option("header_logo_image")){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo-img">
                    <img alt="" src="<?php echo esc_url(theme_option('header_logo_image')); ?>">
                    <?php if(theme_option("site_slogan".$langcode)) { ?>
                        <span><?php echo esc_html(theme_option("site_slogan".$langcode)); ?></span>
                    <?php } ?>
                </a>
            <?php } else if(theme_option("site_title".$langcode)){ ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <i class="logo-txt"><?php echo esc_html(theme_option("site_title".$langcode)); ?></i>
                    <?php if(theme_option("site_slogan".$langcode)) { ?>
                        <span><?php echo esc_html(theme_option("site_slogan".$langcode)); ?></span>
                    <?php } ?>
                </a>
            <?php } else { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">     
                    <i class="logo-txt"><?php bloginfo( 'name' ); ?></i>
                    <span><?php bloginfo('description'); ?></span>
                </a>
           <?php } ?>
        </div>
        <div class="f-right responsive-nav">
            <?php it_select_menu(); ?>                 
            <?php if(theme_option("show_search")){ ?>
            <div class="top-search">
                <a href="#" class="main-color"><span class="fa fa-search"></span></a>
                <div class="search-box">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <?php } ?>
            
            <?php if (is_woocommerce_activated()){ ?>
            <?php if(theme_option("show_cart")){ ?>
            <div class="top-cart">
                <?php echo it_wo_cart(); ?>
            </div>
            <?php } ?>
            <?php } ?>
            
        </div>
    </div>
</header>
<?php } ?>
<?php if ( get_header_image() ) : ?>
<div class="custom-header">
    <img src="<?php esc_attr(header_image()); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
</div>
<?php endif; ?>