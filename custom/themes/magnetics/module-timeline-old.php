<?php 
	$metaContentBlockTimelineText = get_post_meta($post->ID,'_content_block_timeline_text',true);

	if($metaContentBlockTimelineText) { ?>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

<section class="cd-container" i d="timeline" >
	<?php echo $metaContentBlockTimelineText; ?>
</section>
<?php } ?>