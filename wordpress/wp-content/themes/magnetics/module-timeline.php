<?php 
	$metaContentBlockTimelineText = get_post_meta($post->ID,'_content_block_timeline_text',true);

	if($metaContentBlockTimelineText) { ?>

<section id="timeline">
	<?php echo $metaContentBlockTimelineText; ?>
</section>
<?php } ?>