<?php
/*
Template Name: Integration Archive
*/

get_header(); ?>

<?php 
    $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args   =array(
    	'post_type' => 'integration',
    	'paged' => $paged
    );
    query_posts($args);
?>

<section class="container">  
    <div class="span-10 center">
        <h1 class="headline">Integrations</h1>
        <p class="sub-headline">Lorem Ipsum</p>
    </div>
</section>        
<section class="container content-wrapper">  
    <div class="span-10 center">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="block-grid-2">
            <h4><?php the_title(); ?></h4>
            <p class="meta"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink();?>" class="button"><button class="white">View</button></a>
        </div>
        <?php endwhile; endif; ?>
    </div>
</section>

<div class="container">
    <div class="pagi columns-wide">
        <?php pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>