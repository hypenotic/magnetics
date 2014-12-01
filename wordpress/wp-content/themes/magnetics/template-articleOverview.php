<?php 
	// Custom meta values 
	$brochureFile = get_post_meta($post->ID,'_brochure_file',true)
?>

<article class="overview">
	
	<h6>ARTICLE</h6>	

	<h3><?php the_title();?></h3>

	<p><?php the_excerpt(); ?></p>

	<footer>

	<?php if($brochureFile) { ?>
		<a class="download" href="<?php echo $brochureFile; ?>"></a>
	<?php } ?>

	<a href="<?php the_permalink();?>" class="more"></a>
	</footer>
	
</article>