<?php defined('_JEXEC') or die ; ?>
<?php
    if (version_compare(JVERSION, '1.6.0', 'ge')) {
    ?>
    	<h1 class="title"><?php echo JText::_('JD_FAILURE'); ?></h1>
    <?php    
    } else {
    ?>
    	<div class="componentheading"><?php echo JText::_('JD_FAILURE'); ?></div>
    <?php    
    }
?>

<div class="alert">
	<div><?php echo JText::_('JD_FAILURE_MESSAGE'); ?></div>
	<div><?php echo JText::_('JD_CLICK');?>&nbsp;<a href="<?php echo $this->link ?>"><?php echo JText::_('JD_HERE'); ?></a>&nbsp;<?php echo JText::_('JD_TRY_AGAIN'); ?></div>
</div>
