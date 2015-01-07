<?php get_header(); ?>

<section role="main">

<?php get_header(); ?>

    <div class="background">
        <video autoplay loop id="bgvid">
            <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
        </video>
    </div>

    <div class="mobile-bg"></div>

    <header class="banner">
        <h2>Integrations</h2>
        <h4><?php echo category_description(); ?></h4>
    </header>

<section class="tabs">
    <ul class="resp-tabs-list two">
            <li >
                    <h3>Hardware Integrations</h3>
                    <p><?php echo category_description( 10 ); ?> </p>
            </li>
            <li>
                    <h3>Software Integrations</h3>
                    </p><?php echo category_description( 9 ); ?> </p>
            </li>                 
        </ul>

    <div class="resp-tabs-container two">

    <div >
      <article>
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
        <section>
            <h4><?php the_title(); ?></h4>

            <?php echo $metaIntegrationsText; ?>

            <a href="//<?php echo $metaIntegrationsLink ?>" title="<?php the_title(); ?>"><?php echo $metaIntegrationsLink; ?></a> 
        </section>

        <br style="clear:both" />
    </div>

<?php endwhile; endif; wp_reset_query();?>

        </article>
    </div>
    

    <div>
    <article>
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
            <section>
                <h4><?php the_title(); ?></h4>

                <p><?php echo $metaIntegrationsText; ?></p>

                <a href="//<?php echo $metaIntegrationsLink ?>" title="<?php the_title(); ?>"><?php echo $metaIntegrationsLink; ?></a>
            </section>
            <br style="clear:both" />
    </div>

<?php endwhile; endif; wp_reset_query();?>

    </article>
    </div>

<!-- tabs -->
</section>
<!-- main -->
</section>

<?php get_footer(); ?>
