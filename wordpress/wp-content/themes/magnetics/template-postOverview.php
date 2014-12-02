	 <?php 
		// Custom meta values 
		$brochureFile = get_post_meta($post->ID,'_brochure_file',true);
		$brochureDescription = get_post_meta($post->ID,'_brochure_content',true);
		$postType = get_post_type( get_the_ID());
		$postCategory = get_top_category();

		if($postType !== 'brochure') {
			$postType = $postCategory->name;
		}
	?>

	<article class="overview">
		
		<h6><?php echo $postType; ?></h6>	

		<h3><?php the_title();?></h3>

		<p><?php 
			// Out on a limb here. If there's no brochureDescription, 
			// we can just call excerpt. Vice versa.
			echo $brochureDescription; 
			the_excerpt(); ?></p>

		<footer>

        <?php get_template_part( 'template', 'brochureFile' ); ?>
        <?php get_template_part( 'template', 'articleFile' ); ?>

		<a href="<?php the_permalink();?>" class="more"></a>
		</footer>
		
	</article>