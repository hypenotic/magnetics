<article class="overview">
	
	<h6>ARTICLE</h6>	

	<h3><?php the_title();?></h3>

	<p><?php echo get_post_meta(get_the_ID(),'_brochure_content',true);?></p>

	<footer>
	<?php if(get_post_meta($post->ID,'_brochure_file',true)) { ?>
	<a class="download" href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>"></a>
	<?php } ?>
	<a href="<?php the_permalink();?>" class="more"></a>
	</footer>
	
</article>