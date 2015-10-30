<?php //CPT for additional options

$args = array(
	'has_archive' => true,
	//'menu_position' => 5,
	'menu_icon' => 'dashicons-images-alt', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', 'editor' ),
 	);

$options = register_cuztom_post_type( 'Additional Options', $args);

?>