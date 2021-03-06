<?php get_header(); ?>
    
    <div class="background">
<img class="background-main" src="<?php echo get_bloginfo('template_url') ?>/dist/images/main.png"/>
<img class="background-left" src="<?php echo get_bloginfo('template_url') ?>/dist/images/bottom-left.png"/>
<img class="background-center" src="<?php echo get_bloginfo('template_url') ?>/dist/images/bottom-center.png"/>
<!-- <img class="background-center" src="<?php //echo get_bloginfo('template_url') ?>/dist/images/home-all.png"/> -->
    <!-- <img src="<?php //echo get_bloginfo('template_url') ?>/dist/images/seaquest-array.png" class="seaquest-home"> -->
    <div class="overlay"></div>
    	<video controls loop muted autoplay>
            <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
        </video>
    </div>

    <div class="mobile-bg"></div>

	<section role="main">
	    <?php the_content(); ?>
    </section>

    <a href="https://usfcr.com" target="_blank" rel="noopener" id="vendor-seal"><img src="https://usfcr.com/assets/img/Verified-Vendor-Seal-2020-sm.png" alt="USFCR Verified Vendor" title="US Federal Contractor Registration System for Award Management Verified Vendor Seal"></a>

<?php get_footer(); ?>