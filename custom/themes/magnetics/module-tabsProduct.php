<?php 
    // Custom meta values 
	$postID=get_the_ID();
	$activateSpecs = get_post_meta($postID, '_product_tabs_activate', true);
    $metaWhatsInTheBox = get_post_meta($postID, '_product_tabs_whats_in_the_box', true);
    $metaAdditionalOptions = get_post_meta($postID, '_additional_options', true);
    $metaIntegrations = get_post_meta($postID, '_product_tabs_post_meta_integrations', true);
    $metaPlaysWellWith = get_post_meta($postID, '_product_tabs_plays_well_with', true);
    $metaSystemAtAGlance = get_post_meta($postID, '_product_tabs_system_at_a_glance', true);

    $layout = get_post_meta($postID, '_product_tabs_saag_layout', true);

   
    if (empty($metaWhatsInTheBox)) {
    	$tab1 = 0;
    } else {
    	$tab1 = 1;
    }

    // print_r($metaWhatsInTheBox);
    // print_r($metaAdditionalOptions);
    // print_r($metaIntegrations);
    // print_r($metaPlaysWellWith);
    // print_r($metaSystemAtAGlance);

    // if($metaWhatsInTheBox || (isset($metaAdditionalOptions[0]['_title']) && ($metaAdditionalOptions[0]['_title'] !== '')) || ($metaIntegrations[0] != 0) || ($metaSystemAtAGlance != -1)) 

    if ($activateSpecs == 'on') {
?>

	<section class="title-holder">
		<div class="specs">
			<h2>Specifications</h2>
		</div>


	</section>
	<section id="responsive-tabs" class="tabs boxes">
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
		<?php if($metaSystemAtAGlance != -1)  { 

			$title = get_the_title();
			$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
			$lowercase = strtolower($prehash);
			$hash = $lowercase;	

		?>
			<div id="systemataglance">
				<?php get_template_part( 'template', 'brochureFileOptions' ); ?>
				<h3>The <?php the_title() ?> comes with:</h3>
				
				<div class="drawing-images" id="<?php echo $hash; ?>-tabs">
				<?php if($layout == 'value2')  { 
					$Limage = wp_get_attachment_image_src( get_post_thumbnail_id( $metaSystemAtAGlance[0] ), 'single-post-thumbnail' ); 	
					$LdrawingImage="";
					if($Limage!='') {
						$LdrawingImage=$Limage[0];	
					}
					$LdrawingLink=get_permalink($metaSystemAtAGlance[0]);
					$Lweight=get_post_meta($metaSystemAtAGlance[0],'_measurements_weight',true);
					$Ldisplay=get_post_meta($metaSystemAtAGlance[0],'_measurements_name',true);
					$Lsize=get_post_meta($metaSystemAtAGlance[0],'_measurements_size',true);
				?>
					<div id="vertical-layout">
						<div class="vertical-layout__left">
							<img src="<?php echo $LdrawingImage;  ?>" alt="">
							<p><?php echo $Ldisplay; ?></p>
							<p><?php echo $Lweight; ?></p>
						</div>
						<ul id="drawing__list" class="vertical-layout__right">
							<?php foreach(array_slice($metaSystemAtAGlance,1) as $drawing)
							{
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $drawing ), 'single-post-thumbnail' ); 	
								$drawingImage="";
								if($image!='') {
									$drawingImage=$image[0];	
								}
								$drawingLink=get_permalink($drawing);
								$name=get_post_meta($drawing,'_measurements_name',true);
								$name_two=get_post_meta($drawing,'_measurements_name_two',true);
								$weight=get_post_meta($drawing,'_measurements_weight',true);
								$size=get_post_meta($drawing,'_measurements_size',true);
							    echo '<li class="drawing--six">';
							    	if($drawingImage!='') {
							    		echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
							    	}
							    	echo "<p>".$name."</p>";
							    	echo "<p>".$weight."</p>";
							    	
							    echo '</li>';
							} ?>
						</ul>
					</div>
				<?php } else {
					echo '<ul id="drawing__list">';
					foreach($metaSystemAtAGlance as $drawing) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $drawing ), 'single-post-thumbnail' ); 	
						$drawingImage="";
						if($image!='') {
							$drawingImage=$image[0];	
						}
						$drawingLink=get_permalink($drawing);
						$name=get_post_meta($drawing,'_measurements_name',true);
						$name_two=get_post_meta($drawing,'_measurements_name_two',true);
						$weight=get_post_meta($drawing,'_measurements_weight',true);
						$weight2=get_post_meta($drawing,'_measurements_weight_two',true);
						$size=get_post_meta($drawing,'_measurements_size',true);
						$img_one = get_post_meta($drawing,'_measurements_image_one',true);
						$img_one_url = wp_get_attachment_url( $img_one );
						$img_two = get_post_meta($drawing,'_measurements_image_two',true);
						$img_two_url = wp_get_attachment_url( $img_two );
							if ($size == 'value1') {
								echo '<li class="drawing--twelve">';
									echo "<p class='mb20'>".$name."</p>";
									if($drawingImage!='') {
										echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									if($weight2!='') {
										echo "<p>".$weight2."</p>";
									}
								echo '</li>';
							} else if ($size == 'value2') {
								echo '<li class="drawing--nine">';
									echo "<p class='mb20'>".$name."</p>";
									if($drawingImage!='') {
										echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									if($weight2!='') {
										echo "<p>".$weight2."</p>";
									}
								echo '</li>';
							} else if ($size == 'value3') {
								echo '<li class="drawing--eight">';
									echo "<p class='mb20'>".$name."</p>";
									if($drawingImage!='') {
										echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									if($weight2!='') {
										echo "<p>".$weight2."</p>";
									}
								echo '</li>';
							} else if ($size == 'value4') {
								echo '<li class="drawing--six">';
									echo "<p class='mb20'>".$name."</p>";
									if($drawingImage!='') {
										echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									if($weight2!='') {
										echo "<p>".$weight2."</p>";
									}
								echo '</li>';
							} else if ($size == 'value5') {
								echo '<li class="drawing--three">';
									echo "<p class='mb20'>".$name."</p>";
									if($drawingImage!='') {
										echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									if($weight2!='') {
										echo "<p>".$weight2."</p>";
									}
								echo '</li>';
							} else if ($size == 'value7') {
								//This is that special power supply box
								echo '<li class="drawing--special">';
									echo "<div>";

									echo "<div>";
									echo "<p class='mb20'>".$name."</p>";
									if($img_one_url) {
										echo '<div class="image"><img src="'.$img_one_url.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									echo "</div>";

									echo "<div>";
									echo "<p class='mb20'>".$name_two."</p>";
									if($img_two_url) {
										echo '<div class="image"><img src="'.$img_two_url.'" /></div>';
									}
									echo "<p class='mt20'>".$weight2."</p>";
									echo "</div>";

									echo "</div>";
									echo "<p class='power-supply-details'><strong>*</strong> <em>Use either the power supply or battery clip cable. Only one is included.</em></p>";
								echo '</li>';
							} else if ($size == 'value8') {
								echo '<li class="drawing--five">';
									echo "<p class='mb20'>".$name."</p>";
									if($drawingImage!='') {
										echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									if($weight2!='') {
										echo "<p>".$weight2."</p>";
									}
								echo '</li>';
							} else {
								echo '<li class="drawing--default">';
									echo "<p class='mb20'>".$name."</p>";
									if($drawingImage!='') {
										echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
									}
									echo "<p class='mt20'>".$weight."</p>";
									if($weight2!='') {
										echo "<p>".$weight2."</p>";
									}
								echo '</li>';
							}
					}
					echo "</ul>";
				} ?>
				</div>
				<div class="drawing-content">
					<div class="drawing-content-box">
						<?php
							if($metaAdditionalOptions[0][_title] !== '') {
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
							if($metaIntegrations[0] !== '0') {
								$args = array(
									'post__in'    =>     $metaIntegrations,
									'orderby' => 'post__in'
								);	
								$related_posts = get_posts($args);
								echo "<ul>";
									echo '<li>Compatible With</li>';		
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
							if($metaPlaysWellWith[0] !== '0') {
								$args = array(
									'post__in'    => $metaPlaysWellWith,
									'orderby'	  => 'post__in'
								);	
								$related_posts = get_posts($args);
								echo "<ul>";
									echo '<li>Compatible With</li>';		
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

