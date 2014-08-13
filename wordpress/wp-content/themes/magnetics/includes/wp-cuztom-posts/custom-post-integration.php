<?php //Integration CPT

$args = array(
	'has_archive' => true,
	'menu_position' => 5,
	'menu_icon' => 'dashicons-welcome-learn-more', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
 	);

$integration = register_cuztom_post_type( 'Integration', $args);
$integration->add_meta_box(
	'',
	'Integration Details',
		array(
			array(
				'name'          => 'sub_heading',
				'label'         => 'Sub Heading',
				'description'   => 'This will be displayed below Title',
				'type'          => 'text',          
			)
		)
	);
$integration->add_meta_box(
	'software_partners',
	'Software Partners',	
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
			        'name'          => 'Logo',
			        'label'         => 'Company Logo',
			        'description'   => '',
			        'type'          => 'image',
			    ),
			    array(
        			'name'          => 'link',
        			'label'         => 'Website URL',
        			'description'   => 'Please enter website url.',
        			'type'          => 'text'
     			)
			)
		)
);	
?>