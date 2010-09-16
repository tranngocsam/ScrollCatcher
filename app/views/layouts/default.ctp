<?php
/* SVN FILE: $Id: default.thtml 6305 2008-01-02 02:33:56Z phpnut $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.libs.view.templates.pages
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 6305 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-01 21:33:56 -0500 (Tue, 01 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!--!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Software, Offshore development Center, Best Vietnam Software company, CRM, Social Media  " />
<meta name="description" content="Drascombe  " />
<title>LAZR - <?php echo $title_for_layout; ?></title>
<?php $html->charset(); ?>
<link rel="icon" href="<?php $html->url('/images/favicon.ico', true); ?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php $html->url('/images/favicon.ico', true); ?>" type="image/x-icon" />
<?php echo $html->css('stylesheet'); ?>
<?php echo $html->css('jquery-ui-1.8.1.custom'); ?>
<?php echo $javascript->link('/js/jquery-1.4.2.js'); ?>
<?php echo $javascript->link('/js/jquery-ui-1.8.1.custom.min.js'); ?>
<?php echo $scripts_for_layout; ?>
</head>
  <body>

    <div id="wrapper">
    <!--Header-->
      <?php echo $this->element('header'); ?>
  <!--end Header-->

<!--Content-->
<div id="content_st">
            <?php echo $this->element('left'); ?>
			<div id="right_content" class="left-element">
			  <?php echo $content_for_layout ?>

              <!--?php if (!isset($login_page)) :?>
              <div class="back-link">
                <a href="javascript:void(0)" onclick="history.go(-1); return false;">Back</a>
              </div>
              < ?php endif; ?-->
			</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
  <!--?= $this->renderElement('default/footer'); ?-->
  <?php echo $this->element('sql_dump'); ?>
</div>
</body>
</html>
