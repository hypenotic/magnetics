<?php get_header(); ?>

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<section role="main">

  <!-- Module: Banner -->
  <?php get_template_part( 'module', 'banner' ); ?>

  <article>

    
    <?php /*$metaBannerHeadingShort = get_post_meta($post->ID, '_banner_heading_short', true);
    
    if ($metaBannerHeadingShort) { ?>

    <h1><?php echo $metaBannerHeadingShort; ?></h1>

    <?php } else { ?>

    
    <h1><?php the_title(); ?></h1>

    <?php }*/ ?>

    <h1><?php the_title(); ?></h1>

        <header class="meta">
         <!-- Module: Author -->
        <?php get_template_part( 'module', 'author' ); ?>


        <?php if(in_category(1)) { ?> 
           <!-- Template: Attached Files -->
         

<?php
  // Custom meta values 
  $metaPDF = get_post_meta($post->ID,'_article_file',true);
    $articleDescription = get_post_meta($post->ID,'_article_content',true);
    $articleFile = get_post_meta($post->ID,'_article_file',true);
    


  if(!$metaPDF) {

    $metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_article',true);
    $query = new WP_Query('post_type=article&p='.$metaAssociatedBrochurePostID);
    
    while ($query->have_posts()): $query->the_post(); 
    global $post;

    $metaPDF = get_post_meta($post->ID,'_article_file',true);
    endwhile;
    wp_reset_query();
  }

    if ($metaPDF) { ?>

  

  <a  href="<?php echo $metaPDF; ?>" download="<?php if(!$GLOBALS['view']) {echo $metaPDFName; } ?>" class="resource icon <?php if($GLOBALS['view']) {echo 'view';} ?>"><span class="small">Article</span></a>

  <?php } ?>

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