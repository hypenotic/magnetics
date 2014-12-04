<?php get_header(); ?>

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<section role="main">

  <!-- Module: Banner -->
  <?php get_template_part( 'module', 'banner' ); ?>

  <article>
    <h2><?php the_title(); ?></h2>

         <!-- Module: Author -->
        <?php get_template_part( 'module', 'author' ); ?>

         <!-- Template: Attached Files -->
        <?php get_template_part( 'template', 'brochureFile' ); ?>
        <?php get_template_part( 'template', 'articleFile' ); ?>

        <?php the_content(); ?>
  </article>

  <!-- Module: Timeline -->
  <?php get_template_part( 'module', 'timeline' ); ?>

    <!-- Module: productInformation -->
  <?php get_template_part( 'module', 'tabsProduct' ); ?>

</section>

<!-- End Loop -->
<?php endwhile; endif; ?>

<section class="container" id="pagination">
        <a href="<?php bloginfo('url');?>/products">&laquo; Return to Products Page</a>
        <a href="<?php bloginfo('url');?>/articles-and-brochures/">&laquo; Return to Articles Page</a>
</section>

<!-- Module: Related Posts -->
<?php get_template_part( 'module', 'postsRelated' ); ?>

<?php get_footer(); ?>