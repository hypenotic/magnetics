<?php

function gravity_form_entry_number(){

	//echo $_GET["rmaNumber"];
	$rmaNumber = $_GET["rmaNumber"];
	return $rmaNumber;
}
add_shortcode( 'rmaNumber', 'gravity_form_entry_number' );

?>