<?php
	$more_articles = new WP_Query(array(
	'posts_per_page' => 2,
	'post__not_in' => array($post->ID)
	));
	if($more_articles->have_posts()) {
?>
        <?php while($more_articles->have_posts()):$more_articles->the_post(); ?>
     
            <?php get_template_part( 'template-', 'articleOverview' ); ?>

        <?php endwhile; ?>
  
<?php } ?>