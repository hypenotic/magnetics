<?php 
 $metaSystemAtAGlance = get_post_meta($post->ID, '_product_tabs_system_at_a_glance', true);
 $systemConsistsOf = get_post_meta($post->ID, '_product_tabs_system_consists_of', true);
 $additionalOptions = get_post_meta($post->ID, '_product_tabs_additional_components', true);
 $productOptions = get_post_meta($post->ID, '_product_tabs_product_options', true);
 $layout = get_post_meta($post->ID, '_product_tabs_saag_layout', true);
if($metaSystemAtAGlance !== -1)  { 

	$title = get_the_title();
	$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
	$lowercase = strtolower($prehash);
	$hash = $lowercase;	

?>
	<div id="systemataglance" class="saag-<?php echo $post->ID;?>">
		<?php if (!in_category('product-integrations') || !is_single(243)) { ?>
			<?php get_template_part( 'template', 'brochureFileOptions' ); ?>
			<h3>The <?php if (is_single(243)) { ?>
			neutrally buoyant Explorer AUV Mag
		<?php } else { ?>
			<?php the_title(); ?>
		<?php } ?> comes with:</h3>
		<?php } ?>
			
		
		
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
					<?php echo "<p class='mb20'>".$Ldisplay."</p>";?>
					<img src="<?php echo $LdrawingImage; ?>" alt="">
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
						$weight2=get_post_meta($drawing,'_measurements_weight_two',true);
						$size=get_post_meta($drawing,'_measurements_size',true);
					    echo '<li class="drawing--six">';
					    	echo "<p>".$name."</p>";
					    	if($drawingImage!='') {
					    		echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
					    	}
					    	echo "<p>".$weight."</p>";
					    	if($weight2!='') {
					    		echo "<p>".$weight2."</p>";
					    	}
					    echo '</li>';
					} ?>
				</ul>
			</div>
		<?php } else if ($layout == 'value3') { 

				$Limage = wp_get_attachment_image_src( get_post_thumbnail_id( $metaSystemAtAGlance[0] ), 'single-post-thumbnail' ); 	
				$LdrawingImage="";
				if($Limage!='') {
					$LdrawingImage=$Limage[0];	
				}
				$LdrawingLink=get_permalink($metaSystemAtAGlance[0]);
				$Lweight=get_post_meta($metaSystemAtAGlance[0],'_measurements_weight',true);
				$Ldisplay=get_post_meta($metaSystemAtAGlance[0],'_measurements_name',true);
				$Lsize=get_post_meta($metaSystemAtAGlance[0],'_measurements_size',true);
				// print_r($metaSystemAtAGlance);
			?>
				<div id="vertical-layout" class="genesis-layout">
					<div class="vertical-layout__left">
						<?php echo "<p class='mb20'>".$Ldisplay."</p>";?>
						<img src="<?php echo $LdrawingImage; ?>" alt="">
						<p><?php echo $Lweight; ?></p>
					</div>
					<ul id="drawing__list" class="vertical-layout__right">
						<?php foreach(array_slice($metaSystemAtAGlance,1,2) as $drawing)
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
							$weight2=get_post_meta($drawing,'_measurements_weight_two',true);
							$size=get_post_meta($drawing,'_measurements_size',true);
						    echo '<li class="drawing--six">';
						    	echo "<p>".$name."</p>";
						    	if($drawingImage!='') {
						    		echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
						    	}
						    	echo "<p>".$weight."</p>";
						    	if($weight2!='') {
						    		echo "<p>".$weight2."</p>";
						    	}
						    echo '</li>';
						} ?>
					</ul>
					<ul id="genesis-drawing-list" class="vertical-layout__bottom">
						<?php foreach(array_slice($metaSystemAtAGlance,-3) as $drawing)
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
							$weight2=get_post_meta($drawing,'_measurements_weight_two',true);
							$weight3=get_post_meta($drawing,'_measurements_weight_three',true);
							$weight4=get_post_meta($drawing,'_measurements_weight_four',true);
							$size=get_post_meta($drawing,'_measurements_size',true);
						    echo '<li class="drawing--three">';
						    	echo "<p>".$name."</p>";
						    	if($drawingImage!='') {
						    		echo '<div class="image"><img src="'.$drawingImage.'" /></div>';
						    	}
						    	echo "<p>".$weight."</p>";
						    	if($weight2!='') {
						    		echo "<p>".$weight2."</p>";
						    	}
						    	if($weight3!='') {
						    		echo "<p>".$weight3."</p>";
						    	}
						    	if($weight4!='') {
						    		echo "<p>".$weight4."</p>";
						    	}
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
		<?php if ($metaSystemAtAGlance) { ?>
		<div class="drawing-content">
			<?php if($systemConsistsOf) { ?>
			<div class="drawing-content-box content-box__system-consists-of">
				<h4><?php the_title();?> Includes</h4>
				<div class="drawing-content-box__list"><?php echo $systemConsistsOf; ?></div>
			</div>
			<?php } ?>

			<?php if($additionalOptions) { ?>
			<div class="drawing-content-box content-box__add-options">
				<h4>Additional Components</h4>
				<div class="drawing-content-box__list"><?php echo $additionalOptions; ?></div>
			</div>
			<?php } ?>

			<?php if($productOptions) { ?>
			<div class="drawing-content-box content-box__options">
				<h4>Options</h4>
				<div class="drawing-content-box__list"><?php echo $productOptions; ?></div>
			</div>
			<?php } ?>
		</div>
		<?php } else { ?>
		<div class="drawing-content drawing-content-full">
			<?php if($systemConsistsOf) { ?>
			<div class="drawing-content-box content-box__system-consists-of">
				<h4><?php the_title();?> Includes</h4>
				<div class="drawing-content-box__list"><?php echo $systemConsistsOf; ?></div>
			</div>
			<?php } ?>

			<?php if($additionalOptions) { ?>
			<div class="drawing-content-box content-box__add-options">
				<h4>Additional Components</h4>
				<div class="drawing-content-box__list"><?php echo $additionalOptions; ?></div>
			</div>
			<?php } ?>

			<?php if($productOptions) { ?>
			<div class="drawing-content-box content-box__options">
				<h4>Options</h4>
				<div class="drawing-content-box__list"><?php echo $productOptions; ?></div>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
		
	</div>     
<?php } ?>