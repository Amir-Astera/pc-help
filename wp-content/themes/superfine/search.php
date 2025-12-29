<?php
get_header(); 
$layout = theme_option('search_sidebar');
$col = '12';
if ($layout == "left" || $layout == "right" ) {
    $col = '9';
}
// page title function.
it_title_style();
?>

<div class="section">
    <div class="container">
        <div class="row"> 
            <?php if ( $layout == 'left' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
            <div class="col-md-<?php echo $col; ?>">
                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>

                            <div class="srch_item" id="post-<?php the_ID(); ?>">

                                <div class="post-info main-color">
                                    <?php if( get_post_format() == 'link' ){ ?>
                                        <?php
                                         $title_format  = post_format_link( get_the_content(), get_the_title() );
                                          $it_title   = $title_format['title'];
                                          $it_link = getUrl( $it_title );
                                          echo $it_title;
                                        ?>
                                    <?php }else{ ?>
                                        <h5><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php echo esc_html__('Permanent Link to','superfine') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php } ?>
                                </div>
                                
                                <?php
                                if ( function_exists('the_excerpt') && is_search() ) {
                                    the_excerpt();
                                } ?> 
                                
                                <ul class="post-meta">
                                    <?php it_post_meta(); ?>
                                </ul>
                                                               
                            </div>
                            
                        <?php endwhile; ?>

                        <div class="clearfix"></div>
                        <?php it_paging_nav(); ?>

                    <?php else : ?>

                        <div class="no-results not-found">
                            <div class="t-center margin-bottom-40">
                                <div class="err-noresults"><i class="fa fa-frown-o"></i></div>
                                <span class="main-color bold font-40"><?php echo __('OOOPS!','superfine') ?></span><br>
                                <span class="pg-nt-fnd"><?php echo __('The Page You Are Looking for can not Be Found.','superfine') ?></span>
                            </div>
                            
                            <p class="t-center"><?php echo __('You can use the form below to search for what you need.','superfine') ?></p>
                                        
                            <div class="not-found-form">
                                <?php get_search_form(); ?>
                            </div>
                            
                        </div>

                    <?php endif; ?>

                    </div> <!-- /content -->

            <?php if ( $layout == 'right' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
