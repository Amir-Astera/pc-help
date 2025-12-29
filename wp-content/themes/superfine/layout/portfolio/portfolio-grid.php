<?php 

while ( have_posts() ) : the_post();
$my_post_array[] = $post->ID;
endwhile;
?>
<div class="cat_grid">
<?php
echo do_shortcode( '[ess_grid alias="grid-3" posts='.implode(',', $my_post_array).']' );
?>
</div>