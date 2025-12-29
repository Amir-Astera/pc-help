<?php
/**
 * Template part for displaying project section
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

?>

<?php $static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'real_estate_hub_show_hide_product_section') != '') { ?>
<div id="project" class="py-5">
  <div class="container">
    <?php if( get_theme_mod( 'real_estate_hub_project_subheading_heading' ) != '' ) { ?>
      <p class="text-center mb-2 pro-head"><?php echo esc_html( get_theme_mod( 'real_estate_hub_project_subheading_heading','' ) ); ?></p>
    <?php } ?>
    <?php if( get_theme_mod( 'real_estate_hub_project_heading' ) != '' ) { ?>
      <h3 class="text-center mb-4"><?php echo esc_html( get_theme_mod( 'real_estate_hub_project_heading','' ) ); ?></h3>
    <?php } ?>
    <div class="row">
      <?php
        $post_category = get_theme_mod('real_estate_hub_project_section_category');
        if($post_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $post_category ,'real-estate-hub')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-6 my-2">
              <div class="appartment m-2">
                 <?php if(has_post_thumbnail()){ ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'.esc_url( $static_image ).'">'); } ?>
              <div class="fund-box">
                <h4 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p class="heading-para m-0"><?php echo wp_trim_words( get_the_content(),3 );?></p>
                <div class="apt-detail">
                  <?php if( get_post_meta($post->ID, 'real_estate_hub_bedroom_no', true) ) {?>
                  <p><i class="fas fa-bed"></i><?php echo esc_html(get_post_meta($post->ID,'real_estate_hub_bedroom_no',true)); ?></p>
                  <?php } ?>
                  <?php if( get_post_meta($post->ID, 'real_estate_hub_bathroom_no', true) ) {?>
                    <p><i class="fas fa-bath"></i><?php echo esc_html(get_post_meta($post->ID,'real_estate_hub_bathroom_no',true)); ?></p>
                  <?php } ?>
                  <?php if( get_post_meta($post->ID, 'real_estate_hub_square_feet_no', true) ) {?>
                    <p><i class="far fa-square"></i><?php echo esc_html(get_post_meta($post->ID,'real_estate_hub_square_feet_no',true)); ?></p>
                  <?php } ?>
                </div>
                 <?php if( get_post_meta($post->ID, 'real_estate_hub_price_no', true) ) {?>
                  <span><?php esc_html_e('Starting From $','real-estate-hub'); ?><?php echo esc_html(get_post_meta($post->ID,'real_estate_hub_price_no',true)); ?></span>
                <?php } ?>
                <div class="btn-box">
                  <span><a href="<?php the_permalink(); ?>"><?php esc_html_e('See Details','real-estate-hub'); ?></a></span>
                </div>
              </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</div>
<?php } ?>