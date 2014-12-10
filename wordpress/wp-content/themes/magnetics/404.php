<?php
/*
Template Name: 404
*/

 get_header(); ?>



<section id="main">

   <video autoplay loop id="bgvid">
        <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
    </video>

    <div class="mobile-bg"></div>

    <h1>404</h1>
    <p>Sorry, but it looks like you're lost at sea...</p>
    
    <?php wp_nav_menu( array( 'theme_location' => '404 Page Menu' ) ); ?>

</section>
    
<?php get_footer(); ?>