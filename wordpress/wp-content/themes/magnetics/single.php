<?php get_header(); ?>
<section class="page-content"> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="container">
        	<div class="span-9 center">
            	<?php the_title("<h2>","</h2>");?>
				<p class="meta"><span class="sub-meta">Written by <?php echo the_author_posts_link(); ?></span>
                <?php
					if(get_post_meta($post->ID,'_brochure_file',true)) {
				?>
                <span><a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="download">Download this article</a></span>
                <?php
					}
					echo "</p>";
					if(get_post_meta($post->ID,'_brochure_content',true)) {
				?>
                <p class="description"><?php echo get_post_meta($post->ID,'_brochure_content',true);?></p>
                <?php } ?>
                <?php the_content();?>
            </div>
    </div>
<?php endwhile; endif; ?>
<section class="pagination container">
    <div class="span-9 center">
        <p><a href="#">< Return to Products Page</a></p>
        <p><a href="#">< Return to Articles Page</a></p>
        
		<hr />
    </div>
</section>

<section class="container">    
    <div class="span-9 center">
        <h6>OTHER ARTICLES RELATED TO SAESPY</h6>
        <hr />
    </div>
</section>
<?php
	$next_article = new WP_Query(array(
	'posts_per_page' => 1,
	'post__not_in' => array($post->ID)
	));
	if($next_article->have_posts()) {
?>
<section class="container">
    <div class="span-9 center">
        <h6>ARTICLE</h6>
        <?php while($next_article->have_posts()):$next_article->the_post(); ?>
        <div class="span-5">
            <h3><?php the_title();?></h3>
        </div>
        <div class="span-7">
            <p><?php echo get_post_meta(get_the_ID(),'_brochure_content',true);?></p>
            <p class="meta inline-meta">
            	 <?php
					if(get_post_meta($post->ID,'_brochure_file',true)) {
				?>
                <span><a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="download"></a></span>
                <?php } ?>
            	<span><a href="<?php the_permalink();?>" class="more" target="_blank"></a></span>
            </p>
        </div>
        <?php endwhile; ?>
    </div>
</section>
<?php } ?>
</section>

<?php get_footer(); ?>