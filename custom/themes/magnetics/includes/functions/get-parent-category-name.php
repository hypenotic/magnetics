<?php
function get_top_category() {
    $cats = get_the_category(); // category object
    $top_cat_obj = array();

    foreach($cats as $cat) {
        if ($cat->parent == 0) {
            $top_cat_obj[] = $cat;  
        }
    }
    $top_cat_obj = $top_cat_obj[0];
    return $top_cat_obj;
}
?>