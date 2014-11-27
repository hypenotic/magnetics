<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    

<section>
  <article>
    <h2><?php the_title(); ?></h2>

    <?php get_template_part( 'module', 'author' ); ?>
    <?php get_template_part( 'template', 'allBrochure' ); ?>
    <?php get_template_part( 'template', 'allArticle' ); ?>

    <?php the_content(); ?>

  </article>
</section>

<!-- product timeline -->
<?php get_template_part( 'module', 'timeline' ); ?> 


                <?php the_content();?>
            </div>
    </div>
<?php endwhile; endif; ?>

<section class="container" id="pagination">
        <a href="<?php bloginfo('url');?>/products">< Return to Products Page</a>
        <a href="<?php bloginfo('url');?>/articles-and-brochures/">< Return to Articles Page</a>
</section>

<?php get_template_part( 'module', 'postsRelated' ); ?>

<?php get_footer(); ?>