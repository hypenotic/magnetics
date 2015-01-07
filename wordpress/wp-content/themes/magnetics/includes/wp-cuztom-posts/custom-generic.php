<?php //Generic Modular Content Template for Posts and Pages

function remove_meta_boxes() {
    remove_meta_box('postcustom', 'post', 'normal'); //Custom fields metabox
    remove_meta_box('postcustom', 'page', 'normal'); //Custom fields metabox
    remove_meta_box('commentstatusdiv', 'post', 'normal'); //Comments status metabox (discussion)
    remove_meta_box('commentstatusdiv', 'page', 'normal'); //Comments status metabox (discussion)
    remove_meta_box('commentsdiv', 'page', 'normal'); //Comments metabox
    remove_meta_box('commentsdiv', 'post', 'normal'); //Comments metabox
    remove_meta_box('trackbacksdiv', 'post', 'normal'); //Trackbacks metabox
    remove_meta_box('trackbacksdiv', 'page', 'normal'); //Trackbacks metabox
    remove_meta_box('authordiv', 'post', 'normal'); //Author metabox
    remove_meta_box('authordiv', 'page', 'normal'); //Author metabox
    remove_meta_box('slugdiv', 'post', 'normal'); //Slug metabox
    remove_meta_box('slugdiv', 'page', 'normal'); //Slug metabox
    //remove_meta_box('postexcerpt', 'post', 'normal'); //Excerpt metabox
    //remove_meta_box('postexcerpt', 'page', 'normal'); //Excerpt metabox
    //remove_meta_box('postimagediv', 'post', 'normal'); //Featured image metabox
    //remove_meta_box('postimagediv', 'page', 'normal'); //Featured image metabox
}

add_action( 'admin_menu' , 'remove_meta_boxes' );

$posts = new Cuztom_Post_Type('post');
$pages = new Cuztom_Post_Type('page');

$pages->add_meta_box(
    'banner',
    'Featured banner OR video', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Banner Image',
            'description'   => 'Dimensions 1200px x 600px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'subheading',
            'label'         => 'Subheading',
            'description'   => 'Text that will overlay image',
            'type'          => 'text',
        ),
        array(
            'name'          => 'background_image',
            'label'         => 'Background Image',
            'description'   => 'Dimensions 1400px x 800px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'text',
            'label'         => 'Text Overlay',
            'description'   => 'Text that will overlay image',
            'type'          => 'textarea',
        ),
        array(
        	'name'          => 'post_article',
        	'label'         => 'Select Article',
        	'description'   => 'Select associated article',
        	'type'          => 'post_select',
        	'args'          => array(
            	'post_type' => 'article',
        	),
            'repeatable'    =>  'true'
    	),
    	array(
        	'name'          => 'post_brochure',
        	'label'         => 'Select Brochure',
        	'description'   => 'Select associated brochure',
        	'type'          => 'post_select',
        	'args'          => array(
            	'post_type' => 'brochure',
        	),
            'repeatable'    =>  'true'
    	)
    )
);

$pages->add_meta_box(
    'integrations',
    'Integrations', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Banner Image',
            'description'   => 'Dimensions 1200px x 600px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'subheading',
            'label'         => 'Subheading',
            'description'   => 'Text that will overlay image',
            'type'          => 'text',
        ),
        array(
            'name'          => 'post_brochure',
            'label'         => 'Select Brochure',
            'description'   => 'Select associated brochure',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'brochure',
            ),
            'repeatable'    =>  'true'
        )
    )
);



