<section id="team">

        <h2>Our Team</h2>

		<!-- Get custom meta values -->
<?php 
        $teams = get_posts(array('post_type' => 'team'));

        foreach ($teams as $post) : setup_postdata( $post );

	    $team = get_post_meta($post->ID,'_teammate',true);
?>
        <!-- For loop cycle through Array -->

         <ul class="list">

        <?php if($team) {
            foreach($team as $teammate) {
            // Get custom meta values    
            $name   = $teammate['_name'];
            $title  = $teammate['_title'];
            $email  = $teammate['_email'];
            $phone  = $teammate['_phone'];
            $fax  	= $teammate['_fax'];
            $image  = $teammate['_image'];
        ?>       
            <li>
             <?php if ($image) {
                echo wp_get_attachment_image($image) . '<br>';
                } else {
                echo '<img src="http://placehold.it/300x150"><br>';
                }
            ?>
            <?php if ($name): 
               echo '<b>' . $name . '</b><br>';
            endif ?>
            <?php if ($title):
                echo $title . '<br>';
            endif ?>

            <?php if ($email):
                echo '<a href="mailto:' . $email . '"><i class="fa fa-envelope"></i> <span>' . $email . '</span></a><br>';
            endif ?>
            <?php if ($phone): 
                echo '<a href="tel:' . $phone . '"><i class="fa fa-phone"></i> <span class="contactNumber">' . $phone . '</span></a><br>';
            endif ?>

            <?php if ($fax):
                echo '<span class="contactNumber">'.$fax . '</span><br>';
            endif ?>
           </li>

      
        <?php
                }
            }
        ?>
    <!-- end loop -->

            </ul>
    <?php 
    endforeach; 
    wp_reset_postdata();
    ?>
</section>