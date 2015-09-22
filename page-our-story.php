<?php get_header(); ?>
<div id="content">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <?php the_content('Read the rest of this entry &raquo;'); ?>
  <?php endwhile; ?>
  <?php endif; ?>
</div>
<div id="sidebar">
  <div id="russell" class="about">
    <h2>About Russell</h2>
    <p><img height="206" width="265" class="alignnone size-full wp-image-349" title="Russell closeup" alt="Russell closeup" src="http://www.russellandkristina.com/wp-content/uploads/2009/09/russell-closeup.jpg"/> Russell is a self-proclaimed computer geek who enjoys building websites, blogging, and collecting funny t-shirts. Outside of cyberspace he can be found taking pictures with his digital SLR or snowboarding in the winter time.</p>
    <ul>
      <li><a href="http://www.russellheimlich.com/blog">Read his blog</a></li>
      <li><a href="http://www.facebook.com/russellh">Befriend him on Facebook</a></li>
      <li><a href="http://www.twitter.com/kingkool68">Follow him on Twitter</a></li>
    </ul>
  </div>
  <div id="kristina" class="about">
    <h2>About Kristina</h2>
    <p><img height="284" width="265" class="alignnone size-full wp-image-350" title="Kristina closeup" alt="Kristina closeup" src="http://www.russellandkristina.com/wp-content/uploads/2009/09/kristina-closeup.jpg"/> Kristina is a craft-a-holic including card making, sewing, and candlemaking. She also enjoys the intricacies of baking and spending summer days tanning on the beach.</p>
    <ul>
      <li><a href="http://www.kristinanaude.com">Visit Kristina’s Website</a></li>
      <li><a href="http://www.facebook.com/kristina.naude.heimlich">Befriend her on Facebook</a></li>
      <li><a href="http://twitter.com/naudebynature">Follow her on Twitter</a></li>
    </ul>
  </div>
</div>
<?php comments_template(); ?>
<?php get_footer(); ?>
