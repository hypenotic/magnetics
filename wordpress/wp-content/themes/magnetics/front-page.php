<?php get_header(); ?>

<video autoplay loop poster="polina.jpg" id="bgvid">
<source src="<?php bloginfo('template_url');?>/videos/shutterstock_v3711827.mp4" type="video/mp4">
</video>

    <div class="container">
        <div class="span-7">
            <img src="http://hypelabs.ca/magnetics/wordpress/wp-content/uploads/2014/02/home-page-icon.png" />
        </div>
        <div class="span-5">
            <h2 class="sub-headline">The needle in the haystack</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis ipsum non lacus sodales, quis pretium risus vestibulum. Nulla vel pharetra lorem.</p>
                <a href="<?php the_permalink();?>" class="button"><button class="white">Learn More</button></a>
        </div>
    </div>
   
</div>
<?php wp_footer();?>
</body>
</html>