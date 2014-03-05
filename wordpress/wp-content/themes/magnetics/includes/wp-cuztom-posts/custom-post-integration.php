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

?>