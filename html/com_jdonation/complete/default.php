<?php 
/**
 * @version		3.0
 * @package		Joomla
 * @subpackage	Joom Donation
 * @author  Tuan Pham Ngoc
 * @copyright	Copyright (C) 2010 Ossolution Team
 * @license		GNU/GPL, see LICENSE.php
 */
defined('_JEXEC') or die ;
?>
<h1 class="title"><?php echo JText::_('JD_COMPLETE'); ?></h1>
<p class="info"><?php echo $this->message; ?></p>
<br />
<hr />
<br/>
<p class="info">Please click <a href="/">here</a> if you are not automatically redirected to the home page.</p>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<SCRIPT LANGUAGE="JavaScript">
	window.setTimeout("location.href='/'", 3500);
</SCRIPT>