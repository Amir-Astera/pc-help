<?php
/**
 * Template part for displaying slider section
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

?>

<?php $static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'real_estate_hub_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $real_estate_hub_slide_pages = array();
      for ( $real_estate_hub_count = 1; $real_estate_hub_count <= 4; $real_estate_hub_count++ ) {
        $real_estate_hub_mod = intval( get_theme_mod( 'real_estate_hub_slider_page' . $real_estate_hub_count ));
        if ( 'page-none-selected' != $real_estate_hub_mod ) {
          $real_estate_hub_slide_pages[] = $real_estate_hub_mod;
        }
      }
      if( !empty($real_estate_hub_slide_pages) ) :
        $real_estate_hub_arguments = array(
          'post_type' => 'page',
          'post__in' => $real_estate_hub_slide_pages,
          'orderby' => 'post__in'
        );
        $real_estate_hub_queries = new WP_Query( $real_estate_hub_arguments );
        if ( $real_estate_hub_queries->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $real_estate_hub_queries->have_posts() ) : $real_estate_hub_queries->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          
            <div class="slide-main-img">
              <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'.esc_url( $static_image ).'">'); } ?>
            </div>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <div class="row m-0">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0 align-self-center">
                  <?php if( get_theme_mod( 'real_estate_hub_slider_short_heading' ) != '' ) { ?>
                    <h6><?php echo esc_html( get_theme_mod( 'real_estate_hub_slider_short_heading','' ) ); ?></h6>
                  <?php } ?>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p class="heading-para m-0"><?php echo wp_trim_words( get_the_content(),27 );?></p>
                  <?php if( get_theme_mod( 'real_estate_hub_search_icon',false) != '' || get_theme_mod( 'real_estate_hub_mob_search_icon',false) != '') { ?>
                    <div class="search_inner">
                      <p><?php esc_html_e('For Sales','real-estate-hub'); ?></p>
                      <?php get_search_form(); ?>
                    </div>
                  <?php } ?>
                </div>
                <?php if( get_theme_mod( 'real_estate_hub_post_option',true) != '' || get_theme_mod( 'real_estate_hub_post_option_mob',true) != '') { ?>
                <div class="col-lg-6 col-md-6 align-self-center">

                  <div class="block-balck"></div>
                  <div class="pull-up-box">
                    <?php
                      $real_estate_hub_postdata = get_theme_mod('real_estate_hub_slide_post_section_category');
                        if($real_estate_hub_postdata){
                        $real_estate_hub_args = array( 'name' => esc_html( $real_estate_hub_postdata ,'real-estate-hub'));
                      $real_estate_hub_query = new WP_Query( $real_estate_hub_args );
                      if ( $real_estate_hub_query->have_posts() ) :
                        while ( $real_estate_hub_query->have_posts() ) : $real_estate_hub_query->the_post(); ?>
                              <?php if(has_post_thumbnail()){ ?>
                              <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'.esc_url( $static_image ).'">'); } ?>
                              <div class="slide-post">
                              <div class="row">
                                <div class="col-lg-7 col-md-7 align-self-center slide-post-content pl-lg-2">
                                  <h3 class="title mt-lg-3 mb-lg-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  <p class="heading-paragraph"><?php echo wp_trim_words( get_the_content(),3 );?></p>
                                </div>
                                <div class="col-lg-5 col-md-5 align-self-center">
                                  <?php if( get_post_meta($post->ID, 'real_estate_hub_price_no', true) ) {?>
                                    <span><?php esc_html_e('Starting From $','real-estate-hub'); ?><?php echo esc_html(get_post_meta($post->ID,'real_estate_hub_price_no',true)); ?></span>
                                  <?php } ?>
                                </div>
                              </div>
                              </div>                               
                        <?php endwhile;
                        wp_reset_postdata();?>
                        <?php else : ?>
                        <div class="no-postfound"></div>
                      <?php
                    endif; }?>
                  </div>
                </div>
                 <?php } ?>
                 <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                  </a>
              </div>
              
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
  </div>
  <div class="clearfix"></div>
</section>
<?php } ?>

