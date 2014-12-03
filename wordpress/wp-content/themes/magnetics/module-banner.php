<section class="banner">

	<?php 

	// Video Background
	$bannerVideoURL = false;

	// Custom meta values 
	$metaBannerVideoDefault = get_post_meta($post->ID, '_banner_default_video', true);
	$metaBannerVideo = 	get_post_meta($post->ID, '_banner_video', true);

	// Have they added a video?
 	if($metaBannerVideoDefault != -1) {
 		$bannerVideoURL = get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4';
 	} else if ($metaBannerVideo != -1) {
 		$bannerVideoURL = $metaBannerVideo;
 	} else {

 	}

 	if ($bannerVideoURL !== false) { ?>

 	<video autoplay loop id="bgvid">
		<source src="<?php echo $bannerVideoURL; ?>" type="video/mp4">
	</video>

	<div class="mobile-bg"></div>

	 <?php	} 

	 // Banner Image
	$bannerImageURL = false;
	
	// Custom meta values 
	$metaBannerImageID = get_post_meta($post->ID, '_banner_image', true);

 	if ($metaBannerImageID  !== -1) { 
		$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
		$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];

		?>
	<img src="<?php echo $metaBannerImageAttachmentURL; ?>">
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