<?php get_header(); ?>
<section> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container">
        	<div class="span-9 center">
            	<?php the_title("<h2>","</h2>");?>
				<p class="meta"><span class="sub-meta">Written by</span> <?php echo the_author_posts_link(); ?></p>
                <?php
					if(get_post_meta($post->ID,'_brochure_content',true)) {
				?>
                <p><a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="download">Download this article</a></p>
                <?php
					}
					if(get_post_meta($post->ID,'_brochure_content',true)) {
				?>
                <p class="description"><?php echo get_post_meta($post->ID,'_brochure_content',true);?></p>
                <?php } ?>
                <?php the_content();?>
            </div>
    </div>
<?php endwhile; endif; ?>
</section>

<div class="container">
    <div class="span-8 center">
		<?php previous_post_link( '<span class="prev">%link</span>', '<< Previous' );?>
        <?php next_post_link( '<span class="next">%link</span>', 'Next >>' );?>
    </div>
</div>
    
<!-- Pagination for desktop -->    
<div id="pagination">
    <?php previous_post_link( '%link', '%title' );?>
    <?php next_post_link( '%link', '%title' );?>
</div>
<?php get_footer(); ?>