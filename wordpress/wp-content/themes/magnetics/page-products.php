<?php
/*
Template Name: Products
*/

get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>

<div class="page-title">
        <div class="container">
            <section class="span-10-center">
                <h1 class="headline">Products</h1>
                <p class="sub-headline">We make marine magnetometers. Period.</p>
            </section>
        </div>    
</div>     
<div class="page-content">  	
    <div class="container">
		<?php        
		$product_categories = get_terms( 'category', array('hide_empty' => 0,'exclude'=>array(1),'orderby'=>'id') );
		if($product_categories) :
			foreach($product_categories as $category) :
				$term_meta =  get_option( "term_meta_category_".$category->term_id );
				$color = $term_meta['_product_category_color'];
				if($color) {
					$style= "style='background-color:".$color.";'";
				}else {
					
					$style= "style='background-color:#67c4a1;'";
				}
        ?>	
        <section class="span-10-center product-section">    
            <p class="colored-section equal-width-category"><span <?php echo $style;?>><?php echo $category->name;?></span></p>
			<?php 
			$args = array(
			'posts_per_page' => 2, // set number of post per category here
			'taxonomy' => 'category',
			'term' => $category->slug,
			'post_type' => 'product'
			);
			
			$products= new WP_Query( $args );
			if($products->have_posts()):
				while ( $products->have_posts()) : $products->the_post( ); 
			?>
            <div class="span-6">
				<div class="section-content">
					<h4 class="post-title"><?php the_title(); ?></h4>
					<p>
						<?php 
							$description=get_post_meta(get_the_ID(),'_product_description',true); 
							if($description) echo $description; 
						?>
					</p>
				</div>
            </div>
            <?php endwhile; else: ?>
				<div class="span-6">
					<p class="meta">No products for this category.</p>
				</div>
			<?php endif; wp_reset_postdata(); ?>
        </section>
       <?php 
			endforeach;
		endif;
	   ?> 
    </div>
</div>            

<div class="container">
    <div class="pagi columns-wide">
        <?php pagination(); ?>
    </div>
</div>
<?php get_footer(); ?>