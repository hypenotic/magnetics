<?php
//Create article custom post type
$pages = new Cuztom_Post_Type('page');
$pages->add_meta_box( 
    '',
    'Sub Heading', 
    array(
        array(
            'name'          => 'sub_heading',
            'label'         => 'Sub Heading',
            'description'   => 'This will be displayed below Title',
            'type'          => 'text'
        )
    )
);
?>