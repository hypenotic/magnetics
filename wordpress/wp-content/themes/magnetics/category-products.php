<?php get_header(); ?>

<section role="main">

<?php get_header(); ?>

    <video autoplay loop id="bgvid">
        <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
    </video>

    <div class="mobile-bg"></div>

    <header>
    <h1>Products</h1>
    <h4> <?php echo category_description(); ?></h4>
    </header>

<section>
<?php 
query_posts('post_type=post&category=products');
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="product">

   
    <?php
$category = get_the_category(); 
?>
    <label class="<?php echo $category[0]->slug; ?>"><?php echo $category[0]->cat_name; ?></label>
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
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


</section>

<?php get_footer(); ?>