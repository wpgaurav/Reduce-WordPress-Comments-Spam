# Reduce-WordPress-Comments-Spam
Comments are no longer good for SEO but if you can't still get rid of it, do it right. https://gauravtiwari.org/code/
--
Some bloggers, link-building muddleheads may spam your comment area with author links and comment URLs.


```php
<?php 
// Copy this code in your theme's functions.php file

// This removes website field from comment forms

add_filter('comment_form_default_fields', 'website_remove');

function website_remove($fields)
{
if(isset($fields['url']))
unset($fields['url']);
return $fields;
}

// This removes existing author URLs linked to author names
add_filter( 'get_comment_author_link', 'rv_remove_comment_author_link', 10, 3 );
function rv_remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}
// Some bloggers, link-building muddleheads may spam your comment area with multiple URLs. You can get rid of those by putting this code
function gt_comment_post( $incoming_comment ) {
  $incoming_comment['comment_content'] = htmlspecialchars($incoming_comment['comment_content']);
  $incoming_comment['comment_content'] = str_replace( "'", '&apos;', $incoming_comment['comment_content'] );
  return( $incoming_comment );
}

function gt_comment_display( $comment_to_display ) {
  $comment_to_display = str_replace( '&apos;', "'", $comment_to_display );
  return $comment_to_display;
}

add_filter('preprocess_comment', 'gt_comment_post', ’, 1);
add_filter('comment_text', 'gt_comment_display', ’, 1);
add_filter('comment_text_rss', 'gt_comment_display', ’, 1);
add_filter('comment_excerpt', 'gt_comment_display', ’, 1);
?>
```
