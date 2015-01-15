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

	function get_the_slug( $id=null ){
	  if( empty($id) ):
	    global $post;
	    if( empty($post) )
	      return ''; // No global $post var available.
	    $id = $post->ID;
	  endif;

	  $slug = basename( get_permalink($id) );
	  return $slug;
	}


	$classes[] = implode(' ',$category_slugs) . ' ' . get_the_slug()  . ' ' . $post->post_name . ' offcanvas dark';
	return $classes;
}

add_filter('body_class', 'add_slug_to_body_class');

?>