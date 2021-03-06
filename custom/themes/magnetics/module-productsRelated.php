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

	$num = $metaRelatedProducts[0];

	if($num !== '0') {
		$args = array(
			'post_type'   => array('post'),
			'post__in'    => $metaRelatedProducts,
			'orderby'	  => 'post__in' 
		);
		$thetitle = 'Related Products';
	} else {
		$args = array(
			'post_type'   => array('post'),
			'showposts'	  => 2
		);
		$thetitle = 'Related Resources';
	}

	$related_posts = get_posts($args);

	?>

	<section class="related">

	<h3><?php echo $thetitle ?></h3>

	<ul>

	<?php 
	 foreach ( $related_posts as $post ) { 

	 $category = get_the_category();?>
		<li class="<?php echo $category[0]->slug; ?>">
			<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
		</li>
 	<!-- End Loop -->
	<?php }
	wp_reset_postdata();?>
	<br style="clear:both" />
	</ul>

	</section>
  