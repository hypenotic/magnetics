<?php //For Product Layout

$product = new Cuztom_Post_Type('product');

$product->add_meta_box(
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
                'show_option_none'   => '-- Select Article --'
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
                'show_option_none'   => '-- Select Brochure --'
        	),
            'repeatable'    =>  'true'
    	)
    )
);

$product->add_meta_box(
    'intro',
    'Intro Blurb', 
    array(
        array(
            'name'          => 'intro',
            'label'         => 'Introduction',
            'description'   => 'Text that will be on top of main content.',
            'type'          => 'wysiwyg',
        )
    )
);

$product->add_meta_box(
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
                'show_option_none'   => '-- Select Brochure --'
            ),
            'repeatable'    =>  'true'
        )
    )
);

$product->add_meta_box(
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



$product->add_meta_box(
    'timeline_block',
    'Timeline', 
    array(
        'bundle',    
            array( 
                array(
                    'name'          => 'heading',
                    'label'         => 'Heading',
                    'description'   => '(optional)',
                    'type'          => 'text',          
                ),
                array(
                    'name'          => 'content',
                    'label'         => 'Content',
                    'description'   => '',
                    'type'          => 'wysiwyg',          
                )
            )
    )
);

$product->add_meta_box(
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


$product->add_meta_box(
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
                'show_option_none'   => '-- Select Article --'
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
                'show_option_none'   => '-- Select Brochure --'
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
                'cat'       =>  7,
                'show_option_none'   => '-- Select Related --'
            ),
            'repeatable'    =>  'true'
        )
    )
);

$product->add_meta_box(
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

$product->add_meta_box(
    'product_tabs',
    'Product Tabs', 
    array(
        array(
            'name'          => 'activate',
            'label'         => 'Show Specifications Section?',
            'type'          => 'checkbox',  
        ),
        array(
            'name'          => 'whats_in_the_box',
            'label'         => 'What\'s In The Box',
            'type'          => 'wysiwyg',  
        ),
        array(
            'name'          => 'system_consists_of',
            'label'         => 'System Consists Of',
            'type'          => 'text',
            'repeatable'    =>  'true'
        ),
        array(
            'name'          => 'post_meta_integrations',
            'label'         => 'Integrations',
            'description'   => 'Select your related integrations here',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'post',
                'cat'       => 11,
                'show_option_none'   => '-- Select Integrations --'
            ),
            'repeatable'    =>  'true'
        ),
        array(
            'name'          => 'plays_well_with',
            'label'         => 'Plays Well With',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'post',
                'cat'       =>  7,
                'show_option_none'   => '-- Select Products --'
            ),
            'repeatable'    =>  'true'
        ),
        array(
            'name'          => 'system_at_a_glance',
            'label'         => 'System at a Glance',
            'description'   => 'Select Drawings',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'drawing',
                'show_option_none'   => '-- Select Drawing --'
            ),
            'repeatable'    =>  'true'
        ),
        array(
            'name'          => 'saag_layout',
            'label'         => 'Tech Drawing Layout',
            'description'   => 'for System at a Glance',
            'type'          => 'select',
            'options'       => array(
                        'value1'    => 'Default',
                        'value2'    => 'Vertical',
                        'value3'    => 'Custom 1',
                        'value4'    => 'Custom 2'
                    ),
            'default_value' => 'value1'
        ),
       array(
            'name'          => 'system_at_a_glance_PDF',
            'label'         => 'File',
            'description'   => 'System at a Glance',
            'type'          => 'file',
        )

    )
);

$product->add_meta_box( 
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
        )
    )
);

$product->add_meta_box(
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
        )
    )
);

$product->add_meta_box(
    'partners',
    'Integration Partners', 
    array(
        'bundle', 
        array(
            array(
                'name'          => 'partner',
                'label'         => 'Partner',
                'description'   => '',
                'type'          => 'text'
            ),
            array(
                'name'          => 'logo',
                'label'         => 'Logo',
                'description'   => '',
                'type'          => 'image',
            ),
            array(
                'name'          => 'models',
                'label'         => 'Models',
                'description'   => '',
                'type'          => 'textarea'
            ),
            array(
                'name'          => 'website',
                'label'         => 'Website',
                'description'   => 'Ex. partnersite.com <span style="color:red;">(do not add http:// or www)</span>',
                'type'          => 'text'
            ),
            array(
                'name'          => 'case',
                'label'         => 'Case Study Link',
                'description'   => '',
                'type'          => 'text'
            )
        )
    )
);

$product->add_meta_box(
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

$product->add_meta_box(
    'repeat',
    'Repeatables (Optional)', 
    array(
        'bundle', 
        array(
            array(
                'name'          => 'label',
                'label'         => 'Label',
                'description'   => '',
                'type'          => 'text'
            ),
            array(
                'name'          => 'image',
                'label'         => 'Image',
                'description'   => '',
                'type'          => 'image',
            ),
            array(
                'name'          => 'descript',
                'label'         => 'Description',
                'description'   => '',
                'type'          => 'textarea'
            ),
            array(
                'name'          => 'website',
                'label'         => 'Website',
                'description'   => 'Ex. partnersite.com <span style="color:red;">(do not add http:// or www)</span>',
                'type'          => 'text'
            )
        )
    )
);

?>