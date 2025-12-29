<?php
function it_recent_posts_shortcode($atts, $content=null){
 
    extract(shortcode_atts( array(
        'it_cat'            => '',
        'rp_style'          => '1',
        'has_carousel'      => '',
        'rp_slides'         => '2',
        'rp_scroll'         => '2',
        'rp_speed'          => '500',
        'rp_fade'           => '0',
        'rp_auto'           => '',
        'rp_arrows'         => '',
        'rp_dots'           => '',
        'rp_infinite'       => '',
        'el_class'          => '',
        'max_pos'           => '5',
        'rp_cols'           => '12'
        ), $atts));
    global $post;
    $posts = null;
    $args = array(
        'category_name' => $it_cat,
        'showposts'     => $max_pos,
        'ignore_sticky_posts' => 1,
    ); 
    
    $t_slides = $t_scrolls = $t_fade = $t_speed = $t_arrows = $t_dots = $t_auto = $t_infinite = $t_ar = $t_cols = $size = '';
    $t_slides = " data-slidesnum='$rp_slides'";
    $t_scrolls = " data-scamount='$rp_scroll'";
    $t_fade = " data-fade='$rp_fade'";                
    $t_speed = " data-speed='$rp_speed'";
    $t_arrows = " data-arrows='$rp_arrows'";
    $t_dots = " data-dots='$rp_dots'";
    $t_auto = " data-auto='$rp_auto'";
    $t_infinite = " data-infinite='$rp_infinite'";
    
    $attrs = $t_slides.$t_scrolls.$t_fade.$t_speed.$t_arrows.$t_infinite.$t_dots.$t_auto;
    
    if($rp_arrows == ''){
        $t_ar = ' show-arrows';
    }
    
    if($has_carousel == ''){
        $t_cols = ' col-md-'.$rp_cols;
    }
    if($rp_style == '5'){
        $t_cols = '';
    }
    $q = new WP_Query( $args );
    $recent_posts = wp_get_recent_posts( $args );
    $cont = '';
    if($q->have_posts()):
        if($has_carousel == '1'){
            
            if($rp_style == '1'){
                $cont .= '<div class="posts-mini horizontal-slider'.$t_ar.' posts-mini '.$el_class.'"'.$attrs.'>';
            }else if($rp_style == '2'){
                $cont .= '<div class="blog-posts horizontal-slider'.$t_ar.' '.$el_class.'"'.$attrs.'>';
            }else if($rp_style == '3'){
                $cont .= '<div class="blog-posts rp-3 horizontal-slider'.$t_ar.' '.$el_class.'"'.$attrs.'>';
            }
        }else{
            if($rp_style == '1'){
                $cont .= '<div class="posts-mini no-slider '.$el_class.'">';
            }else if($rp_style == '2'){
                $cont .= '<div class="blog-posts rp-2 no-slider '.$el_class.'">';
            }else if($rp_style == '3'){
                $cont .= '<div class="blog-posts rp-3 no-slider '.$el_class.'">';
            }else if($rp_style == '5'){
                $cont .= '<div class="blog-posts small recent-posts no-slider '.$el_class.'">';
            }
            
        }
        
            $post = $posts[0]; $c=0;
            while($q->have_posts()): $q->the_post();
               
                  if($rp_style == '4'){
                      $c++;
                      if ($c == 1){
               
                          $cont .= '<div class="post-item lg-item blog-posts small-image">';
                            $cont .= '<div class="row-minus">';
                                $cont .= '<div class="col-md-4">';
                                if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                                    $cont .= post_media( get_the_content() );
                                } else if ( get_post_format() == 'image' ) {
                                    if( has_post_thumbnail()){
                                        if ( post_password_required() || ! has_post_thumbnail() ) { return; }

                                        global $it_blog_image_size;
                                        $contents = '';
                                        $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                            $cont .='<div class="post-image">';
                                                $cont .='<a href="'. esc_url($link) .'" class="post-thumbnail">';
                                                    $cont .= get_the_post_thumbnail( null, $size,'' );
                                                $cont .='</a>';
                                            $cont .='</div>';
                                        
                                        //$cont .= it_post_thumbnail2();  
                                    }else{
                                        $cont .= post_image2(get_the_content());
                                    }        
                                } else {
                                    if ( get_the_post_thumbnail() ){
                                        global $it_blog_image_size;
                                        $contents = '';
                                        $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                            $cont .='<div class="post-image">';
                                                $cont .='<a href="'. esc_url($link) .'" class="post-thumbnail">';
                                                    $cont .= get_the_post_thumbnail( null, $size,'' );
                                                $cont .='</a>';
                                            $cont .='</div>';
                                     }else {
                                        $cont .= '<div class="post-image"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/no-img.jpg" /></div>';
                                    }
                                    
                                    
                                }
                                $cont .= '</div>';
                                $cont .= '<article class="post-content col-md-8">';
                                    $cont .= '<div class="post-info-container">';
                                        $cont .= '<div class="post-info">';
                                            $cont .= '<h2><a class="main-color" href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
                                            $cont .= '<ul class="post-meta">
                                                        <li class="meta-user"><i class="fa fa-user"></i><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>
                                                        <li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'<li>
                                                    </ul>';
                                        $cont .= '</div>';
                                    $cont .= '</div>';
                                    $cont .= '<p>'.it_excerpt().'</p>';
                                $cont .= '</article>';
                            $cont .= '</div>';
                        $cont .= '</div>';
                        
                        $cont .= '<div class="small_items clearfix"><div class="row-minus">'; 
                       }else{
                             
                          $cont .= '<div class="col-md-6">';
                            $cont .= '<div class="post-item">';
                                $cont .= '<div class="entry-image">';
                                       if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                                            $cont .= post_media( get_the_content() );
                                        } else if ( get_post_format() == 'image' ) {
                                            if( has_post_thumbnail()){
                                                if ( post_password_required() || ! has_post_thumbnail() ) { return; }

                                                global $it_blog_image_size;
                                                $contents = '';
                                                $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                                    $cont .='<div class="post-image">';
                                                        $cont .='<a href="'. esc_url($link) .'" class="post-thumbnail">';
                                                            $cont .= get_the_post_thumbnail( null, 'blog-small-image','' );
                                                        $cont .='</a>';
                                                    $cont .='</div>';
                                            }else{
                                                $cont .= post_image2(get_the_content());
                                            }        
                                        } else {
                                            if ( get_the_post_thumbnail() ){
                                                global $it_blog_image_size;
                                                $contents = '';
                                                $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                                    $cont .='<div class="post-image">';
                                                        $cont .='<a href="'. esc_url($link) .'" class="post-thumbnail">';
                                                            $cont .= get_the_post_thumbnail( null, 'blog-small-image','' );
                                                        $cont .='</a>';
                                                    $cont .='</div>';
                                             }else {
                                                $cont .= '<div class="post-image"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/no-img.jpg" /></div>';
                                            }
                                            
                                            
                                        }
                                $cont .= '</div>';
                                $cont .= '<div class="entry-content">'; 
                                    $cont .= '<h5><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>';
                                    $cont .= '<ul class="post-meta">
                                                <li class="meta-user"><i class="fa fa-user"></i><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>
                                                    <li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'<li>
                                            </ul>';
                                $cont .= '</div>';
                            $cont .= '</div>';    
                        $cont .= '</div>';
                         
                       }
                       
                  }else{
                      $cont .= '<div class="post-item'.$t_cols.'">';                        
                        $cont .= '<div class="new-item">';
                        if ( get_post_format() == 'gallery' || get_post_format() == 'video' || get_post_format() == 'audio' ) {
                            $cont .= post_media( get_the_content() );
                        } else if ( get_post_format() == 'image' ) {
                            if( has_post_thumbnail()){
                                if ( post_password_required() || ! has_post_thumbnail() ) { return; }

                                global $it_blog_image_size;
                                $contents = '';
                                $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                    $cont .='<div class="post-image">';
                                        $cont .='<a href="'. esc_url($link) .'" class="post-thumbnail">';
                                            $cont .= get_the_post_thumbnail( null, $size,'' );
                                        $cont .='</a>';
                                    $cont .='</div>';
                                
                                //$cont .= it_post_thumbnail2();  
                            }else{
                                $cont .= post_image2(get_the_content());
                            }        
                        } else {
                            if ( get_the_post_thumbnail() ){
                                global $it_blog_image_size;
                                $contents = '';
                                $link  = ( empty( $link ) ) ? get_permalink() : $link;
                                    $cont .='<div class="post-image">';
                                        $cont .='<a href="'. esc_url($link) .'" class="post-thumbnail">';
                                            $cont .= get_the_post_thumbnail( null, $size,'' );
                                        $cont .='</a>';
                                    $cont .='</div>';
                             }else {
                                $cont .= '<div class="post-image"><img alt="" src="' . get_stylesheet_directory_uri() .'/assets/images/blog/no-img.jpg" /></div>';
                            }
                            
                            
                        }
                        if($rp_style == '3'){
                            $cont .= it_post_icon2();
                        }
                        $cont .= '</div>';
                        
                        $cont .= '<article class="post-content">'; 
                            $cont .='<div class="post-info-container"><div class="post-info">';
                                if($rp_style == '2' || $rp_style == '5'){
                                    $cont .= it_post_icon2();
                                }
                                $cont .= '<h2><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
                                $cont .= '<ul class="post-meta">
                                        <li class="meta-user"><i class="fa fa-user"></i>'.__('By:','superfine').' <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></li>
                                        <li class="meta-date"><i class="fa fa-clock-o"></i>'.get_the_date().'</li>
                                    </ul>';
                            $cont .= '</div></div>';
                            $cont .= '<p>'.it_excerpt().'</p>';
                            
                            if($rp_style == '2'){
                                $cont .= '<div class="bottom_tools">';
                                      
                                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )  {
                                    if ( !is_singular() || ( is_singular() &&  theme_option('singlecomment_on') == "1" )){
                                        $cont .= '<a href="'.get_comments_link( $post->ID ).'" class="f-left shape"><i class="fa fa-comments"></i>'.get_comments_number().'</a>';
                                    }
                                }
                
                                $cont .= '<a class="f-right more_btn shape sm" href="'.esc_url(get_permalink($post->ID)).'">'.__("Read more","superfine").'</a>';
                
                                $cont .= '</div>';
                            }
                        $cont .= '</article>';
                        
                $cont .= '</div>';
                  }                 
               
            endwhile;
            if($rp_style == '4'){
                $cont .= '</div>';
            }
        $cont .= '</div>';        
    endif;
    wp_reset_postdata(); 
    return $cont; 
     
     return $cont;
     
     
}                                               
add_shortcode('it_recent_posts', 'it_recent_posts_shortcode');