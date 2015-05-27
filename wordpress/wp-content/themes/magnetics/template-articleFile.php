<?php
	// Custom meta values 
	$metaPDF = get_post_meta($post->ID,'_article_file',true);
		$articleDescription = get_post_meta($post->ID,'_article_content',true);
		$articleFile = get_post_meta($post->ID,'_article_file',true);
		$articleAssociatedPost = get_post_meta($post->ID,'_article_associated_post',true);
		print_r($metaAssociatedBrochurePostID);
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

	<header>
	<h3><a href="<?php echo get_permalink($metaAssociatedBrochurePostID ); ?>"><?php the_title();?></a></h3>
	</header>

		<section>
			
			<?php 
				// Out on a limb here. If there's no brochureDescription, 
				// we can just call excerpt. Vice versa.
				echo $brochureDescription; 
				echo $articleDescription;
				the_excerpt(); 
			?>

			<footer>
				<a href="<?php echo $metaPDF; ?>" download="<?php if(!$GLOBALS['view']) {echo $metaPDFName; } ?>" class="resource icon <?php if($GLOBALS['view']) {echo 'view';} ?>"><span>Download this Brochure</span></a>
				<a href="<?php echo get_permalink($metaAssociatedBrochurePostID ); ?>" class="icon more"></a>
			</footer>

		</section>
	<?php } ?>