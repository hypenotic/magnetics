<?php
/*
Template Name: Products
*/

get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>
<?php 
    $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args   =array(
    	'post_type' => 'product',
    	'paged' => $paged
    );
    query_posts($args);
?>

<div class="page-title">
        <div class="container">
            <section class="span-10 center">
                <h1 class="headline">Products</h1>
                <p class="sub-headline">We make marine magnetometers. Period.</p>
            </section>
        </div>    
</div>     
<div class="page-content">  	
    <div class="container">
        <section class="span-10 center">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="block-grid-2">
                <h4><?php the_title(); ?></h4>
                <p class="meta"><?php the_excerpt(); ?></p>
            </div>
            <?php endwhile; endif; ?>
        </section>
    </div>
</div>            

<div class="container">
    <div class="pagi columns-wide">
        <?php pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>