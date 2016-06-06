<?php 
/*
Template Name: Compatible Software
*/

get_header(); ?>

<!-- Get custom meta values -->
<?php
	$tabLeft 	= get_post_meta(get_the_ID(), '_page_tabs_tableft', true);
	$tabRight 	= get_post_meta(get_the_ID(), '_page_tabs_tabright', true);

	// Banner Background Image
	$metaBannerImageID  = get_post_meta(get_the_ID(), '_banner_image', true);
	$metaBannerSubheading  = get_post_meta(get_the_ID(), '_banner_subheading', true);

	$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
	$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];
	

	$introBlurb  = get_post_meta(get_the_ID(), '_intro_intro', true);

	$panelTwo  = get_post_meta(get_the_ID(), '_content_block_1_text', true);

?>

<!-- Start loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section role="main">
	<header class="masthead" style="background-image:url(<?php echo $metaBannerImageAttachmentURL; ?>); background-size:cover;background-repeat:no-repeat;background-position: center center;">
			<h1><?php the_title(); ?></h1>
			<h4><?php echo $metaBannerSubheading; ?></h4>
	</header>
</section>

<section class="compatible-logos">
	<article>
		
	</article>
</section>

<section class="compatible-questions">
	<div class="questions__text">
		<?php the_content(); ?>
	</div>
	<div>
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
</section>

<section class="compatible-more">
	<div>
		<img src="<?php echo get_template_directory_uri ()?>/dist/images/bob.png" alt="">
	</div>
	<div class="questions__text">
		<?php echo $panelTwo; ?>
	</div>
</section>


<!-- End loop -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>