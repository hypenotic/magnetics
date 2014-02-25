
<!--Get custom meta values-->

<?php
	$sub_heading=get_post_meta($post->ID,'_sub_heading',true);
?>

<?php if ($sub_heading) : ?>
 <p class="sub-headline"><?php echo $sub_heading;?></p>
<?php endif; ?>