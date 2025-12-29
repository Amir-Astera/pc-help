<?php 
$top_right = theme_option("topbarright");
$top_left = theme_option("topbarleft");
$top_center = theme_option("topbarcenter");
$show_cart = theme_option("topbar_show_cart");
$cart_pos = theme_option("topbar_cart_position");
$hid_mess = theme_option("login_welcome");
$l_mess = theme_option("login_welcome_message");
$langcode = '';
if ( class_exists( 'SitePress' ) ) {
    $langcode = '-'.ICL_LANGUAGE_CODE;
}
?>
<div class="top-bar main-bg">
    <div class="container">
            <div class="center-tbl">
            <!-- Left Top Bar -->
            <?php if ($top_left !== "empty") { ?>
                 <div class="left-top">   
                    <?php if($show_cart == '1' && $cart_pos == 'left'){ ?>
                        <span class="top-cart">
                            <?php echo it_topbar_wo_cart(); ?>
                        </span>
                    <?php } ?>
                    <?php if ($top_left == "text") { ?>
                        <span class="top-bar-txt">
                            <?php echo wp_kses(theme_option('top_left_text'.$langcode),it_allowed_tags()); ?>
                        </span>
                    <?php } else if ($top_left == "wpml") { ?>
                        <span class="">
                        <?php 
                            if(if_wpml_activated()){
                                do_action('icl_language_selector');
                            }else{
                                echo '<span class="menu-message">'. esc_html__('Please Install and Activate WPML Plugin','superfine'). '</span>';
                            }
                        ?>
                        </span>
                    <?php } else if ($top_left == "contact") { ?>
                        <ul class="top-info">
                            <?php if(theme_option("contact_email_top_bar")){ ?>
                            <li><a class="shape" href="mailto:<?php echo esc_html(theme_option("contact_email")); ?>"><i class="fa fa-envelope"></i><?php echo esc_html(theme_option('contact_email_title'.$langcode)); ?> <?php echo esc_html(theme_option("contact_email")); ?></a></li>
                            <?php } ?>
                            <?php if(theme_option("contact_phone_top_bar")){ ?>
                            <li><span><i class="fa fa-phone"></i> <?php echo esc_html(theme_option('contact_phone_title'.$langcode)); ?> <?php echo esc_attr(theme_option("contact_phone")); ?></span></li>
                            <?php } ?>
                            <?php if(theme_option("contact_address_top_bar")){ ?>
                            <li><span><i class="fa fa-map-marker"></i> <?php echo esc_html(theme_option('contact_address_title'.$langcode)); ?> <?php echo esc_attr(theme_option("contact_address".$langcode)); ?></span></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($top_left == "socials") { ?>
                        <span class="middle-ul alter-bg shape"><?php echo display_social_icons(); ?></span>
                    <?php } else if ($top_left == "userlinks") { ?>
                        <span class="">
                        <?php
                            if ( has_nav_menu( 'top-menu' ) ) {
                                  it_nav_menu( array( 'theme_location' => 'top-menu', 'menu_class' => '', 'container'=>'', 'items_wrap' => '<ul class="top-bar-menu">%3$s</ul>' ) );
                            }else{
                                echo '<span class="menu-message">'.__('Please go to admin panel > Menus > select top- menu and add items to it.','superfine').'</span>';
                            } 
                            ?>
                        </span>
                    <?php } else if ($top_left == "loginregister") { ?>
                        <ul class="">
                        <?php if ( $user_ID ) : ?>
                            <?php global $user_identity; ?>
                            <li class="welcome-user"><b class="uppercase"><?php echo esc_html__('Welcome','superfine') ?></b>, <a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-admin/profile.php"><?php loggedUser(); ?></a></li>
                            <li><a class="shape" href="<?php echo esc_url(wp_logout_url()); ?>" title="<?php echo esc_html__('Log out of this account','superfine') ?>"><?php echo esc_html__('Log Out','superfine') ?></a></li>
                        <?php else : ?>
                            
                            <?php if (get_option('users_can_register')) : ?>
                                <li><a class="shape" href="<?php echo esc_url(get_option('siteurl')); ?>/wp-login.php?action=register"><i class="fa fa-user"></i><?php _e('Register','superfine') ?></a></li>
                            <?php endif; ?>
                            <li class="dropdown"><a href="#" class="shape" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="login-bx3"><i class="fa fa-unlock-alt"></i> <?php echo esc_html__('Login','superfine') ?></a>
                                <div class="dropdown-menu login-popup black-bg">
                                    <form name="loginform3" id="loginform3" action="<?php echo get_option('siteurl'); ?>/wp-login.php" method="post">
                                    <?php if(!$hid_mess){ ?>
                                        <p class="small"><?php echo wp_kses($l_mess,it_allowed_tags()); ?></p>
                                    <?php } ?>
                                    <div class="login-controls">
                                        <div class="form-group">
                                            <input value="" class="form-control" type="text" size="20" placeholder="<?php echo esc_html__('User name Or Email','superfine'); ?>" tabindex="10" name="log" id="user_login" />
                                        </div>
                                        <div class="form-group">
                                            <input value="" class="form-control" placeholder="<?php echo esc_html__('Password','superfine'); ?>" type="password" size="20" tabindex="20" name="pwd" id="user_pass" />
                                        </div>
                                        <div class="form-group floated-controls">
                                            <span class="block checkbox-block"><input name="rememberme" id="rememberme" value="forever" tabindex="90" class="checkbox" type="checkbox"><span><?php echo esc_html__('Remember me !','superfine'); ?></span></span>
                                        </div>
                                        <div>
                                            <input name="wp-submit" id="wp-submit" value="<?php echo esc_html__('Login','superfine'); ?>" tabindex="100" type="submit" class="btn main-bg">
                                        </div>
                                        <input name="redirect_to" value="<?php echo get_option('siteurl'); ?>/wp-admin/" type="hidden">
                                        <input name="testcookie" value="1" type="hidden">
                                    </div>        
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php } ?>
                 </div>   
            <?php } ?>  
            
            <!-- Center Top Bar -->                     
            <?php if ($top_center !== "empty") { ?>
                <div class="center-top">
                    <?php if($show_cart == '1' && $cart_pos == 'center'){ ?>
                        <span class="top-cart">
                            <?php echo it_topbar_wo_cart(); ?>
                        </span>
                    <?php } ?>
                    <?php if ($top_center == "loginregister") { ?>
                        <ul class="">
                        <?php if ( $user_ID ) : ?>
                            <?php global $user_identity; ?>
                            <li class="welcome-user"><b class="uppercase"><?php echo esc_html__('Welcome','superfine') ?></b>, <a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-admin/profile.php"><?php loggedUser(); ?></a></li>
                            <li><a class="shape" href="<?php echo esc_url(wp_logout_url()); ?>" title="<?php echo esc_html__('Log out of this account','superfine') ?>"><?php echo esc_html__('Log Out','superfine') ?></a></li>
                        <?php else : ?>
                            
                            <?php if (get_option('users_can_register')) : ?>
                                <li><a class="shape" href="<?php echo esc_url(get_option('siteurl')); ?>/wp-login.php?action=register"><i class="fa fa-user"></i><?php _e('Register','superfine') ?></a></li>
                            <?php endif; ?>
                            <li class="dropdown"><a href="#" class="shape" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="login-bx2"><i class="fa fa-unlock-alt"></i> <?php echo esc_html__('Login','superfine') ?></a>
                                <div class="dropdown-menu login-popup black-bg">
                                    <form name="loginform2" id="loginform2" action="<?php echo get_option('siteurl'); ?>/wp-login.php" method="post">
                                    <?php if(!$hid_mess){ ?>
                                        <p class="small"><?php echo wp_kses($l_mess,it_allowed_tags()); ?></p>
                                    <?php } ?>
                                    <div class="login-controls">
                                        <div class="form-group">
                                            <input value="" class="form-control" type="text" size="20" placeholder="<?php echo esc_html__('User name Or Email','superfine'); ?>" tabindex="10" name="log" id="user_login" />
                                        </div>
                                        <div class="form-group">
                                            <input value="" class="form-control" placeholder="<?php echo esc_html__('Password','superfine'); ?>" type="password" size="20" tabindex="20" name="pwd" id="user_pass" />
                                        </div>
                                        <div class="form-group floated-controls">
                                            <span class="block checkbox-block"><input name="rememberme" id="rememberme" value="forever" tabindex="90" class="checkbox" type="checkbox"><span><?php echo esc_html__('Remember me !','superfine'); ?></span></span>
                                        </div>
                                        <div>
                                            <input name="wp-submit" id="wp-submit" value="<?php echo esc_html__('Login','superfine'); ?>" tabindex="100" type="submit" class="btn main-bg">
                                        </div>
                                        <input name="redirect_to" value="<?php echo get_option('siteurl'); ?>/wp-admin/" type="hidden">
                                        <input name="testcookie" value="1" type="hidden">
                                    </div>        
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php } else if ($top_center == "wpml") { ?>
                        <span class="">
                        <?php 
                            if(if_wpml_activated()){
                                do_action('icl_language_selector');
                            }else{
                                echo '<span class="menu-message">'. esc_html__('Please Install and Activate WPML Plugin','superfine'). '</span>';
                            }
                        ?>
                        </span>
                    <?php } else if ($top_center == "text") { ?>
                        <span class="top-bar-txt">
                            <?php echo wp_kses(theme_option('top_center_text'.$langcode),it_allowed_tags()); ?>
                        </span>
                    <?php } else if ($top_center == "contact") { ?>
                        <ul>
                            <?php if(theme_option("contact_email_top_bar")){ ?>
                            <li><a class="shape" href="mailto:<?php echo esc_html(theme_option("contact_email")); ?>"><i class="fa fa-envelope"></i><?php echo esc_html(theme_option('contact_email_title'.$langcode)); ?> <?php echo esc_html(theme_option("contact_email")); ?></a></li>
                            <?php } ?>
                            <?php if(theme_option("contact_phone_top_bar")){ ?>
                            <li><span><i class="fa fa-phone"></i> <?php echo esc_html(theme_option('contact_phone_title'.$langcode)); ?> <?php echo esc_attr(theme_option("contact_phone")); ?></span></li>
                            <?php } ?>
                            <?php if(theme_option("contact_address_top_bar")){ ?>
                            <li><span><i class="fa fa-map-marker"></i> <?php echo esc_html(theme_option('contact_address_title'.$langcode)); ?> <?php echo esc_attr(theme_option("contact_address".$langcode)); ?></span></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($top_center == "socials") { ?>
                        <span class="f-left middle-ul alter-bg shape">
                            <?php echo display_social_icons(); ?>
                        </span>
                    <?php } else if ($top_center == "userlinks") { ?>
                        <div class="f-left top-bar-menu">
                            <?php
                            if ( has_nav_menu( 'top-menu' ) ) {
                                  it_nav_menu( array( 'theme_location' => 'top-menu', 'menu_class' => '', 'container'=>'', 'items_wrap' => '<ul class="top-bar-menu right">%3$s</ul>' ) );
                            }else{
                                echo '<span class="menu-message">'.__('Please go to admin panel > Menus > select top- menu and add items to it.','superfine').'</span>';
                            } 
                            ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
            <!-- Right Top Bar -->                     
            <?php if ($top_right !== "empty") { ?>
                <div class="right-top">
                    <?php if ($top_right == "loginregister") { ?>
                        <ul class="">
                        <?php if ( $user_ID ) : ?>
                            <?php global $user_identity; ?>
                            <li class="welcome-user"><b class="uppercase"><?php echo esc_html__('Welcome','superfine') ?></b>, <a href="<?php echo esc_url(get_option('siteurl')); ?>/wp-admin/profile.php"><?php loggedUser(); ?></a></li>
                            <li><a class="shape" href="<?php echo esc_url(wp_logout_url()); ?>" title="<?php echo esc_html__('Log out of this account','superfine') ?>"><?php echo esc_html__('Log Out','superfine') ?></a></li>
                        <?php else : ?>
                            
                            <?php if (get_option('users_can_register')) : ?>
                                <li><a class="shape" href="<?php echo esc_url(get_option('siteurl')); ?>/wp-login.php?action=register"><i class="fa fa-user"></i><?php _e('Register','superfine') ?></a></li>
                            <?php endif; ?>
                            <li class="dropdown"><a href="#" class="shape" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="login-bx"><i class="fa fa-unlock-alt"></i> <?php echo esc_html__('Login','superfine') ?></a>
                                <div class="dropdown-menu login-popup black-bg">
                                    <form name="loginform" id="loginform" action="<?php echo get_option('siteurl'); ?>/wp-login.php" method="post">
                                    <?php if(!$hid_mess){ ?>
                                        <p class="small"><?php echo wp_kses($l_mess,it_allowed_tags()); ?></p>
                                    <?php } ?>
                                    <div class="login-controls">
                                        <div class="form-group">
                                            <input value="" class="form-control" type="text" size="20" placeholder="<?php echo esc_html__('User name Or Email','superfine'); ?>" tabindex="10" name="log" id="user_login" />
                                        </div>
                                        <div class="form-group">
                                            <input value="" class="form-control" placeholder="<?php echo esc_html__('Password','superfine'); ?>" type="password" size="20" tabindex="20" name="pwd" id="user_pass" />
                                        </div>
                                        <div class="form-group floated-controls">
                                            <span class="block checkbox-block"><input name="rememberme" id="rememberme" value="forever" tabindex="90" class="checkbox" type="checkbox"><span><?php echo esc_html__('Remember me !','superfine'); ?></span></span>
                                        </div>
                                        <div>
                                            <input name="wp-submit" id="wp-submit" value="<?php echo esc_html__('Login','superfine'); ?>" tabindex="100" type="submit" class="btn main-bg">
                                        </div>
                                        <input name="redirect_to" value="<?php echo get_option('siteurl'); ?>/wp-admin/" type="hidden">
                                        <input name="testcookie" value="1" type="hidden">
                                    </div>        
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php } else if ($top_right == "wpml") { ?>
                        <span class="">
                        <?php 
                            if(if_wpml_activated()){
                                do_action('icl_language_selector');
                            }else{
                                echo '<span class="menu-message">'. esc_html__('Please Install and Activate WPML Plugin','superfine'). '</span>';
                            }
                        ?>
                        </span>
                    <?php } else if ($top_right == "text") { ?>
                        <span class="top-bar-txt">
                            <?php echo wp_kses(theme_option('top_right_text'.$langcode),it_allowed_tags()); ?>
                        </span>
                    <?php } else if ($top_right == "contact") { ?>
                        <ul>
                            <?php if(theme_option("contact_email_top_bar")){ ?>
                            <li><a class="shape" href="mailto:<?php echo esc_html(theme_option("contact_email")); ?>"><i class="fa fa-envelope"></i><?php echo esc_html(theme_option('contact_email_title'.$langcode)); ?> <?php echo esc_html(theme_option("contact_email")); ?></a></li>
                            <?php } ?>
                            <?php if(theme_option("contact_phone_top_bar")){ ?>
                            <li><span><i class="fa fa-phone"></i> <?php echo esc_html(theme_option('contact_phone_title'.$langcode)); ?> <?php echo esc_attr(theme_option("contact_phone")); ?></span></li>
                            <?php } ?>
                            <?php if(theme_option("contact_address_top_bar")){ ?>
                            <li><span><i class="fa fa-map-marker"></i> <?php echo esc_html(theme_option('contact_address_title'.$langcode)); ?> <?php echo esc_attr(theme_option("contact_address".$langcode)); ?></span></li>
                            <?php } ?>
                        </ul>
                    <?php } else if ($top_right == "socials") { ?>
                        <span class="middle-ul alter-bg shape">
                            <?php echo display_social_icons(); ?>
                        </span>
                    <?php } else if ($top_right == "userlinks") { ?>
                        <div class="top-bar-menu">
                            <?php
                            if ( has_nav_menu( 'top-menu' ) ) {
                                it_nav_menu( array( 'theme_location' => 'top-menu', 'menu_class' => '', 'container'=>'', 'items_wrap' => '<ul class="top-bar-menu right">%3$s</ul>' ) );
                            }else{
                                echo '<span class="menu-message">'.__('Please go to admin panel > Menus > select top- menu and add items to it.','superfine').'</span>';
                            } 
                            ?>
                        </div>
                    <?php } ?>
                    
                    <?php if($show_cart == '1' && $cart_pos == 'right'){ ?>
                        <span class="top-cart">
                            <?php echo it_topbar_wo_cart(); ?>
                        </span>
                    <?php } ?>
                </div>
            <?php } ?>
            
            </div>
    </div>
</div>
