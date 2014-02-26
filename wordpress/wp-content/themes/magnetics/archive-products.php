<?php
get_header(); ?>

<?php 
    $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args   =array(
    	'post_type' => 'products',
    	'paged' => $paged
    );
    query_posts($args);
?>

<section class="container">  
    <div class="span-10 center">
        <h1 class="headline">Products</h1>
        <p class="sub-headline">We make marine magnetometers. Period.</p>
    </div>
</section>        
<section class="container content-wrapper">  
    <div class="span-10 center">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="block-grid-2">
            <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
            <p class="meta"><?php the_excerpt(); ?></p>
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