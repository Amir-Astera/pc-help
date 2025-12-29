<?php 
get_header();
$col = '';
$lay = theme_option('blog_single_sidebar');

if($lay == 'right' || $lay == 'left'){
    $col = '9';
}else{
    $col = '12';
}
$dir ='';
if($lay == 'right'){
   $dir =' lft'; 
}else if($lay == 'left'){
   $dir =' rit'; 
}

// page title function.
it_title_style();
?>
 
<div class="section">
    <div class="container">
        <div class="row">
            <?php if ( $lay == 'left' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>            
            <div class="col-md-<?php echo $col; ?><?php echo $dir; ?>"">
                <div class="blog-single">
			        
                    <div class="post-item">
                    <?php while ( have_posts() ) : the_post(); ?>
				        <?php get_template_part( 'post-formats/content', get_post_format() ); ?>
										  
										  <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
										  
				        <?php
                        if ( theme_option('singlerelated_on') == "1" ){
                            locate_template( 'layout/blog/related-posts.php','related');
                        }
                        ?>
                        
                        <?php if (get_next_post() || get_previous_post()) { ?>
                        <nav class="nav-single over-hidden">
                            <span class="nav-previous f-left"><?php previous_post_link( '%link', '<span class="meta-nav">' . __( '&larr; Previous post', 'superfine' ) . '</span><span class="nav-block main-color">%title</span>' ); ?></span>
                            <span class="nav-next f-right"><?php next_post_link( '%link', '<span class="meta-nav">' . __( 'Next post &rarr;', 'superfine' ) . '</span><span class="nav-block main-color">%title</span>' ); ?></span>
                        </nav>
                        <?php } ?>

                        <?php if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif; ?>
			        <?php endwhile; ?>
                    
                    </div>
                    
                </div>
            </div>
            <?php if ( $lay == 'right' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
         </div>
    </div>
</div>
<?php get_footer(); ?>
