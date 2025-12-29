<?php
get_header(); 
$blogstyle = theme_option('blogstyle');
$portfoliostyle = theme_option('portfoliostyle');
get_template_part( 'layout/page-titles/title-tag');
$col = '';
$lay = theme_option('blog_sidebar');

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
?>
        
<div class="section">
    <div class="container">
        
        <?php
            if( get_post_type() == 'essential_grid' ) {
                get_template_part( 'layout/portfolio/portfolio-'.$portfoliostyle );
            } else {
                ?>
                <div class="row">
                    <?php if ( $lay == 'left' ) { ?>
                        <?php get_sidebar(); ?>
                    <?php } ?>
                    <div class="col-md-<?php echo $col; ?>">
                        
                        <?php get_template_part( 'layout/blog/blog-'.$blogstyle ); ?>
                        
                        <div class="clearfix"></div>
                        <?php it_paging_nav(); ?>
                    </div>
                    <?php if ( $lay == 'right' ) { ?>
                        <?php get_sidebar(); ?>
                    <?php } ?>
                </div>
                <?php
            }
        ?>        
    </div>
</div>

<?php
get_footer();
