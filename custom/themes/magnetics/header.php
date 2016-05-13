<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name') ?></title>
<?php 
    $args = array('post_type' => 'post','posts_per_page' => 1);query_posts($args);
    if (have_posts()) : while(have_posts()) : the_post();
    if (is_single()) { ?>
        <meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php single_post_title(''); ?>" />
        <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php if (function_exists('catch_that_image')) {echo catch_that_image(); }?>" />
    <?php } else { ?>
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="<?php bloginfo('template_url' ); ?>/dist/images/logo.png">
<?php } endwhile; endif; ?>
<?php wp_reset_query(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<div class="site-overlay"></div>
<!-- Menu Section Starts -->
    <!-- Pushy Menu -->
  <nav id="menu" class="panel" role="navigation">
    <?php 
    
      wp_nav_menu( array(
          'menu'   => 'Main Menu',
          'walker' => new WPDocs_Walker_Nav_Menu()
      ) );

    ?>
  </nav>
<!-- Menu Section Ends -->

   <nav id="toggler">
          <div class="menu-btn text"><span>Menu</span></div>
          <div class="menu-btn">
               <a id="nav-toggle" href="#menu"><span></span></a>
          </div>
   </nav>

<header>
<div class="container">
<a class="logo" href="<?php bloginfo('url') ?>" alt="Marine Magnetics - Home">
  <img src="<?php bloginfo('template_url') ?>/dist/images/logo.png" />
</a>
</div>

</header>
<?php get_template_part( 'module', 'callUs' ); ?>