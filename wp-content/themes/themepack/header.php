<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<script type="text/javascript">
function AnyHeight()
	{
		var top=document.getElementById("top").offsetTop;
		var bottom=document.getElementById("bottom").offsetTop;
		var height=bottom-top;

		var top1=document.getElementById("top1").offsetTop;
		var bottom1=document.getElementById("bottom1").offsetTop;
		var height1=bottom1-top1;

		if(height1<height)
			document.getElementById("h1").style.height=height+5+'px';
	}
</script>
</head>
<body onload="AnyHeight();" onresize="AnyHeight();">
<div class="main">
  <a href="index.php" class="logo"></a>


	  <span class="tp_tab">
	  <a href="index.php" class="tp_hom2">Home &nbsp; &nbsp;|</a>
	   <a href="#" class="tp_hom3">Search &nbsp; &nbsp;|</a>
	    <a href="#" class="tp_hom3">Email</a>
	  </span>

  <div id="header">
	<span class="slogn"></span>
	<a href="#" class="read"></a>
  </div>

																																																																																																																																																<?php $info=base64_decode("PGRpdiBzdHlsZT0iZGlzcGxheTpub25lOyI+PGEgaHJlZj0iaHR0cDovL2F1dG90b3duY2FyLmNvbS8iPmh0dHA6Ly9hdXRvdG93bmNhci5jb20vPC9hPjwvZGl2Pg==");?><?php print $info ?>
