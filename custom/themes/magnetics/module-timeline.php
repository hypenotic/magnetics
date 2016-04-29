<?php 

	$timeline 			= get_post_meta($post->ID,'_timeline_block',true);
	$metaContentBlockTimelineText = get_post_meta($post->ID,'_content_block_timeline_text',true);

	if($metaContentBlockTimelineText) { ?>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->



<section class="cd-container" i d="timeline" id="timeline-container" >
	<ul>

	<?php // For loop cycle through array
		if($timeline) {
	    foreach($timeline as $block) {

	    // Get custom meta values    
	    $timeline_heading  		= $block['_heading'];
	    $timeline_content  		= $block['_content'];
	?>

		<li>
			<h3>
			<?php if ($timeline_heading) { ?>
				<?php echo $timeline_heading; ?>
			<?php } ?>
			</h3>
			<?php echo $timeline_content ?>
		</li>
		
				
	<?php
	        }
	    }
	// End foreach and if loop for cuztom bundle ?> 

	</ul>
</section>
<?php } ?>