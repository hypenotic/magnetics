<?php get_header(); ?>
    
    <div class="background">
    <img src="<?php echo get_bloginfo('template_url') ?>/images/homepage.png"/>
    <div class="overlay"></div>
    	<video autoplay loop>
            <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
        </video>
    </div>

    <div class="mobile-bg"></div>

	<section role="main">
	    <?php the_content(); ?>
    </section>

<?php get_footer(); ?>