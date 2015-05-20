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
       
       <?php  ?>
        <section id="categories">
            <nav class="left">
                <h3>Select a Category:</h3>
                <ul>
                <?php

                    // children of products category
                    $args = array(
                        'child_of' => 1,
                        'hide_empty' => FALSE,
                        'title_li' => '',
                        'exclude' => 11
                    );
                    wp_list_categories( $args ); 

                ?>
                </ul>
            </nav>
        </section>


<?php
        $tags = get_tags();
?>
        <section id="tags">
            <nav class="left">
                <h3> Tags:</h3>
                <ul>
<?php
                 foreach($tags as $tag) {

                    echo "<li><a href=".$tag->link ." >";
                    echo $tag->name;
                    echo "</a></li>";

                 }

?>
                </ul>
            </nav>
        </section>

    
    </header>


    <section id="archive">  
        <!-- start loop -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            
<a href="<?php the_permalink(); ?>">
    <article class="overview">
        
        <h6><?php
$categories = get_the_category();
$separator = ', ';
$output = '';
if($categories){
    foreach($categories as $category) {

        if ($category->slug == 'blog') {continue;}

        $output .=$category->cat_name.$separator;
    }
echo trim($output, $separator);
}
?></h6>   


<header>

            <h3><?php the_title(); ?></h3>

        </header>

        <section>
            
            <?php 
                // Out on a limb here. If there's no brochureDescription, 
                // we can just call excerpt. Vice versa.
                the_excerpt(); 
            ?>

            <footer>


<?php
    // Custom meta values 
        $metaPDF = get_post_meta($post->ID,'_article_file',true);
        $articleDescription = get_post_meta($post->ID,'_article_content',true);
        $articleFile = get_post_meta($post->ID,'_article_file',true);
        
    if(!$metaPDF) {

        $metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_article',true);
        $query = new WP_Query('post_type=article&p='.$metaAssociatedBrochurePostID);
        
        while ($query->have_posts()): $query->the_post(); 
        global $post;

        $metaPDF = get_post_meta($post->ID,'_article_file',true);
        endwhile;
        wp_reset_query();

    } else { ?>

    <a title="<?php the_title() ?> - Brochure" href="<?php echo $metaPDF; ?>" download="<?php if(!$GLOBALS['view']) {echo $metaPDFName; } ?>" class="resource icon <?php if($GLOBALS['view']) {echo 'view';} ?>"></a>

    <?php } ?>


<?php
    // Custom meta values 
    $metaPDF = get_post_meta($post->ID,'_brochure_file',true);
    $metaPDFName = rtrim($metaPDF, "/");

            $brochureFile = get_post_meta($post->ID,'_brochure_file',true);
        $brochureDescription = get_post_meta($post->ID,'_brochure_content',true);
        

    if(!$metaPDF) {

        $metaAssociatedBrochurePostID = get_post_meta($post->ID,'_banner_post_brochure',true);
        $query = new WP_Query('post_type=brochure&p='.$metaAssociatedBrochurePostID);
        
        while ($query->have_posts()): $query->the_post(); 
        global $post;

        $metaPDF = get_post_meta($post->ID,'_brochure_file',true);
        endwhile;
        
    }

    if ($metaPDF) { ?>


    <a href="<?php echo $metaPDF; ?>" title="Download the Article" download="<?php if(!$GLOBALS['view']) {echo $metaPDFName; } ?>" class="resource icon <?php if($GLOBALS['view']) {echo 'view';} ?>"></a>

    <?php } ?>





     <a href="<?php the_permalink();?>" class="icon more"></a>

</footer>

        </section>
        
                
           
 
    </article>

</a>

        <!-- end loop -->
        <?php endwhile; endif; ?>
    </section>

    <section class="pagination">
            <?php pagination(); ?>
    </section>
</section>

<?php get_footer(); ?>