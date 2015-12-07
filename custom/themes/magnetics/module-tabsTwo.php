<?php 
    // Custom meta values 
    $metaTabsTabLeft = get_post_meta(get_the_ID(), '_page_tabs_tableft', true);
    $metaTabsTabLeftContent = get_post_meta(get_the_ID(), '_page_tabs_tablefttextarea', true);
 
    $metaTabsTabRight = get_post_meta(get_the_ID(), '_page_tabs_tabright', true);
    $metaTabsTabRightContent = get_post_meta(get_the_ID(), '_page_tabs_tabrighttextarea', true);

    if ($metaTabsTabLeft && $metaTabsTabLeftContent && $metaTabsTabRight && $metaTabsTabRightContent) {
?>
<section class="tabs tabs-2">
    <ul class="resp-tabs-list two">
        <li>
            <div>
            <?php echo $metaTabsTabLeft;  ?> 
            </div>  
        </li>
        <li>
            <div>
            <?php echo $metaTabsTabRight; ?>  
            </div> 
        </li>
    </ul>

    <div class="resp-tabs-container two">

        <div>
            <article>
            <?php echo $metaTabsTabLeftContent; ?>
            </article>
        </div>

         <div>
            <article>
            <?php echo $metaTabsTabRightContent; ?> 
            </article>
        </div>

    </div>

</section>

<?php } ?>