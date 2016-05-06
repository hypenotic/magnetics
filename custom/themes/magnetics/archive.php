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



        <section id="tags">
            <nav class="left">
                <h3> Tags:</h3>
                <ul>
<?php
$currentTagID=$wp_query->query_vars['tag_id'];
$tags = get_terms('post_tag');
  foreach ( $tags as $key => $tag ) {
      if ( 'edit' == 'view' )
          $link = get_edit_tag_link( $tag->term_id, 'post_tag' );
      else
          $link = get_term_link( intval($tag->term_id), 'post_tag' );
      if ( is_wp_error( $link ) )
          return false;

      $tags[ $key ]->link = $link;
      $tags[ $key ]->id = $tag->term_id;
      $tags[ $key ]->name = $tag->name;
					if($currentTagID == $tag->term_id) {
						echo "<li class='current-cat'><a href=".$link ." >";
					}else {
						echo "<li><a href=".$link ." >";	
					}
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
        
<?php 
    $link = get_permalink();
    $pubsource = get_post_meta($post->ID,'_author_source',true);
?>
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
            <?php if ($pubsource) { ?>
            <p class="publication-source">Source: <?php echo $pubsource; ?></p>
            <?php } ?>

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





     <a href="<?php echo $link; ?>" class="icon more"></a>

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