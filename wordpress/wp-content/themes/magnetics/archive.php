<?php get_header(); ?>

<section role="main">

        <header>
        <?php 
            if ( is_post_type_archive() ) {
         ?>
            <h1>Articles <br />&amp; Brochures</h1>
        <?php
            } 
        ?>

        <section id="categories">
            <nav class="left">
                <h3>Select a Category:</h3>
                <ul>
                <?php

                    $category = get_category_by_slug('products'); 
                    $categoryID = $category->term_id;
                    $args = array(
                        'child_of' => $categoryID,
                        'hide_empty' => FALSE,
                        'title_li' => '',
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