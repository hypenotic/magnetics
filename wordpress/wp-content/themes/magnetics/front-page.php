<?php get_header(); ?>

    <div class="background">
        <video autoplay loop>
            <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
        </video>
    </div>

    <div class="mobile-bg"></div>

    <?php get_template_part( 'module', 'carouselProduct' ); ?>

<?php get_footer(); ?>