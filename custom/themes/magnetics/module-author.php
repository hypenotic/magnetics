<?php 
	// Custom Post Meta
	$metaAuthorShow = 	get_post_meta($post->ID, '_author_show', true);
	$wpMetaAuthorNameFirst = get_the_author_meta('first_name');
	$wpMetaAuthorNameLast = get_the_author_meta('last_name');
	// Have they added the author?
 	if($metaAuthorShow != -1 || in_category('articles')) {
?>
<!-- <section id="author" class="vcard" itemscope itemtype="http://microformats.org/profile/hcard">
   <figure class="photo" style="background:url(<?php //echo the_author_image_url(); ?>); background-size:cover;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpBMjZEQjc3OUU1MTkxMUU0QTVCNkZEQTE2RjM5RUFCOSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpBMjZEQjc3QUU1MTkxMUU0QTVCNkZEQTE2RjM5RUFCOSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkEyNkRCNzc3RTUxOTExRTRBNUI2RkRBMTZGMzlFQUI5IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkEyNkRCNzc4RTUxOTExRTRBNUI2RkRBMTZGMzlFQUI5Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+rEhdFAAAABBJREFUeNpi+P//PwNAgAEACPwC/tuiTRYAAAAASUVORK5CYII=" /></figure>
   <span class="fn">By <?php //echo $wpMetaAuthorNameFirst . ' ' . $wpMetaAuthorNameLast; ?></span>
</section> -->

<?php } ?>