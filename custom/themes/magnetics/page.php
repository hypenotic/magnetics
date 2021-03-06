<?php get_header(); ?>

<!-- Get custom meta values -->
<?php
	$tabLeft 	= get_post_meta(get_the_ID(), '_page_tabs_tableft', true);
	$tabRight 	= get_post_meta(get_the_ID(), '_page_tabs_tabright', true);

	// Banner Background Image
	$metaBannerImageID  = get_post_meta(get_the_ID(), '_banner_image', true);
	$metaBannerBackgroundImageID  = get_post_meta(get_the_ID(), '_banner_background_image', true);
	$metaBannerSubheading  = get_post_meta(get_the_ID(), '_banner_subheading', true);

	$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
	$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];
	
	$metaBannerBackgroundImageAttachment = wp_get_attachment_image_src( $metaBannerBackgroundImageID, 'full' );
	$metaBannerBackgroundImageAttachmentURL = $metaBannerBackgroundImageAttachment[0];




?>
<!-- Start loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php if($metaBannerBackgroundImageID) { ?>
<section role="main" style="background-image:url(<?php echo $metaBannerBackgroundImageAttachmentURL; ?>);">
<?php } else { ?>
<section role="main">
<?php } ?>

<?php
		if($metaBannerImageAttachmentURL ) { 
?>
	<header class="masthead" style="background-image:url(<?php echo $metaBannerImageAttachmentURL; ?>); background-size:cover;background-repeat:no-repeat;background-position: center center;">
			<h1><?php the_title(); ?></h1>
<?php
		if($metaBannerSubheading  !== -1) { ?>
			<h4><?php echo $metaBannerSubheading; ?></h4>
<?php 	
		} 
?>
	</header>
 	<article>
<?php
		} else {
?>
		</header>

	<?php 
	    global $post;
	    $post_slug=$post->post_name;
	?>

 	<article class="page-<?php echo $post_slug; ?>">
    	<h1><?php the_title(); ?></h1>

    	<?php } ?>
    	<?php the_content(); ?>

  	</article>

  	<?php if(is_page('contact')) { ?>
		<div id="contact-arrow">
			<div id="scrollDown">
				<i class="fa fa-chevron-down"></i>
			</div>
		</div>
	<?php } ?>

  	<?php if(is_page('contact')) { ?>

		 <?php get_template_part( 'module', 'team' ); ?>

	<?php } ?>

	<?php get_template_part( 'module', 'contentOptional' ); ?>


</section>

	

<!-- tabLeft AND tabRight have data --> 
<?php if ($tabLeft && $tabRight) { ?>

    <?php get_template_part( 'module', 'tabsTwo' ); ?>

<?php } ?>

<!-- End loop -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>