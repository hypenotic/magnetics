<?php

/**
* Use style.css for tinymce
*/
/*
function my_theme_add_editor_styles() {
    add_editor_style( 'style.css' );
}

add_action( 'init', 'my_theme_add_editor_styles' );
*/

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .form-table td {
    margin-bottom: 9px;
    padding: 15px 10px;
    line-height: 1.3;
    vertical-align: middle;
    max-width: 500px;
}
  </style>';
}

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Intimate (Sans-Serif)',  
			'block' => 'p',  
			'classes' => 'intimate',
			'wrapper' => false
		),  
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  

?>