$pages->add_meta_box(
    'page_tabs', // page tabs
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

$pages->add_meta_box(
    'content_block_1',
    'Content Area (Optional)', 
    array(
        array(
            'name'          => 'text',
            'label'         => 'Text',
            'description'   => 'Text area',
            'type'          => 'wysiwyg',
            
        ),
    )
);



$posts->add_meta_box(
    'author',
    'Author', 
    array(
        array(
            'name'          => 'show',
            'label'         => 'Show Author',
            'description'   => '',
            'type'          => 'checkbox',
            
        ),
    )
);



$posts->add_meta_box(
    'content_block_timeline',
    'Vertical "Timeline" Content', 
    array(
        array(
            'name'          => 'text',
            'label'         => 'List Items',
            'description'   => '',
            'type'          => 'wysiwyg',
            
        ),
    )
);

$posts->add_meta_box(
    'steps',
    'Steps',    
    array(
        'bundle',    
            array( 
                array(
                    'name'          => 'title',
                    'label'         => 'Title',
                    'description'   => 'e.g. Step 1',
                    'type'          => 'text',          
                ),
                array(
                    'name'          => 'image',
                    'label'         => 'Screenshot',
                    'description'   => '',
                    'type'          => 'image',          
                ),
                 array(
                    'name'          => 'text',
                    'label'         => 'Text',
                    'description'   => '',
                    'type'          => 'textarea',
                )
            )
        )
); 

/*

TODO: Update WP Cuztom Posts to support wysiwyg bundling

$posts->add_meta_box(
    'timeline',
    'Timeline',    
    array(
        'bundle',    
            array( 
                array(
                    'name'          => 'type',
                    'label'         => 'Timeline Type',
                    'type'          => 'select',
                        'options'       => array(
                            'paragraph'    => 'Paragraph',
                            'quote'        => 'Quote',
                        ),
                    'default_value' => 'paragraph'       
                ),
                 array(
                    'name'          => 'text',
                    'label'         => 'Text',
                    'type'          => 'textarea',
                )
            )
        )
);
*/

$posts->add_meta_box(
    'banner',
    'Featured banner OR video (Optional)', 
    array(
        array(
            'name'          => 'heading',
            'label'         => 'Headline',
            'description'   => 'Enter Headline',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'subheading',
            'label'         => 'Subheading',
            'description'   => 'Enter Subheadine',
            'type'          => 'text',
            
        ),

        array(
            'name'          => 'image',
            'label'         => 'Banner Image',
            'description'   => 'Dimensions 1200px x 600px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'background_image',
            'label'         => 'Background Image',
            'type'          => 'image',
        ),

    )
);


$posts->add_meta_box(
    'related_content',
    'Related Content', 
    array(
        array(
            'name'          => 'post_article',
            'label'         => 'Select Article',
            'description'   => 'Select associated article',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'article',
            ),
            'repeatable'    =>  'true'
        ),
        array(
            'name'          => 'post_brochure',
            'label'         => 'Select Brochure',
            'description'   => 'Select associated brochure',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'brochure',
            ),
            'repeatable'    =>  'true'
        ),
        array(
            'name'          => 'post_related_products',
            'label'         => 'Related Products',
            'description'   => 'Select related products',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'post',
                'cat'       =>  7
            ),
            'repeatable'    =>  'true'
        )
    )
);

$posts->add_meta_box(
    'additional_options',
    'Additional Options', 
    array(
        'bundle', 
        array(
            array(
                'name'          => 'title',
                'label'         => 'Title',
                'description'   => '',
                'type'          => 'text'
            ),
            array(
                'name'          => 'description',
                'label'         => 'Description',
                'description'   => '',
                'type'          => 'textarea'
            )
        )
    )
);

$posts->add_meta_box(
    'product_tabs',
    'Product Tabs', 
    array(
        array(
            'name'          => 'whats_in_the_box',
            'label'         => 'What\'s In The Box',
            'type'          => 'wysiwyg',  
        ),
        array(
            'name'          => 'post_meta_integrations',
            'label'         => 'Integrations',
            'description'   => 'Select your related integrations here',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'post',
                'cat'       => 11
            ),
            'repeatable'    =>  'true'
        ),
        array(
            'name'          => 'plays_well_with',
            'label'         => 'Plays Well With',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'post',
                'cat'       =>  7
            ),
            'repeatable'    =>  'true'
        ),

        array(
            'name'          => 'system_at_a_glance',
            'label'         => 'System at a Glance',
            'description'   => 'Upload system images',
            'type'          => 'image',
            'repeatable'    =>  'true'  
        ),

       array(
            'name'          => 'system_at_a_glance_PDF',
            'label'         => 'File',
            'description'   => 'System at a Glance',
            'type'          => 'file',
        )

    )
);

$posts->add_meta_box( 
    'full_width',
    'Full width image (Optional)',
    array(
        array(
            'name'          => 'image',
            'label'         => 'Image',
            'description'   => 'Dimensions 1200px x 600px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'text',
            'label'         => 'Text Overlay',
            'description'   => 'Text that will overlay image',
            'type'          => 'textarea',
        ),
    )
);

$posts->add_meta_box(
    'integrations',
    'Vendor Information', 
    array(
        array(
            'name'          => 'link',
            'label'         => 'Vendor',
            'description'   => 'Link to Vendor',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'image',
            'label'         => 'Integration Vendor Logo',
            'description'   => '',
            'type'          => 'image',
        ),
        array(
            'name'          => 'text',
            'label'         => 'Vendor Blurb',
            'description'   => '',
            'type'          => 'wysiwyg',
        ),
    )
);

$posts->add_meta_box(
    'content_block_1',
    'Content Area (Optional)', 
    array(
        array(
            'name'          => 'text',
            'label'         => 'Text',
            'description'   => 'Text area',
            'type'          => 'wysiwyg',
            
        ),
    )
);

?>