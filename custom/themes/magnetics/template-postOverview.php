	 <?php 
		// Custom meta values 
		$brochureFile = get_post_meta($post->ID,'_brochure_file',true);
		$brochureDescription = get_post_meta($post->ID,'_brochure_content',true);
		$articleDescription = get_post_meta($post->ID,'_article_content',true);
		$articleFile = get_post_meta($post->ID,'_article_file',true);
		
		$postType = get_post_type( get_the_ID());
		$postCategory = get_top_category();

		if($postType !== 'brochure') {
			$postType == 'article';
		}
	?>
	<article class="overview">
		<h6><?php echo $postType; ?></h6>	

				<?php if($postType == 'brochure') { ?>
				<?php get_template_part( 'template', 'brochureFile' ); ?>
				<?php } else { ?>
				<?php get_template_part( 'template', 'articleFile' ); ?>
				<?php } ?>
			
		<br style="clear:both" />
	</article>