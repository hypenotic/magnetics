<?php
//Create article custom post type
$pages = new Cuztom_Post_Type('page');
$pages->add_meta_box(
    'page_tabs',
    'Page Tabs',
    array(
        'tabs',
        array(
            'Left Tab' => array(
                array(
                    'name'          => 'tabLeft',
                    'label'         => 'Overview Text',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                ),
                array(
                    'name'          => 'tabLeftTextArea',
                    'label'         => 'Content',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                )
            ),

            'Right Tab' => array(
                array(
                    'name'          => 'tabRight',
                    'label'         => 'Overview Text',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                ),
                array(
                    'name'          => 'tabRightTextArea',
                    'label'         => 'Content',
                    'description'   => '',
                    'type'          => 'wysiwyg'
                )
            )
        )
    )
);
?>