<?php get_header(); ?>

<?php 
    $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args   =array(
        'post_type' => array('post','brochure'),
        'paged' => $paged
    );
    query_posts($args);
?>

<h3>Select a Category</h3>
<?php

    $args = array(
        'child_of' => 2,
        'hide_empty' => FALSE,
        'title_li' => '',
    );
    wp_list_categories( $args ); 

?>

<section id="archive">  
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <?php get_template_part('template','postOverview'); ?>

    <?php endwhile; endif; ?>
</section>

<section class="pagination">
        <?php pagination(); ?>
</section>

<?php get_footer(); ?>