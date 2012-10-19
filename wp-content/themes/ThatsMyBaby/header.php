<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title(); if(get_bloginfo('name') != "") echo ' - ' ; bloginfo('name'); }
elseif (is_single() ) { single_post_title(); }
elseif (is_page() ) { bloginfo('name'); if(get_bloginfo('name') != "") echo ': '; single_post_title(); }
 else { wp_title('',true); } ?></title>    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/script.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie6.css" type="text/css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>
<body>
<div id="page-background-simple-gradient">
    <div id="page-background-gradient"></div>
</div>
<div id="page-background-glare">
    <div id="page-background-glare-image"></div>
</div>
<div id="main">
<div class="sheet">
    <div class="sheet-tl"></div>
    <div class="sheet-tr"></div>
    <div class="sheet-bl"></div>
    <div class="sheet-br"></div>
    <div class="sheet-tc"></div>
    <div class="sheet-bc"></div>
    <div class="sheet-cl"></div>
    <div class="sheet-cr"></div>
    <div class="sheet-cc"></div>
    <div class="sheet-body">
<div class="nav">
	<div class="l"></div>
	<div class="r"></div>
	<ul class="menu">
		<?php art_menu_items(); ?>
	</ul>
</div>
<div class="header">
    <div class="header-jpeg"></div>
<div class="logo">
<h1 id="name-text" class="logo-name">
        <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <div id="slogan-text" class="logo-text">
        <?php bloginfo('description'); ?></div>
</div>
<div style="position: absolute; width:190px; height: 300px; z-index: 2; left:595px;top:192px" id="sli2">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4da05c7851ede960"></script>
<!-- AddThis Button END -->
</div>

</div>
