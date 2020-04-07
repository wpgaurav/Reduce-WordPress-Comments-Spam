<?php 
// Copy this code in your theme's functions.php file before closing ?>
add_filter( 'get_comment_author_link', 'rv_remove_comment_author_link', 10, 3 );
function rv_remove_comment_author_link( $return, $author, $comment_ID ) {
	return $author;
}
?>
