<?php 
    // Custom meta values 
	$postID=get_the_ID();
    $metaWhatsInTheBox = get_post_meta($postID, '_product_tabs_whats_in_the_box', true);
    $metaAdditionalOptions = get_post_meta($postID, '_additional_options', true);
    $metaIntegrations = get_post_meta($postID, '_product_tabs_post_meta_integrations', true);
    $metaPlaysWellWith = get_post_meta($postID, '_product_tabs_plays_well_with', true);
    $metaSystemAtAGlance = get_post_meta($postID, '_product_tabs_system_at_a_glance', true);

    if($metaWhatsInTheBox || (isset($metaAdditionalOptions[0]['_title']) && ($metaAdditionalOptions[0]['_title'] !== '')) || ($metaIntegrations[0] != 0) || ($metaSystemAtAGlance != -1)) {
?>



<section id="responsive-tabs" class="tabs boxes">
		<div class="box-title"><h2>Specifications</h2></div>
        <ul>
            <?php if($metaSystemAtAGlance != -1)  { ?>
            <li>
                <a href="#systemataglance"><span>System At a Glance</span></a>
            </li>     
            <?php } ?>
             <?php if($metaWhatsInTheBox)  { ?>
            <li>
                <a href="#whatsinthebox"><span>What's In The Box</span></a>
            </li>
            <?php } ?>
             <?php if(isset($metaAdditionalOptions[0]['_title']) && ($metaAdditionalOptions[0]['_title'] !== ''))  { ?>
            <li>
                <a href="#additionaloptions"><span>Additional Options</span></a>
            </li>
            <?php } ?>

            <?php if($metaIntegrations[0] != 0)  { ?>
             <li>
                <a href="#integrations"><span>Integrations</span></a>
            </li>
            <?php } ?>
              
        </ul>
		<!-- Start System at a Glance -->	
		<?php if($metaSystemAtAGlance != -1)  { ?>
			<div id="systemataglance">
				<?php get_template_part( 'template', 'brochureFileOptions' ); ?>
				<h3>The <?php the_title() ?> comes with:</h3>
				
				<div class="drawing-images">
				<?php 
					echo "<ul>";
					foreach($metaSystemAtAGlance as $drawing) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $drawing ), 'single-post-thumbnail' ); 	
						$drawingImage="";
						if($image!='') {
							$drawingImage=$image[0];	
						}
						$drawingLink=get_permalink($drawing);
						$weight=get_post_meta($drawing,'_measurements_weight',true);
							echo '<li>';
								if($drawingImage!='') {
									echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
								}
								echo "<p>".get_the_title($drawing)."</p>";
								echo "<p>".$weight."</p>";
								
							echo '</li>';
					}
					echo "</ul>";
				?>
				</div>
				<div class="drawing-content">
					<div class="drawing-content-box">
						<?php
							if($metaAdditionalOptions) {
								echo "<ul>";
								echo '<li>Additional Options</li>';		
								foreach ( $metaAdditionalOptions as $option ) {
									echo "<li>".$option['_title']."</li>";
								}
								echo "</ul>";
							}
						?>
					</div>
					<div class="drawing-content-box">
						<?php
							if($metaIntegrations) {
								$args = array(
									'post__in'    =>     $metaIntegrations
								);	
								$related_posts = get_posts($args);
								echo "<ul>";
									echo '<li>Integrates With</li>';		
									foreach ( $related_posts as $post ) { 
										$metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
										echo '<li><a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></li>';
									}
								echo "</ul>";								
								wp_reset_postdata();
							}
						?>
					</div>
					<div class="drawing-content-box">
						<?php
							if($metaPlaysWellWith) {
								$args = array(
									'post__in'    => $metaPlaysWellWith
								);	
								$related_posts = get_posts($args);
								echo "<ul>";
									echo '<li>Plays Well With</li>';		
									foreach ( $related_posts as $post ) { 
										$metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
										echo '<li><a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></li>';
									}
								echo "</ul>";								
								wp_reset_postdata();
							}
						?>
					</div>
				</div>
				
			</div>     
		<?php } ?>
		<!-- End System at a Glance -->
		<!-- Start What's in the Box -->
		 <?php if($metaWhatsInTheBox)  { ?>
		<div id="whatsinthebox"><?php echo $metaWhatsInTheBox; ?> </div>
		<?php } ?>
		<!-- End What's in the Box -->
		<!-- Start Additional Options -->
		<?php if(isset($metaAdditionalOptions[0]['_title']) && ($metaAdditionalOptions[0]['_title'] !== '')) { ?>
			<div id="additionaloptions">
				<?php foreach ( $metaAdditionalOptions as $option ) { ?>
					<section>
						<h3 id="<?php sanitize_title($option['_title']); ?>"><?php echo $option['_title']; ?></h3>
						<p><?php echo $option['_description']; ?></p>
					</section>
                <!-- End Loop -->
                <?php } ?>
			</div>
		<?php } ?>
		<!-- End Additional Options -->
		<!-- Start Integrations -->
		<?php if($metaIntegrations[0] != 0)	{ ?>
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
		<?php } ?>
		<!-- End Integrations -->
</section>
 <?php } ?>

