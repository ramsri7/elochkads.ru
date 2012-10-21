<?php 
/**
* @package   yoo_pinboard Template
* @version   1.5.14 2010-04-26 18:40:51
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', dirname(__FILE__).DS);

// load YOOtools
require_once(dirname(dirname(__FILE__)).DS.'lib'.DS.'php'.DS.'yootools.php');

// init vars
$yootools = &YOOTools::getInstance();
$color    = $yootools->getCurrentColor();

$colorHeader = $yootools->getParam('colorHeader');
$colorMenubar = $yootools->getParam('colorMenubar');
$colorBody = $yootools->getParam('colorBody');

// set response header
$yootools->setHeader('css');

// reset styling
$yootools->loadCSS(PATH_ROOT.'reset.css');

// layout styling
$yootools->loadCSS(PATH_ROOT.'layout.css');
echo $yootools->getCSS();

// general tag styling
$yootools->loadCSS(PATH_ROOT.'typography.css');

// menu styling
$yootools->loadCSS(PATH_ROOT.'menus.css');

// module styling
$yootools->loadCSS(PATH_ROOT.'modules.css');

// joomla core styling
$yootools->loadCSS(PATH_ROOT.'joomla.css');

// third party extensions styling
$yootools->loadCSS(PATH_ROOT.'extensions.css');

// color styling
if ($colorHeader != '' && $colorHeader != 'default') {
	$yootools->loadCSS(PATH_ROOT.'header'.DS.$colorHeader.'.css');
}
if ($colorMenubar != '' && $colorMenubar != 'default') {
	$yootools->loadCSS(PATH_ROOT.'menubar'.DS.$colorMenubar.'.css');
}
if ($colorBody != '' && $colorBody != 'default') {
	$yootools->loadCSS(PATH_ROOT.'body'.DS.$colorBody.'.css');
}

// ie browser
$is_ie7 = $yootools->isIe(7);
$is_ie6 = $yootools->isIe(6);

if ($is_ie7 || $is_ie6) {
	$yootools->loadCSS(PATH_ROOT.'iehacks.css');	
}

if ($is_ie7) {
	$yootools->loadCSS(PATH_ROOT.'ie7hacks.css');	
} else if ($is_ie6) {
	$yootools->loadCSS(PATH_ROOT.'ie6hacks.css');	
}

// custom styling
// $yootools->loadCSS(PATH_ROOT.'custom.css');

?>