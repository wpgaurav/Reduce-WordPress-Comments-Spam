<?php 
// Copy this code in your theme's functions.php file before closing ?>
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
