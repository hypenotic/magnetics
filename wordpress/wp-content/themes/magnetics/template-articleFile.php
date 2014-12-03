<?php
	// Custom meta values 
	$metaPDF = get_post_meta($post->ID,'_article_file',true);

	if(!$metaPDF) {

		$metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_article',true);
		$query = new WP_Query('post_type=article&p='.$metaAssociatedBrochurePostID);
		
		while ($query->have_posts()): $query->the_post(); 
		global $post;

		$metaPDF = get_post_meta($post->ID,'_article_file',true);
		endwhile;
		wp_reset_query();
	}

	if ($metaPDF) { ?>

	<a href="<?php echo $metaPDF; ?>" target="_blank" class="resource icon">Download this Article</a>

	<?php } ?>