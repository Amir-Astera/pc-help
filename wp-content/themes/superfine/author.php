<?php
get_header();
$curauth = $wp_query->get_queried_object(); 
$auth_info = theme_option('show_auth_info');
$auth_posts = theme_option('show_auth_posts');
$posts_style = theme_option('auth_posts_style');
$content_before = theme_option('auth_content_before');
$content_after = theme_option('auth_content_after');

$col = '';
$lay = theme_option('blog_sidebar');

if($lay == 'right' || $lay == 'left'){
    $col = '9';
}else{
    $col = '12';
}

get_template_part( 'layout/page-titles/title-author');
?>

<div class="section">
    <div class="container">
        <div class="row">
            <?php if ( $lay == 'left' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
            <div class="col-md-<?php echo $col; ?>">
                <?php if($content_before != ''){ ?>
                    <div class="margin-bottom-30">
                        <?php echo wp_kses($content_before,it_allowed_tags()); ?>
                    </div>
                <?php } ?>
                <?php if($auth_info == '1'){ ?>
                <div class="heading side-head head-5 uppercase"><h4><?php echo esc_html__('About','superfine') ?> <span class="main-color"><?php echo $curauth->user_login; ?></span></h4></div>
                <div class="my-details shape clearfix">
                    <div class="f-left my-img">
                        <?php echo get_avatar(get_the_author_meta('user_email', $curauth->post_author), 150); ?>
                    </div>
                    <div class="rit-details">
                        <ul class="list alt list-bookmark col-md-4">
                            <li class="fx" data-animate="slideInDown"><b class="main-color uppercase"><?php echo esc_html__('Email: ','superfine') ?></b><?php echo $curauth->user_email; ?></li>
                            <li class="fx" data-animate="slideInDown" data-animation-delay="100"><b class="main-color uppercase"><?php echo esc_html__('Nice Name: ','superfine') ?></b><?php echo $curauth->user_nicename; ?></li>
                            <li class="fx" data-animate="slideInDown" data-animation-delay="200"><b class="main-color uppercase"><?php echo esc_html__('Website: ','superfine') ?></b><?php echo $curauth->user_url; ?></li>
                        </ul>
                        <ul class="list alt list-bookmark col-md-4">
                            <li class="fx" data-animate="slideInDown" data-animation-delay="300"><b class="main-color uppercase"><?php echo esc_html__('Registered On :','superfine') ?></b><?php echo $curauth->user_registered; ?></li>
                            <li class="fx" data-animate="slideInDown" data-animation-delay="400"><b class="main-color uppercase"><?php echo esc_html__('Logged in as: ','superfine') ?></b><?php echo $curauth->user_login; ?></li>
                        </ul>
                    </div>
                </div>
                <?php if($curauth->description != ''){ ?>
                <div class="margin-bottom-50">
                    <?php echo $curauth->description; ?>
                </div>
                <?php } ?>
                <?php } ?>
                <?php if($auth_posts == '1'){ ?> 
                    <?php if ( have_posts() ) : ?>
                        <div class="heading side-head head-5 uppercase"><h4><span class="main-color"><?php echo $curauth->user_login; ?> </span><?php echo esc_html__('Posts','superfine') ?></h4></div>
                        <div class="blog-posts" id="content">
                            <?php get_template_part( 'layout/blog/blog-'.$posts_style) ?>
                        </div>
                        <?php else: 
                        the_content;
                        endif; ?>
                    <div class="clearfix"></div>
                    <?php it_paging_nav(); ?>
                <?php } ?>
                <?php if($content_after != ''){ ?>
                    <div class="margin-top-30">
                        <?php echo wp_kses($content_after,it_allowed_tags()); ?>
                    </div>
                <?php } ?>
            </div>
            <?php if ( $lay == 'right' ) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>