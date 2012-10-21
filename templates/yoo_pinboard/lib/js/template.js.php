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
require_once(dirname(dirname(__FILE__)).DS.'php'.DS.'yootools.php');

// init vars
$yootools = &YOOTools::getInstance();

// set response header
$yootools->setHeader('js');

// load js
include(PATH_ROOT.'addons/base.js');
include(PATH_ROOT.'addons/accordionmenu.js');
include(PATH_ROOT.'addons/fancymenu.js');
include(PATH_ROOT.'addons/dropdownmenu.js');
include(PATH_ROOT.'yoo_tools.js');

?>