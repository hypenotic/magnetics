<?php
/*
* Post Type: Page/Post (Default)
* Dependancies:
* - MetaBox.io (https://metabox.io/) 
* - MB Show Hide (https://metabox.io/plugins/meta-box-show-hide/)
* - MB Group (https://metabox.io/plugins/meta-box-group/)
* Details:
* This files constructs the fields for a default WP page/post
*/
add_filter( 'rwmb_meta_boxes', 'mag_register_default' );
function mag_register_default( $meta_boxes ) {
    // $prefix = 'rw_';
    // PRODUCTS (Category)
    $meta_boxes[] = array(
        'title'      => __( 'Timeline', 'textdomain' ),
        'post_types' => array( 'post'),
        'show'   => array(
            // List of page templates (used for page only). Array. Optional.
            'category'    => array( 'Products' )
        ),
        'fields' => array(
            array(
                'id' => '_timeline_block',
                'type' => 'group',
                'clone'  => true,
                'sort_clone' => true,
                'collapsible' => true,
                'group_title' => array( 'field' => '_heading' ),
                'save_state' => true,
                'fields' => array(
                    array(
                        'name'  => __( 'Heading', 'textdomain' ),
                        'desc'  => '',
                        'id'    => '_heading',
                        'type'  => 'text',
                    ),
                    array(
                        'name'  => __( 'Content', 'textdomain' ),
                        'desc'  => '',
                        'id'    => '_content',
                        'type'  => 'wysiwyg',
                    ),
                ),
            ),
        )
    );
    $meta_boxes[] = array(
        'title'      => __( 'System At A Glance (Tab)', 'textdomain' ),
        'post_types' => array( 'post'),
        'show'   => array(
            // List of page templates (used for page only). Array. Optional.
            'category'    => array( 'Products', 'Product Integrations' )
        ),
        'fields' => array(
            // array(
            //     'name'  => __( 'What\'s In The Box', 'textdomain' ),
            //     'desc'  => '',
            //     'id'    => '_product_tabs_whats_in_the_box',
            //     'type'  => 'wysiwyg',
            // ),
            array(
                'name'  => __( 'Product Includes', 'textdomain' ),
                'desc'  => '',
                'id'    => '_product_tabs_system_consists_of',
                'type'  => 'wysiwyg',
            ),
            array(
                'name'  => __( 'Additional Components', 'textdomain' ),
                'desc'  => '',
                'id'    => '_product_tabs_additional_componentsx',
                'type'  => 'wysiwyg',
            ),
            array(
                'name'  => __( 'Options', 'textdomain' ),
                'desc'  => '',
                'id'    => '_product_tabs_product_options',
                'type'  => 'wysiwyg',
            ),
        )
    );
    $meta_boxes[] = array(
        'title'      => __( 'Integrations (Tab)', 'textdomain' ),
        'post_types' => array( 'post'),
        'show'   => array(
            // List of page templates (used for page only). Array. Optional.
            'category'    => array( 'Product Integrations' )
        ),
        'fields' => array(
            array(
                'desc'  => 'Select your related products here',
                'id'    => '_product_tabs_related_products',
                'type'  => 'post',
                'clone' => true,
                'query_args' => array(
                    'cat' => 7,
                )
            ),
        )
    );
    // $meta_boxes[] = array(
    //     'title'      => __( 'Steps', 'textdomain' ),
    //     'post_types' => array( 'post'),
    //     'show'   => array(
    //         // List of page templates (used for page only). Array. Optional.
    //         'category'    => array( 'Products' )
    //     ),
    //     'fields' => array(
    //         array(
    //             'name'  => __( 'Title', 'textdomain' ),
    //             'desc'  => 'e.g. Step 1',
    //             'id'    => '_steps_title',
    //             'type'  => 'text',
    //         ),
    //         array(
    //             'name'  => __( 'Image', 'textdomain' ),
    //             'desc'  => '',
    //             'id'    => '_steps_image',
    //             'type'  => 'image',
    //         ),
    //         array(
    //             'name'  => __( 'Text', 'textdomain' ),
    //             'desc'  => '',
    //             'id'    => '_steps_text',
    //             'type'  => 'wysiwyg',
    //         ),
    //     )
    // );
    return $meta_boxes;
}
?>