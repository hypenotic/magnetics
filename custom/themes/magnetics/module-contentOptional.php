<?php 
    // Custom meta values 
    $metaContentBlockText = get_post_meta(get_the_ID(), '_content_block_1_text', true);

    $title = get_the_title();
    $prehash = preg_replace("/[^a-zA-Z]/", "", $title);
    $lowercase = strtolower($prehash);
    $hash = $lowercase;	

    if($metaContentBlockText) {

?>

<section class="optional <?php echo $hash; ?>">

    <?php echo $metaContentBlockText; ?>

</section>

 <?php } ?>

