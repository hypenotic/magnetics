<?php 
	$steps = get_post_meta($post->ID,'_steps',true);
 ?>
<section id="steps">
	<ol
        <!-- For loop cycle through Array -->
        <?php if($steps) {
            foreach($steps as $step) {
            // Get custom meta values    
            $title  = $step['_title'];
            $image  = $step['_image'];
            $text  	= $step['_text'];
        ?>      
        <li>
         <?php if ($image) {
            echo wp_get_attachment_image($image);
        } ?>

        <h3><?php if ($title) { 
           echo $title;
        } ?></h3>

        <p><?php if ($text) { 
           echo $text;
        } ?></p>

       </li>

<?php 
		} 
?>
	</ol>
<?	
	} 
?>

</section>
