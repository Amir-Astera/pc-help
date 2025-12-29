<?php 
/*
Template Name: Soon Template
*/

require_once( THEME_DIR.'/layout/heads/soon-header.php'); 

/*
Template Name: Home Page Template
*/ 

while ( have_posts() ) : the_post();
the_content();
endwhile;
?>

<?php get_footer(); ?>
<?php
    $soon_date = theme_option('soon_date');
        ?>
        <script type="text/javascript">
            if(jQuery(".digits").length > 0){
                jQuery('.digits').countdown('<?php echo esc_attr($soon_date); ?>').on('update.countdown', function(event) {
                  var $this = jQuery(this).html(event.strftime('<ul>'
                     + '<li><span>%-w</span><p> week%!w </p> </li>'
                     + '<li><span>%-d</span><p> day%!d </p></li>'
                     + '<li><span>%H</span><p>Hours </p></li>'
                     + '<li><span>%M</span><p> Minutes </p></li>'
                     + '<li><span>%S</span><p> Seconds </p></li>'
                     +'</ul>'));
                 });
            }
        </script>