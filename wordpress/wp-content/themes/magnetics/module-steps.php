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
            <?php if ($image) { ?>
            <div class="enlarges">
                <button data-action="activateModal"></button>
                <figure class="modal">
                    <img src="<?php echo wp_get_attachment_url($image); ?>" />
                </figure>

                <img class="frame" src="<?php bloginfo('template_url') ?>/images/laptop.png" />
                 <figure style="background-image:url(<?php echo wp_get_attachment_url($image); ?>); background-size:contain; background-position:center center;">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAJCAYAAAA7KqwyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowMjc3NjJEMUU1RDkxMUU0OUM3RkZBNTQ5MTEzRjdBRiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowMjc3NjJEMkU1RDkxMUU0OUM3RkZBNTQ5MTEzRjdBRiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjAyNzc2MkNGRTVEOTExRTQ5QzdGRkE1NDkxMTNGN0FGIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjAyNzc2MkQwRTVEOTExRTQ5QzdGRkE1NDkxMTNGN0FGIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+XQvv2gAAABpJREFUeNpi/P//PwMlgImBQjBqwLAwACDAAOVfAw9/ZDvcAAAAAElFTkSuQmCC"/>
                </figure>
            </div>
            <?php } ?>

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
