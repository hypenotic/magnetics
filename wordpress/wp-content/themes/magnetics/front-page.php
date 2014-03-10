<?php get_header(); ?>

<?php 
query_posts('post_type=page&p=16');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the feature banner image
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'banner', true);
		}
    ?>

    <div class="banner" style=" display: block;">  	
            <div class="container">
	            <div class="span-10 center">
                        <div class="span-7">
                        	<img src="<?php echo $image_url[0]; ?>" />
                        </div>
                        <div class="span-5">
                            <?php the_title( '<h2 class="sub-headline">', '</h2>' ); ?>
                            <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
                            <?php the_excerpt(); ?>
                            <br />
                            <a href="<?php the_permalink();?>" class="button"><button class="white">Learn More</button></a>
                        </div>
                </div>
            </div>
    </div>
<?php endwhile; endif; wp_reset_query();?>
</div>
<?php wp_footer();?>
</body>
</html>