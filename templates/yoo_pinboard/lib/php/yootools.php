<?php
/**
* @package   yoo_pinboard Template
* @version   1.5.14 2010-04-26 18:40:51
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

class YOOTools {

	/* parameters */
	var $params;

	/* internal settings */
	var $internal;

	/* javascript settings */
	var $javascript;

	/* module settings */
	var $modules;

	/* browser */
	var $browser = array();

	function YOOTools() {
		
		$file         = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'params.ini';
		$this->params = $this->loadParams($file);

		$this->internal = array(
			// menu
			"accordionMenu"       => array("mainmenu" => 2, "othermenu" => 1, "usermenu" => 1)
			);
		
		$this->javascript = array(
			// template
			"tplurl"              => "'<VAL>'",
			// color
			"color"               => "'<VAL>'",
			"itemColor"           => "'<VAL>'",
			// layout
			"layout"              => "'<VAL>'");
		
		// ie browser
		if (array_key_exists('HTTP_USER_AGENT', $_SERVER) && preg_match('/(MSIE\\s?([\\d\\.]+))/', $_SERVER['HTTP_USER_AGENT'], $matches)) {
			$this->browser['ie7'] = intval($matches[2]) == 7;
			$this->browser['ie6'] = intval($matches[2]) == 6;
		}				
	}

	function &getInstance() {
		static $instance;

		if ($instance == null) {
			$instance = new YOOTools();
		}
		
		return $instance;
	}

	/* CSS */

	function addCSS(&$document) {
		$baseurl       = $document->baseurl.'/templates/'.$document->template;
		$color         = $this->getCurrentColor();
		$colorHeader   = $this->getParam('colorHeader');
		$colorMenubar  = $this->getParam('colorMenubar');
		$colorBody     = $this->getParam('colorBody');

		if ($this->getParam('gzip')) {
			$document->addStyleSheet($baseurl.'/css/template.css.php?colorHeader='.$colorHeader.'&amp;colorMenubar='.$colorMenubar.'&amp;colorBody='.$colorBody);
		} else {
			$document->addStyleDeclaration($this->getCSS());
			$document->addStyleSheet($baseurl.'/css/template.css');

			if ($colorHeader != '' && $colorHeader != 'default') {
				$document->addStyleSheet($baseurl.'/css/header/'.$colorHeader.'.css');
			}
			if ($colorMenubar != '' && $colorMenubar != 'default') {
				$document->addStyleSheet($baseurl.'/css/menubar/'.$colorMenubar.'.css');
			}
			if ($colorBody != '' && $colorBody != 'default') {
				$document->addStyleSheet($baseurl.'/css/body/'.$colorBody.'.css');
			}
			
			if ($this->isIe(7)) {
				$document->addStyleSheet($baseurl.'/css/iehacks.css');
				$document->addStyleSheet($baseurl.'/css/ie7hacks.css');
			}
			if ($this->isIe(6)) {
				$document->addStyleSheet($baseurl.'/css/iehacks.css');
				$document->addStyleSheet($baseurl.'/css/ie6hacks.css');
			}
			// $document->addStyleSheet($baseurl.'/css/custom.css');
		}
	}

	function getCSS() {
		return 'div.wrapper { width: '.intval($this->getParam('width')).'px; }';
	}

	function loadCSS($file) {
		if (is_readable($file)) {
			$content = file_get_contents($file);
			$content = str_replace('../../images/', '../images/', $content);
			echo $content;
		}
	}

	/* Javascript */

	function addJavaScript(&$document) {
		$baseurl = $document->baseurl.'/templates/'.$document->template;
		$script  = '<script type="text/javascript" src="%s"></script>';
		
		if ($this->getParam('gzip')) {
			$scripts[] = sprintf($script, $baseurl.'/lib/js/template.js.php');
		} else {
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/base.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/accordionmenu.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/fancymenu.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/addons/dropdownmenu.js');
			$scripts[] = sprintf($script, $baseurl.'/lib/js/yoo_tools.js');
		}

		$document->addScriptDeclaration($this->getJavaScript());
		$document->addCustomTag(implode("\n", $scripts) . "\n");
	}
		
	function getJavaScript() { 
		$js = "var YtSettings = { ";
		$separator = false;
		foreach($this->javascript as $key => $val) {
			$setting = $this->getParam($key);
			if(is_bool($setting)) {
				$setting ? $setting = "true" : $setting = "false";
			}
			if(is_float($setting)) {
				$setting = number_format($setting, 2, ".", "");
			}
			$separator ? $js .= ", " : $separator = true;			
			$js .= $key . ": " . str_replace("<VAL>", $setting, $val);
		}		
		$js .= " };";
		return $js;
	}

	/* Modules */

	function setModulePosition($position, $values) {
		$this->modules[$position] = $values;
	}

	function getModulePosition($position) {
		$document = &JFactory::getDocument();
		if (!is_array($position)) $position = array($position);
		
		foreach ($position as $pos) {
			if (isset($this->modules[$pos]) && $count = $document->countModules($pos)) {
				// force to disable module cache
				$modules =& JModuleHelper::getModules($pos);
				$total   = count($modules);
				for ($i = 0; $i < $total; $i++) {
					if (strpos($modules[$i]->params, "cache=")) {
						$modules[$i]->params  = preg_replace('/cache=(.*)/i', 'cache=0', $modules[$i]->params);
					} else {
						$modules[$i]->params .= "cache=0\n";
					}
				}
				// module position params
				$max = count($this->modules[$pos]);
				if ($count > $max) $count = $max;
				$params = array();
				$params['name'] = $pos;
				$params['count'] = $count;
				$params['values'] = $this->modules[$pos][$count];
				return $params;
			}
		}
		
		return false;
	}

	function renderModulePosition(&$position) {
		if ($count = count($position['values'])) {
			$params = array();
			$params['name'] = $position['name'];
			$params['order'] = $position['count'] - $count;
			$params['width'] = array_shift($position['values']);
			$params['separator'] = $count > 1 ? 'separator' : '';
			return $params;
		}
		
		return false;
	}
	
	/* Colorswitcher */
	
	function getCurrentColor() {

		$color = $this->getParam('color');

		if (isset($_COOKIE['ytcolor'])) {
			$color = (string) preg_replace('/[^A-Z0-9]/i', '', $_COOKIE['ytcolor']);
		}

		if (isset($_GET['yt_color'])) {
			$color = (string) preg_replace('/[^A-Z0-9]/i', '', $_GET['yt_color']);
			setcookie('ytcolor', $color, time() + 3600, '/'); 
		}

		// color presets
		switch ($color) {

			case 'combo1':
				$this->setParam('colorHeader', 'default');
				$this->setParam('colorMenubar', 'default');
				$this->setParam('colorBody', 'fabricboard');
				break;
				
			case 'combo2':
				$this->setParam('colorHeader', 'cherry');
				$this->setParam('colorMenubar', 'varnish');
				$this->setParam('colorBody', 'pressboard');
				break;

			case 'combo3':
				$this->setParam('colorHeader', 'lemon');
				$this->setParam('colorMenubar', 'varnish');
				$this->setParam('colorBody', 'chalkboard');
				break;
				
			case 'combo4':
				$this->setParam('colorHeader', 'stripes2');
				$this->setParam('colorMenubar', 'plastic');
				$this->setParam('colorBody', 'default');
				break;
				
			case 'combo5':
				$this->setParam('colorHeader', 'retro');
				$this->setParam('colorMenubar', 'plastic');
				$this->setParam('colorBody', 'steelboard');
				break;
				
			case 'combo6':
				$this->setParam('colorHeader', 'blue');
				$this->setParam('colorMenubar', 'varnish');
				$this->setParam('colorBody', 'fabricboard');
				break;
				
			case 'combo7':
				$this->setParam('colorHeader', 'fabricstripes');
				$this->setParam('colorMenubar', 'plastic');
				$this->setParam('colorBody', 'pressboard');
				break;
				
			case 'combo8':
				$this->setParam('colorHeader', 'concrete');
				$this->setParam('colorMenubar', 'default');
				$this->setParam('colorBody', 'chalkboard');
				break;
		
			case 'combo9':
				$this->setParam('colorHeader', 'green');
				$this->setParam('colorMenubar', 'default');
				$this->setParam('colorBody', 'default');
				break;

			case 'random':
				$bodyColors = array('default', 'fabricboard', 'chalkboard', 'pressboard', 'steelboard');
				$menubarColors = array('default', 'plastic', 'varnish');
				$headerColors = array('default', 'stripes2', 'fabricstripes', 'plaster', 'retro', 'cherry', 'beige', 'blue', 'grass', 'green', 'lemon', 'pink', 'red', 'yellow', 'concrete');
				$this->setParam('colorHeader', $headerColors[array_rand($headerColors)]);
				$this->setParam('colorMenubar', $menubarColors[array_rand($menubarColors)]);
				$this->setParam('colorBody', $bodyColors[array_rand($bodyColors)]);
				break;
			
			default:
				break;
		}

		return $color;
	}

	function getCurrentToolsColor() {
		$tools = $this->getParam('tools');
		
		if (is_array($tools) && array_key_exists($this->getCurrentColor(), $tools)) {
			return $tools[$this->getCurrentColor()];
		}
		
		return '';
	}	

	function getActiveMenuItemNumber($menu, $level) {
		$jmenu    = &JSite::getMenu();
		$active   = $jmenu->getActive();
		$menutype = isset($active) ? $active->menutype : null;
		$path     = isset($active) ? $active->tree : array();
				
		if ($menu == $menutype && array_key_exists($level, $path)) {
			$item = $jmenu->getItem($path[$level]);
			return $item->ordering;
		}
		
		return null;
	}

	/* Browser */

	function isIe($version) {
		if (array_key_exists('ie'.$version, $this->browser)) {
			return $this->browser['ie'.$version];
		}
		return false;
	}

	function setHeader($type = 'html') {
		$content_type = 'text/html';
		if ($type == 'css') $content_type = 'text/css; charset: UTF-8';
		if ($type == 'js')  $content_type = 'application/x-javascript';
		
		if (extension_loaded('zlib') && !ini_get('zlib.output_compression')) @ob_start('ob_gzhandler');
		header('Content-type: '.$content_type);
		header('Expires: '.gmdate('D, d M Y H:i:s', time() + 86400).' GMT');
	}

	/* Parameter*/
	
	function getParam($key, $default = '') {
		if (array_key_exists($key, $this->internal)) {
			return $this->internal[$key];
		} 

		if (array_key_exists($key, $this->params)) {
			return $this->params[$key];
		}

		return $default;
	}

	function setParam($key, $value = '') {
		$this->internal[$key] = $value;
	}

	function loadParams($file) {
		$params = array();
		
		if (is_file($file)) {
			$handle = fopen($file, 'r');
			if ($handle !== false) {
				while ($l = fgets($handle)) {
					if (preg_match('/^#/', $l) == false) {
						if (preg_match('/^(.*?)=(.*?)$/', $l, $regs)) {
							$params[$regs[1]] = $regs[2];
						}
					}
				}
				@fclose($handle);
			}
		}
		
		return $params;
	}

}

?>