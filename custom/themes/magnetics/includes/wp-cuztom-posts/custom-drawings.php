<?php //CPT for drawings

$args = array(
	'has_archive' => true,
	'menu_icon' => 'dashicons-admin-plugins', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', 'editor','thumbnail' ),
 	);

$drawings = register_cuztom_post_type( 'Drawing', $args);

$drawings->add_meta_box(
    'measurements',
    'Details', 
    array(
    	array(
			'name'          => 'name',
			'label'         => 'Display Name',
			'description'   => '',
			'type'          => 'text'
		),
		array(
			'name'          => 'weight',
			'label'         => 'Weight (Line 1)',
			'description'   => 'Please enter weight.',
			'type'          => 'text'
		),
		array(
			'name'          => 'weight_two',
			'label'         => 'Weight (Line 2)',
			'description'   => 'Please enter weight.',
			'type'          => 'text'
		),
		array(
			'name'          => 'image_one',
			'label'         => 'Image 1',
			'description'   => 'Please choose first image',
			'type'          => 'image'
		),
		array(
			'name'          => 'name_two',
			'label'         => 'Display Name #2',
			'description'   => '',
			'type'          => 'text'
		),
		array(
			'name'          => 'image_two',
			'label'         => 'Image 2',
			'description'   => 'Please choose second image',
			'type'          => 'image'
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
		                'value7'    => '6/12 (Special Box)',
		                'value8'    => '5/12',
		                'value5'    => '4/12',
		                'value6'    => 'Choose Size'
		            ),
		    'default_value' => 'value5'
		)
    )
);

?>