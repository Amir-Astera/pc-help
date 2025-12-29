<?php $title = wp_title( '', false, '' ); ?>
<div class="page-title title-minimal">
    <div class="container">
        <div class="row">
            <h1 class="shape fx" data-animate="fadeInDown">
                <?php printf( esc_html__( '%s', 'superfine' ), single_tag_title( '', false ) ); ?>
            </h1>
            <?php if(tag_description()){
                    echo '<p class="desc_text">';
                    echo tag_description( $tag_id );
                    echo '</p>';
                }
            ?>
        </div>
    </div>
</div>
