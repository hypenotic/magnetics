<?php get_header(); ?>
<?php get_template_part( 'template-part', 'add_video' ); ?>
<?php if(have_posts()):while(have_posts()):the_post();?>
<div class="page-title">
    <div class="container">
        <section class="span-10 center">
            <?php the_title( '<h1 class="headline">', '</h1>' ); ?>
            <?php get_template_part( 'template-part', 'add_sub_heading' ); ?>
        </section>
    </div>    
</div>     
<div class="page-content">  	
    <div class="container">
        <section class="span-10 center">
            <?php the_content(); ?>
        </section>
     </div>
     
     
     
     
     
</div>          
<?php endwhile;endif;wp_reset_query();?>
<?php get_footer(); ?>