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
	$secondBG  = get_post_meta(get_the_ID(), '_banner_background_image', true);
	$metaBannerSubheading  = get_post_meta(get_the_ID(), '_banner_subheading', true);

	$metaBannerImageAttachment = wp_get_attachment_image_src( $metaBannerImageID, 'full' );
	$metaBannerImageAttachmentURL = $metaBannerImageAttachment[0];

	$secondBGLink = wp_get_attachment_image_src( $secondBG, 'full' );
	

	$introBlurb  = get_post_meta(get_the_ID(), '_intro_intro', true);

	$repeats = get_post_meta($post->ID,'_repeat',true);

	$panelTwo  = get_post_meta(get_the_ID(), '_content_block_1_text', true);

?>

<!-- Start loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section role="main">
	<header class="masthead compatible-header" style="background-image:url(<?php echo $metaBannerImageAttachmentURL; ?>); background-size:cover;background-repeat:no-repeat;background-position: center center;">
			<h1><?php the_title(); ?></h1>
	</header>
</section>

<section class="compatible-logos">
	<div class="inner-wrapper--wide">
	<h2>Works with SeaSPY2, Explorer & SeaQUEST</h2>
	<?php if($repeats) { ?>
		<div class="compatible-container">
        <!-- For loop cycle through Array -->
        <?php
            foreach($repeats as $repeat) {
            // Get custom meta values    
            $name  	= $repeat['_label'];
            $logo  	= $repeat['_image'];
            $site  	= $repeat['_website'];

        ?>     

        
        	<div class="repeat__single">
        		<div class="repeat__logo">
        			<?php echo wp_get_attachment_image($logo, 'full'); ?>
        		</div>
        		<?php if ($name) { ?>
					<p><a href="http://<?php echo $site; ?>" target="_blank"><?php echo $name; ?></a></p>
        		<?php } ?>
        		
        	</div>

		<?php 
				} 
		?>
		</div> 
	<?php } ?>
	<div class="compatible-content">
		<?php the_content(); ?>
	</div>
	</div>
</section>

<!-- <section class="compatible-questions">
	<div class="questions__text">
		<?php the_content(); ?>
	</div>
	<div>
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
</section> -->

<section class="compatible-more" style="background-image:url(<?php echo $secondBGLink[0]; ?>); background-size:cover;background-repeat:no-repeat;background-position: center center;">
	<div class="more__image">
		<!-- <img src="<?php echo get_template_directory_uri ()?>/dist/images/bob.png" alt=""> -->
	</div>
	<div class="more__text">
		<?php echo $panelTwo; ?>
	</div>
</section>


<!-- End loop -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>