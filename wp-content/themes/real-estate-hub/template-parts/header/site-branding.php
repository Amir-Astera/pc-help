<?php
/*
* Display Logo and contact details
*/
?>
<?php
    $real_estate_hub_sticky = get_theme_mod('real_estate_hub_sticky');
    $real_estate_hub_data_sticky = "false";
    if ($real_estate_hub_sticky) {
    $real_estate_hub_data_sticky = "true";
    }
    global $wp_customize;
 ?>

 <div class="headerbox py-3 <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($real_estate_hub_data_sticky); ?>">

  <div class="container">
       <div class="row topbar-bg">
      <div class="col-lg-7 col-md-5 align-self-center">
        <?php if( get_theme_mod( 'real_estate_hub_topbar_text' ) != '') { ?>
        <p class="mb-0 text-lg-left"><?php echo esc_html( get_theme_mod('real_estate_hub_topbar_text','') ); ?></p>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-md-3 align-self-center">
        <?php if( get_theme_mod( 'real_estate_hub_call_text' ) != '' || get_theme_mod( 'real_estate_hub_call' ) != '') { ?>
          <p class="mb-0"><span><?php echo esc_html( get_theme_mod('real_estate_hub_call_text','') ); ?></span> <?php echo esc_html( get_theme_mod('real_estate_hub_call','') ); ?></p>
        <?php } ?>
      </div>
      <div class="col-lg-3 col-md-4 social-media text-center text-md-right align-self-center">
        <?php if( get_theme_mod( 'real_estate_hub_mail_text' ) != '' || get_theme_mod( 'real_estate_hub_mail' ) != '') { ?>
        <p class="mb-0 text-center text-md-right"><span><?php echo esc_html( get_theme_mod('real_estate_hub_mail_text','') ); ?></span> <?php echo esc_html( get_theme_mod('real_estate_hub_mail','') ); ?></p>
        <?php } ?>
      </div>
    </div>
    <div class="row header-detail">
      <div class="col-lg-3 col-md-5 col-12 align-self-center text-lg-left">
        <?php $real_estate_hub_logo_settings = get_theme_mod( 'real_estate_hub_logo_settings','Different Line');
        if($real_estate_hub_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) real_estate_hub_the_custom_logo(); ?>
            <?php if( get_theme_mod('real_estate_hub_site_title_text',true) == 1){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $real_estate_hub_description = get_bloginfo( 'description', 'display' );
            if ( $real_estate_hub_description || is_customize_preview() ) : ?>
              <?php if( get_theme_mod('real_estate_hub_site_tagline_text',false)){ ?>
                <p class="site-description"><?php echo esc_html($real_estate_hub_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($real_estate_hub_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-center">
                <?php if( has_custom_logo() ) real_estate_hub_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-center">
                <?php if( get_theme_mod('real_estate_hub_site_title_text',true) == 1){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $real_estate_hub_description = get_bloginfo( 'description', 'display' );
                if ( $real_estate_hub_description || is_customize_preview() ) : ?>
                  <?php if( get_theme_mod('real_estate_hub_site_tagline_text',false)){ ?>
                    <p class="site-description"><?php echo esc_html($real_estate_hub_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-7 col-md-3 col-4 align-self-center text-md-center">
        <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
      </div>
      <div class="col-lg-2 col-md-4 col-8 align-self-center text-lg-right text-md-right">
        <?php if( get_theme_mod( 'real_estate_hub_header_button_link' ) != '' || get_theme_mod( 'real_estate_hub_header_button' ) != '') { ?>
          <div class="more-btn">
            <a href="<?php echo esc_url( get_theme_mod( 'real_estate_hub_header_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'real_estate_hub_header_button','' ) ); ?></a>
          </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>

