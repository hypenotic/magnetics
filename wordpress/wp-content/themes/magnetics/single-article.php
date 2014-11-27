<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section> 
 <article>
    <h1><?php the_title(); ?></h1>
    <img src="<?php the_author_image(); ?>" />
    by <a href="http://johnsplace.com" rel="author">John</a>

    <!-- TODO: Hook up PDF/Article Download : brochure_file -->
    <?php if(get_post_meta($post->ID,'_brochure_file',true)) { ?>

    <a class="download" href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>">Download</a>

    <?php } ?>

    <section class="content">
        <?php the_content(); ?>
    </section>
  </article>
</section>

<?php endwhile; endif; ?>

    <section>
    <a href="<?php bloginfo('url');?>/products">< Return to Products Page</a>
    <a href="<?php bloginfo('url');?>/articles-and-brochures/">< Return to Articles Page</a>
    </section>  

<!-- Get Related Posts -->

<?php
    $args=array(
            'post__not_in' => array($post->ID),
            'showposts'=>2  // Number of related posts that will be shown.
            );

    $related_posts = new WP_Query($args);
    
    if( $related_posts->have_posts() ) { 
?>

    <section id="related">
        <h6>OTHER ARTICLES RELATED TO SEASPY</h6>   

        <?php while($related_posts->have_posts()): $related_posts->the_post(); ?>

            <?php get_template_part( 'template', 'articleOverview' ); ?>

         <?php endwhile; wp_reset_query();?>

     </section>
    <?php 
    } 
?>

<?php get_footer(); ?>