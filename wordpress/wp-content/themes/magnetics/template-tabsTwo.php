<section class="tabs">

    <header>
        <ul class="tab-header">
            <li class="active-tab-header">
                <a href="#" id="tab-1">
                    <?php  echo get_post_meta(get_the_ID(), '_page_tabs_tableft', true); ?>   
                </a>
            </li>
            <li>
                <a href="#" id="tab-2">
                    <?php  echo get_post_meta(get_the_ID(), '_page_tabs_tabright', true); ?>   
                </a>
            </li>
        </ul>
    </header>

    <article class="tab-content">
        <div id="tab-1" class="tab active-tab-content">
                <?php  echo get_post_meta(get_the_ID(), '_page_tabs_tablefttextarea', true); ?>
        </div>
         <div id="tab-2" class="tab">
                <?php  echo get_post_meta(get_the_ID(), '_page_tabs_tabrighttextarea', true); ?> 
        </div>
    </article>

</section>