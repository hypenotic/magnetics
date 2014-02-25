<?php //Product CPT

$args = array(
	'has_archive' => true,
	'menu_position' => 5,
	'menu_icon' => 'dashicons-products', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
 	);

$product = register_cuztom_post_type( 'Products', $args);


?>