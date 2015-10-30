<?php //CPT for drawings

$args = array(
	'has_archive' => true,
	'menu_icon' => 'dashicons-admin-plugins', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', 'editor','thumbnail' ),
 	);

$drawings = register_cuztom_post_type( 'Drawing', $args);

$drawings->add_meta_box(
    'measurements',
    'Measurements', 
    array(
		array(
			'name'          => 'weight',
			'label'         => 'Weight',
			'description'   => 'Please enter weight.',
			'type'          => 'text'
		)
    )
);

?>