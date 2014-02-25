<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the feature banner image
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'full', true);
		}
    ?>
    <div class="banner" style="background-image:url('<?php echo $image_url[0]; ?>'); display: block;">  	
            <div class="container">
                <section class="span-10">
                    <?php the_title( '<h1 class="headline">', '</h1>' ); ?>
					<?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
                    <?php the_content(); ?>
                </section>
            </div>
    </div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>