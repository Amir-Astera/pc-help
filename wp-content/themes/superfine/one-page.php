<?php 
/*
Template Name: One-Page Template
*/


require_once( THEME_DIR.'/layout/heads/one-page-header.php'); 
while ( have_posts() ) : the_post();
  the_content();
endwhile;


get_footer(); ?>
