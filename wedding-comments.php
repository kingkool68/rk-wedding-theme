<?php if ('open' == $post->comment_status): ?><div id="comments"><?php 	/* This variable is for alternating comment background */	$oddcomment = 'odd';?>  <h2>  <?php comments_number('Leave a Comment', 'One Comment', '% Comments');?></h2>  <?php if ($comments) : ?><ol class="commentlist">  <?php foreach ($comments as $comment) : ?>  <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>"> <span class="commentdate"><a href="#comment-<?php comment_ID() ?>" title="">On    <?php comment_date('F jS, Y') ?>    at    <?php comment_time() ?>    </a>    <?php edit_comment_link('e','',''); ?>    </span>         <span class="author"><cite>    <?php comment_author_link() ?>    </cite>:	<?php if ($comment->comment_approved == '0') : ?>    <em>Your comment is awaiting moderation.</em>    <?php endif; ?></span>    <?php comment_text() ?>  </li>  <?php /* Changes every other comment to a different class */		if ('odd' == $oddcomment) $oddcomment = '';		else $oddcomment = 'odd';	?>  <?php endforeach; /* end for each comment */ ?></ol><?php else : // this is displayed if there are no comments so far ?><?php if ('open' == $post->comment_status) : ?><!-- If comments are open, but there are no comments. --><?php else : // comments are closed ?><!-- If comments are closed. --><?php endif; ?><?php endif; ?><?php if ('open' == $post->comment_status) : ?><?php if ( get_option('comment_registration') && !$user_ID ) : ?><p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p><?php else : ?><form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">  <?php if ( $user_ID ) : ?>  <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>  <?php else : ?>  <p>    <label for="author"><span class="name">Name:</span></label>    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="2" class="comment-field" />  </p>  <p>    <label for="email"><span class="email">Email:</span></label>    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="3" class="comment-field" />    <em class="txt-email-sub">Your e-mail will not be published</em></p>  <p>    <label for="url"><span class="website">Website Address:</span></label>    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="4" class="comment-field" />    <em class="txt-website-example">Optional</em></p>  <?php endif; ?>  <p><label for="comment">Your Comment:</label>    <textarea name="comment" id="comment" rows="10" tabindex="1" class="comment-box"></textarea>  </p>  <!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->  <p>    <input name="submit" type="submit" id="submit" class="btnComment" tabindex="5" value="Add Comment &raquo;" />    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />  </p>  <?php do_action('comment_form', $post->ID); ?></form><?php endif; // If registration required and not logged in ?><?php endif; // if you delete this the sky will fall on your head ?></div><?php endif;?>