<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php // Get the feature banner image
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'full', true);
		}
    ?>        
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
					<div class="span-6">
                        <h6>Marine magnetics corp.</h6>
                        <p>
                        135 SPY Court <br />
                        Markham, Ontario <br />
                        L3R 5H6  Canada<br />
                        </p>
                        <br />
                        <p>Tel. +1 (905) 479-9727<br />
                           Fax. +1 (905) 479-9484</p>
                        <br />
                        <h6>Sales</h6>
                        <p>Rebecca Milian, x232<br />
                        <a href="mailto:rebecca@marinemagnetics.com">rebecca@marinemagnetics.com</a></p>
                        <br />
                        <h6>Technical Support</h6>
                        <p>Michael Daffern, x222<br />
                        <a href="mailto:mike@marinemagnetics.com">mike@marinemagnetics.com</a></p>
                        <br />
                        <h6>Accounts Payable and Receivable</h6>
                        <p>Esther Chow, x226<br />
                        <a href="mailto:esther@marinemagnetics.com">esther@marinemagnetics.com</a></p>
                    </div>
                    <div class="span-6">
                    	<?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true tabindex=49]');?>
                    </div>
                </section>
            </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>