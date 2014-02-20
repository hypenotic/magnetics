<?php get_header(); ?>

<div class="banner">
        <div class="bannertext">
        	<div class="container">
                <h1 class="front-headline">404</h1>
                <p>Lorem ipsum dolor sitorem ipsum dolor sitorem ipsum dolor sit Lorem ipsum dolor sit:</p>
                <?php wp_nav_menu(array('theme_location'=> '404-page-menu'));?>
            </div>
        </div>
        <span class="bannerimage" style="background-image:url('<?php bloginfo('template_url');?>/images/404.jpg'); display: block;">
            <span class="inner"></span>
        </span>
</div>
<?php get_footer(); ?>