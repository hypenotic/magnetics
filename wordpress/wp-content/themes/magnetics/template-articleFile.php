<?php
	// Custom meta values 
	$metaAssociatedArticle = get_post_meta($post->ID,'_banner_post_article',true);
	
	if($metaAssociatedArticle) {

		// Query the associated article
		$query = new WP_Query('post_type=article&p='.$metaAssociatedArticle);
		
		while ($query->have_posts()): $query->the_post(); 
		global $post;

		$metaPDF = get_post_meta($post->ID,'_article_file',true);?>

		<a href="<?php echo $metaPDF; ?>" target="_blank" class="resource icon">Download this article</a>
		
		<?php 
		endwhile;
		wp_reset_query();
	} 
?>