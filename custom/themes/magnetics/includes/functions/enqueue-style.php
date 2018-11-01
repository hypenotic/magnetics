<?php

/**
* Enqueue styles
*/

function my_styles() {
	if(!is_admin()) {
		wp_register_style('style', get_template_directory_uri() . '/style.css?v=181101-59fe3ni49', '1.3');
		wp_enqueue_style( 'style' );
	}
}

add_action('wp_enqueue_scripts', 'my_styles');

?>