<?php
get_header(); 
$blogstyle = theme_option('blogstyle');

$col = $cell = '';
$lay = theme_option('blog_sidebar');

if($lay == 'right' || $lay == 'left'){
    $col = '9';
}else{
    $col = '12';
}

if ($lay == "left"){
    $cell = ' right-cell';
}
// page title function.
it_title_style();
?>
<div class="section">
    <div class="container">
        <div class="row"> 
            <div class="col-md-<?php echo $col; ?><?php echo $cell; ?>">
                <?php if ( have_posts() ) { ?>
                    <div class="blog-posts <?php echo $blogstyle; ?>" id="content">
                        <?php get_template_part( 'layout/blog/blog-'.$blogstyle) ?> 
                    </div>
                <?php }else{ 
                    get_template_part( 'post-formats/content', 'none' );
                } ?>
                
                <div class="clearfix"></div>
                <?php it_paging_nav(); ?>
            </div>
            <?php if ( $lay == 'right' || $lay == 'left' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
