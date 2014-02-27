<?php
//Create article custom post type
$article = new Cuztom_Post_Type('post');

$article->add_meta_box(
	'brochure',
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