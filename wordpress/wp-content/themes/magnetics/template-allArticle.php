<?php
	if(get_post_meta($post->ID,'_banner_post_article',true)) {
		$bannerPostID = get_post_meta($post->ID,'_banner_post_article',true);
		$query = new WP_Query('post_type=article&p='.$bannerPostID);
		while ($query->have_posts()): $query->the_post(); 
		global $post;
		?>

		<a href="<?php echo get_post_meta($post->ID,'_article_file',true);?>" target="_blank" class="resource icon">Download this article</a>
		
		<?php 
		endwhile;
		wp_reset_query();
	} 
?>
