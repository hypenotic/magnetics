<?php get_header(); ?>

<section role="main">

<?php get_header(); ?>

    <video autoplay loop id="bgvid">
        <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
    </video>

    <div class="mobile-bg"></div>

    <header>
    <h1>Integrations</h1>
    <h4> <?php echo category_description(); ?></h4>
    </header>


<section class="tabs">
    <header>
    <h1>Specs</h1>

        <select> 
            <option class="tab-1" selected="selected">Hardware Integrations ▾</option> 
            <option class="tab-2">Software Integrations</option> 
        </select> 

        <ul>
            <li class="active">
                <a href="#">
                    <h3>Hardware Integrations</h3>
                    <p><?php echo category_description( 10 ); ?> </p>
                </a>
            </li>
            <li>
                <a href="#">  
                    <h3>Software Integrations</h3>
                    </p><?php echo category_description( 9 ); ?> </p>
                </a>
            </li>                 
        </ul>

    </header>

    <section class="active">
      
   <?php 
query_posts('post_type=post&cat=9');
if ( have_posts() ) : while ( have_posts() ) : the_post(); 

    $metaIntegrationsLink = get_post_meta($post->ID, '_integrations_link', true);
    $metaIntegrationsText = get_post_meta($post->ID, '_integrations_text', true);
    $metaIntegrationsImageID = get_post_meta($post->ID, '_integrations_image', true);

?>
    <div class="vendor">

    <?php 
        $metaIntegrationsImageAttachment = wp_get_attachment_image_src( $metaIntegrationsImageID, 'full' );
        $metaIntegrationsImageAttachmentURL = $metaIntegrationsImageAttachment[0];

        ?>
        <img src="<?php echo $metaIntegrationsImageAttachmentURL; ?>" />

    <h4><?php the_title(); ?></h4>

    <p><?php echo $metaIntegrationsText; ?></p>

    <a href="//<?php echo $metaIntegrationsLink ?>" title="<?php the_title(); ?>"><?php echo $metaIntegrationsLink; ?></a>
    
    </div>

<?php endwhile; endif; wp_reset_query();?>

    </section>
    

    <section>

    <?php 
query_posts('post_type=post&cat=10');
if ( have_posts() ) : while ( have_posts() ) : the_post(); 

    $metaIntegrationsLink = get_post_meta($post->ID, '_integrations_link', true);
    $metaIntegrationsText = get_post_meta($post->ID, '_integrations_text', true);
    $metaIntegrationsImageID = get_post_meta($post->ID, '_integrations_image', true);

?>
    <div class="vendor">

    <?php 
        $metaIntegrationsImageAttachment = wp_get_attachment_image_src( $metaIntegrationsImageID, 'full' );
        $metaIntegrationsImageAttachmentURL = $metaIntegrationsImageAttachment[0];

        ?>
        <img src="<?php echo $metaIntegrationsImageAttachmentURL; ?>" />

    <h4><?php the_title(); ?></h4>

    <p><?php echo $metaIntegrationsText; ?></p>

    <a href="//<?php echo $metaIntegrationsLink ?>" title="<?php the_title(); ?>"><?php echo $metaIntegrationsLink; ?></a>
    
    </div>

<?php endwhile; endif; wp_reset_query();?>

    </section>

<!-- tabs -->
</section>
<!-- main -->
</section>

<?php get_footer(); ?>
