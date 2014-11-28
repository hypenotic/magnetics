<?php
	// Grab this post's associated brochure
	$metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_brochure',true);
	
	if($metaAssociatedBrochurePostID) {

		// Query the associated brochure
		$query = new WP_Query('post_type=brochure&p='.$metaAssociatedBrochurePostID);
		
		while ($query->have_posts()): $query->the_post(); 
		global $post;

		$metaPDF = get_post_meta($post->ID,'_brochure_file',true);?>

		<a href="<?php echo $metaPDF; ?>" target="_blank" class="resource icon">Download this Brochure</a>
		
		<?php 
		endwhile;
		wp_reset_query();
	} 
?>

