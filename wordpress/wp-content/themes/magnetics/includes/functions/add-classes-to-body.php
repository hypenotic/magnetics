<?php

/**
* Add Slug in Body class
* @example <?php body_class();?>
*/

function add_slug_to_body_class($classes) {
	
	global $post;

	$categories = get_the_category();

	$category_slugs = array();
	foreach ($categories as $category)
	{
	    $category_slugs[] = $category->slug;
	}


	$classes[] = implode(' ',$category_slugs) . ' ' . $post->post_name . ' offcanvas dark';
	return $classes;
}

add_filter('body_class', 'add_slug_to_body_class');

?>