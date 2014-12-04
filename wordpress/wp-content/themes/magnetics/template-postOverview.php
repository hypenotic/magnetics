	 <?php 
		// Custom meta values 
		$brochureFile = get_post_meta($post->ID,'_brochure_file',true);
		$brochureDescription = get_post_meta($post->ID,'_brochure_content',true);
		$postType = get_post_type( get_the_ID());
		$postCategory = get_top_category();

		if($postType !== 'brochure') {
			$postType = $postCategory->name;
		}
	?>

	<article class="overview">
		
		<h6><?php echo $postType; ?></h6>	

		<header>

			<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>

		</header>

		<section>
			
			<?php 
				// Out on a limb here. If there's no brochureDescription, 
				// we can just call excerpt. Vice versa.
				echo $brochureDescription; 
				the_excerpt(); 
			?>

			<footer>
				<?php if($postType == 'brochure') { ?>
				<?php get_template_part( 'template', 'brochureFile' ); ?>
				<?php } else { ?>
				<?php get_template_part( 'template', 'articleFile' ); ?>
				<?php } ?>

				<a href="<?php the_permalink();?>" class="icon more"></a>
			</footer>

		</section>
 
	</article>