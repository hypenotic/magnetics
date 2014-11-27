<?php get_header(); ?>
<?php // Loop starts
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section role="main">
	<header>
		<?php get_template_part( 'template', 'backgroundVideo' ); ?>
		<h1><?php the_title(); ?></h1>
		<img src="<?php bloginfo('template_url');?>/images/product_image.png" />
		<h3>Description</h3>
		<p>Product Description Goes here</p>
	</header>

	<article>
	  	<?php the_content(); ?>
	</article>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>