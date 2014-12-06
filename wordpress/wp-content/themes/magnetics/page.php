<?php get_header(); ?>

<!-- Get custom meta values -->
<?php
	$tabLeft 	= get_post_meta(get_the_ID(), '_page_tabs_tableft', true);
	$tabRight 	= get_post_meta(get_the_ID(), '_page_tabs_tabright', true);
?>
<!-- Start loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section>
 	<article>
    	<h1><?php the_title(); ?></h1>
    	<?php the_content(); ?>
  	</article>
</section>

<!-- tabLeft AND tabRight have data --> 
<?php if ($tabLeft && $tabRight) { ?>

    <?php get_template_part( 'module', 'tabsTwo' ); ?>

<?php } ?>

<!-- End loop -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>