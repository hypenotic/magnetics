<?php 
    // Custom meta values 
    $metaContentBlockText = get_post_meta(get_the_ID(), '_content_block_1_text', true);

    if($metaContentBlockText) {

?>

<section class="optional">

    <?php echo $metaContentBlockText; ?>

</section>

 <?php } ?>

