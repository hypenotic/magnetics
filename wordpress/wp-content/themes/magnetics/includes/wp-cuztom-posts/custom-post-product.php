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
	'Options',
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
					'type'          => 'WYSIWYG',          
				),
				array(
			        'name'          => 'image',
			        'label'         => 'Image',
			        'description'   => '',
			        'type'          => 'image',
			    )
			)
		)
	);

?>