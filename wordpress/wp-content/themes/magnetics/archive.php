<?php get_header(); ?>

<section role="main">

        <header>
        <?php 
            if ( is_post_type_archive() ) {
         ?>
            <h1>Articles <br />&amp; Brochures</h1>
        <?php
            }  else { ?>

         <h1><?php echo single_cat_title(); ?></h1>

       <?php } ?>
       

        <section id="categories">
            <nav class="left">
                <h3>Select a Category:</h3>
                <ul>
                <?php

                    // children of products category
                    $args = array(
                        'child_of' => 7,
                        'hide_empty' => FALSE,
                        'title_li' => '',
                        'exclude' => 11
                    );
                    wp_list_categories( $args ); 

                ?>
                </ul>
            </nav>
        </section>
    </header>

    <section id="archive">  
        <!-- start loop -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            <?php get_template_part('template','postOverview'); ?>

        <!-- end loop -->
        <?php endwhile; endif; ?>
    </section>

    <section class="pagination">
            <?php pagination(); ?>
    </section>
</section>

<?php get_footer(); ?>