<?php get_header(); ?>

<!-- Get custom meta values -->
<?php
	$tabLeft 	= get_post_meta(get_the_ID(), '_page_tabs_tableft', true);
	$tabRight 	= get_post_meta(get_the_ID(), '_page_tabs_tabright', true);

	// Banner Background Image
	$metaBannerImageID  = get_post_meta(get_the_ID(), '_banner_image', true);
	$metaBannerSubheading  = get_post_meta(get_the_ID(), '_banner_subheading', true);

	$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
	$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];


?>
<!-- Start loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<section>
<?php
		if($metaBannerImageAttachmentURL ) { 
?>
	<header style="background-image:url(<?php echo $metaBannerImageAttachmentURL; ?>)">
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
 	<article>
    	<h1><?php the_title(); ?></h1>

    	<?php } ?>
    	<?php the_content(); ?>
  	</article>
</section>

	<?php if(is_page('contact')) { ?>

		 <?php get_template_part( 'module', 'team' ); ?>

		<?php } ?>

<!-- tabLeft AND tabRight have data --> 
<?php if ($tabLeft && $tabRight) { ?>

    <?php get_template_part( 'module', 'tabsTwo' ); ?>

<?php } ?>

<!-- End loop -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>