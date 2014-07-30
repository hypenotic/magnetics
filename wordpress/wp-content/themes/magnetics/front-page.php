<?php get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>
    <div class="container">
        <div class="span-8">
            <img src="http://hypelabs.ca/magnetics/wordpress/wp-content/uploads/2014/02/home-page-icon.png" />
        </div>
        <div class="span-4">
            <h2 class="sub-headline">The needle in the haystack</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis ipsum non lacus sodales, quis pretium risus vestibulum. Nulla vel pharetra lorem.</p>
                <br>
				<a href="<?php the_permalink();?>" class="button"><button class="white">Learn More</button></a>
        </div>
    </div>
   
</div>
<?php wp_footer();?>
</body>
</html>