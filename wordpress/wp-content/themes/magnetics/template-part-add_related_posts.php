
<!-- Get Related Posts -->

<?php
	$args=array(
			'post__not_in' => array($post->ID),
			'showposts'=>1  // Number of related posts that will be shown.
			);
	
	$tags = wp_get_post_tags($post->ID);
	
	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		$args['tag__in']= $tag_ids;
	}
	$related_posts = new WP_Query($args);
	
	if( $related_posts->have_posts() ) {
	?>
     <section class="container related green-box">    
	 <?php while($related_posts->have_posts()): $related_posts->the_post(); ?>
         <div class="span-8-center">
            <h6>OTHER ARTICLES RELATED TO SAESPY</h6>
                <div class="span-5">
	                <h3><?php the_title();?></h3>
                </div>
                <div class="span-6">
                    <p><?php echo get_post_meta(get_the_ID(),'_brochure_content',true);?></p>
                    <p class="meta inline-meta">
                         <?php
                            if(get_post_meta($post->ID,'_brochure_file',true)) {
                        ?>
                        <span><a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="download"></a></span>
                        <?php } ?>
                        <span><a href="<?php the_permalink();?>" class="more"></a></span>
                    </p>
                </div>
	            <hr />
        </div>
     <?php endwhile; wp_reset_query();?>
     </section>
	<?php
    }
    ?>