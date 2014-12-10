<?php get_header(); ?>


<section class="owl-carousel">
<?php 
query_posts('post_type=products');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="item">
<?php

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
        <p><?php the_title() ?>. <?php echo $metaBannerSubheading; ?></p>
    <?php } ?>

    <a class="button clear" href="<?php the_permalink(); ?>" title="Learn More">Learn More</a>

    </div>

<?php endwhile; endif; wp_reset_query();?>

</section>
<?php get_footer(); ?>