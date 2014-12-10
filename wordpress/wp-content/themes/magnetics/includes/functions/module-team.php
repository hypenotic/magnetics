<section id="team">
<?php 

		get_posts('post_type' => 'team');

		if(have_posts()):while(have_posts()):the_post();

		?>

		<!-- Get custom meta values -->
<?php 
	    $team = get_post_meta($post->ID,'_teammate',true);
?>

		 ?>
        <!-- For loop cycle through Array -->
        <?php if($team) {
            foreach($team as $teammate) {
            // Get custom meta values    
            $name   = $teammate['_name'];
            $title  = $teammate['_title'];
            $email  = $teammate['_email'];
            $phone  = $teammate['_phone'];
            $fax  	= $fax['_phone'];
            $image  = $teammate['_image'];
        ?>
        
        <ul class="list">
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
                echo '<i class="fa fa-envelope"></i> <a href="mailto:' . $email . '">' . $email . '</a><br>';
            endif ?>
            <?php if ($phone):
                echo '<i class="fa fa-phone"></i> ' . $phone . '<br>';
            endif ?>

            <?php if ($fax):
                echo $fax . '<br>';
            endif ?>
           </li>
        </ul>
      
        <?php
                }
            }
        ?>
</section>