<?php 
// Copy this code in your theme's functions.php file before closing ?>

add_filter('comment_form_default_fields', 'website_remove');

function website_remove($fields)
{
if(isset($fields['url']))
unset($fields['url']);
return $fields;
}
?>
