<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Russell &amp; Kristina's Wedding | May 29th 2010</title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/favicon.ico" type="image/x-icon">
<?php $template_directory = get_bloginfo('template_directory'); ?>
<link rel="stylesheet" href="<?php echo $template_directory; ?>/css/reset.css">
<link rel="stylesheet" href="<?php echo $template_directory; ?>/css/wedding.css">
<!--script src="<?php echo $template_directory; ?>/js/jquery-1.3.2.min.js"></script-->
<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head();
?>
</head>
<?php
$url = explode('/', $_SERVER['REQUEST_URI']);
$body_class = $url[1];
if (is_preview() || is_home()) {
	$body_class = 'blog';
}
$wrapper_class = '';
if ( ! empty( $url[2] ) ) {
	$wrapper_class = $url[2];
}
?>
<body class="gri <?php echo $body_class; ?>">
<div id="header">
  <?php $wedding_url = get_bloginfo('url'); ?>
  <h1><a href="<?php echo $wedding_url; ?>">Russell &amp; Kristina's Wedding</a></h1>
  <a href="<?php echo $wedding_url; ?>" title="Go to the homepage"><img src="<?php echo $template_directory; ?>/img/RK-logo.png" width="100" height="101" class="logo"></a>
  <?php
  $day   = 29;     // Day of the countdown
  $month = 05;      // Month of the countdown
  $year  = 2010;   // Year of the countdown
  $hour  = 17;     // Hour of the day (east coast time)

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time())/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);

  ?>
  <p id="wedding-countdown"> Married <?= number_format( abs($days) ); ?> days!</p>
  <?php
   $current_uri = explode('/', $_SERVER['REQUEST_URI']); //Stores the request URI in an array split by / so we can use it later.
   $current_url = get_bloginfo('siteurl') . $_SERVER['REQUEST_URI']; //Creates the current absolute URL

   $nav_links = array('Wedding Info' => 'wedding/info/location',
					 'Our Story' => 'wedding/our-story',
					 'Wedding Party' => 'wedding/wedding-party',
					 'Photos' => 'wedding/photos',
					 'Blog' => 'blog',
					 ); //Build out an array of nav items Link Title => Relative URL
   ?>
  <ul id="nav">
    <?php foreach ($nav_links as $link => $link_url) {
		$absolute_link_url = $wedding_url . '/' . $link_url . '/'; //Make an absolute URL out of the current $link_url as we loop through the array.
		$link_url = str_replace('/location', '', $link_url);
		$pattern = '/' . str_replace('/', '\/', $link_url) . '/'; //Replaces / with \/ for the regular expression match.
		if(preg_match($pattern, $current_url)) { //If the current url matches a pattern from the $nav_links array, then we make it active.
			$active_link_class = ' class="active" ';
		}
		else {
			  $active_link_class = '';
		}

		if( $link == 'Blog' ) {
			$absolute_link_url = $wedding_url . '/';
			$active_link_class = '';
			if( is_home() || strstr( $current_url, $link_url ) ) {
				$active_link_class = ' class="active" ';
			}

		}
	?>
    <li<?php echo $active_link_class; ?>><a href="<?php echo $absolute_link_url ?>"><?php echo $link; ?></a></li>
    <?php } ?>
  </ul>
</div>
<div id="wrapper" class="<?php echo $wrapper_class; ?>">
