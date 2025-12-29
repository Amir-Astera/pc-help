<?php
function it_breaking_news_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_cat'           => '',
        'it_title'           => '',
        ), $atts));
    global $post;
    $posts = null;
    $args = array(
        'category_name' => $it_cat,
        'showposts'     => 5,
        'ignore_sticky_posts' => 1,
    );     
    
    $q = new WP_Query( $args );
    $recent_posts = wp_get_recent_posts( $args );
    if($q->have_posts()):
        $cont = '<div class="break-news shape">';
        $cont .='<span class="lbl">'.$it_title.'</span><div class="break-news-slider">';
        $post = $posts[0]; $c=0;
        while($q->have_posts()): $q->the_post();
                       
              $cont .= '<div>';
                $cont .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
            $cont .= '</div>';
           
        endwhile;
        $cont .= '</div></div>';        
    endif;
    wp_reset_postdata(); 
    return $cont; 
     
     return $cont;
     
     
}                                               
add_shortcode('it_breaking_news', 'it_breaking_news_shortcode');