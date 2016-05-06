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

	        <div>
	        	<h3><?php echo $name; ?></h3>
	        	<?php echo wp_get_attachment_image($logo); ?>
	        	<p><?php echo $models; ?></p>
	        	<p><?php echo $site; ?></p>
	        	<p><?php echo $case; ?></p>
	        </div> 

			<?php 
					} 
			?>

	</section>
<?php } ?>

<?php  
    } 
?>


  