<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name') ?></title>
    <?php 
        $args   =array('post_type' => 'post','posts_per_page' => 1);query_posts($args);
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
            <meta property="og:image" content="<?php bloginfo('template_url' ); ?>/images/logo.png">
    <?php } endwhile; endif; ?>
    <?php wp_reset_query(); ?>
    <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
    
    <?php wp_head(); ?>
    
    <script type="text/javascript">
        (function() {
        var config = {
        kitId: 'set7rcj',
        scriptTimeout: 3000
        };
        var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
        })();
    </script>

    <script type='text/javascript'>
    (function (d, t) {
      var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
      bh.type = 'text/javascript';
      bh.src = '//www.bugherd.com/sidebarv2.js?apikey=1wpsnobnz9aehqcpybypga';
      s.parentNode.insertBefore(bh, s);
      })(document, 'script');
    </script>
    
</head>

<body <?php body_class();?>>
<?php if(is_page(28)) { ?>
<div class="contact-map" style="background-image:url(<?php bloginfo('template_url');?>/images/contact-map.jpg);"></div>
<?php } ?>
<!-- Menu Section Starts -->
    <!-- Pushy Menu -->
        <nav class="pushy pushy-right">
        	<a href="javascript:void(0)" class="close-pushy">x</a>
			<?php wp_nav_menu(array('theme_location'=>'header-menu'));?>
        </nav>
 <!-- Site Overlay -->
<div class="site-overlay"></div>

<!-- Menu Section Ends -->
<header>
	<nav>
    	<div class="container">
            <div class="span-6 logo">
                <h1><a href="<?php bloginfo('url');?>">Magnetics</a></h1>
            </div>
            <div class="menu-btn"><span>Menu</span></div>
       </div>
    </nav>
</header>
<div class="wrapper">