<?php
	if(get_post_meta($post->ID,'_banner_post_brochure',true)) {
		$bannerPostID = get_post_meta($post->ID,'_banner_post_brochure',true);
		$query = new WP_Query('post_type=brochure&p='.$bannerPostID);
		while ($query->have_posts()): $query->the_post(); 
		global $post;
		?>

		<a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="resource icon">Download this Brochure</a>
		
		<?php 
		endwhile;
		wp_reset_query();
	} 
?>

