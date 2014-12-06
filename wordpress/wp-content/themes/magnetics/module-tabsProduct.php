<?php 
    // Custom meta values 
    $metaWhatsInTheBox = get_post_meta(get_the_ID(), '_product_tabs_whats_in_the_box', true);
    $metaAdditionalOptions = get_post_meta(get_the_ID(), '_product_tabs_additional_options', true);
    $metaIntegrations = get_post_meta(get_the_ID(), '_product_tabs_meta_integrations', true);
    $metaSystemAtAGlance = get_post_meta(get_the_ID(), '_product_tabs_system_at_a_glance', true);

    if($metaWhatsInTheBox && $metaAdditionalOptions && $metaIntegrations && $metaSystemAtAGlance) {

?>

<section class="tabs boxes">
    <header>
    <h1>Specs</h1>

        <select> 
            <option class="tab-1" selected="selected">What's in the Box ▾</option> 
            <option class="tab-2">Additional Options</option> 
            <option class="tab-3">Meta Integrations</option> 
            <option class="tab-4">System at a Glance</option> 
        </select> 

        <ul>
            <li class="active">
                <a href="#">
                    What's In The Box   
                </a>
            </li>
            <li>
                <a href="#">  
                    Additional Options
                </a>
            </li>
             <li>
                <a href="#">
                    Meta Integrations
                </a>
            </li>
            <li >
                <a href="#">
                    System At a Glance  
                </a>
            </li>                     
        </ul>

    </header>

    <section class="active">
        <article>
            <?php echo $metaWhatsInTheBox; ?>
        </article>  
    </section>
    <section>
        <article>
            <?php echo $metaAdditionalOptions; ?> 
        </article>
    </section>
    <section>
        <article>
            <?php echo $metaIntegrations; ?> 
        </article>
    </section>
    <section>
        <article>
            <?php echo $metaSystemAtAGlance; ?> 
        </article>
    </section>

</section>

<?php } ?>