<?php

	/**
	* Shows related posts by tag if available and category if not
	*
	* @author Justin Tallant
	* @param string $title h4 above list of related posts
	* @param int $count max number of posts to show
	* @return mixed related posts wrapped in div or null if none found
	*/
	
    $metaRelatedArticles = get_post_meta(get_the_ID(), '_related_content_post_article', true);
    $metaRelatedBrochures = get_post_meta(get_the_ID(), '_related_content_post_brochure', true);
    $metaRelatedProducts = get_post_meta(get_the_ID(), '_related_content_post_related_products', true);

	global $post;

	$tag_ids = array();

	$current_cat = get_the_category($post->ID);
	$current_cat = $current_cat[0]->cat_ID;
	$this_cat = '';

	$tags = get_the_tags($post->ID);

	if ( $tags ) {
		foreach($tags as $tag) {
			$tag_ids[] = $tag->term_id;
		}
	} else {
		$this_cat = $current_cat;
	}



	if($metaRelatedBrochures) {
		
		$metaRelatedMerged = array_merge($metaRelatedArticles, $metaRelatedBrochures);

		$args_b = array(
			'post_type'   => array('brochure'),
			'post__in'    =>	 $metaRelatedMerged,
			'posts_per_page' => -1,
			'order'   => 'DESC'
		);


	} else {

		$args_b = array(
			'post_type'   => get_post_type(),
			'numberposts' => 2,
			'orderby'     => 'rand', 
			'tag__in'     => $tag_ids,
			'cat'         => $this_cat,
			'exclude'     => $post->ID
		);

		
	}

	if($metaRelatedArticles) {
		
		$metaRelatedMerged = array_merge($metaRelatedArticles, $metaRelatedBrochures);

		$args_a = array(
			'post_type'   => array('article'),
			'post__in'    =>	 $metaRelatedMerged,
			'posts_per_page' => -1,
			'orderby'   => 'post__in'
		);


	} else {

		$args_a = array(
			'post_type'   => get_post_type(),
			'numberposts' => 2,
			'orderby'     => 'rand',
			'tag__in'     => $tag_ids,
			'cat'         => $this_cat,
			'exclude'     => $post->ID
		);

		
	}

	$related_posts_b = get_posts($args_b);
	$related_posts_a = get_posts($args_a);

	/**
	 * If the tags are only assigned to this post try getting
	 * the posts again without the tag__in arg and set the cat
	 * arg to this category.
	 */
	if ( empty($related_posts) ) {
		$args['tag__in'] = '';
		$args['cat'] = $current_cat;
		$related_posts = get_posts($args);
	}

	if ( empty($related_posts) ) {
		return;
	}

	?>

	<section class="related product-<?php echo $post->ID?>">

	<?php if (is_single(array(204, 281, 1290))) { ?>

		<?php if ( in_category( 'products' ) && $metaRelatedBrochures[0] !== '0' && $metaRelatedArticles[0] !== '0') { ?>
			<h2>Brochures &amp; Articles</h2>
		<!-- Start Loop -->
		<?php } else if (in_category( 'products' ) && $metaRelatedArticles[0] == '0') { ?>
			<h2 style="margin-top: 50px;">Brochures</h2>
		<?php } else { ?>
			<h2>Related Articles</h2>
		<?php } ?>

	<?php } ?>

	<?php 
	foreach ( $related_posts_b as $post ) { ?>

	<?php get_template_part('template','postOverview'); ?>
	 	
 	<!-- End Loop -->
	<?php }
	wp_reset_postdata();?>

	<?php 
	foreach ( $related_posts_a as $post ) { ?>

	<?php get_template_part('template','postOverview'); ?>
	 	
 	<!-- End Loop -->
	<?php }
	wp_reset_postdata();?>

</section>
  