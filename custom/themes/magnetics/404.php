<?php
/*
Template Name: 404
*/

 get_header(); ?>

<section id="main">

<section class="banner">

 	<div class="background">
 		<div id="fish"></div>
	 	<video autoplay loop muted>
			<source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
		</video>
	</div>

	<div class="mobile-bg"></div>

</section>

<article>
	<h1>404</h1>
	<h3>Oops, you've gone too far.</h3>
	<p>But you might find what you're looking for here:</p>

	<ul>
		<li><a title="Home"href="<?php bloginfo('url') ?>/home">Home</a></li>
		<li><a title="Products" href="<?php bloginfo('url') ?>/products">Products</a></li>
		<li><a title="About" href="<?php bloginfo('url') ?>/about">About</a></li>
		<li><a title="Contact" href="<?php bloginfo('url') ?>/contact">Contact</a></li>
	</ul>
</article>
 
</section>
    
<?php get_footer(); ?>