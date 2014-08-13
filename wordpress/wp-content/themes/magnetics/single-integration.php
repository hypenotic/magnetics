<?php get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>
<?php if(have_posts()):while(have_posts()):the_post();?>
<div class="page-title">
    <div class="container">
        <section class="span-10-center single-content">
            <?php the_title( '<h1 class="headline">', '</h1>' ); ?>
            <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
        </section>
    </div>    
</div>     
<div class="page-content">  	
    <div class="container">
        <section class="span-10-center single-content">
            <?php the_content(); ?>
        </section>
     </div>
	 <?php 
		$software_partners = get_post_meta( get_the_ID(),'_software_partners',true );
		if($software_partners) {	
			foreach($software_partners as $partner) {
			//print_r($partner);
	 ?>
		<section class="full-width">
			<div class="section-bg"></div>
			<div class="container">
				<div class="span-10-center">
					<div class="span-4">
						<?php if($partner['_logo']){ 
								$img =$partner['_logo'];
								$img = wp_get_attachment_image_src($img,'full');
								$img=$img[0];
								}else {
								$img= get_bloginfo('template_url')."/images/configuration_dummy.jpg";	
							}
						?>	
						<img src="<?php echo $img;?>" />
					</div>
					<div class="span-8">
						<h5><?php echo $partner['_title']; ?></h5>
						<p><?php echo $partner['_content']; ?></p>
						<p><a href="<?php echo $partner['_link']; ?>"><?php echo $partner['_link']; ?></a></p>
					</div>
			</div>
		</section>
	 <?php 
			}
		}
	 ?>
	 

</div>
<?php endwhile;endif;wp_reset_query();?>
<?php get_footer(); ?>