<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<section role="main">

    <?php get_template_part( 'module', 'banner' ); ?>

  <article>
    <h2><?php the_title(); ?></h2>
        <?php get_template_part( 'module', 'author' ); ?>
        <?php get_template_part( 'template', 'brochureFile' ); ?>
        <?php get_template_part( 'template', 'articleFile' ); ?>
        <?php the_content(); ?>
  </article>

  <!-- timeline -->
  <?php get_template_part( 'module', 'timeline' ); ?>
</section>


<?php endwhile; endif; ?>

<section class="container" id="pagination">
        <a href="<?php bloginfo('url');?>/products">< Return to Products Page</a>
        <a href="<?php bloginfo('url');?>/articles-and-brochures/">< Return to Articles Page</a>
</section>

<?php get_template_part( 'module', 'postsRelated' ); ?>

<?php get_footer(); ?>