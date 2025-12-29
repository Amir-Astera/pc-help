<?php
get_header();
$layout = $cell =''; 
$options = get_post_custom(get_the_ID());
if(isset($options['page_layout'])){
    $layout = $options['page_layout'][0];
}
$col = '12';
if ($layout == "sidebar-left" || $layout == "sidebar-right" ) {
    $col = '9';
}
if ($layout == "sidebar-left"){
    $cell = ' right-cell';
}
// page title function.
it_title_style();

?>

<?php if ($layout == "wide") { ?>
<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
    ?>
    <div class="section gry-bg">
        <div class="container">
            <?php comments_template(); ?>
        </div>
    </div>
    <?php
}
?> 
<?php } else if ($layout == "full_width") { ?>
<div class="section full-width">
    <div class="container">
        <div class="row">
            <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                ?>
                <div class="margin-top-50">
                    <div class="padding-vertical-30">
                        <div class="divider lft"><i class="fa fa-scissors"></i></div>
                    </div>
                    <?php comments_template(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>    
<?php } else { ?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-<?php echo $col; ?><?php echo $cell; ?>">
                <?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
                <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                ?>
                <div class="margin-top-50">
                    <div class="padding-vertical-30">
                        <div class="divider lft"><i class="fa fa-scissors"></i></div>
                    </div>
                    <?php comments_template(); ?>
                </div>
            <?php } ?>  
            </div>
            <?php if($layout == "sidebar-right" || $layout == "sidebar-left") { ?>
                <?php it_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</div> 
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
<?php } ?>

<?php get_footer(); ?>