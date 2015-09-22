<?php get_header(); ?><div id="content" class="home">  <?php if (have_posts()) :  		while (have_posts()) : the_post(); ?>  <div class="post" id="post-<?php the_ID(); ?>">             <div class="publish-date"><span class="month"><?php the_time('M') ?></span> <span class="day"><?php the_time('d') ?></span> <span class="year"><?php the_time('Y') ?></span></div>    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">      <?php the_title(); ?>      </a></h2>      <div class="meta">          <span class="author">by <?php the_author_posts_link(); ?></span>      <span class="category">posted in <?php the_category(', ') ?></span>      </div>      <?php the_content('Read the rest of this entry &raquo;'); ?>      <a href="<?php the_permalink() ?>#comments" class="response-count"><?php comments_number('0 Responses', '1 Response', '% Responses'); ?></a>      </div>    <?php endwhile; ?>    <?php else : ?>    <div class="no-results">      <h3>Not Found</h3>      <p>Sorry, but you are looking for something that isn't here.</p>    </div>    <?php endif;		if (pp_has_pagination()) {		include 'pagination.php';	}	?>  </div>      <?php get_sidebar(); ?></div><?php get_footer(); ?>