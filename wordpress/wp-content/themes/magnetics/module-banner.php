<section class="banner">

	<?php 

	// Video Background
	$bannerVideoURL = false;

	// Custom meta values 
	$metaBannerVideo = get_post_meta($post->ID, '_banner_video', true);
	$metaBannerBackgroundImageID = get_post_meta($post->ID, '_banner_background_image', true);

	$metaBannerBackgroundImageAttachment = wp_get_attachment_image_src( $metaBannerBackgroundImageID, 'full' );
	$metaBannerBackgroundImageAttachmentURL = $metaBannerBackgroundImageAttachment[0];

	// Have they added a video?
 	if(!$metaBannerBackgroundImageID ) {
 	?>

 	<script>
 		jQuery(document).ready(function($){

 			$('.menu-btn').addClass('dark');

 		});
 	</script>

 	<div class="background">
	 	<video autoplay loop>
			<source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
		</video>
	</div>

	<div class="mobile-bg"></div>

	 <?php	}  else { ?>
 	<div class="background">
		<img src="<?php echo $metaBannerBackgroundImageAttachmentURL; ?>" />
	</div>
	<?php }

	 // Banner Image
	$bannerImageURL = false;
	
	// Custom meta values 
	$metaBannerImageIDs = get_post_meta($post->ID, '_banner_image', true);

	if ($metaBannerImageIDs  == -1) { ?>


	<? } elseif (sizeof($metaBannerImageIDs) == 1) {

 
		$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageIDs[0], 'full' );
		$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];

		?>
	<img src="<?php echo $metaBannerImageAttachmentURL; ?>">
	
	<?php } elseif (sizeof($metaBannerImageIDs) > 1) { ?>


	<section class="owl-carousel owl-theme">

		<?php foreach($metaBannerImageIDs as $metaBannerImageID ) { ?>

		<div class="item">

			<?php $metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
					$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];

			?>
			<img src="<?php echo $metaBannerImageAttachmentURL; ?>">
	   
		</div>

		<? } ?>
		</section>
	<?php } ?>



	<?php  
	// Banner Heading
	// Custom meta values 
	$metaBannerHeading = get_post_meta($post->ID, '_banner_heading', true);
	
	if($metaBannerHeading  !== -1) { ?>
	<h3><?php echo $metaBannerHeading; ?></h3>
	<?php } ?>


	<?php 
	// Banner Subheading
	// Custom meta values 
	$metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);

	if($metaBannerSubheading !== -1) { ?>
	<p><?php echo $metaBannerSubheading; ?></p>
	<?php } ?>

</section>