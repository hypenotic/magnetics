<?php

function gravity_form_entry_number(){

	//echo $_GET["rmaNumber"];
	$rmaNumber = $_GET["rmaNumber"];
	return $rmaNumber;
}
add_shortcode( 'rmaNumber', 'gravity_form_entry_number' );

function gravity_form_entry_date(){

	//echo $_GET["rmaNumber"];
	$rmaDate = $_GET["rmaDate"];
	return $rmaDate;
}
add_shortcode( 'rmaDate', 'gravity_form_entry_date' );

?>