<?php get_header(); ?>

<?php 
query_posts('post_type=page&p=16');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the feature banner image
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'banner', true);
		}
    ?>
<div class="banner">
        <div class="bannertext">

        
        </div>
        <span class="bannerimage" style="background-image:url('<?php echo $image_url[0]; ?>'); display: block;">
            <span class="inner"></span>
        </span>
</div>

<?php endwhile; endif; wp_reset_query();?>
<?php get_footer(); ?>