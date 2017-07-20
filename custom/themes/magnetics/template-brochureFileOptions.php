<?php
	// Custom meta values 
	$metaPDF = get_post_meta($post->ID,'_product_tabs_system_at_a_glance_pdf',true);
	$metaPDFName = rtrim($metaPDF, "/");

	if(!$metaPDF) {

		// $metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_brochure',true);
		// $query = new WP_Query('post_type=brochure&p='.$metaAssociatedBrochurePostID);
		
		// while ($query->have_posts()): $query->the_post(); 
		// global $post;

		// $metaPDF = get_post_meta($post->ID,'_brochure_file',true);
		// endwhile;
		// wp_reset_query();
	}

	if ($metaPDF) { ?>
	<aside class="options">
	<a href="<?php echo $metaPDF; ?>" download class="resource icon" title="Download this brochure"></a>
	<a href="<?php echo $metaPDF; ?>" target="_blank" class="printer icon" title="View &amp; print this brochure"></a>
	<a href="mailto:?subject=Marine Magnetics - <?php the_title();?>&body=<?php the_permalink(); ?>" class="mail icon" title="Share this brochure"></a>
	</aside>

	<?php } ?>


