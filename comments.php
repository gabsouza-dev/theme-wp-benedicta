<?php

function benedicta_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'benedicta_move_comment_field_to_bottom' );

$benedicta_comment_count = get_comments_number('0', '1', '%');
if ($benedicta_comment_count == 0) {
	$benedicta_comment_trans = esc_html__('No Comments', 'benedicta');
} elseif ($benedicta_comment_count == 1) {
	$benedicta_comment_trans = esc_html__('1 Comment', 'benedicta');
} else {
	$benedicta_comment_trans = $benedicta_comment_count . ' ' . esc_html__('Comments', 'benedicta');
}
?>

<div id="comments">
	
	<?php
		if ( post_password_required() ) { ?>
			<?php echo '<div class="comments_pass_note">' . esc_html__('This post is password protected. Enter the password to view comments.', 'benedicta') . '</div></div>'; ?>
		<?php
			return;
		}
	?>
	
	<?php if ( have_comments() ) : ?>
		
		<div class="commentlist_wrap">
			<h4 class="comments_title"><?php echo esc_html( $benedicta_comment_trans ); ?></h4>
			<ol class="commentlist clearfix">
				<?php wp_list_comments(array('callback' => 'benedicta_comment' )); ?>
				<div class="comments_navigation">
					<?php paginate_comments_links(); ?>
				</div>
			</ol>
		</div>
		
	 <?php else : // this is displayed if there are no comments so far ?>
	
		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
	
		 <?php else : // comments are closed ?>
			<p class="hidden"><?php esc_html_e('Comments are closed.', 'benedicta'); ?></p>
	
		<?php endif; ?>
		
	<?php endif; ?>
		
		
<?php if ( comments_open() ) : ?>

	<?php
	
		$comment_form = array(
            'fields' => apply_filters('comment_form_default_fields', array(
                'author' => '<div class="respond-inputs clearfix"><div class="author_wrap"><input type="text" placeholder="' . esc_attr__('Name *', 'benedicta') . '" title="' . esc_attr__('Name *', 'benedicta') . '" id="author" name="author" class="form_field"></div>',
                'email' => '<div class="email_wrap"><input type="text" placeholder="' . esc_attr__('Email *', 'benedicta') . '" title="' . esc_attr__('Email *', 'benedicta') . '" id="email" name="email" class="form_field"></div>',
                'url' => '<div class="url_wrap"><input type="text" placeholder="' . esc_attr__('Web site', 'benedicta') . '" title="' . esc_attr__('Web site', 'benedicta') . '" id="web" name="url" class="form_field"></div></div>'
            )),
            'comment_field' => '<textarea name="comment" cols="45" rows="5" placeholder="' . esc_attr__('Comment', 'benedicta') . '" id="comment-message" class="form_field"></textarea>',
            'comment_form_before' => '',
            'comment_form_after' => '',
            'must_log_in' => esc_html__('You must be logged in to post a comment.', 'benedicta'),
            'title_reply' => esc_html__('Leave a Comment', 'benedicta'),
            'label_submit' => esc_html__('Add a Comment', 'benedicta'),
            'logged_in_as' => '<p class="logged-in-as">' . esc_html__('Logged in as', 'benedicta') . ' <a href="' . esc_url( admin_url('profile.php') ) . '">' . $user_identity . '</a>. <a href="' . esc_url( wp_logout_url(apply_filters('the_permalink', get_permalink())) ) . '">' . esc_html__('Log out?', 'benedicta') . '</a></p>',
        );
        comment_form($comment_form, $post->ID);
		
	?>


<?php endif; // if you delete this the sky will fall on your head ?>

</div>