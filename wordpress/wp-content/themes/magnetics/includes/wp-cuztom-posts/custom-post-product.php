<?php //Product CPT

$args = array(
	'has_archive' => true,
	'menu_position' => 5,
	'menu_icon' => 'dashicons-products', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', 'thumbnail' )
 	);

$product = register_cuztom_post_type( 'Product', $args);

$product->add_meta_box( 
	'product',
	'Overview',
		array(
			array(
				'name'          => 'title',
				'label'         => 'Title',
				'description'   => '',
				'type'          => 'text'
                ),
			array(
				'name'          => 'description',
				'label'         => 'Description',
				'description'   => '',
				'type'          => 'textarea'
                )
		)
	);

$product->add_meta_box(
	'product_options',
	'Configurations',
	array(
		'bundle',    
			array( 
				array(
					'name'          => 'title',
					'label'         => 'Title',
					'description'   => '',
					'type'          => 'text',          
				),
				array(
					'name'          => 'content',
					'label'         => 'Description',
					'description'   => '',
					'type'          => 'textarea',          
				),
				array(
			        'name'          => 'image',
			        'label'         => 'Image',
			        'description'   => '',
			        'type'          => 'image',
			    ),
			    array(
        			'name'          => 'config',
        			'label'         => 'Select',
        			'description'   => 'Select what type of configuration',
        			'type'          => 'select',
        			'options'       => array(
						'value1'    => 'Select configuration type',
            			'value2'    => 'What\'s in the box',
            			'value3'    => 'Accessories',
            			'value4'    => 'Integrations'
        				),
        			'default_value' => 'value1'
     			)
			)
		)
	);

$product->add_meta_box(
	'product_features',
	'Features',
	array(
		'bundle',    
			array( 
				array(
					'name'          => 'title',
					'label'         => 'Title',
					'description'   => '',
					'type'          => 'text',          
				),
				array(
					'name'          => 'content',
					'label'         => 'Description',
					'description'   => '',
					'type'          => 'textarea',          
				),
			)
		)
	);

?>