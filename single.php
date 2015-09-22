<?php get_header(); ?>
<div id="content" class="single">
  <?php if (have_posts()) :
   while (have_posts()) : the_post(); ?>
           <div class="publish-date"><span class="month"><?php the_time('M') ?></span> <span class="day"><?php the_time('d') ?></span> <span class="year"><?php the_time('Y') ?></span></div>
      <h1><?php the_title(); ?></a></h1>
      <div class="meta">
          <span class="author">by <?php the_author_posts_link(); ?></span>
      <span class="category">posted in <?php the_category(', ') ?></span>
      </div>
		<?php the_content('Read the rest of this entry &raquo;'); ?>
       <?php
		$posttags = get_the_tags();
if ($posttags) :

	   ?>
       <h2 id="tags">Tags</h2>
       <ul class="tags">
       <?php
       foreach($posttags as $tag) {
		   $taglink = get_tag_link($tag->term_id);
		   $tagname = $tag->name;
		?>
		<li><a rel="tag" href="<?= $taglink; ?>"><?= $tagname; ?></a></li>
		<?php } ?>
    <?php endif; endwhile; ?>
    <div class="post-nav"><span class="previous"><?php next_posts_link('&laquo; Older Entries') ?></span><span class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
    <?php else : ?>
    <div class="no-results">
<h3>Not Found</h3>
    <p>Sorry, but you are looking for something that isn't here.</p>
</div>
    <?php endif; ?>
  </div>
</div>
<div id="sidebar">
    
</div>
<?php comments_template(); ?>
<?php get_footer(); ?>
