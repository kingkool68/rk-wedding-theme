<?php get_header();

$args = array (
	'post_type' => 'attachment',
	'numberposts' => -1,
	'post_status' => null,
	'post_parent' => $post->ID,
	'orderby' => 'menu_order',
	'order' => 'ASC'
); 

if (is_attachment()) {
	$args['post_parent'] = $post->post_parent;
}

$attachments = get_posts($args);
$current_id = $post->ID;
$next_id ='';
$prev_id = '';
$count = 0;
foreach ($attachments as $attachment) {
	if ($attachment->ID == $current_id) {
		$next_id = $count + 1;
		$prev_id = $count - 1;		
	}
	$count++;
}
$next_link = $attachments[$next_id]->post_name;
$prev_link = $attachments[$prev_id]->post_name;

?>
<div id="content" class="single">
  <?php if (have_posts()) : 
   while (have_posts()) : the_post();?>
           <div class="publish-date"><span class="month"><?php the_time('M') ?></span> <span class="day"><?php the_time('d') ?></span> <span class="year"><?php the_time('Y') ?></span></div>
      <h1><?php the_title(); ?></a></h1>
      <div class="meta"><span class="back-to-post">From the blog entry <a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a></span></div>
      <a href="<?php echo get_page_link($post->post_parent); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a>
		<?php the_content('Read the rest of this entry &raquo;'); ?>
    <?php endwhile; ?>
           <p><?php if($prev_id > -1) { ?>
		  <a href="<?=get_attachment_link($attachments[$prev_id]);?>" class="prev">&laquo; Previous</a> | 
		  <?php }
		  if ($next_link) { ?>
          <a href="<?=get_attachment_link($attachments[$next_id]);?>" class="next">Next &raquo;</a>
		<?php }
		  ?></p>
    
    <?php else : ?>
    <div class="no-results">
<h3>Not Found</h3>
    <p>Sorry, but you are looking for something that isn't here.</p>
</div>
    <?php endif; ?>
</div>
<?php comments_template(); ?>
<?php get_footer(); ?>
