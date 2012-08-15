<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to turing_comment() which is
 * located in the functions.php file.
 *
 * @package turing
 * @since turing 1.0
 */
?>
<?php	if ( post_password_required() ) return; ?>
	<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'turing' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'turing' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'turing' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'turing' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
		<ol class="commentlist">
			<?php	wp_list_comments( array( 'callback' => 'turing_comment' ) ); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'turing' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'turing' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'turing' ) ); ?></div>
		</nav>
		<?php endif; ?>
	<?php endif; ?>
	<?php	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'turing' ); ?></p>
	<?php endif; 
  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );
  $the_fields = array(
    'author'  =>  '<p class="comment-form-author">' . 
                  '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' . 
                  ( $req ? '<span class="required">*</span>' : '' ) .
	                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />
	                </p>', 
    'email'   => '<p class="comment-form-email">
                  <label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . 
                  ( $req ? '<span class="required">*</span>' : '' ) .
	                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
	                </p>', 
    'url'     => '<p class="comment-form-url">
                  <label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
	                '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
	                </p>'
  );
  $new_defaults = array(
    'fields'                => $the_fields,
    'comment_field'         => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    'comment_notes_before'  => '',
    'comment_notes_after'   => '',
    'title_reply'           => __( 'Leave a Comment!' ),
    'title_reply_to'        => __( 'Leave a Reply to %s' ),
    'cancel_reply_link'     => __( 'Cancel reply' ),
    'label_submit'          => __( 'Post Comment' )
  );	            
	comment_form($new_defaults); ?>
</div>
