<?php //CPT for article library

$args = array(
	'has_archive' => true,
	'public' => false,
	//'menu_position' => 5,
	'menu_icon' => 'dashicons-welcome-learn-more', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title' ),
	// 'rewrite' => array('slug' => 'articles-and-brochures'),
 	);

$brochure = register_cuztom_post_type( 'Brochure', $args);

$brochure->add_meta_box(
	'brochure',
	'Brochure',
		array(
			array(
				'name'          => 'content',
				'label'         => 'Description',
				'description'   => '',
				'type'          => 'textarea',          
			),
			array(
				'name'          => 'file',
				'label'         => 'File',
				'description'   => 'Upload/Select PDF file',
				'type'          => 'file',
			)
		)
	);
?>