<?php get_header(); ?>

<!-- Start Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
<section role="main">

  <!-- Module: Banner -->
  <?php get_template_part( 'module', 'banner' ); ?>

  <article>

    <h1><?php the_title(); ?></h1>

    <?php if(in_category('articles') || in_category('blog') ) { ?> 

        <header class="meta">
         <!-- Module: Author -->
        <?php       
            get_template_part( 'module', 'author' );

            if(in_category('articles')) { 
            // Custom meta values 
            $metaPDF = get_post_meta($post->ID,'_related_content_post_article',true);
            $articleDescription = get_post_meta($post->ID,'_article_content',true);
      
            $query = new WP_Query('post_type=article&p='.$metaPDF[0]);
            while ($query->have_posts()): $query->the_post(); 
            global $post;
            $metaPDFURL = get_post_meta($post->ID,'_article_file',true);
            endwhile;
            wp_reset_query();
    
          ?>

              <a href="<?php echo $metaPDFURL; ?>" download="<?php if(!$GLOBALS['view']) {echo $metaPDFName; } ?>" class="resource icon <?php if($GLOBALS['view']) {echo 'view';} ?>"><span class="small">Article</span></a>
            <?php } ?>

          </header>
        <?php } ?>

        <section class="content">
        <?php the_content(); ?>
        </section>

    <?php if(in_category('articles')) { ?> 
    <br style="clear:both" />   
    <footer class="container">
      
      <p>
        <small>Posted on <?php the_time('l, F jS, Y') ?>.</small>
      </p>

    </footer>
    <?php } ?>


  </article>

   <?php get_template_part('module', 'callUs'); ?>

<?php if(in_category('products') || in_category('product-integrations')) { ?>

  <!-- Module: Timeline -->
  <?php get_template_part( 'module', 'timeline' ); ?>

  <!-- Module: Steps -->
  <?php get_template_part('module', 'steps'); ?>

  <!-- Module: productInformation -->
  <?php get_template_part( 'module', 'tabsProduct' ); ?>

  <!-- Module: Integration Partners -->
  <?php get_template_part( 'module', 'integrationPartners' ); ?>

  <!-- Module: Related Posts -->
  <?php get_template_part( 'module', 'postsRelated' ); ?>

<?php } ?>


</section>

<!-- End Loop -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>