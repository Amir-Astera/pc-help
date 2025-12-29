<?php
/*
* Display Theme menus
*/
?>

<div class="menubar">
  	<div class="container right_menu">
  		<div class="row">
	    	<div class="menubox col-lg-12 col-md-10 col-8 align-self-center">
	      		<div class="innermenubox">
	      			
			          	<div class="toggle-nav mobile-menu">
	            			<button onclick="real_estate_hub_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','real-estate-hub'); ?></span></button>
	          			</div>
         	 		<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'real-estate-hub' ); ?>">
			              	<?php
			                  	wp_nav_menu( array(
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="real_estate_hub_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','real-estate-hub'); ?></span></a>
	            		</nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>
	    </div>
  	</div>
</div>
