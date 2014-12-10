<?php
	// Custom meta values 
	$metaPDF = get_post_meta($post->ID,'_brochure_file',true);
	$metaPDFName = rtrim($metaPDF, "/");

	if(!$metaPDF) {

		$metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_brochure',true);
		$query = new WP_Query('post_type=brochure&p='.$metaAssociatedBrochurePostID);
		
		while ($query->have_posts()): $query->the_post(); 
		global $post;

		$metaPDF = get_post_meta($post->ID,'_brochure_file',true);
		endwhile;
		wp_reset_query();
	}

	if ($metaPDF) { ?>

	<a href="<?php echo $metaPDF; ?>" download class="resource icon" title="Download this brochure"></a>
	<a href="<?php echo $metaPDF; ?>" class="view icon" title="View &amp; print this brochure"></a>
	<a href="mailto:" class="share icon" title="Share this brochure"></a>


	<?php } ?>


