<?php get_header(); ?>

<section role="main">

<?php get_header(); ?>

    <script>
        jQuery(document).ready(function($){

            $('.menu-btn').addClass('dark');

        });
    </script>
    
    <div class="background">
    <div class="overlay"></div>
        <video autoplay loop id="bgvid">
            <source src="<?php echo get_bloginfo('template_url').'/videos/shutterstock_v3711827.mp4' ?>" type="video/mp4">
        </video>
    </div>

    <div class="mobile-bg"></div>

    <header class="banner">
        <h1>Integrations</h1>
        <h4><?php echo category_description(); ?></h4>
    </header>

<section class="tabs">
    <ul class="resp-tabs-list two">
            <li>
                <div>
                    <h3>Hardware Integrations</h3>
                   <?php echo category_description( 10 ); ?>
                </div>
            </li>
            <li>
                <div>
                    <h3>Software Integrations</h3>
                    <?php echo category_description( 9 ); ?>
                </div>
            </li>                 
        </ul>

    <div class="resp-tabs-container two">

    <div >
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

            <?php echo $metaIntegrationsText; ?>

            <a target="_blank" href="//<?php echo $metaIntegrationsLink ?>" title="<?php the_title(); ?>"><?php echo $metaIntegrationsLink; ?></a> 
        </section>

        <br style="clear:both" />
    </div>

<?php endwhile; endif; wp_reset_query();?>

        </article>
    </div>
    

    <div>
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
