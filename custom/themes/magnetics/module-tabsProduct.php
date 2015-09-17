<?php 
    // Custom meta values 
	$postID=get_the_ID();
    $metaWhatsInTheBox = get_post_meta($postID, '_product_tabs_whats_in_the_box', true);
    $metaAdditionalOptions = get_post_meta($postID, '_additional_options', true);
    $metaIntegrations = get_post_meta($postID, '_product_tabs_post_meta_integrations', true);
    $metaPlaysWellWith = get_post_meta($postID, '_product_tabs_plays_well_with', true);
    $metaSystemAtAGlance = get_post_meta($postID, '_product_tabs_system_at_a_glance', true);

    if($metaWhatsInTheBox || (isset($metaAdditionalOptions[0]['_title']) && ($metaAdditionalOptions[0]['_title'] !== '')) || ($metaIntegrations[0] != 0) || ($metaSystemAtAGlance[0] != 0)) {
?>



<section class="tabs boxes">
    <h2>Specifications</h2>

        <ul class="resp-tabs-list">
            <?php if($metaSystemAtAGlance[0] != 0)  { ?>
            <li aria-controls="systemataglance">
                <span>System At a Glance</span>
            </li>     
            <?php } ?>
             <?php if($metaWhatsInTheBox)  { ?>
            <li aria-controls="whatsinthebox">
                <span>What's In The Box</span>  
            </li>
            <?php } ?>
             <?php if(isset($metaAdditionalOptions[0]['_title']) && ($metaAdditionalOptions[0]['_title'] !== ''))  { ?>
            <li aria-controls="additionaloptions">
                <span>Additional Options</span>
            </li>
            <?php } ?>

            <?php if($metaIntegrations[0] != 0)  { ?>
             <li aria-controls="integrations">
                <span>Integrations</span>
            </li>
            <?php } ?>
              
        </ul>

        <br style="clear:both" />

        <div class="resp-tabs-container">
			<!-- Start System At a Glance -->
			<?php if($metaSystemAtAGlance[0] != 0) { ?>
				<div id="systemataglance">
					<?php get_template_part( 'template', 'brochureFileOptions' ); ?>
					<h3>The <?php the_title() ?> comes with:</h3>
					<section class="images">
						<?php 
						 if($metaSystemAtAGlance) {
								foreach($metaSystemAtAGlance as $image) { ?>
								<?php 
									//print_r($image);
									if ($image) {
										$src=wp_get_attachment_image_src($image,'full');
										echo "<div class='gimages'>";
											echo "<img src='".$src[0]."'>";
										echo "</div>";
										//echo wp_get_attachment_image($image, 'full', 'class=item');
									}
								?>
						<?php 	}
						 }
						?>
                </section>
                 <footer>
                    <ul>
                    <li>Additional Options</li>
                    <?php
                        if($metaAdditionalOptions) {
              
                        foreach ( $metaAdditionalOptions as $option ) { ?>
						<li><?php echo $option['_title']; ?></li>
            <!-- End Loop -->
            <?php }

                } 
            ?>
        
                    </ul>

                    <ul>
                    <li>Integrates With</li>
         <?php
                if($metaIntegrations) {
                    $args = array(
                        'post__in'    =>     $metaIntegrations
                    );
                } 

            $related_posts = get_posts($args);

             foreach ( $related_posts as $post ) { 

                $metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
         
                ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <!-- End Loop -->
            <?php }
            wp_reset_postdata();?>
                    </ul>

                <ul>
                <li>Plays Well With</li>
                 <?php
                if($metaPlaysWellWith) {
                    $args = array(
                        'post__in'    =>     $metaPlaysWellWith
                    );
                } 

            $related_posts = get_posts($args);

             foreach ( $related_posts as $post ) { 
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <!-- End Loop -->
            <?php }
            wp_reset_postdata();?>


           
                        </ul>
                    </footer>
                
                <br style="clear:both" />
            </div>

            <?php } ?>
			<!-- End System At a Glance -->
             <?php
                if($metaWhatsInTheBox) { ?>
                <div id="whatsinthebox" aria-controls="whatsinthebox">
                        <?php echo $metaWhatsInTheBox; ?>  
                </div>
            <?php } ?>
            <!-- end #metawhatsinthebox -->

            <?php
           if(isset($metaAdditionalOptions[0]['_title']) && ($metaAdditionalOptions[0]['_title'] !== ''))  { ?>
           <div id="additionaloptions" aria-controls="additionaloptions">
                    
                <?php foreach ( $metaAdditionalOptions as $option ) { ?>
                <h3 id="<?php sanitize_title($option['_title']); ?>"><?php echo $option['_title']; ?></h3>
                <p><?php echo $option['_description']; ?></p>
                <!-- End Loop -->
                <?php } ?>

            </div>

           <?php  } ?>
           <!-- end #additionaloptions -->


            <?php if($metaIntegrations[0] != 0)  { ?>
            <div id="integrations" aria-controls="integrations"> 
            <?php

            if($metaIntegrations) {
                $args = array(
                    'post__in'    =>  $metaIntegrations
                );

            $related_posts = get_posts($args);

             foreach ( $related_posts as $post ) { 

                $metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
         
                ?>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                <p><?php echo $metaBannerSubheading; ?></p>
            <!-- End Loop -->
            <?php }
            }
            wp_reset_postdata();?>

            <br style="clear:both" />


            </div>
            <?php } ?>
            <!-- end integrations -->
        </div>
</section>

 <?php } ?>

