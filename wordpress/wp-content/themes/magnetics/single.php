<?php get_header(); ?>

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<section role="main">

  <!-- Module: Banner -->
  <?php get_template_part( 'module', 'banner' ); ?>

  <article>

    
    <?php $metaBannerHeadingShort = get_post_meta($post->ID, '_banner_heading_short', true);
    
    if ($metaBannerHeadingShort) { ?>

    <h1><?php echo $metaBannerHeadingShort; ?></h1>

    <?php } else { ?>

    
    <h1><?php the_title(); ?></h1>

    <?php } ?>

        <header class="meta">
         <!-- Module: Author -->
        <?php get_template_part( 'module', 'author' ); ?>


        <?php if(in_category('articles')) { ?> 
           <!-- Template: Attached Files -->
          <?php get_template_part( 'template', 'articleFile' ); ?>
        <?php } ?>
        </header>

        <section class="content">
        <?php the_content(); ?>
        </section>

    <?php if(in_category('articles')) { ?> 
    <br style="clear:both" />   
    <footer class="container">
      <a class="return" href="<?php bloginfo('url');?>/products">&laquo; Return to Products Page</a>
      <a class="return" href="<?php bloginfo('url');?>/articles-and-brochures/">&laquo; Return to Articles Page</a>
    </footer>
    <?php } ?>


  </article>

<?php if(in_category('products') && !in_category('product-integrations')) { ?>
  <!-- Module: Steps -->
  <?php get_template_part('module', 'callUs'); ?>
<?php } ?>

  <!-- Module: Timeline -->
  <?php get_template_part( 'module', 'timeline' ); ?>

  <!-- Module: Steps -->
  <?php get_template_part('module', 'steps'); ?>

  <!-- Module: productInformation -->
  <?php get_template_part( 'module', 'tabsProduct' ); ?>

  <!-- Module: Related Posts -->
  <?php get_template_part( 'module', 'postsRelated' ); ?>

</section>

<!-- End Loop -->
<?php endwhile; endif; ?>



<?php get_footer(); ?>