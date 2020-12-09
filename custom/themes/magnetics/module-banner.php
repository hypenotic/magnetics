	<?php 

	// Video Background
	$bannerVideoURL = false;

	// Custom meta values 
	$metaBannerVideo = get_post_meta($post->ID, '_banner_video', true);
	$metaBannerBackgroundImageID = get_post_meta($post->ID, '_banner_background_image', true);

	$metaBannerBackgroundImageAttachment = wp_get_attachment_image_src( $metaBannerBackgroundImageID, 'full' );
	$metaBannerBackgroundImageAttachmentURL = $metaBannerBackgroundImageAttachment[0];

	$metaDarkMenu = get_post_meta($post->ID, '_banner_darkmenu', true); 

	$title = get_the_title();
	$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
	$lowercase = strtolower($prehash);
	$hash = $lowercase;	

	?>
<section id="banner" class="banner <?php echo $hash; ?>">

	<?php 

	if($metaDarkMenu) { ?>

 	<script>
 		jQuery(document).ready(function($){

 		//	$('.menu-btn').addClass('dark');

 		});
 	</script>

	<?php }

	// Have they added a video?
 	if(!$metaBannerBackgroundImageID) {
 	?>

 	<script>
 		jQuery(document).ready(function($){

 			// $('.menu-btn').addClass('dark');

 		});
 	</script>

	 <style>

.vimeo-wrapper {
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   z-index: -1;
   pointer-events: none;
   overflow: hidden;
}
.vimeo-wrapper iframe {
   width: 100vw;
   height: 56.25vw; /* Given a 16:9 aspect ratio, 9/16*100 = 56.25 */
   min-height: 100vh;
   min-width: 177.77vh; /* Given a 16:9 aspect ratio, 16/9*100 = 177.77 */
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
}
	 </style>

 	<div class="background">
 		<div class="overlay"></div>
		 <?php if(is_single('1462')) { ?>
			<div class="vimeo-wrapper">
				<iframe src="https://player.vimeo.com/video/459125731?background=1&autoplay=1&loop=1&byline=0&title=0"
						frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
				
			<?php } else { ?>
				<video autoplay loop muted>
					<source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
				</video>
		 <?php } ?>

	</div>

	<div class="mobile-bg"></div>

	 <?php	}  else { ?>
 	<div class="background <?php if($metaBannerBackgroundImageAttachmentURL) {echo 'enabled';} ?> " style="background-image:url(<?php echo $metaBannerBackgroundImageAttachmentURL; ?>);background-size:cover">
	</div>
	<?php }

	 // Banner Image
	$bannerImageURL = false;
	
	// Custom meta values 
	$metaBannerImageIDs = get_post_meta($post->ID, '_banner_image', true);


	if ($metaBannerImageIDs  == -1) { ?>

	<div class="bannerImage"></div>

	<?php } elseif (sizeof($metaBannerImageIDs) == 1) {

 
		$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageIDs[0], 'full' );
		$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];

		?>
	<img class="bannerImage <?php echo $hash; ?>" src="<?php 
	if($metaBannerImageAttachmentURL) {
		echo $metaBannerImageAttachmentURL;	
	} else {
	  echo 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; 
	}
	  ?>">
	
	
	<?php } elseif (sizeof($metaBannerImageIDs) > 1) { ?>


	<section class="owl-carousel owl-theme">

		<?php foreach($metaBannerImageIDs as $metaBannerImageID ) { ?>

		<div class="item">

			<?php $metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
					$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];

			?>
			<img src="<?php echo $metaBannerImageAttachmentURL; ?>">
	   
		</div>

		<?php } ?>
		</section>
	<?php } ?>

	<div class="text">
	<h1><?php the_title(); ?></h1>

	<?php  
	// Banner Heading
	// Custom meta values 
	/*$metaBannerHeading = get_post_meta($post->ID, '_banner_heading', true);
	
	if($metaBannerHeading  !== -1) { ?>
	<h3><?php echo $metaBannerHeading; ?></h3>
	<?php }
	*/ ?>


	<?php 
	// Banner Subheading
	// Custom meta values 
	$metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);

	if($metaBannerSubheading !== -1) { ?>
	<h4><?php echo $metaBannerSubheading; ?></h4>
	<?php } ?>
	</div>

</section>
<a id="scrollDown" href="#scrollDown">
	<i class="fa fa-chevron-down"></i>
</a>
<div id="below"></div>