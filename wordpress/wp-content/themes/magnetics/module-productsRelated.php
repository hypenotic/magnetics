<?php

	/**
	* Shows related posts by tag if available and category if not
	*
	* @author Justin Tallant
	* @param string $title h4 above list of related posts
	* @param int $count max number of posts to show
	* @return mixed related posts wrapped in div or null if none found
	*/
	
	$metaRelatedProducts = get_post_meta(get_the_ID(), '_related_content_post_related_products', true);

	if($metaRelatedProducts) {
		$args = array(
			'post_type'   => array('post'),
			'post__in'    =>	 $metaRelatedProducts
		);
	} else {
		$args = array(
			'post_type'   => array('post'),
			'showposts'	  => 2
		);
	}

	$related_posts = get_posts($args);

	?>

	<section class="related">

	<h3>Related Products</h3>

	<ul>

	<?php 
	 foreach ( $related_posts as $post ) { ?>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
		</li>
 	<!-- End Loop -->
	<?php }
	wp_reset_postdata();?>
	<br style="clear:both" />
	</ul>

	</section>
  