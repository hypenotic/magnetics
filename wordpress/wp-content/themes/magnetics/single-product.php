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
    foreach( $teams as $post ) :  setup_postdata($post); 
?>
<?php echo get_post_meta(get_the_ID(), '__product_options_title', true); ?>
 <?php endforeach; ?>


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
        
        <section class="span-10 center">
                <?php //the_content(); ?>
            <ul class="product_slide">
                <li class="left clearfix">
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
                <li class="right clearfix">
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
                <li class="left clearfix">
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
                <li class="right clearfix">
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
                <li class="left clearfix">
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
                <li class="right clearfix">
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
                <li class="left clearfix">
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
                
            </ul>
        </section>
     </div>




</div>          
<?php endwhile;endif;wp_reset_query();?>
<?php get_footer(); ?>