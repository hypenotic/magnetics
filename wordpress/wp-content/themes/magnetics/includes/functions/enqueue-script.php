<?php

/**
* Enqueue scripts
*/

function my_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.min.js', array('jquery'), '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );

?>