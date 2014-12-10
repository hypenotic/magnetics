<?php

function namespace_add_custom_types( $query ) {
  if( !is_admin() && is_post_type_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'brochure','post'
		));
	  return $query;
	}
}
	add_action( 'pre_get_posts', 'namespace_add_custom_types' );

?>