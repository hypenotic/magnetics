<?php 

	// Custom Post Meta
	$metaAuthorShow = 	get_post_meta($post->ID, '_author_show', true);
	$wpMetaAuthorNameFirst = get_the_author_meta('first_name');
	$wpMetaAuthorNameLast = get_the_author_meta('last_name');

	// Have they added a video?
 	if($metaAuthorShow != -1) {

?>
<section id="author" class="vcard" itemscope itemtype="http://microformats.org/profile/hcard">
   <figure class="photo"><?php the_author_image($author_id = null); ?></figure>
   <span class="fn">By <?php echo $wpMetaAuthorNameFirst . ' ' . $wpMetaAuthorNameLast; ?></span>
</section>

<?php } ?>