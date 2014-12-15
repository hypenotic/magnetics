<?php

/*
function namespace_add_custom_types( $query ) {

	
	$articles = get_posts(array(
		'post_type' => 'post',
		'cat'		=>	'articles'
	));

	$brochures = get_posts(array(
		'post_type' => 'brochure'
	));

	$mergedposts = array_merge( $brochures, $articles ); //combine queries

	$postids = array();

	foreach( $mergedposts as $item ) {

	$postids[]=$item->ID; //create a new query only of the post ids

	}

	$uniqueposts = array_unique($postids); //remove duplicate post ids

	
	if( !is_admin() && is_post_type_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
	    $query->set( 'post_type', array(
	     'brochure','post'
		));
	    $query->set('post__in', $uniqueposts);
		  return $query;
		}
	}

	add_action( 'pre_get_posts', 'namespace_add_custom_types' );
*/
?>