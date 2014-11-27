<?php //CPT for article library

$args = array(
	'has_archive' => true,
	//'menu_position' => 5,
	'menu_icon' => 'dashicons-welcome-learn-more', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title' ),
 	);

$brochure = register_cuztom_post_type( 'Brochure', $args);

$article->add_meta_box(
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