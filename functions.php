<?php
function custom_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div class="meta">
    <cite><?php echo get_comment_author_link(); ?></cite>
    <?php echo get_avatar($comment,$size='40',$default='<path_to_url>' ); ?>
    <a class="date" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><span class="time">
	<?php echo  get_comment_time(); ?></span> <span class="year"><?php echo get_comment_date(); ?></span></a>
    </div>
  <div class="body">
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="moderation">Your comment is awaiting moderation.</em>
    <?php endif;
      comment_text() ?>
  </div>
  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ;
        }

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
}
