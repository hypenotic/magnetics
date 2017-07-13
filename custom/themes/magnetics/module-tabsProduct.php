<?php 
    // Custom meta values 
	$postID=get_the_ID();
	$activateSpecs = get_post_meta($postID, '_product_tabs_activate', true);
    $metaWhatsInTheBox = get_post_meta($postID, '_product_tabs_whats_in_the_box', true);
    $metaAdditionalOptions = get_post_meta($postID, '_additional_options', true);
    $metaIntegrations = get_post_meta($postID, '_product_tabs_post_meta_integrations', true);
    $metaPlaysWellWith = get_post_meta($postID, '_product_tabs_plays_well_with', true);
    $metaSystemAtAGlance = get_post_meta($postID, '_product_tabs_system_at_a_glance', true);

    $specsOptions = get_post_meta($postID, '_specs_options_specs_content', true);

    $systemConsistsOf = get_post_meta($postID, '_product_tabs_system_consists_of', true);
    $additionalOptions = get_post_meta($postID, '_product_tabs_additional_components', true);
    $productOptions = get_post_meta($postID, '_product_tabs_product_options', true);

    $postBrochures = get_post_meta($postID, '_related_content_post_brochure', true);

	$relatedProducts = get_post_meta($postID, '_product_tabs_related_products', true);



    $layout = get_post_meta($postID, '_product_tabs_saag_layout', true);

    if (empty($metaWhatsInTheBox)) {
    	$tab1 = 0;
    } else {
    	$tab1 = 1;
    }

    if ($activateSpecs == 'on') {
?>
	<section id="responsive-tabs" class="tabs boxes">
        <ul>
            <?php if($metaSystemAtAGlance != -1)  { ?>
            <li>
                <a href="#systemataglance"><span>System At a Glance</span></a>
            </li>     
            <?php } ?>

            <?php if($specsOptions)  { ?>
            <li>
                <a href="#specs"><span>Specs</span></a>
            </li>
            <?php } ?>

            <?php if($metaIntegrations !== '')  { 
            	// print_r($metaIntegrations);
            	?>
             <li>
                <a href="#integrations"><span>Integrations</span></a>
            </li>
            <?php } ?>

            <li>
                <a href="#brochuresandarticles"><span>Brochures &amp; Articles</span></a>
            </li>
              
        </ul>
        <!-- Start System at a Glance -->	
		<?php get_template_part( 'module', 'sysAtAGlance' ); ?>
		<!-- End System at a Glance -->
		<!-- Start Brochures & Articles -->
		<?php if($postBrochures)  { ?>
		<div id="brochuresandarticles">
			<?php get_template_part( 'module', 'postsRelated' ); ?>
		</div>
		<?php } ?>
		<!-- End Brochures & Articles -->
		<!-- Start Additional Options -->
		<?php if($specsOptions) { ?>
		<div id="specs">
			<section>
				<div id="specs-wrapper">
					<?php echo $specsOptions; ?>	
				</div>
			</section>
		</div>
		<?php } else { ?>

		<?php } ?>
		<!-- End Additional Options -->
		<!-- Start Integrations -->
		<?php if($metaIntegrations !== '' && !in_category('product-integrations'))	{ ?>
		 <div id="integrations">
			<?php

            if($metaIntegrations) {
                $args = array(
                    'post__in'    =>  $metaIntegrations
                );

            $related_posts = get_posts($args);

	            foreach ( $related_posts as $post ) { 

	                $metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
	         
	                ?>
					<section>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
						<p><?php echo $metaBannerSubheading; ?></p>
					</section>	
	            <!-- End Loop -->
	            <?php }
            }
            wp_reset_postdata();?>

            <br style="clear:both" />
		 
		 </div>
		<?php } else if (in_category('product-integrations')) { ?>
		<div id="integrations">
			<?php

            if($relatedProducts) {
                $args = array(
                    'post__in'    =>  $relatedProducts
                );

            $related_posts = get_posts($args);

	            foreach ( $related_posts as $post ) { 

	                $metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
	         
	                ?>
					<section>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
						<p><?php echo $metaBannerSubheading; ?></p>
					</section>	
	            <!-- End Loop -->
	            <?php }
            }
            wp_reset_postdata();?>

            <br style="clear:both" />
		 
		 </div>
		<?php } else {} ?>
		<!-- End Integrations -->
</section>
 <?php } ?>

