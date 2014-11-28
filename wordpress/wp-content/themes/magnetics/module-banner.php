<section class="banner">

	<?php 

	// Video Background
	$bannerVideoURL = false;

	$metaBannerVideoDefault = get_post_meta($post->ID, '_banner_default_video', true);
	$metaBannerVideo = 	get_post_meta($post->ID, '_banner_video', true);

	// Have they added a video?
 	if($metaBannerVideoDefault) {
 		$bannerVideoURL = get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4';
 	} else if ($metaBannerVideo) {
 		$bannerVideoURL = $metaBannerVideo;
 	}

 	if ($bannerVideoURL) { ?>

 	<video autoplay loop id="bgvid">
		<source src="<?php echo $bannerVideoURL; ?>" type="video/mp4">
	</video>

	<div class="mobile-bg"></div>

	 <?php	} 

	 // Banner Image
	$bannerImageURL = false;
	$metaBannerImageID = get_post_meta($post->ID, '_banner_image', true);

 	if ($metaBannerImageID) { 
		$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
		$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0]
		?>
	<img src="<?php echo $metaBannerImageAttachmentURL; ?>">
	<?php } ?>


	<?php  
	// Banner Heading
	$metaBannerHeading = get_post_meta($post->ID, '_banner_heading', true);
	
	if($metaBannerHeading) { ?>
	<h3><?php echo $metaBannerHeading; ?></h3>
	<?php } ?>


	<?php 
	// Banner Subheading

	$metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);

	if($metaBannerSubheading) { ?>
	<p><?php echo $metaBannerSubheading; ?></p>
	<?php } ?>

</section>