<?php
/*
Template Name: Integrations
*/

get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>
<div class="page-title">
        <div class="container">
            <section class="span-10 center">
                <?php the_title( '<h1 class="headline">', '</h1>' ); ?>
                <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
            </section>
        </div>    
</div>     

<?php 
    $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args   =array(
    	'post_type' => 'integration',
    	'paged' => $paged
    );
    query_posts($args);
?>
<div class="page-content">  	
    <div class="container">
        <section class="span-10 center">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="block-grid-2">
                <h4><?php the_title(); ?></h4>
                <p class="meta"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink();?>" class="button"><button class="white">View</button></a>
            </div>
            <?php endwhile; endif; ?>
        </section>
    </div>
</div>            
<?php get_footer(); ?>