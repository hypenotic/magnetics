<?php 
	$steps = get_post_meta($post->ID,'_steps',true);

    if(count($steps) > 1) {
 ?>
<section id="steps">
    <h2>Step by step</h2>
    <ol>
        <!-- For loop cycle through Array -->
        <?php
            foreach($steps as $step) {
            // Get custom meta values    
            $title  = $step['_title'];
            $image  = $step['_image'];
            $text  	= $step['_text'];
        ?>      
        <li>
            <div class="enlarges">
             <?php if ($image) {
                echo wp_get_attachment_image($image, 'full');
            } ?>
            </div>

            <section class="description">
            <h3><?php if ($title) { 
               echo $title;
            } ?></h3>

            <p><?php if ($text) { 
               echo $text;
            } ?></p>
            </section>
            <br style="clear:both" />
       </li>

<?php 
		} 
?>
	</ol>

</section>

<?  
    } 
?>
