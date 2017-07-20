<?php

//Include cuztom helper files https://github.com/Gizburdt/Wordpress-Cuztom-Helper
include('includes/wp-cuztom-helper/cuztom.php');

//Include post custom posts type. Dependent on /wp-cuztom-helper classes.
//include('includes/wp-cuztom-posts/custom-post-integration.php');
//include('includes/wp-cuztom-posts/custom-post-page.php');
include('includes/wp-cuztom-posts/custom-article-library.php');
include('includes/wp-cuztom-posts/custom-brochure-library.php');
include('includes/wp-cuztom-posts/custom-generic.php');
include('includes/wp-cuztom-posts/custom-team-members.php');
include('includes/wp-cuztom-posts/custom-drawings.php');
// include('includes/wp-cuztom-posts/custom-product.php');

// METABOX
include('includes/metabox/metabox-generic.php');

//Load custom functions
require_once('includes/functions/add-classes-to-body.php');
require_once('includes/functions/admin-tinymce.php'); 
require_once('includes/functions/archives.php');
require_once('includes/functions/get-parent-category-name.php');
//require_once('includes/functions/custom-login-logo.php');
require_once('includes/functions/enqueue-style.php');
require_once('includes/functions/enqueue-script.php');
require_once('includes/functions/first-image.php');
require_once('includes/functions/image-support.php');
require_once('includes/functions/page-excerpts.php');
require_once('includes/functions/pagination.php');
require_once('includes/functions/recent-post.php');
require_once('includes/functions/register-menu.php');
require_once('includes/functions/remove-header-meta.php');
require_once('includes/functions/remove-menu-id.php');
require_once('includes/functions/remove-wp-version.php');
require_once('includes/functions/add-placeholder-field-gravity-forms.php');
require_once('includes/functions/remove-wordpress-emoji.php');
require_once('includes/functions/menu-classes.php');
//Load shortcodes
require_once('includes/shortcodes/form-entry-shortcode.php');
//require_once('includes/shortcodes/accordion.php');
//require_once('includes/shortcodes/button.php');
//require_once('includes/shortcodes/content.php');
//require_once('includes/shortcodes/content-sidebar.php');
//require_once('includes/shortcodes/readmore.php');
//require_once('includes/shortcodes/tab.php');
add_filter( 'gform_replace_merge_tags', function ( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
    $merge_tag = '{custom_date}';

    if ( strpos( $text, $merge_tag ) === false ) {
        return $text;
    }

    $local_timestamp = GFCommon::get_local_timestamp( time() );
    $local_date      = date_i18n( 'ymd', $local_timestamp, true );

    return str_replace( $merge_tag, $url_encode ? urlencode( $local_date ) : $local_date, $text );
}, 10, 7 );

add_action( 'gform_admin_pre_render', 'add_merge_tags' );
function add_merge_tags( $form ) {
    ?>
    <script type="text/javascript">
        gform.addFilter('gform_merge_tags', 'add_merge_tags');
        function add_merge_tags(mergeTags, elementId, hideAllFields, excludeFieldTypes, isPrepop, option){
            mergeTags["custom"].tags.push({ tag: '{custom_date}', label: 'Custom Date' });
            
            return mergeTags;
        }
    </script>
    <?php
    //return the form object from the php hook  
    return $form;
}

?>