<?php
/**
 * Template part for displaying home page content
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

?>

<div id="main-content" class="container">
  	<?php while ( have_posts() ) : the_post(); ?>
  		<?php the_content(); ?>
  	<?php endwhile; // end of the loop. ?>
</div>