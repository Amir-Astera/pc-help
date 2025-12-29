<?php
$tags = wp_get_post_tags($post->ID);
if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'showposts'=>10,
    'ignore_sticky_posts'=>1,
    'post_type' => 'essential_grid'
    );
    $my_query = new wp_query($args);
    if( $my_query->have_posts() ) {
    ?>
    <div class="section gry-bg">
        <div class="container">
            <div class="heading">
                <h3 class="uppercase head-6"><i class="fa fa-desktop"></i><span class="main-color"><?php echo __('Related','superfine'); ?> </span><?php echo __('Projects','superfine'); ?></h3>
            </div>
            <div class="row portfolio p-style2">
                <div class="horizontal-slider show-arrows" data-slidesnum="3" data-scamount="1" data-arrows="1" data-speed="500" data-dots="0" data-infinite="1">
                    <?php
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item item-padd'); ?>>
                        <figure>
                            <?php if ( has_post_thumbnail() ){
                                if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail('blog-large-image');
                                 }else {
                                    echo '<img alt="" src="' . esc_url(get_stylesheet_directory_uri()) .'/assets/images/blog/no-img.jpg" />';
                                }
                            ?>
                            <figcaption class="main-bg">
                                <h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h4>
                                <p class="description main-bg"><?php it_eg_category(); ?></p>
                                <div class="icon-links">
                                    <p>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="link shape"><i class="fa fa-link"></i></a>
                                        <a href="<?php echo esc_url($url); ?>" class="zoom shape" title=""><i class="fa fa-search-plus"></i></a>
                                    </p>
                                </div>
                            </figcaption>            
                        </figure>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php }
}