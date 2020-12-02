<?php 

/*
Template Name: Product Index
*/

get_header(); ?>

    <div class="background">
    <div class="overlay"></div>
        <video autoplay loop muted id="bgvid">
            <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
        </video>
    </div>

    <div class="mobile-bg"></div>

    <header class="banner">
        <h1>Products</h1>
        <h4><?php echo category_description(); ?></h4>
    </header>

<section role="main">



    <section class="products">

    <?php
    $parentCatName  = single_cat_title('',false);
    $parentCatID    = get_cat_ID($parentCatName);
    // Use the category's description field to order
    $args           = array (
        'orderby'   => 'description',
        'include'   => array(6,5,4,22,11,23),
    );
    $wpcat          = get_terms( 'category', $args );
    // $childCats      = get_categories( 'child_of='.$parentCatID );

    if(is_array($wpcat)):
    foreach($wpcat as $category){ ?>


    <label class="<?php echo $category->slug; ?>"><span><?php echo $category->name; ?></span></label>
    <ul>
    <?php query_posts('cat='.$category->term_id);
    while(have_posts()): the_post(); $do_not_duplicate = $post->ID; ?>
    <!-- POST CODE -->

    <li class="product <?php echo $category->slug; ?>">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
     <h3><?php the_title(); ?></h3>

        <?php 
        // Banner Subheading
        // Custom meta values 
        $metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);

        if($metaBannerSubheading !== -1) { ?>
            <p><?php echo $metaBannerSubheading; ?>

             
            </p>

            <!--
                <a class="button clear" href="<?php the_permalink(); ?>" title="Learn More">Learn More</a>
            -->

        <?php } ?>

       </a>

    </li>

    <!-- END POST CODE -->
    <?php
    endwhile; 
    ?>
    </ul>
    <?php
    wp_reset_query(); 
    }
    endif;
    ?>
    

    </section>

</section>

<?php get_footer(); ?>