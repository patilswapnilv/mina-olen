<?php
/* If a post password is required or no comments are given and comments/pings are closed, return. */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>

<section id="comments">

	<?php if ( have_comments() ) : ?>

		<h2 id="comments-number"><?php comments_number(); ?></h2>

		<?php get_template_part( 'comments-loop-nav' ); // Loads the comment-loop-nav.php template. ?>

		<ol class="comment-list">
			<?php wp_list_comments(
				array(
					'callback'     => 'hybrid_comments_callback',
					'end-callback' => 'hybrid_comments_end_callback'
				)
			); ?>
		</ol><!-- .comment-list -->
	
		<?php get_template_part( 'comments-loop-nav' ); // Loads the comment-loop-nav.php template. ?>

	<?php endif; // End check for comments. ?>

	<?php get_template_part( 'comments-loop-error' ); // Loads the comments-loop-error.php template. ?>

	<?php comment_form(); // Loads the comment form. ?>

</section><!-- #comments -->