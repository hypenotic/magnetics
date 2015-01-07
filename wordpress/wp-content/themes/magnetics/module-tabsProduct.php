<?php 
    // Custom meta values 
    $metaWhatsInTheBox = get_post_meta(get_the_ID(), '_product_tabs_whats_in_the_box', true);
    $metaAdditionalOptions = get_post_meta(get_the_ID(), '_additional_options', true);
    $metaIntegrations = get_post_meta(get_the_ID(), '_product_tabs_post_meta_integrations', true);
    $metaPlaysWellWith = get_post_meta(get_the_ID(), '_product_tabs_plays_well_with', true);
    $metaSystemAtAGlance = get_post_meta(get_the_ID(), '_product_tabs_system_at_a_glance', true);


    if($metaWhatsInTheBox || $metaAdditionalOptions || $metaIntegrations || $metaSystemAtAGlance) {

?>

<section class="tabs boxes">
    <h2>Specifications</h2>

        <ul class="resp-tabs-list">
            <li class="active">
                What's In The Box   
            </li>
            <li>
                Additional Options
            </li>
             <li>
                Integrations
            </li>
            <li >
                System At a Glance  
            </li>                     
        </ul>

        <br style="clear:both" />

        <div class="resp-tabs-container">
            <div>
                    <?php echo $metaWhatsInTheBox; ?>  
            </div>

            <div>
                    
            <?php
                if($metaAdditionalOptions) {
                    
                    foreach ( $metaAdditionalOptions as $option ) { ?>
                <h3 id="<?php sanitize_title($option['_title']); ?>"><?php echo $option['_title']; ?></h3>
                <p><?php echo $option['_description']; ?></p>
            <!-- End Loop -->
            <?php }

                } 
            ?>

            </div>
            <div>
                    
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

            <br style="clear:both" />


            </div>
            <div>


                <?php get_template_part( 'template', 'brochureFileOptions' ); ?>
                
                <h3>The <?php the_title() ?> comes with:</h3>

                <section class="images">

        <?php 

                 if($metaSystemAtAGlance) {
                    foreach($metaSystemAtAGlance as $image) { ?>

                    <?php if ($image) {
                        echo wp_get_attachment_image($image, 'full', 'class=item');
                        }
                    ?>

                <?php }
             }


         ?>
                </section>

                 <footer>
                    <ul>
                    <li>Additional Options</li>

                    <?php
                        if($metaAdditionalOptions) {
                    
                        foreach ( $metaAdditionalOptions as $option ) { ?>
                <li><?php echo $option['_title']; ?></li>
            <!-- End Loop -->
            <?php }

                } 
            ?>
        
                    </ul>

                    <ul>
                    <li>Integrates With</li>
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
                <li>Plays Well With</li>
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
                    </footer>
                
                <br style="clear:both" />
            </div>
        </div>
</section>

 <?php } ?>

