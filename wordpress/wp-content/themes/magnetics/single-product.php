<?php get_header(); ?>

<?php get_template_part( 'template-part', 'add_video' ); ?>

<?php // Loop starts
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get post meta
        $config_title   = get_post_meta($post->ID, '_product_options', true);
        $config_desc    = get_post_meta($post->ID, '_product_options_description', true);
        $config_image   = get_post_meta($post->ID, '_work_id_video' ,true);
        //$image_id   = get_post_thumbnail_id();
        $image_url  = wp_get_attachment_image_src($image_id,'banner', true);
    ?>


<?php $arraytest = print_r(get_post_meta($post->ID, '_product_options', true));?>

<?php 
	if($teams):
    foreach( $teams as $post ) :  setup_postdata($post); 
?>
<?php echo get_post_meta(get_the_ID(), '__product_options_title', true); ?>
 <?php endforeach; endif; ?>


<div class="page-title">
    <div class="container">
        <section class="span-10 center">
				<img src="<?php bloginfo('template_url');?>/images/product_image.png" />
        </section>
    </div>    
</div>     
<div class="page-content">  	
    <div class="container">
        <section class="span-10 center text-center">
				<?php the_title( '<h2 id="title">', '</h2>' ); ?>
                <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
                <?php the_content(); ?>
        </section>
        
        <section class="span-10 center product_slides">
                <?php //the_content(); ?>
                <div class="stem">
                    <div class="stem_bg_white"></div>
                    <div class="stem_bg_green"></div>
                </div>
            <ul class="product_slide">
            
                <li class="first fade left clearfix" id="product_slide_1">
                		<div class="grid-5">
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                            </div>
                         </div>
                         <div class="grid-5"></div>
                </li>
                <li class="fade left clearfix" id="product_slide_2">
                		<div class="grid-5">
                            <div class="product_slide_icon">
                            </div>
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                                <h5>High Sensitivity</h5>
                                <p>SeaSPY’s accuracy is 0.1nT—the highest absolute accuracy of any magnetometer on the market. No matter where you are or in which direction you are surveying, SeaSPY gives you consistent, repeatable data you can trust.</p>
                            </div>
                         </div>
                         <div class="grid-5"></div>
                </li>
                <li class="fade right clearfix" id="product_slide_3">
	                         <div class="grid-5"></div>
                		<div class="grid-5">
                            <div class="product_slide_icon">
                            </div>
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                                <h5>High Sensitivity</h5>
                                <p>SeaSPY’s accuracy is 0.1nT—the highest absolute accuracy of any magnetometer on the market. No matter where you are or in which direction you are surveying, SeaSPY gives you consistent, repeatable data you can trust.</p>
                            </div>
                         </div>   
                </li>
                <li class="fade left clearfix" id="product_slide_4">
                    	<div class="grid-5">
                            <div class="product_slide_icon">
                            </div>
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                                <h5>High Sensitivity</h5>
                                <p>SeaSPY’s accuracy is 0.1nT—the highest absolute accuracy of any magnetometer on the market. No matter where you are or in which direction you are surveying, SeaSPY gives you consistent, repeatable data you can trust.</p>
                            </div>
                         </div>   
                                                     <div class="grid-5"></div>
                </li>
                <li class="fade right clearfix" id="product_slide_5">
                         <div class="grid-5"></div>                		
                        <div class="grid-5">
                            <div class="product_slide_icon">
                            </div>
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                                <h5>High Sensitivity</h5>
                                <p>SeaSPY’s accuracy is 0.1nT—the highest absolute accuracy of any magnetometer on the market. No matter where you are or in which direction you are surveying, SeaSPY gives you consistent, repeatable data you can trust.</p>
                            </div>
                         </div>                          
                </li>
                <li class="fade left clearfix" id="product_slide_6">
                		<div class="grid-5">
                            <div class="product_slide_icon">
                            </div>
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                                <h5>High Sensitivity</h5>
                                <p>SeaSPY’s accuracy is 0.1nT—the highest absolute accuracy of any magnetometer on the market. No matter where you are or in which direction you are surveying, SeaSPY gives you consistent, repeatable data you can trust.</p>
                            </div>
                         </div>   
                         <div class="grid-5"></div>                            
                </li>
                <li class="fade right clearfix" id="product_slide_7">
                         <div class="grid-5"></div>                
                		<div class="grid-5">
                            <div class="product_slide_icon">
                            </div>
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                                <h5>High Sensitivity</h5>
                                <p>SeaSPY’s accuracy is 0.1nT—the highest absolute accuracy of any magnetometer on the market. No matter where you are or in which direction you are surveying, SeaSPY gives you consistent, repeatable data you can trust.</p>
                            </div>
                         </div>          
                </li>
                <li class="fade left clearfix" id="product_slide_8">
                		<div class="grid-5">
                            <div class="product_slide_icon">
                            </div>
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                                <h5>High Sensitivity</h5>
                                <p>SeaSPY’s accuracy is 0.1nT—the highest absolute accuracy of any magnetometer on the market. No matter where you are or in which direction you are surveying, SeaSPY gives you consistent, repeatable data you can trust.</p>
                            </div>
                         </div>   
                         <div class="grid-5"></div>                            
                </li>
                
                <li class="last fade left clearfix" id="product_slide_9">
                		<div class="grid-5">
                            <div class="product_slide_mask">
                            </div>
                            <div class="product_slide_content">
                            </div>
                         </div>
                         <div class="grid-5"></div>
                </li>
                
            </ul>
        </section>
     </div>
	<div class="green-bg">
   		<div class="container">
        	<div class="span-10 center">
            	<h2>Configurations</h2>
            </div>
        </div>
    </div>
    
	<div class="grey-bg">
   		<div class="container">
        	<div class="span-10 center">
            	<h2>Articles & Brochures</h2>
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