<?php if(is_front_page()) { ?>

<?php wp_footer();?>
</body>
</html>
    
<?php } else { ?>

<section id="footer">
    <footer>
        <section>   
         
         <?php if(in_category('product-integrations') && is_single()) { ?>  
        <!-- Module: productInformation -->
        <?php get_template_part( 'module', 'productsRelated' ); ?>
        <?php } else if (is_page(562)) { ?>
            <h3>Recent Posts</h3>
            <ul>
            <?php
                $args = array( 'numberposts' => '3', 'post_type' => 'post' );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent ){
                    echo '<li class="footer-recent-posts"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                }
            ?>
            </ul>
        <?php } else { ?>
        <!-- Module: rmaformOverview -->
        <?php get_template_part( 'module', 'rmaformOverview' ); ?>
        <?php } ?>

        </section>

        <section>
            <h3>Contact</h3>
                <h4>Marine Magnetics Corp.</h4>
                <br /> <br />
                <p>
                    135 SPY Court <br />
                    Markham, Ontario <br />
                    L3R 5H6  Canada<br />
                </p>
                <p><a href="mailto:info@marinemagnetics.com">info@marinemagnetics.com</a></p>
                <p>Tel. +1 (905) 479-9727</p>
                <p>Fax. +1 (905) 479-9484</p>
        </section>
    </footer>
</section>
<?php wp_footer();?>
<script src="//cdn.trackduck.com/toolbar/prod/td.js" async data-trackduck-id="576be4280dca5c23310fd1d3"></script>
</body>
</html>

<?php } ?>