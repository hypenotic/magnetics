<?php 
    // Custom meta values 
    $metaWhatsInTheBox = get_post_meta(get_the_ID(), '_product_tabs_whats_in_the_box', true);
    $metaAdditionalOptions = get_post_meta(get_the_ID(), '_product_tabs_additional_options', true);
    $metaIntegrations = get_post_meta(get_the_ID(), '_product_tabs_post_meta_integrations', true);
    $metaPlaysWellWith = get_post_meta(get_the_ID(), '_product_tabs_plays_well_with', true);
    $metaSystemAtAGlance = get_post_meta(get_the_ID(), '_product_tabs_system_at_a_glance', true);

    if($metaWhatsInTheBox && $metaAdditionalOptions && $metaIntegrations && $metaSystemAtAGlance) {

?>

<section class="tabs boxes">
    <header>
    <h1>Specs</h1>

        <select> 
            <option class="tab-1" selected="selected">What's in the Box ▾</option> 
            <option class="tab-2">Additional Options</option> 
            <option class="tab-3">Meta Integrations</option> 
            <option class="tab-4">System at a Glance</option> 
        </select> 

        <ul>
            <li class="active">
                <a href="#">
                    What's In The Box   
                </a>
            </li>
            <li>
                <a href="#">  
                    Additional Options
                </a>
            </li>
             <li>
                <a href="#">
                    Meta Integrations
                </a>
            </li>
            <li >
                <a href="#">
                    System At a Glance  
                </a>
            </li>                     
        </ul>

    </header>

    <section class="active">
        <article>
            <?php echo $metaWhatsInTheBox; ?>
        </article>  
    </section>

    <section>
        <article>
            
    <?php
        if($metaAdditionalOptions) {
            $args = array(
                'post_type'   => array('additional_options'),
                'post__in'    =>     $metaAdditionalOptions
            );
     

    $related_posts = get_posts($args);

     foreach ( $related_posts as $post ) { ?>
        <h3 id="<?php sanitize_title(get_the_title()); ?>"><?php the_title();?></h3>
        <p><?php echo $post->post_content; ?></p>
    <!-- End Loop -->
    <?php }
       } 
    wp_reset_postdata();?>

        </article>
    </section>
    <section>
        <article>
            
   <?php

        if($metaIntegrations) {
            $args = array(
                'post__in'    =>  $metaIntegrations
            );


    $related_posts = get_posts($args);

     foreach ( $related_posts as $post ) { 

        $metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
 
        ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
        <p><?php echo $metaBannerSubheading; ?></p>
    <!-- End Loop -->
    <?php }
    }
    wp_reset_postdata();?>

        </article>
    </section>
    <section>

    <?php get_template_part( 'template', 'brochureFileOptions' ); ?>

        <article>
            <ul>
<?php
        if($metaAdditionalOptions) {
            $args = array(
                'post_type'   => array('additional_options'),
                'post__in'    =>     $metaAdditionalOptions
            );

    $related_posts = get_posts($args);

     foreach ( $related_posts as $post ) { ?>
            <li><?php the_title(); ?></li>
    <!-- End Loop -->
<?php   }
    } 
    wp_reset_postdata();?>
            </ul>

            <ul>
 <?php
        if($metaIntegrations) {
            $args = array(
                'post__in'    =>     $metaIntegrations
            );
        } 

    $related_posts = get_posts($args);

     foreach ( $related_posts as $post ) { 

        $metaBannerSubheading = get_post_meta($post->ID, '_banner_subheading', true);
 
        ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <!-- End Loop -->
    <?php }
    wp_reset_postdata();?>
            </ul>

        <ul>
         <?php
        if($metaPlaysWellWith) {
            $args = array(
                'post__in'    =>     $metaPlaysWellWith
            );
        } 

    $related_posts = get_posts($args);

     foreach ( $related_posts as $post ) { 
        ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <!-- End Loop -->
    <?php }
    wp_reset_postdata();?>
            </ul>
        </article>
    </section>
</section>

<?php } ?>