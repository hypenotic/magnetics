<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section>
  <article>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </article>
</section>

<?php 

$metaTabs = get_post_meta(get_the_ID(), '_page_tabs_tableft', true) && get_post_meta(get_the_ID(), '_page_tabs_tabright', true);

if($metaTabs) { 

	get_template_part( 'template', 'tabsTwo' ); 

} ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>