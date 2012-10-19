<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php wp_headers();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php if (is_single() and ('open' == $post-> comment_status) or ('comment' == $post-> comment_type) ) { ?> <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/prototype.js.php"></script> <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/effects.js.php"></script> <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ajax_comments.js"></script> <?php } ?>
<?php wp_head(); ?>
<?php get_heads();?>

</head>
<body>
<!-- wrapper start -->
<div id="wrapper">
<!-- header start -->
	<div id="header">
		<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		<h2><?php bloginfo('description'); ?></h2>
		<div id="navigation">
			<ul>
				<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
				<?php wp_list_pages('title_li=&sort_column=post_title&depth=1'); ?>
			</ul>
		</div>
	</div>
<!-- header end -->