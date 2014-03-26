<?php get_header(); ?>
<div class="video-wrapper">
<?php get_template_part( 'template-part', 'add_video' ); ?>
	<div class="header-image">
		<img src="<?php bloginfo('template_url');?>/images/product_image.png" />
    </div>
</div>
<?php // Loop starts
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get post meta
        $config_title   = get_post_meta($post->ID, '_product_options', true);
        $config_desc    = get_post_meta($post->ID, '_product_options_description', true);
		$config_image   = get_post_meta($post->ID, '_work_id_video' ,true);
			$taxonomy = 'category';
			$terms = get_the_terms( $post->ID, $taxonomy );
			if($terms) {
				foreach($terms as $term) {
					 $cat_id[]=$term->term_id;
				}
				$term_meta =  get_option( "term_meta_product_category_".$cat_id[0] );
				$color = $term_meta['_product_category_color'];
				if($color) {
					$style= "style='background-color:".$color.";'";
				}
				else {	
					$style= "style='background-color:#67c4a1;'";
				}	
			}
		else {	
			$style= "style='background-color:#67c4a1;'";
		}
		
        //$image_id   = get_post_thumbnail_id();
        $image_url  = wp_get_attachment_image_src($image_id,'banner', true);
    ?>


<?php $arraytest = get_post_meta($post->ID, '_product_options', true);?>

<?php 
	if($teams):
    foreach( $teams as $post ) :  setup_postdata($post); 
?>
<?php echo get_post_meta(get_the_ID(), '__product_options_title', true); ?>
 <?php endforeach; endif; ?>

<div class="page-content">  	
                <div class="stem">
                    <div class="stem_bg_green" <?php echo $style;?>></div>
                    <div class="stem_bg_white"></div>
                </div>
    <div class="container">
        <section class="span-10 center text-center">
				<?php the_title( '<h2 id="title">', '</h2>' ); ?>
                <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
                <?php the_content(); ?>
        </section>
        
        <section class="span-10 center product_slides">
			<?php 
            $features = get_post_meta( get_the_ID(),'_product_features',true );
            if($features) {
            ?>

            <ul class="product_slide">
                <li class="first fade left clearfix">
                		<div class="grid-5">
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                            </div>
                         </div>
                         <div class="grid-5 hide-on-mobile"></div>
                </li>
                <?php
					foreach($features as $feature) {
						$direction=$feature['_direction'];
						$icon = $feature['_icon'];
						$title = $feature['_title'];
						$content = $feature['_content'];
				?>
                <li class="fade <?php echo $direction;?> clearfix">
                		<?php 
						if($direction == 'left') {
						?>
                		<div class="grid-5">
                            <div class="product_slide_icon <?php echo $icon;?>"></div>
                            <div class="product_slide_mask"></div>
                            <div class="product_slide_content">
                                <h5><?php echo $title;?></h5>
                                <p><?php echo $content;?></p>
                            </div>
                         </div>
                         <div class="grid-5 hide-on-mobile"></div>
                        <?php 
						}else {
						?> 
                        <div class="grid-5 hide-on-mobile"></div>
                		<div class="grid-5">
                            <div class="product_slide_icon <?php echo $icon;?>"></div>
                            <div class="product_slide_mask"></div>
                            <div class="product_slide_content">
								<h5><?php echo $title;?></h5>
                                <p><?php echo $content;?></p>
                            </div>
                         </div>
                        <?php } ?>
                </li>
                <?php } ?>
                <li class="last fade left clearfix">
                		<div class="grid-5">
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                            </div>
                         </div>
                         <div class="grid-5 hide-on-mobile"></div>
                </li>                
            </ul>
            <?php } ?>
        </section>
     </div>
	<div class="green-bg" <?php echo $style;?>>
   		<div class="container">
        	<div class="span-10 center">
            	<h2 class="section-headline">Configurations</h2>
					<?php 
                        $configs = get_post_meta( get_the_ID(),'_product_options',true );
						if($configs) {
                     ?>
                    <section  class="configuration_list">
                    	<h3 class="list_header">What's in the box</h3>
                        <ul>
                        	<?php foreach($configs as $config) {
								if($config['_config']=='value2'){	
							 ?>
								<li>
                                	<?php if($config['_image']){ 
											$img =$config['_image'];
											}else {
											$img= get_bloginfo('template_url')."/images/configuration_dummy.jpg";	
										}
									?>	
									<img src="<?php echo $img;?>" />
									<h6><?php echo $config['_title'];?></h6>
									<p class="shortner"><?php echo $config['_content'];?></p>
								</li>
								<?php } ?>
                            <?php } ?>
                        </ul>
                    </section>
                    <section class="configuration_list">
                    	<h3 class="list_header">Accessories</h3>                    
                            <ul>
                                <?php foreach($configs as $config) {
								if($config['_config']=='value3'){	
							 ?>
								<li>
                                	<?php if($config['_image']){ 
											$img =$config['_image'];
											}else {
											$img= get_bloginfo('template_url')."/images/configuration_dummy.jpg";	
										}
									?>	
									<img src="<?php echo $img;?>" />
									<h6><?php echo $config['_title'];?></h6>
                                    <p class="shortner"><?php echo $config['_content'];?></p>
								</li>
								<?php } ?>
                            <?php } ?>
                            </ul>
                    </section>
                    <section class="configuration_list">
                    	<h3 class="list_header">Integrations</h3>                    
                            <ul>
							<?php foreach($configs as $config) {
								if($config['_config']=='value1'){	
							 ?>
								<li>
                                	<?php if($config['_image']){ 
											$img =$config['_image'];
											}else {
											$img= get_bloginfo('template_url')."/images/configuration_dummy.jpg";	
										}
									?>	
									<img src="<?php echo $img;?>" />
									<h6><?php echo $config['_title'];?></h6>
                                    <p class="shortner"><?php echo $config['_content'];?></p>
								</li>
								<?php } ?>
                            <?php } ?>
                            </ul>
                    </section>
                    
                   <?php } ?> 
            </div>
        </div>
                            
                    <button class="callus-button"><a href="#">Call Us!</a></button>
    </div>
    
	<div class="grey-bg">
   		<div class="container">
        	<div class="span-10 center">
            	<h2 class="section-headline">Articles & Brochures</h2>
				<?php 
                	$paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
            	    $args =array(
	                'post_type' => array('post','brochure'),
    	            'paged' => $paged
        	        );
                	query_posts($args);
                ?>
                        <div class="container related">
				        	<?php if(have_posts()): while(have_posts()):the_post();
								$post_type=get_post_type(get_the_ID());
								if($post_type=='post') $post_type = "Article";
							?>
                                <h6><?php echo strtoupper($post_type);?></h6>
                                <div class="span-5"><h3><?php the_title();?></h3></div>
                                <div class="span-7">
                                    <p><?php echo get_post_meta(get_the_ID(),'_brochure_content',true);?></p>
                                    <p class="meta inline-meta">
                                         <?php
                                            if(get_post_meta($post->ID,'_brochure_file',true)) {
                                        ?>
                                        <span><a href="<?php echo get_post_meta($post->ID,'_brochure_file',true);?>" target="_blank" class="download"></a></span>
                                        <?php } ?>
                                        <span><a href="<?php the_permalink();?>" class="more"></a></span>
                                    </p>
                                </div>
                                <hr />
	                    <?php endwhile;endif;wp_reset_query();?>
    						</div>

            </div>
        </div>
    </div>
</div>          
<?php endwhile;endif;wp_reset_query();?>
<?php get_footer(); ?>