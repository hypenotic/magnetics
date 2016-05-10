<?php

	/**
	* Shows Integration Partners if available
	* @author Emily Dela Cruz
	*/
	
    $partners = get_post_meta($post->ID,'_partners',true);

    if(count($partners) > 0) {
?>

<?php if($partners) { ?>
	<section id="integration-partners">
		<h2>Integration Partners</h2>
			<div class="ip-container">
	        <!-- For loop cycle through Array -->
	        <?php
	            foreach($partners as $partner) {
	            // Get custom meta values    
	            $name  		= $partner['_partner'];
	            $logo  		= $partner['_logo'];
	            $models  	= $partner['_models'];
	            $site  		= $partner['_website'];
	            $case  		= $partner['_case'];

	        ?>     

	        
	        	<div class="ip__single">
	        		<div class="ip__logo">
	        			<?php echo wp_get_attachment_image($logo, 'full'); ?>
	        		</div>
	        		<div class="ip__deats">
	        			<h3><?php echo $name; ?></h3>
	        			<p><?php echo $models; ?></p>
	        			<a href="http://<?php echo $site; ?>" target="_blank"><?php echo $site; ?></a><br/>
	        			<?php if ($case) { ?>
							<a href="<?php echo $case; ?>">View case study</a>
	        			<?php } ?>
	        		</div>
	        	</div>

			<?php 
					} 
			?>
			</div> 
	</section>
<?php } ?>

<?php  
    } 
?>


  