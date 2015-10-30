<?php //CPT for drawings

$args = array(
	'has_archive' => true,
	'menu_icon' => 'dashicons-admin-plugins', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', 'editor','thumbnail' ),
 	);

$drawings = register_cuztom_post_type( 'Drawing', $args);

?>