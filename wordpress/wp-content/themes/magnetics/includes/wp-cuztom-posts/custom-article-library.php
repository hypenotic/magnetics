<?php //CPT for article library

$args = array(
	'has_archive' => false,
	//'menu_position' => 5,
	'menu_icon' => 'dashicons-welcome-learn-more', //http://melchoyce.github.io/dashicons/
	'supports'	=> array( 'title' ),
 	);

$article = register_cuztom_post_type( 'Article', $args);

$article->add_meta_box(
	'article',
	'Article',
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