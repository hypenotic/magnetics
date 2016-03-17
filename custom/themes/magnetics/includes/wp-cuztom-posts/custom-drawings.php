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
			'name'          => 'name',
			'label'         => 'Display Name',
			'description'   => '',
			'type'          => 'text'
		),
		array(
			'name'          => 'weight',
			'label'         => 'Weight',
			'description'   => 'Please enter weight.',
			'type'          => 'text'
		),
		array(
		    'name'          => 'size',
		    'label'         => 'Size',
		    'description'   => 'Choose column width.',
		    'type'          => 'select',
		    'options'       => array(
		                'value1'    => '12/12',
		                'value2'    => '9/12',
		                'value3'    => '8/12',
		                'value4'    => '6/12',
		                'value5'    => '3/12',
		                'value6'    => 'Choose Size'
		            ),
		    'default_value' => 'value6'
		)
    )
);

?>