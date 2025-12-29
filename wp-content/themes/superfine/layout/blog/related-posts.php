<?php

$tags = wp_get_post_tags($post->ID);
if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
        'tag__in' => $tag_ids,
        'post__not_in' => array($post->ID),
        'showposts'=>8,
        'ignore_sticky_posts'=>1
    );
$my_query = new wp_query($args);
    if( $my_query->have_posts() ) {
        echo '<div class="padding-vertical-20"><div class="divider lft"><i class="fa fa-scissors"></i></div></div><div class="related-posts sm-padding"><div class="heading side-head head-6"><h4 class="uppercase font-20"><i class="fa fa-folder-open-o main-color head-icon font-20" style="line-height:1"></i><span class="main-color">'.__('Related','superfine').' </span>'.__('Posts','superfine').'</h4></div><ul class="list">';
        while ($my_query->have_posts()) {
            $my_query->the_post();
    ?>
        <li><i class="fa fa-book main-color"></i><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php echo __('Permanent Link to','superfine') ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
    <?php

}
echo '</ul></div>';
    }
    wp_reset_query();
}