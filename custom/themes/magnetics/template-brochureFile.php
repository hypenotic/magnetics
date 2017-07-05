 <?php
	// Custom meta values 
	$metaPDF = get_post_meta($post->ID,'_brochure_file',true);
	$metaPDFName = rtrim($metaPDF, "/");

	$brochureFile = get_post_meta($post->ID,'_brochure_file',true);
	$brochureDescription = get_post_meta($post->ID,'_brochure_content',true);
		
	if(!$metaPDF) {

		$metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_brochure',true);
		$query = new WP_Query('post_type=brochure&p='.$metaAssociatedBrochurePostID);
		
		while ($query->have_posts()): $query->the_post(); 
		global $post;

		$metaPDF = get_post_meta($post->ID,'_brochure_file',true);
		endwhile;
		
	}

	if ($metaPDF) { ?>

	<header>
		<h3><?php the_title();?></h3>
	</header>

	<section>
		
		<!-- <?php 
			// Out on a limb here. If there's no brochureDescription, 
			// we can just call excerpt. Vice versa.
			//echo $brochureDescription; 
			//echo $articleDescription;
			the_excerpt(); 
		?> -->

		<footer>
			<a href="<?php echo $metaPDF; ?>" class="resource icon <?php if($GLOBALS['view']) {echo 'view';} ?>" target="blank"><span>Download this Brochure</span></a>
		</footer>

	</section>
	<?php } ?>


