
<?php 

    $metaTabsTabLeft = get_post_meta(get_the_ID(), '_page_tabs_tableft', true)
    $metaTabsTabLeftContent = get_post_meta(get_the_ID(), '_page_tabs_tablefttextarea', true);
 
    $metaTabsTabRight = get_post_meta(get_the_ID(), '_page_tabs_tabright', true);
    $metaTabsTabRightContent = get_post_meta(get_the_ID(), '_page_tabs_tabrighttextarea', true);


?>

<section class="tabs">

    <header>
        <ul>
            <li class="active">
                <a href="#" id="tab-1">
                    <?php  echo $metaTabsTabLeft;  ?>   
                </a>
            </li>
            <li>
                <a href="#" id="tab-2">
                    <?php  echo $metaTabsTabRight; ?>   
                </a>
            </li>
        </ul>
    </header>

    <section id="tab-1" class="tab active">
            <?php  echo $metaTabsTabLeftContent; ?>
    </section>
     <section id="tab-2" class="tab">
            <?php  echo $metaTabsTabsRightContent ?> 
    </section>

</section>