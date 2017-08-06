<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package robokarthikeyan
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
    <div class="container">
        <div class="section-title">
            <h1>Drop Your Words</h1>
	        <div class="bg-text">Drop Your Words</div>
	    </div>
        <?php
        
        add_filter( 'genesis_title_comments', 'child_title_comments');
        function child_title_comments() {
            return __(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'genesis');
        }
        
        add_filter('comment_form_default_fields','robokarthikeyan_disable_comment_url');
        function robokarthikeyan_disable_comment_url($fields)
        {
            $fields['author'] = '<div class="form-group">' . '<input id="author" class="form-control" placeholder="Your Name*" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />' . '</div>';
           $fields['email'] = '<div class="form-group">' . '<input id="email" class="form-control" placeholder="your Email Address*" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' />' .	'</div>';
            unset($fields['url']);
            return $fields;
        }
        
        add_filter('comment_form_fields','robokarthikeyan_commands_section');
    
        function robokarthikeyan_commands_section($fields)
        {
            $comment_field = $fields['comment'];
            unset( $fields['comment'] ); 
            $fields['comment'] = '<div class="form-group">'.'<textarea class="form-control" id="comment" name="comment" placeholder="Drop your words about this art" rows="5"></textarea></div>'; 
            return $fields; 
        }
        
        function robokarthikeyan_comment_reform ($arg) {
//            echo '<pre>';
//            print_r($arg);
//            echo '</pre>';
            $arg['submit_button'] = '<button name="%1$s" type="submit" id="%2$s" class="btn btn-move btn-large" value="%4$s"><span>%3$s</span><i class="fa fa-comments-o"></i></button>';
            $arg['comment_notes_before'] = '';
            $arg['comment_notes_after'] = '<p class="pull-right"><small><em>Your email address will not be published.</em></small></p>';
            return $arg;
        }
        add_filter('comment_form_defaults','robokarthikeyan_comment_reform');
        ?>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <?php
                comment_form(array('title_reply' => 'Your Custom Reply Text'));
                ?>
            </div>
        </div>
        
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	    
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'robokarthikeyan' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'robokarthikeyan' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'robokarthikeyan' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'robokarthikeyan' ); ?></p>
	<?php
	endif;

	
	?>
    </div><!-- .container -->
</div><!-- #comments -->
