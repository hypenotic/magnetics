<?php

/**
* Enqueue styles
*/

function my_styles() {
	if(!is_admin()) {
		wp_register_style('style', get_template_directory_uri() . '/dist/style.css', '1.3');
		wp_enqueue_style( 'style' );
	}
}

add_action('wp_enqueue_scripts', 'my_styles');

?>