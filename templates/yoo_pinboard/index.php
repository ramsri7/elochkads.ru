<?php
/**
* @package   yoo_pinboard Template
* @version   1.5.14 2010-04-26 18:40:51
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/yootools.php');
include_once(JPATH_ROOT . "/templates/" . $this->template . '/lib/php/yoolayout.php');

$template_baseurl = $this->baseurl . '/templates/' . $this->template;

JHTML::_('behavior.mootools');

// set title
$this->setTitle($mainframe->getCfg('sitename') . ' - ' . $this->getTitle());

// add template mootools to JDocumentHTML
if ($this->params->get('loadMootools')) {
	$mootools = $this->params->get('gzip') ? '/lib/js/mootools.js.php' : '/lib/js/mootools/mootools-release-1.12.js';
	$this->_scripts = array_merge(array($template_baseurl . $mootools => 'text/javascript'), $this->_scripts);
	unset($this->_scripts[$this->baseurl . '/media/system/js/mootools.js']);
}

// add template javascript to JDocumentHTML
if ($this->params->get('loadJavascript')) {
	$yootools->addJavaScript($this);
}

// add template css to JDocumentHTML
$yootools->addCSS($this);

// add class="blog" to body tag if frontpage, category blog or section blog
$blog = null;
if (isset($option) && $option == 'com_content') {
	if (JRequest::getCmd('view') == 'frontpage' || (in_array(JRequest::getCmd('view'), array('section', 'category')) && JRequest::getCmd('layout') == 'blog')) {
		$blog = 'blog';
	}
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<link rel="apple-touch-icon" href="<?php echo $template_baseurl ?>/apple_touch_icon.png" />
</head>

<body id="page" class="yoopage <?php echo $this->params->get('leftcolumn'); ?> <?php echo $this->params->get('rightcolumn'); ?> <?php echo $itemcolor; ?> <?php echo $blog; ?> <?php echo $yootools->getCurrentToolsColor(); ?>">

	<?php if($this->countModules('absolute')) : ?>
	<div id="absolute">
		<jdoc:include type="modules" name="absolute" />
	</div>
	<?php endif; ?>

	<div id="page-header">
		<div class="page-header-t">
			<div class="page-header-b">
				<div class="wrapper floatholder">
		
					<div id="header">
							
						<div id="toolbar">
							<div class="floatbox ie_fix_floats">
							
								<?php if($this->params->get('date')) : ?>
								<div id="date">
									<?php echo JHTML::_('date', 'now', JText::_('DATE_FORMAT_LC')) ?>
								</div>
								<?php endif; ?>
			
								<?php if($this->countModules('topmenu')) : ?>
								<div id="topmenu">
									<jdoc:include type="modules" name="topmenu" />
								</div>
								<?php endif; ?>
		
								<jdoc:include type="modules" name="toolbar" style="yoo" />
			
							</div>
						</div>
		
						<div id="headerbar">
							<div class="floatbox ie_fix_floats">
								<jdoc:include type="modules" name="header" style="yoo" />
							</div>
						</div>
		
						<?php if($this->countModules('menu')) : ?>
						<div id="menu">
							<jdoc:include type="modules" name="menu" />
						</div>
						<?php endif; ?>
			
						<?php if($this->countModules('logo')) : ?>		
						<div id="logo">
							<jdoc:include type="modules" name="logo" />
						</div>
						<?php endif; ?>
			
						<?php if($this->countModules('search')) : ?>
						<div id="search">
							<jdoc:include type="modules" name="search" />
						</div>
						<?php endif; ?>
			
						<?php if ($this->countModules('banner')) : ?>
						<div id="banner">
							<jdoc:include type="modules" name="banner" />
						</div>
						<?php endif; ?>
		
					</div>
					<!-- header end -->

				</div>
			</div>
		</div>
	</div>

	<div id="page-body">
		<div class="wrapper floatholder">
			
			<?php if ($this->countModules('top + top-equal + top-goldenratio')) : ?>
			<div id="top">
				<div class="floatbox ie_fix_floats">
		
					<?php if($this->countModules('top')) : ?>
					<div class="topblock width100 float-left">
						<jdoc:include type="modules" name="top" style="yoo" />
					</div>
					<?php endif; ?>
		
					<?php if ($pos = $yootools->getModulePosition(array('top-equal', 'top-goldenratio'))) : ?>
						<?php while ($param = $yootools->renderModulePosition($pos)) : ?>
							<div class="topbox <?php echo $param['width'].' '.$param['separator']; ?> float-left">
								<jdoc:include type="modules" name="<?php echo $param['name']; ?>" style="yoo" order="<?php echo $param['order']; ?>" />
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
										
				</div>
			</div>
			<!-- top end -->
			<?php endif; ?>

			<div id="middle">
				<div class="background">

					<?php if ($this->countModules('breadcrumbs')) : ?>
					<div id="breadcrumbs">
						<jdoc:include type="modules" name="breadcrumbs" />
					</div>
					<?php endif; ?>

					<?php if($this->countModules('left')) : ?>
					<div id="left">
						<div id="left_container" class="clearfix">
							<jdoc:include type="modules" name="left" style="yoo" />
						</div>
					</div>
					<!-- left end -->
					<?php endif; ?>
		
					<div id="main">
						<div id="main_container" class="clearfix">
						
							<div class="main-tr">
								<div class="main-t">
									<div class="main-pin"></div>
								</div>
							</div>
		
							<div class="main-r">
								<div class="main-m">
			
									<?php if ($this->countModules('main-top-equal + main-top-goldenratio')) : ?>
									<div id="maintop" class="floatbox">
							
										<?php if ($pos = $yootools->getModulePosition(array('main-top-equal', 'main-top-goldenratio'))) : ?>
											<?php while ($param = $yootools->renderModulePosition($pos)) : ?>
												<div class="maintopbox <?php echo $param['width'].' '.$param['separator']; ?> float-left">
													<jdoc:include type="modules" name="<?php echo $param['name']; ?>" style="yoo" order="<?php echo $param['order']; ?>" />
												</div>
											<?php endwhile; ?>
										<?php endif; ?>
											
									</div>
									<!-- maintop end -->
									<?php endif; ?>
				
									<div id="mainmiddle" class="floatbox">
				
										<?php if($this->countModules('right') && !class_exists('JEditor')) : ?>
										<div id="right">
											<div id="right_container" class="clearfix">
												<jdoc:include type="modules" name="right" style="yoo" />
											</div>
										</div>
										<!-- right end -->
										<?php endif; ?>
						
										<div id="content">
											<div id="content_container" class="clearfix">
				
												<?php if ($this->countModules('content-top-equal + content-top-goldenratio')) : ?>
												<div id="contenttop" class="floatbox">
				
													<?php if ($pos = $yootools->getModulePosition(array('content-top-equal', 'content-top-goldenratio'))) : ?>
														<?php while ($param = $yootools->renderModulePosition($pos)) : ?>
															<div class="contenttopbox <?php echo $param['width'].' '.$param['separator']; ?> float-left">
																<jdoc:include type="modules" name="<?php echo $param['name']; ?>" style="yoo" order="<?php echo $param['order']; ?>" />
															</div>
														<?php endwhile; ?>
													<?php endif; ?>
				
												</div>
												<!-- contenttop end -->
												<?php endif; ?>

												<div class="floatbox">
													<jdoc:include type="message" />
													<jdoc:include type="component" />
												</div>
				
												<?php if ($this->countModules('content-bottom-equal + content-bottom-goldenratio')) : ?>
												<div id="contentbottom" class="floatbox">
													
													<?php if ($pos = $yootools->getModulePosition(array('content-bottom-equal', 'content-bottom-goldenratio'))) : ?>
														<?php while ($param = $yootools->renderModulePosition($pos)) : ?>
															<div class="contentbottombox <?php echo $param['width'].' '.$param['separator']; ?> float-left">
																<jdoc:include type="modules" name="<?php echo $param['name']; ?>" style="yoo" order="<?php echo $param['order']; ?>" />
															</div>
														<?php endwhile; ?>
													<?php endif; ?>
									
												</div>
												<!-- mainbottom end -->
												<?php endif; ?>
				
											</div>
										</div>
										<!-- content end -->
				
									</div>
									<!-- mainmiddle end -->
				
									<?php if ($this->countModules('main-bottom-equal + main-bottom-goldenratio')) : ?>
									<div id="mainbottom" class="floatbox">
					
										<?php if ($pos = $yootools->getModulePosition(array('main-bottom-equal', 'main-bottom-goldenratio'))) : ?>
											<?php while ($param = $yootools->renderModulePosition($pos)) : ?>
												<div class="mainbottombox <?php echo $param['width'].' '.$param['separator']; ?> float-left">
													<jdoc:include type="modules" name="<?php echo $param['name']; ?>" style="yoo" order="<?php echo $param['order']; ?>" />
												</div>
											<?php endwhile; ?>
										<?php endif; ?>
									
									</div>
									<!-- mainbottom end -->
									<?php endif; ?>
			
								</div>
							</div>
		
							<div class="main-bl">
								<div class="main-br">
									<div class="main-b"></div>
								</div>
							</div>
		
						</div>
					</div>
					<!-- main end -->
		
				</div>
			</div>
			<!-- middle end -->
			
			<?php if ($this->countModules('bottom + bottom-equal + bottom-goldenratio')) : ?>
			<div id="bottom">
				<div class="floatbox ie_fix_floats">
					
					<?php if ($pos = $yootools->getModulePosition(array('bottom-equal', 'bottom-goldenratio'))) : ?>
						<?php while ($param = $yootools->renderModulePosition($pos)) : ?>
							<div class="bottombox <?php echo $param['width'].' '.$param['separator']; ?> float-left">
								<jdoc:include type="modules" name="<?php echo $param['name']; ?>" style="yoo" order="<?php echo $param['order']; ?>" />
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					
					<?php if($this->countModules('bottom')) : ?>
					<div class="bottomblock width100 float-left">
						<jdoc:include type="modules" name="bottom" style="yoo" />
					</div>
					<?php endif; ?>
							
				</div>
			</div>
			<!-- bottom end -->
			<?php endif; ?>

			<div id="footer">
				<div class="floatbox"><a class="anchor" href="#page"></a></div>
				<div class="footer-bg"><jdoc:include type="modules" name="footer" /></div>
				<jdoc:include type="modules" name="debug" />
			</div>
			<!-- footer end -->
	
		</div>
	</div>

</body>
</html>