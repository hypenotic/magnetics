<?php 
/*
Template Name: About
*/

get_header(); ?>

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

	$introBlurb  = get_post_meta(get_the_ID(), '_intro_intro', true);
?>

<!-- Start loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section role="main">
	<header class="masthead" style="background-image:url(<?php echo $metaBannerImageAttachmentURL; ?>); background-size:cover;background-repeat:no-repeat;background-position: center center;">
			<h1><?php the_title(); ?></h1>
			<h4><?php echo $metaBannerSubheading; ?></h4>
	</header>
</section>

<div class="about-intro">
	<article>
		<?php echo $introBlurb; ?>
	</article>
</div>

<section class="about-content">
	<article>
		<?php the_content(); ?>
	</article>
</section>

<?php get_template_part( 'module', 'contentOptional' ); ?>

<!-- tabLeft AND tabRight have data --> 
<?php if ($tabLeft && $tabRight) { ?>

    <?php get_template_part( 'module', 'tabsTwo' ); ?>

<?php } ?>

<!-- End loop -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>